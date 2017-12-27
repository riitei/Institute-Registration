<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/26
 * Time: 19:47
 */

// 讀 json 檔案寫入資料庫


include $_SERVER['DOCUMENT_ROOT'] . 'DBconnect.php';

//$json = include $_SERVER['DOCUMENT_ROOT'] . 'file/AllData.json';
$json_file = $_SERVER['DOCUMENT_ROOT'] . 'file/AllData.json';
//$json_file = $_SERVER['DOCUMENT_ROOT'] . 'file/test.json';

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

$address_data = json_decode($json, true);
// echo $address_data->{'CityName'};
//echo $address_data->{'AreaList'};

//echo var_dump($address_data);


foreach ($address_data as $value) {


    foreach ($value['AreaList'] as $AreaList) {

        echo '<span style="color: red">' . $value['CityName'] . '</span><br>';
        echo $value['CityEngName'] . '<br>';

        echo '<span style="color: blue">' . $AreaList['ZipCode'] . '</span><br>';
        echo '<span style="color: blueviolet;">' . $AreaList['AreaName'] . '</span><br>';
        echo $AreaList['AreaEngName'] . '<br>';


        $insert = "
INSERT INTO `Institute_Registration`.`address`
(
`CityName`,
`CityEngName`,
`ZipCode`,
`AreaName`,
`AreaEngName`
)
VALUES
(
'" . $value['CityName'] . "',
'" . $value['CityEngName'] . "',
'" . $AreaList['ZipCode'] . "',
'" . $AreaList['AreaName'] . "',
'" . $AreaList['AreaEngName'] . "');
";
DBconnect::connect()->exec($insert);
echo 'ok<br><br>';

//        foreach ($AreaList['RoadList'] as $RoadList) {
//
////
////            echo $RoadList['RoadName'] . '<br>';
////            echo $RoadList['RoadEngName'] . '<br>';
//
//
//            DBconnect::connect()->exec($insert);
//
//echo 'ok<br><br>';
//        }


    }
}
/*
echo count( $address_data->{'AreaList'}).'<br>';
foreach ( $address_data->{'AreaList'} as $key=>$value){
    echo $value->{'ZipCode'}.'<br>';

}
*/


//echo count($address_data); // 1
//echo $address_data;
// Catchable fatal error: Object of class stdClass could not be converted to string in
// /Users/riitei/CODE/PHP/Institute_Registration/json.php on line 31
