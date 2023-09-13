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

use \Joomla\CMS\MVC\Controller\BaseController;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;

// Access check.
if (!Factory::getUser()->authorise('core.manage', 'com_bfsearch'))
{
	throw new Exception(Text::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Bfsearch', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('BfsearchHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'bfsearch.php');

$controller = BaseController::getInstance('Bfsearch');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
