<?php
session_start();
ob_start();
include('autoload.php');
include('mysql_connect.php');
error_reporting( error_reporting() & ~E_NOTICE );
?>
<?php 
	include('template_1.php'); 
?>
<meta charset="utf-8" />
<title>เพิ่ม - บุคคล</title>

<!-- SCRIPT TOP -->
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

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL STYLES -->
<link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN THEME LAYOUT STYLES -->
<link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->

<link rel="shortcut icon" href="favicon.ico" />
<!-- END SCRIPT TOP -->

<!-- ตรวจสอบแป้นพิมพ์ให้พิมพ์ได้เฉพาะตัวเลขเท่านั้น -->
<script src="jquery.min.js"></script>
<script>
$(function(){
	$(document).ready(function(){
		$('#o').hide();
		$('#class').hide();
		$('#room').hide();
	});
	
	$('#position').change(function(){
		if($('#position').val() == "อื่นๆ"){
			$('#o').show();
		} else {
			$('#o').hide();
		}
		
		if($('#position').val() == "หัวหน้า"){
			$('#class').show();
			$('#room').hide();
		} else if($('#position').val() == "ครู"){
			$('#class, #room').show();
		} else {
			$('#class, #room').hide();
		}
	});
});
</script>
<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}
</script>
<!-- END -->

<!-- BEGIN STYLE -->
<style>
.raya {
	margin-left: 0%;
}
.font-size-color {
	color: red;
}
</style>
<!-- END STYLE -->
<?php include('template_2.php'); ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<div class="page-content">
<div class="page-head">
<div class="page-title">
	<h1>เพิ่ม - บุคลากร
		<?php
			$sql = "SELECT school_name_th FROM school WHERE school_id = '$_SESSION[school_id]'";
			$result = mysqli_query($link, $sql);
			$school = mysqli_fetch_assoc($result);
		?>
		<small><?php echo $school['school_name_th']; ?></small>
	</h1>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="profile-sidebar">
<div class="portlet light profile-sidebar-portlet bordered">
	<!-- BEGIN FORM-->
	<form method="post" name="form1" enctype="multipart/form-data"><!--  class="form-horizontal" id="form_sample_1" -->
	<div class="form-group" style="margin: -20px 10px 10px 10px">
	<div class="fileinput fileinput-new" data-provides="fileinput">
	<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
		<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
	</div>
	<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
	<div>
		<span class="btn default btn-file">
		<span class="fileinput-new"> Select image </span>
		<span class="fileinput-exists"> Change </span>
			<input type="file" name="img">
		</span>
		<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
	</div>
	</div>
	<div class="clearfix margin-top-10">
		<span class="label label-danger">NOTE! </span>
		<span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
	</div>
	</div>
</div>
</div>
<div class="profile-content">
<div class="row">
<div class="col-md-12">
<div class="portlet light bordered">
<!-- BEGIN TAB MENU -->
<div class="portlet-title tabbable-line">
<div class="caption caption-md">
	<i class="icon-globe theme-font hide"></i>
	<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
</div>
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab_1_1" data-toggle="tab">ข้อมูลทั่วไป</a>
	</li>
	<li>
		<a href="#tab_1_2" data-toggle="tab">ข้อมูลของบุคลากร</a>
	</li>
	<li>
		<a href="#tab_1_3" data-toggle="tab">Username</a>
	</li>
    <li>
		<button type="submit" name="general" class="btn btn-sm blue">เพิ่ม</button>
	</li>
</ul>
</div>
<!-- END TAB MENU -->
<div class="portlet-body">
<div class="tab-content">
<!-- BEGIN TAB 1 -->
<div class="tab-pane active" id="tab_1_1">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ข้อมูลทั่วไป - บุคลากร</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
    <?php
		//สร้างตัวแปร
		$general = $_POST['general'];
		$_COOKIE['sub_name'] = $_POST['sub_name'];
		$_COOKIE['graduated_major'] = $_POST['graduated_major'];
		$_COOKIE['extra_work'] = $_POST['extra_work'];
		$_COOKIE['special_expertise'] = $_POST['special_expertise'];
		$_COOKIE['class'] = $_POST['class'];
		$_COOKIE['position_at'] = $_POST['position_at'];
		$_COOKIE['position_o'] = $_POST['position_o'];
		
		//เช็คเงื่อนไขเมื่อค่าตัวแปรนี้มีอยู่จริง
		if (isset($general)) {
			//ตรวจสอบคำนำหน้า
			if($_COOKIE['sub_name'] == "เลือก"){
				$validation = "<li>" . "กรุณาเลือกคำนำหน้า" . "</li>";
				$prefix_validation = "กรุณาเลือกคำนำหน้า";
				$validation_prefix = FALSE;
			} else {
				$validation_prefix = TRUE;
			}
			
			//ตรวจสอบภาษาไทย
			$thai_pattern = "/^[a-zA-Z0-9]+$/i";
			//ตรวจสอบชื่อ(ให้กรอกเป็นภาษาไทย)
			$_COOKIE['first_name_th'] = $_POST['first_name_th'];
			if (!$_COOKIE['first_name_th'] == "") {
				if (preg_match($thai_pattern, $_COOKIE['first_name_th'])) {
					$validation .= "<li>" . "กรุณากรอกชื่อเป็นภาษาไทย ก-ฮ ไม่เกิน 100 ตัวอักษร" . "</li>";
					$first_name_th_validation = "กรุณากรอกชื่อเป็นภาษาไทย ก-ฮ ไม่เกิน 100 ตัวอักษร";
					$validation_first_name_th = FALSE;
				} else {
					$validation_first_name_th = TRUE;
				}
			} else {
				$validation .= "<li>" . "กรุณากรอกชื่อ(ภาษาไทย)" . "</li>";
				$first_name_th_validation = "กรุณากรอกชื่อ(ภาษาไทย)";
				$validation_first_name_th = FALSE;
			}
			
			//ตรวจสอบนามสกุล(ให้กรอกเป็นภาษไทย)
			$_COOKIE['last_name_th'] = $_POST['last_name_th'];
			if (!$_COOKIE['last_name_th'] == "") {
				if (preg_match($thai_pattern, $_COOKIE['last_name_th'])) {
					$validation .= "<li>" . "กรุณากรอกนามสกุลเป็นภาษาไทย ก-ฮ ไม่เกิน 100 ตัวอักษร" . "</li>";
					$last_name_th_validation = "กรุณากรอกนามสกุลเป็นภาษาไทย ก-ฮ ไม่เกิน 100 ตัวอักษร";
					$validation_last_name_th = FALSE;
				} else {
					$validation_last_name_th = TRUE;
				}
			} else {
				$validation .= "<li>" . "กรุณากรอกนามสกุล(ภาษาไทย)" . "</li>";
				$last_name_th_validation = "กรุณากรอกนามสกุล(ภาษาไทย)";
				$validation_last_name_th = FALSE;
			}
			
			//ตรวจสอบชื่อ(ให้กรอกเป็นภาษาอังกฤษ)
			$_COOKIE['first_name_en'] = $_POST['first_name_en'];
			if (!$_COOKIE['first_name_en'] == "") {
				if (!preg_match($thai_pattern, $_COOKIE['first_name_en'])) {
					$validation .= "<li>" . "กรุณากรอกชื่อเป็นภาษาอังกฤษ A-Z ไม่เกิน 100 ตัวอักษร" . "</li>";
					$first_name_en_validation = "กรุณากรอกชื่อเป็นภาษาอังกฤษ A-Z ไม่เกิน 100 ตัวอักษร";
					$validation_first_name_en = FALSE;
				} else {
					$validation_first_name_en = TRUE;
				}
			} else {
				$validation .= "<li>" . "กรุณากรอกชื่อ(ภาษาอังกฤษ)" . "</li>";
				$first_name_en_validation = "กรุณากรอกชื่อ(ภาษาอังกฤษ)";
				$validation_first_name_en = FALSE;
			}
			
			//ตรวจสอบนามสกุล(ให้กรอกเป็นภาษอังกฤษ)
			$_COOKIE['last_name_en'] = $_POST['last_name_en'];
			if (!$_COOKIE['last_name_en'] == "") {
				if (!preg_match($thai_pattern, $_COOKIE['last_name_en'])) {
					$validation .= "<li>" . "กรุณากรอกนามสกุลเป็นภาษาอังกฤษ A-Z ไม่เกิน 100 ตัวอักษร" . "</li>";
					$last_name_en_validation = "กรุณากรอกนามสกุลเป็นภาษาอังกฤษ A-Z ไม่เกิน 100 ตัวอักษร";
					$validation_last_name_en = FALSE;
				} else {
					$validation_last_name_en = TRUE;
				}
			} else {
				$validation .= "<li>" . "กรุณากรอกนามสกุล(ภาษาอังกฤษ)" . "</li>";
				$last_name_en_validation = "กรุณากรอกนามสกุล(ภาษาอังกฤษ)";
				$validation_last_name_en = FALSE;
			}
			
			//ตรวจสอบเพศ
			$_COOKIE['gender'] = $_POST['gender'];
			if ($_COOKIE['gender'] == "เลือก") {
				$validation .= "<li>" . "กรุณาเลือกเพศ" . "</li>";
				$gender_validation = "กรุณาเลือกเพศ";
				$validation_gender = FALSE;
			} else {
				$validation_gender = TRUE;
			}
			
			//ตรวจสอบวัน/เดือน/ปี(เกิด)
			$_COOKIE['birthday_at'] = $_POST['birthday_at'];
			if ($_COOKIE['birthday_at'] == "") {
				$validation .= "<li>" . "กรุณาเลือก วัน/เดือน/ปี(เกิด)" . "</li>";
				$birthday_validation = "กรุณาเลือก วัน/เดือน/ปี(เกิด)";
				$validation_birthday = FALSE;
			} else {
				$validation_birthday = TRUE;
			}
			
			//ตรวจสอบเลขบัตรประชาชนหรือตัวเลขต่างๆ ที่มีจำนวน 13 หลัก
			$numberic_pattern = "/^[0-9]{13}$/";
			//ตรวจสอบรหัสบัตรประชาชน
			$_COOKIE['id_card'] = $_POST['id_card'];
			if ($_COOKIE['id_card'] == "") {
				$validation .= "<li>" . "กรุณากรอกรหัสบัตรประชาชน" . "</li>";
				$id_card_validation = "กรุณากรอกรหัสบัตรประชาชนเป็นตัวเลข จำนวน 13 หลัก";
				$validation_id_card = FALSE;
			} else {
				if (!preg_match($numberic_pattern, $_COOKIE['id_card'])) {
					$validation .= "<li>" . "กรุณากรอกรหัสบัตรประชาชนให้ถูกต้อง" . "</li>";
					$id_card_validation = "กรุณากรอกรหัสบัตรประชาชนให้ถูกต้อง";
					$validation_id_card = FALSE;
				} else {
					$sql = "SELECT id_card FROM personnel WHERE id_card = '$_COOKIE[id_card]'";
					$result = mysqli_query($link, $sql);
					$data = mysqli_num_rows($result);
					if ($data == 1) {
						$validation .= "<li>" . "รหัสบัตรประชาชนนี้ถูกใช้งานแล้ว" . "</li>";
						$id_card_validation = "รหัสบัตรประชาชนนี้ถูกใช้งานแล้ว";
						$validation_id_card = FALSE;
					} else {
						$validation_id_card = TRUE;
					}
				}
			}
			
			//ตรวจสอบเบอร์โทรศัพท์หรือตัวเลขต่างๆ ที่มีจำนวนตัวอักษรตั้งแต่ 9 - 10 หลัก
			$tel_pattern = "/^0[2689]{1}[0-9]{8,9}/";
			//ตรวจสอบเบอร์โทรศัพท์
			$_COOKIE['tel'] = $_POST['tel'];
			if ($_COOKIE['tel'] == "") {
				$validation .= "<li>" . "กรุณากรอกหมายเลขโทรศัพท์" . "</li>";
				$tel_validation = "กรุณากรอกหมายเลขโทรศัพท์";
				$validation_tel = FALSE;
			} else {
				if (!preg_match($tel_pattern, $_COOKIE['tel'])) {
					$validation .= "<li>" . "กรุณากรอกหมายเลขโทรศัพท์ให้ถูกต้อง" . "</li>";
					$tel_validation = "กรุณากรอกหมายเลขโทรศัพท์ให้ถูกต้อง" . "</li>";
					$validation_tel = FALSE;
				} else {
					$validation_tel = TRUE;
				}
			}
			
			//ตรวจสอบวุฒิการศึกษาสูงสุด
			$_COOKIE['graduated'] = $_POST['graduated'];
			if ($_COOKIE['graduated'] == "เลือก") {
				$validation .= "<li>" . "กรุณาเลือกวุฒิการศึกษาสูงสุด" . "</li>";
				$graduated_validation = "กรุณาเลือกวุฒิการศึกษาสูงสุด";
				$validation_graduated = FALSE;
			} else {
				$validation_graduated = TRUE;
			}
			
			//ตรวจสอบรหัสบุคลากร
			$_COOKIE['personnel_id'] = $_POST['personnel_id'];
			if($_COOKIE['personnel_id'] == ""){
				$form2 = "<li>" . "กรุณากรอกรหัสบุคลากร" . "</li>";
				$personnel_id_validation = "กรุณากรอกรหัสบุคลากร";
				$validation_personnel_id = FALSE;
			} else {
				$sql = "SELECT * FROM personnel WHERE school_id = '$_SESSION[school_id]' and personnel_id = '$_COOKIE[personnel_id]'";
				$result = mysqli_query($link, $sql);
				$data = mysqli_num_rows($result);
				
				if($data == 1){
					$form2 = "<li>" . "รหัสบุคลากรนี้ถูกใช้งานแล้ว" . "</li>";
					$personnel_id_validation = "รหัสบุคลากรนี้ถูกใช้งานแล้ว";
					$validation_personnel_id = FALSE;
				} else {
					$validation_personnel_id = TRUE;
				}
			}
			
			$user_pattern = "/^[a-zA-Z0-9]{8,20}$/i";
			//ตรวจสอบ Username
			$_COOKIE['username'] = $_POST['username'];
			if($_COOKIE['username'] == ""){
				$form3 = "<li>" . "กรุณากรอก Username" . "</li>";
				$username_validation = "กรุณากรอก Username" . "</li>";
				$validation_username = FALSE;
			} else {
				if(!preg_match($thai_pattern, $_COOKIE['username'])){
					$form3 = "<li>" . "กรุณากรอก Username 8 - 20 เป็นภาษาอังกฤษหรือตัวเลข" . "</li>";
					$username_validation = "กรุณากรอก Username 8 - 20 เป็นภาษาอังกฤษหรือตัวเลข" . "</li>";
					$validation_username = FALSE;
				} else {
					$validation_username = TRUE;
				}
			}
			$_COOKIE['retype_password'] = $_POST['retype_password'];
			//ตรวจสอบ Password
			$_COOKIE['password'] = $_POST['password'];
			if($_COOKIE['password'] == ""){
				$form3 .= "<li>" . "กรุณากรอก password" . "</li>";
				$password_validation = "กรุณากรอก password" . "</li>";
				$validation_password = FALSE;
			} else if($_COOKIE['password'] != $_COOKIE['retype_password']) {
				$form3 .= "<li>" . "รหัสผ่านไม่ตรงกัน" . "</li>";
				$password_validation = "รหัสผ่านไม่ตรงกัน" . "</li>";
				$validation_password = FALSE;
			} else {
				if(!preg_match($thai_pattern, $_COOKIE['password'])){
					$form3 .= "<li>" . "กรุณากรอก Password 8 - 20 ตัวอักษร เป็นภาษาอังกฤษหรือตัวเลข" . "</li>";
					$password_validation = "กรุณากรอก Password 8 - 20 ตัวอักษร เป็นภาษาอังกฤษหรือตัวเลข" . "</li>";
					$validation_password = FALSE;
				} else {
					$validation_password = TRUE;
				}
			}
			
			//ตรวจสอบ RE-TYPE Password
			if(!$_COOKIE['retype_password'] == ""){
				if($_COOKIE['password'] == ""){
					$form3 .= "<li>" . "กรุณากรอก password ก่อน" . "</li>";
					$retype_password_validation = "กรุณากรอก password ก่อน" . "</li>";
					$validation_retype_password = FALSE;
				} else {
					if(!preg_match($user_pattern, $_COOKIE['retype_password'])){
						$form3 .= "<li>" . "กรุณากรอก Password 8 - 20 ตัวอักษร เป็นภาษาอังกฤษหรือตัวเลข" . "</li>";
						$retype_password_validation = "กรุณากรอก Password 8 - 20 ตัวอักษร เป็นภาษาอังกฤษหรือตัวเลข";
						$validation_retype_password = FALSE;
					} else {
						if($_COOKIE['password'] != $_COOKIE['retype_password']){
							$retype_password_validation = "รหัสผ่านไม่ตรงกัน";
							$validation_retype_password = FALSE;
						} else {
							$validation_retype_password = TRUE;
						}
					}
				}
			}
			
			//ตรวจสอบรหัสบุคลากร
			$_COOKIE['personnel_id'] = $_POST['personnel_id'];
			if($_COOKIE['personnel_id'] == ""){
				$form2 = "<li>" . "กรุณากรอกรหัสบุคลากร" . "</li>";
				$personnel_id_validation = "กรุณากรอกรหัสบุคลากร";
				$validation_personnel_id = FALSE;
			} else {
				$sql = "SELECT * FROM personnel WHERE school_id = '$_SESSION[school_id]' and personnel_id = '$_COOKIE[personnel_id]'";
				$result = mysqli_query($link, $sql);
				$data = mysqli_num_rows($result);
				
				if($data == 1){
					$form2 = "<li>" . "รหัสบุคลากรนี้ถูกใช้งานแล้ว" . "</li>";
					$personnel_id_validation = "รหัสบุคลากรนี้ถูกใช้งานแล้ว";
					$validation_personnel_id = FALSE;
				} else {
					$validation_personnel_id = TRUE;
				}
			}
			
			//ตรวจสอบประเภทบุคลากร
			$_COOKIE['type_personnel'] = $_POST['type_personnel'];
			if($_COOKIE['type_personnel'] == "เลือก"){
				$form2 .= "<li>" . "กรุณาเลือกประเภทบุคลากร" . "</li>";
				$type_personnel_validation = "กรุณาเลือกประเภทบุคลากร";
				$validation_type_personnel = FALSE;
			} else {
				$validation_type_personnel = TRUE;
			}
			
			//ตรวจสอบรหัสตำแหน่ง
			$_COOKIE['position_id'] = $_POST['position_id'];
			if($_COOKIE['position_id'] == ""){
				$form2 .= "<li>" . "กรุณากรอกรหัสตำแหน่ง" . "</li>";
				$position_id_validation = "กรุณากรอกรหัสตำแหน่ง";
				$validation_position_id = FALSE;
			} else {
				$sql = "SELECT position_id FROM personnel WHERE position_id = '$_COOKIE[position_id]'";
				$result = mysqli_query($link, $sql);
				$data = mysqli_num_rows($result);
				
				if($data == 1){
					$form2 .= "<li>" . "รหัสตำแหน่งนี้ถูกใช้งานแล้ว" . "</li>";
					$position_id_validation = "รหัสตำแหน่งนี้ถูกใช้งานแล้ว";
					$validation_position_id = FALSE;
				} else {
					$validation_position_id = TRUE;
				}
			}
			
			//ตรวจสอบตำแหน่ง
			$_COOKIE['position'] = $_POST['position'];
			if($_COOKIE['position'] == "เลือก"){
				$form2 .= "<li>" . "กรุณาเลือกตำแหน่งงาน" . "</li>";
				$position_validation = "กรุณาเลือกตำแหน่งงาน";
				$validation_position = FALSE;
			} else {
				$validation_position = TRUE;
			}
			
			//ตรวจสอบวิทยฐานะ
			$_COOKIE['academic_standing'] = $_POST['academic_standing'];
			
			//ตรวจสอบเงินเดือน
			$_COOKIE['salary'] = $_POST['salary'];
			if($_COOKIE['salary'] == ""){
				$form2 .= "<li>" . "กรุณาระบุเงินเดือน" . "</li>";
				$salary_validation = "กรุณาระบุเงินเดือน";
				$validation_salary = FALSE;
			} else {
				$validation_salary = TRUE;
			}
			
			//ตรวจสอบจำนวนห้อง
			$sql = "SELECT room FROM room WHERE school_id = '$_SESSION[school_id]'";
			$result = mysqli_query($link, $sql);
			$data = mysqli_fetch_assoc($result);
			$_COOKIE['room'] = $_POST['room'];
			if(!$_POST['room'] == ""){
				if($_COOKIE['class'] == "-- เลือก --"){
					$form2 .= "<li>" . "กรุณาเลือกชั้นเรียนก่อน" . "</li>";
					$room_validation = "กรุณาเลือกชั้นเรียนก่อน";
					$validation_salary = FALSE;
				} else {
					if($_COOKIE['room'] <= $data['room']){
						$validation_room = TRUE;
					} else {
						$form2 .= "<li>" . "จำนวนห้องเรียนของชั้น " . $_COOKIE['class'] . " มีแค่ " . $data['room'] . " ห้อง" . "</li>";
						$room_validation = "จำนวนห้องเรียนของชั้น " . $_COOKIE['class'] . " มีแค่ " . $data['room'] . " ห้อง";
						$validation_room = FALSE;
					}
				}
			}
			
			//ตรวจสอบความถูกต้องทั้งหมด
			if ($validation_prefix == FALSE || $validation_first_name_th == FALSE || $validation_last_name_th == FALSE || $validation_first_name_en == FALSE || $validation_last_name_en == FALSE || $validation_gender == FALSE || $validation_birthday == FALSE || $validation_id_card == FALSE || $validation_tel == FALSE || $validation_graduated == FALSE) {
				echo "<div class='alert alert-danger'>";
				echo "<button class='close' data-close='alert'></button>";
				echo "<ul>เกิดข้อผิดผลาด";
				echo $validation;
				echo "</ul>";
				echo "</div>";
			} else if ($validation_prefix == TRUE && $validation_first_name_th == TRUE && $validation_last_name_th == TRUE && $validation_first_name_en == TRUE && $validation_last_name_en == TRUE && $validation_gender == TRUE && $validation_birthday == TRUE && $validation_id_card == TRUE && $validation_tel == TRUE && $validation_graduated == TRUE && $validation_personnel_id == TRUE && $validation_type_personnel == TRUE && $validation_position_id == TRUE && $validation_position == TRUE && $validation_salary == TRUE && $validation_username == TRUE && $validation_password == TRUE && $validation_retype_password == TRUE) {
				
				//เพิ่มข้อมูลเข้าฐานข้อมูล
				if(is_uploaded_file($_FILES['photo']['tmp_name'])){
					$ext = pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);
					$filename = "photo/" . $_POST['id_card'] . "." . $ext;
				} else {
					$filename = "";
				}
				
				//ตัวแปรค่า VALUE บุคลากร
				$personnel = "'" . $_COOKIE['id_card'] . "',";
				$personnel .= "'" . $_COOKIE['personnel_id'] . "',";
				$personnel .= "'" . $_COOKIE['sub_name'] . "',";
				$personnel .= "'" . $_COOKIE['first_name_th'] . "',";
				$personnel .= "'" . $_COOKIE['last_name_th'] . "',";
				$personnel .= "'" . $_COOKIE['first_name_en'] . "',";
				$personnel .= "'" . $_COOKIE['last_name_en'] . "',";
				$personnel .= "'" . $_COOKIE['gender'] . "',";
				$personnel .= "'" . $_COOKIE['birthday_at'] . "',";
				$personnel .= "'" . $_SESSION['school_id'] . "',";
				$personnel .= "'" . $_COOKIE['type_personnel'] . "',";
				
				if($_POST['position'] != "อื่นๆ"){
					$positon_o = "'" . $_COOKIE['position'] . "',";
				} else {
					$positon_o = "'" . $_COOKIE['position_o'] . "',";
				}
				
				$personnel .= $positon_o;
				$personnel .= "'" . $_COOKIE['academic_standing'] . "',";
				$personnel .= "'" . $_COOKIE['position_id'] . "',";
				$personnel .= "'" . $_COOKIE['graduated'] . "',";
				$personnel .= "'" . $_COOKIE['graduated_major'] . "',";
				$personnel .= "'" . $_COOKIE['position_at'] . "',";
				$personnel .= "'" . $_COOKIE['tel'] . "',";
				$personnel .= "'" . $_COOKIE['extra_work'] . "',";
				$personnel .= "'" . $_COOKIE['salary'] . "',";
				$personnel .= "'" . $_COOKIE['special_expertise'] . "',";
				$personnel .= "'" . $_COOKIE['class'] . "',";
				$personnel .= "'" . $_COOKIE['room'] . "',";
				$personnel .= "'" . $filename . "'";
				
				//เช็ค สิทธิ์
				if($_COOKIE['position'] == "ผู้อำนวยการ" || $_COOKIE['position'] == "รองผู้อำนวยการ"){
					$position = "director";
				} else if($_COOKIE['position'] == "ธุรการ"){
					$position = "administration";
				} else if($_COOKIE['position'] == "หัวหน้า"){
					$position = "chief";
				} else if($_COOKIE['position'] == "ครู"){
					$position = "teacher";
				}
				
				//ตัวแปร VALUE Username
				$username = "'" . strtolower($_COOKIE['username']) . "',";
				$username .= "'" . $_COOKIE['password'] . "',";
				$username .= "'" . $position . "',";
				$username .= "'" . $_COOKIE['id_card'] . "'";
				
				//เพิ่มบุคลากร
				$sql = "INSERT INTO personnel (id_card, personnel_id, sub_name, first_name_th, last_name_th, first_name_en, last_name_en, gender, birthday_at, school_id, type_personnel, position, academic_standing, position_id, graduated, graduated_major, position_at, tel, extra_work, salary, special_expertise, class, room, photo)values($personnel)";
				$result = mysqli_query($link, $sql);
				
				//เพิ่ม Username
				$sql = "INSERT INTO login (username, password, role, id_card)values($username)";
				$result = mysqli_query($link, $sql);
				
				move_uploaded_file($_FILES['photo']['tmp_name'],$filename);
				
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลถูกบันทึกแล้ว";
				echo "</div>";
			} else {
				
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลครบถ้วน";
				echo "</div>";
			}
		}
	?> 
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">คำนำหน้า
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="sub_name">
			<option value="เลือก">-- เลือก --</option>
			<option value="นาย" <?php if($_COOKIE['sub_name'] == "นาย"){ echo "selected"; } ?>>นาย</option>
			<option value="นาง" <?php if($_COOKIE['sub_name'] == "นาง"){ echo "selected"; } ?>>นาง</option>
			<option value="นางสาว" <?php if($_COOKIE['sub_name'] == "นางสาว"){ echo "selected"; } ?>>นางสาว</option>
            <option value="ศาสตราจารย์" <?php if($_COOKIE['sub_name'] == "ศาสตราจารย์"){ echo "selected"; } ?>>ศาสตราจารย์</option>
            <option value="ผู้ช่วยศาสตราจารย์" <?php if($_COOKIE['sub_name'] == "ผู้ช่วยศาสตราจารย์"){ echo "selected"; } ?>>ผู้ช่วยศาสตราจารย์</option>
            <option value="รองศาสตราจารย์" <?php if($_COOKIE['sub_name'] == "รองศาสตราจารย์"){ echo "selected"; } ?>>รองศาสตราจารย์</option>
            <option value="หม่อมหลวง" <?php if($_COOKIE['sub_name'] == "หม่อมหลวง"){ echo "selected"; } ?>>หม่อมหลวง</option>
            <option value="หม่อมราชวงค์" <?php if($_COOKIE['sub_name'] == "หม่อมราชวงค์"){ echo "selected"; } ?>>หม่อมราชวงค์</option>
            <option value="หม่อมเจ้า" <?php if($_COOKIE['sub_name'] == "หม่อมเจ้า"){ echo "selected"; } ?>>หม่อมเจ้า</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $prefix_validation . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อ<small>(ภาษาไทย)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="first_name_th" value="<?php echo $_COOKIE['first_name_th']; ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $first_name_th_validation . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุล<small>(ภาษาไทย)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="last_name_th" maxlength="100" value="<?php echo $_COOKIE['last_name_th']; ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $last_name_th_validation . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อ<small>(ภาษาอังกฤษ)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_COOKIE['first_name_en']; ?>" placeholder="" name="first_name_en" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $first_name_en_validation . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุล<small>(ภาษาอังกฤษ)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_COOKIE['last_name_en']; ?>" placeholder="" name="last_name_en" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $last_name_en_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เพศ
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="gender">
			<option value="เลือก">-- เลือก --</option>
			<option value="ชาย" <?php if($_COOKIE['gender'] == "ชาย"){ echo "selected"; } ?>>ชาย</option>
            <option value="หญิง" <?php if($_COOKIE['gender'] == "หญิง"){ echo "selected"; } ?>>หญิง</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $gender_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
    	<label class="col-md-3 control-label">วัน/เดือน/ปี
        	<small>(เกิด)</small>
            <span class="required">*</span>
        </label>
    <div class="col-md-9">
    <div class="input-group date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
    	<span class="input-group-btn">
    		<button class="btn default" type="button">
    			<i class="fa fa-calendar"></i>
    		</button>
    	</span>
    	<input name="birthday_at" type="text" value="<?php echo $_COOKIE['birthday_at']; ?>" class="form-control" readonly>
    </div>
    	<span class="help-block"> เลือกวัน/เดือน/ปี </span>
        <?php echo "<span class=font-size-color>" . $birthday_validation . "</span>"; ?>
    </div>
    </div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เลขบัตรประชาชน 
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_COOKIE['id_card']; ?>" placeholder="" name="id_card" maxlength="13" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $id_card_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เบอร์โทรศัพท์ 
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_COOKIE['tel']; ?>" placeholder="" name="tel" maxlength="10" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $tel_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">วุฒิการศึกษาสูงสุด
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="graduated">
			<option value="เลือก">-- เลือก --</option>
			<option value="มัธยมศึกษาตอนปลาย" <?php if($_COOKIE['graduated'] == "มัธยมศึกษาตอนปลาย"){ echo "selected"; } ?>>มัธยมศึกษาตอนปลาย</option>
			<option value="ประกาศนียบัตรวิชาชีพ" <?php if($_COOKIE['graduated'] == "ประกาศนียบัตรวิชาชีพ"){ echo "selected"; } ?>>ประกาศนียบัตรวิชาชีพ</option>
			<option value="ประกาศนียบัตรวิชาชีพชั้นสูง" <?php if($_COOKIE['graduated'] == "ประกาศนียบัตรวิชาชีพชั้นสูง"){ echo "selected"; } ?>>ประกาศนียบัตรวิชาชีพชั้นสูง</option>
            <option value="ปริญญาตรี" <?php if($_COOKIE['graduated'] == "ปริญญาตรี"){ echo "selected"; } ?>>ปริญญาตรี</option>
            <option value="ปริญญาโท" <?php if($_COOKIE['graduated'] == "ปริญญาโท"){ echo "selected"; } ?>>ปริญญาโท</option>
            <option value="ปริญญาเอก" <?php if($_COOKIE['graduated'] == "ปริญญาเอก"){ echo "selected"; } ?>>ปริญญาเอก</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $graduated_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">วิชาเอก</label>
	<div class="col-md-9">
		<textarea class="form-control maxlength_defaultconfig" name="graduated_major" rows="3" maxlength="255"><?php echo $_COOKIE['graduated_major']; ?></textarea>
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">งานพิเศษอื่นๆ</label>
	<div class="col-md-9">
		<textarea class="form-control maxlength_defaultconfig" name="extra_work" rows="3" maxlength="255"><?php echo $_COOKIE['extra_work']; ?></textarea>
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ความชำนาญพิเศษ</label>
	<div class="col-md-9">
		<textarea class="form-control maxlength_defaultconfig" name="special_expertise" rows="3" maxlength="255"><?php echo $_COOKIE['special_expertise']; ?></textarea>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	</div>
	<div class="form-actions">
	<div class="row">
	<div class="col-md-offset-3 col-md-9">
	</div>
	</div>
	</div>
</div>
</div>
<!-- END TAB 1 -->

<!-- TAB 2 -->
<div class="tab-pane" id="tab_1_2">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ข้อมูลทั่วไป - บุคลากร</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
    <?php
		//เช็คเงื่อนไขเมื่อค่าตัวแปรนี้มีอยู่จริง
		if (isset($general)) {
			
			//ตรวจสอบความถูกต้องทั้งหมด
			if ($validation_personnel_id == FALSE || $validation_type_personnel == FALSE || $validation_position_id == FALSE || $validation_position == FALSE || $validation_salary == FALSE) {
				echo "<div class='alert alert-danger'>";
				echo "<button class='close' data-close='alert'></button>";
				echo "<ul>เกิดข้อผิดผลาด";
				echo $form2;
				echo "</ul>";
				echo "</div>";
			} else if ($validation_prefix == TRUE && $validation_first_name_th == TRUE && $validation_last_name_th == TRUE && $validation_first_name_en == TRUE && $validation_last_name_en == TRUE && $validation_gender == TRUE && $validation_birthday == TRUE && $validation_id_card == TRUE && $validation_tel == TRUE && $validation_graduated == TRUE && $validation_personnel_id == TRUE && $validation_type_personnel == TRUE && $validation_position_id == TRUE && $validation_position == TRUE && $validation_salary == TRUE && $validation_username == TRUE && $validation_password == TRUE && $validation_retype_password == TRUE) {
				
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลถูกบันทึกแล้ว";
				echo "</div>";
			} else {
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลครบถ้วน";
				echo "</div>";
			}
		}
	?> 
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อโรงเรียน
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="school_name_th" value="<?php echo $school['school_name_th']; ?>" maxlength="100" readonly>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสโรงเรียน
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="school_id" maxlength="100" value="<?php echo $_SESSION['school_id']; ?>" readonly>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสบุคลากร
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_COOKIE['personnel_id']; ?>" placeholder="" name="personnel_id" maxlength="20" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $personnel_id_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ประเภทบุคลากร
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="type_personnel">
			<option value="เลือก">-- เลือก --</option>
			<option value="ผู้บริหาร" <?php if($_COOKIE['type_personnel'] == "ผู้บริหาร"){ echo "selected"; } ?>>ผู้บริหาร</option>
			<option value="ครู" <?php if($_COOKIE['type_personnel'] == "ครู"){ echo "selected"; } ?>>ครูอัตราจ้าง</option>
			<option value="บุคคลภายนอกที่ไม่ใช่ครู" <?php if($_COOKIE['type_personnel'] == "บุคคลภายนอกที่ไม่ใช่ครู"){ echo "selected"; } ?>>บุคคลภายนอกที่ไม่ใช่ครู</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $type_personnel_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสตำแหน่ง
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_COOKIE['position_id']; ?>" placeholder="" name="position_id" maxlength="20" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $position_id_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ตำแหน่ง
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="position" id="position">
			<option value="เลือก">-- เลือก --</option>
			<option value="ผู้อำนวยการ" <?php if($_COOKIE['position'] == "ผู้อำนวยการ"){ echo "selected"; } ?>>ผู้อำนวยการ</option>
			<option value="รองผู้อำนวยการ" <?php if($_COOKIE['position'] == "รองผู้อำนวยการ"){ echo "selected"; } ?>>รองผู้อำนวยการ</option>
            <option value="ธุรการ" <?php if($_COOKIE['position'] == "ธุรการ"){ echo "selected"; } ?>>ธุรการ</option>
			<option value="หัวหน้า" <?php if($_COOKIE['position'] == "หัวหน้า"){ echo "selected"; } ?>>หัวหน้า</option>
            <option value="ครู" <?php if($_COOKIE['position'] == "ครู"){ echo "selected"; } ?>>ครู</option>
			<option value="อื่นๆ" <?php if($_COOKIE['position'] == "อื่นๆ"){ echo "selected"; } ?>>อื่นๆ</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $position_validation . "</span>"; ?>
	</div>
	</div>
		<div class="form-group form-md-line-input" id="o">
			<label class="col-md-3 control-label raya" for="form_control_1">อื่นๆ
				<span class="required">*</span>
			</label>
			<div class="col-md-9">
				<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_COOKIE['position_o']; ?>" placeholder="ระบุตำแหน่งอื่นๆ" name="position_o" maxlength="20">
				<div class="form-control-focus"> </div>
			</div>
		</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">วิทยฐานะ
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="academic_standing">
			<option value="">-- เลือก --</option>
			<option value="ผู้ช่วย" <?php if($_COOKIE['academic_standing'] == "ผู้ช่วย"){ echo "selected"; } ?>>ผู้ช่วย</option>
			<option value="ผู้ชำนาญ" <?php if($_COOKIE['academic_standing'] == "ผู้ชำนาญ"){ echo "selected"; } ?>>ผู้ชำนาญ</option>
			<option value="ผู้ชำนาญพิเศษ" <?php if($_COOKIE['academic_standing'] == "ผู้ชำนาญพิเศษ"){ echo "selected"; } ?>>ผู้ชำนาญพิเศษ</option>
            <option value="ผู้เชี่ยวชาญพิเศษ" <?php if($_COOKIE['academic_standing'] == "ผู้เชี่ยวชาญพิเศษ"){ echo "selected"; } ?>>ผู้เชี่ยวชาญพิเศษ</option>
		</select>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	<div id="class">
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชั้น
        </label>
	<div class="col-md-9">
		<select class="form-control" name="class">
        	<option value="">-- เลือก --</option>
        <?php
			$sql = "SELECT DISTINCT(class) FROM room WHERE school_id = '$_SESSION[school_id]'";
			$result = mysqli_query($link, $sql);
			while($data = mysqli_fetch_array($result)){
				echo "<option value='$data[class]' ";
				if($_COOKIE['class'] == $data['class']){
					echo "selected";
				}
				echo ">$data[class]</option>";
			}
        ?>
		</select>
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input" id="room">
		<label class="col-md-3 control-label raya" for="form_control_1">ห้อง
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_COOKIE['room']; ?>" placeholder="" name="room" maxlength="3" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $room_validation . "</span>"; ?>
	</div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เงินเดือน
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_COOKIE['salary']; ?>" placeholder="" name="salary" maxlength="20" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $salary_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
    	<label class="col-md-3 control-label">วัน/เดือน/ปี
        	<small>(ที่บรรจุ)</small>
        </label>
    <div class="col-md-9">
    <div class="input-group date date-picker" data-date="<?php date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
    	<span class="input-group-btn">
    		<button class="btn default" type="button">
    			<i class="fa fa-calendar"></i>
    		</button>
    	</span>
    	<input name="position_at" type="text" value="<?php echo $_COOKIE['position_at']; ?>" class="form-control" readonly>
    </div>
    	<span class="help-block"> เลือกวัน/เดือน/ปี </span>
    </div>
    </div>
	</div>
</div>
</div>
<!-- END TAB 2 -->
<!-- BEGIN TAB 3 -->
<div class="tab-pane" id="tab_1_3">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">กำหนด Username - บุคลากร</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
    <?php
		//เช็คเงื่อนไขเมื่อค่าตัวแปรนี้มีอยู่จริง
		if (isset($general)) {
			//ตรวจสอบความถูกต้องทั้งหมด
			if ($validation_username == FALSE || $validation_password == FALSE || $validation_retype_password == FALSE) {
				echo "<div class='alert alert-danger'>";
				echo "<button class='close' data-close='alert'></button>";
				echo "<ul>เกิดข้อผิดผลาด";
				echo $form3;
				echo "</ul>";
				echo "</div>";
			} else if ($validation_prefix == TRUE && $validation_first_name_th == TRUE && $validation_last_name_th == TRUE && $validation_first_name_en == TRUE && $validation_last_name_en == TRUE && $validation_gender == TRUE && $validation_birthday == TRUE && $validation_id_card == TRUE && $validation_tel == TRUE && $validation_graduated == TRUE && $validation_personnel_id == TRUE && $validation_type_personnel == TRUE && $validation_position_id == TRUE && $validation_position == TRUE && $validation_salary == TRUE && $validation_username == TRUE && $validation_password == TRUE && $validation_retype_password == TRUE) {
				
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลถูกบันทึกแล้ว";
				echo "</div>";
			} else {
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลครบถ้วน";
				echo "</div>";
			}
		}
	?> 
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">Username
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" style="text-transform: lowercase;" placeholder="" name="username" value="<?php echo $_COOKIE['username']; ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $username_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">Password
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="password" class="form-control maxlength_defaultconfig" placeholder="" name="password" value="<?php echo $_COOKIE['password']; ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $password_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">Re-Type Password
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="password" class="form-control maxlength_defaultconfig" placeholder="" name="retype_password" value="<?php echo $_COOKIE['retype_password']; ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $retype_password_validation . "</span>"; ?>
	</div>
	</div>
	</div>   
    <div class="form-actions">
	<div class="row">
	<div class="col-md-offset-3 col-md-9">
	</div>
	</div>
	</div>                                          
</div>
</div>
<!-- END TAB 3 -->

<!-- BEGIN TAB 4 -->
<div class="tab-pane" id="tab_1_4">
<div class="portlet-body">   
    <div class="form-actions">
	<div class="row">
	<div class="col-md-offset-3 col-md-9">
    	<button type="submit" name="general" class="btn btn-lg blue">เพิ่ม</button>
		<button type="reset" class="btn btn-lg red">ยกเลิก</button>
	</div>
	</div>
	</div>
    </form>
<!-- END FORM-->                                             
</div>
</div>
<!-- END TAB 4 -->
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
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner"> 2016 &copy; Metronic Theme By
		<a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
		<a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END BEGIN FOOTER -->
<!-- END CONTENT -->
<!-- SCRIPT FOOTER -->
<!-- BEGIN CORE PLUGINS -->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
<script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<script>
var ComponentsBootstrapMaxlength=function(){var a=function(){$(".maxlength_defaultconfig").maxlength({limitReachedClass:"label label-danger"}),$("#maxlength_thresholdconfig").maxlength({limitReachedClass:"label label-danger",threshold:20}),$("#maxlength_alloptions").maxlength({alwaysShow:!0,warningClass:"label label-success",limitReachedClass:"label label-danger",separator:" out of ",preText:"You typed ",postText:" chars available.",validate:!0}),$("#maxlength_textarea").maxlength({limitReachedClass:"label label-danger",alwaysShow:!0}),$(".maxlength_placement").maxlength({limitReachedClass:"label label-danger",alwaysShow:!0,placement:App.isRTL()?"top-right":"top-left"})};return{init:function(){a()}}}();jQuery(document).ready(function(){ComponentsBootstrapMaxlength.init()});
</script>
<!-- <script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script> -->
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<!-- SCRIPT FOOTER -->
<?php include('template_3.php'); ?>