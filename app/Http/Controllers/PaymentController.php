<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Sale;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sales.index');

    }

    /**
     * Show the form for creating a new resource.
     
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.sales.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<< HEAD
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
<<<<<<< HEAD
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
public function destroy($slug)
{
       //
}



