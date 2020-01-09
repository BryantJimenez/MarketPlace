@extends('layouts.web')

@section('title', 'Tienda')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/web/images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">Tienda</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				@include('web.partials.filter')
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="row">

					@forelse ($products as $product)
					@if($loop->index>=$offset && $loop->index<$offset+8)
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
					@endif
					@empty
					<p>No hay resultados encontrados</p>
					@endforelse

					<div class="col-12 text-center mt-4 d-flex justify-content-center">
						<div class="block-27">
							{{ $pagination->links() }}
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</section>

@endsection