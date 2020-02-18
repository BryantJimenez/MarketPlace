@extends('layouts.web')

@section('title', 'Ofrecer Servicios')

@section('content')

<section class="ftco-section pt-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded position-relative">
					<img src="{{ asset('/web/images/tiendas.png') }}" class="img-fluid w-100" style="height: 300px;">
					<div class="card-img-overlay bg-dark-opacity"></div>
					<div class="text text-center card-img-overlay">
						<h2 class="mb-2 text-white">Registra tu tienda para que puedas vender tus productos</h2>
						<a href="{{ route('servicios.offer.shop') }}" class="btn btn-white">Ingresar</a>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded position-relative">
					<img src="{{ asset('/web/images/taller.jpg') }}" class="img-fluid w-100" style="height: 300px;">
					<div class="card-img-overlay bg-dark-opacity"></div>
					<div class="text text-center card-img-overlay">
						<h2 class="mb-2 text-white">Registra tu taller para que ofrezcas tus servicios</h2>
						<a href="{{ route('servicios.offer.workshop') }}" class="btn btn-white">Ingresar</a>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded position-relative">
					<img src="{{ asset('/web/images/profesional.jpg') }}" class="img-fluid w-100" style="height: 300px;">
					<div class="card-img-overlay bg-dark-opacity"></div>
					<div class="text text-center card-img-overlay">
						<h2 class="mb-2 text-white">Ofrece tus servicios como mecanico profesional</h2>
						<a href="{{ route('cap.create') }}" class="btn btn-white">Ingresar</a>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded position-relative">
					<img src="{{ asset('/web/images/capacitar.jpg') }}" class="img-fluid w-100" style="height: 300px;">
					<div class="card-img-overlay bg-dark-opacity"></div>
					<div class="text text-center card-img-overlay">
						<h2 class="mb-2 text-white">Capacita a otros en diversas áreas de la mecánica</h2>
						<a href="{{ route('cap.create') }}" class="btn btn-white">Ingresar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection