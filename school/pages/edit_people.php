<?php
session_start();
ob_start();
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>ปรับปรุง บุคลากร</title>
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
<?php include('template_2.php'); ?>
  <!-- BODY -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="row">
        <div class="portlet box green">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-gift"></i>แก้ไขบุคลากร </div>
            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
          </div>
          <div class="portlet-body form"> 
          <?php
		  	include('mysql_connect.php');
		  	$id = $_GET['id'];
			$sql = "SELECT * FROM personnel WHERE id_card = '$id'";
			$result = mysqli_query($link, $sql);
			$data = mysqli_fetch_array($result);
		  ?>
            <!-- BEGIN FORM-->
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-body">
              <div class="form-group">
                  <label class="col-md-3 control-label">รหัสบุคลากร</label>
                  <div class="col-md-4">
                    <input type="text" name="personnel_id" class="form-control input-circle" placeholder="ระบุรหัสบุคลากร" value="<?php echo $data['personnel_id']; ?>" maxlength="20">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">คำนำหน้า</label>
                  <div class="col-md-4">
                    <select name="sub_name" class="form-control input-circle">
                    	<option value="นาย" <?php if($data['sub_name'] == "นาย") echo "selected"; ?>>นาย</option>
                        <option value="นาง" <?php if($data['sub_name'] == "นาง") echo "selected"; ?>>นาง</option>
                        <option value="นางสาว" <?php if($data['sub_name'] == "นางสาว") echo "selected"; ?>>นางสาว</option>
                        <option value="ศาสตราจารย์" <?php if($data['sub_name'] == "ศาสตราจารย์") echo "selected"; ?>>ศาสตราจารย์</option>
                        <option value="ผู้ช่วยศาสตร์ตราจารย์" <?php if($data['sub_name'] == "ผู้ช่วยศาสตร์ตราจารย์") echo "selected"; ?>>ผู้ช่วยศาสตร์ตราจารย์</option>
                        <option value="รองศาสตราจารย์" <?php if($data['sub_name'] == "รองศาสตราจารย์") echo "selected"; ?>>รองศาสตราจารย์</option>
                        <option value="หม่อมหลวง" <?php if($data['sub_name'] == "หม่อมหลวง") echo "selected"; ?>>หม่อมหลวง</option>
                        <option value="หม่อมราชวงค์" <?php if($data['sub_name'] == "หม่อมราชวงค์") echo "selected"; ?>>หม่อมราชวงค์</option>
                        <option value="หม่อมเจ้า" <?php if($data['sub_name'] == "หม่อมเจ้า") echo "selected"; ?>>หม่อมเจ้า</option>
                    </select>
                </div></div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ(ภาษาไทย)</label>
                  <div class="col-md-4">
                    <input type="text" name="first_name_th" class="form-control input-circle" placeholder="ระบุชื่อเป็นภาษาไทย" value="<?php echo $data['first_name_th']; ?>" maxlength="100">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล(ภาษาไทย)</label>
                  <div class="col-md-4">
                    <input type="text" name="last_name_th" class="form-control input-circle" placeholder="ระบุนามสกุลเป็นภาษาไทย" value="<?php echo $data['last_name_th']; ?>" maxlength="100">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ(ภาษาอังกฤษ)</label>
                  <div class="col-md-4">
                    <input type="text" name="first_name_en" class="form-control input-circle" placeholder="ระบุชื่อเป็นภาษาอังกฤษ" value="<?php echo $data['first_name_en']; ?>" maxlength="100">
                 </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล(ภาษาอังกฤษ)</label>
                  <div class="col-md-4">
                    <input type="text" name="last_name_en" class="form-control input-circle" placeholder="ระบุนามสกุลเป็นภาษาอังกฤษ" value="<?php echo $data['last_name_en']; ?>" maxlength="100">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เพศ</label>
                  <div class="col-md-4">
                  <select name="gender" class="form-control input-circle">
                  <option value="ชาย" <?php if($data['gender'] == "ชาย") echo "selected"; ?>>ชาย</option>
                  <option value="หญิง" <?php if($data['gender'] == "หญิง") echo "selected"; ?>>หญิง</option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">วันเกิด</label>
                  <div class="col-md-4">
                    <input type="text" name="birthday_at" class="form-control input-circle" id="dp" placeholder="ระบุวันเกิด" value="<?php echo $data['birthday_at']; ?>">
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ประเภทบุคลากร</label>
                  <div class="col-md-4">
                    <select name="type_personnel" class="form-control input-circle">
                    <option value="ผู้บริหาร" <?php if($data['type_personnel'] == "ผู้บริหาร") echo "selected"; ?>>ผู้บริหาร</option>
                    <option value="ครู" <?php if($data['type_personnel'] == "ครู") echo "selected"; ?>>ครู</option>
                    <option value="บุคลากรที่ไม่ใช้ครู" <?php if($data['type_personnel'] == "บุคลากรที่ไม่ใช้ครู") echo "selected"; ?>>บุคลากรที่ไม่ใช้ครู</option>
                    </select>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ตำแหน่ง</label>
                  <div class="col-md-4">
                    <select name="position" class="form-control input-circle" name="role">
                	<option value="ผู้อำนวยการ" <?php if($data['position'] == "ผู้อำนวยการ") echo "selected"; ?>>ผู้อำนวยการ</option>
                    <option value="รองผู้อำนวยการ" <?php if($data['position'] == "รองผู้อำนวยการ") echo "selected"; ?>>รองผู้อำนวยการ</option>
                    <option value="หัวหน้า" <?php if($data['position'] == "หัวหน้า") echo "selected"; ?>>หัวหน้า</option>
                    <option value="ครู" <?php if($data['position'] == "ครู") echo "selected"; ?>>ครู</option>
                    <option value="ธุรการ" <?php if($data['position'] == "ธุรการ") echo "selected"; ?>>ธุรการ</option>
                </select>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">วิทยฐานะ</label>
                  <div class="col-md-4">
                    <select name="academic_standing" class="form-control input-circle">
                    <option value="ผู้ช่วย" <?php if($data['academic_standing'] == "ผู้ช่วย") echo "selected"; ?>>ผู้ช่วย</option>
                    <option value="ชำนาญการ" <?php if($data['academic_standing'] == "ชำนาญการ") echo "selected"; ?>>ชำนาญการ</option>
                    <option value="ชำนาญการพิเศษ" <?php if($data['academic_standing'] == "ชำนาญการพิเศษ") echo "selected"; ?>>ชำนาญการพิเศษ</option>
                    <option value="เชี่ยวชาญพิเศษ" <?php if($data['academic_standing'] == "เชี่ยวชาญพิเศษ") echo "selected"; ?>>เชี่ยวชาญพิเศษ</option>
                    </select>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เลขที่ตำแหน่ง</label>
                  <div class="col-md-4">
                    <input type="text" name="position_id" class="form-control input-circle" placeholder="ระบุเลขตำแหน่ง" maxlength="20" value="<?php echo $data['position_id']; ?>">
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">วุฒิการศึกษาสูงสุด</label>
                  <div class="col-md-4">
                    <select name="graduated" class="form-control input-circle">
                    <option value="มัธยมศึกษาตอนปลาย" <?php if($data['graduated'] == "มัธยมศึกษาตอนปลาย") echo "selected"; ?>>มัธยมศึกษาตอนปลาย</option>
                    <option value="ประกาศนียบัตรวิชาชีพ" <?php if($data['graduated'] == "ประกาศนียบัตรวิชาชีพ") echo "selected"; ?>>ประกาศนียบัตรวิชาชีพ</option>
                    <option value="ประกาศนียบัตรวิชาชีพชั้นสูง" <?php if($data['graduated'] == "ประกาศนียบัตรวิชาชีพชั้นสูง") echo "selected"; ?>>ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                    <option value="ปริญญาตรี" <?php if($data['graduated'] == "ปริญญาตรี") echo "selected"; ?>>ปริญญาตรี</option>
                    <option value="ปริญญาโท<" <?php if($data['graduated'] == "ปริญญาโท") echo "selected"; ?>>ปริญญาโท</option>
                    <option value="ปริญญาเอก<" <?php if($data['graduated'] == "ปริญญาเอก") echo "selected"; ?>>ปริญญาเอก</option>
                    </select>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">วิชาเอก</label>
                  <div class="col-md-4">
                    <input type="text" name="graduated_major" class="form-control input-circle" placeholder="ระบุวิชาเอก" maxlength="100" value="<?php echo $data['graduated_major']; ?>">
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">วันเดือนปีที่บรรจุ</label>
                  <div class="col-md-4">
                    <input type="text" name="position_at" class="form-control input-circle" id="dp2" placeholder="ระบุวันเดือนปีที่บรรจุ" value="<?php echo $data['position_at']; ?>">
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">หมายเลขโทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="text" name="tel" class="form-control input-circle" placeholder="ระบุหมายเลขโทรศัพท์" maxlength="10" value="<?php echo $data['tel']; ?>">
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">งานพิเศษอื่นๆ</label>
                  <div class="col-md-4">
                    <textarea name="extra_work" class="form-control input-circle"><?php echo $data['extra_work']; ?></textarea>
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เงินเดือน</label>
                  <div class="col-md-4">
                    <input type="text" name="salary" class="form-control input-circle" placeholder="ระบุเงินเดือน (บาท/เดือน)" maxlength="10" value="<?php echo $data['salary']; ?>">
                </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ความชำนาญพิเศษ</label>
                  <div class="col-md-4">
                    <textarea name="special_expertise" class="form-control input-circle"><?php echo $data['special_expertise']; ?></textarea>
                </div> 
                </div>
                <?php
						if($_SESSION['role'] == "administration"){
							echo "<div class='form-group'>" . 
							"<label class='col-md-3 control-label'>" . "ประจำอยู่ชั้น" . "</label>" .
							"<div class='col-md-4'>" . 
							"<input type='text' name='class' class='form-control input-circle' value='" . $data['class'] . "' placeholder='ระบุชั้น เช่น ป.1 ม.6 เป็นต้น (ถ้ามี)'>" .
							"</div>" . 
							"</div>";
							
							echo "<div class='form-group'>" . 
							"<label class='col-md-3 control-label'>" . "ห้อง" . "</label>" .
							"<div class='col-md-4'>" . 
							"<input type='text' name='room' class='form-control input-circle' value='" . $data['room'] . "' placeholder='ระบุห้อง เช่น 1 2 3 4 เป็นต้น (ถ้ามี)'>" .
							"</div>" . 
							"</div>";
						} else {
							echo "<input type='hidden' name='room' value='{$data['room']}'>";
							echo "<input type='hidden' name='class' value='{$data['class']}'>";
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
                    <button type="submit" name="insert" class="btn btn-circle green">ปรับปรุง</button>
                    <button type="reset" class="btn btn-circle grey-salsa btn-outline">ยกเลิก</button>
                  </div>
                </div>
              </div>
            </form>
<?php
	$sql = "select * from school";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_array($result);
	
	if(isset($_POST['insert'])){
		if(is_uploaded_file($_FILES['photo']['tmp_name'])){
			$ext = pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);
			$filename = "photo/" . $id . "." . $ext;
		} else {
			$filename = $data['logo'];
		}
		$personnel_id = $_POST['personnel_id'];
		$sub_name = $_POST['sub_name'];
		$first_name_th = $_POST['first_name_th'];
		$last_name_th = $_POST['last_name_th'];
		$first_name_en = $_POST['first_name_en'];
		$last_name_en = $_POST['last_name_en'];
		$gender = $_POST['gender'];
		$birthday_at = $_POST['birthday_at'];
		$type_personnel = $_POST['type_personnel'];
		$position = $_POST['position'];
		$academic_standing = $_POST['academic_standing'];
		$position_id = $_POST['position_id'];
		$graduated = $_POST['graduated'];
		$graduated_major = $_POST['graduated_major'];
		$position_at = $_POST['position_at'];
		$tel = $_POST['tel'];
		$extra_work = $_POST['extra_work'];
		$salary = $_POST['salary'];
		$special_expertise = $_POST['special_expertise'];
		$class = $_POST['class'];
		$room = $_POST['room'];
		
		
		$sql = "UPDATE personnel SET personnel_id = '$personnel_id', sub_name = '$sub_name', first_name_th = '$first_name_th', last_name_th = '$last_name_th', first_name_en = '$first_name_en', last_name_en = '$last_name_en', gender = '$gender', birthday_at = '$birthday_at', type_personnel = '$type_personnel', position = '$position', academic_standing = '$academic_standing', position_id = '$position_id', graduated = '$graduated', graduated_major = '$graduated_major', position_at = '$position_at', tel = '$tel', extra_work = '$extra_work', salary = '$salary', special_expertise = '$special_expertise', class = '$class', room = '$room', photo = '$filename' WHERE id_card = '" . $id . "'";
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