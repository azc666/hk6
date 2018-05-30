<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\Notifiable;
use App\Mail\ContactusEmail;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use Auth;
use File;
use Session;
use \Cart as Cart;
use Validator;


class UserController extends Controller
{
    public function show(User $user, Category $category)
    {

        return view('home', compact('user', 'category'));
        // dd($user);
    }

    public function showProfile(User $user, Request $request)
    {
        // dd('Hola show');
        $user = Auth::user();
        return view('user.profile', compact('request', 'user'));
    }

    public function editProfile(Request $request, User $user)
    {
        // dd('Hola edit');
        $user = Auth::user();

        $user->loc_name = $request->loc_name;
        $user->contact_a = $request->contact_a;
        $user->email = $request->email;
        $user->phone_a = $request->phone_a;
        $user->fax_a = $request->fax_a;
        $user->cell_a = $request->cell_a;

        $user->contact_b = $request->contact_b;
        $user->email_b = $request->email_b;
        $user->phone_b = $request->phone_b;
        $user->fax_b = $request->fax_b;
        $user->cell_b = $request->cell_b;
        $user->loc_address1 = $request->loc_address1;
        $user->loc_address2 = $request->loc_address2;
        $user->loc_city = $request->loc_city;
        $user->loc_state = $request->loc_state;
        $user->loc_zip = $request->loc_zip;

        $user->contact_s = $request->contact_s;
        $user->email_s = $request->email_s;
        $user->phone_s = $request->phone_s;
        $user->fax_s = $request->fax_s;
        $user->cell_s = $request->cell_s;
        $user->address1_s = $request->address1_s;
        $user->address2_s = $request->address2_s;
        $user->city_s = $request->city_s;
        $user->state_s = $request->state_s;
        $user->zip_s = $request->zip_s;

        $user->save();

        //dd($user->fax_a);

        return view('user.profile', compact('request', 'user'))->withSuccess('Your Profile has been Updated!');;
    }

    public function showContactus(Request $request, User $user)
    {
        //$user = Auth::user();

        return view('user.contactus', compact('request', 'user'));
    }

    public function sendContactus(Request $request, User $user)
    {
        $user = Auth::user();
        Session::put('loc_num', $request->loc_num);
        Session::put('loc_name', $request->loc_name);
        Session::put('contactus_name', $request->contactus_name);
        Session::put('contactus_email', $request->contactus_email);
        Session::put('contactMessage', $request->contactMessage);

        if ($request->portalSupport == 1) {
           Session::put('portalSupport', 'Yes');
        } else {
           Session::put('portalSupport', 'Not Requested');            
        }

        if ($request->productInfo == 1) {
           Session::put('productInfo', 'Yes');
        } else {
           Session::put('productInfo', 'Not Requested');            
        }

        if ($request->other == 1) {
           Session::put('other', 'Yes');
        } else {
           Session::put('other', 'Not Requested');            
        }

        //dd(Session::get('other'));

        \Mail::to(Session::get('contactus_email'))->send(new ContactusEmail($user, $request));
        
        // dd($request->contactMessage);
        return view('home')->withSuccess('Thanks ' . $request->contactus_name . '. Your message has been sent!');
    }

}
