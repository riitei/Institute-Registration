<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 16:07
 */

class Department
{


    public function department_search()
    {

        $department = "SELECT department_id, concat(department_name,'_',department_degree,'(',department_class,')')
                  as department_name FROM  Institute_Registration.department;";

        $department = DBconnect::connect()->query($department);

        return $department;

    }

}