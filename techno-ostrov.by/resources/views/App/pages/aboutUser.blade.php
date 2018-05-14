@extends("App/layouts/template")

@section("description","Информация о пользователе")
@section("title","Информация о пользователе")

@section("content")

<h1>Информация о пользователе</h1>

<div class="about-user">
	<img class="image" src="{{url('public/Image/users/'.$user->image)}}">
	<div class="info">
		<span>ФИО: {{$user->fio}}
		@if(Auth::user()->role=="admin")
			<a title="редактировать карточку пользователя" href="{{route('userUpdate',$user->id)}}" class="fa fa-pencil" aria-hidden="true"></a>
		@endif
		</span>
		<span>Должность: {{$user->position}}</span>
		<span>Телефон: {{$user->phone}}</span>
		<span>Дата рождения: {{Carbon\Carbon::parse($user->dbirth)->format('d.m.Y')}}</span>
		<span>Дата трудоустройства: {{Carbon\Carbon::parse($user->djob)->format('d.m.Y')}}</span>

			@if($user->dlayoff==null)
				<span>Статус: работает </span>
				<span>Место работы: магазин </span>
			@else 
				<span>Статус: уволен </span>
				<span>Дата увольнения: {{Carbon\Carbon::parse($user->dlayoff)->format('d.m.Y')}}</span>
			@endif	
	</div>
</div>

<div class="back-link">
	<a href="javascript:history.back()" title="Вернуться на предыдущую страницу" > вернуться назад </a>
</div>


@endsection