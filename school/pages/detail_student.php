<?php
session_start();
ob_start();
include('autoload.php');
include('mysql_connect.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8" />
<title>รายละเอียด - นักเรียน</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<style>
.font-size {
	font-size: 20px;
}
</style>
<?php include('template_2.php'); ?>
<div class="page-content-wrapper">
<div class="page-content">
<div class="page-head">
<div class="page-title">
<h1>รายละเอียด
</h1>
</div>
<div class="page-toolbar">
<div class="btn-group btn-theme-panel">
<a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
<i class="icon-settings"></i>
</a>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="profile-sidebar">
<div class="portlet light profile-sidebar-portlet bordered">
<div class="profile-userpic">
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM student inner join school on student.school_id = school.school_id WHERE student.id_card = '$id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result);
?>
<img src="<?php echo $data['img']; ?>" class="img-responsive" alt=""> </div>
<div class="profile-usertitle">
<div class="profile-usertitle-name"> <?php echo $data['first_name_th'] . " " . $data['last_name_th']; ?> </div>
<div class="profile-usertitle-job"> <?php echo $data['class']; ?> </div>
</div>
</div>
</div>
<div class="profile-content">
<div class="row">
<div class="col-md-12">
<div class="portlet light bordered">
<div class="portlet-title tabbable-line">
<div class="caption caption-md">
<i class="icon-globe theme-font hide"></i>
<span class="caption-subject font-blue-madison bold uppercase">ประวัติส่วนตัว</span>
</div>
<ul class="nav nav-tabs">
<li class="active">
<a href="#tab_1_1" data-toggle="tab">ทั่วไป</a>
</li>
<li>
<a href="#tab_1_2" data-toggle="tab">นักเรียน</a>
</li>
<li>
<a href="#tab_1_3" data-toggle="tab">ที่อยู่</a>
</li>
<li>
<a href="#tab_1_4" data-toggle="tab">อื่นๆ</a>
</li>
</ul>
</div>
<div class="portlet-body">
<div class="tab-content">
<div class="tab-pane active" id="tab_1_1">
<table>
<tr>
	<td class="font-size" width="200"><label class="control-label">ชื่อ : </label></td>
	<td class="font-size"><?php echo $data['first_name_th']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">นามสกุล : </label></td>
	<td class="font-size"><?php echo $data['last_name_th']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">เพศ : </label></td>
	<td class="font-size"><?php echo $data['gender']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">รหัสบัตรประชาชน : </label></td>
	<td class="font-size"><?php echo $data['id_card']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">ส่วนสูง : </label></td>
	<td class="font-size"><?php echo $data['heigh']; ?></td>
</tr>
<tr>
	<td class="font-size" valign="top"><label class="control-label">น้ำหนัก : </label></td>
	<td class="font-size"><?php echo $data['weight']; ?></td>
</tr>
<tr>
	<td class="font-size" valign="top"><label class="control-label">กรุ๊ปเลือด : </label></td>
	<td class="font-size"><?php echo $data['group_blood']; ?></td>
</tr>
<tr>
	<td class="font-size" valign="top"><label class="control-label">อีเมล์ : </label></td>
	<td class="font-size"><?php echo $data['email']; ?></td>
</tr>
</form>
</table>
</div>

<div class="tab-pane" id="tab_1_2">
<table>
<form role="form" action="#">
<tr>
	<td class="font-size" width="200"><label class="control-label">โรงเรียน : </label></td>
	<td class="font-size"><?php echo $data['school_name_th']; ?></td>
</tr>
<tr>
	<td class="font-size" width="200"><label class="control-label">รหัสนักเรียน : </label></td>
	<td class="font-size"><?php echo $data['student_id']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">ปีการศึกษา : </label></td>
	<td class="font-size"><?php echo $data['year']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">ชั้น : </label></td>
	<td class="font-size"><?php echo $data['class']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">ห้อง : </label></td>
	<td class="font-size"><?php echo $data['room']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">พฤติกรรม : </label></td>
	<td class="font-size"><?php echo $data['behavior']; ?></td>
</tr>
</table>
</div>
<div class="tab-pane" id="tab_1_3">
<table>
<form role="form" action="#">
<tr>
	<td class="font-size" width="200"><label class="control-label">บ้านเลขที่ : </label></td>
	<td class="font-size"><?php echo $data['home_code_2']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">หมู่ : </label></td>
	<td class="font-size"><?php echo $data['moo_2']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">ตำบล : </label></td>
	<td class="font-size"><?php echo $data['sub_district']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">ถนน : </label></td>
	<td class="font-size"><?php echo $data['road_2']; ?></td>
</tr>
<tr>
	<td class="font-size"><label class="control-label">ซอย : </label></td>
	<td class="font-size"><?php echo $data['soy_2']; ?></td>
</tr>
<tr>
	<td class="font-size" valign="top"><label class="control-label">อำเภอ : </label></td>
	<td class="font-size"><?php echo $data['district_2']; ?></td>
</tr>
<tr>
	<td class="font-size" valign="top"><label class="control-label">จัดหวัด : </label></td>
	<td class="font-size"><?php echo $data['province_2']; ?></td>
</tr>
<tr>
	<td class="font-size" valign="top"><label class="control-label">รหัสไปรษณีย์ : </label></td>
	<td class="font-size"><?php echo $data['zip_code_2']; ?></td>
</tr>
</form>
</table>
</div>
<div class="tab-pane" id="tab_1_4">
<table>
<form role="form" action="#">
<tr>
	<td class="font-size" width="200" valign="top"><label class="control-label">ผู้พิการ : </label></td>
	<td class="font-size">
    <?php
	if($data['d1'] == 1){
		$pikarn = "ความพิการทางการมองเห็น" . "<br>";
	} else {
		$pikarn = "";
	}
	if($data['d2'] == 1){
		$pikarn .= "ความพิการทางการได้ยิน" . "<br>";
	} else {
		$pikarn .= "";
	}
	if($data['d3'] == 1){
		$pikarn .= "ความพิการทางสติปัญญา" . "<br>";
	} else {
		$pikarn .= "";
	}
	if($data['d4'] == 1){
		$pikarn .= "ความพิการทางร่างกายและสุขภาพ" . "<br>";
	} else {
		$pikarn .= "";
	}
	if($data['d5'] == 1){
		$pikarn .= "ความพิการทางการเรียนรู้" . "<br>";
	} else {
		$pikarn .= "";
	}
	if($data['d6'] == 1){
		$pikarn .= "ความพิการทางการพูดและภาษา" . "<br>";
	} else {
		$pikarn .= "";
	}
	if($data['d7'] == 1){
		$pikarn .= "ความพิการทางพฤติกรรมและอารมณ์" . "<br>";
	} else {
		$pikarn .= "";
	}
	if($data['d8'] == 1){
		$pikarn .= "ความพิการทางออทิสติก" . "<br>";
	} else {
		$pikarn .= "";
	}
	if($data['d9'] == 1){
		$pikarn .= "ความพิการทางการซ้ำซ้อน";
	} else {
		$pikarn .= "";
	}
	
	echo $pikarn;
	?>
    </td>
<tr>
</tr>
	<td class="font-size" valign="top"><label class="control-label">ผู้ขาดแคลน : </label></td>
	<td class="font-size">
    <?php
	if($data['l1'] == 1){
		$khad = "ขาดแคลนเครื่องแบบนักเรียน" . "<br>";
	} else {
		$khad = "";
	}
	if($data['l2'] == 1){
		$khad .= "ขาดแคลนเครื่องเขียน" . "<br>";
	} else {
		$khad .= "";
	}
	if($data['l3'] == 1){
		$khad .= "ขาดแคลนแบบเรียน" . "<br>";
	} else {
		$khad .= "";
	}
	if($data['l4'] == 1){
		$khad .= "ขาดแคลนอาหารกลางวัน" . "<br>";
	} else {
		$khad .= "";
	}
	if($data['l5'] == 1){
		$khad .= "ขาดแคลน 3 รายการหรือมากกว่า" . "<br>";
	} else {
		$khad .= "";
	}
	
	echo $khad;
	?>
    </td>
<tr>
<tr>
	<td class="font-size" valign="top"><label class="control-label">ผู้ด้อยโอกาส : </label></td>
	<td class="font-size">
    <?php
	if($data['i1'] == 1){
		$doy = "เด็กถูกบังคับให้ขายแรงงาน" . "<br>";
	} else {
		$doy = "";
	}
	if($data['i2'] == 1){
		$doy .= "เด็กที่อยู่ในธุรกิจทางเพศ" . "<br>";
	} else {
		$doy .= "";
	}
	if($data['i3'] == 1){
		$doy .= "เด็กที่ถูกทอดทิ้ง" . "<br>";
	} else {
		$doy .= "";
	}
	if($data['i4'] == 1){
		$doy .= "เด็กในสถานพินิจและคุ้มครองเยาวชน" . "<br>";
	} else {
		$doy .= "";
	}
	if($data['i5'] == 1){
		$doy .= "เด็กเร่ร่อน" . "<br>";
	} else {
		$doy .= "";
	}
	if($data['i6'] == 1){
		$doy .= "ผลกระทบจากเอดส์" . "<br>";
	} else {
		$doy .= "";
	}
	if($data['i7'] == 1){
		$doy .= "ชนกลุ่มน้อย" . "<br>";
	} else {
		$doy .= "";
	}
	if($data['i8'] == 1){
		$doy .= "เด็กที่ถูกทำร้ายทารุณ" . "<br>";
	} else {
		$doy .= "";
	}
	if($data['i9'] == 1){
		$doy .= "เด็กยากจน";
	} else {
		$doy .= "";
	}
	if($data['i10'] == 1){
		$doy .= "เด็กที่มีปัญหาเกี่ยวกับยาเสพติด";
	} else {
		$doy .= "";
	}
	if($data['i11'] == 1){
		$doy .= "อื่นๆ";
	} else {
		$doy .= "";
	}
	if($data['i12'] == 1){
		$doy .= "กำพร้า";
	} else {
		$doy .= "";
	}
	if($data['i13'] == 1){
		$doy .= "ทำงานรับผิดชอบตนเองและครอบครัว";
	} else {
		$doy .= "";
	}
	
	echo $pikarn;
	?>
    </td>
</tr>
</form>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- BODY -->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<?php include('template_3.php'); ?>