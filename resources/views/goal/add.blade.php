@extends('layouts.goalapp')

@section('title', 'Add')

@section('stylesheet')

@include('layouts.header') 

@section('content')
    <div class=main-add>
        <h1 class="add-title">目標を作成する</h1>
        <p class="add-msg">{{$msg}}</p>
        <p class="edit-error">{{$error}}</p>
        
    <form action="/goal/add" method="post">    
    <table>
        @csrf
        <div class="goal-add-wrapper">
            <div class="goal-add"><p id="add-title">テーマ</p>
	            <label class="add-item">
	            <input type="text" name="theme" placeholder="入力欄" required>
	            </label>
            </div>
            <div class="goal-add"><p id="add-title">１日め</p>
	            <label class="add-item">
	            <input type="text" name="first_day" placeholder="入力欄" required>
	            </label>
            </div>
            <div class="goal-add"><p id="add-title">２日め</p>
	            <label class="add-item">
	            <input type="text" name="second_day" placeholder="入力欄" required>
	            </label>
            </div>
                <div class="goal-add"><p id="add-title">３日め</p>
	            <label class="add-item">
	            <input type="text" name="third_day" placeholder="入力欄" required>
	            </label>
            </div>
            <div class="goal-add"><p id="add-title">４日め</p>
	            <label class="add-item">
	            <input type="text" name="fourth_day" placeholder="入力欄" required>
	            </label>
            </div>
            <div class="goal-add"><p id="add-title">５日め</p>
	            <label class="add-item">
	            <input type="text" name="fifth_day" placeholder="入力欄" required>
	            </label>
            </div>
            <div class="goal-add"><p id="add-title">６日め</p>
	            <label class="add-item">
	            <input type="text" name="sixth_day" placeholder="入力欄" required>
	            </label>
            </div>
            <div class="goal-add"><p id="add-title">７日め</p>
	            <label class="add-item">
	            <input type="text" name="seventh_day" placeholder="入力欄" required>
	            </label>
            </div>
        
        </div>
       {{-- <tr><th>テーマ: </th><td><input type="text" name="theme"></td></tr>
        <tr><th>{{$error}}</th></tr>
        <tr><th>1日目: </th><td><input type="text" name="first_day"></td></tr>
        <tr><th>2日目: </th><td><input type="text" name="second_day"></td></tr>
        <tr><th>3日目: </th><td><input type="text" name="third_day"></td></tr>
        <tr><th>4日目: </th><td><input type="text" name="fourth_day"></td></tr>
        <tr><th>5日目: </th><td><input type="text" name="fifth_day"></td></tr>
        <tr><th>6日目: </th><td><input type="text" name="sixth_day"></td></tr>
        <tr><th>7日目: </th><td><input type="text" name="seventh_day"></td></tr>
        <tr><th></th><td><input type="submit" value="目標を登録"></td></tr>--}}
        <tr><th></th><td><input type="submit" value="目標を登録"></td></tr>
    </table>
    </form>
        <div class="add-bottom">
            <a href="/goal/list2">自分の作成した目標</a>
            <a href="/goal">目標一覧へ</a>
        </div>
       
    </div>
   @endsection
   @include('layouts.footer') 