<?php 
/**
*@package Joomla.site
*@subpackage mod_sessionPopup
*/

defined('_JEXEC') or die;


$document = JFactory::getDocument();
//add the javascript file                 
$document->addScript(Juri::root(true) . '/modules/mod_sessionPopup/assets/js/behaviours.js');

//add the css file 
$document->addStyleSheet(JURI::root(true) . '/modules/mod_sessionPopup/assets/css/styles.css');

$document->addScriptDeclaration('var base = \''.JURI::base().'\'');

require JModuleHelper::getLayoutPath('mod_sessionPopup', $params->get('layout', 'default'));