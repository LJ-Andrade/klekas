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
/******/ 	return __webpack_require__(__webpack_require__.s = 80);
/******/ })
/************************************************************************/
/******/ ({

/***/ 80:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(81);


/***/ }),

/***/ 81:
/***/ (function(module, exports) {

/*
|--------------------------------------------------------------------------
| SERIALIZABLE LIST UPDATER
|--------------------------------------------------------------------------
*/

// Changes values from columns of a list.
// -------------------------------------------
window.dataSetter = function (fields) {
    var row = $('.SerializableItem');
    items = [];

    $(row).each(function () {
        // This is the row id
        var id = $(this).data('id');

        item = {};
        // Store row id in array
        item['id'] = id;

        item['fields'] = {};
        // Store columns data in array
        for (var i = 0; i < fields.length; i++) {
            var field = $(this).children(fields[i]).children('input').data('field');
            item['fields'][field] = $(this).children(fields[i]).children('input').val();
        }

        // Push row with cols data to array
        items.push(item);
    });
    console.info(items);
};

$(document).ready(function () {
    $(document).on("click", "#UpdateList", function () {
        if (items == undefined || items == '' || items == null) {
            alert_error("", "Aún no se realizaron cambios");
        } else {
            var route = $(this).data("route");
            updateList(items, route);
        }
    });
});

function updateList(items, route) {
    $.ajax({
        url: route,
        method: 'POST',
        dataType: 'JSON',
        data: { data: items },
        success: function success(data) {
            console.log(data);
            alert_ok('OK!', 'Items actualizados');
        },
        error: function error(data) {
            // $('#Error').html(data.responseText);
            alert_error("", "Ha ingresado un dato incorrecto. Solo puede ingresar números enteros positivos.");
            console.log("Error en updateList()");
            console.log(data);
        }
    });
}

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgZDI2ZTM3ZTM1ZDNjNDMyOWNmMzgiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9qcy92YWRtaW4tZHluYW1pYy1mb3Jtcy5qcyJdLCJuYW1lcyI6WyJ3aW5kb3ciLCJkYXRhU2V0dGVyIiwiZmllbGRzIiwicm93IiwiJCIsIml0ZW1zIiwiZWFjaCIsImlkIiwiZGF0YSIsIml0ZW0iLCJpIiwibGVuZ3RoIiwiZmllbGQiLCJjaGlsZHJlbiIsInZhbCIsInB1c2giLCJjb25zb2xlIiwiaW5mbyIsImRvY3VtZW50IiwicmVhZHkiLCJvbiIsInVuZGVmaW5lZCIsImFsZXJ0X2Vycm9yIiwicm91dGUiLCJ1cGRhdGVMaXN0IiwiYWpheCIsInVybCIsIm1ldGhvZCIsImRhdGFUeXBlIiwic3VjY2VzcyIsImxvZyIsImFsZXJ0X29rIiwiZXJyb3IiXSwibWFwcGluZ3MiOiI7QUFBQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBSztBQUNMO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsbUNBQTJCLDBCQUEwQixFQUFFO0FBQ3ZELHlDQUFpQyxlQUFlO0FBQ2hEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLDhEQUFzRCwrREFBK0Q7O0FBRXJIO0FBQ0E7O0FBRUE7QUFDQTs7Ozs7Ozs7Ozs7Ozs7OztBQzdEQTs7Ozs7O0FBTUE7QUFDQTtBQUNBQSxPQUFPQyxVQUFQLEdBQW9CLFVBQVVDLE1BQVYsRUFBa0I7QUFDbEMsUUFBSUMsTUFBTUMsRUFBRSxtQkFBRixDQUFWO0FBQ0FDLFlBQVEsRUFBUjs7QUFFQUQsTUFBRUQsR0FBRixFQUFPRyxJQUFQLENBQVksWUFBWTtBQUNwQjtBQUNBLFlBQUlDLEtBQUtILEVBQUUsSUFBRixFQUFRSSxJQUFSLENBQWEsSUFBYixDQUFUOztBQUVBQyxlQUFPLEVBQVA7QUFDQTtBQUNBQSxhQUFLLElBQUwsSUFBYUYsRUFBYjs7QUFFQUUsYUFBSyxRQUFMLElBQWlCLEVBQWpCO0FBQ0E7QUFDQSxhQUFLLElBQUlDLElBQUksQ0FBYixFQUFnQkEsSUFBSVIsT0FBT1MsTUFBM0IsRUFBbUNELEdBQW5DLEVBQXdDO0FBQ3BDLGdCQUFJRSxRQUFRUixFQUFFLElBQUYsRUFBUVMsUUFBUixDQUFpQlgsT0FBT1EsQ0FBUCxDQUFqQixFQUE0QkcsUUFBNUIsQ0FBcUMsT0FBckMsRUFBOENMLElBQTlDLENBQW1ELE9BQW5ELENBQVo7QUFDQUMsaUJBQUssUUFBTCxFQUFlRyxLQUFmLElBQXdCUixFQUFFLElBQUYsRUFBUVMsUUFBUixDQUFpQlgsT0FBT1EsQ0FBUCxDQUFqQixFQUE0QkcsUUFBNUIsQ0FBcUMsT0FBckMsRUFBOENDLEdBQTlDLEVBQXhCO0FBQ0g7O0FBRUQ7QUFDQVQsY0FBTVUsSUFBTixDQUFXTixJQUFYO0FBQ0gsS0FqQkQ7QUFrQkFPLFlBQVFDLElBQVIsQ0FBYVosS0FBYjtBQUNILENBdkJEOztBQXlCQUQsRUFBRWMsUUFBRixFQUFZQyxLQUFaLENBQWtCLFlBQVc7QUFDekJmLE1BQUVjLFFBQUYsRUFBWUUsRUFBWixDQUFlLE9BQWYsRUFBdUIsYUFBdkIsRUFBcUMsWUFBVztBQUM1QyxZQUFHZixTQUFTZ0IsU0FBVCxJQUFzQmhCLFNBQVMsRUFBL0IsSUFBcUNBLFNBQVMsSUFBakQsRUFDQTtBQUNJaUIsd0JBQVksRUFBWixFQUFnQiw4QkFBaEI7QUFDSCxTQUhELE1BS0E7QUFDSSxnQkFBSUMsUUFBUW5CLEVBQUUsSUFBRixFQUFRSSxJQUFSLENBQWEsT0FBYixDQUFaO0FBQ0FnQix1QkFBV25CLEtBQVgsRUFBa0JrQixLQUFsQjtBQUNIO0FBQ0osS0FWRDtBQVdILENBWkQ7O0FBZUEsU0FBU0MsVUFBVCxDQUFvQm5CLEtBQXBCLEVBQTJCa0IsS0FBM0IsRUFDQTtBQUNLbkIsTUFBRXFCLElBQUYsQ0FBTztBQUNKQyxhQUFLSCxLQUREO0FBRUpJLGdCQUFRLE1BRko7QUFHSkMsa0JBQVUsTUFITjtBQUlKcEIsY0FBTSxFQUFDQSxNQUFNSCxLQUFQLEVBSkY7QUFLSndCLGlCQUFTLGlCQUFVckIsSUFBVixFQUFnQjtBQUN6QlEsb0JBQVFjLEdBQVIsQ0FBWXRCLElBQVo7QUFDSXVCLHFCQUFTLEtBQVQsRUFBZSxvQkFBZjtBQUNILFNBUkc7QUFTSkMsZUFBTyxlQUFVeEIsSUFBVixFQUFnQjtBQUNuQjtBQUNBYyx3QkFBWSxFQUFaLEVBQWdCLGlGQUFoQjtBQUNBTixvQkFBUWMsR0FBUixDQUFZLHVCQUFaO0FBQ0FkLG9CQUFRYyxHQUFSLENBQVl0QixJQUFaO0FBQ0g7QUFkRyxLQUFQO0FBZ0JKLEMiLCJmaWxlIjoiL2pzL3ZhZG1pbi1keW5hbWljLWZvcm1zLmpzIiwic291cmNlc0NvbnRlbnQiOlsiIFx0Ly8gVGhlIG1vZHVsZSBjYWNoZVxuIFx0dmFyIGluc3RhbGxlZE1vZHVsZXMgPSB7fTtcblxuIFx0Ly8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbiBcdGZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblxuIFx0XHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcbiBcdFx0aWYoaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0pIHtcbiBcdFx0XHRyZXR1cm4gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0uZXhwb3J0cztcbiBcdFx0fVxuIFx0XHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuIFx0XHR2YXIgbW9kdWxlID0gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0gPSB7XG4gXHRcdFx0aTogbW9kdWxlSWQsXG4gXHRcdFx0bDogZmFsc2UsXG4gXHRcdFx0ZXhwb3J0czoge31cbiBcdFx0fTtcblxuIFx0XHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cbiBcdFx0bW9kdWxlc1ttb2R1bGVJZF0uY2FsbChtb2R1bGUuZXhwb3J0cywgbW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cbiBcdFx0Ly8gRmxhZyB0aGUgbW9kdWxlIGFzIGxvYWRlZFxuIFx0XHRtb2R1bGUubCA9IHRydWU7XG5cbiBcdFx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcbiBcdFx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xuIFx0fVxuXG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlcyBvYmplY3QgKF9fd2VicGFja19tb2R1bGVzX18pXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm0gPSBtb2R1bGVzO1xuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZSBjYWNoZVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5jID0gaW5zdGFsbGVkTW9kdWxlcztcblxuIFx0Ly8gZGVmaW5lIGdldHRlciBmdW5jdGlvbiBmb3IgaGFybW9ueSBleHBvcnRzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSBmdW5jdGlvbihleHBvcnRzLCBuYW1lLCBnZXR0ZXIpIHtcbiBcdFx0aWYoIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBuYW1lKSkge1xuIFx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBuYW1lLCB7XG4gXHRcdFx0XHRjb25maWd1cmFibGU6IGZhbHNlLFxuIFx0XHRcdFx0ZW51bWVyYWJsZTogdHJ1ZSxcbiBcdFx0XHRcdGdldDogZ2V0dGVyXG4gXHRcdFx0fSk7XG4gXHRcdH1cbiBcdH07XG5cbiBcdC8vIGdldERlZmF1bHRFeHBvcnQgZnVuY3Rpb24gZm9yIGNvbXBhdGliaWxpdHkgd2l0aCBub24taGFybW9ueSBtb2R1bGVzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm4gPSBmdW5jdGlvbihtb2R1bGUpIHtcbiBcdFx0dmFyIGdldHRlciA9IG1vZHVsZSAmJiBtb2R1bGUuX19lc01vZHVsZSA/XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0RGVmYXVsdCgpIHsgcmV0dXJuIG1vZHVsZVsnZGVmYXVsdCddOyB9IDpcbiBcdFx0XHRmdW5jdGlvbiBnZXRNb2R1bGVFeHBvcnRzKCkgeyByZXR1cm4gbW9kdWxlOyB9O1xuIFx0XHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQoZ2V0dGVyLCAnYScsIGdldHRlcik7XG4gXHRcdHJldHVybiBnZXR0ZXI7XG4gXHR9O1xuXG4gXHQvLyBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGxcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubyA9IGZ1bmN0aW9uKG9iamVjdCwgcHJvcGVydHkpIHsgcmV0dXJuIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmplY3QsIHByb3BlcnR5KTsgfTtcblxuIFx0Ly8gX193ZWJwYWNrX3B1YmxpY19wYXRoX19cbiBcdF9fd2VicGFja19yZXF1aXJlX18ucCA9IFwiL1wiO1xuXG4gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbiBcdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKF9fd2VicGFja19yZXF1aXJlX18ucyA9IDgwKTtcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyB3ZWJwYWNrL2Jvb3RzdHJhcCBkMjZlMzdlMzVkM2M0MzI5Y2YzOCIsIi8qXG58LS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbnwgU0VSSUFMSVpBQkxFIExJU1QgVVBEQVRFUlxufC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG4qL1xuXG4vLyBDaGFuZ2VzIHZhbHVlcyBmcm9tIGNvbHVtbnMgb2YgYSBsaXN0LlxuLy8gLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxud2luZG93LmRhdGFTZXR0ZXIgPSBmdW5jdGlvbiAoZmllbGRzKSB7XG4gICAgbGV0IHJvdyA9ICQoJy5TZXJpYWxpemFibGVJdGVtJyk7XG4gICAgaXRlbXMgPSBbXTtcbiAgICBcbiAgICAkKHJvdykuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgIC8vIFRoaXMgaXMgdGhlIHJvdyBpZFxuICAgICAgICBsZXQgaWQgPSAkKHRoaXMpLmRhdGEoJ2lkJyk7XG4gICAgICAgIFxuICAgICAgICBpdGVtID0ge31cbiAgICAgICAgLy8gU3RvcmUgcm93IGlkIGluIGFycmF5XG4gICAgICAgIGl0ZW1bJ2lkJ10gPSBpZDtcbiAgICAgICAgXG4gICAgICAgIGl0ZW1bJ2ZpZWxkcyddID0ge307XG4gICAgICAgIC8vIFN0b3JlIGNvbHVtbnMgZGF0YSBpbiBhcnJheVxuICAgICAgICBmb3IgKGxldCBpID0gMDsgaSA8IGZpZWxkcy5sZW5ndGg7IGkrKykge1xuICAgICAgICAgICAgbGV0IGZpZWxkID0gJCh0aGlzKS5jaGlsZHJlbihmaWVsZHNbaV0pLmNoaWxkcmVuKCdpbnB1dCcpLmRhdGEoJ2ZpZWxkJyk7XG4gICAgICAgICAgICBpdGVtWydmaWVsZHMnXVtmaWVsZF0gPSAkKHRoaXMpLmNoaWxkcmVuKGZpZWxkc1tpXSkuY2hpbGRyZW4oJ2lucHV0JykudmFsKCk7XG4gICAgICAgIH1cblxuICAgICAgICAvLyBQdXNoIHJvdyB3aXRoIGNvbHMgZGF0YSB0byBhcnJheVxuICAgICAgICBpdGVtcy5wdXNoKGl0ZW0pO1xuICAgIH0pO1xuICAgIGNvbnNvbGUuaW5mbyhpdGVtcyk7XG59XG5cbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICQoZG9jdW1lbnQpLm9uKFwiY2xpY2tcIixcIiNVcGRhdGVMaXN0XCIsZnVuY3Rpb24oKSB7XG4gICAgICAgIGlmKGl0ZW1zID09IHVuZGVmaW5lZCB8fCBpdGVtcyA9PSAnJyB8fCBpdGVtcyA9PSBudWxsKVxuICAgICAgICB7XG4gICAgICAgICAgICBhbGVydF9lcnJvcihcIlwiLCBcIkHDum4gbm8gc2UgcmVhbGl6YXJvbiBjYW1iaW9zXCIpO1xuICAgICAgICB9XG4gICAgICAgIGVsc2VcbiAgICAgICAge1xuICAgICAgICAgICAgbGV0IHJvdXRlID0gJCh0aGlzKS5kYXRhKFwicm91dGVcIik7XG4gICAgICAgICAgICB1cGRhdGVMaXN0KGl0ZW1zLCByb3V0ZSk7XG4gICAgICAgIH1cbiAgICB9KTtcbn0pO1xuXG5cbmZ1bmN0aW9uIHVwZGF0ZUxpc3QoaXRlbXMsIHJvdXRlKVxue1xuICAgICAkLmFqYXgoe1xuICAgICAgICB1cmw6IHJvdXRlLFxuICAgICAgICBtZXRob2Q6ICdQT1NUJyxcbiAgICAgICAgZGF0YVR5cGU6ICdKU09OJyxcbiAgICAgICAgZGF0YToge2RhdGE6IGl0ZW1zfSxcbiAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgY29uc29sZS5sb2coZGF0YSk7XG4gICAgICAgICAgICBhbGVydF9vaygnT0shJywnSXRlbXMgYWN0dWFsaXphZG9zJyk7XG4gICAgICAgIH0sXG4gICAgICAgIGVycm9yOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgLy8gJCgnI0Vycm9yJykuaHRtbChkYXRhLnJlc3BvbnNlVGV4dCk7XG4gICAgICAgICAgICBhbGVydF9lcnJvcihcIlwiLCBcIkhhIGluZ3Jlc2FkbyB1biBkYXRvIGluY29ycmVjdG8uIFNvbG8gcHVlZGUgaW5ncmVzYXIgbsO6bWVyb3MgZW50ZXJvcyBwb3NpdGl2b3MuXCIpO1xuICAgICAgICAgICAgY29uc29sZS5sb2coXCJFcnJvciBlbiB1cGRhdGVMaXN0KClcIik7XG4gICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcbiAgICAgICAgfVxuICAgICB9KTtcbn1cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3ZhZG1pbi1keW5hbWljLWZvcm1zLmpzIl0sInNvdXJjZVJvb3QiOiIifQ==