<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 00:15
 */
//include_once "autoload.php";
include "DBconnect.php";
include 'Department.php';
include 'School.php';
$school = new School();
echo time();
//
//$ntcu_department = new Department();
//$ntcu_department->department_search();
//
//foreach ($ntcu_department->department_search() as $value) {
//    echo $value['department_id'].' '.$value['department_name'] . '<br>';
//    echo "  <option value=" . $value['department_id'] . ">" . $value['department_name'] . "</option>";
//}

//
//echo 'ntcu <br>';
//
//foreach ($school->school_search() as $value){
//    echo $value['school_name'].'<br>';
//}


//$school_department = "SELECT school_department FROM Institute_Registration.school where school_name='國立高雄師範大學';";
//$departmen = DBconnect::connect()->query($school_department);
//
//$test = array();
//
//foreach ($departmen as $key => $value) {
//    //echo $value['school_department'].'<br>';
//    $test[$key]=$value['school_department'];
//}
//
//foreach ($test as $value) {
//    echo $value.'<br>';
//}


//
//foreach ( $department->department_search() as $key =>$value) {
//     echo $key.'_'.$value['department'] . '<br>';
//}