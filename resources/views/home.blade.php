@extends('layouts.app')

@section('content')

    <div class="container-xl bg-white min-vh-100 py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                @if ($firstNotification)
                    <div class="first-notification">
                        <a href="{{ route('message', $firstNotification->id) }}">
                            <div class="alert alert-info" role="alert">

                                <h5 class="alert-heading">{{ $firstNotification->data['heading'] }}</h5>

                                @if($firstNotification->data['short'])
                                    {{ $firstNotification->data['short'] }}
                                @endif
                            </div>
                        </a>
                    </div>
                @endif

                <div class="d-none d-md-block">
                    @include('layouts.navmenu')
                </div>
                <div class="card">
                    <div class="card-header">Информация</div>
                    <div class="card-body px-0 px-sm-3">
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

                        @if(Session::has('orderConfirm'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{!! Session::get('orderConfirm') !!}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if ($alertBalance)
                            <div class="alert alert-danger" role="alert">
                                Недостаточно средств на счету! Абонентская плата будет списана через {{ $alertBalanceForHumans }}!<br>
                                Пожалуйста, пополните баланс!
                            </div>
                        @endif

                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th scope="row">Пользователь</th>
                                <td>{{ $user->nameclient }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Тарифный план</th>
                                <td>{{ $user->tpname }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Абонентская плата</th>
                                <td>{{ $user->abonplata }} руб/мес.</td>
                            </tr>
                            <tr>
                                <th scope="row">Следующее списание платы</th>
                                <td>{{ $user->dateact }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Текущий баланс</th>
                                <td>{{ $user->ostatok }} руб.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Финансовые операции --}}
                    <div class="card-body text-center">
                        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#financeOperations" aria-expanded="false" aria-controls="financeOperations">
                            Финансовые операции
                        </button>
                    </div>
                    <div class="finance-operations table-responsive collapse" id="financeOperations">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Дата</th>
                                <th scope="col">Тип</th>
                                <th scope="col">Сумма</th>
                                <th scope="col">Баланс</th>
                                <th scope="col">Описание</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($financeOperations as $financeOperation)
                                <tr>
                                    <td>{{ $financeOperation->op_date }}</td>
                                    <td>{{ $financeOperation->financeType->op_name }}</td>
                                    <td class="text-right">{{ $financeOperation->op_summa }}</td>
                                    <td class="text-right">{{ $financeOperation->balance_buh }}</td>
                                    <td>{{ $financeOperation->descr }}</td>
                                </tr>
                            @empty
                                <tr>Нет операций</tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Магазин --}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Магазин оборудования</div>--}}
{{--                    <div class="card-body px-0 px-sm-3">--}}
{{--                        <div class="product-tabs">--}}
{{--                            @forelse($products as $product)--}}
{{--                                <div class="product-tab">--}}
{{--                                    <div class="product-img">--}}
{{--                                        <a href="{{ route('showProduct', ['slug' => $product->slug]) }}"><img src="{{ asset("storage/{$product->image}") }}" alt="{{ $product->slug }}"></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-info">--}}
{{--                                        <div class="product-price">{{ $product->price }} ₽</div>--}}
{{--                                        <a href="{{ route('showProduct', ['slug' => $product->slug]) }}"><div class="product-name">{{ $product->name }}</div></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="btn-buy">--}}
{{--                                        <div class="btn btn-primary" data-id="{{ $product->id }}" data-name="{{ $product->name }}">Купить</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @empty--}}
{{--                                <strong>Нет товаров, но скоро будут!</strong>--}}
{{--                            @endforelse--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                {{-- Новости --}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Новости</div>--}}
{{--                    <div class="card-body px-sm-3">--}}
{{--                        @if($news)--}}
{{--                            @forelse ($news as $oneNews)--}}
{{--                                <div class="news-body p-1 p-sm-2 p-md-3">--}}
{{--                                    <h5>{{ $oneNews->title->rendered }}</h5>--}}
{{--                                    @if($oneNews->content->rendered)--}}
{{--                                        <p>{!! $oneNews->content->rendered !!}</p>--}}
{{--                                    @endif--}}
{{--                                    <div class="body-time">{{ date('d.m.Y', strtotime($oneNews->date))}}</div>--}}
{{--                                </div>--}}
{{--                            @empty--}}
{{--                                Нет уведомлений!--}}
{{--                            @endforelse--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
{{--    @include('layouts.marketOrderModal')--}}
@endsection
