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
		<a href="#tab_1_7" data-toggle="tab">ข้อมูลอื่นๆ</a>
	</li>
    <li>
		<button type="submit" name="general" class="btn btn-sm blue">แก้ไขข้อมูล</button>
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
	$id = $_GET['id'];
	$sql = "SELECT * FROM student inner join studentfamily on student.id_card = studentfamily.id_card WHERE student.id_card = '$id'"; 
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_assoc($result);
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
	$Class = $_COOKIE['Class'] = $_POST['class'];
	$Room = $_COOKIE['Room'] = $_POST['room'];
	
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
	
	$Accommodation = $_COOKIE['Accommodation'] = $_POST['accommodation'];
	$Disease = $_COOKIE['Disease'] = $_POST['disease'];
	$Fund = $_COOKIE['Fund'] = $_POST['fund'];
	$Chance = $_COOKIE['Chance'] = $_POST['chance'];
	$Dropout = $_COOKIE['Dropout'] = $_POST['dropout'];
	$Sahad = $_COOKIE['Sahad'] = $_POST['sahad'];
	$Behavior = $_COOKIE['Behavior'] = $_POST['behavior'];
	
		
	//ตัวแปรเก็บเงื่อนไข
	$language = "/^[a-zA-Z]+$/";//เช็คตัวอักษรภาษาอังกฤษ
	$IDCard_PATTERN = "/^[0-9]{13}$/";//เช็คตัวเลข 13 หลัก
	$Tel_PATTERN = "/^0[689]{1}[0-9]{8}+$/";//เช็คหมายเลขเบอร์โทรศัพท์
	
	//FORM1
	
	if($SubName == "เลือก"){
		$FORM1 = "<li>" . "กรุกาเลือกคำนำหน้า" . "</li>";
		$SubName_VALIDATION = "กรุณาเลือกคำนำหน้า";
		$VALIDATION_SubName = FALSE;
	} else {
		$VALIDATION_SubName = TRUE;
	}//		เช็คเงื่อนไขคำนำหน้า		//
	
	if(empty($FirstNameTH)){
		$FORM1 .= "<li>" . "กรุณากรอกชื่อ(ภาษาไทย)" . "</li>";
		$FirstNameTH_VALIDATION = "กรุณากรอกชื่อ(ภาษาไทย)" . "</li>";
		$VALIDATION_FirstNameTH = FALSE;
	} else {
		if(preg_match($language, $FirstNameTH)){
			$FORM1 .= "<li>" . "ชื่อต้องเป็นอักษรภาษาไทยเท่านั้น" . "</li>";
			$FirstNameTH = "ชื่อต้องเป็นอักษรภาษาไทยเท่านั้น";
			$VALIDATION_FirstNameTH = FALSE;
		} else {
			$VALIDATION_FirstNameTH = TRUE;
		}
	}//		เช็คเงื่อนไขชื่อ(ภาษาไทย)		//
	
	if(empty($LastNameTH)){
		$FORM1 .= "<li>" . "กรุณากรอกนามสกุล(ภาษาไทย)" . "</li>";
		$LastNameTH_VALIDATION = "กรุณากรอกนามสกุล(ภาษาไทย)";
		$VALIDATION_LastNameTH = FALSE;
	} else {
		if(preg_match($language, $LastNameTH)){
			$FORM1 .= "นามสกุลต้องเป็นอักษรภาษาไทยเท่านั้น";
			$LastNameTH_VALIDATION = "นามสกุลต้องเป็นอักษรภาษาไทยเท่านั้น";
			$VALIDATION_LastNameTH = FALSE;
		} else {
			$VALIDATION_LastNameTH = TRUE;
		}
	}//		เช็คเงื่อนไขนามสกุล(ภาษาไทย)		//
	
	if(empty($FirstNameEN)){
		$FORM1 .= "<li>" . "กรุณากรอกชื่อ(ภาษาอังกฤษ)" . "</li>";
		$FirstNameEN_VALIDATION = "กรุณากรอกชื่อ(ภาษาอังกฤษ)" . "</li>";
		$VALIDATION_FirstNameEN = FALSE;
	} else {
		if(!preg_match($language, $FirstNameEN)){
			$FORM1 .= "<li>" . "ชื่อต้องเป็นอักษรภาษาอังกฤษเท่านั้น" . "</li>";
			$FirstNameEN_VALIDATION = "ชื่อต้องเป็นอักษรภาษาอังกฤษเท่านั้น";
			$VALIDATION_FirstNameEN = FALSE;
		} else {
			$VALIDATION_FirstNameEN = TRUE;
		}
	}//		เช็คเงื่อนไขชื่อ(ภาษาอังกฤษ)		//
	
	if(empty($LastNameEN)){
		$FORM1 .= "<li>" . "กรุณากรอกนามสกุล(ภาษาอังกฤษ)" . "</li>";
		$LastNameEN_VALIDATION = "กรุณากรอกนามสกุล(ภาษาอังกฤษ)" . "</li>";
		$VALIDATION_LastNameEN = FALSE;
	} else {
		if(!preg_match($language, $LastNameEN)){
			$FORM1 .= "<li>" . "นามสกุลต้องเป็นภาษาอังกฤษเท่านั้น" . "</li>";
			$LastNameEN_VALIDATION = "นามสกุลต้องเป็นภาษาอังกฤษเท่านั้น";
			$VALIDATION_LastNameEN = FALSE;
		} else {
			$VALIDATION_LastNameEN = TRUE;
		}
	}//		เช็คเงื่อนไขนามสกุล(ภาษาอังกฤษ)		//
	
	if($Gender == "เลือก"){
		$FORM1 .= "<li>" . "กรุณาเลือกเพศ" . "</li>";
		$Gender_VALIDATION = "กรุณาเลือกเพศ";
		$VALIDATION_Gender = FALSE;
	} else {
		$VALIDATION_Gender = TRUE;
	}//		เช็คเงื่อนไขเพศ		//
	
	if(empty($BirthDay)){
		$FORM1 .= "<li>" . "กรุณาเลือกวัน/เดือน/ปี(เกิด)" . "</li>";
		$BirthDay_VALIDATION = "กรุณาเลือกวัน/เดือน/ปี(เกิด)";
		$VALIDATION_BirthDay = FALSE;
	} else {
		$VALIDATION_BirthDay = TRUE;
	}//		เช็คเงื่อนไขวัน/เดือน/ปี(เกิด)		//
	
	if(empty($IDCard)){
		$FORM1 .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนเป็นตัวเลข 13 หลัก" . "</li>";
		$IDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนเป็นตัวเลข 13 หลัก";
		$VALIDATION_IDCard = FALSE;
	} else {
		if(!preg_match($IDCard_PATTERN, $IDCard)){
			$FORM1 .= "<li>" . "กรอกเลขประจำตัวประชาชนเป็นตัวเลข 13 หลัก เท่านั้น" . "</li>";
			$IDCard_VALIDATION = "กรอกเลขประจำตัวประชาชนเป็นตัวเลข 13 หลัก เท่านั้น";
			$VALIDATION_IDCard = FALSE;
		} else {
			$sql = "SELECT id_card FROM student WHERE id_card = '" . $IDCard . "'";
			$result = mysqli_query($link, $sql);
			$data = mysqli_num_rows($result);
			
			if($data == 1){
				$FORM1 .= "<li>" . "หมายเลขบัตรประชาชนนี้ถูกใช้งานแล้ว" . "</li>";
				$IDCard_VALIDATION = "หมายเลขบัตรประชาชนนี้ถูกใช้งานแล้ว";
				$VALIDATION_IDCard = FALSE;
			} else {
				$VALIDATION_IDCard = TRUE;
			}
		}
	}//		เช็คเงื่อนไขหมายเลขบัตรประชาชน		//
	
	if($GroupBlood == "เลือก"){
		$FORM1 .= "<li>" . "กรุณาเลือกกรุ๊ปเลือด" . "</li>";
		$GroupBlood_VALIDATION = "กรุณาเลือกกรุ๊ปเลือด" . "</li>";
		$VALIDATION_GroupBlood = FALSE;
	} else {
		$VALIDATION_GroupBlood = TRUE;
	}//		เช็คเงื่อนไขกรุ๊ปเลือด		//
	
	if(empty($Heigh)){
		$FORM1 .= "<li>" . "กรุณากรอกส่วนสูง" . "</li>";
		$Heigh_VALIDATION = "กรุณากรอกส่วนสูง";
		$VALIDATION_Heigh = FALSE;
	} else {
		$VALIDATION_Heigh = TRUE;
	}//		เช็คเงื่อนไขส่วนสูง		//
	
	if(empty($Weight)){
		$FORM1 .= "<li>" . "กรุณากรอกน้ำหนัก" . "</li>";
		$Weight_VALIDATION = "กรุณากรอกน้ำหนัก";
		$VALIDATION_Weight = FALSE;
	} else {
		$VALIDATION_Weight = TRUE;
	}//		เช็คเงื่อนไขน้ำหนัก		//
	
	if(empty($Race)){
		$FORM1 .= "<li>" . "กรุณากรอกเชื้อชาติ" . "</li>";
		$Rac_VALIDATION = "กรุณากรอกเชื้อชาติ";
		$VALIDATION_Race = FALSE;
	} else {
		$VALIDATION_Race = TRUE;
	}//		เช็คเงื่อนไขเชื้อชาติ		//
	
	if(empty($Nationality)){
		$FORM1 .= "<li>" . "กรุณากรอกสัญชาติ" . "</li>";
		$Nationality_VALIDATION = "กรุณากรอกสัญชาติ";
		$VALIDATION_Nationality = FALSE;
	} else {
		$VALIDATION_Nationality = TRUE;
	}//		เช็คเงื่อนไขสัญชาติ		//
	
	if(empty($Religion)){
		$FORM1 .= "<li>" . "กรุณากรอกศาสนา" . "</li>";
		$Religion_VALIDATION = "กรุณากรอกศาสนา";
		$VALIDATION_Religion = FALSE;
	} else {
		$VALIDATION_Religion = TRUE;
	}//		เช็คเงื่อนไขศาสนา		//
	
	if(empty($Main)){
		$FORM1 .= "<li>" . "กรุณากรอกภาษาหลัก" . "</li>";
		$Main_VALIDATION = "กรุณากรอกภาษาหลัก";
		$VALIDATION_Main = FALSE;
	} else {
		$VALIDATION_Main = TRUE;
	}//		เช็คเงื่อนไขภาษาหลัก		//
	
	if(empty($Year)){
		$FORM1 .= "<li>" . "กรุณากรอกปีการศึกษา" . "</li>";
		$Year_VALIDATION = "กรุณากรอกปีการศึกษา";
		$VALIDATION_Year = FALSE;
	} else {
		$VALIDATION_Year = TRUE;
	}//		เช็คเงื่อนไขปีการศึกษา		//
	
	//FORM1
	
	if(empty($TypeStudent)){
		$FORM1 .= "<li>" . "กรุณากรอกประเภทนักเรียน" . "</li>";
		$TypeStudent_VALIDATION = "กรุณากรอกประเภทนักเรียน";
		$VALIDATION_TypeStudent = FALSE;
	} else {
		$VALIDATION_TypeStudent = TRUE;
	}//		เช็คเงื่อนไขประเภทนักเรียน		//
	
	if(empty($CourseStudy)){
		$FORM1 .= "<li>" . "กรุณากรอกสายการเรียน" . "</li>";
		$CourseStudy_VALIDATION = "กรุณากรอกสายการเรียน";
		$VALIDATION_CourseStudy = FALSE;
	} else {
		$VALIDATION_CourseStudy = TRUE;
	}//		เช็คเงื่อนไขสายการเรียน		//
	
	//FORM1
	//		ที่อยู่ตามทะเบียนบ้าน		//
	if(empty($HomeCode1)){
		$FORM1 .= "<li>" . "กรุณากรอกบ้านเลขที่(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$HomeCode1_VALIDATION = "กรุณากรอกบ้านเลขที่(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_HomeCode1 = FALSE;
	} else {
		$VALIDATION_HomeCode1 = TRUE;
	}//		เช็คเงื่อนไขบ้านเลขที่		//
	
	if(empty($Moo1)){
		$FORM1 .= "<li>" . "กรุณากรอกหมู่ที่(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$Moo1_VALIDATION = "กรุณากรอกหมู่ที่(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_Moo1 = FALSE;
	} else {
		$VALIDATION_Moo1 = TRUE;
	}//		เช็คเงื่อนไขหมู่ที่		//
	
	if(empty($Road1)){
		$FORM1 .= "<li>" . "กรุณากรอกถนน(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$Road1_VALIDATION = "กรุณากรอกถนน(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_Road1 = FALSE;
	} else {
		$VALIDATION_Road1 = TRUE;
	}//		เช็คเงื่อนไขถนน		//
	
	if(empty($Soy1)){
		$FORM1 .= "<li>" . "กรุณากรอกซอย(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$Soy1_VALIDATION = "กรุณากรอกซอย(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_Soy1 = FALSE;
	} else {
		$VALIDATION_Soy1 = TRUE;
	}//		เช็คเงื่อนไขซอย		//
	
	if($Province1 == "เลือก"){
		$FORM1 .= "<li>" . "กรุณาเลือกจังหวัด(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$Province1_VALIDATION = "กรุณาเลือกจังหวัด(ที่อยู่ตามทะเบียนบ้าน)";
		$Amphur1_VALIDATION = "กรุณาเลือกจังหวัดก่อน(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_Province1 = FALSE;
	} else {
		$VALIDATION_Province1 = TRUE;
	}//		เช็คเงื่อนไขจังหวัด		//
	
	if(empty($District1)){
		$FORM1 .= "กรุณากรอกตำบล(ที่อยู่ตามทะเบียนบ้าน)";
		$District1_VALIDATION = "กรุณากรอกตำบล(ที่อยู่ตามทะเบียนบ้าน)";
		$VALIDATION_District1 = FALSE;
	} else {
		$VALIDATION_District1 = TRUE;
	}//		เช็คเงื่อนไขตำบล		//
	
	if(empty($ZipCode1)){
		$FORM1 .= "<li>" . "กรุณากรอกรหัสไปรษณีย์(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$ZipCode1_VALIDATION = "กรุกรอกรหัสไปรษณีย์(ที่อยู่ตามทะเบียนบ้าน)" . "</li>";
		$VALIDATION_ZipCode1 = FALSE;
	} else {
		$VALIDATION_ZipCode1 = TRUE;
	}//		เช็คเงื่อนไขรหัสไปรษณีย์		//
	
	//		ที่อยู่ปัจจุบัน		//
	if(empty($HomeCode2)){
		$FORM1 .= "<li>" . "กรุณากรอกบ้านเลขที่(ที่อยู่ปัจจุบัน)" . "</li>";
		$HomeCode2_VALIDATION = "กรุณากรอกบ้านเลขที่(ที่อยู่ปัจจุบัน)";
		$VALIDATION_HomeCode2 = FALSE;
	} else {
		$VALIDATION_HomeCode2 = TRUE;
	}//		เช็คเงื่อนไขบ้านเลขที่		//
	
	if(empty($Moo2)){
		$FORM1 .= "<li>" . "กรุณากรอกหมู่ที่(ที่อยู่ปัจจุบัน)" . "</li>";
		$Moo2_VALIDATION = "กรุณากรอกหมู่ที่(ที่อยู่ปัจจุบัน)";
		$VALIDATION_Moo2 = FALSE;
	} else {
		$VALIDATION_Moo2 = TRUE;
	}//		เช็คเงื่อนไขหมู่ที่		//
	
	if(empty($Road2)){
		$FORM1 .= "<li>" . "กรุณากรอกถนน(ที่อยู่ปัจจุบัน)" . "</li>";
		$Road2_VALIDATION = "กรุณากรอกถนน(ที่อยู่ปัจจุบัน)";
		$VALIDATION_Road2 = FALSE;
	} else {
		$VALIDATION_Road2 = TRUE;
	}//		เช็คเงื่อนไขถนน		//
	
	if(empty($Soy2)){
		$FORM1 .= "<li>" . "กรุณากรอกซอย(ที่อยู่ปัจจุบัน)" . "</li>";
		$Soy2_VALIDATION = "กรุณากรอกซอย(ที่อยู่ปัจจุบัน)";
		$VALIDATION_Soy2 = FALSE;
	} else {
		$VALIDATION_Soy2 = TRUE;
	}//		เช็คเงื่อนไขซอย		//
	
	if($Province2 == "เลือก"){
		$FORM1 .= "<li>" . "กรุณาเลือกจังหวัด(ที่อยู่ปัจจุบัน)" . "</li>";
		$Province2_VALIDATION = "กรุณาเลือกจังหวัด(ที่อยู่ปัจจุบัน)";
		$Amphur2_VALIDATION = "กรุณาเลือกจังหวัดก่อน(ที่อยู่ปัจจุบัน)";
		$VALIDATION_Province2 = FALSE;
	} else {
		$VALIDATION_Province2 = TRUE;
	}//		เช็คเงื่อนไขจังหวัด		//
	
	if(empty($District2)){
		$FORM1 .= "กรุณากรอกตำบล(ที่อยู่ปัจจุบัน)";
		$District2_VALIDATION = "กรุณากรอกตำบล(ที่อยู่ปัจจุบัน)";
		$VALIDATION_District2 = FALSE;
	} else {
		$VALIDATION_District2 = TRUE;
	}//		เช็คเงื่อนไขตำบล		//
	
	if(empty($ZipCode2)){
		$FORM1 .= "<li>" . "กรุณากรอกรหัสไปรษณีย์(ที่อยู่ปัจจุบัน)" . "</li>";
		$ZipCode2_VALIDATION = "กรุกรอกรหัสไปรษณีย์(ที่อยู่ปัจจุบัน)" . "</li>";
		$VALIDATION_ZipCode2 = FALSE;
	} else {
		$VALIDATION_ZipCode2 = TRUE;
	}//		เช็คเงื่อนไขรหัสไปรษณีย์		//
	
	//FORM1
	
	if($Place == "เลือก"){
		$FORM1 .= "<li>" . "กรุณาเลือกสถานะ" . "</li>";
		$Place_VALIDATION = "กรุณาเลือกสถานะ";
		$VALIDATION_Place = FALSE;
	} else {
		$VALIDATION_Place = TRUE;
	}//		เช็คเงื่อนไขสถานะ		//
	
	if($OldBrother == ""){
		$FORM1 .= "<li>" . "กรุณากรอกจำนวนพี่ชาย" . "</li>";
		$OldBrother_VALIDATION = "กรุณากรอกจำนวนพี่ชาย";
		$VALIDATION_OldBrother = FALSE;
	} else {
		$VALIDATION_OldBrother = TRUE;
	}//		เช็คเงื่อนไขจำนวนพี่ชาย		//
	
	if($YoungBrother == ""){
		$FORM1 .= "<li>" . "กรุณากรอกจำนวนน้องชาย" . "</li>";
		$YoungBrother_VALIDATION = "กรุณากรอกจำนวนน้องชาย";
		$VALIDATION_YoungBrother = FALSE;
	} else {
		$VALIDATION_YoungBrother = TRUE;
	}//		เช็คเงื่อนไขจำนวนน้องชาย		//
	
	if($OldSister == ""){
		$FORM1 .= "<li>" . "กรุณากรอกจำนวนพี่สาว" . "</li>";
		$OldSister_VALIDATION = "กรุณากรอกจำนวนพี่สาว";
		$VALIDATION_OldSister = FALSE;
	} else {
		$VALIDATION_OldSister = TRUE;
	}//		เช็คเงื่อนไขจำนวนพี่สาว		//
	
	if($YoungSister == ""){
		$FORM1 .= "<li>" . "กรุณากรอกจำนวนน้องสาว" . "</li>";
		$YoungSister_VALIDATION = "กรุณากรอกจำนวนน้องสาว";
		$VALIDATION_YoungSister = FALSE;
	} else {
		$VALIDATION_YoungSister = TRUE;
	}//		เช็คเงื่อนไขจำนวนน้องสาว		//
	
	if($NumBud == ""){
		$FORM1 .= "<li>" . "กรุณากรอกข้อมูล" . "</li>";
		$NumBud_VALIDATION = "กรุณากรอกข้อมูล";
		$VALIDATION_NumBud = FALSE;
	} else {
		$VALIDATION_NumBud = TRUE;
	}//		เช็คเงื่อนไขเป็นบุตรคนที่		//
	
	if(empty($FatherIDCard)){
		$FORM1 .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนของบิดา" . "</li>";
		$FatherIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนของบิดา" . "</li>";
		$VALIDATION_FatherIDCard = FALSE;
	} else {
		if(!preg_match($IDCard_PATTERN, $FatherIDCard)){
			$FORM1 .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$FatherIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$VALIDATION_FatherIDCard = FALSE;
		} else {
			$VALIDATION_FatherIDCard = TRUE;
		}
	}//		เช็คเงื่อนไขหมายเลขบัตรประชาชนของบิดา		//
	
	if(empty($FatherFirst)){
		$FORM1 .= "<li>" . "กรุณากรอกชื่อบิดา" . "</li>";
		$FatherFirst_VALIDATION = "กรุณากรอกชื่อบิดา";
		$VALIDATION_FatherFirst = FALSE;
	} else {
		$VALIDATION_FatherFirst = TRUE;
	}//		เช็คเงื่อนไขชื่อบิดา		//
	
	if(empty($FatherLast)){
		$FORM1 .= "<li>" . "กรุณากรอกนามสกุลบิดา" . "</li>";
		$FatherLast_VALIDATION = "กรุณากรอกนามสกุลบิดา";
		$VALIDATION_FatherLast = FALSE;
	} else {
		$VALIDATION_FatherLast = TRUE;
	}//		เช็คเงื่อนไขนามสกุลบิดา		//
	
	if($FatherGroupBlood == "เลือก"){
		$FORM1 .= "<li>" . "กรุณาเลือกกรุ๊ปเลือดบิดา" . "</li>";
		$FatherGroupBlood_VALIDATION = "กรุณาเลือกกรุ๊ปเลือดบิดา";
		$VALIDATION_FatherGroupBlood = FALSE;
	} else {
		$VALIDATION_FatherGroupBlood = TRUE;
	}//		เช็คเงื่อนไขกรุ๊ปเลือดบิดา		//
	
	if(empty($FatherSalary)){
		$FORM1 .= "<li>" . "กรุณากรอกเงินเดือนของบิดา" . "</li>";
		$FatherSalary_VALIDATION = "กรุณากรอกเงินเดือนของบิดา";
		$VALIDATION_FatherSalary = FALSE;
	} else {
		$VALIDATION_FatherSalary = TRUE;
	}//		เช็คเงื่อนไขเงินเดือนบิดา		//
	
	if(empty($FatherTel)){
		$FORM1 .= "<li>" . "กรุณากรอกเบอร์โทรศัพท์ของบิดา" . "</li>";
		$FatherTel_VALIDATION = "กรุณากรอกเบอร์โทรศัพท์ของบิดา";
		$VALIDATION_FatherTel = FALSE;
	} else {
		if(!preg_match($Tel_PATTERN, $FatherTel)){
			$FORM1 .= "<li>" . "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง" . "</li>";
			$FatherTel_VALIDATION = "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง";
			$VALIDATION_FatherTel = FALSE;
		} else {
			$VALIDATION_FatherTel = TRUE;
		}
	}//		เช็คเงื่อนไขเบอร์โทรศัพท์	ของบิดา	//
	
	if(empty($MatherIDCard)){
		$FORM1 .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนของมารดา" . "</li>";
		$MatherIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนของมารดา" . "</li>";
		$VALIDATION_MatherIDCard = FALSE;
	} else {
		if(!preg_match($IDCard_PATTERN, $MatherIDCard)){
			$FORM1 .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$MatherIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$VALIDATION_MatherIDCard = FALSE;
		} else {
			$VALIDATION_MatherIDCard = TRUE;
		}
	}//		เช็คเงื่อนไขหมายเลขบัตรประชาชนของมารดา		//
	
	if(empty($MatherFirst)){
		$FORM1 .= "<li>" . "กรุณากรอกชื่อมารดา" . "</li>";
		$MatherFirst_VALIDATION = "กรุณากรอกชื่อมารดา";
		$VALIDATION_MatherFirst = FALSE;
	} else {
		$VALIDATION_MatherFirst = TRUE;
	}//		เช็คเงื่อนไขชื่อมารดา		//
	
	if(empty($MatherLast)){
		$FORM1 .= "<li>" . "กรุณากรอกนามสกุลมารดา" . "</li>";
		$MatherLast_VALIDATION = "กรุณากรอกนามสกุลมารดา";
		$VALIDATION_MatherLast = FALSE;
	} else {
		$VALIDATION_MatherLast = TRUE;
	}//		เช็คเงื่อนไขนามสกุลมารดา		//
	
	if($MatherGroupBlood == "เลือก"){
		$FORM1 .= "<li>" . "กรุณาเลือกกรุ๊ปเลือดมารดา" . "</li>";
		$MatherGroupBlood_VALIDATION = "กรุณาเลือกกรุ๊ปเลือดมารดา";
		$VALIDATION_MatherGroupBlood = FALSE;
	} else {
		$VALIDATION_MatherGroupBlood = TRUE;
	}//		เช็คเงื่อนไขกรุ๊ปเลือดมารดา	//
	
	if(empty($MatherSalary)){
		$FORM1 .= "<li>" . "กรุณากรอกเงินเดือนของมารดา" . "</li>";
		$MatherSalary_VALIDATION = "กรุณากรอกเงินเดือนของมารดา";
		$VALIDATION_MatherSalary = FALSE;
	} else {
		$VALIDATION_MatherSalary = TRUE;
	}//		เช็คเงื่อนไขเงินเดือนมารดา		//
	
	if(empty($MatherTel)){
		$FORM1 .= "<li>" . "กรุณากรอกเบอร์โทรศัพท์ของมารดา" . "</li>";
		$MatherTel_VALIDATION = "กรุณากรอกเบอร์โทรศัพท์ของมารดา";
		$VALIDATION_MatherTel = FALSE;
	} else {
		if(!preg_match($Tel_PATTERN, $MatherTel)){
			$FORM1 .= "<li>" . "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง" . "</li>";
			$MatherTel_VALIDATION = "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง";
			$VALIDATION_MatherTel = FALSE;
		} else {
			$VALIDATION_MatherTel = TRUE;
		}
	}//		เช็คเงื่อนไขเบอร์โทรศัพท์	ของมารดา	//
	
	if(empty($ParentIDCard)){
		$FORM1 .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนของผู้ปกครอง" . "</li>";
		$ParentIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนของผู้ปกครอง" . "</li>";
		$VALIDATION_ParentIDCard = FALSE;
	} else {
		if(!preg_match($IDCard_PATTERN, $ParentIDCard)){
			$FORM1 .= "<li>" . "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$ParentIDCard_VALIDATION = "กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก" . "</li>";
			$VALIDATION_ParentIDCard = FALSE;
		} else {
			$VALIDATION_ParentIDCard = TRUE;
		}
	}//		เช็คเงื่อนไขหมายเลขบัตรประชาชนของผู้ปกครอง		//
	
	if(empty($ParentFirst)){
		$FORM1 .= "<li>" . "กรุณากรอกชื่อผู้ปกครอง" . "</li>";
		$ParentFirst_VALIDATION = "กรุณากรอกชื่อผู้ปกครอง";
		$VALIDATION_ParentFirst = FALSE;
	} else {
		$VALIDATION_ParentFirst = TRUE;
	}//		เช็คเงื่อนไขชื่อผู้ปกครอง		//
	
	if(empty($ParentLast)){
		$FORM1 .= "<li>" . "กรุณากรอกนามสกุลผู้ปกครอง" . "</li>";
		$ParentLast_VALIDATION = "กรุณากรอกนามสกุลผู้ปกครอง";
		$VALIDATION_ParentLast = FALSE;
	} else {
		$VALIDATION_ParentLast = TRUE;
	}//		เช็คเงื่อนไขนามสกุลผู้ปกครอง		//
	
	if($ParentGroupBlood == "เลือก"){
		$FORM1 .= "<li>" . "กรุณาเลือกกรุ๊ปเลือดผู้ปกครอง" . "</li>";
		$ParentGroupBlood_VALIDATION = "กรุณาเลือกกรุ๊ปเลือดผู้ปกครอง";
		$VALIDATION_ParentGroupBlood = FALSE;
	} else {
		$VALIDATION_ParentGroupBlood = TRUE;
	}//		เช็คเงื่อนไขกรุ๊ปเลือดผู้ปกครอง	//
	
	if(empty($ParentSalary)){
		$FORM1 .= "<li>" . "กรุณากรอกเงินเดือนของผู้ปกครอง" . "</li>";
		$ParentSalary_VALIDATION = "กรุณากรอกเงินเดือนของผู้ปกครอง";
		$VALIDATION_ParentSalary = FALSE;
	} else {
		$VALIDATION_ParentSalary = TRUE;
	}//		เช็คเงื่อนไขเงินเดือนผู้ปกครอง		//
	
	if(empty($ParentTel)){
		$FORM1 .= "<li>" . "กรุณากรอกเบอร์โทรศัพท์ของผู้ปกครอง" . "</li>";
		$ParentTel_VALIDATION = "กรุณากรอกเบอร์โทรศัพท์ของผู้ปกครอง";
		$VALIDATION_ParentTel = FALSE;
	} else {
		if(!preg_match($Tel_PATTERN, $ParentTel)){
			$FORM1 .= "<li>" . "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง" . "</li>";
			$ParentTel_VALIDATION = "รูปแบบหมายเลขเบอร์โทรศัพท์ไม่ถูกต้อง";
			$VALIDATION_ParentTel = FALSE;
		} else {
			$VALIDATION_ParentTel = TRUE;
		}
	}//		เช็คเงื่อนไขเบอร์โทรศัพท์	ของผู้ปกครอง	//
	
	if(empty($Relation)){
		$FORM1 .= "<li>" . "กรุณากรอกความสัมพันธ์ระหว่างนักเรียนกับผู้ปกครอง" . "</li>";
		$Relation_VALIDATION = "กรุณากรอกความสัมพันธ์ระหว่างนักเรียนกับผู้ปกครอง";
		$VALIDATION_Relation = FALSE;
	} else {
		$VALIDATION_Relation = TRUE;
	}//		เช็คเงื่อนไขความสัมพันธ์		//
		
	
	//ตัวแปรรับค่ากรณี OR FALSE
	$VALIDATION_FALSE = $VALIDATION_SubName == FALSE || $VALIDATION_FirstNameTH == FALSE || $VALIDATION_LastNameTH == FALSE || $VALIDATION_FirstNameEN == FALSE || $VALIDATION_LastNameEN == FALSE || $VALIDATION_Gender == FALSE || $VALIDATION_BirthDay == FALSE || $VALIDATION_GroupBlood == FALSE || $VALIDATION_Race == FALSE || $VALIDATION_Nationality == FALSE || $VALIDATION_Religion == FALSE || $VALIDATION_Main == FALSE || $VALIDATION_Year == FALSE || $VALIDATION_Heigh == FALSE || $VALIDATION_Weight == FALSE;
	$VALIDATION_FALSE .= $VALIDATION_TypeStudent == FALSE || $VALIDATION_CourseStudy == FALSE;
	$VALIDATION_FALSE .= $VALIDATION_HomeCode1 == FALSE || $VALIDATION_Moo1 == FALSE || $VALIDATION_Road1 == FALSE || $VALIDATION_Soy1 == FALSE || $VALIDATION_Province1 == FALSE || $VALIDATION_District1 == FALSE || $VALIDATION_ZipCode1 == FALSE || $VALIDATION_HomeCode2 == FALSE || $VALIDATION_Moo2 == FALSE || $VALIDATION_Road2 == FALSE || $VALIDATION_Soy2 == FALSE || $VALIDATION_Province2 == FALSE || $VALIDATION_District2 == FALSE || $VALIDATION_ZipCode2 == FALSE;
	$VALIDATION_FALSE .= $VALIDATION_StudentID == FALSE || $VALIDATION_TypeStudent == FALSE || $VALIDATION_CourseStudy == FALSE;
	
	//ตัวแปรรับค่ากรณี AND TRUE
	if($VALIDATION_SubName == TRUE && $VALIDATION_FirstNameTH == TRUE && $VALIDATION_LastNameTH == TRUE && $VALIDATION_FirstNameEN == TRUE && $VALIDATION_LastNameEN == TRUE && $VALIDATION_Gender == TRUE && $VALIDATION_BirthDay == TRUE || $VALIDATION_GroupBlood == TRUE && $VALIDATION_Heigh == TRUE && $VALIDATION_Weight == TRUE && $VALIDATION_Race == TRUE && $VALIDATION_Nationality == TRUE && $VALIDATION_Religion == TRUE && $VALIDATION_Main == TRUE){
		$VALIDATION_TRUE1 = TRUE;
	} else {
		$VALIDATION_TRUE1 = FALSE;
	}
	
	if($VALIDATION_TypeStudent == TRUE && $VALIDATION_CourseStudy == TRUE && $VALIDATION_Year == TRUE){
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
		$VALIDATION_FALS4 = FALSE;
	}
	
	if($VALIDATION_FALSE){
		echo "<div class='alert alert-danger'>";
		echo "<button class='close' data-close='alert'></button>";
		echo "<ul>เกิดข้อผิดผลาด";
		echo $FORM1;
		echo "</ul>";
		echo "</div>";
	} else if($VALIDATION_TRUE1 == TRUE && $VALIDATION_TRUE2 == TRUE && $VALIDATION_TRUE3 == TRUE && $VALIDATION_TRUE4 == TRUE) {
		if(is_uploaded_file($_FILES['img']['tmp_name'])){
			$ext = pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION);
			$filename = "student/" . $StudentID . "." . $ext;
		} else {
			$filename = $data['img'];
		}
		
		$sql = "UPDATE student SET year = '$Year', type_card = '$TypeCard', course_study = '$CourseStudy', type_student = '$TypeStudent', sub_name = '$SubName', gender = '$Gender', first_name_th = '$FirstNameTH', last_name_th = '$LastNameTH', first_name_en = '$FirstNameEN', last_name_en = '$LastNameEN', birthday_at = '$BirthDay', email = '$Email', group_blood = '$GroupBlood', race = '$Race', nationality = '$Nationality', religion = '$Religion', main = '$Main', secondary = '$Secondary', accommodation = '$Accommodation', d1 = '$D1', d2 = '$D2', d3 = '$D3', d4 = '$D4', d5 = '$D5', d6 = '$D6', d7 = '$D7', d8 = '$D8', d9 = '$D9', l1 = '$L1', l2 = '$L2', l3 = '$L3', l4 = '$L4', l5 = '$L5', i1 = '$I1', i2 = '$I2', i3 = '$I3', i4 = '$I4', i5 = '$I5', i6 = '$I6', i7 = '$I7', i8 = '$I8', i9 = '$I9', i10 = '$I10', i11 = '$I11', i12 = '$I12', i13 = '$I13', heigh = '$Heigh', weight = '$Weight', disease = '$Disease', fund = '$Fund', chance = '$Chance', dropout = '$Dropout', sahad = '$Sahad', behavior = '$Behavior', home_code_1 = '$HomeCode1', moo_1 = '$Moo1', road_1 = '$Road1', soy_1 = '$Soy1', province_1 = '$Province1', district_1 = '$Amphur1', sub_district_1 = '$District1', zip_code_1 = '$ZipCode1', home_code_2 = '$HomeCode2', moo_2 = '$Moo2', road_2 = '$Road2', soy_2 = '$Soy2', province_2 = '$Province2', district_2 = '$Amphur2', sub_district_2 = '$District2', zip_code_2 = '$ZipCode2', img = '$filename' WHERE id_card = '$id'";
		$result = mysqli_query($link, $sql);
		
		$sql = "UPDATE studentfamily SET place = '$Place', old_brother = '$OldBrother', young_brother = '$YoungBrother', old_sister = '$OldSister', young_sister = '$YoungSister', num_bud = '$NumBud', father_id_card = '$FatherIDCard', father_first = '$FatherFirst', father_last = '$FatherLast', father_group_blood = '$FatherGroupBlood', father_salary = '$FatherSalary', father_tel = '$FatherTel', mather_id_card = '$MatherIDCard', mather_first = '$MatherFirst', mather_last = '$MatherLast', mather_group_blood = '$MatherGroupBlood', mather_salary = '$MatherSalary', mather_tel = '$MatherTel', parent_id_card = '$ParentIDCard', parent_first = '$ParentFirst', parent_last = '$ParentLast', parent_group_blood = '$ParentGroupBlood', parent_salary = '$ParentSalary', parent_tel = '$ParentTel', relation = '$Relation' WHERE id_card = '$id'";
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
			<option value="เด็กชาย" <?php if(isset($general)){ if($SubName == "เด็กชาย"){ echo "selected"; } } else { if($data['sub_name'] == "เด็กชาย"){ echo "selected"; } } ?>>เด็กชาย</option>
			<option value="เด็กหญิง" <?php if(isset($general)){ if($SubName == "เด็กหญิง"){ echo "selected"; } } else { if($data['sub_name'] == "เด็กหญิง"){ echo "selected"; } } ?>>เด็กหญิง</option>
			<option value="นาย" <?php if(isset($general)){ if($SubName == "นาย"){ echo "selected"; } } else { if($data['sub_name'] == "นาย"){ echo "selected"; } } ?>>นาย</option>
            <option value="นาง" <?php if(isset($general)){ if($SubName == "นาง"){ echo "selected"; } } else { if($data['sub_name'] == "นาง"){ echo "selected"; } } ?>>นาง</option>
            <option value="นางสาว" <?php if(isset($general)){ if($SubName == "นางสาว"){ echo "selected"; } } else { if($data['sub_name'] == "นางสาว"){ echo "selected"; } } ?>>นางสาว</option>
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
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรอกชื่อด้วยอักษรภาษาไทย" name="first_name_th" value="<?php if(isset($general)){ echo $FirstNameTH; } else { echo $data['first_name_th']; } ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FirstNameTH_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุล<small>(ภาษาไทย)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรอกนามสกุลด้วยอักษรภาษาไทย" name="last_name_th" maxlength="100" value="<?php if(isset($general)){ echo $LastNameTH; } else { echo $data['last_name_th']; } ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $LastNameTH_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อ<small>(ภาษาอังกฤษ)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $FirstNameEN; } else { echo $data['first_name_en']; } ?>" placeholder="กรอกชื่อด้วยอักษรภาษาอังกฤษ" name="first_name_en" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FirstNameEN_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุล<small>(ภาษาอังกฤษ)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $LastNameEN; } else { echo $data['last_name_en']; } ?>" placeholder="กรอกนามสกุลด้วยอักษรภาษาอังกฤษ" name="last_name_en" maxlength="100">
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
			<option value="ชาย" <?php if(isset($general)){ if($Gender == "ชาย"){ echo "selected"; } } else { if($data['gender'] == "ชาย"){ echo "selected"; } } ?>>ชาย</option>
            <option value="หญิง" <?php if(isset($general)){ if($Gender == "หญิง"){ echo "selected"; } } else { if($data['gender'] == "หญิง"){ echo "selected"; } } ?>>หญิง</option>
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
    <div class="input-group date date-picker" data-date="<?php if(isset($general)){ echo $BirthDay; } else { echo $data['birthday_at']; } ?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
    	<span class="input-group-btn">
    		<button class="btn default" type="button">
    			<i class="fa fa-calendar"></i>
    		</button>
    	</span>
    	<input name="birthday_at" type="text" value="<?php if(isset($general)){ echo $BirthDay; } else { echo $data['birthday_at']; } ?>" class="form-control" readonly>
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
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $IDCard; } else { echo $data['id_card']; } ?>" placeholder="กรุณากรอกเลขบัตรประชาชนเป็นตัวเลข 13 หลัก" name="id_card" maxlength="13" OnKeyPress="return chkNumber(this)" readonly>
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">กลุ่มเลือด
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="group_blood">
			<option value="เลือก">-- เลือก --</option>
			<option value="O" <?php if(isset($general)){ if($GroupBlood == "O"){ echo "selected"; } } else { if($data['group_blood'] == "O"){ echo "selected"; } } ?>>O</option>
			<option value="A" <?php if(isset($general)){ if($GroupBlood == "A"){ echo "selected"; } } else { if($data['group_blood'] == "A"){ echo "selected"; } } ?>>A</option>
			<option value="B" <?php if(isset($general)){ if($GroupBlood == "B"){ echo "selected"; } } else { if($data['group_blood'] == "B"){ echo "selected"; } } ?>>B</option>
            <option value="AB" <?php if(isset($general)){ if($GroupBlood == "AB"){ echo "selected"; } } else { if($data['group_blood'] == "AB"){ echo "selected"; } } ?>>AB</option>
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
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Heigh; } else { echo $data['heigh']; } ?>" placeholder="กรุณากรอกส่วนสูง" name="heigh" maxlength="4" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Heigh_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">น้ำหนัก 
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Weight; } else { echo $data['weight']; } ?>" placeholder="กรุณากรอกน้ำหนัก" name="weight" maxlength="4" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Weight_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">อีเมล์
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Email; } else { echo $data['email']; } ?>" placeholder="กรุณากรอกอีเมล์(ถ้ามี)" name="email" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Email_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เชื้อชาติ
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Race; } else { echo $data['race']; } ?>" placeholder="กรุณากรอกเชื้อชาติ" name="race" maxlength="20">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Rac_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">สัญชาติ
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Nationality; } else { echo $data['nationality']; } ?>" placeholder="กรุณากรอกสัญชาติ" name="nationality" maxlength="20">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Nationality_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ศาสนา
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Religion; } else { echo $data['religion']; } ?>" placeholder="กรุณากรอกศาสนา" name="religion" maxlength="20">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Religion_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ภาษาที่ใช้เป็นหลัก
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Main; } else { echo $data['main']; } ?>" placeholder="กรุณากรอกภาษาหลัก" name="main" maxlength="20">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Main_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ภาษาที่ใช้เป็นภาษารอง
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Secondary; } else { echo $data['secondary']; } ?>" placeholder="กรุณากรอกภาษาหลัก(ถ้ามี)" name="secondary" maxlength="20">
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
		echo "<div class='alert alert-danger'>";
		echo "<button class='close' data-close='alert'></button>";
		echo "<ul>เกิดข้อผิดผลาด";
		echo $FORM1;
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
		<label class="col-md-3 control-label raya" for="form_control_1">ชั้น
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Class; } else { echo $data['class']; } ?>" name="class" maxlength="5" readonly>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ห้อง
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Room; } else { echo $data['room']; } ?>" name="room" maxlength="5" readonly>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ปีการศึกษา
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Year; } else { echo $data['year']; } ?>" placeholder="กรุณากรอกปีการศึกษา" name="year" maxlength="4" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Year_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชนิดบัตร
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $TypeCard; } else { echo $data['type_card']; } ?>" placeholder="กรุณากรอกชนิดบัตร(ถ้ามี)" name="type_card" maxlength="100">
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ประเภทนักเรียน
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $TypeStudent; } else { echo $data['type_student']; } ?>" placeholder="กรุณากรอกประเภทนักเรียน" name="type_student" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $TypeStudent_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">สายการเรียน
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $CourseStudy; } else { echo $data['course_study']; } ?>" placeholder="กรุณากรอกสายการเรียน" name="course_study" maxlength="50">
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
		echo "<div class='alert alert-danger'>";
		echo "<button class='close' data-close='alert'></button>";
		echo "<ul>เกิดข้อผิดผลาด";
		echo $FORM1;
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
		<label class="col-md-3 control-label raya" for="form_control_1">บ้านเลขที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="home_code_1" placeholder="กรุณกรอกบ้านเลขที่" value="<?php if(isset($general)){ echo $HomeCode1; } else { echo $data['home_code_1']; } ?>" maxlength="10">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $HomeCode1_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">หมู่ที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="moo_1" placeholder="กรุณากรอกหมู่ที่" value="<?php if(isset($general)){ echo $Moo1; } else { echo $data['moo_1']; } ?>" maxlength="3" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Moo1_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ถนน
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรุณกรอกถนน" name="road_1" value="<?php if(isset($general)){ echo $Road1; } else { echo $data['road_1']; } ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Road1_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ซอย
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="soy_1" placeholder="กรุณกรอกซอย" value="<?php if(isset($general)){ echo $Soy1; } else { echo $data['soy_1']; } ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Soy1_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">จังหวัด
        	<span class="required">*</span>
        </label>
    <div class="col-md-9">
		<select class="form-control" name="province_1" id="province">
			<option value="">-- เลือก --</option>
			<?php
  				$sql = "SELECT PROVINCE_ID, PROVINCE_NAME FROM province";
				$result = mysqli_query($link, $sql);
				while($dataS = mysqli_fetch_assoc($result)){
					echo "<option value='$dataS[PROVINCE_ID]' ";
					
					if(isset($general)){
						if($dataS['PROVINCE_ID'] == $Province1){
							echo "selected";
						}
					} else {
						if($dataS['PROVINCE_ID'] == $data['province_1']){
							echo "selected";
						}
					}
					
					echo ">" . "$dataS[PROVINCE_NAME]" . "</option>";
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
    	<?php
				$sql = "SELECT AMPHUR_NAME FROM amphur WHERE AMPHUR_ID = '" . $data['district_1'] . "'";
				$result = mysqli_query($link, $sql);
				$dataS = mysqli_fetch_assoc($result);
			?>
		<select class="form-control" name="district_1" id="amphur">
			<option value="<?php echo $data['district_1']; ?>"><?php echo $dataS['AMPHUR_NAME']; ?></option>
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
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรุณากรอกตำบล" name="sub_district_1" value="<?php if(isset($general)){ echo $District1; } else { echo $data['sub_district_1']; } ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $District1_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสไปรษณีย์
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรุณากรอกรหัสไปรษณีย์" name="zip_code_1" value="<?php if(isset($general)){ echo $ZipCode1; } else { echo $data['zip_code_1']; } ?>" maxlength="5" OnKeyPress="return chkNumber(this)">
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
		<label class="col-md-3 control-label raya" for="form_control_1">บ้านเลขที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="home_code_2" placeholder="กรุณกรอกบ้านเลขที่" value="<?php if(isset($general)){ echo $HomeCode2; } else { echo $data['home_code_2']; } ?>" maxlength="10">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $HomeCode2_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">หมู่ที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="moo_2" placeholder="กรุณากรอกหมู่ที่" value="<?php if(isset($general)){ echo $Moo2; } else { echo $data['moo_2']; } ?>" maxlength="3" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Moo2_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ถนน
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="road_2" placeholder="กรุณากรอกถนน" value="<?php if(isset($general)){ echo $Road2; } else { echo $data['road_2']; } ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Road2_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ซอย
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="soy_2" placeholder="กรุณากรอกซอย" value="<?php if(isset($general)){ echo $Soy2; } else { echo $data['soy_2']; } ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Soy2_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">จังหวัด
        	<span class="required">*</span>
        </label>
    <div class="col-md-9">
		<select class="form-control" name="province_2" id="province2">
			<option value="">-- เลือก --</option>
			<?php
  				$sql = "SELECT PROVINCE_ID, PROVINCE_NAME FROM province";
				$result = mysqli_query($link, $sql);
				while($dataS = mysqli_fetch_assoc($result)){
					echo "<option value='$dataS[PROVINCE_ID]' ";
					
					if(isset($general)){
						if($dataS['PROVINCE_ID'] == $Province1){
							echo "selected";
						}
					} else {
						if($dataS['PROVINCE_ID'] == $data['province_2']){
							echo "selected";
						}
					}
					
					echo ">" . "$dataS[PROVINCE_NAME]" . "</option>";
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
    	<?php
				$sql = "SELECT AMPHUR_NAME FROM amphur WHERE AMPHUR_ID = '" . $data['district_2'] . "'";
				$result = mysqli_query($link, $sql);
				$dataS = mysqli_fetch_assoc($result);
			?>
		<select class="form-control" name="district_2" id="amphur2">
			<option value="<?php echo $data['district_2']; ?>"><?php echo $dataS['AMPHUR_NAME']; ?></option>
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
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรุณากรอกตำบล" name="sub_district_2" value="<?php if(isset($general)){ echo $District2; } else { echo $data['sub_district_2']; } ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $District2_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสไปรษณีย์
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรุณากรอกรหัสไปรษณีย์" name="zip_code_2" value="<?php if(isset($general)){ echo $ZipCode2; } else { echo $data['zip_code_2']; } ?>" maxlength="5" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ZipCode2_VALIDATION . "</span>"; ?>
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
	$VALIDATION_FALSE = $VALIDATION_Place == FALSE || $VALIDATION_OldBrother == FALSE || $VALIDATION_YoungBrother == FALSE || $VALIDATION_OldSister == FALSE || $VALIDATION_YoungSister == FALSE || $VALIDATION_NumBud == FALSE || $VALIDATION_FatherIDCard == FALSE || $VALIDATION_FatherFirst == FALSE || $VALIDATION_FatherLast == FALSE || $VALIDATION_FatherGroupBlood == FALSE || $VALIDATION_FatherSalary == FALSE || $VALIDATION_FatherTel == FALSE || $VALIDATION_MatherIDCard == FALSE || $VALIDATION_MatherFirst == FALSE || $VALIDATION_MatherLast == FALSE || $VALIDATION_MatherGroupBlood == FALSE || $VALIDATION_MatherSalary == FALSE || $VALIDATION_MatherTel == FALSE || $VALIDATION_ParentIDCard == FALSE || $VALIDATION_ParentFirst == FALSE || $VALIDATION_ParentLast == FALSE || $VALIDATION_ParentGroupBlood == FALSE || $VALIDATION_ParentSalary == FALSE || $VALIDATION_ParentTel == FALSE || $VALIDATION_Relation == FALSE;
	
	if($VALIDATION_FALSE){
		echo "<div class='alert alert-danger'>";
		echo "<button class='close' data-close='alert'></button>";
		echo "<ul>เกิดข้อผิดผลาด";
		echo $FORM1;
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
		<label class="col-md-3 control-label raya" for="form_control_1">สถานะ
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="place">
			<option value="เลือก">-- เลือก --</option>
			<option value="อยู่ด้วยกัน" <?php if(isset($general)){ if($Place == "อยู่ด้วยกัน"){ echo "selected"; } } else { if($data['place'] == "อยู่ด้วยกัน"){ echo "selected"; } } ?>>อยู่ด้วยกัน</option>
			<option value="แยกกันอยู่" <?php if(isset($general)){ if($Place == "แยกกันอยู่"){ echo "selected"; } } else { if($data['place'] == "แยกกันอยู่"){ echo "selected"; } } ?>>แยกกันอยู่</option>
			<option value="บิดาถึงแก่กรรม" <?php if(isset($general)){ if($Place == "บิดาถึงแก่กรรม"){ echo "selected"; } } else { if($data['place'] == "บิดาถึงแก่กรรม"){ echo "selected"; } } ?>>บิดาถึงแก่กรรม</option>
            <option value="มารดาถึงแก่กรรม" <?php if(isset($general)){ if($Place == "มารดาถึงแก่กรรม"){ echo "selected"; } } else { if($data['place'] == "มารดาถึงแก่กรรม"){ echo "selected"; } } ?>>มารดาถึงแก่กรรม</option>
            <option value="บิดาและมารดาถึงแก่กรรม" <?php if(isset($general)){ if($Place == "บิดาและมารดาถึงแก่กรรม"){ echo "selected"; } } else { if($data['place'] == "บิดาและมารดาถึงแก่กรรม"){ echo "selected"; } } ?>>บิดาและมารดาถึงแก่กรรม</option>
            <option value="มารดาแต่งงานใหม่" <?php if(isset($general)){ if($Place == "มารดาแต่งงานใหม่"){ echo "selected"; } } else { if($data['place'] == "มารดาแต่งงานใหม่"){ echo "selected"; } } ?>>มารดาแต่งงานใหม่</option>
            <option value="บิดาและมารถดาแต่งงานใหม่" <?php if(isset($general)){ if($Place == "บิดาและมารถดาแต่งงานใหม่"){ echo "selected"; } } else { if($data['place'] == "บิดาและมารถดาแต่งงานใหม่"){ echo "selected"; } } ?>>บิดาและมารถดาแต่งงานใหม่</option>
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
		<input type="text" class="form-control maxlength_defaultconfig" name="old_brother" placeholder="กรอกจำนวนพี่ชาย(ถ้าไม่มีกรอกเป็น 0)" maxlength="2" value="<?php if(isset($general)){ echo $OldBrother; } else { echo $data['old_brother']; } ?>"  OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $OldBrother_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">มีน้องชาย
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="young_brother" placeholder="กรอกจำนวนน้องชาย(ถ้าไม่มีกรอกเป็น 0)" maxlength="2" value="<?php if(isset($general)){ echo $YoungBrother; } else { echo $data['young_brother']; } ?>"  OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $YoungBrother_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">มีพี่สาว
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="old_sister" placeholder="กรอกจำนวนพี่สาว(ถ้าไม่มีกรอกเป็น 0)" maxlength="2" value="<?php if(isset($general)){ echo $OldSister; } else { echo $data['old_sister']; } ?>"  OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $OldSister_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">มีน้องสาว
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="young_sister" placeholder="กรอกจำนวนน้องชาย(ถ้าไม่มีกรอกเป็น 0)" maxlength="2" value="<?php if(isset($general)){ echo $YoungSister; } else { echo $data['young_sister']; } ?>"  OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $YoungSister_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เป็นบุตรคนที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="num_bud" placeholder="กรอกข้อมูล" maxlength="2" value="<?php if(isset($general)){ echo $NumBud; } else { echo $data['num_bud']; } ?>"  OnKeyPress="return chkNumber(this)">
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
		<input type="text" class="form-control maxlength_defaultconfig" name="father_id_card" placeholder="กรุณากรอกรหัสบัตรประชาชนของบิดา" maxlength="13" value="<?php if(isset($general)){ echo $FatherIDCard; } else { echo $data['father_id_card']; } ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FatherIDCard_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อบิดา
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="father_first" placeholder="กรุณากรอกชื่อบิดา" maxlength="50" value="<?php if(isset($general)){ echo $FatherFirst; } else { echo $data['father_first']; } ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FatherFirst_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุลบิดา
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="father_last" placeholder="กรุณากรอกนามสกุลบิดา" maxlength="50" value="<?php if(isset($general)){ echo $FatherLast; } else { echo $data['father_last']; } ?>">
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
			<option value="O" <?php if(isset($general)){ if($FatherGroupBlood == "O"){ echo "selected"; } } else { if($data['father_group_blood'] == "O"){ echo "selected"; } } ?>>O</option>
			<option value="A" <?php if(isset($general)){ if($FatherGroupBlood == "A"){ echo "selected"; } } else { if($data['father_group_blood'] == "A"){ echo "selected"; } } ?>>A</option>
			<option value="B" <?php if(isset($general)){ if($FatherGroupBlood == "B"){ echo "selected"; } } else { if($data['father_group_blood'] == "B"){ echo "selected"; } } ?>>B</option>
            <option value="AB" <?php if(isset($general)){ if($FatherGroupBlood == "AB"){ echo "selected"; } } else { if($data['father_group_blood'] == "AB"){ echo "selected"; } } ?>>AB</option>
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
		<input type="text" class="form-control maxlength_defaultconfig" name="father_salary" placeholder="กรุณากรอกเงินเดือนบิดา" maxlength="7" value="<?php if(isset($general)){ echo $FatherSalary; } else { echo $data['father_salary']; } ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $FatherSalary_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เบอร์โทรศัพท์
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="father_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์ของบิดา" maxlength="10" value="<?php if(isset($general)){ echo $FatherTel; } else { echo $data['father_tel']; } ?>" OnKeyPress="return chkNumber(this)">
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
		<input type="text" class="form-control maxlength_defaultconfig" name="mather_id_card" placeholder="กรุณากรอกรหัสบัตรประชาชนของมารดา" maxlength="13" value="<?php if(isset($general)){ echo $MatherIDCard; } else { echo $data['mather_id_card']; } ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $MatherIDCard_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อมารดา
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="mather_first" placeholder="กรุณากรอกชื่อมารดา" maxlength="50" value="<?php if(isset($general)){ echo $MatherFirst; } else { echo $data['mather_first']; } ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $MatherFirst_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุลมารดา
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="mather_last" placeholder="กรุณากรอกนามสกุลมารดา" maxlength="50" value="<?php if(isset($general)){ echo $MatherLast; } else { echo $data['mather_last']; } ?>">
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
			<option value="O" <?php if(isset($general)){ if($MatherGroupBlood == "O"){ echo "selected"; } } else { if($data['mather_group_blood'] == "O"){ echo "selected"; } } ?>>O</option>
			<option value="A" <?php if(isset($general)){ if($MatherGroupBlood == "A"){ echo "selected"; } } else { if($data['mather_group_blood'] == "A"){ echo "selected"; } } ?>>A</option>
			<option value="B" <?php if(isset($general)){ if($MatherGroupBlood == "B"){ echo "selected"; } } else { if($data['mather_group_blood'] == "B"){ echo "selected"; } } ?>>B</option>
            <option value="AB" <?php if(isset($general)){ if($MatherGroupBlood == "AB"){ echo "selected"; } } else { if($data['mather_group_blood'] == "AB"){ echo "selected"; } } ?>>AB</option>
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
		<input type="text" class="form-control maxlength_defaultconfig" name="mather_salary" placeholder="กรุณากรอกเงินเดือนมารดา" maxlength="7" value="<?php if(isset($general)){ echo $MatherSalary; } else { echo $data['mather_salary']; } ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $MatherSalary_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เบอร์โทรศัพท์
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="mather_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์ของมารดา" maxlength="10" value="<?php if(isset($general)){ echo $MatherTel; } else { echo $data['mather_tel']; } ?>" OnKeyPress="return chkNumber(this)">
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
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสบัตรประชาชน
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="parent_id_card" placeholder="กรุณากรอกรหัสบัตรประชาชนของผู้ปกครอง" maxlength="13" value="<?php if(isset($general)){ echo $ParentIDCard; } else { echo $data['parent_id_card']; } ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ParentIDCard_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อผู้ปกครอง
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="parent_first" placeholder="กรุณากรอกชื่อผู้ปกครอง" maxlength="50" value="<?php if(isset($general)){ echo $ParentFirst; } else { echo $data['parent_first']; } ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ParentFirst_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุลผู้ปกครอง
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="parent_last" placeholder="กรุณากรอกนามสกุลผู้ปกครอง" maxlength="50" value="<?php if(isset($general)){ echo $ParentLast; } else { echo $data['parent_last']; } ?>">
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
			<option value="O" <?php if(isset($general)){ if($ParentGroupBlood == "O"){ echo "selected"; } } else { if($data['mather_group_blood'] == "O"){ echo "selected"; } } ?>>O</option>
			<option value="A" <?php if(isset($general)){ if($ParentGroupBlood == "A"){ echo "selected"; } } else { if($data['mather_group_blood'] == "A"){ echo "selected"; } } ?>>A</option>
			<option value="B" <?php if(isset($general)){ if($ParentGroupBlood == "B"){ echo "selected"; } } else { if($data['mather_group_blood'] == "B"){ echo "selected"; } } ?>>B</option>
            <option value="AB" <?php if(isset($general)){ if($ParentGroupBlood == "AB"){ echo "selected"; } } else { if($data['mather_group_blood'] == "AB"){ echo "selected"; } } ?>>AB</option>
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
		<input type="text" class="form-control maxlength_defaultconfig" name="parent_salary" placeholder="กรุณากรอกเงินเดือนผู้ปกครอง" maxlength="7" value="<?php if(isset($general)){ echo $ParentSalary; } else { echo $data['parent_salary']; } ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ParentSalary_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เบอร์โทรศัพท์
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="parent_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์ของผู้ปกครอง" maxlength="10" value="<?php if(isset($general)){ echo $ParentTel; } else { echo $data['parent_tel']; } ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $ParentTel_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ความสัมพันธ์ระหว่างนักเรียนกับผู้ปกครอง
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="relation" placeholder="กรุณากรอกความสัมพันธ์ระหว่างนักเรียนกับผู้ปกครอง" maxlength="20" value="<?php if(isset($general)){ echo $Relation; } else { echo $data['relation']; } ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Relation_VALIDATION . "</span>"; ?>
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
		<input type="checkbox" name="d1" value="1" <?php if(isset($general)){ if($D1 == "1"){ echo "checked"; } } else { if($data['d1'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_1">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางการมองเห็น
        </label><br>
		<input type="checkbox" name="d2" value="1" <?php if(isset($general)){ if($D2 == "1"){ echo "checked"; } } else { if($data['d2'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_2">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางการได้ยิน 
        </label><br>
		<input type="checkbox" name="d3" value="1" <?php if(isset($general)){ if($D3 == "1"){ echo "checked"; } } else { if($data['d3'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางสติปัญญา
        </label><br>
		<input type="checkbox" name="d4" value="1" <?php if(isset($general)){ if($D4 == "1"){ echo "checked"; } } else { if($data['d4'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางร่างกายและสุขภาพ
        </label><br>
		<input type="checkbox" name="d5" value="1" class="md-check" <?php if(isset($general)){ if($D5 == "1"){ echo "checked"; } } else { if($data['d5'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางการเรียนรู้
        </label><br>
		<input type="checkbox" name="d6" value="1" class="md-check" <?php if(isset($general)){ if($D6 == "1"){ echo "checked"; } } else { if($data['d6'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางการพูดและภาษา
        </label><br>
		<input type="checkbox" name="d7" value="1" class="md-check" <?php if(isset($general)){ if($D7 == "1"){ echo "checked"; } } else { if($data['d7'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางพฤติกรรมและอารมณ์
        </label><br>
		<input type="checkbox" name="d8" value="1" class="md-check" <?php if(isset($general)){ if($D8 == "1"){ echo "checked"; } } else { if($data['d8'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ความพิการทางออทิสติก
        </label><br>
		<input type="checkbox" name="d9" value="1" class="md-check" <?php if(isset($general)){ if($D9 == "1"){ echo "checked"; } } else { if($data['d9'] == "1"){ echo "checked"; } } ?>>
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
		<input type="checkbox" name="l1" value="1" class="md-check" <?php if(isset($general)){ if($L1 == "1"){ echo "checked"; } } else { if($data['l1'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_1">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ขาดแคลนเครื่องแบบนักเรียน
        </label><br>
		<input type="checkbox" name="l2" value="1" class="md-check" <?php if(isset($general)){ if($L2 == "1"){ echo "checked"; } } else { if($data['l2'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_2">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ขาดแคลนเครื่องเขียน 
        </label><br>
		<input type="checkbox" name="l3" value="1" class="md-check" <?php if(isset($general)){ if($L3 == "1"){ echo "checked"; } } else { if($data['l3'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ขาดแคลนแบบเรียน
        </label><br>
		<input type="checkbox" name="l4" value="1" class="md-check" <?php if(isset($general)){ if($L4 == "1"){ echo "checked"; } } else { if($data['l4'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ขาดแคลนอาหารกลางวัน
        </label><br>
		<input type="checkbox" name="l5" value="1" class="md-check" <?php if(isset($general)){ if($L5 == "1"){ echo "checked"; } } else { if($data['l5'] == "1"){ echo "checked"; } } ?>>
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
		<input type="checkbox" name="i1" value="1" class="md-check" <?php if(isset($general)){ if($I1 == "1"){ echo "checked"; } } else { if($data['i1'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_1">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กถูกบังคับให้ขายแรงงาน
        </label><br>
		<input type="checkbox" name="i2" value="1" class="md-check" <?php if(isset($general)){ if($I2 == "1"){ echo "checked"; } } else { if($data['i2'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_2">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กที่อยู่ในธุรกิจทางเพศ 
        </label><br>
		<input type="checkbox" name="i3" value="1" class="md-check" <?php if(isset($general)){ if($I3 == "1"){ echo "checked"; } } else { if($data['i3'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กที่ถูดทอดทิ้ง
        </label><br>
		<input type="checkbox" name="i4" value="1" class="md-check" <?php if(isset($general)){ if($I4 == "1"){ echo "checked"; } } else { if($data['i4'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กในสถานพินิจและคุ้มครองเยาวชน
        </label><br>
		<input type="checkbox" name="i5" value="1" class="md-check" <?php if(isset($general)){ if($I5 == "1"){ echo "checked"; } } else { if($data['i5'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กเร่ร่อน
        </label><br>
		<input type="checkbox" name="i6" value="1" class="md-check" <?php if(isset($general)){ if($I6 == "1"){ echo "checked"; } } else { if($data['i6'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ผลกระทบจากเอดส์
        </label><br>
		<input type="checkbox" name="i7" value="1" class="md-check" <?php if(isset($general)){ if($I7 == "1"){ echo "checked"; } } else { if($data['i7'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> ชนกลุ่มน้อย
        </label><br>
		<input type="checkbox" name="i8" value="1" class="md-check" <?php if(isset($general)){ if($I8 == "1"){ echo "checked"; } } else { if($data['i8'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กที่ถูกทำร้ายทารุณ
        </label><br>
		<input type="checkbox" name="i9" value="1" class="md-check" <?php if(isset($general)){ if($I9 == "1"){ echo "checked"; } } else { if($data['i9'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กยากจน
        </label><br>
		<input type="checkbox" name="i10" value="1" class="md-check" <?php if(isset($general)){ if($I10 == "1"){ echo "checked"; } } else { if($data['i10'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> เด็กที่มีปัญหาเกี่ยวกับยาเสพติด
        </label><br>
		<input type="checkbox" name="i11" value="1" class="md-check" <?php if(isset($general)){ if($I11 == "1"){ echo "checked"; } } else { if($data['i11'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> อื่นๆ
        </label><br>
		<input type="checkbox" name="i12" value="1" class="md-check" <?php if(isset($general)){ if($I12 == "1"){ echo "checked"; } } else { if($data['i12'] == "1"){ echo "checked"; } } ?>>
		<label for="checkbox1_211">
			<span></span>
			<span class="check"></span>
			<span class="box"></span> กำพร้า
        </label><br>
		<input type="checkbox" name="i13" value="1" class="md-check" <?php if(isset($general)){ if($I13 == "1"){ echo "checked"; } } else { if($data['i13'] == "1"){ echo "checked"; } } ?>>
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

<!-- BEGIN TAB 7 -->
<div class="tab-pane" id="tab_1_7">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ข้อมูลอื่นๆ</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
<?php
$general = $_POST['general'];
if(isset($general)){
	
	if($VALIDATION_TRUE1 == TRUE && $VALIDATION_TRUE2 == TRUE && $VALIDATION_TRUE3 == TRUE && $VALIDATION_TRUE4 == TRUE) {
		echo "<div class='alert alert-success'>";
		echo "<button class='close' data-close='alert'></button> ";
		echo "ข้อมูลถูกบันทึกแล้ว";
		echo "</div>";
	}

}
?> 
	<div class="form-group form-md-radios">
			<label class="col-md-3 control-label" for="form_control_1" style="color: black;">มีที่พักนอนประจำ</label>
		<div class="col-md-9">
		<div>
		<div>
			<input type="radio" name="accommodation" value="1" <?php if(isset($general)){ if($Accommodation == "1"){ echo "checked";} } else { if($data['accommodation'] == "1"){ echo "checked"; } }?>>
			<label for="checkbox1_8">
				<span></span>
				<span class="check"></span>
				<span class="box"></span> มี 
            </label>
		</div>
		<div>
			<input type="radio" name="accommodation" value="0" <?php if(isset($general)){ if($Accommodation == "1"){ echo "";} else { echo "checked"; } } else { if($data['accommodation'] == "1"){ echo ""; } else { echo "checked"; } }?>>
			<label for="checkbox1_9">
				<span></span>
				<span class="check"></span>
				<span class="box"></span> ไม่มี 
            </label>
		</div>
		</div>
		</div>
		</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">โรงคประจำตัว
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรุณากรอกโรคประจำตัว(ถ้ามี)" value="<?php if(isset($general)){ echo $Disease; } else { echo $data['disease']; } ?>" name="disease" maxlength="30">
	</div>
	</div>
    <div class="form-group form-md-radios">
			<label class="col-md-3 control-label" for="form_control_1" style="color: black;">ได้รับทุนการศึกษา</label>
		<div class="col-md-9">
		<div class="md-radio-inline">
		<div>
			<input type="radio" name="fund" value="1" <?php if(isset($general)){ if($Fund == "1"){ echo "checked";} } else { if($data['fund'] == "ไม่มี"){ echo "checked"; } }?>>
			<label for="checkbox1_8">
				<span></span>
				<span class="check"></span>
				<span class="box"></span> ได้รับ
            </label>
		</div>
		<div>
			<input type="radio" name="fund" value="0" <?php if(isset($general)){ if($Fund == "1"){ echo "";} else { echo "checked"; } } else { if($data['fund'] == "1"){ echo ""; } else { echo "checked"; } }?>>
			<label for="checkbox1_9">
				<span></span>
				<span class="check"></span>
				<span class="box"></span> ไม่ได้รับ
            </label>
		</div>
		</div>
		</div>
		</div>
    <div class="form-group">
			<label class="col-md-3 control-label" for="form_control_1" style="color: black;">ได้รับโอกาสทางการศึกษา</label>
		<div class="col-md-9">
		<div>
		<div>
			<input type="radio" name="chance" value="1" <?php if(isset($general)){ if($Chance == "1"){ echo "checked";} } else { if($data['chance'] == "ไม่มี"){ echo "checked"; } }?>>
			<label for="checkbox1_8">
				<span></span>
				<span class="check"></span>
				<span class="box"></span> ได้รับ
            </label>
		</div>
		<div>
			<input type="radio" name="chance" value="0" <?php if(isset($general)){ if($Chance == "1"){ echo "";} else { echo "checked"; } } else { if($data['chance'] == "1"){ echo ""; } else { echo "checked"; } }?>>
			<label for="checkbox1_9">
				<span></span>
				<span class="check"></span>
				<span class="box"></span> ไม่ได้รับ
            </label>
		</div>
		</div>
		</div>
		</div>
        <div class="form-group form-md-radios">
			<label class="col-md-3 control-label" for="form_control_1" style="color: black;">ออกกลางคัน</label>
		<div class="col-md-9">
		<div>
		<div>
			<input type="radio" name="dropout" value="1" <?php if(isset($general)){ if($Dropout == "1"){ echo "checked";} } else { if($data['dropout'] == "ไม่มี"){ echo "checked"; } }?>>
			<label for="checkbox1_8">
				<span></span>
				<span class="check"></span>
				<span class="box"></span> ใช่
            </label>
		</div>
		<div>
			<input type="radio" name="dropout" value="0" <?php if(isset($general)){ if($Dropout == "1"){ echo "";} else { echo "checked"; } } else { if($data['dropout'] == "1"){ echo ""; } else { echo "checked"; } }?>>
			<label for="checkbox1_9">
				<span></span>
				<span class="check"></span>
				<span class="box"></span> ไม่ใช่
            </label>
		</div>
		</div>
		</div>
		</div>
        <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">สาเหตุที่ออกกลางคัน
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Sahad; } else { echo $data['sahad']; } ?>" name="sahad" maxlength="50">
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">พฤติกรรมของนักเรียน
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($general)){ echo $Behavior; } else { echo $data['behavior']; } ?>" name="behavior" maxlength="50">
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
<!-- END TAB 7 -->

<!-- BEGIN TAB 4 -->
<div class="tab-pane" id="tab_1_4">
<div class="portlet-body">   
    <div class="form-actions">
	<div class="row">
	<div class="col-md-offset-3 col-md-9">
    	
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