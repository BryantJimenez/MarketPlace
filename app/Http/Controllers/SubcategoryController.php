<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
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
        $subcategories=Subcategory::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.subcategories.index', compact('subcategories', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Subcategory::where('name', request('name'))->count();
        $slug=Str::slug(request('name'), '-');
        if ($count>0) {
            $slug=$slug.$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Subcategory::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=$slug.$num;
                $num++;
            } else {
                $category=Category::where('slug', request('category'))->firstOrFail();
                $data=array('name' => request('name'), 'slug' => $slug, 'category_id' => $category->id);
                break;
            }
        }

        $subcategory=Subcategory::create($data)->save();
        if ($subcategory) {
            return redirect()->route('subcategorias.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La subcategoria ha sido registrada exitosamente.']);
        } else {
            return redirect()->route('subcategorias.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $subcategory=Subcategory::where('slug', $slug)->firstOrFail();
        $categories=Category::all();
        return view('admin.subcategories.edit', compact("subcategory", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $subcategory=Subcategory::where('slug', $slug)->firstOrFail();
        $category=Category::where('slug', request('category'))->firstOrFail();
        $data=array('name' => request('name'), 'category_id' => $category->id);

        $subcategory->fill($data)->save();

        if ($subcategory) {
            return redirect()->route('subcategorias.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La subcategoria ha sido editada exitosamente.']);
        } else {
            return redirect()->route('subcategorias.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $subcategory=Subcategory::where('slug', $slug)->firstOrFail();
        $subcategory->delete();

        if ($subcategory) {
            return redirect()->route('subcategorias.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La subcategoria ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('subcategorias.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function addSubcategories($slug)
    {
        $category=Category::where('slug', $slug)->firstOrFail();
        $subcategories=Subcategory::where('category_id', $category->id)->get();

        // Agregar subcategorias al arreglo
        $num=0;
        foreach ($subcategories as $subcategory) {
            $data[$num]=['slug' => $subcategory->slug, 'name' => $subcategory->name];
            $num++;
        }
        return response()->json($data);
    }
}
