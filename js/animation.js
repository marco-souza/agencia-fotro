function showCase() {
  $(".item").hover(function() {
      $(this).children('.info').fadeIn(500);
  }, function () {
      $(this).children('.info').fadeOut(500);
  });
}

function changeImage(item1, item2, time) {

}

$(document).ready(function() {

  $("#mobi-menu").slideToggle(0);

  $('#message').autogrow();
  $('#message').css('overflow', 'hidden').autogrow();

  // Menu

  $(".menu-btn").click(function() {
    $("#mobi-menu").slideToggle('slow');
  });

  // Slide using Slick Carousel
  // $('slick').slick({
  //   slide: 'img',
  //   autoplay: false,
  //   autoplaySpeed: 4000,
  //   accessibility: true,
  //   arrows: false,
  //   infinite: true,
  //   pauseonhover: true,
  //   responsive: true
  //   // swipe: true,
  //   // touchmove: true
  // });

});
