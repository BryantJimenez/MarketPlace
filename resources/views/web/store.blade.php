@extends('layouts.web')

@section('title', $store->name)

@section('links')
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2-bootstrap.css') }}">
@endsection

@section('content')
<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 mt-4">
				@include('web.partials.filterStore')
			</div>
			<div class="col-lg-9 col-md-9 mt-4">
				<div class="row">

					@forelse ($products as $product)
					@if($loop->index>=$offset && $loop->index<$offset+8)
					<div class="col-12 ftco-animate">
						@include('web.partials.listProduct')
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