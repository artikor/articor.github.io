<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\User;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/app';
    public $phone;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $phone = User::where('login','admin')->firstOrFail();
        $this->phone = $phone->phone;
        $this->middleware('guest')->except('logout');
    }

    public function replace(Request $request)
    {
        if($request->isMethod("POST")){
            //$this->Validator($request->all())->validate();;



            $validate = $this->loginValidator($request->all());
            
            if($validate===true){
                User::where('login',$request->login)
                ->update(['password' => Hash::make($request->password)]);
                if ($this->attemptLogin($request))
                    return $this->sendLoginResponse($request);
            }
            else{
                return view('Web.pages.replace')->with(["err"=>$validate]);
            }
        }
        else return view('Web.pages.replace')->with(["err"=>[]]);
    }

    protected function loginValidator(array $data){
        $user = DB::table("users")->where('login',$data['login'])->first();
        $errors = null;
        
        if($user == null) {
            $errors['login'] = "Логин не существует";
            return $errors;
        }
        if(!Hash::check($data['old-password'], $user->password))
            $errors['old-password'] = "неправильный пароль";
        if(mb_strlen($data['password'])<6)
            $errors['password'] = "новый пароль короче 6 символов";
        if($data['password']!=$data['password_confirmation']){
            $errors['password'] = "пароль и подтверждение не совпадают";
            $errors['confirm'] = "пароль и подтверждение не совпадают";
        }
        if($errors == null) 
            return true;
        else
            return $errors;
    }
}
