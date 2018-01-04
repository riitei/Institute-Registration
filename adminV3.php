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
<style type="text/css">
    .department {
        color: red;
    }

    .sum {
        color: blue;
    }

    .school {
        background-color: lightgray;
    }

</style>
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
        <select id="department" name="department">
            <option value="department_null">請選擇統計報考科系</option>
            <?php
            // 找本校學校碩博班科系
            foreach ($ntcu_department->NTCU_department_search() as $value) {
                echo "  <option value=" . $value['department_id'] . ">" . $value['department_name'] . "</option>";
            }
            ?>
        </select>
    </div>


    <script>

        $(document).ready(function () {

            $("#department").change(function () {
                var gender_male='';
                $.post("ajax/Department.php", {
                        department_id: $("#department").val()
                    },

                    function (data) {
                    console.log(2);
                       console.log(JSON.parse(data));
                        var statistics_data =JSON.parse(data);
                        gender_male = statistics_data['gender']['male'];
                        // console.log(statistics_data['gender']['female']);
                        // console.log(statistics_data['age_range']['age20']);
                        // console.log(statistics_data['age_range']['age25']);
                        // console.log(statistics_data['age_range']['age30']);
                        // console.log(statistics_data['age_range']['age35']);
                        // console.log(statistics_data['age_range']['age40']);
                        // console.log(statistics_data['age_range']['age45']);
                        // $.each(temp['gender'], function (index,value) {
                        //     console.log(index+" "+value);
                        // });
                            console.log(gender_male);

                    }
                );
                console.log(1);
            });

        });


    </script>


    <div>

        <?php

        $ntcu_department_search = new NTCUDepartment();
        foreach ($ntcu_department_search->NTCU_department_search() as $value) {
            echo '<span class="department">' . $value['department_id'] . '_' . $value['department_name'] . '</span><br>';

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


            }
            // 統計報考學校畢業學校和科系的人數
            $statistics_school = "    
SELECT 
count(school_id) as count ,school_id,school_name,school_department
FROM
    Institute_Registration.Institute_Registration_information
        INNER JOIN
    school
    
WHERE
    school_school_id = school_id
        AND ntcu_department_department_id = '" . $value['department_id'] . "'group by school_id order by school_id;";
            $school_data = DBconnect::connect()->query($statistics_school);

            echo '男生共 <span class="sum">' . $male . '</span> 人<br>';
            echo '女生共 <span class="sum">' . $female . '</span> 人<br>';
            echo '<br>';
            echo ' &nbsp 小於21歲共<span class="sum">' . $age20 . '</span>人<br>';
            echo ' &nbsp 介於22歲到25歲之間共<span class="sum">' . $age25 . '</span>人<br>';
            echo ' &nbsp 介於26歲到30歲之間共<span class="sum">' . $age30 . '</span>人<br>';
            echo ' &nbsp 介於31歲到35歲之間共<span class="sum">' . $age35 . '</span>人<br>';
            echo ' &nbsp 介於36歲到40歲之間共<span class="sum">' . $age40 . '</span>人<br>';
            echo ' &nbsp 大於41歲共<span class="sum">' . $age45 . '</span>人<br>';
            echo '<br>';
            foreach ($school_data as $key => $school) {
                if ($key % 2 == 0) {
                    echo $key . ' <span class="school">' . $school['school_name'] . ' ' . $school['school_department'] . '</span>>共<span class="sum">' . $school['count'] . '</span>人.<br>';
                } else {
                    echo $key . ' ' . $school['school_name'] . ' ' . $school['school_department'] . '共<span class="sum">' . $school['count'] . '</span>人.<br>';
                }
            }


        }// NTCU 依科系


        ?>

        <table>

        </table>

    </div>
</div>

</body>
</html>

