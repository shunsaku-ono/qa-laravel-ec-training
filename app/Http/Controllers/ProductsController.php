<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

class ProductsController extends Controller
{
    public function search(Request $request) {
        $query = Product::query();
        $categories = Category::pickUpColumn();

        $searchWord = $request->input('product_name');
        $categoryId = $request->input('category_id');

        if (isset($searchWord)) {
            $query->where('product_name', 'like', '%'.$searchWord.'%');
        }
        if (isset($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        $products = $query->orderBy('category_id', 'asc')->paginate(15);

        return view('products.search', [
            'products' => $products,
            'categories' => $categories,
            'searchWord' => $searchWord,
            'categoryId' => $categoryId,
        ]);
    }

    public function showDetail(Request $request, $id)
    {
        $product =Product::findOrFail($id);
        $query = Product::query();
        $categories = Category::pickUpColumn();

        return view('products.detail_a_product', [
            'product' => $product,
        ]);
    }
}
