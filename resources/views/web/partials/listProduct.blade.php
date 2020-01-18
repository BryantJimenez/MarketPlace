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
				<a href="{{ route('comprar', ['slug' => $product->slug]) }}" class="btn btn-primary btn-sm mb-lg-2 mb-md-2">Comprar</a>
				<button type="button" class="btn btn-primary btn-sm mb-lg-2 mb-md-2 addCartList" slug="{{ $product->slug }}">Carrito</button>
				<a href="#" class="btn btn-primary btn-sm">Entrega</a>
			</div>
		</div>
	</div>
</div>