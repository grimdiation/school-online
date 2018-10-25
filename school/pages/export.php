<?php
session_start();
ob_start();
include('autoload.php');
$_SESSION['class'] = $id = $_GET['id'];
include('mysql_connect.php');
?>
<?php include('template_1.php'); ?>
    <meta charset="utf-8">
    <title>ส่งออกข้อมูล</title>
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
<?php
$sql = "SELECT school_name_th AS SchoolNameTH FROM school WHERE school_id = '" . $id . "'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_assoc($result);
$SchoolNameTH = $data['SchoolNameTH'];
?>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> รายงานโรงเรียน <?php echo $SchoolNameTH; ?></span> </div>
                        <div class="actions">
                        </div>
                    </div>
                    <div class="page-head">
                        <div class="page-title">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class='dashboard-stat dashboard-stat-v2 red' href="#student" role="button" data-toggle="modal">
                                <div class='visual'>
                                    <i class='fa fa-comments'></i>
                                </div>
                                <div class='details'>
                                    <div class='number'>
                                        <span data-counter='counterup' data-value='1349'>Excel</span>
                                    </div>
                                    <div class='desc'> จำนวนนักเรียนในโรงเรียน </div>
                                </div>
                            </a>
                            
                            <!-- STUDENT -->
<div id="student" class="modal fade" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Export จำนวนนักเรียนในโรงเรียน</h4>
</div>
<div class="modal-body form">
<form action="excel_student.php?id=<?php echo $id; ?>" method="post" class="form-horizontal form-row-seperated" target="_blank">
<div class="form-group">
<label class="col-sm-4 control-label">ปีการศึกษา</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon">
</span>
<input type="text" id="typeahead_example_modal_1" name="year" maxlength="4" class="form-control" OnKeyPress="return chkNumber(this)" /> </div>
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
<!-- END STUDENT -->
                            <a class='dashboard-stat dashboard-stat-v2 yellow' href="#grade" role='button' data-toggle='modal'>
                                <div class='visual'>
                                    <i class='fa fa-comments'></i>
                                </div>
                                <div class='details'>
                                    <div class='number'>
                                        <span data-counter='counterup' data-value='1349'>Excel</span>
                                    </div>
                                    <div class='desc'> ผลสัมฤทธิ์ทางการเรียน </div>
                                </div>
                            </a>
                            <!-- GRADE -->
<div id="grade" class="modal fade" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Export ผลสัมฤทธิ์ทางการเรียน</h4>
</div>
<div class="modal-body form">
<form action="excel_grade.php?id=<?php echo $id; ?>" method="post" class="form-horizontal form-row-seperated" target="_blank">
<div class="form-group">
<label class="col-sm-4 control-label">ปีการศึกษา</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon">
</span>
<input type="text" id="typeahead_example_modal_1" name="year" maxlength="4" class="form-control" OnKeyPress="return chkNumber(this)" /> </div>
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
<!-- END GRADE -->
                            
                            <a class='dashboard-stat dashboard-stat-v2 purple' href="#onet" role='button' data-toggle='modal'>
                                <div class='visual'>
                                    <i class='fa fa-comments'></i>
                                </div>
                                <div class='details'>
                                    <div class='number'>
                                        <span data-counter='counterup' data-value='1349'>Excel</span>
                                    </div>
                                    <div class='desc'> O-NET </div>
                                </div>
                            </a>
                            <!-- ONET -->
<div id="onet" class="modal fade" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Export ผลการประเมินคุณภาพการศึกษาระดับชาติ</h4>
</div>
<div class="modal-body form">
<form action="excel_onet.php?id=<?php echo $id; ?>" method="post" class="form-horizontal form-row-seperated" target="_blank">
<div class="form-group">
<label class="col-sm-4 control-label">ปีการศึกษา</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon">
</span>
<input type="text" id="typeahead_example_modal_1" name="year" maxlength="4" class="form-control" OnKeyPress="return chkNumber(this)" /> </div>
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
<!-- END ONET -->
                            
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class='dashboard-stat dashboard-stat-v2 green' href="excel_personnel.php?id=<?php echo $id; ?>" role='button' data-toggle='modal'>
                                <div class='visual'>
                                    <i class='fa fa-comments'></i>
                                </div>
                                <div class='details'>
                                    <div class='number'>
                                        <span data-counter='counterup' data-value='1349'>Excel</span>
                                    </div>
                                    <div class='desc'> ข้อมุลบุคลากร </div>
                                </div>
                            </a>
                            <a class='dashboard-stat dashboard-stat-v2 blue' href="#school" role='button' data-toggle='modal'>
                                <div class='visual'>
                                    <i class='fa fa-comments'></i>
                                </div>
                                <div class='details'>
                                    <div class='number'>
                                        <span data-counter='counterup' data-value='1349'>Excel</span>
                                    </div>
                                    <div class='desc'> ข้อมูลโรงเรียน </div>
                                </div>
                            </a>
                            <!-- SCHOOL -->
<div id="school" class="modal fade" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<h4 class="modal-title">Export ข้อมูลโรงเรียน</h4>
</div>
<div class="modal-body form">
<form action="excel_school.php?id=<?php echo $id; ?>" method="post" class="form-horizontal form-row-seperated" target="_blank">
<div class="form-group">
<label class="col-sm-4 control-label">ปีการศึกษา</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon">
</span>
<input type="text" id="typeahead_example_modal_1" name="year" maxlength="4" class="form-control" OnKeyPress="return chkNumber(this)" /> </div>
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
<!-- END SCHOOL -->
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
<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> 
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script> 
<script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
<?php include('template_3.php'); ?>