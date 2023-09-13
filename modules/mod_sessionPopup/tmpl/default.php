<?php
//CHECK IF THE POPUP COOKIE EXISTS
if (!isset($_COOKIE['popupnew']) || $_COOKIE['popupnew'] != 'yes') {
?>
<!-- CONTACT BUTTON -->
<!--
<div id="callToAction">
  <button id="openForm">Open Form</button>
</div>
-->

<div id="callToAction" class="moduletable contact-pop-up" >
	<div class="customcontact-pop-up">
		<div class="close-btn" id="closeBtn"></div>
		<h4>Contact Eckoh <span class="red">.</span></h4>
		<p>Let us know how we can help.</p>
		<p><a href="#" class="button" id="openForm">Get In Touch</a></p>
	</div>
</div>


<!-- FORM TO OPEN & SUBMIT  -->
<!--
* FORM IS A CHRONOFORMS - CONTROLLED FROM WITHIN CUSTOM JS *
<form id="contactForm">
  <input type="text" />
  <button id="button6">Submit</button>
</form>
-->

<?php } ?>