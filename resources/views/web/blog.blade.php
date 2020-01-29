@extends('layouts.web')

@section('title', 'Blog')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/web/images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">Blog</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-degree-bg">
	<div class="container">
		<div class="row">
			@if(count($blogs)>0 || count($recents)>0)
			<div class="col-lg-8 ftco-animate">
				<div class="row">

					@forelse($blogs as $blog)
					<div class="card col-12 mb-3 px-0">
						<div class="row no-gutters">
							<div class="col-lg-3 col-md-3 col-12">
								<a href="{{ route('web.blog.show', ['slug' => $blog->slug]) }}">
									<img class="img-fluid w-100 h-100" src="{{ asset('/admins/img/blogs/'.$blog->image) }}" alt="{{ $blog->title }}">
								</a>
							</div>
							<div class="col-lg-9 col-md-9 col-12">
								<div class="card-body">
									<p class="card-text mb-0"><small class="text-muted"><i class="icon-user"></i> {{ $blog->user->name." ".$blog->user->lastname }} <i class="icon-clock-o"></i> {{ date('d-m-Y', strtotime($blog->updated_at)) }} <i class="icon-chat"></i> 0</small></p>
									<h5 class="card-title mb-0 d-flex"><a href="{{ route('web.blog.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h5>
									<p class="card-text">{!! substr($blog->content, 0, 80) !!}</p>
									<a href="{{ route('web.blog.show', ['slug' => $blog->slug]) }}" class="btn btn-primary btn-sm mt-2">Leer Más</a>
								</div>
							</div>
						</div>
					</div>
					@empty
					<div class="col-12 text-center">
						<p class="h3 text-danger">No hay resultados encontrados</p>
					</div>
					@endforelse

				</div>
			</div>
			<!-- .col-md-8 -->
			<div class="col-lg-4 sidebar ftco-animate">
				<div class="sidebar-box py-0">
					<form action="{{ route('web.blog.index') }}" method="GET" class="search-form d-flex justify-content-between">
						<input type="text" name="buscar" class="form-control" placeholder="Buscar Artículo..." @isset($search['buscar']) value="{{ $search['buscar'] }}" @endif>
						<button class="btn btn-primary btn-sm rounded" type="submit"><i class="ion-ios-search"></i></button>
					</form>
				</div>

				<div class="sidebar-box ftco-animate">
					<h3 class="heading">Recientemente en el Blog</h3>
					@foreach($recents as $recent)
					<div class="block-21 mb-4 d-flex">
						<a href="{{ route('web.blog.show', ['slug' => $recent->slug]) }}" class="blog-img mr-4" style="background-image: url('{{ asset('/admins/img/blogs/'.$recent->image) }}');"></a>
						<div class="text">
							<h3 class="heading-1"><a href="{{ route('web.blog.show', ['slug' => $recent->slug]) }}">{{ $recent->title }}</a></h3>
							<div class="meta">
								<p class="card-text mb-0"><small class="text-muted"><i class="icon-user"></i> {{ $recent->user->name }} <i class="icon-clock-o"></i> {{ date('d-m-Y', strtotime($recent->updated_at)) }} <i class="icon-chat"></i> 0</small></p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@else
			<div class="col-12 text-center">
				<p class="h3 text-danger">No hay entradas en el blog</p>
			</div>
			@endif

		</div>
	</div>
</section>




@endsection