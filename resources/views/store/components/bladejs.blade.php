<script>

    const loader = "<img src='{{ asset('images/gral/loader-sm.svg') }}'>";
    /*
    |--------------------------------------------------------------------------
    | COUPON
    |--------------------------------------------------------------------------
    */

    $('#CheckCoupon').click(function(e){
        e.preventDefault();
        let code = $('#CuponCodeInput').val();
        let cartid = $('#CartId').val();
        validateAndSetCoupon("{{ route('store.validateAndSetCoupon') }}", code, cartid);
    });

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT
    |--------------------------------------------------------------------------
    */
        
    setItemsData();
    sumAllItems();

    $('.Item-Data').on('keyup change', function(){
        setItemsData();	
    });

    $(document).on('click', '.SubmitDataBtn', function(e){
        e.preventDefault();
        // Route - Target - Data - Action 
        // itemData is set in dom.
        submitCartToCheckout("{{ route('store.checkout-set-items') }}", "{{ route('store.processCheckout')}}", itemData, "continue");
    });
    
    $(document).on('click', '.UpdateDataBtn', function(e){
        submitCartToCheckout("{{ route('store.checkout-set-items') }}", "reload", itemData, "update");
    });

    /*
    |--------------------------------------------------------------------------
    | ADD TO CART
    |--------------------------------------------------------------------------
    */

    $('#AddToCartForm').on('submit', function(e){
        e.preventDefault();
        let data = $(this).serialize();
        const route = "{{ route('store.addToCartLive') }}";

        if(checkVariantStock())
        {
            addToCart(route, data);
        }
    });

    /*
    |--------------------------------------------------------------------------
    | WHISH-LISTS
    |--------------------------------------------------------------------------
    */

    // Add Article to WishList
    $(document).on("click", ".AddToFavs", function(e){
        e.preventDefault();
        var articleid  = $(this).data('id');
        var favid      = $(this).data('favid');
        action         = 'show';
        displayButton  = $(this);
        addArticleToFavs("{{ route('customer.addArticleToFavs') }}", favid, articleid, action, displayButton);
    });

    // Remove Article from WishList
    $(document).on("click", ".RemoveFromFavs", function(e){
        e.preventDefault();
        var favid      = $(this).data('favid');
        action         = 'reload';
        removeArticleFromFavs("{{ route('customer.removeArticleFromFavs') }}", favid, action);
    });

    $(document).on("click", ".RemoveAllFromFavs", function(e){
        e.preventDefault();
        var customerid = $(this).data('customerid');
        action         = 'reload';
        removeAllArticlesFromFavs("{{ route('customer.removeAllArticlesFromFavs') }}", customerid, action);
    });

    function checkFavs()
    {
        let favscount = $('.FavMainIcon').data('favscount');
        console.log(favscount);
    }

    /*
    |--------------------------------------------------------------------------
    | MERCADO PAGO CHECKOUT
    |--------------------------------------------------------------------------
    */
    $('#MpModalBtn').click(function(){
        var responseDiv = $('#MpResponse');
        var redirectBtn = $('#MpRedirect');
        var cartId      = $('#CartId').val();
        var cartTotal   = $('#CartTotal').val();

        createPreference(cartId, cartTotal, responseDiv, redirectBtn);
    });

    //url: "{{ route('store.getCreatePreference') }}",
    function createPreference(cartId, cartTotal, responseDiv, redirectBtn) {

        var btnLoader   = $('.CheckOutLoader').html(loader);
        btnLoader.hide();

        $.ajax({
            url: "{{ route('store.getCreatePreference') }}",
            method: 'POST',
            dataType: 'JSON',
            data: { cartId: cartId, cartTotal: cartTotal },
            beforeSend: function(){
                btnLoader.show();
            },
            success: function(data){
                console.log(data);
                if(data.response == true){
                    // Redirect to MP
                    if(data.result.response.init_point != undefined){
                        var href = data.result.response.init_point;
                        window.location.replace(href);
                    } else {
                        console.log('Error en MP');
                        btnLoader.hide();        
                    }
                } else {
                $('#Error').html(data.result);
 	               console.log(data);
                }
            },
            error: function(data){
                console.log(data);
                $('#Error').html(data.responseText);
            },
            complete: function(){
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | GET PROVINCES and LOCALITIES
    |--------------------------------------------------------------------------
    */

    function getGeoLocs(geoprov_id){

        let route = "{{ url('getGeoLocs') }}/"+geoprov_id+"";
        $.ajax({
            url: route,
            method: 'GET',
            dataType: 'JSON',
            success: function(e){
                // Print Locs
                var select = $('#GeoLocsSelect');
                var actuallocid = $('#GeoLocsSelect').data('actuallocid');

                select.html('');
                for (var i = 0, len = e.geolocs.length; i < len; i++) {
                    if(actuallocid != '' && e.geolocs[i]['id'] == actuallocid){
                        select.append("<option selected value='"+ e.geolocs[i]['id'] +"'>"+ e.geolocs[i]['name'] +"</option>");
                    } else {
                        select.append("<option value='"+ e.geolocs[i]['id'] +"'>"+ e.geolocs[i]['name'] +"</option>");
                    }
                }

            },
            error: function(e){
                console.log('ERROR');
                console.log(e);
                $('#Error').html(e.responseText);
            }
        });
        
    }

    function checkIfHasProvSelected(provs, locs)
    {
        let selected_provs = $(provs + ' option:selected');
        let selected_locs = $(locs + ' option');
        let selected_prov = $(".GeoProvSelect option:selected");

        // Check if there is provs selectes
        if(selected_provs.length != 0)
            // If there is selected provs check if has options (locs)
            if(selected_prov.index() != 0)
                if(selected_locs.length == 0)
                    getGeoLocs(selected_prov.index());

    }
    
    $('.GeoProvSelect, .GeoLocsSelect').on('focus click', function(){
        checkIfHasProvSelected('.GeoProvSelect', '.GeoLocsSelect');
    });

    checkIfHasProvSelected('.GeoProvSelect', '.GeoLocsSelect');
</script>
