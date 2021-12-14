@extends('layouts.goalapp')

@section('title', 'Login')

@section('stylesheet')
    {{--<link rel="stylesheet" href="reset.css">　　このファイルはもしCSSをリセットしたいならたすもの--}}
    <link rel="stylesheet" href="/css/styles.css">
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
                        <a href="/user/logout">ログアウト</a></div>
                    </li>
                </ul>
            </div>
</header>
@endsection
@section('content') 
     
    <div class=main>
        <h1>退会画面</h1>
        <p>{{$msg}}</p>
        
        <script>{{--javascriptを使ってポップアップを出している。--}}
            function confirm_test() {
            var select = confirm("退会しますか？「OK」で送信。「キャンセル」で送信中止。");
            return select;
            }
        </script>
        
        <form action="/user/destroy" method="post" onsubmit="return confirm_test()">
        <table>
         @csrf
        
            <h1>退会しますか？</h1>
            <p>退会すると、作成した目標は全て消えます。</p>
            <input type="hidden" name="id" value="{{$user->id}}">
            <tr><th></th><td><input type="submit" value="退会する"></td></tr>
            
           
        </table>
        </form>

        <div class="btn-wrapper">
            <a href="/user" class="btn">メニューページへ</a>
        </div>
    </div>
    @endsection
@include('layouts.footer') 