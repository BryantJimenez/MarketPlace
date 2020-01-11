@extends('layouts.admin')

@section('title', 'Registro de Artículo')
@section('page-title', 'Registro de Artículo')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog-Artículo</a></li>
<li class="breadcrumb-item active">Registro</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				@include('admin.partials.errors')

				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<form action="{{ route('blog.store') }}" method="POST" class="form" id="formBlog" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="form-group col-lg-12 col-md-12 col-12">
							<label class="col-form-label">Título<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="title" required placeholder="Introduzca un nombre" value="{{ old('title') }}">
						</div>
						<div class="form-group col-lg-12 col-md-12 col-12">
							<label class="col-form-label">Cuerpo del Artículo<b class="text-danger">*</b></label>
							<textarea class="form-control" type="text" name="content" required placeholder="Introduzca la temática del artículo" value="{{ old('content') }}"></textarea>
						</div>
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
						<div class="form-group col-12">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-primary" action="blog">Guardar</button>
								<a href="{{ route('blog.index') }}" class="btn btn-secondary">Volver</a>
							</div>
						</div>
					</div>
				</form>
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
<script src="{{ asset('/admins/js/summernote.min.js') }}"></script>
@endsection