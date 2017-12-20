<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/20
 * Time: 16:08
 */
include $_SERVER['DOCUMENT_ROOT'] . 'DBconnect.php';


// $addDepartment = "";
// 新增科系
//


$department_id_search = "SELECT * FROM Institute_Registration.ntcu_department
                              where department_name = '" . $_POST['addName'] . "'and 
                                    department_degree='" . $_POST['addDegree'] . "'and 
                                    department_class= '" . $_POST['addClass'] . "';";

//    $department_id_search="SELECT * FROM Institute_Registration.ntcu_department where department_name = '教育資訊與測驗統計研究所'and department_degree='博士'and department_class= '日';";
//
$department_id = DBconnect::connect()->query($department_id_search)->fetch();
$department_id = $department_id['department_id'];
if ($department_id === null) {
    $insertDepartment = "
                INSERT INTO `Institute_Registration`.`ntcu_department`
                            (`department_name`,
                            `department_degree`,
                            `department_class`)
                VALUES
                      ('" . $_POST['addName'] . "',
                      '" . $_POST['addDegree'] . "',
                      '" . $_POST['addClass'] . "');";


    try {
     //   echo $insertDepartment;
        DBconnect::connect()->exec($insertDepartment);
        echo "新增科系成功";
    } catch (PDOException $exception) {
        echo "新增科系失敗";
    }
} else {
    echo "此科系名稱已存在";
}



