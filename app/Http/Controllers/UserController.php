<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class UserController extends Controller
{
    public function signin()
    {
        return view(view: 'signin');
    }
    public function signup()
    {
        return view(view: 'signup');
    }
    public function add_account(Request $request)
    {
        $request->validate([
            'user' => 'required|min:4',
            'password' => 'required|min:4',
        ]);
        $accounts = new Account();
        $accounts->user = $request->input('user');
        $accounts->password = $request->input('password');
        $accounts->level_id = '3';
        $check = \App\Models\Account::where('user', 'like', $accounts->user)->get()->count();
        if($check > 0){
            session()->put('flag', 'User đã được đăng ký');
            return redirect("/signup");
        }
        $accounts->save();
        if($accounts){
            session()->put('flag', 'Đăng kí thành công');
            return redirect("/signin");
        } else {
            session()->put('flag', 'Đăng kí không thành công');
            return redirect("/signup");
        }
    }
    public function login(Request $request){
        $request->validate([
            'user' => 'required|min:4',
            'password' => 'required|min:4',
        ]);
        $accounts = new Account();
        $accounts->user = $request->input('user');
        $accounts->password = $request->input('password');
        $check = \App\Models\Account::where('user', 'like', $accounts->user)->get(); 
        $count = $check->count();
        if($count == 0){
            session()->put('flag', 'Sai User hoặc Password');
            return redirect("/signin");
        } else if($count == 1){
            foreach($check as $value){

            }    
            if($value['password'] == $accounts->password){
                session()->put('user', $value['user']);
                session()->put('level_id', $value['level_id']);
                return redirect("/");
        } else {
            session()->put('flag', 'Sai User hoặc Password');
            return redirect("/signin");
        }
        }
    }
    public function logout()
    {
        session()->flush();
        
        return redirect('/');
    }
}
