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
				<form action="#" method="POST" class="billing-form">
					{{-- <h3 class="mb-4 billing-heading">Datos del Comprador</h3> --}}
					<div class="row align-items-end">
						<div class="col-12" id="checkout">
							<h3>Datos Personales</h3>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nombre</label>
											<input type="text" class="form-control" placeholder=" ">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Apellido</label>
											<input type="text" class="form-control" placeholder="">
										</div>
									</div>
									{{-- <div class="col-md-12">
										<div class="form-group">
											<label for="country">State / Country</label>
											<div class="select-wrap">
												<div class="icon"><span class="ion-ios-arrow-down"></span></div>
												<select name="" id="" class="form-control">
													<option value="">France</option>
													<option value="">Italy</option>
													<option value="">Philippines</option>
													<option value="">South Korea</option>
													<option value="">Hongkong</option>
													<option value="">Japan</option>
												</select>
											</div>
										</div>
									</div> --}}
									<div class="col-md-6">
										<div class="form-group">
											<label>Teléfono</label>
											<input type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Correo Electrónico</label>
											<input type="email" class="form-control" placeholder="" data-culqi="card[email]" id="card[email]">
										</div>
									</div>
									
								</div>
							</section>
							<h3>Envio</h3>
							<section>
								<div class="col-md-12">
									<div class="form-group">
										<label>Dirección</label>
										<input type="text" class="form-control" placeholder="House number and street name">
									</div>
								</div>
								<div class="col-md-6">
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
								</div>
							</section>
							<h3>Pago</h3>
							<section>
								<div class="col-md-12">
									<div class="form-group">
										<label>Número de Tarjeta</label>
										<input type="text" class="form-control" placeholder="" data-culqi="card[number]" id="card[number]">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Código de Seguridad</label>
										<input type="text" class="form-control" placeholder="" data-culqi="card[cvv]" id="card[cvv]">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Fecha de Expiración (MM/YYYY)</label>
										<input type="text" class="form-control" placeholder="" data-culqi="card[exp_month]" id="card[exp_month]">
										<input type="text" class="form-control" placeholder="" data-culqi="card[exp_year]" id="card[exp_year]">
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
								<span>$20.60</span>
							</p>
							{{-- <p class="d-flex">
								<span>Envio</span>
								<span>$0.00</span>
							</p> --}}
							{{-- <p class="d-flex">
								<span>Descuento</span>
								<span>$3.00</span>
							</p> --}}
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
								<span>$17.60</span>
							</p>
						</div>
					</div>
					<div class="col-md-12">
						<div class="cart-detail p-3 p-md-4 bg-white">
							<h3 class="billing-heading mb-4">Método de Pago</h3>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
										<label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
									</div>
								</div>
							</div>
							<p><a href="#" class="btn btn-primary py-3 px-4" id="btn_pagar">Place an order</a></p>
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
<script src="https://checkout.culqi.com/v2"></script>
@endsection