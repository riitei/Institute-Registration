<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/20
 * Time: 15:51
 */
include $_SERVER['DOCUMENT_ROOT'] . 'DBconnect.php';
//
//$age = "1976-6-7";
//echo substr($age,0,4)-1911;
//echo '<br>';
//
//echo str_pad(7,3,0,STR_PAD_LEFT);
//echo '<br>';
//
//echo date("Y")-substr("1984-11-30", 0, 4);
//echo '<br>';
//
//$today = date("Y-m-d");
//$day = "2013-02-25";
//
//echo (strtotime($today) - strtotime($day)).'<br>'; //計算相差幾秒
//// 3600=60秒*60分鍾 如果要算一天就除 86400 = 60秒*60分鐘*24小時
//echo (strtotime($today) - strtotime($day))/3600/24/365; //計算相差幾小時
//
//


$school_department = "SELECT school_id,school_department 
FROM Institute_Registration.school where school_name='國立清華大學';";
// 尋找學校科系

$departmen = DBconnect::connect()->query($scol_department);
//
//$arr_departmen = array();
foreach ($departmen as $value) {
    echo $value['school_id'] . ' ' . $value['school_department'] . '<br>';
    // $arr_departmen[$value['school_id']] = $value['school_department'];//轉成array存放
}
//echo json_encode($arr_departmen);// 回傳 Ajax
