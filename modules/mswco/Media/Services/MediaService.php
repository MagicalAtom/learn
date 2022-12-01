<?php

namespace mswco\Media\Services;

use mswco\Media\Models\Media;

class MediaService
{


    public static function upload($value){
            $ext = strtolower($value->getClientOriginalExtension());

            switch ($ext){
                case 'png':
                case 'jpg':
                case 'jpeg':
                $img =     ImageUploadService::upload($value);
                Media::create([
                    'user_id' => auth()->id(),
                    'files' => $img,
                    'type' => 'image',
                    'filename' => $value->getClientOriginalName(),
                ]);
return $img;
                   break;
                case "mp4":
                case "vdi":
                    VideoUploadService::upload($value);
                    break;
            }




    }

}
