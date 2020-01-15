@extends('layouts.web')

@section('title', $product->name)

@section('links')
<link rel="stylesheet" href="{{ asset('/web/vendors/lightslider/lightslider.css') }}">
<link rel="stylesheet" href="{{ asset('/web/vendors/lightgallery/lightgallery.css') }}">
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
				<ul id="imagesProduct">
					@forelse($product->images as $image)
					<a href="{{ asset('/admins/img/products/'.$image->image) }}">
						<img src="{{ asset('/admins/img/products/'.$image->image) }}" class="img-fluid" alt="{{ $product->name }}">
					</a>
					@empty
					<a href="{{ asset('/admins/img/products/imagen.jpg') }}">
						<img src="{{ asset('/admins/img/products/imagen.jpg') }}" class="img-fluid" alt="{{ $product->name }}">
					</a>
					@endforelse
				</ul>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3>{{ $product->name }}</h3>
				<div class="rating d-flex">
					<p class="text-left mr-4">
						<span class="text-muted">{{ number_format($product->brand->quality, 1, ".", ".") }}</span> <div class="ratings text-warning" data-rate-value="{{ number_format($product->brand->quality, 1, ".", ".") }}"></div>
					</p>
					<p class="text-left mr-4 ml-2">
						<a href="#" class="mr-2" style="color: #000;">0 <span style="color: #bbb;">Valoraciones</span></a>
					</p>
					<p class="text-left">
						<a href="#" class="mr-2" style="color: #000;">0 <span style="color: #bbb;">Vendidos</span></a>
					</p>
				</div>
				<p class="price"><span>{{ 'S/. '.number_format($product->price, 2, ',', '.') }}</span></p>
				<p>{{ $product->description }}</p>
				<div class="row mt-4">
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
				<h2 class="mb-4">Productos Relacionados</h2>
			</div>
		</div>   		
	</div>
	<div class="container">
		<div class="row">

			@foreach($relatedProducts as $product)
			<div class="col-md-6 col-lg-3 ftco-animate">
				@include('web.partials.cardProduct')
			</div>
			@endforeach

		</div>
	</div>
</section>

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/rater/rater.min.js') }}"></script>
<script src="{{ asset('/web/vendors/lightslider/lightslider.js') }}"></script>
<script src="{{ asset('/web/vendors/lightgallery/lightgallery.js') }}"></script>
@endsection