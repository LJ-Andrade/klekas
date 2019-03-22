<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-dark navbar-shadow">
	<div class="navbar-wrapper">
		<div class="navbar-header">
			<ul class="nav navbar-nav">
				<li class="nav-item mobile-menu hidden-md-up float-xs-left">
					<a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a>
				</li>
				<li class="nav-item"><a href="{{ url('vadmin') }}" class="navbar-brand nav-link">
					<img alt="Vadmin" src="{{ asset('vadmin-ui/app-assets/images/logo/app-logo.png') }}" 
					data-expand="{{ asset('vadmin-ui/app-assets/images/logo/app-logo.png') }}" 
					data-collapse="{{ asset('vadmin-ui/app-assets/images/logo/app-logo-small.png') }}" class="brand-logo"></a></li>
				<li class="nav-item hidden-md-up float-xs-right">
					<a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container">
						<i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i>
					</a>
				</li>
			</ul>
		</div>
		<div class="navbar-container content container-fluid">
			<div id="navbar-mobile" class="collapse navbar-toggleable-sm">
				<ul class="nav navbar-nav">
					<li class="nav-item hidden-sm-down">
						<a id="ToggleMenu" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a>
					</li>
					{{-- <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li> --}}
				</ul>
				<ul class="nav navbar-nav float-xs-right">
					{{--  Messages  --}}
					<li class="dropdown dropdown-notification nav-item">
						<a href="#" data-toggle="dropdown" class="nav-link nav-link-label">
							<i class="ficon icon-mail6"></i>
							@if($newMessages->count() > 0) 
								<span class="tag tag-pill tag-default tag-info tag-default tag-up">
									<span class="MessagesAmmount">{{ $newMessages->count() }} </span>
								</span
							>@endif
						</a>
						<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
							<li class="dropdown-menu-header">
								<h6 class="dropdown-header m-0">
									<span class="grey darken-2">Mensajes</span>
									<span class="notification-tag tag tag-default tag-info float-xs-right m-0">
										<span class="MessagesAmmount">{{ $newMessages->count() }}</span> Nuevos
									</span>
								</h6>
							</li>
							<li class="list-group scrollable-container ps-container ps-theme-dark ps-active-y">
								@foreach($newMessages as $message)
								<a href="javascript:void(0)" class="list-group-item">
									<div class="setMessageAsReaded close-this" data-id="{{ $message->id }}">x</div>
									<div class="media">
										{{--  <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="../../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
										</div>  --}}
										<div class="media-body">
											<h6 class="media-heading">{{ $message->name }}</h6>
											<p class="notification-text font-small-3 text-muted">
												{{ substr(strip_tags($message->message), 0, 250) }}
												@if(strlen(strip_tags($message->message)) > 250)
												...
												@endif
											</p><small>
											<time datetime="" class="media-meta text-muted">{{ $message->created_at->diffForHumans() }}</time></small>
										</div>
									</div>
								</a>
								@endforeach
								{{--  <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
									<div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
								</div>  --}}
								{{--  <div class="ps-scrollbar-y-rail" style="top: 0px; height: 320px; right: 3px;">
									<div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 269px;"></div>
								</div>  --}}
							</li>
							<li class="dropdown-menu-footer">
								<a href="javascript:void(0)" class="setAllMessagesAsReaded dropdown-item text-muted text-xs-center">
									Marcar todos como leídoMarcar todos como leídos
								</a>
							</li>
						</ul>
					</li>
					{{--  Account  --}}
					<li class="dropdown dropdown-user nav-item">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
							<span class="avatar avatar-online">
								<img src="{{ asset('images/users/'.Auth::guard('user')->user()->avatar ) }}" alt="avatar" class="CheckImg">
							</span>
							<span class="user-name">{{ Auth::guard('user')->user()->name }}</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="{{ url('vadmin/users/'.Auth::guard('user')->user()->id) }}"  class="dropdown-item">
								<i class="icon-head"></i> Perfil
							</a>
							<a href="{{ url('vadmin/mensajes_recibidos/*') }}" class="dropdown-item">
								<i class="icon-mail6"></i> Mensajes (<span class="MessagesAmmount">{{ $newMessages->count()}}</span>)
							</a>
							<a href="#" class="dropdown-item">
								<div class="dropdown-divider"></div>
								<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="icon-power3"></i> Desconectar
									<form id="logout-form" action="{{ route('vadmin.logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>	
								</a>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>

<!-- //////////////////////// SIDE MENU /////////////////////////////-->
<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
	<!-- main menu header-->
	{{--<div class="main-menu-header">
		<input type="text" placeholder="Search" class="menu-search form-control round"/>
	</div> --}}
	<!-- / main menu header-->
	<!-- main menu content-->
	<div class="main-menu-content">
	<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
		<li class="nav-item {{ Menu::activeMenu('vadmin') }}"><a href="{{ url('vadmin')}}"><i class="icon-home3"></i><span class="menu-title">Inicio</span></a>
		</li>
		<li class="navigation-header"><span data-i18n="nav.category.support">Gestión de Contenido</span>
			<i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
		</li>
		{{--  Tienda  --}}
		<li class="nav-item has-sub {{ Menu::activeMenu('vadmin-tienda') }}"><a href="#"><i class="icon-cart4"></i><span data-i18n="nav.menu_levels.main" class="menu-title">Tienda</span></a>
			<ul class="menu-content" style="">
				{{-- <li class="{{ Menu::activeMenu('panel-de-control') }}"><a href="{{ route('storeControlPanel') }}" class="menu-item"> Control de Tienda</a></li> --}}
				<li class="has-sub is-shown"><a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">
						<i class="icon-coin-dollar"></i>Métodos de Pago</a>
						<ul class="menu-content" style="">
							<li class="is-shown {{ Menu::activeMenu('payments') }}"><a href="{{ route('payments.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-list"></i> Listado</a></li>
							<li class="is-shown {{ Menu::activeMenu('payments') }}"><a href="{{ route('payments.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-plus-round"></i> Nuevo</a></li>
						</ul>
					</li>
				<li class="has-sub is-shown"><a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">
					<i class="icon-truck"></i>Métodos de Envío</a>
					<ul class="menu-content" style="">
						<li class="is-shown {{ Menu::activeMenu('shippings') }}" ><a href="{{ route('shippings.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
							<i class="icon-list"></i> Listado</a></li>
						<li class="is-shown {{ Menu::activeMenu('shippings') }}"><a href="{{ route('shippings.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
							<i class="icon-plus-round"></i> Nuevo</a></li>
					</ul>
				</li>
			</ul>
		</li>

		{{--  CATALOGO  --}}
		<li class="nav-item has-sub {{ Menu::activeMenu('catalogo') }}"><a href="#"><i class="icon-clipboard"></i>
			<span data-i18n="nav.menu_levels.main" class="menu-title">Catálogo</span></a>
			<ul class="menu-content" style="">
				{{-- New Article --}}
				<li class="{{ Menu::activeMenu('catalogo.create') }}">
					<a href="{{ route('catalogo.create') }}" class="menu-item">
						<i class="icon-plus-round"></i> Nuevo Artículo
					</a>
				</li>
				{{-- Article List --}}
				<li class="@if(app('request')->input('redirect') != 'stock')
					{{ Menu::activeMenu('catalogo') }}
					@endif">
					<a href="{{ route('catalogo.index', ['status' => '1']) }}" class="menu-item">
					<i class="icon-list"></i> Listado</a>
				</li>
				{{-- Article List Paused--}}
				<li class="@if(app('request')->input('redirect') != 'stock')
					{{ Menu::activeMenu('catalogo') }}
					@endif">
					<a href="{{ route('catalogo.index', ['status' => '0']) }}" class="menu-item">
					<i class="icon-list"></i> Pausados</a>
				</li>
				{{-- Article Stock --}}
				{{-- <li class="@if(app('request')->input('redirect') == 'stock') active @endif">
					<a href="{{ route('catalogo.index', ['redirect' => 'stock']) }}" class="menu-item">
						<i class="fas fa-box-open"></i> Stock
					</a>
				</li> --}}
				{{-- Sizes --}}
				<li class="has-sub is-shown {{ Menu::activeMenu('cat_sizes') }}">
					<a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">
						Talles
					</a>
					<ul class="menu-content" style="">
						<li class="is-shown {{ Menu::activeMenu('cat_sizes') }}">
							<a href="{{ route('cat_sizes.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
							<i class="icon-list"></i> Listado
						</a>
						</li>
							<li class="is-shown {{ Menu::activeMenu('cat_sizes') }}">
								<a href="{{ route('cat_sizes.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-plus-round"></i> Nuevo Talle
							</a>
						</li>
					</ul>
				</li>

				{{-- ===============================  --}}
				{{-- Colors --}}
				
				<li class="has-sub is-shown {{ Menu::activeMenu('cat_colors') }}">
					<a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">
						Colores
					</a>
					<ul class="menu-content" style="">
						<li class="is-shown {{ Menu::activeMenu('cat_colors') }}">
							<a href="{{ route('cat_colors.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
							<i class="icon-list"></i> Listado
						</a>
						</li>
							<li class="is-shown {{ Menu::activeMenu('cat_colors') }}">
								<a href="{{ route('cat_colors.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-plus-round"></i> Nuevo Color
							</a>
						</li>
					</ul>
				</li>

				{{-- ===============================  --}}

				{{-- Seasons --}}
				<li class="has-sub is-shown {{ Menu::activeMenu('cat_brands') }}">
					<a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">
						Marcas
					</a>
					<ul class="menu-content" style="">
						<li class="is-shown {{ Menu::activeMenu('cat_brands') }}">
							<a href="{{ route('cat_brands.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-list"></i> Listado
							</a>
						</li>
						<li class="is-shown {{ Menu::activeMenu('cat_brands') }}">
							<a href="{{ route('cat_brands.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-plus-round"></i> Nueva Marca
							</a>
						</li>
					</ul>
				</li>
				{{-- Categories --}}
				<li class="has-sub is-shown">
					<a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">
						Categorías
					</a>
					<ul class="menu-content" style="">
						<li class="is-shown {{ Menu::activeMenu('cat_categorias') }}">
							<a href="{{ route('cat_categorias.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-list"></i> Listado
							</a>
						</li>
						<li class="is-shown {{ Menu::activeMenu('cat_categorias') }}">
							<a href="{{ route('cat_categorias.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-plus-round"></i> Nueva Categoría
							</a>
						</li>
					</ul>
				</li>
				{{-- Tags --}}
				<li class="has-sub is-shown {{ Menu::activeMenu('cat_tags') }}">
					<a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">
						Etiquetas
					</a>
					<ul class="menu-content" style="">
						<li class="is-shown {{ Menu::activeMenu('cat_tags') }}">
							<a href="{{ route('cat_tags.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-list"></i> Listado
							</a>
						</li>
						<li class="is-shown {{ Menu::activeMenu('cat_tags') }}">
							<a href="{{ route('cat_tags.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-plus-round"></i> Nueva Etiqueta
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub is-shown {{ Menu::activeMenu('coupons') }}">
					<a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">
						Cupones
					</a>
					<ul class="menu-content" style="">
						<li class="is-shown {{ Menu::activeMenu('coupons') }}">
							<a href="{{ route('coupons.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-list"></i> Listado
							</a>
						</li>
						<li class="is-shown {{ Menu::activeMenu('coupons') }}">
							<a href="{{ route('coupons.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
								<i class="icon-plus-round"></i> Nuevo Cupón
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>

		{{-- <li class="nav-item has-sub PortfolioLi"><a href="#"><i class="icon-briefcase2"></i><span data-i18n="nav.menu_levels.main" class="menu-title">Portfolio</span></a>
			<ul class="menu-content" style="">
				<li class="PortfolioList"><a href="{{ route('portfolio.index') }}" class="menu-item"><i class="icon-list"></i> Listado</a></li>
				<li class="PortfolioNew"><a href="{{ route('portfolio.create') }}" class="menu-item"><i class="icon-plus-round"></i> Nuevo Artículo</a></li>
				<li class="has-sub is-shown PortfolioCategoriesLi"><a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">Categorías</a>
					<ul class="menu-content" style="">
						<li class="is-shown PortfolioCategoriesList"><a href="{{ route('categories.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-list"></i> Listado</a></li>
						<li class="is-shown PortfolioCategoriesNew"><a href="{{ route('categories.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-plus-round"></i> Nueva Categoría</a></li>
					</ul>
				</li>
				<li class="has-sub is-shown PortfolioTagsLi"><a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">Etiquetas</a>
					<ul class="menu-content" style="">
						<li class="is-shown PortfolioTagsList"><a href="{{ route('tags.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-list"></i> Listado</a></li>
						<li class="is-shown PortfolioTagsNew"><a href="{{ route('tags.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-plus-round"></i> Nueva Etiqueta</a></li>
					</ul>
				</li>
			</ul>
		</li> --}}
		{{--  
		<li class="nav-item"><a href="#"><i class="icon-cog"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Administración</span></a>
			<ul class="menu-content" style="">
			</ul>
		</li>  --}}
		<li class="navigation-header"><span data-i18n="nav.category.support">Administración</span>
			<i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
		</li>
		<li class="has-sub is-shown {{ Menu::activeMenu('orders') }}">
			<a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">
				<i class="icon-download"></i> Pedidos 
				@if($newOrders > 0) <span class="green">&bull;</span> @endif
				@if($activeOrders > 0) <span class="blue">&bull;</span> @endif
			</a>
			<ul class="menu-content">
				<li class="is-shown {{ Menu::activeMenu('active-carts') }}">
					<a href="{{ route('orders.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
						<i class="icon-plus"></i> 
						Cargar Pedido
					</a>
				</li>
				<li class="is-shown {{ Menu::activeMenu('orders') }}">
					<a href="{{ route('orders.index', ['status' => 'Process']) }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-list"></i> 
						Nuevos
						@if($newOrders > 0)
							<span class="green">&bull;</span>
						@endif
					</a>
				</li>
				<li class="is-shown {{ Menu::activeMenu('orders') }}">
						<a href="{{ route('orders.index', ['status' => 'Finished']) }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-list"></i> 
							Finalizados
					</a>
				</li>
				<li class="is-shown {{ Menu::activeMenu('orders') }}">
					<a href="{{ route('orders.index', ['status' => 'Canceled']) }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-list"></i> 
						Cancelados
					</a>
				</li>
				<li class="is-shown {{ Menu::activeMenu('active-carts') }}">
					<a href="{{ route('orders.index', ['status' => 'Active']) }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
						<i class="icon-list"></i> 
						Comprando
						@if($activeOrders > 0)
						<span class="blue">&bull;</span>
						@endif
					</a>
				</li>
				<li class="is-shown {{ Menu::activeMenu('orders') }}">
					<a href="{{ route('orders.index', ['status' => 'All']) }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-list"></i> 
						Ver Todos
					</a>
				</li>
			</ul>
		</li>
		<li class="has-sub is-shown {{ Menu::activeMenu('customers') }}">
			<a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item"><i class="icon-users2"></i>
				Clientes @if($newResellers > 0) <span class="green">&bull;</span> @endif
			</a>
			<ul class="menu-content">
				<li class="is-shown {{ Menu::activeMenu('customers') }}">
					<a href="{{ route('customers.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
						Listado
					</a>
				</li>
				<li><a href="{{ route('customers.index', ['group' => '3', 'status' => '0']) }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
					Esperando aprobación @if($newResellers > 0) <span class="green">&bull;</span> @endif
					</a>
				</li>
				<li class="is-shown {{ Menu::activeMenu('customers') }}">
					<a href="{{ route('customers.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">
						<i class="icon-plus-round"></i> Crear Cliente
					</a>
				</li>
			</ul>
		</li>
		@if(Auth::guard('user')->user()->role <= 2)
		<li class="has-sub is-shown {{ Menu::activeMenu('users') }}"><a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item"><i class="icon-user-tie"></i>	Usuarios</a>
			<ul class="menu-content">
				<li class="is-shown {{ Menu::activeMenu('users') }}"><a href="{{ route('users.index') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-list"></i> Listado</a></li>
				<li class="is-shown {{ Menu::activeMenu('users') }}"><a href="{{ route('users.create') }}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-plus-round"></i> Nuevo Usuario</a></li>
			</ul>
		</li>
		@endif
		{{-- MESSAGES --}}
		{{-- <li class="{{ Menu::activeMenu('mensajes_recibidos') }}"><a href="{{ url('vadmin/mensajes_recibidos/*') }}" class="menu-item"><i class="icon-envelop"></i> Mensajes 
			@if($newMessages->count() > 0) 
				<span class="tag tag-primary tag-pill float-xs-right mr-2"><span class="MessagesAmmount">{{ $newMessages->count() }}</span></span>
			@endif
		</a></li> --}}
		{{-- SETTINGS --}}
		<li class="{{ Menu::activeMenu('configuracion') }}"><a href="{{ route('vadmin.settings') }}" class="menu-item">
			<i class="fas fa-sliders-h"></i> Configuracion 
		</a></li>
		{{-- TESTS --}}
		<li class="{{ Menu::activeMenu('tests') }}"><a href="{{ route('vadmin.tests') }}" class="menu-item">
			<i class="fas fa-sliders-h"></i> Tests 
		</a></li>
		{{-- Public sections --}}
		<li class="navigation-header"><span data-i18n="nav.category.support">Secciones Públicas</span>
			<i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
		</li>
		<li class="nav-item"><a href="{{ url('/') }}" target="_blank"><i class="icon-feed"></i><span class="menu-title">Web</span></a></li>
		<li class="nav-item"><a href="{{ url('/tienda') }}" target="_blank"><i class="icon-cart4"></i><span class="menu-title">Tienda</span></a></li>
		{{-- Tools --}}
		{{-- <li class="navigation-header"><span data-i18n="nav.category.support">Herramientas</span>
			<i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
		</li>
		<li class="nav-item"><a href="{{ route('vadmin.mailChecker') }}" target="_blank"><i class="icon-feed"></i><span class="menu-title">MailChecker</span></a></li>
		<li class="nav-item"><a href="{{ route('vadmin.configs') }}" target="_blank"><i class="icon-feed"></i><span class="menu-title">Configuraciones</span></a></li> --}}

		<li class="navigation-header"><span data-i18n="nav.category.support">Ayuda</span>
			<i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
		</li>
		<li class="nav-item {{ Menu::activeMenu('help') }}"><a href="{{ url('vadmin/help') }}">
			<i class="icon-support"></i><span class="menu-title">Soporte</span></a>
		</li>
		<li class="nav-item {{ Menu::activeMenu('docs') }}"><a href="{{ url('vadmin/docs') }}">
			<i class="icon-document-text"></i><span class="menu-title">Sobre Vadmin</span></a>
		</li>
	</ul>
	</div>
	<!-- /main menu content-->
	<!-- main menu footer-->
	<!-- include includes/menu-footer-->
	<!-- main menu footer-->
</div>
<!-- / main menu-->