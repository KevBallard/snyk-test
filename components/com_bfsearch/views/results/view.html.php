<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Bfsearch
 * @author     Shaun Dobie <shaun@bluefrontier.co.uk>
 * @copyright  2019 Shaun Dobie
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;

/**
 * View class for a list of Bfsearch.
 *
 * @since  1.6
 */
class BfsearchViewResults extends \Joomla\CMS\MVC\View\HtmlView
{
	protected $items;
	protected $pagination;
	protected $state;
	protected $params;

	/**
	 * Display the view
	 *
	 * @param   string  $tpl  Template name
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function display($tpl = null)
	{
		$app = Factory::getApplication();

		$this->state = $this->get('State');
		$this->params = $app->getParams('com_bfsearch');
		
		
		if($_REQUEST["searchterm"] != "") {
		
			//Matched Articles
			$SearchArticles = $this->get('SearchArticles');
			foreach($SearchArticles as $links) {
				//echo "<p><b>" . $links["menutype"] . "</b> : " . $links["id"] . " - " . $links["title"] . " - " . $links["language"] . "</p>";
				if( $links["menutype"] == "uk-menu" ) { 
					$ukItems[$links["id"]]["id"] = $links["id"];
					$ukItems[$links["id"]]["title"] = $links["title"];
					$ukItems[$links["id"]]["language"] = $links["language"];
					$ukItems[$links["id"]]["description"] = $links["introtext"];
					$ukItems[$links["id"]]["link"] = JURI::root() . $links["path"];
					$ukItems[$links["id"]]["matchcount"] = $links["matchcount"];
					
				}
				if( $links["menutype"] == "us" ) { 
					$usItems[$links["id"]]["id"] = $links["id"];
					$usItems[$links["id"]]["title"] = $links["title"];
					$usItems[$links["id"]]["language"] = $links["language"];
					$usItems[$links["id"]]["description"] = $links["introtext"];
					$usItems[$links["id"]]["link"] = JURI::root() . "us/" . $links["path"];
					$usItems[$links["id"]]["matchcount"] = $links["matchcount"];
				}
				if( $links["menutype"] == "investorsmenu" ) { 
					$investorItems[$links["id"]]["id"] = $links["id"];
					$investorItems[$links["id"]]["title"] = $links["title"];
					$investorItems[$links["id"]]["language"] = $links["language"];
					$investorItems[$links["id"]]["description"] = $links["introtext"];
					$investorItems[$links["id"]]["link"] = JURI::root() . $links["path"];
					$investorItems[$links["id"]]["matchcount"] = $links["matchcount"];
				}
				
				/*
				if( $links["menutype"] == "hidden-menu" ) { 
					if( $links["language"] == "en-GB" ) { 
						$ukItems[$links["id"]]["id"] = $links["id"];
						$ukItems[$links["id"]]["title"] = $links["title"];
						$ukItems[$links["id"]]["language"] = $links["language"];
						$ukItems[$links["id"]]["description"] = $links["introtext"];	
					} else {
						$usItems[$links["id"]]["id"] = $links["id"];
						$usItems[$links["id"]]["title"] = $links["title"];
						$usItems[$links["id"]]["language"] = $links["language"];
						$usItems[$links["id"]]["description"] = $links["introtext"];
					}
				}
				*/
			}


			//Matched Level2or3
			$SearchLevel2or3 = $this->get('SearchLevel2or3');
			foreach($SearchLevel2or3 as $links) {
				//echo "<p><b>" . $links["menutype"] . "</b> : " . $links["id"] . " - " . $links["title"] . " - " . $links["language"] . "</p>";
				if( $links["menutype"] == "uk-menu" ) { 
					$ukItems["" . $links["id"]]["id"] = $links["id"];
					$ukItems["" . $links["id"]]["title"] = $links["title"];
					$ukItems["" . $links["id"]]["language"] = $links["language"];
					$ukItems["" . $links["id"]]["description"] = $links["introparagraph"];
					$ukItems["" . $links["id"]]["link"] = JURI::root() . $links["path"];
					$ukItems["" . $links["id"]]["matchcount"] = $links["matchcount"];
				}
				if( $links["menutype"] == "us" ) { 
					$usItems["" . $links["id"]]["id"] = $links["id"];
					$usItems["" . $links["id"]]["title"] = $links["title"];
					$usItems["" . $links["id"]]["language"] = $links["language"];
					$usItems["" . $links["id"]]["description"] = $links["introparagraph"];
					$usItems["" . $links["id"]]["link"] = JURI::root() . "us/" . $links["path"];
					$usItems["" . $links["id"]]["matchcount"] = $links["matchcount"];
				}
				if( $links["menutype"] == "investorsmenu" ) { 
					$investorItems["" . $links["id"]]["id"] = $links["id"];
					$investorItems["" . $links["id"]]["title"] = $links["title"];
					$investorItems["" . $links["id"]]["language"] = $links["language"];
					$investorItems["" . $links["id"]]["description"] = $links["introparagraph"];
					$investorItems["" . $links["id"]]["link"] = JURI::root() . $links["path"];
					$investorItems["" . $links["id"]]["matchcount"] = $links["matchcount"];
				}
			}


			//Matched Level2Plus
			$SearchLevel2Plus = $this->get('SearchLevel2Plus');
			foreach($SearchLevel2Plus as $links) {
				//echo "<p><b>" . $links["menutype"] . "</b> : " . $links["id"] . " - " . $links["title"] . " - " . $links["language"] . "</p>";
				if( $links["menutype"] == "uk-menu" ) { 
					$ukItems["ML2P" . $links["id"]]["id"] = $links["id"];
					$ukItems["ML2P" . $links["id"]]["title"] = $links["title"];
					$ukItems["ML2P" . $links["id"]]["language"] = $links["language"];
					$ukItems["ML2P" . $links["id"]]["description"] = $links["introparagraph"];
					$ukItems["ML2P" . $links["id"]]["link"] = JURI::root() . $links["path"];
					$ukItems["ML2P" . $links["id"]]["matchcount"] = $links["matchcount"];
				}
				if( $links["menutype"] == "us" ) { 
					$usItems["ML2P" . $links["id"]]["id"] = $links["id"];
					$usItems["ML2P" . $links["id"]]["title"] = $links["title"];
					$usItems["ML2P" . $links["id"]]["language"] = $links["language"];
					$usItems["ML2P" . $links["id"]]["description"] = $links["introparagraph"];
					$usItems["ML2P" . $links["id"]]["link"] = JURI::root() . "us/" . $links["path"];
					$usItems["ML2P" . $links["id"]]["matchcount"] = $links["matchcount"];
				}
				if( $links["menutype"] == "investorsmenu" ) { 
					$investorItems["ML2P" . $links["id"]]["id"] = $links["id"];
					$investorItems["ML2P" . $links["id"]]["title"] = $links["title"];
					$investorItems["ML2P" . $links["id"]]["language"] = $links["language"];
					$investorItems["ML2P" . $links["id"]]["description"] = $links["introparagraph"];
					$investorItems["ML2P" . $links["id"]]["link"] = JURI::root() . $links["path"];
					$investorItems["ML2P" . $links["id"]]["matchcount"] = $links["matchcount"];
				}
			}


			//Docman
			$SearchDocman = $this->get('SearchDocman');
			foreach($SearchDocman as $links) {
				
				if($links["catslug"] == "product-guides-us"){
					$path = "product-guides-us/";
				} else { 				
					if($links["parentslug"] == "product-guides-us"){
						$path = "product-guides-us/" . $links["catslug"] . "/";
					} elseif($links["parentslug"] == ""){
						$path = $links["catslug"] . "/";
					} else { 
						$path = "product-guides/" . $links["catslug"] . "/";
					}
				}
				
				$docs[$links["docman_document_id"]]["docman_document_id"] = $links["docman_document_id"];
				$docs[$links["docman_document_id"]]["title"] = $links["title"];
				$docs[$links["docman_document_id"]]["link"] = JURI::root() . $path . $links["docman_document_id"] . "-" . $links["slug"];
				$docs[$links["docman_document_id"]]["description"] = $links["description"];
				$docs[$links["docman_document_id"]]["matchcount"] = $links["matchcount"];
			}


			//Zoo
			$SearchZoo = $this->get('SearchZoo');
			foreach($SearchZoo as $links) {
				
				$jsondesc = json_decode($links["elements"], true);
				$jsondesc = $jsondesc["2e3c9e69-1f9e-4647-8d13-4e88094d2790"]["0"]["value"];
				
				if($links["application_id"] == "1") { $pagelink = "resources/blog/item/"; }
				if($links["application_id"] == "2") { $pagelink = "resources/news/item/"; }
				if($links["application_id"] == "3") { $pagelink = "careers/item/"; }
				if($links["application_id"] == "4") { $pagelink = "about-us/case-studies/item/"; }
				//if($links["application_id"] == "5") { $pagelink = "resources/news/item/"; }
				if($links["application_id"] == "5") { $pagelink = "investors/announcements/item/"; }
				if($links["application_id"] == "6") { $pagelink = "resources/events/item/"; }
				if($links["application_id"] == "7") { $pagelink = "resources/videos-and-demos/item/"; }
				if($links["application_id"] == "9") { $pagelink = "us/resources/events/item/"; }
				if($links["application_id"] == "10") { $pagelink = "us/careers/item/"; }
				if($links["application_id"] == "11") { $pagelink = "us/about-us/case-studies/item/"; }
				if($links["application_id"] == "12") { $pagelink = "us/resources/blog/item/"; }
				if($links["application_id"] == "13") { $pagelink = "us/resources/news/item/"; }
				if($links["application_id"] == "14") { $pagelink = "us/resources/videos-and-demos/item/"; }
				
				
				
				
				//US
				if( ($links["application_id"] == "9") ||
					($links["application_id"] == "10") ||
					($links["application_id"] == "11") ||
					($links["application_id"] == "12") ||
					($links["application_id"] == "13") ||
					($links["application_id"] == "14")
				) { 
					$usItems["ZOO" . $links["id"]]["matchcount"] = $links["matchcount"];
					$usItems["ZOO" . $links["id"]]["id"] = $links["id"];
					$usItems["ZOO" . $links["id"]]["title"] = $links["name"];
					$usItems["ZOO" . $links["id"]]["language"] = "";
					$usItems["ZOO" . $links["id"]]["description"] = $jsondesc;
					if( ($links["application_id"] == "14") || ($links["application_id"] == "7")) {
						$usItems["ZOO" . $links["id"]]["link"] = JURI::root() . "resources/videos-demos";
					} else {
						$usItems["ZOO" . $links["id"]]["link"] = JURI::root() . $pagelink . $links["alias"];
					}
				} elseif($links["application_id"] == "5") {
					$investorItems["ZOO" . $links["id"]]["id"] = $links["id"];
					$investorItems["ZOO" . $links["id"]]["matchcount"] = $links["matchcount"];
					$investorItems["ZOO" . $links["id"]]["title"] = $links["name"];
					$investorItems["ZOO" . $links["id"]]["language"] = "";
					$investorItems["ZOO" . $links["id"]]["description"] = $jsondesc;
					if( ($links["application_id"] == "14") || ($links["application_id"] == "7")) {
						$investorItems["ZOO" . $links["id"]]["link"] = JURI::root() . "resources/videos-demos";
					} else {
						$investorItems["ZOO" . $links["id"]]["link"] = JURI::root() . $pagelink . $links["alias"];
					}
				} else {
					$ukItems["ZOO" . $links["id"]]["id"] = $links["id"];
					$ukItems["ZOO" . $links["id"]]["matchcount"] = $links["matchcount"];
					$ukItems["ZOO" . $links["id"]]["title"] = $links["name"];
					$ukItems["ZOO" . $links["id"]]["language"] = "";
					$ukItems["ZOO" . $links["id"]]["description"] = $jsondesc;
					if( ($links["application_id"] == "14") || ($links["application_id"] == "7")) {
						$ukItems["ZOO" . $links["id"]]["link"] = JURI::root() . "resources/videos-demos";
					} else {
						$ukItems["ZOO" . $links["id"]]["link"] = JURI::root() . $pagelink . $links["alias"];
					}
					
				}
				
				
				
				
				
				
				
			}
		
		}
		
		
		$this->assignRef( 'usItems', $usItems );	
		$this->assignRef( 'investorItems', $investorItems );	
		$this->assignRef( 'ukItems', $ukItems );	
		$this->assignRef( 'docs', $docs );	
		
		
		
		
		
		

		$this->_prepareDocument();
		parent::display($tpl);
	}
	
	
	
	
	
	

	/**
	 * Prepares the document
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	protected function _prepareDocument()
	{
		$app   = Factory::getApplication();
		$menus = $app->getMenu();
		$title = null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();

		if ($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		}
		else
		{
			$this->params->def('page_heading', Text::_('COM_BFSEARCH_DEFAULT_PAGE_TITLE'));
		}

		$title = $this->params->get('page_title', '');

		if (empty($title))
		{
			$title = $app->get('sitename');
		}
		elseif ($app->get('sitename_pagetitles', 0) == 1)
		{
			$title = Text::sprintf('JPAGETITLE', $app->get('sitename'), $title);
		}
		elseif ($app->get('sitename_pagetitles', 0) == 2)
		{
			$title = Text::sprintf('JPAGETITLE', $title, $app->get('sitename'));
		}

		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}

	/**
	 * Check if state is set
	 *
	 * @param   mixed  $state  State
	 *
	 * @return bool
	 */
	public function getState($state)
	{
		return isset($this->state->{$state}) ? $this->state->{$state} : false;
	}
}
