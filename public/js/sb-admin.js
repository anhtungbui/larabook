/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/sb-admin.js":
/*!**********************************!*\
  !*** ./resources/js/sb-admin.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*!
    * Start Bootstrap - SB Admin Pro v1.3.0 (https://shop.startbootstrap.com/product/sb-admin-pro)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under SEE_LICENSE (https://github.com/StartBootstrap/sb-admin-pro/blob/master/LICENSE)
    */
(function ($) {
  "use strict"; // Enable Bootstrap tooltips via data-attributes globally

  $('[data-toggle="tooltip"]').tooltip(); // Enable Bootstrap popovers via data-attributes globally

  $('[data-toggle="popover"]').popover();
  $(".popover-dismiss").popover({
    trigger: "focus"
  }); // Add active state to sidbar nav links

  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

  $("#layoutSidenav_nav .sidenav a.nav-link").each(function () {
    if (this.href === path) {
      $(this).addClass("active");
    }
  }); // Toggle the side navigation

  $("#sidebarToggle").on("click", function (e) {
    e.preventDefault();
    $("body").toggleClass("sidenav-toggled");
  }); // Activate Feather icons

  feather.replace(); // Activate Bootstrap scrollspy for the sticky nav component

  $("body").scrollspy({
    target: "#stickyNav",
    offset: 82
  }); // Scrolls to an offset anchor when a sticky nav link is clicked

  $('.nav-sticky a.nav-link[href*="#"]:not([href="#"])').click(function () {
    if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");

      if (target.length) {
        $("html, body").animate({
          scrollTop: target.offset().top - 81
        }, 200);
        return false;
      }
    }
  }); // Click to collapse responsive sidebar

  $("#layoutSidenav_content").click(function () {
    var BOOTSTRAP_LG_WIDTH = 992;

    if (window.innerWidth >= 992) {
      return;
    }

    if ($("body").hasClass("sidenav-toggled")) {
      $("body").toggleClass("sidenav-toggled");
    }
  }); // Init sidebar

  var activatedPath = window.location.pathname.match(/([\w-]+\.html)/, '$1');

  if (activatedPath) {
    activatedPath = activatedPath[0];
  } else {
    activatedPath = 'index.html';
  }

  var targetAnchor = $('[href="' + activatedPath + '"]');
  var collapseAncestors = targetAnchor.parents('.collapse');
  targetAnchor.addClass('active');
  collapseAncestors.each(function () {
    $(this).addClass('show');
    $('[data-target="#' + this.id + '"]').removeClass('collapsed');
  });
})(jQuery);

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!******************************************************************!*\
  !*** multi ./resources/js/sb-admin.js ./resources/sass/app.scss ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/anhtungbui/code/laravel/larabook/resources/js/sb-admin.js */"./resources/js/sb-admin.js");
module.exports = __webpack_require__(/*! /Users/anhtungbui/code/laravel/larabook/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });