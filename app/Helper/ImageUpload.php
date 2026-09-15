<?php


namespace App\Helper;


use Illuminate\Support\Str;

class ImageUpload
{
    protected static $imageName;
    protected static $imageUrl;

    public static function imageUpload($image, $directory, $modelImage = null)
    {


        if ($image)
        {
            if (isset($modelImage))
            {
                if (file_exists($modelImage))
                {
                    unlink($modelImage);
                }
            }
            self::$imageName = Str::random(10,100).'.'.$image->getClientOriginalExtension();
            $image->move($directory, self::$imageName);
            self::$imageUrl = $directory.self::$imageName;
        }
        else {
            self::$imageUrl = $modelImage;
        }

        return self::$imageUrl;
    }
}
