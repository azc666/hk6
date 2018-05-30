<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
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

class EditController extends Controller
{

    public function show(Request $request, Product $product, Category $category)
    { 
        Session::put('prod_id', $product->id);

        
// dd('Hola');
        return view('products.edit', [$item->rowId], compact('product', 'category', 'request', 'titles'));
    }

    public function update(Request $request, Product $product)
    {

        $emailuser = explode("@", Session::get('email'));
        $emailuser = $emailuser[0];
        $filePath = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        $proofFilePathDir = 'assets/proofs/' . Auth::user()->username  . '/';
        // dd(Session::get('prod_layout') . 'nope');
        $proofFilePath = 'assets/proofs/' . Auth::user()->username  . '/' . Session::get('prod_layout') . '-' . DisplayName::initials(Session::get('name')) . '-' . $emailuser . '-' . Carbon::now('America/New_York')->format('m-d-y-gis') . '-proof.jpg';
        $proofFilePathPdf = 'assets/proofs/' . Auth::user()->username  . '/' . Session::get('prod_layout') . '-' . DisplayName::initials(Session::get('name')) . '-' . $emailuser . '-' . Carbon::now('America/New_York')->format('m-d-y-gis') . '-proof.pdf';
        
        $im = new \Imagick($filePath);
        $im->setImageFormat('jpg');
        file_put_contents($proofFilePath, $im);
        $imp = new \Imagick($filePath);
        $imp->setImageFormat('pdf');
        file_put_contents($proofFilePathPdf, $imp);

        $rowId = $request->rowId;
        $prod_layout = Session::get('prod_layout');

            //$cartname = Cart::get($rowId)->options->email;

        $item = Cart::get($rowId);
        $option = $item->options->merge([
            'name' => Session::get('name'),
            'title' => Session::get('title'),
            'email' => Session::get('email'),
            'proofPath' => $proofFilePath,
            // 'community' => Session::get('community'),
            'address1' => Session::get('address1'),
            'address2' => Session::get('address2'),
            'city' => Session::get('city'),
            'state' => Session::get('state'),
            'zip' => Session::get('zip'),
            'phone' => Session::get('phone'),
            'fax' => Session::get('fax'),
            'cell' => Session::get('cell'),
            // 'license' => Session::get('license'),
            'specialInstructions' => Session::get('specialInstructions'),
            'prod_name' => strip_tags(Session::get('prod_name')),
            'prod_id' => $request->prod_id,
        ]);
// dd('hola');
            Cart::update(
                $rowId, [
                    'options' => $option
                ]);
              
            Session::put('proofFilePath', $proofFilePath);

            return redirect('cart')->withSuccessMessage('Your Cart has been updated!');  
    }
}
