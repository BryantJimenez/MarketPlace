@extends('layouts.admin')

@section('title', 'Detalles de la Tienda')
@section('page-title', 'Detalles de la Tienda')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/multiselect/bootstrap.multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/leaflet/leaflet.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('tiendas.index') }}">Tiendas</a></li>
<li class="breadcrumb-item active">Registro</li>
@endsection

@section('content')



<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title"><span class="lstick"></span>Datos del Propietario</h4>
				<div id="visitor" style="height:290px; width:100%;"></div>
				<table class="table vm font-14">
					<tr>
						<td class="b-0">Nombre Completo</td>
						<td class="text-right font-medium b-0">38.5%</td>
					</tr>
					<tr>
						<td>Correo</td>
						<td class="text-right font-medium">30.8%</td>
					</tr>
					<tr>
						<td>Teléfono</td>
						<td class="text-right font-medium">7.7%</td>
					</tr>
					<tr>
						<td>Género</td>
						<td class="text-right font-medium">23.1%</td>
					</tr>
					<tr>
						<td>Fecha de Nacimiento</td>
						<td class="text-right font-medium">7.7%</td>
					</tr>
					<tr>
						<td>Dirección</td>
						<td class="text-right font-medium">23.1%</td>
					</tr>
				</table>
			</div> 
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title"><span class="lstick"></span>Datos de laTtienda</h4>
				<div id="visitor" style="height:290px; width:100%;"></div>
				<table class="table vm font-14">
					<tr>
						<td class="b-0">Nombre</td>
						<td class="text-right font-medium b-0">38.5%</td>
					</tr>
					<tr>
						<td>Distrito</td>
						<td class="text-right font-medium">30.8%</td>
					</tr>
					<tr>
						<td>Teléfono</td>
						<td class="text-right font-medium">7.7%</td>
					</tr>
					<tr>
						<td>Dirección</td>
						<td class="text-right font-medium">23.1%</td>
					</tr>
				</table>
			</div> 
		</div>
	</div>
</div>







@endsection

@section('script')
<script src="{{ asset('/admins/vendors/leaflet/leaflet.js') }}"></script>
<script src="{{ asset('/admins/vendors/multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
@endsection