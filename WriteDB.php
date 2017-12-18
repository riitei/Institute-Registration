<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/18
 * Time: 13:31
 */
include "InstituteRegistration.php";
$write  = new InstituteRegistration();
$write->insertInstituteRegistration();
echo '<script>alert("'.$write->insertInstituteRegistration().'");</script>';
?>
<!--<script>history.back();</script>-->

