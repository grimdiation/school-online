<?php
session_start();
ob_start();
include('autoload.php');
error_reporting( error_reporting() & ~E_NOTICE );
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>เพิ่มห้องเรียน</title>
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
<?php include('template_2.php'); ?>
  <!-- BODY -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="row">
        <div class="portlet box green">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-gift"></i>ชั้นเรียน </div>
            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
          </div>
          <div class="portlet-body form"> 
            <!-- BEGIN FORM-->
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-body">
                <div class="form-group">
                  <label class="col-md-3 control-label">ชั้น</label>
                  <div class="col-md-4">
                    <input type="text" name="class" class="form-control input-circle" placeholder="ระบุชั้นเรียน เช่น ป.1 ป.2 ม.6 เป็นต้น" maxlength="20">
                    <?php echo $error; ?>
                  </div>
                </div>
              </div>
              <div class="form-body">
                <div class="form-group">
                  <label class="col-md-3 control-label">ห้อง</label>
                  <div class="col-md-4">
                    <input type="text" name="room" class="form-control input-circle" placeholder="ระบุจำนวนห้องทั้งหมดของชั้นนั้น" OnKeyPress="return chkNumber(this)" maxlength="10">
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
if(isset($_POST['insert'])){
$sql = "SELECT * FROM room inner join school on room.school_id = school.school_id WHERE room.school_id = '$_SESSION[school_id]'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result);
if($data['class'] != $_POST['class']){
$room = "'" . $_POST['class'] . "',";
$room .= "'" . $_POST['room'] . "',";
$room .= "'" . $_POST['year'] . "',";
$room .= "'" . $_SESSION['school_id'] . "'";
} else {
	$error = "ชั้นเรียนนี้มีอยู่ในระบบแล้ว";
}

$sql = "INSERT INTO room (class, room, year, school_id)values($room)";
$result = mysqli_query($link, $sql);
}

?>
            <!-- END FORM--> 
          </div>
        </div>
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> ห้องเรียน </span> </div>
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
                    <th> ชั้น</th>
                      <th> ห้อง</th>
                      <th width="20%"> ควบคุม</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  $sql = "SELECT * FROM room inner join school on room.school_id = school.school_id WHERE room.school_id = '$_SESSION[school_id]'";
				  $result = mysqli_query($link, $sql);
				  while($data = mysqli_fetch_array($result)){
				  ?>
                    <tr>
                      <td><?php echo $data['class']; ?></td>
                      <td><?php echo $data['room']; ?></td>
                      <td>

                      <a href="<?php echo "del_room.php?id={$data['room_id']}"; ?>" class="btn red-mint btn-xs sbold uppercase"> <i class="fa fa-close"></i> ลบ </a></td>
                    </tr>
					<?php 
				  }
				  mysqli_close($link);
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
  <?php include('template_3.php'); ?>