<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/18
 * Time: 14:41
 */
include "DBconnect.php";
class InstituteRegistration
{

    public function insertInstituteRegistration()
    {
        echo 'InstituteRegistration <br><br>';

        $path = '';
        if ($_FILES["file"]["error"] > 0) {
//            echo "Error: " . $_FILES["file"]["error"];
        } else {
//            echo "檔案名稱: " . $_FILES["file"]["name"] . "<br>";
//            echo "檔案類型: " . $_FILES["file"]["type"] . "<br>";
//            echo "檔案大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//            echo "暫存名稱: " . $_FILES["file"]["tmp_name"] . '<br>';


            if (file_exists(dirname(__FILE__) . '/photo/' . $_FILES['file']['name'])) {
//                echo "檔案已經存在，請勿重覆上傳相同檔案";
            } else {
                echo '搬移檔案';
                move_uploaded_file($_FILES['file']['tmp_name'],
                    dirname(__FILE__) . '/photo/' . $_FILES['file']['name']);

                $path = dirname(__FILE__) . '/photo/' . time().'_'.$_FILES['file']['name'];

                echo "path " . $path . '<br>';
            }
        }


        $insertCandldates =
            "INSERT INTO `Institute_Registration`.`candidates_information`
            (`candidates_information_id`,
            `candidates_information_name`,
            `candidates_information_photo_path`,
            `candidates_information_gender`,
            `candidates_information_birthday`,
            `candidates_information_address`,
            `candidates_information_phone`,
            `candidates_information_email`
            )
                    VALUES
                    ('" . $_POST['id'] . "',
                    '" . $_POST['name'] . "',
                    '" . $path . "',
                    '" . $_POST['gender'] . "',
                    '" . $_POST['birthday'] . "',
                    '" . $_POST['address'] . "',
                    '" . $_POST['phone'] . "',
                    '" . $_POST['email'] . "');";

//        echo '<br><br><br>' . $insertCandldates . '<br><br><br>';
        try{
            DBconnect::connect()->exec($insertCandldates);
            return "寫入成功";
        }catch (PDOException $e){
            return "寫入失敗";

        }

        $insertinsertInstituteRegistration = "";

        //'" . $_POST['school'] . "',
//        echo 'school_department:__' . $_POST['school_department'] . '<br>';
//        echo 'ntcu_department:__' . $_POST['ntcu_department'] . '<br>';


    }
}