<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\WebBlogStoreRequest;
use App\Http\Requests\WebBlogUpdateRequest;

class WebBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        // $blogs=Blog::orderBy('id', 'DESC')->get();
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;
        return view('web.blog', compact("cart"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebBlogStoreRequest $request)
    {
        // $count=Blog::where('name', request('name'))->count();
        // $slug=Str::slug(request('name'), '-');
        // if ($count>0) {
        //     $slug=$slug.$count;
        // }

        // // Validación para que no se repita el slug
        // $num=0;
        // while (true) {
        //     $count2=Blog::where('slug', $slug)->count();
        //     if ($count2>0) {
        //         $slug=$slug.$num;
        //         $num++;
        //     } else {
        //         $data=array('name' => request('name'), 'slug' => $slug, );
        //         break;
        //     }
        // }

        // // Mover imagen a carpeta Blogs y extraer nombre
        // if ($request->hasFile('image')) {
        //     $file=$request->file('image');
        //     $image=time()."_".$file->getClientOriginalName();
        //     $file->move(public_path().'/admins/img/blog/', $image);
        //     $data['image']=$image;
        // }

        // $blog=Blog::create($data)->save();
        // if ($blog) {
        //     return redirect()->route('web.blog.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'El artículo ha sido registrada exitosamente.']);
        // } else {
        //     return redirect()->route('web.blog.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        // $blog=Blog::where('slug', $slug)->firstOrFail();
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;
        return view('web.blogs', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // $blog=Blog::where('slug', $slug)->firstOrFail();
        // return view('admin.blog.edit', compact("blog"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(WebBlogUpdateRequest $request, $slug)
    {
        // $blog=Blog::where('slug', $slug)->firstOrFail();
        // $data=array('name' => request('name'));

        // // Mover imagen a carpeta blogs y extraer nombre
        // if ($request->hasFile('image')) {
        //     $file=$request->file('image');
        //     $image=time()."_".$file->getClientOriginalName();
        //     $file->move(public_path().'/admins/img/blog/', $image);
        //     $data['image']=$image;
        // }

        // $blog->fill($data)->save();

        // if ($blog) {
        //     return redirect()->route('web.blog.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El artículo ha sido editado exitosamente.']);
        // } else {
        //     return redirect()->route('web.blog.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // $blogs=Blog::where('slug', $slug)->firstOrFail();
        // $blogs->delete();

        // if ($blogs) {
        //     return redirect()->route('web.blog.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La Marca ha sido eliminada exitosamente.']);
        // } else {
        //     return redirect()->route('web.blog.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        // }
    }
}
