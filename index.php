<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>台中教育大學＿碩博班報名系統</title>
    <script src="api/jquery-3.2.1.min.js"></script>
    <script src="index.js"></script>

    <link rel="stylesheet" type="text/css" href="index.css">
    <?php
    include 'Department.php';
    ?>
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
                        <?php
                        $ntcu_department = new Department();
                        foreach ($ntcu_department->department_search() as $value) {
                            echo $value['department'] . '<br>';
                            echo "  <option value=" . $value['department'] . ">".$value['department']."</option>";
                        }


                        ?>

<!--                        <option value="資工系">資工系</option>-->
<!--                        <option value="音樂系">音樂系</option>-->
<!--                        <option value="美術系">美術系</option>-->
<!--                        <option value="教育系" selected="true">教育系</option>-->

                    </select><br><br>
                </td>
            </tr>
        </table>
        <input type="submit" value="送出" OnClick="CheckInput();">
        <input type="reset" value="清除">

    </form>
</div>

</body>
</html>

