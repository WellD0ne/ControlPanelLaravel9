@extends('layouts.app')

@section('content')
    <div class="container-xl bg-white min-vh-100 py-4 notifications-page">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="">
                    {{-- @include('layouts.banner') --}}
                </div>
                <div class="d-none d-md-block">
                    @include('layouts.navmenu')
                </div>
                <div class="card notifications">
                    <div class="card-header">Уведомления</div>
                    <div class="card-body p-0 p-sm-2 p-md-3">
                        @forelse ($notifications as $notification)
                            <a class="notification-link p-1 p-sm-2 p-md-3 {{ $notification->read_at == null ? 'unread-notification' : '' }}" href="{{ route('message', $notification->id) }}">
                                <div class="notification-body">
                                    <h5>{{ $notification->data['heading'] }}</h5>
                                    @if($notification->data['short'])
                                        <p>{{ $notification->data['short'] }}</p>
                                    @endif
                                    <div class="notification-time">{{ date('d.m.Y H:i:s', strtotime($notification->created_at))}}</div>
                                </div>
                            </a>
                        @empty
                            Нет уведомлений!
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

