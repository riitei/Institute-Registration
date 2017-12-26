<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2017/12/20
 * Time: 15:51
 */
$age = "1976-6-7";
echo substr($age,0,4)-1911;
echo '<br>';

echo str_pad(7,3,0,STR_PAD_LEFT);
echo '<br>';

echo date("Y")-substr("1984-11-30", 0, 4);
echo '<br>';

$today = date("Y-m-d");
$day = "2013-02-25";

echo (strtotime($today) - strtotime($day)).'<br>'; //計算相差幾秒
// 3600=60秒*60分鍾 如果要算一天就除 86400 = 60秒*60分鐘*24小時
echo (strtotime($today) - strtotime($day))/3600/24/365; //計算相差幾小時