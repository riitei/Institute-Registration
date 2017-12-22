<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/20
 * Time: 16:08
 */
include $_SERVER['DOCUMENT_ROOT'].'DBconnect.php';

$delDepartmentID =
    "DELETE FROM `Institute_Registration`.`ntcu_department`
WHERE department_id = '".$_POST['deleteDepartmentID']."';";
//echo $delDepartmentID;
try {
    DBconnect::connect()->exec($delDepartmentID);
    echo "刪除科系成功";
}catch (PDOException $exception){
    echo "刪除科系失敗";
}