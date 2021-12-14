@extends('layouts.goalapp')

@section('title', 'Welcom')

@section('stylesheet')
    
@endsection

@include('layouts.header') 

@section('content')
<div class="main">
    <div class="text-center">
        <div class="main-top">
            <br>
            <br>
            <img src="storage/top.jpg" width="700" height="500" align="right">
            <h1>今日は何しようかな</h1>
            <br>
            <h2>Goal Creationとは？</h2>
            <p>自分や人が作った目標をやってみるアプリ。<br><br>
                ほんの小さな目標でもいいから、やってみて、<br>
                今日も頑張ったなぁと自分にご褒美を。</p>
        </dv>
    </div>
    <div class="top-button">
        <a href="/register">はじめる</a>
    </div>
    <div class="step-top text-center">
        <div class="title-header mt-3">Goal Creationの使い方</div>
    </div>
    <div class="step-area row no-gutters">{{--no-guttersはBootstrapの各カラムは左右に15pxの余白がデフォルト、この余白を0にしたい場合に使う。rowの後に入れる。--}}
        <div class="col-xs-12 col-lg-4 mt-3">{{--col-xs-12は確かスマホでのサイズ、lg-4はPCでのサイズ。かける３。合計１２になるように。--}}
            <div class="step text-center mt-3">{{--mt-3は上にマージンを入れるやつ。クラス。--}}
                <div class="step-title">目標を作る</div>
                <img src="/storage/topcat1.png" width="150" height="150" class="step-img">
                <div class="step-explanation">目標を作る (かなりゆる〜い目標でOK) 。</div>
            </div>
        </div>
        <div class="col-xs-12 col-lg-4 mt-3">
            <div class="step text-center mt-3">
                <div class="step-title">目標を登録する</div>
                <img src="/storage/topcat2.png" width="150" height="150" class="step-img"> 
                <div class="step-explanation">やりたい目標を選んで自分の目標一覧に登録する。
                <br>他の人が作った目標にもチャレンジできる。</div>
            </div>
        </div>
        <div class="col-xs-12 col-lg-4 mt-3">
            <div class="step text-center mt-3">
                <div class="step-title">目標をやってみる</div>
                <img src="/storage/topcat3.png" width="150" height="150" class="step-img"> 
                <div class="step-explanation">今日の目標（やること）をクリアしたら
                <br>「やったよ」ボタンを押す。</div>
            </div>
        </div>
    </div>
    <div class="bottom-button">
        <a href="/register">はじめる</a>
    </div>
</div>

@endsection

@include('layouts.footer')

