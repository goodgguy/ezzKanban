<?php

class fillterdataService
{
    public static function encodeDataArray($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars($data[$key]);
        }
        return $data;
    }
}