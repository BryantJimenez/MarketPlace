<div class="card border-primary mb-3 shadow ftco-animate">
	<div class="card-header bg-transparent border-primary">
		<h4 class="mb-0 text-center">{{ $store->name }}</h4>
	</div>
	<div class="card-body text-primary text-center">
		<h5 class="card-title">Productos</h5>
		<div class="row">
			@forelse($store->products as $product)
			@if($loop->index==3) @break @endif
			<div class="col-4">
				@if(count($product->images)>0)
				<img class="img-100-50" src="{{ asset('/admins/img/products/'.$product->images[0]->image) }}" alt="{{ $product->name }}">
				@else
				<img class="img-100-50" src="{{ asset('/admins/img/products/imagen.jpg') }}" alt="{{ $product->name }}">
				@endif
				<p class="text-truncate">{{ $product->name }}</p>
			</div>
			@empty
			<div class="col-12">
				<p class="text-danger">No hay productos</p>
			</div>
			@endforelse
		</div>
		<a href="{{ route('ver.tienda', ['slug' => $store->slug, 'url' => 'distrito-'.$store->district_id.'-']) }}" class="btn btn-primary">Ver Más</a>
	</div>
</div>