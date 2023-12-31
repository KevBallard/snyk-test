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

<?php if ($this->checkPosition('top')) : ?>
<div class="pos-top">
	<?php echo $this->renderPosition('top', array('style' => 'block')); ?>
</div>
<?php endif; ?>

<?php if (($view->params->get('template.item_media_alignment') == "above") && $this->checkPosition('media')) : ?>
<div class="pos-media media-<?php echo $view->params->get('template.item_media_alignment'); ?>">
	<?php echo $this->renderPosition('media', array('style' => 'block')); ?>
</div>
<?php endif; ?>

<?php if ($this->checkPosition('title')) : ?>
<h1 class="pos-title"><?php echo $this->renderPosition('title'); ?></h1>
<?php endif; ?>

<?php if ($this->checkPosition('meta')) : ?>
<p class="pos-meta">
	<?php echo $this->renderPosition('meta'); ?>
</p>
<?php endif; ?>

<?php if ($this->checkPosition('subtitle')) : ?>
<h2 class="pos-subtitle">
	<?php echo $this->renderPosition('subtitle'); ?>
</h2>
<?php endif; ?>

<?php if (($view->params->get('template.item_media_alignment') == "top") && $this->checkPosition('media')) : ?>
<div class="pos-media media-<?php echo $view->params->get('template.item_media_alignment'); ?>">
	<?php echo $this->renderPosition('media', array('style' => 'block')); ?>
</div>
<?php endif; ?>

<div class="floatbox">

	<?php if ((($view->params->get('template.item_media_alignment') == "left") || ($view->params->get('template.item_media_alignment') == "right")) && $this->checkPosition('media')) : ?>
	<div class="pos-media media-<?php echo $view->params->get('template.item_media_alignment'); ?>">
		<?php echo $this->renderPosition('media', array('style' => 'block')); ?>
	</div>
	<?php endif; ?>

	<?php if ($this->checkPosition('content')) : ?>
	<div class="pos-content">
		<?php echo $this->renderPosition('content', array('style' => 'block')); ?>
	</div>
	<?php endif; ?>

</div>

<?php if (($view->params->get('template.item_media_alignment') == "bottom") && $this->checkPosition('media')) : ?>
<div class="pos-media media-<?php echo $view->params->get('template.item_media_alignment'); ?>">
	<?php echo $this->renderPosition('media', array('style' => 'block')); ?>
</div>
<?php endif; ?>

<?php if ($this->checkPosition('taxonomy')) : ?>
<ul class="pos-taxonomy">
	<?php echo $this->renderPosition('taxonomy', array('style' => 'list')); ?>
</ul>
<?php endif; ?>

<?php if ($this->checkPosition('bottom')) : ?>
<div class="pos-bottom">
	<?php echo $this->renderPosition('bottom', array('style' => 'block')); ?>
</div>
<?php endif; ?>

<?php if ($this->checkPosition('related')) : ?>
<div class="pos-related">
	<h3><?php echo Text::_('Related Articles'); ?></h3>
	<ul>
		<?php echo $this->renderPosition('related'); ?>
	</ul>
</div>
<?php endif; ?>

<?php if ($this->checkPosition('author')) : ?>
<div class="pos-author">
	<?php echo $this->renderPosition('author', array('style' => 'block')); ?>
</div>
<?php endif;
