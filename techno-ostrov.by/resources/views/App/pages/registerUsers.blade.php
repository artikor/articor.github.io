@extends("App/layouts/template")

@section("description","Добавление нового пользователя")
@section("title","Добавление нового пользователя")

@section("content")
<h1>Форма добавления нового пользователя</h1>
<form class="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
   @csrf

	<div class="group-form">
	   <label for="fio">Фио*</label>
	   <div class="input-errors">
			<input id="fio" type="text" class="input-control" name="fio" value="{{ old('fio') }}" required autofocus>
			@if ($errors->has('fio'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('fio') }}</strong>
         </span>
	    	@endif
		</div>
	</div>

	<div class="group-form">
	   <label for="position">Должность*</label>
	   <div class="input-errors">
			<input id="position" type="text" class="input-control" name="position" value="{{ old('position') }}" required>
			@if ($errors->has('position'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('position') }}</strong>
         </span>
	    	@endif
		</div>
	</div>

	<div class="group-form">
	   <label for="phone" class="">{{ __('Телефон*') }}</label>
	   <div class="input-errors">
	 		<input id="phone" type="text" class="input-control" name="phone" value="{{ old('phone') }}" required>
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
	 		<input id="dbirth" type="text" class="input-control" name="dbirth" value="{{ old('dbirth') }}">
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
	 		<input id="djob" type="text" class="input-control" name="djob" value="{{ old('djob') }}">
	 		@if ($errors->has('djob'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('djob') }}</strong>
         </span>
	    	@endif
	 	</div>
	</div>

	<div class="group-form">
	   <label for="role" class="">{{ __('Роль*') }}</label>
	   <div class="input-errors">
			{{--<input id="role" type="text" class="input-control" name="role" value="{{ old('role') }}" required>--}}

			<select class="input-control" name="role">
				<option value="seller">продавец</option>
				<option value="manager">менеджер</option>
				<option value="principal">руководство</option>
			</select>


			@if ($errors->has('role'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('role') }}</strong>
         </span>
	    	@endif
		</div>
	</div>

   <div class="group-form">
	   <label for="login" class="">{{ __('Логин*') }}</label>
	   <div class="input-errors">
	 		<input id="login" type="text" class="input-control" name="login" value="{{ old('login') }}" required>
	 		@if ($errors->has('login'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('login') }}</strong>
         </span>
	    	@endif
	 	</div>
	</div>

	<div class="group-form">
	   <label for="file-image" class="">{{ __('Добавить изображение') }}</label>
	   <div class="input-errors">
	 		<input id="file-image" type="file" class="input-control" name="file-image" required>
	 		@if ($errors->has('file-image'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('file-image') }}</strong>
         </span>
	    	@endif
	 	</div>
	</div>
	
	<div class="form-menu-1">
	   <button type="submit" class="btn-submit">
         {{ __('добавить') }}
     </button>
	</div>


</form>

@if($msg!=null)
	<span class="msg">{{$msg}}</span>
@endif


@endsection