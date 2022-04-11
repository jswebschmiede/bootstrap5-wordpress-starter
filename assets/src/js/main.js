// Webpack Imports
import * as bootstrap from "bootstrap";
import AOS from "aos";
import Swiper from "swiper/bundle";
import $ from "jquery";
import "bs5-lightbox";

window.jQuery = $;
window.$ = $;

function isMobile(width) {
  var windowWidth = window.innerWidth;
  var ismobile = window.innerWidth <= width ? true : false;
  return ismobile;
}

var swiper = new Swiper(".timeline", {
  slidesPerView: 3,
  spaceBetween: 30,
  freeMode: false,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  scrollbar: {
    el: ".swiper-scrollbar",
    draggable: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 40,
    },

    780: {
      slidesPerView: 2,
      spaceBetween: 30,
    },

    1024: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
  mousewheel: false,
});

(function () {
  "use strict";

  AOS.init({
    duration: 950,
  });

  $(".open-menu,.close").on("click", function (ev) {
    if ($(".menu-overlay").hasClass("open")) {
      $(".menu-overlay").removeClass("open");
    } else {
      $(".menu-overlay").addClass("open");
    }

    ev.preventDefault();
  });

  // Focus input if Searchform is empty
  [].forEach.call(document.querySelectorAll(".search-form"), (el) => {
    el.addEventListener("submit", function (e) {
      var search = el.querySelector("input");
      if (search.value.length < 1) {
        e.preventDefault();
        search.focus();
      }
    });
  });

  //Preloader
  let preloaderFadeOutTime = 800;
  function hidePreloader() {
    var preloader = $(".spinner-wrapper");
    preloader.delay(500).fadeOut(preloaderFadeOutTime);
  }
  hidePreloader();
})();

// When the user scrolls the page, execute myFunction
window.onscroll = function () {
  setSticky();
  setShrink();
};

// Get the navbar
var navbar = document.getElementById("navbar");
var navbarShrink = document.getElementById("navbar__shrink");

if (navbar) {
  // Get the offset position of the navbar
  var sticky = navbar.offsetTop;
}

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function setSticky() {
  if (navbar) {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky");
    } else {
      navbar.classList.remove("sticky");
    }
  }
}

function setShrink() {
  if (!isMobile(768)) {
    if (navbarShrink) {
      if (window.pageYOffset >= 1) {
        navbarShrink.classList.add("shrink");
        $(".wrapper").css("margin-top", 0);
      } else {
        navbarShrink.classList.remove("shrink");
        $(".wrapper").css("margin-top", 120);
      }
    }
  }
}

