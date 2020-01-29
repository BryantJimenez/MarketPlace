@extends('layouts.web')

@section('title', 'Mis Artículos')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/web/images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">Mis Artículos</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				@if(count($blogs)>0)
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>#</th>
								<th>Título</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($blogs as $blog)
							<tr>
								<td>{{ $num++ }}</td>
								<td>{{ $blog->title }}</td>
								<td>{!! blogState($blog->state) !!}</td>
								<td class="d-flex justify-content-center">
									<a href="{{ route('web.sales.show', ['slug' => $blog->slug]) }}" class="btn btn-primary"><i class="icon-edit"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@else
				<div class="col-12 text-center">
					<p class="h3 text-danger">No tienes artículos publicados</p>
				</div>
				@endif
			</div>
		</div>
	</div>
</section>

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/datatables/jquery.dataTables.min.js') }}"></script>
@endsection