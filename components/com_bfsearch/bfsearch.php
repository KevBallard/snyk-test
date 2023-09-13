<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Bfsearch
 * @author     Shaun Dobie <shaun@bluefrontier.co.uk>
 * @copyright  2019 Shaun Dobie
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use \Joomla\CMS\Factory;
use \Joomla\CMS\MVC\Controller\BaseController;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Bfsearch', JPATH_COMPONENT);
JLoader::register('BfsearchController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = BaseController::getInstance('Bfsearch');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
