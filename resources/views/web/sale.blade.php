@extends('layouts.web')

@section('title', 'Detalles de la Compra')

@section('content')

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-12 ftco-animate">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<p><strong>Forma de Pago:</strong> {!! saleShape($payment->shape) !!}</p>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<p><strong>Estado:</strong> {!! saleState($payment->state) !!}</p>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<p><strong>Moneda:</strong> {{ $payment->currency }}</p>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<p><strong>Referencia:</strong> {{ $payment->reference }}</p>
					</div>
					@if($payment->card)
					<div class="col-lg-6 col-md-6 col-12">
						<p><strong>Banco Emisor:</strong> {{ $payment->card->bank }}</p>
					</div>
					@elseif($payment->transfer)
					<div class="col-lg-6 col-md-6 col-12">
						<p><strong>Banco Emisor:</strong> {{ $payment->transfer->bank }}</p>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<p><strong>Banco Receptor:</strong> {{ $payment->products[0]->pivot->bank }}</p>
					</div>
					@endif
					<div class="col-lg-6 col-md-6 col-12">
						<p><strong>Fecha del Pago:</strong> {{ date('d-m-Y', strtotime($payment->created_at)) }}</p>
					</div>
					<div class="col-12">
						<p><strong>Descripción:</strong> {{ $payment->description }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-md-5 col-12 ftco-animate">
				<div class="cart-detail cart-total p-3 p-md-4 bg-white">
					<div class="row mb-2">
						<div class="col-lg-4 col-md-4 col-sm-5 col-12">
							{!! imageCardProduct($payment->products[0]) !!}
						</div>
						<div class="col-lg-8 col-md-8 col-sm-7 col-12">
							<p class="text-primary mb-1">{{ $payment->products[0]->name }}</p>
							<p><strong>Cantidad:</strong> {{ $payment->products[0]->pivot->qty }}</p>
						</div>
					</div>
					<h3 class="billing-heading mb-2">Total del Pago</h3>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>{{ "S/. ".number_format($payment->products[0]->pivot->price*$payment->products[0]->pivot->qty, 2, '.', '') }}</span>
					</p>
					<p class="d-flex">
						<span>Envio</span>
						<span>S/. 0.00</span>
					</p>
					@if($payment->products[0]->pivot->ofert>0)
					<p class="d-flex">
						<span>Descuento</span>
						<span>{{ "S/. ".number_format($payment->total*$payment->products[0]->pivot->ofert/100, 2, ".", "") }}</span>
					</p>
					@endif
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span>{{ "S/. ".number_format($payment->total, 2, ".", "") }}</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('script')
@endsection