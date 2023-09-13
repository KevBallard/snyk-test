<?php

/**
 * @version     CVS: 1.0.0
 * @package     com_seo_glossary
 * @subpackage  mod_seo_glossary
 * @author      Kevin Ballard <kevin@bluefrontier.co.uk>
 * @copyright   2020 Blue Frontier IT Ltd
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Helper\ModuleHelper;

// Include the syndicate functions only once
JLoader::register('ModSeo_glossaryHelper', dirname(__FILE__) . '/helper.php');

$doc = Factory::getDocument();

/* */
$doc->addStyleSheet(URI::base() . 'media/mod_seo_glossary/css/style.css');

/* */
$doc->addScript(URI::base() . 'media/mod_seo_glossary/js/script.js');

require ModuleHelper::getLayoutPath('mod_seo_glossary', $params->get('content_type', 'blank'));
