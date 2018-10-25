<?php
session_start();
ob_start();
include('autoload.php');
error_reporting( error_reporting() & ~E_NOTICE );
$id = $_GET['id'];
$_SESSION['onet'] = $_GET['id'];
include('mysql_connect.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>O-NET</title>
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
<style>
.font-size-color {
	color: red;
}
</style>
<?php include('template_2.php'); ?>
  <!-- BODY -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="row">
        <div class="portlet box green">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-gift"></i>O-NET </div>
            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
          </div>
          <div class="portlet-body form"> 
          <div class="form-body">
<?php
$general = $_POST['general'];
if(isset($general)){

	//ตัวแปรรับค่ากรณี OR FALSE
	$SubJect = $_COOKIE['SubJect'] = $_POST['subject'];
	if($SubJect == "เลือก"){
		$FORM = "<li>" . "กรุณาเลือกชื่อวิชา" . "</li>";
		$SubJect_VALIDATION = "กรุณาเลือกชื่อวิชา";
		$VALIDATION_SubJect = FALSE;
	} else {
		$VALIDATION_SubJect = TRUE;
	}//รับค่า ชื่อวิชา
	$Year = $_COOKIE['Year'] = $_POST['year'];
	$MaxScore = $_COOKIE['MaxScore'] = $_POST['max_score'];
	if(empty($MaxScore)){
		$FORM .= "<li>" . "กรุณากรอกคะแนนเต็ม" . "</li>";
		$MaxScore_VALIDATION = "กรุณากรอกคะแนนเต็ม";
		$VALIDATION_MaxScore = FALSE;
	} else {
		$VALIDATION_MaxScore = TRUE;
	}//รับค่า คะแแนนเต็ม
	$Score = $_COOKIE['Score'] = $_POST['score'];
	if(empty($Score)){
		$FORM .= "<li>" . "กรุณากรอกคะแนนที่ได้" . "</li>";
		$Score_VALIDATION = "กรุณากรอกคะแนนที่ได้";
		$VALIDATION_Score = FALSE;
	} else {
		$VALIDATION_Score = TRUE;
	}//รับค่า คะแนนที่ได้
	
	$VALIDATION_FALSE = $VALIDATION_SubJect == FALSE || $VALIDATION_MaxScore == FALSE || $VALIDATION_Score == FALSE;
	
	$VALIDATION_TRUE =  $VALIDATION_SubJect == TRUE &&  $VALIDATION_MaxScore == TRUE && $VALIDATION_Score == TRUE;
	
	if($VALIDATION_FALSE){
		echo "<div class='alert alert-danger'>";
		echo "<button class='close' data-close='alert'></button>";
		echo "<ul>เกิดข้อผิดผลาด";
		echo $FORM;
		echo "</ul>";
		echo "</div>";
	} else if($VALIDATION_TRUE) {
		
		$data ="'" . $SubJect . "',";
		$data .= "'" . $MaxScore . "',";
		$data .= "'" . $Score . "',";
		$data .= "'" . (date('Y') + 543) . "',";
		$data .= "'" . $_SESSION['class'] . "',";
		$data .= "'" . $id . "',";
        $data .= "'" . $_SESSION['school_id'] . "'";
		
		$sql = "INSERT INTO onet (subject, max_score, score, year, class, id_card, school_id) VALUES (" . $data . ")";
		$result = mysqli_query($link, $sql);
		
		echo "<div class='alert alert-success'>";
		echo "<button class='close' data-close='alert'></button> ";
		echo "ข้อมูลถูกบันทึกแล้ว";
		echo "</div>";
	}

}
?> 
<form method="post" enctype="multipart/form-data">
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อวิชา
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<select class="form-control maxlength_defaultconfig" name="subject">
        <option value="เลือก">---- เลือก ----</option>
        <option value="ภาษาไทย" <?php if($SubJect == "ภาษาไทย"){ echo "selected"; } ?>>ภาษาไทย</option>
        <option value="คณิตศาสตร์" <?php if($SubJect == "คณิตศาสตร์"){ echo "selected"; } ?>>คณิตศาสตร์</option>
        <option value="วิทยาศาสตร์" <?php if($SubJect == "วิทยาศาสตร์"){ echo "selected"; } ?>>วิทยาศาสตร์</option>
        <option value="ศิลปะ" <?php if($SubJect == "ศิลปะ"){ echo "selected"; } ?>>ศิลปะ</option>
        <option value="การงานอาชีพและเทคโนโลยี" <?php if($SubJect == "การงานอาชีพและเทคโนโลยี"){ echo "selected"; } ?>>การงานอาชีพและเทคโนโลยี</option>
        <option value="สังคมศึกษา ศาสนา และวัฒนธรรม" <?php if($SubJect == "สังคมศึกษา ศาสนา และวัฒนธรรม"){ echo "selected"; } ?>>สังคมศึกษา ศาสนา และวัฒนธรรม</option>
        <option value="ภาษาอังกฤษ" <?php if($SubJect == "ภาษาอังกฤษ"){ echo "selected"; } ?>>ภาษาอังกฤษ</option>
        <option value="สุขศึกษาและพลศึกษา" <?php if($SubJect == "สุขศึกษาและพลศึกษา"){ echo "selected"; } ?>>สุขศึกษาและพลศึกษา</option>
        </select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $SubJect_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">คะแนนเต็ม
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $MaxScore; ?>" placeholder="กรอกคะแนนเต็ม" name="max_score" maxlength="3">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $MaxScore_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">คะแนนที่ได้
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Score; ?>" placeholder="กรอกคะแนนที่ได้" name="score" maxlength="3">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Score_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ระดับคะแนน O-NET
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Level; ?>" placeholder="กรอกระดับคะแนน O-NET" name="level" maxlength="4">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Level_VALIDATION . "</span>"; ?>
	</div>
	</div>
	</div>
    <div class="form-actions">
	<div class="row">
	<div class="col-md-offset-3 col-md-9">
    <button type="submit" name="general" class="btn btn-sm blue">เพิ่ม</button>
	</div>
	</div>
	</div>
    </form>
    </div>
    </div>
            <?php
	
	$sql = "SELECT * FROM student WHERE id_card = '$id'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_array($result);
	
	if(isset($_POST['insert'])){
		$subject = "'" . $_POST['subject'] . "',";
		$subject .= "'" . $_POST['max_score'] . "',";
		$subject .= "'" . $_POST['score'] . "',";
		$subject .= "'" . $_POST['level'] . "',";
		$subject .= "'" . $_POST['year'] . "',";
		$subject .= "'" . $data['class'] . "',";
		$subject .= "'" . $id . "',";
		$subject .= "'" . $_SESSION['school_id'] . "'";
		
		$sql = "insert into onet (subject, max_score, score, level, year, class, id_card, school_id)values($subject)";
		$result = mysqli_query($link, $sql);
		
		header('refresh: 0;');
	}
?>
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> คะแนนสอบ Onet </span> </div>
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
                    <th> ชื่อวิชา</th>
                    <th> คะแนนเต็ม </th>
                      <th> คะแนน</th>
                      <th> ระดับชั้น </th>
                      <th> ปี </th>
                      <th width="20%"> ควบคุม</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  $sql = "SELECT * FROM onet WHERE id_card = '$id'";
				  $result = mysqli_query($link, $sql);
				  while($data = mysqli_fetch_array($result)){
				  ?>
                    <tr>
                      <td><?php echo $data['subject']; ?></td>
                      <td><?php echo $data['max_score']; ?></td>
                      <td><?php echo $data['score']; ?></td>
                      <td><?php echo $data['class']; ?></td>
                      <td><?php echo $data['year']; ?></td>
                      <td>

                      <a href="<?php echo "del_onet.php?id={$data['id']}"; ?>" class="btn red-mint btn-xs sbold uppercase" data-toggle='confirmation' data-original-title='ยืนยันการลบ' title=''> <i class="fa fa-close"></i> ลบ </a></td>
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
<script src="../assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
<script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<script src="../assets/pages/scripts/ui-confirmations.min.js" type="text/javascript"></script> 
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
  <?php include('template_3.php'); ?>