<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Detail_bill;
use App\models\Origin;
use Session;

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
                $girl['folder'] = $value->folder;
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
            $girl['folder'] = $value->folder;
            $girl['quantity'] = 1;
            $girl['price'] = $value->price;
            $girl['total'] = $value->price;
            $cart[$girl_id] = $girl;
        }
        session()->put('total_item', count($cart));
        session()->put('cart', $cart);
        return back();
    }
    public function cart() {
        $origins = Origin::all();
        $cart = session('cart');
        $count = count($cart);
        if($count == 0) {
            return redirect('');
        } else {
            foreach($cart as $girl) {
                $totals[] = $girl['total'];
            }
            $total = array_sum($totals);
            return view(view: 'Client\cart', data: compact('cart', 'origins', 'total'));      
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
    public function cart_process (Request $request) {
        $request->validate([
            'address' => 'required|min:5',
            'phone_number' => 'required|min:10',
            'phone_number' => 'required|max:10',
        ]);
            // Nhập dữ liệu
        $address = $request->address;
        $phone_number = $request->phone_number;
        $account_id = session('account_id');
        $account_name = session('account_name');
        date_default_timezone_set("Antarctica/Davis");
        $date = date('d-m-Y H:i:s');
        $cart = session('cart');
        foreach($cart as $key) {
            $totals[] = $key['total'];
        }
        $summary = array_sum($totals);
        $bill = new Bill();
        $bill->account_id = $account_id;
        $bill->address = $address;
        $bill->phone_number = $phone_number;
        $bill->date = $date;
        $bill->summary = $summary;
        $bill->save();
        if ($bill) {
            $bills = Bill::where('account_id', '=', $account_id)
                        ->orderby('bill_id', 'desc')
                        ->limit(1)
                        ->get();
            
            foreach($cart as $key) {
                $detail_bill = new Detail_bill();
                $detail_bill->bill_id = $bills[0]->bill_id;
                $detail_bill->account_id = $account_id;
                $detail_bill->girl_id = $key['girl_id'];
                $detail_bill->quantity = $key['quantity'];
                $detail_bill->total = $key['total'];
                $detail_bill->save();
            }
        }
        session()->forget('total_item');
        session()->forget('cart');
        return redirect('bill');
    }
    public function bill () {
        $origins = Origin::all();
        $account_id = session('account_id');
        $bills = Bill::join('accounts', 'accounts.account_id', '=', 'bills.account_id')
                    ->where('bills.account_id', '=', $account_id)
                    ->orderby('bill_id', 'desc')
                    ->get();
        foreach ($bills as $key => $bill) {
            $detail_bills = Detail_bill::join('girls', 'girls.girl_id', '=', 'detail_bills.girl_id')
                                        ->select('detail_bills.girl_id', 'girls.girl_name', 'quantity', 'girls.price', 'total')
                                        ->where('bill_id', '=', $bill->bill_id)
                                        ->get();
            $bill->detail_bills = $detail_bills;
        }
        // echo json_encode($bills);
        return view(view: 'Client/bill', data:compact('bills', 'origins'));
    }
}
