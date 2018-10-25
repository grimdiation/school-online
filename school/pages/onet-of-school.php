<?php
session_start();
ob_start();
include('autoload.php');
include('mysql_connect.php');
error_reporting( error_reporting() & ~E_NOTICE );
$sql = "SELECT school_name_th FROM school WHERE school_id = '" . $_SESSION['school_id'] . "'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_assoc($result);
$year = $_POST['year'];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"><head>
<meta charset="utf-8" />
<title>ผลการทดสอบทางการศึกษาระดับชาติขึ้นพื้นฐาน <?php echo $data['school_name_th']; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN THEME GLOBAL STYLES -->
<link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->

<!-- BEGIN THEME LAYOUT STYLES -->
<link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" /> </head>


<style>
.center {
	text-align: center;
}
</style>
<body>
<!-- BEGIN CONTAINER -->
<!-- BEGIN BORDERED TABLE PORTLET-->
<div class="portlet light">
<div class="portlet-title">
<div class="caption">
<i class="icon-bubble font-dark"></i>
<span class="caption-subject font-dark bold uppercase">กราฟแสดงผลการทดสอบทางการศึกษาระดับชาติขั้นพื้นฐาน <?php echo $id . " โรงเรียน" . $data['school_name_th'] . " ปีการศึกษา " . $year; ?></span>
</div>
</div>
<table width="80%" height="70" class="table-bordered table-hover" style="margin: 0 auto;">
<thead style="background-color: deepskyblue;">
<tr>
    <td class="center" rowspan="2">รหัส</td>
<th class="center" rowspan="2">วิชา</th>
<th class="center" colspan="2">ป.6</th>
<th class="center" colspan="2">ม.3</th>
<th class="center" colspan="2">ม.6</th>
</tr>

<?php
	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'ภาษาไทย'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$thai_language_p6 = 0;
	} else {
		$thai_language_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($thai_language_p6 * 100) / $score['MAX']))){
		$thai_persen_p6 = 0;
	} else {
		$thai_persen_p6 = @(($thai_language_p6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'ภาษาไทย'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$thai_language_m3 = 0;
	} else {
		$thai_language_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($thai_language_m3 * 100) / $score['MAX']))){
		$thai_persen_m3 = 0;
	} else {
		$thai_persen_m3 = @(($thai_language_m3 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'ภาษาไทย'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$thai_language_m6 = 0;
	} else {
		$thai_language_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($thai_language_m6 * 100) / $score['MAX']))){
		$thai_persen_m6 = 0;
	} else {
		$thai_persen_m6 = @(($thai_language_m6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'คณิตศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$math_p6 = 0;
	} else {
		$math_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($math_p6 * 100) / $score['MAX']))){
		$math_p6_persen = 0;
	} else {
		$math_p6_persen = @(($math_p6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'คณิตศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$math_m3 = 0;
	} else {
		$math_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($math_m3 * 100) / $score['MAX']))){
		$math_m3_persen = 0;
	} else {
		$math_m3_persen = @(($math_m3 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'คณิตศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$math_m6 = 0;
	} else {
		$math_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($math_m6 * 100) / $score['MAX']))){
		$math_m6_persen = 0;
	} else {
		$math_m6_persen = @(($math_m6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'วิทยาศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$science_p6 = 0;
	} else {
		$science_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($science_p6 * 100) / $score['MAX']))){
		$science_p6_persen = 0;
	} else {
		$science_p6_persen = @(($science_p6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'วิทยาศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$science_m3 = 0;
	} else {
		$science_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($science_m3 * 100) / $score['MAX']))){
		$science_m3_persen = 0;
	} else {
		$science_m3_persen = @(($science_m3 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'วิทยาศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$science_m6 = 0;
	} else {
		$science_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($science_m6 * 100) / $score['MAX']))){
		$science_m6_persen = 0;
	} else {
		$science_m6_persen = @(($science_m6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'ศิลปะ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$art_p6 = 0;
	} else {
		$art_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($art_p6 * 100) / $score['MAX']))){
		$art_p6_persen = 0;
	} else {
		$art_p6_persen = @(($art_p6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'ศิลปะ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$art_m3 = 0;
	} else {
		$art_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($art_m3 * 100) / $score['MAX']))){
		$art_m3_persen = 0;
	} else {
		$art_m3_persen = @(($art_m3 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'ศิลปะ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$art_m6 = 0;
	} else {
		$art_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($art_m6 * 100) / $score['MAX']))){
		$art_m6_persen = 0;
	} else {
		$art_m6_persen = @(($art_m6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'การงานอาชีพและเทคโนโลยี'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$career_p6 = 0;
	} else {
		$career_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($career_p6 * 100) / $score['MAX']))){
		$career_p6_persen = 0;
	} else {
		$career_p6_persen = @(($career_p6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'การงานอาชีพและเทคโนโลยี'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$career_m3 = 0;
	} else {
		$career_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($career_m3 * 100) / $score['MAX']))){
		$career_m3_persen = 0;
	} else {
		$career_m3_persen = @(($career_m3 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'การงานอาชีพและเทคโนโลยี'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$career_m6 = 0;
	} else {
		$career_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($career_m6 * 100) / $score['MAX']))){
		$career_m6_persen = 0;
	} else {
		$career_m6_persen = @(($career_m6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$social_p6 = 0;
	} else {
		$social_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($social_p6 * 100) / $score['MAX']))){
		$social_p6_persen = 0;
	} else {
		$social_p6_persen = @(($social_p6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$social_m3 = 0;
	} else {
		$social_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($social_m3 * 100) / $score['MAX']))){
		$social_m3_persen = 0;
	} else {
		$social_m3_persen = @(($social_m3 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$social_m6 = 0;
	} else {
		$social_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($social_m6 * 100) / $score['MAX']))){
		$social_m6_persen = 0;
	} else {
		$social_m6_persen = @(($social_m6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'ภาษาอังกฤษ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$english_p6 = 0;
	} else {
		$english_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($english_p6 * 100) / $score['MAX']))){
		$english_p6_persen = 0;
	} else {
		$english_p6_persen = @(($english_p6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'ภาษาอังกฤษ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$english_m3 = 0;
	} else {
		$english_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($english_m3 * 100) / $score['MAX']))){
		$english_m3_persen = 0;
	} else {
		$english_m3_persen = @(($english_m3 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'ภาษาอังกฤษ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$english_m6 = 0;
	} else {
		$english_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($english_m6 * 100) / $score['MAX']))){
		$english_m6_persen = 0;
	} else {
		$english_m6_persen = @(($english_m6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'สุขศึกษาและพลศึกษา'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$health_p6 = 0;
	} else {
		$health_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($health_p6 * 100) / $score['MAX']))){
		$health_p6_persen = 0;
	} else {
		$health_p6_persen = @(($health_p6 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'สุขศึกษาและพลศึกษา'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$health_m3 = 0;
	} else {
		$health_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($health_m3 * 100) / $score['MAX']))){
		$health_m3_persen = 0;
	} else {
		$health_m3_persen = @(($health_m3 * 100) / $score['MAX']);
	}
?>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'สุขศึกษาและพลศึกษา'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$health_m6 = 0;
	} else {
		$health_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($health_m6 * 100) / $score['MAX']))){
		$health_m6_persen = 0;
	} else {
		$health_m6_persen = @(($health_m6 * 100) / $score['MAX']);
	}
?>
<?php
	$sum_p6_score = $thai_language_p6 + $math_p6 + $science_p6 + $art_p6 + $career_p6 + $social_p6 + $english_p6 + $health_p6;
	$sum_p6_persen = $thai_persen_p6 + $math_p6_persen + $science_p6_persen + $art_p6_persen + $career_p6_persen + $social_p6_persen + $english_p6_persen + $health_p6_persen;

	$sum_m3_score = $thai_language_m3 + $math_m3 + $science_m3+ $art_m3 + $career_m3 + $social_m3+ $english_m3 + $health_m3;
	$sum_m3_persen = $thai_persen_m3 + $math_m3_persen + $science_m3_persen + $art_m3_persen + $career_m3_persen + $social_m3_persen + $english_m3_persen + $health_m3_persen;

	$sum_m6_score = $thai_language_m6 + $math_m6 + $science_m6 + $art_m6 + $career_m6 + $social_m6 + $english_m6 + $health_m6;
	$sum_m6_persen = $thai_persen_m6 + $math_m6_persen + $science_m6_persen + $art_m6_persen + $career_m6_persen + $social_m6_persen + $english_m6_persen + $health_m6_persen;
?>

<tr>
<th class="center">คะแนน(O-NET)</th>
<th class="center">เปอร์เซ็น(%)</th>
<th class="center">คะแนน(O-NET)</th>
<th class="center">เปอร์เซ็น(%)</th>
<th class="center">คะแนน(O-NET)</th>
<th class="center">เปอร์เซ็น(%)</th>
</tr>
</thead>
<tbody>
<tr>
    <td class="center" width="50">A1</td>
<td width="200"> ภาษาไทย </td>
<?php
	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'ภาษาไทย'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$thai_language_p6 = 0;
	} else {
		$thai_language_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($thai_language_p6 * 100) / $sum_p6_score))){
		$thai_persen_p6 = 0;
	} else {
		$thai_persen_p6 = @(($thai_language_p6 * 100) / $sum_p6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($thai_language_p6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($thai_persen_p6, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'ภาษาไทย'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$thai_language_m3 = 0;
	} else {
		$thai_language_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($thai_language_m3 * 100) / $sum_m3_score))){
		$thai_persen_m3 = 0;
	} else {
		$thai_persen_m3 = @(($thai_language_m3 * 100) / $sum_m3_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($thai_language_m3, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($thai_persen_m3, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'ภาษาไทย'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$thai_language_m6 = 0;
	} else {
		$thai_language_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($thai_language_m6 * 100) / $sum_m6_score))){
		$thai_persen_m6 = 0;
	} else {
		$thai_persen_m6 = @(($thai_language_m6 * 100) / $sum_m6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($thai_language_m6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($thai_persen_m6, 2, '.', ' ') . "%"; ?> </td>
</tr>
<tr>
    <td class="center" width="50">A2</td>
<td width="200"> คณิตศาสตร์ </td>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'คณิตศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$math_p6 = 0;
	} else {
		$math_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($math_p6 * 100) / $sum_p6_score))){
		$math_p6_persen = 0;
	} else {
		$math_p6_persen = @(($math_p6 * 100) / $sum_p6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($math_p6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($math_p6_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'คณิตศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$math_m3 = 0;
	} else {
		$math_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($math_m3 * 100) / $sum_m3_score))){
		$math_m3_persen = 0;
	} else {
		$math_m3_persen = @(($math_m3 * 100) / $sum_m3_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($math_m3, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($math_m3_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'คณิตศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$math_m6 = 0;
	} else {
		$math_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($math_m6 * 100) / $sum_m6_score))){
		$math_m6_persen = 0;
	} else {
		$math_m6_persen = @(($math_m6 * 100) / $sum_m6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($math_m6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($math_m6_persen, 2, '.', ' ') . "%"; ?> </td>
</tr>
<tr>
    <td class="center" width="50">A3</td>
<td width="200"> วิทยาศาสตร์ </td>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'วิทยาศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$science_p6 = 0;
	} else {
		$science_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($science_p6 * 100) / $sum_p6_score))){
		$science_p6_persen = 0;
	} else {
		$science_p6_persen = @(($science_p6 * 100) / $sum_p6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($science_p6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($science_p6_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'วิทยาศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$science_m3 = 0;
	} else {
		$science_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($science_m3 * 100) / $sum_m3_score))){
		$science_m3_persen = 0;
	} else {
		$science_m3_persen = @(($science_m3 * 100) / $sum_m3_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($science_m3, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($science_m3_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'วิทยาศาสตร์'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$science_m6 = 0;
	} else {
		$science_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($science_m6 * 100) / $sum_m6_score))){
		$science_m6_persen = 0;
	} else {
		$science_m6_persen = @(($science_m6 * 100) / $sum_m6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($science_m6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($science_m6_persen, 2, '.', ' ') . "%"; ?> </td>
</tr>
<tr>
    <td class="center" width="50">A4</td>
<td width="200"> ศิลปะ </td>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'ศิลปะ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$art_p6 = 0;
	} else {
		$art_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($art_p6 * 100) / $sum_p6_score))){
		$art_p6_persen = 0;
	} else {
		$art_p6_persen = @(($art_p6 * 100) / $sum_p6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($art_p6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($art_p6_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'ศิลปะ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$art_m3 = 0;
	} else {
		$art_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($art_m3 * 100) / $sum_m3_score))){
		$art_m3_persen = 0;
	} else {
		$art_m3_persen = @(($art_m3 * 100) / $sum_m3_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($art_m3, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($art_m3_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'ศิลปะ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$art_m6 = 0;
	} else {
		$art_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($art_m6 * 100) / $sum_m6_score))){
		$art_m6_persen = 0;
	} else {
		$art_m6_persen = @(($art_m6 * 100) / $sum_m6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($art_m6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($art_m6_persen, 2, '.', ' ') . "%"; ?> </td>
</tr>
<tr>
    <td class="center" width="50">A5</td>
<td width="200"> การงานอาชีพและเทคโนโลยี </td>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'การงานอาชีพและเทคโนโลยี'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$career_p6 = 0;
	} else {
		$career_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($career_p6 * 100) / $sum_p6_score))){
		$career_p6_persen = 0;
	} else {
		$career_p6_persen = @(($career_p6 * 100) / $sum_p6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($career_p6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($career_p6_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'การงานอาชีพและเทคโนโลยี'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$career_m3 = 0;
	} else {
		$career_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($career_m3 * 100) / $sum_m3_score))){
		$career_m3_persen = 0;
	} else {
		$career_m3_persen = @(($career_m3 * 100) / $sum_m3_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($career_m3, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($career_m3_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'การงานอาชีพและเทคโนโลยี'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$career_m6 = 0;
	} else {
		$career_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($career_m6 * 100) / $sum_m6_score))){
		$career_m6_persen = 0;
	} else {
		$career_m6_persen = @(($career_m6 * 100) / $sum_m6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($career_m6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($career_m6_persen, 2, '.', ' ') . "%"; ?> </td>
</tr>
<tr>
    <td class="center" width="50">A6</td>
<td width="200"> สังคมศึกษา ศาสนา และวัฒนธรรม </td>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$social_p6 = 0;
	} else {
		$social_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($social_p6 * 100) / $sum_p6_score))){
		$social_p6_persen = 0;
	} else {
		$social_p6_persen = @(($social_p6 * 100) / $sum_p6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($social_p6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($social_p6_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$social_m3 = 0;
	} else {
		$social_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($social_m3 * 100) / $sum_m3_score))){
		$social_m3_persen = 0;
	} else {
		$social_m3_persen = @(($social_m3 * 100) / $sum_m3_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($social_m3, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($social_m3_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$social_m6 = 0;
	} else {
		$social_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($social_m6 * 100) / $sum_m6_score))){
		$social_m6_persen = 0;
	} else {
		$social_m6_persen = @(($social_m6 * 100) / $sum_m6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($social_m6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($social_m6_persen, 2, '.', ' ') . "%"; ?> </td>
</tr>
<tr>
    <td class="center" width="50">A7</td>
<td width="200"> ภาษาอังกฤษ </td>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'ภาษาอังกฤษ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$english_p6 = 0;
	} else {
		$english_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($english_p6 * 100) / $sum_p6_score))){
		$english_p6_persen = 0;
	} else {
		$english_p6_persen = @(($english_p6 * 100) / $sum_p6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($english_p6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($english_p6_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'ภาษาอังกฤษ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$english_m3 = 0;
	} else {
		$english_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($english_m3 * 100) / $sum_m3_score))){
		$english_m3_persen = 0;
	} else {
		$english_m3_persen = @(($english_m3 * 100) / $sum_m3_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($english_m3, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($english_m3_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'ภาษาอังกฤษ'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$english_m6 = 0;
	} else {
		$english_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($english_m6 * 100) / $sum_m6_score))){
		$english_m6_persen = 0;
	} else {
		$english_m6_persen = @(($english_m6 * 100) / $sum_m6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($english_m6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($english_m6_persen, 2, '.', ' ') . "%"; ?> </td>
</tr>
<tr>
    <td class="center" width="50">A8</td>
<td width="200"> สุขศึกษาและพลศึกษา </td>
<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ป.6' and onet.year = '" . $year . "' and subject = 'สุขศึกษาและพลศึกษา'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$health_p6 = 0;
	} else {
		$health_p6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($health_p6 * 100) / $sum_p6_score))){
		$health_p6_persen = 0;
	} else {
		$health_p6_persen = @(($health_p6 * 100) / $sum_p6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($health_p6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($health_p6_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.3' and onet.year = '" . $year . "' and subject = 'สุขศึกษาและพลศึกษา'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$health_m3 = 0;
	} else {
		$health_m3 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($health_m3 * 100) / $sum_m3_score))){
		$health_m3_persen = 0;
	} else {
		$health_m3_persen = @(($health_m3 * 100) / $sum_m3_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($health_m3, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($health_m3_persen, 2, '.', ' ') . "%"; ?> </td>

<?php

	$sql = "SELECT SUM(onet.max_score) AS MAX, COUNT(onet.class) AS CLASS, SUM(onet.score) AS SCORE FROM onet inner join student on onet.id_card = student.id_card WHERE student.school_id = '" . $_SESSION['school_id'] . "' and student.class = 'ม.6' and onet.year = '" . $year . "' and subject = 'สุขศึกษาและพลศึกษา'";
	$result = mysqli_query($link, $sql);
	$score = mysqli_fetch_assoc($result);
	if(is_nan(@($score['SCORE'] / $score['CLASS']))){
		$health_m6 = 0;
	} else {
		$health_m6 = @($score['SCORE'] / $score['CLASS']);
	}
	if(is_nan(@(($health_m6 * 100) / $sum_m6_score))){
		$health_m6_persen = 0;
	} else {
		$health_m6_persen = @(($health_m6 * 100) / $sum_m6_score);
	}
?>
<td width="50" class="center"> <?php echo number_format($health_m6, 2, '.', ' '); ?> </td>
<td width="50" class="center"> <?php echo number_format($health_m6_persen, 2, '.', ' ') . "%"; ?> </td>
</tr>
</tbody>
<tfoot>
<tr>
<?php
	$sum_p6_score = $thai_language_p6 + $math_p6 + $science_p6 + $art_p6 + $career_p6 + $social_p6 + $english_p6 + $health_p6;
	$sum_p6_persen = $thai_persen_p6 + $math_p6_persen + $science_p6_persen + $art_p6_persen + $career_p6_persen + $social_p6_persen + $english_p6_persen + $health_p6_persen;

	$sum_m3_score = $thai_language_m3 + $math_m3 + $science_m3+ $art_m3 + $career_m3 + $social_m3+ $english_m3 + $health_m3;
	$sum_m3_persen = $thai_persen_m3 + $math_m3_persen + $science_m3_persen + $art_m3_persen + $career_m3_persen + $social_m3_persen + $english_m3_persen + $health_m3_persen;

	$sum_m6_score = $thai_language_m6 + $math_m6 + $science_m6 + $art_m6 + $career_m6 + $social_m6 + $english_m6 + $health_m6;
	$sum_m6_persen = $thai_persen_m6 + $math_m6_persen + $science_m6_persen + $art_m6_persen + $career_m6_persen + $social_m6_persen + $english_m6_persen + $health_m6_persen;
?>
<td class="center" colspan="2">คะแนนรวม</td>
<td class="center"><?php echo number_format($sum_p6_score, 2, '.', ' ');?></td>
<td class="center"><?php echo number_format($sum_p6_persen, 2, '.', ' ') . "%";?></td>

<td class="center"><?php echo number_format($sum_m3_score, 2, '.', ' ');?></td>
<td class="center"><?php echo number_format($sum_m3_persen, 2, '.', ' ') . "%";?></td>

<td class="center"><?php echo number_format($sum_m6_score, 2, '.', ' ');?></td>
<td class="center"><?php echo number_format($sum_m6_persen, 2, '.', ' ') . "%";?></td>
</tr>
</tfoot>
</table>
<!-- BEGIN CHART PORTLET-->
<div class="row">
                            <div class="portlet light portlet-fit">
                                <div class="portlet-body">
                                    <div id="echarts_bar" style="height:500px; width: 50%;margin: 0 auto;"></div>
                                </div>
                            </div>
                    </div>
<!-- END CHART PORTLET-->
</div>
<!-- END BORDERED TABLE PORTLET-->
<!-- END CONTAINER -->

<!--[if lt IE 9] -->
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/echarts/echarts.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function(){require.config({paths:{echarts:"../assets/global/plugins/echarts/"}}),require(["echarts","echarts/chart/bar","echarts/chart/chord","echarts/chart/eventRiver","echarts/chart/force","echarts/chart/funnel","echarts/chart/gauge","echarts/chart/heatmap","echarts/chart/k","echarts/chart/line","echarts/chart/map","echarts/chart/pie","echarts/chart/radar","echarts/chart/scatter","echarts/chart/tree","echarts/chart/treemap","echarts/chart/venn","echarts/chart/wordCloud"],function(e){var a=e.init(document.getElementById("echarts_bar"));a.setOption({tooltip:{trigger:"axis"},legend:{data:["ป.6","ม.3","ม.6"]},toolbox:{show:!0,feature:{mark:{show:!0},dataView:{show:!0,readOnly:!1},magicType:{show:!0,type:["line","bar"]},restore:{show:!0},saveAsImage:{show:!0}}},calculable:!0,xAxis:[{type:"category",data:["A1","A2","A3","A4","A5","A6","A7","A8"]}],yAxis:[{type:"value",splitArea:{show:!0}}],series:[{name:"ป.6",type:"bar",data:[<?php echo $thai_language_p6; ?>,<?php echo $math_p6; ?>,<?php echo $science_p6; ?>,<?php echo $art_p6; ?>,<?php echo $career_p6; ?>,<?php echo $social_p6; ?>,<?php echo $english_p6; ?>,<?php echo $health_p6; ?>]},{name:"ม.3",type:"bar",data:[<?php echo $thai_language_m3; ?>,<?php echo $math_m3; ?>,<?php echo $science_m3; ?>,<?php echo $art_m3; ?>,<?php echo $career_m3; ?>,<?php echo $social_m3; ?>,<?php echo $english_m3; ?>,<?php echo $health_m3; ?>]},{name:"ม.6",type:"bar",data:[<?php echo $thai_language_m6; ?>,<?php echo $math_m6; ?>,<?php echo $science_m6; ?>,<?php echo $art_m6; ?>,<?php echo $career_m6; ?>,<?php echo $social_m6; ?>,<?php echo $english_m6; ?>,<?php echo $health_m6; ?>]}]});var t=e.init(document.getElementById("echarts_line"));t.setOption({title:{text:"Weekly Weather",subtext:"Lorem ipsum"},tooltip:{trigger:"axis"},legend:{data:["High","Low"]},toolbox:{show:!0,feature:{mark:{show:!0},dataView:{show:!0,readOnly:!1},magicType:{show:!0,type:["line","bar"]},restore:{show:!0},saveAsImage:{show:!0}}},calculable:!0,xAxis:[{type:"category",boundaryGap:!1,data:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"]}],yAxis:[{type:"value",axisLabel:{formatter:"{value} °C"}}],series:[{name:"High",type:"line",data:[11,11,15,13,12,13,10],markPoint:{data:[{type:"max",name:"Max"},{type:"min",name:"Min"}]},markLine:{data:[{type:"average",name:"Mean"}]}},{name:"Low",type:"line",data:[1,-2,2,5,3,2,0],markPoint:{data:[{name:"Lowest",value:-2,xAxis:1,yAxis:-1.5}]},markLine:{data:[{type:"average",name:"Mean"}]}}]});var r=e.init(document.getElementById("echarts_scatter"));r.setOption({tooltip:{trigger:"item"},toolbox:{show:!0,feature:{mark:{show:!0},dataZoom:{show:!0},dataView:{show:!0,readOnly:!1},restore:{show:!0},saveAsImage:{show:!0}}},dataRange:{min:0,max:100,y:"center",text:["High","Low"],color:["lightgreen","yellow"],calculable:!0},xAxis:[{type:"value",scale:!0}],yAxis:[{type:"value",position:"right",scale:!0}],animation:!1,series:[{name:"scatter1",type:"scatter",symbolSize:5,data:function(){for(var e,a=[],t=500;t--;)e=(100*Math.random()).toFixed(2)-0,a.push([(Math.random()*e+e).toFixed(2)-0,(Math.random()*e).toFixed(2)-0,e]);return a}()}]});var o=e.init(document.getElementById("echarts_candle"));o.setOption({tooltip:{trigger:"axis",formatter:function(e){var a=e[0].seriesName+" "+e[0].name;return a+="<br/>  Opening : "+e[0].value[0]+"  Highest : "+e[0].value[3],a+="<br/>  Closing : "+e[0].value[1]+"  Lowest : "+e[0].value[2]}},legend:{data:["Composite Index"]},toolbox:{show:!0,feature:{mark:{show:!0},dataZoom:{show:!0},dataView:{show:!0,readOnly:!1},restore:{show:!0},saveAsImage:{show:!0}}},dataZoom:{show:!0,realtime:!0,start:0,end:50},xAxis:[{type:"category",boundaryGap:!0,axisTick:{onGap:!1},splitLine:{show:!1},data:["2013/1/24","2013/1/25","2013/1/28","2013/1/29","2013/1/30","2013/1/31","2013/2/1","2013/2/4","2013/2/5","2013/2/6","2013/2/7","2013/2/8","2013/2/18","2013/2/19","2013/2/20","2013/2/21","2013/2/22","2013/2/25","2013/2/26","2013/2/27","2013/2/28","2013/3/1","2013/3/4","2013/3/5","2013/3/6","2013/3/7","2013/3/8","2013/3/11","2013/3/12","2013/3/13","2013/3/14","2013/3/15","2013/3/18","2013/3/19","2013/3/20","2013/3/21","2013/3/22","2013/3/25","2013/3/26","2013/3/27","2013/3/28","2013/3/29","2013/4/1","2013/4/2","2013/4/3","2013/4/8","2013/4/9","2013/4/10","2013/4/11","2013/4/12","2013/4/15","2013/4/16","2013/4/17","2013/4/18","2013/4/19","2013/4/22","2013/4/23","2013/4/24","2013/4/25","2013/4/26","2013/5/2","2013/5/3","2013/5/6","2013/5/7","2013/5/8","2013/5/9","2013/5/10","2013/5/13","2013/5/14","2013/5/15","2013/5/16","2013/5/17","2013/5/20","2013/5/21","2013/5/22","2013/5/23","2013/5/24","2013/5/27","2013/5/28","2013/5/29","2013/5/30","2013/5/31","2013/6/3","2013/6/4","2013/6/5","2013/6/6","2013/6/7","2013/6/13"]}],yAxis:[{type:"value",scale:!0,boundaryGap:[.01,.01]}],series:[{name:"Composite Index",type:"k",barMaxWidth:20,itemStyle:{normal:{color:"red",color0:"lightgreen",lineStyle:{width:2,color:"orange",color0:"green"}},emphasis:{color:"black",color0:"white"}},data:[{value:[2320.26,2302.6,2287.3,2362.94],itemStyle:{normal:{color0:"blue",lineStyle:{width:3,color0:"blue"}},emphasis:{color0:"blue"}}},[2300,2291.3,2288.26,2308.38],[2295.35,2346.5,2295.35,2346.92],[2347.22,2358.98,2337.35,2363.8],[2360.75,2382.48,2347.89,2383.76],[2383.43,2385.42,2371.23,2391.82],[2377.41,2419.02,2369.57,2421.15],[2425.92,2428.15,2417.58,2440.38],[2411,2433.13,2403.3,2437.42],[2432.68,2434.48,2427.7,2441.73],[2430.69,2418.53,2394.22,2433.89],[2416.62,2432.4,2414.4,2443.03],[2441.91,2421.56,2415.43,2444.8],[2420.26,2382.91,2373.53,2427.07],[2383.49,2397.18,2370.61,2397.94],[2378.82,2325.95,2309.17,2378.82],[2322.94,2314.16,2308.76,2330.88],[2320.62,2325.82,2315.01,2338.78],[2313.74,2293.34,2289.89,2340.71],[2297.77,2313.22,2292.03,2324.63],[2322.32,2365.59,2308.92,2366.16],[2364.54,2359.51,2330.86,2369.65],[2332.08,2273.4,2259.25,2333.54],[2274.81,2326.31,2270.1,2328.14],[2333.61,2347.18,2321.6,2351.44],[2340.44,2324.29,2304.27,2352.02],[2326.42,2318.61,2314.59,2333.67],[2314.68,2310.59,2296.58,2320.96],[2309.16,2286.6,2264.83,2333.29],[2282.17,2263.97,2253.25,2286.33],[2255.77,2270.28,2253.31,2276.22],[2269.31,2278.4,2250,2312.08],[2267.29,2240.02,2239.21,2276.05],[2244.26,2257.43,2232.02,2261.31],[2257.74,2317.37,2257.42,2317.86],[2318.21,2324.24,2311.6,2330.81],[2321.4,2328.28,2314.97,2332],[2334.74,2326.72,2319.91,2344.89],[2318.58,2297.67,2281.12,2319.99],[2299.38,2301.26,2289,2323.48],[2273.55,2236.3,2232.91,2273.55],[2238.49,2236.62,2228.81,2246.87],[2229.46,2234.4,2227.31,2243.95],[2234.9,2227.74,2220.44,2253.42],[2232.69,2225.29,2217.25,2241.34],[2196.24,2211.59,2180.67,2212.59],[2215.47,2225.77,2215.47,2234.73],[2224.93,2226.13,2212.56,2233.04],[2236.98,2219.55,2217.26,2242.48],[2218.09,2206.78,2204.44,2226.26],[2199.91,2181.94,2177.39,2204.99],[2169.63,2194.85,2165.78,2196.43],[2195.03,2193.8,2178.47,2197.51],[2181.82,2197.6,2175.44,2206.03],[2201.12,2244.64,2200.58,2250.11],[2236.4,2242.17,2232.26,2245.12],[2242.62,2184.54,2182.81,2242.62],[2187.35,2218.32,2184.11,2226.12],[2213.19,2199.31,2191.85,2224.63],[2203.89,2177.91,2173.86,2210.58],[2170.78,2174.12,2161.14,2179.65],[2179.05,2205.5,2179.05,2222.81],[2212.5,2231.17,2212.5,2236.07],[2227.86,2235.57,2219.44,2240.26],[2242.39,2246.3,2235.42,2255.21],[2246.96,2232.97,2221.38,2247.86],[2228.82,2246.83,2225.81,2247.67],[2247.68,2241.92,2231.36,2250.85],[2238.9,2217.01,2205.87,2239.93],[2217.09,2224.8,2213.58,2225.19],[2221.34,2251.81,2210.77,2252.87],[2249.81,2282.87,2248.41,2288.09],[2286.33,2299.99,2281.9,2309.39],[2297.11,2305.11,2290.12,2305.3],[2303.75,2302.4,2292.43,2314.18],[2293.81,2275.67,2274.1,2304.95],[2281.45,2288.53,2270.25,2292.59],[2286.66,2293.08,2283.94,2301.7],[2293.4,2321.32,2281.47,2322.1],[2323.54,2324.02,2321.17,2334.33],[2316.25,2317.75,2310.49,2325.72],[2320.74,2300.59,2299.37,2325.53],[2300.21,2299.25,2294.11,2313.43],[2297.1,2272.42,2264.76,2297.1],[2270.71,2270.93,2260.87,2276.86],[2264.43,2242.11,2240.07,2266.69],[2242.26,2210.9,2205.07,2250.63],[2190.1,2148.35,2126.22,2190.1]],markPoint:{symbol:"star",itemStyle:{normal:{label:{position:"top"}}},data:[{name:"Highest",value:2444.8,xAxis:"2013/2/18",yAxis:2466}]}}]});var l=e.init(document.getElementById("echarts_pie"));l.setOption({tooltip:{show:!0,formatter:"{a} <br/>{b} : {c} ({d}%)"},legend:{orient:"vertical",x:"left",data:["All","Marketing","Search","EDM","Partnership","Video","Social","Google","Bing","Others"]},toolbox:{show:!0,feature:{mark:{show:!0},dataView:{show:!0,readOnly:!1},restore:{show:!0},saveAsImage:{show:!0}}},calculable:!0,series:[{name:"Source",type:"pie",center:["35%",200],radius:80,itemStyle:{normal:{label:{position:"inner",formatter:function(e){return(e.percent-0).toFixed(0)+"%"}},labelLine:{show:!1}},emphasis:{label:{show:!0,formatter:"{b}\n{d}%"}}},data:[{value:335,name:"All"},{value:679,name:"Marketing"},{value:1548,name:"Search"}]},{name:"Source",type:"pie",center:["35%",200],radius:[110,140],data:[{value:335,name:"All"},{value:310,name:"EDM"},{value:234,name:"Partnership"},{value:135,name:"Video"},{value:1048,name:"Social",itemStyle:{normal:{color:function(){var e=require("zrender/tool/color");return e.getRadialGradient(300,200,110,300,200,140,[[0,"rgba(255,255,0,1)"],[1,"rgba(30,144,250,1)"]])}(),label:{textStyle:{color:"rgba(30,144,255,0.8)",align:"center",baseline:"middle",fontFamily:"Open Sans",fontSize:30,fontWeight:"700"}},labelLine:{length:40,lineStyle:{color:"#f0f",width:3,type:"dotted"}}}}},{value:251,name:"Google"},{value:102,name:"Bing",itemStyle:{normal:{label:{show:!1},labelLine:{show:!1}},emphasis:{label:{show:!0},labelLine:{show:!0,length:50}}}},{value:147,name:"Others"}]},{name:"Source",type:"pie",clockWise:!0,startAngle:135,center:["75%",200],radius:[80,120],itemStyle:{normal:{label:{show:!1},labelLine:{show:!1}},emphasis:{color:function(){var e=require("zrender/tool/color");return e.getRadialGradient(650,200,80,650,200,120,[[0,"rgba(255,255,0,1)"],[1,"rgba(255,0,0,1)"]])}(),label:{show:!0,position:"center",formatter:"{d}%",textStyle:{color:"red",fontSize:"30",fontFamily:"Open Sans",fontWeight:"bold"}}}},data:[{value:335,name:"All"},{value:310,name:"EDM"},{value:234,name:"Partnership"},{value:135,name:"Video"},{value:1548,name:"Search"}],markPoint:{symbol:"star",data:[{name:"Max",value:1548,x:"80%",y:50,symbolSize:32}]}}]})})});
</script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>