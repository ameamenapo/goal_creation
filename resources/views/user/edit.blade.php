@extends('layouts.goalapp')

@section('title', 'Profiel-edit')

@section('stylesheet')

@include('layouts.header') 

@section('content')
    <div class=main>
        <h1>会員情報を編集する</h1>
        <p>{{$msg}}</p>
        <form action="/user/edit" method="post">
    <table>
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}">
         {{--<tr><td><a href="{{ route('goal.edit') }}?id={{optional($item)->id}}">{{optional($item)->theme}}</a></td></tr>--}}
        <tr><th>名前： </th><td><input type="text" name="name" value="{{optional($user)->name}}"></td></tr>{{--goal/list2からのリンク付きで飛ばした時にこれつけるとテーマも編集できるようになる。--}}
        <tr><th>生年月日: </th><td><input type="date" name="birthday" value="{{optional($user)->birthday}}"></td></tr>
        <tr><th>メールアドレス: </th><td><input type="email" name="email" value="{{optional($user)->email}}"></td></tr>
        
        <tr><th></th><td><input type="submit" value="情報を編集"></td></tr>
    </table>    

        <div class="btn-wrapper">
            <a href="/user" class="btn">インデックスへ</a>
        </div>
    </div>
@endsection 
@include('layouts.footer')