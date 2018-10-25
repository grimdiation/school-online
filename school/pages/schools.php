<?php
session_start();
ob_start();
include('autoload.php');
include('mysql_connect.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>จัดการโรงเรียน</title>
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
?>
<!-- BODY -->
<div class="page-content-wrapper">
<div class="page-content">
<div class="row">
<div class="portlet light bordered">
<div class="portlet-title">
<div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> จัดการโรงเรียน</span> </div>
<div class="actions">
</div>
</div>
<div class="page-head">
<div class="page-title">
</div>
</div>

<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<?php
$sql = "SELECT school_id FROM school WHERE school_id ='$_SESSION[school_id]'";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);
if($_SESSION['role'] == "administration" && $num == 0){
	echo "<a class='dashboard-stat dashboard-stat-v2 blue' href='create-school.php'>";
	echo "<div class='visual'>";
	echo "<i class='fa fa-comments'></i>";
	echo "</div>";
	echo "<div class='details'>";
	echo "<div class='number'>";
	echo "<span data-counter='counterup' data-value='1349'>เพิ่ม</span>";
	echo "</div>";
	echo "<div class='desc'> โรงเรียน </div>";
	echo "</div>";
	echo "</a>";
}
?>

<?php
if($_SESSION['role'] == "administration"){
	echo "<a class='dashboard-stat dashboard-stat-v2 red' href='edit-school.php?id=$_SESSION[school_id]'>";
	echo "<div class='visual'>";
	echo "<i class='fa fa-bar-chart-o'></i>";
	echo "</div>";
	echo "<div class='details'>";
	echo "<div class='number'>";
	echo "<span data-counter='counterup' data-value='12,5'>แก้ไข</span> </div>";
	echo "<div class='desc'> โรงเรียน </div>";
	echo "</div>";
	echo "</a>";
}
?>
<a class="dashboard-stat dashboard-stat-v2 purple" href="detail_school.php?id=<?php echo $_SESSION['school_id']; ?>" target="_blank">
<div class="visual">
<i class="fa fa-adjust"></i>
</div>
<div class="details">
<div class="number">
<span data-counter="counterup" data-value="1349">ประวัติ</span>
</div>
<div class="desc"> โรงเรียน </div>
</div>
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<?php
if($_SESSION['role'] == "administration"){
	echo "<a class='dashboard-stat dashboard-stat-v2 green' href='budget.php'>";
	echo "<div class='visual'>";
	echo "<i class='fa fa-shopping-cart'></i>";
	echo "</div>";
	echo "<div class='details'>";
	echo "<div class='number'>";
	echo "<span data-counter='counterup' data-value='549'>เพิ่ม</span>";
	echo "</div>";
	echo "<div class='desc'> งบประมาณ </div>";
	echo "</div>";
	echo "</a>";
}
?>

<?php
if($_SESSION['role'] == "administration"){
	echo "<a class='dashboard-stat dashboard-stat-v2 yellow' href='edit-budget.php?id=" . (date('Y') + 543) . "'>";
	echo "<div class='visual'>";
	echo "<i class='fa fa-globe'></i>";
	echo "</div>";
	echo "<div class='details'>";
	echo "<div class='number'>";
	echo "<span data-counter='counterup' data-value='89'></span>แก้ไข </div>";
	echo "<div class='desc'> งบประมาณ </div>";
	echo "</div>";
	echo "</a>";
}
?>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<?php
if($_SESSION['role'] == "administration"){
	echo "<a class='dashboard-stat dashboard-stat-v2 blue' href='create-room.php'>";
	echo "<div class='visual'>";
	echo "<i class='fa fa-shopping-cart'></i>";
	echo "</div>";
	echo "<div class='details'>";
	echo "<div class='number'>";
	echo "<span data-counter='counterup' data-value='549'>เพิ่ม</span>";
	echo "</div>";
	echo "<div class='desc'> ห้องเรียน </div>";
	echo "</div>";
	echo "</a>";
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
mysqli_close($link);
?>
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