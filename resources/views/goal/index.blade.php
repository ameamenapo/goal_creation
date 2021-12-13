@extends('layouts.goalapp')

@section('title', 'Goal')

@section('stylesheet')
  
@endsection

@include('layouts.header') 

@section('content') 
<div class="goal-main">
    <h1 class="list-title">目標テーマ一覧</h1>
    <p class="list-title-p">今週はどの目標にする？選んでね！</p>
    
        <form action="/goal" method="post">
        <table>
        @foreach($items as $item)
        <tr>
        <div class="goal-wrapper">{{--フレックスボックスの親--}}
        <div class="goal-item">{{--フレックスボックスの子--}}
            <input type="hidden" name="id" value="{{optional($item)->id}}">
            <input type="hidden" name="theme" value="{{optional($item)->theme}}">{{--この①行はgoalコントローラのtodday_goalアクションのために足した--}}
            <input type="hidden" name="first_day" value="{{optional($item)->first_day}}">
            <input type="hidden" name="second_day" value="{{optional($item)->second_day}}">
            <input type="hidden" name="third_day" value="{{optional($item)->third_day}}">
            <input type="hidden" name="fourth_day" value="{{optional($item)->fourth_day}}">
            <input type="hidden" name="fifth_day" value="{{optional($item)->fifth_day}}">
            <input type="hidden" name="sixth_day" value="{{optional($item)->sixth_day}}">
            <input type="hidden" name="seventh_day" value="{{optional($item)->seventh_day}}">
            {{--初めは下のaタグの前にtdがついてたけど、tdがあrつおフレックスボックスの中にテーマが入らなくなっちゃう--}}
            <a href="{{ route('goal.today_goal') }}?id={{ optional($item)->id }}">{{optional($item)->theme}}</a>
        @endforeach 
        </div>{{--フレックスボックスの子の閉じタグ--}}
        </tr>
        </div>{{--フレックスボックスの親の閉じタグ--}} 
        </table>
        </form>
        <div class="pagination-parent">
            <div class="pagination-child">   
            {{ $items->links() }}
            </div>
        </div>
        <div class="goal-bottom">
            <a href="/goal/list">目標の追加</a>
            <a href="/goal/del_list">一覧から削除</a>
            <a href="/user">メニューページへ</a>
        </div>  
    </div>
@endsection
@include('layouts.footer') 

 {{--@foreach($items as $item)
        <tr>
            <input type="hidden" name="id" value="{{optional($item)->id}}">
            <input type="hidden" name="theme" value="{{optional($item)->theme}}">--}}{{--この①行はgoalコントローラのtodday_goalアクションのために足した--}}
            {{--<input type="hidden" name="first_day" value="{{optional($item)->first_day}}">
            <input type="hidden" name="second_day" value="{{optional($item)->second_day}}">
            <input type="hidden" name="third_day" value="{{optional($item)->third_day}}">
            <input type="hidden" name="fourth_day" value="{{optional($item)->fourth_day}}">
            <input type="hidden" name="fifth_day" value="{{optional($item)->fifth_day}}">
            <input type="hidden" name="sixth_day" value="{{optional($item)->sixth_day}}">
            <input type="hidden" name="seventh_day" value="{{optional($item)->seventh_day}}">
            
            <td><a href="{{ route('goal.today_goal') }}?id={{ optional($item)->id }}">{{optional($item)->theme}}</a></td>
        @endforeach--}}