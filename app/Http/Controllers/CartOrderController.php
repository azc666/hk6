<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;
use Auth;
use Cart;
use App\User;
use App\Classes\LayoutHelpersClass;
use File;
use Carbon\Carbon;
use Spatie\Browsershot\Browsershot;
// use Manipulations;
use App\Mail\OrderConfirmEmail;
use App\Mail\OrderProductionEmail;
use Session;

class CartOrderController extends Controller
{
    public function show(Request $request, Product $product, Category $category)

    {
        $dt_rush = $request->dt_rush;
        // dd($dt_rush);
        $cartOrderEmail = '';
        $cartOrder = '';
        $cartOrderProduction = '';
        $confirmation = '';
        $dt = Carbon::now();
        $dt = substr($dt->year, -2) . $dt->month . $dt->day . '-' . $dt->hour . $dt->minute . $dt->second;
        $confirmation = Auth::user()->loc_num . '-' . $dt;
        $order = new Order();

       if ($request->confirm == 'on') {
// dd($request->confirm);// echo 'hola';
       // if (1+1==21) {
        $cartOrderEmail = '';
        $cartOrderEmail .= ' <!DOCTYPE html>
        <html>
        <head>
            <title></title>
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/product.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.7.0/bootstrap-maxlength.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        </head>
        <body> ';

        $cartOrder .= '<div class="container">';

        $cartOrder .= '<div class="row body-background">';

        $cartOrder .= '<br>

        <div class="col-sm-12 col-md-12 col-lg-12">

            <img src="https://hkorderportal.com/assets/HKheader2.png" style="max-width:500px;" alt="HK Logo" class="img-responsive move-right move-down"><br>

            <div class="thumbnail">
                <div class="caption">

                    <p> <strong>HK' . Auth::user()->loc_num . '&nbsp;&nbsp;&nbsp;' . Auth::user()->loc_name. '&nbsp;&nbsp;&nbsp;' . date("m/d/Y") . '&nbsp;&nbsp;&nbsp; Confirmation: ' . $confirmation . '</strong></p>
                    <h5 class="move-up">Thank You. Your order has been placed. This confirmation has been emailed to admin: ' . Auth::user()->contact_a . ' ( <a href="mailto:' . Auth::user()->email . '">' . Auth::user()->email . '</a> ).</h5>';
// dd($rushDate);
                    if ($request->rush == 'no') {
                        if ($dt_rush == 'ASAP') {
                            $cartOrder .= '<h4 class="move-up">This is a <strong>RUSH order, with expedited production, and delivery ' . $dt_rush . '</strong><br><br>It will be shipped to:</h4>';
                        } else {
                            $cartOrder .= '<h4 class="move-up">This is a <strong>RUSH order, with an expected delivery date by ' . $dt_rush . '</strong><br><br>It will be shipped to:</h4>';
                        }
                    } else {
                        $cartOrder .= '<br><h5 class="move-up">This order will be shipped to:</h5>';
                    }

                    $cartOrder .= '<strong>' . Auth::user()->loc_name . '</strong><br>
                    Attn: ' . Auth::user()->contact_s . '<br>';
// dd(Auth::user()->username);
                    if (Auth::user()->username == 'HK35') {
                        if (Auth::user()->address2_s) {
                            $address_s =
                            Auth::user()->address1_s . '<br>' .
                            Auth::user()->address2_s . '<br>' .
                            Auth::user()->city_s . ', ' . Auth::user()->state_s . ', ' . Auth::user()->zip_s . '<br><br>';
                        } else {
                            $address_s =
                            Auth::user()->address1_s . '<br>' .
                            Auth::user()->city_s . ', ' . Auth::user()->state_s . ', ' . Auth::user()->zip_s . '<br><br>';
                        }
                    } elseif (Auth::user()->username == 'HK46') {
                        if (Auth::user()->address2_s) {
                            $address_s =
                            Auth::user()->address1_s . '<br>' .
                            Auth::user()->address2_s . '<br>' .
                            Auth::user()->city_s . ' ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s . '<br><br>';
                        } else {
                            $address_s =
                            Auth::user()->address1_s . '<br>' .
                            Auth::user()->city_s . ' ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s . '<br><br>';
                        }
                    }
                     else {
                        if (Auth::user()->address2_s) {
                            $address_s =
                            Auth::user()->address1_s . '<br>' .
                            Auth::user()->address2_s . '<br>' .
                            Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s . '<br><br>';
                        } else {
                            $address_s =
                            Auth::user()->address1_s . '<br>' .
                            Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s . '<br><br>';
                        }
                    }

                    $cartOrder .= $address_s;

                    $cartOrder .= '<p><small>Most orders ship within 2-3 working days. </small><br><strong>Double Sided Business Cards will automatically be sent for approval before production.<br>Allow 1-2 weeks for engraved Partner Cards.<br>Allow 7-10 business days, plus transit time, for Name Tags.</strong></p>';

                    $cartOrder .= '<p class="move-down"></p>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th class="table-image"></th>
                    <th>&nbsp;Product</th>
                    <th>Quantity</th>


                    <th></th>
                </tr>
            </thead>';

        $cartOrder .= '<tbody>';

        // $orderItems = [];
        foreach (Cart::content() as $item) {
            $prod_layout = $item->options->prod_layout;
            $cartOrder .= '<tr>
            <div class="' . $item->options->name . '">
            <div class="' . $item->options->title . '">
            <div class="' . $item->options->email . '">
            <div class="' . $item->options->address1 . '">
            <div class="' . $item->options->address2 . '">
            <div class="' . $item->options->city . '">
            <div class="' . $item->options->state . '">
            <div class="' . $item->options->zip . '">
            <div class="' . $item->options->phone . '">
            <div class="' . $item->options->fax . '">
            <div class="' . $item->options->cell . '">
            <div class="' . $item->options->name2 . '">
            <div class="' . $item->options->title2 . '">
            <div class="' . $item->options->email2 . '">
            <div class="' . $item->options->address1b . '">
            <div class="' . $item->options->address2b . '">
            <div class="' . $item->options->city2 . '">
            <div class="' . $item->options->state2 . '">
            <div class="' . $item->options->zip2 . '">
            <div class="' . $item->options->phone2 . '">
            <div class="' . $item->options->fax2 . '">
            <div class="' . $item->options->cell2 . '">
            <div class="' . $item->options->specialInstructions . '">';

            $cartOrder .= '<td class="table-image">';
            $cartOrderToEmail = $cartOrder;
            $cartOrder .= '<a href="' . url(substr_replace($item->options->proofPath, 'pdf', -3)) . '" target="_blank"><img src="' . url($item->options->proofPath) . '"width=200px" alt="proof" class="img-responsive cart-image move-right dropshadow"></a>';
            $cartOrder .= '</td>';
            $cartOrderToEmail .= '</td>';

            $cartOrderToEmail .= '<td><strong>' . strip_tags($item->name) . '</strong>';

            if ($prod_layout == 'PDSBC' || $prod_layout == 'ADSBC') {
                $cartOrderToEmail .= '<br><br><strong>Front Side:</strong>
                        <br>' . $item->options->name .
                        '<br>' . $item->options->email .
                        '<br><br><strong>Reverse Side:</strong>
                        <br>' . $item->options->name2 .
                        '<br>' . $item->options->email2;
            } else {
                $cartOrderToEmail .= '<br>' . $item->options->name .
                        '<br>' . $item->options->email;
            }
            // <br>' . $item->options->name .
            // '<br>' . $item->options->email .
            $cartOrderToEmail .= '<br><br>' . nl2br($item->options->prod_description) . 'Proof: <a href="' . url(substr_replace($item->options->proofPath, 'pdf', -3)) . '" target="_blank">' . $item->options->proofPath . '</a>
            </td>
            <td>';

            $cartOrder .= '<td><strong>' . strip_tags($item->name) . '</strong>';

            if ($prod_layout == 'PDSBC' || $prod_layout == 'ADSBC') {
                $cartOrder .= '<br><br><strong>Front Side:</strong>
                        <br>' . $item->options->name .
                        '<br>' . $item->options->email .
                        '<br><br><strong>Reverse Side:</strong>
                        <br>' . $item->options->name2 .
                        '<br>' . $item->options->email2;
            } else {
                $cartOrder .= '<br>' . $item->options->name .
                        '<br>' . $item->options->email;
            }
            // <br>' . $item->options->name .
            // '<br>' . $item->options->email .
            $cartOrder .= '<br><br>' . nl2br($item->options->prod_description) . '
            </td>
            <td>';

            $bcfyi_qty = $item->qty;
            if ($prod_layout == 'SBCFYI' || $prod_layout == 'ABCFYI' || $prod_layout == 'PBCFYI') {
                switch ($item->qty) {
                    case '24': $bcfyi_qty = '250 BCs + 4 FYI Pads'; break;
                    case '28': $bcfyi_qty = '250 BCs + 8 FYI Pads'; break;
                    case '54': $bcfyi_qty = '500 BCs + 4 FYI Pads'; break;
                    case '58': $bcfyi_qty = '500 BCs + 8 FYI Pads'; break;
                    default: $bcfyi_qty = '250 BCs + 4 FYI Pads';
                }
            }
            if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI') {
                switch ($item->qty) {
                    case '4': $bcfyi_qty = '4 FYI Pads'; break;
                    case '8': $bcfyi_qty = '8 FYI Pads'; break;
                    default: $bcfyi_qty = '4 FYI Pads';
                }
            }
            if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC') {
                switch ($item->qty) {
                    case '250': $bcfyi_qty = '250 Business Cards'; break;
                    case '500': $bcfyi_qty = '500 Business Cards'; break;
                    default: $bcfyi_qty = '250 Business Cards';
                }
            }
// dd($item->options->prod_layout);
            $orderArray[] = [
                'row_id'        =>  $item->rowId,
                'order_type_o'    =>  strip_tags($item->name),
                'prod_layout'   =>  $prod_layout,
                'prod_descr'    =>  nl2br($item->options->prod_description),
                'bcfyi_qty'     =>  $bcfyi_qty,
                'quantity'      =>  $item->qty,
                'name_o'        =>  $item->options->name,
                'title_o'       =>  $item->options->title,
                'email_o'       =>  $item->options->email,
                'phone_o'       =>  strip_tags($item->options->phone),
                'fax_o'         =>  $item->options->fax,
                'cell_o'        =>  $item->options->cell,
                'address1_o'    =>  $item->options->address1,
                'address2_o'    =>  $item->options->address2,
                'city_o'        =>  $item->options->city,
                'state_o'       =>  $item->options->state,
                'zip_o'         =>  $item->options->zip,
                'name2'        =>  $item->options->name2,
                'title2'       =>  $item->options->title2,
                'email2'       =>  $item->options->email2,
                'phone2'       =>  strip_tags($item->options->phone2),
                'fax2'         =>  $item->options->fax2,
                'cell2'        =>  $item->options->cell2,
                'address1b'    =>  $item->options->address1b,
                'address2b'    =>  $item->options->address2b,
                'city2'        =>  $item->options->city2,
                'state2'       =>  $item->options->state2,
                'zip2'         =>  $item->options->zip2,
                'sp_instr_o'    =>  $item->options->specialInstructions,
                'proof_path'    =>  $item->options->proofPath,
            ];

            $cartOrder .= '<span class = "quantity"><strong>' . $bcfyi_qty . '</strong> &nbsp;&nbsp;&nbsp; ';


            $cartOrder .= '<br><br>';

            if ( $item->options->specialInstructions ) {
                $cartOrder .= '<div class="thumbnail" style="width:275px; font-size:12px">
                <h5 class="move-up">Special Instructions:</h5>' . $item->options->specialInstructions . '</div>';
            }

            // $orderItems->item;
        }
// dd($orderItems);


            $cartOrder .= '


        </tbody>
        </table>';

        $cartOrder .= '</div>
                    </div> <!-- end container -->
                <div class="spacer"></div>
            </div> <!-- end container -->
        <div class="container">';

//////////////////////  SAVE THE ORDER TO DB  //////////////////

        Session::put('cartOrder', $cartOrder);
        $order->cart = $cartOrder;
        $order->name = Auth::user()->loc_name;
        $order->contact_s = Auth::user()->contact_s;
        $order->address_s = $address_s;
        $order->confirmation = $confirmation;
        $order->subtotal = Cart::subtotal();
        $order->order_array = serialize($orderArray);

        Session::put('confirmation', $confirmation);
        Auth::user()->orders()->save($order);

//////////////  CREATE $cartOrderProduction  /////////////

        $cartOrderProduction .= '';

        foreach (Cart::content() as $item_prod) {
            $cartOrderProduction .= '<table class="table table-bordered table-striped">
                <tbody>
                <thead>
                    <tr>
                        <th>&nbsp;Data Heading</th>
                        <th>&nbsp;Data Supplied</th>
                    </tr>
                </thead>';
            $cartOrderProduction .=
            '<tr><td>Franchise </td><td>' . Auth::User()->loc_name . '</td></tr>
            <tr><td>Order_Type_o </td><td>' . strip_tags($item_prod->name) . '</tr>';

            $bcfyi_qty = $item_prod->qty;
            // if ($prod_layout == 'SBCFYI' || $prod_layout == 'ABCFYI' || $prod_layout == 'PBCFYI') {
            if (strpos($item_prod->name, 'BC + FYI Pads')) {
                switch ($item_prod->qty) {
                    case '24': $bcfyi_qty = '250 BCs + 4 FYI Pads'; break;
                    case '28': $bcfyi_qty = '250 BCs + 8 FYI Pads'; break;
                    case '54': $bcfyi_qty = '500 BCs + 4 FYI Pads'; break;
                    case '58': $bcfyi_qty = '500 BCs + 8 FYI Pads'; break;
                    default: $bcfyi_qty = '250 BCs + 4 FYI Pads';
                }
            }
            // if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI') {
            if (strpos($item_prod->name, 'FYI') && !strpos($item_prod->name, '+')) {
                switch ($item_prod->qty) {
                    case '4': $bcfyi_qty = '4 FYI Pads'; break;
                    case '8': $bcfyi_qty = '8 FYI Pads'; break;
                    default: $bcfyi_qty = '4 FYI Pads';
                }
            }
            if (strpos($item_prod->name, 'Business Card')) {
            // if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC') {
                switch ($item_prod->qty) {
                    case '250': $bcfyi_qty = '250 Business Cards'; break;
                    case '500': $bcfyi_qty = '500 Business Cards'; break;
                    default: $bcfyi_qty = '250 Business Cards';
                }
            }
// dd($prod_layout);
        // if ($prod_layout == 'PDSBC' || $prod_layout == 'ADSBC') {
        if (strpos($item_prod->name, 'Double Sided BC')) {
            $cartOrderProduction .=
            '<tr><td>Quantity_o </td><td>' . $bcfyi_qty . '</tr>
            <tr><td><strong>******  FRONT  ******</strong></td></tr>
            <tr><td>Name_o </td><td>' . $item_prod->options->name . '</tr>
            <tr><td>Title_o </td><td>' . $item_prod->options->title . '</tr>
            <tr><td>Email_o </td><td>' . $item_prod->options->email . '</tr>
            <tr><td>Phone_o </td><td>' . strip_tags($item_prod->options->phone) . '</tr>
            <tr><td>Fax_o </td><td>' . $item_prod->options->fax . '</tr>
            <tr><td>Cell_o </td><td>' . $item_prod->options->cell . '</tr>
            <tr><td>Address1_o </td><td>' . $item_prod->options->address1 . '</tr>
            <tr><td>Address2_o </td><td>' . $item_prod->options->address2 . '</tr>
            <tr><td>City_o </td><td>' . $item_prod->options->city . '</tr>
            <tr><td>State_o </td><td>' . $item_prod->options->state . '</tr>
            <tr><td>Zip_o </td><td>' . $item_prod->options->zip . '</tr>
            <tr><td><strong>******  REVERSE  ******</strong></td></tr>
            <tr><td>Name_o </td><td>' . $item_prod->options->name2 . '</tr>
            <tr><td>Title_o </td><td>' . $item_prod->options->title2 . '</tr>
            <tr><td>Email_o </td><td>' . $item_prod->options->email2 . '</tr>
            <tr><td>Phone_o </td><td>' . strip_tags($item_prod->options->phone2) . '</tr>
            <tr><td>Fax_o </td><td>' . $item_prod->options->fax2 . '</tr>
            <tr><td>Cell_o </td><td>' . $item_prod->options->cell2 . '</tr>
            <tr><td>Address1_o </td><td>' . $item_prod->options->address1b . '</tr>
            <tr><td>Address2_o </td><td>' . $item_prod->options->address2b . '</tr>
            <tr><td>City_o </td><td>' . $item_prod->options->city2 . '</tr>
            <tr><td>State_o </td><td>' . $item_prod->options->state2 . '</tr>
            <tr><td>Zip_o </td><td>' . $item_prod->options->zip2 . '</tr>
            <tr><td><strong>******  ORDER INFO  ******</strong></td></tr>
            <tr><td>SP_Instructions_o </td><td>' . $item_prod->options->specialInstructions . '</tr>
            <tr><td>Admin Contact </td><td>' . Auth::User()->contact_a . '</tr>
            <tr><td>Shipping Contact </td><td>' . Auth::User()->contact_s . '</tr>
            <tr><td>Shipping Address </td><td>' . Auth::User()->address1_s . ' ' . Auth::User()->address2_s . ' ' . Auth::User()->city_s . ' ' . Auth::User()->state_s . ' ' . Auth::User()->zip_s . '</tr>
            <tr><td>Proof Image </td><td><a href="' . url($item_prod->options->proofPath) . '">' . $item_prod->options->proofPath . '</a></tr></tbody>';
        } else {
            $cartOrderProduction .=
            '<tr><td>Quantity_o </td><td>' . $bcfyi_qty . '</tr>
            <tr><td>Name_o </td><td>' . $item_prod->options->name . '</tr>
            <tr><td>Title_o </td><td>' . $item_prod->options->title . '</tr>
            <tr><td>Email_o </td><td>' . $item_prod->options->email . '</tr>
            <tr><td>Phone_o </td><td>' . strip_tags($item_prod->options->phone) . '</tr>
            <tr><td>Fax_o </td><td>' . $item_prod->options->fax . '</tr>
            <tr><td>Cell_o </td><td>' . $item_prod->options->cell . '</tr>
            <tr><td>Address1_o </td><td>' . $item_prod->options->address1 . '</tr>
            <tr><td>Address2_o </td><td>' . $item_prod->options->address2 . '</tr>
            <tr><td>City_o </td><td>' . $item_prod->options->city . '</tr>
            <tr><td>State_o </td><td>' . $item_prod->options->state . '</tr>
            <tr><td>Zip_o </td><td>' . $item_prod->options->zip . '</tr>
            <tr><td>SP_Instructions_o </td><td>' . $item_prod->options->specialInstructions . '</tr>
            <tr><td>Admin Contact </td><td>' . Auth::User()->contact_a . '</tr>
            <tr><td>Shipping Contact </td><td>' . Auth::User()->contact_s . '</tr>
            <tr><td>Shipping Address </td><td>' . Auth::User()->address1_s . ' ' . Auth::User()->address2_s . ' ' . Auth::User()->city_s . ' ' . Auth::User()->state_s . ' ' . Auth::User()->zip_s . '</tr>
            <tr><td>Proof Image </td><td><a href="' . url($item_prod->options->proofPath) . '">' . $item_prod->options->proofPath . '</a></tr></tbody>';
        }
            $cartOrderProduction .= '</table><br>';

            }

        $cartOrderEmail = $cartOrderEmail . $cartOrder;

        $confirmOrder = Order::where('confirmation', Session::get('confirmation'))->first();

        $confPicPath = "";

        if (file_exists('assets/conf/' . Auth::user()->username)) {
            $confPicPath = 'assets/conf/' . Auth::user()->username . '/' . Session::get('confirmation') . '.png';
        } else {
            File::makeDirectory('assets/conf/' . Auth::user()->username);
            $confPicPath = 'assets/conf/' . Auth::user()->username . '/' . Session::get('confirmation') . '.png';
        }

        Browsershot::html($cartOrderEmail)->fullPage()->save($confPicPath);

        \Mail::to(Auth::user()->email)->send(new OrderConfirmEmail($cartOrderEmail));

        if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46' || $prod_layout == 'PDSBC' || $prod_layout == 'ADSBC') {
            \Mail::to('sheri.testa@hklaw.com')->send(new OrderConfirmEmail($cartOrderEmail));
            // \Mail::to('azc666@gmail.com')->send(new OrderConfirmEmail($cartOrderEmail));
        }

        \Mail::to('output@g-d.com')->send(new OrderProductionEmail($cartOrderProduction, $order));
        \Mail::to('output@g-d.com')->send(new OrderConfirmEmail($cartOrderEmail));

        // \Mail::to('austin@g-d.com')->send(new OrderProductionEmail($cartOrderProduction, $order));
        // \Mail::to('tmann999@gmail.com')->send(new OrderProductionEmail($cartOrderProduction, $order));

        Cart::destroy();

        return view('/cart/cartOrder', compact('request', 'order', 'cartOrder','cartOrderWeb', 'cartOrderProduction', 'confirmation', 'confirmOrder', 'displayOrder', 'address_s', 'orderItems', 'item', 'cartOrderEmail', 'cartOrderToEmail', 'confPicPath'));
        }  else {
            return redirect('/cart/cartConfirm')->withErrorMessage('Please affirm that you have reviewed your proof(s) before placing your order.');
        }
    }
}