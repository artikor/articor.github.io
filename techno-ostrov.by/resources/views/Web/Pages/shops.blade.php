@extends("Web/layouts/template")

@section("description","About")
@section("title","Main page")

@section("content")
<h1>Магазины</h1>	
@if($objshop!=null)
	dump($objshop);
@else Магазины отсутствуют!
@endif

@endsection