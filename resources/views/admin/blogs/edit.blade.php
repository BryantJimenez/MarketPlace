@extends('layouts.admin')

@section('title', 'Editar Artículo')
@section('page-title', 'Editar Artículo')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog-Artículo</a></li>
<li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				@include('admin.partials.errors')

				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<form action="{{ route('blog.update', ['slug' => $blog->slug]) }}" method="POST" class="form" id="formBlog" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="row">
						<div class="form-group col-lg-12 col-md-12 col-12">
							<label class="col-form-label">Título<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="title" required placeholder="Introduzca un nombre" value="{{ $blog->title }}">
						</div>
						<div class="form-group col-lg-12 col-md-12 col-12">
							<label class="col-form-label">Imagen Principal<b class="text-danger">*</b></label>
							<input type="file" name="image" accept="image/*" id="input-file-now" class="dropify" data-height="125" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg web3" data-default-file="{{ '/admins/img/blogs/'.$blog->image }}" />
						</div>
						<div class="form-group col-lg-12 col-md-12 col-12">
							<label class="col-form-label">Contenido del Artículo<b class="text-danger">*</b></label>
							<textarea class="form-control summernote" name="content" required placeholder="Introduzca el contenido del artículo">{{ $blog->content }}</textarea>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Estado<b class="text-danger">*</b></label>
							<select class="form-control" required name="state">
								<option value="1" @if($blog->state==1) selected @endif>Publicado</option>
								<option value="2" @if($blog->state==2) selected @endif>Borrador</option>
							</select>
						</div>

						<div class="form-group col-12">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-primary" action="blog">Actualizar</button>
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
<script src="{{ asset('/admins/vendors/ckeditor/ckeditor.js') }}"></script>
@endsection