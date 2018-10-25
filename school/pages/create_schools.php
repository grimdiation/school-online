<?php
session_start();
ob_start();
error_reporting( error_reporting() & ~E_NOTICE );
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>เพิ่ม - โรงเรียน</title>
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
<link rel="shortcut icon" href="favicon.ico" /> </head>
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
            <div class="caption"> <i class="fa fa-gift"></i>เพิ่มโรงเรียน </div>
            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
          </div>
          <div class="portlet-body form"> 
            <!-- BEGIN FORM-->
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-body">
              <div class="form-group">
                  <label class="col-md-3 control-label">รหัสโรงเรียน</label>
                  <div class="col-md-4">
                  <input type="text" name="school_id" class="form-control input-circle" placeholder="ระบุรหัสโรงเรียน" maxlength="20" value="<?php echo $_SESSION['school_id']; ?>" readonly>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัส SMIS</label>
                  <div class="col-md-4">
                    <input type="text" name="smis_id" class="form-control input-circle" placeholder="ระบุรหัส SMIS" maxlength="20" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัส OBEC</label>
                  <div class="col-md-4">
                    <input type="text" name="obec_id" class="form-control input-circle" placeholder="ระบุรหัส OBEC" maxlength="20" OnKeyPress="return chkNumber(this)" required>
                     </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อโรงเรียน(ภาษาไทย)</label>
                  <div class="col-md-4">
                    <input type="text" name="school_name_th" class="form-control input-circle" placeholder="ระบุชื่อโรงเรียน(ภาษาไทย)" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อโรงเรียน(ภาษาอังกฤษ)</label>
                  <div class="col-md-4">
                    <input type="text" name="school_name_en" class="form-control input-circle" placeholder="ระบุชื่อโรงเรียน(ภาษาอังกฤษ)" required>
                    <span class="help-block"> </span> </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ก่อตั้งเมื่อ </label>
                  <div class="col-md-4">
                    <input type="date" name="construct_at" class="form-control input-circle" id="dp" placeholder="เลือกวันเดือนปีที่ก่อตั้งโรงเรียน" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">บ้านเลขที่</label>
                  <div class="col-md-4">
                    <input type="text" name="home_code" class="form-control input-circle" placeholder="ระบุบ้านเลขที่" maxlength="50" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">หมู่ที่</label>
                  <div class="col-md-4">
                    <input type="text" name="moo" class="form-control input-circle" placeholder="ระบุหมู่ที่" maxlength="50" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ถนน</label>
                  <div class="col-md-4">
                    <input type="text" name="road" placeholder="ระบุถนน" class="form-control input-circle" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ซอย</label>
                  <div class="col-md-4">
                    <input type="text" name="soy" class="form-control input-circle" placeholder="ระบุซอย" maxlength="10" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">จังหวัด</label>
                  <div class="col-md-4">
                    <input type="text" name="province" class="form-control input-circle" placeholder="ระบุจังหวัด" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">อำเภอ</label>
                  <div class="col-md-4">
                    <input type="text" name="district" class="form-control input-circle" placeholder="ระบุอำเภอ" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ตำบล</label>
                  <div class="col-md-4">
                    <input type="text" name="sub_district" class="form-control input-circle" maxlength="200" placeholder="ระบุตำบล" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัสไปรษณีย์</label>
                  <div class="col-md-4">
                    <input type="text" name="zip_code" class="form-control input-circle" maxlength="5" placeholder="ระบุรหัสไปรษณีย์" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">โทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="number" name="tel" class="form-control input-circle" placeholder="ระบุเบอร์โทรศัพท์ 9 - 10 หลัก" maxlength="10" OnKeyPress="return chkNumber(this)" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">โทรสาร</label>
                  <div class="col-md-4">
                    <input type="text" name="fax" class="form-control input-circle" placeholder="ระบุหมายเลขโทรสาร" maxlength="9" OnKeyPress="return chkNumber(this)" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">อีเมล์</label>
                  <div class="col-md-4">
                    <div class="input-group"> <span class="input-group-addon input-circle-left"> <i class="fa fa-envelope"></i> </span>
                      <input type="email" name="email" class="form-control input-circle-right" placeholder="ระบุอีเมล์" required> </div>
                    </div>
                  </div>
                
                <div class="form-group">
                  <label class="col-md-3 control-label">เว็บไซต์</label>
                  <div class="col-md-4">
                    <input type="text" name="website" class="form-control input-circle" placeholder="ระบุเว็บไซต์โรงเรียน">
                    <span class="help-block">  </span> </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">องค์กรปกครองท้องถิ่น/เทศบาล/เขตปกครองพิเศษ</label>
                  <div class="col-md-4">
                    <input type="text" name="dla" class="form-control input-circle" placeholder="ระบุองค์กรปกครองท้องถิ่น/เทศบาล/เขตปกครองพิเศษ" required>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">สังกัด</label>
                  <div class="col-md-4">
                    <input type="text" name="belong" class="form-control input-circle" placeholder="ระบุสังกัด">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ประเภทการจัดการศึกษา</label>
                  <div class="col-md-4">
                    <input type="text" name="type_education" class="form-control input-circle" placeholder="ระบุสังกัด">
                    </div>
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
                    <input type="text" name="school_area" class="form-control input-circle" placeholder="ระบุระยะทาง" OnKeyPress="return chkNumber(this)">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ระยะทางจากโรงเรียนถึงเขตอำเภอ</label>
                  <div class="col-md-4">
                    <input type="text" name="school_district" class="form-control input-circle" placeholder="ระบุระยะทาง" OnKeyPress="return chkNumber(this)">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ละติจูด</label>
                  <div class="col-md-4">
                    <input type="text" name="lititude" class="form-control input-circle" placeholder="ระบุละติจูด" OnKeyPress="return chkNumber(this)">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ลองติจูด</label>
                  <div class="col-md-4">
                    <input type="text" name="longtitude" class="form-control input-circle" placeholder="ระบุลองติจูด" OnKeyPress="return chkNumber(this)">
                    
                </div></div>
                <div class="form-group">
                  <label class="col-md-3 control-label">จำนวนหนังสือในห้องสมุด</label>
                  <div class="col-md-4">
                    <input type="text" name="amount_book" class="form-control input-circle" placeholder="ระบุจำนวนหนังสือทั้งหมดที่อยู่ในห้องสมุด" OnKeyPress="return chkNumber(this)">
                </div>
                </div>
				<div class="form-group">
                  <label class="col-md-3 control-label">โลโก้โรงเรียน</label>
                  <div class="col-md-4">
                    <input type="file" name="logo">
                </div>
                </div>
              </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" name="insert" class="btn btn-circle green">เพิ่ม</button>
                    <button type="reset" class="btn btn-circle grey-salsa btn-outline" onClick="location.href('schools.php')">ยกเลิก</button>
<?php
include('mysql_connect.php');
	
	$sql = "select * from school";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_array($result);
	
	if(isset($_POST['insert'])){
		if(is_uploaded_file($_FILES['logo']['tmp_name'])){
			$ext = pathinfo($_FILES['logo']['name'],PATHINFO_EXTENSION);
			$filename = "dataimage/" . $_SESSION['school_id'] . "." . $ext;
		} else {
			$filename = "";
		}
		
		$schools = "'" . $_POST['school_id'] . "',";
		$schools .= "'" . $_POST['smis_id'] . "',";
		$schools .= "'" . $_POST['obec_id'] . "',";
		$schools .= "'" . $_POST['school_name_th'] . "',";
		$schools .= "'" . $_POST['school_name_en'] . "',";
		$schools .= "'" . $_POST['construct_at'] . "',";
		$schools .= "'" . $_POST['home_code'] . "',";
		$schools .= "'" . $_POST['moo'] . "',";
		$schools .= "'" . $_POST['road'] . "',";
		$schools .= "'" . $_POST['soy'] . "',";
		$schools .= "'" . $_POST['province'] . "',";
		$schools .= "'" . $_POST['district'] . "',";
		$schools .= "'" . $_POST['sub_district'] . "',";
		$schools .= "'" . $_POST['zip_code'] . "',";
		$schools .= "'" . $_POST['tel'] . "',";
		$schools .= "'" . $_POST['fax'] . "',";
		$schools .= "'" . $_POST['email'] . "',";
		$schools .= "'" . $_POST['website'] . "',";
		$schools .= "'" . $_POST['dla'] . "',";
		$schools .= "'" . $_POST['belong'] . "',";
		$schools .= "'" . $_POST['type_education'] . "',";
		$schools .= "'" . $_POST['size_education'] . "',";
		$schools .= "'" . $_POST['electricity'] . "',";
		$schools .= "'" . $_POST['school_area'] . "',";
		$schools .= "'" . $_POST['school_district'] . "',";
		$schools .= "'" . $_POST['lititude'] . "',";
		$schools .= "'" . $_POST['longtitude'] . "',";
		$schools .= "'" . $_POST['amount_book'] . "',";
		$schools .= "'" . $filename . "'";
		
		$sql = "insert into school (school_id, smis_id, obec_id, school_name_th, school_name_en, construct_at, home_code, moo, road, soy, province, district, sub_district, zip_code, tel, fax, email, website, dla, belong, type_education, size_education, electricity, school_area, school_district, lititude, longtitude, amount_book, logo)values($schools)";
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