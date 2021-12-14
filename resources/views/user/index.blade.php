@extends('layouts.goalapp')

@section('title', 'Logout')

@section('stylesheet')
   
@endsection

@include('layouts.header')        
@section('content')    
    <div class=menu-main>
        <h1 class="menu-title">Menu</h1>
        <div class="menu">
{{--クリック範囲を広げるために、aタグの中にdivタグ入れてクラスめいつけてる。こうするとCSSで簡単にdisplay:block;でクリック範囲親要素にできる。--}}
            <a href="{{action('GoalController@add') }}">
               <div class="menu-item">目標を作成する</div>
            </a>
            <a href="{{action('GoalController@choose') }}">
                <div class="menu-item">目標を選ぶ</div>
            </a>
            <a href="{{action('GoalController@index') }}">
                <div class="menu-item">目標一覧</div>
            </a>
            <a href="{{action('AchievementController@index') }}">
                <div class="menu-item">達成した目標</div>
            </a>
            <a href="{{action('ProfileController@index')}}">
                <div class="menu-item">マイページ</div>
            </a>
        </div>
        <div class=menu-header>
        <a href="{{route('user.edit')}}?id={{ optional($user)->id}}">アカウント情報の編集</a>
        <a href="{{action('UserController@destroy')}}">退会する
        </div>
    </div>
@endsection

@include('layouts.footer')