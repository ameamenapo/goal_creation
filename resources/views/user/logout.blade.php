@extends('layouts.goalapp')

@section('title', 'Logout')

@section('stylesheet')
    {{--<link rel="stylesheet" href="reset.css">　　このファイルはもしCSSをリセットしたいならたすもの--}}
    <link rel="stylesheet" href="/css/styles.css">
    {{--<link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
     {{--以下はFont Awesome5を読み込んでいる。--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> 
@endsection

@include('layouts.header') 

@section('content')
<div class="main-logout">
<div class="container">
    <div class="row justify-content-center mt-5">{{--mt-5でマージントップを足した。そしたらヘッダーから離れた。--}}
        <div class="col-md-8">
            <div class="card">
                <div class="logout-header">{{ __('ログアウト画面') }}</div>

                {{--<div class="card-body">--}}
                <div class="logout-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('ログアウトしますか？') }}<br>
                        <div class="logout-btn">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@include('layouts.footer')



