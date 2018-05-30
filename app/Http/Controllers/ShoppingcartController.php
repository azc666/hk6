<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use Illuminate\Routing\Redirector;
use App\Shoppingcart;
use \Cart as Cart;
use Auth;
use Session;
use App\User;

class ShoppingcartController extends Controller
{
    public function storecart(Shoppingcart $shoppingcart)
    {
        $identifier = Auth::user()->username;
        if (Shoppingcart::where('identifier', '=', $identifier)->count() > 0) {
            Shoppingcart::destroy($identifier);
            Cart::store($identifier);
            return redirect('cart')->withSuccessMessage('You have replaced your saved cart!');
        } else {
            Cart::store($identifier);
            return redirect('cart')->withSuccessMessage('You have successfully saved your cart!');
        }

    }

    public function restorecart(Shoppingcart $shoppingcart, User $user)
    {
        $identifier = Auth::user()->username;

        if (Shoppingcart::where('identifier', '=', $identifier)->count() > 0) {   
            Cart::restore($identifier);
            return redirect('cart')->withSuccessMessage('You have successfully restored your cart!');
        } else {
            return redirect('cart')->withErrorMessage('You do not have a saved cart!');
        }
      
    }
      
    // public function update(Request $request, $id)
    // {
    //     Cart::update(a2090c60f1801fafff8c7cee4691dd5e, 1000);
    //     return redirect('cart')->withSuccessMessage('The item ' . $id . ' has been updated!');
    // }
}
