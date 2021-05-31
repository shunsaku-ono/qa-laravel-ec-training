@extends('layouts.app')

@section('title', '購入完了画面')

@section('content')
<div class="container">

    {{-- お届け先情報 --}}
    @include('cart.address')

    <div class="col-sm-11">
        <table class="table">
            <tr>
                <th>No</th>
                <th>商品名</th>
                <th>商品カテゴリ</th>
                <th>値段</th>
                <th>個数</th>
                <th>小計</th>
            </tr>
            <tr>
                <td>1</td>
                <td>商品名1</td>
                <td>食料品</td>
                <td>1000円</td>
                <td><input type="number" min="0" max="5"><span>個</span></td>
                <td>5000円</td>
            </tr>
            <tr>
                <td>2</td>
                <td>商品名2</td>
                <td>食料品</td>
                <td>2000円</td>
                <td><input type="number" min="0" max="5"><span>個</span></td>
                <td>4000円</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>合計</td>
                <td>9000円</td>
            </tr>
        </table>
    </div>

    <div class="row justify-content-center">
        <a href="#" class="btn btn-info">買い物を続ける</a>
        <div class="col-4 align-self-center">
        </div>
        <a href="#" class="btn btn-primary">注文を確定する</a>
    </div>

</div>
@endsection
