<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Department;
use App\District;
use App\Store;
use App\Workshop;
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
        $categories=Category::limit(6)->inRandomOrder()->get();
        $stores=Store::limit(6)->inRandomOrder()->get();
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

    public function shop(Request $request, $url=null) {
        $newUrl=($url!=NULL) ? str_replace("_", "/", $url) : null ;
        $urlArray=explode("/", $newUrl);
        // $districts=(object) $districts;

        $products=Product::where('qty', '>', 0);
        if (in_array("buscar", $urlArray)) {
            $key=array_search("buscar", $urlArray);
            $search=$urlArray[$key+1];
            $products->where('slug', 'LIKE', '%'.$search.'%');
        }

        if (in_array("marca", $urlArray)) {
            $key=array_search("marca", $urlArray);
            $brand=$urlArray[$key+1];
            $brand=Brand::where('slug', $brand)->firstOrFail();
            $products->where('products.brand_id', $brand->id);
        } else {
            $brands=Brand::all();
        }

        if (in_array("precio", $urlArray)) {
            $key=array_search("precio", $urlArray);
            $price=$urlArray[$key+1];
            if ($price=='bajo') {
                $products->orderBy('price', 'ASC');
            } elseif ($price=='alto') {
                $products->orderBy('price', 'DESC');
            }
        }

        if (in_array("categoria", $urlArray)) {
            $key=array_search("categoria", $urlArray);
            $category=$urlArray[$key+1];
            $num=0;
            $productsFilter=$products->get();
            $products=[];
            $category=Category::where('slug', $category)->firstOrFail();
            foreach ($productsFilter as $product) {
                if ($category->id==$product->subcategory->category_id) {
                    $products[$num]=$product;
                    $num++;
                }
            }
            $products=(object) $products;
        } else {
            $categories=Category::all();
            $products=$products->get();
        }

        if (in_array("distrito", $urlArray)) {
            $key=array_search("distrito", $urlArray);
            $district=$urlArray[$key+1];
            $district=District::where('id', $district)->firstOrFail();
            $num=0;
            $productsFilter=$products;
            $products=[];
            foreach ($productsFilter as $product) {
                if ($district->id==$product->stores[0]->district_id) {
                    $products[$num]=$product;
                    $num++;
                }
            }
            $products=(object) $products;
        } else {
            $stores=Store::all();
            $num=0;
            $districts=[];
            foreach ($stores as $store) {
                if (array_search($store->district_id, array_column($districts, 'id'))===false) {
                    $districts[$num]=['name' => $store->district->name, 'id' => $store->district->id];
                    $num++;
                }
            }
        }

        if (!in_array("buscar", $urlArray)) {
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

        //Calcular distancia, meterla dentro de los productos y filtrarla
        if ($request->session()->has('lat') && $request->session()->has('lng') && !in_array("precio", $urlArray)) {
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

        return view('web.store.shop', compact("productsSelect", "categories", "brands", "products", "districts", "pagination", "offset", "search", "url", "urlArray"));
    }

    public function categories() {
        $categories=Category::all();
        return view('web.store.categories', compact("categories"));
    }

    public function productSingle(Request $request, $slug) {
        $product=Product::where('slug', $slug)->firstOrFail();
        $products=Product::where('subcategory_id', $product->subcategory_id)->limit(4)->inRandomOrder()->get();
        if ($request->session()->has('lat') && $request->session()->has('lng')) {
            $lat=$request->session()->get('lat');
            $lng=$request->session()->get('lng');   
        } else {
            $lat="";
            $lng="";
        }

        return view('web.store.product', compact("product", "products", "lat", "lng"));
    }

    public function buy(Request $request, $slug) {
        $product=Product::where('slug', $slug)->firstOrFail();
        $banks=Bank::all();
        if ($request->session()->has('lat') && $request->session()->has('lng')) {
            $lat=$request->session()->get('lat');
            $lng=$request->session()->get('lng');   
        } else {
            $lat="";
            $lng="";
        }
        return view('web.store.checkout', compact("product", "banks", "lat", "lng"));
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

    public function saleShow(Request $request, $slug) {
        $payment=Payment::where('slug', $slug)->firstOrFail();
        if ($request->session()->has('lat') && $request->session()->has('lng')) {
            $lat=$request->session()->get('lat');
            $lng=$request->session()->get('lng');   
        } else {
            $lat="";
            $lng="";
        }

        return view('web.sale', compact("payment", "lat", "lng"));
    }


    public function stores(Request $request) {
        $storesAll=Store::all();
        $stores=Store::orderBy('id', 'DESC');
        if ($request->has("tienda") && !empty(request('tienda'))) {
            $stores->where('slug', 'LIKE', '%'.request('tienda').'%');
        }

        if ($request->has("distrito") && !empty(request('distrito'))) {
            $district=District::where('id', request('distrito'))->firstOrFail();
            $stores->where('district_id', $district->id);
        }
        $countStores=$stores->count();
        $stores=$stores->get();

        $storesDistricts=Store::all();
        $num=0;
        $districts=[];
        foreach ($storesDistricts as $store) {
            if (array_search($store->district_id, array_column($districts, 'id'))===false) {
                $districts[$num]=['name' => $store->district->name, 'id' => $store->district->id];
                $num++;
            }
        }

        if ($request->has('page')) {
            $offset=8*(request('page')-1);
        } else {
            $offset=0;
        }

        $varPage='page';
        $page=Paginator::resolveCurrentPage($varPage);
        $pagination=new LengthAwarePaginator($stores, $total=$countStores, $perPage = 8, $page, ['path' => Paginator::resolveCurrentPath(), 'pageName' => $varPage,]);

        $search=$request->all();

        return view('web.store.stores', compact("stores", "storesAll", "districts", "offset", "pagination", "search"));
    }

    public function shopSingle(Request $request, $slug, $url=null) {
        $newUrl=($url!=NULL) ? str_replace("_", "/", $url) : null ;
        $urlArray=explode("/", $newUrl);

        $store=Store::where('slug', $slug)->firstOrFail();
        $products=Product::join('product_store', 'products.id', '=', 'product_store.product_id')->where('products.qty', '>', 0)->where('product_store.store_id', $store->id);
        if (in_array("buscar", $urlArray)) {
            $key=array_search("buscar", $urlArray);
            $search=$urlArray[$key+1];
            $products->where('products.slug', 'LIKE', '%'.$search.'%');
        }

        if (in_array("marca", $urlArray)) {
            $key=array_search("marca", $urlArray);
            $brand=$urlArray[$key+1];
            $brand=Brand::where('slug', $brand)->firstOrFail();
            $products->where('products.brand_id', $brand->id);
        } else {
            $brands=Brand::all();
        }

        if (in_array("precio", $urlArray)) {
            $key=array_search("precio", $urlArray);
            $price=$urlArray[$key+1];
            if ($price=='bajo') {
                $products->orderBy('products.price', 'ASC');
            } elseif ($price=='alto') {
                $products->orderBy('products.price', 'DESC');
            }
        }

        if (in_array("categoria", $urlArray)) {
            $key=array_search("categoria", $urlArray);
            $category=$urlArray[$key+1];
            $num=0;
            $productsFilter=$products->get();
            $products=[];
            $category=Category::where('slug', $category)->firstOrFail();
            foreach ($productsFilter as $product) {
                if ($category->id==$product->subcategory->category_id) {
                    $products[$num]=$product;
                    $num++;
                }
            }
            $products=(object) $products;
        } else {
            $categories=Category::all();
            $products=$products->get();
        }

        if (!in_array("buscar", $urlArray)) {
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

        if ($request->has('page')) {
            $offset=8*(request('page')-1);
        } else {
            $offset=0;
        }

        $varPage='page';
        $page=Paginator::resolveCurrentPage($varPage);
        $pagination=new LengthAwarePaginator($products, $total=count($products), $perPage = 8, $page, ['path' => Paginator::resolveCurrentPath(), 'pageName' => $varPage,]);

        return view('web.store.store', compact("store", "products", "offset", "pagination", "url", "urlArray", "productsSelect", "categories", "brands"));
    }

    public function workshops(Request $request) {
        $workshopsAll=Workshop::all();
        $workshops=Workshop::orderBy('id', 'DESC');
        if ($request->has("taller") && !empty(request('taller'))) {
            $workshops->where('slug', 'LIKE', '%'.request('taller').'%');
        }

        if ($request->has("distrito") && !empty(request('distrito'))) {
            $district=District::where('id', request('distrito'))->firstOrFail();
            $workshops->where('district_id', $district->id);
        }
        $countWorkshops=$workshops->count();
        $workshops=$workshops->get();

        $workshopsDistrictsBrands=Workshop::all();
        $num=0;
        $num2=0;
        $districts=[];
        $brands=[];
        foreach ($workshopsDistrictsBrands as $workshop) {
            if (array_search($workshop->district_id, array_column($districts, 'id'))===false) {
                $districts[$num]=['name' => $workshop->district->name, 'id' => $workshop->district->id];
                $num++;
            }

            if (array_search($workshop->brand_id, array_column($brands, 'id'))===false) {
                $brands[$num2]=['name' => $workshop->brand->name, 'id' => $workshop->brand->id];
                $num++;
            }
        }

        if ($request->has('page')) {
            $offset=8*(request('page')-1);
        } else {
            $offset=0;
        }

        $varPage='page';
        $page=Paginator::resolveCurrentPage($varPage);
        $pagination=new LengthAwarePaginator($workshops, $total=$countWorkshops, $perPage = 8, $page, ['path' => Paginator::resolveCurrentPath(), 'pageName' => $varPage,]);

        $search=$request->all();

        return view('web.workshop.workshops', compact("workshop", "workshopsAll", "districts", "brands", "offset", "pagination", "search"));
    }

    public function workshopSingle(Request $request, $slug, $url=null) {
    //     $newUrl=($url!=NULL) ? str_replace("_", "/", $url) : null ;
    //     $urlArray=explode("/", $newUrl);

    //     $store=Store::where('slug', $slug)->firstOrFail();
    //     $products=Product::join('product_store', 'products.id', '=', 'product_store.product_id')->where('products.qty', '>', 0)->where('product_store.store_id', $store->id);
    //     if (in_array("buscar", $urlArray)) {
    //         $key=array_search("buscar", $urlArray);
    //         $search=$urlArray[$key+1];
    //         $products->where('products.slug', 'LIKE', '%'.$search.'%');
    //     }

    //     if (in_array("marca", $urlArray)) {
    //         $key=array_search("marca", $urlArray);
    //         $brand=$urlArray[$key+1];
    //         $brand=Brand::where('slug', $brand)->firstOrFail();
    //         $products->where('products.brand_id', $brand->id);
    //     } else {
    //         $brands=Brand::all();
    //     }

    //     if (in_array("precio", $urlArray)) {
    //         $key=array_search("precio", $urlArray);
    //         $price=$urlArray[$key+1];
    //         if ($price=='bajo') {
    //             $products->orderBy('products.price', 'ASC');
    //         } elseif ($price=='alto') {
    //             $products->orderBy('products.price', 'DESC');
    //         }
    //     }

    //     if (in_array("categoria", $urlArray)) {
    //         $key=array_search("categoria", $urlArray);
    //         $category=$urlArray[$key+1];
    //         $num=0;
    //         $productsFilter=$products->get();
    //         $products=[];
    //         $category=Category::where('slug', $category)->firstOrFail();
    //         foreach ($productsFilter as $product) {
    //             if ($category->id==$product->subcategory->category_id) {
    //                 $products[$num]=$product;
    //                 $num++;
    //             }
    //         }
    //         $products=(object) $products;
    //     } else {
    //         $categories=Category::all();
    //         $products=$products->get();
    //     }

    //     if (!in_array("buscar", $urlArray)) {
    //         $num=0;
    //         $productsSelect=[];
    //         $productsSelectAll=Product::all();
    //         foreach ($productsSelectAll as $product) {
    //             if (count($productsSelect)>0) {
    //                 $name=Str::slug($product->name);
    //                 if (array_search($name, array_column($productsSelect, 'slug'))===false) {
    //                     $productsSelect[$num]=['slug' => $product->slug, 'name' => $product->name];
    //                     $num++;
    //                 }
    //             } else {
    //                 $productsSelect[$num]=['slug' => $product->slug, 'name' => $product->name];
    //                 $num++;
    //             }
    //         }
    //     }

    //     if ($request->has('page')) {
    //         $offset=8*(request('page')-1);
    //     } else {
    //         $offset=0;
    //     }

    //     $varPage='page';
    //     $page=Paginator::resolveCurrentPage($varPage);
    //     $pagination=new LengthAwarePaginator($products, $total=count($products), $perPage = 8, $page, ['path' => Paginator::resolveCurrentPath(), 'pageName' => $varPage,]);

        return view('web.workshop.workshopSingle', compact("store", "products", "offset", "pagination", "url", "urlArray", "productsSelect", "categories", "brands"));
    }

    public function searchServices() {
        return view('web.searchServices');
    }

    public function offerServices() {
        return view('web.offerServices');
    }

    public function offerServiceShop() {
        $departments=Department::all();
        $districts=District::where('province_id', 1501)->get();
        return view('web.offerShop', compact("departments", "districts"));
    }

    public function offerServiceWorkshop() {
        $departments=Department::all();
        $districts=District::where('province_id', 1501)->get();
        return view('web.offerWorkshop', compact("departments", "districts"));
    }

    public function offerServiceProfessional() {
        $departments=Department::all();
        $districts=District::where('province_id', 1501)->get();
        return view('web.offerShop', compact("departments", "districts"));
    }
}
