<?php 

namespace App\Services;

use App\Models\Image;

class ImageService
{

    public static function getSliders($date = false){
        $gets = [
            'user_id' , 'path' , 'alt' 
        ];
        if($date) $gets[] ='created_at'; 

        return Image::where('slider' , 1)->select($gets)->get();
    }

    public static function insertImage($user_id , $base_64){
        $image = base64_decode(preg_replace('@^[^\,]*base64,@' , '' , $base_64));
        $path = $user_id . '/' . \Str::random(12) . '.png';
        if(!is_dir(public_path('/images/' . $user_id))){
            mkdir(public_path('/images/' . $user_id));
        }
        @file_put_contents(public_path('/images/'.$path), $image);
        Image::create([
            'user_id' => $user_id,
            'path' => $path,
        ]);
    }

}