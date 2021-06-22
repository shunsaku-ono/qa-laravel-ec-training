<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
    protected $redirectTo = '/';

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
            'last_name' => ['required', 'string', 'max:30'],
            'first_name' => ['required', 'string', 'max:30'],
            'zipcode' => ['required', 'string', 'max:7'],
            'prefecture' => ['required', 'string', 'max:100'],
            'municipality' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:100'],
            'apartments' => ['required', 'string', 'max:100'],
            'company_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:m_users'],
            'phone_number' => ['required', 'string', 'max:13'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'zipcode' => $data['zipcode'],
            'prefecture' => $data['prefecture'],
            'municipality' => $data['municipality'],
            'address' => $data['address'],
            'apartments' => $data['apartments'],
            'company_name' => $data['company_name'],
            'phone_number' => $data['phone_number'],
        ]);
    }
}
