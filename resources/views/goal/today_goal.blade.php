@extends('layouts.goalapp')

@section('title', 'Goal')

@section('stylesheet')
  
@endsection

@include('layouts.header') 

@section('content')    
    <div class=week-main>
        <h1 class="list-title">今週の目標</h1>
        <p class="list-title-p">{{$msg}}</p>
        <p class="list-title-p">テーマ</p>
        <table>
        @csrf
        @foreach($items as $item)
        <tr>
            <div class="week-theme">{{optional($item)->theme}}</div>
        </tr>
        @endforeach
        </table>
        
        <p class="list-title-p">やること</p>
        <form action="/goal/today_goal" method="post"> 
        @csrf
        <table>
        @foreach($items as $item) {{--property id not objectとかエラー出たから、optional()を足した。また、その一つ手前の作業ではtoday_goalアクションでgetじゃなくfirstで①行目のデータを取得するようにした。--}}
            <tr><th>１日目： </th><td><a href="{{ route('goal.first_day') }}?id={{optional($item)->id}}">{{optional($item)->first_day}}</a></td></tr>
            <tr><th>２日目： </th><td><a href="{{ route('goal.second_day') }}?id={{optional($item)->id}}">{{optional($item)->second_day}}</a></td></tr>
            <tr><th>３日目： </th><td><a href="{{ route('goal.third_day') }}?id={{optional($item)->id}}">{{optional($item)->third_day}}</td></tr>
            <tr><th>４日目： </th><td><a href="{{ route('goal.fourth_day') }}?id={{optional($item)->id}}">{{optional($item)->fourth_day}}</td></tr>
            <tr><th>５日目： </th><td><a href="{{ route('goal.fifth_day') }}?id={{optional($item)->id}}">{{optional($item)->fifth_day}}</td></tr>
            <tr><th>６日目： </th><td><a href="{{ route('goal.sixth_day') }}?id={{optional($item)->id}}">{{optional($item)->sixth_day}}</td></tr>
            <tr><th>７日目： </th><td><a href="{{ route('goal.seventh_day') }}?id={{optional($item)->id}}">{{optional($item)->seventh_day}}</td></tr>
        @endforeach
        </table>
        </form>
            
        <div class="btn-wrapper">
            <a href="/goal">目標一覧へ</a>
        </div>  
    </div>
@endsection
@include('layouts.footer') 