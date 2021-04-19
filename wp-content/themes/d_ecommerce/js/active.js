(function ($) {
  $(document).on("ready", function () {
    /* Mobile Menu */

    // $(".menu").slicknav({
    //   prependTo: ".mobile-nav",
    //   duration: 300,
    //   animateIn: "fadeIn",
    //   animateOut: "fadeOut",
    //   closeOnClick: true,
    // });

    /* scrool to Header */

    // jQuery(window).on("scroll", function () {
    //   if ($(this).scrollTop() > 200) {
    //     $(".header").addClass("sticky");
    //   } else {
    //     $(".header").removeClass("sticky");
    //   }
    // });

    /* Popular Slider */

    $(".popular-slider").owlCarousel({
      items: 1,
      autoplay: true,
      autoplayTimeout: 5000,
      smartSpeed: 400,
      animateIn: "fadeIn",
      animateOut: "fadeOut",
      autoplayHoverPause: true,
      loop: true,
      nav: true,
      merge: true,
      dots: false,
      navText: [
        '<i class="ti-angle-left"></i>',
        '<i class="ti-angle-right"></i>',
      ],
      responsive: {
        0: {
          items: 1,
        },
        300: {
          items: 1,
        },
        480: {
          items: 2,
        },
        768: {
          items: 3,
        },
        1170: {
          items: 4,
        },
      },
    });
    /* Scroll back to header */
    $.scrollUp({
      scrollText: '<span><i class="fa fa-angle-up"></i></span>',
      easingType: "easeInOutExpo",
      scrollSpeed: 900,
      animation: "fade",
    });
  });

  /* 18. Nice Select JS */
  $("select").niceSelect();

  /* Preloader JS */
  // After 2s of screen ready, preloader is hide
  $(".preloader").delay(2000).fadeOut("slow");
  setTimeout(function () {
    //After 2s, the no-scroll class of the body will be removed
    $("body").removeClass("no-scroll");
  }, 2000); //Here you can change preloader time
  // teste
})(jQuery);
