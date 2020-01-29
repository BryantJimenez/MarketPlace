@extends('layouts.web')

@section('title', $blog->title)

@section('content')

<section class="ftco-section ftco-degree-bg pt-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 ftco-animate bg-white pt-4">
				<div class="d-flex flex-wrap mb-3">
					<a href="{{ route('web.blog.index') }}" class="btn btn-primary py-4 rounded"><i class="icon-arrow-left align-middle"></i></a>
					<div class="ml-3">
						<p class="mb-0">
							<small class="text-muted"><i class="icon-user"></i> {{ $blog->user->name." ".$blog->user->lastname }} <i class="icon-clock-o"></i> {{ date('d-m-Y', strtotime($blog->updated_at)) }}</small>
						</p>
						<h2>{{ $blog->title }}</h2>
					</div>
					
				</div>
				<img src="{{ asset('/admins/img/blogs/'.$blog->image) }}" class="w-100 img-fluid mb-4" style="height: 400px;">
				{!! $blog->content !!}

				{{-- <div class="pt-5 mt-5">
					<h3 class="mb-5">Comentarios</h3>
					<ul class="comment-list">
						<li class="comment">
							<div class="vcard bio">
								<img src="/web/images/person_2.jpg" alt="Image placeholder">
							</div>
							<div class="comment-body">
								<h3>John Doe</h3>
								<div class="meta">June 27, 2018 at 2:21pm</div>
								<p>Comentario</p>
								<p><a href="#" class="reply">Reply</a></p>
							</div>
						</li>

						<li class="comment">
							<div class="vcard bio">
								<img src="/web/images/person_3.jpg" alt="Image placeholder">
							</div>
							<div class="comment-body">
								<h3>John Doe</h3>
								<div class="meta">June 27, 2018 at 2:21pm</div>
								<p>Comentario</p>
								<p><a href="#" class="reply">Reply</a></p>
							</div>
						</li>
					</ul>
					END comment-list 

					<div class="comment-form-wrap pt-5">
						<h3 class="mb-5">Deja un Comentario</h3>
						<form action="#" class="p-5 bg-white">
							<div class="form-group">
								<label for="name">Nombre *</label>
								<input type="text" class="form-control" id="name">
							</div>
							<div class="form-group">
								<label for="email">Correo *</label>
								<input type="email" class="form-control" id="email">
							</div>

							<div class="form-group">
								<label for="message">Mensaje</label>
								<textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" value="Enviar" class="btn py-3 px-4 btn-primary">
							</div>

						</form>
					</div>
				</div> --}}
			</div>
			<div class="col-lg-4 sidebar ftco-animate">
				<div class="sidebar-box py-0 px-0">
					<form action="{{ route('web.blog.index') }}" method="GET" class="search-form d-flex justify-content-between">
						<input type="text" name="buscar" class="form-control" placeholder="Buscar Artículo..." @isset($search['buscar']) value="{{ $search['buscar'] }}" @endif>
						<button class="btn btn-primary btn-sm rounded" type="submit"><i class="ion-ios-search"></i></button>
					</form>
				</div>

				<div class="sidebar-box ftco-animate">
					<h3 class="heading">Recientemente en el Blog</h3>
					@foreach($recents as $recent)
					<div class="block-21 mb-4 d-flex">
						<a href="{{ route('web.blog.show', ['slug' => $recent->slug]) }}" class="blog-img mr-4" style="background-image: url('{{ asset('/admins/img/blogs/'.$blog->image) }}');"></a>
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

		</div>
	</div>
</section>

@endsection