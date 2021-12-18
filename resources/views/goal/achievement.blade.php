 @extends('layouts.goalapp')

@section('title', 'Achievement')

@section('stylesheet')
  
@endsection

@include('layouts.header') 

@section('content')    
    <div class=achievement-main>
        <h1 class="list-title">達成した目標テーマ</h1> 
        
        <table>
            <div class="achievement-wrapper">{{--フレックスボックスの親タグ--}}
                @foreach($items as $item)
                
                <div class="achievement-goal">{{optional($item)->theme}}</div>
                
                @endforeach
            </div>{{--フレックスボックスの親の閉じタグ--}}         
        </table>
        
        <div class="pagination-parent">
            <div class="pagination-child">   
            {{ $items->links() }}
            </div>
        </div>
        <div class="achievement-bottom">
            <a href="/user">メニューページへ</a>
        </div> 
    </div>
@endsection
@include('layouts.footer') 



{{--<div class=achievement-main>
        <h1>達成した目標テーマ</h1> 
        <table>
        @foreach($items as $item)
        <tr>
            <td>{{optional($item)->theme}}</td>
        </tr>
        @endforeach 
        </table>
        {{ $items->links() }}
        <div class="btn-wrapper">
            <a href="/user" class="btn">インデックスへ</a>
        </div>     
    </div>--}}