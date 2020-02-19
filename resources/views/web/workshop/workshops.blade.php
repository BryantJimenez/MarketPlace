@extends('layouts.web')

@section('title', 'Talleres')

@section('content')

<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<form class="row pt-5" method="GET" action="{{ route('talleres') }}">
			<div class="col-lg-4 col-md-4 col-12">
				<div class="form-group">
					<select class="multiselect form-control" name="taller">
						<option value="">Taller</option>
						@foreach($workshopsAll as $workshop)
						@isset($search['taller'])
						<option value="{{ $workshop->slug }}" @if($search['taller']==$workshop->slug) selected @endif>{{ $workshop->name }}</option>
						@else
						<option value="{{ $workshop->slug }}">{{ $workshop->name }}</option>
						@endisset
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-12">
				<div class="form-group">
					<select class="multiselect form-control" name="marca">
						<option value="">Marca</option>
						@foreach($brands as $brand)


						@isset($search['marca'])
						<option value="{{ $brand['id'] }}" @if($search['marca']==$brand['id']) selected @endif>{{ $brand['name'] }}</option>
						@else
						<option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
						@endisset
						@endforeach

					</select>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-12">
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

		<div class="row">
			<div class="col-12">
				<div class="row">
					@foreach($workshops as $key)
						<div class="col-lg-4 col-md-4 mt-4">
							<div class="card text-center">
								{{-- <div class="card-header">
									<video style="min-width: 100%; max-width: 100%; min-height: 300px; max-height: 300px;" controls poster="{{asset('admins/videos/video.png')}}"
									>
										<source src="{{asset('admins/videos/workshops/'.$key->video)}}" type="video/mp4">
									</video>
								</div> --}}
								<div class="card-body">
									<h5 class="card-title">{{$key->name}}</h5>
									<div class="col-sm">
										<p class="card-text">Decsripción.</p>
										<a href="{{route('taller.show',$key->slug)}}" class="btn btn-primary">Ver Más</a>
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