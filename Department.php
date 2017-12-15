<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 16:07
 */
include 'DBconnect.php';
class Department
{
    private $department = "SELECT  concat(department_name,'_',department_degree,'(',department_class,')')
                  as department FROM  Institute_Registration.department;";

    public function department_search(){
        $department =  DBconnect::connect()->query($this->department);
       // echo 'Department';
        return $department;
//        foreach ($department as $value){
//            echo $value['department'].'<br>';
//        }
    }

}