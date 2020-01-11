<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\District;
use App\Store;
use App\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class WebController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
    	$products=Product::limit(8)->get();
        $brands=Brand::all();
    	$categories=Category::all();
    	$stores=Store::all();
        $num=0;
        $districts=[];
        foreach ($stores as $store) {
            if (array_search($store->district_id, array_column($districts, 'id'))===false) {
                $districts[$num]=['name' => $store->district->name, 'id' => $store->district->id];
                $num++;
            }
        }
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

        return view('web.home', compact("categories", "brands", "stores", "products", "districts", "cart"));
    }

    public function shop(Request $request) {
        $categories=Category::all();
        $stores=Store::all();
        $num=0;
        $districts=[];
        foreach ($stores as $store) {
            if (array_search($store->district_id, array_column($districts, 'id'))===false) {
                $districts[$num]=['name' => $store->district->name, 'id' => $store->district->id];
                $num++;
            }
        }
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

        $products=Product::select('id', 'slug', 'name', 'price', 'ofert', 'quality');
        if (($request->has('buscar') && !empty(request('buscar'))) || ($request->has('precio') && !empty(request('precio'))) || ($request->has('marca') && !empty(request('marca'))) || ($request->has('provincia') && !empty(request('provincia')))) {

            if ($request->has('buscar') && !empty(request('buscar'))) {
                $products->where('slug', 'LIKE', '%'.Str::slug(request('buscar'), '-').'%');
            }
            if ($request->has('marca') && !empty(request('marca'))) {
                $brand=Brand::where('slug', request('marca'))->firstOrFail();
                $products->where('brand_id', $brand->id);
            }
            if ($request->has('min') && !empty(request('min'))) {
                $products->where('price', '>=', request('min'));
            }
            if ($request->has('precio') && !empty(request('precio'))) {
                if (request('precio')=='bajo') {
                    $products->orderBy('price', 'ASC');
                } elseif (request('precio')=='alto') {
                    $products->orderBy('price', 'DESC');
                }
            }

        }

        if ($request->has('page')) {
            $offset=8*(request('page')-1);
        } else {
            $offset=0;
        }

        $products=$products->get();

        $varPage='page';
        $page=Paginator::resolveCurrentPage($varPage);
        $pagination=new LengthAwarePaginator($products, $total=count($products), $perPage = 8, $page, ['path' => Paginator::resolveCurrentPath(), 'pageName' => $varPage,]);

        return view('web.shop', compact("categories", "products", "districts", "cart", "pagination", "offset"));
    }

    public function categories(Request $request) {
        $categories=Category::all();
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

        return view('web.categories', compact("categories", "cart"));
    }

    public function category(Request $request, $slugCategory, $slugSubcategory=null) {
        $category=Category::where('slug', $slugCategory)->firstOrFail();
        $stores=Store::all();
        $num=0;
        $districts=[];
        foreach ($stores as $store) {
            if (array_search($store->district_id, array_column($districts, 'id'))===false) {
                $districts[$num]=['name' => $store->district->name, 'id' => $store->district->id];
                $num++;
            }
        }
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;
        $products=Product::select('products.id', 'products.slug', 'products.name', 'products.price', 'products.ofert')->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')->where('subcategories.category_id', $category->id)->get();

        if ($request->has('page')) {
            $offset=8*(request('page')-1);
        } else {
            $offset=0;
        }

        $varPage='page';
        $page=Paginator::resolveCurrentPage($varPage);
        $pagination=new LengthAwarePaginator($products, $total=count($products), $perPage = 8, $page, ['path' => Paginator::resolveCurrentPath(), 'pageName' => $varPage,]);

        return view('web.category', compact("category", "districts", "cart", "products", "pagination", "offset"));
    }

    public function cart(Request $request) {

        if ($request->session()->has('cart')) {
            $cart=session('cart');
            $num=0;
            foreach ($cart as $cartProduct) {
                $product=Product::where('slug', $cartProduct['product'])->first();
                $products[$num]=$product;
                $products[$num]['cartQty']=$cartProduct['qty'];
                $num++;
            }

        } else {
            $products=[];
        }
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

        return view('web.cart', compact("products", "cart"));
    }

    public function productSingle(Request $request, $slug) {
        $product=Product::where('slug', $slug)->firstOrFail();
        $relatedProducts=Product::select('products.id', 'products.slug', 'products.name', 'products.price', 'products.ofert')->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')->where('products.subcategory_id', $product->subcategory_id)->orWhere('subcategories.category_id', $product->subcategory->category_id)->limit(4)->inRandomOrder()->get();
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

        return view('web.product', compact("product", "cart", "relatedProducts"));
    }

    public function addCart($slug, Request $request) {

        if ($request->session()->has('cart')) {
            $count=count(session('cart'));
            $cart=session('cart');

            if (array_search($slug, array_column($cart, 'product'))!==false) {

                $clave=array_search($slug, array_column($cart, 'product'));
                $cart[$clave]['qty']=$cart[$clave]['qty']+1;
                $request->session()->put('cart', $cart);

            } else {
                $request->session()->push('cart', array('product' => $slug, 'qty' => 1));
            }
        } else {
            $request->session()->put('cart', array(0 => ['product' => $slug, 'qty' => 1]));
        }

        return response()->json(session('cart'));
    }

    public function profile(Request $request) {

        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

        return view('web.profile', compact("cart"));
    }
}
