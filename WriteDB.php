<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/18
 * Time: 13:31
 */
include_once "InstituteRegistration.php";
$write  = new InstituteRegistration();
$message = $write->insertInstituteRegistration();

echo '<script>alert("'.$write->insertInstituteRegistration().'");</script>';
?>
<script>
    //console.log("<?//=$write->insertInstituteRegistration()?>//");
    //alert（'<?=htmlspecialchars($message,ENT_HTML5)?>'）；
    // history.back();
</script>

