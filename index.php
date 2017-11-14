<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>台中教育大學＿碩博班報名系統</title>
</head>

<body>

<div class="form">
    <form action="index.php" method="post" id="ir" enctype="multipart/form-data">


        <span style="color: red">＊</span> 姓名：
        <input type="text" name="name" size="10"><br>
        <span style="color: red">＊</span> 年齡：
        <input type="number" name="age" min="20" max="100" step="1" value="22"><br>

        <span style="color: red">＊</span> 大頭照：
        <input type="file" id="file" name="file"><br>

        <span style="color: red">＊</span> 畢業學校和系所：
        <input type="text" name="school" size="20" placeholder="真理大學"><br>
        <span style="color: red">＊</span> 畢業學校和系所：
        <input type="text" name="department" size="20" placeholder="資訊管理"><br>
        <span style="color: red">＊</span> 電話：
        <input type="number" name="tel" size="10" placeholder="輸入數字"><br>
        <span style="color: red">＊</span> 地址：
        <input type="text" name="address" size="60"><br><br>

        <span style="color: red">＊</span> 報考科系：
        <select name="department">
            <option value="資工系">資工系</option>
            <option value="音樂系">音樂系</option>
            <option value="美術系">美術系</option>
            <option value="教育系" selected="true">教育系</option>
        </select>
        <input type="radio" name="class" value="碩士班" checked="true">碩士班
        <input type="radio" name="class" value="博士班">博士班<br>
        <input type="submit" value="送出">
        <input type="reset" value="清除">

    </form>
</div>
<?php
echo 'test <br>';
echo dirname(__FILE__);

echo $_POST['department'] . "<br>";


if ($_FILES["thum"]["error"] > 0) {

    echo "Error:" . $_FILES["file"]["error"];
    //　echo "Error: " . $_FILES["file"]["error"];
} else {
    echo "檔案名稱: " . $_FILES["file"]["name"] . "<br>";
    echo "檔案類型: " . $_FILES["file"]["type"] . "<br>";
    echo "檔案大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "暫存名稱: " . $_FILES["file"]["tmp_name"].'<br>';


    if (file_exists( dirname(__FILE__).'/photo/'. $_FILES['file']['name'])) {
        echo "檔案已經存在，請勿重覆上傳相同檔案";
    } else {
        echo '搬移檔案';
        echo 'in';
        move_uploaded_file($_FILES['file']['tmp_name'],
            dirname(__FILE__).'/photo/' . $_FILES['file']['name']);
        echo 'out';
    }
}



?>

</body>
</html>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none !important;
        margin: 0;
    }

    .form {
        margin-left: 200px;
        margin-top: 100px;
    }
</style>
