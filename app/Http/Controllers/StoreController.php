<?php

namespace App\Http\Controllers;

use App\Store;
use App\User;
use App\StoreUser;
use App\District;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\StoreUpdateRequest;
use Auth;

class StoreController extends Controller
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
        $stores=Store::orderBy('id', 'DESC')->get();
        $num=1;
        return view('admin.stores.index', compact('stores', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts=District::where('province_id', 1501)->get();
        $users=User::all();
        return view('admin.stores.create', compact('districts', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request)
    {
        $count=Store::where('name', request('name'))->count();
        $slug=Str::slug(request('name'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Store::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=$slug."-".$num;
                $num++;
            } else {
                $district=District::where('id', request('district_id'))->where('province_id', 1501)->firstOrFail();
                $user=User::where('slug', request('user_id'))->firstOrFail();
                $data=array('name' => request('name'), 'slug' => $slug, 'district_id' => $district->id, 'address' => request('address'), 'phone' => request('phone'), 'state' => 1, 'lat' => request('lat'), 'lng' => request('lng'));
                if (request('owner')!="") {
                    $data['owner']=request('owner');
                }
                break;
            }
        }

        $store=Store::create($data);
        StoreUser::create(['user_id' => $user->id, 'store_id' => $store->id]);

        if ($store) {
            return redirect()->route('tiendas.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La tienda ha sido registrada exitosamente.']);
        } else {
            return redirect()->route('tiendas.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $store=Store::where('slug', $slug)->firstOrFail();
        $districts=District::where('province_id', 1501)->get();
        $users=User::all();
        return view('admin.stores.edit', compact("store", "districts", "users"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRequest $request, $slug)
    {
        $store=Store::where('slug', $slug)->firstOrFail();
        $district=District::where('id', request('district_id'))->where('province_id', 1501)->firstOrFail();
        $user=User::where('slug', request('user_id'))->firstOrFail();
        $data=array('name' => request('name'), 'district_id' => $district->id, 'address' => request('address'), 'phone' => request('phone'), 'lat' => request('lat'), 'lng' => request('lng'));
        if (!empty(request('owner'))) {
            $data['owner']=request('owner');
        } else {
            $data['owner']=null;
        }

        if ($user->id!=$store->users[0]->id) {
            $storeUser=StoreUser::where('user_id', $store->users[0]->id)->where('store_id', $store->id)->firstOrFail();
            $storeUser->delete();
            StoreUser::create(['user_id' => $user->id, 'store_id' => $store->id]);
        }

        $store->fill($data)->save();

        if ($store) {
            return redirect()->route('tiendas.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La tienda ha sido editada exitosamente.']);
        } else {
            return redirect()->route('tiendas.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $store=Store::where('slug', $slug)->firstOrFail();
        $store->delete();

        if ($store) {
            return redirect()->route('tiendas.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La tienda ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('tiendas.index')->with(['type' => 'error', 'title' => 'Eliminación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function offerServiceShopStore(Request $request) {
        $data=$request->all();
        $data=Arr::except($data, 'photo');
        $user=User::where('id', Auth::user()->id)->firstOrFail();
        if ($request->has('district_id')) {
            $district=District::where('id', request('district_id'))->firstOrFail();
            $data['district_id']=$district->id;
        }
        if ($request->has('birthday')) {
            $data['birthday']=date('Y-m-d', strtotime(request('birthday')));
        }

        // Mover imagen a carpeta users y extraer nombre
        if ($request->hasFile('photo')) {
            $file=$request->file('photo');
            $photo=time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/admins/img/users/', $photo);
            $data['photo']=$photo;
        }
        $user->fill($data)->save();

        $count=Store::where('name', request('name_shop'))->count();
        $slug=Str::slug(request('name_shop'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=Store::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=$slug."-".$num;
                $num++;
            } else {
                $address=request('address_shop');
                $district=District::where('id', request('shop_district_id'))->where('province_id', 1501)->firstOrFail();
                $data=array('name' => request('name_shop'), 'slug' => $slug, 'district_id' => $district->id, 'address' => request('address_shop'), 'phone' => request('phone_shop'), 'lat' => request('lat'), 'lng' => request('lng'));
                break;
            }
        }
        $store=Store::create($data);

        $countRequest=StoreUser::where('request', 1)->count();
        $slug="solicitud-".$countRequest;
        $data=array('slug' => $slug, 'request' => 1, 'user_id' => Auth::user()->id, 'store_id' => $store->id);
        $storeUser=StoreUser::create($data)->save();

        if ($storeUser) {
            return redirect()->route('servicios.offer')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La solicitud de la tienda ha sido enviada exitosamente.']);
        } else {
            return redirect()->route('servicios.offer')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function storesRequest() {
        $storesRequest=Store::select('stores.id', 'stores.name', 'store_user.state', 'stores.slug')->join('store_user', 'stores.id', '=', 'store_user.store_id')->where('store_user.request', 1)->get();
        $num=1;
        return view('admin.stores.stores.index', compact('storesRequest', 'num'));
    }

    public function storesRequestShow($slug)
    {
        $store=Store::where('slug', $slug)->firstOrFail();
        return view('admin.stores.stores.show', compact('store')); 
    }

    public function confirm(Request $request, $slug)
    {
        $storeUser=StoreUser::where('slug', $slug)->firstOrFail();
        $store=Store::where('id', $storeUser->store_id)->firstOrFail();

        $storeUser->fill(['state' => 1])->save();
        $store->fill(['state' => 1])->save();

        if ($storeUser && $store) {
            return redirect()->back()->with(['type' => 'success', 'title' => 'Confirmación exitosa', 'msg' => 'La solicitud ha sido confirmada exitosamente.']);
        } else {
            return redirect()->back()->with(['type' => 'error', 'title' => 'Confirmación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }   
    }

    public function refuse(Request $request, $slug)
    {
        $store=Store::where('slug', $slug)->firstOrFail();
        $storeUser=StoreUser::where('store_id', $store->id)->first();
        $storeUser->fill(['state' => 3, 'explanation' => request('explanation')])->save();

        if ($storeUser) {
            return redirect()->back()->with(['type' => 'success', 'title' => 'Rechazo exitoso', 'msg' => 'La solicitud ha sido rechazada exitosamente.']);
        } else {
            return redirect()->back()->with(['type' => 'error', 'title' => 'Rechazo fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
