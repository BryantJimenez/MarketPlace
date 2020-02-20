@extends('layouts.web')

@section('title', $data->name)

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/web/images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">{{$data->name}}</h1>
			</div>
		</div>
	</div>
</div>


<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<video style="min-width: 100%; max-width: 100%; min-height: 400px; max-height: 400px;" 

					controls
					poster="{{asset('admins/videos/video.png')}}"
				>
					<source src="{{asset('admins/videos/workshops/'.$data->video)}}" type="">
				</video>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3>{{$data->name}}</h3>
				<div class="rating d-flex">				
				</div>
				<br>
				<center><h3>Datos personales</h3></center>
				<br>
				<h4><strong>Nombre:</strong> {{$data->user->name}} {{$data->user->lastname}}</h4>
				<br>

				<h4><strong>Número de teléfono:</strong> {{$data->user->phone}}</h4>
				<br>

				<h4><strong>Dirección de taller:</strong> {{$data->address}}</h4> 
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h3><center>Experiencia</center></h3>
				<br>
				{{$data->experience}}
			</div>
		</div>
	</div>
</section>
<!--
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Talleres que podrían ser de tu interés</h2>
			</div>
		</div>   		
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="#" class="img-prod"><img class="img-fluid" src="/web/images/bg_2.jpg" alt="Colorlib Template">
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<h3><a href="#">Nombre del Taller</a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price"><span class="price-sale">$80.00</span></p>
							</div>
						</div>
						<div class="bottom-area d-flex px-3">
							<div class="m-auto d-flex">
								<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
									<span><i class="ion-ios-eye"></i></span>
								</a>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="#" class="img-prod"><img class="img-fluid" src="/web/images/bg_2.jpg" alt="Colorlib Template">
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<h3><a href="#">Nombre del Taller</a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price"><span>$120.00</span></p>
							</div>
						</div>
						<div class="bottom-area d-flex px-3">
							<div class="m-auto d-flex">
								<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
									<span><i class="ion-ios-eye"></i></span>
								</a>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="#" class="img-prod"><img class="img-fluid" src="/web/images/bg_2.jpg" alt="Colorlib Template">
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<h3><a href="#">Nombre del Taller</a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price"><span>$120.00</span></p>
							</div>
						</div>
						<div class="bottom-area d-flex px-3">
							<div class="m-auto d-flex">
								<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
									<span><i class="ion-ios-eye"></i></span>
								</a>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="#" class="img-prod"><img class="img-fluid" src="/web/images/bg_2.jpg" alt="Colorlib Template">
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<h3><a href="#">Nombre del Taller</a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price"><span>$120.00</span></p>
							</div>
						</div>
						<div class="bottom-area d-flex px-3">
							<div class="m-auto d-flex">
								<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
									<span><i class="ion-ios-eye"></i></span>
								</a>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
-->
@endsection