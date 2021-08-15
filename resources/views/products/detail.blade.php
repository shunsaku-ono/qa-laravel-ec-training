@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 text-center">
                <h1>商品情報</h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 text-center">
                <h2>商品名：{{ $product->product_name }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-right">
                <h2>商品カテゴリ：{{ $product->categories->category_name }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-left">
                <h2>商品説明</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-left">
                <h2>{{ $product->discription }}</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 text-left">
                <h2>{{ $product->price }}円</h2>
            </div>
        </div>

        {!! Form::open(['route' => 'addCart']) !!}

        {{ Form::hidden('userId', $userId) }}

        {{ Form::hidden('productId', $product->id) }}

        <!-- ラベルを使用すると文字が小さくなる... -->
        <div class="row mt-5" style="justify-content:center">
            <div class="input-group">
                <h2>購入個数</h2>
                <!-- <label class="control-label">購入個数</label> -->
                <input class="form-control col-2" type="number" value="0" name="quantity" required>
                <h2>個</h2>
                {!! Form::submit('カートへ', ['class' => 'btn btn-primary']) !!}

            </div>
        </div>
        {!! Form::close() !!}

    </div>

@endsection
