@extends('layouts.goalapp')

@section('title', 'Inquiry')

@section('stylesheet')

@include('layouts.header') 

@section('content')
    <div class=main-inquiry>
        @if (session('flash_message'))
            <div class="alert alert-danger">
                <p class=list-flash>{{ session('flash_message') }}</p>
            </div>
        @endif
        {{--@if(count($errors) > 0)
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif--}}
        
       <h1 class="list-title">お問い合わせフォーム</h1>
        
        <form action="/inquiry" method="post">    
        <table>
            @csrf
        <div class="inquiry-wrapper">{{--フレックスボックス親--}}
        
            <div class="inquiry">お名前
	            <input type="text" name="name" placeholder="名前">
            </div>
            
            <div class="inquiry">メールアドレス
	            <input type="email" name="email" placeholder="メールアドレス">
            </div>
            
            <div class="inquiry">お問い合わせ内容
	            <textarea name="contents" rows="6" cols="40" placeholder="内容"></textarea>
            </div>
        </div>{{--フレックスボックス親閉じタグ--}}
        
            {{--<tr><th></th><td><input type="submit" value="送信"></td></tr>--}}
            <input type="submit" value="送信">
        </table>
        </form>
    </div>
   @endsection
   @include('layouts.footer') 