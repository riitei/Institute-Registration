<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/28
 * Time: 21:42
 */
include $_SERVER['DOCUMENT_ROOT'] . 'DBconnect.php';

$zip_code_search = "
SELECT ZipCode 
FROM Institute_Registration.address 
where AreaName='".$_POST['area_name']."';";
// 尋找縣市的地區和郵遞區號
$area_name_data = DBconnect::connect()->query($zip_code_search)->fetch();
// echo $zip_code_search;
echo $area_name_data['ZipCode'];// 回傳 Ajax
