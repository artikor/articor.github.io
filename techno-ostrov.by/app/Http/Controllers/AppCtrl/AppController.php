<?php

namespace App\Http\Controllers\AppCtrl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Carbon\Carbon;

class AppController extends Controller
{
	public $phone;
	public function __construct(){
		$phone = User::where('login','admin')->firstOrFail();
		$this->phone = $phone->phone;
	}

   public function index()
	{
		return view('App.pages.homeUsers')->with(['support'=>$this->phone]);
	}

	public function users(){
		$users = User::orderby('fio')->paginate(15,['id','fio','phone','position','image']);
		return view('App.pages.listUsers')->with(['support'=>$this->phone, 'users'=>$users]);
	}

	public function user($id){
		$user = User::find($id);
		return view('App.pages.aboutUser')->with(['support'=>$this->phone, 'user'=>$user]);
	}
}
