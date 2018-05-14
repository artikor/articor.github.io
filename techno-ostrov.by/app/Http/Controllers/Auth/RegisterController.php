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
    protected $redirectTo = '/app/admin/users/register';
    protected $username = 'login';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $update=false)
    {
        $validate = [
            'login' => 'unique:users|required|string|max:200',
            'fio' => 'required|string|max:150',
            'phone' => 'required|string|max:15',
            'position' => 'required|string|max:150',
            'role' => 'required|string|max:25',
            'djob' => 'nullable|date',
            'dbirth' => 'nullable|date',
            'file-image' => 'mimes:jpeg,bmp,png'
        ];

        if($update)
            $validate['dlayoff'] = 'nullable|date';

        return Validator::make($data, $validate);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'login' => $data['login'],
            'password' => Hash::make("123456"),
            'fio' => $data['fio'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'position' => $data['position'],
            'djob' => $this->getCreatedAtAttribute($data['djob']),
            'dbirth' => $this->getCreatedAtAttribute($data['dbirth']),
            'image' => $data['image']
        ]);
    }

    protected function updateUser(array $data, $user)
    {
        
        $userInput = [
            'login' => $data['login'],
            'fio' => $data['fio'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'position' => $data['position'],
            'djob' => $this->getCreatedAtAttribute($data['djob']),
            'dbirth' => $this->getCreatedAtAttribute($data['dbirth']),
            'dlayoff' => $this->getCreatedAtAttribute($data['dlayoff']),
            'image' => $data['image']
        ];
        $user->update($userInput);
    }

    public function getCreatedAtAttribute($value)
    {
        if($value==null) 
            return null;
        $date = \Carbon\Carbon::parse($value);
        return $date->format('Y-m-d');
    }
}
