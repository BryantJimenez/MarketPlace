@extends('layouts.web')

@section('title', 'Registrar Tienda')

@section('links')
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('/web/vendors/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/leaflet/leaflet.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/leaflet/control.geocoder.css') }}" />
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/datepicker/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
@endsection

@section('content')

<section class="ftco-section pt-5 bg-light">
	<div class="container">
		<div class="row">
			@guest
			<div class="col-12 ftco-animate">
				<p class="h2">Inicia sesión o registrate para continuar con el registro de tu tienda.</p>
			</div>
			<div class="col-12">
				@include('admin.partials.errors')
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-12 ftco-animate">
				<form action="{{ route('login') }}" method="POST" id="formLogin">
					@csrf
					<div class="row align-items-end">
						<div class="col-12">
							<div class="cart-detail cart-total p-3 p-md-4 bg-white">
								<p class="h4 text-center mt-2">Iniciar Sesión</p>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Correo Electrónico</label>
											<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required placeholder="{{ 'ejemplo@gmail.com' }}" value="{{ old('email') }}">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Contraseña</label>
											<input class="form-control @error('password') is-invalid @enderror" type="password" required name="password" placeholder="********">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group text-center">
											<button class="btn btn-primary" type="submit" action="login">Ingresar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-12 ftco-animate">
				<form action="{{ route('register') }}" method="POST" id="formRegister">
					@csrf
					<div class="row align-items-end">
						<div class="col-12">
							<div class="cart-detail cart-total p-3 p-md-4 bg-white">
								<p class="h4 text-center mt-2">Registrarse</p>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Nombre</label>
											<input class="form-control @error('name') is-invalid @enderror" type="text" name="name" required placeholder="Ejm: Juan" value="{{ old('name') }}" autocomplete="name" autofocus>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Apellido</label>
											<input class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname" required placeholder="Ejm: Lopez" value="{{ old('lastname') }}" autocomplete="lastname">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Correo Electrónico</label>
											<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required placeholder="{{ 'ejemplo@gmail.com' }}" value="{{ old('email') }}">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Contraseña</label>
											<input class="form-control @error('password') is-invalid @enderror" type="password" required name="password" placeholder="********" id="password">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Confirmar Contraseña</label>
											<input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="********">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group text-center">
											<button class="btn btn-primary" type="submit" action="register">Registrarse</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			@else
			<div class="col-12 ftco-animate">
				<p class="h2">Registro de Tienda</p>
				<p>Envía el formulario con todos los datos, la solicitud de tu tienda sera revisada y aceptada de cumplir con todos los requerimientos.</p>
				<p>Campos obligatorios (<b class="text-danger">*</b>)</p>
				<form action="{{ route('servicios.offer.shop.store') }}" method="POST" class="billing-form" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-12">
							<p class="h5">Datos del Propietario</p>
							<div class="row">
								@if(Auth::user()->photo=="usuario.png")
								<div class="col-12">
									<div class="form-group">
										<label class="col-form-label">Foto<b class="text-danger">*</b></label>
										<input type="file" name="photo" accept="image/*" id="input-file-now" class="dropify" data-height="125" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg web3" required />
									</div>
								</div>
								@endif
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Nombre</label>
										<input type="text" class="form-control" readonly value="{{ Auth::user()->name }}">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Apellido</label>
										<input type="text" class="form-control" readonly value="{{ Auth::user()->lastname }}">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Correo Electrónico</label>
										<input type="email" class="form-control" readonly value="{{ Auth::user()->email }}">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>DNI (Documento de Identidad)<b class="text-danger">*</b></label>
										<input type="text" class="form-control" placeholder="Introduzca su dni" name="dni" required id="dni" @if(Auth::user()->dni!=null || Auth::user()->dni!="") readonly value="{{ Auth::user()->dni }}" @else value="{{ old('dni') }}" @endif>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Teléfono<b class="text-danger">*</b></label>
										<input type="text" class="form-control phone" placeholder="Introduzca su teléfono" required name="phone" @if(Auth::user()->phone!=null || Auth::user()->phone!="") readonly value="{{ Auth::user()->phone }}" @else value="{{ old('phone') }}" @endif>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Género<b class="text-danger">*</b></label>
										<select class="form-control" required name="genrer" @if(Auth::user()->genrer!=null || Auth::user()->genrer!="") readonly @endif>
											<option value="">Seleccione</option>
											<option value="Masculino" @if(Auth::user()->genrer=="Masculino") selected @endif>Masculino</option>
											<option value="Femenino" @if(Auth::user()->genrer=="Femenino") selected @endif>Femenino</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Fecha de Nacimiento<b class="text-danger">*</b></label>
										<input type="text" class="form-control date" placeholder="Seleccione su fecha de nacimiento" required name="birthday" @if(Auth::user()->birthday!=null || Auth::user()->birthday!="") readonly value="{{ date('d-m-Y', strtotime(Auth::user()->birthday)) }}" @else value="{{ old('birthday') }}" @endif>
									</div>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Departamento<b class="text-danger">*</b></label>
									<select class="form-control multiselect" required id="multiselectDepartments" @if(Auth::user()->district_id!=null || Auth::user()->district_id!="") disabled @endif>
										@if(Auth::user()->district_id!=null || Auth::user()->district_id!="")
										<option value="{{ Auth::user()->district->province->department->id }}">{{ Auth::user()->district->province->department->name }}</option>
										@else
										<option value="">Seleccione</option>
										@foreach($departments as $department)
										<option value="{{ $department->id }}">{{ $department->name }}</option>
										@endforeach
										@endif
									</select>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Provincia<b class="text-danger">*</b></label>
									<select class="form-control multiselect" required disabled id="multiselectProvinces">
										@if(Auth::user()->district_id!=null || Auth::user()->district_id!="")
										<option value="{{ Auth::user()->district->province->id }}">{{ Auth::user()->district->province->name }}</option>
										@else
										<option value="">Seleccione</option>
										@endif
									</select>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Distrito<b class="text-danger">*</b></label>
									<select class="form-control multiselect" required disabled name="district_id" id="multiselectDistricts">
										@if(Auth::user()->district_id!=null || Auth::user()->district_id!="")
										<option value="{{ Auth::user()->district->id }}">{{ Auth::user()->district->name }}</option>
										@else
										<option value="">Seleccione</option>
										@endif
									</select>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Dirección<b class="text-danger">*</b></label>
										<input class="form-control" type="text" name="address" required placeholder="Introduzca una dirección" @if(Auth::user()->address!=null || Auth::user()->address!="") readonly value="{{ Auth::user()->address }}" @else value="{{ old('address') }}" @endif>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-12">
							<p class="h5">Datos de la Tienda</p>
							<div class="row">
								<div class="form-group col-12">
									<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
									<input class="form-control" type="text" name="name_shop" required placeholder="Introduzca un nombre" value="{{ old('name_shop') }}">
								</div>
								<div class="form-group col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Departamento</label>
									<input type="text" class="form-control" readonly value="Lima">
								</div>
								<div class="form-group col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Provincia</label>
									<input type="text" class="form-control" readonly value="Lima">
								</div>
								<div class="form-group col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Distrito<b class="text-danger">*</b></label>
									<select class="form-control multiselect" name="shop_district_id" required>
										<option value="">Seleccione</option>
										@foreach($districts as $district)
										<option value="{{ $district->id }}" @if(old('shop_district_id')==$district->id) selected @endif>{{ $district->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Teléfono<b class="text-danger">*</b></label>
									<input class="form-control phone" type="text" name="phone_shop" required placeholder="Introduzca un teléfono" value="{{ old('phone_shop') }}">
								</div>
								<div class="form-group col-12">
									<label class="col-form-label">Dirección<b class="text-danger">*</b></label>
									<input class="form-control" type="text" name="address_shop" required placeholder="Selecciona una dirección" readonly value="{{ old('address_shop') }}" id="addressDelivery">
								</div>
								<div class="form-group col-12">
									<label class="col-form-label">Busca la ubicación de tu tienda y da click en ese lugar<b class="text-danger">*</b></label>
									<div id="map" style="height: 300px;"></div>
									<input type="hidden" name="lat" id="lat">
									<input type="hidden" name="lng" id="lng">
								</div>
							</div>
						</div>
						<div class="form-group col-12 mt-4">
							<input type="submit" value="Enviar Solicitud" class="btn btn-primary py-3 px-4">
							<a href="{{ route('servicios.offer') }}" class="btn btn-secondary py-3 px-4">Volver</a>
						</div>
					</div>
				</form>
			</div>
			@endguest
		</div>
	</div>
</section>

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/leaflet/leaflet.js') }}"></script>
<script src="{{ asset('/admins/vendors/leaflet/control.geocoder.js') }}"></script>
<script src="{{ asset('/web/vendors/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/web/vendors/select2/es.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/moment/moment.js') }}"></script>
<script src="{{ asset('/admins/vendors/datepicker/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
@endsection