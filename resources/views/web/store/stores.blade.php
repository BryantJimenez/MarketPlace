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
			<div class="col-12 mt-5">
				<form class="row" method="GET" action="{{ route('tiendas') }}">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="form-group">
							<select class="multiselect form-control" name="tienda">
								<option value="">Tienda</option>
								@foreach($storesAll as $store)
								@isset($search['tienda'])
								<option value="{{ $store->slug }}" @if($search['tienda']==$store->slug) selected @endif>{{ $store->name }}</option>
								@else
								<option value="{{ $store->slug }}">{{ $store->name }}</option>
								@endisset
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-lg-5 col-md-5 col-12">
						<div class="form-group">
							<select class="multiselect form-control" name="distrito">
								<option value="">Distrito</option>
								@foreach($districts as $district)
								@isset($search['distrito'])
								<option value="{{ $district['id'] }}" @if($search['distrito']==$district['id']) selected @endif>{{ $district['name'] }}</option>
								@else
								<option value="{{ $district['id'] }}">{{ $district['name'] }}</option>
								@endisset
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group col-lg-2 col-md-2 col-12">
						<input type="submit" value="Buscar" class="btn btn-primary">
					</div>
				</form>
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