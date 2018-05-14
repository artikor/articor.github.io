@extends("Web/layouts/template")

@section("description","Подтверждение пароля")
@section("title","Подтверждение пароля")

@section("content")

<h1>Смена пароля</h1>

<form class="form" method="POST" action="{{ route('replace') }}">
{{ csrf_field() }}

    <div class="group-form">
       <label for="login" class="">{{ __('Логин*') }}</label>
       <div class="input-errors">
            <input id="login" type="text" class="input-control" name="login" value="{{session('login')==null ? old('login') : session('login')}}" required>
            @if (array_key_exists('login', $err))
            <span class="invalid-feedback">
                <strong>{{ $err['login'] }}</strong>
            </span>
            @endif
        </div>
    </div>
    
    <div class="group-form">
       <label for="old-password">{{ __('Старый пароль*') }}</label>
       <div class="input-errors">
            <input id="old-password" type="password" class="input-control" name="old-password" autofocus required>
            @if (array_key_exists('old-password', $err))
            <span class="invalid-feedback">
                <strong>{{ $err['old-password'] }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="group-form">
       <label for="password">{{ __('Новый пароль*') }}</label>
       <div class="input-errors">
            <input id="password" type="password" class="input-control" name="password" required>
            @if ($err!=null && array_key_exists('password', $err))
         <span class="invalid-feedback">
             <strong>{{ $err['password'] }}</strong>
         </span>
            @endif
        </div>
    </div>

    <div class="group-form">
       <label for="password-confirm" class="">{{ __('Подтверждение пароля*') }}</label>
       <div class="input-errors">
            <input id="password-confirm" type="password" class="input-control" name="password_confirmation" required>
            @if ($err!=null && array_key_exists('confirm', $err))
             <span class="invalid-feedback">
                 <strong>{{ $err['confirm'] }}</strong>
             </span>
            @endif
        </div>
    </div>
    
    <div class="form-menu-1">
        <button type="submit" class="btn-submit">
            {{ __('войти') }}
        </button>
    </div>
</form>
@endsection