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
                    <select name="department">
                        <?php
                        // 找本校學校碩博班科系
                        $ntcu_department = new Department();
                        foreach ($ntcu_department->department_search() as $value) {
                            echo $value['department'] . '<br>';
                            echo "  <option value=" . $value['department'] . ">" . $value['department'] . "</option>";
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

</body>
<script>

    $(document).ready(function () {
        $("#school").change(function () {
            console.log($("#school").val());
            // 讀取選擇到學校
            $.post("SchoolDepartment.php", {
                    schoolName: $("#school").val()//選到學校名單
                },

                function (data) {
                    console.log(JSON.parse(data));
                    $("#school_department").empty();
                    $.each(JSON.parse(data), function (index, value) {
                        console.log(value);
                        $("#school_department").append("<option value=" + value + ">"+value+"</option>");

                    });
                });


            // console.log("数据： " + data);

        });


    });


</script>
</html>

