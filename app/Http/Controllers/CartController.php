<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        // dd($request);
        // Formのname属性から受け取ったパラメータを変数に入れる
        $sessionProductId = $request->productId;
        $sessionProductQuantity = $request->quantity;

        //配列作成（初期化）
        $sessionData = array();

        //配列に変数をまとめる(sessionで保存したい配列)
        $sessionData = compact("sessionProductId", "sessionProductQuantity");

        // session_dataというキーで配列をsessionに保存
        $request->session()->push('session_data', $sessionData);

        return redirect('/cart');
    }

    public function cartList(Request $request)
    {
        // sessionで保存していた値を取得(配列)し変数に入れる
        $sessionData = $request->session()->get('session_data');

        // 配列$session_dataから各パラメータを取り出す
        $sessionProductId = array_column($sessionData, 'sessionProductId');
        $sessionProductQuantity = array_column($sessionData, 'sessionProductQuantity');

        return view('products.cartlist', compact('sessionProductId', 'sessionProductQuantity'));
    }
}
