<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function girls(Request $request) {
        if($request->has('name')) {
            $request->validate([
                'name' => 'required|min:2',
            ]);
            $girls = \App\Models\Girl::join('origins', 'origins.origin_id', '=', 'girls.origin_id')
                                    ->select('girl_id', 'girl_name', 'girl_avatar', 'origin_name', 'price')
                                    ->where('girl_name', 'like', '%'.$request->name.'%')
                                    ->orderBy('girl_id', 'desc')
                                    ->Paginate(10);
        } else if($request->has('origin_id')) {
            $girls = \App\Models\Girl::select('girl_id', 'girl_name', 'girl_avatar', 'price')
                                    ->where('origin_id', '=', $request->origin_id)
                                    ->orderBy('girl_id', 'desc')
                                    ->Paginate(10);
        } else {
            $girls = \App\Models\Girl::join('origins', 'origins.origin_id', '=', 'girls.origin_id')
                                    ->select('girl_id', 'girl_name', 'girl_avatar', 'origin_name' , 'price')
                                    ->orderBy('girl_id', 'desc')
                                    ->Paginate(10);
        }
        $check = $girls->count();
        if($check == 0) {
            session()->put('message', 'Không tìm thấy kết quả');
        }
        $origins = \App\Models\Origin::all();
        return view(view: 'Client\Girls', data: compact('girls', 'origins'));
    }
    public function view_girl(Request $request) {
        $girl_id = $request->id;
        $girls =  $girls = \App\Models\Girl::join('origins', 'origins.origin_id', '=', 'girls.origin_id')
                                            ->select('girl_id', 'girl_name', 'girl_avatar', 'origin_name', 'price')
                                            ->where('girl_id', '=', $girl_id)
                                            ->get();
        $origins = \App\Models\Origin::all();
        $photos = \App\Models\Photo::where('girl_id', '=', $girl_id)
                                    ->orderBy('photo_id', 'desc')
                                    ->Paginate(16);
        $photos->setPath('?id=' . $girl_id);
        return view(view: 'Client\ViewGirl', data: compact('girls', 'photos', 'origins'));
    }
}
