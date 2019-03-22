@extends('vadmin.partials.main')
@section('title', 'Vadmin | Pedidos')
{{-- STYLE INCLUDES --}}
@section('styles')

@endsection

{{-- HEADER --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('orders.index')}}">Listado de pedidos</a></li>
            <li class="breadcrumb-item active">Cargar pedido</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="carts">
			</div>
		@endslot
		@slot('searcher')
		@endslot
	@endcomponent
@endsection

{{-- CONTENT --}}
@section('content')
	<div class="list-wrapper">
		<div class="row">
            <div class=" card">
                <div class="card-header">
                    <h1>Nuevo Pedido</h1>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <div class="card-text">
                            {!! Form::open(['route' => 'orders.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}	
                                <div class="row">
                                    <div id="ClientSelectorContainer" class="col-md-4">
                                        <label>Cliente</label>
                                        <div class="input-group">
                                            <input id="SearchCustomer" type="text" autocomplete="off" class="form-control" placeholder="Nombre o Código">
                                        </div>
                                    </div>
                                    <div id="ClientDataContainer" class="col-md-12 Hidden">
                                        <span id="ClientData"></span>
                                        <input id="SelectedCustomer" name="customer_id" type="hidden"/>
                                    </div>
                                </div> 
                                <br>
                                <div id="FormContent" class="Hidden">

                                    <div class="row greyed-row-form">
                                        <div class="col-md-3 form-group">
                                            <label for="">Buscar un producto</label>
                                            <div class="input-group">
                                                <input id="SearchArticles" type="text" autocomplete="off" class="form-control" placeholder="Ingrese Nombre o Código">
                                            </div>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            {!! Form::label('shipping_id', 'Envío') !!}
                                            {!! Form::select('shipping_id', $shippings, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion']) !!}
                                        </div>
                                        <div class="col-md-3 form-group">
                                            {!! Form::label('payment_method_id', 'Forma de Pago') !!}
                                            {!! Form::select('payment_method_id', $payment_methods, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion']) !!}
                                        </div>
                                        <div class="col-md-3 form-group">
                                            {!! Form::label('seller', 'Vendedor') !!}
                                            {!! Form::select('seller', $sellers, 
                                            Auth::guard('user')->user()->id , ['class' => 'form-control', 'placeholder' => 'Seleccione una vendedor']) !!}
                                        </div>
                                    </div>
                                    {{-- Articles Table --}}
                                    <table id="TableList" class="Articles-List table table-striped custom-list Hidden">
                                        <thead>
                                            <tr>
                                                <th class="w-50">Cód.</th>
                                                <th>Nombre</th>
                                                <th>Stock</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="Articles-List-Rows">
                                        </tbody>
                                    </table>
                                    <div class="Empty-Table">
                                        No se han ingresado artículos
                                    </div>
                                    <div class="form-actions right">
                                        <a href="{{ route('orders.index')}}">
                                                <button type="button" class="btn btnRed">
                                                <i class="icon-cross2"></i> Cancelar
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btnGreen">
                                            <i class="icon-check2"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                           {!! Form::close() !!}
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div id="Error"></div>	
	</div>
@endsection

{{-- SCRIPT INCLUDES --}}
@section('scripts')
    @include('vadmin.components.bladejs')
    <script>
    function selectClient(id, name, surname, username, group)
    {
        let div =   "<div><b>Cliente seleccionado</div></b>" +
                    "<div class='info-label'>#" + id + " - " + name + " " + surname + " ("+username+") - " + group + 
                    "<a onclick='resetForm();' class='right-info'>Cambiar</a>" +
                    "</div>";
        // Set client id in article search
        $('#SelectedCustomer').val(id);
        $('#ClientDataContainer').removeClass('Hidden');
        $('#ClientSelectorContainer').addClass('Hidden');
        $('#FormContent').removeClass('Hidden');
        return div;
    } 

    // Store Id to prevent duplicated items
    let saveIds = [];
    function buildItemRow(id, code, name, stock, price)
    {   
        console.log(saveIds);
        $('#TableList').removeClass('Hidden');
        $('.Empty-Table').addClass('Hidden');
        $('.Articles-List').removeClass('Hidden');
        
        // Prevent duplicated items
        if ($.inArray(id, saveIds) !== -1)
        {
            alert_error("", "El producto ya está agregado");
        }
        else
        {
            let row ="<tr id='OrderItem-"+ id +"'>" +
                    "<td>#"+ code +"</td>" + 
                    "<td>"+ name +"</td>" +
                    "<td>"+ stock +"</td>" +
                    "<td>$"+ price +
                    "<input name=item["+ id +"][final_price] value="+ price +" type='hidden' />" +
                    "</td>" + 
                    "<td>" +
                    "<input name=item["+ id +"][quantity] value='1' style='padding-left: 10px; max-width: 50px' type='number' />" +
                    "<input name=item["+ id +"][id] value='"+ id +"' type='hidden' />" +
                    "</td>" +
                    "<td><i onclick='removeRow("+ id +");' class='cursor-pointer fa fa-trash'</td>" +
                    "</tr>";
            saveIds.push(id);
            $('#Articles-List-Rows').append(row);
        }
    }


    function removeRow(id)
    {
        // Remove Row
        $("#OrderItem-"+ id).remove();
        // Remove Item From Array
        saveIds = $.grep(saveIds, function(value) {
            return value != id;
        });
    }

    function resetForm()
    {
        $('form')[0].reset();
        location.reload();
    }

    $(document).ready(function(){

        // Search Customer - Autocomplete
        // ------------------------------

        $("#SearchCustomer").autocomplete({
            source: "{{ url('vadmin/searchCustomer') }}",
                focus: function(request, response) {
                return false;
            },
            select: function(event, ui) {
                // Show Info
                $('#ClientData').html(selectClient(ui.item.id, ui.item.name, ui.item.surname, ui.item.username, ui.item.group));
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            if(item.empty != undefined)
            {
                return $("<li onclick='event.stopPropagation();'></li>").append("<div class='label'>Sin resultados</div>").appendTo(ul);
            }
            else
            {
                let inner_html = "<div class='label'>" + item.id + " - " + item.name + " " + item.surname + " (" + item.username + ")</div>";
                return $("<li></li>").data( "item.autocomplete", item).append(inner_html).appendTo(ul);
            }
        };


        // Search Article - Autocomplete
        // ------------------------------

        $("#SearchArticles").autocomplete({
            source: function(request, response) {
                let customerId = $('#SelectedCustomer').val();
                if(customerId == '' || customerId == undefined)
                {
                    alert_error("Primero debe seleccionar un cliente");
                }
                else
                {
                    $.getJSON("{{ url('vadmin/searchCatalogArticle') }}", {request, customer: customerId }, response);
                }
            },
            select: function(event, ui) {
                buildItemRow(ui.item.id, ui.item.code, ui.item.name, ui.item.stock, ui.item.price);
            }
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            if(item.name === 0)
            {
                return $("<li onclick='event.stopPropagation();'></li>").append("<div class='label'>Sin resultados</div>").appendTo(ul);
            }
            else
            {
                let inner_html = '<div class="label">#' + item.code + ' '+ item.name +'</div>';
                // Multiline
                //let inner_html = '<div class="label">#' + item.code + ' '+ item.name +'<br><div>'+ item.name +'</div></b></div>';
                return $( "<li></li>" ).data( "item.autocomplete", item).append(inner_html).appendTo(ul);

            }
        };
    });


    </script>

@endsection


