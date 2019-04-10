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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgYTRjMTZmYWVkNTA0OGRiMmJlNDAiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9qcy92YWRtaW4tZm9ybXMuanMiXSwibmFtZXMiOlsiJCIsImNob3NlbiIsInBsYWNlaG9sZGVyX3RleHRfbXVsdGlwbGUiLCJzZWFyY2hfY29udGFpbnMiLCJub19yZXN1bHRzX3RleHQiLCJwbGFjZWhvbGRlcl90ZXh0X3NpbmdsZSIsImtleXVwIiwiVGV4dCIsInZhbCIsInRvTG93ZXJDYXNlIiwicmVnRXhwIiwicmVwbGFjZSIsImV2ZW50Iiwic3R0IiwiY2xpY2siLCJub3RlcyIsImhhc0NsYXNzIiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyIsImFkZHJlc3NJbnB1dCIsImxvY0lucHV0IiwiYXBwZW5kIiwid2luZG93IiwiY2hlY2tWYXJpYW50cyIsImV4aXN0aW5nQ29tYmluYXRpb25zIiwiZWFjaCIsInB1c2giLCJkYXRhIiwibWFrZVZhcmlhbnRzIiwidmFyaWFudHNDb250YWluZXIiLCJ2YXJpYW50U2l6ZSIsInZhcmlhbnRDb2xvciIsImNvbG9ycyIsInNpemVzIiwiaXMiLCJzaXplIiwiY29sb3IiLCJjb21iaW5hdGlvbnMiLCJpbmRleCIsIml0ZW0iLCJjb25zb2xlIiwibG9nIiwidmFsdWUiLCJpbmNsdWRlcyIsInZhcmlhbnRSb3ciLCJvbiIsImUiLCJwcmV2ZW50RGVmYXVsdCIsInBhcmVudHMiLCJyZW1vdmUiLCJkZWxldGVEQkl0ZW0iLCJyb3V0ZSIsImlkIiwicm93aWQiLCJhamF4IiwidXJsIiwibWV0aG9kIiwiZGF0YVR5cGUiLCJiZWZvcmVTZW5kIiwic3VjY2VzcyIsImFsZXJ0X2Vycm9yIiwibWVzc2FnZSIsImVycm9yIiwiaHRtbCIsInJlc3BvbnNlVGV4dCIsImZpbGV1cGxvYWRlciIsImV4dGVuc2lvbnMiLCJsaW1pdCIsImFkZE1vcmUiLCJmaWxlTWF4U2l6ZSIsImNhcHRpb25zIiwiYnV0dG9uIiwib3B0aW9ucyIsImZlZWRiYWNrIiwiZmVlZGJhY2syIiwibGVuZ3RoIiwiZHJvcCIsInBhc3RlIiwicmVtb3ZlQ29uZmlybWF0aW9uIiwiZXJyb3JzIiwiZmlsZXNMaW1pdCIsImZpbGVzVHlwZSIsImZpbGVTaXplIiwiZmlsZU5hbWUiLCJmb2xkZXJVcGxvYWQiLCJkaWFsb2dzIiwiYWxlcnQiLCJ0ZXh0IiwiY29uZmlybSIsImNhbGxiYWNrIiwiY2hhbmdlSW5wdXQiLCJ0aGVtZSIsImVuYWJsZUFwaSIsImRyYWdEcm9wIiwiY29udGFpbmVyIiwib25EcmFnRW50ZXIiLCJsaXN0RWwiLCJwYXJlbnRFbCIsIm5ld0lucHV0RWwiLCJpbnB1dEVsIiwib25EcmFnTGVhdmUiLCJvbkRyb3AiLCJzb3J0ZXIiLCJzZWxlY3RvckV4Y2x1ZGUiLCJwbGFjZWhvbGRlciIsInNjcm9sbENvbnRhaW5lciIsIm9uU29ydCIsImxpc3QiLCJ0aHVtYm5haWxzIiwib25JdGVtU2hvdyIsImZpbmQiLCJiZWZvcmUiLCJib3giLCJpdGVtMiIsInN0YXJ0SW1hZ2VSZW5kZXJlciIsImNhbnZhc0ltYWdlIiwiX3NlbGVjdG9ycyIsInN0YXJ0IiwicmV0cnkiLCJwbHVzSW5wdXQiLCJhcGkiLCJnZXRJbnN0YW5jZSIsImdldCIsImluc2VydEFmdGVyIiwiZ2V0T3B0aW9ucyIsImdldENob29zZWRGaWxlcyIsImZvcm1hdCIsImhpZGUiLCJhZnRlclJlbmRlciIsIm9wZW4iLCJvblJlbW92ZSIsInNob3ciLCIkZWwiLCIkaW5wdXQiLCJyZXBsYWNlV2l0aCIsInNhdmUiLCIkcCIsIm9uZSIsImZvY3VzIl0sIm1hcHBpbmdzIjoiO0FBQUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFD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bW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCIvXCI7XG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gNzgpO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHdlYnBhY2svYm9vdHN0cmFwIGE0YzE2ZmFlZDUwNDhkYjJiZTQwIiwiLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbi8vICAgICAgICAgICAgICAgICAgICBDb2xvcnNcclxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcblxyXG4kKCcuU2VsZWN0LUNvbG9ycycpLmNob3Nlbih7XHJcbiAgICBwbGFjZWhvbGRlcl90ZXh0X211bHRpcGxlOiAnU2VsZWNjaW9uZSBsb3MgY29sb3JlcycsXHJcbiAgICAvLyBtYXhfc2VsZWN0ZWRfb3B0aW9uczogMyxcclxuICAgIHNlYXJjaF9jb250YWluczogdHJ1ZSxcclxuICAgIG5vX3Jlc3VsdHNfdGV4dDogJ05vIHNlIGhhIGVuY29udHJhZG8gZWwgY29sb3InXHJcbn0pO1xyXG5cclxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbi8vICAgICAgICAgICAgICAgICAgICAgVGFnc1xyXG4vLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cclxuJCgnLlNlbGVjdC1UYWdzJykuY2hvc2VuKHtcclxuICAgIHBsYWNlaG9sZGVyX3RleHRfbXVsdGlwbGU6ICdTZWxlY2Npb25lIGxhcyBldGlxdWV0YXMnLFxyXG4gICAgLy8gbWF4X3NlbGVjdGVkX29wdGlvbnM6IDMsXHJcbiAgICBzZWFyY2hfY29udGFpbnM6IHRydWUsXHJcbiAgICBub19yZXN1bHRzX3RleHQ6ICdObyBzZSBoYSBlbmNvbnRyYWRvIGxhIGV0aXF1ZXRhJ1xyXG59KTtcclxuXHJcbiQoJy5TZWxlY3QtQnJhbmQnKS5jaG9zZW4oe1xyXG4gICAgcGxhY2Vob2xkZXJfdGV4dF9zaW5nbGU6ICdTZWxlY2Npb25lIGxhIG1hcmNhJyxcclxuICAgIC8vIG1heF9zZWxlY3RlZF9vcHRpb25zOiAzLFxyXG4gICAgc2VhcmNoX2NvbnRhaW5zOiB0cnVlLFxyXG4gICAgbm9fcmVzdWx0c190ZXh0OiAnTm8gc2UgaGEgZW5jb250cmFkbyBsYSBtYXJjYSdcclxufSk7XHJcblxyXG5cclxuXHJcbiQoJy5TZWxlY3QtQXRyaWJ1dGUnKS5jaG9zZW4oe1xyXG4gICAgcGxhY2Vob2xkZXJfdGV4dF9tdWx0aXBsZTogJ1NlbGVjY2lvbmFyJyxcclxuICAgIC8vIG1heF9zZWxlY3RlZF9vcHRpb25zOiAzLFxyXG4gICAgc2VhcmNoX2NvbnRhaW5zOiB0cnVlLFxyXG4gICAgbm9fcmVzdWx0c190ZXh0OiAnTm8gc2UgaGEgZW5jb250cmFkbydcclxufSk7XHJcblxyXG4kKCcuU2VsZWN0LUNhdGVnb3J5JykuY2hvc2VuKHtcclxuICAgIHBsYWNlaG9sZGVyX3RleHRfc2luZ2xlOiAnU2VsZWNjaW9uZSB1bmEgY2F0ZWdvcsOtYScsXHJcbn0pO1xyXG5cclxuJCgnLlNlbGVjdC1DaG9zZW4nKS5jaG9zZW4oe1xyXG4gICAgcGxhY2Vob2xkZXJfdGV4dF9zaW5nbGU6ICdTZWxlY2Npb25lIHVuYSBjYXRlZ29yw61hJyxcclxufSk7XHJcblxyXG5cclxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbi8vICAgICAgICAgICAgICBTbHVnIGNyZWF0b3JcclxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcblxyXG4kKFwiLlNsdWdJbnB1dFwiKS5rZXl1cChmdW5jdGlvbigpe1xyXG4gICAgdmFyIFRleHQgICAgID0gJCh0aGlzKS52YWwoKTtcclxuICAgIFRleHQgICAgICAgICA9IFRleHQudG9Mb3dlckNhc2UoKTtcclxuICAgIHZhciByZWdFeHAgICA9IC9cXHMrL2c7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoL1smXFwvXFxcXCMswqEhwrQjKygpJH4lLidcIjoqPzw+e31dL2csJycpO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKHJlZ0V4cCwnLScpO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDsScsICduJykgO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDoScsICdhJykgO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDqScsICdlJykgO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDrScsICdpJykgO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDsycsICdvJykgO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC5yZXBsYWNlKCfDuicsICd1JykgO1xyXG4gICAgXHJcbiAgICAkKFwiLlNsdWdJbnB1dFwiKS52YWwoVGV4dCk7ICAgXHJcbn0pO1xyXG5cclxuLy8gU2x1ZyBBdXRvRmlsbG5wdXQgZnJvbSB0aXRsZSBcclxuXHJcbiQoXCIjVGl0bGVJbnB1dFwiKS5rZXl1cChmdW5jdGlvbihldmVudCkge1xyXG4gICAgdmFyIHN0dCA9ICQodGhpcykudmFsKCk7XHJcbiAgICB2YXIgVGV4dCAgICAgPSAkKHRoaXMpLnZhbCgpO1xyXG4gICAgVGV4dCAgICAgICAgID0gVGV4dC50b0xvd2VyQ2FzZSgpO1xyXG4gICAgdmFyIHJlZ0V4cCAgID0gL1xccysvZztcclxuICAgIFRleHQgICAgICAgICA9IFRleHQucmVwbGFjZSgvWyZcXC9cXFxcIyzCoSHCtCMrKCkkfiUuJ1wiOio/PD57fV0vZywnJyk7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UocmVnRXhwLCctJyk7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8OxJywgJ24nKSA7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8OhJywgJ2EnKSA7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8OpJywgJ2UnKSA7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8OtJywgJ2knKSA7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8OzJywgJ28nKSA7XHJcbiAgICBUZXh0ICAgICAgICAgPSBUZXh0LnJlcGxhY2UoJ8O6JywgJ3UnKSA7XHJcbiAgICAkKFwiLlNsdWdJbnB1dFwiKS52YWwoVGV4dCk7ICAgXHJcbn0pO1xyXG5cclxuXHJcbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG4vLyAgICAgIENSRUFURSBGT1JNXHJcbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG5cclxuLy8gU2hvdyBOb3RlcyBUZXh0IEFyZWFcclxuJCgnLlNob3dOb3Rlc1RleHRBcmVhJykuY2xpY2soZnVuY3Rpb24oKXtcclxuICAgIHZhciBub3RlcyA9ICQoJy5Ob3Rlc1RleHRBcmVhJyk7XHJcbiAgICBpZiAobm90ZXMuaGFzQ2xhc3MoJ0hpZGRlbicpKXtcclxuICAgICAgICBub3Rlcy5yZW1vdmVDbGFzcygnSGlkZGVuJyk7XHJcbiAgICB9IGVsc2Uge1xyXG4gICAgICAgIG5vdGVzLmFkZENsYXNzKCdIaWRkZW4nKTtcclxuICAgIH1cclxufSk7XHJcblxyXG4vLyBBZGQgQW5vdGhlciBBZGRyZXNzXHJcbiQoJy5BZGRBbm90aGVyQWRkcmVzc0J0bicpLmNsaWNrKGZ1bmN0aW9uKCl7XHJcbiAgICB2YXIgYWRkcmVzc0lucHV0ID0gXCI8aW5wdXQgY2xhc3M9J2Zvcm0tY29udHJvbCcgcGxhY2Vob2xkZXI9J0luZ3Jlc2Ugb3RybyB0ZWzDqWZvbm8nIG5hbWU9J2RlbGl2ZXJ5YWRkcmVzc1tdJyB0eXBlPSd0ZXh0JyBzdHlsZT0nbWFyZ2luLXRvcDo1cHgnPlwiO1xyXG4gICAgdmFyIGxvY0lucHV0ICAgICA9IFwiPGlucHV0IGNsYXNzPSdmb3JtLWNvbnRyb2wnIHBsYWNlaG9sZGVyPSdJbmdyZXNlIG90cm8gdGVsw6lmb25vJyBuYW1lPSdkZWxpdmVyeWFkZHJlc3NbXScgdHlwZT0ndGV4dCcgc3R5bGU9J21hcmdpbi10b3A6NXB4Jz5cIjtcclxuXHJcbiAgICAkKCcuQW5vdGhlckFkZHJlc3MnKS5hcHBlbmQoYWRkcmVzc0lucHV0KTtcclxuICAgICQoJy5Bbm90aGVyTG9jJykuYXBwZW5kKGxvY0lucHV0KTtcclxufSk7XHJcblxyXG4vLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cclxuLy8gICAgIENSRUFURSBBUlRJQ0xFIFZBUklBTlRTXHJcbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxyXG5cclxud2luZG93LmNoZWNrVmFyaWFudHMgPSBmdW5jdGlvbigpXHJcbntcclxuICAgIGxldCBleGlzdGluZ0NvbWJpbmF0aW9ucyA9IFtdO1xyXG4gICAgJChcIi5Db21iaW5hdGlvblwiKS5lYWNoKGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgZXhpc3RpbmdDb21iaW5hdGlvbnMucHVzaCgkKHRoaXMpLmRhdGEoJ2NvbWJpbmF0aW9uJykpO1xyXG4gICAgfSk7XHJcbiAgICByZXR1cm4gZXhpc3RpbmdDb21iaW5hdGlvbnM7XHJcbn1cclxuXHJcblxyXG53aW5kb3cubWFrZVZhcmlhbnRzID0gZnVuY3Rpb24oKVxyXG57XHJcbiAgICBjb25zdCB2YXJpYW50c0NvbnRhaW5lciA9ICQoJyNBcnRpY2xlVmFyaWFudHMnKTtcclxuICAgIGNvbnN0IHZhcmlhbnRTaXplID0gJCgnLlZhcmlhbnRTaXplJyk7XHJcbiAgICBjb25zdCB2YXJpYW50Q29sb3IgPSAkKCcuVmFyaWFudENvbG9yJyk7XHJcbiAgICBcclxuICAgIGxldCBjb2xvcnMgPSBbXTtcclxuICAgIGxldCBzaXplcyA9IFtdO1xyXG5cclxuICAgIFxyXG5cclxuICAgICQuZWFjaCh2YXJpYW50U2l6ZSwgZnVuY3Rpb24oKXtcclxuICAgICAgICBpZigkKHRoaXMpLmlzKCc6Y2hlY2tlZCcpKVxyXG4gICAgICAgIHsgICBcclxuICAgICAgICAgICAgc2l6ZSA9IHt9O1xyXG4gICAgICAgICAgICBzaXplWydpZCddID0gJCh0aGlzKS52YWwoKTtcclxuICAgICAgICAgICAgc2l6ZVsnbmFtZSddID0gJCh0aGlzKS5kYXRhKCduYW1lJyk7XHJcbiAgICAgICAgICAgIHNpemVzLnB1c2goc2l6ZSk7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbiAgICBcclxuICAgICQuZWFjaCh2YXJpYW50Q29sb3IsIGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgaWYoJCh0aGlzKS5pcygnOmNoZWNrZWQnKSlcclxuICAgICAgICB7ICAgXHJcbiAgICAgICAgICAgIGNvbG9yID0ge307XHJcbiAgICAgICAgICAgIGNvbG9yWydpZCddID0gJCh0aGlzKS52YWwoKTtcclxuICAgICAgICAgICAgY29sb3JbJ25hbWUnXSA9ICQodGhpcykuZGF0YSgnbmFtZScpO1xyXG4gICAgICAgICAgICBjb2xvcnMucHVzaChjb2xvcik7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbiAgICAgICBcclxuICAgIGxldCBjb21iaW5hdGlvbnMgPSBbXTtcclxuXHJcbiAgICAkLmVhY2goY29sb3JzLCBmdW5jdGlvbihpbmRleCwgY29sb3Ipe1xyXG4gICAgICAgICQuZWFjaChzaXplcywgIGZ1bmN0aW9uKGluZGV4LCBzaXplKXtcclxuICAgICAgICAgICAgbGV0IGl0ZW0gPSB7fTsgXHJcbiAgICAgICAgICAgIGl0ZW1bJ2NvbWJpbmF0aW9uJ10gPSBjb2xvclsnbmFtZSddK1wiL1wiK3NpemVbJ25hbWUnXTtcclxuICAgICAgICAgICAgaXRlbVsnY29sb3InXSA9IGNvbG9yWyduYW1lJ107XHJcbiAgICAgICAgICAgIGl0ZW1bJ2NvbG9yX2lkJ10gPSBjb2xvclsnaWQnXTtcclxuICAgICAgICAgICAgaXRlbVsnc2l6ZSddID0gc2l6ZVsnbmFtZSddO1xyXG4gICAgICAgICAgICBpdGVtWydzaXplX2lkJ10gPSBzaXplWydpZCddO1xyXG4gICAgICAgICAgICBjb21iaW5hdGlvbnMucHVzaChpdGVtKTtcclxuICAgICAgICB9KTtcclxuICAgIH0pO1xyXG5cclxuICAgIGNvbnNvbGUubG9nKGNvbWJpbmF0aW9ucyk7XHJcbiAgICBcclxuICAgIGxldCBleGlzdGluZ0NvbWJpbmF0aW9ucyA9IGNoZWNrVmFyaWFudHMoKTtcclxuXHJcbiAgICAkLmVhY2goY29tYmluYXRpb25zLCBmdW5jdGlvbihpbmRleCwgdmFsdWUpXHJcbiAgICB7ICAgXHJcbiAgICAgICAgLy8gRUNNQSBzY3JpcHQgNiBcclxuICAgICAgICBpZighZXhpc3RpbmdDb21iaW5hdGlvbnMuaW5jbHVkZXModmFsdWVbJ2NvbWJpbmF0aW9uJ10pKVxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgbGV0IHZhcmlhbnRSb3cgPSBcIjx0cj5cIiArXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgXCI8dGQgY2xhc3M9J0NvbWJpbmF0aW9uJyBkYXRhLWNvbWJpbmF0aW9uPVwiKyB2YWx1ZVsnY29sb3InXSArXCIvXCIgKyB2YWx1ZVsnc2l6ZSddICsgXCI+XCIrIHZhbHVlWydjb2xvciddICtcIi9cIiArIHZhbHVlWydzaXplJ10gKyBcIjwvdGQ+XCIgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiPGlucHV0IG5hbWU9J3ZhcmlhbnRzW1wiK3ZhbHVlWydjb21iaW5hdGlvbiddK1wiXVtjb2xvcl0nIHZhbHVlPVwiKyB2YWx1ZVsnY29sb3JfaWQnXSArXCIgdHlwZT0naGlkZGVuJyBjbGFzcz0nZm9ybS1jb250cm9sJz5cIiArXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgXCI8aW5wdXQgbmFtZT0ndmFyaWFudHNbXCIrdmFsdWVbJ2NvbWJpbmF0aW9uJ10rXCJdW3NpemVdJyB2YWx1ZT1cIisgdmFsdWVbJ3NpemVfaWQnXSArXCIgdHlwZT0naGlkZGVuJyBjbGFzcz0nZm9ybS1jb250cm9sJz5cIiArXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgXCI8dGQ+PGlucHV0IG5hbWU9J3ZhcmlhbnRzW1wiK3ZhbHVlWydjb21iaW5hdGlvbiddK1wiXVtzdG9ja10nIHZhbHVlPScxMCcgdHlwZT0nbnVtYmVyJyBtaW49JzAnIGNsYXNzPSdmb3JtLWNvbnRyb2wnPjwvdGQ+XCIgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiPHRkPjxhIGNsYXNzPSdSZW1vdmVEeW5Sb3cgZGVsZXRlLWljb24nPjxpIGNsYXNzPSdkZWxldGUtaWNvbiBmYSBmYS10cmFzaCc+PC9pPjwvYT48L3RkPlwiICtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICBcIjwvdHI+XCI7XHJcbiAgICAgICAgICAgIHZhcmlhbnRzQ29udGFpbmVyLmFwcGVuZCh2YXJpYW50Um93KTtcclxuICAgICAgICB9XHJcbiAgICB9KTtcclxuICAgICQoJyNIZWFkZXJWYXJpYW50cycpLnJlbW92ZUNsYXNzKCdIaWRkZW4nKTtcclxufVxyXG5cclxuXHJcbi8vIFJlbW92ZSBuZXcgdmFyaWFudHMgcm93XHJcbiQoJyNBcnRpY2xlVmFyaWFudHMnKS5vbignY2xpY2snLCAnLlJlbW92ZUR5blJvdycsIGZ1bmN0aW9uKGUpIHtcclxuICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICQodGhpcykucGFyZW50cygndHInKS5yZW1vdmUoKTtcclxufSk7XHJcblxyXG4kKCcuUmVtb3ZlVmFyaWFudCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xyXG4gICAgY29uc29sZS5sb2coJCh0aGlzKS5kYXRhKCdyb3dpZCcpKTtcclxuICAgIGRlbGV0ZURCSXRlbSgkKHRoaXMpLmRhdGEoJ3JvdXRlJyksICQodGhpcykuZGF0YSgnaWQnKSwgJCh0aGlzKS5kYXRhKCdyb3dpZCcpKTtcclxufSk7XHJcblxyXG5cclxud2luZG93LmRlbGV0ZURCSXRlbSA9IGZ1bmN0aW9uKHJvdXRlLCBpZCwgcm93aWQpe1xyXG4gICAgJC5hamF4KHtcclxuICAgICAgICB1cmw6IHJvdXRlLFxyXG4gICAgICAgIG1ldGhvZDogJ1BPU1QnLCAgICAgICAgICAgICBcclxuICAgICAgICBkYXRhVHlwZTogJ0pTT04nLFxyXG4gICAgICAgIGRhdGE6IHsgaWQ6IGlkIH0sXHJcbiAgICAgICAgYmVmb3JlU2VuZDogZnVuY3Rpb24oKXtcclxuICAgICAgICB9LFxyXG4gICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpe1xyXG4gICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcclxuICAgICAgICAgICAgaWYgKGRhdGEuc3VjY2VzcyA9PSB0cnVlKSB7XHJcbiAgICAgICAgICAgICAgICAvLyAkKFwiI1wiK3Jvd2lkKS5oaWRlKCk7XHJcbiAgICAgICAgICAgICAgICAkKFwiI1wiK3Jvd2lkKS5yZW1vdmUoKTtcclxuICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgIGFsZXJ0X2Vycm9yKCdVcHMhJywnSGEgb2N1cnJpZG8gdW4gZXJyb3IgYWwgZWxpbWluYXIgbGEgdmFyaWFudGUnKTtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xyXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coZGF0YS5tZXNzYWdlKTtcclxuICAgICAgICAgICAgICAgIHJldHVybiBmYWxzZTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0sXHJcbiAgICAgICAgZXJyb3I6IGZ1bmN0aW9uKGRhdGEpXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICAkKCcjRXJyb3InKS5odG1sKGRhdGEucmVzcG9uc2VUZXh0KTtcclxuICAgICAgICAgICAgY29uc29sZS5sb2coZGF0YSk7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEubWVzc2FnZSk7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbn1cclxuXHJcblxyXG5cclxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbi8vICAgRURJVE9SUyBBTkQgRklFTERTIFxyXG4vLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cclxuXHJcbi8vICQoJyNNdWx0aV9JbWFnZXMnKS5maWxldXBsb2FkZXIoe1xyXG4vLyAgICAgZXh0ZW5zaW9uczogWydqcGcnLCAnanBlZycsICdwbmcnLCAnZ2lmJ10sXHJcbi8vICAgICBsaW1pdDogbnVsbCxcclxuLy8gICAgIGFkZE1vcmU6IHRydWUsXHJcbi8vICAgICAvLyBQZXNvIG3DoXhpbW8gZGUgdG9kYXMgbGFzIGltw6FnZW5lc1xyXG4vLyAgICAgbWF4U2l6ZTogNSxcclxuLy8gICAgIC8vIFBlc28gbcOheGltbyBwb3IgaW3DoWdlblxyXG4vLyAgICAgZmlsZU1heFNpemU6IDIsXHJcbi8vICAgICB0aGVtZTogJ3RodW1ibmFpbHMnLFxyXG4vLyAgICAgZW5hYmxlQXBpOiB0cnVlLFxyXG4vLyAgICAgY2FwdGlvbnM6IHtcclxuLy8gICAgICAgICBidXR0b246IGZ1bmN0aW9uKG9wdGlvbnMpIHsgcmV0dXJuICdTZWxlY2Npb25hciAnICsgKG9wdGlvbnMubGltaXQgPT0gMSA/ICdJbcOhZ2VuZXMnIDogJ0ltw6FnZW4nKTsgfSxcclxuLy8gICAgICAgICBmZWVkYmFjazogZnVuY3Rpb24ob3B0aW9ucykgeyByZXR1cm4gJ0hhZ2EgY2xpY2sgcGFyYSBhZ3JlZ2FyLi4uJzsgfSxcclxuLy8gICAgICAgICBmZWVkYmFjazI6IGZ1bmN0aW9uKG9wdGlvbnMpIHsgcmV0dXJuIG9wdGlvbnMubGVuZ3RoICsgJyAnICsgKG9wdGlvbnMubGVuZ3RoID4gMSA/ICcgaW3DoWdlbmVzIHNlbGVjY2lvbmFkYXMnIDogJyBpbcOhZ2VuIHNlbGVjY2lvbmFkYScpOyB9LFxyXG4vLyAgICAgICAgIGRyb3A6ICdBcnJhc3RyZSBsYXMgaW3DoWdlbmVzIGFxdcOtJyxcclxuLy8gICAgICAgICBwYXN0ZTogJzxkaXYgY2xhc3M9XCJmaWxldXBsb2FkZXItcGVuZGluZy1sb2FkZXJcIj48ZGl2IGNsYXNzPVwibGVmdC1oYWxmXCIgc3R5bGU9XCJhbmltYXRpb24tZHVyYXRpb246ICR7bXN9c1wiPjwvZGl2PjxkaXYgY2xhc3M9XCJzcGlubmVyXCIgc3R5bGU9XCJhbmltYXRpb24tZHVyYXRpb246ICR7bXN9c1wiPjwvZGl2PjxkaXYgY2xhc3M9XCJyaWdodC1oYWxmXCIgc3R5bGU9XCJhbmltYXRpb24tZHVyYXRpb246ICR7bXN9c1wiPjwvZGl2PjwvZGl2PiBQYXN0aW5nIGEgZmlsZSwgY2xpY2sgaGVyZSB0byBjYW5jZWwuJyxcclxuLy8gICAgICAgICByZW1vdmVDb25maXJtYXRpb246ICdFbGltaW5hcj8nLFxyXG4vLyAgICAgICAgIGVycm9yczoge1xyXG4vLyAgICAgICAgICAgICBmaWxlc0xpbWl0OiAnU29sbyBlcyBwb3NpYmxlIHN1YmlyICR7bGltaXR9IGltw6FnZW4uJyxcclxuLy8gICAgICAgICAgICAgZmlsZXNUeXBlOiAnU29sbyBzZSBhY2VwdGFuIGxvcyBmb3JtYXRvczogJHtleHRlbnNpb25zfS4nLFxyXG4vLyAgICAgICAgICAgICBmaWxlU2l6ZTogJyR7bmFtZX0gZXMgbXV5IGdyYW5kZXMhIFNlbGVjY2lvbmUgdW5hIGRlICR7ZmlsZU1heFNpemV9TUIuIGNvbW8gbcOheGltbycsXHJcbi8vICAgICAgICAgICAgIGZpbGVzU2l6ZUFsbDogJyR7bmFtZX0gc29uIG11eSBncmFuZGVzISBTZWxlY2Npb25lIHVuYXMgZGUgJHtmaWxlTWF4U2l6ZX1NQi4gY29tbyBtw6F4aW1vJyxcclxuLy8gICAgICAgICAgICAgZmlsZU5hbWU6ICdMYSBpbcOhZ2VuIGNvbiBlbCBub21icmUgJHtuYW1lfSB5YSBlc3TDoSBzZWxlY2Npb25hZGEuJyxcclxuLy8gICAgICAgICAgICAgZm9sZGVyVXBsb2FkOiAnTm8gZXN0w6EgcGVybWl0aWRvIHN1YmlyIGNhcnBldGFzLidcclxuLy8gICAgICAgICB9LFxyXG4vLyAgICAgICAgIGRpYWxvZ3M6IHtcclxuLy8gICAgICAgICAgICAgLy8gYWxlcnQgZGlhbG9nXHJcbi8vICAgICAgICAgICAgIGFsZXJ0OiBmdW5jdGlvbih0ZXh0KSB7XHJcbi8vICAgICAgICAgICAgICAgICByZXR1cm4gYWxlcnRfY29uZmlybSh0ZXh0KTtcclxuLy8gICAgICAgICAgICAgfSxcclxuLy8gICAgICAgICAgICAgLy8gY29uZmlybSBkaWFsb2dcclxuLy8gICAgICAgICAgICAgY29uZmlybTogZnVuY3Rpb24odGV4dCwgY2FsbGJhY2spIHtcclxuLy8gICAgICAgICAgICAgICAgICdjb25maXJtKHRleHQpID8gY2FsbGJhY2soKSA6IG51bGw7J1xyXG4vLyAgICAgICAgICAgICB9XHJcbi8vICAgICAgICAgfSxcclxuLy8gICAgIH1cclxuLy8gfSk7XHJcblxyXG4kKCcjU2luZ2xlX0ltYWdlJykuZmlsZXVwbG9hZGVyKHtcclxuICAgIGV4dGVuc2lvbnM6IFsnanBnJywgJ2pwZWcnLCAncG5nJywgJ2dpZiddLFxyXG4gICAgbGltaXQ6IDEsXHJcbiAgICBhZGRNb3JlOiBmYWxzZSxcclxuICAgIGZpbGVNYXhTaXplOiAyLFxyXG4gICAgY2FwdGlvbnM6IHtcclxuICAgICAgICBidXR0b246IGZ1bmN0aW9uKG9wdGlvbnMpIHsgcmV0dXJuICdTZWxlY2Npb25hciAnICsgKG9wdGlvbnMubGltaXQgPT0gMSA/ICdJbcOhZ2VuJyA6ICdJbcOhZ2VuJyk7IH0sXHJcbiAgICAgICAgZmVlZGJhY2s6IGZ1bmN0aW9uKG9wdGlvbnMpIHsgcmV0dXJuICdBZ3JlZ2FyIGltw6FnZW5lcy4uLic7IH0sXHJcbiAgICAgICAgZmVlZGJhY2syOiBmdW5jdGlvbihvcHRpb25zKSB7IHJldHVybiBvcHRpb25zLmxlbmd0aCArICcgJyArIChvcHRpb25zLmxlbmd0aCA+IDEgPyAnIGltw6FnZW5lcyBzZWxlY2Npb25hZGFzJyA6ICcgaW3DoWdlbiBzZWxlY2Npb25hZGEnKTsgfSxcclxuICAgICAgICBkcm9wOiAnQXJyYXN0cmUgbGFzIGltw6FnZW5lcyBhcXXDrScsXHJcbiAgICAgICAgcGFzdGU6ICc8ZGl2IGNsYXNzPVwiZmlsZXVwbG9hZGVyLXBlbmRpbmctbG9hZGVyXCI+PGRpdiBjbGFzcz1cImxlZnQtaGFsZlwiIHN0eWxlPVwiYW5pbWF0aW9uLWR1cmF0aW9uOiAke21zfXNcIj48L2Rpdj48ZGl2IGNsYXNzPVwic3Bpbm5lclwiIHN0eWxlPVwiYW5pbWF0aW9uLWR1cmF0aW9uOiAke21zfXNcIj48L2Rpdj48ZGl2IGNsYXNzPVwicmlnaHQtaGFsZlwiIHN0eWxlPVwiYW5pbWF0aW9uLWR1cmF0aW9uOiAke21zfXNcIj48L2Rpdj48L2Rpdj4gUGFzdGluZyBhIGZpbGUsIGNsaWNrIGhlcmUgdG8gY2FuY2VsLicsXHJcbiAgICAgICAgcmVtb3ZlQ29uZmlybWF0aW9uOiAnRWxpbWluYXI/JyxcclxuICAgICAgICBlcnJvcnM6IHtcclxuICAgICAgICAgICAgZmlsZXNMaW1pdDogJ1NvbG8gZXMgcG9zaWJsZSBzdWJpciAke2xpbWl0fSBpbcOhZ2VuLicsXHJcbiAgICAgICAgICAgIGZpbGVzVHlwZTogJ1NvbG8gc2UgYWNlcHRhbiBsb3MgZm9ybWF0b3M6ICR7ZXh0ZW5zaW9uc30uJyxcclxuICAgICAgICAgICAgZmlsZVNpemU6ICdMYSBpbcOhZ2VuIHBlc2EgbXVjaG8hIEVsaWphIHVuYSBkZSAke2ZpbGVNYXhTaXplfU1CIGNvbW8gbcOheGltby4nLFxyXG4gICAgICAgICAgICBmaWxlTmFtZTogJ0xhIGltw6FnZW4gY29uIGVzZSBub21icmUgeWEgaGEgc2lkbyBlbGVnaWRhJyxcclxuICAgICAgICAgICAgZm9sZGVyVXBsb2FkOiAnTm8gZXN0w6EgcGVybWl0aWRvIHN1YmlyIGNhcnBldGFzLicsXHJcbiAgICAgICAgfSxcclxuICAgICAgICBkaWFsb2dzOiB7XHJcbiAgICAgICAgICAgIC8vIGFsZXJ0IGRpYWxvZ1xyXG4gICAgICAgICAgICBhbGVydDogZnVuY3Rpb24odGV4dCkge1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuIGFsZXJ0KHRleHQpO1xyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAvLyBjb25maXJtIGRpYWxvZ1xyXG4gICAgICAgICAgICBjb25maXJtOiBmdW5jdGlvbih0ZXh0LCBjYWxsYmFjaykge1xyXG4gICAgICAgICAgICAgICAgJ2NvbmZpcm0odGV4dCkgPyBjYWxsYmFjaygpIDogbnVsbDsnXHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9LFxyXG4gICAgfVxyXG59KTtcclxuXHJcbi8vZW5hYmxlIGZpbGV1cGxvYWRlciBwbHVnaW5cclxuLy8gJCgnI0ltYWdlc1VwbG9hZGVyJykuZmlsZXVwbG9hZGVyKHtcclxuLy8gICAgIGV4dGVuc2lvbnM6IFsnanBnJywgJ2pwZWcnLCAncG5nJywgJ2dpZiddLFxyXG4vLyAgICAgYWRkTW9yZTogdHJ1ZSxcclxuLy8gICAgIGVuYWJsZUFwaTogdHJ1ZSxcclxuLy8gICAgIHRodW1ibmFpbHM6IHtcclxuLy8gICAgICAgICBvbkltYWdlTG9hZGVkOiBmdW5jdGlvbihpdGVtKSB7XHJcbi8vICAgICAgICAgICAgIGl0ZW0uaHRtbC5maW5kKCcuZmlsZXVwbG9hZGVyLWFjdGlvbi1yZW1vdmUnKS5iZWZvcmUoJzxhIGNsYXNzPVwiZmlsZXVwbG9hZGVyLWFjdGlvbiBmaWxldXBsb2FkZXItYWN0aW9uLXNvcnQgZmFzIGZhLXNvcnQgdGl0bGU9XCJTb3J0XCI+PGk+PC9pPjwvYT4nKTtcclxuLy8gICAgICAgICAgICAgaWYgKCFpdGVtLmh0bWwuZmluZCgnLmZpbGV1cGxvYWRlci1hY3Rpb24tZWRpdCcpLmxlbmd0aClcclxuLy8gICAgICAgICAgICAgICAgIGl0ZW0uaHRtbC5maW5kKCcuZmlsZXVwbG9hZGVyLWFjdGlvbi1yZW1vdmUnKS5iZWZvcmUoJzxhIGNsYXNzPVwiZmlsZXVwbG9hZGVyLWFjdGlvbiBmaWxldXBsb2FkZXItYWN0aW9uLXBvcHVwIGZpbGV1cGxvYWRlci1hY3Rpb24tZWRpdCBmYXMgZmEtZWRpdFwiIHRpdGxlPVwiRWRpdFwiPjxpPjwvaT48L2E+Jyk7XHJcbi8vICAgICAgICAgfVxyXG4vLyAgICAgfSxcclxuLy8gICAgIGVkaXRvcjoge1xyXG4vLyAgICAgICAgIGNyb3BwZXI6IHtcclxuLy8gICAgICAgICAgICAgcmF0aW86ICcxOjEnLFxyXG4vLyAgICAgICAgICAgICBtaW5XaWR0aDogMTAwLFxyXG4vLyAgICAgICAgICAgICBtaW5IZWlnaHQ6IDEwMCxcclxuLy8gICAgICAgICAgICAgc2hvd0dyaWQ6IHRydWVcclxuLy8gICAgICAgICB9XHJcbi8vICAgICB9LFxyXG4vLyAgICAgc29ydGVyOiB7XHJcbi8vICAgICAgICAgc2VsZWN0b3JFeGNsdWRlOiBudWxsLFxyXG4vLyAgICAgICAgIHBsYWNlaG9sZGVyOiBudWxsLFxyXG4vLyAgICAgICAgIHNjcm9sbENvbnRhaW5lcjogd2luZG93LFxyXG4vLyAgICAgICAgIG9uU29ydDogZnVuY3Rpb24obGlzdCwgbGlzdEVsLCBwYXJlbnRFbCwgbmV3SW5wdXRFbCwgaW5wdXRFbCkge1xyXG4vLyAgICAgICAgICAgICAvLyBvblNvcnQgY2FsbGJhY2tcclxuLy8gICAgICAgICB9XHJcbi8vICAgICB9XHJcbi8vIH0pO1xyXG5cclxuXHJcbiQoJyNNdWx0aV9JbWFnZXMnKS5maWxldXBsb2FkZXIoe1xyXG4gICAgZXh0ZW5zaW9uczogWydqcGcnLCAnanBlZycsICdwbmcnLCAnZ2lmJywgJ2JtcCddLFxyXG4gICAgY2hhbmdlSW5wdXQ6ICcgJyxcclxuICAgIHRoZW1lOiAndGh1bWJuYWlscycsXHJcbiAgICBlbmFibGVBcGk6IHRydWUsXHJcbiAgICBhZGRNb3JlOiB0cnVlLFxyXG4gICAgZHJhZ0Ryb3A6IHtcclxuICAgICAgICAvLyBzZXQgdGhlIGRyb3AgY29udGFpbmVyIHtudWxsLCBTdHJpbmcsIGpRdWVyeSBPYmplY3R9XHJcbiAgICAgICAgLy8gZXhhbXBsZTogJ2JvZHknXHJcbiAgICAgICAgY29udGFpbmVyOiBudWxsLFxyXG4gICAgXHJcbiAgICAgICAgLy8gQ2FsbGJhY2sgZmlyZWQgb24gZW50ZXJpbmcgd2l0aCBkcmFnZ2luZyBmaWxlcyB0aGUgZHJvcCBjb250YWluZXJcclxuICAgICAgICBvbkRyYWdFbnRlcjogZnVuY3Rpb24oZXZlbnQsIGxpc3RFbCwgcGFyZW50RWwsIG5ld0lucHV0RWwsIGlucHV0RWwpIHtcclxuICAgICAgICAgICAgLy8gY2FsbGJhY2sgd2lsbCBnbyBoZXJlXHJcbiAgICAgICAgfSxcclxuICAgIFxyXG4gICAgICAgIC8vIENhbGxiYWNrIGZpcmVkIG9uIGxlYXZpbmcgd2l0aCBkcmFnZ2luZyBmaWxlcyB0aGUgZHJvcCBjb250YWluZXJcclxuICAgICAgICBvbkRyYWdMZWF2ZTogZnVuY3Rpb24oZXZlbnQsIGxpc3RFbCwgcGFyZW50RWwsIG5ld0lucHV0RWwsIGlucHV0RWwpIHtcclxuICAgICAgICAgICAgLy8gY2FsbGJhY2sgd2lsbCBnbyBoZXJlXHJcbiAgICAgICAgfSxcclxuICAgIFxyXG4gICAgICAgIC8vIENhbGxiYWNrIGZpcmVkIG9uIGRyb3BwaW5nIHRoZSBmaWxlcyBpbiB0aGUgZHJvcCBjb250YWluZXJcclxuICAgICAgICBvbkRyb3A6IGZ1bmN0aW9uKGV2ZW50LCBsaXN0RWwsIHBhcmVudEVsLCBuZXdJbnB1dEVsLCBpbnB1dEVsKSB7XHJcbiAgICAgICAgICAgIC8vIGNhbGxiYWNrIHdpbGwgZ28gaGVyZVxyXG4gICAgICAgIH1cclxuICAgIH0sXHJcbiAgICBzb3J0ZXI6IHtcclxuICAgICAgICBzZWxlY3RvckV4Y2x1ZGU6IG51bGwsXHJcbiAgICAgICAgcGxhY2Vob2xkZXI6IG51bGwsXHJcbiAgICAgICAgc2Nyb2xsQ29udGFpbmVyOiB3aW5kb3csXHJcbiAgICAgICAgb25Tb3J0OiBmdW5jdGlvbihsaXN0LCBsaXN0RWwsIHBhcmVudEVsLCBuZXdJbnB1dEVsLCBpbnB1dEVsKSB7XHJcbiAgICAgICAgICAgIC8vIG9uU29ydCBjYWxsYmFja1xyXG4gICAgICAgIH1cclxuICAgIH0sXHJcbiAgICB0aHVtYm5haWxzOiB7XHJcbiAgICAgICAgb25JdGVtU2hvdzogZnVuY3Rpb24oaXRlbSkge1xyXG4gICAgICAgICAgICAvLyBhZGQgc29ydGVyIGJ1dHRvbiB0byB0aGUgaXRlbSBodG1sPGkgY2xhc3M9XCJmYXMgZmEtc29ydFwiPjwvaT5cclxuICAgICAgICAgICAgaXRlbS5odG1sLmZpbmQoJy5maWxldXBsb2FkZXItYWN0aW9uLXJlbW92ZScpLmJlZm9yZSgnPGEgY2xhc3M9XCJmaWxldXBsb2FkZXItYWN0aW9uIGZpbGV1cGxvYWRlci1hY3Rpb24tc29ydCBmYXMgZmEtc29ydFwiIHRpdGxlPVwiU29ydFwiPjxpPjwvaT48L2E+Jyk7XHJcbiAgICAgICAgfSxcclxuICAgICAgICBib3g6ICc8ZGl2IGNsYXNzPVwiZmlsZXVwbG9hZGVyLWl0ZW1zXCI+JyArXHJcbiAgICAgICAgICAgICAgICAgICc8dWwgY2xhc3M9XCJmaWxldXBsb2FkZXItaXRlbXMtbGlzdFwiPicgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgJzxsaSBjbGFzcz1cImZpbGV1cGxvYWRlci10aHVtYm5haWxzLWlucHV0XCI+PGRpdiBjbGFzcz1cImZpbGV1cGxvYWRlci10aHVtYm5haWxzLWlucHV0LWlubmVyXCI+KzwvZGl2PjwvbGk+JyArXHJcbiAgICAgICAgICAgICAgICAgICc8L3VsPicgK1xyXG4gICAgICAgICAgICAgICc8L2Rpdj4nLFxyXG4gICAgICAgIGl0ZW06ICc8bGkgY2xhc3M9XCJmaWxldXBsb2FkZXItaXRlbVwiPicgKyBcclxuICAgICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwiZmlsZXVwbG9hZGVyLWl0ZW0taW5uZXJcIj4nICtcclxuICAgICAgICAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cInRodW1ibmFpbC1ob2xkZXJcIj4ke2ltYWdlfTwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwiYWN0aW9ucy1ob2xkZXJcIj4nICtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJzxhIGNsYXNzPVwiZmlsZXVwbG9hZGVyLWFjdGlvbiBmaWxldXBsb2FkZXItYWN0aW9uLXJlbW92ZVwiIHRpdGxlPVwiJHtjYXB0aW9ucy5yZW1vdmV9XCI+PGkgY2xhc3M9XCJyZW1vdmVcIj48L2k+PC9hPicgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAnPHNwYW4gY2xhc3M9XCJmaWxldXBsb2FkZXItYWN0aW9uLXBvcHVwXCI+PC9zcGFuPicgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICc8L2Rpdj4nICtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cInByb2dyZXNzLWhvbGRlclwiPiR7cHJvZ3Jlc3NCYXJ9PC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAgICAnPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICc8L2xpPicsXHJcbiAgICAgICAgaXRlbTI6ICc8bGkgY2xhc3M9XCJmaWxldXBsb2FkZXItaXRlbVwiPicgK1xyXG4gICAgICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJmaWxldXBsb2FkZXItaXRlbS1pbm5lclwiPicgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwidGh1bWJuYWlsLWhvbGRlclwiPiR7aW1hZ2V9PC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJhY3Rpb25zLWhvbGRlclwiPicgK1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAnPGEgY2xhc3M9XCJmaWxldXBsb2FkZXItYWN0aW9uIGZpbGV1cGxvYWRlci1hY3Rpb24tcmVtb3ZlXCIgdGl0bGU9XCIke2NhcHRpb25zLnJlbW92ZX1cIj48aSBjbGFzcz1cInJlbW92ZVwiPjwvaT48L2E+JyArXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICc8c3BhbiBjbGFzcz1cImZpbGV1cGxvYWRlci1hY3Rpb24tcG9wdXBcIj48L3NwYW4+JyArXHJcbiAgICAgICAgICAgICAgICAgICAgICAgJzwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgICAgJzwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAnPC9saT4nLFxyXG4gICAgICAgIHN0YXJ0SW1hZ2VSZW5kZXJlcjogdHJ1ZSxcclxuICAgICAgICBjYW52YXNJbWFnZTogZmFsc2UsXHJcbiAgICAgICAgX3NlbGVjdG9yczoge1xyXG4gICAgICAgICAgICBsaXN0OiAnLmZpbGV1cGxvYWRlci1pdGVtcy1saXN0JyxcclxuICAgICAgICAgICAgaXRlbTogJy5maWxldXBsb2FkZXItaXRlbScsXHJcbiAgICAgICAgICAgIHN0YXJ0OiAnLmZpbGV1cGxvYWRlci1hY3Rpb24tc3RhcnQnLFxyXG4gICAgICAgICAgICByZXRyeTogJy5maWxldXBsb2FkZXItYWN0aW9uLXJldHJ5JyxcclxuICAgICAgICAgICAgc29ydGVyOiAnLmZpbGV1cGxvYWRlci1hY3Rpb24tc29ydCcsXHJcbiAgICAgICAgICAgIHJlbW92ZTogJy5maWxldXBsb2FkZXItYWN0aW9uLXJlbW92ZSdcclxuICAgICAgICB9LFxyXG4gICAgICAgIG9uSXRlbVNob3c6IGZ1bmN0aW9uKGl0ZW0sIGxpc3RFbCwgcGFyZW50RWwsIG5ld0lucHV0RWwsIGlucHV0RWwpIHtcclxuICAgICAgICAgICAgdmFyIHBsdXNJbnB1dCA9IGxpc3RFbC5maW5kKCcuZmlsZXVwbG9hZGVyLXRodW1ibmFpbHMtaW5wdXQnKSxcclxuICAgICAgICAgICAgICAgIGFwaSA9ICQuZmlsZXVwbG9hZGVyLmdldEluc3RhbmNlKGlucHV0RWwuZ2V0KDApKTtcclxuICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIHBsdXNJbnB1dC5pbnNlcnRBZnRlcihpdGVtLmh0bWwpW2FwaS5nZXRPcHRpb25zKCkubGltaXQgJiYgYXBpLmdldENob29zZWRGaWxlcygpLmxlbmd0aCA+PSBhcGkuZ2V0T3B0aW9ucygpLmxpbWl0ID8gJ2hpZGUnIDogJ3Nob3cnXSgpO1xyXG4gICAgICAgICAgICBcclxuICAgICAgICAgICAgaWYoaXRlbS5mb3JtYXQgPT0gJ2ltYWdlJykge1xyXG4gICAgICAgICAgICAgICAgaXRlbS5odG1sLmZpbmQoJy5maWxldXBsb2FkZXItaXRlbS1pY29uJykuaGlkZSgpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfSxcclxuICAgIGFmdGVyUmVuZGVyOiBmdW5jdGlvbihsaXN0RWwsIHBhcmVudEVsLCBuZXdJbnB1dEVsLCBpbnB1dEVsKSB7XHJcbiAgICAgICAgdmFyIHBsdXNJbnB1dCA9IGxpc3RFbC5maW5kKCcuZmlsZXVwbG9hZGVyLXRodW1ibmFpbHMtaW5wdXQnKSxcclxuICAgICAgICAgICAgYXBpID0gJC5maWxldXBsb2FkZXIuZ2V0SW5zdGFuY2UoaW5wdXRFbC5nZXQoMCkpO1xyXG4gICAgXHJcbiAgICAgICAgcGx1c0lucHV0Lm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICBhcGkub3BlbigpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfSxcclxuICAgIG9uUmVtb3ZlOiBmdW5jdGlvbihpdGVtLCBsaXN0RWwsIHBhcmVudEVsLCBuZXdJbnB1dEVsLCBpbnB1dEVsKSB7XHJcbiAgICAgICAgdmFyIHBsdXNJbnB1dCA9IGxpc3RFbC5maW5kKCcuZmlsZXVwbG9hZGVyLXRodW1ibmFpbHMtaW5wdXQnKSxcclxuICAgICAgICAgICAgYXBpID0gJC5maWxldXBsb2FkZXIuZ2V0SW5zdGFuY2UoaW5wdXRFbC5nZXQoMCkpO1xyXG4gICAgXHJcbiAgICAgICAgaWYgKGFwaS5nZXRPcHRpb25zKCkubGltaXQgJiYgYXBpLmdldENob29zZWRGaWxlcygpLmxlbmd0aCAtIDEgPCBhcGkuZ2V0T3B0aW9ucygpLmxpbWl0KVxyXG4gICAgICAgICAgICBwbHVzSW5wdXQuc2hvdygpO1xyXG4gICAgfSxcclxuICAgIC8qXHJcbiAgICAvLyB3aGlsZSB1c2luZyB1cGxvYWQgb3B0aW9uLCBwbGVhc2Ugc2V0XHJcbiAgICAvLyBzdGFydEltYWdlUmVuZGVyZXI6IGZhbHNlXHJcbiAgICAvLyBmb3IgYSBiZXR0ZXIgZWZmZWN0XHJcbiAgICB1cGxvYWQ6IHtcclxuICAgICAgICB1cmw6ICcuL3BocC91cGxvYWRfZmlsZS5waHAnLFxyXG4gICAgICAgIGRhdGE6IG51bGwsXHJcbiAgICAgICAgdHlwZTogJ1BPU1QnLFxyXG4gICAgICAgIGVuY3R5cGU6ICdtdWx0aXBhcnQvZm9ybS1kYXRhJyxcclxuICAgICAgICBzdGFydDogdHJ1ZSxcclxuICAgICAgICBzeW5jaHJvbjogdHJ1ZSxcclxuICAgICAgICBiZWZvcmVTZW5kOiBudWxsLFxyXG4gICAgICAgIG9uU3VjY2VzczogZnVuY3Rpb24oZGF0YSwgaXRlbSkge1xyXG4gICAgICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgaXRlbS5odG1sLmZpbmQoJy5wcm9ncmVzcy1ob2xkZXInKS5oaWRlKCk7XHJcbiAgICAgICAgICAgICAgICBpdGVtLnJlbmRlclRodW1ibmFpbCgpO1xyXG4gICAgICAgICAgICB9LCA0MDApO1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAgb25FcnJvcjogZnVuY3Rpb24oaXRlbSkge1xyXG4gICAgICAgICAgICBpdGVtLmh0bWwuZmluZCgnLnByb2dyZXNzLWhvbGRlcicpLmhpZGUoKTtcclxuICAgICAgICAgICAgaXRlbS5odG1sLmZpbmQoJy5maWxldXBsb2FkZXItaXRlbS1pY29uIGknKS50ZXh0KCdGYWlsZWQhJyk7XHJcbiAgICAgICAgfSxcclxuICAgICAgICBvblByb2dyZXNzOiBmdW5jdGlvbihkYXRhLCBpdGVtKSB7XHJcbiAgICAgICAgICAgIHZhciBwcm9ncmVzc0JhciA9IGl0ZW0uaHRtbC5maW5kKCcucHJvZ3Jlc3MtaG9sZGVyJyk7XHJcbiAgICAgICAgICAgIFxyXG4gICAgICAgICAgICBpZihwcm9ncmVzc0Jhci5sZW5ndGggPiAwKSB7XHJcbiAgICAgICAgICAgICAgICBwcm9ncmVzc0Jhci5zaG93KCk7XHJcbiAgICAgICAgICAgICAgICBwcm9ncmVzc0Jhci5maW5kKCcuZmlsZXVwbG9hZGVyLXByb2dyZXNzYmFyIC5iYXInKS53aWR0aChkYXRhLnBlcmNlbnRhZ2UgKyBcIiVcIik7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICB9LFxyXG4gICAgZHJhZ0Ryb3A6IHtcclxuICAgICAgICBjb250YWluZXI6ICcuZmlsZXVwbG9hZGVyLXRodW1ibmFpbHMtaW5wdXQnXHJcbiAgICB9LFxyXG4gICAgb25SZW1vdmU6IGZ1bmN0aW9uKGl0ZW0pIHtcclxuICAgICAgICAkLnBvc3QoJ3BocC91cGxvYWRfcmVtb3ZlLnBocCcsIHtcclxuICAgICAgICAgICAgZmlsZTogaXRlbS5uYW1lXHJcbiAgICAgICAgfSk7XHJcbiAgICB9LFxyXG4gICAgKi9cclxufSk7XHJcblxyXG5cclxuXHJcbiQoJy5EaXNwbGF5LUlucHV0LU1vZGlmaWNhYmxlJykuY2xpY2soZnVuY3Rpb24oKXtcclxuICAgICQodGhpcykucmVtb3ZlQ2xhc3MoJ2Rpc3BsYXktaW5wdXQtZGlzYWJsZWQnKTsgXHJcbn0pO1xyXG5cclxuXHJcbi8vIC0tLS0gTW9kaWZpY2FibGUgaW5wdXQgdGV4dFxyXG4vLyBIdG1sIGVsZW1lbnRcclxuLy88cCBkYXRhLWVkaXRhYmxlIGNsYXNzPVwiU2x1Z0lucHV0XCI+e3sgJGFydGljbGUtPnNsdWcgfX08L3A+ICAgXHJcblxyXG4kKCdib2R5Jykub24oJ2NsaWNrJywgJ1tkYXRhLWVkaXRhYmxlXScsIGZ1bmN0aW9uKCl7XHJcbiAgXHJcbiAgICB2YXIgJGVsID0gJCh0aGlzKTtcclxuICAgICAgICAgICAgICAgIFxyXG4gICAgdmFyICRpbnB1dCA9ICQoJzxpbnB1dC8+JykudmFsKCAkZWwudGV4dCgpICk7XHJcbiAgICAkZWwucmVwbGFjZVdpdGgoICRpbnB1dCApO1xyXG4gICAgXHJcbiAgICB2YXIgc2F2ZSA9IGZ1bmN0aW9uKCl7XHJcbiAgICAgIHZhciAkcCA9ICQoJzxwIGRhdGEtZWRpdGFibGUgLz4nKS50ZXh0KCAkaW5wdXQudmFsKCkgKTtcclxuICAgICAgJGlucHV0LnJlcGxhY2VXaXRoKCAkcCApO1xyXG4gICAgfTtcclxuICAgIFxyXG4gICAgLyoqXHJcbiAgICAgIFdlJ3JlIGRlZmluaW5nIHRoZSBjYWxsYmFjayB3aXRoIGBvbmVgLCBiZWNhdXNlIHdlIGtub3cgdGhhdFxyXG4gICAgICB0aGUgZWxlbWVudCB3aWxsIGJlIGdvbmUganVzdCBhZnRlciB0aGF0LCBhbmQgd2UgZG9uJ3Qgd2FudCBcclxuICAgICAgYW55IGNhbGxiYWNrcyBsZWZ0b3ZlcnMgdGFrZSBtZW1vcnkuIFxyXG4gICAgICBOZXh0IHRpbWUgYHBgIHR1cm5zIGludG8gYGlucHV0YCB0aGlzIHNpbmdsZSBjYWxsYmFjayBcclxuICAgICAgd2lsbCBiZSBhcHBsaWVkIGFnYWluLlxyXG4gICAgKi9cclxuICAgICRpbnB1dC5vbmUoJ2JsdXInLCBzYXZlKS5mb2N1cygpO1xyXG4gICAgXHJcbiAgfSk7XHJcbiAgXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIC4vcmVzb3VyY2VzL2Fzc2V0cy9qcy92YWRtaW4tZm9ybXMuanMiXSwic291cmNlUm9vdCI6IiJ9