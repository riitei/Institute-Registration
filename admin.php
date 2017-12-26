<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>後台</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="api/jquery-3.2.1.min.js"></script>
    <script src="admin.js"></script>

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
    <br>
    <div>
        更新科系：<br>
        選擇更新科系
        <select id="updateDepartment" name="updateDepartment">
            <option value="school_null">請選擇更新科系</option>
            <?php
            // 找本校學校碩博班科系
            $ntcu_department = new NTCUDepartment();
            foreach ($ntcu_department->NTCU_department_search() as $value) {
                echo "  <option value=" . $value['department_id'] . ">" . $value['department_name'] . "</option>";
            }
            ?>
        </select><br>
        輸入更新後科系成稱
        <input id="updateName" type="text" placeholder="更新科系">
        <select id="updateDegree" name="updateDegree">
            <option value="degree_null">請選擇學位</option>
            <option value="碩士">碩士</option>
            <option value="博士">博士</option>
        </select>
        <select id="updateClass" name="updateClass">
            <option value="class_null">請選擇班級</option>
            <option value="日">日</option>
            <option value="職">職</option>
        </select>
        <input id="update" type="button" value="更新">
    </div>
    <br>
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
        <input id="delete" type="button" value="刪除">
    </div>
    <br><br>
    <div>

        <?php

        $ntcu_department_search = new NTCUDepartment();
        foreach ($ntcu_department_search->NTCU_department_search() as $value) {
            echo '<span style="color: red">' . $value['department_id'] . '_' . $value['department_name'] . '</span><br>';

            $statistics_data_search = "
SELECT 
    candidates_information.candidates_information_gender as gender,
    candidates_information.candidates_information_birthday as birthday,
    school.school_id,
    concat(
    school.school_name,'_',
    school.school_department)as school
FROM
    Institute_Registration_information
        INNER JOIN
    candidates_information
		inner join
        school
WHERE
    candidates_information_id = candidates_information_candidates_information_id &&
    Institute_Registration_information.school_school_id = school.school_id &&
    Institute_Registration_information.ntcu_department_department_id = " . $value['department_id'] . "   
    order by school_id asc ;";

            $statistics_data = DBconnect::connect()->query($statistics_data_search);
            $male = 0;
            $female = 0;
            $age = 0;
            $age20 = 0;
            $age25 = 0;
            $age30 = 0;
            $age35 = 0;
            $age40 = 0;
            $age45 = 0;
            $school = array();
            $schoolnum = 0;
            $temp_school = 0;
            $temp = 0;
            //

            foreach ($statistics_data as $statistics) {

                // 統計報考科系男女人數
                if ($statistics['gender'] === '男') {
                    $male = $male + 1;
                } else {
                    $female = $female + 1;
                }
                // 統計報考科系年齡區間
                $age = date("Y") - substr($statistics['birthday'], 0, 4);
                if ($age <= 22) {
                    $age20 = $age20 + 1;
                } elseif ($age > 22 && $age <= 25) {
                    $age25 = $age25 + 1;
                } elseif ($age > 25 && $age <= 30) {
                    $age30 = $age30 + 1;
                } elseif ($age > 30 && $age <= 35) {
                    $age35 = $age35 + 1;
                } elseif ($age > 35 && $age <= 40) {
                    $age40 = $age40 + 1;
                } else {
                    $age45 = $age45 + 1;
                }
                // 報考學校


                $temp_school = $statistics['school'];
                if ($temp_school == $statistics['school']) {
                    $temp = $temp_school;
                    echo 'id_' . $statistics['school_id'] . '_value_' . $statistics['school'] . '<br>';
                    $temp_school = 0 ;
                }
                if ($temp == $statistics['school']) {
                    echo $schoolnum = +1 . '人<br>';
                }else{
                    $schoolnum = 0;
                }

            }
            echo '男生共 ' . $male . ' 人<br>';
            echo '女生共 ' . $female . ' 人<br>';

            echo '  小於21歲共'.$age20.'人<br>';
            echo '  介於22歲到25歲之間共'.$age25.'人<br>';
            echo '  介於26歲到30歲之間共'.$age30.'人<br>';
            echo '  介於31歲到35歲之間共'.$age35.'人<br>';
            echo '  介於36歲到40歲之間共'.$age40.'人<br>';
            echo '  大於41歲共'.$age45.'人<br>';


        }// NTCU 依科系


        ?>

        <table>

        </table>

    </div>
</div>

</body>
</html>

