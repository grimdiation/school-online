<?php
session_start();
ob_start();
error_reporting( error_reporting() & ~E_NOTICE );
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>แก้ไข - นักเรียน</title>
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
            <div class="caption"> <i class="fa fa-gift"></i>แก้ไข </div>
            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
          </div>
          <div class="portlet-body form"> 
<?php
	include('mysql_connect.php');
	
	$id = $_GET['id'];
	$sql = "SELECT * FROM student WHERE id_card = '$id'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_array($result);
?>
            <!-- BEGIN FORM-->
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-body">
              <div class="form-group">
                  <label class="col-md-3 control-label">คำนำหน้าชื่อ </label>
                  <div class="col-md-4">
                    <select name="sub_name" class="form-control input-circle">
                    	<option value="ด.ช." <?php if($data['sub_name'] == "ด.ช.") echo "selected" ?>>ด.ช.</option>
                        <option value="ด.ญ." <?php if($data['sub_name'] == "ด.ญ.") echo "selected" ?>>ด.ญ.</option>
                        <option value="นาย" <?php if($data['sub_name'] == "นาย") echo "selected" ?>>นาย</option>
                        <option value="นางสาว" <?php if($data['sub_name'] == "นางสาว") echo "selected" ?>>นางสาว</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ(ภาษาไทย) </label>
                  <div class="col-md-4">
                    <input type="text" name="first_name_th" class="form-control input-circle" placeholder="ระบุชื่อเป็นภาษาไทย" maxlength="400" value="<?php echo $data['first_name_th']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล(ภาษาไทย) </label>
                  <div class="col-md-4">
                    <input type="text" name="last_name_th" class="form-control input-circle" placeholder="ระบุนามสกุลเป็นภาษาไทย" maxlength="400" value="<?php echo $data['last_name_th']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชื่อ(ภาษาอังกฤษ) </label>
                  <div class="col-md-4">
                    <input type="text" name="first_name_en" class="form-control input-circle" placeholder="ระบุชื่อเป็นภาษาอังกฤษ" maxlength="400" value="<?php echo $data['first_name_en']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">นามสกุล(ภาษาอังกฤษ) </label>
                  <div class="col-md-4">
                    <input type="text" name="last_name_en" class="form-control input-circle" placeholder="ระบุนามสกุลเป็นภาษาอังกฤษ" maxlength="400" value="<?php echo $data['last_name_en']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชั้น</label>
                  <div class="col-md-4">
                    <input type="text" name="class" class="form-control input-circle" placeholder="ระบุชั้น เช่น ป.1 ป.2 เป็นต้น" maxlength="20" value="<?php echo $data['class']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ห้อง</label>
                  <div class="col-md-4">
                    <input type="text" name="room" class="form-control input-circle" OnKeyPress="return chkNumber(this)" placeholder="ระบุห้อง เช่น 1 หรือ 2 หรือ 3" maxlength="3" value="<?php echo $data['room']; ?>" required>
                    <span class="help-block"> </span> </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ชนิดบัตร </label>
                  <div class="col-md-4">
                    <input type="text" name="type_card" class="form-control input-circle" placeholder="ระบุชนิดบัตร" value="<?php echo $data['type_card']; ?>" maxlength="100">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">สายการเรียน </label>
                  <div class="col-md-4">
                    <input type="text" name="course_study" class="form-control input-circle" placeholder="ระบุสายการเรียน" value="<?php echo $data['course_study']; ?>" maxlength="400">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ประเภทนักเรียน </label>
                  <div class="col-md-4">
                    <input type="text" name="type_student" class="form-control input-circle" placeholder="ระบุประเภทนักเรียน" value="<?php echo $data['type_student']; ?>" maxlength="100">
                </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-3 control-label">เพศ </label>
                  <div class="col-md-4">
                    <input type="radio" name="gender" value="ชาย" <?php if($data['gender'] == "ชาย") echo "checked"; ?>>ชาย
                    <input type="radio" name="gender" value="หญิง" <?php if($data['gender'] == "หญิง") echo "checked"; ?>>หญิง
                </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-3 control-label">วันเกิด </label>
                  <div class="col-md-4">
                    <input type="text" name="birthday_at" class="form-control input-circle" id="dp" placeholder="ระบุวันเกิด" maxlength="10" value="<?php echo $data['birthday_at']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">รูปภาพ</label>
                  <div class="col-md-4">
                    <input type="file" name="img">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">จังหวัดที่เกิด </label>
                  <div class="col-md-4">
                    <input type="text" name="birth_province" class="form-control input-circle" placeholder="ระบุจังหวัดที่เกิด" maxlength="200" value="<?php echo $data['birth_province']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">อีเมล์ </label>
                  <div class="col-md-4">
                    <input type="text" name="email" class="form-control input-circle" placeholder="ระบุอีเมล์" value="<?php echo $data['email']; ?>" maxlength="100">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">กลุ่มเลือด </label>
                  <div class="col-md-4">
                    <select name="group_blood" class="form-control input-circle">
                    	<option value="O" <?php if($data['group_blood'] == "O") echo "selected" ?>>O</option>
                        <option value="A" <?php if($data['group_blood'] == "A") echo "selected" ?>>A</option>
                        <option value="B" <?php if($data['group_blood'] == "B") echo "selected" ?>>B</option>
                        <option value="AB" <?php if($data['group_blood'] == "AB") echo "selected" ?>>AB</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เชื้อชาติ </label>
                  <div class="col-md-4">
                    <input type="text" name="race" class="form-control input-circle" placeholder="ระบุเชื้อชาติ" maxlength="20"  value="<?php echo $data['race']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">สัญชาติ </label>
                  <div class="col-md-4">
                    <input type="text" name="nationality" class="form-control input-circle" placeholder="ระบุสัญชาติ" maxlength="20" value="<?php echo $data['nationality']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ศาสนา </label>
                  <div class="col-md-4">
                    <input type="text" name="religion" class="form-control input-circle" placeholder="ระบุศาสนา" maxlength="50" value="<?php echo $data['religion']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ภาษาที่ใช้เป็นหลัก </label>
                  <div class="col-md-4">
                    <input type="text" name="main" class="form-control input-circle" placeholder="ระบุภาษาหลัก" maxlength="50" value="<?php echo $data['main']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ภาษาอื่น </label>
                  <div class="col-md-4">
                    <input type="text" name="secondary" class="form-control input-circle" placeholder="ระบุภาษาอื่น" maxlength="50" value="<?php echo $data['secondary']; ?>">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ที่นอนพักประจำ </label>
                  <div class="col-md-4">
                    <input type="radio" name="accommodation" value="1" <?php if($data['accommodation'] == "1") echo "checked" ?>>ใช่
                    <input type="radio" name="accommodation" value="0" <?php if($data['accommodation'] == "0") echo "checked" ?>>ไม่ใช่
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ความพิการ </label>
                  <div class="col-md-4">
                    <input type="checkbox" name="d1" value="1" <?php if($data['d1'] == "1") echo "checked" ?>> ความพิการทางการมองเห็น<br>
                    <input type="checkbox" name="d2" value="1" <?php if($data['d2'] == "1") echo "checked" ?>> ความพิการทางการได้ยิน<br>
                    <input type="checkbox" name="d3" value="1" <?php if($data['d3'] == "1") echo "checked" ?>> ความพิการทางสติปัญญา<br>
                    <input type="checkbox" name="d4" value="1" <?php if($data['d4'] == "1") echo "checked" ?>> ความพิการร่างกายและสุขภาพ<br>
                    <input type="checkbox" name="d5" value="1" <?php if($data['d5'] == "1") echo "checked" ?>> ความพิการทางการเรียนรู้<br>
                    <input type="checkbox" name="d6" value="1" <?php if($data['d6'] == "1") echo "checked" ?>> ความพิการทางการพูดและภาษา<br>
                    <input type="checkbox" name="d7" value="1" <?php if($data['d7'] == "1") echo "checked" ?>> ความพิการทางพฤติกรรมและอารมณ์<br>
                    <input type="checkbox" name="d8" value="1" <?php if($data['d8'] == "1") echo "checked" ?>> ความพิการทางออทิสติก<br>
                    <input type="checkbox" name="d9" value="1" <?php if($data['d9'] == "1") echo "checked" ?>> ความพิการทางการซ้ำซ้อน<br>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ความขาดแคลน </label>
                  <div class="col-md-4">
                    <input type="checkbox" name="l1" value="1" <?php if($data['l1'] == "1") echo "checked" ?>> ขาดแคลนเครื่องแบบนักเรียน<br>
                    <input type="checkbox" name="l2" value="1" <?php if($data['l2'] == "1") echo "checked" ?>> ขาดแคลนเครื่องเขียน<br>
                    <input type="checkbox" name="l3" value="1" <?php if($data['l3'] == "1") echo "checked" ?>> ขาดแคลนแบบเรียน<br>
                    <input type="checkbox" name="l4" value="1" <?php if($data['l4'] == "1") echo "checked" ?>> ขาดแคลนอาหารกลางวัน<br>
                    <input type="checkbox" name="l5" value="1" <?php if($data['l5'] == "1") echo "checked" ?>> ขาดแคลน 3 รายการหรือมากกว่า<br>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ผู้ด้อยโอกาส </label>
                  <div class="col-md-4">
                    <input type="checkbox" name="i1" value="1" <?php if($data['i1'] == "1") echo "checked" ?>> เด็กถูกบังคับให้ขายแรงงาน<br>
                    <input type="checkbox" name="i2" value="1" <?php if($data['i2'] == "1") echo "checked" ?>> เด็กที่อยู่ในธุรกิจทางเพศ<br>
                    <input type="checkbox" name="i3" value="1" <?php if($data['i3'] == "1") echo "checked" ?>> เด็กที่ถูดทอดทิ้ง<br>
                    <input type="checkbox" name="i4" value="1" <?php if($data['i4'] == "1") echo "checked" ?>> เด็กในสถานพินิจและคุ้มครองเยาวชน<br>
                    <input type="checkbox" name="i5" value="1" <?php if($data['i5'] == "1") echo "checked" ?>> เด็กเร่ร่อน<br>
                    <input type="checkbox" name="i6" value="1" <?php if($data['i6'] == "1") echo "checked" ?>> ผลกระทบจากเอดส์<br>
                    <input type="checkbox" name="i7" value="1" <?php if($data['i7'] == "1") echo "checked" ?>> ชนกลุ่มน้อย<br>
                    <input type="checkbox" name="i8" value="1" <?php if($data['i8'] == "1") echo "checked" ?>> เด็กที่ถูกทำร้ายทารุณ<br>
                    <input type="checkbox" name="i9" value="1" <?php if($data['i9'] == "1") echo "checked" ?>> เด็กยากจน<br>
                    <input type="checkbox" name="i10" value="1" <?php if($data['i10'] == "1") echo "checked" ?>> เด็กที่มีปัญหาเกี่ยวกับยาเสพติด<br>
                    <input type="checkbox" name="i11" value="1" <?php if($data['i11'] == "1") echo "checked" ?>> อื่นๆ<br>
                    <input type="checkbox" name="i12" value="1" <?php if($data['i12'] == "1") echo "checked" ?>> กำพร้า<br>
                    <input type="checkbox" name="i13" value="1" <?php if($data['i13'] == "1") echo "checked" ?>> ทำงานรับผิดชอบตนเองและครอบครัว<br>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ส่วนสูง </label>
                  <div class="col-md-4">
                    <input type="text" name="heigh" class="form-control input-circle" placeholder="ระบุส่วนสูง" maxlength="3" value="<?php echo $data['heigh']; ?>"  OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">น้ำหนัก </label>
                  <div class="col-md-4">
                    <input type="text" name="weight" class="form-control input-circle" placeholder="ระบุน้ำหนัก" maxlength="3" value="<?php echo $data['weight']; ?>"  OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เกรดเฉลี่ย </label>
                  <div class="col-md-4">
                    <input type="text" name="average1" class="form-control input-circle" placeholder="เทอม 1" maxlength="4" value="<?php echo $data['average1']; ?>"  OnKeyPress="return chkNumber(this)">
                    <input type="text" name="average2" class="form-control input-circle" placeholder="เทอม 2" maxlength="4" value="<?php echo $data['average2']; ?>"  OnKeyPress="return chkNumber(this)">
                    <input type="text" name="average3" class="form-control input-circle" placeholder="เทอม 3" maxlength="4" value="<?php echo $data['average3']; ?>"  OnKeyPress="return chkNumber(this)">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เกรดเฉลี่ยสะสม </label>
                  <div class="col-md-4">
                    <input type="text" name="gpa" class="form-control input-circle" placeholder="ระบุน้ำหนัก" maxlength="4" value="<?php echo $data['gpa']; ?>"  OnKeyPress="return chkNumber(this)">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">จำนวนครั้งที่ขาดเรียน </label>
                  <div class="col-md-4">
                    <input type="text" name="absent1" class="form-control input-circle" placeholder="เทอม 1" maxlength="4" value="<?php echo $data['absent1']; ?>"  OnKeyPress="return chkNumber(this)" required>
                    <input type="text" name="absent2" class="form-control input-circle" placeholder="เทอม 2" maxlength="4" value="<?php echo $data['absent2']; ?>"  OnKeyPress="return chkNumber(this)" required>
                    <input type="text" name="absent3" class="form-control input-circle" placeholder="เทอม 3" maxlength="4" value="<?php echo $data['absent3']; ?>"  OnKeyPress="return chkNumber(this)">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">โรคประจำตัว </label>
                  <div class="col-md-4">
                    <input type="text" name="disease" class="form-control input-circle" placeholder="ระบุน้ำหนัก" value="<?php echo $data['disease']; ?>" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ได้รับทุนการศึกษา </label>
                  <div class="col-md-4">
                    <input type="radio" name="fund" value="1" <?php if($data['fund'] == "1") echo "checked" ?>>ได้รับ
                    <input type="radio" name="fund" value="0" <?php if($data['fund'] == "0") echo "checked" ?>>ไม่ได้รับ
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ได้รับโอกาสทางการศึกษา </label>
                  <div class="col-md-4">
                    <input type="radio" name="chance" id="a" value="1" <?php if($data['chance'] == "1") echo "checked" ?>>ได้รับ
                    <input type="radio" name="chance" value="0"  <?php if($data['chance'] == "0") echo "checked" ?>>ไม่ได้รับ
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ออกกลางคัน </label>
                  <div class="col-md-4">
                    <input type="radio" name="dropout" value="1" <?php if($data['dropout'] == "1") echo "checked" ?>>ออก
                    <input type="radio" name="dropout" value="0" <?php if($data['dropout'] == "0") echo "checked" ?>>ไม่ออก
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">สาเหตุที่ออกกลางคัน </label>
                  <div class="col-md-4">
                    <input type="text" name="sahad" id="b" class="form-control input-circle" placeholder="ระบุสาเหตุ" value="<?php echo $data['sahad']; ?>" maxlength="200">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">พฤติกรรมของนักเรียน </label>
                  <div class="col-md-4">
                    <input type="text" name="behavior" id="b" class="form-control input-circle" placeholder="ระบุพฤติกรรมของนักเรียน" value="<?php echo $data['behavior']; ?>" maxlength="200" required>
                </div>
                </div>
                <span style="font-size: 24px;">ที่อยู่ตามทะเบียน</span>
                <div class="form-group">
                  <label class="col-md-3 control-label">บ้านเลขที่</label>
                  <div class="col-md-4">
                    <input type="text" name="home_code_1" class="form-control input-circle" placeholder="ระบุบ้านเลขที่" value="<?php echo $data['home_code_1']; ?>" maxlength="50" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">หมู่ที่</label>
                  <div class="col-md-4">
                    <input type="text" name="moo_1" class="form-control input-circle" placeholder="ระบุหมู่ที่" value="<?php echo $data['moo_1']; ?>" maxlength="50" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ถนน</label>
                  <div class="col-md-4">
                    <input type="text" name="road_1" placeholder="ระบุถนน" class="form-control input-circle" value="<?php echo $data['road_1']; ?>" maxlength="50" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ซอย</label>
                  <div class="col-md-4">
                    <input type="text" name="soy_1" class="form-control input-circle" placeholder="ระบุซอย" value="<?php echo $data['soy_1']; ?>" maxlength="10" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">จังหวัด</label>
                  <div class="col-md-4">
                    <input type="text" name="province_1" class="form-control input-circle" placeholder="ระบุจังหวัด" value="<?php echo $data['province_1']; ?>" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">อำเภอ</label>
                  <div class="col-md-4">
                    <input type="text" name="district_1" class="form-control input-circle" placeholder="ระบุอำเภอ" value="<?php echo $data['district_1']; ?>" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ตำบล</label>
                  <div class="col-md-4">
                    <input type="text" name="sub_district_1" class="form-control input-circle" maxlength="200" placeholder="ระบุตำบล" value="<?php echo $data['sub_district_1']; ?>" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัสไปรษณีย์</label>
                  <div class="col-md-4">
                    <input type="text" name="zip_code_1" class="form-control input-circle" maxlength="5" placeholder="ระบุรหัสไปรษณีย์" value="<?php echo $data['zip_code_1']; ?>" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="text" name="tel_1" class="form-control input-circle" maxlength="13" placeholder="ระบุเบอร์โทรศัพท์" value="<?php echo $data['tel_1']; ?>" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <span style="font-size: 24px;">ที่อยู่ปัจจุบัน</span>
                <div class="form-group">
                  <label class="col-md-3 control-label">บ้านเลขที่</label>
                  <div class="col-md-4">
                    <input type="text" name="home_code_2" class="form-control input-circle" placeholder="ระบุบ้านเลขที่" value="<?php echo $data['home_code_2']; ?>" maxlength="50" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">หมู่ที่</label>
                  <div class="col-md-4">
                    <input type="text" name="moo_2" class="form-control input-circle" placeholder="ระบุหมู่ที่" value="<?php echo $data['moo_2']; ?>" maxlength="50" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ถนน</label>
                  <div class="col-md-4">
                    <input type="text" name="road_2" placeholder="ระบุถนน" class="form-control input-circle" value="<?php echo $data['road_2']; ?>" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ซอย</label>
                  <div class="col-md-4">
                    <input type="text" name="soy_2" class="form-control input-circle" placeholder="ระบุซอย" value="<?php echo $data['soy_2']; ?>" maxlength="10" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">จังหวัด</label>
                  <div class="col-md-4">
                    <input type="text" name="province_2" class="form-control input-circle" placeholder="ระบุจังหวัด" value="<?php echo $data['province_2']; ?>" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">อำเภอ</label>
                  <div class="col-md-4">
                    <input type="text" name="district_2" class="form-control input-circle" placeholder="ระบุอำเภอ" value="<?php echo $data['district_2']; ?>" maxlength="200" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">ตำบล</label>
                  <div class="col-md-4">
                    <input type="text" name="sub_district_2" class="form-control input-circle" maxlength="200" value="<?php echo $data['sub_district_2']; ?>" placeholder="ระบุตำบล" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">รหัสไปรษณีย์</label>
                  <div class="col-md-4">
                    <input type="text" name="zip_code_2" class="form-control input-circle" maxlength="5" value="<?php echo $data['zip_code_2']; ?>" placeholder="ระบุรหัสไปรษณีย์" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                  <div class="col-md-4">
                    <input type="text" name="tel_2" class="form-control input-circle" maxlength="10" value="<?php echo $data['tel_2']; ?>" placeholder="ระบุเบอร์โทรศัพท์" OnKeyPress="return chkNumber(this)" required>
                </div>
                </div>
              </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" name="insert" class="btn btn-circle green">ปรับปรุง</button>
                    <a href="student.php"><button type="button" class="btn btn-circle grey-salsa btn-outline">ยกเลิก</button></a>
                  </div>
                </div>
              </div>
            </form>
            <?php
			include('mysql_connect.php');
			
			if(isset($_POST['insert'])){
				if(is_uploaded_file($_FILES['img']['tmp_name'])){
			$ext = pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION);
			$filename = "student/" . $id . "." . $ext;
		} else {
			$filename = "";
		}
				$class = $_POST['class'];
				$room = $_POST['room'];
				$class = $_POST['class'];
				$type_card = $_POST['type_card'];
				$course_study = $_POST['course_study'];
				$type_student = $_POST['type_student'];
				$sub_name = $_POST['sub_name'];
				$gender = $_POST['gender'];
				$first_name_th = $_POST['first_name_th'];
				$last_name_th = $_POST['last_name_th'];
				$first_name_en = $_POST['first_name_en'];
				$last_name_en = $_POST['last_name_en'];
				$birthday_at = $_POST['birthday_at'];
				$birth_province = $_POST['birth_province'];
				$email = $_POST['email'];
				$group_blood = $_POST['group_blood'];
				$race = $_POST['race'];
				$nationality = $_POST['nationality'];
				$religion = $_POST['religion'];
				$main = $_POST['main'];
				$secondary = $_POST['secondary'];
				$accommodation = $_POST['accommodation'];
				$d1 = $_POST['d1'];
				$d2 = $_POST['d2'];
				$d3 = $_POST['d3'];
				$d4 = $_POST['d4'];
				$d5 = $_POST['d5'];
				$d6 = $_POST['d6'];
				$d7 = $_POST['d7'];
				$d8 = $_POST['d8'];
				$d9 = $_POST['d9'];
				$l1 = $_POST['l1'];
				$l2 = $_POST['l2'];
				$l3 = $_POST['l3'];
				$l4 = $_POST['l4'];
				$l5 = $_POST['l5'];
				$i1 = $_POST['i1'];
				$i2 = $_POST['i2'];
				$i3 = $_POST['i3'];
				$i4 = $_POST['i4'];
				$i5 = $_POST['i5'];
				$i6 = $_POST['i6'];
				$i7 = $_POST['i7'];
				$i8 = $_POST['i8'];
				$i9 = $_POST['i9'];
				$i10 = $_POST['i10'];
				$i11 = $_POST['i11'];
				$i12 = $_POST['i12'];
				$i13 = $_POST['i13'];
				$heigh = $_POST['heigh'];
				$weight = $_POST['weight'];
				$average1 = $_POST['average1'];
				$average2 = $_POST['average2'];
				$average3 = $_POST['average3'];
				$gpa = $_POST['gpa'];
				$absent1 = $_POST['absent1'];
				$absent2 = $_POST['absent2'];
				$absent3 = $_POST['absent3'];
				$disease = $_POST['disease'];
				$fund = $_POST['fund'];
				$chance = $_POST['chance'];
				$dropout = $_POST['dropout'];
				$sahad = $_POST['sahad'];
				$behavior = $_POST['behavior'];
				$home_code_1 = $_POST['home_code_1'];
				$moo_1 = $_POST['moo_1'];
				$road_1 = $_POST['road_1'];
				$soy_1 = $_POST['soy_1'];
				$province_1 = $_POST['province_1'];
				$district_1 = $_POST['district_1'];
				$sub_district_1 = $_POST['sub_district_1'];
				$zip_code_1 = $_POST['zip_code_1'];
				$tel_1 = $_POST['tel_1'];
				$home_code_2 = $_POST['home_code_2'];
				$moo_2 = $_POST['moo_2'];
				$road_2 = $_POST['road_2'];
				$soy_2 = $_POST['soy_2'];
				$province_2 = $_POST['province_2'];
				$district_2 = $_POST['district_2'];
				$sub_district_2 = $_POST['sub_district_2'];
				$zip_code_2 = $_POST['zip_code_2'];
				$tel_2 = $_POST['tel_2'];
				
				$sql = "UPDATE student SET class = '$class', room = '$room', type_card = '$type_card', course_study = '$course_study', type_student = '$type_student', sub_name = '$sub_name', gender = '$gender', first_name_th = '$first_name_th', last_name_th = '$last_name_th', first_name_en = '$first_name_en', last_name_en = '$last_name_en', birthday_at = '$birthday_at', birth_province = '$birth_province', email = '$email', group_blood = '$group_blood', race = '$race', nationality = '$nationality', religion = '$religion', main = '$main', secondary = '$secondary', accommodation = '$accommodation', d1 = '$d1', d2 = '$d2', d3 = '$d3', d4= '$d4', d5 = '$d5', d6 = '$d6', d7 = '$d7', d8 = '$d8', d9 = '$d9', l1 = '$l1', l2 = '$l2', l3 = '$l3', l4 = '$l4', l5 = '$l5', i1 = '$i1', i2 = '$i2', i3 = '$i3', i4 = '$i4', i5 = '$i5', i6 = '$i6', i7 = '$i7', i8 = '$i8', i9 = '$i9', i10 = '$i10', i11 = '$i11', i12 = '$i12', i13 = '$i13', heigh = '$heigh', weight = '$weight', average1 = '$average1', average2 = '$average2', average3 = '$average3', gpa = '$gpa', absent1 = '$absent1', absent2 = '$absent2', absent2 = '$absent3', disease = '$disease', fund = '$fund', chance = '$chance', dropout = '$dropout', sahad = '$sahad', behavior = '$behavior', home_code_1 = '$home_code_1', moo_1 = '$moo_1', road_1 = '$road_1', soy_1 = '$soy_1', province_1 = '$province_1', district_1 = '$district_1', sub_district_1 = '$sub_district_1', zip_code_1 = '$zip_code_1', tel_1 = '$tel_1', home_code_2 = '$home_code_2', moo_2 = '$moo_2', road_2 = '$road_2', soy_2 = '$soy_2', province_2 = '$province_2', district_2 = '$district_2', sub_district_2 = '$sub_district_2', zip_code_2 = '$zip_code_2', tel_2 = '$tel_2', img = '$filename' WHERE id_card = '$id'";
				$result = mysqli_query($link, $sql);
				move_uploaded_file($_FILES['img']['tmp_name'],$filename);
				
				header('refresh: 1;url = student.php');
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