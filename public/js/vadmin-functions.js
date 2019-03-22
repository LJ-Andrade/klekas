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
					alert_error('Ups!', 'Ha ocurrido un error (Puede que este registro tenga relación con otros items en el sistema). Debe eliminar primero los mismos.');
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
					alert_error('Ups!', 'Ha ocurrido un error (Puede que este registro tenga relación con otros items en el sistema). Debe eliminar primero los mismos.');
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgNTY4ZDlkZWNlY2ZiYTFjNjdjMjQiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9qcy92YWRtaW4tZnVuY3Rpb25zLmpzIl0sIm5hbWVzIjpbIiQiLCJhamF4U2V0dXAiLCJoZWFkZXJzIiwiYXR0ciIsImRvY3VtZW50Iiwib24iLCJlIiwic3RvcFByb3BhZ2F0aW9uIiwiQ2hlY2tUb0RlbGV0aW9uIiwicHJvcCIsImxlbmd0aCIsInJlbW92ZUNsYXNzIiwiYWRkQ2xhc3MiLCJ0eXBlIiwicm93Iiwic2VsZWN0ZWRSb3dzIiwiZWFjaCIsInB1c2giLCJ2YWwiLCJzaG93QnV0dG9ucyIsInVuZGVmaW5lZCIsImNoZWNrYm94IiwicGFyZW50IiwidHJpZ2dlciIsImNvdW50U2VsZWN0ZWQiLCJzY3JvbGwiLCJzY3JvbGxBbW91bnQiLCJ3aW5kb3ciLCJzY3JvbGxUb3AiLCJjc3MiLCJ1bmNoZWNrQWxsIiwiZmluZCIsImRlbGV0ZVJlY29yZCIsImlkIiwicm91dGUiLCJiaWd0ZXh0Iiwic21hbGx0ZXh0Iiwic3dhbCIsInRpdGxlIiwidGV4dCIsInNob3dDYW5jZWxCdXR0b24iLCJjb25maXJtQnV0dG9uQ29sb3IiLCJjYW5jZWxCdXR0b25Db2xvciIsImNvbmZpcm1CdXR0b25UZXh0IiwiY2FuY2VsQnV0dG9uVGV4dCIsImNvbmZpcm1CdXR0b25DbGFzcyIsImNhbmNlbEJ1dHRvbkNsYXNzIiwiYnV0dG9uc1N0eWxpbmciLCJ0aGVuIiwiYWpheCIsInVybCIsIm1ldGhvZCIsImRhdGFUeXBlIiwiZGF0YSIsImJlZm9yZVNlbmQiLCJzdWNjZXNzIiwiaGlkZSIsImkiLCJhbGVydF9vayIsImNvbnNvbGUiLCJsb2ciLCJhbGVydF9lcnJvciIsImVycm9yIiwiaHRtbCIsInJlc3BvbnNlVGV4dCIsImNvbXBsZXRlIiwiZGVsZXRlQW5kUmVsb2FkIiwibG9jYXRpb24iLCJyZWxvYWQiLCJhbGVydF9p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QSxZQUFPLEtBQVA7QUFDQTtBQUNELElBbEJLO0FBbUJOUyxVQUFPLGVBQVNULElBQVQsRUFDUDtBQUNDckQsTUFBRSxRQUFGLEVBQVkrRCxJQUFaLENBQWlCVixLQUFLVyxZQUF0QjtBQUNBTCxZQUFRQyxHQUFSLENBQVlQLElBQVo7QUFDQTtBQXZCSyxHQUFQO0FBeUJBLEVBdENEO0FBd0NBLENBekNEOztBQTJDQTs7Ozs7O0FBTUEsU0FBU0ssUUFBVCxDQUFrQnZCLE9BQWxCLEVBQTJCQyxTQUEzQixFQUFxQztBQUNqQ0MsTUFDSUYsT0FESixFQUVJQyxTQUZKLEVBR0ksU0FISjtBQUtIOztBQUVELFNBQVN5QixXQUFULENBQXFCMUIsT0FBckIsRUFBOEJDLFNBQTlCLEVBQXdDO0FBQ3BDQyxNQUNJRixPQURKLEVBRUlDLFNBRkosRUFHSSxPQUhKO0FBS0g7O0FBRUQsU0FBU2lDLFVBQVQsQ0FBb0JsQyxPQUFwQixFQUE2QkMsU0FBN0IsRUFBdUM7O0FBRW5DQyxNQUFLO0FBQ0dDLFNBQU9ILE9BRFY7QUFFRHRCLFFBQU0sTUFGTDtBQUdEa0QsUUFBTTNCLFNBSEw7QUFJRGtDLG1CQUFpQixJQUpoQjtBQUtEOUIsb0JBQWtCLEtBTGpCO0FBTURHLHFCQUNJO0FBUEgsRUFBTDtBQVNIOztBQUdELFNBQVM0QixXQUFULEdBQXNCO0FBQ3JCdkUsR0FBRSxJQUFGLEVBQVFzQixNQUFSLENBQWUsTUFBZjtBQUNBLEMiLCJmaWxlIjoiL2pzL3ZhZG1pbi1mdW5jdGlvbnMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCIvXCI7XG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gNzYpO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHdlYnBhY2svYm9vdHN0cmFwIDU2OGQ5ZGVjZWNmYmExYzY3YzI0IiwiJC5hamF4U2V0dXAoe1xyXG4gICAgaGVhZGVyczoge1xyXG4gICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXHJcbiAgICB9XHJcbn0pO1xyXG4gXHJcbi8qXHJcbnwtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG58IExJU1RTXHJcbnwtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG4qL1xyXG5cclxuXHJcbi8vIFNlbGVjdCBjaGVja2JveCB0byBkZWxldGlvblxyXG4kKGRvY3VtZW50KS5vbihcImNsaWNrXCIsIFwiLkxpc3QtQ2hlY2tib3hcIiwgZnVuY3Rpb24oZSlcclxue1xyXG5cdGUuc3RvcFByb3BhZ2F0aW9uKCk7XHJcblx0Q2hlY2tUb0RlbGV0aW9uKFwic2luZ2xlXCIsICQodGhpcykpO1xyXG59KTtcclxuXHJcbi8vIFNlbGVjdCBBbGwgcHJlc2VudCBjaGVja2JveGVzIHRvIGRlbGV0aW9uXHJcbiQoJy5TZWxlY3QtQWxsLVRvLURlbGV0ZScpLm9uKFwiY2xpY2tcIiwgZnVuY3Rpb24oKSB7XHJcblx0XHJcblx0aWYgKCQodGhpcykucHJvcCgnY2hlY2tlZCcpKSB7XHJcblx0XHQkKCcuTGlzdC1DaGVja2JveCcpLnByb3AoJ2NoZWNrZWQnLCB0cnVlKTtcclxuXHRcdGlmKCQoJy5MaXN0LUNoZWNrYm94JykubGVuZ3RoID49IDEpXHJcblx0XHR7XHJcblx0XHRcdENoZWNrVG9EZWxldGlvbihcImFsbFwiKVxyXG5cdFx0XHQkKCcuRGVsZXRlQnRuJykucmVtb3ZlQ2xhc3MoJ0hpZGRlbicpO1xyXG5cdFx0fVxyXG5cclxuXHRcdCQoJ3Rib2R5IHRyJykuYWRkQ2xhc3MoJ3Jvdy1zZWxlY3RlZCcpO1xyXG5cdH0gZWxzZSB7XHJcblx0XHQkKCcuTGlzdC1DaGVja2JveCcpLnByb3AoJ2NoZWNrZWQnLCBmYWxzZSk7XHJcblx0XHQkKCcuRGVsZXRlQnRuJykuYWRkQ2xhc3MoJ0hpZGRlbicpO1xyXG5cdFx0JCgndGJvZHkgdHInKS5yZW1vdmVDbGFzcygncm93LXNlbGVjdGVkJyk7XHJcblx0fVxyXG59KTtcclxuXHJcbmZ1bmN0aW9uIENoZWNrVG9EZWxldGlvbih0eXBlLCByb3cpXHJcbntcclxuXHR2YXIgc2VsZWN0ZWRSb3dzID0gW107XHJcblx0JChcIi5MaXN0LUNoZWNrYm94OmNoZWNrZWRcIikuZWFjaChmdW5jdGlvbigpIHsgICAgICAgICAgXHJcblx0XHRzZWxlY3RlZFJvd3MucHVzaCgkKHRoaXMpLmF0dHIoJ2RhdGEtaWQnKSk7XHJcblx0XHQkKCcjUm93c1RvRGVsZXRpb24nKS52YWwoc2VsZWN0ZWRSb3dzKTtcclxuXHR9KTtcclxuXHRcclxuXHRpZihzZWxlY3RlZFJvd3MubGVuZ3RoID09IDEpe1xyXG5cdFx0JCgnI0VkaXRJZCwgI0NyZWF0ZUZyb21Bbm90aGVySWQnKS52YWwoc2VsZWN0ZWRSb3dzKTtcclxuXHR9IGVsc2UgaWYoc2VsZWN0ZWRSb3dzLmxlbmd0aCA8IDEpe1xyXG5cdFx0JCgnI0VkaXRJZCwgI0NyZWF0ZUZyb21Bbm90aGVySWQnKS52YWwoJycpO1xyXG5cdH0gZWxzZSBpZihzZWxlY3RlZFJvd3MubGVuZ3RoID4gMSl7XHJcblx0XHQkKCcjRWRpdElkLCAjQ3JlYXRlRnJvbUFub3RoZXJJZCcpLnZhbCgnJyk7XHJcblx0fSBlbHNlIHtcclxuXHRcdCQoJyNFZGl0SWQsICNDcmVhdGVGcm9tQW5vdGhlcklkJykudmFsKCcnKTtcclxuXHR9XHJcblxyXG5cdHNob3dCdXR0b25zKHRoaXMpO1xyXG5cdGlmKHR5cGUgPT0gJ3NpbmdsZScgJiYgcm93ICE9IHVuZGVmaW5lZClcclxuXHR7XHJcblx0XHR2YXIgY2hlY2tib3ggPSByb3cucHJvcCgnY2hlY2tlZCcpO1xyXG5cdFx0aWYoY2hlY2tib3gpe1xyXG5cdFx0XHRyb3cucGFyZW50KCkucGFyZW50KCkucGFyZW50KCkuYWRkQ2xhc3MoJ3Jvdy1zZWxlY3RlZCcpO1xyXG5cdFx0fSBlbHNlIHtcclxuXHRcdFx0cm93LnBhcmVudCgpLnBhcmVudCgpLnBhcmVudCgpLnJlbW92ZUNsYXNzKCdyb3ctc2VsZWN0ZWQnKTtcclxuXHRcdH1cclxuXHR9XHJcbn1cclxuXHJcbi8vIC8vIFNldCBMaXN0IEFjdGlvbiBCdXR0b25zXHJcbi8vICQoZG9jdW1lbnQpLm9uKFwiY2xpY2tcIiwgXCIuTGlzdC1DaGVja2JveFwiLCBmdW5jdGlvbihlKXtcclxuLy8gICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XHJcbi8vIFx0dmFyIHNlbGVjdGVkUm93cyA9IFtdO1xyXG4vLyAgICAgJChcIi5MaXN0LUNoZWNrYm94OmNoZWNrZWRcIikuZWFjaChmdW5jdGlvbigpIHsgICAgICAgICAgXHJcbi8vICAgICAgICAgc2VsZWN0ZWRSb3dzLnB1c2goJCh0aGlzKS5hdHRyKCdkYXRhLWlkJykpO1xyXG4vLyBcdFx0JCgnI1Jvd3NUb0RlbGV0aW9uJykudmFsKHNlbGVjdGVkUm93cyk7XHJcbi8vICAgICB9KTtcclxuICAgICAgIFxyXG4vLyAgICAgaWYoc2VsZWN0ZWRSb3dzLmxlbmd0aCA9PSAxKXtcclxuLy8gXHRcdCQoJyNFZGl0SWQsICNDcmVhdGVGcm9tQW5vdGhlcklkJykudmFsKHNlbGVjdGVkUm93cyk7XHJcbi8vICAgICB9IGVsc2UgaWYoc2VsZWN0ZWRSb3dzLmxlbmd0aCA8IDEpe1xyXG4vLyBcdFx0JCgnI0VkaXRJZCwgI0NyZWF0ZUZyb21Bbm90aGVySWQnKS52YWwoJycpO1xyXG4vLyAgICAgfSBlbHNlIGlmKHNlbGVjdGVkUm93cy5sZW5ndGggPiAxKXtcclxuLy8gICAgICAgICAkKCcjRWRpdElkLCAjQ3JlYXRlRnJvbUFub3RoZXJJZCcpLnZhbCgnJyk7XHJcbi8vICAgICB9IGVsc2Uge1xyXG4vLyAgICAgICAgICQoJyNFZGl0SWQsICNDcmVhdGVGcm9tQW5vdGhlcklkJykudmFsKCcnKTtcclxuLy8gICAgIH1cclxuXHJcbi8vICAgICBzaG93QnV0dG9ucyh0aGlzKTtcclxuXHJcbi8vIFx0dmFyIGNoZWNrYm94ID0gJCh0aGlzKS5wcm9wKCdjaGVja2VkJyk7XHJcbi8vIFx0aWYoY2hlY2tib3gpe1xyXG4vLyBcdFx0JCh0aGlzKS5wYXJlbnQoKS5wYXJlbnQoKS5wYXJlbnQoKS5hZGRDbGFzcygncm93LXNlbGVjdGVkJyk7XHJcbi8vIFx0fSBlbHNlIHtcclxuLy8gXHRcdCQodGhpcykucGFyZW50KCkucGFyZW50KCkucGFyZW50KCkucmVtb3ZlQ2xhc3MoJ3Jvdy1zZWxlY3RlZCcpO1xyXG4vLyBcdH1cclxuLy8gfSk7XHJcblxyXG5cclxuZnVuY3Rpb24gc2hvd0J1dHRvbnModHJpZ2dlcikge1xyXG5cdFxyXG5cdHZhciBjb3VudFNlbGVjdGVkID0gJCgnLkxpc3QtQ2hlY2tib3g6Y2hlY2tib3g6Y2hlY2tlZCcpLmxlbmd0aDtcclxuXHRpZihjb3VudFNlbGVjdGVkID09IDEpIHtcclxuICAgICAgICAkKCcuRGVsZXRlQnRuJykucmVtb3ZlQ2xhc3MoJ0hpZGRlbicpO1xyXG5cdFx0JCgnLkVkaXRCdG4nKS5yZW1vdmVDbGFzcygnSGlkZGVuJyk7XHJcblx0XHQkKCcuQ3JlYXRlRnJvbUFub3RoZXJCdG4nKS5yZW1vdmVDbGFzcygnSGlkZGVuJyk7XHJcblx0fSBlbHNlIGlmKGNvdW50U2VsZWN0ZWQgPj0gMikge1xyXG5cdFx0JCgnLkVkaXRCdG4nKS5hZGRDbGFzcygnSGlkZGVuJyk7XHJcblx0XHQkKCcuQ3JlYXRlRnJvbUFub3RoZXJCdG4nKS5hZGRDbGFzcygnSGlkZGVuJyk7XHJcbiAgICB9IGVsc2UgaWYoY291bnRTZWxlY3RlZCA9PSAwKSB7XHJcbiAgICAgICAgJCgnLkRlbGV0ZUJ0bicpLmFkZENsYXNzKCdIaWRkZW4nKTtcclxuXHRcdCQoJy5FZGl0QnRuJykuYWRkQ2xhc3MoJ0hpZGRlbicpO1xyXG5cdFx0JCgnLkNyZWF0ZUZyb21Bbm90aGVyQnRuJykuYWRkQ2xhc3MoJ0hpZGRlbicpO1xyXG4gICAgfVxyXG59XHJcblxyXG4vLyBTaG93IEVkaXQgYW5kIERlbGV0ZSBidXR0b25zIGluIGJvdHRvbSBpZiBzY3JvbGxlZCB0byBtdXRjaFxyXG4kKGRvY3VtZW50KS5zY3JvbGwoZnVuY3Rpb24oZSl7XHJcblx0dmFyIHNjcm9sbEFtb3VudCA9ICQod2luZG93KS5zY3JvbGxUb3AoKTtcclxuXHRpZihzY3JvbGxBbW91bnQgPiAxNTApe1xyXG5cdFx0JCgnLkRlbGV0ZUJ0bicpLmNzcyh7XCJwb3NpdGlvblwiOlwiZml4ZWRcIiwgXCJib3R0b21cIjpcIjUwcHhcIiwgXCJyaWdodFwiOlwiMTBweFwiLCBcInotaW5kZXhcIjpcIjk5OVwifSk7XHJcblx0XHQkKCcuRWRpdEJ0bicpLmNzcyh7XCJwb3NpdGlvblwiOlwiZml4ZWRcIiwgXCJib3R0b21cIjpcIjUwcHhcIiwgXCJyaWdodFwiOlwiMTMwcHhcIiwgXCJ6LWluZGV4XCI6XCI5OTlcIn0pO1xyXG5cdFx0JCgnLkNyZWF0ZUZyb21Bbm90aGVyQnRuJykuY3NzKHtcInBvc2l0aW9uXCI6XCJmaXhlZFwiLCBcImJvdHRvbVwiOlwiNTBweFwiLCBcInJpZ2h0XCI6XCIyMzVweFwiLCBcInotaW5kZXhcIjpcIjk5OVwifSk7XHJcblx0fSBlbHNlIHtcclxuXHRcdCQoJy5EZWxldGVCdG4nKS5jc3Moe1wicG9zaXRpb25cIjpcInJlbGF0aXZlXCIsIFwiYm90dG9tXCI6XCJhdXRvXCIsIFwicmlnaHRcIjpcImF1dG9cIiwgXCJ6LWluZGV4XCI6XCI5OTlcIn0pO1xyXG5cdFx0JCgnLkVkaXRCdG4nKS5jc3Moe1wicG9zaXRpb25cIjpcInJlbGF0aXZlXCIsIFwiYm90dG9tXCI6XCJhdXRvXCIsIFwicmlnaHRcIjpcImF1dG9cIiwgXCJ6LWluZGV4XCI6XCI5OTlcIn0pO1xyXG5cdFx0JCgnLkNyZWF0ZUZyb21Bbm90aGVyQnRuJykuY3NzKHtcInBvc2l0aW9uXCI6XCJyZWxhdGl2ZVwiLCBcImJvdHRvbVwiOlwiYXV0b1wiLCBcInJpZ2h0XCI6XCJhdXRvXCIsIFwiei1pbmRleFwiOlwiOTk5XCJ9KTtcclxuXHRcdFxyXG5cdH1cclxufSk7XHJcblxyXG4vLyBVbmNoZWNrIGFsbCBjaGVja2JveGVzIG9uIHJlbG9hZC5cclxuZnVuY3Rpb24gdW5jaGVja0FsbCgpe1xyXG5cdCQoJyNUYWJsZUxpc3QgdGJvZHkgLkNoZWNrQm94ZXMnKS5maW5kKCdpbnB1dFt0eXBlPVwiY2hlY2tib3hcIl0nKS5lYWNoKGZ1bmN0aW9uKCkge1xyXG5cdFx0JCh0aGlzKS5wcm9wKCdjaGVja2VkJywgZmFsc2UpO1x0XHJcblx0fSk7XHRcclxufVxyXG51bmNoZWNrQWxsKCk7XHJcblxyXG4vKlxyXG58LS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cclxufCBGVU5DVElPTlNcclxufC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbiovXHJcblxyXG5kZWxldGVSZWNvcmQgPSBmdW5jdGlvbihpZCwgcm91dGUsIGJpZ3RleHQsIHNtYWxsdGV4dCkge1xyXG5cdHN3YWwoe1xyXG5cdFx0dGl0bGU6IGJpZ3RleHQsXHJcblx0XHR0ZXh0OiBzbWFsbHRleHQsXHJcblx0XHR0eXBlOiAnd2FybmluZycsXHJcblx0XHRzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxyXG5cdFx0Y29uZmlybUJ1dHRvbkNvbG9yOiAnIzMwODVkNicsXHJcblx0XHRjYW5jZWxCdXR0b25Db2xvcjogJyNkMzMnLFxyXG5cdFx0Y29uZmlybUJ1dHRvblRleHQ6ICdFTElNSU5BUicsXHJcblx0XHRjYW5jZWxCdXR0b25UZXh0OiAnQ2FuY2VsYXInLFxyXG5cdFx0Y29uZmlybUJ1dHRvbkNsYXNzOiAnYnRuIGJ0bkdyZWVuJyxcclxuXHRcdGNhbmNlbEJ1dHRvbkNsYXNzOiAnYnRuIGJ0blJlZCcsXHJcblx0XHRidXR0b25zU3R5bGluZzogZmFsc2VcclxuXHR9KS50aGVuKGZ1bmN0aW9uICgpIHtcclxuXHJcbiBcdFx0JC5hamF4KHtcclxuXHRcdFx0dXJsOiByb3V0ZSxcclxuXHRcdFx0bWV0aG9kOiAnUE9TVCcsICAgICAgICAgICAgIFxyXG5cdFx0XHRkYXRhVHlwZTogJ0pTT04nLFxyXG5cdFx0XHRkYXRhOiB7IGlkOiBpZCB9LFxyXG5cdFx0XHRiZWZvcmVTZW5kOiBmdW5jdGlvbigpe1xyXG5cdFx0XHRcdC8vICQoJyNNYWluLUxvYWRlcicpLnJlbW92ZUNsYXNzKCdIaWRkZW4nKTtcclxuXHRcdFx0fSxcclxuXHRcdFx0c3VjY2VzczogZnVuY3Rpb24oZGF0YSl7XHJcblx0XHRcdFx0JCgnI0JhdGNoRGVsZXRlQnRuJykuYWRkQ2xhc3MoJ0hpZGRlbicpO1xyXG5cdFx0XHRcdGlmIChkYXRhLnN1Y2Nlc3MgPT0gdHJ1ZSkge1xyXG5cdFx0XHRcdFx0JCgnI0lkJytpZCkuaGlkZSgyMDApO1xyXG5cdFx0XHRcdFx0Zm9yKGk9MDsgaSA8IGlkLmxlbmd0aCA7IGkrKyl7XHJcblx0XHRcdFx0XHRcdCQoJyNJZCcraWRbaV0pLmhpZGUoMjAwKTtcclxuXHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdGFsZXJ0X29rKCdPayEnLCdFbGltaW5hY2nDs24gY29tcGxldGEnKTtcclxuXHRcdFx0XHRcdGNvbnNvbGUubG9nKGRhdGEpO1xyXG5cdFx0XHRcdFx0cmV0dXJuIHRydWU7XHJcblx0XHRcdFx0fSBlbHNlIHtcclxuXHRcdFx0XHRcdGFsZXJ0X2Vycm9yKCdVcHMhJywnSGEgb2N1cnJpZG8gdW4gZXJyb3IgKFB1ZWRlIHF1ZSBlc3RlIHJlZ2lzdHJvIHRlbmdhIHJlbGFjacOzbiBjb24gb3Ryb3MgaXRlbXMgZW4gZWwgc2lzdGVtYSkuIERlYmUgZWxpbWluYXIgcHJpbWVybyBsb3MgbWlzbW9zLicpO1xyXG5cdFx0XHRcdFx0Y29uc29sZS5sb2coZGF0YSk7XHJcblx0XHRcdFx0XHRyZXR1cm4gZmFsc2U7XHJcblx0XHRcdFx0fVxyXG5cdFx0XHR9LFxyXG5cdFx0XHRlcnJvcjogZnVuY3Rpb24oZGF0YSlcclxuXHRcdFx0e1xyXG4gICAgICAgICAgICAgICAgJCgnI0Vycm9yJykuaHRtbChkYXRhLnJlc3BvbnNlVGV4dCk7XHJcblx0XHRcdFx0Y29uc29sZS5sb2coZGF0YSk7XHRcclxuXHRcdFx0fSxcclxuXHRcdFx0Y29tcGxldGU6IGZ1bmN0aW9uKClcclxuXHRcdFx0e1xyXG5cdFx0XHRcdC8vICQoJyNNYWluLUxvYWRlcicpLmFkZENsYXNzKCdIaWRkZW4nKTtcclxuXHRcdFx0fVxyXG5cdFx0fSk7XHJcblx0fSk7XHJcblxyXG59XHJcblxyXG5kZWxldGVBbmRSZWxvYWQgPSBmdW5jdGlvbihpZCwgcm91dGUsIGJpZ3RleHQsIHNtYWxsdGV4dCkge1xyXG5cdHN3YWwoe1xyXG5cdFx0dGl0bGU6IGJpZ3RleHQsXHJcblx0XHR0ZXh0OiBzbWFsbHRleHQsXHJcblx0XHR0eXBlOiAnd2FybmluZycsXHJcblx0XHRzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxyXG5cdFx0Y29uZmlybUJ1dHRvbkNvbG9yOiAnIzMwODVkNicsXHJcblx0XHRjYW5jZWxCdXR0b25Db2xvcjogJyNkMzMnLFxyXG5cdFx0Y29uZmlybUJ1dHRvblRleHQ6ICdFTElNSU5BUicsXHJcblx0XHRjYW5jZWxCdXR0b25UZXh0OiAnQ2FuY2VsYXInLFxyXG5cdFx0Y29uZmlybUJ1dHRvbkNsYXNzOiAnYnRuIGJ0bkdyZWVuJyxcclxuXHRcdGNhbmNlbEJ1dHRvbkNsYXNzOiAnYnRuIGJ0blJlZCcsXHJcblx0XHRidXR0b25zU3R5bGluZzogZmFsc2VcclxuXHR9KS50aGVuKGZ1bmN0aW9uICgpIHtcclxuXHRcdCQuYWpheCh7XHJcblx0XHRcdHVybDogcm91dGUsXHJcblx0XHRcdG1ldGhvZDogJ1BPU1QnLCAgICAgICAgICAgICBcclxuXHRcdFx0ZGF0YVR5cGU6ICdKU09OJyxcclxuXHRcdFx0ZGF0YTogeyBpZDogaWQgfSxcclxuXHRcdFx0YmVmb3JlU2VuZDogZnVuY3Rpb24oKXtcclxuXHRcdFx0XHQvLyAkKCcjTWFpbi1Mb2FkZXInKS5yZW1vdmVDbGFzcygnSGlkZGVuJyk7XHJcblx0XHRcdH0sXHJcblx0XHRcdHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpe1xyXG5cdFx0XHRcdCQoJyNCYXRjaERlbGV0ZUJ0bicpLmFkZENsYXNzKCdIaWRkZW4nKTtcclxuXHRcdFx0XHRpZiAoZGF0YS5zdWNjZXNzID09IHRydWUpIHtcclxuXHRcdFx0XHRcdC8vIGFsZXJ0X29rKCdPayEnLCdFbGltaW5hY2nDs24gY29tcGxldGEnKTtcclxuXHRcdFx0XHRcdGxvY2F0aW9uLnJlbG9hZCgpO1xyXG5cdFx0XHRcdH0gZWxzZSB7XHJcblx0XHRcdFx0XHRhbGVydF9lcnJvcignVXBzIScsJ0hhIG9jdXJyaWRvIHVuIGVycm9yIChQdWVkZSBxdWUgZXN0ZSByZWdpc3RybyB0ZW5nYSByZWxhY2nDs24gY29uIG90cm9zIGl0ZW1zIGVuIGVsIHNpc3RlbWEpLiBEZWJlIGVsaW1pbmFyIHByaW1lcm8gbG9zIG1pc21vcy4nKTtcclxuXHRcdFx0XHRcdGNvbnNvbGUubG9nKGRhdGEpO1xyXG5cdFx0XHRcdFx0cmV0dXJuIGZhbHNlO1xyXG5cdFx0XHRcdH1cclxuXHRcdFx0fSxcclxuXHRcdFx0ZXJyb3I6IGZ1bmN0aW9uKGRhdGEpXHJcblx0XHRcdHtcclxuXHRcdFx0XHQkKCcjRXJyb3InKS5odG1sKGRhdGEucmVzcG9uc2VUZXh0KTtcclxuXHRcdFx0XHRjb25zb2xlLmxvZyhkYXRhKTtcdFxyXG5cdFx0XHR9XHJcblx0XHR9KTtcclxuXHR9KTtcclxuXHJcbn1cclxuXHJcbi8qXHJcbnwtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG58IEFMRVJUU1xyXG58LS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cclxuKi9cclxuXHJcbmZ1bmN0aW9uIGFsZXJ0X29rKGJpZ3RleHQsIHNtYWxsdGV4dCl7XHJcbiAgICBzd2FsKFxyXG4gICAgICAgIGJpZ3RleHQsXHJcbiAgICAgICAgc21hbGx0ZXh0LFxyXG4gICAgICAgICdzdWNjZXNzJ1xyXG4gICAgKTsgICAgXHJcbn1cclxuICAgIFxyXG5mdW5jdGlvbiBhbGVydF9lcnJvcihiaWd0ZXh0LCBzbWFsbHRleHQpe1xyXG4gICAgc3dhbChcclxuICAgICAgICBiaWd0ZXh0LFxyXG4gICAgICAgIHNtYWxsdGV4dCxcclxuICAgICAgICAnZXJyb3InXHJcbiAgICApO1xyXG59XHJcblxyXG5mdW5jdGlvbiBhbGVydF9pbmZvKGJpZ3RleHQsIHNtYWxsdGV4dCl7XHJcblxyXG4gICAgc3dhbCh7XHJcbiAgICAgICAgICAgIHRpdGxlOiBiaWd0ZXh0LFxyXG4gICAgICAgIHR5cGU6ICdpbmZvJyxcclxuICAgICAgICBodG1sOiBzbWFsbHRleHQsXHJcbiAgICAgICAgc2hvd0Nsb3NlQnV0dG9uOiB0cnVlLFxyXG4gICAgICAgIHNob3dDYW5jZWxCdXR0b246IGZhbHNlLFxyXG4gICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OlxyXG4gICAgICAgICAgICAnPGkgY2xhc3M9XCJpb24tY2hlY2ttYXJrLXJvdW5kXCI+PC9pPiBPayEnXHJcbiAgICAgICAgfSk7XHJcbn1cclxuXHJcblxyXG5mdW5jdGlvbiBjbG9zZVBhcmVudCgpe1xyXG5cdCQodGhpcykucGFyZW50KCdoaWRlJyk7XHJcbn1cclxuXHJcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3Jlc291cmNlcy9hc3NldHMvanMvdmFkbWluLWZ1bmN0aW9ucy5qcyJdLCJzb3VyY2VSb290IjoiIn0=