<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/26
 * Time: 19:47
 */

//$json = include $_SERVER['DOCUMENT_ROOT'] . 'file/AllData.json';
//$json_file = $_SERVER['DOCUMENT_ROOT'] . 'file/AllData.json';
$json_file =  $_SERVER['DOCUMENT_ROOT'] . 'file/test.json';

$json = "";
if (file_exists($json_file)) {
    $file = fopen($json_file, "r");
    if ($file != null) {
        while (!feof($file)) {


            $json .= fgetc($file);

        }
        //echo $str;
        fclose($file);
    }


}

echo 'start<br><br>';
//echo $json_file;
$address_data = json_decode($json_file);

 echo $address_data[0][1].'<br>';
 //echo sizeof($address_data);
//foreach ($address_data['CityName'] as $key=>$value){
//    echo $value[$key];
//}