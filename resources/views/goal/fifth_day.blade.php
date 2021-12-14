@extends('layouts.goalapp')

@section('title', 'Fifth_day')

@section('stylesheet')

@include('layouts.header') 

@section('content')
    <div class=today-main>
        <table>
        @csrf
       
        <div class="theme-wrapper">{{--フレックスボックス親--}}
            <div class="today-theme">{{--フレックスボックス子--}}    
                <p class="today-title">{{optional($item)->theme}}</p>
            </div>     
        </div>
       
        </table>
        
        <div class="today-todo">Todo</div>
        <form action="/goal/fifth_day" method="post"> 
        @csrf
        <table>
        <div class="todo-wrapper">
            <div class="todo">
                <input type="hidden" name="todo" value="{{optional($item)->id}}">{{optional($item)->fifth_day}}
            </div>
        </div>
            <p class="list-title-p">{{$msg}}</p>
            <tr><th></th><td><input type="submit" value="やったよ"></td></tr>
        </table>
        </form>
        <div class="today-bottom">
            <a href="{{ route('goal.today_goal') }}?id={{ optional($item)->id }}" class="btn">戻る</a>
            <a href="/goal" class="btn">目標一覧へ</a>
        </div>  
    </div>
@endsection
@include('layouts.footer') 