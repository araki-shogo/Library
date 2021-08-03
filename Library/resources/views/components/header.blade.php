<header class="header">
    <a href="/" class="header_left">
        <p class="header_left_title">CRANE LIBRARY</p>
    </a>
    <nav class="header_right">
        @if (Route::has('login'))
            @if(Auth::check() && Auth()->user()->permission == 1)
                <a href="/users" class="header_right_link header_right_margin">
                    <p class="header_right_link_txt">ユーザー</p>
                </a>
            @endif
        @endif
        <a href="/books" class="header_right_link header_right_margin">
            <p class="header_right_link_txt">本一覧</p>
        </a>
        <a href="/lendings" class="header_right_link header_right_margin">
            <p class="header_right_link_txt">貸出履歴</p>
        </a>
        <a href="/" class="header_right_link header_right_margin">
            <p class="header_right_link_txt">貸出中</p>
        </a>
        @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="header_right_link header_right_margin">
                    <p class="header_right_link_txt">ログイン</p>
                </a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="header_right_link header_right_margin">
                    <p class="header_right_link_txt">登録</p>
                </a>
            @endif
        @else
            <a class="header_right_link header_right_margin">
                <label class="header_right_link_username">
                    <p class="header_right_link_txt"><span>{{ Auth::user()->name }}</span>さん</p>
                    <object class="header_right_link_username_object">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                        >
                            <p class="header_right_link_txt">{{ __('ログアウト') }}</p>
                        </a>
                    </object>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </label>
            </a>
        @endguest
    </nav>
</header>