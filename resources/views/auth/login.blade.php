@extends('layouts.goalapp')

@section('title', 'Login')

@section('stylesheet')
    {{--<link rel="stylesheet" href="reset.css">　　このファイルはもしCSSをリセットしたいならたすもの--}}
    <link rel="stylesheet" href="/css/styles.css">
    {{--<link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
     {{--以下はFont Awesome5を読み込んでいる。--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> 
@endsection

@section('header')
<header class=header>
        <div class="header-logo">
            <a href="/"><img src="/storage/logo.png" width="100px" height="100px"></a>    
        </div>
            <div class="header-list">
                <ul>
                    <li><a href="/">ホーム</a></li>
                    <li><a href="/user">目標ページ</a></li>
                    <li><a href="/profile">マイページ</a></li>
                    <li><a href="https://twitter.com/CreationGoal">twitter</a></li>
                    <li><div class="header-right">
                        <a href="/user/logout">ログアウト</a></div>
                    </li>
                </ul>
            </div>
</header>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="login-header">{{ __('ログイン') }}</div> {{--もとは<div class="card-header">{{ __('Login') }}</div>--}}

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
 
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right form-control-lg">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right form-control-lg">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        ログイン情報を保存する
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ログイン
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        パスワードを忘れましたか？
                                    </a>
                                @endif
                                
                                <a href="/register">新規アカウント登録</a>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('layouts.footer') 
