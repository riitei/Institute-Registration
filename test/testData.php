<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/22
 * Time: 21:37
 */
// mt_srand((double)microtime()*1000000);  //以時間當亂數種子

include $_SERVER['DOCUMENT_ROOT'] . 'DBconnect.php';

//$Rand = Array(); //定義為陣列
//$count = 10 ; //共產生幾筆
//for ($i = 1; $i <= $count; $i++) {
//    $randval = mt_rand(1,10); //取得範圍為1~500亂數
//    if (in_array($randval, $Rand)) { //如果已產生過迴圈重跑
//        $i--;
//    }else{
//        $Rand[] = $randval; //若無重復則 將亂數塞入陣列
//        echo $randval."<br>";
//    }
//}
//*********************************************
//
// 產生學生報考紀錄
for ($i = 0; $i < 5000; $i++) {
    $candidates_information_id = $i;
    $candidates_information_name = $i;
    $gender = mt_rand(1, 2);
    $candidates_information_gender = '';
    if ($gender === 1) {
        $candidates_information_gender = '男';
    } else {
        $candidates_information_gender = '女';
    }


    $candidates_information_birthday = mt_rand(1970, 1997) . '-' . mt_rand(1, 12) . '-' . mt_rand(1, 28);
    echo $candidates_information_id . '<br>';
    echo $candidates_information_name . '<br>';
    echo $candidates_information_gender . '<br>';
    echo $candidates_information_birthday . '<br>';
    $insertCI = "INSERT INTO `Institute_Registration`.`candidates_information`
(`candidates_information_id`,
`candidates_information_name`,
`candidates_information_gender`,
`candidates_information_birthday`)
VALUES
('" . $candidates_information_id . "',
'" . $candidates_information_name . "',
'" . $candidates_information_gender . "',
'" . $candidates_information_birthday . "');";
DBconnect::connect()->exec($insertCI);

    echo '<br>';


    $school_school_id = mt_rand(0, 1978);
    echo $school_school_id . '<br>';
    $candidates_information_candidates_information_id = $candidates_information_id;
    echo $candidates_information_candidates_information_id . '<br>';
    $ntcu_department_department_id = mt_rand(1, 35);
    echo $ntcu_department_department_id . '<br>';

    $insertIRI = "INSERT INTO `Institute_Registration`.`Institute_Registration_information`
(`school_school_id`,
`candidates_information_candidates_information_id`,
`ntcu_department_department_id`)
VALUES
('" . $school_school_id . "',
'" . $candidates_information_candidates_information_id . "',
'" . $ntcu_department_department_id . "');";
    DBconnect::connect()->exec($insertIRI);
    echo '<br><br>';

}






