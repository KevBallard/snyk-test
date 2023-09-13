<?php
/**
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */


defined('_JEXEC') or die;


class plgSystemCountry_meta extends JPlugin
{
    function curPageURL() {
        $current_url = $_SERVER[REQUEST_URI];
        $arrUrl = explode('?',$current_url);
        return substr($arrUrl[0],1);
    }
	//add an option to the menu systme to select sibling menu item
	function onContentPrepareForm($form, $data)
	{
		$app    = JFactory::getApplication();
		$option = $app->input->get('option');
 		$view = $app->input->get('view');

        switch($option) {

                case 'com_menus': {
                    if ($app->isAdmin()) {
                	    JForm::addFormPath(__DIR__ . '/forms');
                        $form->loadFile('options', false);
                        $form->sibling_mymenuitem = $this->params->get('sibling_mymenuitem');
                    }
                    return true;
                }

        }
        
		return true;
	}




	function onBeforeCompileHead()
	{
	    $doc = JFactory::getDocument();
		$app	= JFactory::getApplication();
		$option = $app->input->get('option');
		$task = $app->input->get('task');
		$view = $app->input->get('view');
		$menu	= $app->getMenu();
		$active	= $menu->getActive();
		$params = $active->params;
		$lang	= $active->language;
        $route	= $active->route;
//echo $option;
//echo $view;
//echo $task;
		
		if($app->isSite()){
            //before we get started on hreflang....
            //quick check that there are no capital letters in the URL and 301 redirecting if there are
            $current_url = $this->curPageURL();
            if(preg_match("/[A-Z]/", $current_url)>0) {
                // Permanent 301 redirection
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".strtolower($current_url));
                exit();        		
        		return true;
        	}
        	
	        if($option == 'com_seo_glossary'){
            	return true;
            }
        
			//also need to add the site idenity to the page since Zoo does not do this
            if($option == 'com_zoo'){
		        //been requested to add the page to the end of the title too if they are on a paginated page
		        if($app->input->get('page')){
		        	if( strpos( $doc->getTitle(), '| Page' ) != true && strpos( $doc->getTitle(), '- Page' ) != true ) {
            			$doc->setTitle(str_replace('| Eckoh ', '', $doc->getTitle()) . ' | Page ' . $app->input->get('page'));	
			        }
		        }
            	if( strpos( $doc->getTitle(), '| Eckoh' ) != true && strpos( $doc->getTitle(), '- Eckoh' ) != true ) {
            		$doc->setTitle($doc->getTitle() . ' | Eckoh');
		        }
            }
            if( strpos( $doc->getTitle(), ' | Eckoh' ) != true){
            	$doc->setTitle($doc->getTitle() . ' | Eckoh');
            }

			if($option == 'com_zoo' && ($task == 'category' || $view == 'category')){
			    if($lang == 'en-GB'){
					$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="alternate" hreflang="en-GB" />' );
				}else{
					$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="alternate" hreflang="en-US" />' );
				}
	           	$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="alternate" hreflang="x-default" />' );
				$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="canonical" />' );

				return true;
			}
        
        	/////============================
        	///ZOOOOOOOO
        	/////============================
        	if($option == 'com_zoo' && ($view == 'frontpage' || $task == 'frontpage')){
				$searchmenutype = 'us';
				$url = $this->curPageURL();
				//swap any americanisms
				if (strpos($url, 'about-us/') !== false) {
                    $doc->addCustomTag( '<link href="'.JURI::base().'us/'.str_replace('us/about-us/','about-us/',$url).'" rel="alternate" hreflang="en-US" />' );
				    $doc->addCustomTag( '<link href="'.JURI::base().'about-us/'.str_replace('about-','',str_replace('us/','',$url)).'" rel="alternate" hreflang="en-GB" />' );
				    $doc->addCustomTag( '<link href="'.JURI::base().'about-us/'.str_replace('about-','',str_replace('us/','',$url)).'" rel="alternate" hreflang="x-default" />' );
				}elseif (strpos($url, 'investors/') !== false) {
			        $doc->addCustomTag( '<link href="'.JURI::base().$url.'" rel="alternate" hreflang="en-GB" />' );
				    $doc->addCustomTag( '<link href="'.JURI::base().$url.'" rel="alternate" hreflang="x-default" />' );
				    
				}else{
    				$doc->addCustomTag( '<link href="'.JURI::base().'us/'.str_replace('us/','',$this->curPageURL()).'" rel="alternate" hreflang="en-US" />' );
    				$doc->addCustomTag( '<link href="'.JURI::base().''.str_replace('us/','',$this->curPageURL()).'" rel="alternate" hreflang="en-GB" />' );
    				$doc->addCustomTag( '<link href="'.JURI::base().''.str_replace('us/','',$this->curPageURL()).'" rel="alternate" hreflang="x-default" />' );
				}
				$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="canonical" />' );
				return true;
			}
			
			if($option == 'com_zoo' && $task = 'item'){
	            $zoo_id = $app->input->get('item_id');
		        $db = JFactory::getDbo();
				$query = $db->getQuery(true);
				if($zoo_id){
					//13-01-22 moved this getting of the app id up here as we need to know the app to work out if it's blog or news
					$db = JFactory::getDbo();
			        $query = $db->getQuery(true);
			        $query = 'SELECT application_id FROM #__zoo_item WHERE id = '.$db->quote($zoo_id).' LIMIT 0,1;';
				    $db->setQuery($query);
				    $appid = $db->loadResult();
	            	switch ($appid) {
	            		case '1':
	            		case '12':
	            			//blog
	            			$usId = 12;
	            			$ukId = 1;
	            			break;
	            		case '2':
	            		case '13':
	            			//news
	            			$usId = 13;
	            			$ukId = 2;
	            			break;
	            		case '3':
	            		case '10':
	            			//careers
	            			$usId = 13;
	            			$ukId = 2;
	            			break;
	            		case '4':
	            		case '11':
	            			//case studies
	            			$usId = 11;
	            			$ukId = 4;
	            			break;
	            		case '6':
	            		case '9':
	            			//events
	            			$usId = 9;
	            			$ukId = 6;
	            			break;
	            		case '7':
	            		case '14':
	            			//events
	            			$usId = 14;
	            			$ukId = 7;
	            			break;
	            		default:
	            			//blog
	            			$usId = 12;
	            			$ukId = 1;
	            			break;
	            	}
		            // $query
					// 	->select('path')
					// 	->from('#__menu')
					// 	->where('id = ' . $db->quote($sibling_mymenuitem));
					if($lang == 'en-GB'){
					    $query = 'SELECT alias FROM #__zoo_item WHERE `name` = (SELECT name FROM #__zoo_item WHERE id = '.$db->quote($zoo_id).') AND id <> '.$db->quote($zoo_id).' AND application_id = '.$db->quote($usId).' AND state = 1 LIMIT 0,1;';
					}else{
                        $query = 'SELECT alias FROM #__zoo_item WHERE `name` = (SELECT name FROM #__zoo_item WHERE id = '.$db->quote($zoo_id).') AND id <> '.$db->quote($zoo_id).' AND application_id = '.$db->quote($ukId).' AND state = 1 LIMIT 0,1;';
					}
					$db->setQuery($query);
					$sisterpage = $db->loadResult();
					
					
					//zoo adds it's own canonical tag but it does not have the full URL lets change that
					$headData = $doc->getHeadData();
					//var_dump($headData);
    				foreach ($headData['links'] as $key => $value) {
    					if ($value['relation'] == 'canonical') {
    						unset($headData['links'][$key]);
    					}
    				}
    				//add back in the canonical 
    				$doc->setHeadData($headData);
    				$doc->addHeadLink(JURI::base().''.$this->curPageURL(), 'canonical');
        			//
    				
					if(!$sisterpage){
						//=============================================================
						//if no sibling menu items have been assigned in the admin, then fall back to looking for a matching route in the oposite menu
						//=============================================================

						$query = 'SELECT name FROM #__zoo_item WHERE id = '.$db->quote($zoo_id).' LIMIT 0,1;';
						$db->setQuery($query);
						$pagename = $db->loadResult();

						$arrUK = array('centre','fibre','litre','theatre','theatre','colour','flavour','humour','labour','neighbour','apologise','organise','recognise','analyse','travelled','travelling','fuelled','fuelling','manoeuvre','defence','licence','offence','analog','catalog','dialog');
						$arrUS = array('center','fiber','liter','theate','theatre','color','flavor','humor','labor','neighbor','apologize','organize','recognize','analyze','traveled','traveling','fueled','fueling','maneuver','defense','license','offense','analogue','catalogu','dialogue');

						if($lang == 'en-GB'){
							//swap any americanisms
							$pagename = str_replace($arrUK, $arrUS, $pagename);
							$query = 'SELECT alias FROM #__zoo_item WHERE `name` = ('.$db->quote($pagename).') AND id <> '.$db->quote($zoo_id).' AND application_id = '.$db->quote($usId).' AND state = 1 LIMIT 0,1;';
						}else{
							//swap any americanisms
							$pagename = str_replace($arrUS, $arrUK, $pagename);
							$query = 'SELECT alias FROM #__zoo_item WHERE `name` = ('.$db->quote($pagename).') AND id <> '.$db->quote($zoo_id).' AND application_id = '.$db->quote($ukId).' AND state = 1 LIMIT 0,1;';
						}

						$db->setQuery($query);
						$sisterpage = $db->loadResult();
					}


					if($sisterpage){
						$current_url = $this->curPageURL();
			            $arrURL = explode('/', $current_url);
			            array_pop($arrURL);
			            if($lang == 'en-GB'){
							$searchmenutype = 'us';
							//swap any americanisms
							$doc->addCustomTag( '<link href="'.JURI::base().'us/'.implode('/',$arrURL).'/'.$sisterpage.'" rel="alternate" hreflang="en-US" />' );
							$doc->addCustomTag( '<link href="'.JURI::base().''.$current_url.'" rel="alternate" hreflang="en-GB" />' );
							$doc->addCustomTag( '<link href="'.JURI::base().''.$current_url.'" rel="alternate" hreflang="x-default" />' );
						}else{
							$searchmenutype = 'uk-menu';
							$doc->addCustomTag( '<link href="'.JURI::base().''.$current_url.'" rel="alternate" hreflang="en-US" />' );
							if (strpos($current_url, 'about-us/') !== false) {
			                    $doc->addCustomTag( '<link href="'.JURI::base().'about-us/'.str_replace('about-','',str_replace('us/','',implode('/',$arrURL))).'/'.$sisterpage.'" rel="alternate" hreflang="en-GB" />' );
							    $doc->addCustomTag( '<link href="'.JURI::base().'about-us/'.str_replace('about-','',str_replace('us/','',implode('/',$arrURL))).'/'.$sisterpage.'" rel="alternate" hreflang="x-default" />' );
							}else{
								$doc->addCustomTag( '<link href="'.JURI::base().''.str_replace('us/','',implode('/',$arrURL)).'/'.$sisterpage.'" rel="alternate" hreflang="en-GB" />' );
								$doc->addCustomTag( '<link href="'.JURI::base().''.str_replace('us/','',implode('/',$arrURL)).'/'.$sisterpage.'" rel="alternate" hreflang="x-default" />' );
							}
						}
					}else{
					    
					    if($lang == 'en-GB'){
							$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="alternate" hreflang="en-GB" />' );
							$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="alternate" hreflang="x-default" />' );
						}else{
    						//=================================
    						//30-10-2020 now found that we need to check if this item is part of the investors section which does not have a US version so if it is we must 301 back to the UK version of this page
    				    	//=================================
    				    	if($appid == 5 || $appid == 15){
				                //die('redirect to ' .''.str_replace('/us/','/',JURI::base().$this->curPageURL()));
				                header("HTTP/1.1 301 Moved Permanently");
                                header("Location: ".str_replace('/us/','/',JURI::base().$this->curPageURL()));
                                exit;
				            }
				            //=================================
				        	$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="alternate" hreflang="en-US" />' );
							$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="alternate" hreflang="x-default" />' );
						}
					}
					//=======================================
					//24-06-21 item here to catch any zoo item pages that are not in the right menu alias
					//=======================================
					if($zoo_id){
				    	$db = JFactory::getDbo();
				        $query = $db->getQuery(true);
				        $query = 'SELECT application_id FROM #__zoo_item WHERE id = '.$db->quote($zoo_id).' LIMIT 0,1;';
					    $db->setQuery($query);
					    $appid = $db->loadResult();

			            if($appid && $appid != $params->get('application')){
			            	//get the correct news page for this article
			            	$db = JFactory::getDbo();
							$query = $db->getQuery(true);
							$query
								->select('path,language')
								->from('#__menu')
								->where('link like \'%zoo%\'')
								->where('params like \'%"application":"'.$appid.'"%\'');

							$db->setQuery($query);
							$objMenuItem = $db->loadObject();
							$path = $objMenuItem->path;
							if($path){
				                $current_url = $this->curPageURL();
					            $arrURL = explode('/', $current_url);
					            $alias = array_pop($arrURL);
					            if($objMenuItem->language == 'en-US'){
					            	$path = 'us/'.$path;
					            }
					            header("HTTP/1.1 301 Moved Permanently");
		                        header("Location: ".JURI::base().$path.'/item/'.$alias);
		                        exit;
		                    }
			            }
		            }
		            //=======================================
					
					
    				

				}
			    
			    return true;
			}
			
			

			
		    /////============================



			//EVERYTHING ELSE
			
	        if(!$active->params){

	            return false;

	        }
	        
	        $sibling_mymenuitem = $active->params->get('sibling_mymenuitem');
			
			if($sibling_mymenuitem){
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);

				$query
					->select('path')
					->from('#__menu')
					->where('id = ' . $db->quote($sibling_mymenuitem));

				$db->setQuery($query);
				//echo $query;
				$sisterpage = $db->loadResult();
				if($sisterpage){
					$doc = JFactory::getDocument();
					if($lang == 'en-GB'){
						$searchmenutype = 'us';
						//swap any americanisms
						$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$sisterpage.'" rel="alternate" hreflang="en-US" />' );
						$doc->addCustomTag( '<link href="'.JURI::base().''.$route.'" rel="alternate" hreflang="en-GB" />' );
						if($route != 'homepage-uk' && $route != 'us-homepage'){
							$doc->addCustomTag( '<link href="'.JURI::base().$route.'" rel="alternate" hreflang="x-default" />' );
						}
					}else{
						$searchmenutype = 'uk-menu';
						$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$route.'" rel="alternate" hreflang="en-US" />' );
						$doc->addCustomTag( '<link href="'.JURI::base().''.$sisterpage.'" rel="alternate" hreflang="en-GB" />' );
						if($route != 'homepage-uk' && $route != 'us-homepage'){
							$doc->addCustomTag( '<link href="'.JURI::base().$sisterpage.'" rel="alternate" hreflang="x-default" />' );
						}
					}
					$current_url = $_SERVER[REQUEST_URI];
					$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="canonical" />' );
				}
    			
			}else{


				//=============================================================
				//if no sibling menu items have been assigned in the admin, then fall back to looking for a matching route in the oposite menu
				//=============================================================

				$arrRoute = explode('-',$route);
				$arrUK = array('centre','fibre','litre','theatre','theatre','colour','flavour','humour','labour','neighbour','apologise','organise','recognise','analyse','travelled','travelling','fuelled','fuelling','manoeuvre','defence','licence','offence','analog','catalog','dialog');
				$arrUS = array('center','fiber','liter','theate','theatre','color','flavor','humor','labor','neighbor','apologize','organize','recognize','analyze','traveled','traveling','fueled','fueling','maneuver','defense','license','offense','analogue','catalogu','dialogue');

				if($lang == 'en-GB'){
					$searchmenutype = 'us';
					//swap any americanisms
					$arrRoute = str_replace($arrUK, $arrUS, $arrRoute);
				}else{
					$searchmenutype = 'uk-menu';
					$usfolder = 'us/';
					//swap any americanisms
					$arrRoute = str_replace($arrUS, $arrUK, $arrRoute);
				}

				$search_rotue = implode('-',$arrRoute);
				// echo $rotue;
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);

				$query
					->select('id')
					->from('#__menu')
					->where('path = ' . $db->quote($search_rotue))
					->where('menutype = ' . $db->quote($searchmenutype))				
					->where('published = 1');

				$db->setQuery($query);
				//echo $query;
				$sisterpage = $db->loadResult();
				$doc = JFactory::getDocument();
				//echo '<!--'.$route.'-->';
				if($route == 'homepage-uk' || $route == 'us-homepage'){
					$doc->addCustomTag( '<link href="'.JURI::base().'us" rel="alternate" hreflang="en-US" />' );
					$doc->addCustomTag( '<link href="'.JURI::base().'" rel="alternate" hreflang="en-GB" />' );
					$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="canonical" />' );
					return true;
				}
				if($sisterpage){
					if($lang == 'en-GB'){
    					$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$search_rotue.'" rel="alternate" hreflang="en-US" />' );
    					$doc->addCustomTag( '<link href="'.JURI::base().''.$route.'" rel="alternate" hreflang="en-GB" />' );
    					$doc->addCustomTag( '<link href="'.JURI::base().''.$route.'" rel="alternate" hreflang="x-default" />' );
					}else{
					    $doc->addCustomTag( '<link href="'.JURI::base().'us/'.$route.'" rel="alternate" hreflang="en-US" />' );
					    $doc->addCustomTag( '<link href="'.JURI::base().''.$search_rotue.'" rel="alternate" hreflang="en-GB" />' );
					    $doc->addCustomTag( '<link href="'.JURI::base().''.$search_rotue.'" rel="alternate" hreflang="x-default" />' );
					}
				}else{
				    if($lang == 'en-GB'){
    					$doc->addCustomTag( '<link href="'.JURI::base().''.$route.'" rel="alternate" hreflang="en-GB" />' );
    					$doc->addCustomTag( '<link href="'.JURI::base().''.$route.'" rel="alternate" hreflang="x-default" />' );
    				}else{
    					$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$route.'" rel="alternate" hreflang="en-US" />' );
    					$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$route.'" rel="alternate" hreflang="x-default" />' );
    				}
				}
				$current_url = $_SERVER[REQUEST_URI];
				$doc->addCustomTag( '<link href="'.JURI::base().''.$this->curPageURL().'" rel="canonical" />' );
				//=============================================================
			}
			return true;
        }
	}
	function OnAfterRender(){
        $strClass = ' no-webp ';
        if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) == true ) {
          $strClass = ' webp ';
        }
        $documentbody = JResponse::getBody();
        $documentbody = str_replace ('<body class="', '<body class="' .$strClass, $documentbody);
        JResponse::setBody($documentbody);

    }	

}
