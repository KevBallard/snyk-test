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











<!-- subform 1 -->

<div class="feature-boxes">

<?php
$hubpage_subforms = json_decode($this->item->topfeatureboxes);

if ($hubpage_subforms) :

	foreach($hubpage_subforms as $hubpage_subform):
		if (!empty($hubpage_subform->featureboxurl)) :
    	?>
		

	    	<a href="<?php echo $hubpage_subform->featureboxurl; ?>" title="<?php echo $hubpage_subform->featureboxtitle; ?>">
				<div class="box" style="background-image:url('<?php echo $hubpage_subform->featureboximage; ?>')">

	        		<div class="overlay">
	        			<h3><?php echo $hubpage_subform->featureboxtitle; ?></h3>
	            	</div>
	            </div>
	        </a>
	            
        <?php else : ?>

			
				<div class="box" style="background-image:url('<?php echo $hubpage_subform->featureboximage; ?>')">

	        		<div class="overlay">
	        			<h3><?php echo $hubpage_subform->featureboxtitle; ?></h3>
	            	</div>
	            </div>
	        

        <?php
		endif; 
    endforeach;

endif; 
?>
    </div>
<!-- end subform -->


<!-- Feature Area -->
<div class="feature padding-bottom">
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


<!-- subform 2 -->

<div class="feature-boxes green">

<?php
$hubpage_subforms = json_decode($this->item->middlefeatureboxes);

if ($hubpage_subforms) :

	foreach($hubpage_subforms as $hubpage_subform):
	if (!empty($hubpage_subform->featureboxurl)) :
    	?>
	

    	<a href="<?php echo $hubpage_subform->featureboxurl; ?>" title="<?php echo $hubpage_subform->featureboxtitle; ?>">
			<div class="box" style="background-image:url('<?php echo $hubpage_subform->featureboximage; ?>')">

        		<div class="overlay">
        			<h3><?php echo $hubpage_subform->featureboxtitle; ?></h3>
            	</div>
            </div>
        </a>
	
	<?php else : ?>
	
			<div class="box" style="background-image:url('<?php echo $hubpage_subform->featureboximage; ?>')">

        		<div class="overlay">
        			<h3><?php echo $hubpage_subform->featureboxtitle; ?></h3>
            	</div>
            </div>
        
            
        <?php
	endif; 
    endforeach;

endif; 
?>
    </div>
<!-- end subform -->

<!-- Call to action -->
<div id="g-extension" class="grey-bg">
	<div class="g-container">
		<div class="moduletable get-in-touch">
	
			<h3 class="g-title">Get in touch today</h3>
			<div class="custom">
				<?php echo nl2br($this->item->calltoactiontext); ?>
				<p>
					<a class="button" href="<?php echo nl2br($this->item->calltoactionbutton); ?>">
					<span><?php echo nl2br($this->item->calltoactionbuttontext); ?></span>
					</a>
				</p>
			</div>
		</div>
	</div>
</div>
<!-- End -->



<!-- Rob end here -->






