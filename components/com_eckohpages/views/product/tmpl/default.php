<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Eckohpages
 * @author     RJ <rob@bluefrontier.co.uk>
 * @copyright  2020 Eckoh
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;


?>


<?php
if($this->item->visibleproductname || $this->item->subtitle || $this->item->introparagraph || $this->item->formtitle){
//<!-- SECTION 1 -  Intro / Header -->
?>
<div id="showcase">
	<div class="g-container">
		<div class="g-grid">
			<div class="g-block size-50 text">
				<p><?php echo $this->item->visibleproductname; ?></p>
				<?php if($this->item->subtitle) { ?>
				<h1><?php echo $this->item->subtitle; ?></h1>
				<?php }?>
				<?php echo ($this->item->introparagraph); ?>
			</div>
			<div class="g-block size-50 form">
				<?php echo $this->item->formvideo; ?>
				<div class="form-wrapper">
					<h3><?php echo $this->item->formtitle; ?></h3>
					<jdoc:include type="modules" name="position-0" style="blank" />
				</div>
			</div>
		</div>
	</div>
</div>
<?php
//<!-- end  -->
}
?>


<?php
if($this->item->textboxes){
//<!-- SECTION 2 - 'SARA' block -->
?>
<div id="content-top">
	<div class="g-container">
		<div class="g-grid">
			<?php $sara_subforms = json_decode($this->item->textboxes);
			if ($sara_subforms) {
				foreach($sara_subforms as $sara_subform) { ?>
					<div class="row-wrapper <?php echo $sara_subform->additionalclasses; ?>">
						<div class="content">
							<div class="media">
								<?php if($sara_subform->image) { ?>
									<img src="<?php echo $sara_subform->image; ?>" alt="<?php echo $sara_subform->imagealttag; ?>"/>
								<?php } ?>

								<?php if($sara_subform->videoembed) { 
									echo $sara_subform->videoembed;
								} ?>
							</div>
							<div class="textboxes <?php echo $sara_subform->backgroundcolour; ?>">
								<h2><?php echo $sara_subform->boxtitle; ?></h2>
								<p><?php echo $sara_subform->boxdescription; ?></p>
							</div>
						</div>
					</div>
				<?php
				}
			} 
			?>
		</div>
	</div>
</div>
<?php
//<!-- END SECTION 2 -->
}
?>

<?php
if($this->item->iconheading || $this->item->iconboxes){
//<!-- SECTION 3 - 'ICONS' block -->
?>
<div id="content-bottom">
	<div class="g-container">
		<div class="g-grid">
			<div class="g-block size-100 text">
				<h3><?php echo $this->item->iconheading; ?></h3>
			</div>
			<div class="g-block size-100 icons">
				<ul class="icon-wrapper">
				<?php $icons_subforms = json_decode($this->item->iconboxes);
				if ($icons_subforms) :
					foreach($icons_subforms as $icons_subform):
						$strAlt = '';
						$strLink = '';
						$strHeading = '';
						//create alt tag
						$strAlt=$icons_subform->heading;
						if($icons_subform->iconalttag){
							$strAlt=$icons_subform->iconalttag;
						}

						if($icons_subform->link){
							$strAlt=$icons_subform->iconalttag;
							if($icons_subform->buttontext && strtolower($icons_subform->buttontext) != 'read more'){
								$strLink = '<a class="button" href="'. $icons_subform->link .'"><span class="button-inner">' . $icons_subform->buttontext .'</span></a>';
								$strHeading = "<h4>". $icons_subform->heading ."</h4>";
							}else{
								$strHeading = '<h4><a href="'. $icons_subform->link .'">' . $icons_subform->heading .'</a></h4>';
							}
						}else{
							$strHeading = '<h4>'. $icons_subform->heading .'</h4>';
						}				
						?>
						<li class="icons<?php echo $this->item->iconcolumns; ?>">	
							<img src="<?php echo $icons_subform->icon; ?>" alt="<?php echo $strAlt; ?>"/>
							<?php echo $strHeading;?>
							<p><?php echo $icons_subform->text; ?></p>
							<?php echo $strLink;?>
						</li> 
						<?php
					endforeach;
				endif; 
				?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php
//<!-- END SECTION 3 -->
}
?>


<?php
if($this->item->middlectaheader || $this->item->middlectatext){
//<!-- SECION 4 - Middle CTA  -->
$strLink = '';
$strHeading = '';
if($this->item->middlectalink){
	if($this->item->middlectabuttontext && strtolower($this->item->middlectabuttontext) != 'read more'){
		$strLink = '<a class="button" href="'. $this->item->middlectalink .'"><span class="button-inner">' . $this->item->middlectabuttontext .'</span></a>';
		$strHeading = "<h3>". $this->item->middlectaheader ."</h3>";
	}else{
		$strHeading = '<a href="'. $this->item->middlectalink .'"><h3>' . $this->item->middlectaheader .'</h3></a>';
	}
}else{
	$strHeading = '<h3>'. $this->item->middlectaheader .'</h3>';
}
?>
<div id="below-main">
	<div class="g-container">
		<div class="g-grid">
			<div class="g-block size-70 text">
				<?php echo $strHeading; ?>
				<p><?php echo ($this->item->middlectatext); ?></p>
			</div>
			<?php
			if($strLink){
			?>
			<div class="g-block size-30 cta-btn">
				<?php echo $strLink; ?>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>
<?php
//<!-- END -->
}
?>


<?php
if($this->item->casestudytitle || $this->item->casestudyquote){
//<!-- SECION 5 - Case Study Section  -->
$strLink = '';
$strHeading = '';
if($this->item->casestudyreadmore){
	if($this->item->casestudyreadmoretext){
		$strLink = '<a class="button" href="'. $this->item->casestudyreadmore .'"><span class="button-inner">' . $this->item->casestudyreadmoretext .'</span></a>';
		$strHeading = "<h3>". $this->item->casestudytitle ."</h3>";
	}else{
		$strHeading = '<h3><a href="'. $this->item->casestudyreadmore .'">' . $this->item->casestudytitle .'</a></h3>';
	}
}else{
	$strHeading = '<h3>'. $this->item->casestudytitle .'</h3>';
}	
?>
<div id="extension">
	<div class="g-container">
		<div class="g-grid">
			<div class="g-block size-100 quote-wrapper">
				<?php
				if($strHeading){
				?>
				<?php echo $strHeading; ?>
				<?php
				}
				?>
				<div class="quote-body">
					<blockquote class="quote-txt"><?php echo ($this->item->casestudyquote); ?></blockquote>
					<cite><?php echo ($this->item->casestudycite); ?></cite>
				</div>
				<?php echo $strLink  ?>
			</div>
		</div>
	</div>
</div>
<?php
//<!-- END -->
}else{
    echo '<br /><br />';
}
?>


<?php
if($this->item->bottomboxes){
//<!-- SECTION 6 - 'Bottom Blocks' block -->
	
?>
<div id="below-extension">
	<div class="g-container">
		<div class="g-grid">
			<div class="g-block size-100">
				<ul class="box-wrapper">
					<?php $bottoms_subforms = json_decode($this->item->bottomboxes);
					if ($bottoms_subforms) :
						foreach($bottoms_subforms as $bottoms_subform):
							$strLink = '';
							$strAlt='';
							$strHeading = '';
							$strAlt=$bottoms_subform->title;
							if($bottoms_subform->iconalttag){
								$strAlt=$bottoms_subform->imagealttag;
							}
							if($bottoms_subform->link){
								if($bottoms_subform->buttontext && strtolower($bottoms_subform->buttontext) != 'read more'){
									$strLink = '<a class="button" href="'. $bottoms_subform->link .'"><span class="button-inner">' . $bottoms_subform->buttontext .'</span></a>';
									$strHeading = "<h3>". $bottoms_subform->title ."</h3>";
								}else{
									$strHeading = '<h3><a href="'. $bottoms_subform->link .'"><span class="button-inner">' . $bottoms_subform->title .'</span></a></h3>';
								}
							}else{
								$strHeading = '<h3>'. $bottoms_subform->title .'</h3>';
							}
							?>
							<li class="box">
								<div class="image"><img src="<?php echo $bottoms_subform->image; ?>" alt="<?php echo $strAlt; ?>"/></div>
								<?php echo $strHeading; ?>
								<?php echo $strLink;?>
							</li>
							<?php
						endforeach;
					endif; 
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php
//<!-- END -->
}
?>


<?php
if($this->item->bottomctaheader || $this->item->bottomctatext){
//<!-- SECTION 7 - Bottom Call to Action -->
$strLink = '';
$strHeading = '';
if($this->item->bottomctabuttonlink){
	if($this->item->bottomctabuttontext && strtolower($this->item->bottomctabuttontext) != 'read more'){
		$strLink = '<a class="button" href="'. $this->item->bottomctabuttonlink .'"><span class="button-inner">' . $this->item->bottomctabuttontext .'</span></a>';
		$strHeading = "<h3>". $this->item->bottomctaheader ."</h3>";
	}else{
		$strHeading = '<a href="'. $this->item->casestudyreadmore .'"><h3>' . $this->item->casestudytitle .'</h3></a>';
	}
}else{
	$strHeading = '<h3>'. $this->item->casestudytitle .'</h3>';
}
?>
<div id="above-footer">
	<div class="g-container">
		<div class="g-grid">
			<div class="g-block size-70 text">
				<?php echo $strHeading; ?>
				<p><?php echo ($this->item->bottomctatext); ?></p>
			</div>
			<?php  
			if($strLink){
			?>
			<div class="g-block size-30 cta-btn">
				<?php echo $strLink;?>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>
<?php
}
?>
