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

<!-- L2 PLUS -->
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



<!-- Feature boxes -->

<div class="feature-boxes">

<?php
$pluspage_subforms = json_decode($this->item->topfeatures);

if ($pluspage_subforms) :

	foreach($pluspage_subforms as $pluspage_subform):
		if (!empty($pluspage_subform->featureboxurl)) :
			?>
	

    	<a href="<?php echo $pluspage_subform->featureboxurl; ?>" title="<?php echo $pluspage_subform->featureboxtitle; ?>">
				<div class="box" style="background-image:url('<?php echo $pluspage_subform->fatureboximage; ?>')">

					<div class="overlay">
						<h3><?php echo $pluspage_subform->featureboxtitle; ?></h3>
						</div>
					</div>
        </a>
	
		<?php else : ?>
	
		
						<div class="box" style="background-image:url('<?php echo $pluspage_subform->fatureboximage; ?>')">

        			<div class="overlay">
        				<h3><?php echo $pluspage_subform->featureboxtitle; ?></h3>
            	</div>
            </div>
      
            
        <?php
		endif; 
    endforeach;

endif; 
?>
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
						<span><?php echo nl2br($this->item->calltoactionbuttontext); ?></span>
					</a>
				</p>
			</div>
		</div>
	</div>
</div>
<!-- End -->

<?php }?>

<div class="casestudy">
	<!-- <img src="images/case-studies/case-study-bmw-circle.png"/> -->
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

<!-- Bottom Boxes Rachel -->

<!-- 		
<div class="lower-boxes">
	<div class="g-grid">
		<div class="g-block size-33-3" style="background-image:url('images/subfeature/subfeature-secure-payments.jpg')">
			<div class="bg blue">
				<h3>DTMF Masking</h3>
				<p>DTMF stands for Dual Tone Multi-Frequency and refers to the sound made when you press a key on your telephone keypad. Masking these tones by converting them into monotones prevents anyone from identifying the actual numbers. </p>
				<p><a href="#">link</a></p>
			</div>
		</div>
		<div class="g-block size-33-3" style="background-image:url(images/feature/feature-automated-payment.jpg)">
			<div class="bg orange">
				<h3>What is Audio Tokenisation?</h3>
				<p>This technology is unique to Eckoh and protected by patents in the UK and US. It takes sensitive card data and replaces it in any systems with placeholder data making the data in the contact centre system meaningless and so of no value to thieves.</p>
				<p><a href="#">link</a></p>
			</div>
		</div>
		<div class="g-block size-33-3" style="background-image:url('images/subfeature/subfeature-secure-payments.jpg')">
			<div class="bg green">
				<h3>Why be compliant?</h3>
				<p>If you take card payments in your contact centre, you’ll be exposed to sensitive card and personal data. That makes you vulnerable to fraud.  The Payment Card Industry Data Security Standard (PCI DSS) requires compliance to its standard to help reduce the risk of fraud. </p>
				<p><a href="#">link</a></p>
			</div>
		</div>
	</div>
</div> -->


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
$pluspagebot_subforms = json_decode($this->item->bottomboxes);

if ($pluspagebot_subforms) :

	foreach($pluspagebot_subforms as $pluspagebot_subform):
    	?>
	
			
			

			<div class="g-block size-33-3">
				<a href="<?php echo $pluspagebot_subform->bottomboxurl; ?>">
			<div class="background <?php echo $pluspagebot_subform->class; ?>" style="background-image:url('<?php echo $pluspagebot_subform->bottomboximage; ?>')">


        		<div class="bg">
        			<h3><?php echo $pluspagebot_subform->bottomtitle; ?></h3>
        			<?php echo $pluspagebot_subform->bottomboxestext; ?>

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














<!-- Rob end here -->



