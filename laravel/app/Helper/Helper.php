<?php

namespace App\Helper;

class Helper
{
    public static function curlPost($data)
    {
        $ch = curl_init('https://lungstory.secured-message.com/web-forms/subscription-data');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
