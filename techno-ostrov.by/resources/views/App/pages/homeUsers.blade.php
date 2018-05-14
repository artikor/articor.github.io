@extends("App/layouts/template")

@section("description","Домашняя страница пользователя")
@section("title","Домашняя страница пользователя")

@section("content")

<h1>Домашняя страница пользователя</h1>
Добро пожаловать, {{Auth::user()->fio}}!
@if (session('status'))
   <div class="alert alert-success">
       {{ session('status') }}
   </div>
@endif

@endsection