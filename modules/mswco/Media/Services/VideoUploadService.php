<?php

namespace mswco\Media\Services;

class VideoUploadService
{

    public static function upload($value)
    {

        $add = md5(uniqid() . time());
        $ext = $value->getClientOriginalExtension();
        $dir = 'app\private';
        $value->move(storage_path($dir), $add .  "."  . $ext);
        $path = $dir . "\\" . $add . "\\" . "." .  $ext;
        return $add . "." . $ext;
    }
}
