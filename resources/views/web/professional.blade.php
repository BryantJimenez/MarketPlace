@extends('layouts.web')

@section('title', 'Profesionales')

@section('links')
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2-bootstrap.css') }}">
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/web/images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">Profesionales</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 mt-4">
				<div class="nav flex-column">
					<div class="mb-3">
						<p class="h6">Buscar</p>
						<form class="d-flex justify-content-between" action="" method="GET">
							<select class="multiselect form-control" name="buscar" id="searchField">
								<option value="">Buscar</option>
								<option value=""></option>
							</select>
							<button class="btn btn-outline-secondary btn-sm rounded" type="submit"><i class="icon-paper-plane"></i></button>
						</form>
					</div>
					<div class="mb-3">
						<p class="h6">Precio</p>
						<select class="form-control" id="filterPrice">
							<option value="">Seleccione</option>
							<option value="bajo" url="">Precios más bajos</option>
							<option value="alto" url="">Precios más altos</option>
						</select>
					</div>
					<div class="mb-3">
						<p class="h6">Marcas</p>
						<select class="multiselect form-control" id="filterBrand">
							<option value="">Seleccione</option>
						</select>
					</div>
					<div class="mb-3">
						<p class="h6">Categorías</p>
						<select class="multiselect form-control" id="filterCategory">
							<option value="">Seleccione</option>
							<option value="" url=""></option>
						</select>
					</div>
					<div class="mb-3">
						<p class="h6">Distritos</p>
						<select class="multiselect form-control" id="filterDistrict">
							<option value="">Seleccione</option>
							<option value="" url=""></option>
						</select>
					</div>
				</div>
			</div>



			<div class="col-lg-9 col-md-9 mt-4">
				<div class="row">

					<div class="blog-entry align-self-stretch d-md-flex">
						<a href="blog-single.html" class="block-20" style="background-image: url('/web/images/bg_2.jpg');">
						</a>
						<div class="text d-block pl-md-4">
							<h3 class="heading">Nombre del Profesional</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Ver Más</a></p>
						</div>
					</div>

					<div class="blog-entry align-self-stretch d-md-flex">
						<a href="blog-single.html" class="block-20" style="background-image: url('/web/images/bg_2.jpg');">
						</a>
						<div class="text d-block pl-md-4">
							<h3 class="heading">Nombre del Profesional</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Ver Más</a></p>
						</div>
					</div>

					<div class="blog-entry align-self-stretch d-md-flex">
						<a href="blog-single.html" class="block-20" style="background-image: url('/web/images/bg_2.jpg');">
						</a>
						<div class="text d-block pl-md-4">
							<h3 class="heading">Nombre del Profesional</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Ver Más</a></p>
						</div>
					</div>




				</div>
				
			</div>
		</div>
	</div>
</section>

@endsection

