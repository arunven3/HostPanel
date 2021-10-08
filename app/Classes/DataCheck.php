<?php


namespace App\Classes;
class DataCheck
{
    public  static function check($data,$action){
        if ($action==="escape"){
            return self::escape_input($data);
        }
    }
    private  static function escape_input($data) {
        $data = strip_tags($data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}