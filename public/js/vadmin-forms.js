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
/******/ 	return __webpack_require__(__webpack_require__.s = 78);
/******/ })
/************************************************************************/
/******/ ({

/***/ 78:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(79);


/***/ }),

/***/ 79:
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//----------------------------------------------
//                    Colors
//----------------------------------------------

$('.Select-Colors').chosen({
    placeholder_text_multiple: 'Seleccione los colores',
    // max_selected_options: 3,
    search_contains: true,
    no_results_text: 'No se ha encontrado el color'
});

//----------------------------------------------
//                     Tags
//----------------------------------------------
$('.Select-Tags').chosen({
    placeholder_text_multiple: 'Seleccione las etiquetas',
    // max_selected_options: 3,
    search_contains: true,
    no_results_text: 'No se ha encontrado la etiqueta'
});

$('.Select-Brand').chosen({
    placeholder_text_single: 'Seleccione la marca',
    // max_selected_options: 3,
    search_contains: true,
    no_results_text: 'No se ha encontrado la marca'
});

$('.Select-Atribute').chosen({
    placeholder_text_multiple: 'Seleccionar',
    // max_selected_options: 3,
    search_contains: true,
    no_results_text: 'No se ha encontrado'
});

$('.Select-Category').chosen({
    placeholder_text_single: 'Seleccione una categoría'
});

$('.Select-Chosen').chosen({
    placeholder_text_single: 'Seleccione una categoría'
});

//----------------------------------------------
//              Slug creator
//----------------------------------------------

$(".SlugInput").keyup(function () {
    var Text = $(this).val();
    Text = Text.toLowerCase();
    var regExp = /\s+/g;
    Text = Text.replace(/[&\/\\#,¡!´#+()$~%.'":*?<>{}]/g, '');
    Text = Text.replace(regExp, '-');
    Text = Text.replace('ñ', 'n');
    Text = Text.replace('á', 'a');
    Text = Text.replace('é', 'e');
    Text = Text.replace('í', 'i');
    Text = Text.replace('ó', 'o');
    Text = Text.replace('ú', 'u');

    $(".SlugInput").val(Text);
});

// Slug AutoFillnput from title 

$("#TitleInput").keyup(function (event) {
    var stt = $(this).val();
    var Text = $(this).val();
    Text = Text.toLowerCase();
    var regExp = /\s+/g;
    Text = Text.replace(/[&\/\\#,¡!´#+()$~%.'":*?<>{}]/g, '');
    Text = Text.replace(regExp, '-');
    Text = Text.replace('ñ', 'n');
    Text = Text.replace('á', 'a');
    Text = Text.replace('é', 'e');
    Text = Text.replace('í', 'i');
    Text = Text.replace('ó', 'o');
    Text = Text.replace('ú', 'u');
    $(".SlugInput").val(Text);
});

//----------------------------------------------
//      CREATE FORM
//----------------------------------------------

// Show Notes Text Area
$('.ShowNotesTextArea').click(function () {
    var notes = $('.NotesTextArea');
    if (notes.hasClass('Hidden')) {
        notes.removeClass('Hidden');
    } else {
        notes.addClass('Hidden');
    }
});

// Add Another Address
$('.AddAnotherAddressBtn').click(function () {
    var addressInput = "<input class='form-control' placeholder='Ingrese otro teléfono' name='deliveryaddress[]' type='text' style='margin-top:5px'>";
    var locInput = "<input class='form-control' placeholder='Ingrese otro teléfono' name='deliveryaddress[]' type='text' style='margin-top:5px'>";

    $('.AnotherAddress').append(addressInput);
    $('.AnotherLoc').append(locInput);
});

//----------------------------------------------
//     CREATE ARTICLE VARIANTS
//----------------------------------------------

window.checkVariants = function () {
    var existingCombinations = [];
    $(".Combination").each(function () {
        existingCombinations.push($(this).data('combination'));
    });
    return existingCombinations;
};

window.makeVariants = function () {
    var variantsContainer = $('#ArticleVariants');
    var variantSize = $('.VariantSize');
    var variantColor = $('.VariantColor');

    var colors = [];
    var sizes = [];

    $.each(variantSize, function () {
        if ($(this).is(':checked')) {
            size = {};
            size['id'] = $(this).val();
            size['name'] = $(this).data('name');
            sizes.push(size);
        }
    });

    $.each(variantColor, function () {
        if ($(this).is(':checked')) {
            color = {};
            color['id'] = $(this).val();
            color['name'] = $(this).data('name');
            colors.push(color);
        }
    });

    var combinations = [];

    $.each(colors, function (index, color) {
        $.each(sizes, function (index, size) {
            var item = {};
            item['combination'] = color['name'] + "/" + size['name'];
            item['color'] = color['name'];
            item['color_id'] = color['id'];
            item['size'] = size['name'];
            item['size_id'] = size['id'];
            combinations.push(item);
        });
    });

    console.log(combinations);

    var existingCombinations = checkVariants();

    $.each(combinations, function (index, value) {
        // ECMA script 6 
        if (!existingCombinations.includes(value['combination'])) {
            var variantRow = "<tr>" + "<td class='Combination' data-combination=" + value['color'] + "/" + value['size'] + ">" + value['color'] + "/" + value['size'] + "</td>" + "<input name='variants[" + value['combination'] + "][color]' value=" + value['color_id'] + " type='hidden' class='form-control'>" + "<input name='variants[" + value['combination'] + "][size]' value=" + value['size_id'] + " type='hidden' class='form-control'>" + "<td><input name='variants[" + value['combination'] + "][stock]' value='10' type='number' min='0' class='form-control'></td>" + "<td><a class='RemoveDynRow delete-icon'><i class='delete-icon fa fa-trash'></i></a></td>" + "</tr>";
            variantsContainer.append(variantRow);
        }
    });
    $('#HeaderVariants').removeClass('Hidden');
};

// Remove new variants row
$('#ArticleVariants').on('click', '.RemoveDynRow', function (e) {
    e.preventDefault();
    $(this).parents('tr').remove();
});

$('.RemoveVariant').on('click', function () {
    console.log($(this).data('rowid'));
    deleteDBItem($(this).data('route'), $(this).data('id'), $(this).data('rowid'));
});

window.deleteDBItem = function (route, id, rowid) {
    $.ajax({
        url: route,
        method: 'POST',
        dataType: 'JSON',
        data: { id: id },
        beforeSend: function beforeSend() {},
        success: function success(data) {
            console.log(data);
            if (data.success == true) {
                // $("#"+rowid).hide();
                $("#" + rowid).remove();
            } else {
                alert_error('Ups!', 'Ha ocurrido un error al eliminar la variante');
                console.log(data);
                console.log(data.message);
                return false;
            }
        },
        error: function error(data) {
            $('#Error').html(data.responseText);
            console.log(data);
            console.log(data.message);
        }
    });
};

//----------------------------------------------
//   EDITORS AND FIELDS 
//----------------------------------------------

// $('#Multi_Images').fileuploader({
//     extensions: ['jpg', 'jpeg', 'png', 'gif'],
//     limit: null,
//     addMore: true,
//     // Peso máximo de todas las imágenes
//     maxSize: 5,
//     // Peso máximo por imágen
//     fileMaxSize: 2,
//     theme: 'thumbnails',
//     enableApi: true,
//     captions: {
//         button: function(options) { return 'Seleccionar ' + (options.limit == 1 ? 'Imágenes' : 'Imágen'); },
//         feedback: function(options) { return 'Haga click para agregar...'; },
//         feedback2: function(options) { return options.length + ' ' + (options.length > 1 ? ' imágenes seleccionadas' : ' imágen seleccionada'); },
//         drop: 'Arrastre las imágenes aquí',
//         paste: '<div class="fileuploader-pending-loader"><div class="left-half" style="animation-duration: ${ms}s"></div><div class="spinner" style="animation-duration: ${ms}s"></div><div class="right-half" style="animation-duration: ${ms}s"></div></div> Pasting a file, click here to cancel.',
//         removeConfirmation: 'Eliminar?',
//         errors: {
//             filesLimit: 'Solo es posible subir ${limit} imágen.',
//             filesType: 'Solo se aceptan los formatos: ${extensions}.',
//             fileSize: '${name} es muy grandes! Seleccione una de ${fileMaxSize}MB. como máximo',
//             filesSizeAll: '${name} son muy grandes! Seleccione unas de ${fileMaxSize}MB. como máximo',
//             fileName: 'La imágen con el nombre ${name} ya está seleccionada.',
//             folderUpload: 'No está permitido subir carpetas.'
//         },
//         dialogs: {
//             // alert dialog
//             alert: function(text) {
//                 return alert_confirm(text);
//             },
//             // confirm dialog
//             confirm: function(text, callback) {
//                 'confirm(text) ? callback() : null;'
//             }
//         },
//     }
// });

$('#Single_Image').fileuploader({
    extensions: ['jpg', 'jpeg', 'png', 'gif'],
    limit: 1,
    addMore: false,
    fileMaxSize: 2,
    captions: {
        button: function button(options) {
            return 'Seleccionar ' + (options.limit == 1 ? 'Imágen' : 'Imágen');
        },
        feedback: function feedback(options) {
            return 'Agregar imágenes...';
        },
        feedback2: function feedback2(options) {
            return options.length + ' ' + (options.length > 1 ? ' imágenes seleccionadas' : ' imágen seleccionada');
        },
        drop: 'Arrastre las imágenes aquí',
        paste: '<div class="fileuploader-pending-loader"><div class="left-half" style="animation-duration: ${ms}s"></div><div class="spinner" style="animation-duration: ${ms}s"></div><div class="right-half" style="animation-duration: ${ms}s"></div></div> Pasting a file, click here to cancel.',
        removeConfirmation: 'Eliminar?',
        errors: {
            filesLimit: 'Solo es posible subir ${limit} imágen.',
            filesType: 'Solo se aceptan los formatos: ${extensions}.',
            fileSize: 'La imágen pesa mucho! Elija una de ${fileMaxSize}MB como máximo.',
            fileName: 'La imágen con ese nombre ya ha sido elegida',
            folderUpload: 'No está permitido subir carpetas.'
        },
        dialogs: {
            // alert dialog
            alert: function (_alert) {
                function alert(_x) {
                    return _alert.apply(this, arguments);
                }

                alert.toString = function () {
                    return _alert.toString();
                };

                return alert;
            }(function (text) {
                return alert(text);
            }),
            // confirm dialog
            confirm: function confirm(text, callback) {
                'confirm(text) ? callback() : null;';
            }
        }
    }
});

//enable fileuploader plugin
// $('#ImagesUploader').fileuploader({
//     extensions: ['jpg', 'jpeg', 'png', 'gif'],
//     addMore: true,
//     enableApi: true,
//     thumbnails: {
//         onImageLoaded: function(item) {
//             item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-sort fas fa-sort title="Sort"><i></i></a>');
//             if (!item.html.find('.fileuploader-action-edit').length)
//                 item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-popup fileuploader-action-edit fas fa-edit" title="Edit"><i></i></a>');
//         }
//     },
//     editor: {
//         cropper: {
//             ratio: '1:1',
//             minWidth: 100,
//             minHeight: 100,
//             showGrid: true
//         }
//     },
//     sorter: {
//         selectorExclude: null,
//         placeholder: null,
//         scrollContainer: window,
//         onSort: function(list, listEl, parentEl, newInputEl, inputEl) {
//             // onSort callback
//         }
//     }
// });


$('#Multi_Images').fileuploader({
    extensions: ['jpg', 'jpeg', 'png', 'gif', 'bmp'],
    changeInput: ' ',
    theme: 'thumbnails',
    enableApi: true,
    addMore: true,
    dragDrop: {
        // set the drop container {null, String, jQuery Object}
        // example: 'body'
        container: null,

        // Callback fired on entering with dragging files the drop container
        onDragEnter: function onDragEnter(event, listEl, parentEl, newInputEl, inputEl) {
            // callback will go here
        },

        // Callback fired on leaving with dragging files the drop container
        onDragLeave: function onDragLeave(event, listEl, parentEl, newInputEl, inputEl) {
            // callback will go here
        },

        // Callback fired on dropping the files in the drop container
        onDrop: function onDrop(event, listEl, parentEl, newInputEl, inputEl) {
            // callback will go here
        }
    },
    sorter: {
        selectorExclude: null,
        placeholder: null,
        scrollContainer: window,
        onSort: function onSort(list, listEl, parentEl, newInputEl, inputEl) {
            // onSort callback
        }
    },
    thumbnails: _defineProperty({
        onItemShow: function onItemShow(item) {
            // add sorter button to the item html<i class="fas fa-sort"></i>
            item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-sort fas fa-sort" title="Sort"><i></i></a>');
        },
        box: '<div class="fileuploader-items">' + '<ul class="fileuploader-items-list">' + '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">+</div></li>' + '</ul>' + '</div>',
        item: '<li class="fileuploader-item">' + '<div class="fileuploader-item-inner">' + '<div class="thumbnail-holder">${image}</div>' + '<div class="actions-holder">' + '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' + '<span class="fileuploader-action-popup"></span>' + '</div>' + '<div class="progress-holder">${progressBar}</div>' + '</div>' + '</li>',
        item2: '<li class="fileuploader-item">' + '<div class="fileuploader-item-inner">' + '<div class="thumbnail-holder">${image}</div>' + '<div class="actions-holder">' + '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' + '<span class="fileuploader-action-popup"></span>' + '</div>' + '</div>' + '</li>',
        startImageRenderer: true,
        canvasImage: false,
        _selectors: {
            list: '.fileuploader-items-list',
            item: '.fileuploader-item',
            start: '.fileuploader-action-start',
            retry: '.fileuploader-action-retry',
            sorter: '.fileuploader-action-sort',
            remove: '.fileuploader-action-remove'
        }
    }, 'onItemShow', function onItemShow(item, listEl, parentEl, newInputEl, inputEl) {
        var plusInput = listEl.find('.fileuploader-thumbnails-input'),
            api = $.fileuploader.getInstance(inputEl.get(0));

        plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();

        if (item.format == 'image') {
            item.html.find('.fileuploader-item-icon').hide();
        }
    }),
    afterRender: function afterRender(listEl, parentEl, newInputEl, inputEl) {
        var plusInput = listEl.find('.fileuploader-thumbnails-input'),
            api = $.fileuploader.getInstance(inputEl.get(0));

        plusInput.on('click', function () {
            api.open();
        });
    },
    onRemove: function onRemove(item, listEl, parentEl, newInputEl, inputEl) {
        var plusInput = listEl.find('.fileuploader-thumbnails-input'),
            api = $.fileuploader.getInstance(inputEl.get(0));

        if (api.getOptions().limit && api.getChoosedFiles().length - 1 < api.getOptions().limit) plusInput.show();
    }
    /*
    // while using upload option, please set
    // startImageRenderer: false
    // for a better effect
    upload: {
        url: './php/upload_file.php',
        data: null,
        type: 'POST',
        enctype: 'multipart/form-data',
        start: true,
        synchron: true,
        beforeSend: null,
        onSuccess: function(data, item) {
            setTimeout(function() {
                item.html.find('.progress-holder').hide();
                item.renderThumbnail();
            }, 400);
        },
        onError: function(item) {
            item.html.find('.progress-holder').hide();
            item.html.find('.fileuploader-item-icon i').text('Failed!');
        },
        onProgress: function(data, item) {
            var progressBar = item.html.find('.progress-holder');
            
            if(progressBar.length > 0) {
                progressBar.show();
                progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
            }
        }
    },
    dragDrop: {
        container: '.fileuploader-thumbnails-input'
    },
    onRemove: function(item) {
        $.post('php/upload_remove.php', {
            file: item.name
        });
    },
    */
});

$('.Display-Input-Modificable').click(function () {
    $(this).removeClass('display-input-disabled');
});

// ---- Modificable input text
// Html element
//<p data-editable class="SlugInput">{{ $article->slug }}</p>   

$('body').on('click', '[data-editable]', function () {

    var $el = $(this);

    var $input = $('<input/>').val($el.text());
    $el.replaceWith($input);

    var save = function save() {
        var $p = $('<p data-editable />').text($input.val());
        $input.replaceWith($p);
    };

    /**
      We're defining the callback with `one`, because we know that
      the element will be gone just after that, and we don't want 
      any callbacks leftovers take memory. 
      Next time `p` turns into `input` this single callback 
      will be applied again.
    */
    $input.one('blur', save).focus();
});

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgZDQ2ZjcyZmExNjI3MjIzNThhN2UiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9qcy92YWRtaW4tZm9ybXMuanMiXSwibmFtZXMiOlsiJCIsImNob3NlbiIsInBsYWNlaG9sZGVyX3RleHRfbXVsdGlwbGUiLCJzZWFyY2hfY29udGFpbnMiLCJub19yZXN1bHRzX3RleHQiLCJwbGFjZWhvbGRlcl90ZXh0X3NpbmdsZSIsImtleXVwIiwiVGV4dCIsInZhbCIsInRvTG93ZXJDYXNlIiwicmVnRXhwIiwicmVwbGFjZSIsImV2ZW50Iiwic3R0IiwiY2xpY2siLCJub3RlcyIsImhhc0NsYXNzIiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyIsImFkZHJlc3NJbnB1dCIsImxvY0lucHV0IiwiYXBwZW5kIiwid2luZG93IiwiY2hlY2tWYXJpYW50cyIsImV4aXN0aW5nQ29tYmluYXRpb25zIiwiZWFjaCIsInB1c2giLCJkYXRhIiwibWFrZVZhcmlhbnRzIiwidmFyaWFudHNDb250YWluZXIiLCJ2YXJpYW50U2l6ZSIsInZhcmlhbnRDb2xvciIsImNvbG9ycyIsInNpemVzIiwiaXMiLCJzaXplIiwiY29sb3IiLCJjb21iaW5hdGlvbnMiLCJpbmRleCIsIml0ZW0iLCJjb25zb2xlIiwibG9nIiwidmFsdWUiLCJpbmNsdWRlcyIsInZhcmlhbnRSb3ciLCJvbiIsImUiLCJwcmV2ZW50RGVmYXVsdCIsInBhcmVudHMiLCJyZW1vdmUiLCJkZWxldGVEQkl0ZW0iLCJyb3V0ZSIsImlkIiwicm93aWQiLCJhamF4IiwidXJsIiwibWV0aG9kIiwiZGF0YVR5cGUiLCJiZWZvcmVTZW5kIiwic3VjY2VzcyIsImFsZXJ0X2Vycm9yIiwibWVzc2FnZSIsImVycm9yIiwiaHRtbCIsInJlc3BvbnNlVGV4dCIsImZpbGV1cGxvYWRlciIsImV4dGVuc2lvbnMiLCJsaW1pdCIsImFkZE1vcmUiLCJmaWxlTWF4U2l6ZSIsImNhcHRpb25zIiwiYnV0dG9uIiwib3B0aW9ucyIsImZlZWRiYWNrIiwiZmVlZGJhY2syIiwibGVuZ3RoIiwiZHJvcCIsInBhc3RlIiwicmVtb3ZlQ29uZmlybWF0aW9uIiwiZXJyb3JzIiwiZmlsZXNMaW1pdCIsImZpbGVzVHlwZSIsImZpbGVTaXplIiwiZmlsZU5hbWUiLCJmb2xkZXJVcGxvYWQiLCJkaWFsb2dzIiwiYWxlcnQiLCJ0ZXh0IiwiY29uZmlybSIsImNhbGxiYWNrIiwiY2hhbmdlSW5wdXQiLCJ0aGVtZSIsImVuYWJsZUFwaSIsImRyYWdEcm9wIiwiY29udGFpbmVyIiwib25EcmFnRW50ZXIiLCJsaXN0RWwiLCJwYXJlbnRFbCIsIm5ld0lucHV0RWwiLCJpbnB1dEVsIiwib25EcmFnTGVhdmUiLCJvbkRyb3AiLCJzb3J0ZXIiLCJzZWxlY3RvckV4Y2x1ZGUiLCJwbGFjZWhvbGRlciIsInNjcm9sbENvbnRhaW5lciIsIm9uU29ydCIsImxpc3QiLCJ0aHVtYm5haWxzIiwib25JdGVtU2hvdyIsImZpbmQiLCJiZWZvcmUiLCJib3giLCJpdGVtMiIsInN0YXJ0SW1hZ2VSZW5kZXJlciIsImNhbnZhc0ltYWdlIiwiX3NlbGVjdG9ycyIsInN0YXJ0IiwicmV0cnkiLCJwbHVzSW5wdXQiLCJhcGkiLCJnZXRJbnN0YW5jZSIsImdldCIsImluc2VydEFmdGVyIiwiZ2V0T3B0aW9ucyIsImdldENob29zZWRGaWxlcyIsImZvcm1hdCIsImhpZGUiLCJhZnRlclJlbmRlciIsIm9wZW4iLCJvblJlbW92ZSIsInNob3ciLCIkZWwiLCIkaW5wdXQiLCJyZXBsYWNlV2l0aCIsInNhdmUiLCIkcCIsIm9uZSIsImZvY3VzIl0sIm1hcHBpbmdzIjoiO0FBQUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFD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bW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCIvXCI7XG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gNzgpO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHdlYnBhY2svYm9vdHN0cmFwIGQ0NmY3MmZhMTYyNzIyMzU4YTdlIiwiLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbi8vICAgICAgICAgICAgICAgICAgICBDb2xvcnNcclxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcblxyXG4kKCcuU2VsZWN0LUNvbG9ycycpLmNob3Nlbih7XHJcbiAgICBwbGFjZWhvbGRlcl90ZXh0X211bHRpcGxlOiAnU2VsZWNjaW9uZSBsb3MgY29sb3JlcycsXHJcbiAgICAvLyBtYXhfc2VsZWN0ZWRfb3B0aW9uczogMyxcclxuICAgIHNlYXJjaF9jb250YWluczogdHJ1ZSxcclxuICAgIG5vX3Jlc3VsdHNfdGV4dDogJ05vIHNlIGhhIGVuY29udHJhZG8gZWwgY29sb3InXHJcbn0pO1xyXG5cclxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbi8vICAgICAgICAgICAgICAgICAgICAgVGFnc1xyXG4vLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cclxuJCgnLlNlbGVjdC1UYWdzJykuY2hvc2VuKHtcclxuICAgIHBsYWNlaG9sZGVyX3RleHRfbXVsdGlwbGU6ICdTZWxlY2Npb25lIGxhcyBldGlxdWV0YXMnLFxyXG4gICAgLy8gbWF4X3NlbGVjdGVkX29wdGlvbnM6IDMsXHJcbiAgICBzZWFyY2hfY29udGFpbnM6IHRydWUsXHJcbiAgICBub19yZXN1bHRzX3RleHQ6ICdObyBzZSBoYSBlbmNvbnRyYWRvIGxhIGV0aXF1ZXRhJ1xyXG59KTtcclxuXHJcbiQoJy5TZWxlY3QtQnJhbmQnKS5jaG9zZW4oe1xyXG4gICAgcGxhY2Vob2xkZXJfdGV4dF9zaW5nbGU6ICdTZWxlY2Npb25lIGxhIG1hcmNhJyxcclxuICAgIC8vIG1heF9zZWxlY3RlZF9vcHRpb25zOiAzLFxyXG4gICAgc2VhcmNoX2NvbnRhaW5zOiB0cnVlLFxyXG4gICAgbm9fcmVzdWx0c190ZXh0OiAnTm8gc2UgaGEgZW5jb250cmFkbyBsYSBtYXJjYSdcclxufSk7XHJcblxyXG5cclxuXHJcbiQoJy5TZWxlY3QtQXRyaWJ1dGUnKS5jaG9zZW4oe1xyXG4gICAgcGxhY2Vob2xkZXJfdGV4dF9tdWx0aXBsZTogJ1NlbGVjY2lvbmFyJyxcclxuICAgIC8vIG1heF9zZWxlY3RlZF9vcHRpb25zOiAzLFxyXG4gICAgc2VhcmNoX2NvbnRhaW5zOiB0cnVlLFxyXG4gICAgbm9fcmVzdWx0c190ZXh0OiAnTm8gc2UgaGEgZW5jb250cmFkbydcclxufSk7XHJcblxyXG4kKCcuU2VsZWN0LUNhdGVnb3J5JykuY2hvc2VuKHtcclxuICAgIHBsYWNlaG9sZGVyX3RleHRfc2luZ2xlOiAnU2VsZWNjaW9uZSB1bmEgY2F0ZWdvcsOtYScsXHJcbn0pO1xyXG5cclxuJCgnLlNlbGVjdC1DaG9zZW4nKS5jaG9zZW4oe1xyXG4gICAgcGxhY2Vob2xkZXJfdGV4dF9zaW5nbGU6ICdTZWxlY2Npb25lIHVuYSBjYXRlZ29yw61hJyxcclxufSk7XHJcblxyXG5cclxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbi8vICAgICAgICAgICAgICBTbHVnIGNyZWF0b3JcclxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcblxyXG4kKFwiLlNsdWdJbnB1dFwiKS5rZXl1cChmdW5jdGlvbigpe1xyXG4gICAgdmFyIFRleHQgICAgID0gJCh0aGlzKS52YWwoKTtcclxuICAgIFRleHQgICAgICAgICA9IFRleHQudG9Mb3dlckNhc2UoKTtcclxuICAgIHZhciByZWdFeHAgICA9IC9cXHMrL2c7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoL1smXFwvXFxcXCMswqEhwrQjKygpJH4lLidcIjoqPzw+e31dL2csJycpO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKHJlZ0V4cCwnLScpO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDsScsICduJykgO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDoScsICdhJykgO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDqScsICdlJykgO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDrScsICdpJykgO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDsycsICdvJykgO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDuicsICd1JykgO1xyXG4gICAgXHJcbiAgICAkKFwiLlNsdWdJbnB1dFwiKS52YWwoVGV4dCk7ICAgXHJcbn0pO1xyXG5cclxuLy8gU2x1ZyBBdXRvRmlsbG5wdXQgZnJvbSB0aXRsZSBcclxuXHJcbiQoXCIjVGl0bGVJbnB1dFwiKS5rZXl1cChmdW5jdGlvbihldmVudCkge1xyXG4gICAgdmFyIHN0dCA9ICQodGhpcykudmFsKCk7XHJcbiAgICB2YXIgVGV4dCAgICAgPSAkKHRoaXMpLnZhbCgpO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC50b0xvd2VyQ2FzZSgpO1xyXG4gICAgdmFyIHJlZ0V4cCAgID0gL1xccysvZztcclxuICAgIFRleHQgICAgICAgICA9IFRleHQucmVwbGFjZSgvWyZcXC9cXFxcIyzCoSHCtCMrKCkkfiUuJ1wiOio/PD57fV0vZywnJyk7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UocmVnRXhwLCctJyk7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8OxJywgJ24nKSA7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8OhJywgJ2EnKSA7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8OpJywgJ2UnKSA7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8OtJywgJ2knKSA7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8OzJywgJ28nKSA7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8O6JywgJ3UnKSA7XHJcbiAgICAkKFwiLlNsdWdJbnB1dFwiKS52YWwoVGV4dCk7ICAgXHJcbn0pO1xyXG5cclxuXHJcbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG4vLyAgICAgIENSRUFURSBGT1JNXHJcbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG5cclxuLy8gU2hvdyBOb3RlcyBUZXh0IEFyZWFcclxuJCgnLlNob3dOb3Rlc1RleHRBcmVhJykuY2xpY2soZnVuY3Rpb24oKXtcclxuICAgIHZhciBub3RlcyA9ICQoJy5Ob3Rlc1RleHRBcmVhJyk7XHJcbiAgICBpZiAobm90ZXMuaGFzQ2xhc3MoJ0hpZGRlbicpKXtcclxuICAgICAgICBub3Rlcy5yZW1vdmVDbGFzcygnSGlkZGVuJyk7XHJcbiAgICB9IGVsc2Uge1xyXG4gICAgICAgIG5vdGVzLmFkZENsYXNzKCdIaWRkZW4nKTtcclxuICAgIH1cclxufSk7XHJcblxyXG4vLyBBZGQgQW5vdGhlciBBZGRyZXNzXHJcbiQoJy5BZGRBbm90aGVyQWRkcmVzc0J0bicpLmNsaWNrKGZ1bmN0aW9uKCl7XHJcbiAgICB2YXIgYWRkcmVzc0lucHV0ID0gXCI8aW5wdXQgY2xhc3M9J2Zvcm0tY29udHJvbCcgcGxhY2Vob2xkZXI9J0luZ3Jlc2Ugb3RybyB0ZWzDqWZvbm8nIG5hbWU9J2RlbGl2ZXJ5YWRkcmVzc1tdJyB0eXBlPSd0ZXh0JyBzdHlsZT0nbWFyZ2luLXRvcDo1cHgnPlwiO1xyXG4gICAgdmFyIGxvY0lucHV0ICAgICA9IFwiPGlucHV0IGNsYXNzPSdmb3JtLWNvbnRyb2wnIHBsYWNlaG9sZGVyPSdJbmdyZXNlIG90cm8gdGVsw6lmb25vJyBuYW1lPSdkZWxpdmVyeWFkZHJlc3NbXScgdHlwZT0ndGV4dCcgc3R5bGU9J21hcmdpbi10b3A6NXB4Jz5cIjtcclxuXHJcbiAgICAkKCcuQW5vdGhlckFkZHJlc3MnKS5hcHBlbmQoYWRkcmVzc0lucHV0KTtcclxuICAgICQoJy5Bbm90aGVyTG9jJykuYXBwZW5kKGxvY0lucHV0KTtcclxufSk7XHJcblxyXG5cclxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbi8vICAgICBDUkVBVEUgQVJUSUNMRSBWQVJJQU5UU1xyXG4vLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cclxuXHJcbndpbmRvdy5jaGVja1ZhcmlhbnRzID0gZnVuY3Rpb24oKVxyXG57XHJcbiAgICBsZXQgZXhpc3RpbmdDb21iaW5hdGlvbnMgPSBbXTtcclxuICAgICQoXCIuQ29tYmluYXRpb25cIikuZWFjaChmdW5jdGlvbigpe1xyXG4gICAgICAgIGV4aXN0aW5nQ29tYmluYXRpb25zLnB1c2goJCh0aGlzKS5kYXRhKCdjb21iaW5hdGlvbicpKTtcclxuICAgIH0pO1xyXG4gICAgcmV0dXJuIGV4aXN0aW5nQ29tYmluYXRpb25zO1xyXG59XHJcblxyXG5cclxud2luZG93Lm1ha2VWYXJpYW50cyA9IGZ1bmN0aW9uKClcclxue1xyXG4gICAgY29uc3QgdmFyaWFudHNDb250YWluZXIgPSAkKCcjQXJ0aWNsZVZhcmlhbnRzJyk7XHJcbiAgICBjb25zdCB2YXJpYW50U2l6ZSA9ICQoJy5WYXJpYW50U2l6ZScpO1xyXG4gICAgY29uc3QgdmFyaWFudENvbG9yID0gJCgnLlZhcmlhbnRDb2xvcicpO1xyXG4gICAgXHJcbiAgICBsZXQgY29sb3JzID0gW107XHJcbiAgICBsZXQgc2l6ZXMgPSBbXTtcclxuXHJcbiAgICBcclxuXHJcbiAgICAkLmVhY2godmFyaWFudFNpemUsIGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgaWYoJCh0aGlzKS5pcygnOmNoZWNrZWQnKSlcclxuICAgICAgICB7ICAgXHJcbiAgICAgICAgICAgIHNpemUgPSB7fTtcclxuICAgICAgICAgICAgc2l6ZVsnaWQnXSA9ICQodGhpcykudmFsKCk7XHJcbiAgICAgICAgICAgIHNpemVbJ25hbWUnXSA9ICQodGhpcykuZGF0YSgnbmFtZScpO1xyXG4gICAgICAgICAgICBzaXplcy5wdXNoKHNpemUpO1xyXG4gICAgICAgIH1cclxuICAgIH0pO1xyXG4gICAgXHJcbiAgICAkLmVhY2godmFyaWFudENvbG9yLCBmdW5jdGlvbigpe1xyXG4gICAgICAgIGlmKCQodGhpcykuaXMoJzpjaGVja2VkJykpXHJcbiAgICAgICAgeyAgIFxyXG4gICAgICAgICAgICBjb2xvciA9IHt9O1xyXG4gICAgICAgICAgICBjb2xvclsnaWQnXSA9ICQodGhpcykudmFsKCk7XHJcbiAgICAgICAgICAgIGNvbG9yWyduYW1lJ10gPSAkKHRoaXMpLmRhdGEoJ25hbWUnKTtcclxuICAgICAgICAgICAgY29sb3JzLnB1c2goY29sb3IpO1xyXG4gICAgICAgIH1cclxuICAgIH0pO1xyXG4gICAgICAgXHJcbiAgICBsZXQgY29tYmluYXRpb25zID0gW107XHJcblxyXG4gICAgJC5lYWNoKGNvbG9ycywgZnVuY3Rpb24oaW5kZXgsIGNvbG9yKXtcclxuICAgICAgICAkLmVhY2goc2l6ZXMsICBmdW5jdGlvbihpbmRleCwgc2l6ZSl7XHJcbiAgICAgICAgICAgIGxldCBpdGVtID0ge307IFxyXG4gICAgICAgICAgICBpdGVtWydjb21iaW5hdGlvbiddID0gY29sb3JbJ25hbWUnXStcIi9cIitzaXplWyduYW1lJ107XHJcbiAgICAgICAgICAgIGl0ZW1bJ2NvbG9yJ10gPSBjb2xvclsnbmFtZSddO1xyXG4gICAgICAgICAgICBpdGVtWydjb2xvcl9pZCddID0gY29sb3JbJ2lkJ107XHJcbiAgICAgICAgICAgIGl0ZW1bJ3NpemUnXSA9IHNpemVbJ25hbWUnXTtcclxuICAgICAgICAgICAgaXRlbVsnc2l6ZV9pZCddID0gc2l6ZVsnaWQnXTtcclxuICAgICAgICAgICAgY29tYmluYXRpb25zLnB1c2goaXRlbSk7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9KTtcclxuXHJcbiAgICBjb25zb2xlLmxvZyhjb21iaW5hdGlvbnMpO1xyXG4gICAgXHJcbiAgICBsZXQgZXhpc3RpbmdDb21iaW5hdGlvbnMgPSBjaGVja1ZhcmlhbnRzKCk7XHJcblxyXG4gICAgJC5lYWNoKGNvbWJpbmF0aW9ucywgZnVuY3Rpb24oaW5kZXgsIHZhbHVlKVxyXG4gICAgeyAgIFxyXG4gICAgICAgIC8vIEVDTUEgc2NyaXB0IDYgXHJcbiAgICAgICAgaWYoIWV4aXN0aW5nQ29tYmluYXRpb25zLmluY2x1ZGVzKHZhbHVlWydjb21iaW5hdGlvbiddKSlcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIGxldCB2YXJpYW50Um93ID0gXCI8dHI+XCIgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiPHRkIGNsYXNzPSdDb21iaW5hdGlvbicgZGF0YS1jb21iaW5hdGlvbj1cIisgdmFsdWVbJ2NvbG9yJ10gK1wiL1wiICsgdmFsdWVbJ3NpemUnXSArIFwiPlwiKyB2YWx1ZVsnY29sb3InXSArXCIvXCIgKyB2YWx1ZVsnc2l6ZSddICsgXCI8L3RkPlwiICtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBcIjxpbnB1dCBuYW1lPSd2YXJpYW50c1tcIit2YWx1ZVsnY29tYmluYXRpb24nXStcIl1bY29sb3JdJyB2YWx1ZT1cIisgdmFsdWVbJ2NvbG9yX2lkJ10gK1wiIHR5cGU9J2hpZGRlbicgY2xhc3M9J2Zvcm0tY29udHJvbCc+XCIgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiPGlucHV0IG5hbWU9J3ZhcmlhbnRzW1wiK3ZhbHVlWydjb21iaW5hdGlvbiddK1wiXVtzaXplXScgdmFsdWU9XCIrIHZhbHVlWydzaXplX2lkJ10gK1wiIHR5cGU9J2hpZGRlbicgY2xhc3M9J2Zvcm0tY29udHJvbCc+XCIgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiPHRkPjxpbnB1dCBuYW1lPSd2YXJpYW50c1tcIit2YWx1ZVsnY29tYmluYXRpb24nXStcIl1bc3RvY2tdJyB2YWx1ZT0nMTAnIHR5cGU9J251bWJlcicgbWluPScwJyBjbGFzcz0nZm9ybS1jb250cm9sJz48L3RkPlwiICtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBcIjx0ZD48YSBjbGFzcz0nUmVtb3ZlRHluUm93IGRlbGV0ZS1pY29uJz48aSBjbGFzcz0nZGVsZXRlLWljb24gZmEgZmEtdHJhc2gnPjwvaT48L2E+PC90ZD5cIiArXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgXCI8L3RyPlwiO1xyXG4gICAgICAgICAgICB2YXJpYW50c0NvbnRhaW5lci5hcHBlbmQodmFyaWFudFJvdyk7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbiAgICAkKCcjSGVhZGVyVmFyaWFudHMnKS5yZW1vdmVDbGFzcygnSGlkZGVuJyk7XHJcbn1cclxuXHJcblxyXG4vLyBSZW1vdmUgbmV3IHZhcmlhbnRzIHJvd1xyXG4kKCcjQXJ0aWNsZVZhcmlhbnRzJykub24oJ2NsaWNrJywgJy5SZW1vdmVEeW5Sb3cnLCBmdW5jdGlvbihlKSB7XHJcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAkKHRoaXMpLnBhcmVudHMoJ3RyJykucmVtb3ZlKCk7XHJcbn0pO1xyXG5cclxuJCgnLlJlbW92ZVZhcmlhbnQnKS5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcclxuICAgIGNvbnNvbGUubG9nKCQodGhpcykuZGF0YSgncm93aWQnKSk7XHJcbiAgICBkZWxldGVEQkl0ZW0oJCh0aGlzKS5kYXRhKCdyb3V0ZScpLCAkKHRoaXMpLmRhdGEoJ2lkJyksICQodGhpcykuZGF0YSgncm93aWQnKSk7XHJcbn0pO1xyXG5cclxuXHJcbndpbmRvdy5kZWxldGVEQkl0ZW0gPSBmdW5jdGlvbihyb3V0ZSwgaWQsIHJvd2lkKXtcclxuICAgICQuYWpheCh7XHJcbiAgICAgICAgdXJsOiByb3V0ZSxcclxuICAgICAgICBtZXRob2Q6ICdQT1NUJywgICAgICAgICAgICAgXHJcbiAgICAgICAgZGF0YVR5cGU6ICdKU09OJyxcclxuICAgICAgICBkYXRhOiB7IGlkOiBpZCB9LFxyXG4gICAgICAgIGJlZm9yZVNlbmQ6IGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgfSxcclxuICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbihkYXRhKXtcclxuICAgICAgICAgICAgY29uc29sZS5sb2coZGF0YSk7XHJcbiAgICAgICAgICAgIGlmIChkYXRhLnN1Y2Nlc3MgPT0gdHJ1ZSkge1xyXG4gICAgICAgICAgICAgICAgLy8gJChcIiNcIityb3dpZCkuaGlkZSgpO1xyXG4gICAgICAgICAgICAgICAgJChcIiNcIityb3dpZCkucmVtb3ZlKCk7XHJcbiAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICBhbGVydF9lcnJvcignVXBzIScsJ0hhIG9jdXJyaWRvIHVuIGVycm9yIGFsIGVsaW1pbmFyIGxhIHZhcmlhbnRlJyk7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEubWVzc2FnZSk7XHJcbiAgICAgICAgICAgICAgICByZXR1cm4gZmFsc2U7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9LFxyXG4gICAgICAgIGVycm9yOiBmdW5jdGlvbihkYXRhKVxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgJCgnI0Vycm9yJykuaHRtbChkYXRhLnJlc3BvbnNlVGV4dCk7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xyXG4gICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhLm1lc3NhZ2UpO1xyXG4gICAgICAgIH1cclxuICAgIH0pO1xyXG59XHJcblxyXG5cclxuXHJcbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG4vLyAgIEVESVRPUlMgQU5EIEZJRUxEUyBcclxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcblxyXG4vLyAkKCcjTXVsdGlfSW1hZ2VzJykuZmlsZXVwbG9hZGVyKHtcclxuLy8gICAgIGV4dGVuc2lvbnM6IFsnanBnJywgJ2pwZWcnLCAncG5nJywgJ2dpZiddLFxyXG4vLyAgICAgbGltaXQ6IG51bGwsXHJcbi8vICAgICBhZGRNb3JlOiB0cnVlLFxyXG4vLyAgICAgLy8gUGVzbyBtw6F4aW1vIGRlIHRvZGFzIGxhcyBpbcOhZ2VuZXNcclxuLy8gICAgIG1heFNpemU6IDUsXHJcbi8vICAgICAvLyBQZXNvIG3DoXhpbW8gcG9yIGltw6FnZW5cclxuLy8gICAgIGZpbGVNYXhTaXplOiAyLFxyXG4vLyAgICAgdGhlbWU6ICd0aHVtYm5haWxzJyxcclxuLy8gICAgIGVuYWJsZUFwaTogdHJ1ZSxcclxuLy8gICAgIGNhcHRpb25zOiB7XHJcbi8vICAgICAgICAgYnV0dG9uOiBmdW5jdGlvbihvcHRpb25zKSB7IHJldHVybiAnU2VsZWNjaW9uYXIgJyArIChvcHRpb25zLmxpbWl0ID09IDEgPyAnSW3DoWdlbmVzJyA6ICdJbcOhZ2VuJyk7IH0sXHJcbi8vICAgICAgICAgZmVlZGJhY2s6IGZ1bmN0aW9uKG9wdGlvbnMpIHsgcmV0dXJuICdIYWdhIGNsaWNrIHBhcmEgYWdyZWdhci4uLic7IH0sXHJcbi8vICAgICAgICAgZmVlZGJhY2syOiBmdW5jdGlvbihvcHRpb25zKSB7IHJldHVybiBvcHRpb25zLmxlbmd0aCArICcgJyArIChvcHRpb25zLmxlbmd0aCA+IDEgPyAnIGltw6FnZW5lcyBzZWxlY2Npb25hZGFzJyA6ICcgaW3DoWdlbiBzZWxlY2Npb25hZGEnKTsgfSxcclxuLy8gICAgICAgICBkcm9wOiAnQXJyYXN0cmUgbGFzIGltw6FnZW5lcyBhcXXDrScsXHJcbi8vICAgICAgICAgcGFzdGU6ICc8ZGl2IGNsYXNzPVwiZmlsZXVwbG9hZGVyLXBlbmRpbmctbG9hZGVyXCI+PGRpdiBjbGFzcz1cImxlZnQtaGFsZlwiIHN0eWxlPVwiYW5pbWF0aW9uLWR1cmF0aW9uOiAke21zfXNcIj48L2Rpdj48ZGl2IGNsYXNzPVwic3Bpbm5lclwiIHN0eWxlPVwiYW5pbWF0aW9uLWR1cmF0aW9uOiAke21zfXNcIj48L2Rpdj48ZGl2IGNsYXNzPVwicmlnaHQtaGFsZlwiIHN0eWxlPVwiYW5pbWF0aW9uLWR1cmF0aW9uOiAke21zfXNcIj48L2Rpdj48L2Rpdj4gUGFzdGluZyBhIGZpbGUsIGNsaWNrIGhlcmUgdG8gY2FuY2VsLicsXHJcbi8vICAgICAgICAgcmVtb3ZlQ29uZmlybWF0aW9uOiAnRWxpbWluYXI/JyxcclxuLy8gICAgICAgICBlcnJvcnM6IHtcclxuLy8gICAgICAgICAgICAgZmlsZXNMaW1pdDogJ1NvbG8gZXMgcG9zaWJsZSBzdWJpciAke2xpbWl0fSBpbcOhZ2VuLicsXHJcbi8vICAgICAgICAgICAgIGZpbGVzVHlwZTogJ1NvbG8gc2UgYWNlcHRhbiBsb3MgZm9ybWF0b3M6ICR7ZXh0ZW5zaW9uc30uJyxcclxuLy8gICAgICAgICAgICAgZmlsZVNpemU6ICcke25hbWV9IGVzIG11eSBncmFuZGVzISBTZWxlY2Npb25lIHVuYSBkZSAke2ZpbGVNYXhTaXplfU1CLiBjb21vIG3DoXhpbW8nLFxyXG4vLyAgICAgICAgICAgICBmaWxlc1NpemVBbGw6ICcke25hbWV9IHNvbiBtdXkgZ3JhbmRlcyEgU2VsZWNjaW9uZSB1bmFzIGRlICR7ZmlsZU1heFNpemV9TUIuIGNvbW8gbcOheGltbycsXHJcbi8vICAgICAgICAgICAgIGZpbGVOYW1lOiAnTGEgaW3DoWdlbiBjb24gZWwgbm9tYnJlICR7bmFtZX0geWEgZXN0w6Egc2VsZWNjaW9uYWRhLicsXHJcbi8vICAgICAgICAgICAgIGZvbGRlclVwbG9hZDogJ05vIGVzdMOhIHBlcm1pdGlkbyBzdWJpciBjYXJwZXRhcy4nXHJcbi8vICAgICAgICAgfSxcclxuLy8gICAgICAgICBkaWFsb2dzOiB7XHJcbi8vICAgICAgICAgICAgIC8vIGFsZXJ0IGRpYWxvZ1xyXG4vLyAgICAgICAgICAgICBhbGVydDogZnVuY3Rpb24odGV4dCkge1xyXG4vLyAgICAgICAgICAgICAgICAgcmV0dXJuIGFsZXJ0X2NvbmZpcm0odGV4dCk7XHJcbi8vICAgICAgICAgICAgIH0sXHJcbi8vICAgICAgICAgICAgIC8vIGNvbmZpcm0gZGlhbG9nXHJcbi8vICAgICAgICAgICAgIGNvbmZpcm06IGZ1bmN0aW9uKHRleHQsIGNhbGxiYWNrKSB7XHJcbi8vICAgICAgICAgICAgICAgICAnY29uZmlybSh0ZXh0KSA/IGNhbGxiYWNrKCkgOiBudWxsOydcclxuLy8gICAgICAgICAgICAgfVxyXG4vLyAgICAgICAgIH0sXHJcbi8vICAgICB9XHJcbi8vIH0pO1xyXG5cclxuJCgnI1NpbmdsZV9JbWFnZScpLmZpbGV1cGxvYWRlcih7XHJcbiAgICBleHRlbnNpb25zOiBbJ2pwZycsICdqcGVnJywgJ3BuZycsICdnaWYnXSxcclxuICAgIGxpbWl0OiAxLFxyXG4gICAgYWRkTW9yZTogZmFsc2UsXHJcbiAgICBmaWxlTWF4U2l6ZTogMixcclxuICAgIGNhcHRpb25zOiB7XHJcbiAgICAgICAgYnV0dG9uOiBmdW5jdGlvbihvcHRpb25zKSB7IHJldHVybiAnU2VsZWNjaW9uYXIgJyArIChvcHRpb25zLmxpbWl0ID09IDEgPyAnSW3DoWdlbicgOiAnSW3DoWdlbicpOyB9LFxyXG4gICAgICAgIGZlZWRiYWNrOiBmdW5jdGlvbihvcHRpb25zKSB7IHJldHVybiAnQWdyZWdhciBpbcOhZ2VuZXMuLi4nOyB9LFxyXG4gICAgICAgIGZlZWRiYWNrMjogZnVuY3Rpb24ob3B0aW9ucykgeyByZXR1cm4gb3B0aW9ucy5sZW5ndGggKyAnICcgKyAob3B0aW9ucy5sZW5ndGggPiAxID8gJyBpbcOhZ2VuZXMgc2VsZWNjaW9uYWRhcycgOiAnIGltw6FnZW4gc2VsZWNjaW9uYWRhJyk7IH0sXHJcbiAgICAgICAgZHJvcDogJ0FycmFzdHJlIGxhcyBpbcOhZ2VuZXMgYXF1w60nLFxyXG4gICAgICAgIHBhc3RlOiAnPGRpdiBjbGFzcz1cImZpbGV1cGxvYWRlci1wZW5kaW5nLWxvYWRlclwiPjxkaXYgY2xhc3M9XCJsZWZ0LWhhbGZcIiBzdHlsZT1cImFuaW1hdGlvbi1kdXJhdGlvbjogJHttc31zXCI+PC9kaXY+PGRpdiBjbGFzcz1cInNwaW5uZXJcIiBzdHlsZT1cImFuaW1hdGlvbi1kdXJhdGlvbjogJHttc31zXCI+PC9kaXY+PGRpdiBjbGFzcz1cInJpZ2h0LWhhbGZcIiBzdHlsZT1cImFuaW1hdGlvbi1kdXJhdGlvbjogJHttc31zXCI+PC9kaXY+PC9kaXY+IFBhc3RpbmcgYSBmaWxlLCBjbGljayBoZXJlIHRvIGNhbmNlbC4nLFxyXG4gICAgICAgIHJlbW92ZUNvbmZpcm1hdGlvbjogJ0VsaW1pbmFyPycsXHJcbiAgICAgICAgZXJyb3JzOiB7XHJcbiAgICAgICAgICAgIGZpbGVzTGltaXQ6ICdTb2xvIGVzIHBvc2libGUgc3ViaXIgJHtsaW1pdH0gaW3DoWdlbi4nLFxyXG4gICAgICAgICAgICBmaWxlc1R5cGU6ICdTb2xvIHNlIGFjZXB0YW4gbG9zIGZvcm1hdG9zOiAke2V4dGVuc2lvbnN9LicsXHJcbiAgICAgICAgICAgIGZpbGVTaXplOiAnTGEgaW3DoWdlbiBwZXNhIG11Y2hvISBFbGlqYSB1bmEgZGUgJHtmaWxlTWF4U2l6ZX1NQiBjb21vIG3DoXhpbW8uJyxcclxuICAgICAgICAgICAgZmlsZU5hbWU6ICdMYSBpbcOhZ2VuIGNvbiBlc2Ugbm9tYnJlIHlhIGhhIHNpZG8gZWxlZ2lkYScsXHJcbiAgICAgICAgICAgIGZvbGRlclVwbG9hZDogJ05vIGVzdMOhIHBlcm1pdGlkbyBzdWJpciBjYXJwZXRhcy4nLFxyXG4gICAgICAgIH0sXHJcbiAgICAgICAgZGlhbG9nczoge1xyXG4gICAgICAgICAgICAvLyBhbGVydCBkaWFsb2dcclxuICAgICAgICAgICAgYWxlcnQ6IGZ1bmN0aW9uKHRleHQpIHtcclxuICAgICAgICAgICAgICAgIHJldHVybiBhbGVydCh0ZXh0KTtcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgLy8gY29uZmlybSBkaWFsb2dcclxuICAgICAgICAgICAgY29uZmlybTogZnVuY3Rpb24odGV4dCwgY2FsbGJhY2spIHtcclxuICAgICAgICAgICAgICAgICdjb25maXJtKHRleHQpID8gY2FsbGJhY2soKSA6IG51bGw7J1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSxcclxuICAgIH1cclxufSk7XHJcblxyXG4vL2VuYWJsZSBmaWxldXBsb2FkZXIgcGx1Z2luXHJcbi8vICQoJyNJbWFnZXNVcGxvYWRlcicpLmZpbGV1cGxvYWRlcih7XHJcbi8vICAgICBleHRlbnNpb25zOiBbJ2pwZycsICdqcGVnJywgJ3BuZycsICdnaWYnXSxcclxuLy8gICAgIGFkZE1vcmU6IHRydWUsXHJcbi8vICAgICBlbmFibGVBcGk6IHRydWUsXHJcbi8vICAgICB0aHVtYm5haWxzOiB7XHJcbi8vICAgICAgICAgb25JbWFnZUxvYWRlZDogZnVuY3Rpb24oaXRlbSkge1xyXG4vLyAgICAgICAgICAgICBpdGVtLmh0bWwuZmluZCgnLmZpbGV1cGxvYWRlci1hY3Rpb24tcmVtb3ZlJykuYmVmb3JlKCc8YSBjbGFzcz1cImZpbGV1cGxvYWRlci1hY3Rpb24gZmlsZXVwbG9hZGVyLWFjdGlvbi1zb3J0IGZhcyBmYS1zb3J0IHRpdGxlPVwiU29ydFwiPjxpPjwvaT48L2E+Jyk7XHJcbi8vICAgICAgICAgICAgIGlmICghaXRlbS5odG1sLmZpbmQoJy5maWxldXBsb2FkZXItYWN0aW9uLWVkaXQnKS5sZW5ndGgpXHJcbi8vICAgICAgICAgICAgICAgICBpdGVtLmh0bWwuZmluZCgnLmZpbGV1cGxvYWRlci1hY3Rpb24tcmVtb3ZlJykuYmVmb3JlKCc8YSBjbGFzcz1cImZpbGV1cGxvYWRlci1hY3Rpb24gZmlsZXVwbG9hZGVyLWFjdGlvbi1wb3B1cCBmaWxldXBsb2FkZXItYWN0aW9uLWVkaXQgZmFzIGZhLWVkaXRcIiB0aXRsZT1cIkVkaXRcIj48aT48L2k+PC9hPicpO1xyXG4vLyAgICAgICAgIH1cclxuLy8gICAgIH0sXHJcbi8vICAgICBlZGl0b3I6IHtcclxuLy8gICAgICAgICBjcm9wcGVyOiB7XHJcbi8vICAgICAgICAgICAgIHJhdGlvOiAnMToxJyxcclxuLy8gICAgICAgICAgICAgbWluV2lkdGg6IDEwMCxcclxuLy8gICAgICAgICAgICAgbWluSGVpZ2h0OiAxMDAsXHJcbi8vICAgICAgICAgICAgIHNob3dHcmlkOiB0cnVlXHJcbi8vICAgICAgICAgfVxyXG4vLyAgICAgfSxcclxuLy8gICAgIHNvcnRlcjoge1xyXG4vLyAgICAgICAgIHNlbGVjdG9yRXhjbHVkZTogbnVsbCxcclxuLy8gICAgICAgICBwbGFjZWhvbGRlcjogbnVsbCxcclxuLy8gICAgICAgICBzY3JvbGxDb250YWluZXI6IHdpbmRvdyxcclxuLy8gICAgICAgICBvblNvcnQ6IGZ1bmN0aW9uKGxpc3QsIGxpc3RFbCwgcGFyZW50RWwsIG5ld0lucHV0RWwsIGlucHV0RWwpIHtcclxuLy8gICAgICAgICAgICAgLy8gb25Tb3J0IGNhbGxiYWNrXHJcbi8vICAgICAgICAgfVxyXG4vLyAgICAgfVxyXG4vLyB9KTtcclxuXHJcblxyXG4kKCcjTXVsdGlfSW1hZ2VzJykuZmlsZXVwbG9hZGVyKHtcclxuICAgIGV4dGVuc2lvbnM6IFsnanBnJywgJ2pwZWcnLCAncG5nJywgJ2dpZicsICdibXAnXSxcclxuICAgIGNoYW5nZUlucHV0OiAnICcsXHJcbiAgICB0aGVtZTogJ3RodW1ibmFpbHMnLFxyXG4gICAgZW5hYmxlQXBpOiB0cnVlLFxyXG4gICAgYWRkTW9yZTogdHJ1ZSxcclxuICAgIGRyYWdEcm9wOiB7XHJcbiAgICAgICAgLy8gc2V0IHRoZSBkcm9wIGNvbnRhaW5lciB7bnVsbCwgU3RyaW5nLCBqUXVlcnkgT2JqZWN0fVxyXG4gICAgICAgIC8vIGV4YW1wbGU6ICdib2R5J1xyXG4gICAgICAgIGNvbnRhaW5lcjogbnVsbCxcclxuICAgIFxyXG4gICAgICAgIC8vIENhbGxiYWNrIGZpcmVkIG9uIGVudGVyaW5nIHdpdGggZHJhZ2dpbmcgZmlsZXMgdGhlIGRyb3AgY29udGFpbmVyXHJcbiAgICAgICAgb25EcmFnRW50ZXI6IGZ1bmN0aW9uKGV2ZW50LCBsaXN0RWwsIHBhcmVudEVsLCBuZXdJbnB1dEVsLCBpbnB1dEVsKSB7XHJcbiAgICAgICAgICAgIC8vIGNhbGxiYWNrIHdpbGwgZ28gaGVyZVxyXG4gICAgICAgIH0sXHJcbiAgICBcclxuICAgICAgICAvLyBDYWxsYmFjayBmaXJlZCBvbiBsZWF2aW5nIHdpdGggZHJhZ2dpbmcgZmlsZXMgdGhlIGRyb3AgY29udGFpbmVyXHJcbiAgICAgICAgb25EcmFnTGVhdmU6IGZ1bmN0aW9uKGV2ZW50LCBsaXN0RWwsIHBhcmVudEVsLCBuZXdJbnB1dEVsLCBpbnB1dEVsKSB7XHJcbiAgICAgICAgICAgIC8vIGNhbGxiYWNrIHdpbGwgZ28gaGVyZVxyXG4gICAgICAgIH0sXHJcbiAgICBcclxuICAgICAgICAvLyBDYWxsYmFjayBmaXJlZCBvbiBkcm9wcGluZyB0aGUgZmlsZXMgaW4gdGhlIGRyb3AgY29udGFpbmVyXHJcbiAgICAgICAgb25Ecm9wOiBmdW5jdGlvbihldmVudCwgbGlzdEVsLCBwYXJlbnRFbCwgbmV3SW5wdXRFbCwgaW5wdXRFbCkge1xyXG4gICAgICAgICAgICAvLyBjYWxsYmFjayB3aWxsIGdvIGhlcmVcclxuICAgICAgICB9XHJcbiAgICB9LFxyXG4gICAgc29ydGVyOiB7XHJcbiAgICAgICAgc2VsZWN0b3JFeGNsdWRlOiBudWxsLFxyXG4gICAgICAgIHBsYWNlaG9sZGVyOiBudWxsLFxyXG4gICAgICAgIHNjcm9sbENvbnRhaW5lcjogd2luZG93LFxyXG4gICAgICAgIG9uU29ydDogZnVuY3Rpb24obGlzdCwgbGlzdEVsLCBwYXJlbnRFbCwgbmV3SW5wdXRFbCwgaW5wdXRFbCkge1xyXG4gICAgICAgICAgICAvLyBvblNvcnQgY2FsbGJhY2tcclxuICAgICAgICB9XHJcbiAgICB9LFxyXG4gICAgdGh1bWJuYWlsczoge1xyXG4gICAgICAgIG9uSXRlbVNob3c6IGZ1bmN0aW9uKGl0ZW0pIHtcclxuICAgICAgICAgICAgLy8gYWRkIHNvcnRlciBidXR0b24gdG8gdGhlIGl0ZW0gaHRtbDxpIGNsYXNzPVwiZmFzIGZhLXNvcnRcIj48L2k+XHJcbiAgICAgICAgICAgIGl0ZW0uaHRtbC5maW5kKCcuZmlsZXVwbG9hZGVyLWFjdGlvbi1yZW1vdmUnKS5iZWZvcmUoJzxhIGNsYXNzPVwiZmlsZXVwbG9hZGVyLWFjdGlvbiBmaWxldXBsb2FkZXItYWN0aW9uLXNvcnQgZmFzIGZhLXNvcnRcIiB0aXRsZT1cIlNvcnRcIj48aT48L2k+PC9hPicpO1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAgYm94OiAnPGRpdiBjbGFzcz1cImZpbGV1cGxvYWRlci1pdGVtc1wiPicgK1xyXG4gICAgICAgICAgICAgICAgICAnPHVsIGNsYXNzPVwiZmlsZXVwbG9hZGVyLWl0ZW1zLWxpc3RcIj4nICtcclxuICAgICAgICAgICAgICAgICAgICAgICc8bGkgY2xhc3M9XCJmaWxldXBsb2FkZXItdGh1bWJuYWlscy1pbnB1dFwiPjxkaXYgY2xhc3M9XCJmaWxldXBsb2FkZXItdGh1bWJuYWlscy1pbnB1dC1pbm5lclwiPis8L2Rpdj48L2xpPicgK1xyXG4gICAgICAgICAgICAgICAgICAnPC91bD4nICtcclxuICAgICAgICAgICAgICAnPC9kaXY+JyxcclxuICAgICAgICBpdGVtOiAnPGxpIGNsYXNzPVwiZmlsZXVwbG9hZGVyLWl0ZW1cIj4nICsgXHJcbiAgICAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cImZpbGV1cGxvYWRlci1pdGVtLWlubmVyXCI+JyArXHJcbiAgICAgICAgICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJ0aHVtYm5haWwtaG9sZGVyXCI+JHtpbWFnZX08L2Rpdj4nICtcclxuICAgICAgICAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cImFjdGlvbnMtaG9sZGVyXCI+JyArXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICc8YSBjbGFzcz1cImZpbGV1cGxvYWRlci1hY3Rpb24gZmlsZXVwbG9hZGVyLWFjdGlvbi1yZW1vdmVcIiB0aXRsZT1cIiR7Y2FwdGlvbnMucmVtb3ZlfVwiPjxpIGNsYXNzPVwicmVtb3ZlXCI+PC9pPjwvYT4nICtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgJzxzcGFuIGNsYXNzPVwiZmlsZXVwbG9hZGVyLWFjdGlvbi1wb3B1cFwiPjwvc3Bhbj4nICtcclxuICAgICAgICAgICAgICAgICAgICAgICAnPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJwcm9ncmVzcy1ob2xkZXJcIj4ke3Byb2dyZXNzQmFyfTwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgICAgJzwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAnPC9saT4nLFxyXG4gICAgICAgIGl0ZW0yOiAnPGxpIGNsYXNzPVwiZmlsZXVwbG9hZGVyLWl0ZW1cIj4nICtcclxuICAgICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwiZmlsZXVwbG9hZGVyLWl0ZW0taW5uZXJcIj4nICtcclxuICAgICAgICAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cInRodW1ibmFpbC1ob2xkZXJcIj4ke2ltYWdlfTwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwiYWN0aW9ucy1ob2xkZXJcIj4nICtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgJzxhIGNsYXNzPVwiZmlsZXVwbG9hZGVyLWFjdGlvbiBmaWxldXBsb2FkZXItYWN0aW9uLXJlbW92ZVwiIHRpdGxlPVwiJHtjYXB0aW9ucy5yZW1vdmV9XCI+PGkgY2xhc3M9XCJyZW1vdmVcIj48L2k+PC9hPicgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAnPHNwYW4gY2xhc3M9XCJmaWxldXBsb2FkZXItYWN0aW9uLXBvcHVwXCI+PC9zcGFuPicgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICc8L2Rpdj4nICtcclxuICAgICAgICAgICAgICAgICAgICc8L2Rpdj4nICtcclxuICAgICAgICAgICAgICAgJzwvbGk+JyxcclxuICAgICAgICBzdGFydEltYWdlUmVuZGVyZXI6IHRydWUsXHJcbiAgICAgICAgY2FudmFzSW1hZ2U6IGZhbHNlLFxyXG4gICAgICAgIF9zZWxlY3RvcnM6IHtcclxuICAgICAgICAgICAgbGlzdDogJy5maWxldXBsb2FkZXItaXRlbXMtbGlzdCcsXHJcbiAgICAgICAgICAgIGl0ZW06ICcuZmlsZXVwbG9hZGVyLWl0ZW0nLFxyXG4gICAgICAgICAgICBzdGFydDogJy5maWxldXBsb2FkZXItYWN0aW9uLXN0YXJ0JyxcclxuICAgICAgICAgICAgcmV0cnk6ICcuZmlsZXVwbG9hZGVyLWFjdGlvbi1yZXRyeScsXHJcbiAgICAgICAgICAgIHNvcnRlcjogJy5maWxldXBsb2FkZXItYWN0aW9uLXNvcnQnLFxyXG4gICAgICAgICAgICByZW1vdmU6ICcuZmlsZXVwbG9hZGVyLWFjdGlvbi1yZW1vdmUnXHJcbiAgICAgICAgfSxcclxuICAgICAgICBvbkl0ZW1TaG93OiBmdW5jdGlvbihpdGVtLCBsaXN0RWwsIHBhcmVudEVsLCBuZXdJbnB1dEVsLCBpbnB1dEVsKSB7XHJcbiAgICAgICAgICAgIHZhciBwbHVzSW5wdXQgPSBsaXN0RWwuZmluZCgnLmZpbGV1cGxvYWRlci10aHVtYm5haWxzLWlucHV0JyksXHJcbiAgICAgICAgICAgICAgICBhcGkgPSAkLmZpbGV1cGxvYWRlci5nZXRJbnN0YW5jZShpbnB1dEVsLmdldCgwKSk7XHJcbiAgICAgICAgICAgIFxyXG4gICAgICAgICAgICBwbHVzSW5wdXQuaW5zZXJ0QWZ0ZXIoaXRlbS5odG1sKVthcGkuZ2V0T3B0aW9ucygpLmxpbWl0ICYmIGFwaS5nZXRDaG9vc2VkRmlsZXMoKS5sZW5ndGggPj0gYXBpLmdldE9wdGlvbnMoKS5saW1pdCA/ICdoaWRlJyA6ICdzaG93J10oKTtcclxuICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIGlmKGl0ZW0uZm9ybWF0ID09ICdpbWFnZScpIHtcclxuICAgICAgICAgICAgICAgIGl0ZW0uaHRtbC5maW5kKCcuZmlsZXVwbG9hZGVyLWl0ZW0taWNvbicpLmhpZGUoKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgIH0sXHJcbiAgICBhZnRlclJlbmRlcjogZnVuY3Rpb24obGlzdEVsLCBwYXJlbnRFbCwgbmV3SW5wdXRFbCwgaW5wdXRFbCkge1xyXG4gICAgICAgIHZhciBwbHVzSW5wdXQgPSBsaXN0RWwuZmluZCgnLmZpbGV1cGxvYWRlci10aHVtYm5haWxzLWlucHV0JyksXHJcbiAgICAgICAgICAgIGFwaSA9ICQuZmlsZXVwbG9hZGVyLmdldEluc3RhbmNlKGlucHV0RWwuZ2V0KDApKTtcclxuICAgIFxyXG4gICAgICAgIHBsdXNJbnB1dC5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgYXBpLm9wZW4oKTtcclxuICAgICAgICB9KTtcclxuICAgIH0sXHJcbiAgICBvblJlbW92ZTogZnVuY3Rpb24oaXRlbSwgbGlzdEVsLCBwYXJlbnRFbCwgbmV3SW5wdXRFbCwgaW5wdXRFbCkge1xyXG4gICAgICAgIHZhciBwbHVzSW5wdXQgPSBsaXN0RWwuZmluZCgnLmZpbGV1cGxvYWRlci10aHVtYm5haWxzLWlucHV0JyksXHJcbiAgICAgICAgICAgIGFwaSA9ICQuZmlsZXVwbG9hZGVyLmdldEluc3RhbmNlKGlucHV0RWwuZ2V0KDApKTtcclxuICAgIFxyXG4gICAgICAgIGlmIChhcGkuZ2V0T3B0aW9ucygpLmxpbWl0ICYmIGFwaS5nZXRDaG9vc2VkRmlsZXMoKS5sZW5ndGggLSAxIDwgYXBpLmdldE9wdGlvbnMoKS5saW1pdClcclxuICAgICAgICAgICAgcGx1c0lucHV0LnNob3coKTtcclxuICAgIH0sXHJcbiAgICAvKlxyXG4gICAgLy8gd2hpbGUgdXNpbmcgdXBsb2FkIG9wdGlvbiwgcGxlYXNlIHNldFxyXG4gICAgLy8gc3RhcnRJbWFnZVJlbmRlcmVyOiBmYWxzZVxyXG4gICAgLy8gZm9yIGEgYmV0dGVyIGVmZmVjdFxyXG4gICAgdXBsb2FkOiB7XHJcbiAgICAgICAgdXJsOiAnLi9waHAvdXBsb2FkX2ZpbGUucGhwJyxcclxuICAgICAgICBkYXRhOiBudWxsLFxyXG4gICAgICAgIHR5cGU6ICdQT1NUJyxcclxuICAgICAgICBlbmN0eXBlOiAnbXVsdGlwYXJ0L2Zvcm0tZGF0YScsXHJcbiAgICAgICAgc3RhcnQ6IHRydWUsXHJcbiAgICAgICAgc3luY2hyb246IHRydWUsXHJcbiAgICAgICAgYmVmb3JlU2VuZDogbnVsbCxcclxuICAgICAgICBvblN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEsIGl0ZW0pIHtcclxuICAgICAgICAgICAgc2V0VGltZW91dChmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgICAgIGl0ZW0uaHRtbC5maW5kKCcucHJvZ3Jlc3MtaG9sZGVyJykuaGlkZSgpO1xyXG4gICAgICAgICAgICAgICAgaXRlbS5yZW5kZXJUaHVtYm5haWwoKTtcclxuICAgICAgICAgICAgfSwgNDAwKTtcclxuICAgICAgICB9LFxyXG4gICAgICAgIG9uRXJyb3I6IGZ1bmN0aW9uKGl0ZW0pIHtcclxuICAgICAgICAgICAgaXRlbS5odG1sLmZpbmQoJy5wcm9ncmVzcy1ob2xkZXInKS5oaWRlKCk7XHJcbiAgICAgICAgICAgIGl0ZW0uaHRtbC5maW5kKCcuZmlsZXVwbG9hZGVyLWl0ZW0taWNvbiBpJykudGV4dCgnRmFpbGVkIScpO1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAgb25Qcm9ncmVzczogZnVuY3Rpb24oZGF0YSwgaXRlbSkge1xyXG4gICAgICAgICAgICB2YXIgcHJvZ3Jlc3NCYXIgPSBpdGVtLmh0bWwuZmluZCgnLnByb2dyZXNzLWhvbGRlcicpO1xyXG4gICAgICAgICAgICBcclxuICAgICAgICAgICAgaWYocHJvZ3Jlc3NCYXIubGVuZ3RoID4gMCkge1xyXG4gICAgICAgICAgICAgICAgcHJvZ3Jlc3NCYXIuc2hvdygpO1xyXG4gICAgICAgICAgICAgICAgcHJvZ3Jlc3NCYXIuZmluZCgnLmZpbGV1cGxvYWRlci1wcm9ncmVzc2JhciAuYmFyJykud2lkdGgoZGF0YS5wZXJjZW50YWdlICsgXCIlXCIpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfSxcclxuICAgIGRyYWdEcm9wOiB7XHJcbiAgICAgICAgY29udGFpbmVyOiAnLmZpbGV1cGxvYWRlci10aHVtYm5haWxzLWlucHV0J1xyXG4gICAgfSxcclxuICAgIG9uUmVtb3ZlOiBmdW5jdGlvbihpdGVtKSB7XHJcbiAgICAgICAgJC5wb3N0KCdwaHAvdXBsb2FkX3JlbW92ZS5waHAnLCB7XHJcbiAgICAgICAgICAgIGZpbGU6IGl0ZW0ubmFtZVxyXG4gICAgICAgIH0pO1xyXG4gICAgfSxcclxuICAgICovXHJcbn0pO1xyXG5cclxuXHJcblxyXG4kKCcuRGlzcGxheS1JbnB1dC1Nb2RpZmljYWJsZScpLmNsaWNrKGZ1bmN0aW9uKCl7XHJcbiAgICAkKHRoaXMpLnJlbW92ZUNsYXNzKCdkaXNwbGF5LWlucHV0LWRpc2FibGVkJyk7IFxyXG59KTtcclxuXHJcblxyXG4vLyAtLS0tIE1vZGlmaWNhYmxlIGlucHV0IHRleHRcclxuLy8gSHRtbCBlbGVtZW50XHJcbi8vPHAgZGF0YS1lZGl0YWJsZSBjbGFzcz1cIlNsdWdJbnB1dFwiPnt7ICRhcnRpY2xlLT5zbHVnIH19PC9wPiAgIFxyXG5cclxuJCgnYm9keScpLm9uKCdjbGljaycsICdbZGF0YS1lZGl0YWJsZV0nLCBmdW5jdGlvbigpe1xyXG4gIFxyXG4gICAgdmFyICRlbCA9ICQodGhpcyk7XHJcbiAgICAgICAgICAgICAgICBcclxuICAgIHZhciAkaW5wdXQgPSAkKCc8aW5wdXQvPicpLnZhbCggJGVsLnRleHQoKSApO1xyXG4gICAgJGVsLnJlcGxhY2VXaXRoKCAkaW5wdXQgKTtcclxuICAgIFxyXG4gICAgdmFyIHNhdmUgPSBmdW5jdGlvbigpe1xyXG4gICAgICB2YXIgJHAgPSAkKCc8cCBkYXRhLWVkaXRhYmxlIC8+JykudGV4dCggJGlucHV0LnZhbCgpICk7XHJcbiAgICAgICRpbnB1dC5yZXBsYWNlV2l0aCggJHAgKTtcclxuICAgIH07XHJcbiAgICBcclxuICAgIC8qKlxyXG4gICAgICBXZSdyZSBkZWZpbmluZyB0aGUgY2FsbGJhY2sgd2l0aCBgb25lYCwgYmVjYXVzZSB3ZSBrbm93IHRoYXRcclxuICAgICAgdGhlIGVsZW1lbnQgd2lsbCBiZSBnb25lIGp1c3QgYWZ0ZXIgdGhhdCwgYW5kIHdlIGRvbid0IHdhbnQgXHJcbiAgICAgIGFueSBjYWxsYmFja3MgbGVmdG92ZXJzIHRha2UgbWVtb3J5LiBcclxuICAgICAgTmV4dCB0aW1lIGBwYCB0dXJucyBpbnRvIGBpbnB1dGAgdGhpcyBzaW5nbGUgY2FsbGJhY2sgXHJcbiAgICAgIHdpbGwgYmUgYXBwbGllZCBhZ2Fpbi5cclxuICAgICovXHJcbiAgICAkaW5wdXQub25lKCdibHVyJywgc2F2ZSkuZm9jdXMoKTtcclxuICAgIFxyXG4gIH0pO1xyXG4gIFxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3Jlc291cmNlcy9hc3NldHMvanMvdmFkbWluLWZvcm1zLmpzIl0sInNvdXJjZVJvb3QiOiIifQ==