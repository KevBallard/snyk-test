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
$elements = ModSeo_glossaryHelper::getList($params);

$tableField = explode(':', $params->get('field'));
$table_name = !empty($tableField[0]) ? $tableField[0] : '';
$field_name = !empty($tableField[1]) ? $tableField[1] : '';
?>

<?php if (!empty($elements)) : ?>
	<table class="table">
		<?php foreach ($elements as $element) : ?>
			<tr>
				<th><?php echo ModSeo_glossaryHelper::renderTranslatableHeader($table_name, $field_name); ?></th>
				<td><?php echo ModSeo_glossaryHelper::renderElement(
						$table_name, $params->get('field'), $element->{$field_name}
					); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif;
