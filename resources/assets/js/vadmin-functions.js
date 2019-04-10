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
$(document).on("click", ".List-Checkbox", function(e)
{
	e.stopPropagation();
	CheckToDeletion("single", $(this));
});

// Select All present checkboxes to deletion
$('.Select-All-To-Delete').on("click", function() {
	
	if ($(this).prop('checked')) {
		$('.List-Checkbox').prop('checked', true);
		if($('.List-Checkbox').length >= 1)
		{
			CheckToDeletion("all")
			$('.DeleteBtn').removeClass('Hidden');
		}

		$('tbody tr').addClass('row-selected');
	} else {
		$('.List-Checkbox').prop('checked', false);
		$('.DeleteBtn').addClass('Hidden');
		$('tbody tr').removeClass('row-selected');
	}
});

function CheckToDeletion(type, row)
{
	var selectedRows = [];
	$(".List-Checkbox:checked").each(function() {          
		selectedRows.push($(this).attr('data-id'));
		$('#RowsToDeletion').val(selectedRows);
	});
	
	if(selectedRows.length == 1){
		$('#EditId, #CreateFromAnotherId').val(selectedRows);
	} else if(selectedRows.length < 1){
		$('#EditId, #CreateFromAnotherId').val('');
	} else if(selectedRows.length > 1){
		$('#EditId, #CreateFromAnotherId').val('');
	} else {
		$('#EditId, #CreateFromAnotherId').val('');
	}

	showButtons(this);
	if(type == 'single' && row != undefined)
	{
		var checkbox = row.prop('checked');
		if(checkbox){
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
	if(countSelected == 1) {
        $('.DeleteBtn').removeClass('Hidden');
		$('.EditBtn').removeClass('Hidden');
		$('.CreateFromAnotherBtn').removeClass('Hidden');
	} else if(countSelected >= 2) {
		$('.EditBtn').addClass('Hidden');
		$('.CreateFromAnotherBtn').addClass('Hidden');
    } else if(countSelected == 0) {
        $('.DeleteBtn').addClass('Hidden');
		$('.EditBtn').addClass('Hidden');
		$('.CreateFromAnotherBtn').addClass('Hidden');
    }
}

// Show Edit and Delete buttons in bottom if scrolled to mutch
$(document).scroll(function(e){
	var scrollAmount = $(window).scrollTop();
	if(scrollAmount > 150){
		$('.DeleteBtn').css({"position":"fixed", "bottom":"50px", "right":"10px", "z-index":"999"});
		$('.EditBtn').css({"position":"fixed", "bottom":"50px", "right":"130px", "z-index":"999"});
		$('.CreateFromAnotherBtn').css({"position":"fixed", "bottom":"50px", "right":"235px", "z-index":"999"});
	} else {
		$('.DeleteBtn').css({"position":"relative", "bottom":"auto", "right":"auto", "z-index":"999"});
		$('.EditBtn').css({"position":"relative", "bottom":"auto", "right":"auto", "z-index":"999"});
		$('.CreateFromAnotherBtn').css({"position":"relative", "bottom":"auto", "right":"auto", "z-index":"999"});
		
	}
});

// Uncheck all checkboxes on reload.
function uncheckAll(){
	$('#TableList tbody .CheckBoxes').find('input[type="checkbox"]').each(function() {
		$(this).prop('checked', false);	
	});	
}
uncheckAll();

/*
|--------------------------------------------------------------------------
| FUNCTIONS
|--------------------------------------------------------------------------
*/

deleteRecord = function(id, route, bigtext, smalltext) {
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
			beforeSend: function(){
				// $('#Main-Loader').removeClass('Hidden');
			},
			success: function(data){
				$('#BatchDeleteBtn').addClass('Hidden');
				if (data.success == true) {
					$('#Id'+id).hide(200);
					for(i=0; i < id.length ; i++){
						$('#Id'+id[i]).hide(200);
					}
					alert_ok('Ok!','Eliminación completa');
					console.log(data);
					return true;
				} else {
					console.log(data.error);
					if(data.message != '')
						alert_error('Ups!', data.message);	
					else
						alert_error('Ups!','Ha ocurrido un error (Puede que este registro tenga relación con otros items en el sistema). Debe eliminar primero los mismos.');

					console.log(data);
					return false;
				}
			},
			error: function(data)
			{
                $('#Error').html(data.responseText);
				console.log(data);	
			},
			complete: function()
			{
				// $('#Main-Loader').addClass('Hidden');
			}
		});
	});

}

deleteAndReload = function(id, route, bigtext, smalltext) {
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
			beforeSend: function(){
				// $('#Main-Loader').removeClass('Hidden');
			},
			success: function(data){
				$('#BatchDeleteBtn').addClass('Hidden');
				if (data.success == true) {
					// alert_ok('Ok!','Eliminación completa');
					location.reload();
				} else {
					if(data.message != '')
						alert_error('Ups!', data.message);	
					else
						alert_error('Ups!','Ha ocurrido un error (Puede que este registro tenga relación con otros items en el sistema). Debe eliminar primero los mismos.');
					// alert_error('Ups!','Ha ocurrido un error (Puede que este registro tenga relación con otros items en el sistema). Debe eliminar primero los mismos.');
					console.log(data);
					return false;
				}
			},
			error: function(data)
			{
				$('#Error').html(data.responseText);
				console.log(data);	
			}
		});
	});

}

/*
|--------------------------------------------------------------------------
| ALERTS
|--------------------------------------------------------------------------
*/

function alert_ok(bigtext, smalltext){
    swal(
        bigtext,
        smalltext,
        'success'
    );    
}
    
function alert_error(bigtext, smalltext){
    swal(
        bigtext,
        smalltext,
        'error'
    );
}

function alert_info(bigtext, smalltext){

    swal({
            title: bigtext,
        type: 'info',
        html: smalltext,
        showCloseButton: true,
        showCancelButton: false,
        confirmButtonText:
            '<i class="ion-checkmark-round"></i> Ok!'
        });
}


function closeParent(){
	$(this).parent('hide');
}

