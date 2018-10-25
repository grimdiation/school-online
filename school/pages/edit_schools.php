<?php
session_start();
ob_start();
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>แก้ไข - โรงเรียน</title>
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
            <div class="caption"> <i class="fa fa-gift"></i>ปรับปรุงข้อมูลโรงเรียน </div>
            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
          </div>
          <div class="portlet-body form"> 
<?php
	include('mysql_connect.php');
	
	$id = $_GET['id'];
	$sql = "SELECT * FROM school WHERE school_id = \"" . $id . "\"";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_array($result);
?>
            <!-- BEGIN FORM-->
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-body">
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัส SMIS</label>
                  <div class="col-md-4">
                    <input type="text" name="smis_id" class="form-control input-circle" placeholder="ระบุรหัส SMIS" maxlength="20" value="<?php echo $data['smis_id']; ?>" OnKeyPress="return chkNumber(this)" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัส OBEC</label>
                  <div class="col-md-4">
                    <input type="text" name="obec_id" class="form-control input-circle" placeholder="ระบุรหัส OBEC" maxlength="20" value="<?php echo $data['obec_id']; ?>" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อโรงเรียน(ภาษาไทย)</label>
                  <div class="col-md-4">
                    <input type="text" name="school_name_th" class="form-control input-circle" placeholder="ระบุชื่อโรงเรียน(ภาษาไทย)" maxlength="200" value="<?php echo $data['school_name_th']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อโรงเรียน(ภาษาอังกฤษ)</label>
                  <div class="col-md-4">
                    <input type="text" name="school_name_en" class="form-control input-circle" placeholder="ระบุชื่อโรงเรียน(ภาษาอังกฤษ)" value="<?php echo $data['school_name_en']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ก่อตั้งเมื่อ </label>
                  <div class="col-md-4">
                    <input type="date" name="construct_at" class="form-control input-circle" id="dp" placeholder="เลือกวันเดือนปีที่ก่อตั้งโรงเรียน" value="<?php echo $data['construct_at']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">บ้านเลขที่</label>
                  <div class="col-md-4">
                    <input type="text" name="home_code" class="form-control input-circle" placeholder="ระบุบ้านเลขที่" maxlength="50" OnKeyPress="return chkNumber(this)" value="<?php echo $data['home_code']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">หมู่ที่</label>
                  <div class="col-md-4">
                    <input type="text" name="moo" class="form-control input-circle" placeholder="ระบุหมู่ที่" maxlength="50" OnKeyPress="return chkNumber(this)" value="<?php echo $data['moo']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ถนน</label>
                  <div class="col-md-4">
                    <input type="text" name="road" placeholder="ระบุถนน" class="form-control input-circle" value="<?php echo $data['road']; ?>" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ซอย</label>
                  <div class="col-md-4">
                    <input type="text" name="soy" class="form-control input-circle" placeholder="ระบุซอย" value="<?php echo $data['soy']; ?>" maxlength="10" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">จังหวัด</label>
                  <div class="col-md-4">
                    <input type="text" name="province" class="form-control input-circle" placeholder="ระบุจังหวัด" value="<?php echo $data['province']; ?>" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">อำเภอ</label>
                  <div class="col-md-4">
                    <input type="text" name="district" class="form-control input-circle" placeholder="ระบุอำเภอ" value="<?php echo $data['district']; ?>" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ตำบล</label>
                  <div class="col-md-4">
                    <input type="text" name="sub_district" class="form-control input-circle" maxlength="200" value="<?php echo $data['sub_district']; ?>" placeholder="ระบุตำบล" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัสไปรษณีย์</label>
                  <div class="col-md-4">
                    <input type="text" name="zip_code" class="form-control input-circle" maxlength="5" placeholder="ระบุรหัสไปรษณีย์" OnKeyPress="return chkNumber(this)" value="<?php echo $data['zip_code']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">โทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="number" name="tel" OnKeyPress="return chkNumber(this)" class="form-control input-circle" placeholder="ระบุเบอร์โทรศัพท์ 9 - 10 หลัก" maxlength="10" value="<?php echo $data['tel']; ?>" required></div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">โทรสาร</label>
                  <div class="col-md-4">
                    <input type="text" name="fax" OnKeyPress="return chkNumber(this)" class="form-control input-circle" placeholder="ระบุหมายเลขโทรสาร" maxlength="9" value="<?php echo $data['fax']; ?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">อีเมล์</label>
                  <div class="col-md-4">
                    <div class="input-group"> <span class="input-group-addon input-circle-left"> <i class="fa fa-envelope"></i> </span>
                      <input type="email" name="email" class="form-control input-circle-right" placeholder="ระบุอีเมล์" value="<?php echo $data['email']; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เว็บไซต์</label>
                  <div class="col-md-4">
                    <input type="text" name="website" class="form-control input-circle" placeholder="ระบุเว็บไซต์โรงเรียน" value="<?php echo $data['website']; ?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">องค์กรปกครองท้องถิ่น/เทศบาล/เขตปกครองพิเศษ</label>
                  <div class="col-md-4">
                    <input type="text" name="dla" class="form-control input-circle" placeholder="ระบุองค์กรปกครองท้องถิ่น/เทศบาล/เขตปกครองพิเศษ" value="<?php echo $data['dla']; ?>" required></div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">สังกัด</label>
                  <div class="col-md-4">
                    <input type="text" name="belong" class="form-control input-circle" placeholder="ระบุสังกัด" value="<?php echo $data['belong']; ?>" required></div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ประเภทการจัดการศึกษา</label>
                  <div class="col-md-4">
                    <input type="text" name="type_education" class="form-control input-circle" placeholder="ระบุสังกัด" value="<?php echo $data['type_education']; ?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ขนาดสถานศึกษา</label>
                  <div class="col-md-4">
                    <select name="size_education" class="form-control input-circle">
                    	<option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ไฟฟ้า</label>
                  <div class="col-md-4">
                    <input type="radio" name="electricity" class="icheck" value="มี">มี <input type="radio" name="electricity" class="icheck" value="ไม่มี" checked>ไม่มี
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ระยะทางจากโรงเรียนถึงเขตพื้นที่</label>
                  <div class="col-md-4">
                    <input type="text" name="school_area" OnKeyPress="return chkNumber(this)" class="form-control input-circle" placeholder="ระบุระยะทาง" value="<?php echo $data['school_area']; ?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ระยะทางจากโรงเรียนถึงเขตอำเภอ</label>
                  <div class="col-md-4">
                    <input type="text" name="school_district" OnKeyPress="return chkNumber(this)" class="form-control input-circle" placeholder="ระบุระยะทาง" value="<?php echo $data['school_district']; ?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ละติจูด</label>
                  <div class="col-md-4">
                    <input type="text" name="lititude" OnKeyPress="return chkNumber(this)" OnKeyPress="return chkNumber(this)" class="form-control input-circle" placeholder="ระบุละติจูด" value="<?php echo $data['lititude']; ?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ลองติจูด</label>
                  <div class="col-md-4">
                    <input type="text" name="longtitude" OnKeyPress="return chkNumber(this)" class="form-control input-circle" placeholder="ระบุลองติจูด" value="<?php echo $data['longtitude']; ?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">จำนวนหนังสือในห้องสมุด</label>
                  <div class="col-md-4">
                    <input type="text" name="amount_book" OnKeyPress="return chkNumber(this)" class="form-control input-circle" placeholder="ระบุจำนวนหนังสือทั้งหมดที่อยู่ในห้องสมุด" value="<?php echo $data['amount_book']; ?>">
                </div>
                </div>
				<div class="form-group">
                  <label class="col-md-3 control-label">โลโก้โรงเรียน</label>
                  <div class="col-md-4">
                    <input type="file" name="logo" value="<?php echo $data['logo']; ?>">
                </div>
                </div>
              </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" name="insert" class="btn btn-circle green">ปรับปรุง</button>
                    <button type="reset" class="btn btn-circle grey-salsa btn-outline" onClick="location.href('schools.php')">ยกเลิก</button>

<?php
	$sql = "select * from school";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_array($result);
	
	if(isset($_POST['insert'])){
		if(is_uploaded_file($_FILES['logo']['tmp_name'])){
			$ext = pathinfo($_FILES['logo']['name'],PATHINFO_EXTENSION);
			$filename = "dataimage/" . $_SESSION['school_id'] . "." . $ext;
		} else {
			$filename = $data['logo'];
		}
		
		$smis_id = $_POST['smis_id'];
		$obec_id = $_POST['obec_id'];
		$school_name_th = $_POST['school_name_th'];
		$school_name_en = $_POST['school_name_en'];
		$construct_at = $_POST['construct_at'];
		$belong = $_POST['belong'];
		$home_code = $_POST['home_code'];
		$moo = $_POST['moo'];
		$road = $_POST['road'];
		$soy = $_POST['soy'];
		$province = $_POST['province'];
		$district = $_POST['district'];
		$sub_district = $_POST['sub_district'];
		$zip_code = $_POST['zip_code'];
		$tel = $_POST['tel'];
		$fax = $_POST['fax'];
		$email = $_POST['email'];
		$website = $_POST['website'];
		$dla = $_POST['dla'];
		$type_education = $_POST['type_education'];
		$size_education = $_POST['size_education'];
		$electricity = $_POST['electricity'];
		$school_area = $_POST['school_area'];
		$school_district = $_POST['school_district'];
		$lititude = $_POST['lititude'];
		$longtitude = $_POST['longtitude'];
		$amount_book = $_POST['amount_book'];
		
		$sql = "UPDATE school SET smis_id = '$smis_id', obec_id = '$obec_id', school_name_th = '$school_name_th', school_name_en = '$school_name_en', construct_at = '$construct_at', belong = '$belong', home_code = '$home_code', moo = '$moo', road = '$road', soy = '$soy', province = '$province', district = '$district', sub_district = '$sub_district', zip_code = '$zip_code', tel = '$tel', fax = '$fax', email = '$email', website = '$website', dla = '$dla', type_education = '$type_education', size_education = '$size_education', electricity = '$electricity', school_area = '$school_area', school_district = '$school_district', lititude = '$lititude', longtitude = '$longtitude', amount_book = '$amount_book', logo = '$filename' WHERE school_id = '$id'";
		$result = mysqli_query($link, $sql);
		
		move_uploaded_file($_FILES['logo']['tmp_name'],$filename);
		
		header('refresh: 1;url = schools.php');
	}
	
	mysqli_close($link);
?>

                  </div>
                </div>
              </div>
            </form>
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