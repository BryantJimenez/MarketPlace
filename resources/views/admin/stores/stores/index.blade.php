@extends('layouts.admin')

@section('title', 'Lista de Tiendas en Espera')
@section('page-title', 'Lista de Tiendas en Espera')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">Tiendas</li>
<li class="breadcrumb-item active">Lista</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="tablaExport" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre Completo</th>
								<th>Nombre de la Tienda</th>
								<th>Correo</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="d-flex">
									<a class="btn btn-primary btn-circle btn-sm" title="Ver Más" href="#"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" title="Confirmar" href="#"><i class="fa fa-check"></i></a>&nbsp;&nbsp;
									<a class="btn btn-warning btn-circle btn-sm" title="Rechazar" href="#"><i class="fa fa-times"></i></a>&nbsp;&nbsp;
									<button class="btn btn-danger btn-circle btn-sm" title="Eliminar"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- ////////////////////ELIMINAR//////////////////////////////////////////////// --}}

<div class="modal fade" id="deleteStore" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres eliminar esta tienda?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formDeleteStore">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-primary">Eliminar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

{{-- //////////////////////////////////CONFIRMAR////////////////////////////// --}}

<div class="modal fade" id="confirmStore" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres confirmar esta tienda?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formConfirmPay">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

{{-- //////////////////////////////////////////////////RECHAZAR///////////////////////// --}}

<div class="modal fade" id="refuseStore" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres rechazar esta tienda?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="#" method="POST" id="formRefusePay" class="modal-footer">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="form-group col-12">
						<label class="col-form-label">Explicación<b class="text-danger">*</b></label>
						<textarea class="form-control" name="explanation" required placeholder="Introduce la razón del rechazo del pago"></textarea>
					</div>
					<div class="form-group col-12 d-flex justify-content-end">
						<button type="submit" class="btn btn-primary mr-2">Rechazar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/lobibox/Lobibox.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/buttons/dataTables.flash.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/buttons/jszip.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/buttons/pdfmake.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/buttons/vfs_fonts.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/buttons/buttons.print.min.js') }}"></script>
@endsection