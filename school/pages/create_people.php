<?php
session_start();
ob_start();
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>เพิ่ม - บุคลากร</title>
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
            <div class="caption"> <i class="fa fa-gift"></i>เพิ่มบุคลากร </div>
            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
          </div>
          <div class="portlet-body form"> 
            <!-- BEGIN FORM-->
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-body">
              <div class="form-group">
                  <label class="col-md-3 control-label">รหัสบุคลากร</label>
                  <div class="col-md-4">
                    <input type="text" name="personnel_id" class="form-control input-circle" placeholder="ระบุรหัสบุคลากร" maxlength="20" OnKeyPress="return chkNumber(this)" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">คำนำหน้า</label>
                  <div class="col-md-4">
                    <select name="sub_name" class="form-control input-circle">
                    	<option value="นาย">นาย</option>
                        <option value="นาง">นาง</option>
                        <option value="นางสาว">นางสาว</option>
                        <option value="ศาสตราจารย์">ศาสตราจารย์</option>
                        <option value="ผู้ช่วยศาสตร์ตราจารย์">ผู้ช่วยศาสตร์ตราจารย์</option>
                        <option value="รองศาสตราจารย์">รองศาสตราจารย์</option>
                        <option value="หม่อมหลวง">หม่อมหลวง</option>
                        <option value="หม่อมราชวงค์">หม่อมราชวงค์</option>
                        <option value="หม่อมเจ้า">หม่อมเจ้า</option>
                    </select>
                </div></div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ(ภาษาไทย)</label>
                  <div class="col-md-4">
                    <input type="text" name="first_name_th" class="form-control input-circle" placeholder="ระบุชื่อเป็นภาษาไทย" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล(ภาษาไทย)</label>
                  <div class="col-md-4">
                    <input type="text" name="last_name_th" class="form-control input-circle" placeholder="ระบุนามสกุลเป็นภาษาไทย" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ(ภาษาอังกฤษ)</label>
                  <div class="col-md-4">
                    <input type="text" name="first_name_en" class="form-control input-circle" placeholder="ระบุชื่อเป็นภาษาอังกฤษ" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล(ภาษาอังกฤษ)</label>
                  <div class="col-md-4">
                    <input type="text" name="last_name_en" class="form-control input-circle" placeholder="ระบุนามสกุลเป็นภาษาอังกฤษ" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เพศ</label>
                  <div class="col-md-4">
                  <select name="gender" class="form-control input-circle">
                  <option value="ชาย">ชาย</option>
                  <option value="หญิง">หญิง</option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">วันเกิด</label>
                  <div class="col-md-4">
                    <input type="text" name="birthday_at" class="form-control input-circle" id="dp" placeholder="ระบุวันเกิด" required>
                    <input type="hidden" name="school_id" value="<?php echo $_SESSION['school_id']; ?>" class="form-control input-circle">
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ประเภทบุคลากร</label>
                  <div class="col-md-4">
                    <select name="type_personnel" class="form-control input-circle">
                    <option value="ผู้บริหาร">ผู้บริหาร</option>
                    <option value="ครู">ครู</option>
                    <option value="บุคลากรที่ไม่ใช้ครู">บุคลากรที่ไม่ใช้ครู</option>
                    </select>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ตำแหน่ง</label>
                  <div class="col-md-4">
                    <select name="position" class="form-control input-circle">
                    <option value="ผู้อำนวยการ">ผู้อำนวยการ</option>
                    <option value="รองผู้อำนวยการ">รองผู้อำนวยการ</option>
                    <option value="ครูใหญ่">ครูใหญ่</option>
                    <option value="หัวหน้าครู">หัวหน้าครู</option>
                    <option value="ครูอัตราจ้าง">ครูอัตราจ้าง</option>
                    </select>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">วิทยฐานะ</label>
                  <div class="col-md-4">
                    <select name="academic_standing" class="form-control input-circle">
                    <option value="ผู้ช่วย">ผู้ช่วย</option>
                    <option value="ชำนาญการ">ชำนาญการ</option>
                    <option value="ชำนาญการพิเศษ">ชำนาญการพิเศษ</option>
                    <option value="เชี่ยวชาญพิเศษ">เชี่ยวชาญพิเศษ</option>
                    </select>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เลขที่ตำแหน่ง</label>
                  <div class="col-md-4">
                    <input type="text" name="position_id" class="form-control input-circle" placeholder="ระบุเลขตำแหน่ง" maxlength="20" OnKeyPress="return chkNumber(this)" required>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">วุฒิการศึกษาสูงสุด</label>
                  <div class="col-md-4">
                    <select name="graduated" class="form-control input-circle">
                    <option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
                    <option value="ประกาศนียบัตรวิชาชีพ">ประกาศนียบัตรวิชาชีพ</option>
                    <option value="ประกาศนียบัตรวิชาชีพชั้นสูง">ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                    <option value="ปริญญาตรี">ปริญญาตรี</option>
                    <option value="ปริญญาโท<">ปริญญาโท</option>
                    <option value="ปริญญาเอก<">ปริญญาเอก</option>
                    </select>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">วิชาเอก</label>
                  <div class="col-md-4">
                    <input type="text" name="graduated_major" class="form-control input-circle" placeholder="ระบุวิชาเอก" maxlength="100">
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">วันเดือนปีที่บรรจุ</label>
                  <div class="col-md-4">
                    <input type="text" name="position_at" class="form-control input-circle" id="dp2" placeholder="ระบุวันเดือนปีที่บรรจุ">
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เลขประจำตัวประชาชน</label>
                  <div class="col-md-4">
                    <input type="text" name="id_card" class="form-control input-circle" placeholder="ระบุหมายเลขประจำตัวประชาชน" maxlength="13" OnKeyPress="return chkNumber(this)" required>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">หมายเลขโทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="text" name="tel" class="form-control input-circle" placeholder="ระบุหมายเลขโทรศัพท์" maxlength="10" OnKeyPress="return chkNumber(this)" required>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">งานพิเศษอื่นๆ</label>
                  <div class="col-md-4">
                    <textarea name="extra_work" class="form-control input-circle"></textarea>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เงินเดือน</label>
                  <div class="col-md-4">
                    <input type="text" name="salary" class="form-control input-circle" placeholder="ระบุเงินเดือน (บาท/เดือน)" maxlength="10"  OnKeyPress="return chkNumber(this)">
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ความชำนาญพิเศษ</label>
                  <div class="col-md-4">
                    <textarea name="special_expertise" class="form-control input-circle"></textarea>
                </div> 
                </div>
                <?php
						if($_SESSION['role'] == "administration"){
							echo "<div class='form-group'>" . 
							"<label class='col-md-3 control-label'>" . "ประจำอยู่ชั้น" . "</label>" .
							"<div class='col-md-4'>" . 
							"<input type='text' name='class' class='form-control input-circle' placeholder='ระบุชั้น เช่น ป.1 ม.6 เป็นต้น (ถ้ามี)'>" .
							"</div>" . 
							"</div>";
							echo "<div class='form-group'>" . 
							"<label class='col-md-3 control-label'>" . "ห้อง" . "</label>" .
							"<div class='col-md-4'>" . 
							"<input type='text' name='room' class='form-control input-circle' placeholder='ระบุห้อง เช่น 1 2 3 4 เป็นต้น (ถ้ามี)'>" .
							"</div>" . 
							"</div>";
						}
						?>
              <div class="form-group">
                  <label class="col-md-3 control-label">รูปภาพ</label>
                  <div class="col-md-4">
                    <input type="file" name="photo">
                </div>
                </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" name="insert" class="btn btn-circle green">เพิ่ม</button>
                    <a href="schools.php"><button type="reset" class="btn btn-circle grey-salsa btn-outline">ยกเลิก</button></a>
                  </div>
                </div>
              </div>
            </form>
<?php
	include('mysql_connect.php');
	
	
	if(isset($_POST['insert'])){
		if(is_uploaded_file($_FILES['photo']['tmp_name'])){
			$ext = pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);
			$filename = "photo/" . $_POST['id_card'] . "." . $ext;
		} else {
			$filename = "";
		}
		$personnel = "'" . $_POST['id_card'] . "',";
		$personnel .= "'" . $_POST['personnel_id'] . "',";
		$personnel .= "'" . $_POST['sub_name'] . "',";
		$personnel .= "'" . $_POST['first_name_th'] . "',";
		$personnel .= "'" . $_POST['last_name_th'] . "',";
		$personnel .= "'" . $_POST['first_name_en'] . "',";
		$personnel .= "'" . $_POST['last_name_en'] . "',";
		$personnel .= "'" . $_POST['gender'] . "',";
		$personnel .= "'" . $_POST['birthday_at'] . "',";
		$personnel .= "'" . $_POST['school_id'] . "',";
		$personnel .= "'" . $_POST['type_personnel'] . "',";
		$personnel .= "'" . $_POST['position'] . "',";
		$personnel .= "'" . $_POST['academic_standing'] . "',";
		$personnel .= "'" . $_POST['position_id'] . "',";
		$personnel .= "'" . $_POST['graduated'] . "',";
		$personnel .= "'" . $_POST['graduated_major'] . "',";
		$personnel .= "'" . $_POST['position_at'] . "',";
		$personnel .= "'" . $_POST['tel'] . "',";
		$personnel .= "'" . $_POST['extra_work'] . "',";
		$personnel .= "'" . $_POST['salary'] . "',";
		$personnel .= "'" . $_POST['special_expertise'] . "',";
		$personnel .= "'" . $_POST['class'] . "',";
		$personnel .= "'" . $_POST['room'] . "',";
		$personnel .= "'" . $filename . "'";
		
		
		$sql = "INSERT INTO personnel (id_card, personnel_id, sub_name, first_name_th, last_name_th, first_name_en, last_name_en, gender, birthday_at, school_id, type_personnel, position, academic_standing, position_id, graduated, graduated_major, position_at, tel, extra_work, salary, special_expertise, class, room, photo)values($personnel)";
		$result = mysqli_query($link, $sql);
		move_uploaded_file($_FILES['photo']['tmp_name'],$filename);
		header('refresh: 1;url=people.php');
	}
	
	mysqli_close($link);
?>
            <!-- END FORM--> 
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
	$('#dp, #dp2').datepicker();
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