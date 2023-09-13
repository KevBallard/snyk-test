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

// include assets css/js
if (strtolower(substr($GLOBALS['app']->getTemplate(), 0, 3)) != 'yoo') {
	$this->app->document->addStylesheet('assets:css/reset.css');
}
$this->app->document->addStylesheet($this->template->resource.'assets/css/zoo.css');

// add page title
$page_title = sprintf(($this->item->id ? Text::_('Edit %s') : Text::_('Add %s')), $this->type->name);
$this->app->document->setTitle($page_title);

//$css_class = $this->application->getGroup().'-'.$this->template->name;
$css_class = 'blog-default';

?>

<div id="yoo-zoo" class="yoo-zoo <?php echo $css_class; ?> <?php echo $css_class.'-'.$this->submission->alias; ?>">

	<div class="submission">

		<h1 class="headline"><?php echo $page_title;?></h1>

		<?php echo $this->partial('submission'); ?>

	</div>

</div>
