(function($){

  jQuery(document).ready(function() {
    
    checkCookie();

  });
    
    jQuery(document).ready(function() {
    
        if( jQuery('#myModal').length )         // use this if you are using id to check
        {
             jQuery('body').addClass('language-selector');
        }
        
        jQuery('#myModal a').click(function(){
            jQuery('body').removeClass('language-selector');
            
            setTimeout(function(){ 
            
			var mobileHeaderWrapHeight = jQuery('.mobile-header-wrap').outerHeight();
            jQuery('#g-page-surround').css('padding-top',mobileHeaderWrapHeight);
            
		}, 300);
        });

  });


})(jQuery);
function checkCookie(){

 // console.log('yes');
  //get the modal
  var bfmodal = document.getElementById('myModal');

  // alert(modal);

  //get the span to close the popup box
  var span = document.getElementsByClassName('bfclose')[0];

  var exit = document.getElementsByClassName('exit')[0];
if (span) {
  //when the user clicks on <span>(x) close the modal
  span.onclick = function() {
    bfmodal.style.display = 'none';
  }; }

if (exit) {

  //when the user clicks on con close the modal
  exit.onclick = function() {
    bfmodal.style.display = 'none';
    jQuery('body:not(#careers-investors).language-selector #g-header').css('padding-top', '0px');
    jQuery('body#careers-investors.language-selector #g-header').css('padding-top', '16px');
    var grandParentModal = jQuery('#myModal').parent();
//    jQuery('.language-selector #g-header').css('padding-top', '0px');
//    var grandParentModal = jQuery('#myModal').parents().eq(1);
    grandParentModal.hide();
    //jQuery('#announcement').css('display','none');
  };
}



  //when the user clicks anywhere outside of the modal close it
  window.onclick = function(event) {
    if (event.target == bfmodal) {
      bfmodal.style.display = 'none';
    }
  };
}


 jQuery(document).ready(function(){
  //console.log('popup jquery loaded');
  //jQuery('.language-selector #g-header').css('padding-top','0px');

  var d = new Date();
  var expireDate = d.setDate(d.getDate() + 30);
  //console.log(expireDate.toGMTString());
  var the_cookie;
  //console.log('1' + the_cookie);


//get cookie 
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
//end of get cookie


  //check for cookie 

function checkCookie() {
  var popClicked = getCookie("popClicked");
  if (popClicked == "No") {
  // alert("popup not clicked " + popClicked);
   the_cookie = "popClicked=No";
      jQuery('#myModal').addClass('no');
      jQuery('#myModal').removeClass('yes');
     // console.log('no'); 
  } else if (popClicked == "Yes") {
    //alert("popup clicked " + popClicked);
     the_cookie = "popClicked=Yes";
      jQuery('#myModal').addClass('yes');
      jQuery('#myModal').removeClass('no');
      jQuery('.language-selector #g-header').css('padding-top','0px');

      //console.log('yes');
  }
  else {
    //popClicked = prompt("Please enter your name:", "");
    if (popClicked == "" || popClicked == null) {
      //alert('cookie undefined ' + popClicked);
      //setCookie("popClicked", popClicked, 365);
      the_cookie = "popClicked=No";
      jQuery('#myModal').addClass('no');
      jQuery('#myModal').removeClass('yes');
      jQuery('header#g-header .g-grid #announcement').css('padding-top', '30px');
      //jQuery('header#g-header .g-grid #announcement').css('display','none');

      //jQuery('.language-selector #g-header').css('padding-top','0px');
      //console.log('undefined');

    }
  }
}
//run the above function
checkCookie();


    jQuery('.con').click(function(){
      //console.log('con clicked');
      //console.log('cookie value = ' + the_cookie);
      //console.log(expireDate);
      expireDate = new Date(expireDate);
      //console.log(expireDate);
     if (the_cookie == 'popClicked=No'){
      the_cookie = "popClicked=Yes;";
      document.cookie = the_cookie + ' expires =' + expireDate +';path=/';
      //document.cookie = the_cookie;
      jQuery('#myModal').addClass('yes');
      jQuery('#myModal').removeClass('no');      
     }

    })
    //console.log(the_cookie)
  })