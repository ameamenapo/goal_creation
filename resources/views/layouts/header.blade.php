@section('stylesheet')
    {{--<link rel="stylesheet" href="reset.css">　　このファイルはもしCSSをリセットしたいならたすもの--}}
    <link rel="stylesheet" href="css/styles.css">
     {{--<link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
     {{--以下はFont Awesome5を読み込んでいる。--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> 
@endsection
@section('header')
<header class=header>
        <div class="header-logo">
            <a href="/"><img src="/storage/logo.png" width="100px" height="100px"></a>    
        </div>
            <div class="header-list">
                <ul>
                    <li><a href="/">ホーム</a></li>
                    <li><a href="/user">目標ページ</a></li>
                    <li><a href="/profile">マイページ</a></li>
                    <li><a href="https://twitter.com/CreationGoal">twitter</a></li>
                    <li><div class="header-right">
                        <a href="/login">ログイン</a></div>
                    </li>
                </ul>
            </div>
</header>
@endsection