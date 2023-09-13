

jQuery(document).ready(function() {

	jQuery('#openForm').click(function() {

		jQuery('#popupButton').click(function() {
	//      jQuery("#contactForm").submit(function(e){
	//        e.preventDefault();
	//        });
	//    jQuery('#contactForm').hide();
	//    jQuery('#openForm').hide(); 
	//    jQuery('#contactForm').submit();
			//create a cookie for the popup 
			createCookie('popupnew', 'yes');
		})
	});
	
	jQuery('#closeBtn').click(function() {
			createCookie('popupnew', 'yes');
	});

})

 //JAVASCRIPT FUNCTION TO OVERRIDE THE POPUP COOKIE VALUE WHEN SUBMIT BTN CLICKED
  function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
//    document.cookie = name+"="+value+expires+"; path=/";
		document.cookie = name+"="+value+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
