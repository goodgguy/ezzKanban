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
    public static function encodeDataArrayList($data)
    {
        foreach ($data as &$item) {
            foreach ($item as $key => $value) {
                $item[$key] = htmlspecialchars($item[$key]);
            }
        }
        return $data;
    }
}
