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
/******/ 	return __webpack_require__(__webpack_require__.s = 76);
/******/ })
/************************************************************************/
/******/ ({

/***/ 76:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(77);


/***/ }),

/***/ 77:
/***/ (function(module, exports) {

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

/*
|--------------------------------------------------------------------------
| LISTS
|--------------------------------------------------------------------------
*/

// Select checkbox to deletion
$(document).on("click", ".List-Checkbox", function (e) {
	e.stopPropagation();
	CheckToDeletion("single", $(this));
});

// Select All present checkboxes to deletion
$('.Select-All-To-Delete').on("click", function () {

	if ($(this).prop('checked')) {
		$('.List-Checkbox').prop('checked', true);
		if ($('.List-Checkbox').length >= 1) {
			CheckToDeletion("all");
			$('.DeleteBtn').removeClass('Hidden');
		}

		$('tbody tr').addClass('row-selected');
	} else {
		$('.List-Checkbox').prop('checked', false);
		$('.DeleteBtn').addClass('Hidden');
		$('tbody tr').removeClass('row-selected');
	}
});

function CheckToDeletion(type, row) {
	var selectedRows = [];
	$(".List-Checkbox:checked").each(function () {
		selectedRows.push($(this).attr('data-id'));
		$('#RowsToDeletion').val(selectedRows);
	});

	if (selectedRows.length == 1) {
		$('#EditId, #CreateFromAnotherId').val(selectedRows);
	} else if (selectedRows.length < 1) {
		$('#EditId, #CreateFromAnotherId').val('');
	} else if (selectedRows.length > 1) {
		$('#EditId, #CreateFromAnotherId').val('');
	} else {
		$('#EditId, #CreateFromAnotherId').val('');
	}

	showButtons(this);
	if (type == 'single' && row != undefined) {
		var checkbox = row.prop('checked');
		if (checkbox) {
			row.parent().parent().parent().addClass('row-selected');
		} else {
			row.parent().parent().parent().removeClass('row-selected');
		}
	}
}

// // Set List Action Buttons
// $(document).on("click", ".List-Checkbox", function(e){
//     e.stopPropagation();
// 	var selectedRows = [];
//     $(".List-Checkbox:checked").each(function() {          
//         selectedRows.push($(this).attr('data-id'));
// 		$('#RowsToDeletion').val(selectedRows);
//     });

//     if(selectedRows.length == 1){
// 		$('#EditId, #CreateFromAnotherId').val(selectedRows);
//     } else if(selectedRows.length < 1){
// 		$('#EditId, #CreateFromAnotherId').val('');
//     } else if(selectedRows.length > 1){
//         $('#EditId, #CreateFromAnotherId').val('');
//     } else {
//         $('#EditId, #CreateFromAnotherId').val('');
//     }

//     showButtons(this);

// 	var checkbox = $(this).prop('checked');
// 	if(checkbox){
// 		$(this).parent().parent().parent().addClass('row-selected');
// 	} else {
// 		$(this).parent().parent().parent().removeClass('row-selected');
// 	}
// });


function showButtons(trigger) {

	var countSelected = $('.List-Checkbox:checkbox:checked').length;
	if (countSelected == 1) {
		$('.DeleteBtn').removeClass('Hidden');
		$('.EditBtn').removeClass('Hidden');
		$('.CreateFromAnotherBtn').removeClass('Hidden');
	} else if (countSelected >= 2) {
		$('.EditBtn').addClass('Hidden');
		$('.CreateFromAnotherBtn').addClass('Hidden');
	} else if (countSelected == 0) {
		$('.DeleteBtn').addClass('Hidden');
		$('.EditBtn').addClass('Hidden');
		$('.CreateFromAnotherBtn').addClass('Hidden');
	}
}

// Show Edit and Delete buttons in bottom if scrolled to mutch
$(document).scroll(function (e) {
	var scrollAmount = $(window).scrollTop();
	if (scrollAmount > 150) {
		$('.DeleteBtn').css({ "position": "fixed", "bottom": "50px", "right": "10px", "z-index": "999" });
		$('.EditBtn').css({ "position": "fixed", "bottom": "50px", "right": "130px", "z-index": "999" });
		$('.CreateFromAnotherBtn').css({ "position": "fixed", "bottom": "50px", "right": "235px", "z-index": "999" });
	} else {
		$('.DeleteBtn').css({ "position": "relative", "bottom": "auto", "right": "auto", "z-index": "999" });
		$('.EditBtn').css({ "position": "relative", "bottom": "auto", "right": "auto", "z-index": "999" });
		$('.CreateFromAnotherBtn').css({ "position": "relative", "bottom": "auto", "right": "auto", "z-index": "999" });
	}
});

// Uncheck all checkboxes on reload.
function uncheckAll() {
	$('#TableList tbody .CheckBoxes').find('input[type="checkbox"]').each(function () {
		$(this).prop('checked', false);
	});
}
uncheckAll();

/*
|--------------------------------------------------------------------------
| FUNCTIONS
|--------------------------------------------------------------------------
*/

deleteRecord = function deleteRecord(id, route, bigtext, smalltext) {
	swal({
		title: bigtext,
		text: smalltext,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'ELIMINAR',
		cancelButtonText: 'Cancelar',
		confirmButtonClass: 'btn btnGreen',
		cancelButtonClass: 'btn btnRed',
		buttonsStyling: false
	}).then(function () {

		$.ajax({
			url: route,
			method: 'POST',
			dataType: 'JSON',
			data: { id: id },
			beforeSend: function beforeSend() {
				// $('#Main-Loader').removeClass('Hidden');
			},
			success: function success(data) {
				$('#BatchDeleteBtn').addClass('Hidden');
				if (data.success == true) {
					$('#Id' + id).hide(200);
					for (i = 0; i < id.length; i++) {
						$('#Id' + id[i]).hide(200);
					}
					alert_ok('Ok!', 'Eliminación completa');
					console.log(data);
					return true;
				} else {
					console.log(data.error);
					if (data.message != '') alert_error('Ups!', data.message);else alert_error('Ups!', 'Ha ocurrido un error (Puede que este registro tenga relación con otros items en el sistema). Debe eliminar primero los mismos.');

					console.log(data);
					return false;
				}
			},
			error: function error(data) {
				$('#Error').html(data.responseText);
				console.log(data);
			},
			complete: function complete() {
				// $('#Main-Loader').addClass('Hidden');
			}
		});
	});
};

deleteAndReload = function deleteAndReload(id, route, bigtext, smalltext) {
	swal({
		title: bigtext,
		text: smalltext,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'ELIMINAR',
		cancelButtonText: 'Cancelar',
		confirmButtonClass: 'btn btnGreen',
		cancelButtonClass: 'btn btnRed',
		buttonsStyling: false
	}).then(function () {
		$.ajax({
			url: route,
			method: 'POST',
			dataType: 'JSON',
			data: { id: id },
			beforeSend: function beforeSend() {
				// $('#Main-Loader').removeClass('Hidden');
			},
			success: function success(data) {
				$('#BatchDeleteBtn').addClass('Hidden');
				if (data.success == true) {
					// alert_ok('Ok!','Eliminación completa');
					location.reload();
				} else {
					if (data.message != '') alert_error('Ups!', data.message);else alert_error('Ups!', 'Ha ocurrido un error (Puede que este registro tenga relación con otros items en el sistema). Debe eliminar primero los mismos.');
					// alert_error('Ups!','Ha ocurrido un error (Puede que este registro tenga relación con otros items en el sistema). Debe eliminar primero los mismos.');
					console.log(data);
					return false;
				}
			},
			error: function error(data) {
				$('#Error').html(data.responseText);
				console.log(data);
			}
		});
	});
};

/*
|--------------------------------------------------------------------------
| ALERTS
|--------------------------------------------------------------------------
*/

function alert_ok(bigtext, smalltext) {
	swal(bigtext, smalltext, 'success');
}

function alert_error(bigtext, smalltext) {
	swal(bigtext, smalltext, 'error');
}

function alert_info(bigtext, smalltext) {

	swal({
		title: bigtext,
		type: 'info',
		html: smalltext,
		showCloseButton: true,
		showCancelButton: false,
		confirmButtonText: '<i class="ion-checkmark-round"></i> Ok!'
	});
}

function closeParent() {
	$(this).parent('hide');
}

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgZWRkZjE4ZmY4ZGU4ZDU1N2NhYzMiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9qcy92YWRtaW4tZnVuY3Rpb25zLmpzIl0sIm5hbWVzIjpbIiQiLCJhamF4U2V0dXAiLCJoZWFkZXJzIiwiYXR0ciIsImRvY3VtZW50Iiwib24iLCJlIiwic3RvcFByb3BhZ2F0aW9uIiwiQ2hlY2tUb0RlbGV0aW9uIiwicHJvcCIsImxlbmd0aCIsInJlbW92ZUNsYXNzIiwiYWRkQ2xhc3MiLCJ0eXBlIiwicm93Iiwic2VsZWN0ZWRSb3dzIiwiZWFjaCIsInB1c2giLCJ2YWwiLCJzaG93QnV0dG9ucyIsInVuZGVmaW5lZCIsImNoZWNrYm94IiwicGFyZW50IiwidHJpZ2dlciIsImNvdW50U2VsZWN0ZWQiLCJzY3JvbGwiLCJzY3JvbGxBbW91bnQiLCJ3aW5kb3ciLCJzY3JvbGxUb3AiLCJjc3MiLCJ1bmNoZWNrQWxsIiwiZmluZCIsImRlbGV0ZVJlY29yZCIsImlkIiwicm91dGUiLCJiaWd0ZXh0Iiwic21hbGx0ZXh0Iiwic3dhbCIsInRpdGxlIiwidGV4dCIsInNob3dDYW5jZWxCdXR0b24iLCJjb25maXJtQnV0dG9uQ29sb3IiLCJjYW5jZWxCdXR0b25Db2xvciIsImNvbmZpcm1CdXR0b25UZXh0IiwiY2FuY2VsQnV0dG9uVGV4dCIsImNvbmZpcm1CdXR0b25DbGFzcyIsImNhbmNlbEJ1dHRvbkNsYXNzIiwiYnV0dG9uc1N0eWxpbmciLCJ0aGVuIiwiYWpheCIsInVybCIsIm1ldGhvZCIsImRhdGFUeXBlIiwiZGF0YSIsImJlZm9yZVNlbmQiLCJzdWNjZXNzIiwiaGlkZSIsImkiLCJhbGVydF9vayIsImNvbnNvbGUiLCJsb2ciLCJlcnJvciIsIm1lc3NhZ2UiLCJhbGVydF9lcnJvciIsImh0bWwiLCJyZXNwb25zZVRleHQiLCJjb21wbGV0ZSIsImRlbGV0ZUFuZFJlbG9hZCIsImxvY2F0aW9uIiwicmVsb2Fk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TCxJQUFnQixJQUFwQixFQUEwQjtBQUN6QjtBQUNBYSxjQUFTQyxNQUFUO0FBQ0EsS0FIRCxNQUdPO0FBQ04sU0FBR2hCLEtBQUtTLE9BQUwsSUFBZ0IsRUFBbkIsRUFDQ0MsWUFBWSxNQUFaLEVBQW9CVixLQUFLUyxPQUF6QixFQURELEtBR0NDLFlBQVksTUFBWixFQUFtQixnSUFBbkI7QUFDRDtBQUNBSixhQUFRQyxHQUFSLENBQVlQLElBQVo7QUFDQSxZQUFPLEtBQVA7QUFDQTtBQUNELElBdEJLO0FBdUJOUSxVQUFPLGVBQVNSLElBQVQsRUFDUDtBQUNDckQsTUFBRSxRQUFGLEVBQVlnRSxJQUFaLENBQWlCWCxLQUFLWSxZQUF0QjtBQUNBTixZQUFRQyxHQUFSLENBQVlQLElBQVo7QUFDQTtBQTNCSyxHQUFQO0FBNkJBLEVBMUNEO0FBNENBLENBN0NEOztBQStDQTs7Ozs7O0FBTUEsU0FBU0ssUUFBVCxDQUFrQnZCLE9BQWxCLEVBQTJCQyxTQUEzQixFQUFxQztBQUNqQ0MsTUFDSUYsT0FESixFQUVJQyxTQUZKLEVBR0ksU0FISjtBQUtIOztBQUVELFNBQVMyQixXQUFULENBQXFCNUIsT0FBckIsRUFBOEJDLFNBQTlCLEVBQXdDO0FBQ3BDQyxNQUNJRixPQURKLEVBRUlDLFNBRkosRUFHSSxPQUhKO0FBS0g7O0FBRUQsU0FBU2tDLFVBQVQsQ0FBb0JuQyxPQUFwQixFQUE2QkMsU0FBN0IsRUFBdUM7O0FBRW5DQyxNQUFLO0FBQ0dDLFNBQU9ILE9BRFY7QUFFRHRCLFFBQU0sTUFGTDtBQUdEbUQsUUFBTTVCLFNBSEw7QUFJRG1DLG1CQUFpQixJQUpoQjtBQUtEL0Isb0JBQWtCLEtBTGpCO0FBTURHLHFCQUNJO0FBUEgsRUFBTDtBQVNIOztBQUdELFNBQVM2QixXQUFULEdBQXNCO0FBQ3JCeEUsR0FBRSxJQUFGLEVBQVFzQixNQUFSLENBQWUsTUFBZjtBQUNBLEMiLCJmaWxlIjoiL2pzL3ZhZG1pbi1mdW5jdGlvbnMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCIvXCI7XG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gNzYpO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHdlYnBhY2svYm9vdHN0cmFwIGVkZGYxOGZmOGRlOGQ1NTdjYWMzIiwiJC5hamF4U2V0dXAoe1xyXG4gICAgaGVhZGVyczoge1xyXG4gICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXHJcbiAgICB9XHJcbn0pO1xyXG4gXHJcbi8qXHJcbnwtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG58IExJU1RTXHJcbnwtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG4qL1xyXG5cclxuXHJcbi8vIFNlbGVjdCBjaGVja2JveCB0byBkZWxldGlvblxyXG4kKGRvY3VtZW50KS5vbihcImNsaWNrXCIsIFwiLkxpc3QtQ2hlY2tib3hcIiwgZnVuY3Rpb24oZSlcclxue1xyXG5cdGUuc3RvcFByb3BhZ2F0aW9uKCk7XHJcblx0Q2hlY2tUb0RlbGV0aW9uKFwic2luZ2xlXCIsICQodGhpcykpO1xyXG59KTtcclxuXHJcbi8vIFNlbGVjdCBBbGwgcHJlc2VudCBjaGVja2JveGVzIHRvIGRlbGV0aW9uXHJcbiQoJy5TZWxlY3QtQWxsLVRvLURlbGV0ZScpLm9uKFwiY2xpY2tcIiwgZnVuY3Rpb24oKSB7XHJcblx0XHJcblx0aWYgKCQodGhpcykucHJvcCgnY2hlY2tlZCcpKSB7XHJcblx0XHQkKCcuTGlzdC1DaGVja2JveCcpLnByb3AoJ2NoZWNrZWQnLCB0cnVlKTtcclxuXHRcdGlmKCQoJy5MaXN0LUNoZWNrYm94JykubGVuZ3RoID49IDEpXHJcblx0XHR7XHJcblx0XHRcdENoZWNrVG9EZWxldGlvbihcImFsbFwiKVxyXG5cdFx0XHQkKCcuRGVsZXRlQnRuJykucmVtb3ZlQ2xhc3MoJ0hpZGRlbicpO1xyXG5cdFx0fVxyXG5cclxuXHRcdCQoJ3Rib2R5IHRyJykuYWRkQ2xhc3MoJ3Jvdy1zZWxlY3RlZCcpO1xyXG5cdH0gZWxzZSB7XHJcblx0XHQkKCcuTGlzdC1DaGVja2JveCcpLnByb3AoJ2NoZWNrZWQnLCBmYWxzZSk7XHJcblx0XHQkKCcuRGVsZXRlQnRuJykuYWRkQ2xhc3MoJ0hpZGRlbicpO1xyXG5cdFx0JCgndGJvZHkgdHInKS5yZW1vdmVDbGFzcygncm93LXNlbGVjdGVkJyk7XHJcblx0fVxyXG59KTtcclxuXHJcbmZ1bmN0aW9uIENoZWNrVG9EZWxldGlvbih0eXBlLCByb3cpXHJcbntcclxuXHR2YXIgc2VsZWN0ZWRSb3dzID0gW107XHJcblx0JChcIi5MaXN0LUNoZWNrYm94OmNoZWNrZWRcIikuZWFjaChmdW5jdGlvbigpIHsgICAgICAgICAgXHJcblx0XHRzZWxlY3RlZFJvd3MucHVzaCgkKHRoaXMpLmF0dHIoJ2RhdGEtaWQnKSk7XHJcblx0XHQkKCcjUm93c1RvRGVsZXRpb24nKS52YWwoc2VsZWN0ZWRSb3dzKTtcclxuXHR9KTtcclxuXHRcclxuXHRpZihzZWxlY3RlZFJvd3MubGVuZ3RoID09IDEpe1xyXG5cdFx0JCgnI0VkaXRJZCwgI0NyZWF0ZUZyb21Bbm90aGVySWQnKS52YWwoc2VsZWN0ZWRSb3dzKTtcclxuXHR9IGVsc2UgaWYoc2VsZWN0ZWRSb3dzLmxlbmd0aCA8IDEpe1xyXG5cdFx0JCgnI0VkaXRJZCwgI0NyZWF0ZUZyb21Bbm90aGVySWQnKS52YWwoJycpO1xyXG5cdH0gZWxzZSBpZihzZWxlY3RlZFJvd3MubGVuZ3RoID4gMSl7XHJcblx0XHQkKCcjRWRpdElkLCAjQ3JlYXRlRnJvbUFub3RoZXJJZCcpLnZhbCgnJyk7XHJcblx0fSBlbHNlIHtcclxuXHRcdCQoJyNFZGl0SWQsICNDcmVhdGVGcm9tQW5vdGhlcklkJykudmFsKCcnKTtcclxuXHR9XHJcblxyXG5cdHNob3dCdXR0b25zKHRoaXMpO1xyXG5cdGlmKHR5cGUgPT0gJ3NpbmdsZScgJiYgcm93ICE9IHVuZGVmaW5lZClcclxuXHR7XHJcblx0XHR2YXIgY2hlY2tib3ggPSByb3cucHJvcCgnY2hlY2tlZCcpO1xyXG5cdFx0aWYoY2hlY2tib3gpe1xyXG5cdFx0XHRyb3cucGFyZW50KCkucGFyZW50KCkucGFyZW50KCkuYWRkQ2xhc3MoJ3Jvdy1zZWxlY3RlZCcpO1xyXG5cdFx0fSBlbHNlIHtcclxuXHRcdFx0cm93LnBhcmVudCgpLnBhcmVudCgpLnBhcmVudCgpLnJlbW92ZUNsYXNzKCdyb3ctc2VsZWN0ZWQnKTtcclxuXHRcdH1cclxuXHR9XHJcbn1cclxuXHJcbi8vIC8vIFNldCBMaXN0IEFjdGlvbiBCdXR0b25zXHJcbi8vICQoZG9jdW1lbnQpLm9uKFwiY2xpY2tcIiwgXCIuTGlzdC1DaGVja2JveFwiLCBmdW5jdGlvbihlKXtcclxuLy8gICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XHJcbi8vIFx0dmFyIHNlbGVjdGVkUm93cyA9IFtdO1xyXG4vLyAgICAgJChcIi5MaXN0LUNoZWNrYm94OmNoZWNrZWRcIikuZWFjaChmdW5jdGlvbigpIHsgICAgICAgICAgXHJcbi8vICAgICAgICAgc2VsZWN0ZWRSb3dzLnB1c2goJCh0aGlzKS5hdHRyKCdkYXRhLWlkJykpO1xyXG4vLyBcdFx0JCgnI1Jvd3NUb0RlbGV0aW9uJykudmFsKHNlbGVjdGVkUm93cyk7XHJcbi8vICAgICB9KTtcclxuICAgICAgIFxyXG4vLyAgICAgaWYoc2VsZWN0ZWRSb3dzLmxlbmd0aCA9PSAxKXtcclxuLy8gXHRcdCQoJyNFZGl0SWQsICNDcmVhdGVGcm9tQW5vdGhlcklkJykudmFsKHNlbGVjdGVkUm93cyk7XHJcbi8vICAgICB9IGVsc2UgaWYoc2VsZWN0ZWRSb3dzLmxlbmd0aCA8IDEpe1xyXG4vLyBcdFx0JCgnI0VkaXRJZCwgI0NyZWF0ZUZyb21Bbm90aGVySWQnKS52YWwoJycpO1xyXG4vLyAgICAgfSBlbHNlIGlmKHNlbGVjdGVkUm93cy5sZW5ndGggPiAxKXtcclxuLy8gICAgICAgICAkKCcjRWRpdElkLCAjQ3JlYXRlRnJvbUFub3RoZXJJZCcpLnZhbCgnJyk7XHJcbi8vICAgICB9IGVsc2Uge1xyXG4vLyAgICAgICAgICQoJyNFZGl0SWQsICNDcmVhdGVGcm9tQW5vdGhlcklkJykudmFsKCcnKTtcclxuLy8gICAgIH1cclxuXHJcbi8vICAgICBzaG93QnV0dG9ucyh0aGlzKTtcclxuXHJcbi8vIFx0dmFyIGNoZWNrYm94ID0gJCh0aGlzKS5wcm9wKCdjaGVja2VkJyk7XHJcbi8vIFx0aWYoY2hlY2tib3gpe1xyXG4vLyBcdFx0JCh0aGlzKS5wYXJlbnQoKS5wYXJlbnQoKS5wYXJlbnQoKS5hZGRDbGFzcygncm93LXNlbGVjdGVkJyk7XHJcbi8vIFx0fSBlbHNlIHtcclxuLy8gXHRcdCQodGhpcykucGFyZW50KCkucGFyZW50KCkucGFyZW50KCkucmVtb3ZlQ2xhc3MoJ3Jvdy1zZWxlY3RlZCcpO1xyXG4vLyBcdH1cclxuLy8gfSk7XHJcblxyXG5cclxuZnVuY3Rpb24gc2hvd0J1dHRvbnModHJpZ2dlcikge1xyXG5cdFxyXG5cdHZhciBjb3VudFNlbGVjdGVkID0gJCgnLkxpc3QtQ2hlY2tib3g6Y2hlY2tib3g6Y2hlY2tlZCcpLmxlbmd0aDtcclxuXHRpZihjb3VudFNlbGVjdGVkID09IDEpIHtcclxuICAgICAgICAkKCcuRGVsZXRlQnRuJykucmVtb3ZlQ2xhc3MoJ0hpZGRlbicpO1xyXG5cdFx0JCgnLkVkaXRCdG4nKS5yZW1vdmVDbGFzcygnSGlkZGVuJyk7XHJcblx0XHQkKCcuQ3JlYXRlRnJvbUFub3RoZXJCdG4nKS5yZW1vdmVDbGFzcygnSGlkZGVuJyk7XHJcblx0fSBlbHNlIGlmKGNvdW50U2VsZWN0ZWQgPj0gMikge1xyXG5cdFx0JCgnLkVkaXRCdG4nKS5hZGRDbGFzcygnSGlkZGVuJyk7XHJcblx0XHQkKCcuQ3JlYXRlRnJvbUFub3RoZXJCdG4nKS5hZGRDbGFzcygnSGlkZGVuJyk7XHJcbiAgICB9IGVsc2UgaWYoY291bnRTZWxlY3RlZCA9PSAwKSB7XHJcbiAgICAgICAgJCgnLkRlbGV0ZUJ0bicpLmFkZENsYXNzKCdIaWRkZW4nKTtcclxuXHRcdCQoJy5FZGl0QnRuJykuYWRkQ2xhc3MoJ0hpZGRlbicpO1xyXG5cdFx0JCgnLkNyZWF0ZUZyb21Bbm90aGVyQnRuJykuYWRkQ2xhc3MoJ0hpZGRlbicpO1xyXG4gICAgfVxyXG59XHJcblxyXG4vLyBTaG93IEVkaXQgYW5kIERlbGV0ZSBidXR0b25zIGluIGJvdHRvbSBpZiBzY3JvbGxlZCB0byBtdXRjaFxyXG4kKGRvY3VtZW50KS5zY3JvbGwoZnVuY3Rpb24oZSl7XHJcblx0dmFyIHNjcm9sbEFtb3VudCA9ICQod2luZG93KS5zY3JvbGxUb3AoKTtcclxuXHRpZihzY3JvbGxBbW91bnQgPiAxNTApe1xyXG5cdFx0JCgnLkRlbGV0ZUJ0bicpLmNzcyh7XCJwb3NpdGlvblwiOlwiZml4ZWRcIiwgXCJib3R0b21cIjpcIjUwcHhcIiwgXCJyaWdodFwiOlwiMTBweFwiLCBcInotaW5kZXhcIjpcIjk5OVwifSk7XHJcblx0XHQkKCcuRWRpdEJ0bicpLmNzcyh7XCJwb3NpdGlvblwiOlwiZml4ZWRcIiwgXCJib3R0b21cIjpcIjUwcHhcIiwgXCJyaWdodFwiOlwiMTMwcHhcIiwgXCJ6LWluZGV4XCI6XCI5OTlcIn0pO1xyXG5cdFx0JCgnLkNyZWF0ZUZyb21Bbm90aGVyQnRuJykuY3NzKHtcInBvc2l0aW9uXCI6XCJmaXhlZFwiLCBcImJvdHRvbVwiOlwiNTBweFwiLCBcInJpZ2h0XCI6XCIyMzVweFwiLCBcInotaW5kZXhcIjpcIjk5OVwifSk7XHJcblx0fSBlbHNlIHtcclxuXHRcdCQoJy5EZWxldGVCdG4nKS5jc3Moe1wicG9zaXRpb25cIjpcInJlbGF0aXZlXCIsIFwiYm90dG9tXCI6XCJhdXRvXCIsIFwicmlnaHRcIjpcImF1dG9cIiwgXCJ6LWluZGV4XCI6XCI5OTlcIn0pO1xyXG5cdFx0JCgnLkVkaXRCdG4nKS5jc3Moe1wicG9zaXRpb25cIjpcInJlbGF0aXZlXCIsIFwiYm90dG9tXCI6XCJhdXRvXCIsIFwicmlnaHRcIjpcImF1dG9cIiwgXCJ6LWluZGV4XCI6XCI5OTlcIn0pO1xyXG5cdFx0JCgnLkNyZWF0ZUZyb21Bbm90aGVyQnRuJykuY3NzKHtcInBvc2l0aW9uXCI6XCJyZWxhdGl2ZVwiLCBcImJvdHRvbVwiOlwiYXV0b1wiLCBcInJpZ2h0XCI6XCJhdXRvXCIsIFwiei1pbmRleFwiOlwiOTk5XCJ9KTtcclxuXHRcdFxyXG5cdH1cclxufSk7XHJcblxyXG4vLyBVbmNoZWNrIGFsbCBjaGVja2JveGVzIG9uIHJlbG9hZC5cclxuZnVuY3Rpb24gdW5jaGVja0FsbCgpe1xyXG5cdCQoJyNUYWJsZUxpc3QgdGJvZHkgLkNoZWNrQm94ZXMnKS5maW5kKCdpbnB1dFt0eXBlPVwiY2hlY2tib3hcIl0nKS5lYWNoKGZ1bmN0aW9uKCkge1xyXG5cdFx0JCh0aGlzKS5wcm9wKCdjaGVja2VkJywgZmFsc2UpO1x0XHJcblx0fSk7XHRcclxufVxyXG51bmNoZWNrQWxsKCk7XHJcblxyXG4vKlxyXG58LS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cclxufCBGVU5DVElPTlNcclxufC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbiovXHJcblxyXG5kZWxldGVSZWNvcmQgPSBmdW5jdGlvbihpZCwgcm91dGUsIGJpZ3RleHQsIHNtYWxsdGV4dCkge1xyXG5cdHN3YWwoe1xyXG5cdFx0dGl0bGU6IGJpZ3RleHQsXHJcblx0XHR0ZXh0OiBzbWFsbHRleHQsXHJcblx0XHR0eXBlOiAnd2FybmluZycsXHJcblx0XHRzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxyXG5cdFx0Y29uZmlybUJ1dHRvbkNvbG9yOiAnIzMwODVkNicsXHJcblx0XHRjYW5jZWxCdXR0b25Db2xvcjogJyNkMzMnLFxyXG5cdFx0Y29uZmlybUJ1dHRvblRleHQ6ICdFTElNSU5BUicsXHJcblx0XHRjYW5jZWxCdXR0b25UZXh0OiAnQ2FuY2VsYXInLFxyXG5cdFx0Y29uZmlybUJ1dHRvbkNsYXNzOiAnYnRuIGJ0bkdyZWVuJyxcclxuXHRcdGNhbmNlbEJ1dHRvbkNsYXNzOiAnYnRuIGJ0blJlZCcsXHJcblx0XHRidXR0b25zU3R5bGluZzogZmFsc2VcclxuXHR9KS50aGVuKGZ1bmN0aW9uICgpIHtcclxuXHJcbiBcdFx0JC5hamF4KHtcclxuXHRcdFx0dXJsOiByb3V0ZSxcclxuXHRcdFx0bWV0aG9kOiAnUE9TVCcsICAgICAgICAgICAgIFxyXG5cdFx0XHRkYXRhVHlwZTogJ0pTT04nLFxyXG5cdFx0XHRkYXRhOiB7IGlkOiBpZCB9LFxyXG5cdFx0XHRiZWZvcmVTZW5kOiBmdW5jdGlvbigpe1xyXG5cdFx0XHRcdC8vICQoJyNNYWluLUxvYWRlcicpLnJlbW92ZUNsYXNzKCdIaWRkZW4nKTtcclxuXHRcdFx0fSxcclxuXHRcdFx0c3VjY2VzczogZnVuY3Rpb24oZGF0YSl7XHJcblx0XHRcdFx0JCgnI0JhdGNoRGVsZXRlQnRuJykuYWRkQ2xhc3MoJ0hpZGRlbicpO1xyXG5cdFx0XHRcdGlmIChkYXRhLnN1Y2Nlc3MgPT0gdHJ1ZSkge1xyXG5cdFx0XHRcdFx0JCgnI0lkJytpZCkuaGlkZSgyMDApO1xyXG5cdFx0XHRcdFx0Zm9yKGk9MDsgaSA8IGlkLmxlbmd0aCA7IGkrKyl7XHJcblx0XHRcdFx0XHRcdCQoJyNJZCcraWRbaV0pLmhpZGUoMjAwKTtcclxuXHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdGFsZXJ0X29rKCdPayEnLCdFbGltaW5hY2nDs24gY29tcGxldGEnKTtcclxuXHRcdFx0XHRcdGNvbnNvbGUubG9nKGRhdGEpO1xyXG5cdFx0XHRcdFx0cmV0dXJuIHRydWU7XHJcblx0XHRcdFx0fSBlbHNlIHtcclxuXHRcdFx0XHRcdGNvbnNvbGUubG9nKGRhdGEuZXJyb3IpO1xyXG5cdFx0XHRcdFx0aWYoZGF0YS5tZXNzYWdlICE9ICcnKVxyXG5cdFx0XHRcdFx0XHRhbGVydF9lcnJvcignVXBzIScsIGRhdGEubWVzc2FnZSk7XHRcclxuXHRcdFx0XHRcdGVsc2VcclxuXHRcdFx0XHRcdFx0YWxlcnRfZXJyb3IoJ1VwcyEnLCdIYSBvY3VycmlkbyB1biBlcnJvciAoUHVlZGUgcXVlIGVzdGUgcmVnaXN0cm8gdGVuZ2EgcmVsYWNpw7NuIGNvbiBvdHJvcyBpdGVtcyBlbiBlbCBzaXN0ZW1hKS4gRGViZSBlbGltaW5hciBwcmltZXJvIGxvcyBtaXNtb3MuJyk7XHJcblxyXG5cdFx0XHRcdFx0Y29uc29sZS5sb2coZGF0YSk7XHJcblx0XHRcdFx0XHRyZXR1cm4gZmFsc2U7XHJcblx0XHRcdFx0fVxyXG5cdFx0XHR9LFxyXG5cdFx0XHRlcnJvcjogZnVuY3Rpb24oZGF0YSlcclxuXHRcdFx0e1xyXG4gICAgICAgICAgICAgICAgJCgnI0Vycm9yJykuaHRtbChkYXRhLnJlc3BvbnNlVGV4dCk7XHJcblx0XHRcdFx0Y29uc29sZS5sb2coZGF0YSk7XHRcclxuXHRcdFx0fSxcclxuXHRcdFx0Y29tcGxldGU6IGZ1bmN0aW9uKClcclxuXHRcdFx0e1xyXG5cdFx0XHRcdC8vICQoJyNNYWluLUxvYWRlcicpLmFkZENsYXNzKCdIaWRkZW4nKTtcclxuXHRcdFx0fVxyXG5cdFx0fSk7XHJcblx0fSk7XHJcblxyXG59XHJcblxyXG5kZWxldGVBbmRSZWxvYWQgPSBmdW5jdGlvbihpZCwgcm91dGUsIGJpZ3RleHQsIHNtYWxsdGV4dCkge1xyXG5cdHN3YWwoe1xyXG5cdFx0dGl0bGU6IGJpZ3RleHQsXHJcblx0XHR0ZXh0OiBzbWFsbHRleHQsXHJcblx0XHR0eXBlOiAnd2FybmluZycsXHJcblx0XHRzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxyXG5cdFx0Y29uZmlybUJ1dHRvbkNvbG9yOiAnIzMwODVkNicsXHJcblx0XHRjYW5jZWxCdXR0b25Db2xvcjogJyNkMzMnLFxyXG5cdFx0Y29uZmlybUJ1dHRvblRleHQ6ICdFTElNSU5BUicsXHJcblx0XHRjYW5jZWxCdXR0b25UZXh0OiAnQ2FuY2VsYXInLFxyXG5cdFx0Y29uZmlybUJ1dHRvbkNsYXNzOiAnYnRuIGJ0bkdyZWVuJyxcclxuXHRcdGNhbmNlbEJ1dHRvbkNsYXNzOiAnYnRuIGJ0blJlZCcsXHJcblx0XHRidXR0b25zU3R5bGluZzogZmFsc2VcclxuXHR9KS50aGVuKGZ1bmN0aW9uICgpIHtcclxuXHRcdCQuYWpheCh7XHJcblx0XHRcdHVybDogcm91dGUsXHJcblx0XHRcdG1ldGhvZDogJ1BPU1QnLCAgICAgICAgICAgICBcclxuXHRcdFx0ZGF0YVR5cGU6ICdKU09OJyxcclxuXHRcdFx0ZGF0YTogeyBpZDogaWQgfSxcclxuXHRcdFx0YmVmb3JlU2VuZDogZnVuY3Rpb24oKXtcclxuXHRcdFx0XHQvLyAkKCcjTWFpbi1Mb2FkZXInKS5yZW1vdmVDbGFzcygnSGlkZGVuJyk7XHJcblx0XHRcdH0sXHJcblx0XHRcdHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpe1xyXG5cdFx0XHRcdCQoJyNCYXRjaERlbGV0ZUJ0bicpLmFkZENsYXNzKCdIaWRkZW4nKTtcclxuXHRcdFx0XHRpZiAoZGF0YS5zdWNjZXNzID09IHRydWUpIHtcclxuXHRcdFx0XHRcdC8vIGFsZXJ0X29rKCdPayEnLCdFbGltaW5hY2nDs24gY29tcGxldGEnKTtcclxuXHRcdFx0XHRcdGxvY2F0aW9uLnJlbG9hZCgpO1xyXG5cdFx0XHRcdH0gZWxzZSB7XHJcblx0XHRcdFx0XHRpZihkYXRhLm1lc3NhZ2UgIT0gJycpXHJcblx0XHRcdFx0XHRcdGFsZXJ0X2Vycm9yKCdVcHMhJywgZGF0YS5tZXNzYWdlKTtcdFxyXG5cdFx0XHRcdFx0ZWxzZVxyXG5cdFx0XHRcdFx0XHRhbGVydF9lcnJvcignVXBzIScsJ0hhIG9jdXJyaWRvIHVuIGVycm9yIChQdWVkZSBxdWUgZXN0ZSByZWdpc3RybyB0ZW5nYSByZWxhY2nDs24gY29uIG90cm9zIGl0ZW1zIGVuIGVsIHNpc3RlbWEpLiBEZWJlIGVsaW1pbmFyIHByaW1lcm8gbG9zIG1pc21vcy4nKTtcclxuXHRcdFx0XHRcdC8vIGFsZXJ0X2Vycm9yKCdVcHMhJywnSGEgb2N1cnJpZG8gdW4gZXJyb3IgKFB1ZWRlIHF1ZSBlc3RlIHJlZ2lzdHJvIHRlbmdhIHJlbGFjacOzbiBjb24gb3Ryb3MgaXRlbXMgZW4gZWwgc2lzdGVtYSkuIERlYmUgZWxpbWluYXIgcHJpbWVybyBsb3MgbWlzbW9zLicpO1xyXG5cdFx0XHRcdFx0Y29uc29sZS5sb2coZGF0YSk7XHJcblx0XHRcdFx0XHRyZXR1cm4gZmFsc2U7XHJcblx0XHRcdFx0fVxyXG5cdFx0XHR9LFxyXG5cdFx0XHRlcnJvcjogZnVuY3Rpb24oZGF0YSlcclxuXHRcdFx0e1xyXG5cdFx0XHRcdCQoJyNFcnJvcicpLmh0bWwoZGF0YS5yZXNwb25zZVRleHQpO1xyXG5cdFx0XHRcdGNvbnNvbGUubG9nKGRhdGEpO1x0XHJcblx0XHRcdH1cclxuXHRcdH0pO1xyXG5cdH0pO1xyXG5cclxufVxyXG5cclxuLypcclxufC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbnwgQUxFUlRTXHJcbnwtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG4qL1xyXG5cclxuZnVuY3Rpb24gYWxlcnRfb2soYmlndGV4dCwgc21hbGx0ZXh0KXtcclxuICAgIHN3YWwoXHJcbiAgICAgICAgYmlndGV4dCxcclxuICAgICAgICBzbWFsbHRleHQsXHJcbiAgICAgICAgJ3N1Y2Nlc3MnXHJcbiAgICApOyAgICBcclxufVxyXG4gICAgXHJcbmZ1bmN0aW9uIGFsZXJ0X2Vycm9yKGJpZ3RleHQsIHNtYWxsdGV4dCl7XHJcbiAgICBzd2FsKFxyXG4gICAgICAgIGJpZ3RleHQsXHJcbiAgICAgICAgc21hbGx0ZXh0LFxyXG4gICAgICAgICdlcnJvcidcclxuICAgICk7XHJcbn1cclxuXHJcbmZ1bmN0aW9uIGFsZXJ0X2luZm8oYmlndGV4dCwgc21hbGx0ZXh0KXtcclxuXHJcbiAgICBzd2FsKHtcclxuICAgICAgICAgICAgdGl0bGU6IGJpZ3RleHQsXHJcbiAgICAgICAgdHlwZTogJ2luZm8nLFxyXG4gICAgICAgIGh0bWw6IHNtYWxsdGV4dCxcclxuICAgICAgICBzaG93Q2xvc2VCdXR0b246IHRydWUsXHJcbiAgICAgICAgc2hvd0NhbmNlbEJ1dHRvbjogZmFsc2UsXHJcbiAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6XHJcbiAgICAgICAgICAgICc8aSBjbGFzcz1cImlvbi1jaGVja21hcmstcm91bmRcIj48L2k+IE9rISdcclxuICAgICAgICB9KTtcclxufVxyXG5cclxuXHJcbmZ1bmN0aW9uIGNsb3NlUGFyZW50KCl7XHJcblx0JCh0aGlzKS5wYXJlbnQoJ2hpZGUnKTtcclxufVxyXG5cclxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIC4vcmVzb3VyY2VzL2Fzc2V0cy9qcy92YWRtaW4tZnVuY3Rpb25zLmpzIl0sInNvdXJjZVJvb3QiOiIifQ==