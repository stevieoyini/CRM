$(document).ready(function() {
  $('.menu li').each(function(index) {
      $(this).hide().delay(index * 100).fadeIn(2000);
  });
});