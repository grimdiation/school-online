<?php
session_start();
ob_start();
error_reporting( error_reporting() & ~E_NOTICE );
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>เพิ่ม - งบประมาณ</title>
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
      <div class="portlet light portlet-fit bordered">
        <div class="portlet-title">
          <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">งบประมาณทางการศึกษา</span> </div>
          <div class="actions">
            <div class="btn-group btn-group-devided" data-toggle="buttons">
            </div>
          </div>
        </div>
        <div class="portlet-body">
          <div class="row">
            <div class="col-md-12">
            <form method="post">
              <table id="user" class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <td> 1 </td>
                    <td width="800"> งบดำเนินงาน </td>
                    <td><input type="text" name="n1" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 2 </td>
                    <td width="800"> งบอาหารและการเข้าค่าย </td>
                    <td><input type="text" name="n2" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 3 </td>
                    <td width="800"> ค่าประกันอุบัติเหตุและตรวจสุขภาพ </td>
                    <td><input type="text" name="n3" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 4 </td>
                    <td width="800"> งบพัฒนาคุณภาพการศึกษา</td>
                    <td><input type="text" name="n4" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 5 </td>
                    <td width="800" colspan="2"> งบช่วยเหลือทางการศึกษา</td>
                  </tr>
                  <tr>
                    <td> 5.1 </td>
                    <td width="800"> ค่าหนังสือเรียน</td>
                    <td><input type="text" name="n5" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 5.2 </td>
                    <td width="800"> ค่าเครื่องแบบนักเรียน </td>
                    <td><input type="text" name="n6" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 5.3 </td>
                    <td width="800"> ค่าอุปกรณ์การเรียน </td>
                    <td><input type="text" name="n7" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 5.4 </td>
                    <td width="800">ค่าอาหารกลางวัน</td>
                    <td><input type="text" name="n8" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                    <td width="800" colspan="2"> 6. งบโครงการ แผนงาน และแผนปฏิบัติราชการ</td>
                    <td ></td>
                  </tr>
                  <tr>
                    <td> 6.1 </td>
                    <td width="800">งบบริหารวิชาการ</td>
                    <td><input type="text" name="n9" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 6.2 </td>
                    <td width="800">งบบริหารฝ่ายบุคคล</td>
                    <td><input type="text" name="n10" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 6.3 </td>
                    <td width="800">งบบริหารงานทั่วไป</td>
                    <td><input type="text" name="n11" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 6.4 </td>
                    <td width="800">งบบริหารงานนโยบายและแผนงาน</td>
                    <td><input type="text" name="n12" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 6.5 </td>
                    <td width="800">งบบริหารงานกิจกรรม</td>
                    <td><input type="text" name="n13" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 6.6 </td>
                    <td width="800">งบบริหารงานสวัสดิการ</td>
                    <td><input type="text" name="n14" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 1.7 </td>
                    <td width="800" colspan="2">งบอาคารสถานที่ และทรัพยากร</td>                    
                  </tr>
                  <tr>
                    <td> 7.1 </td>
                    <td width="800">ด้านอาคารเรียน</td>
                    <td><input type="text" name="n15" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 7.2 </td>
                    <td width="800">ด้านห้องเรียน</td>
                    <td><input type="text" name="n16" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 7.3 </td>
                    <td width="800">ด้านสาธารณูปโภค</td>
                    <td><input type="text" name="n17" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 7.4 </td>
                    <td width="800">ด้านห้องพิเศษ</td>
                    <td><input type="text" name="n18" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 7.5 </td>
                    <td width="800">ด้านการซ่อมบำรุงอุปกรณ์ต่างๆ</td>
                    <td><input type="text" name="n19" OnKeyPress="return chkNumber(this)"></td>
                  </tr>
                  <tr>
                    <td> 7.6 </td>
                    <td width="800">ด้านสภาพแวดล้อมในโรงเรียน</td>
                    <td><input type="text" name="n20" OnKeyPress="return chkNumber(this)">
                  </tr>
                  <tr>
                  	<td colspan="3"><button name="insert" class="form-control circle-bottom">เพิ่ม</button></td>
                  </tr>
                </tbody>
              </table>
              </form>
              <?php
			  include('mysql_connect.php');
			  
			  if(isset($_POST['insert'])){
				 $data = "'" . $_POST['n1'] . "',";
				 $data .= "'" . $_POST['n2'] . "',";
				 $data .= "'" . $_POST['n3'] . "',";
				 $data .= "'" . $_POST['n4'] . "',";
				 $data .= "'" . $_POST['n5'] . "',";
				 $data .= "'" . $_POST['n6'] . "',";
				 $data .= "'" . $_POST['n7'] . "',";
				 $data .= "'" . $_POST['n8'] . "',";
				 $data .= "'" . $_POST['n9'] . "',";
				 $data .= "'" . $_POST['n10'] . "',";
				 $data .= "'" . $_POST['n11'] . "',";
				 $data .= "'" . $_POST['n12'] . "',";
				 $data .= "'" . $_POST['n13'] . "',";
				 $data .= "'" . $_POST['n14'] . "',";
				 $data .= "'" . $_POST['n15'] . "',";
				 $data .= "'" . $_POST['n16'] . "',";
				 $data .= "'" . $_POST['n17'] . "',";
				 $data .= "'" . $_POST['n18'] . "',";
				 $data .= "'" . $_POST['n19'] . "',";
				 $data .= "'" . $_POST['n20'] . "',";
				 $data .= "'" . (date('Y') + 543) . "',";
				 $data .= "'" . $_SESSION['school_id'] . "'"; 
				 
				 $sql = "INSERT INTO budget
				 		(n1, n2, n3, n4, n5, n6, n7, n8, n9, n10, n11, n12, n13, n14, n15, n16, n17, n18, n19, n20, year, school_id)values($data)";
				 $result = mysqli_query($link, $sql);
				 
				 header('refresh: 1;url=schools.php');
			  }
			  mysqli_close($link);
			  ?>
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