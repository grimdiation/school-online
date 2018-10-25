<?php
session_start();
ob_start();
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>จัดการนักเรียน</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<?php 
	include('template_2.php');
	$id = $_GET['id'];
?>
<!-- BODY -->
<div class="page-content-wrapper">
<div class="page-content">
<div class="row">
<div class="portlet light bordered">
<div class="portlet-title">
<div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> จัดการนักเรียน</span> </div>
<div class="actions">
</div>
</div>
<div class="page-head">
<div class="page-title">
</div>
</div>

<div class="row">
<?php
if($_SESSION['role'] == "teacher"){
 echo "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>";
 echo "<a class='dashboard-stat dashboard-stat-v2 blue' href='edit-student.php?id=$id'>";
 echo "<div class='visual'>";
 echo "<i class='fa fa-comments'></i>";
 echo "</div>";
 echo "<div class='details'>";
 echo "<div class='number'>";
 echo "<span data-counter='counterup' data-value='1349'>แก้ไข</span>";
 echo "</div>";
 echo "<div class='desc'> ข้อมูลนักเรียน </div>";
 echo "</div>";
 echo "</a>";

 echo "<a class='dashboard-stat dashboard-stat-v2 red' href='create_grade.php?id=$id'>";
 echo "<div class='visual'>";
 echo "<i class='fa fa-bar-chart-o'></i>";
 echo "</div>";
 echo "<div class='details'>";
 echo "<div class='number'>";
 echo "<span data-counter='counterup' data-value='12,5'>เพิ่ม</span> </div>";
 echo "<div class='desc'> ผลการเรียน(GPA) </div>";
 echo "</div>";
 echo "</a>";
 
 echo "<a class='dashboard-stat dashboard-stat-v2 purple' href='onet.php?id=$id'>";
 echo "<div class='visual'>";
 echo "<i class='fa fa-adjust'></i>";
 echo "</div>";
 echo "<div class='details'>";
 echo "<div class='number'>";
 echo "<span data-counter='counterup' data-value='1349'>เพิ่ม</span>";
 echo "</div>";
 echo "<div class='desc'> ผลการทดสอบ O-NET </div>";
 echo "</div>";
 echo "</a>";
 echo "</div>";
}
?>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a class='dashboard-stat dashboard-stat-v2 green' href='detail_student.php?id=<?php echo $id; ?>'>
<div class='visual'>
<i class='fa fa-shopping-cart'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='549'>แสดง</span>
</div>
<div class='desc'> ข้อมูลนักเรียน </div>
</div>
</a>
<a class='dashboard-stat dashboard-stat-v2 purple' href="#lack" role="button" data-toggle="modal">
<div class='visual'>
<i class='fa fa-globe'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='89'></span>สมุดพก </div>
<div class='desc'> นักเรียน </div>
</div>
</a>
<!-- LACK -->
<div id="lack" class="modal fade" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">สมุดพกนักเรียน</h4>
</div>
<div class="modal-body form">
<form action="report2.php?id=<?php echo $id; ?>" method="post" class="form-horizontal form-row-seperated" target="_blank">
<div class="form-group">
<label class="col-sm-4 control-label">เทอม</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon">
</span>
<input type="text" id="typeahead_example_modal_1" name="term" maxlength="1" class="form-control" OnKeyPress="return chkNumber(this)" /> </div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn grey-salsa btn-outline" data-dismiss="modal">ยกเลิก</button>
<button type="submit" class="btn green">ตกลง</button>
</form>
</div>
</div>
</div>
</div>
<!-- END LACK -->
<a class='dashboard-stat dashboard-stat-v2 blue' href="report.php?id=<?php echo $id; ?>" target="_blank">
<div class='visual'>
<i class='fa fa-android'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='89'></span>แสดงข้อมูล </div>
<div class='desc'> ผลการทดสอบ O-NET </div>
</div>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- BODY --> 

<!-- JAVA --> 
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> 
<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> 
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script> 
<script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<?php include('template_3.php'); ?>