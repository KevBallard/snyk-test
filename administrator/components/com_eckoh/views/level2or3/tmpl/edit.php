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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root() . 'media/com_eckoh/css/form.css');
?>
<script type="text/javascript">
	js = jQuery.noConflict();
	js(document).ready(function () {
		
	});

	Joomla.submitbutton = function (task) {
		if (task == 'level2or3.cancel') {
			Joomla.submitform(task, document.getElementById('level2or3-form'));
		}
		else {
			
			if (task != 'level2or3.cancel' && document.formvalidator.isValid(document.id('level2or3-form'))) {
				
				Joomla.submitform(task, document.getElementById('level2or3-form'));
			}
			else {
				alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_eckoh&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="level2or3-form" class="form-validate">

	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_ECKOH_TITLE_LEVEL2OR3', true)); ?>
		<div class="row-fluid">
			<div class="span10 form-horizontal">
				<fieldset class="adminform">

									<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
				<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
				<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
				<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
				<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

				<?php echo $this->form->renderField('created_by'); ?>
				<?php echo $this->form->renderField('modified_by'); ?>				<?php echo $this->form->renderField('productname'); ?>
				<?php echo $this->form->renderField('visibleproductname'); ?>
				<?php echo $this->form->renderField('subtitle'); ?>
				<?php echo $this->form->renderField('language'); ?>
				<?php echo $this->form->renderField('imageorvideo'); ?>
				<?php echo $this->form->renderField('introparagraph'); ?>
				<?php echo $this->form->renderField('featurearea'); ?>
				<?php echo $this->form->renderField('featureimage'); ?>
				<?php echo $this->form->renderField('minicalltoactionboxtext'); ?>
				<?php echo $this->form->renderField('minicalltoactionurl'); ?>
				<?php echo $this->form->renderField('minicalltoactionbuttontext'); ?>
				<?php echo $this->form->renderField('casestudytext'); ?>
				<?php echo $this->form->renderField('casestudyimage'); ?>
				<?php echo $this->form->renderField('featurearea2'); ?>
				<?php echo $this->form->renderField('featureimage2'); ?>
				<?php echo $this->form->renderField('calltoactiontext'); ?>
				<?php echo $this->form->renderField('calltoactionurl'); ?>
				<?php echo $this->form->renderField('calltoactionbuttontext'); ?>
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

	</div>
</form>
