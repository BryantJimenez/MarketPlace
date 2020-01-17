<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Category;
use App\District;
use App\Store;
use App\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
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
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

        return view('web.home', compact("categories", "productsSelect", "brands", "stores", "products", "districts", "cart"));
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
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

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

        return view('web.shop', compact("productsSelect", "categories", "brands", "products", "districts", "cart", "pagination", "offset", "search"));
    }

    public function categories(Request $request) {
        $categories=Category::all();
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

        return view('web.categories', compact("categories", "cart"));
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
        $relatedProducts=Product::where('subcategory_id', $product->subcategory_id)->limit(4)->inRandomOrder()->get();
        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

        return view('web.product', compact("product", "cart", "relatedProducts"));
    }

    public function buy(Request $request, $slug=null) {

        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

        return view('web.checkout', compact("cart"));
    }

    public function pay(Request $request) {
        $SECRET_KEY = "vk9Xjpe2YZMEOSBzEwiRcPDibnx2NlPBYsusKbDobAk";
        $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

        try{
            // Creamos Cargo a una tarjeta
            $charge = $culqi->Charges->create(
                array(
                  "amount" => 1000,
                  "capture" => true,
                  "currency_code" => "PEN",
                  "description" => "Venta de prueba",
                  "email" => "test@culqi.com",
                  "installments" => 0,
                  "antifraud_details" => array(
                      "address" => "Av. Lima 123",
                      "address_city" => "LIMA",
                      "country_code" => "PE",
                      "first_name" => "Will",
                      "last_name" => "Muro",
                      "phone_number" => "9889678986",
                  ),
                  "source_id" => "{token_id o card_id}"
              )
            );

            return json_encode($cargo);
            
        } catch(Exception $e){

            $cargo2= $e->getMessage();

            return $cargo2;

        }
    }

    public function addCart($slug, Request $request) {

        if ($request->session()->has('cart')) {
            $cart=session('cart');

            if (array_search($slug, array_column($cart, 'product'))!==false) {
                $product=Product::where('slug', $slug)->firstOrFail();
                $clave=array_search($slug, array_column($cart, 'product'));
                if ($product->qty>$cart[$clave]['qty']) {
                    $cart[$clave]['qty']=$cart[$clave]['qty']+1;
                    $request->session()->put('cart', $cart);
                }

            } else {
                $request->session()->push('cart', array('product' => $slug, 'qty' => 1));
            }
        } else {
            $request->session()->put('cart', array(0 => ['product' => $slug, 'qty' => 1]));
        }

        return response()->json(session('cart'));
    }

    public function removeCart($slug, Request $request) {

        if ($request->session()->has('cart')) {
            $cart=session('cart');

            if (array_search($slug, array_column($cart, 'product'))!==false) {
                $request->session()->forget('cart');
                $num=0;
                foreach ($cart as $product) {
                    if ($slug!=$product['product']) {
                        if ($num==0) {
                            $request->session()->put('cart', array(0 => ['product' => $product['product'], 'qty' => $product['qty']]));
                        } else {
                            $request->session()->push('cart', array('product' => $product['product'], 'qty' => $product['qty']));
                        }
                        $num++;
                    }
                }
                return response()->json(['status' => 'ok']);
            } else {
                return response()->json(['status' => 'fail']);
            }
        } else {
            return response()->json(['status' => 'fail']);
        }
    }

    public function addLocation($lat, $lng, Request $request) {
        $request->session()->put('lat', $lat);
        $request->session()->put('lng', $lng);
    }

    // public function addProducts($slug=null) {

    //     $num=0;
    //     $productsSelect=[];
    //     $productsSelectAll=Product::all();
    //     if ($slug!=null) {
    //         $brand=Brand::where('slug', $slug)->firstOrFail();   
    //     }
    //     foreach ($productsSelectAll as $product) {
    //         if ($slug==null) {
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

    //         } elseif ($brand->id==$product->brand_id) {
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

    //     return response()->json($productsSelect);
    // }

    public function profile(Request $request) {

        $cart=($request->session()->has('cart')) ? count(session('cart')) : 0 ;

        return view('web.profile', compact("cart"));
    }

    public function emailVerify(Request $request)
    {
        $count=User::where('email', request('email'))->count();
        if ($count>0) {
            return "false";
        } else {
            return "true";
        }
    }
}
