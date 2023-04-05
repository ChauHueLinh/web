<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Account;
use Cookie;

class AccountController extends Controller
{
    public function signup() {
        return view(view: 'Client\Signup');
    }
    public function signup_process(Request $request) {
        $request->validate([
            'account_name' =>'required|min:5',
            'account_password' =>'required|min:5',
        ]);
            // Lấy dữ liệu từ form và mã hóa
        $account_name = $request->account_name;
        $account_password = md5('dlyn'.$request->account_password.'dlyn');
            // kiểm tra xem tài khoản đã tồn tại chưa
        $check = \App\Models\Account::where('account_name', 'like', $account_name)->get()->count();
        if($check == 0) {
            $accounts = new Account();
            $accounts->account_name = $account_name;
            $accounts->account_password = $account_password;
            $accounts->level_id = 4;
            $accounts->created_at = date('d-m-y');
            $accounts->updated_at = date('d-m-y');
            $accounts->save();
            if($accounts) {
                session()->flash('message', 'Đăng ký thành công');
            } else {
                session()->flash('message', 'Đăng ký không thành công');
            }
        }
        return redirect('signin');
    }
    public function signin() {
        return view(view: 'Client\Signin');
    }
    public function signin_process(Request $request) {
        $request->validate([
            'account_name' =>'required|min:5',
            'account_password' =>'required|min:5',
        ]);
            // Lấy dữ liệu từ form và mã hóa
        $account_name = $request->account_name;
        $account_password = md5('dlyn'.$request->account_password.'dlyn');
        $token = 'user_' . $request->_token . time();
        $remember = $request->remember;
            // Kiểm tra đúng tài khoản và mật khẩu không
        $accounts = \App\Models\Account::where('account_name', 'like', $account_name)
                                    ->where('account_password', 'like', $account_password)
                                    ->get();
        $count = $accounts->count();
        if($count == 0) {
            session()->flash('message', 'Sai tên hoặc mật khẩu');
            return redirect('signin');
        } else {
            foreach($accounts as $account) {

            }
            if($remember) {
                $update = \App\Models\Account::where('account_name', 'like', $account_name)
                                            ->update(array(
                                                'token' => $token,
                                            ));
            }
            setcookie('remember', $token, time() + (60*60*24*30));
            session()->put('account_id', $account->account_id);
            session()->put('account_name', $account->account_name);
            session()->put('level_id', $account->level_id);
            return redirect('');
        }
    }
    public function signout() {
            // xóa toàn bộ session
        session()->flush();
        setcookie("remember", "", time()-3600);
        return redirect('');
    }
    public function account(Request $request) {
        if($request->has('name')) {
            $request->validate([
                'name' => 'required|min:1',
            ]);
            $name = $request->name;
            $accounts =  \App\Models\Account::join('levels', 'levels.level_id', '=', 'accounts.level_id')
                                            ->select('account_id', 'account_name', 'level_name')
                                            ->where('account_name', 'like', '%'.$name.'%')
                                            ->orwhere('account_id', '=', $name)
                                            ->orderBy('account_id', 'desc')
                                            ->get();
            $count = $accounts->count();
            if($count == 0) {
                session()->put('message', 'Không tìm thấy kết quả');
            }
        } else {
            $accounts =  \App\Models\Account::join('levels', 'levels.level_id', '=', 'accounts.level_id')
                                            ->select('account_id', 'account_name', 'level_name')
                                            ->orderBy('account_id', 'desc')
                                            ->get();
        }
        return view(view: 'Admin\Account', data: compact('accounts'));
    }
    public function edit_account(Request $request) {
        $account_id = $request->id;
        $accounts =  \App\Models\Account::join('levels', 'levels.level_id', '=', 'accounts.level_id')
                                        ->select('account_id', 'account_name', 'level_name')
                                        ->where('account_id', '=', $account_id)
                                        ->get();
        $levels = \App\Models\Level::all();
        return view(view: 'Admin\EditAccount', data: compact('accounts', 'levels'));
    }
    public function edit_account_process(Request $request) {
        $account_id = $request->account_id;
        $level_id = $request->level_id;
        $updated_at = date("d-m-y");
        $update = \App\Models\Account::where('account_id', '=', $account_id)
                                    ->update(array(
                                                'level_id' => $level_id,
                                                'updated_at' => $updated_at,
                                    ));
        if($update) {
            session()->flash('message', 'Cập nhật thành công');
        } else {
            ession()->flash('message', 'Cập nhật không thành công');
        }
        return redirect('account');
    }
    public function change_password() {
        return view(view: 'Client\ChangePassword');
    }
    public function change_password_process(Request $request) {
        $request->validate([
            'current_password' => 'required|min:5',
            'new_password' => 'required|min:5',
        ]);
        $account_id = session('account_id');
        $current_password = md5('dlyn'.$request->current_password.'dlyn');
        $new_password = md5('dlyn'.$request->new_password.'dlyn');
        $check = \App\Models\Account:: where('account_id', '=', $account_id)
                                    ->where('account_password', 'like', $current_password)
                                    ->get()->count();
        if($check == 0) {
            session()->flash('message', 'mật khẩu hiện tại không đúng');
            return redirect('change_password');
        } else {
            $update = \App\Models\Account::where('account_id', '=', $account_id)
                                        ->update(array(
                                            'account_password' => $new_password,
                                        ));
            if($update) {
                session()->flush();
                session()->flash('message', 'Cập nhật thành công. Mời đăng nhập lại.');
                return redirect('signin');
            } else {
                session()->flash('message', 'Cập nhật không thành công');
                return redirect('change_password');
            }
        }
    }
    function cookie() {
        $token = $_COOKIE['remember'];
        $accounts = \App\Models\Account::where('token', 'like', $token)
                                    ->get();
        $count = $accounts->count();
        if($count == 1) {
            foreach($accounts as $account) {

            }
            session()->put('account_id', $account->account_id);
            session()->put('account_name', $account->account_name);
            session()->put('level_id', $account->level_id);
        }
        return back();
    }
}
