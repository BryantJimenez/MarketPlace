<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Subcategory;
use App\Store;
use App\Brand;
use App\ProductStore;
use App\ImageProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $products=Product::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.products.index', compact('products', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $stores=Store::all();
        $brands=Brand::all();
        return view('admin.products.create', compact('categories', 'stores', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Product::where('name', request('name'))->count();
        $slug=Str::slug(request('name'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Product::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=$slug."-".$num;
                $num++;
            } else {
                $brand=Brand::where('slug', request('brand_id'))->firstOrFail();
                $subcategory=Subcategory::where('slug', request('subcategory_id'))->firstOrFail();
                $store=Store::where('slug', request('store_id'))->firstOrFail();
                $data=array('name' => request('name'), 'slug' => $slug, 'qty' => request('qty'), 'ofert' => request('ofert'), 'price' => request('price'), 'description' => request('description'), 'subcategory_id' => $subcategory->id, 'brand_id' => $brand->id);
                break;
            }
        }

        $product=Product::create($data);

        $data=array('product_id' => $product->id, 'store_id' => $store->id);
        $productStore=ProductStore::create($data)->save();

        if ($request->has('files') && $request->input('files')!="") {
            $images=explode(",", request('files'));
            foreach ($images as $image) {
                ImageProduct::create(['product_id' => $product->id, 'image' => $image]);
            }
        }

        if ($productStore) {
            return redirect()->route('productos.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'El producto ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('productos.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product=Product::where('slug', $slug)->firstOrFail();
        $images=ImageProduct::where('product_id', $product->id)->get();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $stores=Store::all();
        $brands=Brand::all();
        $num=0;
        return view('admin.products.edit', compact("product", "images", "categories", "subcategories", "stores", "brands", "num"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $product=Product::where('slug', $slug)->firstOrFail();
        $store=Store::where('slug', request('store_id'))->firstOrFail();
        $brand=Brand::where('slug', request('brand_id'))->firstOrFail();
        $subcategory=Subcategory::where('slug', request('subcategory_id'))->firstOrFail();

        if ($store->id!=$product->stores[0]->id) {
            $productStore=ProductStore::where('product_id', $product->id)->where('store_id', $product->stores[0]->id)->firstOrFail();
            $data=array('store_id' => $store->id);
            $productStore->fill($data)->save();
        }

        $data=array('name' => request('name'), 'qty' => request('qty'), 'ofert' => request('ofert'), 'price' => request('price'), 'description' => request('description'), 'subcategory_id' => $subcategory->id, 'brand_id' => $brand->id);
        $product->fill($data)->save();

        if ($product) {
            return redirect()->route('productos.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El producto ha sido editado exitosamente.']);
        } else {
            return redirect()->route('productos.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $product=Product::where('slug', $slug)->firstOrFail();
        $product->delete();

        if ($product) {
            return redirect()->route('productos.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'El producto ha sido eliminado exitosamente.']);
        } else {
            return redirect()->route('productos.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function image(Request $request) {
        if ($request->hasFile('file')) {
            $file=$request->file('file');
            $name=time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/admins/img/products/', $name);

            echo json_encode([
                'status' => 'ok',
                'name' => $file->getClientOriginalName(),
                'nameFile' => $name
            ]);
        }
    }

    public function imageEdit(Request $request, $slug) {
        $product=Product::where('slug', $slug)->firstOrFail();
        if ($request->hasFile('file')) {
            $file=$request->file('file');
            $name=time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/admins/img/products/', $name);

            $imageProduct=ImageProduct::create(['product_id' => $product->id, 'image' => $name]);
            if ($imageProduct) {
                echo json_encode([
                  'status' => 'ok',
                  'name' => $file->getClientOriginalName(),
                  'nameFile' => $name,
                  'slug' => $slug
              ]);
            } else {
                echo json_encode([
                  'status' => 'fail'
              ]);
            }
        }
    }

    public function imageDestroy($slug, $url) {
        $product=Product::where('slug', $slug)->firstOrFail();
        $imageProduct=ImageProduct::where('product_id', $product->id)->where('image', $url)->firstOrFail();
        $imageProduct->delete();

        if ($imageProduct) {
            echo json_encode(['status' => 'ok']);
        } else {
            echo json_encode(['status' => 'fail']);
        }
    }
}
