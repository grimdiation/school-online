<?php
session_start();
ob_start();
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title><?php echo $_SESSION['class'] . "/" . $_SESSION['room']; ?></title>
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
<link href="../assets/global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" />
<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}
</script>
<?php 
	include('template_2.php');
?>
<!-- BODY -->
<div class="page-content-wrapper">
<div class="page-content">
<div class="row">
<div class="portlet light bordered">
<div class="portlet-title">
<div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> รายงานห้อง <?php echo $_SESSION['class'] . "/" . $_SESSION['room']; ?></span> </div>
<div class="actions">
</div>
</div>
<div class="page-head">
<div class="page-title">
</div>
</div>

<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a class='dashboard-stat dashboard-stat-v2 blue' href='#GRAD' role="button" data-toggle="modal">
<div class='visual'>
<i class='fa fa-comments'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='1349'>เกรดเฉลี่ย</span>
</div>
<div class='desc'> <?php echo $_SESSION['class'] . "/" . $_SESSION['room']; ?> </div>
</div>
</a>
<!-- GRAD -->
<div id="GRAD" class="modal fade" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">เกรดเฉลี่ย</h4>
</div>
<div class="modal-body form">
<form action="grade-of-room.php" method="post" class="form-horizontal form-row-seperated" target="_blank">
<div class="form-group">
<label class="col-sm-4 control-label">กรอกเทอม</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon">
</span>
<input type="text" id="typeahead_example_modal_1" name="term" max="1" class="form-control" OnKeyPress="return chkNumber(this)" /> </div>
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
<!-- END GRAD -->

<a class='dashboard-stat dashboard-stat-v2 red' href="#myModal_autocomplete" role="button" data-toggle="modal">
<div class='visual'>
<i class='fa fa-bar-chart-o'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='12,5'>O-NET</span> </div>
<div class='desc'> <?php echo $_SESSION['class'] . "/" . $_SESSION['room']; ?> </div>
</div>
</a>
<!-- O-NET -->
<div id="myModal_autocomplete" class="modal fade" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">การทดสอบทางการศึกษาแห่งชาติขั้นพื้นฐาน(O-NET)</h4>
</div>
<div class="modal-body form">
<form action="onet-of-room.php" method="post" class="form-horizontal form-row-seperated" target="_blank">
<div class="form-group">
<label class="col-sm-4 control-label">กรอกปีการศึกษา</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon">
</span>
<input type="text" id="typeahead_example_modal_1" name="year" max="4" class="form-control" OnKeyPress="return chkNumber(this)" /> </div>
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
<!-- END O-NET -->
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a class='dashboard-stat dashboard-stat-v2 green' href='#disabled'  role="button" data-toggle="modal">
<div class='visual'>
<i class='fa fa-shopping-cart'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='549'>ผู้พิการ</span>
</div>
<div class='desc'> <?php echo $_SESSION['class'] . "/" . $_SESSION['room']; ?> </div>
</div>
</a>
<!-- DISABLED -->
<div id="disabled" class="modal fade" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">ผู้พิการ</h4>
</div>
<div class="modal-body form">
<form action="disabled-of-room.php" method="post" class="form-horizontal form-row-seperated" target="_blank">
<div class="form-group">
<label class="col-sm-4 control-label">กรอกปีการศึกษา</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon">
</span>
<input type="text" id="typeahead_example_modal_1" name="year" max="4" class="form-control" OnKeyPress="return chkNumber(this)" /> </div>
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
<!-- END DISABLED -->
<a class='dashboard-stat dashboard-stat-v2 purple' href="#lack" role="button" data-toggle="modal">
<div class='visual'>
<i class='fa fa-globe'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='89'></span>ผู้ขาดแคลน </div>
<div class='desc'> <?php echo $_SESSION['class'] . "/" . $_SESSION['room']; ?> </div>
</div>
</a>
<!-- LACK -->
<div id="lack" class="modal fade" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">ผู้ขาดแคลน</h4>
</div>
<div class="modal-body form">
<form action="lack-of-room.php" method="post" class="form-horizontal form-row-seperated" target="_blank">
<div class="form-group">
<label class="col-sm-4 control-label">กรอกปีการศึกษา</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon">
</span>
<input type="text" id="typeahead_example_modal_1" name="year" max="4" class="form-control" OnKeyPress="return chkNumber(this)" /> </div>
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
<a class='dashboard-stat dashboard-stat-v2 blue' href="#op" role="button" data-toggle="modal">
<div class='visual'>
<i class='fa fa-android'></i>
</div>
<div class='details'>
<div class='number'>
<span data-counter='counterup' data-value='89'></span>ผู้ด้อยโอกาส </div>
<div class='desc'> <?php echo $_SESSION['class'] . "/" . $_SESSION['room']; ?> </div>
</div>
</a>
<!-- OP -->
<div id="op" class="modal fade" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">ผู้ด้อยโอกาส</h4>
</div>
<div class="modal-body form">
<form action="op-of-room.php" method="post" class="form-horizontal form-row-seperated" target="_blank">
<div class="form-group">
<label class="col-sm-4 control-label">กรอกปีการศึกษา</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon">
</span>
<input type="text" id="typeahead_example_modal_1" name="year" max="4" class="form-control" OnKeyPress="return chkNumber(this)" /> </div>
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
<!-- END OP -->
</div>
</div>
</div>
</div>
</div>
</div>
<!-- BODY --> 

<!-- JAVA --> 
<!-- BEGIN CORE PLUGINS -->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/components-typeahead.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<?php include('template_3.php'); ?>