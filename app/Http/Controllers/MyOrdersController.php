<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Order;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use DB;
use Yajra\Datatables\Facades\Datatables;
use Session;

class MyOrdersController extends Controller
{
    
    // public $orders;

    public function index()
    {
        if (Auth::user()->admin == '1') {
            $orders = Order::all();
        } else {
            $orders = Auth::user()->orders;
        }

        return view('user.myorders', compact('orders', 'users'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function myordersData()
    {
        return Datatables::of(Order::query())->make(true);
    }

    public function show(Order $orders, Request $request)
    {
        $showOrder = $request->confirm;
        $confirmEmail = Order::where('confirmation', $showOrder )->first();
        Session::put('showOrder', $showOrder);
        return view('user.showConfirmedOrder', compact('showOrder', 'orders', 'confirmEmail', 'ordersList'));
    }

}
