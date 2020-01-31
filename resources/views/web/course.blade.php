@extends('layouts.web')

@section('title', 'Talleres')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/web/images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread"> Talleres</h1>
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
					<div class="col-lg-4 col-md-4 mt-4">
						<div class="card text-center" style="width: 17rem; margin-top: 70px;">
							<img style="height: 200px; width: 250px; background-color: #EFEFEF; margin: 20px;" class="card-img-top  mx-auto d-block" src="/web/images/bg_2.jpg" alt="">
							<div class="card-body">
								<h5 class="card-title">Nombre del Taller</h5>
								<div class="col-sm">
									<p class="card-text">Decsripción.</p>
									<a href="#" class="btn btn-primary">Ver Más...</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 mt-4">
						<div class="card text-center" style="width: 17rem; margin-top: 70px;">
							<img style="height: 200px; width: 250px; background-color: #EFEFEF; margin: 20px;" class="card-img-top  mx-auto d-block" src="/web/images/bg_2.jpg" alt="">
							<div class="card-body">
								<h5 class="card-title">Nombre del Taller</h5>
								<div class="col-sm">
									<p class="card-text">Decsripción.</p>
									<a href="#" class="btn btn-primary">Ver Más...</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 mt-4">
						<div class="card text-center" style="width: 17rem; margin-top: 70px;">
							<img style="height: 200px; width: 250px; background-color: #EFEFEF; margin: 20px;" class="card-img-top  mx-auto d-block" src="/web/images/bg_2.jpg" alt="">
							<div class="card-body">
								<h5 class="card-title">Nombre del Taller</h5>
								<div class="col-sm">
									<p class="card-text">Decsripción.</p>
									<a href="#" class="btn btn-primary">Ver Más...</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 mt-4">
						<div class="card text-center" style="width: 17rem; margin-top: 70px;">
							<img style="height: 200px; width: 250px; background-color: #EFEFEF; margin: 20px;" class="card-img-top  mx-auto d-block" src="/web/images/bg_2.jpg" alt="">
							<div class="card-body">
								<h5 class="card-title">Nombre del Taller</h5>
								<div class="col-sm">
									<p class="card-text">Decsripción.</p>
									<a href="#" class="btn btn-primary">Ver Más...</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 mt-4">
						<div class="card text-center" style="width: 17rem; margin-top: 70px;">
							<img style="height: 200px; width: 250px; background-color: #EFEFEF; margin: 20px;" class="card-img-top  mx-auto d-block" src="/web/images/bg_2.jpg" alt="">
							<div class="card-body">
								<h5 class="card-title">Nombre del Taller</h5>
								<div class="col-sm">
									<p class="card-text">Decsripción.</p>
									<a href="#" class="btn btn-primary">Ver Más...</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 mt-4">
						<div class="card text-center" style="width: 17rem; margin-top: 70px;">
							<img style="height: 200px; width: 250px; background-color: #EFEFEF; margin: 20px;" class="card-img-top  mx-auto d-block" src="/web/images/bg_2.jpg" alt="">
							<div class="card-body">
								<h5 class="card-title">Nombre del Taller</h5>
								<div class="col-sm">
									<p class="card-text">Decsripción.</p>
									<a href="#" class="btn btn-primary">Ver Más...</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</section>
@endsection