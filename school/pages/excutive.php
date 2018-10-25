<?php
session_start();
ob_start();
include('autoload.php');
include('mysql_connect.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>บทสรุปผู้บริหาร</title>
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
	$sql = "SELECT * FROM school WHERE school_id = '$id'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_array($result);
?>
<!-- BODY -->
<div class="page-content-wrapper">
<div class="page-content">
<div class="row">
<div class="portlet light bordered">
<div class="portlet-title">
<div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> บทสรุปผู้บริหาร</span> </div>
<div class="actions">
</div>
</div>
<div class="page-head">
<div class="page-title">
</div>
</div>

<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a class='dashboard-stat dashboard-stat-v2 blue' href='grade-of-excutive.php?id=<?php echo $id;?>' target="_blank">
<div class='visual'>
<i class='fa fa-comments'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='1349'>เกรดเฉลี่ย</span>
</div>
<div class='desc'> <?php echo $data['school_name_th']; ?> </div>
</div>
</a>

<a class='dashboard-stat dashboard-stat-v2 red' href='onet-of-excutive.php?id=<?php echo $id;?>' target="_blank">
<div class='visual'>
<i class='fa fa-bar-chart-o'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='12,5'>O-NET</span> </div>
<div class='desc'> <?php echo $data['school_name_th']; ?> </div>
</div>
</a>

<a class='dashboard-stat dashboard-stat-v2 yellow' href='butget-of-excutive.php?id=<?php echo $id;?>' target="_blank">
<div class='visual'>
<i class='fa fa-amazon'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='549'>งบประมาณ</span>
</div>
<div class='desc'> <?php echo $data['school_name_th']; ?> </div>
</div>
</a>

</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a class='dashboard-stat dashboard-stat-v2 green' href='disabled-of-excutive.php?id=<?php echo $_SESSION['school_id']; ?>' target="_blank">
<div class='visual'>
<i class='fa fa-shopping-cart'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='549'>ผู้พิการ</span>
</div>
<div class='desc'> <?php echo $data['school_name_th']; ?> </div>
</div>
</a>


<a class='dashboard-stat dashboard-stat-v2 purple' href="lack-of-excutive.php?id=<?php echo $_SESSION['school_id']; ?>" target="_blank">
<div class='visual'>
<i class='fa fa-globe'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='89'></span>ผู้ขาดแคลน </div>
<div class='desc'> <?php echo $data['school_name_th']; ?> </div>
</div>
</a>


<a class='dashboard-stat dashboard-stat-v2 blue' href="op-of-excutive.php?id=<?php echo $_SESSION['school_id']; ?>" target="_blank">
<div class='visual'>
<i class='fa fa-android'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='89'></span>ผู้ด้อยโอกาส </div>
<div class='desc'> <?php echo $data['school_name_th']; ?> </div>
</div>
</a>

</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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