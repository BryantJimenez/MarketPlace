@extends('layouts.web')

@section('title', 'Pedidos')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/web/images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">Pedidos Realizados</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>Cantidad de Productos</th>
								<th>Monto</th>
								<th>Tienda</th>
								<th>Fecha</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr class="text-center">
								<td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

								<td class="product-name">
									<h3>Cantidad de Productos</h3>
								</td>

								<td class="price">Precio</td>

								<td class="quantity">
									Nombre de la Tienda
								</td>

								<td class="total">
									Fecha d/m/a
								</td>

								<td> <div class="form-group d-flex">
									<input type="button" value="Modificar" class="submit px-3">
								</div></td>
							</tr><!-- END TR-->

							<tr class="text-center">
								<td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

								<td class="product-name">
									<h3>Cantidad de Productos</h3>
								</td>

								<td class="price">Precio</td>

								<td class="quantity">
									Nombre de la Tienda
								</td>

								<td class="total">
									Fecha d/m/a
								</td>

								<td> <div class="form-group d-flex">
									<input type="button" value="Vre Más" class="submit px-3">
								</div></td>
							</tr><!-- END TR-->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url('/web/images/bg_2.jpg');">
	<div class="container">
		<div class="row justify-content-center py-5">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number">0</strong>
								<span>Productos Solicitados</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" >0</strong>
								<span>Tiendas seleccionadas</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row no-gutters ftco-services">
			<div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-shipped"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Compra libre</h3>
						<span>Ordena lo que necesites, aqui y ahora</span>
					</div>
				</div>      
			</div>
			<div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-award"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Precios de Calidad</h3>
						<span>Productos de Calidad</span>
					</div>
				</div>      
			</div>
			<div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-customer-service"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Soporte</h3>
						<span>Profesionales en el área que necesitas</span>
					</div>
				</div>      
			</div>
		</div>
	</div>
</section>



@endsection