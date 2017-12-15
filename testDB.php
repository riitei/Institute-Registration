<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 00:15
 */
//include_once "autoload.php";
include 'Department.php';

$department = new Department();
//$department= $department->department_search();
echo 'ntcu <br>';
foreach ( $department->department_search() as $key =>$value) {
    echo $key.'_'.$value['department'] . '<br>';
}