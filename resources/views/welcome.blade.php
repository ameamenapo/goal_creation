@extends('layouts.goalapp')

@section('title', 'Welcom')

@section('stylesheet')
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection

@include('layouts.header')    

@section('content')
<div class="main">
<h1>今日は何しようかな</h1>
<h1>始める</h1>
</div>
@endsection

@include('layouts.footer')   
