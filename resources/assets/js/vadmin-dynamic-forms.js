/*
|--------------------------------------------------------------------------
| SERIALIZABLE LIST UPDATER
|--------------------------------------------------------------------------
*/

// Changes values from columns of a list.
// -------------------------------------------
window.dataSetter = function (fields) {
    let row = $('.SerializableItem');
    items = [];
    
    $(row).each(function () {
        // This is the row id
        let id = $(this).data('id');
        
        item = {}
        // Store row id in array
        item['id'] = id;
        
        item['fields'] = {};
        // Store columns data in array
        for (let i = 0; i < fields.length; i++) {
            let field = $(this).children(fields[i]).children('input').data('field');
            item['fields'][field] = $(this).children(fields[i]).children('input').val();
        }

        // Push row with cols data to array
        items.push(item);
    });
    console.info(items);
}

$(document).ready(function() {
    $(document).on("click","#UpdateList",function() {
        if(items == undefined || items == '' || items == null)
        {
            alert_error("", "Aún no se realizaron cambios");
        }
        else
        {
            let route = $(this).data("route");
            updateList(items, route);
        }
    });
});


function updateList(items, route)
{
     $.ajax({
        url: route,
        method: 'POST',
        dataType: 'JSON',
        data: {data: items},
        success: function (data) {
        console.log(data);
            alert_ok('OK!','Items actualizados');
        },
        error: function (data) {
            // $('#Error').html(data.responseText);
            alert_error("", "Ha ingresado un dato incorrecto. Solo puede ingresar números enteros positivos.");
            console.log("Error en updateList()");
            console.log(data);
        }
     });
}