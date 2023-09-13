<?php
/**
 * @version    CVS: 1.0.1
 * @package    Com_Eckoh
 * @author     RJ <web@bluefrontier.co.uk>
 * @copyright  2019 Eckoh
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_eckoh'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Eckoh', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('EckohHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'eckoh.php');

$controller = JControllerLegacy::getInstance('Eckoh');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
