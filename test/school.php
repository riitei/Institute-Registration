<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/22
 * Time: 22:46
 */
include $_SERVER['DOCUMENT_ROOT'] . 'DBconnect.php';
// 更改學校 id
$search = "SELECT * FROM Institute_Registration.school;";

$result = DBconnect::connect()->query($search);
//$result = $result['school_id'];
foreach ($result as $key => $id) {

    $update = "UPDATE `Institute_Registration`.`school`
SET
`school_id` = '" . $key . "'
WHERE `school_id` = '" . $id['school_id'] . "';
";
echo $update.'<br>';
DBconnect::connect()->exec($update);
echo 'OK<br>';
}