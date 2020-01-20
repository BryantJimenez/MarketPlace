<div class="product">
	<a href="{{ route('web.producto', ['slug' => $product->slug]) }}" class="img-prod">
		{!! imageCardProduct($product) !!}

		@if($product->ofert>0)
		<span class="status">{{ $product->ofert." %" }}</span>
		@endif
		<div class="overlay"></div>
	</a>
	<div class="text py-3 pb-4 px-3 text-center">
		<h3><a href="{{ route('web.producto', ['slug' => $product->slug]) }}">{{ $product->name }}</a></h3>
		<div class="d-flex">
			<div class="pricing">
				{!! productPrice($product) !!}
				<div class="distance" lat="{{ $product->stores[0]->lat }}" lng="{{ $product->stores[0]->lng }}"></div>
				<div class="row">
					<div class="col-5 text-right ">
						<span class="text-muted">{{ number_format($product->brand->quality, 1, ".", ".") }}</span>
					</div>
					<div class="col-7">
						<div class="ratings text-warning" data-rate-value="{{ number_format($product->brand->quality, 1, ".", ".") }}"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-area d-flex px-3">
			<div class="m-auto d-flex">
				<a href="{{ route('web.producto', ['slug' => $product->slug]) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
					<span><i class="ion-ios-menu"></i></span>
				</a>
				<a href="{{ route('comprar.product', ['slug' => $product->slug]) }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
					<span><i class="icon-shopping-bag"></i></span>
				</a>
			</div>
		</div>
	</div>
</div>