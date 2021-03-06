<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>後台</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="api/jquery-3.2.1.min.js"></script>
    <script src="admin.js"></script>
    <script src="api/echarts.js"></script>
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

        <?php

        $ntcu_department_search = new NTCUDepartment();
        foreach ($ntcu_department_search->NTCU_department_search() as $num => $value) {
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


            echo "<div id=\"main" . $num . "\" style=\"width: 600px;height:400px;\"></div>";

            echo "<script>
    var myChart = echarts.init(document.getElementById('main" . $num . "'));
    var option = {
        title : {
            text: '報考男女人數',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: \"{a} <br/>{b} : {c} 人 ({d}%)\"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['男','女']
        },

        series : [
            {
                name: '報考男女人數',
                type: 'pie',
                radius : '55%',
                center: ['50%', '50%'],
                data:[
                    {value:" . $male . ", name:'男'},
                    {value:" . $female . ", name:'女'},
                ]
            }
        ]
    };
    myChart.setOption(option);
</script>";


            echo '<br>';
            echo "<div id=\"age" . $num . "\" style=\"width: 600px;height:400px;\"></div>";
            echo "<script>
    var myChart = echarts.init(document.getElementById('age" . $num . "'));
    var age_option = {
        tooltip: {
            trigger: 'item',
            formatter: \"{a} <br/>{b}: 共{c}人 ({d}%)\"
        },
        legend: {
            orient: 'vertical',
            x: 'left',
            data:['小於21歲','介於22歲到25歲之間','介於26歲到30歲之間','介於31歲到35歲之間','介於36歲到40歲之間','大於41歲']
        },
        series: [
            {
                name:'報考年紀區間',
                type:'pie',
                radius: ['50%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    normal: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        show: true,
                        textStyle: {
                            fontSize: '30',
                            fontWeight: 'bold'
                        }
                    }
                },
                labelLine: {
                    normal: {
                        show: false
                    }
                },
                data:[
                    {value:" . $age20 . ", name:'小於21歲'},
                    {value:" . $age25 . ", name:'介於22歲到25歲之間'},
                    {value:" . $age30 . ", name:'介於26歲到30歲之間'},
                    {value:" . $age35 . ", name:'介於31歲到35歲之間'},
                    {value:" . $age40 . ", name:'介於36歲到40歲之間'},
                    {value:" . $age45 . ",name:'大於41歲共'}
                ]
            }
        ]
    };
    myChart.setOption(age_option);
</script>";

            echo '<br>';


            // 統計報考學校
            $school_name = array();
            $school_count = array();

            foreach ($school_data as $key => $school) {
                $school_name[$key] = $school['school_name'] . ' ' . $school['school_department'];
                $school_count[$key] = $school['count'];
//                if ($key % 2 == 0) {
//                    echo $key . ' <span class="school">' . $school['school_name'] . ' ' . $school['school_department'] . '</span>>共<span class="sum">' . $school['count'] . '</span>人.<br>';
//                } else {
//                    echo $key . ' ' . $school['school_name'] . ' ' . $school['school_department'] . '共<span class="sum">' . $school['count'] . '</span>人.<br>';
//                }
            }
            $school_name_json = json_encode($school_name, true);
            $school_count_json = json_encode($school_count, true);
            echo "<div id=\"school" . $num . "\" style=\"width: 600px;height:400px;\"></div>";
            echo "<script>
    var myChart = echarts.init(document.getElementById('school" . $num . "'));
    var school_option = {
        color: ['#3398DB'],
        tooltip : {
            trigger: 'axis',
            axisPointer : {
                type : 'shadow'
            }
        },
        grid: {
            left: '1%',
            right: '2%',
            bottom: '1%',
            containLabel: true
        },
        yAxis : [
            {
                type : 'category',
                data:" . $school_name_json . ",
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        xAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'報考人數',
                type:'bar',
                barWidth: '20%',
                data:" . $school_count_json . "
            }
        ]
    };
    myChart.setOption(school_option);
</script>";

        }// NTCU 依科系


        ?>


    </div>
</div>

</body>
</html>

