<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Eckohpages
 * @author     RJ <rob@bluefrontier.co.uk>
 * @copyright  2020 Eckoh
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
 * Class EckohpagesRouter
 *
 */
class EckohpagesRouter extends RouterView
{
	private $noIDs;
	public function __construct($app = null, $menu = null)
	{
		$params = Factory::getApplication()->getParams('com_eckohpages');
		$this->noIDs = (bool) $params->get('sef_ids');
		
		$products = new RouterViewConfiguration('products');
		$this->registerView($products);
			$product = new RouterViewConfiguration('product');
			$product->setKey('id')->setParent($products);
			$this->registerView($product);

		parent::__construct($app, $menu);

		$this->attachRule(new MenuRules($this));

		if ($params->get('sef_advanced', 0))
		{
			$this->attachRule(new StandardRules($this));
			$this->attachRule(new NomenuRules($this));
		}
		else
		{
			JLoader::register('EckohpagesRulesLegacy', __DIR__ . '/helpers/legacyrouter.php');
			JLoader::register('EckohpagesHelpersEckohpages', __DIR__ . '/helpers/eckohpages.php');
			$this->attachRule(new EckohpagesRulesLegacy($this));
		}
	}


	
		/**
		 * Method to get the segment(s) for an product
		 *
		 * @param   string  $id     ID of the product to retrieve the segments for
		 * @param   array   $query  The request that is built right now
		 *
		 * @return  array|string  The segments of this item
		 */
		public function getProductSegment($id, $query)
		{
			return array((int) $id => $id);
		}

	
		/**
		 * Method to get the segment(s) for an product
		 *
		 * @param   string  $segment  Segment of the product to retrieve the ID for
		 * @param   array   $query    The request that is parsed right now
		 *
		 * @return  mixed   The id of this item or false
		 */
		public function getProductId($segment, $query)
		{
			return (int) $segment;
		}
}
