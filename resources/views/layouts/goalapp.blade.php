<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    {{--<link rel="stylesheet" href="reset.css">　　このファイルはもしCSSをリセットしたいならたすもの--}}
    {{--<link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
     {{--以下はFont Awesome5を読み込んでいる。--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> 
    @yield('stylesheet')
</head>
<body>

@yield('header') 

@yield('content')    

@yield('footer')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
