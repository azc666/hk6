<?php

namespace App\Classes;

use App\Http\Requests;
use Session;

Class LayoutHelpersClass
{
    Public function getPhoneNumbers() 
    {
        //$i = $_SESSION['i'];
        $phone = '';
        if (Session::get('phonen')) {
            $phone .= Session::get('phonen'). ' &#8226; ';
        } else {
            $phone .= 'youhoo';
            //echo '<br>';
        } 

        //     if (($request->phone) && ($request->fax || $request->cell)) {
        //     $phone .= $request->phone . ' &#8226; ';
        // } elseif (empty($request->fax) && empty($request->cell)) {  
        //     $phone .= $request->phone;
        // }

        // if ($request->fax) {
        //     $phone .= 'Fax ' .  $request->fax;
        // }

        // if (($request->cell) && ($request->fax)) {
        //     $phone .= ' &#8226; Cell ' . $request->cell; 
        // } elseif ($request->cell && ($request->phone)) {
        //     $phone .= 'Cell ' . $request->cell;
        // } elseif ($request->cell) {    
        //     $phone .= 'Cell ' . $request->cell;z
        // echo 'hola';
        return $phone;
    }
}