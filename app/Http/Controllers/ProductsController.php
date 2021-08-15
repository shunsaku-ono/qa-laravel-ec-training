<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::query()->paginate(15);

        $categories = Category::query()->paginate(15);
        $params = [
            'products' => $products,
            'categories' => $categories,
        ];

        return view('products.search', $params);

    }

    public function search(Request $request)
    {
        // inputタグで入力した値を取得
        $keyProduct = $request->input('search');
        $keyCategory = $request->input('category');
        // dd($keyCategory);
        // クエリ作成
        $query = Product::query();

        // 商品名が入力されている場合
        if (isset($keyProduct)) {
            $query->where('product_name', 'like', '%' . $keyProduct . '%')->get();
        };

        // カテゴリーが入力されている場合
        if ($keyCategory != "未選択") {
            $query->where('category_id', $keyCategory)->get();
        };

        $products = $query->orderBy('regist_date', 'desc')->paginate(15);

        return view('products.search', [
            'products' => $products,
        ]);
    }

    public function detail($id)
    {
        //変数の初期化
        $product = array();
        $userId = '';
        //urlパラメータからきたユーザidを元にモデルからそれぞれ商品、カテゴリーを特定
        $product = Product::findOrFail($id);
        $userId = Auth::user()->id;

        return view('products.detail',
            [
                'product' => $product,
                'userId' => $userId,
            ]);
    }

}
