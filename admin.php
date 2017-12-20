<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>後台</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="api/jquery-3.2.1.min.js"></script>

    <?php
    include 'DBconnect.php';
    include 'NTCUDepartment.php';
    ?>
</head>
<body>

<div class="form">
    <div>
        新增科系：
        <input id="addName" name="addName" type="text" placeholder="新增科系" size="">
        <select id="addDegree" name="addDegree">
            <option value="碩士">碩士</option>
            <option value="博士">博士</option>
        </select>
        <select id="addClass" name="addClass">
            <option value="日">日</option>
            <option value="職">職</option>
        </select>
        <input id="add" type="button" value="新增">
    </div>
    <div>
        更新科系：
        <select id="deleteDepartment" name="deleteDepartment">
            <option value="school_null">請選擇更新科系</option>
            <?php
            // 找本校學校碩博班科系
            $ntcu_department = new NTCUDepartment();
            foreach ($ntcu_department->NTCU_department_search() as $value) {
                echo "  <option value=" . $value['department_id'] . ">" . $value['department_name'] . "</option>";
            }
            ?>
        </select>
        <input type="text" placeholder="更新科系">
        <select id="updateDegree" name="updateDegree">
            <option value="碩士">碩士</option>
            <option value="碩士">博士</option>
        </select>
        <select id="updateClass" name="updateClass">
            <option value="日">日</option>
            <option value="職">職</option>
        </select>
        <input type="button" value="更新">
    </div>
    <div>
        刪除科系：
        <select id="deleteDepartment" name="deleteDepartment">
            <option value="school_null">請選擇刪除科系</option>
            <?php
            // 找本校學校碩博班科系
            foreach ($ntcu_department->NTCU_department_search() as $value) {
                echo "  <option value=" . $value['department_id'] . ">" . $value['department_name'] . "</option>";
            }
            ?>
        </select>
        <input type="button" value="刪除">
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $("#add").click(function () {
            if($('#addName').val()!=""){
                $.post("ajax/AddNTCUDepartment.php", {
                        addName: $("#addName").val(),
                        addDegree: $("#addDegree").val(),
                        addClass: $("#addClass").val()
                    },
                    function (data) {
                        alert(data);
                        console.log(data);
                    });

            }else{
                alert("請輸入科系名稱");
            }
        });
    });

</script>
