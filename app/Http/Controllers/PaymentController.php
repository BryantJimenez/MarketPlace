<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Country;
use App\Payment;
use App\Product;
use App\PaymentProduct;
use App\Transfer;
use App\Card;
use App\Delivery;
use Culqi\Culqi;
use Culqi\CulqiException;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payment::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.sales.index', compact("payments", "num"));
    }

    public function payProduct(Request $request)
    {
        $paymentCount=Payment::all()->count();
        if ($paymentCount>0) {
            $count=Payment::orderBy('id', 'DESC')->first();
            $slug="compra-".$count->id;
        } else {
            $slug="compra-0";
        }
        $product=Product::where('slug', request('slug'))->firstOrFail();
        $description="Venta de ".request('qty')." cantidades del producto: ".$product->name.".";
        if ($product->ofert>0) {
            $price=$product->price-($product->price*$product->ofert/100);
        } else {
            $price=$product->price;
        }
        $total=number_format(request('qty')*$price, 2, ".", "");

        if (request('pay')==1) {
            $SECRET_KEY = "sk_test_FsqzQFJOUgoyTIiM";
            $culqi = new Culqi(array('api_key' => $SECRET_KEY));

            // Creamos Cargo a una tarjeta
            $charge=$culqi->Charges->create(
                array(
                    "amount" => number_format($total, 2, "", ""),
                    "capture" => true,
                    "currency_code" => "PEN",
                    "description" => $description,
                    "email" => request('email'),
                    "installments" => 0,
                    "antifraud_details" => array(
                        "address" => request("address"),
                        "address_city" => null,
                        "country_code" => "PE",
                        "first_name" => request("name"),
                        "last_name" => request("lastname"),
                        "phone_number" => request("phone"),
                    ),
                    "source_id" => request('culqi')
                )
            );

            if (is_array($charge) && $charge['object']=="error") {
                if (isset($charge['user_message'])) {
                    return redirect()->back()->with(['type' => 'error', 'title' => 'Compra fallida', 'msg' => $charge['user_message']]);
                } else {
                    return redirect()->back()->with(['type' => 'error', 'title' => 'Compra fallida', 'msg' => 'Los datos ingresados son invalidos, intentelo denuevo.']);
                }
            }

            $countryUser=Country::where('code', $charge->source->client->ip_country_code)->first();
            $countryCard=Country::where('code', $charge->source->iin->issuer->country_code)->first();
            $total_fee=$charge->total_fee/100;
            $transfer_amount=$charge->transfer_amount/100;

            $payment=Payment::create(['slug' => $slug, 'shape' => request('pay'), 'type' => 1, 'total' => $total, 'reference' => $charge->reference_code, 'currency' => 'PEN', 'device' => $charge->source->client->device_type, 'description' => $description, 'state' => 1, 'ip_country_id' => $countryUser->id, 'user_id' => Auth::user()->id]);
            $card=Card::create(['bank' => $charge->source->iin->issuer->name, 'brand' => $charge->source->iin->card_brand, 'fraud_score' => $charge->fraud_score, 'total_fee' => $total_fee, 'transfer_amount' => $transfer_amount, 'type' => $charge->source->iin->card_type, 'country_id' => $countryCard->id, 'payment_id' => $payment->id])->save();

            PaymentProduct::create(['payment_id' => $payment->id, 'product_id' => $product->id, 'qty' => request('qty'), 'ofert' => $product->ofert, 'price' => $product->price]);

            $qty=$product->qty-$payment->products[0]->pivot->qty;
            $product->fill(['qty' => $qty])->save();

        } elseif (request('pay')==2) {
            $userBank=Bank::where('slug', request('user_bank'))->firstOrFail();
            $destinyBank=Bank::where('slug', request('destiny_bank'))->firstOrFail();
            
            $ipInfo=file_get_contents("http://www.geoplugin.net/json.gp?ip=74.125.224.72");
            $ip=json_decode($ipInfo);
            $countryUser=Country::where('code', $ip->geoplugin_countryCode)->first();
            $agent=new Agent();
            if ($agent->isDesktop()) {
                $device="Escritorio";
            } elseif ($agent->isMobile()) {
                if ($agent->isPhone()) {
                    $device="Teléfono";
                } elseif ($agent->isTablet()) {
                    $device="Tablet";
                }
            }

            $payment=Payment::create(['slug' => $slug, 'shape' => request('pay'), 'type' => 1, 'total' => $total, 'reference' => request('reference'), 'currency' => 'PEN', 'device' => $device, 'description' => $description, 'state' => 2, 'ip_country_id' => $countryUser->id, 'user_id' => Auth::user()->id]);

            $transfer=Transfer::create(['payment_id' => $payment->id, 'bank' => $userBank->name])->save();

            PaymentProduct::create(['payment_id' => $payment->id, 'product_id' => $product->id, 'bank' => $destinyBank->name, 'qty' => request('qty'), 'ofert' => $product->ofert, 'price' => $product->price]);
        } else {
            return redirect()->back()->with(['type' => 'error', 'title' => 'Compra fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }

        if (request('delivery')=='yes') {
            Delivery::create(['payment_id' => $payment->id]);
        }

        if (isset($transfer) && $transfer) {
            return redirect()->back()->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La compra esta en proceso de revisión para confirmar la realización de la transferencia.']);
        } elseif (isset($card) && $card) {
            return redirect()->back()->with(['type' => 'success', 'title' => 'Compra exitosa', 'msg' => 'La compra ha sido finalizada exitosamente.']);
        } else {
            return redirect()->back()->with(['type' => 'error', 'title' => 'Compra fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intnetelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $payment=Payment::where('slug', $slug)->firstOrFail();
        return view('admin.sales.show', compact("payment"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     
     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Sale $sale)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       //
    }

    public function calculator(Request $request)
    {
        $product=Product::where('slug', request('slug'))->firstOrFail();
        if ($product->ofert>0) {
            $price=$product->price-($product->price*$product->ofert/100);
        } else {
            $price=$product->price;
        }
        $total=number_format(request('qty')*$price, 2, ".", "");

        return response()->json(['total' => $total]);
    }

    public function confirm(Request $request, $slug) {
        $payment=Payment::where('slug', $slug)->firstOrFail();

        if ($payment->products[0]->qty>$payment->products[0]->pivot->qty) {
            $payment->fill(['state' => 1])->save();

            $product=Product::where('id', $payment->products[0]->id)->firstOrFail();
            $qty=$payment->products[0]->qty-$payment->products[0]->pivot->qty;
            $product->fill(['qty' => $qty])->save();

            $paymentProduct=PaymentProduct::where('payment_id', $payment->id)->where('product_id', $payment->products[0]->id)->firstOrFail();
            $paymentProduct->fill(['state' => 2])->save();

            if ($payment) {
                return redirect()->back()->with(['type' => 'success', 'title' => 'Confirmación exitosa', 'msg' => 'El pago ha sido confirmado exitosamente.']);
            } else {
                return redirect()->route()->with(['type' => 'error', 'title' => 'Confirmación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
            }   
        } else {
            return redirect()->route()->with(['type' => 'warning', 'title' => 'Confirmación fallida', 'msg' => 'La cantidad del producto no es suficiente para confirmar la compra.']);
        }
    }

    public function refuse(Request $request, $slug) {
        $payment=Payment::where('slug', $slug)->firstOrFail();
        $payment->fill(['state' => 3, 'explanation' => request('explanation')])->save();

        if ($payment) {
            return redirect()->back()->with(['type' => 'success', 'title' => 'Rechazo exitoso', 'msg' => 'El pago ha sido rechazado exitosamente.']);
        } else {
            return redirect()->route()->with(['type' => 'error', 'title' => 'Rechazo fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}