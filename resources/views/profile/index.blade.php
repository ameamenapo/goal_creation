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
        <h1>マイページ</h1>
        <form action="/profile" method="post" enctype="multipart/form-data">
        <table>
        {{ csrf_field() }}
            <img src="/storage/{{$profile->profile_image}}" width="150" height="150">
    
            <tr><th>プロフィール画像: </th><td><input type="file" name="profile_image"></td></tr>
            <tr><th></th><td><input type="submit" value="アップロードする"></td></tr>
            <input type="hidden" name="id" value="{{$profile->id}}">
            <input type="hidden" name="user_id" value="{{$profile->user_id}}">
            <tr><th>ニックネーム： </th><td>{{optional($profile)->nickname}}</td></tr>
            <tr><th>年齢: </th><td>{{optional($profile)->age}}</td></tr>
            <tr><th>趣味: </th><td>{{optional($profile)->hobby}}</td></tr>
            <tr><th>ひとこと: </th><td>{{optional($profile)->a_word}}</td></tr>
        </table>
        </form>
        <div class="btn-wrapper">
            <a href="{{route('profile.edit')}}?id={{ optional($profile)->id}}">編集</a>
            <a href="/user" class="btn">インデックスへ</a>
        </div>
    </div>
@endsection
@include('layouts.footer') 