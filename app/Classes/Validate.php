<?php


namespace App\Classes;
class Validate
{
    public static function textlength($text){
        if (isset($text)){
            $len=strlen($text);
            if($len < 21)return true;
            elseif ($len >21 ) return false;
        }
    }
    public static function password($password){
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        $weakpass="Password";
        if(!$uppercase) $weakpass .= " Have atleast one UpperCase , ";
        if(!$lowercase) $weakpass .= "  Have atleast one LowerCase , ";
        if(!$number) $weakpass .= "  Have atleast one Number , ";
        if(!$specialChars) $weakpass .= "  Have atleast one Symbol , ";
        if(strlen($password) < 10) $weakpass .= "Password should be at least 10 characters in length ";

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 10) {
            return $weakpass;
        }else{
            return "success";
        }
    }
}