<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>台中教育大學＿碩博班報名系統</title>
    <script src="jquery-3.2.1.min.js"></script>
</head>

<body>

<div class="form">
    <form action="index.php" method="post" name="Form" enctype="multipart/form-data">


        <span style="color: red">＊</span> 姓名：
        <input type="text" id="Name" name="name" size="10"><br>

        <span>&nbsp;&nbsp;&nbsp;</span> 大頭照：
        <input type="file" id="file" name="file"><br>

        <span style="color: red">＊</span> 性別：
        <input type="radio" name="gender" value="male">男
        <input type="radio" name="gender" value="female">女<br>

        <span style="color: red">＊</span> 出生：
        <input type="date" name="birthday" value="2000-01-01" min="1950-01-01" max="2100/12/31">
        <br>

        <span style="color: red">＊</span> 身分證：
        <input type="text" id="ID" name="name" size="10"><br>
        <span>&nbsp;&nbsp;&nbsp;</span> 電話：
        <input type="number" name="tel" size="10" placeholder="輸入數字"><br>
        <span>&nbsp;&nbsp;&nbsp;</span> 地址：
        <input type="text" name="address" size="60"><br>


        <span>&nbsp;&nbsp;&nbsp;</span> Email 位址:
        <input type="email" name="Email">


        <br><br>

        <span style="color: red">＊</span> 畢業學校和系所：
        <input type="text" name="school" size="20" placeholder="真理大學"><br>
        <span style="color: red">＊</span> 畢業學校和系所：
        <input type="text" name="department" size="20" placeholder="資訊管理"><br>


        <span style="color: red">＊</span> 報考科系：
        <select name="department">
            <option value="資工系">資工系</option>
            <option value="音樂系">音樂系</option>
            <option value="美術系">美術系</option>
            <option value="教育系" selected="true">教育系</option>
        </select><br><br>

        <input type="submit" value="送出" OnClick="CheckInput();">
        <input type="reset" value="清除">

    </form>
</div>


<script>


    function CheckInput() {
        if (!checkLength(document.Form.Name.value, 2))
            window.alert("姓名資料錯誤!");
        if (!checkID(document.Form.ID.value))
            window.alert("身份證字號錯誤!");
        if (!checkEmail(document.Form.Email.value))
            window.alert("Email 位址資料錯誤!");
    }

    function checkLength(dat, len) {
        return (dat.length >= len);
    }

    function checkEmail(id) {
        return ( checkLength(id, 5) && id.indexOf("@") != -1 );
    }

    function checkID(id) {
        tab = "ABCDEFGHJKLMNPQRSTUVWXYZIO"
        A1 = new Array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3);
        A2 = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 5);
        Mx = new Array(9, 8, 7, 6, 5, 4, 3, 2, 1, 1);

        if (id.length != 10) return false;
        i = tab.indexOf(id.charAt(0));
        if (i == -1) return false;
        sum = A1[i] + A2[i] * 9;

        for (i = 1; i < 10; i++) {
            v = parseInt(id.charAt(i));
            if (isNaN(v)) return false;
            sum = sum + v * Mx[i];
        }
        if (sum % 10 != 0) return false;
        return true;
    }


</script>

<?php
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
