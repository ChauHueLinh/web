<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Origin;
use \App\Models\Girl;
use \App\Models\Photo;
use \App\Models\Level;
use File;

class AdminController extends Controller
{
    public function index() {
        return view(view: 'Admin\admin');
    }

    public function girl(Request $request) {
        if($request->has('name')) {
            $request->validate([
                'name' => 'required|min:2',
            ]);
            $girls = \App\Models\Girl::join('origins', 'origins.origin_id', '=', 'girls.origin_id')
                                    ->select('girl_id', 'girl_name', 'girl_avatar', 'girl_info', 'origin_name', 'price', 'folder')
                                    ->where('girl_name', 'like', '%'.$request->name.'%')
                                    ->orderBy('girl_id', 'desc')
                                    ->Paginate(10);
        } else {
            $girls = \App\Models\Girl::join('origins', 'origins.origin_id', '=', 'girls.origin_id')
                                        ->select('girl_id', 'girl_name', 'girl_avatar', 'girl_info', 'origin_name', 'price', 'folder')
                                        ->orderBy('girl_id', 'desc')
                                        ->Paginate(10);
        }
        $check = $girls->count();
        if($check == 0) {
            session()->put('message', 'Không tìm thấy kết quả');
        } 
        return view(view: 'Admin\Girl', data: compact('girls'));
    }
    public function add_girl() {
        $origins = \App\Models\Origin::all();
        return view(view: 'Admin\AddGirl', data: compact('origins'));
    }
    public function add_girl_process(request $request) {
        $request->validate([
            'girl_name' => 'required|min:4',
            'girl_info' => 'required|min:4',
            'girl_avatar' => 'required|min:4',
            'price' => 'required|min:3',
        ]);
        $girl = new Girl();
        $girl->price = $request->price;
        $girl->girl_name = $request->girl_name;
        $replace = array(
            ' ' => '',
            'á' => 'a','à' => 'a','ả' => 'a','ã' => 'a','ạ' => 'a',
            'ă' => 'a','ắ' => 'a','ặ' => 'a','ằ' => 'a','ẳ' => 'a','ẵ' => 'a',
            'â' => 'a','ấ' => 'a','ầ' => 'a','ẩ' => 'a','ẫ' => 'a','ậ' => 'a',
            'Á' => 'A','À' => 'A','Ả' => 'A','Ã' => 'A','Ạ' => 'A',
            'Ă' => 'A','Ắ' => 'A','Ặ' => 'A','Ằ' => 'A','Ẳ' => 'A','Ẵ' => 'A',
            'Â' => 'A','Ấ' => 'A','Ầ' => 'A','Ẩ' => 'A','Ẫ' => 'A','Ậ' => 'A',
            'đ' => 'd',
            'Đ' => 'D',
            'é' => 'e','è' => 'e','ẻ' => 'e','ẽ' => 'e','ẹ' => 'e',
            'ê' => 'e','ế' => 'e','ề' => 'e','ể' => 'e','ễ' => 'e','ệ' => 'e',
            'É' => 'E','È' => 'E','Ẻ' => 'E','Ẽ' => 'E','Ẹ' => 'E',
            'Ê' => 'E','Ế' => 'E','Ề' => 'E','Ể' => 'E','Ễ' => 'E','Ệ' => 'E',
            'í' => 'i','ì' => 'i','ỉ' => 'i','ĩ' => 'i','ị' => 'i',
            'Í' => 'I','Ì' => 'I','Ỉ' => 'I','Ĩ' => 'I','Ị' => 'I',
            'ó' => 'o','ò' => 'o','ỏ' => 'o','õ' => 'o','ọ' => 'o',
            'ô' => 'o','ố' => 'o','ồ' => 'o','ổ' => 'o','ỗ' => 'o','ộ' => 'o',
            'ơ' => 'o','ớ' => 'o','ờ' => 'o','ở' => 'o','ỡ' => 'o','ợ' => 'o',
            'Ó' => 'O','Ò' => 'O','Ỏ' => 'O','Õ' => 'O','Ọ' => 'O',
            'Ô' => 'O','Ố' => 'O','Ồ' => 'O','Ổ' => 'O','Ỗ' => 'O','Ộ' => 'O',
            'Ơ' => 'O','Ớ' => 'O','Ờ' => 'O','Ở' => 'O','Ỡ' => 'O','Ợ' => 'O',
            'ú' => 'u','ù' => 'u','ủ' => 'u','ũ' => 'u','ụ' => 'u',
            'ư' => 'u','ứ' => 'u','ừ' => 'u','ử' => 'u','ữ' => 'u','ự' => 'u',
            'Ú' => 'U','Ù' => 'U','Ủ' => 'U','Ũ' => 'U','Ụ' => 'U',
            'Ư' => 'U','Ứ' => 'U','Ừ' => 'U','Ử' => 'U','Ữ' => 'U','Ự' => 'U',
            'ý' => 'y','ỳ' => 'y','ỷ' => 'y','ỹ' => 'y','ỵ' => 'y',
            'Ý' => 'Y','Ỳ' => 'Y','Ỷ' => 'Y','Ỹ' => 'Y','Ỵ' => 'Y',
        );
        $strtr = strtr($request->girl_name, $replace);
        $strtoupper = strtoupper($strtr);
        $trim = trim($strtoupper);
        $girl->girl_info = $request->girl_info;
        $check = \App\Models\Girl::where('girl_info', 'like', $request->girl_info)->get()->count();
        if($check == 0) {
            $girl_avatar = $request->girl_avatar;
            $extension = $request->girl_avatar->extension();
            $girl_avatar_name = $trim . time() . '.' . $extension;
            $folder = $trim . '_' . date('d-m-y');
            mkdir($folder, 0700);
            $girl_avatar->move(public_path('photos') . '/' . $folder, $girl_avatar_name);
            $girl->girl_avatar = $girl_avatar_name;
            $girl->origin_id = $request->origin_id;
            $girl->folder = $trim . '_' . date('d-m-y');
            $girl->save();
            if($girl) {
                session()->put('message', 'Thêm thành công');
                $girl_ids = \App\Models\Girl::select('girl_id')->where('girl_info', 'like', $request->girl_info)->get();
                foreach ($girl_ids as $girl_id) {
                    
                }
                $photos = new Photo();
                $photos->folder = $folder;
                $photos->name = $girl_avatar_name;
                $photos->girl_id = $girl_id->girl_id;
                $photos->save();
            } else {
                session()->put('message', 'Thêm không thành công');
            }
        } else {
            session()->put('message', 'Đã tồn tại');
        }
        return redirect ('add_girl');
    }
    public function delete_girl(Request $request) {
        $girl_id = $request->id;
        $girls = \App\Models\Girl::where('girl_id', '=', $girl_id)->get();
        foreach ($girls as $girl) {
            
        }
        $photos = \App\Models\Photo::where('girl_id', '=', $girl_id)->get();
        foreach ($photos as $photo) {
            unlink(public_path() . '/' . 'photos' . '/' . $girl->folder . '/' . $photo->url);
        }
        rmdir(public_path('photos') . '/' . $girl->folder);
        $delete_girl = \App\Models\Girl::where('girl_id', '=', $girl_id)->delete();
        $delete_photo = \App\Models\Photo::where('girl_id', '=', $girl_id)->delete();
        session()->put('message', 'Xóa thành công');
        return redirect('girl');
    }
    public function edit_girl(Request $request) {
        $girl_id = $request->id;
        $girls = \App\Models\Girl::join('origins', 'origins.origin_id', '=', 'girls.origin_id')
                                ->select('girl_id', 'girl_name', 'girl_avatar', 'girl_info', 'origin_name', 'folder')
                                ->where('girl_id', '=', $girl_id)->get();
        $origins = \App\Models\Origin::all();
        return view(view: 'Admin\EditGirl', data: compact('girls', 'origins'));
    }
    public function edit_girl_process(Request $request) {
        $request->validate([
            'girl_name' => 'required|min:4',
            'girl_info' => 'required|min:4',
            'girl_avatar' => 'required|min:4',
        ]);
        $girl_id = $request->girl_id;
        $girl_name = $request->girl_name;
        $girl_info = $request->girl_info;
        $file_avatar = $request->girl_avatar;
        $origin_id = $request->origin_id;
        $updated_at = date('d-m-y');
        $replace = array(
            ' ' => '',
            'á' => 'a','à' => 'a','ả' => 'a','ã' => 'a','ạ' => 'a',
            'ă' => 'a','ắ' => 'a','ặ' => 'a','ằ' => 'a','ẳ' => 'a','ẵ' => 'a',
            'â' => 'a','ấ' => 'a','ầ' => 'a','ẩ' => 'a','ẫ' => 'a','ậ' => 'a',
            'Á' => 'A','À' => 'A','Ả' => 'A','Ã' => 'A','Ạ' => 'A',
            'Ă' => 'A','Ắ' => 'A','Ặ' => 'A','Ằ' => 'A','Ẳ' => 'A','Ẵ' => 'A',
            'Â' => 'A','Ấ' => 'A','Ầ' => 'A','Ẩ' => 'A','Ẫ' => 'A','Ậ' => 'A',
            'đ' => 'd',
            'Đ' => 'D',
            'é' => 'e','è' => 'e','ẻ' => 'e','ẽ' => 'e','ẹ' => 'e',
            'ê' => 'e','ế' => 'e','ề' => 'e','ể' => 'e','ễ' => 'e','ệ' => 'e',
            'É' => 'E','È' => 'E','Ẻ' => 'E','Ẽ' => 'E','Ẹ' => 'E',
            'Ê' => 'E','Ế' => 'E','Ề' => 'E','Ể' => 'E','Ễ' => 'E','Ệ' => 'E',
            'í' => 'i','ì' => 'i','ỉ' => 'i','ĩ' => 'i','ị' => 'i',
            'Í' => 'I','Ì' => 'I','Ỉ' => 'I','Ĩ' => 'I','Ị' => 'I',
            'ó' => 'o','ò' => 'o','ỏ' => 'o','õ' => 'o','ọ' => 'o',
            'ô' => 'o','ố' => 'o','ồ' => 'o','ổ' => 'o','ỗ' => 'o','ộ' => 'o',
            'ơ' => 'o','ớ' => 'o','ờ' => 'o','ở' => 'o','ỡ' => 'o','ợ' => 'o',
            'Ó' => 'O','Ò' => 'O','Ỏ' => 'O','Õ' => 'O','Ọ' => 'O',
            'Ô' => 'O','Ố' => 'O','Ồ' => 'O','Ổ' => 'O','Ỗ' => 'O','Ộ' => 'O',
            'Ơ' => 'O','Ớ' => 'O','Ờ' => 'O','Ở' => 'O','Ỡ' => 'O','Ợ' => 'O',
            'ú' => 'u','ù' => 'u','ủ' => 'u','ũ' => 'u','ụ' => 'u',
            'ư' => 'u','ứ' => 'u','ừ' => 'u','ử' => 'u','ữ' => 'u','ự' => 'u',
            'Ú' => 'U','Ù' => 'U','Ủ' => 'U','Ũ' => 'U','Ụ' => 'U',
            'Ư' => 'U','Ứ' => 'U','Ừ' => 'U','Ử' => 'U','Ữ' => 'U','Ự' => 'U',
            'ý' => 'y','ỳ' => 'y','ỷ' => 'y','ỹ' => 'y','ỵ' => 'y',
            'Ý' => 'Y','Ỳ' => 'Y','Ỷ' => 'Y','Ỹ' => 'Y','Ỵ' => 'Y',
        );
        $strtr = strtr($girl_name, $replace);
        $strtoupper = strtoupper($strtr);
        $trim = trim($strtoupper);
        $folders = \App\Models\Girl::select('folder')->where('girl_id', 'like', $girl_id)->get();
        foreach ($folders as $folder) {
            
        }
        $extension = $file_avatar->extension();
        $file_avatar_name = $trim . time() . '.' . $extension;
        $file_avatar->move(public_path('photos') . '/' . $folder->folder, $file_avatar_name);
        $update_girl = \App\Models\Girl::where('girl_id', '=', $girl_id)
                                        ->update(array(
                                            'girl_name' => $girl_name,
                                            'girl_info' => $girl_info,
                                            'girl_avatar' => $file_avatar_name,
                                            'origin_id' => $origin_id,
                                            'updated_at' => $updated_at,
                                        ));
        $photos = new Photo();
        $photos->folder = $folder->folder;
        $photos->name = $file_avatar_name;
        $photos->girl_id = $girl_id;
        $photos->save();
        session()->put('message', 'Update successfully');
        return redirect('girl');
    }
    // end girl

    public function origin(Request $request) {
        if($request->has('name')) {
            $request->validate([
                'name' => 'required|min:2',
            ]);
            $data = \App\Models\Origin::where('origin_name', 'like', '%'.$request->name.'%')
                                        ->orderBy('origin_id', 'desc')
                                        ->get();
        } else {
            $data = \App\Models\Origin::all();
        }
        $check = $data->count();
        if($check == 0) {
            session()->put('message', 'Không tìm thấy kết quả');
        } 
        
        return view(view: 'Admin\Origin', data: compact('data'));
    }
    public function add_origin() {
        return view(view: 'Admin\AddOrigin');
    }
    public function add_origin_process(Request $request) {
        $request->validate([
            'origin_name' => 'required|min:4',
        ]);
        $origin = new Origin();
        $origin->origin_name = $request->origin_name;
        $origin->created_at = date("y-m-d");
        $origin->updated_at = date("y-m-d");
        $check = \App\Models\Origin::where('origin_name', 'like', $origin->origin_name)->get()->count();
        if($check == 0) {
            $origin->save();
            if($origin) {
                session()->put('message', 'Thêm thành công');
            } else {
                session()->put('message', 'Thêm không thành công');
            }
        } else {
            session()->put('message', 'Quốc gia đã tồn tại');
        }
        return view(view: 'Admin\AddOrigin');
    }
    public function delete_origin(Request $request) {
        $delete = \App\Models\Origin::where('origin_id', '=', $request->id)->delete();
        if($delete) {
            session()->put('message', 'Xóa thành công');
        } else {
            session()->put('message', 'Xóa không thành công');
        }
        return redirect('origin');
    }
    public function edit_origin(Request $request) {
        $data = \App\Models\Origin::where('origin_id', '=', $request->id)->get();
        return view(view: 'Admin\EditOrigin', data: compact('data'));
    }
    public function edit_origin_process(Request $request) {
        $origin_id = $request->origin_id;
        $origin_name = $request->origin_name;
        $updated_at = date("d-m-y");
        $update = \App\Models\Origin::where('origin_id', '=', $origin_id)
                                        ->update(array('origin_name' => $origin_name, 'updated_at' => $updated_at));
        if($update) {
            session()->put('message', 'Update thành công');
        } else {
            session()->put('message', 'Update không thành công');
        }
        return redirect('origin');
    }
    // end Origin
    public function level(Request $request) {
        $levels = \App\Models\Level::all();
        return view(view: 'Admin\Level', data: compact('levels'));
    }
    public function add_level() {
        return view(view: 'Admin\AddLevel');
    }
    public function add_level_process(Request $request) {
        $request->validate([
            'level_name' => 'required|min:2',
        ]);
        $levels = new Level();
        $levels->level_name = $request->level_name;
        $levels->save();
        if($levels) {
            session()->put('message', 'Thêm thành công');
            return redirect('level');
        } else {
            session()->put('message', 'Thêm không thành công');
            return redirect('add_level');
        }
    }
    public function edit_level(Request $request) {
        $level_id = $request->id;
        $levels = \App\models\Level::where('level_id', '=', $level_id)->get();
        return view(view: 'Admin\EditLevel', data: compact('levels'));
    }
    public function edit_level_process(Request $request) {
        $level_id = $request->level_id;
        $level_name = $request->level_name;
        $update = \App\Models\Level::where('level_id', '=', $level_id)
                                        ->update(array('level_name' => $level_name));
        if($update) {
            session()->put('message', 'Update thành công');
        } else {
            session()->put('message', 'Update không thành công');
        }
        return redirect('level');
    }
}
?>
