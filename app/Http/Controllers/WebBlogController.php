<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\WebBlogStoreRequest;
use App\Http\Requests\WebBlogUpdateRequest;
use Auth;

class WebBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        if ($request->has('buscar') && !empty(request('buscar'))) {
            $blogs=Blog::where('state', 1)->where('slug', 'LIKE', '%'.Str::slug(request('buscar'), '-').'%')->orderBy('id', 'DESC')->get();
        } else {
            $blogs=Blog::where('state', 1)->orderBy('id', 'DESC')->get();    
        }
        $recents=Blog::where('state', 1)->orderBy('id', 'DESC')->limit(3)->inRandomOrder()->get();
        $search=$request->all();
        $num=1;
        return view('web.blog', compact("blogs", "recents", "search", "num"));
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
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $blog=Blog::where('slug', $slug)->where('state', 1)->firstOrFail();
        $recents=Blog::where('state', 1)->orderBy('id', 'DESC')->limit(3)->inRandomOrder()->get();
        return view('web.blogSingle', compact('blog', 'recents'));
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

    public function myArticles()
    {
        $blogs=Blog::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('web.myarticles', compact('blogs'));
    }

    public function articleCreate()
    {
        return view('web.articlecreate');
    }
}