<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Department;
use App\District;
use App\Store;
use App\Brand;
use App\Bank;
use App\Payment;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;

class WebController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
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

        $num=0;
        $productsSelect=[];
        $productsSelectAll=Product::all();
        foreach ($productsSelectAll as $product) {
            if (count($productsSelect)>0) {
                $name=Str::slug($product->name);
                if (array_search($name, array_column($productsSelect, 'slug'))===false) {
                    $productsSelect[$num]=['slug' => $product->slug, 'name' => $product->name];
                    $num++;
                }
            } else {
                $productsSelect[$num]=['slug' => $product->slug, 'name' => $product->name];
                $num++;
            }
        }

        return view('web.home', compact("categories", "productsSelect", "brands", "stores", "products", "districts"));
    }

    public function shop(Request $request) {
        $categories=Category::all();
        $brands=Brand::all();
        $stores=Store::all();
        $num=0;
        $districts=[];
        foreach ($stores as $store) {
            if (array_search($store->district_id, array_column($districts, 'id'))===false) {
                $districts[$num]=['name' => $store->district->name, 'id' => $store->district->id];
                $num++;
            }
        }
        // $districts=(object) $districts;

        $products=Product::where('qty', '>', 0);
        if (($request->has('buscar') && !empty(request('buscar'))) || ($request->has('precio') && !empty(request('precio'))) || ($request->has('marca') && !empty(request('marca'))) || ($request->has('provincia') && !empty(request('provincia')))) {

            if ($request->has('buscar') && !empty(request('buscar'))) {
                $products->where('slug', 'LIKE', '%'.Str::slug(request('buscar'), '-').'%');
            }
            if ($request->has('marca') && !empty(request('marca')) && (!$request->has('buscar') || empty(request('buscar')))) {
                $brand=Brand::where('slug', request('marca'))->firstOrFail();
                $products->where('brand_id', $brand->id);
            }
            if ($request->has('precio') && !empty(request('precio'))) {
                if (request('precio')=='bajo') {
                    $products->orderBy('price', 'ASC');
                } elseif (request('precio')=='alto') {
                    $products->orderBy('price', 'DESC');
                }
            }

        }

        if (!$request->has('buscar') || empty(request('buscar'))) {
            $num=0;
            $productsSelect=[];
            $productsSelectAll=Product::all();
            foreach ($productsSelectAll as $product) {
                if (count($productsSelect)>0) {
                    $name=Str::slug($product->name);
                    if (array_search($name, array_column($productsSelect, 'slug'))===false) {
                        $productsSelect[$num]=['slug' => $product->slug, 'name' => $product->name];
                        $num++;
                    }
                } else {
                    $productsSelect[$num]=['slug' => $product->slug, 'name' => $product->name];
                    $num++;
                }
            }
        }

        if ($request->has('categoria') && !empty(request('categoria'))) {
            $num=0;
            $productsFilter=$products->get();
            $products=[];
            $category=Category::where('slug', request('categoria'))->firstOrFail();
            foreach ($productsFilter as $product) {
                if ($category->id==$product->subcategory->category_id) {
                    $products[$num]=$product;
                    $num++;
                }
            }
            $products=(object) $products;
        } else {
            $products=$products->get();
        }

        //Calcular distancia, meterla dentro de los productos y filtrarla
        if ($request->session()->has('lat') && $request->session()->has('lng') && !$request->has('precio') || empty(request('precio'))) {
            foreach ($products as $product) {
                $distance=distanceCalculation(session('lat'), session('lng'), $product->stores[0]->lat, $product->stores[0]->lng, 'km', 0);
                $product->km=$distance;
            }

            $products=array_values(Arr::sort($products, function ($value) {
                return $value['km'];
            }));
        }

        if ($request->has('page')) {
            $offset=8*(request('page')-1);
        } else {
            $offset=0;
        }

        $varPage='page';
        $page=Paginator::resolveCurrentPage($varPage);
        $pagination=new LengthAwarePaginator($products, $total=count($products), $perPage = 8, $page, ['path' => Paginator::resolveCurrentPath(), 'pageName' => $varPage,]);

        $search=$request->all();

        return view('web.shop', compact("productsSelect", "categories", "brands", "products", "districts", "pagination", "offset", "search"));
    }

    public function categories() {
        $categories=Category::all();
        return view('web.categories', compact("categories"));
    }

    public function productSingle($slug) {
        $product=Product::where('slug', $slug)->firstOrFail();
        $products=Product::where('subcategory_id', $product->subcategory_id)->limit(4)->inRandomOrder()->get();

        return view('web.product', compact("product", "products"));
    }

    public function buy($slug) {
        $product=Product::where('slug', $slug)->firstOrFail();
        $banks=Bank::all();
        return view('web.checkout', compact("product", "banks"));
    }

    public function addLocation(Request $request) {
        $request->session()->put('lat', request('lat'));
        $request->session()->put('lng', request('lng'));
    }

    public function profile() {
        return view('web.profile', compact("cart"));
    }

    public function sales() {
        $payments=Payment::where('user_id', Auth::user()->id)->get();
        $num=1;
        return view('web.sales', compact("payments","num"));
    }

    public function saleShow($slug) {
        $payment=Payment::where('slug', $slug)->firstOrFail();
        return view('web.sale', compact("payment"));
    }

    public function shopSingle($slug) {
        $store=Store::where('slug', $slug)->firstOrFail();
        return view('web.store', compact("store"));
    }

    public function services() {
        return view('web.services');
    }

    public function offerServices() {
        return view('web.offerServices');
    }

    public function offerServiceShop() {
        $departments=Department::all();
        $districts=District::where('province_id', 1501)->get();
        return view('web.offerShop', compact("departments", "districts"));
    }

    public function offerServiceShopStore(Request $request) {
        // return view('web.offerShop', compact("districts"));
    }
}
