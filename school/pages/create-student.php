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
<title>เพิ่ม - นักเรียน</title>

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
<script src="jquery.min.js"></script>
<script>
$(function(){
	$('#province').change(function(){
		var pid = $(this).val();
		$.get('show-amphur.php', {pvid: pid}, function(data){
			$('#amphur').children().remove().end();
			$('#amphur').children().end().append(data);
			$('#amphur').removeAttr('disabled');
		});
	});
	
	$('#province2').change(function(){
		var pid = $(this).val();
		$.get('show-amphur.php', {pvid: pid}, function(data){
			$('#amphur2').children().remove().end();
			$('#amphur2').children().end().append(data);
			$('#amphur2').removeAttr('disabled');
		});
	});
	
	$(document).ready(function(){
		if($('#can').val() == "1"){
			$('#show').hide();
		} else {
			$('#show').show();
		}
	});
	
	$('#can').change(function(){
		if($('#can').val() == "1"){
			$('#home_code, #moo, #road, #soy, #province, #amphur, #district, #zip_code').attr('disabled', '');
			$('#show').hide();
		} else {
			$('#home_code, #moo, #road, #soy, #province, #amphur, #district, #zip_code').removeAttr('disabled');
			$('#show').show();
		}
	});
	
	$(document).ready(function(){
		if($('#rea').val() == "1"){
			$('#re').hide();
		} else if($('#rea').val() == "2") {
			$('#re').hide();
		} else {
			$('#re').show();
		}
	});
	
	$('#rea').change(function(){
		if($('#rea').val() == "1"){
			$('#re').hide();
		} else if($('#rea').val() == "2") {
			$('#re').hide();
		} else {
			$('#re').show();
		}
	});
});
</script>
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
	<h1>เพิ่ม - นักเรียน
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
		<a href="#tab_1_2" data-toggle="tab">ข้อมูลนักเรียน</a>
	</li>
    <li>
		<a href="#tab_1_3" data-toggle="tab">ที่อยู่</a>
	</li>
    <li>
		<a href="#tab_1_5" data-toggle="tab">ข้อมูลครอบครัว</a>
	</li>
    <li>
		<a href="#tab_1_6" data-toggle="tab">บกพร่อง</a>
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
	<span class="caption-subject font-green sbold uppercase">ข้อมูลทั่วไป</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
<?php
$general = $_POST['general'];
if(isset($general)){
	
	$SubName = $_COOKIE['SubName'] = $_POST['sub_name'];
	$FirstNameTH = $_COOKIE['FirstNameTH'] = $_POST['first_name_th'];
	$LastNameTH = $_COOKIE['LastNameTH'] = $_POST['last_name_th'];
	$FirstNameEN = $_COOKIE['FirstNameEN'] = $_POST['first_name_en'];
	$LastNameEN = $_COOKIE['LastNameEN'] = $_POST['last_name_en'];
	$Gender = $_COOKIE['Gender'] = $_POST['gender'];
	$BirthDay = $_COOKIE['BirthDay'] = $_POST['birthday_at'];
	$IDCard = $_COOKIE['ID_Card'] = $_POST['id_card'];
	$GroupBlood = $_COOKIE['GroupBlood'] = $_POST['group_blood'];
	$Email = $_COOKIE['Email'] = $_POST['email'];
	$Race = $_COOKIE['Race'] = $_POST['race'];
	$Nationality = $_COOKIE['Nationality'] = $_POST['nationality'];
	$Religion = $_COOKIE['Religion'] = $_POST['religion'];
	$Main = $_COOKIE['Main'] = $_POST['main'];
	$Secondary = $_COOKIE['Secondary'] = $_POST['secondary'];
	$Heigh = $_COOKIE['Heigh'] = $_POST['heigh'];
	$Weight = $_COOKIE['Weight'] = $_POST['weight'];//แทนค่าตัวแปรในฟอร์ม TAB 1
	
	$StudentID = $_COOKIE['StudentID'] = $_POST['student_id'];
	$TypeStudent = $_COOKIE['TypeStudent'] = $_POST['type_student'];
	$CourseStudy = $_COOKIE['CourseStudy'] = $_POST['course_study'];
	$Year = $_COOKIE['Year'] = $_POST['year'];
	$TypeCard = $_COOKIE['TypeCard'] = $_POST['type_card'];//แทนค่าตัวแปรในฟอร์ม TAB 2
	
	$HomeCode1 = $_COOKIE['HomeCode1'] = $_POST['home_code_1'];
	$Moo1 = $_COOKIE['Moo1'] = $_POST['moo_1'];
	$Road1 = $_COOKIE['Road1'] = $_POST['road_1'];
	$Soy1 = $_COOKIE['Soy1'] = $_POST['soy_1'];
	$Province1 = $_COOKIE['Province1'] = $_POST['province_1'];
	$Amphur1 = $_COOKIE['Amphur1'] = $_POST['district_1'];
	$District1 = $_COOKIE['District1'] = $_POST['sub_district_1'];
	$ZipCode1 = $_COOKIE['ZipCode1'] = $_POST['zip_code_1'];//แทนค่าตัวแปรในฟอร์ม TAB 3 ที่อยู่ตามทะเบียนบ้าน
	
	$HomeCode2 = $_COOKIE['HomeCode2'] = $_POST['home_code_2'];
	$Moo2 = $_COOKIE['Moo2'] = $_POST['moo_2'];
	$Road2 = $_COOKIE['Road2'] = $_POST['road_2'];
	$Soy2 = $_COOKIE['Soy2'] = $_POST['soy_2'];
	$Province2 = $_COOKIE['Province2'] = $_POST['province_2'];
	$Amphur2 = $_COOKIE['Amphur2'] = $_POST['district_2'];
	$District2 = $_COOKIE['District2'] = $_POST['sub_district_2'];
	$ZipCode2 = $_COOKIE['ZipCode2'] = $_POST['zip_code_2'];//แทนค่าตัวแปรในฟอร์ม TAB 3 ที่อยู่ปัจจุบัน
	
	$Place = $_COOKIE['Place'] = $_POST['place'];
	$OldBrother = $_COOKIE['OldBrother'] = $_POST['old_brother'];
	$YoungBrother = $_COOKIE['YoungBrother'] = $_POST['young_brother'];
	$OldSister = $_COOKIE['OldSister'] = $_POST['old_sister'];
	$YoungSister = $_COOKIE['YoungSister'] = $_POST['young_sister'];
	$NumBud = $_COOKIE['NumBud'] = $_POST['num_bud'];//แทนค่าตัวแปรในฟอร์ม TAB 4 พี่น้อง
	
	$FatherIDCard = $_COOKIE['FatherIDCard'] = $_POST['father_id_card'];
	$FatherFirst = $_COOKIE['FatherFirst'] = $_POST['father_first'];
	$FatherLast = $_COOKIE['FatherLast'] = $_POST['father_last'];
	$FatherGroupBlood = $_COOKIE['FatherGroupBlood'] = $_POST['father_group_blood'];
	$FatherSalary = $_COOKIE['FatherSalary'] = $_POST['father_salary'];
	$FatherTel = $_COOKIE['FatherTel'] = $_POST['father_tel'];//แทนค่าตัวแปรในฟอร์ม TAB 4 ข้อมูลบิดา
	
	$MatherIDCard = $_COOKIE['MatherIDCard'] = $_POST['mather_id_card'];
	$MatherFirst = $_COOKIE['MatherFirst'] = $_POST['mather_first'];
	$MatherLast = $_COOKIE['MatherLast'] = $_POST['mather_last'];
	$MatherGroupBlood = $_COOKIE['MatherGroupBlood'] = $_POST['mather_group_blood'];
	$MatherSalary = $_COOKIE['MatherSalary'] = $_POST['mather_salary'];
	$MatherTel = $_COOKIE['MatherTel'] = $_POST['mather_tel'];//แทนค่าตัวแปรในฟอร์ม TAB 4 ข้อมูลมารดา
	
	$ParentIDCard = $_COOKIE['ParentIDCard'] = $_POST['parent_id_card'];
	$ParentFirst = $_COOKIE['ParentFirst'] = $_POST['parent_first'];
	$ParentLast = $_COOKIE['ParentLast'] = $_POST['parent_last'];
	$ParentGroupBlood = $_COOKIE['ParentGroupBlood'] = $_POST['parent_group_blood'];
	$ParentSalary = $_COOKIE['ParentSalary'] = $_POST['parent_salary'];
	$ParentTel = $_COOKIE['ParentTel'] = $_POST['parent_tel'];
	$Relation = $_COOKIE['Relation'] = $_POST['relation'];//แทนค่าตัวแปรในฟอร์ม TAB 4 ข้อมูลผู้ปกครอง
	
	$Can = $_COOKIE['Can'] = $_POST['can'];
	
	$D1 = $_COOKIE['D1'] = $_POST['d1'];
	$D2 = $_COOKIE['D2'] = $_POST['d2'];
	$D3 = $_COOKIE['D3'] = $_POST['d3'];
	$D4 = $_COOKIE['D4'] = $_POST['d4'];
	$D5 = $_COOKIE['D5'] = $_POST['d5'];
	$D6 = $_COOKIE['D6'] = $_POST['d6'];
	$D7 = $_COOKIE['D7'] = $_POST['d7'];
	$D8 = $_COOKIE['D8'] = $_POST['d8'];
	$D9 = $_COOKIE['D9'] = $_POST['d9'];//		แทนค่าตัวแปรในฟอร์ม TAB 5 ความพิการ		//
	
	$L1 = $_COOKIE['L1'] = $_POST['l1'];
	$L2 = $_COOKIE['L2'] = $_POST['l2'];
	$L3 = $_COOKIE['L3'] = $_POST['l3'];
	$L4 = $_COOKIE['L4'] = $_POST['l4'];
	$L5 = $_COOKIE['L5'] = $_POST['l5'];//		แทนค่าตัวแปรในฟอร์ม TAB 5 ความขาดแคลน		//
	
	$I1 = $_COOKIE['I1'] = $_POST['i1'];
	$I2 = $_COOKIE['I2'] = $_POST['i2'];
	$I3 = $_COOKIE['I3'] = $_POST['i3'];
	$I4 = $_COOKIE['I4'] = $_POST['i4'];
	$I5 = $_COOKIE['I5'] = $_POST['i5'];
	$I6 = $_COOKIE['I6'] = $_POST['i6'];
	$I7 = $_COOKIE['I7'] = $_POST['i7'];
	$I8 = $_COOKIE['I8'] = $_POST['i8'];
	$I9 = $_COOKIE['I9'] = $_POST['i9'];
	$I10 = $_COOKIE['I10'] = $_POST['i10'];
	$I11 = $_COOKIE['I11'] = $_POST['i11'];
	$I12 = $_COOKIE['I12'] = $_POST['i12'];
	$I13 = $_COOKIE['I13'] = $_POST['i13'];//		แทนค่าตัวแปรในฟอร์ม TAB 5 ผู้ด้อยโอกาส		//
	
		
	//ตัวแปรเก็บเงื่อนไข
	$language = "/^[a-zA-Z]+$/";//เช็คตัวอักษรภาษาอังกฤษ
	$IDCard_PATTERN = "/^[0-9]{13}$/";//เช็คตัวเลข 13 หลัก
	$Tel_PATTERN = "/^0[689]{1}[0-9]{8}+$/";//เช็คหมายเลขเบอร์โทรศัพท์
	
	//FORM1
	
	if($SubName == "เลือก"){
		$FORM = "<li>" . "กรุกาเลือกคำนำหน้า" . "</li>";
		$SubName_VALIDATION = "กรุณาเลือกคำนำหน้า";
		$VALIDATION_SubName = FALSE;
	} else {
		$VALIDATION_SubName = TRUE;
	}//		เช็คเงื่อนไขคำนำหน้า		//
	
	if(empty($FirstNameTH)){
		$FORM .= "<li>" . "กรุณากรอกชื่อ(ภาษาไทย)" . "</li>";
		$FirstNameTH_VALIDATION = "กรุณากรอกชื่อ(ภาษาไทย)" . "</li>";
		$VALIDATION_FirstNameTH = FALSE;
	} else {
		if(preg_match($language, $FirstNameTH)){
			$FORM .= "<li>" . "ชื่อต้องเป็นอักษรภาษาไทยเท่านั้น" . "</li>";
			$FirstNameTH = "ชื่อต้องเป็นอักษรภาษาไทยเท่านั้น";
			$VALIDATION_FirstNameTH = FALSE;
		} else {
			$VALIDATION_FirstNameTH = TRUE;
		}
	}//		เช็คเงื่อนไขชื่อ(ภาษาไทย)		//
	
	if(empty($LastNameTH)){
		$FORM .= "<li>" . "กรุณากรอกนามสกุล(ภาษาไทย)" . "</li>";
		$LastNameTH_VALIDATION = "กรุณากรอกนามสกุล(ภาษาไทย)";
		$VALIDATION_LastNameTH = FALSE;
	} else {
		if(preg_match($language, $LastNameTH)){
			$FORM .= "นามสกุลต้องเป็นอักษรภาษาไทยเท่านั้น";
			$LastNameTH_VALIDATION = "นามสกุลต้องเป็นอักษรภาษาไทยเท่านั้น";
			$VALIDATION_LastNameTH = FALSE;
		} else {
			$VALIDATION_LastNameTH = TRUE;
		}
	}//		เช็คเงื่อนไขนามสกุล(ภาษาไทย)		//
	
	if(empty($FirstNameEN)){
		$FORM .= "<li>" . "กรุณากรอกชื่อ(ภาษาอังกฤษ)" . "</li>";
		$FirstNameEN_VALIDATION = "กรุณากรอกชื่อ(ภาษาอังกฤษ)" . "</li>";
		$VALIDATION_FirstNameEN = FALSE;
	} else {
		if(!preg_match($language, $FirstNameEN)){
			$FORM .= "<li>" . "ชื่อต้องเป็นอักษรภาษาอังกฤษเท่านั้น" . "</li>";
			$FirstNameEN_VALIDATION = "ชื่อต้องเป็นอักษรภาษาอังกฤษเท่านั้น";
			$VALIDATION_FirstNameEN = FALSE;
		} else {
			$VALIDATION_FirstNameEN = TRUE;
		}
	}//		เช็คเงื่อนไขชื่อ(ภาษาอังกฤษ)		//
	
	if(empty($LastNameEN)){
		$FORM .= "<li>" . "กรุณากรอกนามสกุล(ภาษาอังกฤษ)" . "</li>";
		$LastNameEN_VALIDATION = "กรุณากรอกนามสกุล(ภาษาอังกฤษ)" . "</li>";
		$VALIDATION_LastNameEN = FALSE;
	} else {
		if(!preg_match($language, $LastNameEN)){
			$FORM .= "<li>" . "นามสกุลต้องเป็นภาษาอังกฤษเท่านั้น" . "</li>";
			$LastNameEN_VALIDATION = "นามสกุลต้องเป็นภาษาอังกฤษเท่านั้น";
			$VALIDATION_LastNameEN = FALSE;
		} else {
			$VALIDATION_LastNameEN = TRUE;
		}
	}//		เช็คเงื่อนไขนามสกุล(ภาษาอังกฤษ)		//
	
	if($Gender == "เลือก"){
		$FORM .= "<li>" . "กรุณาเลือกเพศ" . "</li>";
		$Gender_VALIDATION = "กรุณาเลือกเพศ";
		$VALIDATION_Gender = FALSE;
	} else {
		$VALIDATION_Gender = TRUE;
	}//		เช็คเงื่อนไขเพศ		//
	
	if(empty($BirthDay)){
		$FORM .= "<li>" . "กรุณาเลือกวัน/เดือน/ปี(เกิด)" . "</li>";
		$BirthDay_VALIDATION = "กรุณาเลือกวัน/เดือน/ปี(เกิด)";
		$VALIDATION_BirthDay = FALSE;
	} else {
		$VALIDATION_BirthDay = TRUE;
	}//		เช็คเงื่อนไขวัน/เดือน/ปี(เกิด)		//
	
	if(empty($IDCard)){
		$FORM .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนเป็นตัวเลข 13 หลัก" . "</li>";
		$IDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนเป็นตัวเลข 13 หลัก";
		$VALIDATION_IDCard = FALSE;
	} else {
		if(!preg_match($IDCard_PATTERN, $IDCard)){
			$FORM .= "<li>" . "กรอกเลขประจำตัวประชาชนเป็นตัวเลข 13 หลัก เท่านั้น" . "</li>";
			$IDCard_VALIDATION = "กรอกเลขประจำตัวประชาชนเป็นตัวเลข 13 หลัก เท่านั้น";
			$VALIDATION_IDCard = FALSE;
		} else {
			$sql = "SELECT id_card FROM student WHERE school_id = '" . $_SESSION['school_id'] . "' and id_card = '" . $IDCard . "'";
			$result = mysqli_query($link, $sql);
			$data = mysqli_num_rows($result);
			
			if($data == 1){
				$FORM .= "<li>" . "หมายเลขบัตรประชาชนนี้ถูกใช้งานแล้ว" . "</li>";
				$IDCard_VALIDATION = "หมายเลขบัตรประชาชนนี้ถูกใช้งานแล้ว";
				$VALIDATION_IDCard = FALSE;
			} else {
				$VALIDATION_IDCard = TRUE;
			}
		}
	}//		เช็คเงื่อนไขหมายเลขบัตรประชาชน		//
	
	if($GroupBlood == "เลือก"){
		$FORM .= "<li>" . "กรุณาเลือกกรุ๊ปเลือด" . "</li>";
		$GroupBlood_VALIDATION = "กรุณาเลือกกรุ๊ปเลือด" . "</li>";
		$VALIDATION_GroupBlood = FALSE;
	} else {
		$VALIDATION_GroupBlood = TRUE;
	}//		เช็คเงื่อนไขกรุ๊ปเลือด		//
	
	if(empty($Heigh)){
		$FORM .= "<li>" . "กรุณากรอกส่วนสูง" . "</li>";
		$Heigh_VALIDATION = "กรุณากรอกส่วนสูง";
		$VALIDATION_Heigh = FALSE;
	} else {
		$VALIDATION_Heigh = TRUE;
	}//		เช็คเงื่อนไขส่วนสูง		//
	
	if(empty($Weight)){
		$FORM .= "<li>" . "กรุณากรอกน้ำหนัก" . "</li>";
		$Weight_VALIDATION = "กรุณากรอกน้ำหนัก";
		$VALIDATION_Weight = FALSE;
	} else {
		$VALIDATION_Weight = TRUE;
	}//		เช็คเงื่อนไขน้ำหนัก		//
	
	if(empty($Race)){
		$FORM .= "<li>" . "กรุณากรอกเชื้อชาติ" . "</li>";
		$Rac_VALIDATION = "กรุณากรอกเชื้อชาติ";
		$VALIDATION_Race = FALSE;
	} else {
		$VALIDATION_Race = TRUE;
	}//		เช็คเงื่อนไขเชื้อชาติ		//
	
	if(empty($Nationality)){
		$FORM .= "<li>" . "กรุณากรอกสัญชาติ" . "</li>";
		$Nationality_VALIDATION = "กรุณากรอกสัญชาติ";
		$VALIDATION_Nationality = FALSE;
	} else {
		$VALIDATION_Nationality = TRUE;
	}//		เช็คเงื่อนไขสัญชาติ		//
	
	if(empty($Religion)){
		$FORM .= "<li>" . "กรุณากรอกศาสนา" . "</li>";
		$Religion_VALIDATION = "กรุณากรอกศาสนา";
		$VALIDATION_Religion = FALSE;
	} else {
		$VALIDATION_Religion = TRUE;
	}//		เช็คเงื่อนไขศาสนา		//
	
	if(empty($Main)){
		$FORM .= "<li>" . "กรุณากรอกภาษาหลัก" . "</li>";
		$Main_VALIDATION = "กรุณากรอกภาษาหลัก";
		$VALIDATION_Main = FALSE;
	} else {
		$VALIDATION_Main = TRUE;
	}//		เช็คเงื่อนไขภาษาหลัก		//
	
	if(empty($Year)){
		$FORM .= "<li>" . "กรุณากรอกปีการศึกษา" . "</li>";
		$Year_VALIDATION = "กรุณากรอกปีการศึกษา";
		$VALIDATION_Year = FALSE;
	} else {
		$VALIDATION_Year = TRUE;
	}//		เช็คเงื่อนไขปีการศึกษา		//
	
	//FORM2
	
	if(empty($StudentID)){
		$FORM .= "<li>" . "กรุณากรอกรหัสนักเรียน" . "</li>";
		$StudentID_VALIDATION = "กรุณากรอกรหัสนักเรียน";
		$VALIDATION_StudentID = FALSE;
	} else {
		$sql = "SELECT student_id FROM student WHERE school_id = '" . $_SESSION['school_id'] . "' and student_id = '" . $StudentID . "'";
		$result = mysqli_query($link, $sql);
		$num = mysqli_num_rows($result);
		if($num == 1){
			$FORM .= "<li>" . "รหัสนักเรียนนี้ถูกใช้งานแล้ว" . "</li>";
			$StudentID_VALIDATION = "รหัสนักเรียนนี้ถูกใช้งานแล้ว";
			$VALIDATION_StudentID = FALSE;
		} else {
			$VALIDATION_StudentID = TRUE;
		}
	}//		เช็คเงื่อนไขรหัสนักเรียน		//
	
	if(empty($TypeStudent)){
		$FORM .= "<li>" . "กรุณากรอกประเภทนักเรียน" . "</li>";
		$TypeStudent_VALIDATION = "กรุณากรอกประเภทนักเรียน";
		$VALIDATION_TypeStudent = FALSE;
	} else {
		$VALIDATION_TypeStudent = TRUE;
	}//		เช็คเงื่อนไขประเภทนักเรียน		//
	
	if(empty($CourseStudy)){
		$FORM .= "<li>" . "กรุณากรอกสายการเรียน" . "</li>";
		$CourseStudy_VALIDATION = "กรุณากรอกสายการเรียน";
		$VALIDATION_CourseStudy = FALSE;
	} else {
		$VALIDATION_CourseStudy = TRUE;
	}//		เช็คเงื่อนไขสายการเรียน		//
	
	//FORM3
	//		ที่อยู่ตามทะเบียนบ้าน		//
	if(empty($HomeCode1)){
		$FORM .= "<li>" . "กรุณากรอกบ้านเลขที่(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$HomeCode1_VALIDATION = "กรุณากรอกบ้านเลขที่(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_HomeCode1 = FALSE;
	} else {
		$VALIDATION_HomeCode1 = TRUE;
	}//		เช็คเงื่อนไขบ้านเลขที่		//
	
	if(empty($Moo1)){
		$FORM .= "<li>" . "กรุณากรอกหมู่ที่(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$Moo1_VALIDATION = "กรุณากรอกหมู่ที่(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_Moo1 = FALSE;
	} else {
		$VALIDATION_Moo1 = TRUE;
	}//		เช็คเงื่อนไขหมู่ที่		//
	
	if(empty($Road1)){
		$FORM .= "<li>" . "กรุณากรอกถนน(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$Road1_VALIDATION = "กรุณากรอกถนน(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_Road1 = FALSE;
	} else {
		$VALIDATION_Road1 = TRUE;
	}//		เช็คเงื่อนไขถนน		//
	
	if(empty($Soy1)){
		$FORM .= "<li>" . "กรุณากรอกซอย(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$Soy1_VALIDATION = "กรุณากรอกซอย(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_Soy1 = FALSE;
	} else {
		$VALIDATION_Soy1 = TRUE;
	}//		เช็คเงื่อนไขซอย		//
	
	if($Province1 == "เลือก"){
		$FORM .= "<li>" . "กรุณาเลือกจังหวัด(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$Province1_VALIDATION = "กรุณาเลือกจังหวัด(ที่อยู่ตามทะเบียนบ้าน)";
		$Amphur1_VALIDATION = "กรุณาเลือกจังหวัดก่อน(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_Province1 = FALSE;
	} else {
		$VALIDATION_Province1 = TRUE;
	}//		เช็คเงื่อนไขจังหวัด		//
	
	if(empty($District1)){
		$FORM .= "<li>" . "กรุณากรอกตำบล(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$District1_VALIDATION = "กรุณากรอกตำบล(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_District1 = FALSE;
	} else {
		$VALIDATION_District1 = TRUE;
	}//		เช็คเงื่อนไขตำบล		//
	
	if(empty($ZipCode1)){
		$FORM .= "<li>" . "กรุณากรอกรหัสไปรษณีย์(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$ZipCode1_VALIDATION = "กรุกรอกรหัสไปรษณีย์(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$VALIDATION_ZipCode1 = FALSE;
	} else {
		$VALIDATION_ZipCode1 = TRUE;
	}//		เช็คเงื่อนไขรหัสไปรษณีย์		//
	
	//		ที่อยู่ปัจจุบัน		//
	if($Can != 1){
	if(empty($HomeCode2)){
		$FORM .= "<li>" . "กรุณากรอกบ้านเลขที่(ที่อยู่ปัจจุบัน)" . "</li>";
		$HomeCode2_VALIDATION = "กรุณากรอกบ้านเลขที่(ที่อยู่ปัจจุบัน)";
		$VALIDATION_HomeCode2 = FALSE;
	} else {
		$VALIDATION_HomeCode2 = TRUE;
	}
	} else {
		$VALIDATION_HomeCode2 = TRUE;
	}//		เช็คเงื่อนไขบ้านเลขที่		//
	
	if($Can != 1){
	if(empty($Moo2)){
		$FORM .= "<li>" . "กรุณากรอกหมู่ที่(ที่อยู่ปัจจุบัน)" . "</li>";
		$Moo2_VALIDATION = "กรุณากรอกหมู่ที่(ที่อยู่ปัจจุบัน)";
		$VALIDATION_Moo2 = FALSE;
	} else {
		$VALIDATION_Moo2 = TRUE;
	}
	} else {
		$VALIDATION_Moo2 = TRUE;
	}//		เช็คเงื่อนไขหมู่ที่		//
	
	if($Can != 1){
	if(empty($Road2)){
		$FORM .= "<li>" . "กรุณากรอกถนน(ที่อยู่ปัจจุบัน)" . "</li>";
		$Road2_VALIDATION = "กรุณากรอกถนน(ที่อยู่ปัจจุบัน)";
		$VALIDATION_Road2 = FALSE;
	} else {
		$VALIDATION_Road2 = TRUE;
	}
	} else {
		$VALIDATION_Road2 = TRUE;
	}//		เช็คเงื่อนไขถนน		//
	
	if($Can != 1){
	if(empty($Soy2)){
		$FORM .= "<li>" . "กรุณากรอกซอย(ที่อยู่ปัจจุบัน)" . "</li>";
		$Soy2_VALIDATION = "กรุณากรอกซอย(ที่อยู่ปัจจุบัน)";
		$VALIDATION_Soy2 = FALSE;
	} else {
		$VALIDATION_Soy2 = TRUE;
	}
	} else {
		$VALIDATION_Soy2 = TRUE;
	}//		เช็คเงื่อนไขซอย		//
	
	if($Can != 1){
	if($Province2 == "เลือก"){
		$FORM .= "<li>" . "กรุณาเลือกจังหวัด(ที่อยู่ปัจจุบัน)" . "</li>";
		$Province2_VALIDATION = "กรุณาเลือกจังหวัด(ที่อยู่ปัจจุบัน)";
		$Amphur2_VALIDATION = "กรุณาเลือกจังหวัดก่อน(ที่อยู่ปัจจุบัน)";
		$VALIDATION_Province2 = FALSE;
	} else {
		$VALIDATION_Province2 = TRUE;
	}
	} else {
		$VALIDATION_Province2 = TRUE;
	}//		เช็คเงื่อนไขจังหวัด		//
	
	if($Can != 1){
	if(empty($District2)){
		$FORM .= "<li>" . "กรุณากรอกตำบล(ที่อยู่ปัจจุบัน)" . "</li>";
		$District2_VALIDATION = "กรุณากรอกตำบล(ที่อยู่ปัจจุบัน)";
		$VALIDATION_District2 = FALSE;
	} else {
		$VALIDATION_District2 = TRUE;
	}
	} else {
		$VALIDATION_District2 = TRUE;
	}//		เช็คเงื่อนไขตำบล		//
	
	if($Can != 1){
	if(empty($ZipCode2)){
		$FORM .= "<li>" . "กรุณากรอกรหัสไปรษณีย์(ที่อยู่ปัจจุบัน)" . "</li>";
		$ZipCode2_VALIDATION = "กรุกรอกรหัสไปรษณีย์(ที่อยู่ปัจจุบัน)" . "</li>";
		$VALIDATION_ZipCode2 = FALSE;
	} else {
		$VALIDATION_ZipCode2 = TRUE;
	}
	} else {
		$VALIDATION_ZipCode2 = TRUE;
	}//		เช็คเงื่อนไขรหัสไปรษณีย์		//
	
	//FORM4
	
	if($Place == "เลือก"){
		$FORM .= "<li>" . "กรุณาเลือกสถานะ" . "</li>";
		$Place_VALIDATION = "กรุณาเลือกสถานะ";
		$VALIDATION_Place = FALSE;
	} else {
		$VALIDATION_Place = TRUE;
	}//		เช็คเงื่อนไขสถานะ		//
	
	if($OldBrother == ""){
		$FORM .= "<li>" . "กรุณากรอกจำนวนพี่ชาย" . "</li>";
		$OldBrother_VALIDATION = "กรุณากรอกจำนวนพี่ชาย";
		$VALIDATION_OldBrother = FALSE;
	} else {
		$VALIDATION_OldBrother = TRUE;
	}//		เช็คเงื่อนไขจำนวนพี่ชาย		//
	
	if($YoungBrother == ""){
		$FORM .= "<li>" . "กรุณากรอกจำนวนน้องชาย" . "</li>";
		$YoungBrother_VALIDATION = "กรุณากรอกจำนวนน้องชาย";
		$VALIDATION_YoungBrother = FALSE;
	} else {
		$VALIDATION_YoungBrother = TRUE;
	}//		เช็คเงื่อนไขจำนวนน้องชาย		//
	
	if($OldSister == ""){
		$FORM .= "<li>" . "กรุณากรอกจำนวนพี่สาว" . "</li>";
		$OldSister_VALIDATION = "กรุณากรอกจำนวนพี่สาว";
		$VALIDATION_OldSister = FALSE;
	} else {
		$VALIDATION_OldSister = TRUE;
	}//		เช็คเงื่อนไขจำนวนพี่สาว		//
	
	if($YoungSister == ""){
		$FORM .= "<li>" . "กรุณากรอกจำนวนน้องสาว" . "</li>";
		$YoungSister_VALIDATION = "กรุณากรอกจำนวนน้องสาว";
		$VALIDATION_YoungSister = FALSE;
	} else {
		$VALIDATION_YoungSister = TRUE;
	}//		เช็คเงื่อนไขจำนวนน้องสาว		//
	
	if($NumBud == ""){
		$FORM .= "<li>" . "กรุณากรอกข้อมูล" . "</li>";
		$NumBud_VALIDATION = "กรุณากรอกข้อมูล";
		$VALIDATION_NumBud = FALSE;
	} else {
		$VALIDATION_NumBud = TRUE;
	}//		เช็คเงื่อนไขเป็นบุตรคนที่		//
	
	if(empty($FatherIDCard)){
		$FORM .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนของบิดา" . "</li>";
		$FatherIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนของบิดา" . "</li>";
		$VALIDATION_FatherIDCard = FALSE;
	} else {
		if(!preg_match($IDCard_PATTERN, $FatherIDCard)){
			$FORM .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$FatherIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$VALIDATION_FatherIDCard = FALSE;
		} else {
			$VALIDATION_FatherIDCard = TRUE;
		}
	}//		เช็คเงื่อนไขหมายเลขบัตรประชาชนของบิดา		//
	
	if(empty($FatherFirst)){
		$FORM .= "<li>" . "กรุณากรอกชื่อบิดา" . "</li>";
		$FatherFirst_VALIDATION = "กรุณากรอกชื่อบิดา";
		$VALIDATION_FatherFirst = FALSE;
	} else {
		$VALIDATION_FatherFirst = TRUE;
	}//		เช็คเงื่อนไขชื่อบิดา		//
	
	if(empty($FatherLast)){
		$FORM .= "<li>" . "กรุณากรอกนามสกุลบิดา" . "</li>";
		$FatherLast_VALIDATION = "กรุณากรอกนามสกุลบิดา";
		$VALIDATION_FatherLast = FALSE;
	} else {
		$VALIDATION_FatherLast = TRUE;
	}//		เช็คเงื่อนไขนามสกุลบิดา		//
	
	if($FatherGroupBlood == "เลือก"){
		$FORM .= "<li>" . "กรุณาเลือกกรุ๊ปเลือดบิดา" . "</li>";
		$FatherGroupBlood_VALIDATION = "กรุณาเลือกกรุ๊ปเลือดบิดา";
		$VALIDATION_FatherGroupBlood = FALSE;
	} else {
		$VALIDATION_FatherGroupBlood = TRUE;
	}//		เช็คเงื่อนไขกรุ๊ปเลือดบิดา		//
	
	if(empty($FatherSalary)){
		$FORM .= "<li>" . "กรุณากรอกเงินเดือนของบิดา" . "</li>";
		$FatherSalary_VALIDATION = "กรุณากรอกเงินเดือนของบิดา";
		$VALIDATION_FatherSalary = FALSE;
	} else {
		$VALIDATION_FatherSalary = TRUE;
	}//		เช็คเงื่อนไขเงินเดือนบิดา		//
	
	if(empty($FatherTel)){
		$FORM .= "<li>" . "กรุณากรอกเบอร์โทรศัพท์ของบิดา" . "</li>";
		$FatherTel_VALIDATION = "กรุณากรอกเบอร์โทรศัพท์ของบิดา";
		$VALIDATION_FatherTel = FALSE;
	} else {
		if(!preg_match($Tel_PATTERN, $FatherTel)){
			$FORM .= "<li>" . "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง" . "</li>";
			$FatherTel_VALIDATION = "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง";
			$VALIDATION_FatherTel = FALSE;
		} else {
			$VALIDATION_FatherTel = TRUE;
		}
	}//		เช็คเงื่อนไขเบอร์โทรศัพท์	ของบิดา	//
	
	if(empty($MatherIDCard)){
		$FORM .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนของมารดา" . "</li>";
		$MatherIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนของมารดา" . "</li>";
		$VALIDATION_MatherIDCard = FALSE;
	} else {
		if(!preg_match($IDCard_PATTERN, $MatherIDCard)){
			$FORM .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$MatherIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$VALIDATION_MatherIDCard = FALSE;
		} else {
			$VALIDATION_MatherIDCard = TRUE;
		}
	}//		เช็คเงื่อนไขหมายเลขบัตรประชาชนของมารดา		//
	
	if(empty($MatherFirst)){
		$FORM .= "<li>" . "กรุณากรอกชื่อมารดา" . "</li>";
		$MatherFirst_VALIDATION = "กรุณากรอกชื่อมารดา";
		$VALIDATION_MatherFirst = FALSE;
	} else {
		$VALIDATION_MatherFirst = TRUE;
	}//		เช็คเงื่อนไขชื่อมารดา		//
	
	if(empty($MatherLast)){
		$FORM .= "<li>" . "กรุณากรอกนามสกุลมารดา" . "</li>";
		$MatherLast_VALIDATION = "กรุณากรอกนามสกุลมารดา";
		$VALIDATION_MatherLast = FALSE;
	} else {
		$VALIDATION_MatherLast = TRUE;
	}//		เช็คเงื่อนไขนามสกุลมารดา		//
	
	if($MatherGroupBlood == "เลือก"){
		$FORM .= "<li>" . "กรุณาเลือกกรุ๊ปเลือดมารดา" . "</li>";
		$MatherGroupBlood_VALIDATION = "กรุณาเลือกกรุ๊ปเลือดมารดา";
		$VALIDATION_MatherGroupBlood = FALSE;
	} else {
		$VALIDATION_MatherGroupBlood = TRUE;
	}//		เช็คเงื่อนไขกรุ๊ปเลือดมารดา	//
	
	if(empty($MatherSalary)){
		$FORM .= "<li>" . "กรุณากรอกเงินเดือนของมารดา" . "</li>";
		$MatherSalary_VALIDATION = "กรุณากรอกเงินเดือนของมารดา";
		$VALIDATION_MatherSalary = FALSE;
	} else {
		$VALIDATION_MatherSalary = TRUE;
	}//		เช็คเงื่อนไขเงินเดือนมารดา		//
	
	if(empty($MatherTel)){
		$FORM .= "<li>" . "กรุณากรอกเบอร์โทรศัพท์ของมารดา" . "</li>";
		$MatherTel_VALIDATION = "กรุณากรอกเบอร์โทรศัพท์ของมารดา";
		$VALIDATION_MatherTel = FALSE;
	} else {
		if(!preg_match($Tel_PATTERN, $MatherTel)){
			$FORM .= "<li>" . "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง" . "</li>";
			$MatherTel_VALIDATION = "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง";
			$VALIDATION_MatherTel = FALSE;
		} else {
			$VALIDATION_MatherTel = TRUE;
		}
	}//		เช็คเงื่อนไขเบอร์โทรศัพท์	ของมารดา	//
	
	$Rea = $_SESSION['Rea'] = $_POST['rea'];
	if($Rea == 3){
	if(empty($ParentIDCard)){
		$FORM .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนของผู้ปกครอง" . "</li>";
		$ParentIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนของผู้ปกครอง" . "</li>";
		$VALIDATION_ParentIDCard = FALSE;
	} else {
		if(!preg_match($IDCard_PATTERN, $ParentIDCard)){
			$FORM .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$ParentIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$VALIDATION_ParentIDCard = FALSE;
		} else {
			$VALIDATION_ParentIDCard = TRUE;
		}
	}
	} else {
		$VALIDATION_ParentIDCard = TRUE;
	}//		เช็คเงื่อนไขหมายเลขบัตรประชาชนของผู้ปกครอง		//
	
	if($Rea == 3){
	if(empty($ParentFirst)){
		$FORM .= "<li>" . "กรุณากรอกชื่อผู้ปกครอง" . "</li>";
		$ParentFirst_VALIDATION = "กรุณากรอกชื่อผู้ปกครอง";
		$VALIDATION_ParentFirst = FALSE;
	} else {
		$VALIDATION_ParentFirst = TRUE;
	} 
	} else {
		$VALIDATION_ParentFirst = TRUE;
	}//		เช็คเงื่อนไขชื่อผู้ปกครอง		//
	
	if($Rea == 3){
	if(empty($ParentLast)){
		$FORM .= "<li>" . "กรุณากรอกนามสกุลผู้ปกครอง" . "</li>";
		$ParentLast_VALIDATION = "กรุณากรอกนามสกุลผู้ปกครอง";
		$VALIDATION_ParentLast = FALSE;
	} else {
		$VALIDATION_ParentLast = TRUE;
	}
	} else {
		$VALIDATION_ParentLast = TRUE;
	}//		เช็คเงื่อนไขนามสกุลผู้ปกครอง		//
	
	if($Rea == 3){
	if($ParentGroupBlood == "เลือก"){
		$FORM .= "<li>" . "กรุณาเลือกกรุ๊ปเลือดผู้ปกครอง" . "</li>";
		$ParentGroupBlood_VALIDATION = "กรุณาเลือกกรุ๊ปเลือดผู้ปกครอง";
		$VALIDATION_ParentGroupBlood = FALSE;
	} else {
		$VALIDATION_ParentGroupBlood = TRUE;
	}
	} else {
		$VALIDATION_ParentGroupBlood = TRUE;
	}//		เช็คเงื่อนไขกรุ๊ปเลือดผู้ปกครอง	//
	
	if($Rea == 3){
	if(empty($ParentSalary)){
		$FORM .= "<li>" . "กรุณากรอกเงินเดือนของผู้ปกครอง" . "</li>";
		$ParentSalary_VALIDATION = "กรุณากรอกเงินเดือนของผู้ปกครอง";
		$VALIDATION_ParentSalary = FALSE;
	} else {
		$VALIDATION_ParentSalary = TRUE;
	}
	} else {
		$VALIDATION_ParentSalary = TRUE;
	}//		เช็คเงื่อนไขเงินเดือนผู้ปกครอง		//
	
	if($Rea == 3){
	if(empty($ParentTel)){
		$FORM .= "<li>" . "กรุณากรอกเบอร์โทรศัพท์ของผู้ปกครอง" . "</li>";
		$ParentTel_VALIDATION = "กรุณากรอกเบอร์โทรศัพท์ของผู้ปกครอง";
		$VALIDATION_ParentTel = FALSE;
	} else {
		if(!preg_match($Tel_PATTERN, $ParentTel)){
			$FORM .= "<li>" . "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง" . "</li>";
			$ParentTel_VALIDATION = "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง";
			$VALIDATION_ParentTel = FALSE;
		} else {
			$VALIDATION_ParentTel = TRUE;
		}
	}
	} else {
		$VALIDATION_ParentTel = TRUE;
	}//		เช็คเงื่อนไขเบอร์โทรศัพท์	ของผู้ปกครอง	//
	
	if($Rea == 3){
	if(empty($Relation)){
		$FORM .= "<li>" . "กรุณากรอกความสัมพันธ์ระหว่างนักเรียนกับผู้ปกครอง" . "</li>";
		$Relation_VALIDATION = "กรุณากรอกความสัมพันธ์ระหว่างนักเรียนกับผู้ปกครอง";
		$VALIDATION_Relation = FALSE;
	} else {
		$VALIDATION_Relation = TRUE;
	}
	} else {
		$VALIDATION_Relation = TRUE;
	}//		เช็คเงื่อนไขความสัมพันธ์		//
		
	
	//ตัวแปรรับค่ากรณี OR FALSE
	$VALIDATION_FALSE = $VALIDATION_SubName == FALSE || $VALIDATION_FirstNameTH == FALSE || $VALIDATION_LastNameTH == FALSE || $VALIDATION_FirstNameEN == FALSE || $VALIDATION_LastNameEN == FALSE || $VALIDATION_Gender == FALSE || $VALIDATION_BirthDay == FALSE || $VALIDATION_IDCard == FALSE || $VALIDATION_GroupBlood == FALSE || $VALIDATION_Race == FALSE || $VALIDATION_Nationality == FALSE || $VALIDATION_Religion == FALSE || $VALIDATION_Main == FALSE || $VALIDATION_Year == FALSE || $VALIDATION_Heigh == FALSE || $VALIDATION_Weight == FALSE;
	$VALIDATION_FALSE .= $VALIDATION_HomeCode1 == FALSE || $VALIDATION_Moo1 == FALSE || $VALIDATION_Road1 == FALSE || $VALIDATION_Soy1 == FALSE || $VALIDATION_Province1 == FALSE || $VALIDATION_District1 == FALSE || $VALIDATION_ZipCode1 == FALSE || $VALIDATION_HomeCode2 == FALSE || $VALIDATION_Moo2 == FALSE || $VALIDATION_Road2 == FALSE || $VALIDATION_Soy2 == FALSE || $VALIDATION_Province2 == FALSE || $VALIDATION_District2 == FALSE || $VALIDATION_ZipCode2 == FALSE;
	$VALIDATION_FALSE .= $VALIDATION_StudentID == FALSE || $VALIDATION_TypeStudent == FALSE || $VALIDATION_CourseStudy == FALSE;
	$VALIDATION_FALSE .= $VALIDATION_Place == FALSE || $VALIDATION_OldBrother == FALSE || $VALIDATION_YoungBrother == FALSE || $VALIDATION_OldSister == FALSE || $VALIDATION_YoungSister == FALSE || $VALIDATION_NumBud == FALSE || $VALIDATION_FatherIDCard == FALSE || $VALIDATION_FatherFirst == FALSE || $VALIDATION_FatherLast == FALSE || $VALIDATION_FatherGroupBlood == FALSE || $VALIDATION_FatherSalary == FALSE || $VALIDATION_FatherTel == FALSE || $VALIDATION_MatherIDCard == FALSE || $VALIDATION_MatherFirst == FALSE || $VALIDATION_MatherLast == FALSE || $VALIDATION_MatherGroupBlood == FALSE || $VALIDATION_MatherSalary == FALSE || $VALIDATION_MatherTel == FALSE || $VALIDATION_ParentIDCard == FALSE || $VALIDATION_ParentFirst == FALSE || $VALIDATION_ParentLast == FALSE || $VALIDATION_ParentGroupBlood == FALSE || $VALIDATION_ParentSalary == FALSE || $VALIDATION_ParentTel == FALSE || $VALIDATION_Relation == FALSE;
	
	//ตัวแปรรับค่ากรณี AND TRUE
	if($VALIDATION_SubName == TRUE && $VALIDATION_FirstNameTH == TRUE && $VALIDATION_LastNameTH == TRUE && $VALIDATION_FirstNameEN == TRUE && $VALIDATION_LastNameEN == TRUE && $VALIDATION_Gender == TRUE && $VALIDATION_BirthDay == TRUE && $VALIDATION_IDCard == TRUE || $VALIDATION_GroupBlood == TRUE && $VALIDATION_Heigh == TRUE && $VALIDATION_Weight == TRUE && $VALIDATION_Race == TRUE && $VALIDATION_Nationality == TRUE && $VALIDATION_Religion == TRUE && $VALIDATION_Main == TRUE){
		$VALIDATION_TRUE1 = TRUE;
	} else {
		$VALIDATION_TRUE1 = FALSE;
	}
	
	if($VALIDATION_StudentID == TRUE && $VALIDATION_TypeStudent == TRUE && $VALIDATION_CourseStudy == TRUE && $VALIDATION_Year == TRUE){
		$VALIDATION_TRUE2 = TRUE;
	} else {
		$VALIDATION_TRUE2 = FALSE;
	}
	
	if($VALIDATION_HomeCode1 == TRUE && $VALIDATION_Moo1 == TRUE && $VALIDATION_Road1 == TRUE && $VALIDATION_Soy1 == TRUE && $VALIDATION_Province1 == TRUE && $VALIDATION_District1 == TRUE && $VALIDATION_ZipCode1 == TRUE && $VALIDATION_HomeCode2 == TRUE && $VALIDATION_Moo2 == TRUE && $VALIDATION_Road2 == TRUE && $VALIDATION_Soy2 == TRUE && $VALIDATION_Province2 == TRUE && $VALIDATION_District2 == TRUE && $VALIDATION_ZipCode2 == TRUE){
		$VALIDATION_TRUE3 = TRUE;
	} else {
		$VALIDATION_TRUE3 = FALSE;
	}
	
	if($VALIDATION_Place == TRUE && $VALIDATION_YoungBrother == TRUE && $VALIDATION_OldBrother == TRUE && $VALIDATION_OldSister == TRUE && $VALIDATION_YoungSister == TRUE && $VALIDATION_NumBud == TRUE && $VALIDATION_FatherIDCard == TRUE && $VALIDATION_FatherFirst == TRUE && $VALIDATION_FatherLast == TRUE && $VALIDATION_FatherGroupBlood == TRUE && $VALIDATION_FatherSalary == TRUE && $VALIDATION_FatherTel == TRUE && $VALIDATION_MatherIDCard == TRUE && $VALIDATION_MatherFirst == TRUE && $VALIDATION_MatherLast == TRUE && $VALIDATION_MatherGroupBlood == TRUE && $VALIDATION_MatherSalary == TRUE && $VALIDATION_MatherTel == TRUE && $VALIDATION_ParentIDCard == TRUE && $VALIDATION_ParentFirst == TRUE && $VALIDATION_ParentLast == TRUE && $VALIDATION_ParentGroupBlood == TRUE && $VALIDATION_ParentSalary == TRUE && $VALIDATION_ParentTel == TRUE && $VALIDATION_Relation == TRUE){
		$VALIDATION_TRUE4 = TRUE;
	} else {
		$VALIDATION_TRUE4 = FALSE;
	}
	
	if($VALIDATION_FALSE){
		echo "<div class='alert alert-danger'>";
		echo "<button class='close' data-close='alert'></button>";
		echo "<ul>เกิดข้อผิดผลาด";
		echo $FORM;
		echo "</ul>";
		echo "</div>";
	} else if($VALIDATION_TRUE1 == TRUE && $VALIDATION_TRUE2 == TRUE && $VALIDATION_TRUE3 == TRUE && $VALIDATION_TRUE4 == TRUE) {
		if(is_uploaded_file($_FILES['img']['tmp_name'])){
			$ext = pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION);
			$filename = "student/" . $StudentID . "." . $ext;
		} else {
			$filename = "";
		}
		$student = "'" . $_SESSION['school_id'] . "',";
		$student .= "'" . $Year . "',";
		$student .= "'" . $StudentID . "',";
		$student .= "'" . $_SESSION['class'] . "',";
		$student .= "'" . $_SESSION['room'] . "',";
		$student .= "'" . $IDCard . "',";
		$student .= "'" . $TypeCard . "',";
		$student .= "'" . $CourseStudy . "',";
		$student .= "'" . $TypeStudent . "',";
		$student .= "'" . $SubName . "',";
		$student .= "'" . $Gender . "',";
		$student .= "'" . $FirstNameTH . "',";
		$student .= "'" . $LastNameTH . "',";
		$student .= "'" . $FirstNameEN . "',";
		$student .= "'" . $LastNameEN . "',";
		$student .= "'" . $BirthDay . "',";
		$student .= "'" . $Email . "',";
		$student .= "'" . $GroupBlood . "',";
		$student .= "'" . $Race . "',";
		$student .= "'" . $Nationality . "',";
		$student .= "'" . $Religion . "',";
		$student .= "'" . $Main . "',";
		$student .= "'" . $Secondary . "',";
		$student .= "'" . $D1 . "',";
		$student .= "'" . $D2 . "',";
		$student .= "'" . $D3 . "',";
		$student .= "'" . $D4 . "',";
		$student .= "'" . $D5 . "',";
		$student .= "'" . $D6 . "',";
		$student .= "'" . $D7 . "',";
		$student .= "'" . $D8 . "',";
		$student .= "'" . $D9 . "',";
		$student .= "'" . $L1 . "',";
		$student .= "'" . $L2 . "',";
		$student .= "'" . $L3 . "',";
		$student .= "'" . $L4 . "',";
		$student .= "'" . $L5 . "',";
		$student .= "'" . $I1 . "',";
		$student .= "'" . $I2 . "',";
		$student .= "'" . $I3 . "',";
		$student .= "'" . $I4 . "',";
		$student .= "'" . $I5 . "',";
		$student .= "'" . $I6 . "',";
		$student .= "'" . $I7 . "',";
		$student .= "'" . $I8 . "',";
		$student .= "'" . $I9 . "',";
		$student .= "'" . $I10 . "',";
		$student .= "'" . $I11 . "',";
		$student .= "'" . $I12 . "',";
		$student .= "'" . $I13 . "',";
		$student .= "'" . $Heigh . "',";
		$student .= "'" . $Weight . "',";
		$student .= "'" . $HomeCode1 . "',";
		$student .= "'" . $Moo1 . "',";
		$student .= "'" . $Road1 . "',";
		$student .= "'" . $Soy1 . "',";
		$student .= "'" . $Province1 . "',";
		$student .= "'" . $Amphur1 . "',";
		$student .= "'" . $District1 . "',";
		$student .= "'" . $ZipCode1 . "',";
		
		if($_POST['can'] == 1){
			$home = "'" . $HomeCode1 . "',";
			$home .= "'" . $Moo1 . "',";
			$home .= "'" . $Road1 . "',";
			$home .= "'" . $Soy1 . "',";
			$home .= "'" . $Province1 . "',";
			$home .= "'" . $Amphur1 . "',";
			$home .= "'" . $District1 . "',";
			$home .= "'" . $ZipCode1 . "',";
		} else {
			$home .= "'" . $HomeCode2 . "',";
			$home .= "'" . $Moo2 . "',";
			$home .= "'" . $Road2 . "',";
			$home .= "'" . $Soy2 . "',";
			$home .= "'" . $Province2 . "',";
			$home .= "'" . $Amphur2 . "',";
			$home .= "'" . $District2 . "',";
			$home .= "'" . $ZipCode2 . "',";
		}
		
		$student .= $home;
		$student .= "'" . $filename . "'";
		
		$sql = "INSERT INTO student (school_id, year, student_id, class, room, id_card, type_card, course_study, type_student, sub_name, gender, first_name_th, last_name_th, first_name_en, last_name_en, birthday_at, email, group_blood, race, nationality, religion, main, secondary, d1, d2, d3, d4, d5, d6, d7, d8, d9, l1, l2, l3, l4, l5, i1, i2, i3, i4, i5, i6, i7, i8, i9, i10, i11, i12, i13, heigh, weight, home_code_1, moo_1, road_1, soy_1, province_1, district_1, sub_district_1, zip_code_1, home_code_2, moo_2, road_2, soy_2, province_2, district_2, sub_district_2, zip_code_2, img)values($student)";
		$result = mysqli_query($link, $sql);
		
		$family = "'" . $Place . "',";
		$family .= "'" . $OldBrother . "',";
		$family .= "'" . $YoungBrother . "',";
		$family .= "'" . $OldSister . "',";
		$family .= "'" . $YoungSister . "',";
		$family .= "'" . $NumBud . "',";
		$family .= "'" . $FatherIDCard . "',";
		$family .= "'" . $FatherFirst . "',";
		$family .= "'" . $FatherLast . "',";
		$family .= "'" . $FatherGroupBlood . "',";
		$family .= "'" . $FatherSalary . "',";
		$family .= "'" . $FatherTel . "',";
		$family .= "'" . $MatherIDCard . "',";
		$family .= "'" . $MatherFirst . "',";
		$family .= "'" . $MatherLast . "',";
		$family .= "'" . $MatherGroupBlood . "',";
		$family .= "'" . $MatherSalary . "',";
		$family .= "'" . $MatherTel . "',";
		
		if($Rea == 1){
			$parent .= "'" . $FatherIDCard . "',";
			$parent .= "'" . $FatherFirst . "',";
			$parent .= "'" . $FatherLast . "',";
			$parent .= "'" . $FatherGroupBlood . "',";
			$parent .= "'" . $FatherSalary . "',";
			$parent .= "'" . $FatherTel . "',";
			$parent .= "'" . "บิดา" . "',";
		} else if($Rea == 2){
			$parent .= "'" . $MatherIDCard . "',";
			$parent .= "'" . $MatherFirst . "',";
			$parent .= "'" . $MatherLast . "',";
			$parent .= "'" . $MatherGroupBlood . "',";
			$parent .= "'" . $MatherSalary . "',";
			$parent .= "'" . $MatherTel . "',";
			$parent .= "'" . "มารดา" . "',";
		} else {
			$parent .= "'" . $ParentIDCard . "',";
			$parent .= "'" . $ParentFirst . "',";
			$parent .= "'" . $ParentLast . "',";
			$parent .= "'" . $ParentGroupBlood . "',";
			$parent .= "'" . $ParentSalary . "',";
			$parent .= "'" . $ParentTel . "',";
			$parent .= "'" . $Relation . "',";
		}
		
		$family .= $parent;
		$family .= "'" . $IDCard . "'";
		
		$sql = "INSERT INTO studentfamily (place, old_brother, young_brother, old_sister, young_sister, num_bud, father_id_card, father_first, father_last, father_group_blood, father_salary, father_tel, mather_id_card, mather_first, mather_last, mather_group_blood, mather_salary, mather_tel, parent_id_card, parent_first, parent_last, parent_group_blood, parent_salary, parent_tel, relation, id_card)values($family)";
		$result = mysqli_query($link, $sql);
		
		move_uploaded_file($_FILES['img']['tmp_name'],$filename);
		
		echo "<div class='alert alert-success'>";
		echo "<button class='close' data-close='alert'></button> ";
		echo "ข้อมูลถูกบันทึกแล้ว";
		echo "</div>";
	} else {
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
			<option value="เด็กชาย" <?php if($SubName == "เด็กชาย"){ echo "selected"; } ?>>เด็กชาย</option>
			<option value="เด็กหญิง" <?php if($SubName == "เด็กหญิง"){ echo "selected"; } ?>>เด็กหญิง</option>
			<option value="นาย" <?php if($SubName == "นาย"){ echo "selected"; } ?>>นาย</option>
            <option value="นาง" <?php if($SubName == "นาง"){ echo "selected"; } ?>>นาง</option>
            <option value="นางสาว" <?php if($SubName == "นางสาว"){ echo "selected"; } ?>>นางสาว</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $SubName_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อ<small>(ภาษาไทย)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรอกชื่อด้วยอักษรภาษาไทย" name="first_name_th" value="<?php echo $FirstNameTH; ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FirstNameTH_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุล<small>(ภาษาไทย)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรอกนามสกุลด้วยอักษรภาษาไทย" name="last_name_th" maxlength="100" value="<?php echo $LastNameTH; ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $LastNameTH_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อ<small>(ภาษาอังกฤษ)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $FirstNameEN; ?>" placeholder="กรอกชื่อด้วยอักษรภาษาอังกฤษ" name="first_name_en" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FirstNameEN_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุล<small>(ภาษาอังกฤษ)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $LastNameEN; ?>" placeholder="กรอกนามสกุลด้วยอักษรภาษาอังกฤษ" name="last_name_en" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $LastNameEN_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เพศ
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="gender">
			<option value="เลือก">-- เลือก --</option>
			<option value="ชาย" <?php if($Gender == "ชาย"){ echo "selected"; } ?>>ชาย</option>
            <option value="หญิง" <?php if($Gender == "หญิง"){ echo "selected"; } ?>>หญิง</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Gender_VALIDATION . "</span>"; ?>
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
    	<input name="birthday_at" type="text" value="<?php echo $BirthDay; ?>" class="form-control" readonly>
    </div>
    	<span class="help-block"> เลือกวัน/เดือน/ปี </span>
        <?php echo "<span class=font-size-color>" . $BirthDay_VALIDATION . "</span>"; ?>
    </div>
    </div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เลขบัตรประชาชน 
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $IDCard; ?>" placeholder="กรุณากรอกเลขบัตรประชาชนเป็นตัวเลข 13 หลัก" name="id_card" maxlength="13" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $IDCard_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">กลุ่มเลือด
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="group_blood">
			<option value="เลือก">-- เลือก --</option>
			<option value="O" <?php if($GroupBlood == "O"){ echo "selected"; } ?>>O</option>
			<option value="A" <?php if($GroupBlood == "A"){ echo "selected"; } ?>>A</option>
			<option value="B" <?php if($GroupBlood == "B"){ echo "selected"; } ?>>B</option>
            <option value="AB" <?php if($GroupBlood == "AB"){ echo "selected"; } ?>>AB</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $GroupBlood_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ส่วนสูง 
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Heigh; ?>" placeholder="กรุณากรอกส่วนสูง" name="heigh" maxlength="4" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Heigh_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">น้ำหนัก 
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Weight; ?>" placeholder="กรุณากรอกน้ำหนัก" name="weight" maxlength="4" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Weight_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">อีเมล์
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Email; ?>" placeholder="กรุณากรอกอีเมล์(ถ้ามี)" name="email" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Email_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เชื้อชาติ
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Race; ?>" placeholder="กรุณากรอกเชื้อชาติ" name="race" maxlength="20">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Race_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">สัญชาติ
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Nationality; ?>" placeholder="กรุณากรอกสัญชาติ" name="nationality" maxlength="20">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Nationality_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ศาสนา
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Religion; ?>" placeholder="กรุณากรอกศาสนา" name="religion" maxlength="20">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Religion_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ภาษาที่ใช้เป็นหลัก
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Main; ?>" placeholder="กรุณากรอกภาษาหลัก" name="main" maxlength="20">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Main_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ภาษาที่ใช้เป็นภาษารอง
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Secondary; ?>" placeholder="กรุณากรอกภาษาหลัก(ถ้ามี)" name="secondary" maxlength="20">
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

<!-- BEGIN TAB 2 -->
<div class="tab-pane" id="tab_1_2">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ข้อมูลนักเรียน</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
<?php
$general = $_POST['general'];
if(isset($general)){

	//ตัวแปรรับค่ากรณี OR FALSE
	
	
	if($VALIDATION_FALSE){
		echo "<div>";
		echo "<ul>";
		echo $FORM2;
		echo "</ul>";
		echo "</div>";
	} else if($VALIDATION_TRUE1 == TRUE && $VALIDATION_TRUE2 == TRUE && $VALIDATION_TRUE3 == TRUE && $VALIDATION_TRUE4 == TRUE) {
		echo "<div class='alert alert-success'>";
		echo "<button class='close' data-close='alert'></button> ";
		echo "ข้อมูลถูกบันทึกแล้ว";
		echo "</div>";
	} else {
		echo "<div class='alert alert-success'>";
		echo "<button class='close' data-close='alert'></button> ";
		echo "ข้อมูลครบถ้วน";
		echo "</div>";
	}

}
?> 
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสโรงเรียน
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_SESSION['school_id']; ?>" maxlength="100" readonly>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	<div class="form-group form-md-line-input">
    	<?php
			$sql = "SELECT school_id, school_name_th FROM school WHERE school_id = '" . $_SESSION['school_id'] . "'";
			$result = mysqli_query($link, $sql);
			$data = mysqli_fetch_assoc($result);
		?>
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อโรงเรียน
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" maxlength="100" value="<?php echo $data['school_name_th']; ?>" readonly>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เลขประตัวนักเรียน
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $StudentID; ?>" placeholder="กรุณากรอกเลขประจำตัวนักเรียน" name="student_id" maxlength="100" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $StudentID_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชั้น
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_SESSION['class']; ?>" name="class" maxlength="5" readonly>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ห้อง
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_SESSION['room']; ?>" name="room" maxlength="5" readonly>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ปีการศึกษา
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Year; ?>" placeholder="กรุณากรอกปีการศึกษา" name="year" maxlength="4" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Year_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชนิดบัตร
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $TypeCard; ?>" placeholder="กรุณากรอกชนิดบัตร(ถ้ามี)" name="type_card" maxlength="100">
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ประเภทนักเรียน
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $TypeStudent; ?>" placeholder="กรุณากรอกประเภทนักเรียน" name="type_student" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $TypeStudent_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">สายการเรียน
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $CourseStudy; ?>" placeholder="กรุณากรอกสายการเรียน" name="course_study" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $CourseStudy_VALIDATION . "</span>"; ?>
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
<!-- END TAB 2 -->

<!-- BEGIN TAB 3 -->
<div class="tab-pane" id="tab_1_3">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ที่อยู่ตามทะเบียนบ้าน</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
<?php
$general = $_POST['general'];
if(isset($general)){
	
	
	if($VALIDATION_FALSE){
		echo "<div>";
		echo $FORM3;
		echo "</div>";
	} else if($VALIDATION_TRUE1 == TRUE && $VALIDATION_TRUE2 == TRUE && $VALIDATION_TRUE3 == TRUE && $VALIDATION_TRUE4 == TRUE) {
		echo "<div class='alert alert-success'>";
		echo "<button class='close' data-close='alert'></button> ";
		echo "ข้อมูลถูกบันทึกแล้ว";
		echo "</div>";
	} else {
		echo "<div class='alert alert-success'>";
		echo "<button class='close' data-close='alert'></button> ";
		echo "ข้อมูลครบถ้วน";
		echo "</div>";
	}

}
?> 
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">บ้านเลขที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="home_code_1" placeholder="กรุณกรอกบ้านเลขที่" value="<?php echo $HomeCode1; ?>" maxlength="10">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $HomeCode1_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">หมู่ที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="moo_1" placeholder="กรุณากรอกหมู่ที่" value="<?php echo $Moo1; ?>" maxlength="3" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Moo1_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ถนน
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรุณกรอกถนน" name="road_1" value="<?php echo $Road1; ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Road1_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ซอย
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="soy_1" placeholder="กรุณกรอกซอย" value="<?php echo $Soy1; ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Soy1_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">จังหวัด
        	<span class="required">*</span>
        </label>
    <div class="col-md-9">
		<select class="form-control" name="province_1" id="province2">
			<option value="เลือก">-- เลือก --</option>
			<?php
  				$sql = "SELECT PROVINCE_ID, PROVINCE_NAME FROM province";
				$result = mysqli_query($link, $sql);
				while($data = mysqli_fetch_assoc($result)){
					echo "<option value='$data[PROVINCE_ID]'>" . "$data[PROVINCE_NAME]" . "</option>";
				}
  			?>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Province1_VALIDATION . "</span>"; ?>
	</div>
    </div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">อำเภอ
        	<span class="required">*</span>
        </label>
    <div class="col-md-9">
		<select class="form-control" name="district_1" id="amphur2">
			<option value="">-- กรุณาเลือกจังหวัด --</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Amphur1_VALIDATION . "</span>"; ?>
	</div>
    </div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ตำบล
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรุณากรอกตำบล" name="sub_district_1" value="<?php echo $District1; ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $District1_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสไปรษณีย์
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรุณากรอกรหัสไปรษณีย์" name="zip_code_1" value="<?php echo $ZipCode1; ?>" maxlength="5" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ZipCode1_VALIDATION . "</span>"; ?>
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
<div style="margin-bottom: 50px;"></div>
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ที่อยู่ปัจจุบัน</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ข้อมูลที่อยู่ปัจจุบัน
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<select class="form-control" id="can" name="can">
			<option value="1" <?php if($Can == "1"){ echo "selected"; } ?>>ตรงกับทะเบียนบ้าน</option>
			<option value="2" <?php if($Can == "2"){ echo "selected"; } ?>>ไม่ตรงกับทะเบียนบ้าน</option>
		</select>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	<div id="show">
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">บ้านเลขที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="home_code_2" id="home_code" placeholder="กรุณกรอกบ้านเลขที่" value="<?php echo $HomeCode2; ?>" maxlength="10">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $HomeCode2_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">หมู่ที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="moo_2" id="moo" placeholder="กรุณากรอกหมู่ที่" value="<?php echo $Moo2; ?>" maxlength="3" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Moo2_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ถนน
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="road_2" id="road" placeholder="กรุณากรอกถนน" value="<?php echo $Road2; ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Road2_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ซอย
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="soy_2" id="soy" placeholder="กรุณากรอกซอย" value="<?php echo $Soy2; ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Soy2_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">จังหวัด
        	<span class="required">*</span>
        </label>
    <div class="col-md-9">
		<select class="form-control" name="province_2" id="province">
			<option value="เลือก">-- เลือก --</option>
			<?php
  				$sql = "SELECT PROVINCE_ID, PROVINCE_NAME FROM province";
				$result = mysqli_query($link, $sql);
				while($data = mysqli_fetch_assoc($result)){
					echo "<option value='$data[PROVINCE_ID]'>" . "$data[PROVINCE_NAME]" . "</option>";
				}
  			?>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Province2_VALIDATION . "</span>"; ?>
	</div>
    </div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">อำเภอ
        	<span class="required">*</span>
        </label>
    <div class="col-md-9">
		<select class="form-control" name="district_2" id="amphur">
			<option value="">-- กรุณาเลือกจังหวัด --</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Amphur2_VALIDATION . "</span>"; ?>
	</div>
    </div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ตำบล
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรุณากรอกตำบล" id="district" name="sub_district_2" value="<?php echo $District2; ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $District2_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสไปรษณีย์
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรุณากรอกรหัสไปรษณีย์" id="zip_code" name="zip_code_2" value="<?php echo $ZipCode2; ?>" maxlength="5" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ZipCode2_VALIDATION . "</span>"; ?>
	</div>
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

<!-- BEGIN TAB 5 -->
<div class="tab-pane" id="tab_1_5">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ครอบครัว</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
<?php
$general = $_POST['general'];
if(isset($general)){

	//ตัวแปรรับค่ากรณี OR FALSE
	
	
	if($VALIDATION_FALSE){
		echo "<div>";
		echo "</div>";
	} else if($VALIDATION_TRUE1 == TRUE && $VALIDATION_TRUE2 == TRUE && $VALIDATION_TRUE3 == TRUE && $VALIDATION_TRUE4 == TRUE) {
		echo "<div class='alert alert-success'>";
		echo "<button class='close' data-close='alert'></button> ";
		echo "ข้อมูลถูกบันทึกแล้ว";
		echo "</div>";
	} else {
		echo "<div class='alert alert-success'>";
		echo "<button class='close' data-close='alert'></button> ";
		echo "ข้อมูลครบถ้วน";
		echo "</div>";
	}

}
?> 
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">สถานะ
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="place">
			<option value="เลือก">-- เลือก --</option>
			<option value="อยู่ด้วยกัน" <?php if($Place == "อยู่ด้วยกัน"){ echo "selected"; } ?>>อยู่ด้วยกัน</option>
			<option value="แยกกันอยู่" <?php if($Place == "แยกกันอยู่"){ echo "selected"; } ?>>แยกกันอยู่</option>
			<option value="บิดาถึงแก่กรรม" <?php if($Place == "บิดาถึงแก่กรรม"){ echo "selected"; } ?>>บิดาถึงแก่กรรม</option>
            <option value="มารดาถึงแก่กรรม" <?php if($Place == "มารดาถึงแก่กรรม"){ echo "selected"; } ?>>มารดาถึงแก่กรรม</option>
            <option value="บิดาและมารดาถึงแก่กรรม" <?php if($Place == "บิดาและมารดาถึงแก่กรรม"){ echo "selected"; } ?>>บิดาและมารดาถึงแก่กรรม</option>
            <option value="มารดาแต่งงานใหม่" <?php if($Place == "มารดาแต่งงานใหม่"){ echo "selected"; } ?>>มารดาแต่งงานใหม่</option>
            <option value="บิดาและมารถดาแต่งงานใหม่" <?php if($Place == "บิดาและมารถดาแต่งงานใหม่"){ echo "selected"; } ?>>บิดาและมารถดาแต่งงานใหม่</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Place_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">มีพี่ชาย
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="old_brother" placeholder="กรอกจำนวนพี่ชาย(ถ้าไม่มีกรอกเป็น 0)" maxlength="2" value="<?php echo $OldBrother; ?>"  OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $OldBrother_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">มีน้องชาย
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="young_brother" placeholder="กรอกจำนวนน้องชาย(ถ้าไม่มีกรอกเป็น 0)" maxlength="2" value="<?php echo $YoungBrother; ?>"  OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $YoungBrother_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">มีพี่สาว
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="old_sister" placeholder="กรอกจำนวนพี่สาว(ถ้าไม่มีกรอกเป็น 0)" maxlength="2" value="<?php echo $OldSister; ?>"  OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $OldSister_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">มีน้องสาว
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="young_sister" placeholder="กรอกจำนวนน้องชาย(ถ้าไม่มีกรอกเป็น 0)" maxlength="2" value="<?php echo $YoungSister; ?>"  OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $YoungSister_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เป็นบุตรคนที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="num_bud" placeholder="กรอกข้อมูล" maxlength="2" value="<?php echo $NumBud; ?>"  OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $NumBud_VALIDATION . "</span>"; ?>
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
<div style="margin-bottom: 50px;"></div>
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ข้อมูลบิดา</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสบัตรประชาชน
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="father_id_card" placeholder="กรุณากรอกรหัสบัตรประชาชนของบิดา" maxlength="13" value="<?php echo $FatherIDCard; ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FatherIDCard_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อบิดา
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="father_first" placeholder="กรุณากรอกชื่อบิดา" maxlength="50" value="<?php echo $FatherFirst; ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FatherFirst_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุลบิดา
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="father_last" placeholder="กรุณากรอกนามสกุลบิดา" maxlength="50" value="<?php echo $FatherLast; ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FatherLast_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">กลุ่มเลือด
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="father_group_blood">
			<option value="เลือก">-- เลือก --</option>
			<option value="O" <?php if($FatherGroupBlood == "O"){ echo "selected"; } ?>>O</option>
			<option value="A" <?php if($FatherGroupBlood == "A"){ echo "selected"; } ?>>A</option>
			<option value="B" <?php if($FatherGroupBlood == "B"){ echo "selected"; } ?>>B</option>
            <option value="AB" <?php if($FatherGroupBlood == "AB"){ echo "selected"; } ?>>AB</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FatherGroupBlood_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เงินเดือน
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="father_salary" placeholder="กรุณากรอกเงินเดือนบิดา" maxlength="7" value="<?php echo $FatherSalary; ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FatherSalary_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เบอร์โทรศัพท์
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="father_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์ของบิดา" maxlength="10" value="<?php echo $FatherTel; ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FatherTel_VALIDATION . "</span>"; ?>
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
<div style="margin-bottom: 50px;"></div>
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ข้อมูลมารดา</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสบัตรประชาชน
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="mather_id_card" placeholder="กรุณากรอกรหัสบัตรประชาชนของมารดา" maxlength="13" value="<?php echo $MatherIDCard; ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $MatherIDCard_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อมารดา
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="mather_first" placeholder="กรุณากรอกชื่อมารดา" maxlength="50" value="<?php echo $MatherFirst; ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $MatherFirst_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุลมารดา
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="mather_last" placeholder="กรุณากรอกนามสกุลมารดา" maxlength="50" value="<?php echo $MatherLast; ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $MatherLast_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">กลุ่มเลือด
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="mather_group_blood">
			<option value="เลือก">-- เลือก --</option>
			<option value="O" <?php if($MatherGroupBlood == "O"){ echo "selected"; } ?>>O</option>
			<option value="A" <?php if($MatherGroupBlood == "A"){ echo "selected"; } ?>>A</option>
			<option value="B" <?php if($MatherGroupBlood == "B"){ echo "selected"; } ?>>B</option>
            <option value="AB" <?php if($MatherGroupBlood == "AB"){ echo "selected"; } ?>>AB</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $MatherGroupBlood_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เงินเดือน
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="mather_salary" placeholder="กรุณากรอกเงินเดือนมารดา" maxlength="7" value="<?php echo $MatherSalary; ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $MatherSalary_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เบอร์โทรศัพท์
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="mather_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์ของมารดา" maxlength="10" value="<?php echo $MatherTel; ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $MatherTel_VALIDATION . "</span>"; ?>
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
<div style="margin-bottom: 50px;"></div>
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ข้อมูลผู้ปกครอง</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ผู้ปกครอง
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<select class="form-control" id="rea" name="rea">
			<option value="1" <?php if($Rea == "1"){ echo "selected"; } ?>>บิดา</option>
			<option value="2" <?php if($Rea == "2"){ echo "selected"; } ?>>มารดา</option>
			<option value="3" <?php if($Rea == "3"){ echo "selected"; } ?>>บุคคลอื่น</option>
		</select>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	<div id="re">
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสบัตรประชาชน
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="parent_id_card" placeholder="กรุณากรอกรหัสบัตรประชาชนของผู้ปกครอง" maxlength="13" value="<?php echo $ParentIDCard; ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ParentIDCard_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อผู้ปกครอง
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="parent_first" placeholder="กรุณากรอกชื่อผู้ปกครอง" maxlength="50" value="<?php echo $ParentFirst; ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ParentFirst_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุลผู้ปกครอง
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="parent_last" placeholder="กรุณากรอกนามสกุลผู้ปกครอง" maxlength="50" value="<?php echo $ParentLast; ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ParentLast_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">กลุ่มเลือด
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="parent_group_blood">
			<option value="เลือก">-- เลือก --</option>
			<option value="O" <?php if($ParentGroupBlood == "O"){ echo "selected"; } ?>>O</option>
			<option value="A" <?php if($ParentGroupBlood == "A"){ echo "selected"; } ?>>A</option>
			<option value="B" <?php if($ParentGroupBlood == "B"){ echo "selected"; } ?>>B</option>
            <option value="AB" <?php if($ParentGroupBlood == "AB"){ echo "selected"; } ?>>AB</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ParentGroupBlood_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เงินเดือน
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="parent_salary" placeholder="กรุณากรอกเงินเดือนผู้ปกครอง" maxlength="7" value="<?php echo $ParentSalary; ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ParentSalary_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เบอร์โทรศัพท์
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="parent_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์ของผู้ปกครอง" maxlength="10" value="<?php echo $ParentTel; ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ParentTel_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ความสัมพันธ์ระหว่างนักเรียนกับผู้ปกครอง
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="relation" placeholder="กรุณากรอกความสัมพันธ์ระหว่างนักเรียนกับผู้ปกครอง" maxlength="20" value="<?php echo $Relation; ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Relation_VALIDATION . "</span>"; ?>
	</div>
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
<!-- END TAB 5 -->

<!-- BEGIN TAB 6 -->
<div class="tab-pane" id="tab_1_6">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ผู้บกพร่อง</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
<?php
$general = $_POST['general'];
if(isset($general)){

	//ตัวแปรรับค่ากรณี OR FALSE
	$VALIDATION_FALSE = $VALIDATION_StudentID == FALSE || $VALIDATION_TypeStudent == FALSE || $VALIDATION_CourseStudy == FALSE;
	
	if($VALIDATION_TRUE) {
		echo "<div class='alert alert-success'>";
		echo "<button class='close' data-close='alert'></button> ";
		echo "ข้อมูลถูกบันทึกแล้ว";
		echo "</div>";
	}
}
?> 
    <div class="form-group form-md-checkboxes">
		<label class="col-md-3 control-label" for="form_control_1">ความพิการ</label>
	<div class="col-md-9">
	<div class="md-checkbox-list">
		<input type="checkbox" name="d1" value="1" <?php if($D1 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_1">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางการมองเห็น
        </label><br>
		<input type="checkbox" name="d2" value="1" <?php if($D2 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_2">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางการได้ยิน 
        </label><br>
		<input type="checkbox" name="d3" value="1" <?php if($D3 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางสติปัญญา
        </label><br>
		<input type="checkbox" name="d4" value="1" <?php if($D4 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางร่างกายและสุขภาพ
        </label><br>
		<input type="checkbox" name="d5" value="1" class="md-check" <?php if($D5 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางการเรียนรู้
        </label><br>
		<input type="checkbox" name="d6" value="1" class="md-check" <?php if($D6 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางการพูดและภาษา
        </label><br>
		<input type="checkbox" name="d7" value="1" class="md-check" <?php if($D7 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางพฤติกรรมและอารมณ์
        </label><br>
		<input type="checkbox" name="d8" value="1" class="md-check" <?php if($D8 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางออทิสติก
        </label><br>
		<input type="checkbox" name="d9" value="1" class="md-check" <?php if($D9 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางการซ้ำซ้อน
        </label><br>
	</div>
	</div>
	</div>
    <div style="margin-bottom: 30px;"></div>
    <div class="form-group form-md-checkboxes">
		<label class="col-md-3 control-label" for="form_control_1">ความขาดแคลน</label>
	<div class="col-md-9">
	<div class="md-checkbox-list">
		<input type="checkbox" name="l1" value="1" class="md-check" <?php if($L1 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_1">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ขาดแคลนเครื่องแบบนักเรียน
        </label><br>
		<input type="checkbox" name="l2" value="1" class="md-check" <?php if($L2 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_2">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ขาดแคลนเครื่องเขียน 
        </label><br>
		<input type="checkbox" name="l3" value="1" class="md-check" <?php if($L3 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ขาดแคลนแบบเรียน
        </label><br>
		<input type="checkbox" name="l4" value="1" class="md-check" <?php if($L4 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ขาดแคลนอาหารกลางวัน
        </label><br>
		<input type="checkbox" name="l5" value="1" class="md-check" <?php if($L5 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ขาดแคลน 3 รายการหรือมากกว่า
        </label><br>
	</div>
	</div>
	</div>
    <div style="margin-bottom: 30px;"></div>
    <div class="form-group form-md-checkboxes">
		<label class="col-md-3 control-label" for="form_control_1">ผู้ด้อยโอกาส</label>
	<div class="col-md-9">
	<div class="md-checkbox-list">
		<input type="checkbox" name="i1" value="1" class="md-check" <?php if($I1 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_1">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กถูกบังคับให้ขายแรงงาน
        </label><br>
		<input type="checkbox" name="i2" value="1" class="md-check" <?php if($I2 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_2">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กที่อยู่ในธุรกิจทางเพศ 
        </label><br>
		<input type="checkbox" name="i3" value="1" class="md-check" <?php if($I3 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กที่ถูดทอดทิ้ง
        </label><br>
		<input type="checkbox" name="i4" value="1" class="md-check" <?php if($I4 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กในสถานพินิจและคุ้มครองเยาวชน
        </label><br>
		<input type="checkbox" name="i5" value="1" class="md-check" <?php if($I5 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กเร่ร่อน
        </label><br>
		<input type="checkbox" name="i6" value="1" class="md-check" <?php if($I6 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ผลกระทบจากเอดส์
        </label><br>
		<input type="checkbox" name="i7" value="1" class="md-check" <?php if($I7 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ชนกลุ่มน้อย
        </label><br>
		<input type="checkbox" name="i8" value="1" class="md-check" <?php if($I8 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กที่ถูกทำร้ายทารุณ
        </label><br>
		<input type="checkbox" name="i9" value="1" class="md-check" <?php if($I9 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กยากจน
        </label><br>
		<input type="checkbox" name="i10" value="1" class="md-check" <?php if($I10 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กที่มีปัญหาเกี่ยวกับยาเสพติด
        </label><br>
		<input type="checkbox" name="i11" value="1" class="md-check" <?php if($I11 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> อื่นๆ
        </label><br>
		<input type="checkbox" name="i12" value="1" class="md-check" <?php if($I12 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> กำพร้า
        </label><br>
		<input type="checkbox" name="i13" value="1" class="md-check" <?php if($I13 == 1){ echo "checked"; } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ทำงานรับผิดชอบตนเองและครอบครัว
        </label>
	</div>
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
<!-- END TAB 6 -->

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