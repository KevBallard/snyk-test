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
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_PRODUCTNAME'); ?></th>
			<td><?php echo $this->item->productname; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_VISIBLEPRODUCTNAME'); ?></th>
			<td><?php echo $this->item->visibleproductname; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_SUBTITLE'); ?></th>
			<td><?php echo $this->item->subtitle; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_LANGUAGE'); ?></th>
			<td><?php echo $this->item->language; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_IMAGEORVIDEO'); ?></th>
			<td><?php echo nl2br($this->item->imageorvideo); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_INTROPARAGRAPH'); ?></th>
			<td><?php echo nl2br($this->item->introparagraph); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_FEATUREAREA'); ?></th>
			<td><?php echo nl2br($this->item->featurearea); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_FEATUREIMAGE'); ?></th>
			<td><?php echo nl2br($this->item->featureimage); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_MINICALLTOACTIONBOXTEXT'); ?></th>
			<td><?php echo nl2br($this->item->minicalltoactionboxtext); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_MINICALLTOACTIONURL'); ?></th>
			<td><?php echo $this->item->minicalltoactionurl; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_MINICALLTOACTIONBUTTONTEXT'); ?></th>
			<td><?php echo $this->item->minicalltoactionbuttontext; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_CASESTUDYTEXT'); ?></th>
			<td><?php echo nl2br($this->item->casestudytext); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_CASESTUDYIMAGE'); ?></th>
			<td><?php echo $this->item->casestudyimage; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_FEATUREAREA2'); ?></th>
			<td><?php echo nl2br($this->item->featurearea2); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_FEATUREIMAGE2'); ?></th>
			<td><?php echo nl2br($this->item->featureimage2); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_CALLTOACTIONTEXT'); ?></th>
			<td><?php echo nl2br($this->item->calltoactiontext); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_CALLTOACTIONURL'); ?></th>
			<td><?php echo $this->item->calltoactionurl; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_CALLTOACTIONBUTTONTEXT'); ?></th>
			<td><?php echo $this->item->calltoactionbuttontext; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_LEVEL2OR3_BOTTOMBOXES'); ?></th>
			<td><?php echo $this->item->bottomboxes; ?></td>
		</tr>

	</table>

</div>

