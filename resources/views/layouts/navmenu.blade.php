@auth
    <nav class="navbar navbar-light p-0">
        <div class="nav-item">
            <a class="nav-link bubble text-dark px-1 {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                <i class="fa fa-id-card-o d-block text-center" aria-hidden="true"></i>
                Информация</a>
        </div>

        <div class="nav-item">
            <a class="nav-link bubble text-dark px-1 {{ Request::is('control') ? 'active' : '' }}" href="{{ route('control') }}">
                <i class="fa fa-cogs   d-block text-center" aria-hidden="true"></i>
                Управление</a>
        </div>
        <div class="nav-item">
            <a class="nav-link bubble text-dark px-1 {{ Request::is('pay') ? 'active' : '' }}" href="/pay?contract_number={{ Auth::user()->login }}">
                <i class="fa fa-credit-card-alt d-block text-center" aria-hidden="true"></i>
                Оплата</a>
        </div>
        <div class="nav-item">
            <a class="nav-link bubble text-dark px-1 {{ Request::is('chat') ? 'active' : '' }}" href="#" onclick="chatOpen();">
                <i class="fa fa-comments-o d-block text-center" aria-hidden="true"></i>
                Помощь</a>
        </div>
        <div class="nav-item">
            <a class="nav-link bubble text-dark px-1 {{ Request::is('media') ? 'active' : '' }}" href="{{ route('media') }}">
                <i class="fa fa-play-circle-o d-block text-center" aria-hidden="true"></i>
                Медиа</a>
        </div>
        <div class="nav-item">
            <a class="nav-link bubble text-dark px-1 {{ Request::is('notifications') ? 'active' : '' }}" href="{{ route('notifications') }}">
                <i class="fa fa-bell-o d-block text-center" aria-hidden="true"></i>
                @if(count($unreadNotifications) > 0)
                    <span class="label label-danger">{{ count($unreadNotifications) }}</span>
                @endif
                Уведомления</a>
        </div>
    </nav>
@endauth
