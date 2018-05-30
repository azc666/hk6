<?php

namespace App;

use Auth;

class Phone
{
    public static function phoneNumber($numb) {
        
        if (!is_numeric(substr($numb, 0, 1))  && !is_numeric(substr($numb, 1, 1))) { return $numb; }
     
        $chars = array(' ', '(', ')', '-', '.', '+');
        $numb = str_replace($chars, "", $numb);
               
            if (Auth::user()->username == 'HK34') {  // Bogotá
                $numb = '+' . substr($numb, 0, 2) . '.' . substr($numb, 2, 1) . '.' . substr($numb, 3, 3) . '.' . substr($numb, 6, 4);
            } elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46') { // México UK
                $numb = '+' . substr($numb, 0, 2) . '.' . substr($numb, 2, 2) . '.' . substr($numb, 4, 4) . '.' . substr($numb, 8, 4);
            } else {
                $numb = substr($numb, 0, 3) . '.' . substr($numb, 3, 3) . '.' . substr($numb, 6, 4); 
            }
        
      return $numb;
    }

    public static function cellNumber($numbcell) {
        
        if (!is_numeric(substr($numbcell, 0, 1))  && !is_numeric(substr($numbcell, 1, 1))) { return $numbcell; }
     
        $chars = array(' ', '(', ')', '-', '.', '+');
        $numbcell = str_replace($chars, "", $numbcell);
               
            if (Auth::user()->username == 'HK34') {  // Bogotá 2-3-3-4
                $numbcell = '+' . substr($numbcell, 0, 2) . '.' . substr($numbcell, 2, 3) . '.' . substr($numbcell, 5, 3) . '.' . substr($numbcell, 8, 4);
            } elseif (Auth::user()->username == 'HK35') { // México
                $numbcell = '+' . substr($numbcell, 0, 2) . '.' . substr($numbcell, 2, 2) . '.' . substr($numbcell, 4, 4) . '.' . substr($numbcell, 8, 4);
            } elseif (Auth::user()->username == 'HK46') { // UK
                $numbcell = '+' . substr($numbcell, 0, 2) . '.' . substr($numbcell, 2, 4) . '.' . substr($numbcell, 6, 6);
            } else {
                $numbcell = substr($numbcell, 0, 3) . '.' . substr($numbcell, 3, 3) . '.' . substr($numbcell, 6, 4); 
            }
        
      return $numbcell;
    }

    public static function faxNumber($numbfax) {
        
        if (!is_numeric(substr($numbfax, 0, 1))  && !is_numeric(substr($numbfax, 1, 1))) { return $numbfax; }
     
        $chars = array(' ', '(', ')', '-', '.', '+');
        $numbfax = str_replace($chars, "", $numbfax);
               
            if (Auth::user()->username == 'HK34') {  // Bogotá
                $numbfax = '+' . substr($numb, 0, 2) . '.' . substr($numbfax, 2, 1) . '.' . substr($numbfax, 3, 3) . '.' . substr($numb, 6, 4);
            } elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46') { // México UK
                $numbfax = '+' . substr($numbfax, 0, 2) . '.' . substr($numbfax, 2, 2) . '.' . substr($numbfax, 4, 4) . '.' . substr($numbfax, 8, 4);
            } else {
                $numbfax = substr($numbfax, 0, 3) . '.' . substr($numbfax, 3, 3) . '.' . substr($numbfax, 6, 4); 
            }
        
      return $numbfax;
    }
}
