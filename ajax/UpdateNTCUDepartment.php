<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/20
 * Time: 16:08
 */
include $_SERVER['DOCUMENT_ROOT'] . 'DBconnect.php';

$updateDepartmentID =
    "UPDATE `Institute_Registration`.`ntcu_department`
SET
`department_name` = '" . $_POST['updateDepartmenName'] . "',
`department_degree` ='" . $_POST['updateDepartmenDegree'] . "',
`department_class` = '" . $_POST['updateDepartmenClass'] . "'
WHERE `department_id` = '" . $_POST['updateDepartmentID'] . "';
";

try {

    DBconnect::connect()->exec($updateDepartmentID);
    echo "更新科系成功";
} catch (PDOException $exception) {
    echo "更新科系失敗";
}