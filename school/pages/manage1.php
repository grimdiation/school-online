<?php
session_start();
ob_start();
error_reporting( error_reporting() & ~E_NOTICE );
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>schools</title>
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
        <div class="col-md-12">
          <div class="portlet light portlet-fit ">
            <div class="portlet-title">
              <div class="caption"> <i class="icon-wrench font-green-meadow"></i> <span class="caption-subject font-green-meadow sbold uppercase"> เกรดแต่ละวิชา </span> </div>
              <div class="actions"> <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a> </div>
            </div>
            <div class="portlet-body">
            <form method="post">
              <div class="form-group">
                <label class="sr-only">ความพิการ ความขาดแคลน และด้อยโอกาส</label>
                <select type="text" class="form-control input-circle" name="aa">
                	<option value="d">ความพิการ</option>
                    <option value="l">ความขาดแคลน</option>
                    <option value="i">ด้อยโอกาส</option>
                </select>
              </div>
                <div class="form-group">
                <label class="sr-only">ปี</label>
                <input type="text" class="form-control input-circle" name="year" maxlength="4" placeholder="ระบุปี" required>
              </div>
              <button type="submit" name="insert" class="btn green-meadow">ตกลง</button>
              </form>
              <?php
			  include('mysql_connect.php');
			  $id = $_GET['id'];
			  $sql = "SELECT * FROM room WHERE room_id = '$id'";
			  $result = mysqli_query($link, $sql);
			  $data = mysqli_fetch_array($result);
			  if(isset($_POST['insert'])){
				  $_SESSION['class'] = $data['class'];
				  $_SESSION['year'] = $_POST['year'];
				  if($_POST['aa'] == "d"){
					 header('refresh: 1;url = report-disabled-header1.php'); 
				  } else if($_POST['aa'] == "l"){
					 header('refresh: 1;url = report-lack-header1.php'); 
				  } else if($_POST['aa'] == "i"){
					  header('refresh: 1;url = report-opportunities-header1.php');
				  }
				  mysqli_close($link);
			  }
			  ?>
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