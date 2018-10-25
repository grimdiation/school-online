<?php
session_start();
ob_start();
include('autoload.php');
include('mysql_connect.php');
$id = $_GET['id'];
$sc_sql = "SELECT * FROM school WHERE school_id = '$id'";
$sc_result = mysqli_query($link, $sc_sql);
$sc = mysqli_fetch_assoc($sc_result);
error_reporting( error_reporting() & ~E_NOTICE );
?>
<?php 
	include('template_1.php'); 
?>
<meta charset="utf-8" />
<title>แก้ไขข้อมูล - โรงเรียน</title>

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
	<h1>เพิ่ม - โรงเรียน</h1>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="profile-sidebar">
<div class="portlet light profile-sidebar-portlet bordered">
	<!-- BEGIN FORM-->
	<form method="post" enctype="multipart/form-data"><!--  class="form-horizontal" id="form_sample_1" -->
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
			<input type="file" name="logo">
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
	<span class="caption-subject font-blue-madison bold uppercase">Profile School</span>
</div>
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab_1_1" data-toggle="tab">ข้อมูลทั่วไป</a>
	</li>
    <li>
		<a href="#tab_1_2" data-toggle="tab">ที่อยู่</a>
	</li>
    <li>
		<button type="submit" name="general" class="btn btn-sm blue">แก้ไข</button>
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
	<span class="caption-subject font-green sbold uppercase">ข้อมูลทั่วไป - โรงเรียน</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
    <?php
		//สร้างตัวแปร
		$general = $_POST['general'];
		
		//เช็คเงื่อนไขเมื่อค่าตัวแปรนี้มีอยู่จริง
		if (isset($general)) {
			
			//ตัวแปรรหัส smis
			$smis_id = $_COOKIE['smis_id'] = $_POST['smis_id'];
			if(empty($smis_id)){
				$form1 = "<li>" . "กรุณากรอกรหัส SMIS" . "</li>";
				$smis_id_validation = "กรุณากรอกรหัส SMIS";
				$validation_smis_id = FALSE;
			} else {
				$validation_smis_id = TRUE;
			}
			
			//ตัวแปรรหัส obec
			$obec_id = $_COOKIE['obec_id'] = $_POST['obec_id'];
			if(empty($obec_id)){
				$form1 .= "<li>" . "กรุณากรอกรหัส OBEC" . "</li>";
				$obec_id_validation = "กรุณากรอกรหัส OBEC";
				$validation_obec_id = FALSE;
			} else {
				$validation_obec_id = TRUE;
			}
			
			//ตรวจสอบอักษร
			$language_pattern = "/^[a-zA-Z]+$/i";
			
			//ตัวแปรชื่อโรงเรียน(ภาษาไทย)
			$_COOKIE['school_name_th'] = $_POST['school_name_th'];
			$school_name_th = $_COOKIE['school_name_th'];
			
			if(empty($school_name_th)){
				$form1 .= "<li>" . "กรุณากรอกชื่อโรงเรียน(ภาษาไทย)" . "</li>";
				$school_name_th_validation = "กรุณากรอกชื่อโรงเรียน(ภาษาไทย)";
				$validation_school_name_th = FALSE;
			} else {
				if(preg_match($language_pattern, $school_name_th)){
					$form1 .= "<li>" . "กรุณากรอกชื่อโรงเรียนให้เป็นภาษาไทย" . "</li>";
					$school_name_th_validation = "กรุณากรอกชื่อโรงเรียนให้เป็นภาษาไทย";
					$validation_school_name_th = FALSE;
				} else {
					$validation_school_name_th = TRUE;
				}
			}
			
			//ตัวแปรชื่อโรงเรียน(ภาษาอังกฤษ)
			$_COOKIE['school_name_en'] = $_POST['school_name_en'];
			$school_name_en = $_COOKIE['school_name_en'];
			
			if(empty($school_name_en)){
				$form1 .= "<li>" . "กรุณากรอกชื่อโรงเรียน(ภาษาอังกฤษ)" . "</li>";
				$school_name_en_validation = "กรุณากรอกชื่อโรงเรียน(ภาษาอังกฤษ)";
				$validation_school_name_en = FALSE;
			} else {
				if(!preg_match($language_pattern, $school_name_en)){
					$form1 .= "<li>" . "กรุณากรอกชื่อโรงเรียนให้เป็นภาษาอังกฤษ" . "</li>";
					$school_name_en_validation = "กรุณากรอกชื่อโรงเรียนให้เป็นภาษาอังกฤษ";
					$validation_school_name_en = FALSE;
				} else {
					$validation_school_name_en = TRUE;
				}
			}
			
			//ตัวแปรวันที่ก่อนตั้งโรงเรียน
			$construct_at = $_COOKIE['construct_at'] = $_POST['construct_at'];
			if(empty($construct_at)){
				$form1 .= "<li>" . "กรุณาเลือก วัน/เดือน/ปี ที่ก่อตั้งโรงเรียน" . "</li>";
				$construct_at_validation = "กรุณาเลือก วัน/เดือน/ปี ที่ก่อตั้งโรงเรียน";
				$validation_construct_at = FALSE;
			} else {
				$validation_construct_at = TRUE;
			}
			
			//ตรวจสอบหมายเลข 10 หลัก
			$tel_pattern = "/^0[2689]{1}[0-9]{7,8}+$/";
			//ตัวแปรเบอร์โทรศัพท์
			$tel = $_COOKIE['tel'] = $_POST['tel'];
			if(empty($tel)){
				$form1 .= "<li>" . "กรุณากรอกหมายเลขโทรศัพท์" . "</li>";
				$tel_validation = "กรุณากรอกหมายเลขโทรศัพท์";
				$validation_tel = FALSE;
			} else {
				if(!preg_match($tel_pattern, $tel)){
					$form1 .= "<li>" . "รูปแบบหมายเลขโทรศัพท์ไม่ถูกต้อง" . "</li>";
					$tel_validation = "รูปแบบหมายเลขโทรศัพท์ไม่ถูกต้อง";
					$validation_tel = FALSE;
				} else {
					$validation_tel = TRUE;
				}
			}
			
			//ตัวแปรเบอร์แฟ๊ก
			$fax = $_COOKIE['fax'] = $_POST['fax'];
			if(!empty($fax)){
				if(!preg_match($tel_pattern, $fax)){
					$form1 .= "<li>" . "หมายเลขแฟ็กซ์ไม่ถูกต้อง" . "</li>";
					$fax_validation = "หมายเลขแฟ็กซ์ไม่ถูกต้อง";
					$validation_fax = FALSE;
				} else {
					$validation_fax = TRUE;
				}
			} else {
				$validation_fax = TRUE;
			}
			
			//ตัวแปรอีเมล์
			$email = $_COOKIE['email'] = $_POST['email'];
			if(!empty($email)){
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$form1 .= "<li>" . "รูปแบบอีเมล์ไม่ถูกต้อง" . "</li>";
					$email_validation = "รูปแบบอีเมล์ไม่ถูกต้อง";
					$validation_email = FALSE;
				} else {
					$validation_email = TRUE;
				}
			} else {
				$validation_email = TRUE;
			}
			
			//ตัวแปรเว็บไซต์
			$website = $_COOKIE['website'] = $_POST['website'];
			
			//ตัวแปรสังกัด
			$dla = $_COOKIE['dla'] = $_POST['dla'];
			if(empty($dla)){
				$form1 .= "<li>" . "กรุณากรอกสังกัด" . "</li>";
				$dla_validation = "กรุณากรอกสังกัด";
				$validation_dla = FALSE;
			} else {
				if(preg_match($language_pattern, $dla)){
					$form1 .= "<li>" . "กรุณากรอกสังกัดเป็นภาษาไทย" . "</li>";
					$dla_validation = "กรุณากรอกสังกัดเป็นภาษาไทย";
					$validation_dla = FALSE;
				} else {
					$validation_dla = TRUE;
				}
			}
			
			//ตัวแปรประเภทการจัดการศึกษา
			$type_education = $_COOKIE['type_education'] = $_POST['type_education'];
			if(empty($type_education)){
				$form1 .= "<li>" . "กรุณากรอกประเภทการจัดการศึกษา" . "</li>";
				$type_education_validation = "กรุณากรอกประเภทการจัดการศึกษา";
				$validation_type_education = FALSE;
			} else {
				$validation_type_education = TRUE;
			}
			
			//ตัวแปรหม้อแปลงไฟฟ้า
			$electricity = $_COOKIE['electricity'] = $_POST['electricity'];
			
			//ตัวแปรโรงเรียนถึงเขตพื้นที่
			$school_area = $_COOKIE['school_area'] = $_POST['school_area'];
			
			//ตัวแปรโรงเรียนถึงอำเภอ
			$school_district = $_COOKIE['school_district'] = $_POST['school_district'];
			
			//ตัวแปรขนาดโรงเรียน
			$size_education = $_COOKIE['size_education'] = $_POST['size_education'];
			if($size_education == "เลือก"){
				$form1 .= "<li>" . "กรุณาเลือกขนาดโรงเรียน" . "</li>";
				$size_education_validation = "กรุณาเลือกขนาดโรงเรียน";
				$validation_size_education = FALSE;
			} else {
				$validation_size_education = TRUE;
			}
			
			//ตัวแปรละติจูด
			$lititude = $_COOKIE['lititude'] = $_POST['lititude'];
			
			//ตัวแปรลองติจูด
			$longtitude = $_COOKIE['longtitude'] = $_POST['longtitude'];
			
			//ตัวแปรจำนวนหนังสือทั้งหมดในห้องสมุด
			$amount_book = $_COOKIE['amount_book'] = $_POST['amount_book'];
			
			//ตัวแปรบ้านเลขที่
			$home_code = $_COOKIE['home_code'] = $_POST['home_code'];
			if(empty($home_code)){
				$form2 = "<li>" . "กรุณากรอกบ้านเลขที่" . "</li>";
				$home_code_validation = "กรุณากรอกบ้านเลขที่";
				$validation_home_code = FALSE;
			} else {
				$validation_home_code = TRUE;
			}
			
			//ตัวแปรหมู่ที่
			$moo = $_COOKIE['moo'] = $_POST['moo'];
			if(empty($moo)){
				$form2 .= "<li>" . "กรุณากรอกหมู่ที่" . "</li>";
				$moo_validation = "กรุณากรอกหมู่ที่";
				$validation_moo = FALSE;
			} else {
				$validation_moo = TRUE;
			}
			
			//ตัวแปรถนน
			$road = $_COOKIE['road'] = $_POST['road'];
			if(empty($road)){
				$form2 .= "<li>" . "กรุณากรอกถนน" . "</li>";
				$road_validation = "กรุณากรอกถนน";
				$validation_road = FALSE;
			} else {
				$validation_road = TRUE;
			}
			
			//ตัวแปรซอย
			$soy = $_COOKIE['soy'] = $_POST['soy'];
			if(empty($soy)){
				$form2 .= "<li>" . "กรุณากรอกซอย" . "</li>";
				$soy_validation = "กรุณากรอกซอย";
				$validation_soy = FALSE;
			} else {
				$validation_soy = TRUE;
			}
			
			//ตัวแปรจังหวัด
			$province = $_COOKIE['province'] = $_POST['province'];
			if($province == ""){
				$form2 .= "<li>" . "กรุณาเลือกจังหวัด" . "</li>";
				$province_validation = "กรุณาเลือกจังหวัด";
				$validation_province = FALSE;
			} else {
				$validation_province = TRUE;
			}
			
			//ตัวแปรอำเภอ
			$amphur = $_COOKIE['amphur'] = $_POST['amphur'];
			
			//ตัวแปรตำบล
			$district = $_COOKIE['district'] = $_POST['district'];
			if(empty($district)){
				$form2 .= "<li>" . "กรุณากรอกชื่อตำบล" . "</li>";
				$district_validation = "กรุณากรอกชื่อตำบล";
				$validation_district = FALSE;
			} else {
				$validation_district = TRUE;
			}
			
			//ตัวแปรรหัสไปรษณีย์
			$zip_code = $_COOKIE['zip_code'] = $_POST['zip_code'];
			if(empty($zip_code)){
				$form2 .= "<li>" . "กรุณากรอกรหัสไปรษณีย์" . "</li>";
				$zip_code_validation = "กรุณากรอกรหัสไปรษณีย์";
				$validation_zip_code = FALSE;
			} else {
				$validation_zip_code = TRUE;
			}
			
			if($validation_smis_id == TRUE || $validation_obec_id == TRUE || $validation_school_name_th == TRUE && $validation_school_name_en == TRUE && $validation_sims_id == TRUE && $validation_construct_at == TRUE && $validation_tel == TRUE && $validation_fax == TRUE && $validation_email == TRUE && $validation_dla == TRUE && $validation_type_education == TRUE && $validation_dla == TRUE && $validation_type_education == TRUE && $validation_size_education == TRUE){
				$validation_1 = TRUE;
			} else {
				$validation_1 = FALSE;
			}
			
			if($validation_home_code == TRUE && $validation_moo == TRUE && $validation_road == TRUE && $validation_soy == TRUE && $validation_province == TRUE && $validation_district == TRUE && $validation_zip_code == TRUE){
				$validation_2 = TRUE;
			} else {
				$validation_2 = FALSE;
			}
			
			//ตรวจสอบความถูกต้องทั้งหมด
			if ($validation_smis_id == FALSE || $validation_obec_id == FALSE || $validation_school_name_th == FALSE || $validation_school_name_en == FALSE || $validation_construct_at == FALSE || $validation_tel == FALSE || $validation_fax == FALSE || $validation_email == FALSE || $validation_dla == FALSE || $validation_type_education == FALSE || $validation_size_education == FALSE) {
				echo "<div class='alert alert-danger'>";
				echo "<button class='close' data-close='alert'></button>";
				echo "<ul>เกิดข้อผิดผลาด";
				echo $form1;
				echo "</ul>";
				echo "</div>";
			} else if ($validation_1 == TRUE && $validation_2 == TRUE) {
				
				//เพิ่มข้อมูลเข้าฐานข้อมูล
				if(is_uploaded_file($_FILES['logo']['tmp_name'])){
					$ext = pathinfo($_FILES['logo']['name'],PATHINFO_EXTENSION);
					$filename = "dataimage/" . $_SESSION['school_id'] . "." . $ext;
				} else {
					$filename = $sc['logo'];
				}
				
				$sql = "UPDATE school SET smis_id = '$smis_id', obec_id = '$obec_id', school_name_th = '$school_name_th', school_name_en = '$school_name_en', construct_at = '$construct_at', home_code = '$home_code', moo = '$moo', road = '$road', soy = '$soy', province = '$province', district = '$amphur', sub_district = '$district', zip_code = '$zip_code', tel = '$tel', fax = '$fax', email = '$email', website = '$website', dla = '$dla', type_education = '$type_education', size_education = '$size_education', electricity = '$electricity', school_area = '$school_area', school_district = '$school_district', lititude = '$lititude', longtitude = '$longtitude', amount_book = '$amount_book', logo = '$filename' WHERE school_id = '$id'";
				$result = mysqli_query($link, $sql);
				
				move_uploaded_file($_FILES['logo']['tmp_name'],$filename);
				
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลถูกบันทึกแล้ว";
				echo "</div>";
				
				header('refresh: 1;url = schools.php');
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
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสโรงเรียน
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="school_id" value="<?php echo $_SESSION['school_id']; ?>" maxlength="20" readonly>
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัส SMIS
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="smis_id" value="<?php if(isset($general)){ echo $smis_id; } else { echo $sc['smis_id']; } ?>" maxlength="20" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $smis_id_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัส OBEC
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="obec_id" value="<?php if(isset($general)){ echo $obec_id; } else { echo $sc['obec_id']; } ?>" maxlength="20" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $obec_id_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อโรงเรียน<small>(ภาษาไทย)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="school_name_th" value="<?php if(isset($general)){ echo $school_name_th; } else { echo $sc['school_name_th']; } ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $school_name_th_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อโรงเรียน<small>(ภาษาอังกฤษ)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="school_name_en" value="<?php if(isset($general)){ echo $school_name_en; } else { echo $sc['school_name_en']; } ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $school_name_en_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
    	<label class="col-md-3 control-label">วัน/เดือน/ปี
        	<small>(ก่อตั้ง)</small>
            <span class="required">*</span>
        </label>
    <div class="col-md-9">
    <div class="input-group date date-picker" data-date="<?php if(isset($general)){ echo $construct_at; } else { echo $sc['construct_at']; } ?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
    	<span class="input-group-btn">
    		<button class="btn default" type="button">
    			<i class="fa fa-calendar"></i>
    		</button>
    	</span>
    	<input name="construct_at" type="text" value="<?php if(isset($general)){ echo $construct_at; } else { echo $sc['construct_at']; } ?>" class="form-control" readonly>
    </div>
    	<span class="help-block"> เลือกวัน/เดือน/ปี </span>
        <?php echo "<span class=font-size-color>" . $construct_at_validation . "</span>"; ?>
    </div>
    </div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เบอร์โทรศัพท์
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="tel" value="<?php if(isset($general)){ echo $tel; } else { echo $sc['tel']; } ?>" maxlength="10" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $tel_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">โทรสาร
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="fax" value="<?php if(isset($general)){ echo $fax; } else { echo $sc['fax']; } ?>" maxlength="10" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $fax_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">อีเมล์
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="email" value="<?php if(isset($general)){ echo $email; } else { echo $sc['email']; } ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $email_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เว็บไซต์
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="website" value="<?php if(isset($general)){ echo $website; } else { echo $sc['website']; } ?>" maxlength="100">
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">องค์กรปกครองท้องถิ่น
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="dla" value="<?php if(isset($general)){ echo $dla; } else { echo $sc['dla']; } ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $dla_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ประเภทการจัดการศึกษา
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="type_education" value="<?php if(isset($general)){ echo $type_education; } else { echo $sc['type_education']; } ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $type_education_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ขนาดโรงเรียน
        	<span class="required">*</span>
        </label>
    <div class="col-md-9">
		<select class="form-control" name="size_education">
			<option value="เลือก">-- เลือก --</option>
			<option value="S" <?php if(isset($general)){ if($size_education == "S"){ echo "selected"; }} else { if($sc['size_education'] == "S"){ echo "selected"; } } ?>>S</option>
			<option value="M" <?php if(isset($general)){ if($size_education == "M"){ echo "selected"; }} else { if($sc['size_education'] == "M"){ echo "selected"; } } ?>>M</option>
			<option value="L" <?php if(isset($general)){ if($size_education == "L"){ echo "selected"; }} else { if($sc['size_education'] == "L"){ echo "selected"; } } ?>>L</option>
            <option value="XL" <?php if(isset($general)){ if($size_education == "XL"){ echo "selected"; }} else { if($sc['size_education'] == "XL"){ echo "selected"; } } ?>>XL</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $size_education_validation . "</span>"; ?>
	</div>
    </div>
    <div class="form-group">
		<label class="col-md-3 control-label" for="form_control_1">หม้อแปลงไฟฟ้า</label>
		<div class="col-md-9">
		<div class="md-radio-list">
		<div class="md-radio">
			<input type="radio" id="checkbox1_6" name="electricity" value="มี" class="md-radiobtn" <?php if(isset($general)){ if($electricity == "มี"){ echo "checked"; }} else { if($sc['electricity'] == "มี"){ echo "checked"; } } ?>>
			<label for="checkbox1_6">
				<span></span>
				<span class="check"></span>
				<span class="box"></span> มี 
            </label>
		</div>
		<div class="md-radio">
			<input type="radio" id="checkbox1_7" name="electricity" value="ไม่มี" class="md-radiobtn" <?php if(isset($general)){ if($electricity == "มี"){ echo ""; }  else { echo "checked"; } } else { if($sc['electricity'] == "มี"){ echo ""; } else { echo "checked"; } } ?>>
			<label for="checkbox1_7">
				<span></span>
				<span class="check"></span>
				<span class="box"></span> ไม่มี
            </label>
		</div>
	</div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">โรงเรียนถึงเขตพื้นที่
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="school_area" value="<?php if(isset($general)){ echo $school_area; } else { echo $sc['school_area']; } ?>" maxlength="3" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">โรงเรียนถึงอำเภอ
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="school_district" value="<?php if(isset($general)){ echo $school_district; } else { echo $sc['school_district']; } ?>" maxlength="3" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ละติจูด
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="lititude" value="<?php if(isset($general)){ echo $lititude; } else { echo $sc['lititude']; } ?>" maxlength="20" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ลองติจูด
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="longtitude" value="<?php if(isset($general)){ echo $longtitude; } else { echo $sc['longtitude']; } ?>" maxlength="20" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">จำนวนหนังสือในห้องสมุด
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="amount_book" value="<?php if(isset($general)){ echo $amount_book; } else { echo $sc['amount_book']; } ?>" maxlength="10" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
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
</div>
<!-- END TAB 1 -->

<!-- TAB 2 -->
<div class="tab-pane" id="tab_1_2">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ที่อยู่ - โรงเรียน</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
    <?php
		//สร้างตัวแปร
		$general = $_POST['general'];
		
		//เช็คเงื่อนไขเมื่อค่าตัวแปรนี้มีอยู่จริง
		if (isset($general)) {
			//ตรวจสอบความถูกต้องทั้งหมด
			if ($validation_home_code == FALSE || $validation_moo == FALSE || $validation_road == FALSE || $validation_soy == FALSE || $validation_province == FALSE || $validation_district == FALSE || $validation_zip_code == FALSE) {
				echo "<div class='alert alert-danger'>";
				echo "<button class='close' data-close='alert'></button>";
				echo "<ul>เกิดข้อผิดผลาด";
				echo $form2;
				echo "</ul>";
				echo "</div>";
			} else if ($validation_1 == TRUE && $validation_2 == TRUE) {
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
		<label class="col-md-3 control-label raya" for="form_control_1">บ้านเลขที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="home_code" value="<?php if(isset($general)){ echo $home_code; } else { echo $sc['home_code']; } ?>" maxlength="20">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $home_code_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">หมู่ที่
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="moo" value="<?php if(isset($general)){ echo $moo; } else { echo $sc['moo']; } ?>" maxlength="3" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $moo_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ถนน
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="road" value="<?php if(isset($general)){ echo $road; } else { echo $sc['road']; } ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $road_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ซอย
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="soy" value="<?php if(isset($general)){ echo $soy; } else { echo $sc['soy']; } ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $soy_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">จังหวัด
        	<span class="required">*</span>
        </label>
    <div class="col-md-9">
		<select class="form-control" name="province" id="province">
			<option value="">-- เลือก --</option>
			<?php
  				$sql = "SELECT PROVINCE_ID, PROVINCE_NAME FROM province";
				$result = mysqli_query($link, $sql);
				while($data = mysqli_fetch_assoc($result)){
					echo "<option value='$data[PROVINCE_ID]' ";
					
					if(isset($general)){
						if($data['PROVINCE_ID'] == $province){
							echo "selected";
						}
					} else {
						if($data['PROVINCE_ID'] == $sc['province']){
							echo "selected";
						}
					}
					
					echo ">" . "$data[PROVINCE_NAME]" . "</option>";
				}
  			?>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $province_validation . "</span>"; ?>
	</div>
    </div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">อำเภอ
        	<span class="required">*</span>
        </label>
    <div class="col-md-9">
		<select class="form-control" name="amphur" id="amphur">
        	<?php
				$sql = "SELECT AMPHUR_NAME FROM amphur WHERE AMPHUR_ID = '" . $sc['district'] . "'";
				$result = mysqli_query($link, $sql);
				$data = mysqli_fetch_assoc($result);
			?>
			<option value="<?php if(isset($general)){ echo $amphur; } else { echo $sc['district']; } ?>"><?php if(isset($general)){ echo $amphur; } else { echo $data['AMPHUR_NAME']; } ?></option>
		</select>
	<div class="form-control-focus"> </div>
	</div>
    </div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ตำบล
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="district" value="<?php if(isset($general)){ echo $district; } else { echo $sc['sub_district']; } ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $district_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสไปรษณีย์
        	<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="zip_code" value="<?php if(isset($general)){ echo $zip_code; } else { echo $sc['zip_code']; } ?>" maxlength="5" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $zip_code_validation . "</span>"; ?>
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
</div>
<!-- END TAB 2 -->

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