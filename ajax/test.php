<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/28
 * Time: 14:11
 */
include $_SERVER['DOCUMENT_ROOT'] . 'DBconnect.php';

$area_name_search = "
SELECT ZipCode,AreaName 
FROM Institute_Registration.address 
where CityName='臺北市' order by id asc;";
// 尋找縣市的地區和郵遞區號
$area_name_data = DBconnect::connect()->query($area_name_search);

$area_name = array();
foreach ($area_name_data as $value){
//    echo $value['ZipCode'].' '.$value['AreaName'].'<br>';
    $area_name[$value['ZipCode']]=$value['AreaName'];//轉成array存放
}
echo json_encode($area_name);// 回傳 Ajax