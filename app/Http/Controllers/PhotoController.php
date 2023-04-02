<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Photo;

class PhotoController extends Controller
{
    public function photo() {
        $photos = \App\Models\Photo::join('girls', 'girls.girl_id', '=', 'photos.girl_id')
                                    ->select('girl_name', 'photo_id', 'photos.folder', 'name')
                                    ->orderBy('photo_id', 'desc')
                                    ->get();
        return view(view: 'Admin\Photo', data: compact('photos'));
    }
    public function add_photo (Request $request) {
        $girl_id = $request->girl_id;
        $girls = \App\Models\Girl::select('girl_id', 'girl_name', 'folder')->where('girl_id', '=', $girl_id)->get();
        return view(view: 'Admin\AddPhoto', data: compact('girls'));
    }
    public function add_photo_process(Request $request) {
        $girl_id = $request->girl_id;
        $girl_name = $request->girl_name;
        $photos = $request->photo;
        $folder = $request->folder;
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
        foreach ($photos as $photo) {
            $extension = $photo->extension();
            $photo_name = $trim . microtime() . '.' . $extension;
            $photo->move(public_path('photos') . '/' . $folder, $photo_name);
            $creat = new Photo();
            $creat->name = $photo_name;
            $creat->girl_id = $girl_id;
            $creat->folder = $folder;
            $creat->save();
        }
        return redirect('photo');
    }
    public function delete_photo(Request $request) {
        $photo_id = $request->id;
        $photos = \App\Models\photo::where('photo_id', '=', $photo_id)->get();
        foreach($photos as $photo) {
            unlink(public_path() . $photo->name);
            $delete = \App\Models\photo::where('photo_id', '=', $photo->photo_id)->delete();
        }
        return back();
    }
}
