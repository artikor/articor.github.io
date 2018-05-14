<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Маршруты публичной части сайта*/
Route::get('/', "WebCtrl\WebControl@Index")->name("index");
Route::get('/shops', "WebCtrl\WebControl@Shops")->name("shops");
Route::get('/about', "WebCtrl\WebControl@About")->name("about");
Route::get('/catalog', "WebCtrl\WebControl@Catalog")->name("catalog");
Route::get('/catalog/{id}', "WebCtrl\WebControl@ProductDetail")->name("cat_detail");
Route::get('/delivery', "WebCtrl\WebControl@Delivery")->name("delivery");

/*Вход в приложение*/
Route::get('/login', "Auth\LoginController@showLoginForm")->name("login");
Route::post('/login', "Auth\LoginController@login")->name("login");

/*Сброс пароля*/

Route::match(['get', 'post'],'/replace', "Auth\LoginController@replace")->name("replace");

/*Выход из приложения*/
Route::get('/logout', "Auth\LoginController@logout")->name("logout");


//Auth::routes();


Route::group(['prefix'=>'/app','middleware'=>'auth'],function(){

	/*Общие маршруты для всех сотрудников*/
	Route::get('/', 'AppCtrl\AppController@index')->name('home');
	Route::get('/users', 'AppCtrl\AppController@users')->name('users');
	Route::get('/user/{id}', 'AppCtrl\AppController@user')->name('user');


	/*Группа маршрутов для работы менеджера и продавцов*/
	Route::group(['prefix'=>'/shop'/*,'middleware'=>'shop'*/],function(){
		Route::get('/customer', 'WebCtrl\WebControl@Index')->name('web');
	});

	/*Группа маршрутов для работы администратора*/
	Route::group(['prefix'=>'/admin'/*,'middleware'=>'admin'*/],function(){
		Route::match(['get', 'post'], '/users/register', 'Auth\RegisterController@register')->name('register');
		Route::match(['get', 'post'], '/user/{id}', 'Auth\RegisterController@update')->name('userUpdate');
	});

});