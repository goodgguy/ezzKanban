<?php


class fileService
{
    private static $target_dir = "public/img/";
    private static  $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
    private static $file_type;
    private static  $target_file;
    private static $file_key;


    public static function copyFile($file)
    {
        if (move_uploaded_file($file[self::$file_key]["tmp_name"], self::$target_file)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validateFile($file, $email)
    {
        $user = strstr($email, '@', true);
        self::$file_key = array_key_first($file);
        self::$file_type = pathinfo($file[self::$file_key]["name"], PATHINFO_EXTENSION);
        self::$target_file = self::$target_dir . $user . '.' . self::$file_type;
        $allowUpload = true;
        $imageFileType = pathinfo(self::$target_file, PATHINFO_EXTENSION);
        $maxfilesize = 80000000;


        if (!isset($file[self::$file_key])) {
            return false;
        }
        if ($file[self::$file_key]['error'] != 0) {
            return false;
        }
        $check = getimagesize($file[self::$file_key]["tmp_name"]);
        if ($check !== false) {
            $allowUpload = true;
        } else {
            $allowUpload = false;
        }
        if (file_exists(self::$target_file)) {
            $allowUpload = false;
        }
        if ($file[self::$file_key]["size"] > $maxfilesize) {
            $allowUpload = false;
        }
        if (!in_array($imageFileType, self::$allowtypes)) {
            $allowUpload = false;
        }
        return $allowUpload;
    }
}
