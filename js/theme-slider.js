
jQuery(function() {
// Flexslider script loader

$startWidth = Modernizr.mq('(min-width: 42em)'); //672px
//$isIE8 = jQuery('html').hasClass('ie8');

if ($startWidth && 'querySelector' in document && 'localStorage' in window && 'addEventListener' in window) {
	// scripts get the defualt slider current slick
	jQuery.getScript( "../sites/all/themes/common/js/slick.min.js")
	.done(function( script, textStatus ) {
    console.log( textStatus );
	
	/*//Slick slider init responsive content slider  */
	  // If the slideloader.js has been sucessful in the slick slider settings
	  function InitSlider () {
		
		/* NOTES:
		Settings for a Feed scroller these are probally site specific so see http://kenwheeler.github.io/slick/
		*/
		
		// Gallery settings
		jQuery('.slideshow ul').slick({
  	slidesToShow: 1,
  	slidesToScroll: 1,
  	arrows: false,
  	fade: true,
  	asNavFor: '.thumbnails ul'
	});
	jQuery('.thumbnails ul').slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  asNavFor: '.slideshow ul',
  centerMode: false,
  focusOnSelect: true
});
			
			
	  	
	  	jQuery('.d-feed--behaviour-slider .d-feed__body').slick({
  	infinite: false,
  	speed: 300,
  	slidesToShow: 3,
  	slidesToScroll: 1,
  	responsive: [
  	{
      breakpoint: 1366,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 960,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
	/* NOTE: 
	We don't load the sider untill 672px using the sliderloader in common
	*/

  ]
		});
		
	
	  }; // END INIT SLIDER
	
	
      // INIT FUNCTIONS for All JS Browsers -------------------------------------------------- 
      
	  // USELESS USELESS IE HAS TOTLLY DIFFERENT ONLOAD EVENT TO OTHER BROWSERS!!!!
	   //jQuery(window).bind("load", function() {
		InitSlider ();
	
  	});  //end getSript
	
	
	
} //end if

});