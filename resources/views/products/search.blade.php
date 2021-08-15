@extends('layouts.app')

@section('content')

    <div class="row mt-4">
        <div class="col-lg-12 text-center">
            <h1>商品検索画面</h1>
        </div>
    </div>

    <form action="{{ route('product.search') }}">
        <div class="row">
            <div class="input-group mt-4 col-md-7 offset-2">
                <h2 class="mr-4">商品名</h2>
                <input type="text" name="search" value="{{ old('search') }}" class="form-control ">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-primary ml-4" value="検索">
                </span>
            </div>
        </div>

        <div class="row">
            <div class="input-group mt-4 col-md-7 offset-2">
                <h2>商品カテゴリ</h2>
                <select class="ml-2" name="category" style=" width:50%; text-align-last:center;">
                    <option>未選択</option>
                    <option value="1">家具</option>
                    <option value="2">楽器</option>
                    <option value="3">衣類</option>
                    <option value="4">家電</option>
                    <option value="5">本</option>
                </select>
            </div>
        </div>
    </form>

    <div class="container mt-4">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $products->total() }}件</div>
            <div class="panel-body">
            </div>
            <table border="1" class="table" style="border-collapse: collapse">
                <thead class="bg-warning">
                    <tr>
                        <th>商品名</th>
                        <th>商品カテゴリ</th>
                        <th>価格</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($products))
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->categories->category_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td><a href="{{ route('products.detail', ['id' => $product->id]) }}"
                                        class="btn btn-primary">商品詳細</a>
                                </td>
                            </tr>
                        @endforeach

                    @else
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
                                    <h3>商品検索画面に戻り、やり直してください</h3>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary col-md-2 offset-md-5 mt-2">商品検索画面へ</button>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    {{ $products->links() }}
@endsection
