<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/18
 * Time: 13:31
 */
include_once "InstituteRegistration.php";
$write = new InstituteRegistration();
$message = $write->insertInstituteRegistration();
if ($message != '') {
    echo '<script>alert("' . $message . '");</script>';
}
?>
<script>
     history.back();
</script>

