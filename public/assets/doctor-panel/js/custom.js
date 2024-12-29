$(document).ready(function () {
  $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
    $(this).toggleClass('open');
    $('.side_menu').toggleClass('menu_active');
    $('.main-content').toggleClass('main-content-active');
  });

  $('.uslink').click(function () {
    $('.drpdwn-main').slideToggle();
    $(this).toggleClass('active');
  });

  $('.tdrop').click(function () {
    $(this).toggleClass('active');
  });
});


$('.overlay').click(function () {
  $('.side_menu').removeClass('menu_active');
  $('#nav-icon1').removeClass('open');
});


/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
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
$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  dots: false,
  autoPlay: true,
  nav: false,
  items: 1,
});

var x, i, j, l, ll, selElmnt, a, b, c;

x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;

  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);

  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {

    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function (e) {

      var y, i, k, s, h, sl, yl;
      s = this.parentNode.parentNode.getElementsByTagName("select")[0];
      sl = s.length;
      h = this.parentNode.previousSibling;
      for (i = 0; i < sl; i++) {
        if (s.options[i].innerHTML == this.innerHTML) {
          s.selectedIndex = i;
          h.innerHTML = this.innerHTML;
          y = this.parentNode.getElementsByClassName("same-as-selected");
          yl = y.length;
          for (k = 0; k < yl; k++) {
            y[k].removeAttribute("class");
          }
          this.setAttribute("class", "same-as-selected");
          break;
        }
      }
      h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function (e) {
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}
function closeAllSelect(elmnt) {
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
document.addEventListener("click", closeAllSelect);

$(document).ready(function () {
  // Toggle the dropdown on click
  $('.job_hiring').click(function (e) {
    e.stopPropagation(); // Prevent click event from bubbling up
    $(this).find('.drpdwn-job').slideToggle(); // Toggle only the clicked dropdown
    $(this).toggleClass('active');
  });

  // Close the dropdown when clicking anywhere outside of it
  $(document).click(function () {
    $('.drpdwn-job').slideUp(); // Hide all dropdowns
    $('.job_hiring').removeClass('active'); // Remove active class from all menu items
  });

  // Prevent closing the dropdown when clicking inside it
  $('.drpdwn-job').click(function (e) {
    e.stopPropagation();
  });
});
$(document).ready(function () {
  // Toggle the dropdown on click
  $('.ads_post').click(function (e) {
    e.stopPropagation(); // Prevent click event from bubbling up
    $(this).find('.drpdwn-job').slideToggle(); // Toggle only the clicked dropdown
    $(this).toggleClass('active');
  });

  // Close the dropdown when clicking anywhere outside of it
  $(document).click(function () {
    $('.drpdwn-job').slideUp(); // Hide all dropdowns
    $('.ads_post').removeClass('active'); // Remove active class from all menu items
  });

  // Prevent closing the dropdown when clicking inside it
  $('.drpdwn-job').click(function (e) {
    e.stopPropagation();
  });
});

const $sidebarLink = $('.sidebar-link');
$sidebarLink.on('click', function () {
  const $arrowIcon = $(this).find('.arrow-toggle');
  $arrowIcon.toggleClass('arrow-toggled');
});

function handleSidebar() {
  if ($(window).width() >= 992) {
    // Code for screens 992px and wider
    $("#openSidebar").off("click").on("click", function() {
      $(this).hide();
      $(this).removeClass("d-flex");
      $("#closeSidebar").show();
      $(".sidebar").show();
      $(".main-content").removeClass("w-100 mx-auto");
    });

    $("#closeSidebar").off("click").on("click", function() {
      $(this).hide();
      $("#openSidebar").show();
      $("#openSidebar").addClass("d-flex");
      $(".sidebar").hide();
      $(".main-content").addClass("w-100 mx-auto");
    });
  } else {
    // Code for screens less than 992px
    $("#openSidebar").off("click").on("click", function() {
      $(this).hide();
      $("#closeSidebar").show();
      $(".sidebar").css("left","0");
    });

    $("#closeSidebar").off("click").on("click", function() {
      $(this).hide();
      $("#openSidebar").show();
      $(".sidebar").css("left","-100%");
    });
  }
}

// Run on initial load
handleSidebar();

// Re-evaluate on window resize
$(window).resize(handleSidebar);
