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


?>

<div class="item_fields">

	<table class="table">
		

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_PRODUCTNAME'); ?></th>
			<td><?php echo $this->item->productname; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_VISIBLEPRODUCTNAME'); ?></th>
			<td><?php echo $this->item->visibleproductname; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_SUBTITLE'); ?></th>
			<td><?php echo $this->item->subtitle; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_LANGUAGE'); ?></th>
			<td><?php echo $this->item->language; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_IMAGEORVIDEO'); ?></th>
			<td><?php echo nl2br($this->item->imageorvideo); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_INTROPARAGRAPH'); ?></th>
			<td><?php echo nl2br($this->item->introparagraph); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_TOPFEATURES'); ?></th>
			<td><?php echo $this->item->topfeatures; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_FEATUREAREA'); ?></th>
			<td><?php echo nl2br($this->item->featurearea); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_FEATUREIMAGE'); ?></th>
			<td><?php echo nl2br($this->item->featureimage); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_MINICALLTOACTIONBOXTEXT'); ?></th>
			<td><?php echo nl2br($this->item->minicalltoactionboxtext); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_MINICALLTOACTIONURL'); ?></th>
			<td><?php echo $this->item->minicalltoactionurl; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_MINICALLTOACTIONBUTTONTEXT'); ?></th>
			<td><?php echo $this->item->minicalltoactionbuttontext; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_CASESTUDYTEXT'); ?></th>
			<td><?php echo nl2br($this->item->casestudytext); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_CASESTUDYIMAGE'); ?></th>
			<td><?php echo $this->item->casestudyimage; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_FEATUREAREA2'); ?></th>
			<td><?php echo nl2br($this->item->featurearea2); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_FEATUREIMAGE2'); ?></th>
			<td><?php echo nl2br($this->item->featureimage2); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_CALLTOACTIONTEXT'); ?></th>
			<td><?php echo nl2br($this->item->calltoactiontext); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_CALLTOACTIONURL'); ?></th>
			<td><?php echo $this->item->calltoactionurl; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_CALLTOACTIONBUTTONTEXT'); ?></th>
			<td><?php echo $this->item->calltoactionbuttontext; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2PLUS_BOTTOMBOXES'); ?></th>
			<td><?php echo $this->item->bottomboxes; ?></td>
		</tr>

	</table>

</div>

