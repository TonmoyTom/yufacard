$(function () {
  // aos animation initialisation
  AOS.init({
    duration: 2000,
    once: true,
  });
  // owl carousel script starts
  if ($("#people-carousel").length) {
    $("#people-carousel").owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplaySpeed: 2000,
      autoplayHoverPause: true,
      autoWidth: true,
      dots: true,
      margin: 25,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
        },
        320: {
          items: 1,
        }
      }
    });
  }

  if ($('#content-carousel').length) {
    var o1 = $('#content-carousel');
    o1.owlCarousel({
      items: 1,
      singleItem: true,
      loop: true,
      margin: 10,
      pagination: false,
      dots: true,
      navigation: true,
      touchDrag: true,
      mouseDrag: false,
      afterMove: function (elem) {
        var current = this.currentItem;
        o2.trigger('owl.goTo', current);
      }
    });

  }

  if ($('#image-carousel').length) {
    var o2 = $('#image-carousel')
    o2.owlCarousel({
      items: 1,
      singleItem: true,
      loop: true,
      dots: false,
      margin: 10,
      animateOut: 'fadeOut',
      pagination: false,
      navigation: true,
      touchDrag: true,
      mouseDrag: false,
      afterMove: function (elem) {
        var current = this.currentItem;
        o1.trigger('owl.goTo', current);
      }
    });
    o1.on('changed.owl.carousel', function (event) {
      o2.trigger('next.owl.carousel');
    });
  }

  // scroll header script here
  window.onscroll = function () { scrollHeader() };
  // Get the header
  var header = $("#header");
  var body = $("body");
  function scrollHeader() {
    // adding sticky class 
    if (window.pageYOffset > 124) {
      $(header).addClass("sticky");
      $(body).addClass('scroll-height');
    } else {
      // removing sticky class
      $(header).removeClass("sticky");
      $(body).removeClass('scroll-height');
    }
  }

  // navbar toggler script
  $(".navbar-toggler").on('click', (function () {
    $(".collapse").toggleClass('show');
    $('body').toggleClass('layer-open');
    $(header).toggleClass("sticky-not");
    $('.dark-overlay').click(function () {
      $(".collapse").removeClass('show');
      $("body").removeClass('layer-open');
    });
  }));

  // model close script
  $(".bd-example-modal-xl").on('hidden.bs.modal', function (e) {
    $(".bd-example-modal-xl iframe").attr("src", $(".bd-example-modal-xl iframe").attr("src"));
  });
});
