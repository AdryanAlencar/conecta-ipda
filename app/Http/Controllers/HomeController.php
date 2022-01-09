<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        $states = \App\Models\State::all();
        $categories = \App\Models\Category::all();
        $stores = DB::table('stores')
            ->join('addresses', 'stores.address_id', '=', 'addresses.id')
            ->select('stores.*');

        if($request->category){
            $stores = $stores->where('store.category_id', $request->category);
        }

        if($request->state){
            $stores = $stores->where('addresses.state_id', $request->state);
        }

        if(!$user){
            if($request->city){
                $stores = $stores->where('addresses.city_id', $request->city);
            }

            if($request->district){
                $stores = $stores->where('addresses.district', $request->district);
            }
        }else{
            $stores = $stores->where('addresses.city_id', $user->city_id);
        }

        $stores = $stores->get();

        return view('site.home.index', [
            'states' => $states,
            'categories' => $categories,
            'stores' => $stores,
            'user' => $user,
        ]);
    }

}
