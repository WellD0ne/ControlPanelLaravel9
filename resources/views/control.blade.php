@extends('layouts.app')

@section('content')
    <div class="container-xl bg-white min-vh-100 py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="">
                    {{-- @include('layouts.banner') --}}
                </div>
                <div class="d-none d-md-block">
                    @include('layouts.navmenu')
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>{!! Session::get('message') !!}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Обещанный платеж</div>
                    <div class="card-body px-2 px-sm-3">

                        <form method="POST"
{{--                              action="{{ route('promisedPayment') }}"--}}
                        >
                            @csrf
                            <div class="form-group row">
                                <label for="promisedPaymentAmount" class="col-md-4 col-form-label text-md-right">Сумма обещанного платежа</label>

                                <div class="col-md-6">
                                    <input id="promisedPaymentAmount" type="text" class="form-control" name="promisedPaymentAmount" autocomplete="promisedPaymentAmount" value="{{ Auth::user()->recmnd }}" required pattern="^[ 0-9]+$" disabled>
                                    <small id="promisedPaymentAmountHelp" class="form-text text-muted">Введите сумму обещанного платежа, не менее {{ Auth::user()->recmnd }} руб.</small>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Вы уверены что хотите активировать платёж!?')" disabled>
                                        Активировать платеж
                                    </button>
                                    <small id="promisedPaymentAmountHelp" class="form-text text-muted"></small>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Смена пароля</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('change.password') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="currentPassword" class="col-md-4 col-form-label text-md-right">Текущий пароль</label>

                                <div class="col-md-6">
                                    <input id="currentPassword" type="password" class="form-control" name="currentPassword" autocomplete="currentPassword"  required>
                                    <small id="newPasswordHelp" class="form-text text-muted">Введите текущий пароль для подтверждения операции.</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="newPassword" class="col-md-4 col-form-label text-md-right">Новый пароль</label>


                                <div class="col-md-6">

                                    <input id="newPassword" type="password" class="form-control" name="newPassword" autocomplete="newPassword" required>
                                    <small id="newPasswordHelp" class="form-text text-muted">Новый пароль должен состоять только из английских букв и цифр. Длина не менее 6 символов.</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="confirmNewPassword" class="col-md-4 col-form-label text-md-right">Новый пароль еще раз</label>

                                <div class="col-md-6">
                                    <input id="confirmNewPassword" type="password" class="form-control" name="confirmNewPassword" autocomplete="confirmNewPassword" required>
                                    <small id="newPasswordHelp" class="form-text text-muted">Подтвердите новый пароль.</small>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Изменить пароль
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
