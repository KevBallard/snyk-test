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

use \Joomla\CMS\MVC\Controller\BaseController;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;

// Access check.
if (!Factory::getUser()->authorise('core.manage', 'com_seo_glossary'))
{
	throw new Exception(Text::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Seo_glossary', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('Seo_glossaryHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'seo_glossary.php');

$controller = BaseController::getInstance('Seo_glossary');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
