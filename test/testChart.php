<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/29
 * Time: 16:51
 */
?>
<html>
<head>
    <script src="../api/echarts.js"></script>
</head>
<body>

<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
<div id="school" style="width: 600px;height:400px;"></div>
<?php
$age_value = array();
$age_value[0]=5;
$age_value[1]=22;
$age_value[2]=26;
$age_value[3]=31;
$age_value[4]=36;
$age_value[5]=41;


$age_name = array();
$age_name[0] = "小於21歲".$age_value[0]."人";
$age_name[1] = "介於22歲到25歲之間$age_value[1]人";
$age_name[2] = "介於26歲到30歲之間$age_value[2]人";
$age_name[3] = "介於31歲到35歲之間$age_value[3]人";
$age_name[4] = "介於36歲到40歲之間$age_value[4]人";
$age_name[5] = "大於41歲$age_value[5]人";

$age_range_name = json_encode($age_name, true);

$age = array();
foreach ($age_value as $key=>$value){
    $age[$key]["value"] = $age_value[$key];
    $age[$key]["name"] = $age_name[$key];
}

$age_range = json_encode($age,true);

?>

<div id="gender" style="width: 600px;height:400px;"></div>
<div id="age" style="width: 600px;height:400px;"></div>
<div id="school" style="width: 600px;height:2048px;"></div>
<script>
    console.log(2);
    console.log(<?=$age_range_name?>);
    // 報考年紀區間
    // var age_range_age20 = statistics_data['age_range']['age20'];
    // var age_range_age25 = statistics_data['age_range']['age25'];
    // var age_range_age30 = statistics_data['age_range']['age30'];
    // var age_range_age35 = statistics_data['age_range']['age35'];
    // var age_range_age40 = statistics_data['age_range']['age40'];
    // var age_range_age45 = statistics_data['age_range']['age45'];
    // var age_range_age = [10, 22, 26, 31, 36, 41];
    // var age_range = [
    //     '小於21歲' + age_range_age[0] + '人',
    //     '介於22歲到25歲之間' + age_range_age[1] + '人',
    //     '介於26歲到30歲之間' + age_range_age[2] + '人',
    //     '介於31歲到35歲之間' + age_range_age[3] + '人',
    //     '介於36歲到40歲之間' + age_range_age[4] + '人',
    //     '大於41歲' + age_range_age[5] + '人'
    // ];
    var ageChart = echarts.init(document.getElementById('age'));
    var age_option = {
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b}: 共{c}人 ({d}%)"
        },
        legend: {
            orient: 'vertical',
            x: 'left',
            data:<?=$age_range_name?>
            // ['小於21歲' + age_range_age[0] + '人',
            // '介於22歲到25歲之間' + 22 + '人',
            // '介於26歲到30歲之間' + 26 + '人',
            // '介於31歲到35歲之間' + 31 + '人',
            // '介於36歲到40歲之間' + 36 + '人',
            // '大於41歲' + 41 + '人']
        },
        series: [
            {
                name: '報考年紀區間',
                type: 'pie',
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
                data: <?=$age_range?>
                //     [
                //     {"value": 10, "name": "小於21歲10人"},
                //     {"value": 22, "name": '介於22歲到25歲之間' + 22 + '人'},
                //     {"value": 26, "name": '介於26歲到30歲之間' + 26 + '人'},
                //     {"value": 31, "name": '介於31歲到35歲之間' + 31 + '人'},
                //     {"value": 36, "name": '介於36歲到40歲之間' + 36 + '人'},
                //     {"value": 41, "name": '大於41歲共' + 41 + '人'}
                // ]
            }
        ]
    };
    ageChart.setOption(age_option);

</script>


</body>
</html>