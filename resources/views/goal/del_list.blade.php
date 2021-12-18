@extends('layouts.goalapp')

@section('title', 'Goal-delete')

@section('stylesheet')

@include('layouts.header') 

@section('content') 
    <div class=del-list-main>
         @if (session('flash_message'))
            <div class="alert alert-danger">
                <p class=list-flash>{{ session('flash_message') }}</p>
            </div>
        @endif
        
        <h1 class="list-title">削除ページ</h1>
        <p class="list-title-p">目標テーマ一覧</p>
        <form action="/goal/del_list" method="post"> 
        <table>
             
        @csrf
         {{--CSSでflex-wrapやってるのに折り返し効かない。多分親要素のつける位置とか何かが間違っっているが保留--}}   
        @foreach($items as $item) 
        <tr>
           <div class="del_list-wrapper">{{--フレックスボックスの親--}}
                <div class="del_list-item">{{--フレックスボックスの子--}}
                    <input type="radio"  name="theme" value="{{optional($item)->id}}" id="goal" style="transform:scale(1.5);" required>
                    <label for="goal">
                        {{$item->theme}}
                    </label><br>
                </div>{{--フレックスボックスの子の閉じタグ--}}    
       </tr>
       @endforeach
        
            <tr><th></th><td><div class="del_list-submit"><input type="submit" value="削除"></div></td></tr>
            </div>{{--フレックスボックスの親の閉じタグ--}} 
        </table>
        </form>
        
        <div class="del-list-bottom">
            <a href="/goal">戻る</a>
        </div> 
    </div>
@endsection
@include('layouts.footer') 


 