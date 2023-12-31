<?php
/**
 * @package   com_zoo
 * @author    YOOtheme https://yootheme.com
 * @copyright Copyright (C) YOOtheme GmbH
 * @license   https://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die('Restricted access');

?>

<fieldset class="pos-content creation-form">
	<legend><?php echo $item->getType()->name; ?></legend>

	<?php if ($this->checkPosition('content')) : ?>
	<?php echo $this->renderPosition('content', array('style' => 'submission.block')); ?>
	<?php endif; ?>

</fieldset>

<?php if ($this->checkPosition('media')) : ?>
<fieldset class="pos-media creation-form">
	<legend><?php echo Text::_('Media'); ?></legend>

	<?php echo $this->renderPosition('media', array('style' => 'submission.block')); ?>

</fieldset>
<?php endif; ?>

<?php if ($this->checkPosition('meta')) : ?>
<fieldset class="pos-meta creation-form">
	<legend><?php echo Text::_('Meta'); ?></legend>

	<?php echo $this->renderPosition('meta', array('style' => 'submission.block')); ?>

</fieldset>
<?php endif; ?>

<?php if ($this->checkPosition('administration')) : ?>
<fieldset class="pos-administration creation-form">
	<legend><?php echo Text::_('Administration'); ?></legend>

	<?php echo $this->renderPosition('administration', array('style' => 'submission.block')); ?>

</fieldset>
<?php endif;
