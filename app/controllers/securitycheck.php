<?php


namespace App\controllers;

class securitycheck
{
    public static function secure(){
        if(isset($_SESSION['token'])) {
            $token = $_SESSION['token'];
            $usn = $_SESSION['UserName'];
            $Check= new \App\Classes\Check();
            if ($Check->token($token,'get')===$usn){
                return true;
            }else{
                $_SESSION['error_message']="credentials mismatch please try again";
                return false;
            }
        }else{
            $_SESSION['error_message']="Login to Continue";
            return false;
        }
    }
    public static function logot(){
        $_SESSION['token']= null;
        $_SESSION['success_message']="Logout Successful";
    }
}