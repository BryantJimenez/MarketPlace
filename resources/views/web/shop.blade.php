@extends('layouts.web')

@section('title', 'Tienda')

@section('links')
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2-bootstrap.css') }}">
@endsection

@section('content')
<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row">
			@if(count($products)>0 && strpos(url()->full(), '?')===true)
			<div class="col-12 mt-5">
				<p class="h5">La tienda más cercana para encontrar el respuesto que busca es: <a href="#" class="text-primary">{{ $products[0]->stores[0]->name }}</a></p>
			</div>
			@endif
			<div class="col-lg-3 col-md-3 mt-4">
				@include('web.partials.filter')
			</div>
			<div class="col-lg-9 col-md-9 mt-4">
				<div class="row">

					@forelse ($products as $product)
					@if($loop->index>=$offset && $loop->index<$offset+8)
					<div class="col-12 ftco-animate">
						<div class="card mb-3">
							<div class="row no-gutters">
								<div class="col-lg-3 col-md-3 col-12">
									<a href="{{ route('web.producto', ['slug' => $product->slug]) }}">
										{!! imageCardProduct($product, 1) !!}
									</a>
								</div>
								<div class="col-lg-7 col-md-6 col-12">
									<div class="card-body">
										<h5 class="card-title mb-0 d-flex"><a href="{{ route('web.producto', ['slug' => $product->slug]) }}">{{ $product->name }}</a> <div class="distance ml-2" lat="{{ $product->stores[0]->lat }}" lng="{{ $product->stores[0]->lng }}"></div></h5>
										<div class="ratings text-warning" data-rate-value="{{ number_format($product->brand->quality, 1, ".", ".") }}"></div>
										<p class="card-text mb-0">Marca: {{ $product->brand->name }}</p>
										<p class="card-text text-truncate">{{ $product->description }}</p>
										<p class="card-text"><small class="text-muted"><i class="icon-home"></i> {{ $product->stores[0]->name }} - <i class="icon-map-marker"></i> {{ $product->stores[0]->district->name }}</small></p>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-12">
									<div class="card-body">
										{!! productPrice($product) !!}
										<a href="#" class="btn btn-primary btn-sm mb-lg-2 mb-md-2">Comprar</a>
										<button type="button" class="btn btn-primary btn-sm mb-lg-2 mb-md-2 addCartList" slug="{{ $product->slug }}">Carrito</button>
										<a href="#" class="btn btn-primary btn-sm">Entrega</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					@empty
					<div class="col-12 text-center">
						<p class="h3 text-danger">No hay resultados encontrados</p>
					</div>
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

@section('script')
<script src="{{ asset('/web/vendors/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/web/vendors/select2/es.js') }}"></script>
<script src="{{ asset('/admins/vendors/rater/rater.min.js') }}"></script>
@endsection