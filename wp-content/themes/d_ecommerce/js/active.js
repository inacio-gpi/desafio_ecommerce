(function ($) {
  $(document).on("ready", function () {
    
    $(".btn-search").on("click", function () {
      $(".input").toggleClass("inclicked");
      $(".btn-search").toggleClass("close");
    });
    $(".module.widget-handle").click(function () {
      $(this).toggleClass("toggle-search");
    });

    // mobile
    $(".mobile-toggle").click(function () {
      $(".nav-bar").toggleClass("nav-open");
      $(this).toggleClass("active");
      $(".search-widget-handle").toggleClass("hidden-xs hidden-sm");
    });

    $(".module.widget-handle").click(function () {
      $(this).toggleClass("toggle-search");
    });

    $(".search-widget-handle .search-form input").click(function (e) {
      if (!e) e = window.event;
      e.stopPropagation();
    });
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
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>',
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
  }, 2000);
})(jQuery);
