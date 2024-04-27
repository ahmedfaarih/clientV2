function openNav() {
  document.getElementById("myNav").style.height = "100%";
     document.getElementById("nav1").style.display = "none";
    document.getElementById("nav2").style.display = "block";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
    document.getElementById("nav2").style.display = "none";
    document.getElementById("nav1").style.display = "block";
}


 // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 57)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Scroll to top button appear
  $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });


