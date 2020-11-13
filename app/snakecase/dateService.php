<?php

class dateService
{
    public static function convertDate($date)
    {
        $date = str_replace("T", " ", $date);
        return $date = $date . ":00";
    }
}