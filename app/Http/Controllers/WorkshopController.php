<?php

namespace App\Http\Controllers;

use App\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
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
    	$workshops=Workshop::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.workshops.index', compact('workshops', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// return view('web.CourseRegister');
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
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('web.CourseSingle');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
    	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
    	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

    }


    public function workshopsRequest() {
        // $storesRequest=Workshop::select('stores.id', 'stores.name', 'store_user.state', 'stores.slug')->join('store_user', 'stores.id', '=', 'store_user.store_id')->where('store_user.request', 1)->get();
        // $num=1;
        // return view('admin.stores.stores.index', compact('storesRequest', 'num'));
    }

    public function workshopsRequestShow($slug)
    {
        $workshop=Workshop::where('slug', $slug)->firstOrFail();
        return view('admin.workshop.requestShow', compact('workshop')); 
    }

    public function confirm(Request $request, $slug)
    {
        // $storeUser=StoreUser::where('slug', $slug)->firstOrFail();
        // $store=Store::where('id', $storeUser->store_id)->firstOrFail();

        // $storeUser->fill(['state' => 1])->save();
        // $store->fill(['state' => 1])->save();

        // if ($storeUser && $store) {
        //     return redirect()->back()->with(['type' => 'success', 'title' => 'Confirmación exitosa', 'msg' => 'La solicitud ha sido confirmada exitosamente.']);
        // } else {
        //     return redirect()->back()->with(['type' => 'error', 'title' => 'Confirmación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        // }   
    }

    public function refuse(Request $request, $slug)
    {
        // $store=Store::where('slug', $slug)->firstOrFail();
        // $storeUser=StoreUser::where('store_id', $store->id)->first();
        // $storeUser->fill(['state' => 3, 'explanation' => request('explanation')])->save();

        // if ($storeUser) {
        //     return redirect()->back()->with(['type' => 'success', 'title' => 'Rechazo exitoso', 'msg' => 'La solicitud ha sido rechazada exitosamente.']);
        // } else {
        //     return redirect()->back()->with(['type' => 'error', 'title' => 'Rechazo fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        // }
    }
}
