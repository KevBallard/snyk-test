<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Eckohpages
 * @author     RJ <rob@bluefrontier.co.uk>
 * @copyright  2020 Eckoh
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use \Joomla\CMS\Factory;
use \Joomla\CMS\MVC\Controller\BaseController;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Eckohpages', JPATH_COMPONENT);
JLoader::register('EckohpagesController', JPATH_COMPONENT . '/controller.php');

//added by KB to stop old URLs returning 500 error.
$app  = Factory::getApplication();
$view = $app->input->getCmd('view', 'products');
if($view != 'product' && $view != 'products'){
    JError::raiseError(404, JText::_("Page Not Found"));
}
// Execute the task.
$controller = BaseController::getInstance('Eckohpages');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
