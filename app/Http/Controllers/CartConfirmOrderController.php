<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CartConfirmOrderController extends Controller
{
    public function showConfirmOrder(Request $request) {
        $rush = $request->rush;
        Session::put('rush', $rush);
   // dd($rush);     
        if ($request->rushDate == Carbon::now()->format('Y-m-d')) {
            $dt_rush = 'ASAP';
            Session::put('dt_rush', $dt_rush);
        } else {
            $dt_rush = Carbon::parse($request->rushDate)->format('l, F d, Y');
            Session::put('dt_rush', $dt_rush);
        }
        // dd(Carbon::now()->format('Y-m-d'));
        // dd($dt_rush . '<br>' . Carbon::now());
// dd($request->confirm);
        return view('cart/cartConfirm');
    }
} 
