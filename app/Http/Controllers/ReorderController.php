<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;
use Session;
use PDF;
use Imagick;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use ImagickPixel;
use ImageMagick;
use \Cart as Cart;
use App\Classes\LayoutHelpersClass;
use DisplayName;
use Carbon\Carbon;

class ReorderController extends Controller
{

    public function store(Request $request, Product $product)
    {
        $order = new Order;

        // $q = $order->whereDate('date', '<', date('2018-04-16'));
// dd ($order->name);

        // if ($q = $order->whereDate('date', '<', '2018-04-16')
        // ) {
        //     return redirect('cart')->withErrorMessage('Sorry, this confirmation cannot be reordered');
        // }

        $array = $order->where('confirmation', Session::get('showOrder'))->first();
        $data = unserialize($array->order_array);
        if ($array->created_at < date('2018-04-12')) {
            return redirect('cart')->withErrorMessage('Sorry, this confirmation (Confirmation# ' . Session::get('showOrder') . ') cannot be restored to a new cart. Please create a new order.');
        }
        if($data) {
            foreach($data as $val) {
                $prod_layout = $val['prod_layout'];
                // dd($val['prod_layout']);
                if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC' || $prod_layout == 'PDSBC' || $prod_layout == 'ADSBC') {
                    switch (Session::get('qty')) {
                        case '250': $quantity = 250; break;
                        case '500': $quantity = 500; break;
                        case '1000': $quantity = 1000; break;
                        default: $quantity = 250;
                    }
                }

                if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI') {
                    switch (Session::get('qty')) {
                        case '4': $quantity = 4; break;
                        case '8': $quantity = 8; break;
                        default: $quantity = 4;
                    }
                }

                if ($prod_layout == 'SBCFYI' || $prod_layout == 'ABCFYI' || $prod_layout == 'PBCFYI') {
                    switch (Session::get('qty')) {
                        case '24': $quantity = 24; break;
                        case '28': $quantity = 28; break;
                        case '54': $quantity = 54; break;
                        case '58': $quantity = 58; break;
                        default: $quantity = 24;
                    }
                }

                $price = 0;

                if (!array_key_exists('email2', $data[0])) {

                    // if ($array->created_at < date('2018-04-12')) {
                    //     return redirect('cart')->withErrorMessage(' Sorry, this confirmation,  (Confirmation # ' . Session::get('showOrder') . ')cannot be reordered');
                    // }
                    // dd($array->created_at < date('2018-04-12'));

                    Cart::add($val['row_id'], $val['order_type_o'], $quantity, $price, [
                        'rowId' =>  $val['row_id'],
                        'proofPath' => $val['proof_path'],
                        'name' =>  $val['name_o'],
                        'title' =>  $val['title_o'],
                        'email' =>  $val['email_o'],
                        'address1' =>  $val['address1_o'],
                        'address2' => $val['address2_o'],
                        'city' => $val['city_o'],
                        'state' => $val['state_o'],
                        'zip' => $val['zip_o'],
                        'phone' => $val['phone_o'],
                        'fax' => $val['fax_o'],
                        'cell' => $val['cell_o'],
                        'name2' =>  "",
                        'title2' =>  "",
                        'email2' =>  "",
                        'address1b' => "",
                        'address2b' => "",
                        'city2' => "",
                        'state2' => "",
                        'zip2' => "",
                        'phone2' => "",
                        'fax2' => "",
                        'cell2' => "",
                        'specialInstructions' => $val['sp_instr_o'],
                        'prod_name' => $val['order_type_o'],
                        'prod_layout' => $val['prod_layout'],
                        'prod_id' => $request->id,
                        'prod_description' => strip_tags($val['prod_descr']),
                        'imagePath' => Session::get('imagePath'),
                    ])->associate('App\Product');

                } else {

                    Cart::add($val['row_id'], $val['order_type_o'], $quantity, $price, [
                        'rowId' => $val['row_id'],
                        'proofPath' => $val['proof_path'],
                        'name' => $val['name_o'],
                        'title' => $val['title_o'],
                        'email' => $val['email_o'],
                        'address1' => $val['address1_o'],
                        'address2' => $val['address2_o'],
                        'city' => $val['city_o'],
                        'state' => $val['state_o'],
                        'zip' => $val['zip_o'],
                        'phone' => $val['phone_o'],
                        'fax' => $val['fax_o'],
                        'cell' => $val['cell_o'],
                        'name2' => $val['name2'],
                        'title2' => $val['title2'],
                        'email2' => $val['email2'],
                        'address1b' => $val['address1b'],
                        'address2b' => $val['address2b'],
                        'city2' => $val['city2'],
                        'state2' => $val['state2'],
                        'zip2' => $val['zip2'],
                        'phone2' => $val['phone2'],
                        'fax2' => $val['fax2'],
                        'cell2' => $val['cell2'],
                        'specialInstructions' => $val['sp_instr_o'],
                        'prod_name' => $val['order_type_o'],
                        'prod_layout' => $val['prod_layout'],
                        'prod_id' => $request->id,
                        'prod_description' => strip_tags($val['prod_descr']),
                        'imagePath' => Session::get('imagePath'),
                    ])->associate('App\Product');
                }
            }
        }
        $product = Product::all();

        return redirect('/cart')->withSuccessMessage(' Your archived order (Confirmation # ' . Session::get('showOrder') . ') has been restored to your cart!')->with($data);
    }


    ///////////////////////////////////////////////////////////////////
    public function storeReorder(Request $request, Product $product)
    {

        $order = new Order;
        $array = $order->where('confirmation', '99-1848-20457')->first();
        $render = unserialize($array->order_array);
        // dd($render);

       $emailuser = explode("@", Session::get('email'));
        $emailuser = $emailuser[0];
        $filePath = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        $proofFilePathDir = 'assets/proofs/' . Auth::user()->username  . '/';
        // dd(Session::get('prod_layout') . 'nope');
        $proofFilePath = 'assets/proofs/' . Auth::user()->username  . '/' . Session::get('prod_layout') . '-' . DisplayName::initials(Session::get('name')) . '-' . $emailuser . '-' . Carbon::now('America/New_York')->format('m-d-y-gis') . '-proof.jpg';
        $proofFilePathPdf = 'assets/proofs/' . Auth::user()->username  . '/' . Session::get('prod_layout') . '-' . DisplayName::initials(Session::get('name')) . '-' . $emailuser . '-' . Carbon::now('America/New_York')->format('m-d-y-gis') . '-proof.pdf';

        $rowId = $render[0]['row_id'];
        $prod_layout = Session::get('prod_layout');
// dd($rowId);

        $item = Cart::get($rowId);
        $option = $item->options->merge([
            'name' => Session::get('name'),
            'title' => Session::get('title'),
            'email' => Session::get('email'),
            'proofPath' => $proofFilePath,
            'address1' => Session::get('address1'),
            'address2' => Session::get('address2'),
            'city' => Session::get('city'),
            'state' => Session::get('state'),
            'zip' => Session::get('zip'),
            'phone' => Session::get('phone'),
            'fax' => Session::get('fax'),
            'cell' => Session::get('cell'),
            'specialInstructions' => Session::get('specialInstructions'),
            'prod_name' => strip_tags(Session::get('prod_name')),
            'prod_id' => $request->prod_id,
            // 'prod_id' => 103,
        ]);

        Session::put('proofFilePath', $proofFilePath);

        return redirect('cart')->withSuccessMessage('Your Cart has been updated!');
    }
}
