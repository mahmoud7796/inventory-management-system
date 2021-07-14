<?php

namespace App\Traits;
use Illuminate\Support\Str;
use Image;
use PhpParser\Builder\Trait_;

Trait General
{
    function SaveImage($image, $path,$w,$t){
        $pos= strpos($image,';');
        $cutStr = substr($image,0,$pos);
        $ext = explode('/',$cutStr)[1];
        $imageName = time().".".$ext;
        $img = Image::make($image)->resize($w,$t);
        $img_url = public_path().$path.$imageName;
        $img-> save($img_url);
        return $path.$imageName;
    }

    function SaveImageResize($image, $path,$w,$h){
        Image::make($image)->resize($w,$h)->save($path.$image-> hashName());
        return $path.$image-> hashName();
    }

    function DeleteImage($img){
        $img_url =  public_path().$img;
        return unlink($img_url);
    }
}
