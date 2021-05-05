<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    function currentDate() {
        date_default_timezone_set('Asia/kolkata'); # add your city to set local time zone
        $createdAt = date('Y-m-d H:i:s');
        return $createdAt;
    }


    function generateRandomString($length) {
        $characters = '0123456789-abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function randomGen($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        $num = array_slice($numbers, 0, $quantity);
        $randNo = '';
        foreach ($num as $key ) {
            $randNo .= $key;
        }
        return $randNo;
    }
    

?>

