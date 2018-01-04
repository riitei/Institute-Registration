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
$m=100;
$f=50;
$school = array();
//$school = ["1","2","3","4","5","6","7"];
$school[0]=1;
$school[1]=1;
$school[2]=1;
$school[3]=1;
$school[4]=1;
$school[5]=1;
$school[6]=1;

$school_name_json = json_encode($school,true);
$school_count = array(10, 52, 200, 334, 390, 330, 220);
$school_count_json = json_encode($school_count,true);
?>
<script>
    var myChart = echarts.init(document.getElementById('school'));
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
        xAxis : [
            {
                type : 'category',
                data:<?=$school_name_json?>,
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'報考人數',
                type:'bar',
                barWidth: '20%',
                data:<?=$school_count_json?>
            }
        ]
    };
    myChart.setOption(school_option);
</script>


</body>
</html>