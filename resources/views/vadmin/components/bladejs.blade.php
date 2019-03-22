<script>
    /*
    |--------------------------------------------------------------------------
    | LISTS
    |--------------------------------------------------------------------------
    */

    // List Edit Row Trigger
    $(document).on("click", ".EditBtn", function(e){
        var id    = $('#EditId').val();
        var model = $('#ModelName').val();
        var route = "{{ url('vadmin') }}/"+model+"/"+id+"/edit";
        location.replace(route);
    });

    // Create Item from another
    $(document).on('click', '.CreateFromAnotherBtn', function(e) { 
        var id    = $('#RowsToDeletion').val();
        var model = $('#ModelName').val();
        var route = "{{ url('vadmin') }}/createFromAnother/"+model+"/"+id;
        location.replace(route);
    });

    $(document).on('click', '.DeleteBtn', function(e) { 
        var id    = $('#RowsToDeletion').val();
        var model = $('#ModelName').val();
        var route = "{{ url('vadmin') }}/destroy_"+model;
        deleteAndReload(id, route, 'Cuidado!','Está seguro?');
    });

    // Editable Input
    $('.editable-input').on('change', function(e) {
        let dataDiv = $(e.target).siblings('.editable-input-data');
        let route = dataDiv.attr('data-route');
        let id = dataDiv.attr('data-id');
        let field = dataDiv.attr('data-field');
        let type = dataDiv.attr('data-type');
        let action = dataDiv.attr('data-action');
        let value = $(e.target).val();
        // Set Value on hidden div
        dataDiv.attr('data-value', value);
        updateItem(route, id, field, value, type, action);
    });

    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */

    // Delete Image -------------------------------------------------------
    $(document).on('click', '.Delete-Product-Img', function(e) {
        var id    = $(this).data('imgid');
        console.log(id);
        var route = "{{ url('vadmin') }}/destroy_product_image";
        deleteAndReload(id, route, "Atención","Desea eliminar esta imágen?");
    });

    $(document).on('click', '.Delete-Porfolio-Img', function(e) {
        var id    = $(this).data('imgid');
        var route = "{{ url('vadmin') }}/destroy_portfolio_image";
        // console.log(id + ' | ' + route);
        deleteAndReload(id, route, "Atención","Desea eliminar esta imágen?");
    });

    /*
    |--------------------------------------------------------------------------
    | UPDATES
    |--------------------------------------------------------------------------
    */

    function updateItem(route, id, field, value, type, action)
    {
        // console.log(type);
        if(value == '' || value == undefined || value == null) {
            alert_error("", "Falta llenar el campo");
            return;
        }
        
        if(!checkType(value, type)){
            console.log("Dato Incorrecto");
            alert_error("Ups...", "Ha ingresado un dato incorrecto.");
            return false;
        }
            
        let data = { route: route, id: id, field: field, value: value};
        
        $.ajax({
            url: "{{ url('vadmin/') }}/"+route,
            type: 'POST',
            dataType: 'JSON',
            data: data,
            beforeSend: function(){
                if(action != 'update')
                    fullLoader("show");
            },
            success: function(data){
                console.log(data);
                if(data.response == "success"){
                    // Success
                    if(action == "reload"){ location.reload(); }
                } else if(data.response == "error") {
                    console.log(data.message);
                    alert_error("Error", data.message);
                } else {
                    alert_error("Error", "Qué habrá pasado?. Consulte al programador.");
                }
            },
            error: function(data){
               console.log(data);
               $('#Error').html(data.responseText);
            },
            complete: function(){
               fullLoader("hide");
            }
        }); 
    }

    // Check if a number or a number-string is a positive and integer
    function checkType(value, type)
    {

        console.log(value, type);
        let check;
        switch(type){
            case "int":
                check = isNormalInteger(value);
                break;
            case "decimal":
                check = isNumeric(value);
                break;
            case "string":
                check = true;
                break;
            default:
                console.log("Dato erróneo");
                check = false;
        }
        return check;
    }

    function isNormalInteger(value) {
        var n = Math.floor(Number(value));
        return n !== Infinity && String(n) === value && n >= 0;
    }

    function isNumeric(value) {
        var realStringObj = value && value.toString();
        return !jQuery.isArray(value) && (realStringObj - parseFloat(realStringObj) + 1) >= 0 && value >= 0;
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS (General)
    |--------------------------------------------------------------------------
    */

    $('.UpdateStatus').click(function(){
        let model = $(this).data('model');
        let id = $(this).data('id');
        updateStatus(model, id);
    });

    function updateStatus(model, id){
    
        $.ajax({
            url: "{{ url('vadmin/updateStatus/')}}/"+model+"/"+id+"",
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                
            },
            success: function(data){
                console.log(data.newStatus);
            },
            error: function(data){
                console.log(data);
                alert_error('Ha ocurrido un error');
                $('#Error').html(data.responseText);
            }
        }); 

    }

    function updateStatusMultiple(id, model, status, action){

        var route  = "{{ url('vadmin/updateStatusMultiple/')}}/"+id+"/"+model+"/"+status+"";
        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                
            },
            success: function(data){
                console.log(data.success);
                if(data.success == true){
                    action();
                }
            },
            error: function(data){
                alert_error('Ha ocurrido un error');
                console.log(data);
                //$('#Error').html(data.responseText);
            }
        }); 

    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE CUSTOMER GROUP
    |--------------------------------------------------------------------------
    */

    function updateCustomerGroup(value, customerId){
        
        var route  = "{{ url('vadmin/updateCustomerGroup') }}";
        var data = { id: customerId, group: value.value};
        
        $.ajax({
            url: route,
            type: 'POST',
            data: data,
            success: function(data){
                console.log(data);
            },
            error: function(data){
                console.log(data);
                alert_error('Ha ocurrido un error');
                //$('#Error').html(data.responseText);
            }
        }); 

    }

    
    /*
    |--------------------------------------------------------------------------
    | UPDATE CUSTOMER GROUP
    |--------------------------------------------------------------------------
    */

    function updateCartStatus(status, cartid){
        
        var route  = "{{ url('vadmin/updateCartStatus') }}";
        var data = { id: cartid, status: status.value};
        $.ajax({
            url: route,
            type: 'POST',
            data: data,
            dataType: 'JSON',
            success: function(data){
                console.log(data);
                $('#Error').html(data.responseText);
                if(data.response == true){
                    location.reload();
                } 
                else if(data.response == false)
                {
                    alert_error('Mmm...', data.message);
                } else {
                    $('#Error').html(data.responseText);
                }
            },
            error: function(data){
                console.log(data);
                //alert_error('Ha ocurrido un error');
                $('#Error').html(data.responseText);
            }
        }); 
    }

    /*
    |--------------------------------------------------------------------------
    | VALIDATIONS
    |--------------------------------------------------------------------------
    */

    function validateIntOrFloat(value){
        if(parseInt(value) == value){
            return true;
            }
            else if(parseFloat(value) == value){
                return true;
            }
            else{
                alert_error('Ups','Debe ingresar un número');
                return false;
        } 
    }

    function validateInt(value){
        if(parseInt(value) == value){
            return true;
            }
            else if(parseFloat(value) == value){
                alert_error('Ups','Debe ingresar un número entero');
                return false;
            }
            else{
                alert_error('Ups','Debe ingresar un número');
                return false;
        } 
    }
    
    /*
    |--------------------------------------------------------------------------
    | STORE COUPONS
    |--------------------------------------------------------------------------
    */

    function generateCatalogCoupon(divId){
        
        $.ajax({
            url: "{{ url('vadmin/generateCatalogCoupon') }}",
            type: 'POST',
            dataType: 'JSON',
            success: function(data){
                if(data.response == true){
                    $('#'+divId).val(data.couponCode);
                } else {
                    $('#Error').html(data.responseText);
                }
            },
            error: function(data){
                console.log(data);
                //alert_error('Ha ocurrido un error');
                $('#Error').html(data.responseText);
            }
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


    // Update User Avatar
    $('#Avatar').click(function(){
        $('#ImageInput').click();
    });    
       
    $(document).ready(function() {
    
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.Image-Container').attr('src', e.target.result);
                    $('.ActionContainer').removeClass('Hidden');
                }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#ImageInput").change(function(){
            readURL(this);
            $('.UpdateAvatarForm').removeClass('Hidden');
        });
    });

</script>