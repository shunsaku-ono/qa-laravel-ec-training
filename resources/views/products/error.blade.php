@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <h1>該当商品が見つかりませんでした...</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <h3><a href={{ route('product.index') }}>商品検索画面に戻り、やり直してください</a></h3>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary col-md-2 offset-md-5 mt-2">商品検索画面へ</button>

@endsection
