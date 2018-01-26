// navigation slide-in
$(window).load(function() {
  $('.nav_slide_button').click(function() {
    $('.pull').slideToggle();
  });
});

var today = new Date().toISOString().split('T')[0];
$('#datepicker')[0].setAttribute('min', today);