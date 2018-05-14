@extends("Web/layouts/template")

@section("description","Вход в систему")
@section("title","Вход в систему")

@section("content")

<h1>Авторизация</h1>

Только для сотрудников магазина

<form class="form" method="POST" action="{{ route('login') }}">
{{ csrf_field() }}
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
       <label for="password" class="">{{ __('Пароль*') }}</label>
       <div class="input-errors">
            <input id="password" type="password" class="input-control" name="password" required>
            @if ($errors->has('password'))
         <span class="invalid-feedback">
             <strong>{{ $errors->first('password') }}</strong>
         </span>
            @endif
        </div>
    </div>
    
    <div class="form-menu-2">
        <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Запомнить меня') }}
        </label>
        <button type="submit" class="btn-submit">
            {{ __('войти') }}
        </button>
    </div>
</form>
@endsection