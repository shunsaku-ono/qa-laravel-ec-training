@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center py-5">探求学園Laravel専攻　ECサイト</h1>
        <div class="row">
            <div class="col-xs-12 col-md-6 text-center mt-5">
                <h5>まだアカウントを<br>お持ちでない方はこちら</h5>
                <div class="col-xs-12 col-md-12 text-center mt-4">
                    <button type="button" onclick="location.href='./register'" name="register"
                        class="btn btn-primary btn-md">新規登録</button>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 text-center mt-5">
                <h5>すでにアカウントを<br>お持ちの方はこちら</h5>
                <div class="col-xs-12 col-md-12 text-center mt-4">
                    <button type="button" onclick="location.href='./login'" name="login"
                        class="btn btn-primary btn-md">ログイン</button>
                </div>
            </div>
        </div>
    </div>

@endsection
