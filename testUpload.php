<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/15
 * Time: 15:33
 */
echo 'test <br>';
echo '性別:__' . $_POST['gender'];
echo '<br>';
echo dirname(__FILE__);

echo $_POST['department'] . "<br>";


if ($_FILES["thum"]["error"] > 0) {

    echo "Error:" . $_FILES["file"]["error"];
    //　echo "Error: " . $_FILES["file"]["error"];
} else {
    echo "檔案名稱: " . $_FILES["file"]["name"] . "<br>";
    echo "檔案類型: " . $_FILES["file"]["type"] . "<br>";
    echo "檔案大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "暫存名稱: " . $_FILES["file"]["tmp_name"] . '<br>';


    if (file_exists(dirname(__FILE__) . '/photo/' . $_FILES['file']['name'])) {
        echo "檔案已經存在，請勿重覆上傳相同檔案";
    } else {
        echo '搬移檔案';
        echo 'in';
        move_uploaded_file($_FILES['file']['tmp_name'],
            dirname(__FILE__) . '/photo/' . $_FILES['file']['name']);
        echo 'out';
    }
}