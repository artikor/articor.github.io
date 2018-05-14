@extends("App/layouts/template")

@section("description","Редактирование информации о пользователе")
@section("title","Редактирование информации о пользователе")

@section("content")
<h1>Форма редактирования данных пользователя</h1>
<form class="form" method="POST" action="{{ route('userUpdate',$user->id) }}" enctype="multipart/form-data">
   @csrf

	<div class="group-form">
	   <label for="fio">Фио</label>
	   <div class="input-errors">
			<input id="fio" type="text" class="input-control" name="fio" value="{{ old('fio')==null?$user->fio:old('fio') }}" autofocus>
			@if ($errors->has('fio'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('fio') }}</strong>
         </span>
	    	@endif
		</div>
	</div>

	<div class="group-form">
	   <label for="position">Должность</label>
	   <div class="input-errors">
			<input id="position" type="text" class="input-control" name="position" value="{{ old('position')==null?$user->position:old('position') }}">
			@if ($errors->has('position'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('position') }}</strong>
         </span>
	    	@endif
		</div>
	</div>

	<div class="group-form">
	   <label for="phone" class="">{{ __('Телефон') }}</label>
	   <div class="input-errors">
	 		<input id="phone" type="text" class="input-control" name="phone" value="{{ old('phone')==null?$user->phone:old('phone') }}">
	 		@if ($errors->has('phone'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('phone') }}</strong>
         </span>
	    	@endif
	 	</div>
	</div>

	<div class="group-form">
	   <label for="dbirth" class="">{{ __('Дата рождения') }}</label>
	   <div class="input-errors">
	 		<input id="dbirth" type="text" class="input-control" name="dbirth" value="{{ old('dbirth')==null?Carbon\Carbon::parse($user->dbirth)->format('d.m.Y'):old('dbirth')}}">
	 		@if ($errors->has('dbirth'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('dbirth') }}</strong>
         </span>
	    	@endif
	 	</div>
	</div>

	<div class="group-form">
	   <label for="djob" class="">{{ __('Дата трудоустройства') }}</label>
	   <div class="input-errors">
	 		<input id="djob" type="text" class="input-control" name="djob" value="{{ old('djob')==null?Carbon\Carbon::parse($user->djob)->format('d.m.Y'):old('djob') }}">
	 		@if ($errors->has('djob'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('djob') }}</strong>
         </span>
	    	@endif
	 	</div>
	</div>

	<div class="group-form">
	   <label for="dlayoff" class="">{{ __('Дата увольнения') }}</label>
	   <div class="input-errors">
	 		<input id="dlayoff" type="text" class="input-control" name="dlayoff" value="{{ (old('dlayoff')==null && $user->dlayoff !=null)?Carbon\Carbon::parse($user->dlayoff)->format('d.m.Y'):old('dlayoff') }}">
	 		@if ($errors->has('dlayoff'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('dlayoff') }}</strong>
         </span>
	    	@endif
	 	</div>
	</div>

	<div class="group-form">
	   <label for="role" class="">{{ __('Роль') }}</label>
	   <div class="input-errors">
			<select class="input-control" name="role">
				<option {{$user->role=="seller"?'selected':''}} value="seller">продавец</option>
				<option {{$user->role=="manager"?'selected':''}} value="manager">менеджер</option>
				<option {{$user->role=="principal"?'selected':''}} value="principal">руководство</option>
			</select>
			@if ($errors->has('role'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('role') }}</strong>
         </span>
	    	@endif
		</div>
	</div>
   <div class="group-form">
	   <label for="login" class="">{{ __('Логин') }}</label>
	   <div class="input-errors">
	 		<input id="login" type="text" class="input-control" name="login" value="{{ old('login')==null?$user->login:old('login') }}">
	 		@if ($errors->has('login'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('login') }}</strong>
         </span>
	    	@endif
	 	</div>
	</div>

	<div class="group-form">
	   <label for="file-image">
			<div class="image-block">
				<img class="image" src="{{url('public/Image/users/'.$user->image)}}">
			</div>
	   </label>
	   <div class="input-errors">
	 		<input id="file-image" type="file" class="input-control" name="file-image">
	 		@if ($errors->has('file-image'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('file-image') }}</strong>
         </span>
	    	@endif
	 	</div>
	</div>
	
	<div class="form-menu-1">
	   <button type="submit" class="btn-submit">
         {{ __('сохранить') }}
     </button>
	</div>


</form>

@if($msg!=null)
	<span class="msg">{{$msg}}</span>
@endif

@endsection