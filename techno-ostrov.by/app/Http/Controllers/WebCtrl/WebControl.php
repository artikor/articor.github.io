<?php

namespace App\Http\Controllers\WebCtrl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tables\Shop;
use App\Data;

class WebControl extends Controller
{
   

   public static function Index(){
   	return view('Web.Pages.index');
   }

   public static function Shops(){
   	$objshop = Shop::find(1);
      return view('Web.Pages.shops')->with('objshop',$objshop);
   }

   public static function Delivery(){
   	return view('Web.Pages.delivery');
   }

   public static function Catalog(){
      Data::InsertIntoBonus();  

   	return view('Web.Pages.catalog');
   }

   public static function About(){

      return view('Web.Pages.about');
   }

   public static function ProductDetail($id){
      
      return view('Web.Pages.catalog');
   }

}
