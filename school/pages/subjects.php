<?php
session_start();
ob_start();
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>subjects</title>
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
<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}
</script>
<?php include('template_2.php'); ?>
  <!-- BODY -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="row">
        <div class="portlet box green">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-gift"></i>รายวิชา </div>
            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
          </div>
          <div class="portlet-body form"> 
            <!-- BEGIN FORM-->
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-body">
                <div class="form-group">
                  <label class="col-md-3 control-label">เทอม</label>
                  <div class="col-md-4">
                    <input type="text" name="term" class="form-control input-circle" placeholder="ระบุเทอม" min="1" max="2" maxlength="1" OnKeyPress="return chkNumber(this)">
                    <input type="hidden" name="year" class="form-control input-circle" value="<?php echo date('Y') + 543; ?>" maxlength="20">
                  </div>
                </div>
              </div>
              <div class="form-body">
                <div class="form-group">
                  <label class="col-md-3 control-label">วิชาที่สอน</label>
                  <div class="col-md-4">
                    <input type="text" name="subject" class="form-control input-circle" placeholder="ระบุวิชาที่สอน" maxlength="200">
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" name="insert" class="btn btn-circle green">เพิ่ม</button>
                    <button type="reset" class="btn btn-circle grey-salsa btn-outline" onClick="location.href('people.php')">ยกเลิก</button>
                  </div>
                </div>
              </div>
            </form>
            <?php
	include('mysql_connect.php');
	$id = $_GET['id'];
	if(isset($_POST['insert'])){
		$subject = "'" . $_POST['term'] . "',";
		$subject .= "'" . $_POST['year'] . "',";
		$subject .= "'" . $id . "',";
		$subject .= "'" . $_POST['subject'] . "'";
		
		$sql = "insert into subject (term, year, id_card, subject)values($subject)";
		$result = mysqli_query($link, $sql);
		
		header('refresh: 0;');
	}
?>
            <!-- END FORM--> 
          </div>
        </div>
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> รายวิชาที่สอน </span> </div>
            <div class="actions">
              <div class="btn-group btn-group-devided" data-toggle="buttons">
              </div>
            </div>
          </div>
          <hr>
              <div class="table-scrollable table-scrollable-borderless">
                <table class="table table-hover table-light">
                  <thead>
                    <tr class="uppercase">
                    <th> ปีการศึกษา</th>
                      <th> เทอม</th>
                      <th> วิชาที่สอน</th>
                      <th width="20%"> ควบคุม</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  $sql = "SELECT * FROM subject WHERE id_card = '$id'";
				  $result = mysqli_query($link, $sql);
				  while($data = mysqli_fetch_array($result)){
				  ?>
                    <tr>
                      <td><?php echo $data['year']; ?></td>
                      <td><?php echo $data['term']; ?></td>
                      <td><?php echo $data['subject']; ?></td>
                      <td>

                      <a href="<?php echo "del_subject.php?id={$data['id']}"; ?>" class="btn red-mint btn-xs sbold uppercase"> <i class="fa fa-close"></i> ลบ </a></td>
                    </tr>
					<?php 
				  }
					?>
                  </tbody>
                </table>
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
  <!-- END CORE PLUGINS --> 
  <!-- BEGIN PAGE LEVEL PLUGINS --> 
  <!-- END PAGE LEVEL PLUGINS --> 
  <!-- BEGIN THEME GLOBAL SCRIPTS --> 
  <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
  <link href="../assets/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
  <script src="../assets/jquery-2.0.0.min.js"></script> 
  <script src="../assets/jquery-ui-1.10.3.custom.min.js"></script> 
  <script>
$(function(){
	$('#dp').datepicker();
});
</script> 
  <!-- END THEME GLOBAL SCRIPTS --> 
  <!-- BEGIN PAGE LEVEL SCRIPTS --> 
  <script src="../assets/pages/scripts/form-samples.min.js" type="text/javascript"></script> 
  <!-- END PAGE LEVEL SCRIPTS --> 
  <!-- BEGIN THEME LAYOUT SCRIPTS --> 
  <script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script> 
  <script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script> 
  <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
  <?php include('template_3.php'); ?>