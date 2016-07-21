function showCase() {
  $(".item-port").hover(function() {
      $(this).children('.info').fadeIn(500);
  }, function () {
      $(this).children('.info').fadeOut(500);
  });

  $("#feed-rss div").hover(function() {
      $(this).children('.info').fadeIn(500);
  }, function () {
      $(this).children('.info').fadeOut(500);
  });

}
