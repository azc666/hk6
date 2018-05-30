<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create()
    {
        // return User::create([
        //     // 'username' => 'usernameeee',
        //     'username' => $data['username'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);
        return view('auth/register');
    }

    public function register(Request $request, User $user)
    {
        
        $user = \App\User::create([
        'username' => $request->username,
        'email' =>  $request->email,
        'loc_name' =>  $request->loc_name,
        'loc_num' =>  $request->loc_num,
        'password' => bcrypt($request->password),
        ]);

        return redirect('login')->withSuccessMessage('User created successfully!');
        // dd('Register olé');
    }
}
