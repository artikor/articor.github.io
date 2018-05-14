<!doctype html>
<html lang="{{ config('app.locale') }}">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="@yield('description')"/>
	<link rel="icon" type="image/png" href="/favicon.png"/>

	<link rel='stylesheet' href="{{url('public/css/gridbricks.css')}}">
	<link rel='stylesheet' href="{{url('public/css/app.css')}}">
	<link rel='stylesheet' href="{{url('public/css/pages.css')}}">
	<link rel='stylesheet' href="{{url('public/css/buttons.css')}}">
	<link rel='stylesheet' href="{{url('public/css/font-awesome.min.css')}}">
	@yield('css')
	<title>@yield('title')</title>
</head>
<body>
	<div class="curtain" onclick="butShowNav()"></div>
	<div class="ra12 nav-wrap">
		<div class="nav-panel">
			<nav id="nav-panel">
				@if(Auth::user()->role=="admin")
		         <a href="#" class="ra12">КАТАЛОГ</a>
		         <a href="#" class="ra12">МАГАЗИНЫ</a>
		         <a href="{{route('users')}}" class="ra12">ПОЛЬЗОВАТЕЛИ</a>
		         <a href="#" class="ra12">СБРОС ПАРОЛЕЙ</a>
		         <a href="#" class="ra12">ПРИВЯЗКИ</a> 
		      @endif				
			</nav>
		</div>
	</div>

<div class="window site">
	<header class="ra12 just_between">
		<div class="ra2 rd6 p4">
			<i title="главное меню" class="fa fa-bars fa-lg but-nav" onclick="butShowNav()" aria-hidden="true"></i>
			<a title="домашняя страница" href="{{route('home')}}" class="brand hide_ac">Sales Organizer</a>
		</div>
		<div class="ra10 rd6 p6">
			<span class="userName">{{Auth::user()->fio}}</span>
			<a title="выход из приложения" href="{{route('logout')}}" class="fa fa-sign-out fa-lg but-nav" aria-hidden="true"></a>
		</div>
	</header>