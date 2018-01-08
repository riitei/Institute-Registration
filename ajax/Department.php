<?php
/**
 * Created by PhpStorm.
 * User: riitei
 * Date: 2018/1/4
 * Time: 16:01
 */
include $_SERVER['DOCUMENT_ROOT'] . 'DBconnect.php';

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
    Institute_Registration_information.ntcu_department_department_id = " . $_POST['department_id'] . "   
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
$gender = array();
$data = array();
$age_range = array();
$school_department = array();
$school_count = array();
$age_value = array();
$age_name = array();


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
        AND ntcu_department_department_id = '" . $_POST['department_id'] . "'group by school_id order by school_id;";
    $school_data = DBconnect::connect()->query($statistics_school);


    foreach ($school_data as $key => $school) {
        $school_department[$key] = $school['school_name'] . ' ' . $school['school_department'];
        $school_count[$key] = $school['count'];
    }

}
$gender['male'] = $male;
$gender['female'] = $female;

$age_value[0] = $age20;
$age_value[1] = $age25;
$age_value[2] = $age30;
$age_value[3] = $age35;
$age_value[4] = $age40;
$age_value[5] = $age45;

$age_name[0] = "小於21歲" . $age_value[0] . "人";
$age_name[1] = "介於22歲到25歲之間$age_value[1]人";
$age_name[2] = "介於26歲到30歲之間$age_value[2]人";
$age_name[3] = "介於31歲到35歲之間$age_value[3]人";
$age_name[4] = "介於36歲到40歲之間$age_value[4]人";
$age_name[5] = "大於41歲$age_value[5]人";

$age = array();
foreach ($age_value as $key => $value) {
    $age[$key]["value"] = $age_value[$key];
    $age[$key]["name"] = $age_name[$key];
}

//$age_range['age20'] = $age20;
//$age_range['age25'] = $age25;
//$age_range['age30'] = $age30;
//$age_range['age35'] = $age35;
//$age_range['age40'] = $age40;
//$age_range['age45'] = $age45;

$data['gender'] = $gender;
$data['age_range_name'] = $age_name;
$data['age_range'] = $age;
$data['school_department'] = $school_department;
$data['school_count'] = $school_count;
echo json_encode($data, true);
