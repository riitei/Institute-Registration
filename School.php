<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 17:13
 */

class School
{

    public function school_search(){
         $school = "SELECT distinct school_name FROM Institute_Registration.school;";

        $school =  DBconnect::connect()->query($school);
        return $school;
    }

    public function school_department($school_name){
        $school_department= "SELECT school_department FROM Institute_Registration.school where school_name='".$school_name."';";
        $departmen =  DBconnect::connect()->query($school_department);
        return $departmen;
    }

}