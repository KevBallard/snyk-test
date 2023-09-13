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
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_PRODUCTNAME'); ?></th>
			<td><?php echo $this->item->productname; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_VISIBLEPRODUCTNAME'); ?></th>
			<td><?php echo $this->item->visibleproductname; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_SUBTITLE'); ?></th>
			<td><?php echo $this->item->subtitle; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_LANGUAGE'); ?></th>
			<td><?php echo $this->item->language; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_IMAGEORVIDEO'); ?></th>
			<td><?php echo nl2br($this->item->imageorvideo); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_INTROPARAGRAPH'); ?></th>
			<td><?php echo nl2br($this->item->introparagraph); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_TOPFEATUREBOXES'); ?></th>
			<td><?php echo $this->item->topfeatureboxes; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_FEATUREAREA'); ?></th>
			<td><?php echo nl2br($this->item->featurearea); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_FEATUREIMAGE'); ?></th>
			<td><?php echo nl2br($this->item->featureimage); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_MIDDLEFEATUREBOXES'); ?></th>
			<td><?php echo $this->item->middlefeatureboxes; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_CALLTOACTIONTEXT'); ?></th>
			<td><?php echo nl2br($this->item->calltoactiontext); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_CALLTOACTIONBUTTON'); ?></th>
			<td><?php echo $this->item->calltoactionbutton; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_HUBPRODUCT_CALLTOACTIONBUTTONTEXT'); ?></th>
			<td><?php echo $this->item->calltoactionbuttontext; ?></td>
		</tr>

	</table>

</div>

