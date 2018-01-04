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
<div id="age" style="width: 600px;height:400px;"></div>
<?php
$m=100;
$f=50;

?>
<script>
    var myChart = echarts.init(document.getElementById('age'));
    var age_option = {
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b}: 共{c}人 ({d}%)"
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
                    {value:335, name:'小於21歲'},
                    {value:310, name:'介於22歲到25歲之間'},
                    {value:234, name:'介於26歲到30歲之間'},
                    {value:135, name:'介於31歲到35歲之間'},
                    {value:1548, name:'介於36歲到40歲之間'},
                    {value:212,name:'大於41歲共'}
                ]
            }
        ]
    };
    myChart.setOption(age_option);
</script>


</body>
</html>