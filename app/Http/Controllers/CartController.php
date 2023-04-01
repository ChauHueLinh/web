<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request) {
        $girl_id = $request->id;
        if(session()->has('cart')) {
            $cart = session('cart');
            if(!empty($cart[$girl_id])) {
                $girl = $cart[$girl_id];
                $girl['quantity'] = $girl['quantity'] + 1;
                $girl['total'] = $girl['quantity'] * $girl['price'];
                $cart[$girl_id] = $girl;
            } else {
                $girls = \App\Models\Girl::where('girl_id', '=', $girl_id)->get();
                foreach($girls as $value) {

                }
                $girl = [];
                $girl['girl_id'] = $girl_id;
                $girl['girl_name'] = $value->girl_name;
                $girl['girl_avatar'] = $value->girl_avatar;
                $girl['quantity'] = 1;
                $girl['price'] = $value->price;
                $girl['total'] = $value->price;;
                $cart[$girl_id] = $girl;
            }
        } else {
            $girls = \App\Models\Girl::where('girl_id', '=', $girl_id)->get();
            foreach($girls as $value) {

            }
            $girl = [];
            $girl['girl_id'] = $girl_id;
            $girl['girl_name'] = $value->girl_name;
            $girl['girl_avatar'] = $value->girl_avatar;
            $girl['quantity'] = 1;
            $girl['price'] = $value->price;
            $girl['total'] = $value->price;
            $cart[$girl_id] = $girl;
        }
        session()->put('total_item', count($cart));
        session()->put('cart', $cart);
        return back();
    }
    public function bill() {
        $origins = \App\models\Origin::all();
        $cart = session('cart');
        $count = count($cart);
        if($count == 0) {
            return redirect('');
        } else {
            foreach($cart as $girl) {
                $totals[] = $girl['total'];
            }
            $total = array_sum($totals);
            return view(view: 'Client\Bill', data: compact('cart', 'origins', 'total'));      
        }       
    }
    public function remove_from_cart(Request $request) {
        $girl_id = $request->id;
        $cart = session('cart');
        $girl = $cart[$girl_id];
        if($girl['quantity'] > 1) {
            $girl['quantity'] = $girl['quantity'] - 1;
            $girl['total'] = $girl['quantity'] * $girl['price'];
            $cart[$girl_id] = $girl;
        } else {
            unset($cart[$girl_id]);
        }
        session()->put('total_item', count($cart));
        session()->put('cart', $cart);
        return back();
    }
}
