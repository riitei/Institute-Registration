<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 19:08
 */
include "DBconnect.php";

$school_department = "SELECT school_id,school_department 
FROM Institute_Registration.school where school_name='" . $_POST['schoolName'] . "';";
// 尋找學校科系
$departmen = DBconnect::connect()->query($school_department);
//
$arr_departmen = array();
foreach ($departmen as $value) {
    $arr_departmen[$value['school_id']] = $value['school_department'];//轉成array存放
}
echo json_encode($arr_departmen);// 回傳 Ajax
//
