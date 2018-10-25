<?php
session_start();
ob_start();
error_reporting( error_reporting() & ~E_NOTICE );
include('autoload.php');
include('mysql_connect.php');
$id = $_GET['id'];
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>เพิ่ม - เกรด</title>
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
<link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
<script src="jquery.min.js"></script>
<script>
$(function(){
	$('#province').change(function(){
		var pid = $(this).val();
		$.get('show-amphur.php', {pvid: pid}, function(data){
			$('#amphur').children().remove().end();
			$('#amphur').children().end().append(data);
			$('#amphur').removeAttr('disabled');
		});
	});
	
	$('#province2').change(function(){
		var pid = $(this).val();
		$.get('show-amphur.php', {pvid: pid}, function(data){
			$('#amphur2').children().remove().end();
			$('#amphur2').children().end().append(data);
			$('#amphur2').removeAttr('disabled');
		});
	});
});
</script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL STYLES -->
<link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN THEME LAYOUT STYLES -->
<link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->

<link rel="shortcut icon" href="favicon.ico" />
<!-- END SCRIPT TOP -->

<!-- ตรวจสอบแป้นพิมพ์ให้พิมพ์ได้เฉพาะตัวเลขเท่านั้น -->
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
        <div class="col-md-12">
          <div class="portlet light portlet-fit ">
            <div class="portlet-title">
              <div class="caption"> <i class="icon-wrench font-green-meadow"></i> <span class="caption-subject font-green-meadow sbold uppercase"> เกรดแต่ละวิชา </span> </div>
              <div class="actions"> <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a> </div>
            </div>
            <div class="portlet-body">
            <!-- BEGIN TAB 2 -->
<div class="portlet-body">
	<div class="form-body">
<?php
$general = $_POST['general'];
if(isset($general)){
	
	//ตัวแปรรับค่ากรณี OR FALSE
	$SubJect = $_COOKIE['SubJect'] = $_POST['subject'];
	if(empty($SubJect)){
		$FORM = "<li>" . "กรุณากรอกชื่อวิชา" . "</li>";
		$SubJect_VALIDATION = "กรุณากรอกชื่อวิชา";
		$VALIDATION_SubJect = FALSE;
	} else {
		$VALIDATION_SubJect = TRUE;
	}//รับค่า ชื่อวิชา
	$Unit = $_COOKIE['Unit'] = $_POST['unit'];
	if(empty($Unit)){
		$FORM .= "<li>" . "กรุณากรอกหน่วยกิต" . "</li>";
		$Unit_VALIDATION = "กรุณากรอกหน่วยกิต";
		$VALIDATION_Unit = FALSE;
	} else {
		$VALIDATION_Unit = TRUE;
	}//รับค่า หน่วยกิต
	$Term = $_COOKIE['Term'] = $_POST['term'];
	if(empty($Term)){
		$FORM .= "<li>" . "กรุณากรอกเทอม" . "</li>";
		$Term_VALIDATION = "กรุณากรอกเทอม";
		$VALIDATION_Term = FALSE;
	} else {
		$VALIDATION_Term = TRUE;
	}//รับค่า เทอม
	$Year = $_COOKIE['Year'] = $_POST['year'];
	if(empty($Year)){
		$FORM .= "<li>" . "กรุณากรอกปีการศึกษา" . "</li>";
		$Year_VALIDATION = "กรุณากรอกปีการศึกษา";
		$VALIDATION_Year = FALSE;
	} else {
		$VALIDATION_Year = TRUE;
	}//รับค่า ปี
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
	$Grade = $_COOKIE['Grade'] = $_POST['grade'];
	if(empty($Grade)){
		$FORM .= "<li>" . "กรุณากรอกเกรด" . "</li>";
		$Grade_VALIDATION = "กรุณากรอกเกรด";
		$VALIDATION_Grade = FALSE;
	} else {
		$VALIDATION_Grade = TRUE;
	}//รับค่า เกรด
	
	$sql = "SELECT subject, term, year, id_card, school_id FROM grade WHERE id_card = '$id' and school_id = '$_SESSION[school_id]' and subject = '" . $SubJect . "' and term = '" . $Term . "' and year = '" . $Year . "' and class = '" . $_SESSION['class'] . "' and room = '" . $_SESSION['room'] . "'";
	$result = mysqli_query($link, $sql);
	$num = mysqli_num_rows($result);
	if($num == 1){
		$FORM .= "<li>" . "วิชา" . $SubJect . " เทอม " . $Term . " ปีการศึกษา " . $Year . " มีอยู่ในระบบแล้ว" . "</li>";
		$ALL_TRUE = FALSE;
	} else {
		$ALL_TRUE = TRUE;
	}
	
	$VALIDATION_FALSE = $VALIDATION_SubJect == FALSE || $VALIDATION_Unit == FALSE || $VALIDATION_Term == FALSE || $VALIDATION_Year == FALSE || $VALIDATION_MaxScore == FALSE || $VALIDATION_Score == FALSE || $VALIDATION_Grade == FALSE || $ALL_TRUE == FALSE;
	
	$VALIDATION_TRUE =  $VALIDATION_SubJect == TRUE &&  $VALIDATION_Unit == TRUE && $VALIDATION_Term == TRUE && $VALIDATION_Year == TRUE && $VALIDATION_MaxScore == TRUE && $VALIDATION_Score == TRUE && $VALIDATION_Grade == TRUE && $ALL_TRUE == TRUE;
	
	if($VALIDATION_FALSE){
		echo "<div class='alert alert-danger'>";
		echo "<button class='close' data-close='alert'></button>";
		echo "<ul>เกิดข้อผิดผลาด";
		echo $FORM;
		echo "</ul>";
		echo "</div>";
	} else if($VALIDATION_TRUE) {
		
		$data ="'" . $SubJect . "',";
		$data .= "'" . $Unit . "',";
		$data .= "'" . $Term . "',";
		$data .= "'" . $Year . "',";
		$data .= "'" . $MaxScore . "',";
		$data .= "'" . $Score . "',";
		$data .= "'" . $Grade . "',";
		$data .= "'" . $Unit * $Grade . "',";
		$data .= "'" . $_SESSION['class'] . "',";
		$data .= "'" . $_SESSION['room'] . "',";
		$data .= "'" . $id . "',";
		$data .= "'" . $_SESSION['school_id'] . "'";
		
		$sql = "INSERT INTO grade (subject, unit, term, year, max_score, score, grade, sud, class, room, id_card, school_id) VALUES (" . $data . ")";
		$result = mysqli_query($link, $sql);
		
		$sql = "SELECT average FROM average WHERE school_id = '$_SESSION[school_id]' and id_card = '$id'";
		$result = mysqli_query($link, $sql);
		$data = mysqli_fetch_assoc($result);
		
		if(empty($data['average'])){
			$grade_sql = "SELECT id, SUM(unit) AS UNIT, SUM(sud) AS SUD FROM grade WHERE id_card = '$id' and school_id = '$_SESSION[school_id]' and term = '$Term' and year = '$Year'";
			$result_sql = mysqli_query($link, $grade_sql);
			$dataG = mysqli_fetch_assoc($result_sql);
			
			$data = "'" . @($dataG['SUD'] / $dataG['UNIT']) . "',";
			$data .= "'" . $Term . "',";
			$data .= "'" . $Year . "',";
			$data .= "'" . $id . "',";
			$data .= "'" . $_SESSION['school_id'] . "'";
			
			$sql = "INSERT INTO average (average, term, year, id_card, school_id)VALUES($data)";
			$result = mysqli_query($link, $sql);
		} else {
			$grade_sql = "SELECT SUM(unit) AS UNIT, SUM(sud) AS SUD FROM grade WHERE id_card = '$id' and school_id = '$_SESSION[school_id]' and term = '$Term' and year = '$Year'";
			$result_sql = mysqli_query($link, $grade_sql);
			$dataG = mysqli_fetch_assoc($result_sql);
			$SUM = @($dataG['SUD'] / $dataG['UNIT']);
			
			$sql = "UPDATE average SET average = '" . $SUM . "' WHERE id_card = '$id' and term = '$Term' and year = '$Year'";
			$result = mysqli_query($link, $sql);
		}
		
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
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรอกชื่อวิชา" value="<?php echo $SubJect; ?>" name="subject" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $SubJect_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">หน่วยกิต
        <span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="กรอกหน่วยกิต" name="unit" maxlength="1" value="<?php echo $Unit; ?>" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Unit_VALIDATION . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เทอม
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Term; ?>" placeholder="กรุณากรอกเทอม" name="term" maxlength="1" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Term_VALIDATION . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ปีการศึกษา
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $Year; ?>" placeholder="กรอกปีการศึกษา" name="year" maxlength="4" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Year_VALIDATION . "</span>"; ?>
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
		<label class="col-md-3 control-label raya" for="form_control_1">เกรด
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" name="grade" value="<?php echo $Grade; ?>" placeholder="กรอกเกรด" name="year" maxlength="4" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $Grade_VALIDATION . "</span>"; ?>
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
              <hr>
              <div class="table-scrollable table-scrollable-borderless">
                <table class="table table-hover table-light">
                  <thead>
                    <tr class="uppercase">
                      <th> ชื่อวิชา</th>
                      <th> เทอม</th>
                      <th> เกรด</th>
                      <th width="20%"> ควบคุม</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				  $sql = "SELECT year FROM grade WHERE school_id = '$_SESSION[school_id]' and id_card = '$id' ORDER BY year DESC limit 1";
				  $result = mysqli_query($link, $sql);
				  $pee = mysqli_fetch_assoc($result);
				  
				  $sql = "SELECT term FROM grade WHERE school_id = '$_SESSION[school_id]' and id_card = '$id' and year = '$pee[year]' ORDER BY term DESC limit 1";
				  $result = mysqli_query($link, $sql);
				  $t = mysqli_fetch_assoc($result);
				  
				  $sql = "SELECT * FROM grade WHERE id_card = '$id' and school_id = '$_SESSION[school_id]' and year = '$pee[year]' and term = '$t[term]' and class = '$_SESSION[class]' and room = '$_SESSION[room]'";
				  $result = mysqli_query($link, $sql);
				  while($data = mysqli_fetch_array($result)){
				  ?>
                    <tr>
                      <td><?php echo $data['subject']; ?></td>
                      <td><?php echo $data['term']; ?></td>
                      <td><?php echo $data['grade']; ?></td>
                      <td><a href="<?php echo "del_grade.php?id={$data['id']}"?>" class="btn red-mint btn-xs sbold uppercase" data-toggle='confirmation' data-original-title='ยืนยันการลบ' title=''> <i class="fa fa-close"></i> ลบ </a></td>
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
    </div>
  </div>
  <!-- BODY --> 
  
  <!-- JAVA --> 
  <!-- SCRIPT FOOTER -->
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