@extends('layouts.goalapp')

@section('title', 'Inquiry')

@section('stylesheet')

@include('layouts.header') 

@section('content')
    <div class=main-inquiry>
        <h1 class="inquiry-title">お問い合わせフォーム</h1>
        
        <form action="/inquiry/form" method="post">    
        <table>
            @csrf
        <div class="inquiry-wrapper">
            <div class="inquiry">お名前
	            <input type="text" name="name" placeholder="お名前">
            </div>
            <div class="inquiry">メールアドレス
	            <input type="email" name="email" placeholder="メールアドレス">
            </div>
            <div class="inquiry">お問い合わせ内容
	            <input type="text" name="contents" placeholder="お問い合わせ内容">
            </div>
        </div>
        
            <tr><th></th><td><input type="submit" value="送信"></td></tr>
        </table>
        </form>
    </div>
   @endsection
   @include('layouts.footer') 