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
$element = ModSeo_glossaryHelper::getItem($params);
?>

<?php if (!empty($element)) : ?>
	<div>
		<?php $fields = get_object_vars($element); ?>
		<?php foreach ($fields as $field_name => $field_value) : ?>
			<?php if (ModSeo_glossaryHelper::shouldAppear($field_name)): ?>
				<div class="row">
					<div class="span4">
						<strong><?php echo ModSeo_glossaryHelper::renderTranslatableHeader($params->get('item_table'), $field_name); ?></strong>
					</div>
					<div
						class="span8"><?php echo ModSeo_glossaryHelper::renderElement($params->get('item_table'), $field_name, $field_value); ?></div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
<?php endif;
