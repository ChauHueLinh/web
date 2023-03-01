<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {   
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id <= 2){
                return view(view: 'admin');
            }
            if($level_id > 2){
                return 'Bạn không có quyền truy cập';
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function accounts()
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id == 1){
                $data = \App\Models\Account::join('levels', 'levels.level_id', '=', 'accounts.level_id')
                                    ->select('account_id', 'created_at', 'updated_at', 'user', 'level_name')
                                    ->get();
                return view(view: 'account', data: compact('data'));
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function show_query_accounts_search(Request $request)
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id == 1){
                $data = \App\Models\Account::join('levels', 'levels.level_id', '=', 'accounts.level_id')
                ->select('account_id', 'created_at', 'updated_at', 'user', 'level_name')
                ->where('user', 'like', '%'.$request->q.'%')
                ->get();
                $count = $data->count();
                if($count == 0){
                    session()->put('flag', 'không tìm thấy kết quả phù hợp.');
                    return back()->with('data', $data);
                } else {
                    return view(view: 'account', data: compact('data'));
                }
                // return $q = $request->q;
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function edit_account(request $request)
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id == 1){
                $user = $request->user;
                $data = \App\Models\Account::select('user')->where('user', '=', $user)->get();
                foreach($data as $user){

                }
                $title = \App\Models\Level::all();
                return view(view: 'editAccount', data: compact('user', 'title'));
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function update_account(request $request)
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id == 1){
                $user = $request->user;
                $level_id = $request->level_id;
                $time_update = date("Y-m-d H:i:s");
                $update = \App\Models\Account::where('user', 'like', $user)
                                            ->update(array('level_id' => $level_id, 'updated_at' => $time_update));
                if($update){
                    session()->put('flag', 'Update thành công');
                    return redirect('admin/accounts');
                } else {
                    session()->put('flag', 'Update thất bại');
                    return redirect('admin/accounts');
                }
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function delete_account(request $request)
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id == 1){
                $user = $request->user;
                $delete = \App\Models\Account::where('user', '=', $user)->delete();
                if($delete){
                    session()->put('flag', 'Delete thành công');
                    return redirect('/admin/accounts');
                } else {
                    session()->put('flag', 'Delete thất bại');
                    return redirect('/admin/accounts');
                }
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function products()
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id <= 2){
                $data = \App\Models\Product::join('origins', 'origins.origin_id', '=', 'products.origin_id')
                                    ->select('product_id', 'product_name', 'product_info', 'product_avatar', 'created_at', 'updated_at', 'origin_name')
                                    ->orderBy('product_id', 'desc')
                                    ->get();
                return view(view: 'product', data: compact('data'));
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function show_query_products_search(Request $request)
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id <= 2){
                $data = \App\Models\Product::join('origins', 'origins.origin_id', '=', 'products.origin_id')
                                    ->select('product_id', 'product_name', 'product_info', 'product_avatar', 'created_at', 'updated_at', 'origin_name')
                                    ->where('product_name', 'like', '%'.$request->q.'%')
                                    ->get();
                return view(view: 'product', data: compact('data'));
                $count = $data->count();
                if($count == 0){
                    session()->put('flag', 'không tìm thấy kết quả phù hợp.');
                    return back()->with('data', $data);
                } else {
                    return view(view: 'product', data: compact('data'));
                }
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function edit_product(request $request)
    {
        $level_id = session()->get('level_id');
        if($level_id <= 2){
            $data = \App\Models\Product::join('origins', 'origins.origin_id', '=', 'products.origin_id')
                                        ->select('product_id', 'product_name', 'product_info', 'product_avatar', 'origin_name')
                                        ->where('product_id', '=', $request->product_id)
                                        ->get();
            foreach($data as $value){

            }
            $origins = \App\Models\Origin::all();
            return view(view: 'editProduct', data: compact('value', 'origins'));
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function update_product(request $request)
    {
        $level_id = session()->get('level_id');
        if($level_id <= 2){
            $product_id = $request->product_id;
            $product_name = $request->product_name;
            $product_info = $request->product_info;
            $origin_id = $request->origin_id;
            $time_update = date("Y-m-d H:i:s");
            $update = \App\Models\Product::where('product_id', '=', $product_id)
                                        ->update(array('product_name' => $product_name, 'product_info' => $product_info, 'origin_id' => $origin_id, 'updated_at' => $time_update));
            if($update){
                session()->put('flag', 'Update thành công');
                return redirect('admin/products');
            } else {
                session()->put('flag', 'Update không thành công');
                return redirect('admin/products');
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function delete_product(request $request)
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id <= 2){
                $product_id = $request->product_id;
                $delete = \App\Models\Product::where('product_id', '=', $product_id)->delete();
                if($delete){
                    session()->put('flag', 'Delete thành công');
                    return redirect('/admin/products');
                } else {
                    session()->put('flag', 'Delete thất bại');
                    return redirect('/admin/products');
                }
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function add_product(Request $request)
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id <= 2){
                $data = \App\Models\Origin::all();
                return view(view: 'addProduct', data: compact('data'));
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function add_product_process(Request $request)
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id <= 2){
                $products = new Product();
                $products->product_name = $request->input('product_name');
                $products->product_info = $request->input('product_info');
                $products->origin_id = $request->input('origin_id');
                $products->product_avatar = '..\photos\avatar.jpg';
                $products->created_at = date("Y-m-d H:i:s");
                $products->updated_at = date("Y-m-d H:i:s");
                $check = \App\Models\Product::where('product_info', 'like', $products->product_info)->get()->count();
                if($check > 0){
                    session()->put('flag', 'Sản phẩm đã tồn tại');
                    return back();
                } else {
                    $products->save();
                    if($products){
                        session()->put('flag', 'Thêm sản phẩm thành công');
                        return redirect('admin/products');
                    } else {
                        session()->put('flag', 'Thêm sản phẩm không thành công');
                        return back();
                    }
                }
                return $check;
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function addPhoto_product(request $request)
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id <= 2){
                $product_id = $request->product_id;
                return view(view: 'addPhoto', data: compact('product_id'));
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
    public function add_photo_process(request $request)
    {
        if(session()->has('level_id')){
            $level_id = session()->get('level_id');
            if($level_id <= 2){
                $product_id = $request->product_id;
                foreach($request->file('file') as $file)
                {
                    $filename = $file->getClientOriginalName();
                }
                return $filename;
            }
        } else {
            session()->put('flag', 'bạn cần đăng nhập');
            return redirect('/signin');
        }
    }
}
