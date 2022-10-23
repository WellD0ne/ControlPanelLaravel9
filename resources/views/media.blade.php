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
                <div class="card">
                    <div class="card-header">Медиа</div>
                    <div class="card-body px-2 px-sm-3">
                        <p>Вы можете ознакомиться с возможностью просмотра потокового видео:</p>
                        <p>Камеры видеонаблюдения в Вашем дворе:</p>
                        <ul>
                            <li><a class="MLink" data-mlink="https://s2.moidom-stream.ru/s/public/0000088613.m3u8" data-mtype="application/x-mpegURL" href="#">Камера #1</a></li>
                            <li><a class="MLink" data-mlink="https://s2.moidom-stream.ru/s/public/0000089451.m3u8" data-mtype="application/x-mpegURL" href="#">Камера #2</a></li>
                        </ul>
                        <p>Телеканалы:</p>
                        <ul>
                            <li><a class="MLink" data-mlink="https://okkotv-live.cdnvideo.ru/channel/CTC_HD_OTT.m3u8" data-mtype="application/x-mpegURL" href="#">СТС HD</a></li>
                            <li><a class="MLink" data-mlink="https://okkotv-live.cdnvideo.ru/channel/Rentv_HD_OTT.m3u8" data-mtype="application/x-mpegURL" href="#">РЕН-ТВ HD</a></li>
                            <li><a class="MLink" data-mlink="http://193.33.88.172:8080/rus-bestseller/index.m3u8" data-mtype="application/x-mpegURL" href="#">Русский бестселлер</a></li>
                            <li><a class="MLink" data-mlink="http://193.33.88.172:8080/rus-detective/index.m3u8" data-mtype="application/x-mpegURL" href="#">Русский детектив</a></li>
                        </ul>
                        <div class="mediaplayer">
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
