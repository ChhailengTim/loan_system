<?php

namespace App\Helpers;

use Exception;
use Carbon\Carbon;
use Log;
use DB;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;

class StringHelper
{
    public static function public_path($path = null)
    {
        return rtrim(app()->basePath('public' . DIRECTORY_SEPARATOR . $path), DIRECTORY_SEPARATOR);
    }
    public static function makeDirectory($path)
    {
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
    }

    //save to file
    public static function saveImage($logo, $imgPath, $imageName, $size = 200)
    {
        $imageName = empty($imageName) ? uniqid('', true) . '.png' : $imageName;
        if (!empty($logo)) {
            $path = self::public_path($imgPath);
            if (!is_dir($path)) {
                self::makeDirectory($path);
            }

            try {
                $manager = new ImageManager();
                $manager->make($logo)->widen($size)->save($path . DIRECTORY_SEPARATOR . $imageName);
            } catch (Exception $ex) {
                DB::rollBack();
                response()->json(['success' => 0, 'message' => 'Error while processing image.'], 500);
            }
        }
        return $imageName;
    }
    public static function saveThumbnailImage($logo, $imgPath, $imageName)
    {
        $imageName = empty($imageName) ? uniqid('', true) . '.png' : $imageName;
        if (!empty($logo)) {
            $path = self::public_path($imgPath);
            if (!is_dir($path)) {
                self::makeDirectory($path);
            }
            try {
                $manager = new ImageManager();
                $manager->make($logo)->resize(50, 50)->save($imgPath . DIRECTORY_SEPARATOR . $imageName);
            } catch (Exception $ex) {
                response()->json(['success' => 0, 'message' => 'Error while processing image.'], 500);
            }
        }
        return $imageName;
    }


    //upload from source
    public static function uploadImage($image, $imagePath, $thumbnailPath)
    {
        $imageName = uniqid('', true) . '.png';
        self::saveImage($image, $imagePath, $imageName);
        self::saveThumbnailImage($image, $thumbnailPath, $imageName);
        return $imageName;
    }

    public static function editImage($image, $old_image, $imagePath, $thumbnailPath)
    {
        $newImage = null;
        if ($image == $old_image) return $image;
        if (empty($image)) return null;

        // update image
        if (!empty($image)) {
            $newImage = self::uploadImage($image, $imagePath, $thumbnailPath);
            if (!empty($old_image)) {
                self::deleteImage($old_image, $imagePath, $thumbnailPath);
            }
            return $newImage;
        }

        return null;
    }

    public static function deleteImage($image, $imagePath, $thumbnailPath)
    {
        if (!empty($image)) {
            File::delete($imagePath . '/' . $image);
            File::delete($thumbnailPath . '/' . $image);
        }
    }

}
