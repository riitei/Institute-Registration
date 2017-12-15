<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 15:42
 */

class DBconnect
{
    private static $db_host = "localhost";
    private static $db_user = "admin";
    private static $db_pass = "admin";
    private static $db_name = "Institute_Registration";

    public static function connect(){
        try {
            $dbconnect = "mysql:host=" . DBconnect::$db_host . ";dbname=" . DBconnect::$db_name;
            $PDO = new PDO($dbconnect, DBconnect::$db_user, DBconnect::$db_pass);
            return $PDO;
        } catch (PDOException $e) {
            echo "DB 連線失敗";
        }
    }
}