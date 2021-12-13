@extends('layouts.goalapp')

@section('title', 'List')

@section('stylesheet')
  
@endsection

@include('layouts.header') 

@section('content')    
    <div class=list-main>
        <h1 class="list-title">目標を選ぶ</h1>
        {{--<p class="list-title">{{$msg}}</p>--}}
        <div class="list">
        <a  href="{{action('GoalController@choose1') }}"><div class="list-item">アプリオリジナル<br>目標</div></a>
        <a  href="{{ action('GoalController@choose2') }}"><div class="list-item">自分で作成した<br>目標</div></a>
        <a  href="{{ action('GoalController@choose3') }}"><div class="list-item">他のユーザーが作成した目標</div></a>
    </div>
    <div class="list-btn-wrapper">    
        <a href="/user">メニューページへ</a>
    </div>
    </div>
@endsection    
@include('layouts.footer')    
