@extends('layouts.goalapp')

@section('title', 'Profiel-edit')

@section('stylesheet')

@include('layouts.header') 

@section('content')
    <div class=main-user-edit>
        @if (session('flash_message'))
            <div class="alert alert-danger">
                <p class=list-flash>{{ session('flash_message') }}</p>
            </div>
        @endif
        
        <h1 class="list-title">会員情報編集ページ</h1>
        
        <form action="/user/edit" method="post">
    <table>
        @csrf
        
       <input type="hidden" name="id" value="{{optional($user)->id}}">
        
    <div class="user-wrapper">  {{--フレックスボックス親タグ--}}  
        <div class="user-edit">{{--子タグ--}}
            <label class="user-item">
                名前<br><input type="text" name="name" value="{{optional($user)->name}}">
            </label>
        </div>
        <div class="user-edit">
            <label class="user-item">   
            生年月日<br><input type="date" name="birthday" value="{{optional($user)->birthday}}">
            </label>
        </div>
        <div class="user-edit">
            <label class="user-item"> 
            メールアドレス<br><input type="email" name="email" value="{{optional($user)->email}}">
            </label>
        </div>
    </div>{{--フレックスボックス親閉じタグ--}}
    
        <tr><th></th><td><input type="submit" value="編集"></td></tr>
    </table>    

        <div class="user-edit-bottom">
            <a href="/user">メニューページへ</a>
        </div>
    </div>
@endsection 
@include('layouts.footer')

{{--<table>
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}">
         {{--<tr><td><a href="{{ route('goal.edit') }}?id={{optional($item)->id}}">{{optional($item)->theme}}</a></td></tr>--}}
        {{--<tr><th>名前： </th><td><input type="text" name="name" value="{{optional($user)->name}}"></td></tr>{{--goal/list2からのリンク付きで飛ばした時にこれつけるとテーマも編集できるようになる。--}}
       {{-- <tr><th>生年月日: </th><td><input type="date" name="birthday" value="{{optional($user)->birthday}}"></td></tr>
        <tr><th>メールアドレス: </th><td><input type="email" name="email" value="{{optional($user)->email}}"></td></tr>
        
        <tr><th></th><td><input type="submit" value="情報を編集"></td></tr>
    </table> --}}