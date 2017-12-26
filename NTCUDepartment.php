<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 16:07
 */

class NTCUDepartment
{


    public function NTCU_department_search()
    {

        $department = "SELECT department_id, concat(department_name,'_',department_degree,'(',department_class,')')
                  as department_name FROM  Institute_Registration.ntcu_department;";

        $department = DBconnect::connect()->query($department);

        return $department;

    }


    public function NTCUDepartmentAll()
    {

        $department = "SELECT * FROM Institute_Registration.ntcu_department;";

        $department = DBconnect::connect()->query($department);

        return $department;

    }



//    public function insertDepartment($department_name, $department_degree, $department_class)
//    {
//        $insertDepartment =
//            "INSERT INTO `Institute_Registration`.`ntcu_department`
//                        (`department_id`,
//                        `department_name`,
//                        `department_degree`,
//                        `department_class`)
//                    VALUES
//                        ('" . $_POST['id'] . "',
//                        '" . $_POST['department_name'] . "',
//                        '" . $_POST['department_degree'] . "',
//                        '" . $_POST['department_class'] . "');";
//    }

}