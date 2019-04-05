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
/******/ 	return __webpack_require__(__webpack_require__.s = 70);
/******/ })
/************************************************************************/
/******/ ({

/***/ 70:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(71);


/***/ }),

/***/ 71:
/***/ (function(module, exports) {

//////////////////////////////
// 						    //
//        PLUGINS           //
//                          //
//////////////////////////////

new WOW().init();

//////////////////////////////
// 					        //
//        NAVIGATION        //
//                          //
//////////////////////////////

$(document).ready(function () {

	var section = $('#ActualSection').data('section');
	var logo = $('.navbar .navbar-brand');
	var navbar = $('.navbar-default');

	function nav_logic() {

		switch (section) {

			//////// HOME /////////
			case "home":
				// $('body').css('padding-top','0');
				logo.css('opacity', '0');
				// $('.navbar .navbar-right').css('border-bottom', '1px solid white');
				navbar.addClass('home-nav');

				$(window).scroll(function () {
					var scrollPos = $(window).scrollTop();

					if (scrollPos > 250) {
						navbar.addClass('change-nav');
						logo.css('opacity', '100');
					} else {
						navbar.removeClass('change-nav');
						logo.css('opacity', '0');
					}
				});

				break;

			//////// PORTFOLIO /////////
			case "portfolio":

				navbar = $('.navbar-default');
				navbar.addClass('nav-portfolio');
				$('body').css('background-color', '#f9f9f9');
				$(window).scroll(function () {
					var scrollPos = $(window).scrollTop();

					if (scrollPos > 250) {
						navbar.addClass('change-nav');
					} else {
						navbar.removeClass('change-nav');
					}
				});

				break;

			//////// GENERIC /////////
			default:
				$(window).scroll(function () {

					var scrollPos = $(window).scrollTop(),
					    navbar = $('.navbar-default');

					if (scrollPos > 250) {
						navbar.addClass('change-nav');
					} else {
						navbar.removeClass('change-nav');
					}
				});
		}
	}
	// ----------- End Navigation Script ------------ //

	//Activate nav effects in desktop
	if (screen.width > 775) {
		nav_logic();
	}
}); // Document Ready

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgZDM1MjRjN2FiNjdmNGQxM2Q2YjIiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9qcy93ZWIvd2ViLmpzIl0sIm5hbWVzIjpbIldPVyIsImluaXQiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsInNlY3Rpb24iLCJkYXRhIiwibG9nbyIsIm5hdmJhciIsIm5hdl9sb2dpYyIsImNzcyIsImFkZENsYXNzIiwid2luZG93Iiwic2Nyb2xsIiwic2Nyb2xsUG9zIiwic2Nyb2xsVG9wIiwicmVtb3ZlQ2xhc3MiLCJzY3JlZW4iLCJ3aWR0aCJdLCJtYXBwaW5ncyI6IjtBQUFBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOzs7QUFHQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxtQ0FBMkIsMEJBQTBCLEVBQUU7QUFDdkQseUNBQWlDLGVBQWU7QUFDaEQ7QUFDQTtBQUNBOztBQUVBO0FBQ0EsOERBQXNELCtEQUErRDs7QUFFckg7QUFDQTs7QUFFQTtBQUNBOzs7Ozs7Ozs7Ozs7Ozs7O0FDN0RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsSUFBSUEsR0FBSixHQUFVQyxJQUFWOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUFDLEVBQUVDLFFBQUYsRUFBWUMsS0FBWixDQUFrQixZQUFZOztBQUU3QixLQUFJQyxVQUFnQkgsRUFBRSxnQkFBRixFQUFvQkksSUFBcEIsQ0FBeUIsU0FBekIsQ0FBcEI7QUFDQSxLQUFJQyxPQUFnQkwsRUFBRSx1QkFBRixDQUFwQjtBQUNBLEtBQUlNLFNBQWdCTixFQUFFLGlCQUFGLENBQXBCOztBQUVBLFVBQVNPLFNBQVQsR0FBcUI7O0FBRXBCLFVBQU9KLE9BQVA7O0FBRUM7QUFDQSxRQUFLLE1BQUw7QUFDQztBQUNBRSxTQUFLRyxHQUFMLENBQVMsU0FBVCxFQUFtQixHQUFuQjtBQUNBO0FBQ0FGLFdBQU9HLFFBQVAsQ0FBZ0IsVUFBaEI7O0FBRUFULE1BQUVVLE1BQUYsRUFBVUMsTUFBVixDQUFpQixZQUFXO0FBQzNCLFNBQUlDLFlBQVlaLEVBQUVVLE1BQUYsRUFBVUcsU0FBVixFQUFoQjs7QUFFQSxTQUFJRCxZQUFZLEdBQWhCLEVBQXFCO0FBQ3BCTixhQUFPRyxRQUFQLENBQWdCLFlBQWhCO0FBQ0FKLFdBQUtHLEdBQUwsQ0FBUyxTQUFULEVBQW1CLEtBQW5CO0FBQ0EsTUFIRCxNQUdPO0FBQ05GLGFBQU9RLFdBQVAsQ0FBbUIsWUFBbkI7QUFDQVQsV0FBS0csR0FBTCxDQUFTLFNBQVQsRUFBbUIsR0FBbkI7QUFDQTtBQUNELEtBVkQ7O0FBWUQ7O0FBRUE7QUFDQSxRQUFLLFdBQUw7O0FBRUNGLGFBQVNOLEVBQUUsaUJBQUYsQ0FBVDtBQUNBTSxXQUFPRyxRQUFQLENBQWdCLGVBQWhCO0FBQ0FULE1BQUUsTUFBRixFQUFVUSxHQUFWLENBQWMsa0JBQWQsRUFBaUMsU0FBakM7QUFDQVIsTUFBRVUsTUFBRixFQUFVQyxNQUFWLENBQWlCLFlBQVc7QUFDM0IsU0FBSUMsWUFBWVosRUFBRVUsTUFBRixFQUFVRyxTQUFWLEVBQWhCOztBQUVBLFNBQUlELFlBQVksR0FBaEIsRUFBcUI7QUFDcEJOLGFBQU9HLFFBQVAsQ0FBZ0IsWUFBaEI7QUFDQSxNQUZELE1BRU87QUFDTkgsYUFBT1EsV0FBUCxDQUFtQixZQUFuQjtBQUNBO0FBQ0QsS0FSRDs7QUFVRDs7QUFHQTtBQUNBO0FBQ0NkLE1BQUVVLE1BQUYsRUFBVUMsTUFBVixDQUFpQixZQUFXOztBQUUzQixTQUFJQyxZQUFZWixFQUFFVSxNQUFGLEVBQVVHLFNBQVYsRUFBaEI7QUFBQSxTQUNBUCxTQUFXTixFQUFFLGlCQUFGLENBRFg7O0FBR0EsU0FBSVksWUFBWSxHQUFoQixFQUFxQjtBQUNwQk4sYUFBT0csUUFBUCxDQUFnQixZQUFoQjtBQUNBLE1BRkQsTUFFTztBQUNOSCxhQUFPUSxXQUFQLENBQW1CLFlBQW5CO0FBQ0E7QUFDRCxLQVZEO0FBNUNGO0FBeURHO0FBQ0Q7O0FBRUE7QUFDSCxLQUFJQyxPQUFPQyxLQUFQLEdBQWUsR0FBbkIsRUFBd0I7QUFDakJUO0FBQ0w7QUFHRixDQTFFRCxFLENBMEVJLGlCIiwiZmlsZSI6Ii9qcy93ZWIuanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCIvXCI7XG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gNzApO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHdlYnBhY2svYm9vdHN0cmFwIGQzNTI0YzdhYjY3ZjRkMTNkNmIyIiwiLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vXHJcbi8vIFx0XHRcdFx0XHRcdCAgICAvL1xyXG4vLyAgICAgICAgUExVR0lOUyAgICAgICAgICAgLy9cclxuLy8gICAgICAgICAgICAgICAgICAgICAgICAgIC8vXHJcbi8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vL1xyXG5cclxubmV3IFdPVygpLmluaXQoKTtcclxuXHJcbi8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vL1xyXG4vLyBcdFx0XHRcdFx0ICAgICAgICAvL1xyXG4vLyAgICAgICAgTkFWSUdBVElPTiAgICAgICAgLy9cclxuLy8gICAgICAgICAgICAgICAgICAgICAgICAgIC8vXHJcbi8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vL1xyXG5cclxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xyXG5cclxuXHR2YXIgc2VjdGlvbiAgICAgICA9ICQoJyNBY3R1YWxTZWN0aW9uJykuZGF0YSgnc2VjdGlvbicpO1xyXG5cdHZhciBsb2dvICAgICAgICAgID0gJCgnLm5hdmJhciAubmF2YmFyLWJyYW5kJyk7XHJcblx0dmFyIG5hdmJhciAgICAgICAgPSAkKCcubmF2YmFyLWRlZmF1bHQnKTtcclxuXHJcblx0ZnVuY3Rpb24gbmF2X2xvZ2ljKCkge1xyXG5cclxuXHRcdHN3aXRjaChzZWN0aW9uKSB7XHJcblxyXG5cdFx0XHQvLy8vLy8vLyBIT01FIC8vLy8vLy8vL1xyXG5cdFx0XHRjYXNlIFwiaG9tZVwiOlxyXG5cdFx0XHRcdC8vICQoJ2JvZHknKS5jc3MoJ3BhZGRpbmctdG9wJywnMCcpO1xyXG5cdFx0XHRcdGxvZ28uY3NzKCdvcGFjaXR5JywnMCcpO1xyXG5cdFx0XHRcdC8vICQoJy5uYXZiYXIgLm5hdmJhci1yaWdodCcpLmNzcygnYm9yZGVyLWJvdHRvbScsICcxcHggc29saWQgd2hpdGUnKTtcclxuXHRcdFx0XHRuYXZiYXIuYWRkQ2xhc3MoJ2hvbWUtbmF2Jyk7XHJcblxyXG5cdFx0XHRcdCQod2luZG93KS5zY3JvbGwoZnVuY3Rpb24oKSB7XHJcblx0XHRcdFx0XHR2YXIgc2Nyb2xsUG9zID0gJCh3aW5kb3cpLnNjcm9sbFRvcCgpO1xyXG5cclxuXHRcdFx0XHRcdGlmIChzY3JvbGxQb3MgPiAyNTApIHtcclxuXHRcdFx0XHRcdFx0bmF2YmFyLmFkZENsYXNzKCdjaGFuZ2UtbmF2Jyk7XHJcblx0XHRcdFx0XHRcdGxvZ28uY3NzKCdvcGFjaXR5JywnMTAwJyk7XHJcblx0XHRcdFx0XHR9IGVsc2Uge1xyXG5cdFx0XHRcdFx0XHRuYXZiYXIucmVtb3ZlQ2xhc3MoJ2NoYW5nZS1uYXYnKTtcclxuXHRcdFx0XHRcdFx0bG9nby5jc3MoJ29wYWNpdHknLCcwJyk7XHJcblx0XHRcdFx0XHR9XHJcblx0XHRcdFx0fSk7XHJcblxyXG5cdFx0XHRicmVhaztcclxuXHJcblx0XHRcdC8vLy8vLy8vIFBPUlRGT0xJTyAvLy8vLy8vLy9cclxuXHRcdFx0Y2FzZSBcInBvcnRmb2xpb1wiOlxyXG5cclxuXHRcdFx0XHRuYXZiYXIgPSAkKCcubmF2YmFyLWRlZmF1bHQnKTtcdFx0XHJcblx0XHRcdFx0bmF2YmFyLmFkZENsYXNzKCduYXYtcG9ydGZvbGlvJyk7XHJcblx0XHRcdFx0JCgnYm9keScpLmNzcygnYmFja2dyb3VuZC1jb2xvcicsJyNmOWY5ZjknKTtcclxuXHRcdFx0XHQkKHdpbmRvdykuc2Nyb2xsKGZ1bmN0aW9uKCkge1xyXG5cdFx0XHRcdFx0dmFyIHNjcm9sbFBvcyA9ICQod2luZG93KS5zY3JvbGxUb3AoKTtcclxuXHJcblx0XHRcdFx0XHRpZiAoc2Nyb2xsUG9zID4gMjUwKSB7XHJcblx0XHRcdFx0XHRcdG5hdmJhci5hZGRDbGFzcygnY2hhbmdlLW5hdicpO1xyXG5cdFx0XHRcdFx0fSBlbHNlIHtcclxuXHRcdFx0XHRcdFx0bmF2YmFyLnJlbW92ZUNsYXNzKCdjaGFuZ2UtbmF2Jyk7XHJcblx0XHRcdFx0XHR9XHJcblx0XHRcdFx0fSk7XHJcblxyXG5cdFx0XHRicmVhaztcclxuXHJcblxyXG5cdFx0XHQvLy8vLy8vLyBHRU5FUklDIC8vLy8vLy8vL1xyXG5cdFx0XHRkZWZhdWx0OlxyXG5cdFx0XHRcdCQod2luZG93KS5zY3JvbGwoZnVuY3Rpb24oKSB7XHJcblx0XHRcdFx0XHRcclxuXHRcdFx0XHRcdHZhciBzY3JvbGxQb3MgPSAkKHdpbmRvdykuc2Nyb2xsVG9wKCksXHJcblx0XHRcdFx0XHRuYXZiYXIgICA9ICQoJy5uYXZiYXItZGVmYXVsdCcpO1xyXG5cdFx0XHRcdFx0XHJcblx0XHRcdFx0XHRpZiAoc2Nyb2xsUG9zID4gMjUwKSB7XHJcblx0XHRcdFx0XHRcdG5hdmJhci5hZGRDbGFzcygnY2hhbmdlLW5hdicpO1xyXG5cdFx0XHRcdFx0fSBlbHNlIHtcclxuXHRcdFx0XHRcdFx0bmF2YmFyLnJlbW92ZUNsYXNzKCdjaGFuZ2UtbmF2Jyk7XHJcblx0XHRcdFx0XHR9XHJcblx0XHRcdFx0fSk7XHJcblx0ICAgIH1cclxuXHJcbiAgICB9XHJcbiAgICAvLyAtLS0tLS0tLS0tLSBFbmQgTmF2aWdhdGlvbiBTY3JpcHQgLS0tLS0tLS0tLS0tIC8vXHJcblxyXG4gICAgLy9BY3RpdmF0ZSBuYXYgZWZmZWN0cyBpbiBkZXNrdG9wXHJcblx0aWYgKHNjcmVlbi53aWR0aCA+IDc3NSkge1xyXG4gICAgICAgIG5hdl9sb2dpYygpO1xyXG4gXHR9IFxyXG5cclxuXHJcbn0pOyAvLyBEb2N1bWVudCBSZWFkeVxyXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3dlYi93ZWIuanMiXSwic291cmNlUm9vdCI6IiJ9