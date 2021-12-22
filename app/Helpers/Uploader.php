<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Uploader
{

    public static function uploadMultiple($files)
    {
        $images = [];
        foreach($files as $file){
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;

            $uploade_path = public_path();
            $image_url = $image_full_name;
            $file->move($uploade_path,$image_full_name);
            $images[] = $image_url;
        }
        return $images;
    }

}
