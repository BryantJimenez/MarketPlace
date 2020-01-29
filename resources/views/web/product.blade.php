@extends('layouts.web')

@section('title', $product->name)

@section('links')
<link rel="stylesheet" href="{{ asset('/web/vendors/lightslider/lightslider.css') }}">
<link rel="stylesheet" href="{{ asset('/web/vendors/lightgallery/lightgallery.css') }}">
@endsection

@section('content')

<section class="ftco-section pt-5 pb-0 bg-light">
	<div class="container">
		<div class="row d-flex">
			<div class="col-lg-7 order-lg-1 order-xl-1 product-details pl-md-5 ftco-animate">
				<h3>{{ $product->name }}</h3>
				<div class="rating d-flex">
					<p class="text-left mr-4">
						<span class="text-muted">{{ number_format($product->brand->quality, 1, ".", ".") }}</span> <div class="ratings text-warning" data-rate-value="{{ number_format($product->brand->quality, 1, ".", ".") }}"></div>
					</p>
					<p class="text-left ml-2 mr-2 text-black">0 <span class="text-muted">Vendidos</span></p>
				</div>
				<p class="price h4 text-primary">{{ 'S/. '.number_format($product->price, 2, ',', '.') }}</p>
				<p class="text-left mr-2 text-muted">{{ $product->qty }} Disponibles</p>
				<div class="row">
					<div class="col-12">
						<p>Categoría: {{ $product->subcategory->category->name }}</p>
					</div>
					<div class="col-12">
						<p>Subcategoría: {{ $product->subcategory->name }}</p>
					</div>
					<div class="col-12">
						<p>Marca: {{ $product->brand->name }}</p>
					</div>
				</div>
				
				<p><a href="{{ route('comprar.product', ['slug' => $product->slug]) }}" class="btn btn-primary py-2 px-3">Comprar</a></p>
			</div>
			<div class="col-lg-5 mb-5 ftco-animate order-lg-0 order-xl-0">
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
			<div class="col-12 order-lg-2 order-xl-2">
				<p class="h3">Descripción</p>
				<p>{!! $product->description !!}</p>
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
			<div class="col-md-12">
				<div class="row">
					@foreach($products as $relatedProduct)

					<div class="col-lg-3 col-md-4 col-6">
						<div class="product">
							<a href="{{ route('web.producto', ['slug' => $relatedProduct->slug]) }}" class="img-prod">
								{!! imageCardProduct($relatedProduct) !!}

								@if($relatedProduct->ofert>0)
								<span class="status">{{ $relatedProduct->ofert." %" }}</span>
								@endif
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="{{ route('web.producto', ['slug' => $relatedProduct->slug]) }}">{{ $relatedProduct->name }}</a></h3>
								<div class="d-flex">
									<div class="pricing">
										{!! productPrice($relatedProduct) !!}
										<div class="distance" lat="{{ $relatedProduct->stores[0]->lat }}" lng="{{ $relatedProduct->stores[0]->lng }}"></div>
										<div class="row">
											<div class="col-5 text-right ">
												<span class="text-muted">{{ number_format($relatedProduct->brand->quality, 1, ".", ".") }}</span>
											</div>
											<div class="col-7">
												<div class="ratings text-warning" data-rate-value="{{ number_format($relatedProduct->brand->quality, 1, ".", ".") }}"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										<a href="{{ route('web.producto', ['slug' => $relatedProduct->slug]) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-menu"></i></span>
										</a>
										<a href="{{ route('comprar.product', ['slug' => $relatedProduct->slug]) }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="icon-shopping-bag"></i></span>
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
	</div>
</section>

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/rater/rater.min.js') }}"></script>
<script src="{{ asset('/web/vendors/lightslider/lightslider.js') }}"></script>
<script src="{{ asset('/web/vendors/lightgallery/lightgallery.js') }}"></script>
@endsection