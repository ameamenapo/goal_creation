@extends('layouts.goalapp')

@section('title', 'Goal')

@section('stylesheet')
  
@endsection

@include('layouts.header') 

@section('content')    
    <div class=week-main>
        <h1 class="list-title">今週の目標テーマ</h1>
        <p class="list-title-p">{{$msg}}</p>
        <table>
        @csrf
        @foreach($items as $item)
        <tr>
            <div class="week-theme">{{optional($item)->theme}}</div>
        </tr>
        @endforeach
        </table>
        
        <form action="/goal/today_goal" method="post"> 
        @csrf
        <table>
        <div class="week-goal-wrapper">{{--フレックスボックスの親タグ--}}
           
            @foreach($items as $item) {{--property id not objectとかエラー出たから、optional()を足した。また、その一つ手前の作業ではtoday_goalアクションでgetじゃなくfirstで①行目のデータを取得するようにした。--}}
                <div class="week-goal">１日め<br><a href="{{ route('goal.first_day') }}?id={{optional($item)->id}}">{{optional($item)->first_day}}</a></div>
                <div class="week-goal">２日め<br><a href="{{ route('goal.second_day') }}?id={{optional($item)->id}}">{{optional($item)->second_day}}</a></div>
                <div class="week-goal">３日め<br><a href="{{ route('goal.third_day') }}?id={{optional($item)->id}}">{{optional($item)->third_day}}</a></div>
                <div class="week-goal">４日め<br><a href="{{ route('goal.fourth_day') }}?id={{optional($item)->id}}">{{optional($item)->fourth_day}}</a></div>
                <div class="week-goal">５日め<br><a href="{{ route('goal.fifth_day') }}?id={{optional($item)->id}}">{{optional($item)->fifth_day}}</a></div>
                <div class="week-goal">６日め<br><a href="{{ route('goal.sixth_day') }}?id={{optional($item)->id}}">{{optional($item)->sixth_day}}</a></div>
                <div class="week-goal">７日め<br><a href="{{ route('goal.seventh_day') }}?id={{optional($item)->id}}">{{optional($item)->seventh_day}}</a></div>
            @endforeach
    
        </div>{{--フレックスボックスの親の閉じタグ--}}
        </table>
        </form>
            
        <div class="week-bottom">
            <a href="/goal">目標一覧へ</a>
        </div>  
    </div>
@endsection
@include('layouts.footer') 


{{--<form action="/goal/today_goal" method="post"> 元々のform部分。「やること」の下の部分。
        @csrf
        <table>
       
            @foreach($items as $item)
                <tr><th>１日目： </th><td><a href="{{ route('goal.first_day') }}?id={{optional($item)->id}}">{{optional($item)->first_day}}</a></td></tr>
                <tr><th>２日目： </th><td><a href="{{ route('goal.second_day') }}?id={{optional($item)->id}}">{{optional($item)->second_day}}</a></td></tr>
                <tr><th>３日目： </th><td><a href="{{ route('goal.third_day') }}?id={{optional($item)->id}}">{{optional($item)->third_day}}</td></tr>
                <tr><th>４日目： </th><td><a href="{{ route('goal.fourth_day') }}?id={{optional($item)->id}}">{{optional($item)->fourth_day}}</td></tr>
                <tr><th>５日目： </th><td><a href="{{ route('goal.fifth_day') }}?id={{optional($item)->id}}">{{optional($item)->fifth_day}}</td></tr>
                <tr><th>６日目： </th><td><a href="{{ route('goal.sixth_day') }}?id={{optional($item)->id}}">{{optional($item)->sixth_day}}</td></tr>
                <tr><th>７日目： </th><td><a href="{{ route('goal.seventh_day') }}?id={{optional($item)->id}}">{{optional($item)->seventh_day}}</td></tr>
            @endforeach
        
        </table>
</form>--}}