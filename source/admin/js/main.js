(function ($) {
  "use strict";

  // Spinner
  var spinner = function () {
    setTimeout(function () {
      if ($("#spinner").length > 0) {
        $("#spinner").removeClass("show");
      }
    }, 1);
  };
  spinner();

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Sidebar Toggler
  $(".sidebar-toggler").click(function () {
    $(".sidebar, .content").toggleClass("open");
    return false;
  });
})(jQuery);

// Select all nav links inside the navbar
const navLinks = document.querySelectorAll("#nav_bar_items .nav-link");

// Get the current full path of the page
const currentPath = window.location.pathname;

// Loop through each nav link
navLinks.forEach((link) => {
  // Get the full path of the link's href relative to the current directory
  const linkPath = link.getAttribute("href");

  // Check if the currentPath ends with the linkPath
  if (currentPath.includes(linkPath)) {
    // Remove 'active' from all nav links
    navLinks.forEach((nav) => nav.classList.remove("active"));

    // Add 'active' to the matching link
    link.classList.add("active");
  }
});
