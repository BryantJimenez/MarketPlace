@extends('layouts.web')

@section('title', $blog->title)

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/web/images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">{{ $blog->title }}</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-degree-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 ftco-animate">
				<h2 class="mb-3">{{ $blog->title }}</h2>
				{!! $blog->content !!}

				<div class="pt-5 mt-5">
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
					<!-- END comment-list -->

					<div class="comment-form-wrap pt-5">
						<h3 class="mb-5">Deja un Comentario</h3>
						<form action="#" class="p-5 bg-light">
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
				</div>
			</div>
			<div class="col-lg-4 sidebar ftco-animate">

				<div class="sidebar-box ftco-animate">
					<h3 class="heading">Recientemente en el Blog</h3>
					<div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(/web/images/bg_1.jpg);"></a>
						<div class="text">
							<h3 class="heading-1"><a href="#">Titulo</a></h3>
							<div class="meta">
								<div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
								<div><a href="#"><span class="icon-person"></span> Admin</a></div>
								<div><a href="#"><span class="icon-chat"></span> 19</a></div>
							</div>
						</div>
					</div>
					<div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(/web/images/bg_1.jpg);"></a>
						<div class="text">
							<h3 class="heading-1"><a href="#">Titulo</a></h3>
							<div class="meta">
								<div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
								<div><a href="#"><span class="icon-person"></span> Admin</a></div>
								<div><a href="#"><span class="icon-chat"></span> 19</a></div>
							</div>
						</div>
					</div>
					<div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(/web/images/bg_1.jpg);"></a>
						<div class="text">
							<h3 class="heading-1"><a href="#">Titulo</a></h3>
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