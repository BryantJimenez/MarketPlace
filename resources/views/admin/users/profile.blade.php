@extends('layouts.admin')

@section('title', 'Perfil')
@section('page-title', 'Perfil')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Perfil</a></li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				@include('admin.partials.errors')

				<!--Little Profile widget-->
				<div class="little-profile text-center">
					<div class="pro-img m-t-20"><img src="/admins/img/users/{{ Auth::user()->photo }}" alt="user"></div>
					<h3 class="m-b-0">{{ Auth::user()->name." ".Auth::user()->lastname }}</h3>
					{{-- <h6 class="text-muted">Web Designer &amp; Developer</h6> --}}
				</div>
				<div class="text-center bg-light">
					<div class="row">
						<div class="col-6  p-20 b-r">
							<h4 class="m-b-0 font-medium">Correo Electrónico</h4><small>{{ Auth::user()->email }}</small></div>
							<div class="col-6  p-20">
								<h4 class="m-b-0 font-medium">Tipo de Usuario</h4><small>...</small></div>
							</div>
						</div>
						<div class="card-body text-center">
							<a href=" {{ route('admin') }}" class="m-t-10 m-b-20 waves-effect waves-dark btn btn-success btn-md btn-rounded">Volver al Inicio</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection

	@section('script')
	<script src="{{ asset('/admins/vendors/dropify/js/dropify.min.js') }}"></script>
	<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
	<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
	<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
	<script src="{{ asset('/admins/js/validate.js') }}"></script>
	@endsection