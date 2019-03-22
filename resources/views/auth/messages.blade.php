{{-- Messages --}}
@if(Session::has('message'))
    <div class="container login-messages">
        <a href="#" class="close" onClick="closeParent(this)" aria-label="close">&times;</a> 
        {{ Session::get('message') }}
    </div>
@endif