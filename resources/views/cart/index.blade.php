@extends('app')

@section('title','カート内商品一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-11">
            <div class="border border-dark pt-2 pl-4">
                <p class="ml-1">お届け先</p>
                {{-- ログインユーザから住所と名前を取り出して表示 --}}
                <p class="ml-3">
                    〒{{ Auth::user()->zipcode }}
                    &nbsp;{{ Auth::user()->prefecture.Auth::user()->municipality }}
                    &nbsp;{{ Auth::user()->address }}
                </p>
                <div>
                    <p class="offset-sm-2">
                        &nbsp;{{ Auth::user()->last_name }}
                        &nbsp;{{ Auth::user()->first_name }}
                        &nbsp;様</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-11">
        <table class="table my-4">
            {{-- タイトル行 --}}
            <tr>
                <th>No</th>
                <th>商品名</th>
                <th>商品カテゴリ</th>
                <th>値段</th>
                <th>個数</th>
                <th>小計</th>
            </tr>
            {{-- セッションのカート情報をforeachで表示させる --}}
            @foreach($cart_items as $cart_item)
            <tr>
                <td>{{ $loop->index +1 }}</td>
                <td>{{ $cart_item['product_name'] }}</td>
                <td>{{ $cart_item['category_name'] }}</td>
                <td>{{ $cart_item['price'] }}円</td>
                <td>{{ $cart_item['session_product_quantity'] }}個</td>
                {{-- Memo:フォーム形式とする場合(その場合再計算ボタンや反映させる処理などが必要か？) --}}
                {{-- <td><input type="number" min="0" max="99"
                        value="{{ $cart_item['session_product_quantity'] }}"><span>個</span>
                </td> --}}
                <td>{{ $cart_item['subtotal'] }}円</td>
            </tr>
            @endforeach

            {{-- 合計金額の表示 --}}
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>合計</td>
                <td>{{ $total_price }}円</td>
            </tr>
            {{-- 本来は商品削除ボタンも必要だが実装未定 --}}
        </table>
    </div>

    <div class="row justify-content-center">
        {{-- 買い物を続けるボタンは個数だけセッションに上書きする？ --}}
        <a href="{{ route('products.index') }}" class="btn btn-info">買い物を続ける</a>
        <div class="col-4 align-self-center">
        </div>
        {{-- 注文確定ボタンでセッションが消えるようにする？ --}}
        <a href="#" class="btn btn-primary">注文を確定する</a>
    </div>
</div>
@endsection