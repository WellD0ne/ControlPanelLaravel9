@extends('layouts.app')

@section('navbar')
@endsection

@section('content')
{{--    @include('layouts.popupfrommain')--}}

    <form method="POST" action="{{ route('login') }}" class="form-signin">
        @csrf
        <div class="text-center">
            <img class="mb-4" src="{{ asset('images/logomark.min.svg') }}" alt="logo" height="52">
        </div>
        <h1 class="h3 mb-3 font-weight-normal">У Вас есть договор с провайдером?</h1>
        <p>Введите номер договора и пароль для получения доступа к личному кабинету.</p>
        <div class="form-group row">
            <input id="username" type="username" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="username" placeholder="Номер договора" autofocus>

            @error('login')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
        <div class="form-group row">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Пароль">

            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
        <div class="form-group row mt-n4">
            <div class="forgot-password col px-0">
                <a href="#" class="btn btn-link float-right px-0" data-toggle="modal" data-target="#forgotPassword">Не помню пароль</a>
            </div>
        </div>

        <div class="checkbox mb-3 d-none d-md-block">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" checked="checked">

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
        <p class="mt-5 mb-3 text-muted text-center">Личный кабинет работает в тестовом режиме! В настоящее время некоторые функции доступны только в <a href=".">старой версии личного кабинета</a>.</p>
        <p class="mt-5 mb-3 text-muted text-center">Демо данные:<br>
        Логин: 59216-04-1998 <br>
        Пароль: password</p>
    </form>

    <!-- Modal ForgotPassword -->
    <div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="forgotPassword" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPassword">Забыли пароль!?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Для восстановления данных обратитесь в службу технической поддержки по телефону: <a href="tel:555555">555555</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
@endsection
