<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\WebBlogStoreRequest;
use App\Http\Requests\WebBlogUpdateRequest;

class BlogController extends Controller
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
         $blog=Blog::orderBy('id', 'DESC')->get();
         $num=1;
        return view('admin.blogs.index', compact('blog', 'num'));
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
        $count=Blog::where('title', request('title'))->count();
        $slug=Str::slug(request('title'), '-');
        if ($count>0) {
            $slug=$slug.$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Blog::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=$slug.$num;
                $num++;
            } else {
                $data=array('title' => request('title'), 'slug' => $slug, 'content' => request('content'), 'user_id' => request('user_id'));
                break;
            }
        }


        $blog=Blog::create($data)->save();
        if ($blog) {
            return redirect()->route('blog.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'El artículo ha sido registrada exitosamente.']);
        } else {
            return redirect()->route('blog.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $blog=Blog::where('slug', $slug)->firstOrFail();
        return view('admin.blogs.edit', compact("blog"));
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
        $blog=Blog::where('slug', $slug)->firstOrFail();
        $data=array('title' => request('title'), 'slug' => request('slug'), 'content' => request('content'), 'user_id' => request('user_id'));

        $blog->fill($data)->save();

        if ($blog) {
            return redirect()->route('blog.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El artículo ha sido editado exitosamente.']);
        } else {
            return redirect()->route('blog.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
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
        $blogs=Blog::where('slug', $slug)->firstOrFail();
        $blogs->delete();

        if ($blogs) {
            return redirect()->route('blog.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La Marca ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('blog.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
