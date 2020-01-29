@extends('layouts.web')

@section('title', 'Servicios')

@section('content')

<section class="ftco-section pt-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-lg-4 col-12 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded position-relative">
					<img src="{{ asset('/web/images/tiendas.png') }}" class="img-fluid w-100" style="height: 300px;">
					<div class="card-img-overlay bg-dark-opacity"></div>
					<div class="text text-center card-img-overlay">
						<h2 class="mb-2 text-white">Registra tu tienda para que puedas vender tus productos</h2>
						<a href="#" class="btn btn-white">Registrar</a>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-4 col-12 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded position-relative">
					<img src="{{ asset('/web/images/profesional.jpg') }}" class="img-fluid w-100" style="height: 300px;">
					<div class="card-img-overlay bg-dark-opacity"></div>
					<div class="text text-center card-img-overlay">
						<h2 class="mb-2 text-white">Ofrece tus servicios como profesional en áreas mecanicas</h2>
						<a href="#" class="btn btn-white">Ofrecer</a>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-4 col-12 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded position-relative">
					<img src="{{ asset('/web/images/capacitar.jpg') }}" class="img-fluid w-100" style="height: 300px;">
					<div class="card-img-overlay bg-dark-opacity"></div>
					<div class="text text-center card-img-overlay">
						<h2 class="mb-2 text-white">Quieres dar capacitaciones sobre temas ?</h2>
						<a href="#" class="btn btn-white">Capacitar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection