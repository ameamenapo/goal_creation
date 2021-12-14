@extends('layouts.goalapp')

@section('title', 'Goal-delete')

@section('stylesheet')

@include('layouts.header') 

@section('content') 
    <div class=main>
        <h1>目標一覧</h1>
        <p>削除ページ</p>
        <form action="/goal/del_list" method="post"> 
        <table>
        @csrf
        <tr>目標テーマ一覧</tr>
        @foreach($items as $item) 
        <tr>
           
            <label style="display:block;">
                <input type="radio"  name="theme" value="{{$item->id}}">{{$item->theme}}
            </label>
            
        </tr>
       @endforeach
            <tr><th></th><td><input type="submit" value="削除"></td></tr>
        </table>
        </form>
        
        <div class="btn-wrapper">
            <a href="/goal" class="btn">戻る</a>
        </div> 
    </div>
@endsection
@include('layouts.footer') 