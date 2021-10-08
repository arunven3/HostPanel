<?php


namespace App\Classes;


class DataBase
{
    public static function connect(){ // Change Database Connections
        $host = '217.182.175.206'; // Change Database host in DB.Host
        $user = 'demohosti_arun'; // Change Database user in DB.User
        $pass = 'arunvenkatesan';// Change password host in DB.Password
        $db = 'demohosti_hostpanel';// Change Database Name in DB.Name
        return mysqli_connect($host,$user,$pass,$db);
    }
}