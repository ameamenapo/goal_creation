@extends('layouts.goalapp')

@section('title', 'Login')

@section('stylesheet')
    
@endsection

@include('layouts.header')

@section('content')
<div class="main">
    <h1 class="profile-title">My page</h1>
        <div class="profile-wrapper">{{--フレックスボックス親--}}
            <div class="profile-image">{{--フレックスボックス子--}}
                <form action="/profile" method="post" enctype="multipart/form-data">
                <table>
                    {{ csrf_field() }}{{--以下のtype="hidden"〜がないと、画像を更新したときに他のプロフィール情報が消えちゃう--}}
                <input type="hidden" name="id" value="{{$profile->id}}">
                <input type="hidden" name="user_id" value="{{$profile->user_id}}">
                <input type="hidden" name="nickname" value="{{$profile->nickname}}">
                <input type="hidden" name="age" value="{{$profile->age}}">
                <input type="hidden" name="hobby" value="{{$profile->hobby}}">
                <input type="hidden" name="a_word" value="{{$profile->a_word}}">
                <img src="/storage/{{$profile->profile_image}}" width="600" height="500">
                
                <tr><div class="profile-image-bottom"><td rowspan="2">プロフィール画像</td>
                <td><label><input type="file" name="profile_image">ファイル選択</label></td></div></tr>
                <tr><td><input type="submit" value="アップロード"></td></tr>
                
                {{--<tr><th>プロフィール画像: </th><td><label><input type="file" name="profile_image">ファイル選択</label></td></tr>
                <tr><th><td></th><input type="submit" value="アップロードする"></td></tr>--}}
                </table>
                </form> 
            </div>{{--フレックスボックス子閉じタグ--}}  
        </div>{{--フレックスボックス親閉じタグ--}}    
            
        <div class="profile-items">{{--フレックスボックス親--}}        
                <input type="hidden" name="id" value="{{$profile->id}}">
                <input type="hidden" name="user_id" value="{{$profile->user_id}}">
                <div class="profile">ニックネーム<br><p class="profile-content">{{optional($profile)->nickname}}</p></div>
                <div class="profile">年齢<br><p class="profile-content">{{optional($profile)->age}}</p></div>
                <div class="profile">趣味<br><p class="profile-content">{{optional($profile)->hobby}}</p></div>
                <div class="profile">ひとこと<br><p class="profile-content">{{optional($profile)->a_word}}</p></div>
        </div>{{--フレックスボックス親閉じタグ--}} 
            <div class="profile-btn-wrapper">
                <a href="{{route('profile.edit')}}?id={{ optional($profile)->id}}">編集</a>
                <a href="/user">メニューへ</a>
            </div>  
    
</div>
        
        {{--<div class=main>
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
        </div>--}}
    
@endsection
@include('layouts.footer') 