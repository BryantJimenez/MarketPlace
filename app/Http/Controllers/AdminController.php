<?php

namespace App\Http\Controllers;

use App\Departments;
use App\Province;
use App\District;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('admin.home');
    }

    public function addProvinces(Request $request) {
        $num=0;
        $provincesSelect=[];
        $provinces=Province::where('department_id', request('id'))->orderBy('name', 'DESC')->get();   
        foreach ($provinces as $province) {
            $provincesSelect[$num]=['id' => $province->id, 'name' => $province->name];
            $num++;
        }

        return response()->json($provincesSelect);
    }

    public function addDistricts(Request $request) {
        $num=0;
        $districtsSelect=[];
        $districts=District::where('province_id', request('id'))->orderBy('name', 'DESC')->get();   
        foreach ($districts as $district) {
            $districtsSelect[$num]=['id' => $district->id, 'name' => $district->name];
            $num++;
        }

        return response()->json($districtsSelect);
    }
}
