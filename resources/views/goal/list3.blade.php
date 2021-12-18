@extends('layouts.goalapp')

@section('title', 'List')

@section('stylesheet')
  
@endsection

@include('layouts.header') 

@section('content') 
<div class="list2-main"> {{--list2-mainについては、CSSで何も設定してない。そしたらフッターの余白無くなった‥。--}}
    
    @if (session('flash_message'))
            <div class="alert alert-danger">
                <p class=list-flash>{{ session('flash_message') }}</p>
            </div>
    @endif
    
    <h1 class="list-title">他のユーザーが作成した目標</h1>
    
        <form action="/goal/list3" method="post"> 
        <table>
        @csrf 
        @if(isset($items)) 
            @if($items->isEmpty())
                <p class="list-title-p">目標が登録されていません。他の人の目標から選ぶか、自分で目標を作成しましょう！</p>
            @else
                <p class="list-title-p">目標を選んでください。</p>    
            @endif
        @else
            <p class="list-title-p">{{$msg}}</p>
        @endif
        
        @foreach($items as $item)
        <tr>
            <div class="list2-wrapper">{{--フレックスボックスの親--}}
            <div class="list2-item">{{--フレックスボックスの子--}}
            {{--<label style="display:block;">--}}
                <input type="radio"  name="theme" value="{{optional($item)->id}}" id="mine-goal" style="transform:scale(1.5);"required>
                    <label for="mine-goal">{{optional($item)->theme}}</label><br>
            {{--</label>--}}
            </div>{{--フレックスボックスの子の閉じタグ--}}
        </tr>
        @endforeach
        </div>{{--フレックスボックスの親の閉じタグ--}} 
            <tr><th></th><td><div class="list2-submit"><input type="submit" value="目標一覧へ追加"></div></td></tr>
        </table>
        {{--{{ $items->links() }}元の位置--}}
        </form>
        <div class="pagination-parent">
            <div class="pagination-child">   
            {{ $items->links() }}
            </div>
        </div>
        <div class="list2-bottom">
            <a href="/goal/list">他の目標を見る</a>
            <a href="/goal">目標一覧へ</a>
        </div>    
</div> 
@endsection
@include('layouts.footer')