<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class HomepageController extends Controller
{
    public function show_product()
    {
        $products = \App\Models\Product::join('origins', 'origins.origin_id', '=', 'products.origin_id')
                                        ->select('product_id', 'product_name', 'product_info', 'product_avatar', 'created_at', 'updated_at', 'origin_name')
                                        ->orderBy('product_id', 'desc')
                                        ->get();
        return view('homepage', compact('products'));
    }
    public function show_query_search(Request $request)
    {
        $products = \App\Models\Product::join('origins', 'origins.origin_id', '=', 'products.origin_id')
                                        ->select('product_id', 'product_name', 'product_info', 'product_avatar', 'created_at', 'updated_at', 'origin_name')
                                        ->where('product_name', 'like', '%'.$request->q.'%')
                                        ->orderBy('product_id', 'desc')
                                        ->get();
        $count = count($products);
        if($count == 0){
            session()->put('flag', 'Không tìm thấy sản phẩm');
            return view('homepage', ['products'=>$products]);
        } else {
            $products = $products;
            return view('homepage', ['products'=>$products]);
        }
    }
}
