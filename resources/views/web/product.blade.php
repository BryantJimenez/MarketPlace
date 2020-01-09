@extends('layouts.web')

@section('title', $product->name)

@section('links')
<link rel="stylesheet" href="{{ asset('/web/vendors/lightslider/lightslider.css') }}">
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/web/images/bg_1.jpg') }}');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Inicio</a></span> <span class="mr-2"><a href="{{ route('tienda') }}">Tienda</a></span> <span>{{ $product->name }}</span></p>
				<h1 class="mb-0 bread">Producto</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="images/product-1.jpg" class="image-popup"><img src="{{ asset('/web/images/product-1.jpg') }}" class="img-fluid" alt="Colorlib Template"></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3>{{ $product->name }}</h3>
				<div class="rating d-flex">
					<p class="text-left mr-4">
						<a href="#" class="mr-2">5.0</a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
					</p>
					<p class="text-left mr-4">
						<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
					</p>
					<p class="text-left">
						<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
					</p>
				</div>
				<p class="price"><span>{{ 'S/. '.number_format($product->price, 2, '.', ',') }}</span></p>
				<p>{{ $product->description }}</p>
				<div class="row mt-4">
					<div class="col-md-6">
						<div class="form-group d-flex">
							<div class="select-wrap">
								<div class="icon"><span class="ion-ios-arrow-down"></span></div>
								<select name="" id="" class="form-control">
									<option value="">Small</option>
									<option value="">Medium</option>
									<option value="">Large</option>
									<option value="">Extra Large</option>
								</select>
							</div>
						</div>
					</div>
					<div class="w-100"></div>
					<div class="input-group col-md-6 d-flex mb-3">
						<span class="input-group-btn mr-2">
							<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
								<i class="ion-ios-remove"></i>
							</button>
						</span>
						<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
						<span class="input-group-btn ml-2">
							<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
								<i class="ion-ios-add"></i>
							</button>
						</span>
					</div>
					<div class="w-100"></div>
					<div class="col-md-12">
						<p style="color: #000;">600 kg available</p>
					</div>
				</div>
				<p><a class="btn btn-black py-3 px-5">Agregar al Carrito</a></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Productos</span>
				<h2 class="mb-4">Productos Relacionados</h2>
			</div>
		</div>   		
	</div>
	<div class="container">
		<div class="row">

			@foreach($relatedProducts as $product)
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

@section('scripts')
<script src="{{ asset('/web/vendors/lightslider/lightslider.js') }}"></script>
@endsection