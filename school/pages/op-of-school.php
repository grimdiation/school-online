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
$id = $_GET['id'];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<head>
<meta charset="utf-8" />
<title>ภาพรวมผู้ด้อยโอกาสของโรงเรยน <?php echo $data['school_name_th'] . " ปี " . $year; ?></title>
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
<span class="caption-subject font-dark bold uppercase">กราฟแสดงภาพรวมผู้ด้อยโอกาสของ<?php echo " โรงเรียน" . $data['school_name_th'] . " ปี " . $year; ?></span>
</div>
</div>

	<!-- ตารางแสดงจำนวนนักเรียน -->
    <table class="table-bordered table-hover" style="margin: 50px auto 50px auto;">
    	<thead style="text-align: center;background-color: deepskyblue;">
    	<tr>
        	<td>จำนวนนักเรียนทั้งหมด</td>
            <td>จำนวนนักเรียนที่ด้อยโอกาส</td>
    	</tr>
        </thead>
        <tbody style="text-align: center;">
        <?php
		$sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $_SESSION['school_id'] . "'";
		$result = mysqli_query($link, $sql);
		$data = mysqli_fetch_assoc($result);
		
		//กำหนดตัวแปร
		$CountStudent = $data['STUDENT'];// SQL เลือกจำนวนนักเรียนของขั้น ... ห้อง ...
		
		$sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $_SESSION['school_id'] . "' and (i1 or i2 or i3 or i4 or i5 or i6 or i7 or i8 or i9 or i10 or i11 or i12 or i13) = '1'";
		$result = mysqli_query($link, $sql);
		$data = mysqli_fetch_assoc($result);
		
		//กำหนดตัวแปร
		$CountDisabled = $data['STUDENT'];// SQL กำหนดจำนวนผู้พิการของชั้น ... ห้อง ...
		?>
        <tr>
        	<td><?php echo $CountStudent; ?></td>
            <td><?php echo $CountDisabled; ?></td>
        </tr>
    	</tbody>
    </table>

    <?php
    $sql = "SELECT SUM(i1) AS I1, SUM(i2) AS I2, SUM(i3) AS I3, SUM(i4) AS I4, SUM(i5) AS I5, SUM(i6) AS I6, SUM(i7) AS I7, SUM(i8) AS I8, SUM(i9) AS I9, SUM(i10) AS I10, SUM(i11) AS I11, SUM(i12) AS I12, SUM(i13) AS I13, COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $_SESSION['school_id'] . "' and year = '" . $year . "'";
    $result = mysqli_query($link, $sql);
    $op = mysqli_fetch_assoc($result);

    $i1 = $op['I1'];
    $i2 = $op['I2'];
    $i3 = $op['I3'];
    $i4 = $op['I4'];
    $i5 = $op['I5'];
    $i6 = $op['I6'];
    $i7 = $op['I7'];
    $i8 = $op['I8'];
    $i9 = $op['I9'];
    $i10 = $op['I10'];
    $i11 = $op['I11'];
    $i12 = $op['I12'];
    $i13 = $op['I13'];

    $SumO = $i1 + $i2 + $i3 + $i4 + $i5 + $i6 + $i7 + $i8 + $i9 + $i10 + $i11 + $i12 + $i13;

    $i1_persen = @(($i1 / $SumO) * 100);
    $i2_persen = @(($i2 / $SumO) * 100);
    $i3_persen = @(($i3 / $SumO) * 100);
    $i4_persen = @(($i4 / $SumO) * 100);
    $i5_persen = @(($i5 / $SumO) * 100);
    $i6_persen = @(($i6 / $SumO) * 100);
    $i7_persen = @(($i7 / $SumO) * 100);
    $i8_persen = @(($i8 / $SumO) * 100);
    $i9_persen = @(($i9 / $SumO) * 100);
    $i10_persen = @(($i10 / $SumO) * 100);
    $i11_persen = @(($i11 / $SumO) * 100);
    $i12_persen = @(($i12 / $SumO) * 100);
    $i13_persen = @(($i13 / $SumO) * 100);
    ?>
    <table width="40%" class="table-bordered table-hover" style="margin: 0 auto;">
        <thead style="background-color: deepskyblue;">
        <tr>
            <td width="5%" class="center">รหัส</td>
            <td width="55%" style="text-align: center;">ผู้ด้อยโอกาส</td>
            <td width="20%" style="text-align: center;" width="50">จำนวนความด้อยโอกาสทั้งหมด</td>
            <td width="20%" style="text-align: center;" width="50">เปอร์เซ็น(%)</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="center">I1</td>
            <td> เด็กถูกบังคับให้ขายแรงงาน </td>
            <td style="text-align: center;"> <?php echo $i1; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i1_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I2</td>
            <td> เด็กที่อยู่ในธุรกิจทางเพศ </td>
            <td style="text-align: center;"> <?php echo $i2; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i2_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I3</td>
            <td> เด็กที่ถูกทอดทิ้ง </td>
            <td style="text-align: center;"> <?php echo $i3; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i3_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I4</td>
            <td> เด็กในสถานพินิจและคุ้มครองเยาวชน </td>
            <td style="text-align: center;"> <?php echo $i4; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i4_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I5</td>
            <td> เด็กเร่ร่อน </td>
            <td style="text-align: center;"> <?php echo $i5; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i5_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I6</td>
            <td> ผลกระทบจากเอดส์ </td>
            <td style="text-align: center;"> <?php echo $i6; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i6_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I7</td>
            <td> ชนกลุ่มน้อย </td>
            <td style="text-align: center;"> <?php echo $i7; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i7_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I8</td>
            <td> เด็กที่ถูกทำร้ายทารุณ </td>
            <td style="text-align: center;"> <?php echo $i8; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i8_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I9</td>
            <td> เด็กยากจน </td>
            <td style="text-align: center;"> <?php echo $i9; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i9_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I10</td>
            <td> เด็กมีปัญหาเกี่ยวกับยาเสพติด </td>
            <td style="text-align: center;"> <?php echo $i10; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i10_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I11</td>
            <td> อื่นๆ </td>
            <td style="text-align: center;"> <?php echo $i11; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i11_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I12</td>
            <td> กำพร้า </td>
            <td style="text-align: center;"> <?php echo $i12; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i12_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        <tr>
            <td class="center">I13</td>
            <td> ทำงานรับผิดชอบตนเองและครอบครัว </td>
            <td style="text-align: center;"> <?php echo $i13; ?> </td>
            <td style="text-align: center;"> <?php echo number_format($i13_persen, 2, '.', ' ') . "%"; ?> </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td style="text-align: center;" colspan="2">รวม</td>
            <td style="text-align: center;"><?php echo $i1 + $i2 + $i3 + $i4 + $i5 + $i6 + $i7 + $i8 + $i9 + $i10 + $i11 + $i12 + $i13; ?></td>
            <td style="text-align: center;"><?php echo number_format($i1_persen + $i2_persen + $i3_persen + $i4_persen + $i5_persen + $i6_persen + $i7_persen + $i8_persen + $i9_persen + $i10_persen + $i11_persen + $i12_persen + $i13_persen, 2, '.', ' ') . "%"; ?></td>
        </tr>
        </tfoot>
    </table>
<!-- BEGIN CHART PORTLET-->
<div class="light">
<div class="portlet-title">
<div class="caption">
</div>
<div class="tools">
<a href="javascript:;" class="collapse"> </a>
<a href="#portlet-config" data-toggle="modal" class="config"> </a>
<a href="javascript:;" class="reload"> </a>
<a href="javascript:;" class="fullscreen"> </a>
<a href="javascript:;" class="remove"> </a>
</div>
</div>
<div class="portlet-body">
<div id="chart_5" class="chart" style="height: 400px;width: 100%;max-width: 650px;margin: 0 auto;"> </div>
<div class="well margin-top-20">
<div class="row">
<div class="col-sm-3">
<label class="text-left">Top Radius:</label>
<input class="chart_5_chart_input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01" /> </div>
<div class="col-sm-3">
<label class="text-left">Angle:</label>
<input class="chart_5_chart_input" data-property="angle" type="range" min="0" max="89" value="30" step="1" /> </div>
<div class="col-sm-3">
<label class="text-left">Depth:</label>
<input class="chart_5_chart_input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1" /> </div>
</div>
</div>
</div>
</div>
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
<script>
var ChartsAmcharts=function(){var e=function(){var e=AmCharts.makeChart("chart_1",{type:"serial",theme:"light",pathToImages:App.getGlobalPluginsPath()+"amcharts/amcharts/images/",autoMargins:!1,marginLeft:30,marginRight:8,marginTop:10,marginBottom:26,fontFamily:"Open Sans",color:"#888",dataProvider:[{year:2009,income:23.5,expenses:18.1},{year:2010,income:26.2,expenses:22.8},{year:2011,income:30.1,expenses:23.9},{year:2012,income:29.5,expenses:25.1},{year:2013,income:30.6,expenses:27.2,dashLengthLine:5},{year:2014,income:34.1,expenses:29.9,dashLengthColumn:5,alpha:.2,additional:"(projection)"}],valueAxes:[{axisAlpha:0,position:"left"}],startDuration:1,graphs:[{alphaField:"alpha",balloonText:"<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",dashLengthField:"dashLengthColumn",fillAlphas:1,title:"Income",type:"column",valueField:"income"},{balloonText:"<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",bullet:"round",dashLengthField:"dashLengthLine",lineThickness:3,bulletSize:7,bulletBorderAlpha:1,bulletColor:"#FFFFFF",useLineColorForBulletBorder:!0,bulletBorderThickness:3,fillAlphas:0,lineAlpha:1,title:"Expenses",valueField:"expenses"}],categoryField:"year",categoryAxis:{gridPosition:"start",axisAlpha:0,tickLength:0}});$("#chart_1").closest(".portlet").find(".fullscreen").click(function(){e.invalidateSize()})},t=function(){var e=AmCharts.makeChart("chart_2",{type:"serial",theme:"light",fontFamily:"Open Sans",color:"#888888",legend:{equalWidths:!1,useGraphSettings:!0,valueAlign:"left",valueWidth:120},dataProvider:[{date:"2012-01-01",distance:227,townName:"New York",townName2:"New York",townSize:25,latitude:40.71,duration:408},{date:"2012-01-02",distance:371,townName:"Washington",townSize:14,latitude:38.89,duration:482},{date:"2012-01-03",distance:433,townName:"Wilmington",townSize:6,latitude:34.22,duration:562},{date:"2012-01-04",distance:345,townName:"Jacksonville",townSize:7,latitude:30.35,duration:379},{date:"2012-01-05",distance:480,townName:"Miami",townName2:"Miami",townSize:10,latitude:25.83,duration:501},{date:"2012-01-06",distance:386,townName:"Tallahassee",townSize:7,latitude:30.46,duration:443},{date:"2012-01-07",distance:348,townName:"New Orleans",townSize:10,latitude:29.94,duration:405},{date:"2012-01-08",distance:238,townName:"Houston",townName2:"Houston",townSize:16,latitude:29.76,duration:309},{date:"2012-01-09",distance:218,townName:"Dalas",townSize:17,latitude:32.8,duration:287},{date:"2012-01-10",distance:349,townName:"Oklahoma City",townSize:11,latitude:35.49,duration:485},{date:"2012-01-11",distance:603,townName:"Kansas City",townSize:10,latitude:39.1,duration:890},{date:"2012-01-12",distance:534,townName:"Denver",townName2:"Denver",townSize:18,latitude:39.74,duration:810},{date:"2012-01-13",townName:"Salt Lake City",townSize:12,distance:425,duration:670,latitude:40.75,dashLength:8,alpha:.4},{date:"2012-01-14",latitude:36.1,duration:470,townName:"Las Vegas",townName2:"Las Vegas"},{date:"2012-01-15"},{date:"2012-01-16"},{date:"2012-01-17"},{date:"2012-01-18"},{date:"2012-01-19"}],valueAxes:[{id:"distanceAxis",axisAlpha:0,gridAlpha:0,position:"left",title:"distance"},{id:"latitudeAxis",axisAlpha:0,gridAlpha:0,labelsEnabled:!1,position:"right"},{id:"durationAxis",duration:"mm",durationUnits:{hh:"h ",mm:"min"},axisAlpha:0,gridAlpha:0,inside:!0,position:"right",title:"duration"}],graphs:[{alphaField:"alpha",balloonText:"[[value]] miles",dashLengthField:"dashLength",fillAlphas:.7,legendPeriodValueText:"total: [[value.sum]] mi",legendValueText:"[[value]] mi",title:"distance",type:"column",valueField:"distance",valueAxis:"distanceAxis"},{balloonText:"latitude:[[value]]",bullet:"round",bulletBorderAlpha:1,useLineColorForBulletBorder:!0,bulletColor:"#FFFFFF",bulletSizeField:"townSize",dashLengthField:"dashLength",descriptionField:"townName",labelPosition:"right",labelText:"[[townName2]]",legendValueText:"[[description]]/[[value]]",title:"latitude/city",fillAlphas:0,valueField:"latitude",valueAxis:"latitudeAxis"},{bullet:"square",bulletBorderAlpha:1,bulletBorderThickness:1,dashLengthField:"dashLength",legendValueText:"[[value]]",title:"duration",fillAlphas:0,valueField:"duration",valueAxis:"durationAxis"}],chartCursor:{categoryBalloonDateFormat:"DD",cursorAlpha:.1,cursorColor:"#000000",fullWidth:!0,valueBalloonsEnabled:!1,zoomable:!1},dataDateFormat:"YYYY-MM-DD",categoryField:"date",categoryAxis:{dateFormats:[{period:"DD",format:"DD"},{period:"WW",format:"MMM DD"},{period:"MM",format:"MMM"},{period:"YYYY",format:"YYYY"}],parseDates:!0,autoGridCount:!1,axisColor:"#555555",gridAlpha:.1,gridColor:"#FFFFFF",gridCount:50},exportConfig:{menuBottom:"20px",menuRight:"22px",menuItems:[{icon:App.getGlobalPluginsPath()+"amcharts/amcharts/images/export.png",format:"png"}]}});$("#chart_2").closest(".portlet").find(".fullscreen").click(function(){e.invalidateSize()})},a=function(){var e=AmCharts.makeChart("chart_3",{type:"serial",theme:"light",fontFamily:"Open Sans",color:"#888888",pathToImages:App.getGlobalPluginsPath()+"amcharts/amcharts/images/",dataProvider:[{lineColor:"#b7e021",date:"2012-01-01",duration:408},{date:"2012-01-02",duration:482},{date:"2012-01-03",duration:562},{date:"2012-01-04",duration:379},{lineColor:"#fbd51a",date:"2012-01-05",duration:501},{date:"2012-01-06",duration:443},{date:"2012-01-07",duration:405},{date:"2012-01-08",duration:309,lineColor:"#2498d2"},{date:"2012-01-09",duration:287},{date:"2012-01-10",duration:485},{date:"2012-01-11",duration:890},{date:"2012-01-12",duration:810}],balloon:{cornerRadius:6},valueAxes:[{duration:"mm",durationUnits:{hh:"h ",mm:"min"},axisAlpha:0}],graphs:[{bullet:"square",bulletBorderAlpha:1,bulletBorderThickness:1,fillAlphas:.3,fillColorsField:"lineColor",legendValueText:"[[value]]",lineColorField:"lineColor",title:"duration",valueField:"duration"}],chartScrollbar:{},chartCursor:{categoryBalloonDateFormat:"YYYY MMM DD",cursorAlpha:0,zoomable:!1},dataDateFormat:"YYYY-MM-DD",categoryField:"date",categoryAxis:{dateFormats:[{period:"DD",format:"DD"},{period:"WW",format:"MMM DD"},{period:"MM",format:"MMM"},{period:"YYYY",format:"YYYY"}],parseDates:!0,autoGridCount:!1,axisColor:"#555555",gridAlpha:0,gridCount:50}});$("#chart_3").closest(".portlet").find(".fullscreen").click(function(){e.invalidateSize()})},l=function(){var e=AmCharts.makeChart("chart_4",{type:"serial",theme:"light",handDrawn:!0,handDrawScatter:3,legend:{useGraphSettings:!0,markerSize:12,valueWidth:0,verticalGap:0},dataProvider:[{year:2005,income:23.5,expenses:18.1},{year:2006,income:26.2,expenses:22.8},{year:2007,income:30.1,expenses:23.9},{year:2008,income:29.5,expenses:25.1},{year:2009,income:24.6,expenses:25}],valueAxes:[{minorGridAlpha:.08,minorGridEnabled:!0,position:"top",axisAlpha:0}],startDuration:1,graphs:[{balloonText:"<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",title:"Income",type:"column",fillAlphas:.8,valueField:"income"},{balloonText:"<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",bullet:"round",bulletBorderAlpha:1,bulletColor:"#FFFFFF",useLineColorForBulletBorder:!0,fillAlphas:0,lineThickness:2,lineAlpha:1,bulletSize:7,title:"Expenses",valueField:"expenses"}],rotate:!0,categoryField:"year",categoryAxis:{gridPosition:"start"}});$("#chart_4").closest(".portlet").find(".fullscreen").click(function(){e.invalidateSize()})},o=function(){var e=AmCharts.makeChart("chart_5",{theme:"light",type:"serial",startDuration:2,fontFamily:"Open Sans",color:"#888",dataProvider:[{country:"I1",visits:<?php echo $i1; ?>,color:"#FF0F00"},{country:"I2",visits:<?php echo $i2; ?>,color:"#FF6600"},{country:"I3",visits:<?php echo $i3; ?>,color:"#FF9E01"},{country:"I4",visits:<?php echo $i4; ?>,color:"#FCD202"},{country:"I5",visits:<?php echo $i5; ?>,color:"#F8FF01"},{country:"I6",visits:<?php echo $i6; ?>,color:"#B0DE09"},{country:"I7",visits:<?php echo $i7; ?>,color:"#04D215"},{country:"I8",visits:<?php echo $i8; ?>,color:"#0D8ECF"},{country:"I9",visits:<?php echo $i9; ?>,color:"#0D52D1"},{country:"I10",visits:<?php echo $i10; ?>,color:"#2A0CD0"},{country:"I11",visits:<?php echo $i12; ?>,color:"#8A0CCF"},{country:"I13",visits:<?php echo $i13; ?>,color:"#CD0D74"}],valueAxes:[{position:"left",axisAlpha:0,gridAlpha:0}],graphs:[{balloonText:"[[category]]: <b>[[value]]</b>",colorField:"color",fillAlphas:.85,lineAlpha:.1,type:"column",topRadius:1,valueField:"visits"}],depth3D:40,angle:30,chartCursor:{categoryBalloonEnabled:!1,cursorAlpha:0,zoomable:!1},categoryField:"country",categoryAxis:{gridPosition:"start",axisAlpha:0,gridAlpha:0},exportConfig:{menuTop:"20px",menuRight:"20px",menuItems:[{icon:"/lib/3/images/export.png",format:"png"}]}},0);jQuery(".chart_5_chart_input").off().on("input change",function(){var t=jQuery(this).data("property"),a=e;e.startDuration=0,"topRadius"==t&&(a=e.graphs[0]),a[t]=this.value,e.validateNow()}),$("#chart_5").closest(".portlet").find(".fullscreen").click(function(){e.invalidateSize()})},i=function(){var e=AmCharts.makeChart("chart_6",{type:"pie",theme:"light",fontFamily:"Open Sans",color:"#888",dataProvider:[{country:"Lithuania",litres:501.9},{country:"Czech Republic",litres:301.9},{country:"Ireland",litres:201.1},{country:"Germany",litres:165.8},{country:"Australia",litres:139.9},{country:"Austria",litres:128.3},{country:"UK",litres:99},{country:"Belgium",litres:60},{country:"The Netherlands",litres:50}],valueField:"litres",titleField:"country",exportConfig:{menuItems:[{icon:App.getGlobalPluginsPath()+"amcharts/amcharts/images/export.png",format:"png"}]}});$("#chart_6").closest(".portlet").find(".fullscreen").click(function(){e.invalidateSize()})},d=function(){var e=AmCharts.makeChart("chart_7",{type:"pie",theme:"light",fontFamily:"Open Sans",color:"#888",dataProvider:[{country:"Lithuania",value:260},{country:"Ireland",value:201},{country:"Germany",value:65},{country:"Australia",value:39},{country:"UK",value:19},{country:"Latvia",value:10}],valueField:"value",titleField:"country",outlineAlpha:.4,depth3D:15,balloonText:"[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",angle:30,exportConfig:{menuItems:[{icon:"/lib/3/images/export.png",format:"png"}]}});jQuery(".chart_7_chart_input").off().on("input change",function(){var t=jQuery(this).data("property"),a=e,l=Number(this.value);e.startDuration=0,"innerRadius"==t&&(l+="%"),a[t]=l,e.validateNow()}),$("#chart_7").closest(".portlet").find(".fullscreen").click(function(){e.invalidateSize()})},n=function(){var e=AmCharts.makeChart("chart_8",{type:"radar",theme:"light",fontFamily:"Open Sans",color:"#888",dataProvider:[{direction:"N",value:8},{direction:"NE",value:9},{direction:"E",value:4.5},{direction:"SE",value:3.5},{direction:"S",value:9.2},{direction:"SW",value:8.4},{direction:"W",value:11.1},{direction:"NW",value:10}],valueAxes:[{gridType:"circles",minimum:0,autoGridCount:!1,axisAlpha:.2,fillAlpha:.05,fillColor:"#FFFFFF",gridAlpha:.08,guides:[{angle:225,fillAlpha:.3,fillColor:"#0066CC",tickLength:0,toAngle:315,toValue:14,value:0,lineAlpha:0},{angle:45,fillAlpha:.3,fillColor:"#CC3333",tickLength:0,toAngle:135,toValue:14,value:0,lineAlpha:0}],position:"left"}],startDuration:1,graphs:[{balloonText:"[[category]]: [[value]] m/s",bullet:"round",fillAlphas:.3,valueField:"value"}],categoryField:"direction"});$("#chart_8").closest(".portlet").find(".fullscreen").click(function(){e.invalidateSize()})},u=function(){var e=AmCharts.makeChart("chart_9",{type:"radar",theme:"light",fontFamily:"Open Sans",color:"#888",dataProvider:[{country:"Czech Republic",litres:156.9},{country:"Ireland",litres:131.1},{country:"Germany",litres:115.8},{country:"Australia",litres:109.9},{country:"Austria",litres:108.3},{country:"UK",litres:99}],valueAxes:[{axisTitleOffset:20,minimum:0,axisAlpha:.15}],startDuration:2,graphs:[{balloonText:"[[value]] litres of beer per year",bullet:"round",valueField:"litres"}],categoryField:"country",exportConfig:{menuTop:"10px",menuRight:"10px",menuItems:[{icon:"/lib/3/images/export.png",format:"png"}]}});$("#chart_9").closest(".portlet").find(".fullscreen").click(function(){e.invalidateSize()})},r=function(){var e={};e.AD={latitude:42.5,longitude:1.5},e.AE={latitude:24,longitude:54},e.AF={latitude:33,longitude:65},e.AG={latitude:17.05,longitude:-61.8},e.AI={latitude:18.25,longitude:-63.1667},e.AL={latitude:41,longitude:20},e.AM={latitude:40,longitude:45},e.AN={latitude:12.25,longitude:-68.75},e.AO={latitude:-12.5,longitude:18.5},e.AP={latitude:35,longitude:105},e.AQ={latitude:-90,longitude:0},e.AR={latitude:-34,longitude:-64},e.AS={latitude:-14.3333,longitude:-170},e.AT={latitude:47.3333,longitude:13.3333},e.AU={latitude:-27,longitude:133},e.AW={latitude:12.5,longitude:-69.9667},e.AZ={latitude:40.5,longitude:47.5},e.BA={latitude:44,longitude:18},e.BB={latitude:13.1667,longitude:-59.5333},e.BD={latitude:24,longitude:90},e.BE={latitude:50.8333,longitude:4},e.BF={latitude:13,longitude:-2},e.BG={latitude:43,longitude:25},e.BH={latitude:26,longitude:50.55},e.BI={latitude:-3.5,longitude:30},e.BJ={latitude:9.5,longitude:2.25},e.BM={latitude:32.3333,longitude:-64.75},e.BN={latitude:4.5,longitude:114.6667},e.BO={latitude:-17,longitude:-65},e.BR={latitude:-10,longitude:-55},e.BS={latitude:24.25,longitude:-76},e.BT={latitude:27.5,longitude:90.5},e.BV={latitude:-54.4333,longitude:3.4},e.BW={latitude:-22,longitude:24},e.BY={latitude:53,longitude:28},e.BZ={latitude:17.25,longitude:-88.75},e.CA={latitude:54,longitude:-100},e.CC={latitude:-12.5,longitude:96.8333},e.CD={latitude:0,longitude:25},e.CF={latitude:7,longitude:21},e.CG={latitude:-1,longitude:15},e.CH={latitude:47,longitude:8},e.CI={latitude:8,longitude:-5},e.CK={latitude:-21.2333,longitude:-159.7667},e.CL={latitude:-30,longitude:-71},e.CM={latitude:6,longitude:12},e.CN={latitude:35,longitude:105},e.CO={latitude:4,longitude:-72},e.CR={latitude:10,longitude:-84},e.CU={latitude:21.5,longitude:-80},e.CV={latitude:16,longitude:-24},e.CX={latitude:-10.5,longitude:105.6667},e.CY={latitude:35,longitude:33},e.CZ={latitude:49.75,longitude:15.5},e.DE={latitude:51,longitude:9},e.DJ={latitude:11.5,longitude:43},e.DK={latitude:56,longitude:10},e.DM={latitude:15.4167,longitude:-61.3333},e.DO={latitude:19,longitude:-70.6667},e.DZ={latitude:28,longitude:3},e.EC={latitude:-2,longitude:-77.5},e.EE={latitude:59,longitude:26},e.EG={latitude:27,longitude:30},e.EH={latitude:24.5,longitude:-13},e.ER={latitude:15,longitude:39},e.ES={latitude:40,longitude:-4},e.ET={latitude:8,longitude:38},e.EU={latitude:47,longitude:8},e.FI={latitude:62,longitude:26},e.FJ={latitude:-18,longitude:175},e.FK={latitude:-51.75,longitude:-59},e.FM={latitude:6.9167,longitude:158.25},e.FO={latitude:62,longitude:-7},e.FR={latitude:46,longitude:2},e.GA={latitude:-1,longitude:11.75},e.GB={latitude:54,longitude:-2},e.GD={latitude:12.1167,longitude:-61.6667},e.GE={latitude:42,longitude:43.5},e.GF={latitude:4,longitude:-53},e.GH={latitude:8,longitude:-2},e.GI={latitude:36.1833,longitude:-5.3667},e.GL={latitude:72,longitude:-40},e.GM={latitude:13.4667,longitude:-16.5667},e.GN={latitude:11,longitude:-10},e.GP={latitude:16.25,longitude:-61.5833},e.GQ={latitude:2,longitude:10},e.GR={latitude:39,longitude:22},e.GS={latitude:-54.5,longitude:-37},e.GT={latitude:15.5,longitude:-90.25},e.GU={latitude:13.4667,longitude:144.7833},e.GW={latitude:12,longitude:-15},e.GY={latitude:5,longitude:-59},e.HK={latitude:22.25,longitude:114.1667},e.HM={latitude:-53.1,longitude:72.5167},e.HN={latitude:15,longitude:-86.5},e.HR={latitude:45.1667,longitude:15.5},e.HT={latitude:19,longitude:-72.4167},e.HU={latitude:47,longitude:20},e.ID={latitude:-5,longitude:120},e.IE={latitude:53,longitude:-8},e.IL={latitude:31.5,longitude:34.75},e.IN={latitude:20,longitude:77},e.IO={latitude:-6,longitude:71.5},e.IQ={latitude:33,longitude:44},e.IR={latitude:32,longitude:53},e.IS={latitude:65,longitude:-18},e.IT={latitude:42.8333,longitude:12.8333},e.JM={latitude:18.25,longitude:-77.5},e.JO={latitude:31,longitude:36},e.JP={latitude:36,longitude:138},e.KE={latitude:1,longitude:38},e.KG={latitude:41,longitude:75},e.KH={latitude:13,longitude:105},e.KI={latitude:1.4167,longitude:173},e.KM={latitude:-12.1667,longitude:44.25},e.KN={latitude:17.3333,longitude:-62.75},e.KP={latitude:40,longitude:127},e.KR={latitude:37,longitude:127.5},e.KW={latitude:29.3375,longitude:47.6581},e.KY={latitude:19.5,longitude:-80.5},e.KZ={latitude:48,longitude:68},e.LA={latitude:18,longitude:105},e.LB={latitude:33.8333,longitude:35.8333},e.LC={latitude:13.8833,longitude:-61.1333},e.LI={latitude:47.1667,longitude:9.5333},e.LK={latitude:7,longitude:81},e.LR={latitude:6.5,longitude:-9.5},e.LS={latitude:-29.5,longitude:28.5},e.LT={latitude:55,longitude:24},e.LU={latitude:49.75,longitude:6},e.LV={latitude:57,longitude:25},e.LY={latitude:25,longitude:17},e.MA={latitude:32,longitude:-5},e.MC={latitude:43.7333,longitude:7.4},e.MD={latitude:47,longitude:29},e.ME={latitude:42.5,longitude:19.4},e.MG={latitude:-20,longitude:47},e.MH={latitude:9,longitude:168},e.MK={latitude:41.8333,longitude:22},e.ML={latitude:17,longitude:-4},e.MM={latitude:22,longitude:98},e.MN={latitude:46,longitude:105},e.MO={latitude:22.1667,longitude:113.55},e.MP={latitude:15.2,longitude:145.75},e.MQ={latitude:14.6667,longitude:-61},e.MR={latitude:20,longitude:-12},e.MS={latitude:16.75,longitude:-62.2},e.MT={latitude:35.8333,longitude:14.5833},e.MU={latitude:-20.2833,longitude:57.55},e.MV={latitude:3.25,longitude:73},e.MW={latitude:-13.5,longitude:34},e.MX={latitude:23,longitude:-102},e.MY={latitude:2.5,longitude:112.5},e.MZ={latitude:-18.25,longitude:35},e.NA={latitude:-22,longitude:17},e.NC={latitude:-21.5,longitude:165.5},e.NE={latitude:16,longitude:8},e.NF={latitude:-29.0333,longitude:167.95},e.NG={latitude:10,longitude:8},e.NI={latitude:13,longitude:-85},e.NL={latitude:52.5,longitude:5.75},e.NO={latitude:62,longitude:10},e.NP={latitude:28,longitude:84},e.NR={latitude:-.5333,longitude:166.9167},e.NU={latitude:-19.0333,longitude:-169.8667},e.NZ={latitude:-41,longitude:174},e.OM={latitude:21,longitude:57},e.PA={latitude:9,longitude:-80},e.PE={latitude:-10,longitude:-76},e.PF={latitude:-15,longitude:-140},e.PG={latitude:-6,longitude:147},e.PH={latitude:13,longitude:122},e.PK={latitude:30,longitude:70},e.PL={latitude:52,longitude:20},e.PM={latitude:46.8333,longitude:-56.3333},e.PR={latitude:18.25,longitude:-66.5},e.PS={latitude:32,longitude:35.25},e.PT={latitude:39.5,longitude:-8},e.PW={latitude:7.5,longitude:134.5},e.PY={latitude:-23,longitude:-58},e.QA={latitude:25.5,longitude:51.25},e.RE={latitude:-21.1,longitude:55.6},e.RO={latitude:46,longitude:25},e.RS={latitude:44,longitude:21},e.RU={latitude:60,longitude:100},e.RW={latitude:-2,longitude:30},e.SA={latitude:25,longitude:45},e.SB={latitude:-8,longitude:159},e.SC={latitude:-4.5833,longitude:55.6667},e.SD={latitude:15,longitude:30},e.SE={latitude:62,longitude:15},e.SG={latitude:1.3667,longitude:103.8},e.SH={latitude:-15.9333,longitude:-5.7},e.SI={latitude:46,longitude:15},e.SJ={latitude:78,longitude:20},e.SK={latitude:48.6667,longitude:19.5},e.SL={latitude:8.5,longitude:-11.5},e.SM={latitude:43.7667,longitude:12.4167},e.SN={latitude:14,longitude:-14},e.SO={latitude:10,longitude:49},e.SR={latitude:4,longitude:-56},e.ST={latitude:1,longitude:7},e.SV={latitude:13.8333,longitude:-88.9167},e.SY={latitude:35,longitude:38},e.SZ={latitude:-26.5,longitude:31.5},e.TC={latitude:21.75,longitude:-71.5833},e.TD={latitude:15,longitude:19},e.TF={latitude:-43,longitude:67},e.TG={latitude:8,longitude:1.1667},e.TH={latitude:15,longitude:100},e.TJ={latitude:39,longitude:71},e.TK={latitude:-9,longitude:-172},e.TM={latitude:40,longitude:60},e.TN={latitude:34,longitude:9},e.TO={latitude:-20,longitude:-175},e.TR={latitude:39,longitude:35},e.TT={latitude:11,longitude:-61},e.TV={latitude:-8,longitude:178},e.TW={latitude:23.5,longitude:121},e.TZ={latitude:-6,longitude:35},e.UA={latitude:49,longitude:32},e.UG={latitude:1,longitude:32},e.UM={latitude:19.2833,longitude:166.6},e.US={latitude:38,longitude:-97},e.UY={latitude:-33,longitude:-56},e.UZ={latitude:41,longitude:64},e.VA={latitude:41.9,longitude:12.45},e.VC={latitude:13.25,longitude:-61.2},e.VE={latitude:8,longitude:-66},e.VG={latitude:18.5,longitude:-64.5},e.VI={latitude:18.3333,longitude:-64.8333},e.VN={latitude:16,longitude:106},e.VU={latitude:-16,longitude:167},e.WF={latitude:-13.3,longitude:-176.2},e.WS={latitude:-13.5833,longitude:-172.3333},e.YE={latitude:15,longitude:48},e.YT={latitude:-12.8333,longitude:45.1667},e.ZA={latitude:-29,longitude:24},e.ZM={latitude:-15,longitude:30},e.ZW={latitude:-20,longitude:30};for(var t,a=[{code:"AF",name:"Afghanistan",value:32358260,color:"#eea638"},{code:"AL",name:"Albania",value:3215988,color:"#d8854f"},{code:"DZ",name:"Algeria",value:35980193,color:"#de4c4f"},{code:"AO",name:"Angola",value:19618432,color:"#de4c4f"},{code:"AR",name:"Argentina",value:40764561,color:"#86a965"},{code:"AM",name:"Armenia",value:3100236,color:"#d8854f"},{code:"AU",name:"Australia",value:22605732,color:"#8aabb0"},{code:"AT",name:"Austria",value:8413429,color:"#d8854f"},{code:"AZ",name:"Azerbaijan",value:9306023,color:"#d8854f"},{code:"BH",name:"Bahrain",value:1323535,color:"#eea638"},{code:"BD",name:"Bangladesh",value:150493658,color:"#eea638"},{code:"BY",name:"Belarus",value:9559441,color:"#d8854f"},{code:"BE",name:"Belgium",value:10754056,color:"#d8854f"},{code:"BJ",name:"Benin",value:9099922,color:"#de4c4f"},{code:"BT",name:"Bhutan",value:738267,color:"#eea638"},{code:"BO",name:"Bolivia",value:10088108,color:"#86a965"},{code:"BA",name:"Bosnia and Herzegovina",value:3752228,color:"#d8854f"},{code:"BW",name:"Botswana",value:2030738,color:"#de4c4f"},{code:"BR",name:"Brazil",value:196655014,color:"#86a965"},{code:"BN",name:"Brunei",value:405938,color:"#eea638"},{code:"BG",name:"Bulgaria",value:7446135,color:"#d8854f"},{code:"BF",name:"Burkina Faso",value:16967845,color:"#de4c4f"},{code:"BI",name:"Burundi",value:8575172,color:"#de4c4f"},{code:"KH",name:"Cambodia",value:14305183,color:"#eea638"},{code:"CM",name:"Cameroon",value:20030362,color:"#de4c4f"},{code:"CA",name:"Canada",value:34349561,color:"#a7a737"},{code:"CV",name:"Cape Verde",value:500585,color:"#de4c4f"},{code:"CF",name:"Central African Rep.",value:4486837,color:"#de4c4f"},{code:"TD",name:"Chad",value:11525496,color:"#de4c4f"},{code:"CL",name:"Chile",value:17269525,color:"#86a965"},{code:"CN",name:"China",value:1347565324,color:"#eea638"},{code:"CO",name:"Colombia",value:46927125,color:"#86a965"},{code:"KM",name:"Comoros",value:753943,color:"#de4c4f"},{code:"CD",name:"Congo, Dem. Rep.",value:67757577,color:"#de4c4f"},{code:"CG",name:"Congo, Rep.",value:4139748,color:"#de4c4f"},{code:"CR",name:"Costa Rica",value:4726575,color:"#a7a737"},{code:"CI",name:"Cote d'Ivoire",value:20152894,color:"#de4c4f"},{code:"HR",name:"Croatia",value:4395560,color:"#d8854f"},{code:"CU",name:"Cuba",value:11253665,color:"#a7a737"},{code:"CY",name:"Cyprus",value:1116564,color:"#d8854f"},{code:"CZ",name:"Czech Rep.",value:10534293,color:"#d8854f"},{code:"DK",name:"Denmark",value:5572594,color:"#d8854f"},{code:"DJ",name:"Djibouti",value:905564,color:"#de4c4f"},{code:"DO",name:"Dominican Rep.",value:10056181,color:"#a7a737"},{code:"EC",name:"Ecuador",value:14666055,color:"#86a965"},{code:"EG",name:"Egypt",value:82536770,color:"#de4c4f"},{code:"SV",name:"El Salvador",value:6227491,color:"#a7a737"},{code:"GQ",name:"Equatorial Guinea",value:720213,color:"#de4c4f"},{code:"ER",name:"Eritrea",value:5415280,color:"#de4c4f"},{code:"EE",name:"Estonia",value:1340537,color:"#d8854f"},{code:"ET",name:"Ethiopia",value:84734262,color:"#de4c4f"},{code:"FJ",name:"Fiji",value:868406,color:"#8aabb0"},{code:"FI",name:"Finland",value:5384770,color:"#d8854f"},{code:"FR",name:"France",value:63125894,color:"#d8854f"},{code:"GA",name:"Gabon",value:1534262,color:"#de4c4f"},{code:"GM",name:"Gambia",value:1776103,color:"#de4c4f"},{code:"GE",name:"Georgia",value:4329026,color:"#d8854f"},{code:"DE",name:"Germany",value:82162512,color:"#d8854f"},{code:"GH",name:"Ghana",value:24965816,color:"#de4c4f"},{code:"GR",name:"Greece",value:11390031,color:"#d8854f"},{code:"GT",name:"Guatemala",value:14757316,color:"#a7a737"},{code:"GN",name:"Guinea",value:10221808,color:"#de4c4f"},{code:"GW",name:"Guinea-Bissau",value:1547061,color:"#de4c4f"},{code:"GY",name:"Guyana",value:756040,color:"#86a965"},{code:"HT",name:"Haiti",value:10123787,color:"#a7a737"},{code:"HN",name:"Honduras",value:7754687,color:"#a7a737"},{code:"HK",name:"Hong Kong, China",value:7122187,color:"#eea638"},{code:"HU",name:"Hungary",value:9966116,color:"#d8854f"},{code:"IS",name:"Iceland",value:324366,color:"#d8854f"},{code:"IN",name:"India",value:1241491960,color:"#eea638"},{code:"ID",name:"Indonesia",value:242325638,color:"#eea638"},{code:"IR",name:"Iran",value:74798599,color:"#eea638"},{code:"IQ",name:"Iraq",value:32664942,color:"#eea638"},{code:"IE",name:"Ireland",value:4525802,color:"#d8854f"},{code:"IL",name:"Israel",value:7562194,color:"#eea638"},{code:"IT",name:"Italy",value:60788694,color:"#d8854f"},{code:"JM",name:"Jamaica",value:2751273,color:"#a7a737"},{code:"JP",name:"Japan",value:126497241,color:"#eea638"},{code:"JO",name:"Jordan",value:6330169,color:"#eea638"},{code:"KZ",name:"Kazakhstan",value:16206750,color:"#eea638"},{code:"KE",name:"Kenya",value:41609728,color:"#de4c4f"},{code:"KP",name:"Korea, Dem. Rep.",value:24451285,color:"#eea638"},{code:"KR",name:"Korea, Rep.",value:48391343,color:"#eea638"},{code:"KW",name:"Kuwait",value:2818042,color:"#eea638"},{code:"KG",name:"Kyrgyzstan",value:5392580,color:"#eea638"},{code:"LA",name:"Laos",value:6288037,color:"#eea638"},{code:"LV",name:"Latvia",value:2243142,color:"#d8854f"},{code:"LB",name:"Lebanon",value:4259405,color:"#eea638"},{code:"LS",name:"Lesotho",value:2193843,color:"#de4c4f"},{code:"LR",name:"Liberia",value:4128572,color:"#de4c4f"},{code:"LY",name:"Libya",value:6422772,color:"#de4c4f"},{code:"LT",name:"Lithuania",value:3307481,color:"#d8854f"},{code:"LU",name:"Luxembourg",value:515941,color:"#d8854f"},{code:"MK",name:"Macedonia, FYR",value:2063893,color:"#d8854f"},{code:"MG",name:"Madagascar",value:21315135,color:"#de4c4f"},{code:"MW",name:"Malawi",value:15380888,color:"#de4c4f"},{code:"MY",name:"Malaysia",value:28859154,color:"#eea638"},{code:"ML",name:"Mali",value:15839538,color:"#de4c4f"},{code:"MR",name:"Mauritania",value:3541540,color:"#de4c4f"},{code:"MU",name:"Mauritius",value:1306593,color:"#de4c4f"},{code:"MX",name:"Mexico",value:114793341,color:"#a7a737"},{code:"MD",name:"Moldova",value:3544864,color:"#d8854f"},{code:"MN",name:"Mongolia",value:2800114,color:"#eea638"},{code:"ME",name:"Montenegro",value:632261,color:"#d8854f"},{code:"MA",name:"Morocco",value:32272974,color:"#de4c4f"},{code:"MZ",name:"Mozambique",value:23929708,color:"#de4c4f"},{code:"MM",name:"Myanmar",value:48336763,color:"#eea638"},{code:"NA",name:"Namibia",value:2324004,color:"#de4c4f"},{code:"NP",name:"Nepal",value:30485798,color:"#eea638"},{code:"NL",name:"Netherlands",value:16664746,color:"#d8854f"},{code:"NZ",name:"New Zealand",value:4414509,color:"#8aabb0"},{code:"NI",name:"Nicaragua",value:5869859,color:"#a7a737"},{code:"NE",name:"Niger",value:16068994,color:"#de4c4f"},{code:"NG",name:"Nigeria",value:162470737,color:"#de4c4f"},{code:"NO",name:"Norway",value:4924848,color:"#d8854f"},{code:"OM",name:"Oman",value:2846145,color:"#eea638"},{code:"PK",name:"Pakistan",value:176745364,color:"#eea638"},{code:"PA",name:"Panama",value:3571185,color:"#a7a737"},{code:"PG",name:"Papua New Guinea",value:7013829,color:"#8aabb0"},{code:"PY",name:"Paraguay",value:6568290,color:"#86a965"},{code:"PE",name:"Peru",value:29399817,color:"#86a965"},{code:"PH",name:"Philippines",value:94852030,color:"#eea638"},{code:"PL",name:"Poland",value:38298949,color:"#d8854f"},{code:"PT",name:"Portugal",value:10689663,color:"#d8854f"},{code:"PR",name:"Puerto Rico",value:3745526,color:"#a7a737"},{code:"QA",name:"Qatar",value:1870041,color:"#eea638"},{code:"RO",name:"Romania",value:21436495,color:"#d8854f"},{code:"RU",name:"Russia",value:142835555,color:"#d8854f"},{code:"RW",name:"Rwanda",value:10942950,color:"#de4c4f"},{code:"SA",name:"Saudi Arabia",value:28082541,color:"#eea638"},{code:"SN",name:"Senegal",value:12767556,color:"#de4c4f"},{code:"RS",name:"Serbia",value:9853969,color:"#d8854f"},{code:"SL",name:"Sierra Leone",value:5997486,color:"#de4c4f"},{code:"SG",name:"Singapore",value:5187933,color:"#eea638"},{code:"SK",name:"Slovak Republic",value:5471502,color:"#d8854f"},{code:"SI",name:"Slovenia",value:2035012,color:"#d8854f"},{code:"SB",name:"Solomon Islands",value:552267,color:"#8aabb0"},{code:"SO",name:"Somalia",value:9556873,color:"#de4c4f"},{code:"ZA",name:"South Africa",value:50459978,color:"#de4c4f"},{code:"ES",name:"Spain",value:46454895,color:"#d8854f"},{code:"LK",name:"Sri Lanka",value:21045394,color:"#eea638"},{code:"SD",name:"Sudan",value:34735288,color:"#de4c4f"},{code:"SR",name:"Suriname",value:529419,color:"#86a965"},{code:"SZ",name:"Swaziland",value:1203330,color:"#de4c4f"},{code:"SE",name:"Sweden",value:9440747,color:"#d8854f"},{code:"CH",name:"Switzerland",value:7701690,color:"#d8854f"},{code:"SY",name:"Syria",value:20766037,color:"#eea638"},{code:"TW",name:"Taiwan",value:23072e3,color:"#eea638"},{code:"TJ",name:"Tajikistan",value:6976958,color:"#eea638"},{code:"TZ",name:"Tanzania",value:46218486,color:"#de4c4f"},{code:"TH",name:"Thailand",value:69518555,color:"#eea638"},{code:"TG",name:"Togo",value:6154813,color:"#de4c4f"},{code:"TT",name:"Trinidad and Tobago",value:1346350,color:"#a7a737"},{code:"TN",name:"Tunisia",value:10594057,color:"#de4c4f"},{code:"TR",name:"Turkey",value:73639596,color:"#d8854f"},{code:"TM",name:"Turkmenistan",value:5105301,color:"#eea638"},{code:"UG",name:"Uganda",value:34509205,color:"#de4c4f"},{code:"UA",name:"Ukraine",value:45190180,color:"#d8854f"},{code:"AE",name:"United Arab Emirates",value:7890924,color:"#eea638"},{code:"GB",name:"United Kingdom",value:62417431,color:"#d8854f"},{code:"US",name:"United States",value:313085380,color:"#a7a737"},{code:"UY",name:"Uruguay",value:3380008,color:"#86a965"},{code:"UZ",name:"Uzbekistan",value:27760267,color:"#eea638"},{code:"VE",name:"Venezuela",value:29436891,color:"#86a965"},{code:"PS",name:"West Bank and Gaza",value:4152369,color:"#eea638"},{code:"VN",name:"Vietnam",value:88791996,color:"#eea638"},{code:"YE",name:"Yemen, Rep.",value:24799880,color:"#eea638"},{code:"ZM",name:"Zambia",value:13474959,color:"#de4c4f"},{code:"ZW",name:"Zimbabwe",value:12754378,color:"#de4c4f"}],l=3,o=70,i=1/0,d=-(1/0),n=0;n<a.length;n++){var u=a[n].value;i>u&&(i=u),u>d&&(d=u)}AmCharts.ready(function(){AmCharts.theme=AmCharts.themes.dark,t=new AmCharts.AmMap,t.pathToImages=App.getGlobalPluginsPath()+"amcharts/ammap/images/",t.fontFamily="Open Sans",t.fontSize="13",t.color="#888",t.addTitle("Population of the World in 2011",14),t.addTitle("source: Gapminder",11),t.areasSettings={unlistedAreasColor:"#000000",unlistedAreasAlpha:.1},t.imagesSettings.balloonText="<span style='font-size:14px;'><b>[[title]]</b>: [[value]]</span>";for(var n={mapVar:AmCharts.maps.worldLow,images:[]},u=0;u<a.length;u++){var r=a[u],c=r.value,s=(c-i)/(d-i)*(o-l)+l;l>s&&(s=l);var g=r.code;n.images.push({type:"circle",width:s,height:s,color:r.color,longitude:e[g].longitude,latitude:e[g].latitude,title:r.name,value:c})}t.dataProvider=n,t.write("chart_10")}),$("#chart_10").closest(".portlet").find(".fullscreen").click(function(){t.invalidateSize()})},c=function(){var e="M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z",t="M19.671,8.11l-2.777,2.777l-3.837-0.861c0.362-0.505,0.916-1.683,0.464-2.135c-0.518-0.517-1.979,0.278-2.305,0.604l-0.913,0.913L7.614,8.804l-2.021,2.021l2.232,1.061l-0.082,0.082l1.701,1.701l0.688-0.687l3.164,1.504L9.571,18.21H6.413l-1.137,1.138l3.6,0.948l1.83,1.83l0.947,3.598l1.137-1.137V21.43l3.725-3.725l1.504,3.164l-0.687,0.687l1.702,1.701l0.081-0.081l1.062,2.231l2.02-2.02l-0.604-2.689l0.912-0.912c0.326-0.326,1.121-1.789,0.604-2.306c-0.452-0.452-1.63,0.101-2.135,0.464l-0.861-3.838l2.777-2.777c0.947-0.947,3.599-4.862,2.62-5.839C24.533,4.512,20.618,7.163,19.671,8.11z",a=AmCharts.makeChart("chart_11",{
type:"map",theme:"light",pathToImages:App.getGlobalPluginsPath()+"amcharts/ammap/images/",fontFamily:"Open Sans",color:"#888",dataProvider:{map:"worldLow",linkToObject:"london",images:[{id:"london",color:"#000000",svgPath:e,title:"London",latitude:51.5002,longitude:-.1262,scale:1.5,zoomLevel:2.74,zoomLongitude:-20.1341,zoomLatitude:49.1712,lines:[{latitudes:[51.5002,50.4422],longitudes:[-.1262,30.5367]},{latitudes:[51.5002,46.948],longitudes:[-.1262,7.4481]},{latitudes:[51.5002,59.3328],longitudes:[-.1262,18.0645]},{latitudes:[51.5002,40.4167],longitudes:[-.1262,-3.7033]},{latitudes:[51.5002,46.0514],longitudes:[-.1262,14.506]},{latitudes:[51.5002,48.2116],longitudes:[-.1262,17.1547]},{latitudes:[51.5002,44.8048],longitudes:[-.1262,20.4781]},{latitudes:[51.5002,55.7558],longitudes:[-.1262,37.6176]},{latitudes:[51.5002,38.7072],longitudes:[-.1262,-9.1355]},{latitudes:[51.5002,54.6896],longitudes:[-.1262,25.2799]},{latitudes:[51.5002,64.1353],longitudes:[-.1262,-21.8952]},{latitudes:[51.5002,40.43],longitudes:[-.1262,-74]}],images:[{label:"Flights from London",svgPath:t,left:100,top:45,labelShiftY:5,color:"#CC0000",labelColor:"#CC0000",labelRollOverColor:"#CC0000",labelFontSize:20},{label:"show flights from Vilnius",left:106,top:70,labelColor:"#000000",labelRollOverColor:"#CC0000",labelFontSize:11,linkToObject:"vilnius"}]},{id:"vilnius",color:"#000000",svgPath:e,title:"Vilnius",latitude:54.6896,longitude:25.2799,scale:1.5,zoomLevel:4.92,zoomLongitude:15.4492,zoomLatitude:50.2631,lines:[{latitudes:[54.6896,50.8371],longitudes:[25.2799,4.3676]},{latitudes:[54.6896,59.9138],longitudes:[25.2799,10.7387]},{latitudes:[54.6896,40.4167],longitudes:[25.2799,-3.7033]},{latitudes:[54.6896,50.0878],longitudes:[25.2799,14.4205]},{latitudes:[54.6896,48.2116],longitudes:[25.2799,17.1547]},{latitudes:[54.6896,44.8048],longitudes:[25.2799,20.4781]},{latitudes:[54.6896,55.7558],longitudes:[25.2799,37.6176]},{latitudes:[54.6896,37.9792],longitudes:[25.2799,23.7166]},{latitudes:[54.6896,54.6896],longitudes:[25.2799,25.2799]},{latitudes:[54.6896,51.5002],longitudes:[25.2799,-.1262]},{latitudes:[54.6896,53.3441],longitudes:[25.2799,-6.2675]}],images:[{label:"Flights from Vilnius",svgPath:t,left:100,top:45,labelShiftY:5,color:"#CC0000",labelColor:"#CC0000",labelRollOverColor:"#CC0000",labelFontSize:20},{label:"show flights from London",left:106,top:70,labelColor:"#000000",labelRollOverColor:"#CC0000",labelFontSize:11,linkToObject:"london"}]},{svgPath:e,title:"Brussels",latitude:50.8371,longitude:4.3676},{svgPath:e,title:"Prague",latitude:50.0878,longitude:14.4205},{svgPath:e,title:"Athens",latitude:37.9792,longitude:23.7166},{svgPath:e,title:"Reykjavik",latitude:64.1353,longitude:-21.8952},{svgPath:e,title:"Dublin",latitude:53.3441,longitude:-6.2675},{svgPath:e,title:"Oslo",latitude:59.9138,longitude:10.7387},{svgPath:e,title:"Lisbon",latitude:38.7072,longitude:-9.1355},{svgPath:e,title:"Moscow",latitude:55.7558,longitude:37.6176},{svgPath:e,title:"Belgrade",latitude:44.8048,longitude:20.4781},{svgPath:e,title:"Bratislava",latitude:48.2116,longitude:17.1547},{svgPath:e,title:"Ljubljana",latitude:46.0514,longitude:14.506},{svgPath:e,title:"Madrid",latitude:40.4167,longitude:-3.7033},{svgPath:e,title:"Stockholm",latitude:59.3328,longitude:18.0645},{svgPath:e,title:"Bern",latitude:46.948,longitude:7.4481},{svgPath:e,title:"Kiev",latitude:50.4422,longitude:30.5367},{svgPath:e,title:"Paris",latitude:48.8567,longitude:2.351},{svgPath:e,title:"New York",latitude:40.43,longitude:-74}]},areasSettings:{unlistedAreasColor:"#FFCC00"},imagesSettings:{color:"#CC0000",rollOverColor:"#CC0000",selectedColor:"#000000"},linesSettings:{color:"#CC0000",alpha:.4},backgroundZoomsToTop:!0,linesAboveImages:!0});$("#chart_11").closest(".portlet").find(".fullscreen").click(function(){a.invalidateSize()})},s=function(){function e(){var e=new Date(2012,0,1);e.setDate(e.getDate()-500),e.setHours(0,0,0,0);for(var a=0;500>a;a++){var l=new Date(e);l.setDate(l.getDate()+a);var o=Math.round(Math.random()*(40+a))+100+a,i=Math.round(1e8*Math.random());t.push({date:l,value:o,volume:i})}}var t=[];e();var a=AmCharts.makeChart("chart_12",{type:"stock",theme:"light",pathToImages:App.getGlobalPluginsPath()+"amcharts/amcharts/images/",fontFamily:"Open Sans",color:"#888",dataSets:[{color:"#b0de09",fieldMappings:[{fromField:"value",toField:"value"},{fromField:"volume",toField:"volume"}],dataProvider:t,categoryField:"date",stockEvents:[{date:new Date(2010,8,19),type:"sign",backgroundColor:"#85CDE6",graph:"g1",text:"S",description:"This is description of an event"},{date:new Date(2010,10,19),type:"flag",backgroundColor:"#FFFFFF",backgroundAlpha:.5,graph:"g1",text:"F",description:"Some longerntext can alson be added"},{date:new Date(2010,11,10),showOnAxis:!0,backgroundColor:"#85CDE6",type:"pin",text:"X",graph:"g1",description:"This is description of an event"},{date:new Date(2010,11,26),showOnAxis:!0,backgroundColor:"#85CDE6",type:"pin",text:"Z",graph:"g1",description:"This is description of an event"},{date:new Date(2011,0,3),type:"sign",backgroundColor:"#85CDE6",graph:"g1",text:"U",description:"This is description of an event"},{date:new Date(2011,1,6),type:"sign",graph:"g1",text:"D",description:"This is description of an event"},{date:new Date(2011,3,5),type:"sign",graph:"g1",text:"L",description:"This is description of an event"},{date:new Date(2011,3,5),type:"sign",graph:"g1",text:"R",description:"This is description of an event"},{date:new Date(2011,5,15),type:"arrowUp",backgroundColor:"#00CC00",graph:"g1",description:"This is description of an event"},{date:new Date(2011,6,25),type:"arrowDown",backgroundColor:"#CC0000",graph:"g1",description:"This is description of an event"},{date:new Date(2011,8,1),type:"text",graph:"g1",text:"Longer text can\nalso be displayed",description:"This is description of an event"}]}],panels:[{title:"Value",percentHeight:70,stockGraphs:[{id:"g1",valueField:"value"}],stockLegend:{valueTextRegular:" ",markerType:"none"}}],chartScrollbarSettings:{graph:"g1"},chartCursorSettings:{valueBalloonsEnabled:!0,graphBulletSize:1,valueLineBalloonEnabled:!0,valueLineEnabled:!0,valueLineAlpha:.5},periodSelector:{periods:[{period:"DD",count:10,label:"10 days"},{period:"MM",count:1,label:"1 month"},{period:"YYYY",count:1,label:"1 year"},{period:"YTD",label:"YTD"},{period:"MAX",label:"MAX"}]},panelsSettings:{usePrefixes:!0}});$("#chart_12").closest(".portlet").find(".fullscreen").click(function(){a.invalidateSize()})};return{init:function(){e(),t(),a(),l(),o(),i(),d(),n(),u(),r(),c(),s()}}}();jQuery(document).ready(function(){ChartsAmcharts.init()});
</script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>