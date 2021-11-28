@extends('layouts.goalapp')

@section('title', 'Welcom')

@section('stylesheet')
    {{--<link rel="stylesheet" href="reset.css">　　このファイルはもしCSSをリセットしたいならたすもの--}}
    <link rel="stylesheet" href="css/styles.css">
    {{--<link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
     {{--以下はFont Awesome5を読み込んでいる。--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> 
@endsection

@include('layouts.header')    

@section('content')
<div class="main">
<h1>今日は何しようかな</h1>
<h1>始める</h1>
</div>
@endsection

@include('layouts.footer') 
