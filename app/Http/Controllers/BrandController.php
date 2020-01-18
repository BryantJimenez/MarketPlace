<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;

class BrandController extends Controller
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
        $brands=Brand::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.brands.index', compact('brands', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreRequest $request)
    {
        $count=Brand::where('name', request('name'))->count();
        $slug=Str::slug(request('name'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Brand::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=$slug."-".$num;
                $num++;
            } else {
                $data=array('name' => request('name'), 'slug' => $slug, 'quality' => request('quality'));
                break;
            }
        }

        // Mover imagen a carpeta brands y extraer nombre
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $image=time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/admins/img/brands/', $image);
            $data['image']=$image;
        }

        $brand=Brand::create($data)->save();
        if ($brand) {
            return redirect()->route('marcas.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La Marca ha sido registrada exitosamente.']);
        } else {
            return redirect()->route('marcas.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $brand=Brand::where('slug', $slug)->firstOrFail();
        return view('admin.brands.edit', compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, $slug)
    {
        $brand=Brand::where('slug', $slug)->firstOrFail();
        $data=array('name' => request('name'), 'quality' => request('quality'));

        // Mover imagen a carpeta brands y extraer nombre
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $image=time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/admins/img/brands/', $image);
            $data['image']=$image;
        }

        $brand->fill($data)->save();

        if ($brand) {
            return redirect()->route('marcas.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La marca ha sido editada exitosamente.']);
        } else {
            return redirect()->route('marcas.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $brands=Brand::where('slug', $slug)->firstOrFail();
        $brands->delete();

        if ($brands) {
            return redirect()->route('marcas.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La Marca ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('marcas.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
