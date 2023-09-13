<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Seo_glossary
 * @author     Kevin Ballard <kevin@bluefrontier.co.uk>
 * @copyright  2020 Blue Frontier IT Ltd
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;

/**
 * View to edit
 *
 * @since  1.6
 */
class Seo_glossaryViewGlossaryterm extends \Joomla\CMS\MVC\View\HtmlView
{
	protected $state;

	protected $item;

	protected $form;

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
		$app  = Factory::getApplication();
		$user = Factory::getUser();

		$this->state  = $this->get('State');
		$this->item   = $this->get('Item');
		$this->params = $app->getParams('com_seo_glossary');

		if (!empty($this->item))
		{
			
		}

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
		}

		

		if ($this->_layout == 'edit')
		{
			$authorised = $user->authorise('core.create', 'com_seo_glossary');

			if ($authorised !== true)
			{
				throw new Exception(Text::_('JERROR_ALERTNOAUTHOR'));
			}
		}

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

		$lang = JFactory::getLanguage();
		$lang = $lang->getTag();
		$doc = JFactory::getDocument();
		
		$menu	= $app->getMenu();
		$active	= $menu->getActive();

		$parentId = $active->tree[0];
		$parentName = $menu->getItem($parentId)->title;
		$parentlink = $menu->getItem($parentId)->alias;
		//$app->getMenu()->getActive()->id;
		$sibling_mymenuitem = $menu->getActive()->params->get('sibling_mymenuitem');

		$route	= $active->route;
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query
			->select('path')
			->from('#__menu')
			->where('id = ' . $db->quote($sibling_mymenuitem))
			->where('published = 1');
		$db->setQuery($query);
		//echo $query;
		$sisterpage = $db->loadResult();
		$arrLanguages = explode(',', $this->item->languages);

		if(strtolower($lang) == 'en-gb'){
			$doc->addCustomTag( '<link href="'.JURI::base().''.$route.'/'.$this->item->alias.'" rel="canonical" />' );
			$doc->addCustomTag( '<link href="'.JURI::base().''.$route.'/'.$this->item->alias.'" rel="alternate" hreflang="x-default" />' );
			if($sisterpage && in_array('en-US', $arrLanguages)){
				$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$sisterpage.'/'.$this->item->alias.'" rel="alternate" hreflang="en-us" />' );
				$doc->addCustomTag( '<link href="'.JURI::base().''.$route.'/'.$this->item->alias.'" rel="alternate" hreflang="en-gb" />' );
			}
		}else{
			$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$route.'/'.$this->item->alias.'" rel="canonical" />' );
			$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$route.'/'.$this->item->alias.'" rel="alternate" hreflang="en-us" />' );
			if($sisterpage && in_array('en-GB', $arrLanguages)){
				$doc->addCustomTag( '<link href="'.JURI::base().''.$route.'/'.$this->item->alias.'" rel="alternate" hreflang="x-default" />' );
				$doc->addCustomTag( '<link href="'.JURI::base().''.$sisterpage.'/'.$this->item->alias.'" rel="alternate" hreflang="en-gb" />' );
			}else{
				$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$route.'/'.$this->item->alias.'" rel="alternate" hreflang="x-default" />' );
			}
		}
		
		// Because the application sets a default page title,
		// We need to get it from the menu item itself
		$menu = $menus->getActive();

		if ($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		}
		else
		{
			$this->params->def('page_heading', Text::_('COM_SEO_GLOSSARY_DEFAULT_PAGE_TITLE'));
		}

		$title = $this->item->metatitle;

		if (empty($title))
		{
			$title = $this->item->term . ' | ' . 'Glossary' . ' | ' . $app->get('sitename');
		}
		elseif ($app->get('sitename_pagetitles', 0) == 1)
		{
			$title = Text::sprintf('JPAGETITLE', $app->get('sitename'), $title);
		}
		elseif ($app->get('sitename_pagetitles', 0) == 2)
		{
			$title = Text::sprintf('JPAGETITLE', $title, $app->get('sitename'));
		}
		if(strtolower($lang) == 'en-gb'){
			
		}else{
			$title = $title . ' US' ;
		}

		$this->document->setTitle($title);


		if($this->item->metadescription){
			$this->document->setDescription($this->item->metadescription);
		}else{
			$this->document->setDescription(substr(strip_tags($this->item->definition), 0,160));
		}
		if($this->item->metakeywords){
			$this->document->setMetadata('keywords', $this->item->metakeywords);
		}else{
			if ($this->params->get('menu-meta_keywords'))
			{
				$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
			}
		}
		// if ($this->params->get('menu-meta_description'))
		// {
		// 	$this->document->setDescription($this->params->get('menu-meta_description'));
		// }
		
		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}
}
