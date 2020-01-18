<?php

namespace App\Http\Controllers;

use App\Store;
use App\District;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\StoreUpdateRequest;

class StoreController extends Controller
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
        $stores=Store::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.stores.index', compact('stores', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts=District::where('province_id', 1501)->get();
        return view('admin.stores.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request)
    {
        $count=Store::where('name', request('name'))->count();
        $slug=Str::slug(request('name'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Store::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=$slug."-".$num;
                $num++;
            } else {
                $district=District::where('id', request('district_id'))->where('province_id', 1501)->firstOrFail();
                $data=array('name' => request('name'), 'slug' => $slug, 'district_id' => $district->id, 'address' => request('address'), 'phone' => request('phone'), 'lat' => request('lat'), 'lng' => request('lng'));
                break;
            }
        }

        $store=Store::create($data)->save();
        if ($store) {
            return redirect()->route('tiendas.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La tienda ha sido registrada exitosamente.']);
        } else {
            return redirect()->route('tiendas.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $store=Store::where('slug', $slug)->firstOrFail();
        $districts=District::where('province_id', 1501)->get();
        return view('admin.stores.edit', compact("store", "districts"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRequest $request, $slug)
    {
        $store=Store::where('slug', $slug)->firstOrFail();
        $district=District::where('id', request('district_id'))->where('province_id', 1501)->firstOrFail();
        $data=array('name' => request('name'), 'district_id' => $district->id, 'address' => request('address'), 'phone' => request('phone'), 'lat' => request('lat'), 'lng' => request('lng'));
        $store->fill($data)->save();

        if ($store) {
            return redirect()->route('tiendas.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La tienda ha sido editada exitosamente.']);
        } else {
            return redirect()->route('tiendas.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $store=Store::where('slug', $slug)->firstOrFail();
        $store->delete();

        if ($store) {
            return redirect()->route('tiendas.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La tienda ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('tiendas.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
