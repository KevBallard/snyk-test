jQuery(document).ready(function($){
	
	// MENU - Add <a> class to parent <li>
    jQuery('._menu a').each(function(){
        var tagClass = $(this).attr("class");
        $(this).closest('li').addClass(tagClass);
    });


    // HOME LOGO SLIDER WK OVERRIDEE


    jQuery(window).resize(function(){
        jQuery('div.company-logos ul').each(function(){
                $(this).removeClass('uk-grid-width-1-4');
                $(this).removeClass('uk-grid-width-1-6');
                $(this).removeClass('uk-grid-width-1-10');
        });
        if(jQuery(window).width() < 768){
                jQuery('div.company-logos ul').each(function(){
                        $(this).addClass('uk-grid-width-1-4');
                });
        }
        if(jQuery(window).width() >= 768){
                jQuery('div.company-logos ul').each(function(){
                        $(this).addClass('uk-grid-width-1-6');
                });
        }
        if(jQuery(window).width() >= 1200){
                jQuery('div.company-logos ul').each(function(){
                        $(this).addClass('uk-grid-width-1-10');
                });
        }
	}).trigger('resize');


	
	$('.featured-casestudy .element-itemlink a').addClass('button hollow');

	
	//ABOUT US SET IMAGES AS BACKGROUND

	function hideimage() {
		$('.about-grid > div').each(function(){ 
			$(this).find('img').hide();
		});
	}
	
	$('.about-grid > div').each(function(){
		var imagesrc = $(this).children().children().children().children('img').attr('src');
		$(this).css({'background-image': 'url(' + imagesrc + ')'});
		
		setTimeout(function(){ 
			hideimage();
		}, 300);

	});
	
	//ABOUT US MAIN HEIGHT
	$('.about-grid').each(function(){
		var aboutgridheight = $(this).outerHeight();
		$(this).parent().height(aboutgridheight - 50);
	});
	
	//MORE INFO BOXES COLOURED BG
	$('.eep-more .custom').each(function(){
		$('<div class="color-bg"></div>').appendTo(this);
	});
	
	//BUTTON STYLING
	// $('a.hollow').wrapInner('<span class="button-inner"></span>');
	// $('a.dark').wrapInner('<span class="button-inner"></span>');
	
	//CAREERS - REASONS TO WORK FOR ECKOH 
	
		setTimeout(function(){ 
			
			$('.reasons-widget > div:nth-child(odd)').each(function(){
				var absoluteheight = $(this).children('.uk-float-right').outerHeight();
				$(this).css('min-height',absoluteheight);
			});
			
			$('.reasons-widget > div:nth-child(even)').each(function(){
					var absoluteheightabsolute = $(this).children('div:nth-child(1)').outerHeight();
					$(this).css('min-height',absoluteheightabsolute);
			});
			
		}, 2000);
		
		

	
	
	
	
	
	//CASE STUDIES WRAPPER
	$('.item').find('.element-text,.element-itemname').wrapAll('<div class="text-wrapper"></div>');
	
	
	//EEP - Gradient Background Height
	$('.itemid-133 #g-showcase,.itemid-133 #g-main').wrapAll('<div class="showcase-wrapper"></div>');
	
	//RELATED CASE STUDIES
	$('#landing.itemid-151 .blog-default .pos-related ul li,#landing.itemid-272 .blog-default .pos-related ul li,#landing.itemid-476 .blog-default .pos-related ul li').each(function() {
		$(this).children('.pos-subtitle').prependTo(
			$(this).children('.floatbox').children('.pos-content')
		);
		$(this).children('.pos-title').prependTo(
			$(this).children('.floatbox').children('.pos-content')
		);
		
		$(this).children('.floatbox').children('.pos-content').children('.element-image').prependTo(
			$(this).children('.floatbox').children('.pos-content')
		);
	});
	
	//CASE STUDIES
	
	$('#landing.itemid-151 .blog-default .first .teaser-item,#landing.itemid-272 .blog-default .first .teaser-item,#landing.itemid-476 .blog-default .first .teaser-item').each(function() {
		$(this).children('.teaser-item-bg').children('.pos-title').prependTo(
			$(this).children('.teaser-item-bg').children('.floatbox').children('.pos-content')
		);
		$(this).children('.teaser-item-bg').children('.pos-subtitle').prependTo(
			$(this).children('.teaser-item-bg').children('.floatbox').children('.pos-content')
		);
	});
	
	
	$('<li><a class="all" href="/about-us/case-studies">All</a></li>').prependTo('.casestudy-categories.uk-all ul.zoo-category-list');
	$('<li><a class="all" href="/us/about-us/case-studies">All</a></li>').prependTo('.casestudy-categories.all.us-all ul.zoo-category-list');
	
	
	
	//NEWS ITEMS
	
	$('#landing.itemid-160.content .blog-default .first .teaser-item,#landing.itemid-265.content .blog-default .first .teaser-item').each(function() {
		$(this).children('.teaser-item-bg').children('.pos-meta').prependTo(
			$(this).children('.teaser-item-bg').children('.floatbox').children('.pos-content')
		);
		$(this).children('.teaser-item-bg').children('.pos-title').prependTo(
			$(this).children('.teaser-item-bg').children('.floatbox').children('.pos-content')
		);
		$(this).children('.teaser-item-bg').children('.pos-links').appendTo(
			$(this).children('.teaser-item-bg').children('.floatbox').children('.pos-content')
		);
	});
	
	//BLOG ITEMS
	
	$('#landing.itemid-162.content .blog-default .first .teaser-item,#landing.itemid-267.content .blog-default .first .teaser-item').each(function() {
		$(this).children('.teaser-item-bg').children('.pos-meta').prependTo(
			$(this).children('.teaser-item-bg').children('.floatbox').children('.pos-content')
		);
		$(this).children('.teaser-item-bg').children('.pos-title').prependTo(
			$(this).children('.teaser-item-bg').children('.floatbox').children('.pos-content')
		);
		$(this).children('.teaser-item-bg').children('.pos-links').appendTo(
			$(this).children('.teaser-item-bg').children('.floatbox').children('.pos-content')
		);
	});
	
	//PRODUCT SHOWCASE IMAGE WRAPPER
	$('main#g-main > .g-container .g-content .showcase .g-container .g-block.video').each(function(){
		$(this).find('img').wrap('<div class="product-image-wrapper-outer"><div class="product-image-wrapper"></div></div>');
	});
	
	$('main#g-main > .g-container .g-content .showcase .g-container .g-block.video').each(function(){
		$(this).find('iframe').wrap('<div class="video-wrapper"></div>');
		$(this).find('iframe').parent().parent().parent().addClass('iframe');
	});
	
	//HOME FEATURED BOX SLIDE UP
	$('.featured-product .customfeatured-product').each(function(){
		$(this).mouseenter(function(){
				$(this).find('p').slideDown();
		});
		$(this).mouseleave(function(){
				$(this).find('p').slideUp();
		});
	});
	
//	$(this).children('.floatbox').children('.pos-content').children('.element-image')
	
	//CASE STUDY SLIDER ARROWS
	
	$('<div class="nextCircle"></div>').appendTo(".featured-casestudy ul.blog-default");
	$('<div class="prevCircle"></div>').appendTo(".featured-casestudy ul.blog-default");
	$('.prevCircle,.nextCircle').wrapAll('<div class="slider-arrows"></div>');
	
	//INVESTOR NEW CATEGORIES
	
	$('<div class="investors-seemore">see more</div>').appendTo('body#careers-investors .blog-default .details .description ul.zoo-list');
	
	$('.investors-seemore').click(function(){
		$('body#careers-investors .blog-default .details .description ul.zoo-list li').show();
		$(this).hide();
	})
	
	//SHOWCASES - BACKGROUND COLOUR FOR H1 + H2
	
	$('body#landing #g-showcase .custom').wrapInner('<div class="background-color"><div class="inner"></div></div>');
	
	$('body#careers-investors #g-showcase .custom').wrapInner('<div class="background-color"><div class="inner"></div></div>');
	
	
	//US/UK LANGUAGE ICON SWAP
	if ( $('html').attr('lang') == 'en-US' ) {
    $('div.mod-languages ul').addClass('us');
	} 
	
	//MOBILE MENU
	if ($(window).width() < 1151 || $(window).width() == 1194) {
		
		$('ul.g-toplevel > li.g-parent a').attr('data-g-menuparent','');
		$('ul.g-toplevel > li.g-parent a.button').removeAttr('data-g-menuparent');
		
//		$('ul.g-toplevel > li.g-parent > a').not('.mobile-only').not('.button').removeAttr('href');
		
		
		$('ul.g-toplevel > li.g-parent').not('.g-menu-item-358').not('.g-menu-item-359').children('a').not('.mobile-only').not('.button').removeAttr('href');
//		$('ul.g-sublevel > li.g-parent > a').not('.mobile-only').not('.button').removeAttr('href');
		
		$('.g-menu-item-358 a').removeAttr('data-g-menuparent');
		$('.g-menu-item-359 a').removeAttr('data-g-menuparent');
		
	
	}
	
	
	//NEW - RACHEL - CONTACT ECKOH POP UP
	
	$('.contact-pop-up a.button').click(function(){
		$('.contact-pop-up-form').fadeIn();
		$('body').addClass('no-scroll');
	});
	$('.contact-pop-up-form .close-btn').click(function(){
		$('.contact-pop-up-form').fadeOut();
		$('body').removeClass('no-scroll')
	});
	$('.contact-pop-up .close-btn').click(function(){
		$('.contact-pop-up').fadeOut();
	});
	$( ".contact-pop-up" ).delay( 10000 ).fadeIn( 400 );
	
	//RO 12/03 - update links on sector case studies page 
    
    $('body.itemid-476 #g-main .blog-default .floatbox').each(function(){
        $(this).find('.element-itemlink').find('a').html('Read Sector Review');
    });
    
    //13/03 - mobile sticky nav
    
	stickyHeader();
    
    //RO 01/05/20 UPDATES - BLOG DATE AND CATEGORIES NEXT TO EACH OTHER
    
    $('body#landing .element-itemcreated, body#landing .element-itemcategory').wrapAll('<div class="blog-info"></div>')
	
    //RO NEW MENU LAYOUT - SINGLE MENU FOR BOTH DESKTOP AND MOBILE - 28/08
    mobileMenu();
    
    jQuery('ul.nav.menu li.parent').append('<span class="open"></span>')
    
//    jQuery('.mobile-menu-container li.parent .open').click(function(){
//        $(this).parent().children('ul').toggle();
////        $(this).css('background-color','red');
//    }); 


	//RO BLOG HEADER IMAGE POSTIONING - 08/10/20
    var HeaderImage =  $('body.news-template #yoo-zoo .pos-top .element-image img').attr('src');
    $('body.news-template #yoo-zoo .pos-top .element-image').css('background-image', 'url(' + HeaderImage + ')');


});

//STICKY HEADER FUNCTION 

jQuery( window ).resize(function() {
    stickyHeader();
    mobileMenu();
    
    window.onorientationchange = function(){

        var orientation = window.orientation;

        // Look at the value of window.orientation:
        
        if (orientation === 0){
            
            setTimeout(function(){ 
                mobileMenu();
            }, 1000);

        }

        else if (orientation === 90){
            
            setTimeout(function(){ 
                mobileMenu();
            }, 1000);

        }

    }

});

    function stickyHeader() {
    //09/03 - mobile sticky nav
    
    if (jQuery(window).width() < 768) {
        
        if ( jQuery( ".mobile-header-wrap" ).length ) {
 
//            alert('already there');

        } else {
            //        alert('working');
        
        jQuery('body:not("#careers-investors") #g-top,body:not("#careers-investors") #g-header,body:not("#careers-investors") .g-offcanvas-toggle').wrapAll('<div class="mobile-header-wrap"></div>');
        
        //setTimeout(function(){ 
            
			var mobileHeaderWrapHeight = jQuery('.mobile-header-wrap').outerHeight();
            jQuery('#g-page-surround').css('padding-top',mobileHeaderWrapHeight);
            
		//}, 1000);
        
        //REMOVE BREADCRUMB FROM HEADER
        
        jQuery('#g-header .breadcrumb.g-block').insertBefore('#g-main > .g-container');
        
        //CAREERS AREA HEADER ONLY
        
        jQuery('body#careers-investors #g-top-link,body#careers-investors #g-header,body#careers-investors .g-offcanvas-toggle').wrapAll('<div class="mobile-header-wrap"></div>');
        }
    
    } else {
        
        if (jQuery( ".mobile-header-wrap" ).length ) {
 
            jQuery('.g-offcanvas-toggle').unwrap();
            jQuery('#g-page-surround').css('padding-top',0);
            jQuery('#g-main .breadcrumb.g-block').appendTo('#g-header .g-grid:nth-child(2)');

        }
        
    }
}

/*
 * Smooth Scroll Magic
 * - page load
 * - anchor tags
 */
jQuery(document).ready(function($){
	smooth_scroll_magic(window.location.hash);
	jQuery('a[href*="#"]:not([href="#"])').click(function(e) {
		smooth_scroll_magic(this.hash, e);
	});
});
function smooth_scroll_magic(hash, e)
{
    if(hash === '')
		return false;
	var target = jQuery(hash);
	if(!target.length)
		target = jQuery('*[name="' + hash.substring(1) + '"]');
	if(!target.length)
		return false;
	if(typeof e !== 'undefined') {
		e.preventDefault();
		history.pushState(null, null, jQuery(e.target).attr('href'));
	}
	jQuery('html, body').animate({
		scrollTop: target.offset().top - 215
	}, 1000);
}

jQuery(window).resize(function(){ 
	//CAREERS - REASONS TO WORK FOR ECKOH 
	jQuery('.reasons-widget > div:nth-child(odd)').each(function(){
		var absoluteheight = jQuery(this).children('.uk-float-right').outerHeight();
		jQuery(this).css('min-height',absoluteheight);
//		alert(absoluteheight)
	});
	
	jQuery('.reasons-widget > div:nth-child(even)').each(function(){
		var absoluteheightabsolute = jQuery(this).children('div:nth-child(1)').outerHeight();
		jQuery(this).css('min-height',absoluteheightabsolute);
	});
});


//CASE STUDIES SLIDESHOW 

jQuery(function(){
	var i= 0;
	jQuery('.nextCircle').on("click", function(){
		i = i + 1;
		if (i == jQuery('.featured-casestudy li').length) {
			i=0;
		}
		var currentImg = jQuery('.featured-casestudy li').eq(i);
		var prevImg = jQuery('.featured-casestudy li').eq(i-1);
		animateImage(prevImg, currentImg);	
	});
	jQuery('.prevCircle').on("click", function(){
		if (i==0) {	
			prevImg = jQuery('.featured-casestudy li').eq(0);
			i=jQuery('.featured-casestudy li').length-1;
			currentImg = jQuery('.featured-casestudy li').eq(i);
		}
		else {
			i=i-1;
			currentImg = jQuery('.featured-casestudy li').eq(i);
			prevImg = jQuery('.featured-casestudy li').eq(i+1);
		}
		animateImageLeft(prevImg, currentImg);	
	});
	function animateImageLeft(prevImg, currentImg) {
		currentImg.css({"left":"100%"});
		currentImg.animate({"left":"0%"}, 0);
		prevImg.animate({"left":"-100%"}, 0);
	}
	function animateImage(prevImg, currentImg) {
		currentImg.css({"left":"-100%"});
		currentImg.animate({"left":"0%"}, 0);
		prevImg.animate({"left":"100%"}, 0);	
	}
});





//SEARCH 

jQuery(document).ready(function($){
	$('<div class="search-button"></div>').prependTo('.eckoh-search');
	
	$('.search-button').click(function(){
		$(this).toggleClass('open');
		
		$('.searcheckoh-search').toggle();
		$('.customeckoh-search').toggle();
		
	});
	
	$('.eckoh-search').parent().addClass('eckoh-parent');
	
});

 function mobileMenu() {
     
//     alert('executed');
     
     if (jQuery(window).width() < 1151 ) {
        
        jQuery('#navigation ul.nav').appendTo('.mobile-menu-container');
         
         

    } else if (jQuery(window).width() > 1150) {
        
        jQuery('.mobile-menu-container ul.nav').appendTo('#navigation ._menu');
        
    }
     
     if (jQuery(window).width() == 1194 ) {
        
        jQuery('#navigation ul.nav').appendTo('.mobile-menu-container');
         
    }
     
     jQuery('.mobile-menu-container li.parent .open').click(function(){
        
        jQuery(this).parent().children('ul').toggle();
//        $(this).css('background-color','red');
    }); 
    
    // console.log('your message');
     
 }


//jQuery(document).ready(function(){
//	jQuery('header#g-header .g-grid #announcement').css('padding', '0px');
//
//	if (jQuery('.bfModal').hasClass('yes'))
//	{
//		jQuery('#g-header').css('padding-top', '0px');
//		jQuery('body#careers-investors #g-header').css('padding-top', '0px');
//	}
//	if (jQuery('.bfModal').hasClass('no'))
//	{
//		jQuery('#g-header').css('padding-top', '45px');
//
//	}
//});

jQuery(document).ready(function(){
	jQuery('header#g-header .g-grid #announcement').css('padding', '0px');

	if (jQuery('.bfModal').hasClass('yes'))
	{
		jQuery('#g-header').css('padding-top', '0px');
		jQuery('body#careers-investors #g-header').css('padding-top', '0px');
	}
	if (jQuery('.bfModal').hasClass('no'))
	{
      jQuery('body').addClass('no-modal');
		jQuery('#g-header').css('padding-top', '45px');

	}
  
  jQuery('#go-to-uk').click(function(){
    jQuery('body').removeClass('no-modal');
  });
  jQuery('#stay-on-us').click(function(){
    jQuery('body').removeClass('no-modal');
  })
  
});

