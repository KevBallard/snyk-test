<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Eckohpages
 * @author     RJ <rob@bluefrontier.co.uk>
 * @copyright  2020 Eckoh
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
$document->addStyleSheet(Uri::root() . 'media/com_eckohpages/css/form.css');
?>
<script type="text/javascript">
	js = jQuery.noConflict();
	js(document).ready(function () {
		
	});

	Joomla.submitbutton = function (task) {
		if (task == 'product.cancel') {
			Joomla.submitform(task, document.getElementById('product-form'));
		}
		else {
			
			if (task != 'product.cancel' && document.formvalidator.isValid(document.id('product-form'))) {
				
				Joomla.submitform(task, document.getElementById('product-form'));
			}
			else {
				alert('<?php echo $this->escape(Text::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_eckohpages&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="product-form" class="form-validate form-horizontal">

	
	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
	<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />
	<?php echo $this->form->renderField('created_by'); ?>
	<?php echo $this->form->renderField('modified_by'); ?>
	<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'product')); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'product', JText::_('COM_ECKOHPAGES_TAB_PRODUCT', true)); ?>
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_ECKOHPAGES_FIELDSET_PRODUCTINTRO'); ?></legend>
				<?php echo $this->form->renderField('productname'); ?>
				<?php echo $this->form->renderField('visibleproductname'); ?>
				<?php echo $this->form->renderField('subtitle'); ?>
				<?php echo $this->form->renderField('language'); ?>
				<?php echo $this->form->renderField('formtitle'); ?>
				<?php echo $this->form->renderField('formcode'); ?>
				<?php echo $this->form->renderField('formvideo'); ?>
				<?php echo $this->form->renderField('introparagraph'); ?>
			</fieldset>
		</div>
	</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'TextBoxes', JText::_('COM_ECKOHPAGES_TAB_TEXTBOXES', true)); ?>
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_ECKOHPAGES_FIELDSET_TEXTBOXES'); ?></legend>
				<?php echo $this->form->renderField('textboxes'); ?>
			</fieldset>
		</div>
	</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'Icons', JText::_('COM_ECKOHPAGES_TAB_ICONS', true)); ?>
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_ECKOHPAGES_FIELDSET_ICONS'); ?></legend>
				<?php echo $this->form->renderField('iconheading'); ?>
				<?php echo $this->form->renderField('iconcolumns'); ?>
				<?php echo $this->form->renderField('iconboxes'); ?>
			</fieldset>
		</div>
	</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'Middle', JText::_('COM_ECKOHPAGES_TAB_MIDDLE', true)); ?>
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_ECKOHPAGES_FIELDSET_MIDDLE'); ?></legend>
				<?php echo $this->form->renderField('middlectatext'); ?>
				<?php echo $this->form->renderField('middlectaheader'); ?>
				<?php echo $this->form->renderField('middlectalink'); ?>
				<?php echo $this->form->renderField('middlectabuttontext'); ?>
				<?php echo $this->form->renderField('middlectabackgroundcolour'); ?>
			</fieldset>
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_ECKOHPAGES_FIELDSET_CASESTUDIES'); ?></legend>
				<?php echo $this->form->renderField('casestudytitle'); ?>
				<?php echo $this->form->renderField('casestudyquote'); ?>
				<?php echo $this->form->renderField('casestudycite'); ?>
				<?php echo $this->form->renderField('casestudyreadmoretext'); ?>
				<?php echo $this->form->renderField('casestudyreadmore'); ?>
			</fieldset>
		</div>
	</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'Bottom', JText::_('COM_ECKOHPAGES_TAB_BOTTOM', true)); ?>
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_ECKOHPAGES_FIELDSET_BOTTOMCTA'); ?></legend>
				<?php echo $this->form->renderField('bottomctaheader'); ?>
				<?php echo $this->form->renderField('bottomctatext'); ?>
				<?php echo $this->form->renderField('bottomctabuttonlink'); ?>
				<?php echo $this->form->renderField('bottomctabuttontext'); ?>
			</fieldset>
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_ECKOHPAGES_FIELDSET_BOTTOMBOXES'); ?></legend>
				<?php echo $this->form->renderField('bottomboxes'); ?>
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

	
	<?php echo JHtml::_('bootstrap.endTabSet'); ?>

	<input type="hidden" name="task" value=""/>
	<?php echo JHtml::_('form.token'); ?>

</form>
