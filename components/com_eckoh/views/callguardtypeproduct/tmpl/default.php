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
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_PRODUCTNAME'); ?></th>
			<td><?php echo $this->item->productname; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_VISIBLEPRODUCTNAME'); ?></th>
			<td><?php echo $this->item->visibleproductname; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_SUBTITLE'); ?></th>
			<td><?php echo $this->item->subtitle; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_LANGUAGE'); ?></th>
			<td><?php echo $this->item->language; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_IMAGEORVIDEO'); ?></th>
			<td><?php echo nl2br($this->item->imageorvideo); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_INTROPARAGRAPH'); ?></th>
			<td><?php echo nl2br($this->item->introparagraph); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_FEATUREAREA'); ?></th>
			<td><?php echo nl2br($this->item->featurearea); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_FEATUREIMAGE'); ?></th>
			<td><?php echo nl2br($this->item->featureimage); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_MINICALLTOACTIONBOXTEXT'); ?></th>
			<td><?php echo nl2br($this->item->minicalltoactionboxtext); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_MINICALLTOACTIONBUTTON'); ?></th>
			<td><?php echo $this->item->minicalltoactionbutton; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_MINICALLTOACTIONBUTTONTEXT'); ?></th>
			<td><?php echo $this->item->minicalltoactionbuttontext; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_CASESTUDYIMAGE'); ?></th>
			<td><?php echo nl2br($this->item->casestudyimage); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_CASESTUDYTEXT'); ?></th>
			<td><?php echo nl2br($this->item->casestudytext); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_CASESTUDYLOGO'); ?></th>
			<td><?php echo $this->item->casestudylogo; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_FEATURE AREA 2'); ?></th>
			<td><?php echo nl2br($this->item->Feature area 2); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_FEATURE IMAGE 2'); ?></th>
			<td><?php echo nl2br($this->item->Feature image 2); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_CALLTOACTIONTEXT'); ?></th>
			<td><?php echo nl2br($this->item->calltoactiontext); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ECKOH_FORM_LBL_CALLGUARDTYPEPRODUCT_CALLTOACTIONBUTTONTEXT'); ?></th>
			<td><?php echo $this->item->calltoactionbuttontext; ?></td>
		</tr>

	</table>

</div>

