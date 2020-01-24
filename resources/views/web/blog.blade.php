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
			<div class="col-lg-8 ftco-animate">
				<div class="row">

					@forelse($blogs as $blog)
					<div class="card col-12 mb-3">
						<div class="row no-gutters">
							<div class="col-lg-3 col-md-3 col-12">
								<a href="{{ route('web.blog.show', ['slug' => $blog->slug]) }}">
									<img class="img-fluid w-100" src="{{ asset('/admins/img/blogs/'.$blog->image) }}" alt="{{ $blog->title }}">
								</a>
							</div>
							<div class="col-lg-9 col-md-9 col-12">
								<div class="card-body">
									<p class="card-text mb-0"><small class="text-muted"><i class="icon-user"></i> {{ $blog->user->name." ".$blog->user->lastname }} <i class="icon-clock-o"></i> {{ date('d-m-Y', strtotime($blog->updated_at)) }} <i class="icon-chat"></i> 3</small></p>
									<h5 class="card-title mb-0 d-flex"><a href="{{ route('web.blog.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h5>
									{{-- <p class="card-text">{{ blogContent($blog->content) }}</p> --}}
									<a href="{{ route('web.blog.show', ['slug' => $blog->slug]) }}" class="btn btn-primary btn-sm mb-lg-2 mb-md-2">Leer Más</a>
								</div>
							</div>
						</div>
					</div>
					@empty
					@endforelse

				</div>
			</div>
			<!-- .col-md-8 -->
			<div class="col-lg-4 sidebar ftco-animate">
				<div class="sidebar-box">
					<form action="#" class="search-form">
						<div class="form-group">
							<span class="icon ion-ios-search"></span>
							<input type="text" class="form-control" placeholder="Buscar Artículo...">
						</div>
					</form>
				</div>

				<div class="sidebar-box ftco-animate">
					<h3 class="heading">Recientemente en el Blog</h3>

					<div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(/web/images/bg_1.jpg);"></a>
						<div class="text">
							<h3 class="heading-1"><a href="#">Título del Artículo</a></h3>
							<div class="meta">
								<div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
								<div><a href="#"><span class="icon-person"></span> Admin</a></div>
								<div><a href="#"><span class="icon-chat"></span> 19</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>




@endsection