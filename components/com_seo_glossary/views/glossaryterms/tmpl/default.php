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
$lang = JFactory::getLanguage();
$lang = $lang->getTag();

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Language\Text;
use \Joomla\CMS\Layout\LayoutHelper;

HTMLHelper::addIncludePath(JPATH_COMPONENT . '/helpers/html');


$alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
//var_dump($this->items);



$arrOutputs = array();
foreach ($alphabet as $key => $value) {
	foreach ($this->items as $key => $term) {
			if($term->term[0] == $value){
				$arrOutputs[$value][] = $term;
			}
		}	
}


if ($this->params->get('show_page_heading')) : ?>
<div class="page-header">
	<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
</div>
<?php
endif; 


echo '<div class="glossary">';
foreach ($arrOutputs as $key => $values) {
	echo '<a class="glossary_letter" href="#glossary_'.$key.'">'.$key.'</a>';
}
foreach ($arrOutputs as $key => $values) {
	echo '<h2 id="glossary_'.$key.'">'.$key.'</h2>';
	foreach ($values as $term) {
		echo '<div class="glossary_row">';
		echo '<h3><a href="'.JRoute::_('index.php?option=com_seo_glossary&view=glossaryterm&id='.(int) $term->id).'">'.$term->term.'</a></h3>';
		if(strtolower($lang) == 'en-gb'){
		    echo '<div class="definition">'.$term->intro.'</div>';
		}else{
		    echo '<div class="definition">'.$term->us_intro.'</div>';
		}
		
		echo '</div>';
	}
}
echo '</div>';
?>
<style type="text/css">
	.glossary {margin-top:30px;}
	.glossary h3 {display:inline-block;font-size:1rem;margin:5px 0;}
	.glossary .definition {display:inline-block;font-size:1rem;margin-left: 10px}
	.glossary .glossary_letter{ border-right: 1px solid #999;padding-right: 10px;padding-left: 10px;}
</style>











