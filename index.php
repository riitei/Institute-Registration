<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>台中教育大學＿碩博班報名系統</title>
    <script src="api/jquery-3.2.1.min.js"></script>
    <script src="index.js"></script>

    <link rel="stylesheet" type="text/css" href="index.css">
    <?php
    include 'DBconnect.php';
    include 'School.php';
    include 'Department.php';
    ?>
</head>

<body>

<div class="form">

    <form action="WriteDB.php" method="post" name="Form" enctype="multipart/form-data">
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
                    <input type="file" id="file" name="file"
                           accept="image/jpeg,image/jpg,image/gif,image/png">
<!--                    accept="image/jpeg,image/jpg,image/gif,image/png" 限制上傳檔案類型-->
                </td>
            </tr>
            <tr>
                <td>
                    <span style="color: red">＊</span> 性別：
                </td>
                <td>
                    <input type="radio" name="gender" value="男" checked="checked">男
                    <input type="radio" name="gender" value="女">女
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
                    <span>&nbsp;&nbsp;&nbsp;</span> 行動電話：
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
                    <span>&nbsp;&nbsp;&nbsp;</span> Email:
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
                    <select id="school" name="school">
                        <option value="school_null">請選擇畢業學校</option>
                        <?php
                        // 找學校名稱
                        $school = new School();
                        foreach ($school->school_search() as $value) {
                            echo $value['school_name'] . '<br>';
                            echo "  <option value=" . $value['school_name'] . ">" . $value['school_name'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="color: red">＊</span> 請選擇畢業科系：
                </td>
                <td>
                    <select id="school_department" name="school_department">
                        <option value="school_department_null">畢業科系</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="color: red">＊</span> 報考科系：

                </td>
                <td>
                    <select name="ntcu_department">
                        <option value="ntcu_department_null">請選擇報考科系</option>
                        <?php
                        // 找本校學校碩博班科系
                        $ntcu_department = new Department();
                        foreach ($ntcu_department->department_search() as $value) {
                            echo "  <option value=" . $value['department_id'] . ">" . $value['department_name'] . "</option>";
                        }
                        ?>


                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" value="送出" OnClick="CheckInput();">
        <input type="reset" value="清除">

    </form>
</div>
<?php
//echo 'test <br>';
//
//echo 'name:__' .$_POST['name'].'<br>';
//echo 'gender:__' .$_POST['gender'].'<br>';
//echo 'birthday:__' .$_POST['birthday'].'<br>';
//echo 'id:__' .$_POST['id'].'<br>';
//echo 'phone:__' .$_POST['phone'].'<br>';
//echo 'address:__' .$_POST['address'].'<br>';
//echo 'email:__' .$_POST['email'].'<br>';
//echo 'school:__' .$_POST['school'].'<br>';
//echo 'school_department:__' .$_POST['school_department'].'<br>';
//echo 'ntcu_department:__' .$_POST['ntcu_department'].'<br>';
//
//echo '<br>';
////echo dirname(__FILE__);
//
//
//
//if ($_FILES["file"]["error"] > 0) {
//    echo "Error: " . $_FILES["file"]["error"];
//} else {
//    echo "檔案名稱: " . $_FILES["file"]["name"] . "<br>";
//    echo "檔案類型: " . $_FILES["file"]["type"] . "<br>";
//    echo "檔案大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//    echo "暫存名稱: " . $_FILES["file"]["tmp_name"] . '<br>';
//
//
//    if (file_exists(dirname(__FILE__) . '/photo/' . $_FILES['file']['name'])) {
//        echo "檔案已經存在，請勿重覆上傳相同檔案";
//    } else {
//        echo '搬移檔案';
//        echo 'in';
//        move_uploaded_file($_FILES['file']['tmp_name'],
//            dirname(__FILE__) . '/photo/' . $_FILES['file']['name']);
//        echo dirname(__FILE__) . '/photo/' . $_FILES['file']['name'].'<br>';
//        echo 'out';
//    }
//}
//
//?>
</body>

</html>

