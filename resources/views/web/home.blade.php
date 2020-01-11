@extends('layouts.web')

@section('title', 'Mister Fix')

@section('content')
<section id="home-section" class="hero">
	<div class="home-slider owl-carousel d-block">
		<div class="slider-item" style="background-image: url(/web/images/bg_1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-md-12 ftco-animate text-center">
						<p class="mb-2 h1 text-white">Encuentra el repuesto que tanto necesitas</p>
						<form method="GET" action="{{ route('tienda') }}">
							<div class="row">
								<div class="form-group col-12">
									<input class="form-control" type="text" name="buscar" placeholder="Buscar">
								</div>
								<div class="form-group col-lg-4 col-md-4 col-12">
									<select class="form-control" name="precio">
										<option value="">Precio</option>
										<option value="bajo">Precio más bajo</option>
										<option value="alto">Precio más alto</option>
									</select>
								</div>
								<div class="form-group col-lg-4 col-md-4 col-12">
									<select class="form-control" name="marca">
										<option value="">Marca</option>
										@foreach($brands as $brand)
										<option value="{{ $brand->slug }}">{{ $brand->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-lg-4 col-md-4 col-12">
									<select class="form-control" name="provincia">
										<option value="">Provincia</option>
										@foreach($districts as $district)
										<option value="{{ $district['id'] }}">{{ $district['name'] }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group col-12">
									<input type="submit" value="Buscar" class="btn btn-primary py-3 px-4">
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
						<a href="#" class="btn btn-white">Ofrece</a>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-6 col-12 mb-4">
				<div class="ftco-animate img mb-4 d-flex align-items-end shadow rounded bg-primary">
					<div class="text text-center px-3 py-4">
						<h2 class="mb-2 text-white">Encuentra profesionales listos para atender tus necesidades</h2>
						<a href="#" class="btn btn-white">Encuentra</a>
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
				<div class="carousel-category owl-carousel">

					@foreach($categories as $category)
					<div class="item">
						<a href="{{ route('categoria', ['slugCategory' => $category->slug]) }}"><div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset('/admins/img/categories/'.$category->image) }});">
							<div class="text px-3 py-1">
								<h2 class="mb-0 text-white">{{ $category->name }}</h2>
							</div>
						</div></a>
					</div>
					@endforeach

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
				<div class="carousel-brand owl-carousel">

					@foreach($brands as $brand)
					<div class="item bg-white">
						<a href=""><div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset('/admins/img/brands/'.$brand->image) }}); background-size: 100%;">
							<div class="text px-3 py-1">
								<h2 class="mb-0 text-white">{{ $brand->name }}</h2>
							</div>
						</div></a>
					</div>
					@endforeach

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
						<div class="category-wrap ftco-animate img mb-4 shadow rounded">
							<h2 class="mb-0">{{ $store->name }}</h2>
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
				{{-- <p>Seleccione con seguridad todos los productos que sean de su interés. Le aseguramos que cada uno contiene una alta proporcion de calidad</p> --}}
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="carousel-product owl-carousel">

				@foreach($products as $product)
				<div class="item ftco-animate">
					<div class="product">
						<a href="#" class="img-prod">
							@if(count($product->images)>0)
							<img class="img-fluid" src="{{ asset('/admins/img/products/'.$product->images[0]->image) }}" alt="{{ $product->name }}">
							@else
							<img class="img-fluid" src="{{ asset('/admins/img/products/imagen.jpg') }}" alt="{{ $product->name }}">
							@endif

							@if($product->ofert>0)
							<span class="status">{{ $product->ofert." %" }}</span>
							@endif
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="#">{{ $product->name }}</a></h3>
							<div class="d-flex">
								<div class="pricing">
									@if($product->ofert>0)
									<p class="price"><span class="mr-2 price-dc">{{ "S/. ".number_format($product->price, 2, ',', '.') }}</span><span class="price-sale">{{ "S/. ".number_format($product->price-($product->price*$product->ofert/100), 2, ',', '.') }}</span></p>
									@else
									<p class="price"><span>{{ "S/. ".number_format($product->price, 2, ',', '.') }}</span></p>
									@endif
								</div>
							</div>
							<div class="bottom-area d-flex px-3">
								<div class="m-auto d-flex">
									<a href="{{ route('web.producto', ['slug' => $product->slug]) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
										<span><i class="ion-ios-menu"></i></span>
									</a>
									<a class="buy-now d-flex justify-content-center align-items-center mx-1 addCart" slug="{{ $product->slug }}">
										<span><i class="ion-ios-cart"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>
</section>
@endsection