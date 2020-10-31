<?php


class UTIL
{
    public static function copyFile($file)
    {
        $file_key = array_key_first($file);
        $target_dir    = "public/img/";
        $target_file   = $target_dir . basename($file[$file_key]["name"]);
        $allowUpload   = true;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $maxfilesize   = 800000;
        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
        if (!isset($file[$file_key])) {
            echo "Dữ liệu không đúng cấu trúc";
            die;
        }
        if ($file[$file_key]['error'] != 0) {
            echo "Dữ liệu upload bị lỗi";
            die;
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
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
