$(document).ready(function() {
  $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function() {
      $(this).toggleClass('open');
      $('.side_menu').toggleClass('menu_active');
      $('.main-content').toggleClass('main-content-active');
  });

  $('.uslink').click(function() {
    $('.drpdwn-main').slideToggle();
    $(this).toggleClass('active');
});
$('.tdrop').click(function() {
  $(this).toggleClass('active');
});
});


$('.overlay').click(function() {
  $('.side_menu').removeClass('menu_active');
  $('#nav-icon1').removeClass('open');
});


/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}