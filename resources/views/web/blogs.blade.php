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
				<h2 class="mb-3">Título del Artículo</h2>
				<p>Cuero...</p>
				<p>
					<img src="/web/images/bg_1.jpg" alt="" class="img-fluid">
				</p>
				<p>Cuerpo...</p>
				<h2 class="mb-3 mt-5">#2. Creative WordPress Themes</h2>
				<p>Cuerpo...</p>
				<p>
					<img src="/web/images/bg_1.jpg" alt="" class="img-fluid">
				</p>
				<p>Cuerpo...</p>
				
				<div class="about-author d-flex p-4 bg-light">
					<div class="bio align-self-md-center mr-4">
						<img src="/web/images/person_4.jpg" alt="Image placeholder" class="img-fluid mb-4">
					</div>
					<div class="desc align-self-md-center">
						<h3>Admin</h3>
						<p>Resumen...</p>
					</div>
				</div>


				<div class="pt-5 mt-5">
					<h3 class="mb-5">Comentarios</h3>
					<ul class="comment-list">
						<li class="comment">
							<div class="vcard bio">
								<img src="/web/images/person_2.jpg" alt="Image placeholder">
							</div>
							<div class="comment-body">
								<h3>John Doe</h3>
								<div class="meta">...</p>
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
									<p>Comentario...</p>
									<p><a href="#" class="reply">Reply</a></p>
								</div>

								<ul class="children">
									<li class="comment">
										<div class="vcard bio">
											<img src="/web/images/person_3.jpg" alt="Image placeholder">
										</div>
										<div class="comment-body">
											<h3>John Doe</h3>
											<div class="meta">June 27, 2018 at 2:21pm</div>
											<p>Comentario...</p>
											<p><a href="#" class="reply">Reply</a></p>
										</div>


										
									</li>
								</ul>
							</li>

							<li class="comment">
								<div class="vcard bio">
									<img src="images/person_1.jpg" alt="Image placeholder">
								</div>
								<div class="comment-body">
									<h3>John Doe</h3>
									<div class="meta">June 27, 2018 at 2:21pm</div>
									<p>Comentario...</p>
									<p><a href="#" class="reply">Reply</a></p>
								</div>
							</li>
						</ul>
						<!-- END comment-list -->
						
					</div>
				</div> <!-- .col-md-8 -->
				<div class="col-lg-4 sidebar ftco-animate">
					<div class="sidebar-box">
						<form action="#" class="search-form">
							<div class="form-group">
								<span class="icon ion-ios-search"></span>
								<input type="text" class="form-control" placeholder="Buscar Artícul">
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


					<div class="sidebar-box ftco-animate">
						<h3 class="heading">Acerca del Blog</h3>
						<p>Cuerpo...</p>
					</div>

				</div>
			</div>
		</section>