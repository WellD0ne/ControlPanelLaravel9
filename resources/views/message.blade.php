@extends('layouts.app')

@section('styles')
    @parent
    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
    <link href="{{ asset('css/videojs-mobile-ui.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-xl bg-white min-vh-100 py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-none d-md-block">
                    @include('layouts.navmenu')
                </div>
                <div class="card notification">
                    <div class="card-header">{{ $message->data['heading'] }}</div>
                    <div class="card-body p-1 p-sm-2 p-md-3">
                        <div class="notification-body">
                            <p>{!! $message->data['body'] !!}</p>
                            <div class="notification-time">{{ date('d.m.Y H:i:s', strtotime($message->created_at))}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
    <script src="{{ asset('js/videojs-mobile-ui.min.js') }}"></script>
@endsection
