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
    placeholder_text_single: 'Seleccione una categoría',
});

$('.Select-Chosen').chosen({
    placeholder_text_single: 'Seleccione una categoría',
});


//----------------------------------------------
//              Slug creator
//----------------------------------------------

$(".SlugInput").keyup(function(){
    var Text     = $(this).val();
    Text         = Text.toLowerCase();
    var regExp   = /\s+/g;
    Text         = Text.replace(/[&\/\\#,¡!´#+()$~%.'":*?<>{}]/g,'');
    Text         = Text.replace(regExp,'-');
    Text         = Text.replace('ñ', 'n') ;
    Text         = Text.replace('á', 'a') ;
    Text         = Text.replace('é', 'e') ;
    Text         = Text.replace('í', 'i') ;
    Text         = Text.replace('ó', 'o') ;
    Text         = Text.replace('ú', 'u') ;
    
    $(".SlugInput").val(Text);   
});

// Slug AutoFillnput from title 

$("#TitleInput").keyup(function(event) {
    var stt = $(this).val();
    var Text     = $(this).val();
    Text         = Text.toLowerCase();
    var regExp   = /\s+/g;
    Text         = Text.replace(/[&\/\\#,¡!´#+()$~%.'":*?<>{}]/g,'');
    Text         = Text.replace(regExp,'-');
    Text         = Text.replace('ñ', 'n') ;
    Text         = Text.replace('á', 'a') ;
    Text         = Text.replace('é', 'e') ;
    Text         = Text.replace('í', 'i') ;
    Text         = Text.replace('ó', 'o') ;
    Text         = Text.replace('ú', 'u') ;
    $(".SlugInput").val(Text);   
});


//----------------------------------------------
//      CREATE FORM
//----------------------------------------------

// Show Notes Text Area
$('.ShowNotesTextArea').click(function(){
    var notes = $('.NotesTextArea');
    if (notes.hasClass('Hidden')){
        notes.removeClass('Hidden');
    } else {
        notes.addClass('Hidden');
    }
});

// Add Another Address
$('.AddAnotherAddressBtn').click(function(){
    var addressInput = "<input class='form-control' placeholder='Ingrese otro teléfono' name='deliveryaddress[]' type='text' style='margin-top:5px'>";
    var locInput     = "<input class='form-control' placeholder='Ingrese otro teléfono' name='deliveryaddress[]' type='text' style='margin-top:5px'>";

    $('.AnotherAddress').append(addressInput);
    $('.AnotherLoc').append(locInput);
});


//----------------------------------------------
//     CREATE ARTICLE VARIANTS
//----------------------------------------------

window.checkVariants = function()
{
    let existingCombinations = [];
    $(".Combination").each(function(){
        existingCombinations.push($(this).data('combination'));
    });
    return existingCombinations;
}


window.makeVariants = function()
{
    const variantsContainer = $('#ArticleVariants');
    const variantSize = $('.VariantSize');
    const variantColor = $('.VariantColor');
    
    let colors = [];
    let sizes = [];

    

    $.each(variantSize, function(){
        if($(this).is(':checked'))
        {   
            size = {};
            size['id'] = $(this).val();
            size['name'] = $(this).data('name');
            sizes.push(size);
        }
    });
    
    $.each(variantColor, function(){
        if($(this).is(':checked'))
        {   
            color = {};
            color['id'] = $(this).val();
            color['name'] = $(this).data('name');
            colors.push(color);
        }
    });
       
    let combinations = [];

    $.each(colors, function(index, color){
        $.each(sizes,  function(index, size){
            let item = {}; 
            item['combination'] = color['name']+"/"+size['name'];
            item['color'] = color['name'];
            item['color_id'] = color['id'];
            item['size'] = size['name'];
            item['size_id'] = size['id'];
            combinations.push(item);
        });
    });

    console.log(combinations);
    
    let existingCombinations = checkVariants();

    $.each(combinations, function(index, value)
    {   
        // ECMA script 6 
        if(!existingCombinations.includes(value['combination']))
        {
            let variantRow = "<tr>" +
                                "<td class='Combination' data-combination="+ value['color'] +"/" + value['size'] + ">"+ value['color'] +"/" + value['size'] + "</td>" +
                                "<input name='variants["+value['combination']+"][color]' value="+ value['color_id'] +" type='hidden' class='form-control'>" +
                                "<input name='variants["+value['combination']+"][size]' value="+ value['size_id'] +" type='hidden' class='form-control'>" +
                                "<td><input name='variants["+value['combination']+"][stock]' value='10' type='number' min='0' class='form-control'></td>" +
                                "<td><a class='RemoveDynRow delete-icon'><i class='delete-icon fa fa-trash'></i></a></td>" +
                             "</tr>";
            variantsContainer.append(variantRow);
        }
    });
    $('#HeaderVariants').removeClass('Hidden');
}


// Remove new variants row
$('#ArticleVariants').on('click', '.RemoveDynRow', function(e) {
    e.preventDefault();
    $(this).parents('tr').remove();
});

$('.RemoveVariant').on('click', function() {
    console.log($(this).data('rowid'));
    deleteDBItem($(this).data('route'), $(this).data('id'), $(this).data('rowid'));
});


window.deleteDBItem = function(route, id, rowid){
    $.ajax({
        url: route,
        method: 'POST',             
        dataType: 'JSON',
        data: { id: id },
        beforeSend: function(){
        },
        success: function(data){
            console.log(data);
            if (data.success == true) {
                // $("#"+rowid).hide();
                $("#"+rowid).remove();
            } else {
                alert_error('Ups!','Ha ocurrido un error al eliminar la variante');
                console.log(data);
                console.log(data.message);
                return false;
            }
        },
        error: function(data)
        {
            $('#Error').html(data.responseText);
            console.log(data);
            console.log(data.message);
        }
    });
}



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
        button: function(options) { return 'Seleccionar ' + (options.limit == 1 ? 'Imágen' : 'Imágen'); },
        feedback: function(options) { return 'Agregar imágenes...'; },
        feedback2: function(options) { return options.length + ' ' + (options.length > 1 ? ' imágenes seleccionadas' : ' imágen seleccionada'); },
        drop: 'Arrastre las imágenes aquí',
        paste: '<div class="fileuploader-pending-loader"><div class="left-half" style="animation-duration: ${ms}s"></div><div class="spinner" style="animation-duration: ${ms}s"></div><div class="right-half" style="animation-duration: ${ms}s"></div></div> Pasting a file, click here to cancel.',
        removeConfirmation: 'Eliminar?',
        errors: {
            filesLimit: 'Solo es posible subir ${limit} imágen.',
            filesType: 'Solo se aceptan los formatos: ${extensions}.',
            fileSize: 'La imágen pesa mucho! Elija una de ${fileMaxSize}MB como máximo.',
            fileName: 'La imágen con ese nombre ya ha sido elegida',
            folderUpload: 'No está permitido subir carpetas.',
        },
        dialogs: {
            // alert dialog
            alert: function(text) {
                return alert(text);
            },
            // confirm dialog
            confirm: function(text, callback) {
                'confirm(text) ? callback() : null;'
            }
        },
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
        onDragEnter: function(event, listEl, parentEl, newInputEl, inputEl) {
            // callback will go here
        },
    
        // Callback fired on leaving with dragging files the drop container
        onDragLeave: function(event, listEl, parentEl, newInputEl, inputEl) {
            // callback will go here
        },
    
        // Callback fired on dropping the files in the drop container
        onDrop: function(event, listEl, parentEl, newInputEl, inputEl) {
            // callback will go here
        }
    },
    sorter: {
        selectorExclude: null,
        placeholder: null,
        scrollContainer: window,
        onSort: function(list, listEl, parentEl, newInputEl, inputEl) {
            // onSort callback
        }
    },
    thumbnails: {
        onItemShow: function(item) {
            // add sorter button to the item html<i class="fas fa-sort"></i>
            item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-sort fas fa-sort" title="Sort"><i></i></a>');
        },
        box: '<div class="fileuploader-items">' +
                  '<ul class="fileuploader-items-list">' +
                      '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">+</div></li>' +
                  '</ul>' +
              '</div>',
        item: '<li class="fileuploader-item">' + 
                   '<div class="fileuploader-item-inner">' +
                       '<div class="thumbnail-holder">${image}</div>' +
                       '<div class="actions-holder">' +
                              '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' +
                           '<span class="fileuploader-action-popup"></span>' +
                       '</div>' +
                          '<div class="progress-holder">${progressBar}</div>' +
                   '</div>' +
               '</li>',
        item2: '<li class="fileuploader-item">' +
                   '<div class="fileuploader-item-inner">' +
                       '<div class="thumbnail-holder">${image}</div>' +
                       '<div class="actions-holder">' +
                           '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' +
                           '<span class="fileuploader-action-popup"></span>' +
                       '</div>' +
                   '</div>' +
               '</li>',
        startImageRenderer: true,
        canvasImage: false,
        _selectors: {
            list: '.fileuploader-items-list',
            item: '.fileuploader-item',
            start: '.fileuploader-action-start',
            retry: '.fileuploader-action-retry',
            sorter: '.fileuploader-action-sort',
            remove: '.fileuploader-action-remove'
        },
        onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
            var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                api = $.fileuploader.getInstance(inputEl.get(0));
            
            plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();
            
            if(item.format == 'image') {
                item.html.find('.fileuploader-item-icon').hide();
            }
        }
    },
    afterRender: function(listEl, parentEl, newInputEl, inputEl) {
        var plusInput = listEl.find('.fileuploader-thumbnails-input'),
            api = $.fileuploader.getInstance(inputEl.get(0));
    
        plusInput.on('click', function() {
            api.open();
        });
    },
    onRemove: function(item, listEl, parentEl, newInputEl, inputEl) {
        var plusInput = listEl.find('.fileuploader-thumbnails-input'),
            api = $.fileuploader.getInstance(inputEl.get(0));
    
        if (api.getOptions().limit && api.getChoosedFiles().length - 1 < api.getOptions().limit)
            plusInput.show();
    },
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



$('.Display-Input-Modificable').click(function(){
    $(this).removeClass('display-input-disabled'); 
});


// ---- Modificable input text
// Html element
//<p data-editable class="SlugInput">{{ $article->slug }}</p>   

$('body').on('click', '[data-editable]', function(){
  
    var $el = $(this);
                
    var $input = $('<input/>').val( $el.text() );
    $el.replaceWith( $input );
    
    var save = function(){
      var $p = $('<p data-editable />').text( $input.val() );
      $input.replaceWith( $p );
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
  