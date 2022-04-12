// Webpack Imports
import * as bootstrap from "bootstrap";
import "bs5-lightbox";

(function () {
  "use strict";

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
