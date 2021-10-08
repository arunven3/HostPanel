<?php
namespace App\Classes;
class Check{
    public static function token($string,$action)
    {
        if ($action === "generate") {
            return self::put($string);
        } elseif ($action === "get") {
            return self::get($string);
        }
        elseif ($action==="check"){

        }
    }
    private static function ip(){
        require_once 'IpGet.php';
        return IpGet::get_ip_address();
    }
    private static function put($string){
        require_once 'TokenGen.php';
        $ip=self::ip();
        return TokenGen::enc($string, $ip);
    }
    private static function get($encrypted_string){
        require_once 'TokenGen.php';
        $ip= self::ip();
        return TokenGen::dec($encrypted_string, $ip);
    }
    private static function check(){

    }
}
