<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 00:15
 */
//include_once "autoload.php";
//include 'Department.php';
include 'School.php';
//$department = new Department();
$school = new School();
//$department= $department->department_search();
echo 'ntcu <br>';

foreach ($school->school_search() as $value){
    echo $value['school_name'].'<br>';
}


echo '<br><br>';
//
//foreach ( $department->department_search() as $key =>$value) {
//     echo $key.'_'.$value['department'] . '<br>';
//}