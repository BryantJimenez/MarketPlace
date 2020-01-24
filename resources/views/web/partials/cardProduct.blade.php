<div class="product">
	<a href="{{ route('web.producto', ['slug' => $products[4*$i+$j]->slug]) }}" class="img-prod">
		{!! imageCardProduct($products[4*$i+$j]) !!}

		@if($products[4*$i+$j]->ofert>0)
		<span class="status">{{ $products[4*$i+$j]->ofert." %" }}</span>
		@endif
		<div class="overlay"></div>
	</a>
	<div class="text py-3 pb-4 px-3 text-center">
		<h3><a href="{{ route('web.producto', ['slug' => $products[4*$i+$j]->slug]) }}">{{ $products[4*$i+$j]->name }}</a></h3>
		<div class="d-flex">
			<div class="pricing">
				{!! productPrice($products[4*$i+$j]) !!}
				<div class="distance" lat="{{ $products[4*$i+$j]->stores[0]->lat }}" lng="{{ $products[4*$i+$j]->stores[0]->lng }}"></div>
				<div class="row">
					<div class="col-5 text-right ">
						<span class="text-muted">{{ number_format($products[4*$i+$j]->brand->quality, 1, ".", ".") }}</span>
					</div>
					<div class="col-7">
						<div class="ratings text-warning" data-rate-value="{{ number_format($products[4*$i+$j]->brand->quality, 1, ".", ".") }}"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-area d-flex px-3">
			<div class="m-auto d-flex">
				<a href="{{ route('web.producto', ['slug' => $products[4*$i+$j]->slug]) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
					<span><i class="ion-ios-menu"></i></span>
				</a>
				<a href="{{ route('comprar.product', ['slug' => $products[4*$i+$j]->slug]) }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
					<span><i class="icon-shopping-bag"></i></span>
				</a>
			</div>
		</div>
	</div>
</div>