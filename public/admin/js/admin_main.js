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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 185);
/******/ })
/************************************************************************/
/******/ ({

/***/ 185:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(186);


/***/ }),

/***/ 186:
/***/ (function(module, exports, __webpack_require__) {


//Bootstrap
//require('../app/bootstrap.js');


//Vendor
//require('../../vendor/jquery/dropzone.js');
//require('../../vendor/autocomplete/jquery.autocomplete.js');

//Include rest of the js files Vue,Admin theme js,customjs

//require('../../../Views/admin/vue/vue');
__webpack_require__(187);
__webpack_require__(188);

/***/ }),

/***/ 187:
/***/ (function(module, exports) {



/***/ }),

/***/ 188:
/***/ (function(module, exports) {



//Adding active tag in side menu nav items
var CURRENT_URL = window.location.href.split('#')[0].split('?')[0];
$('.aside-body').find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active');
$('.aside-body').find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active');
$('.aside-body').find('a[href="' + CURRENT_URL + '"]').parents('ul').closest('li').addClass('active show');

console.log(CURRENT_URL);

/***/ })

/******/ });