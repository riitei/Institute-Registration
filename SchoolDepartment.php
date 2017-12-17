<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 19:08
 */
include "DBconnect.php";

$school_department = "SELECT school_department 
FROM Institute_Registration.school where school_name='" . $_POST['schoolName'] . "';";
// 尋找學校科系
$departmen = DBconnect::connect()->query($school_department);
//
$arr_departmen = array();
foreach ($departmen as $key => $value) {
    $arr_departmen[$key] = $value['school_department'];//轉成array存放
}
echo json_encode($arr_departmen);// 回傳 Ajax
//
