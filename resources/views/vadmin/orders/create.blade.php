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
    @if($existingOrder)
        <div class="alert alert-error">Esta función "Edición de pedidos existentes" está en fase <b>beta</b>. ** Requiere testeo ** </div>
    @endif
	<div class="list-wrapper">
		<div class="row">
            <div class=" card">
                <div class="card-header">
                    @if($existingOrder)
                        <h1> Pedido N°: {{ $existingOrder->id }} </h1>
                    @else
                        <h1>Nuevo Pedido</h1>
                    @endif
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <div class="card-text">
                            @if($existingOrder != null)
                                {!! Form::open(['url' => ['vadmin/orders', $existingOrder->id], 'method' => 'PATCH', 'data-parsley-validate' => '']) !!}
                            @else
                                {!! Form::open(['route' => 'orders.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}	
                            @endif
                                <div class="row">
                                    @if($existingOrder)
                                        <div id="ClientSelectorContainer" class="col-md-4 Hidden">
                                            <label>Cliente</label>
                                            <div class="input-group">
                                                <input id="SearchCustomer" type="text" autocomplete="off" class="form-control" placeholder="Nombre o Código">
                                            </div>
                                        </div>
                                        <div id="ClientDataContainer" class="col-md-12">
                                            <span>{{ $existingOrder->customer->name }} {{ $existingOrder->customer->surname }} | {{ $existingOrder->customer->username }}</span>
                                            <input id="SelectedCustomer" name="customer_id" type="hidden" value="{{ $existingOrder->customer->id }}" />
                                        </div>
                                    @else
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
                                    @endif
                                </div> 
                                <br>
                                <div id="FormContent" class="@if(!$existingOrder) Hidden @endif">
                                    <div class="row greyed-row-form">
                                        <div class="col-md-3 form-group">
                                            <label for="">Buscar un producto</label>
                                            <div class="input-group">
                                                <input id="SearchArticles" type="text" autocomplete="off" class="form-control" placeholder="Ingrese Nombre o Código">
                                            </div>
                                        </div>
                                        {{-- {{ dd($shippingData) }} --}}
                                        <div class="col-md-3 form-group">
                                            {!! Form::label('shipping_id', 'Envío') !!}
                                                <select id="ShippingSelected" name="shipping_id" class="form-control" required="" id="shipping_id" name="shipping_id">
                                                    <option selected="selected" value="">Seleccione una opcion</option>
                                                    @foreach($shippingData as $shipping)
                                                        <option 
                                                            @if($existingOrder != null )
                                                                @if($existingOrder->shipping)
                                                                    @if($existingOrder->shipping->id == $shipping->id) selected @endif
                                                                @endif
                                                            @endif
                                                            value="{{ $shipping->id }}" price="{{ $shipping->price }}">{{ $shipping->name }} @if($shipping->price != 0) (${{ $shipping->price }}) @endif</option>
                                                    @endforeach
                                                </select>
                                                {{-- {!! Form::select('shipping_id', $shippings, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion', 'required' => '']) !!} --}}
                                        </div>
                                        <div class="col-md-3 form-group">
                                            {!! Form::label('payment_method_id', 'Forma de Pago') !!}
                                            <select id="PaymentSelected" name="payment_method_id" class="form-control" required="" id="payment_method_id" name="payment_method_id">
                                                <option selected="selected" value="">Seleccione una opcion</option>
                                                @foreach($paymentData as $payment)
                                                    <option 
                                                        @if($existingOrder != null )
                                                            @if($existingOrder->payment)
                                                                @if($existingOrder->payment->id == $payment->id) selected @endif
                                                            @endif
                                                        @endif
                                                        value="{{ $payment->id }}" percent="{{ $payment->percent }}">{{ $payment->name }} @if($payment->percent != 0) (%{{ $payment->percent }}) @endif</option>
                                                @endforeach
                                            </select>
                                            {{-- {!! Form::select('payment_method_id', $payment_methods, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion', 'required' => '']) !!} --}}
                                        </div>
                                        <div class="col-md-3 form-group">
                                            {!! Form::label('seller', 'Vendedor') !!}
                                            {!! Form::select('seller', $sellers, 
                                            Auth::guard('user')->user()->id , ['class' => 'form-control', 'placeholder' => 'Seleccione una vendedor']) !!}
                                        </div>
                                    </div>
                                    {{-- Articles Table --}}
                                    <table id="TableList" class="Articles-List table table-striped custom-list @if(!$existingOrder) Hidden @endif">
                                        <thead>
                                            <tr>
                                                <th class="w-50">Cód.</th>
                                                <th>Nombre</th>
                                                <th>Variante</th>
                                                <th>Stock</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Subtotales</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="Articles-List-Rows">
                                            @if($existingOrder)
                                                @foreach($existingOrder->items as $item)
                                                    <tr id="OrderItem-{{ $item->variant->id }}">
                                                        <td>#{{ $item->article->code }}</td>
                                                        <td>{{ $item->article->name }}</td>
                                                        <td>{{ $item->combination }}</td>
                                                        <td>{{ $item->article->stock }}</td>
                                                        <td>{{ $item->article->reseller_price }}</td>
                                                        <input name="item[{{ $item->variant->id }}][variant_id]" value="{{ $item->variant->id }}" type='hidden' />
                                                        <input name="item[{{ $item->variant->id }}][name]" value="{{  $item->article->name }}" type='hidden' />
                                                        <input name="item[{{ $item->variant->id }}][combination]" value="{{ $item->combination }}" type='hidden' />
                                                        <input name="item[{{ $item->variant->id }}][color]" value="{{ $item->color }}" type='hidden' />
                                                        <input name="item[{{ $item->variant->id }}][size]" value="{{ $item->size }}" type='hidden' />
                                                        <input name="item[{{ $item->variant->id }}][textile]" value="{{ $item->textile }}" type='hidden' />
                                                        <input class='Row-Price-Item' name="item[{{ $item->variant->id}}][final_price]" value="{{ $item->final_price }}" type='hidden' />

                                                        {{-- Quantity --}}
                                                        <td>
                                                            <input class="ItemQuantityInput" data-rowid="OrderItem-{{ $item->variant->id }}" 
                                                            data-price="{{ $item->article->reseller_price }}" name="item[{{ $item->variant->id }}][quantity]" value="{{ $item->quantity }}" 
                                                            style="padding-left: 10px; max-width: 50px" type="number" />
                                                            <input name="item[{{ $item->variant->id }}][id]" value="{{ $item->id }}" type="hidden" />
                                                        </td>
                                                        {{-- Subtotal --}}
                                                        <td>$<input class="SubTotalItemPrice only-display-input" disabled name="subTotalItemPrice" 
                                                            value="{{ $item->article->reseller_price * $item->quantity }}"></td>
                                                        {{-- Delete Item --}}
                                                        <td><i onclick="removeExistingItem({{ $item->id }}, {{ $item->variant->id}}, 'noreload');" class="cursor-pointer fa fa-trash"></td>
                                                    </tr>
                                                @endforeach
                                            @endif


                         
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div id="Order-Total-Container" class="Hidden right-item right-data">
                                                
                                            <span class="text-small-thin">SubTotal: $</span>  
                                            <span class="text-data">
                                                <span id="Order-SubTotal"> </span>
                                            </span> <br>

                                            <span class="text-small-thin" style="font-size: 1rem">Costo de envío: $</span> 
                                            <span class="text-data" style="font-size: 1rem" id="OrderShippingCost">0</span> <br>
                                            
                                            <span class="text-small-thin" style="font-size: 1rem"> Recargo por forma de pago: $</span> 
                                            <input type="hidden" name="paymentMethodCost" value="0" id="PaymentMethodPercentInput">      
                                            <span id="OrderPaymentCost" class="text-data" style="font-size: 1rem">0</span> <br>

                                            <div style="border: 1px solid #d8d8d8; padding: 15px; margin-top: 10px;">
                                                <span class="text-small-thin">Total: $</span>  
                                                <span class="text-data">
                                                    <span id="Order-Total"> </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @if(!$existingOrder)
                                        <div class="Empty-Table">
                                            No se han ingresado artículos
                                        </div>
                                    @endif
                                    <div class="form-actions right">
                                        <a href="{{ route('orders.index')}}">
                                            <button type="button" class="btn btnRed">
                                                <i class="icon-cross2"></i> Volver
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btnGreen">
                                            @if($existingOrder)
                                                <i class="icon-check2"></i> Editar Pedido
                                            @else
                                                <i class="icon-check2"></i> Crear Pedido
                                            @endif
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
    calcAndShowTotals();
        
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
    let savedVariants = [];

    function buildItemRow(id, code, name, variant, variantId, color, size, textile, stock, price)
    {   
        // console.log(name);
        $('#TableList').removeClass('Hidden');
        $('.Empty-Table').addClass('Hidden');
        $('.Articles-List').removeClass('Hidden');
        
        // Prevent duplicated items
        // if ($.inArray(id, saveIds) !== -1 && $.inArray(variant, savedVariants) !== -1)
        if($.inArray(variantId, savedVariants) !== -1)
        {
            alert_error("", "El producto/variante ya está agregado");
            return;
        }

        let name2 = name;
        let row =   "<tr id='OrderItem-"+ variantId +"'>" +
                        "<td>#"+ code +"</td>" + 
                        "<td>"+ name2 +"</td>" +
                        "<td>"+ variant +"</td>" +
                        "<td>"+ stock +"</td>" +
                        "<td>$"+ price + "</td>" +
                            "<input name=item["+ variantId +"][variant_id] value="+ variantId +" type='hidden' />" +
                            "<input name=item["+ variantId +"][name] value='"+ name2 +"' type='hidden' />" +
                            "<input name=item["+ variantId +"][combination] value="+ variant +" type='hidden' />" +
                            "<input name=item["+ variantId +"][color] value="+ color +" type='hidden' />" +
                            "<input name=item["+ variantId +"][size] value="+ size +" type='hidden' />" +
                            "<input name=item["+ variantId +"][textile] value="+ textile +" type='hidden' />" +
                            "<input class='Row-Price-Item' name=item["+ variantId +"][final_price] value="+ price +" type='hidden' />" +
                        // "</td>" + 
                        "<td>" +
                            "<input class='ItemQuantityInput' data-rowid='OrderItem-"+ variantId +"'  data-price="+ price +" name=item["+ variantId +"][quantity] value='1' style='padding-left: 10px; max-width: 50px' type='number' />" +
                            "<input name=item["+ variantId +"][id] value='"+ id +"' type='hidden' />" +
                        "</td>" +
                        "<td>$<input class='SubTotalItemPrice only-display-input' disabled name='subTotalItemPrice' value="+ price +"></td>" +
                        "<td><i onclick='removeRow("+ variantId +");' class='cursor-pointer fa fa-trash'</td>" +
                    "</tr>";

        savedVariants.push(variantId);
        $('#Articles-List-Rows').append(row);
        calcAndShowTotals();
    }

    // CALC NEW SUBTOTAL PRICE IF USER CHANGE QUANTITY
    $(document).on('change keyup keydown', '.ItemQuantityInput', function(e) {  
        let quantity = $(this).val();
        let price = $(this).data('price');
        let rowid = $(this).data('rowid');
        let total = Number(quantity) * Number(price);
        
        $('#'+ rowid + ' > td > .SubTotalItemPrice').val(total);
        calcAndShowTotals();
    });

    // SET SHIPPING PRICE AS SUBTOTAL
    $(document).on('change', '#ShippingSelected', function() {
        calcAndShowTotals();
    });
    
    $(document).on('change', '#PaymentSelected', function() {
        calcPaymentMethodCost();
    });

    function calcPaymentMethodCost()
    {
        let subTotal = $('#Order-SubTotal').html();

        // Display calcs
        console.log("Calculando costo de envio....");
        console.log("Subtotal: " + subTotal);
        let value = $('#PaymentSelected > option:selected').attr('percent');
        console.log("Porcentaje por envio: " + value);
        let paymentCost = Number(subTotal) * Number(value) / 100;
        console.log("Total de envío: " + paymentCost);
        console.info("----------------------------------------");
        
        $('#OrderPaymentCost').html(paymentCost);
    }

    
    // DISPLAY ORDER TOTAL
    function calcAndShowTotals()
    {
        let values = [];
        $('.SubTotalItemPrice').each(function(){
            // If multiple data needed
            // values.push({ name: this.name, price: this.value }); 
            values.push(this.value); 
        });

        let paymentMethodValue = $('#PaymentMethodPercentInput').val();

        let subTotal = 0;
        for (var i = 0; i < values.length; i++) {
            subTotal += values[i] << 0;
        }
        
        $('#Order-Total-Container').removeClass('Hidden');
        
        // Display Subtotal
        $('#Order-SubTotal').html(subTotal);
        
        calcPaymentMethodCost(paymentMethodValue);
        let setShippingCost = $('#ShippingSelected > option:selected').attr('price');
        $('#OrderShippingCost').html(setShippingCost);
        
        let shippingCost = $('#OrderShippingCost').html();
        let paymentCost = $('#OrderPaymentCost').html();
        let total = Number(subTotal) + Number(shippingCost) + Number(paymentCost);
        //Display Total
        $('#Order-Total').html(total);
    }

    // REMOVE EXISTING ITEM
    function removeRow(variantId)
    {
        $("#OrderItem-"+ variantId).remove();
        savedVariants = $.grep(savedVariants, function(value) {
            return value != variantId;
        });
        calcAndShowTotals();
    }

    function removeExistingItem(itemId, variantId, action)
    {
        let element = $('#OrderItem-'+variantId);
        removeFromCart("{{ route('vadmin.removeFromOrder') }}", itemId, action, element);
        setTimeout(function(){ calcAndShowTotals(); }, 1000);
        
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
                // console.log("En search");
                // console.log(ui.item);
                // id, code, name, variant, variantId, color, size,  stock, price
                buildItemRow(ui.item.id, ui.item.code, ui.item.name, ui.item.variant, ui.item.variant_id, ui.item.variant_color, ui.item.variant_size,
                ui.item.textile, ui.item.stock, ui.item.price);
            }
        }).data( "ui-autocomplete" )._renderItem = function(ul, item) {

            if(item.name === 0)
            {
                return $("<li onclick='event.stopPropagation();'></li>").append("<div class='label'>Sin resultados</div>").appendTo(ul);
            }
            else
            {
                let inner_html = '<div class="label">#' + item.code + ' '+ item.name +' | ' + item.variant + '</div>';
                // Multiline
                //let inner_html = '<div class="label">#' + item.code + ' '+ item.name +'<br><div>'+ item.name +'</div></b></div>';
                return $( "<li></li>" ).data( "item.autocomplete", item).append(inner_html).appendTo(ul);

            }
            
        };
    });


    </script>

@endsection


