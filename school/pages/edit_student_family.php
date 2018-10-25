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
<?php
include('mysql_connect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM studentfamily WHERE id_card = '$id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result);
?>
<?php include('template_2.php'); ?>
  <!-- BODY -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="row">
        <div class="portlet box green">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-gift"></i>แก้ไขข้อมูลผู้ปกครอง </div>
            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
          </div>
          <div class="portlet-body form"> 
            <!-- BEGIN FORM-->
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-body">
              <div class="form-group">
                  <label class="col-md-3 control-label">สถานะบิดามารดา </label>
                  <div class="col-md-4">
                    <select name="place" class="form-control input-circle">
                    	<option value="อยู่ด้วยกัน" <?php if($data['place'] == "อยู่ด้วยกัน") echo "selected"; ?>>อยู่ด้วยกัน</option>
                        <option value="แยกกันอยู่" <?php if($data['place'] == "แยกกันอยู่") echo "selected"; ?>>แยกกันอยู่</option>
                        <option value="บิดาถึงแก่กรรม" <?php if($data['place'] == "บิดาถึงแก่กรรม") echo "selected"; ?>>บิดาถึงแก่กรรม</option>
                        <option value="มารดาถึงแก่กรรม" <?php if($data['place'] == "มารดาถึงแก่กรรม") echo "selected"; ?>>มารดาถึงแก่กรรม</option>
                        <option value="บิดาและมารดาถึงแก่กรรม" <?php if($data['place'] == "บิดาและมารดาถึงแก่กรรม") echo "selected"; ?>>บิดาและมารดาถึงแก่กรรม</option>
                        <option value="มารดาแต่งงานใหม่" <?php if($data['place'] == "มารดาแต่งงานใหม่") echo "selected"; ?>>มารดาแต่งงานใหม่</option>
                        <option value="บิดาและมารถดาแต่งงานใหม่" <?php if($data['place'] == "บิดาและมารถดาแต่งงานใหม่") echo "selected"; ?>>บิดาและมารถดาแต่งงานใหม่</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">มีพี่ชาย</label>
                  <div class="col-md-4">
                    <input type="text" name="old_brother" class="form-control input-circle" placeholder="ระบุจำนวนพี่ชาย" value="<?php echo $data['old_brother']; ?>" maxlength="3" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">มีน้องชาย</label>
                  <div class="col-md-4">
                    <input type="text" name="young_brother" class="form-control input-circle" placeholder="ระบุจำนวนน้องชาย" value="<?php echo $data['young_brother']; ?>" maxlength="3" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">มีพี่สาว</label>
                  <div class="col-md-4">
                    <input type="text" name="old_sister" class="form-control input-circle" placeholder="ระบุจำนวนพี่สาว" value="<?php echo $data['old_sister']; ?>" maxlength="3" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">มีน้องสาว</label>
                  <div class="col-md-4">
                    <input type="text" name="young_sister" class="form-control input-circle" placeholder="ระบุจำนวนน้องสาว" value="<?php echo $data['young_sister']; ?>" maxlength="3" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ตนเองเป็นบุตรคนที่</label>
                  <div class="col-md-4">
                    <input type="text" name="num_bud" class="form-control input-circle" value="<?php echo $data['num_bud']; ?>" placeholder="ระบุเป็นตัวเลขว่าตนเองเป็นบุตรคนที่เท่าไหร่" maxlength="3" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div><br><br>
                <span style="font-size:24px;margin-left: 150px;">ข้อมูลบิดา</span>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัสบัตรประชาชน</label>
                  <div class="col-md-4">
                    <input type="text" name="father_id_card" class="form-control input-circle" placeholder="ระบุเลขบัตรประชาชน" value="<?php echo $data['father_id_card']; ?>" maxlength="13" OnKeyPress="return chkNumber(this)">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ประเภทบัตร</label>
                  <div class="col-md-4">
                    <input type="text" name="father_type_card" class="form-control input-circle" placeholder="ระบุประเภทบัตร" value="<?php echo $data['father_type_card']; ?>" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ</label>
                  <div class="col-md-4">
                    <input type="text" name="father_first" class="form-control input-circle" placeholder="ระบุชื่อบิดา" value="<?php echo $data['father_first']; ?>" maxlength="200" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล</label>
                  <div class="col-md-4">
                    <input type="text" name="father_last" class="form-control input-circle" placeholder="ระบุนามสกุลบิดา" value="<?php echo $data['father_last']; ?>" maxlength="200" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">กลุ่มเลือด </label>
                  <div class="col-md-4">
                    <select name="father_group_blood" class="form-control input-circle">
                    	<option value="O" <?php if($data['father_group_blood'] == "O") echo "selected"; ?>>O</option>
                        <option value="A" <?php if($data['father_group_blood'] == "A") echo "selected"; ?>>A</option>
                        <option value="B" <?php if($data['father_group_blood'] == "B") echo "selected"; ?>>B</option>
                        <option value="AB" <?php if($data['father_group_blood'] == "AB") echo "selected"; ?>>AB</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เงินเดือน</label>
                  <div class="col-md-4">
                    <input type="text" name="father_salary" class="form-control input-circle" placeholder="ระบุเงินเดือน" value="<?php echo $data['father_salary']; ?>" OnKeyPress="return chkNumber(this)" maxlength="20" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="text" name="father_tel" class="form-control input-circle" placeholder="ระบุเบอร์โทรศัพท์" value="<?php echo $data['father_tel']; ?>" OnKeyPress="return chkNumber(this)" maxlength="10" required>
                </div>
                </div><br><br>
                <span style="font-size:24px;margin-left: 150px;">ข้อมูลมารดา</span>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัสบัตรประชาชน</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_id_card" class="form-control input-circle" placeholder="ระบุเลขบัตรประชาชน" value="<?php echo $data['mather_id_card']; ?>" maxlength="13" OnKeyPress="return chkNumber(this)">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ประเภทบัตร</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_type_card" class="form-control input-circle" placeholder="ระบุประเภทบัตร" value="<?php echo $data['mather_type_card']; ?>" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_first" class="form-control input-circle" placeholder="ระบุชื่อมารดา" value="<?php echo $data['mather_first']; ?>" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_last" class="form-control input-circle" placeholder="ระบุนามสกุลมารดา" value="<?php echo $data['mather_last']; ?>" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">กลุ่มเลือด </label>
                  <div class="col-md-4">
                    <select name="mather_group_blood" class="form-control input-circle">
                    	<option value="O" <?php if($data['mather_group_blood'] == "O") echo "selected"; ?>>O</option>
                        <option value="A" <?php if($data['mather_group_blood'] == "A") echo "selected"; ?>>A</option>
                        <option value="B" <?php if($data['mather_group_blood'] == "B") echo "selected"; ?>>B</option>
                        <option value="AB" <?php if($data['mather_group_blood'] == "AB") echo "selected"; ?>>AB</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เงินเดือน</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_salary" class="form-control input-circle" placeholder="ระบุเงินเดือน" value="<?php echo $data['mather_salary']; ?>" OnKeyPress="return chkNumber(this)" maxlength="20">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_tel" class="form-control input-circle" placeholder="ระบุเบอร์โทรศัพท์" value="<?php echo $data['mather_tel']; ?>" OnKeyPress="return chkNumber(this)" maxlength="10">
                </div>
                </div><br><br>
                <span style="font-size:24px;margin-left: 150px;">ข้อมูลผู้ปกครอง</span>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัสบัตรประชาชน</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_id_card" class="form-control input-circle" placeholder="ระบุเลขบัตรประชาชน" value="<?php echo $data['parent_id_card']; ?>" maxlength="13" OnKeyPress="return chkNumber(this)">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ประเภทบัตร</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_type_card" class="form-control input-circle" value="<?php echo $data['parent_type_card']; ?>" placeholder="ระบุประเภทบัตร" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_first" class="form-control input-circle" placeholder="ระบุชื่อผู้ปกครอง" value="<?php echo $data['parent_first']; ?>" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_last" class="form-control input-circle" value="<?php echo $data['parent_last']; ?>" placeholder="ระบุนามสกุลผู้ปกครอง" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">กลุ่มเลือด </label>
                  <div class="col-md-4">
                    <select name="parent_group_blood" class="form-control input-circle">
                    	<option value="O" <?php if($data['parent_group_blood'] == "O") echo "selected"; ?>>O</option>
                        <option value="A" <?php if($data['parent_group_blood'] == "A") echo "selected"; ?>>A</option>
                        <option value="B" <?php if($data['parent_group_blood'] == "B") echo "selected"; ?>>B</option>
                        <option value="AB" <?php if($data['parent_group_blood'] == "AB") echo "selected"; ?>>AB</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เงินเดือน</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_salary" class="form-control input-circle" value="<?php echo $data['parent_salary']; ?>" placeholder="ระบุเงินเดือน" OnKeyPress="return chkNumber(this)" maxlength="20">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_tel" class="form-control input-circle" value="<?php echo $data['parent_tel']; ?>" placeholder="ระบุเบอร์โทรศัพท์" OnKeyPress="return chkNumber(this)" maxlength="10">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เป็นอะไรกับนักเรียน</label>
                  <div class="col-md-4">
                    <input type="text" name="relation" class="form-control input-circle" value="<?php echo $data['relation']; ?>" placeholder="ระบุความสัมพันธ์ระหว่างผู้ปกครองกับนักเรียน" maxlength="50" required>
                </div>
                </div>           
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" name="insert" class="btn btn-circle green">เพิ่ม</button>
                    <button type="reset" class="btn btn-circle grey-salsa btn-outline" onClick="location.href('student.php')">ยกเลิก</button>
                  </div>
                </div>
              </div>
            </form>
            <?php
			if(isset($_POST['insert'])){
				$place = $_POST['place'];
				$old_brother = $_POST['old_brother'];
				$young_brother = $_POST['young_brother'];
				$old_sister = $_POST['old_sister'];
				$young_sister = $_POST['young_sister'];
				$num_bud = $_POST['num_bud'];
				$father_id_card = $_POST['father_id_card'];
				$father_type_card = $_POST['father_type_card'];
				$father_first = $_POST['father_first'];
				$father_last = $_POST['father_last'];
				$father_group_blood = $_POST['father_group_blood'];
				$father_salary = $_POST['father_salary'];
				$father_tel = $_POST['father_tel'];
				$mather_id_card = $_POST['mather_id_card'];
				$mather_type_card = $_POST['mather_type_card'];
				$mather_first = $_POST['mather_first'];
				$mather_last = $_POST['mather_last'];
				$mather_group_blood = $_POST['mather_group_blood'];
				$mather_salary = $_POST['mather_salary'];
				$mather_tel = $_POST['mather_tel'];
				$parent_id_card = $_POST['parent_id_card'];
				$parent_type_card = $_POST['parent_type_card'];
				$parent_first = $_POST['parent_first'];
				$parent_last = $_POST['parent_last'];
				$parent_group_blood = $_POST['parent_group_blood'];
				$parent_salary = $_POST['parent_salary'];
				$parent_tel = $_POST['parent_tel'];
				$relation = $_POST['relation'];
				
				$sql = "UPDATE studentfamily SET place = '$place',  old_brother = '$old_brother', young_sister = '$young_brother', old_sister = '$old_sister', young_sister = '$young_sister', num_bud = '$num_bud', father_id_card = '$father_id_card', father_type_card = '$father_type_card', father_first = '$father_first', father_last = '$father_last', father_group_blood = '$father_group_blood', father_salary = '$father_salary', father_tel = '$father_tel', mather_id_card = '$mather_id_card', mather_type_card = '$mather_type_card', mather_first = '$mather_first', mather_last = '$mather_last', mather_group_blood = '$mather_group_blood', mather_salary = '$mather_salary', mather_tel = '$mather_tel', parent_id_card = '$parent_id_card', parent_type_card = '$parent_type_card', parent_first = '$parent_first', parent_last = '$parent_last', parent_group_blood = '$parent_group_blood', parent_salary = '$parent_salary', parent_tel = '$parent_tel', relation = '$relation' WHERE id_card = '$id'";
				$result = mysqli_query($link, $sql);
				
				header('refresh: 1;url = student_family.php');
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