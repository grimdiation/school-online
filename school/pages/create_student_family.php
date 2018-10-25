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
        <div class="portlet box green">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-gift"></i>เพิ่มข้อมูลผู้ปกครอง </div>
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
                    	<option value="อยู่ด้วยกัน">อยู่ด้วยกัน</option>
                        <option value="แยกกันอยู่">แยกกันอยู่</option>
                        <option value="บิดาถึงแก่กรรม">บิดาถึงแก่กรรม</option>
                        <option value="มารดาถึงแก่กรรม">มารดาถึงแก่กรรม</option>
                        <option value="บิดาและมารดาถึงแก่กรรม">บิดาและมารดาถึงแก่กรรม</option>
                        <option value="มารดาแต่งงานใหม่">มารดาแต่งงานใหม่</option>
                        <option value="บิดาและมารถดาแต่งงานใหม่">บิดาและมารถดาแต่งงานใหม่</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">มีพี่ชาย</label>
                  <div class="col-md-4">
                    <input type="text" name="old_brother" class="form-control input-circle" placeholder="ระบุจำนวนพี่ชาย" maxlength="3" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">มีน้องชาย</label>
                  <div class="col-md-4">
                    <input type="text" name="young_brother" class="form-control input-circle" placeholder="ระบุจำนวนน้องชาย" maxlength="3" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">มีพี่สาว</label>
                  <div class="col-md-4">
                    <input type="text" name="old_sister" class="form-control input-circle" placeholder="ระบุจำนวนพี่สาว" maxlength="3" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">มีน้องสาว</label>
                  <div class="col-md-4">
                    <input type="text" name="young_sister" class="form-control input-circle" placeholder="ระบุจำนวนน้องสาว" maxlength="3" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ตนเองเป็นบุตรคนที่</label>
                  <div class="col-md-4">
                    <input type="text" name="num_bud" class="form-control input-circle" placeholder="ระบุเป็นตัวเลขว่าตนเองเป็นบุตรคนที่เท่าไหร่" maxlength="3" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div><br><br>
                <span style="font-size:24px;margin-left: 150px;">ข้อมูลบิดา</span>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัสบัตรประชาชน</label>
                  <div class="col-md-4">
                    <input type="text" name="father_id_card" class="form-control input-circle" placeholder="ระบุเลขบัตรประชาชน" maxlength="13" OnKeyPress="return chkNumber(this)">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ประเภทบัตร</label>
                  <div class="col-md-4">
                    <input type="text" name="father_type_card" class="form-control input-circle" placeholder="ระบุประเภทบัตร" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ</label>
                  <div class="col-md-4">
                    <input type="text" name="father_first" class="form-control input-circle" placeholder="ระบุชื่อบิดา" maxlength="200" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล</label>
                  <div class="col-md-4">
                    <input type="text" name="father_last" class="form-control input-circle" placeholder="ระบุนามสกุลบิดา" maxlength="200" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">กลุ่มเลือด </label>
                  <div class="col-md-4">
                    <select name="father_group_blood" class="form-control input-circle">
                    	<option value="O">O</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เงินเดือน</label>
                  <div class="col-md-4">
                    <input type="text" name="father_salary" class="form-control input-circle" placeholder="ระบุเงินเดือน" OnKeyPress="return chkNumber(this)" maxlength="20" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="text" name="father_tel" class="form-control input-circle" placeholder="ระบุเบอร์โทรศัพท์" OnKeyPress="return chkNumber(this)" maxlength="10" required>
                </div>
                </div><br><br>
                <span style="font-size:24px;margin-left: 150px;">ข้อมูลมารดา</span>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัสบัตรประชาชน</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_id_card" class="form-control input-circle" placeholder="ระบุเลขบัตรประชาชน" maxlength="13" OnKeyPress="return chkNumber(this)">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ประเภทบัตร</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_type_card" class="form-control input-circle" placeholder="ระบุประเภทบัตร" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_first" class="form-control input-circle" placeholder="ระบุชื่อมารดา" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_last" class="form-control input-circle" placeholder="ระบุนามสกุลมารดา" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">กลุ่มเลือด </label>
                  <div class="col-md-4">
                    <select name="mather_group_blood" class="form-control input-circle">
                    	<option value="O">O</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เงินเดือน</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_salary" class="form-control input-circle" placeholder="ระบุเงินเดือน" OnKeyPress="return chkNumber(this)" maxlength="20">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="text" name="mather_tel" class="form-control input-circle" placeholder="ระบุเบอร์โทรศัพท์" OnKeyPress="return chkNumber(this)" maxlength="10">
                </div>
                </div><br><br>
                <span style="font-size:24px;margin-left: 150px;">ข้อมูลผู้ปกครอง</span>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัสบัตรประชาชน</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_id_card" class="form-control input-circle" placeholder="ระบุเลขบัตรประชาชน" maxlength="13" OnKeyPress="return chkNumber(this)">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ประเภทบัตร</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_type_card" class="form-control input-circle" placeholder="ระบุประเภทบัตร" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_first" class="form-control input-circle" placeholder="ระบุชื่อผู้ปกครอง" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_last" class="form-control input-circle" placeholder="ระบุนามสกุลผู้ปกครอง" maxlength="200">
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">กลุ่มเลือด </label>
                  <div class="col-md-4">
                    <select name="parent_group_blood" class="form-control input-circle">
                    	<option value="O">O</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เงินเดือน</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_salary" class="form-control input-circle" placeholder="ระบุเงินเดือน" OnKeyPress="return chkNumber(this)" maxlength="20">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="text" name="parent_tel" class="form-control input-circle" placeholder="ระบุเบอร์โทรศัพท์" OnKeyPress="return chkNumber(this)" maxlength="10">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เป็นอะไรกับนักเรียน</label>
                  <div class="col-md-4">
                    <input type="text" name="relation" class="form-control input-circle" placeholder="ระบุความสัมพันธ์ระหว่างผู้ปกครองกับนักเรียน" maxlength="50" required>
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
			include('mysql_connect.php');
			$id = $_GET['id'];
			
			if(isset($_POST['insert'])){
				$family = "'" . $_POST['studentFamily_id'] . "',";
				$family .= "'" . $_POST['place'] . "',";
				$family .= "'" . $_POST['old_brother'] . "',";
				$family .= "'" . $_POST['young_brother'] . "',";
				$family .= "'" . $_POST['old_sister'] . "',";
				$family .= "'" . $_POST['young_sister'] . "',";
				$family .= "'" . $_POST['num_bud'] . "',";
				$family .= "'" . $_POST['father_id_card'] . "',";
				$family .= "'" . $_POST['father_type_card'] . "',";
				$family .= "'" . $_POST['father_first'] . "',";
				$family .= "'" . $_POST['father_last'] . "',";
				$family .= "'" . $_POST['father_group_blood'] . "',";
				$family .= "'" . $_POST['father_salary'] . "',";
				$family .= "'" . $_POST['father_tel'] . "',";
				$family .= "'" . $_POST['mather_id_card'] . "',";
				$family .= "'" . $_POST['mather_type_card'] . "',";
				$family .= "'" . $_POST['mather_first'] . "',";
				$family .= "'" . $_POST['mather_last'] . "',";
				$family .= "'" . $_POST['mather_group_blood'] . "',";
				$family .= "'" . $_POST['mather_salary'] . "',";
				$family .= "'" . $_POST['mather_tel'] . "',";
				$family .= "'" . $_POST['parent_id_card'] . "',";
				$family .= "'" . $_POST['parent_type_card'] . "',";
				$family .= "'" . $_POST['parent_first'] . "',";
				$family .= "'" . $_POST['parent_last'] . "',";
				$family .= "'" . $_POST['parent_group_blood'] . "',";
				$family .= "'" . $_POST['parent_salary'] . "',";
				$family .= "'" . $_POST['parent_tel'] . "',";
				$family .= "'" . $_POST['relation'] . "',";
				$family .= "'" . $id . "'";
				
				$sql = "INSERT INTO studentfamily(studentFamily_id, place, old_brother, young_brother, old_sister, young_sister, num_bud, father_id_card, father_type_card, father_first, father_last, father_group_blood, father_salary, father_tel, mather_id_card, mather_type_card, mather_first, mather_last, mather_group_blood, mather_salary, mather_tel, parent_id_card, parent_type_card, parent_first, parent_last, parent_group_blood, parent_salary, parent_tel, relation, id_card)values($family)";
				$result = mysqli_query($link, $sql);
				header('refresh: 1;url = student.php');
			}
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