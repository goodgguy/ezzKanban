<?php


class UTIL
{
    public static function copyFile($file,$email)
    {
        $user = strstr($email, '@', true);
        $file_key = array_key_first($file);
        $file_type = pathinfo($file[$file_key]["name"], PATHINFO_EXTENSION);
        $target_dir    = "public/img/";
        $target_file   = $target_dir . $user.'.'.$file_type;
        $allowUpload   = true;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $maxfilesize   = 80000000;
        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
        if (!isset($file[$file_key])) {
            return false;
        }
        if ($file[$file_key]['error'] != 0) {
            return false;
        }
        $check = getimagesize($file[$file_key]["tmp_name"]);
        if ($check !== false) {
            $allowUpload = true;
        } else {
            $allowUpload = false;
        }
        if (file_exists($target_file)) {
            $allowUpload = false;
        }
        if ($file[$file_key]["size"] > $maxfilesize) {
            $allowUpload = false;
        }
        if (!in_array($imageFileType, $allowtypes)) {
            $allowUpload = false;
        }
        if ($allowUpload) {
            if (move_uploaded_file($file[$file_key]["tmp_name"], $target_file)) {
                return $allowUpload;
            } else {
                return $allowUpload;
            }
        } else {
            return $allowUpload;
        }
    }
}
