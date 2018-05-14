<!doctype html>
<html lang="{{ config('app.locale') }}">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="@yield('description')"/>
	<link rel="icon" type="image/png" href="/favicon.png"/>
    <link rel='stylesheet' href="{{url('public/css/style.css')}}">
	<link rel='stylesheet' href="{{url('public/css/appforms.css')}}">
	<link rel='stylesheet' href="{{url('public/css/font-awesome.min.css')}}">
	@yield('css')

	<!--JS files-->

	@yield('js')
	<title>@yield('title')</title>
</head>
<body>
<div class="site">
    <header>
    <img src="{{url('public/image/logo.png')}}" alt="логотип компании">
        <div class="info">
            <div class="phone">
                <span>+375(25)2582581</span>  <span>+375(29)2582581</span> <span>+375(33)2582581</span>
            </div>
            <nav>
                <a href="{{route('home')}}">Главная</a>
                <a href="{{route('catalog')}}">Каталог</a>
                <a href="{{route('shops')}}">Магазины</a>
                <a href="{{route('delivery')}}">Доставка</a>    
                <a href="{{route('about')}}">О компании</a>  
            </nav>      
        <div>
    </header>