<!-- Topbar-->
<div class="topbar">
	<div class="topbar-column">
		<a class="">&nbsp;<b>+ 54 9 11 3826 4084 Guadalupe </b></a>
		<a class="">&nbsp;<b>+ 54 9 11 3826 4084 Guadalupe </b></a>
		<a class="e-mail-field" href="mailto:somosklekas@gmail.com">
			<i class="icon-mail"></i>&nbsp; somosklekas@gmail.com
		</a>
		
	</div>
	<div class="topbar-column">
		<a class="social-button sb-facebook shape-none sb-dark" href="https://www.facebook.com/klekas/" target="_blank">
			<i class="socicon-facebook"></i>
		</a>
		<a class="social-button sb-instagram shape-none sb-dark" href="https://www.instagram.com/klekas/" target="_blank">
			<i class="socicon-instagram"></i>
		</a>
		@if(Auth::guard('customer')->check())
			<button onclick="checkoutSidebar('show')" class="icon-btn-small"|><i class="fas fa-shopping-cart"></i></button>
		@endif
	</div>
</div>