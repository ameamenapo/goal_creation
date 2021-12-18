@extends('layouts.goalapp')

@section('title', 'Profiel-edit')

@section('stylesheet')

@include('layouts.header') 

@section('content')
    <div class=profile-main>
        <h1 class="list-title">マイページ編集画面</h1>
        
    <form action="/profile/edit" method="post">
    <table>
        @csrf
        {{$msg}}
        <div class="goal-add-wrapper">{{--フレックスボックス親--}}
            <input type="hidden" name="id" value="{{$profile->id}}">
            
            <div class="goal-add"><p id="add-title">ニックネーム</p>{{--フレックスボックス子--}}
                <label class="add-item">
                    <input type="text" name="nickname" value="{{optional($profile)->nickname}}">
                </label>
            </div>{{--フレックスボックス子閉じタグ--}}     
            <div class="goal-add"><p id="add-title">年齢</p>
                <label class="add-item">
                    <input type="text" name="age" value="{{optional($profile)->age}}">
                </label>
            </div>    
            
            <div class="goal-add"><p id="add-title">趣味</p>
                <label class="add-item">
                    <input type="text" name="hobby" value="{{optional($profile)->hobby}}">
                </label>
            </div>      
            <div class="goal-add"><p id="add-title">ひとこと</p>
                <label class="add-item">
                    <textarea name="a_word" rows="3" cols="40">{{optional($profile)->a_word}}</textarea>
                </label>
            </div>     
        </div>{{--フレックスボックス親閉じタグ--}}
            <tr><th></th><td><input type="submit" value="プロフィールを編集"></td></tr>
    </table>  
    </form>
        <div class="add-bottom">
            <a href="/user" class="btn">メニューページへ</a>
        </div>
    </div>
@endsection 
@include('layouts.footer')

{{--<form action="/profile/edit" method="post">--}}
    {{--<table>--}}
        {{--@csrf--}}
        {{--<input type="hidden" name="id" value="{{$profile->id}}">--}}
        {{--<tr><th>ニックネーム： </th><td><input type="text" name="nickname" value="{{optional($profile)->nickname}}"></td></tr>
        <tr><th>年齢: </th><td><input type="text" name="age" value="{{optional($profile)->age}}"></td></tr>
        <tr><th>{{$msg}}</th></tr>--}}
        {{--<tr><th>趣味: </th><td><input type="text" name="hobby" value="{{optional($profile)->hobby}}"></td></tr>
        <tr><th>ひとこと: </th><td><textarea name="a_word" rows="6" cols="40">{{optional($profile)->a_word}}</textarea></td></tr>--}}
        
        
        {{--<tr><th></th><td><input type="submit" value="プロフィールを編集"></td></tr>
    </table>  
    </form>^^}}--}}