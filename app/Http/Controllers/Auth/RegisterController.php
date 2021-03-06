<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name'           => ['required', 'string', 'max:80'],
            'lastname'       => ['required', 'string', 'max:80'],
            'control_number' => ['required', 'integer', 'min:8', 'unique:users'],
            'activity'       => ['required', 'string', 'max:80'],
            'email'          => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password'       => ['required', 'string', 'min:8', 'confirmed'],
            'career'         => ['required', 'string'],
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
        $user = User::create([
            'name'           => $data['name'],
            'lastname'       => $data['lastname'],
            'control_number' => $data['control_number'],
            'activity'       => $data['activity'],
            'email'          => $data['email'],
            'password'       => Hash::make($data['password']),
            'career'         => $data['career'],
        ]);

        $user->assignRole('estudiante');

        return $user;
    }
}
