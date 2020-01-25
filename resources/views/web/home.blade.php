@extends('layouts.web')

@section('title', 'Mister Fix')

@section('links')
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2-bootstrap.css') }}">
@endsection

@section('content')
<section id="home-section" class="hero">
	<div class="home-slider owl-carousel d-block">
		<div class="slider-item" style="background-image: url(/web/images/bg_1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-md-12 py-4 bg-dark-opacity ftco-animate text-center">
						<p class="mb-2 h1 text-white">Encuentra el repuesto que tanto necesitas</p>
						<form method="GET" action="{{ route('tienda') }}">
							<div class="row">
								<div class="input-group col-xl-8 col-lg-8 col-md-8 col-12 mb-2">
									<select class="multiselect form-control" name="buscar" id="searchField">
										<option value="">Buscar</option>
										@foreach($productsSelect as $product)
										<option value="{{ $product['slug'] }}">{{ $product['name'] }}</option>
										@endforeach
									</select>
								</div>
								<div class="input-group col-xl-4 col-lg-4 col-md-4 col-12">
									<select class="multiselect form-control" name="marca">
										<option value="">Marcas</option>
										@foreach($brands as $brand)
										<option value="{{ $brand->slug }}">{{ $brand->name }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group col-12 mt-4">
									<input type="submit" value="Buscar" class="btn btn-primary py-3 px-4" id="sendFilter">
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb mt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-6 col-12 mb-4">
				<div class="ftco-animate img d-flex align-items-end shadow rounded bg-primary">
					<div class="text text-center px-3 py-4">
						<h2 class="mb-2 text-white">¿Quieres ofrecer los productos y servicios de tu tienda o taller?</h2>
						<a href="{{ route('servicios.offer') }}" class="btn btn-white">Ofrece</a>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-6 col-12 mb-4">
				<div class="ftco-animate img mb-4 d-flex align-items-end shadow rounded bg-primary">
					<div class="text text-center px-3 py-4">
						<h2 class="mb-2 text-white">Encuentra profesionales listos para atender tus necesidades</h2>
						<a href="{{ route('servicios') }}" class="btn btn-white">Encuentra</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-category ftco-no-pt">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-left ftco-animate">
				<h2 class="mb-4">Categorías <a href="{{ route('categorias') }}" class="h6 pl-2 text-primary">Ver más</a></h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="carousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						@for($i=0; $i<2; $i++)
						<div class="carousel-item @if($i==0) active @endif">
							<div class="row">
								@for($j=0; $j<3; $j++)
								@isset($categories[3*$i+$j])
								<div class="col-lg-4 col-md-4 col-sm-6 col-12">
									<a href="{{ route('tienda', ['categoria' => $categories[3*$i+$j]->slug]) }}"><div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset('/admins/img/categories/'.$categories[3*$i+$j]->image) }});">
										<div class="text px-3 py-1">
											<h2 class="mb-0 text-white">{{ $categories[3*$i+$j]->name }}</h2>
										</div>
									</div></a>
								</div>
								@endisset
								@endfor
							</div>
						</div>
						@endfor
						<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-category bg-light">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-left ftco-animate">
				<span class="subheading mb-0">Más Populares</span>
				<h2 class="mb-4">Marcas <a href="" class="h6 pl-2 text-primary">Ver más</a></h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="carousel2" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						@for($i=0; $i<2; $i++)
						<div class="carousel-item @if($i==0) active @endif">
							<div class="row">
								@for($j=0; $j<4; $j++)
								@isset($brands[4*$i+$j])
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<a href="{{ route('tienda', ['marca' => $brands[4*$i+$j]->slug]) }}"><div class="category-wrap bg-white ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset('/admins/img/brands/'.$brands[4*$i+$j]->image) }}); background-size: 100%;">
										<div class="text px-3 py-1">
											<h2 class="mb-0 text-white">{{ $brands[4*$i+$j]->name }}</h2>
										</div>
									</div></a>
								</div>
								@endisset
								@endfor
							</div>
						</div>
						@endfor
						<a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section ftco-category">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-left ftco-animate">
				<h2 class="mb-4">Tiendas <a href="" class="h6 pl-2 text-primary">Ver más</a></h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">

					@foreach($stores as $store)
					@if($loop->index==3) @break @endif
					<div class="col-lg-4 col-md-4 col-12">
						<div class="card border-primary mb-3 shadow ftco-animate">
							<div class="card-header bg-transparent border-primary">
								<h4 class="mb-0 text-center">{{ $store->name }}</h4>
							</div>
							<div class="card-body text-primary text-center">
								<h5 class="card-title">Productos</h5>
								<div class="row">
									@forelse($store->products as $product)
									@if($loop->index==3) @break @endif
									<div class="col-lg-4 col-md-6 col-12 @if($loop->index==2) d-none d-lg-block @endif">
										@if(count($product->images)>0)
										<img class="img-100-50" src="{{ asset('/admins/img/products/'.$product->images[0]->image) }}" alt="{{ $product->name }}">
										@else
										<img class="img-100-50" src="{{ asset('/admins/img/products/imagen.jpg') }}" alt="{{ $product->name }}">
										@endif
										<p class="text-truncate">{{ $product->name }}</p>
									</div>
									@empty
									<div class="col-12">
										<p class="text-danger">No hay productos</p>
									</div>
									@endforelse
								</div>
								<a href=" {{ route('ver.tienda', ['slug' => $store->slug]) }} " class="btn btn-primary">Ver Más</a>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-left ftco-animate">
				<span class="subheading">Los Más Destacados</span>
				<h2 class="mb-4">Productos <a href="{{ route('tienda') }}" class="h6 pl-2 text-primary">Ver más</a></h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="carousel3" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						@for($i=0; $i<2; $i++)
						<div class="carousel-item @if($i==0) active @endif">
							<div class="row">
								@for($j=0; $j<4; $j++)
								@isset($products[4*$i+$j])
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									@include('web.partials.cardProduct')
								</div>
								@endisset
								@endfor
							</div>
						</div>
						@endfor
						<a class="carousel-control-prev" href="#carousel3" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carousel3" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script src="{{ asset('/web/vendors/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/web/vendors/select2/es.js') }}"></script>
<script src="{{ asset('/admins/vendors/rater/rater.min.js') }}"></script>
@endsection