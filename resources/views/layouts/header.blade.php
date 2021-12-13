@section('stylesheet')
    
@endsection
@section('header')
<header class="header">
        <div class="header-logo">
            <a href="/"><img src="/storage/logo.png" width="100px" height="100px"></a>    
        </div>
            <div class="header-list">
                <ul>
                    <li><a href="/">ホーム</a></li>
                    <li><a href="/user">メニューページ</a></li>
                    <li><a href="/profile">マイページ</a></li>
                    <li><a href="https://twitter.com/CreationGoal">twitter</a></li>
                    @if (Auth::check()){{--loginしているなら「ログアウト」でなければ「ログイン」表示--}}
                    <li><div class="header-right">
                        <a href="/user/logout">ログアウト</a></div>
                    </li>
                    @else
                    <li><div class="header-right">
                        <a href="/login">ログイン</a></div>
                    </li>
                    @endif
                </ul>
            </div>
</header>
@endsection