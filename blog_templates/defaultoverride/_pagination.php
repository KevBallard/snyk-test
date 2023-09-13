<?php
/**
 * @package   com_zoo
 * @author    YOOtheme http://www.yootheme.com
 * @copyright Copyright (C) YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
if($this->pagination->current() >1){
$document = JFactory::getDocument();
$document->setTitle($document->getTitle() . ' | Page ' .$this->pagination->current());    
}
?>

<?php if ($pagination = $this->pagination->render($this->pagination_link)) : ?>
	<div class="zoo-pagination">
		<div class="pagination-bg">
			<?php echo str_replace('class="end"','class="end" rel="next"',str_replace('class="previous"','class="previous" rel="prev"',str_replace('class="start"','class="start" rel="prev"',str_replace('<a href','<a rel="next" href',$pagination)))); ?>
		</div>
	</div>
<?php endif;