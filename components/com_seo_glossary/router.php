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

use Joomla\CMS\Component\Router\RouterViewConfiguration;
use Joomla\CMS\Component\Router\RouterView;
use Joomla\CMS\Component\Router\Rules\StandardRules;
use Joomla\CMS\Component\Router\Rules\NomenuRules;
use Joomla\CMS\Component\Router\Rules\MenuRules;
use Joomla\CMS\Factory;
use Joomla\CMS\Categories\Categories;

/**
 * Class Seo_glossaryRouter
 *
 */
class Seo_glossaryRouter extends RouterView
{
	private $noIDs;
	public function __construct($app = null, $menu = null)
	{
		$params = JComponentHelper::getComponent('com_seo_glossary')->params;
		$this->noIDs = (bool) $params->get('sef_ids');
		
		$glossaryterms = new RouterViewConfiguration('glossaryterms');
		$this->registerView($glossaryterms);
			$glossaryterm = new RouterViewConfiguration('glossaryterm');
			$glossaryterm->setKey('id')->setParent($glossaryterms);
			$this->registerView($glossaryterm);

		parent::__construct($app, $menu);

		$this->attachRule(new MenuRules($this));

		if ($params->get('sef_advanced', 0))
		{
			$this->attachRule(new StandardRules($this));
			$this->attachRule(new NomenuRules($this));
		}
		else
		{
			JLoader::register('Seo_glossaryRulesLegacy', __DIR__ . '/helpers/legacyrouter.php');
			JLoader::register('Seo_glossaryHelpersSeo_glossary', __DIR__ . '/helpers/seo_glossary.php');
			$this->attachRule(new Seo_glossaryRulesLegacy($this));
		}
	}


	
		/**
		 * Method to get the segment(s) for an glossaryterm
		 *
		 * @param   string  $id     ID of the glossaryterm to retrieve the segments for
		 * @param   array   $query  The request that is built right now
		 *
		 * @return  array|string  The segments of this item
		 */
		public function getGlossarytermSegment($id, $query)
		{
			if (!strpos($id, ':'))
			{
				$db = Factory::getDbo();
				$dbquery = $db->getQuery(true);
				$dbquery->select($dbquery->qn('alias'))
					->from($dbquery->qn('#__seo_glossary_terms'))
					->where('id = ' . $dbquery->q($id));
				$db->setQuery($dbquery);

				$id .= ':' . $db->loadResult();
			}

			if ($this->noIDs)
			{
				list($void, $segment) = explode(':', $id, 2);

				return array($void => $segment);
			}
			return array((int) $id => $id);
		}

	
		/**
		 * Method to get the segment(s) for an glossaryterm
		 *
		 * @param   string  $segment  Segment of the glossaryterm to retrieve the ID for
		 * @param   array   $query    The request that is parsed right now
		 *
		 * @return  mixed   The id of this item or false
		 */
		public function getGlossarytermId($segment, $query)
		{
			if ($this->noIDs)
			{
				$db = JFactory::getDbo();
				$dbquery = $db->getQuery(true);
				$dbquery->select($dbquery->qn('id'))
					->from($dbquery->qn('#__seo_glossary_terms'))
					->where('alias = ' . $dbquery->q($segment));
				$db->setQuery($dbquery);

				return (int) $db->loadResult();
			}
			return (int) $segment;
		}
}
