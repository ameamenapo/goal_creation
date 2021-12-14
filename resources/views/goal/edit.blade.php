@extends('layouts.goalapp')

@section('title', 'Add')

@section('stylesheet')

@include('layouts.header') 

@section('content')
    <div class=edit-main>
        <h1>目標を編集する</h1>
        <p>{{$msg}}</p>
        <p class="edit-error">{{$error}}</p>
    <form action="/goal/edit" method="post">
    <table>
        @csrf
        <div class="goal-add-wrapper">{{--フレックスボックス親--}}
            <input type="hidden" name="id" value="{{$item->id}}">
            <div class="goal-add"><p id="add-title">テーマ</p>{{--フレックスボックス子--}}
                <label class="add-item">
                    <input type="text" name="theme" value="{{optional($item)->theme}}">
                </label>
            </div>{{--フレックスボックス子閉じタグ--}}         
            <div class="goal-add"><p id="add-title">1日目</p>
                <label class="add-item">
                    <input type="text" name="first_day" value="{{optional($item)->first_day}}">
                </label>
            </div>   
            <div class="goal-add"><p id="add-title">2日目</p>
                <label class="add-item">
                    <input type="text" name="second_day" value="{{optional($item)->second_day}}">
                </label>
            </div>      
            <div class="goal-add"><p id="add-title">3日目</p>
                <label class="add-item">
                    <input type="text" name="third_day" value="{{optional($item)->third_day}}">
                </label>    
            </div>      
            <div class="goal-add"><p id="add-title">４日目</p>
                <label class="add-item">
                    <input type="text" name="fourth_day" value="{{optional($item)->fourth_day}}">
                </label>    
            </div>    
            <div class="goal-add"><p id="add-title">5日目</p>
                <label class="add-item">
                    <input type="text" name="fifth_day" value="{{optional($item)->fifth_day}}">
                </label>    
            </div>      
            <div class="goal-add"><p id="add-title">6日目</p>
                <label class="add-item">
                    <input type="text" name="sixth_day" value="{{optional($item)->sixth_day}}">
                </label>    
            </div>      
            <div class="goal-add"><p id="add-title">7日目</p>
                <label class="add-item">
                    <input type="text" name="seventh_day" value="{{optional($item)->seventh_day}}">
                </label>    
            </div>       
        </div>{{--フレックスボックス親閉じタグ--}}
            <tr><th></th><td><input type="submit" value="目標を修正"></td></tr>
    </table>    
    </form>
        <div class="add-bottom">
            <a href="/goal/add" class="btn">目標を作成</a>
            <a href="/goal/list2" class="btn">戻る</a>
        </div>
    </div>
@endsection 
@include('layouts.footer') 


            {{--<tr><th>1日目: </th><td><input type="text" name="first_day" value="{{optional($item)->first_day}}"></td></tr>
            <tr><th>2日目: </th><td><input type="text" name="second_day" value="{{optional($item)->second_day}}"></td></tr>
            <tr><th>3日目: </th><td><input type="text" name="third_day" value="{{optional($item)->third_day}}"></td></tr>
            <tr><th>4日目: </th><td><input type="text" name="fourth_day" value="{{optional($item)->fourth_day}}"></td></tr>
            <tr><th>5日目: </th><td><input type="text" name="fifth_day" value="{{optional($item)->fifth_day}}"></td></tr>
            <tr><th>6日目: </th><td><input type="text" name="sixth_day" value="{{optional($item)->sixth_day}}"></td></tr>
            <tr><th>7日目: </th><td><input type="text" name="seventh_day" value="{{optional($item)->seventh_day}}"></td></tr>--}}

