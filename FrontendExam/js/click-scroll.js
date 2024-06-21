$(document).ready(function() {
  var sectionArray = [1, 2, 3, 4, 5];

  // Attach the event listener to a parent element
  $(document).on("scroll", function() {
    $.each(sectionArray, function(index, value) {
      var offsetSection = $("#" + "section_" + value).offset().top - 88;
      var docScroll = $(document).scrollTop();
      var docScroll1 = docScroll + 1;

      if (docScroll1 >= offsetSection) {
        $(".navbar-nav .nav-item .nav-link").removeClass("active");
        $(".navbar-nav .nav-item .nav-link:link").addClass("inactive");
        $(".navbar-nav .nav-item .nav-link").eq(index).addClass("active");
        $(".navbar-nav .nav-item .nav-link").eq(index).removeClass("inactive");
      }
    });
  });

  $(document).on("click", ".click-scroll", function(e) {
    var index = $(".click-scroll").index(this);
    var offsetClick = $("#" + "section_" + (index + 1)).offset().top - 88;
    e.preventDefault();
    $("html, body").animate(
      {
        scrollTop: offsetClick
      },
      300
    );
  });

  $(".navbar-nav .nav-item .nav-link:link").addClass("inactive");
  $(".navbar-nav .nav-item .nav-link").eq(0).addClass("active");
  $(".navbar-nav .nav-item .nav-link:link").eq(0).removeClass("inactive");
});
