<script>

    /*
    |--------------------------------------------------------------------------
    | Laravel Token
    |--------------------------------------------------------------------------
    */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*
    |--------------------------------------------------------------------------
    | ALERTS - IziToast (http://izitoast.marcelodolce.com/)
    |--------------------------------------------------------------------------
    */
    // Positions:  bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter or center.
    
    function toast_success(title, text, position, action, time){
        iziToast.show({
            title: title,
            message: text,
            position: position,
            messageSize: '1.5rem',
            color: 'green',
            timeout: time,
            onClosing: function () {
                switch(action) {
                    case 'reload':
                        location.reload();
                        break;
                    default:
                        // console.log('No action');
                        break;
                }
            },
        });
    }

    function toast_error(title, text, position, action, time){
        iziToast.show({
            title: title,
            message: text,
            position: position,
            color: 'red',
            timeout: time,
            onClosing: function () {
                switch(action) {
                    case 'reload':
                        location.reload();
                        break;
                    case 'none':
                        // console.log('No action');
                        break;
                    default:
                        
                        break;
                }
            },
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Customer Avatar
    |--------------------------------------------------------------------------
    */

    $(document).ready(function() {
        $('#UpdateCustomerAvatarBtn').click(function(){
            $('#CustomerAvatarInput').click();
        });       
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.Image-Container').attr('src', e.target.result);
            }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#CustomerAvatarInput").change(function(){
        readURL(this);
        $('#ConfirmChange').removeClass('Hidden');
    });
    
    $('.CheckImg').on('error', function(){
        var defaultImg = "{{ asset('images/users/default.jpg') }}"
        $(this).attr('src', defaultImg);
    });		
</script>