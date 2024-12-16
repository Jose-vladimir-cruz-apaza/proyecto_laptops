<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="/css/main.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
</head>
<body>
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">		
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				Mabb Laptops <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="/assets/img/avatar.png" alt="UserIcon">
					<figcaption class="text-center text-titles">{{ Auth::user()->name }}</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">					
					{{-- <li>
						<a href="#!" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li> --}}
					<li>
						<a href="#!" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>					
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>															
				</ul>
			</div>
			
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href={{route('products.index')}}>
						<i class="zmdi zmdi-shopping-cart zmdi-hc-fw"></i>Productos
					</a>
				</li>	
				<li>
					<a href={{route('categories.index')}}>
						<i class="zmdi zmdi-view-module zmdi-hc-fw"></i> Categorias
					</a>
				</li>
				<li>
					<a href={{route('orders.index')}}>
						<i class="zmdi zmdi-shopping-basket zmdi-hc-fw"></i> Pedidos
					</a>
				</li>
				<li>
					<a href={{route('order_details.index')}}>
						<i class="zmdi zmdi-file-text zmdi-hc-fw"></i> Detalles Pedidos
					</a>
				</li>	
				<li>
					<a href={{route('cart.index')}}>
						<i class="zmdi zmdi-shopping-cart zmdi-hc-fw"></i> Carrito de compras
					</a>
				</li>
				<li>
					<a href={{route('users.index')}}>
						<i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios
					</a>
				</li>														
			</ul>
		</div>
	</section>
	<section class="full-box dashboard-contentPage">	
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				
			</ul>
		</nav>