<script>

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */

    $('.setMessageAsReaded').click(function(e){
        e.stopPropagation()
        let id = $(this).data('id');
        let display = $(this).parent();
        setMessageAsReaded(id, false, display);
    });

    $('.setAllMessagesAsReaded').click(function(e){
        e.stopPropagation();
        setMessageAsReaded(null, true, null);
    });

    
    function setMessageAsReaded(id, allReaded, display){
        var route  = "{{ url('vadmin/setMessageAsReaded') }}";
        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'JSON',
            data: { id: id },
            success: function(data){
                if(data.response == true){
                    // Hide Message and Number of Messages displays
                    if(allReaded == false){
                        display.hide(500);
                    } else if(allReaded == true){
                        location.reload();
                    }
                    $('.MessagesAmmount').html(data.newMessagesN);   
                }
            },
            error: function(data){
                console.log(data);
                $('#Error').html(data.responseText);
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Loaders
    |--------------------------------------------------------------------------
    */
    
    function fullLoader(action)
    {
        //let loader = $(this).parent().html("<img src='{{ asset('images/gral/loader-sm.svg') }}'>");
        if(action == "show"){
            $('#FullLoader').removeClass('Hidden');
        }
        if(action == "hide"){
            $('#FullLoader').addClass('Hidden');
        }
            
    }

</script>