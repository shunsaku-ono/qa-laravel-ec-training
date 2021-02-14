<?php

namespace App\Http\Controllers\Auth;

use App\MUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/products';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'last_name' => ['required', 'string', 'max:16'],
            'first_name' => ['required', 'string', 'max:16'],
            'zipcode' => ['required', 'string', 'max:8'],
            'prefecture' => ['required', 'string', 'max:16'],
            'municipality' => ['required', 'string', 'max:16'],
            'address' => ['required', 'string', 'max:16'],
            'apartments' => ['max:32'],
            'email' => ['required', 'string', 'email', 'max:128', 'unique:m_users'],
            'phone_number' => ['required', 'string', 'max:14', 'unique:m_users'],
            'password' => ['required', 'string', 'max:64', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return MUser::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'zipcode' => $data['zipcode'],
            'prefecture' => $data['prefecture'],
            'municipality' => $data['municipality'],
            'address' => $data['address'],
            'apartments' => $data['apartments'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
