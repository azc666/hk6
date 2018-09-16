<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Title;
use App\Phone;
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
// use Input;
use Spatie\PdfToImage\Pdf as sPdf;
// use bnbwebexpeBnb\PdfToImage\Pdf as bnbPdf;

class ProductController extends Controller
{
    public function show(Request $request, Product $product, Category $category)
    {
        Session::put('prodId', $product->id);
        
        if ($product->id == 101 || $product->id == 104 || $product->id == 107) {
            $titles = Title::where('type', 'Staff')->orderBy('title')->pluck('title', 'title');
        }
        if ($product->id == 102 || $product->id == 105 || $product->id == 108 || $product->id == 110) {
            $titles = Title::where('type', 'Associate')->orderBy('title')->pluck('title', 'title');
        }
        if ($product->id == 103 || $product->id == 106 || $product->id == 109 || $product->id == 111) {
            $titles = Title::where('type', 'Partner')->orderBy('title')->pluck('title', 'title');
        }
        return view('products.show', [$product->id], compact('product', 'category', 'request', 'titles'));

    }

    public function index(Product $products)
    {
        // $category = $products->categories()->orderBy('created_at', 'desc')->paginate(2);
         //$category = Category::all();
//         $articles = Article::with('users')->all();
         //$products = Product::all();
         //$product = Product::orderBy('prod_name', 'desc');

         //$filePath = 'assets/mpdf/temp/showData.jpg';

         //Storage::disk('public')->put('"mpdf/temp/" . {Auth::user->username} . "/showData.jpg"', $filePath);
         //Storage::disk('public')->delete('showData.jpg');
         //$exists = Storage::disk('public')->exists('showData.jpg');
         //echo $exists;
        return view('products.index', compact('category', 'products'));
    }

    public function showData(Request $request, Product $product)
    {   
        if ($request->id == 101 || $request->id == 104 || $request->id == 107) {
            $titles = Title::where('type', 'Staff')->orderBy('title')->pluck('title', 'title');
        }
        if ($request->id == 102 || $request->id == 105 || $request->id == 108 || $request->id == 110) {
            $titles = Title::where('type', 'Associate')->orderBy('title')->pluck('title', 'title');
        }
        if ($request->id == 103 || $request->id == 106 || $request->id == 109 || $request->id == 111) {
            $titles = Title::where('type', 'Partner')->orderBy('title')->pluck('title', 'title');
        }

        $numb = $request->phone;
        $numbfax = $request->fax;
        $numbcell = $request->cell;
        $numb2 = $request->phone2;
        // if (Auth::user()->username == 'HK34') {
        //     $numb2 = "hola";
        //     exit;
        // }
        $numbfax2 = $request->fax2;
        $numbcell2 = $request->cell2;

        $phone = '';
        if (($request->phone) && ($request->fax || $request->cell)) {
            $phone .= 'T ' . Phone::phoneNumber($numb) . ' | ';             
        } elseif (empty($request->fax) && empty($request->cell)) {
            $phone .= 'T ' . Phone::phoneNumber($numb);
        }
        if ($request->cell) {
            $phone .= 'M ' .  Phone::cellNumber($numbcell);
        }
        if (($request->cell) && ($request->fax)) {
            $phone .= ' | F ' . Phone::faxNumber($numbfax);
        } elseif ($request->fax && ($request->phone)) {
            $phone .= 'F ' . Phone::faxNumber($numbfax);
        } elseif ($request->fax) {
            $phone .= 'F ' . Phone::faxNumber($numbfax);
        }
        if ((!$request->phone) && (!$request->fax && !$request->cell)) {
            $phone = null; 
        } 

        $phone2 = '';
        if (($request->phone2) && ($request->fax2 || $request->cell2)) {
            $phone2 .= 'T ' . Phone::phoneNumber($numb2) . ' | ';             
        } elseif (empty($request->fax2) && empty($request->cell2)) {
            $phone2 .= 'T ' . Phone::phoneNumber($numb2);
        }
        if ($request->cell2) {
            $phone2 .= 'M ' .  Phone::cellNumber($numbcell2);
        }
        if (($request->cell2) && ($request->fax2)) {
            $phone2 .= ' | F ' . Phone::faxNumber($numbfax2);
        } elseif ($request->fax2 && ($request->phone2)) {
            $phone2 .= 'F ' . Phone::faxNumber($numbfax2);
        } elseif ($request->fax2) {
            $phone2 .= 'F ' . Phone::faxNumber($numbfax2);
        }
        if ((!$request->phone2) && (!$request->fax2 && !$request->cell2)) {
            $phone2 = null; 
        } 

        $request->merge(['phone' => Phone::phoneNumber($numb)]); 
        $request->merge(['fax' => Phone::faxNumber($numbfax)]);
        $request->merge(['cell' => Phone::cellNumber($numbcell)]);
        $request->merge(['phone2' => Phone::phoneNumber($numb2)]); 
        $request->merge(['fax2' => Phone::faxNumber($numbfax2)]);
        $request->merge(['cell2' => Phone::cellNumber($numbcell2)]);

        // $categories = App\Category::all();

        $HKName = '';
        if (Auth::user()->loc_num == 35) {
            $HKName = 'Holland & Knight México, SC';
        } elseif (Auth::user()->loc_num == 34) {           
            $HKName = 'Holland & Knight Colombia SAS';
        } elseif (Auth::user()->loc_num == 46) {           
            $HKName = 'Holland & Knight (UK) LLP';
        } else {
            $HKName = 'Holland & Knight LLP';
        }

        $HKEmail = '';
        $string = $request->email;
        $string2 = $request->email2;
        $pattern = '^\@(.*)$^';
        $replacement = '@hklaw.com';
        $HKEmail = preg_replace($pattern, $replacement, $string);
        $HKEmail2 = preg_replace($pattern, $replacement, $string2);

        $data = [];

        if (file_exists('assets/mpdf/temp/' . Auth::user()->username)) {
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
            $email = strtolower($request->email);
        } else {
            mkdir('assets/mpdf/temp/' . Auth::user()->username);
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        }

///////////////////// Business Cards ///////////////////////
      
        if ($request->id == 101 || $request->id == 102 || $request->id == 103) {
            $pdf = PDF::loadView('products.showData', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'phoneValidation', 'HKName', 'imagePath', 'HKEmail', 'HKEmail2'), [
                'mode'                 => '',
                'format'               => array(266, 152.4),    // jpg dimensions (665x381) / 2.5
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

//////////////// Double Sided Business Cards /////////////////        
// dd($request->prod_name); 
        if ($request->id == 110 || $request->id == 111) {
 // dd($request->id);           
// dd('hola');
        

            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'numb2', 'numbfax2', 'numbcell2', 'phone', 'phone2', 'phoneValidation', 'HKName', 'imagePath', 'HKEmail', 'HKEmail2', 'prod_layout', 'rowId', 'cartItem'), [
                'mode'                 => '',
                'format'               => array(300, 360),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }        

////////////////////// FYI Pads //////////////////////
        if ($request->id == 107 || $request->id == 108 || $request->id == 109) { 
            $pdf = PDF::loadView('products.showData', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'HKName', 'imagePath', 'HKEmail', 'HKEmail2'), [
                'mode'                 => '',
                'format'               => array(405.2, 517.6),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

////////////////////// Combo BC FYI Pads //////////////////////
        if ($request->id == 104 || $request->id == 105 || $request->id == 106) { 
            $pdf = PDF::loadView('products.showData', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'HKName', 'imagePath', 'HKEmail', 'HKEmail2'), [
                'mode'                 => '',
                'format'               => array(405.2, 517.6),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

        File::delete($pathToWhereJpgShouldBeStored);
        File::delete($pathToPdf);

        $pdf->save($pathToPdf);

        // Session::put('product_layout', $request->prod_layout);

        $im = new \Imagick($pathToPdf);
        $im->setImageFormat('jpg');

        file_put_contents($pathToWhereJpgShouldBeStored, $im);
// dd($pathToWhereJpgShouldBeStored);

// $output = '';
// $output .= "Fonts are:<br>";
 
// $fontList = \Imagick::queryFonts();
 
// foreach ($fontList as $fontName) {
//     $output .= '<li>' . $fontName . "</li>";
// }
 
// return $output;
// exit();


        // $im = new \Imagick($pathToPdf);
        // $im->setImageFormat('jpg');
        // header("Content-Type: image/jpg");
        // echo $im->getImageBlog();
        // exit();
        // file_put_contents($pathToWhereJpgShouldBeStored, $im);

        // $fonts = $im->queryfonts();
        // dd($fonts);

        // source PDF file
        // $source = $pathToPdf;
        // output file
        // $target = $pathToWhereJpgShouldBeStored;
        // create a command string 
 
        // exec('/usr/bin/convert "'.$source .'" -colorspace RGB -resize 800 "'.$target.'"', $output, $response);
         
        // echo $response ? "PDF converted to JPEG!!" : 'PDF to JPEG Conversion failed';
        // exit();

        // $sPdf = new sPdf($pathToPdf);
        // $sPdf->saveImage($pathToWhereJpgShouldBeStored);

        Session::put('prod_description', strip_tags($request->prod_description));
        Session::put('address2', $request->address2);
        // Session::put('cell', Phone::cellNumber($numbcell));

        // $titles = Title::pluck('id', 'type', 'title');
        return back()->withInput();

    }

//////////////////////////////////////////////////////////////////////////////
// ////////////////////  showEdit  /////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

    public function showEdit(Request $request, Product $product)
    {  
    
        $items = Cart::content();

    foreach ($items as $item) {
        
        $rowId = $item->rowId;
$cartItem = array(
    Cart::get($rowId)
    );
}


    // dd($request->prod_name);
// dd($cartItem);
        if ($request->prod_id == 101 || $request->prod_id == 104 || $request->prod_name == 'Staff Business Card' || $request->prod_name == 'Staff BC + FYI Pads') {
            $titles = Title::where('type', 'Staff')->orderBy('title')->pluck('title', 'title');
        }
        if ($request->prod_id == 102 || $request->prod_id == 105 || $request->prod_id == 108 || $request->prod_id == 110 || $request->prod_name == 'Associate Business Card' || $request->prod_name == 'Associate BC + FYI Pads' || $request->prod_layout == 'ADSBC') {
            $titles = Title::where('type', 'Associate')->orderBy('title')->pluck('title', 'title');
        }
        if ($request->prod_id == 103 || $request->prod_id == 106 || $request->prod_id == 111 || $request->prod_layout == 'PDSBC' || $request->prod_name == "Partner Business Card" || $request->prod_name == 'Partner BC + FYI Pads') {
            $titles = Title::where('type', 'Partner')->orderBy('title')->pluck('title', 'title');
        }
// dd($titles);
        $numb = $request->phone;
        $numbfax = $request->fax;
        $numbcell = $request->cell;
        $numb2 = $request->phone2;
        $numbfax2 = $request->fax2;
        $numbcell2 = $request->cell2;

        $phone = '';
        if (($request->phone) && ($request->fax || $request->cell)) {
            $phone .= 'T ' . Phone::phoneNumber($numb) . ' | ';             
        } elseif (empty($request->fax) && empty($request->cell)) {
            $phone .= 'T ' . Phone::phoneNumber($numb);
        }
        if ($request->cell) {
            $phone .= 'M ' .  Phone::cellNumber($numbcell);
        }
        if (($request->cell) && ($request->fax)) {
            $phone .= ' | F ' . Phone::faxNumber($numbfax);
        } elseif ($request->fax && ($request->phone)) {
            $phone .= 'F ' . Phone::faxNumber($numbfax);
        } elseif ($request->fax) {
            $phone .= 'F ' . Phone::faxNumber($numbfax);
        }
        if ((!$request->phone) && (!$request->fax && !$request->cell)) {
            $phone = null; 
        } 

        $phone2 = '';
        if (($request->phone2) && ($request->fax2 || $request->cell2)) {
            $phone2 .= 'T ' . Phone::phoneNumber($numb2) . ' | ';             
        } elseif (empty($request->fax2) && empty($request->cell2)) {
            $phone2 .= 'T ' . Phone::phoneNumber($numb2);
        }
        if ($request->cell2) {
            $phone2 .= 'M ' .  Phone::cellNumber($numbcell2);
        }
        if (($request->cell2) && ($request->fax2)) {
            $phone2 .= ' | F ' . Phone::faxNumber($numbfax2);
        } elseif ($request->fax2 && ($request->phone2)) {
            $phone2 .= 'F ' . Phone::faxNumber($numbfax2);
        } elseif ($request->fax2) {
            $phone2 .= 'F ' . Phone::faxNumber($numbfax2);
        }
        if ((!$request->phone2) && (!$request->fax2 && !$request->cell2)) {
            $phone2 = null; 
        } 

        $request->merge(['phone' => Phone::phoneNumber($numb)]); 
        $request->merge(['fax' => Phone::faxNumber($numbfax)]);
        $request->merge(['cell' => Phone::cellNumber($numbcell)]);
        $request->merge(['phone2' => Phone::phoneNumber($numb2)]); 
        $request->merge(['fax2' => Phone::faxNumber($numbfax2)]);
        $request->merge(['cell2' => Phone::cellNumber($numbcell2)]);

        $HKName = '';
        if (Auth::user()->loc_num == 35) {
            $HKName = 'Holland & Knight México, SC';
        } elseif (Auth::user()->loc_num == 34) {           
            $HKName = 'Holland & Knight Colombia SAS';
        } elseif (Auth::user()->loc_num == 46) {           
            $HKName = 'Holland & Knight (UK) LLP';
        } else {
            $HKName = 'Holland & Knight LLP';
        }

        $HKEmail = '';
        $string = $request->email;
        $string2 = $request->email2;
        $pattern = '^\@(.*)$^';
        $replacement = '@hklaw.com';
        $HKEmail = preg_replace($pattern, $replacement, $string);
        $HKEmail2 = preg_replace($pattern, $replacement, $string2);
// dd($request->phone);
        $data = [];

        if (file_exists('assets/mpdf/temp/' . Auth::user()->username)) {
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        } else {
            // mkdir('assets/mpdf/temp/' . Auth::user()->username);
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        }

//////////////// Business Cards /////////////////        
// dd($request->prod_name); 
        if ($request->prod_id == 101 || $request->prod_id == 102 || $request->prod_id == 103 || $request->prod_name == "Staff Business Card" || $request->prod_name == "Associate Business Card" || $request->prod_name == "Partner Business Card") {
            // dd($cartItem->options->prod_layout);
        // if ($rowId == 'c492c0feb72cf4011e2511bc49968c71') {
            # code...
        

            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'phoneValidation', 'HKName', 'imagePath', 'HKEmail', 'HKEmail2', 'prod_layout', 'rowId', 'cartItem'), [
                'mode'                 => '',
                'format'               => array(266, 152.4),    // jpg dimensions (665x381) / 2.5
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }
// 
//////////////// Double Sided Business Cards /////////////////        

//   dd('hola');       
        if ($request->prod_id == 110 || $request->prod_id == 111 || $request->prod_name == "Associate Double Sided BC" || $request->prod_name == "Partner Double Sided BC") {
 // dd($request->email2);           
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'numb2', 'numbfax2', 'numbcell2', 'phone', 'phone2', 'phoneValidation', 'HKName', 'imagePath', 'HKEmail', 'HKEmail2', 'prod_layout', 'rowId', 'cartItem', 'titles'), [
                'mode'                 => '',
                'format'               => array(300, 360),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }        

/////////////////////// FYI Pads ///////////////////////        
        if ($request->prod_id == 107 || $request->prod_id == 108 || $request->prod_id == 109 || $request->prod_name == "Staff FYI Pads" || $request->prod_name == "Associate FYI Pads" || $request->prod_name == "Partner FYI Pads") { 
            // dd($cartItem->options->prod_id);
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'HKName', 'imagePath', 'HKEmail', 'HKEmail2', 'prod_layout', 'rowId', 'cartItem'), [
                'mode'                 => '',
                'format'               => array(405.2, 517.6),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

        ////////////// Combo BC FYI Pads ////////////
        if ($request->prod_id == 104 || $request->prod_id == 105 || $request->prod_id == 106 || $request->prod_name == 'Staff BC + FYI Pads' || $request->prod_name == 'Associate BC + FYI Pads' || $request->prod_name == 'Partner BC + FYI Pads') { 
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'HKName', 'imagePath', 'HKEmail', 'HKEmail2', 'prod_layout', 'rowId'), [
                'mode'                 => '',
                'format'               => array(405.2, 517.6),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

        File::delete($pathToWhereJpgShouldBeStored);
        File::delete($pathToPdf);
      
        $pdf->save($pathToPdf);
// dd($request->prod_layout);
Session::put('product_layout', $request->prod_layout);
// dd(Session::get('product_layout'));
        // $im = new \Imagick($pathToPdf);
        // $im->setImageFormat('jpg');

        // file_put_contents($pathToWhereJpgShouldBeStored, $im);

        $im = new Imagick();
        // $im->setResolution(80,80);
        $im->readimage($pathToPdf); 
        $im->setImageFormat('jpeg'); 
        $image_name = $pathToWhereJpgShouldBeStored;
        $im->writeImage($image_name); 
        $im->clear(); 
        $im->destroy();
// dd('hola');
        if ($request->prod_id == 101 || $request->prod_id == 104 || $request->prod_id == 107) {
            $titles = Title::where('type', 'Staff')->orderBy('title')->pluck('title', 'title');
        }
        if ($request->prod_id == 102 || $request->prod_id == 105 || $request->prod_id == 108) {
            $titles = Title::where('type', 'Associate')->orderBy('title')->pluck('title', 'title');
        }
        if ($request->prod_id == 103 || $request->prod_id == 106 || $request->prod_id == 109) {
            $titles = Title::where('type', 'Partner')->orderBy('title')->pluck('title', 'title');
        }
        return view('products.edit', compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'numb2', 'numbfax2', 'numbcell2', 'phone2', 'titles', 'HKEmail', '$HKEmail2', 'prod_layout', 'rowId'));

    }
}
