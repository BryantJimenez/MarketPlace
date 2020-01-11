@extends('layouts.web')

@section('title', 'Perfil')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/web/images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">Perfil</h1>
			</div>
		</div>
	</div>
</div>
<section class="ftco-section contact-section bg-light">
	<div class="container">
		<div class="row block-9">
			<div class="col-md-6 order-md-last d-flex">
				<form action="#" class="bg-white p-5 contact-form">
					<div class="form-group">
						<h4 class="m-b-0 font-medium">Nombre Completo</h4>{{ Auth::user()->name." ".Auth::user()->lastname }}
					</div>
					<div class="form-group">
						<h4 class="m-b-0 font-medium">Tipo de Usuario</h4> @if (Auth::user()->type=='1')
							{{'Administrador'}}
						@endif 
					</div>
					<div class="form-group">
						<h4 class="m-b-0 font-medium">Correro Electrónico</h4>{{ Auth::user()->email }}
					</div>
					<div class="form-group">
						<h4 class="m-b-0 font-medium">Estado</h4> @if (Auth::user()->state=='1')
							{{'Activo'}}
						@endif
					</div>
					<div class="form-group">
						<h4 class="m-b-0 font-medium">Fecha de Inscripción</h4>{{  Auth::user()->created_at }}
					</div>
				</form>

			</div>

			<div class="col-md-6 d-flex">
				<div class="bg-white">
					<div class="block-20" style="background-image: url(/admins/img/users/{{ Auth::user()->photo }}); height: 100%;"></div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection