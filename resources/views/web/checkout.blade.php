@extends('layouts.web')

@section('title', 'Comprar')

@section('links')
<link rel="stylesheet" href="{{ asset('/web/vendors/steps/jquery.steps.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/touchspin/jquery.bootstrap-touchspin.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
@endsection

@section('content')
<section class="ftco-section pt-4 bg-light">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
				<div class="row">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4 bg-white">
							<div class="row mb-2">
								<div class="col-lg-4 col-md-4 col-sm-5 col-12">
									{!! imageCardProduct($product) !!}
								</div>
								<div class="col-lg-8 col-md-8 col-sm-7 col-12">
									<p class="text-primary">{{ $product->name }}</p>
									<input type="text" class="quantity qty form-control" value="1" min="1" max="{{ $product->qty }}" slug="{{ $product->slug }}">
								</div>
							</div>
							<h3 class="billing-heading mb-2">Total a Pagar</h3>
							<p class="d-flex">
								<span>Subtotal</span>
								<span>{{ "S/. ".productPrice($product, 1) }}</span>
							</p>
							<p class="d-flex">
								<span>Envio</span>
								<span>S/. 0.00</span>
							</p>
							@if($product->ofert>0)
							<p class="d-flex">
								<span>Descuento</span>
								<span>{{ "S/. ".number_format($product->price*$product->ofert/100, 2, ".", "") }}</span>
							</p>
							@endif
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
								@if($product->ofert>0)
								<span class="total">{{ "S/. ".number_format($product->price-($product->price*$product->ofert/100), 2, ".", "") }}</span>
								@else
								<span class="total">{{ "S/. ".number_format($product->price, 2, ".", "") }}</span>
								@endif
							</p>
						</div>
					</div>
				</div>
			</div>
			
			@guest
			<div class="col-xl-4 col-lg-4 order-lg-0 order-xl-0 ftco-animate">
				<form action="{{ route('login') }}" method="POST" id="formLogin">
					@csrf
					<div class="row align-items-end">
						<div class="col-12">
							<div class="cart-detail cart-total p-3 p-md-4 bg-white">
								<p class="h4 text-center mt-2">Iniciar Sesión</p>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Correo Electrónico</label>
											<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required placeholder="{{ 'ejemplo@gmail.com' }}" value="{{ old('email') }}">
										</div>
										@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Contraseña</label>
											<input class="form-control @error('password') is-invalid @enderror" type="password" required name="password" placeholder="********">
										</div>
										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="col-12">
										<div class="form-group text-center">
											<button class="btn btn-primary" type="submit" action="login">Ingresar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="col-xl-4 col-lg-4 order-lg-0 order-xl-0 ftco-animate">
				<form action="{{ route('register') }}" method="POST" id="formRegister">
					@csrf
					<div class="row align-items-end">
						<div class="col-12">
							<div class="cart-detail cart-total p-3 p-md-4 bg-white">
								<p class="h4 text-center mt-2">Registrarse</p>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Nombre</label>
											<input class="form-control @error('name') is-invalid @enderror" type="text" name="name" required placeholder="Ejm: Juan" value="{{ old('name') }}" autocomplete="name" autofocus>
										</div>
										@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Apellido</label>
											<input class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname" required placeholder="Ejm: Lopez" value="{{ old('lastname') }}" autocomplete="lastname">
										</div>
										@error('lastname')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Correo Electrónico</label>
											<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required placeholder="{{ 'ejemplo@gmail.com' }}" value="{{ old('email') }}">
										</div>
										@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Contraseña</label>
											<input class="form-control @error('password') is-invalid @enderror" type="password" required name="password" placeholder="********" id="password">
										</div>
										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Confirmar Contraseña</label>
											<input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="********">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group text-center">
											<button class="btn btn-primary" type="submit" action="register">Registrarse</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			@else
			<div class="col-xl-8 col-lg-8 order-lg-0 order-xl-0 ftco-animate">
				<form action="{{ route('pagar.product') }}" method="POST" class="billing-form">
					@csrf
					<input type="hidden" name="culqi" id="culqi">
					<input type="hidden" name="slug" value="{{ $product->slug }}">
					<input type="hidden" name="qty" value="1" id="qtySale">
					<div class="row align-items-end">
						<div class="col-12" id="checkout">
							<h3>Datos Personales</h3>
							<section>
								<p class="h6">Campos obligatorios (<b class="text-danger">*</b>)</p>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Nombre<b class="text-danger">*</b></label>
											<input type="text" class="form-control" name="name" placeholder="Introduzca su nombre" readonly value="{{ Auth::user()->name }}">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Apellido<b class="text-danger">*</b></label>
											<input type="text" class="form-control" name="lastname" placeholder="Introduzca su apellido" readonly value="{{ Auth::user()->lastname }}">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Correo Electrónico<b class="text-danger">*</b></label>
											<input type="email" class="form-control" name="email" placeholder="{{ 'Ejm: correo@gmail.com' }}" data-culqi="card[email]" id="card[email]" readonly value="{{ Auth::user()->email }}">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Teléfono<b class="text-danger">*</b></label>
											<input type="text" class="form-control" name="phone" placeholder="Introduzca su teléfono" @if(Auth::user()->phone!=null || Auth::user()->phone!="") readonly value="{{ Auth::user()->phone }}" @else required @endif>
										</div>
									</div>
									
								</div>
							</section>
							<h3>Envio</h3>
							<section>
								<p class="h6">Campos obligatorios (<b class="text-danger">*</b>)</p>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>¿Quieres que te envien tu compra?<b class="text-danger">*</b></label>
											<div class="select-wrap">
												<div class="icon"><span class="ion-ios-arrow-down"></span></div>
												<select name="delivery" required class="form-control">
													<option value="no">No</option>
													{{-- <option value="yes">Si</option> --}}
												</select>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Dirección<b class="text-danger">*</b></label>
											<input type="text" class="form-control" name="address" required placeholder="Ingresa tu dirección">
										</div>
									</div>
								</div>
							</section>
							<h3>Pago</h3>
							<section>
								<p class="h6">Campos obligatorios (<b class="text-danger">*</b>)</p>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>¿Qué metodo de pago quieres utilizar?<b class="text-danger">*</b></label>
											<select name="pay" required class="form-control" id="selectPay">
												<option value="1">Tarjeta de crédito o debito</option>
												<option value="2">Tranferencia Bancaria</option>
											</select>
										</div>
									</div>
									<div class="col-12" id="cardFields">
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label>Número de Tarjeta<b class="text-danger">*</b></label>
													<input type="text" class="form-control" name="card" required minlength="16" maxlength="16" placeholder="Introduce tu número de tarjeta" data-culqi="card[number]" id="card[number]" >
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-12">
												<div class="form-group">
													<label>Código de Seguridad<b class="text-danger">*</b></label>
													<input type="text" class="form-control" name="code" required minlength="3" maxlength="3" placeholder="123" data-culqi="card[cvv]" id="card[cvv]">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Fecha de Expiración<b class="text-danger">*</b></label>
													<div class="input-group">
														<input type="text" class="form-control" name="month" required minlength="2" maxlength="2" placeholder="01 (Mes)" data-culqi="card[exp_month]" id="card[exp_month]">
														<input type="text" class="form-control" name="year" required minlength="4" maxlength="4" placeholder="2020 (Año)" data-culqi="card[exp_year]" id="card[exp_year]">
													</div>
												</div>
											</div>	
										</div>
									</div>

									<div class="col-12 d-none" id="transferFields">
										<div class="row">
											<div class="col-lg-6 col-md-6 col-12">
												<div class="form-group">
													<label>Banco Emisor<b class="text-danger">*</b></label>
													<div class="select-wrap">
														<div class="icon"><span class="ion-ios-arrow-down"></span></div>
														<select name="user_bank" required disabled class="form-control">
															<option value="">Seleccione</option>
															@foreach($banks as $bank)
															<option value="{{ $bank->slug }}">{{ $bank->name }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-12">
												<div class="form-group">
													<label>Banco Destino<b class="text-danger">*</b></label>
													<div class="select-wrap">
														<div class="icon"><span class="ion-ios-arrow-down"></span></div>
														<select name="destiny_bank" required disabled class="form-control">
															<option value="">Seleccione</option>
															@foreach($banks as $bank)
															<option value="{{ $bank->slug }}">{{ $bank->name }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<label>Código o Número de Referencia<b class="text-danger">*</b></label>
													<input type="text" class="form-control" name="reference" required minlength="5" maxlength="25" placeholder="Introduce el código o número de referencia" disabled>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</form>
			</div>
			@endguest
		</div>
	</div>
</section>
@endsection

@section('script')
<script src="{{ asset('/admins/vendors/lobibox/Lobibox.js') }}"></script>
<script src="{{ asset('/admins/vendors/touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('/web/vendors/steps/jquery.steps.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
<script src="https://checkout.culqi.com/v2"></script>
@endsection