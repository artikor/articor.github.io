<?php

namespace App\Http\Controllers\AppCtrl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class UserController extends Controller
{
	/*public $phone;
	public function __construct(){
		$phone = User::where('login','admin')->firstOrFail();
		$this->phone = $phone->phone;
	}

   public function update($id)
	{
		$user = User::find($id);
		return view('App.pages.updateUser')->with([
			'support'=>$this->phone, 
			'user'=>$user, 
			'msg'=>null]);
	}*/
}
