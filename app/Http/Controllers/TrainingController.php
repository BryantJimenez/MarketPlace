<?php

namespace App\Http\Controllers;
 
use App\Training;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.training');
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.trainingRegister');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Training  $Training
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Training  $Training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Training  $Training
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       
    }

    public function show($slug)
    {

    	return view('web.trainingSingle');

    }

}
