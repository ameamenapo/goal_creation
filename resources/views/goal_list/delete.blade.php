@extends('layouts.goalapp')

@section('title', 'Goal_list-delete')

@section('stylesheet')

@include('layouts.header') 

@section('content') 
    <div class=goal-list-delete-main>
        <h1 class="list-title">目標削除ページ</h1>
        <p class="list-title-p">削除しますか？</p>
        <form action="/goal_list/delete" method="post">
    
    <table>
        @csrf
        <div class="goal-list-delete-wrapper">{{--フレックスボックスの親--}}
            <input type="hidden" name="id" value="{{$item->id}}">
            <div class="goal-list-delete-item">{{--フレックスボックスの子--}}
                {{optional($item)->theme}}
            </div>{{--フレックスボックスの子の閉じタグ--}}
        </div>{{--フレックスボックスの親の閉じタグ--}}    
            <tr><th></th><td><input type="submit" value="目標を削除"></td></tr>
    </table>    

        <div class="goal-list-delete-bottom">
            <a href="/goal/list2">戻る</a>
            <a href="/goal">目標一覧へ</a>
        </div>
    </div>
@endsection
@include('layouts.footer') 



