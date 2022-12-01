<?php

namespace mswco\Media\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

class ImageUploadService
{

    public  static function upload ($value)
    {
        $add = md5(uniqid() . time());
        $ext = $value->getClientOriginalExtension();
        $dir = 'app\public';
        $value->move(storage_path($dir),$add .  "."  . $ext);
         $path = $dir . "\\" . $add . "\\" . "." .  $ext;
    return $add . "." . $ext;
    }


    public static function delete($img){
        Storage::delete('public/' . $img);
    }
}
