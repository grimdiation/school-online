<?php
session_start();
ob_start();
include('autoload.php');
include('mysql_connect.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8" />
<title>รายละเอียด - บุคคล</title>
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
$sql = "SELECT * FROM personnel WHERE id_card = '$id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result);
?>
<img src="<?php echo $data['photo']; ?>" class="img-responsive" alt=""> </div>
<div class="profile-usertitle">
<div class="profile-usertitle-name"> <?php echo $data['first_name_th'] . " " . $data['last_name_th']; ?> </div>
<div class="profile-usertitle-job"> <?php echo $data['position']; ?> </div>
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
<a href="#tab_1_2" data-toggle="tab">ตำแหน่ง</a>
</li>
</ul>
</div>
<div class="portlet-body">
<div class="tab-content">
<div class="tab-pane active" id="tab_1_1">
<table>
<form role="form" action="#">
<tr>
	<td class="font-size" width="200"><label class="control-label">ชื่อ : </label></td>
	<td class="font-size"><?php echo $data['first_name_th']; ?></td>
<tr>
<tr>
	<td class="font-size"><label class="control-label">นามสกุล : </label></td>
	<td class="font-size"><?php echo $data['last_name_th']; ?></td>
<tr>
<tr>
	<td class="font-size"><label class="control-label">เพศ : </label></td>
	<td class="font-size"><?php echo $data['gender']; ?></td>
<tr>
<tr>
	<td class="font-size"><label class="control-label">รหัสบัตรประชาชน : </label></td>
	<td class="font-size"><?php echo $data['id_card']; ?></td>
<tr>
<tr>
	<td class="font-size"><label class="control-label">เบอร์โทรศัพท์ : </label></td>
	<td class="font-size"><?php echo $data['tel']; ?></td>
<tr>
<tr>
	<td class="font-size" valign="top"><label class="control-label">วุฒิการศึกษาสูงสุด : </label></td>
	<td class="font-size"><?php echo $data['graduated']; ?></td>
<tr>
<tr>
	<td class="font-size" valign="top"><label class="control-label">วิชาเอก : </label></td>
	<td class="font-size"><?php echo $data['graduated_major']; ?></td>
<tr>
<tr>
	<td class="font-size" valign="top"><label class="control-label">งานพิเศษอื่นๆ : </label></td>
	<td class="font-size"><?php echo $data['extra_work']; ?></td>
<tr>
</form>
</table>
</div>
<div class="tab-pane" id="tab_1_2">
<table>
<form role="form" action="#">
<tr>
	<td class="font-size" width="200"><label class="control-label">รหัสบุคลากร : </label></td>
	<td class="font-size"><?php echo $data['position_id']; ?></td>
<tr>
<tr>
	<td class="font-size"><label class="control-label">ตำแหน่ง : </label></td>
	<td class="font-size"><?php echo $data['position']; ?></td>
<tr>
<tr>
	<td class="font-size"><label class="control-label">วิทยฐานะ : </label></td>
	<td class="font-size"><?php echo $data['academic_standing']; ?></td>
<tr>
<tr>
	<td class="font-size"><label class="control-label">วันเดือนปีที่บรรจุ : </label></td>
	<td class="font-size"></td>
<tr>
<tr>
	<td class="font-size"><label class="control-label">เงินเดือน : </label></td>
	<td class="font-size"><?php echo $data['salary']; ?> บาท</td>
<tr>
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