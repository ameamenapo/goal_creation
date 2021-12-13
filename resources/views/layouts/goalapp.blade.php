<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    {{--<link rel="stylesheet" href="reset.css">　　このファイルはもしCSSをリセットしたいならたすもの--}}
     <link rel="stylesheet" href="/css/styles.css">
    {{--<link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
     {{--以下はFont Awesome5を読み込んでいる。--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> 
    
    {{-- 特定ページで読み込みたいCSSがあるとき --}}
    {{--@yield('stylesheet')--}}
</head>
<body>
    {{-- <header></header> 直接書き込むか--}}
    {{-- @include('header')読み込むか --}}

{{--@yield('header')は、 埋め込み先だけ指定。ヘッダーの中身はまだ何もない。継承先にこの中身があるかどうかも不明。
継承先のページで@section('header')というのがあれば、この位置にヘッダー埋め込むよ
ヘッダーなどは多くの場合共通。だからここではyieldでなくincludeで読み込むのが一般的。--}}
{{--@yield('content')    
contentは各ページで違うから、こちらはyieldであってる。--}}
{{--@yield('footer')--}}
<header class="header">
        <div class="header-logo">
            <a href="/"><img src="/storage/logo.png" width="100px" height="100px"></a>    
        </div>
        <div class="header-list">
            <ul>
                <li><a href="/">ホーム</a></li>
                <li><a href="/user">メニュー</a></li>
                <li><a href="/profile">マイページ</a></li>
                <li><a href="https://twitter.com/CreationGoal">twitter</a></li>
                @if (Auth::check())
                <li><div class="header-right"><a href="/user/logout">ログアウト</a></div></li>
                @else
                <li><div class="header-right"><a href="/login">ログイン</a></div></li>
                @endif
            </ul>
        </div>
</header>
@yield('content') 
<footer>
 <div class="footer-list">
                <ul>
                    <li><a href="#">よくある質問</a></li>
                    <li><a href="#">お問い合わせ</a></li>
                    <li><a href="#">ご利用規約</a></li>
                    <li>プライバシーポリシー</li>
                </ul>
</div>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
