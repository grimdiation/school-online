<?php
session_start();
ob_start();
include('autoload.php');
include('mysql_connect.php');
error_reporting( error_reporting() & ~E_NOTICE );
$sql = "SELECT school_name_th FROM school WHERE school_id = '" . $_SESSION['school_id'] . "'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_assoc($result);

$year = $_POST['year'];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<head>
<meta charset="utf-8" />
<title>งบประมาณโรงเรียน <?php echo $data['school_name_th'] . " ปี " . $year; ?></title>
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

<!-- BEGIN THEME GLOBAL STYLES -->
<link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->

<!-- BEGIN THEME LAYOUT STYLES -->
<link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<style>
.center {
	text-align: center;
}
</style>
<body>
<!-- BEGIN CONTAINER -->
<!-- BEGIN BORDERED TABLE PORTLET-->
<div class="portlet light">
<div class="portlet-title">
<div class="caption">
<i class="icon-bubble font-dark"></i>
<span class="caption-subject font-dark bold uppercase">งบประมาณ<?php echo "โรงเรียน" . $data['school_name_th'] . " ปี " . $year; ?></span>
</div>
</div>
<?php
	$SQL = "SELECT * FROM budget WHERE year = '" . $year . "'";
	$RESULT = mysqli_query($link, $SQL);
	$data = mysqli_fetch_array($RESULT);
	$d1 = $data['n1'];
	$d2 = $data['n2'];
	$d3 = $data['n3'];
	$d4 = $data['n4'];
	$d5 = $data['n5'];
	$d6 = $data['n6'];
	$d7 = $data['n7'];
	$d8 = $data['n8'];
	$d9 = $data['n9'];
	$d10 = $data['n10'];
	$d11 = $data['n11'];
	$d12 = $data['n12'];
	$d13 = $data['n13'];
	$d14 = $data['n14'];
	$d15 = $data['n15'];
	$d16 = $data['n16'];
	$d17 = $data['n17'];
	$d18 = $data['n18'];
	$d19 = $data['n19'];
	$d20 = $data['n20'];
?>
<table width="40%" class="table-bordered table-hover" style="margin: 0 auto;">
<thead>
<tr>
<th class="center" width="60%">งบประมาณ</th>
<th class="center" width="40%">จำนวนเงิน</th>
</tr>
</thead>
<tbody>
<tr>
<td> 1. งบดำเนินการ </td>
<td class="center"> <?php echo $d1; ?> </td>
</tr>
<tr>
<td> 2. งบอาหารและการเข้าค่าย </td>
<td class="center"> <?php echo $d2; ?> </td>
</tr>
<tr>
<td> 3. ค่าประกันอุบัติเหตุและตรวจสุขภาพ </td>
<td class="center"> <?php echo $d3; ?> </td>
</tr>
<tr>
<td> 4. งบพัฒนาคุณภาพทางการศึกษา </td>
<td class="center"> <?php echo $d4; ?> </td>
</tr>
<tr>
<td> 5. งบช่วยเหลือทางการศึกษา </td>
<td></td>
</tr>
<tr>
<td> 5.1 ค่าหนังสือเรียน </td>
<td class="center"> <?php echo $d5; ?> </td>
</tr>
<tr>
<td> 5.2 ค่าเครื่องแบบนักเรียน </td>
<td class="center"> <?php echo $d6; ?> </td>
</tr>
<tr>
<td> 5.3 ค่าอุปกรณ์การเรียน </td>
<td class="center"> <?php echo $d7; ?> </td>
</tr>
<tr>
<td> 5.4 ค่าอาหารกลางวัน </td>
<td class="center"> <?php echo $d8; ?> </td>
</tr>
<tr>
<td> 6. งบโครงการ แผนงาน และแผลปฏิบัติงานราชการ </td>
<td></td>
</tr>
<tr>
<td> 6.1 งบบริหารวิชาการ </td>
<td class="center"> <?php echo $d9; ?> </td>
</tr>
<tr>
<td> 6.2 งบบริหารฝ่ายบุคคล </td>
<td class="center"> <?php echo $d10; ?> </td>
</tr>
<tr>
<td> 6.3 งบบริหารงานทั่วไป </td>
<td class="center"> <?php echo $d11; ?> </td>
</tr>
<tr>
<td> 6.4 งบบริหารงานนโยบายและแผนงาน </td>
<td class="center"> <?php echo $d12; ?> </td>
</tr>
<tr>
<td> 6.5 งบบริหารงานกิจกรรม </td>
<td class="center"> <?php echo $d13; ?> </td>
</tr>
<tr>
<td> 6.6 งบบริหารงานสวัสดิการ </td>
<td class="center"> <?php echo $d14; ?> </td>
</tr>
<tr>
<td> 7. งบอาคารสถานที่ และทรัพยากร </td>
<td class="center">  </td>
</tr>
<tr>
<td> 7.1 ด้านอาคารเรียน </td>
<td class="center"> <?php echo $d15; ?> </td>
</tr>
<tr>
<td> 7.2 ด้านห้องเรียน </td>
<td class="center"> <?php echo $d16; ?> </td>
</tr>
<tr>
<td> 7.3 ด้านสาธารณูปโภค </td>
<td class="center"> <?php echo $d17; ?> </td>
</tr>
<tr>
<td> 7.4 ด้านห้องพิเศษ </td>
<td class="center"> <?php echo $d18; ?> </td>
</tr>
<tr>
<td> 7.5 ด้านการซ่อมบำรุงอุปกรณ์ต่างๆ </td>
<td class="center"> <?php echo $d19; ?> </td>
</tr>
<tr>
<td> 7.6 ด้านสภาพแวดล้อมในโรงเรียน </td>
<td class="center"> <?php echo $d20; ?> </td>
</tr>
</tbody>
<tfoot>
<td class="center">รวม</td>
<?php
$d = $d1 + $d2 + $d3 + $d4 + $d5 + $d6 + $d7 + $d8 + $d9 + $d10 + $d11 + $d12 + $d13 + $d14 + $d15 + $d16 + $d17 + $d18 + $d19 + $d20;
?>
<td class="center"><?php echo $d; ?></td>
</tfoot>
</table>
<!-- BEGIN CHART PORTLET-->
<!-- END CHART PORTLET-->
</div>
<!-- END BORDERED TABLE PORTLET-->
<!-- END CONTAINER -->

<!--[if lt IE 9] -->
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>