@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="form-wrap mx-auto col-xs-6 col-lg-6">
            <div class="form-group text-center">
                <h2 class="logo-img mx-auto">
                    ログイン
                </h2>
            </div>
            <form class="login_form" id="login_form" action="{{ route('login') }}" accept-charset="UTF-8" method="post">
                {{ csrf_field() }}
                <p>メールアドレス</p>
                <div class="form-group">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <p>パスワード</p>
                <div class="form-group">
                    <input id="password" type="password" class="form-control" name="password">
                </div>
                <div class="actions text-center">
                    <input type="submit" name="commit" value="ログイン" class="btn btn-primary w-auto">
                </div>
            </form>
            <br>
            <p class="devise-link">
                <a href="register">
                    まだ登録がお済でないかたはこちら
                </a>
            </p>
        </div>
    </div>

@endsection
