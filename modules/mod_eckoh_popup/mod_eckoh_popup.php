<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_eckoh_popup
 */

defined('_JEXEC') or die;

JHtml::_('jquery.framework');
$document = JFactory::getDocument();
$document->addScript(JURI::root(true) . '/modules/mod_eckoh_popup/assets/js/behaviours.js');
$document->addStyleSheet(JURI::root(true) . '/modules/mod_eckoh_popup/assets/css/style.css');

require JModuleHelper::getLayoutPath('mod_eckoh_popup', $params->get('layout', 'default'));
