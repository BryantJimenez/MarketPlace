@extends('layouts.web')

@section('title', 'Tiendas')

@section('links')
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2-bootstrap.css') }}">
@endsection

@section('content')
<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row">
			<div class="col-12 mt-4">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<div class="form-group">
							<label>Buscar</label>
							<select class="multiselect form-control" id="searchField">
								<option value="">Buscar</option>
								@foreach($storesAll as $store)
								<option value="{{ $store->slug }}" url="{{ route('tiendas', ['url' => filterRedirect($url, 'buscar', $store->slug)]) }}" @if(in_array($store->slug, $urlArray)) selected @endif>{{ $store->name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-12">
						<div class="form-group">
							<label>Distrito</label>
							<select class="multiselect form-control" id="filterDistrict">
								<option value="">Seleccione</option>
								@foreach($districts as $district)
								<option value="{{ $district['id'] }}" url="{{ route('tiendas', ['url' => filterRedirect($url, 'distrito', $district['id'])]) }}" @if(in_array($district['id'], $urlArray)) selected @endif>{{ $district['name'] }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 mt-4">
				<div class="row">

					@forelse ($stores as $store)
					@if($loop->index>=$offset && $loop->index<$offset+8)
					<div class="col-lg-4 col-md-4 col-12 ftco-animate">
						@include('web.partials.cardStore')
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