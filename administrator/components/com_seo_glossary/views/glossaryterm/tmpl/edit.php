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

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Language\Text;


HTMLHelper::addIncludePath(JPATH_COMPONENT . '/helpers/html');
HTMLHelper::_('behavior.tooltip');
HTMLHelper::_('behavior.formvalidation');
HTMLHelper::_('formbehavior.chosen', 'select');
HTMLHelper::_('behavior.keepalive');

// Import CSS
$document = Factory::getDocument();
$document->addStyleSheet(Uri::root() . 'media/com_seo_glossary/css/form.css');
?>
<script type="text/javascript">
	js = jQuery.noConflict();
	js(document).ready(function () {
		
	});

	Joomla.submitbutton = function (task) {
		if (task == 'glossaryterm.cancel') {
			Joomla.submitform(task, document.getElementById('glossaryterm-form'));
		}
		else {
			
			if (task != 'glossaryterm.cancel' && document.formvalidator.isValid(document.id('glossaryterm-form'))) {
				
				Joomla.submitform(task, document.getElementById('glossaryterm-form'));
			}
			else {
				alert('<?php echo $this->escape(Text::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_seo_glossary&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="glossaryterm-form" class="form-validate form-horizontal">

	
	<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'glossaryterm')); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'glossaryterm', JText::_('COM_SEO_GLOSSARY_TAB_GLOSSARYTERM', true)); ?>
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_SEO_GLOSSARY_FIELDSET_GLOSSARYTERM'); ?></legend>
				<?php echo $this->form->renderField('term'); ?>
				<?php echo $this->form->renderField('intro'); ?>
				<?php echo $this->form->renderField('us_intro'); ?>
				<?php echo $this->form->renderField('definition'); ?>
				<?php echo $this->form->renderField('us_definition'); ?>
				<?php echo $this->form->renderField('languages'); ?>
			</fieldset>
		</div>
	</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'MetaData', JText::_('COM_SEO_GLOSSARY_TAB_METADATA', true)); ?>
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_SEO_GLOSSARY_FIELDSET_METADATA'); ?></legend>
				<?php echo $this->form->renderField('alias'); ?>
				<?php echo $this->form->renderField('metatitle'); ?>
				<?php echo $this->form->renderField('metakeywords'); ?>
				<?php echo $this->form->renderField('metadescription'); ?>
				<?php if ($this->state->params->get('save_history', 1)) : ?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('version_note'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('version_note'); ?></div>
					</div>
				<?php endif; ?>
			</fieldset>
		</div>
	</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
	<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />
	<?php echo $this->form->renderField('created_by'); ?>
	<?php echo $this->form->renderField('modified_by'); ?>

	
	<?php echo JHtml::_('bootstrap.endTabSet'); ?>

	<input type="hidden" name="task" value=""/>
	<?php echo JHtml::_('form.token'); ?>

</form>
