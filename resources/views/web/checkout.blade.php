@extends('layouts.web')

@section('title', 'Comprar')

@section('links')
<link rel="stylesheet" href="{{ asset('/web/vendors/steps/jquery.steps.css') }}">
@endsection

@section('content')
<section class="ftco-section  bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate">
				<form action="{{ route('pagar') }}" method="POST" class="billing-form">
					@csrf
					<input type="hidden" name="culqi" id="culqi">
					<input type="hidden" name="slug" value="{{ $product->slug }}">
					<div class="row align-items-end">
						<div class="col-12" id="checkout">
							<h3>Datos Personales</h3>
							<section>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Nombre</label>
											<input type="text" class="form-control" name="name" placeholder="Introduzca su nombre" @guest required @else readonly value="{{ Auth::user()->name }}" @endguest>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Apellido</label>
											<input type="text" class="form-control" name="lastname" placeholder="Introduzca su apellido" @guest required @else readonly value="{{ Auth::user()->lastname }}" @endguest>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Correo Electrónico</label>
											<input type="email" class="form-control" name="email" placeholder="{{ 'Ejm: correo@gmail.com' }}" data-culqi="card[email]" id="card[email]" @guest required @else readonly value="{{ Auth::user()->email }}" @endguest>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Teléfono</label>
											@guest
											<input type="text" class="form-control" name="phone" placeholder="Introduzca su teléfono" required>
											@else
											<input type="text" class="form-control" name="phone" placeholder="Introduzca su teléfono" @if(Auth::user()->phone!=null || Auth::user()->phone!="") readonly value="{{ Auth::user()->phone }}" @else required @endif>
											@endguest
											
										</div>
									</div>
									
								</div>
							</section>
							<h3>Envio</h3>
							<section>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>¿Quieres que te lo envien?</label>
											<div class="row">
												<div class="col-2 d-flex">
													<input type="radio" class="mr-2 mt-2" name="delivery" value="yes" checked> Si
												</div>
												<div class="col-2 d-flex">
													<input type="radio" class="mr-2 mt-2" name="delivery" value="no"> No
												</div>					
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Dirección</label>
											<input type="text" class="form-control" name="address" required placeholder="Ingresa tu dirección">
										</div>
									</div>
										{{-- <div class="col-md-6">
											<div class="form-group">
												<label>Ciudad/Pueblo</label>
												<input type="text" class="form-control" placeholder="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Código Postal/ZIP *</label>
												<input type="text" class="form-control" placeholder="">
											</div>
										</div> --}}
									</div>
								</section>
								<h3>Pago</h3>
								<section>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>¿Qué metodo de pago quieres?</label>
												<div class="row">
													<div class="col-md-6 d-flex">
														<input type="radio" class="mr-2 mt-2" name="pay" value="card" checked> Tarjeta de crédito o debito
													</div>
													<div class="col-md-6 d-flex">
														<input type="radio" class="mr-2 mt-2" name="pay" value="transfer"> Tranferencia Bancaria 
													</div>					
												</div>	
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label>Número de Tarjeta</label>
												<input type="text" class="form-control" name="card" required placeholder="Introduce tu número de tarjeta" data-culqi="card[number]" id="card[number]" >
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Código de Seguridad</label>
												<input type="text" class="form-control" name="code" required placeholder="123" data-culqi="card[cvv]" id="card[cvv]">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Fecha de Expiración (Mes/Año)</label>
												<div class="input-group">
													<input type="text" class="form-control" name="month" required placeholder="01" data-culqi="card[exp_month]" id="card[exp_month]">
													<input type="text" class="form-control" name="year" required placeholder="2020" data-culqi="card[exp_year]" id="card[exp_year]">
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
					</form>
				</div>
				<div class="col-xl-5">
					<div class="row pt-3">
						<div class="col-md-12 d-flex mb-5">
							<div class="cart-detail cart-total p-3 p-md-4 bg-white">
								<h3 class="billing-heading mb-4">Total del Total</h3>
								<p class="d-flex">
									<span>Subtotal</span>
									<span>{{ "S/. ".productPrice($product, 1) }}</span>
								</p>
								{{-- <p class="d-flex">
									<span>Envio</span>
									<span>$0.00</span>
								</p> --}}
								@if($product->ofert>0)
								<p class="d-flex">
									<span>Descuento</span>
									<span>{{ "S/. ".productPrice($product, 2) }}</span>
								</p>
								@endif
								<hr>
								<p class="d-flex total-price">
									<span>Total</span>
									@if($product->ofert>0)
									<span>{{ "S/. ".productPrice($product, 1)-productPrice($product, 2) }}</span>
									@else
									<span>{{ "S/. ".productPrice($product, 1) }}</span>
									@endif
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection

	@section('script')
	<script src="{{ asset('/web/vendors/steps/jquery.steps.js') }}"></script>
	<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
	<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
	<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
	<script src="https://checkout.culqi.com/v2"></script>
	@endsection