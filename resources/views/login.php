<?php

use App\Classes\TwigLoader;
use App\Classes\Messages;
if($_SERVER['REQUEST_METHOD']==="POST")
{
    if(isset($_POST['username']) && isset($_POST['password'])){

        $user = \App\Classes\DataCheck::check($_POST['username'],'escape');
        $pass=\App\Classes\DataCheck::check($_POST['password'],'escape');
        $db = \App\Classes\DataBase::connect();
        $sql ="SELECT Domain_Name FROM useraccess WHERE User_Name ='$user' AND Password ='$pass'";
        $res =mysqli_query($db,$sql);
        if(mysqli_num_rows($res) > 0){
            $Check= new \App\Classes\Check();
            $token=$Check->token($user,'generate');
            session_destroy();
            session_start();
            $_SESSION['token']=$token;
            $_SESSION['UserName']=$user;
            $_SESSION['logedin']=1;
            while ($rows = mysqli_fetch_assoc($res)) {
                $_SESSION['DomainName']=$rows['Domain_Name'];
            }
            Messages::Success("Login Sucessfull");
            header("location: /dashboard");
            die();
        }else{
            Messages::Error("Unable To Login Please Try Again");
            header("location: /login");
            die();
        }
    }
    else{
        header("location: /login");
        clearMessages();
        die();
    }
}
elseif ($_SERVER['REQUEST_METHOD']==='GET') {
    TwigLoader::load("login.twig");
}
Messages::clearMessages();
die();
