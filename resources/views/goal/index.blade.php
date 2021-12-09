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
        <h1>目標テーマ一覧</h1>
        <p>今週はどの目標にする？選んでね！</p>
    
        <form action="/goal" method="post">
        <table>
        
         @foreach($items as $item)
        <tr>
            <input type="hidden" name="id" value="{{optional($item)->id}}">
            <input type="hidden" name="theme" value="{{optional($item)->theme}}">{{--この①行はgoalコントローラのtodday_goalアクションのために足した--}}
            <input type="hidden" name="first_day" value="{{optional($item)->first_day}}">
            <input type="hidden" name="second_day" value="{{optional($item)->second_day}}">
            <input type="hidden" name="third_day" value="{{optional($item)->third_day}}">
            <input type="hidden" name="fourth_day" value="{{optional($item)->fourth_day}}">
            <input type="hidden" name="fifth_day" value="{{optional($item)->fifth_day}}">
            <input type="hidden" name="sixth_day" value="{{optional($item)->sixth_day}}">
            <input type="hidden" name="seventh_day" value="{{optional($item)->seventh_day}}">
    
            <td><a href="{{ route('goal.today_goal') }}?id={{ optional($item)->id }}">{{optional($item)->theme}}</a></td>
        @endforeach 
        </tr>
        
        </table>
        {{ $items->links() }}{{--これだとデザインが崩れてしまうから、AppServiceProviderでbootstrap読み込まないといけない。--}}
        {{--{{ $items->links('pagination::bootstrap-4') }}--}}
        </form>
        
        <a class="btn" href="/goal/list">目標を追加する</a>
        <a class="btn" href="/goal/del_list">一覧から目標を削除</a>
        <a class="btn" href="/user">インデックスへ</a>
    </div>
@endsection
@include('layouts.footer') 