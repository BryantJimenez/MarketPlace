@extends('layouts.web')

@section('title', 'Ofrecer Servicios')

@section('content')

<section class="ftco-section pt-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-6 col-6 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded position-relative">
					<img src="{{ asset('/web/images/tiendas.png') }}" class="img-fluid w-100" style="height: 300px;">
					<div class="card-img-overlay bg-dark-opacity"></div>
					<div class="text text-center card-img-overlay">
						<h2 class="mb-2 text-white">Profesionales</h2>
						<a href="{{ route('pro.index') }}" class="btn btn-white">Ingresar</a>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-6 col-6 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded position-relative">
					<img src="{{ asset('/web/images/profesional.jpg') }}" class="img-fluid w-100" style="height: 300px;">
					<div class="card-img-overlay bg-dark-opacity"></div>
					<div class="text text-center card-img-overlay">
						<h2 class="mb-2 text-white">Capacitaciones</h2>
						<a href="{{ route('cap.create') }}" class="btn btn-white">Ingresar</a>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-6 col-6 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded position-relative">
					<img src="{{ asset('/web/images/capacitar.jpg') }}" class="img-fluid w-100" style="height: 300px;">
					<div class="card-img-overlay bg-dark-opacity"></div>
					<div class="text text-center card-img-overlay">
						<h2 class="mb-2 text-white">Auxilio Mecánico</h2>
						<a href="{{ route('cap.index') }}" class="btn btn-white">Ingresar</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-6 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded position-relative">
					<img src="{{ asset('/web/images/capacitar.jpg') }}" class="img-fluid w-100" style="height: 300px;">
					<div class="card-img-overlay bg-dark-opacity"></div>
					<div class="text text-center card-img-overlay">
						<h2 class="mb-2 text-white">Talleres</h2>
						<a href="{{ route('cap.index') }}" class="btn btn-white">Ingresar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection