<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Storage;
use File;
use Auth;
use App\PriceController;

class CategoryController extends Controller
{
    public function show(Category $category, Request $request)
    {
         session(['catId' => $category->id, 'catName' => $category->cat_name]);

        $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
        $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';

        File::delete([$pathToPdf, $pathToWhereJpgShouldBeStored]);

        return view('category.show', compact('category', 'request', 'product'));
}

    public function showStaffCategories(Category $category, Request $request, Product $product)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);
        $product = Product::all();
        return view('category.staff', compact('category', 'request', 'categories', 'product'));
    }

    public function showAssociateCategories(Category $category, Request $request, Product $product)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);
        $product = Product::all();
        return view('category.associate', compact('category', 'request', 'categories', 'product'));
    }

    public function showPartnerCategories(Category $category, Request $request, Product $product)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);
        $product = Product::all();
// $descr = Product::all();
        return view('category.partner', compact('category', 'request', 'categories', 'product'));
    }

}
