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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="reset-header">{{ __('パスワードを再設定する') }}</div>{{--reset-headerはオリジナルでつけたクラス--}}

                <div class="reset-body">{{--reset-bodyはオリジナルでつけたクラス--}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        
                        <div class="form-group row">
                            
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                        
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                         
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="reset-bottom">{{--reset-bottomはオリジナルでつけたクラス--}}
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('パスワードリセットリンクの送信') }}
                                    </button>
                                </div>
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