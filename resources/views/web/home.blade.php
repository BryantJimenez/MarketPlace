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
									<input class="form-control" type="text" name="search" placeholder="Buscar">
								</div>
								<div class="form-group col-lg-4 col-md-4 col-12">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">S/.</span>
										</div>
										<input class="form-control" type="text" name="min" placeholder="Min">
										<input class="form-control" type="text" name="max" placeholder="Max">
									</div>
								</div>
								<div class="form-group col-lg-4 col-md-4 col-12">
									<select class="form-control" name="quality">
										<option value="">Calidad</option>
										<option value="1">Baja</option>
										<option value="2">Media</option>
										<option value="3">Alta</option>
									</select>
								</div>
								<div class="form-group col-lg-4 col-md-4 col-12">
									<select class="form-control" name="province">
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

{{-- <section class="ftco-section">
	<div class="container">
		<div class="row no-gutters ftco-services">
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-shipped"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Free Shipping</h3>
						<span>On order over $100</span>
					</div>
				</div>      
			</div>
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-diet"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Always Fresh</h3>
						<span>Product well package</span>
					</div>
				</div>    
			</div>
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-award"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Superior Quality</h3>
						<span>Quality Products</span>
					</div>
				</div>      
			</div>
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-customer-service"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Support</h3>
						<span>24/7 Support</span>
					</div>
				</div>      
			</div>
		</div>
	</div>
</section> --}}

<section class="ftco-section ftco-category ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Categorías</h2>
			</div>
		</div>   		
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">

					@foreach($categories as $category)
					<div class="col-md-3">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset('/admins/img/categories/'.$category->image) }});">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">{{ $category->name }}</a></h2>
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
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Productos Destacados</span>
				<h2 class="mb-4">Productos</h2>
				<p>Seleccione con seguridad todos los productos que sean de su interés. Le aseguramos que cada uno contiene una alta proporcion de calidad</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">

			@foreach($products as $product)
			<div class="col-md-6 col-lg-3 ftco-animate">
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
</section>

@endsection