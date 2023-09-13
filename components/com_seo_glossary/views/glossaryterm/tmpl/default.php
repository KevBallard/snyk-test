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

?>
<div class="glossaryback">
	<a href="<?php echo JRoute::_('index.php?option=com_seo_glossary&view=glossaryterms');?>">Return to glossary index</a>
</div>
<div class="glossaryterm">
	<h1><?php echo $this->item->term; ?></h1>
	<?php 
	if(strtolower($lang) == 'en-gb'){
	    echo JHtml::_('content.prepare',$this->item->definition); 
	}else{
	   echo JHtml::_('content.prepare',$this->item->us_definition);
	}
	?>
</div>

