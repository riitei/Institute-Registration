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
<div id="main" style="width: 600px;height:400px;"></div>
<?php
$m=100;
$f=50;

?>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));

    // 指定图表的配置项和数据
    var option = {
        title : {
            text: '報考男女人數',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} 人 ({d}%)"
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
                    {value:<?=$m?>, name:'男'},
                    {value:<?=$f?>, name:'女'},
                ]
            }
        ]
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>


</body>
</html>