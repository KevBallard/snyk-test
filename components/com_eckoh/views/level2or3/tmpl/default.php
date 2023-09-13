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

<!-- L2 -->
<!-- Intro / Header -->


<div class="showcase">
	<div class="g-container">
		<div class="g-grid">
			<div class="g-block size-50">
				<h1><?php echo $this->item->visibleproductname; ?></h1>
				<?php if($this->item->subtitle) { ?>
				<h2><?php echo $this->item->subtitle; ?></h2>
				<?php }?>
				<?php echo nl2br($this->item->introparagraph); ?>
			</div>
			<div class="g-block size-50 video">
				<?php echo nl2br($this->item->imageorvideo); ?>
			</div>
		</div>
	</div>
</div>







<!-- Feature Area -->

<div class="feature">
	<div class="g-container">
		<div class="g-grid">
			<div class="g-block size-50">
				<?php echo $this->item->featurearea; ?>
			</div>
			<div class="g-block size-50 video">
				<?php echo $this->item->featureimage; ?>
			</div>
		</div>
	</div>
</div>

<!-- End -->







<?php echo $this->item->middlefeatureboxes; ?>





<!-- Min Call to Action -->

<?php if($this->item->minicalltoactionboxtext) { ?>

 <div id="g-extension" class="grey-bg mini">
	<div class="g-container">
		<div class="moduletable get-in-touch">
	
			<h3 class="g-title">Get in touch today</h3>
			<div class="custom">
				<?php echo nl2br($this->item->minicalltoactionboxtext); ?>
				<p>
					<a class="button" href="<?php echo nl2br($this->item->minicalltoactionurl); ?>">
						<span><?php echo nl2br($this->item->minicalltoactionbuttontext); ?></span>
					</a>
				</p>
			</div>
		</div>
	</div>
</div>

<?php }?>


<div class="casestudy">
	
	<?php if($this->item->casestudyimage) { ?>
			<img src="<?php echo nl2br($this->item->casestudyimage); ?>"/>
	<?php }?>

	<div class="g-container">
		<div class="g-grid">
			<div class="g-block size-100">
				<?php echo nl2br($this->item->casestudytext); ?>
				
			</div>
		</div>
	</div>
	

</div>  








	
	

<div class="feature two">
	<div class="g-container">
		<div class="g-grid">
			<div class="g-block size-50">
				<?php echo nl2br($this->item->featurearea2); ?>
			</div>
			<div class="g-block size-50 video">
				<?php echo nl2br($this->item->featureimage2); ?>
			</div>
		</div>
	</div>
</div>

<div id="g-extension" class="grey-bg">
	<div class="g-container">
		<div class="moduletable get-in-touch">
	
			<h3 class="g-title">Get in touch today</h3>
			<div class="custom">
				<?php echo nl2br($this->item->calltoactiontext); ?>
				<p>
					<a class="button" href="<?php echo nl2br($this->item->calltoactionurl); ?>">
						<span><?php echo nl2br($this->item->calltoactionbuttontext); ?></span>
					</a>
				</p>
			</div>
		</div>
	</div>
</div>



<!-- Bottom Boxes Rob -->

<div class="lower-boxes">
		<div class="g-grid">

<?php
$level2pagebot_subforms = json_decode($this->item->bottomboxes);

if ($level2pagebot_subforms) :

	foreach($level2pagebot_subforms as $level2pagebot_subform):
    	?>
	
			<div class="g-block size-33-3">
				<a href="<?php echo $level2pagebot_subform->bottomboxurl; ?>">
					<div class="background <?php echo $level2pagebot_subform->class; ?>" style="background-image:url('<?php echo $level2pagebot_subform->bottomboximage; ?>')">


						<div class="bg">
							<h3><?php echo $level2pagebot_subform->bottomtitle; ?></h3>
									<?php echo $level2pagebot_subform->bottomboxestext; ?>
							<p class="link">

									Read More

							</p>
						</div>
					</div>
				</a>   
      </div>   
        <?php
    endforeach;

endif; 
?>
	</div>
    </div>







