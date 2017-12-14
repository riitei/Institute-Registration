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
        <table border="0">
            <tr>
                <td>
                    <span style="color: red">＊</span> 姓名：
                </td>
                <td>
                    <input type="text" id="name" name="name" size="20">
                </td>
            </tr>
            <tr>
                <td>
                    <span>&nbsp;&nbsp;&nbsp;</span> 大頭照：
                </td>
                <td>
                    <input type="file" id="file" name="file">
                </td>
            </tr>
            <tr>
                <td>
                    <span style="color: red">＊</span> 性別：
                </td>
                <td>
                    <input type="radio" name="gender" value="male" checked="checked">男
                    <input type="radio" name="gender" value="female">女
                </td>
            </tr>
            <tr>
                <td>
                    <span style="color: red">＊</span> 出生：
                </td>
                <td>
                    <input type="date" name="birthday" value="1997-01-01" min="1900-01-01" max="9999/12/31">
                </td>
            </tr>
            <tr>
                <td>
                    <span style="color: red">＊</span> 身分證：
                </td>
                <td>
                    <input type="text" name="id" size="20">
                </td>
            </tr>
            <tr>
                <td>
                    <span>&nbsp;&nbsp;&nbsp;</span> 電話：
                </td>
                <td>
                    <input type="number" name="phone" size="20" placeholder="輸入數字">
                </td>
            </tr>
            <tr>
                <td>
                    <span>&nbsp;&nbsp;&nbsp;</span> 地址：
                </td>
                <td>
                    <input type="text" name="address" size="60">
                </td>
            </tr>
            <tr>
                <td>
                    <span>&nbsp;&nbsp;&nbsp;</span> Email 位址:
                </td>
                <td>
                    <input type="email" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    <span style="color: red">＊</span> 畢業學校和系所：
                </td>
                <td>
                    <input type="text" name="school" size="20" placeholder="真理大學">
                </td>
            </tr>
            <tr>
                <td>
                    <span style="color: red">＊</span> 畢業學校和系所：
                </td>
                <td>
                    <input type="text" name="department" size="20" placeholder="資訊管理"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="color: red">＊</span> 報考科系：

                </td>
                <td>
                    <select name="department">
                        <option value="資工系">資工系</option>
                        <option value="音樂系">音樂系</option>
                        <option value="美術系">美術系</option>
                        <option value="教育系" selected="true">教育系</option>
                    </select><br><br>
                </td>
            </tr>
        </table>
        <input type="submit" value="送出" OnClick="CheckInput();">
        <input type="reset" value="清除">

    </form>
</div>


<script>


    function CheckInput() {
        $error = 0;
        if (!checkLength(document.Form.name.value, 2)) {
            window.alert("姓名資料錯誤!");
            $error++;
        }

        if (!checkID(document.Form.id.value)) {
            window.alert("身份證字號錯誤!");
            $error++;
        }
        if (!checkEmail(document.Form.email.value)) {
            window.alert("Email 位址資料錯誤!");
            $error++
        }

        if ($error == 0) {
            if (window.confirm("確定提交表單嗎?")) {
                document.getElementsByName("Form").submit();
            }
        }
    }

    function checkLength(dat, len) {
        return (dat.length >= len);
    }

    function checkEmail(id) {
        return (checkLength(id, 5) && id.indexOf("@") != -1);
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
        margin-left: 250px;
        margin-top: 100px;
    }
</style>
