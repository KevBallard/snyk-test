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
 * View class for a list of Seo_glossary.
 *
 * @since  1.6
 */
class Seo_glossaryViewGlossaryterms extends \Joomla\CMS\MVC\View\HtmlView
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
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->params = $app->getParams('com_seo_glossary');
		$this->filterForm = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
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
		$route	= $active->route;
		$sibling_mymenuitem = $active->params->get('sibling_mymenuitem');
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

		if(strtolower($lang) == 'en-gb'){
			$doc->addCustomTag( '<link href="'.JURI::base().''.$route.'" rel="canonical" />' );
			$doc->addCustomTag( '<link href="'.JURI::base().''.$route.'" rel="alternate" hreflang="x-default" />' );
			if($sisterpage){
				$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$sisterpage.'" rel="alternate" hreflang="en-US" />' );
			}
		}else{
			$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$route.'" rel="canonical" />' );
			$doc->addCustomTag( '<link href="'.JURI::base().'us/'.$route.'" rel="alternate" hreflang="x-default" />' );
			if($sisterpage){
				$doc->addCustomTag( '<link href="'.JURI::base().''.$sisterpage.'" rel="alternate" hreflang="en-UK" />' );
			}
		}
		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();

		if ($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		}
		else
		{
			$this->params->def('page_heading', Text::_('COM_SEO_GLOSSARY_DEFAULT_PAGE_TITLE'));
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
