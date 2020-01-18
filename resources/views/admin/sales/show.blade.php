@extends('layouts.admin')

@section('title', 'Ver Venta')
@section('page-title', 'Ver Venta')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/multiselect/bootstrap.multiselect.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('tiendas.index') }}">Ventas</a></li>
<li class="breadcrumb-item active">Ver Más</li>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="d-flex">
					<div>
						<h4 class="card-title"><span class="lstick"></span>Productos adquiridos</h4></div>
						<div class="ml-auto">
							<h5 class="card-title"><span class="lstick"></span>Fecha</h5>
						</div>
					</div>
					<div class="table-responsive m-t-20">
						<table class="table vm no-th-brd no-wrap pro-of-month">
							<thead>
								<tr>
									<th colspan="2">Producto</th>
									<th>Cantidad</th>
									<th>Tienda</th>
								</tr>
							</thead>
							<tbody>
							<tr>
								<td style="width:50px;"><span class="round"><img src="/admins/img/users/usuario.png" alt="user" width="50"></span></td>
								<td>
								 <h6>Nombre</h6><small class="text-muted">Categoría</small></td>
								<td>1</td>
								<td><h6>Nombre de La Tienda</h6></td>
							</tr>
							<tr class="active">
								<td><span class="round"><img src="/admins/img/users/usuario.png" alt="user" width="50"></span></td>
								<td>
									<h6>Nombre</h6><small class="text-muted">Categoría</small></td>
								<td>1</td>
								<td><h6>Nombre de La Tienda</h6></td>
							</tr>
							<tr>
								<td><span class="round round-success"><img src="/admins/img/users/usuario.png" alt="user" width="50"></span></td>
								<td>
									<h6>Nombre</h6><small class="text-muted">Categoría</small></td>
								<td>1</td>
								<td><h6>Nombre de La Tienda</h6></td>
							</tr>
							<tr>
								<td><span class="round round-primary"><img src="/admins/img/users/usuario.png" alt="user" width="50"></span></td>
								<td>
									<h6>Nombre</h6><small class="text-muted">Categoría</small></td>
								<td>1</td>
								<td><h6>Nombre de La Tienda</h6></td>
							</tr>
							<tr>
								<td><span class="round round-warning"><img src="/admins/img/users/usuario.png" alt="user" width="50"></span></td>
								<td>
									<h6>Nombre</h6><small class="text-muted">Categoría</small></td>
								<td>1</td>
								<td><h6>Nombre de La Tienda</h6></td>
							</tr>
							<tr>
								<td><span class="round round-danger"><img src="/admins/img/users/usuario.png" alt="user" width="50"></span></td>
								<td>
									<h6>Nombre</h6><small class="text-muted">Categoría</small></td>
									<td>1</td>
								<td><h6>Nombre de La Tienda</h6></td>
							</tr>
							<tr>
								<td><span class="round round-primary"><img src="/admins/img/users/usuario.png" alt="user" width="50"></span></td>
															<td>
									<h6>Nombre</h6><small class="text-muted">Categoría</small></td>
								<td>1</td>
								<td><h6>Nombre de La Tienda</h6></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
<script src="{{ asset('/admins/vendors/multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
@endsection


































