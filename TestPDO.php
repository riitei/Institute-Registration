<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 00:15
 */

// include_once "autoload.php";
include 'DBconnect.php';
class testPDO
{

//    private $db_host = "localhost";
//    private $db_user = "admin";
//    private $db_pass = "admin";
//    private $db_name = "Institute_Registration";
    private $department = "SELECT  concat(department_name,'_',department_degree,'(',department_class,')')
                  as department FROM  Institute_Registration.department;";

//    public function dbconnect()
//    {
//        try {
//            $dbconnect = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name;
//            $PDO = new PDO($dbconnect, $this->db_user, $this->db_pass);
//            echo 'ok';
//            $department_search=$PDO->query($this->department);
//            foreach ($department_search as $value){
//                echo $value['department'].'<br>';
//            }
//
//        } catch (PDOException $e) {
//            echo "error";
//        }
//    }

    public function query_department(){
        $department =  DBconnect::connect()->query($this->department);
        foreach ($department as $value){
            echo $value['department'].'<br>';
        }
    }

    public function test()
    {
        echo 'yan';
    }
}