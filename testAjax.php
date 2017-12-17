<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>台中教育大學＿碩博班報名系統</title>
    <script src="api/jquery-3.2.1.min.js"></script>
    <?php
    include 'DBconnect.php';
    include 'School.php';
    include 'Department.php';
    ?>
</head>

<body>

<div class="form">

    <table border="0">
        <tr>
            <td>
                <span style="color: red">＊</span> 畢業學校和系所：
            </td>
            <td>
                <select id="school" name="school">
                    <option value="school_null">請選擇畢業學校</option>
                    <?php
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
                    <option value="cis">cis</option>

                </select>
            </td>
        </tr>
    </table>
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

                        //     // $("#title_sel").append
                        //     // ("<option value= " + tribe + ">"
                        //     //     + tribe + "</option>");
                    });
                });


            // console.log("数据： " + data);

        });


    });


</script>
</html>
