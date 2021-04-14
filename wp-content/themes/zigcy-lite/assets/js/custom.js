(function ($) { 
'use strict';


/* Browse Category Menu  Toggle */ 
$(".browse-category-wrap").click(function () {
   $(".categorylist").toggleClass('sm-cat-menu-active');
});

//for slider

$('.store-mart-lite-banner').owlCarousel({
    dots:true,
    items:1
   
});

/**
* Back to top button
*/
$('.sml-scrollup').hide();
var offset = 250;
var duration = 1000;
$(window).scroll(function() {
    if ($(this).scrollTop() > offset) {
        $('.sml-scrollup').fadeIn(duration);
    } else {
        $('.sml-scrollup').fadeOut(duration);
    }
});

$('body').on('click', '.sml-scrollup', function () {
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, duration);
    return false;
})

//Header Search toggle
$('body').on('click','.sml-search-icon-wrap .sml-search-icon',function(){
$('.sml-search-icon-wrap .search-form-wrap').toggleClass('search-active');

});
//search close
$('body').on('click','.sml-search-icon-wrap .btn-hide', function(){
$('.sml-search-icon-wrap .search-form-wrap').removeClass('search-active');

});

//for client slider

$('.store-mart-lite-logo-wrapper').owlCarousel({
    //loop:true,
    nav:true,
    items:5,
    //margin:120,
    responsive:{
        0:{
            items:1,
     
        },
        400:{
            items:2,
        },
        600:{
            items:3,
        },
         700:{
            items:4,
        },
        1000:{
            items:5,
        }
    }

   
});

//product slider
$('.smlwbs-wrap > .sml-products').each(function () {
    var $smwbs = $(this);
    $smwbs.slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: false,
      dots: true,
      responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]

    });
});

/**
  * Mobile navigation toggles
  * 
  */

  function zigcyLiteFocusForce(focEl){
    var _doc = document;
    setTimeout( function() {
    focEl = _doc.querySelector( focEl );
    focEl.focus();

    }, 100 );
  }

/* Toggle mobile menu on click toggle icon */
$('body').on('click keypress touchstart','.mob-nav-wrapper .mob-hiriz-wrapp .menu-toggle', function(){
  $('.mob-side-nav-wrapp').addClass('active');
  zigcyLiteFocusForce('.mob-side-nav-wrapp.active .menu-wrapp-outer ul li:first-child a');
})

/* close mobile menu on click toggle icon */
$('body').on('click keypress touchstart','.mob-nav-wrapper .mob-nav-close', function(){
  $('.mob-side-nav-wrapp').removeClass('active');
  zigcyLiteFocusForce('button.btn-transparent-toggle.menu-toggle');
})

/**
* Zigcy Mobile sub-menu
*
*/

jQuery('.mob-nav-wrapper .menu-primary-menu-container ul li ul').wrap('<div class="sub-wrap"></div>');

$('.mob-nav-wrapper .menu-primary-menu-container ul li ul').slideUp();

$('<div class="sub-toggle"><button type="button" class="sub-toggle"> <span class="lnr lnr-chevron-right"></span> </button></div>').insertBefore('.mob-nav-wrapper .menu-item-has-children ul');
$('<div class="sub-toggle-children"><button type="button" class="sub-toggle"> <span class="lnr lnr-chevron-right"></span> </button></div>').insertBefore('.mob-nav-wrapper .page_item_has_children ul');



$('body').on('vclick keypress touchstart','.mob-nav-wrapper .sub-wrap .sub-toggle', function()  {
  $(this).next('ul.sub-menu').slideToggle(400);
  $(this).parent('li').toggleClass('mob-menu-toggle');
});

$('body').on('vclick keypress touchstart','.mob-nav-wrapper .sub-wrap .sub-toggle-children',function() {
  $(this).next('ul.sub-menu').slideToggle(400);
    
});

//fix for YITH Wishlist
$('body').on('click','.sml-add-to-wishlist-wrap .add-to-wishlist-custom', function(){
  
  $(this).children('.yith-wcwl-wishlistexistsbrowse').removeClass('hide').addClass('show');
  $(this).children('.yith-wcwl-wishlistexistsbrowse').show();

});

SmoothScroll({
   // Scrolling Core
    animationTime    : 900, // [ms]
    stepSize         : 100, // [px]
 })

$(window).on('load', function () {
    $('.zigcy-cta-wrap .elementor-column-wrap').jarallax({
        speed: 0.2
    });
});

} )( jQuery );

