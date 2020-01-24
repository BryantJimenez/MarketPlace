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
        $blogs=Blog::where('state', 1)->orderBy('id', 'DESC')->get();
        return view('web.blog', compact("blogs"));
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
        $blog=Blog::where('slug', $slug)->firstOrFail();
        return view('web.blogs', compact('blog'));
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
}