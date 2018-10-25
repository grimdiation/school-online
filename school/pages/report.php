<?php include('mysql_connect.php'); ?>
<html>
<head>
<meta charset="utf-8">
<title>O-NET</title>
<style>
page[size="A4"] {
  background: white;
  width: 21cm;
  height: 29.7cm;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
}
</style>
</head>
<body>
<page size="A4">
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM student inner join school on student.school_id = school.school_id WHERE student.id_card = '$id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result);
$Class = $data['class']
?>
		<div style="padding: 60px;text-align: center;">
			<img src="<?php echo $data['img']; ?>" width="100" style="float: left;">โรงเรียน <label><?php echo $data['school_name_th']; ?></label><br style="float: left;">
<hr style="margin-top: 40px;margin-bottom: 40px;">
<div style="text-align:center;margin-bottom: 30px;"><b>ผลการทดสอบทางการศึกษาระดับชาติขั้นพื้นฐาน(O-NET)</b></div>
<table style="border-collapse: collapse;" border="1" align="center">
<tr>
<th colspan="6">ONET ระดับชั้น <?php echo $Class; ?></th>
</tr>
<tr>
<th width="300">กลุ่มสาระการเรียนรู้</th>
<th width="100">คะแนนเต็ม</th>
<th width="100">คะแนน O-NET ที่ได้</th>
<th width="100">ระดับคะแนน</th>
<th width="200">ค่าน้ำหนักของรายวิชาพื้นฐาน</th>
<th width="200">ผลคูณระดับคะแนน O-NET กับค่าน้ำหนัก</th>
</tr>
<?php
$sql = "SELECT * FROM onet INNER JOIN student ON onet.id_card = student.id_card WHERE onet.id_card = '" . $id . "' and student.class = '" . $Class . "' and onet.subject = 'ภาษาไทย'";
$result = mysqli_query($link, $sql);
$thai = mysqli_fetch_array($result);
?>
<tr>
<td>ภาษาไทย</td>
<td align="center"><?php echo @($thai['max_score']); ?></td>
<td align="center"><?php echo @($thai['score']); ?></td>
<td align="center"><?php echo @($thai['level']); ?></td>
<td align="center">9</td>
<?php
$SumThai = @number_format(($thai['level'] * 9), 2, '.', ' ');
?>
<td align="center"><?php echo $SumThai; ?></td>
</tr>
<tr>
<?php
$sql = "SELECT * FROM onet INNER JOIN student ON onet.id_card = student.id_card WHERE onet.id_card = '" . $id . "' and student.class = '" . $Class . "' and onet.subject = 'คณิตศาสตร์'";
$result = mysqli_query($link, $sql);
$math = mysqli_fetch_array($result);
?>
<td>คณิตศาสตร์</td>
<td align="center"><?php echo @($math['max_score']); ?></td>
<td align="center"><?php echo @($math['score']); ?></td>
<td align="center"><?php echo @($math['level']); ?></td>
<td align="center">9</td>
<?php
$SumMath = @number_format(($math['level'] * 9), 2, '.', ' ');
?>
<td align="center"><?php echo $SumMath; ?></td>
</tr>
<tr>
<?php
$sql = "SELECT * FROM onet INNER JOIN student ON onet.id_card = student.id_card WHERE onet.id_card = '" . $id . "' and student.class = '" . $Class . "' and onet.subject = 'วิทยาศาสตร์'";
$result = mysqli_query($link, $sql);
$Scien = mysqli_fetch_array($result);
?>
<td>วิทยาศาสตร์</td>
<td align="center"><?php echo @($Scien['max_score']); ?></td>
<td align="center"><?php echo @($Scien['score']); ?></td>
<td align="center"><?php echo @($Scien['level']); ?></td>
<td align="center">9</td>
<?php
$SumScien = @number_format(($Scien['level'] * 9), 2, '.', ' ');
?>
<td align="center"><?php echo $SumScien; ?></td>
</tr>
<tr>
<?php
$sql = "SELECT * FROM onet INNER JOIN student ON onet.id_card = student.id_card WHERE onet.id_card = '" . $id . "' and student.class = '" . $Class . "' and onet.subject = 'ศิลปะ'";
$result = mysqli_query($link, $sql);
$Art = mysqli_fetch_array($result);
?>
<td>ศิลปะ</td>
<td align="center"><?php echo @($Art['max_score']); ?></td>
<td align="center"><?php echo @($Art['score']); ?></td>
<td align="center"><?php echo @($Art['level']); ?></td>
<td align="center">6</td>
<?php
$SumArt = @number_format(($Art['level'] * 6), 2, '.', ' ');
?>
<td align="center"><?php echo $SumArt; ?></td>
</tr>
<tr>
<?php
$sql = "SELECT * FROM onet INNER JOIN student ON onet.id_card = student.id_card WHERE onet.id_card = '" . $id . "' and student.class = '" . $Class . "' and onet.subject = 'การงานอาชีพและเทคโนโลยี'";
$result = mysqli_query($link, $sql);
$Career = mysqli_fetch_array($result);
?>
<td>การงานอาชีพและเทคโนโลยี</td>
<td align="center"><?php echo @($Career['max_score']); ?></td>
<td align="center"><?php echo @($Career['score']); ?></td>
<td align="center"><?php echo @($Career['level']); ?></td>
<td align="center">6</td>
<?php
$SumCareer = @number_format(($Career['level'] * 6), 2, '.', ' ');
?>
<td align="center"><?php echo $SumCareer; ?></td>
</tr>
<tr>
<?php
$sql = "SELECT * FROM onet INNER JOIN student ON onet.id_card = student.id_card WHERE onet.id_card = '" . $id . "' and student.class = '" . $Class . "' and onet.subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม'";
$result = mysqli_query($link, $sql);
$Social = mysqli_fetch_array($result);
?>
<td>สังคมศึกษา ศาสนา และวัฒนธรรม</td>
<td align="center"><?php echo @($Social['max_score']); ?></td>
<td align="center"><?php echo @($Social['score']); ?></td>
<td align="center"><?php echo @($Social['level']); ?></td>
<td align="center">12</td>
<?php
$SumSocial = @number_format(($Social['level'] * 12), 2, '.', ' ');
?>
<td align="center"><?php echo $SumSocial; ?></td>
</tr>
<tr>
<?php
$sql = "SELECT * FROM onet INNER JOIN student ON onet.id_card = student.id_card WHERE onet.id_card = '" . $id . "' and student.class = '" . $Class . "' and onet.subject = 'ภาษาอังกฤษ'";
$result = mysqli_query($link, $sql);
$English = mysqli_fetch_array($result);
?>
<td>ภาษาอังกฤษ</td>
<td align="center"><?php echo @($English['max_score']); ?></td>
<td align="center"><?php echo @($English['score']); ?></td>
<td align="center"><?php echo @($English['level']); ?></td>
<td align="center">9</td>
<?php
$SumEnglish = @number_format(($English['level'] * 9), 2, '.', ' ');
?>
<td align="center"><?php echo $SumEnglish; ?></td>
</tr>
<tr>
<?php
$sql = "SELECT * FROM onet INNER JOIN student ON onet.id_card = student.id_card WHERE onet.id_card = '" . $id . "' and student.class = '" . $Class . "' and onet.subject = 'สุขศึกษาและพลศึกษา'";
$result = mysqli_query($link, $sql);
$Health = mysqli_fetch_array($result);
?>
<td>สุขศึกษาและพลศึกษา</td>
<td align="center"><?php echo @($Health['max_score']); ?></td>
<td align="center"><?php echo @($Health['score']); ?></td>
<td align="center"><?php echo @($Health['level']); ?></td>
<td align="center">6</td>
<?php
$SumHealth = @number_format(($Health['level'] * 6), 2, '.', ' ');
?>
<td align="center"><?php echo $SumHealth; ?></td>
</tr>
<tr>
<td align="center">รวม</td>
<td align="center"><?php echo $thai['max_score'] + $math['max_score'] + $Scien['max_score'] + $Art['max_score'] + $Career['max_score'] + $Social['max_score'] + $English['max_score'] + $Health['max_score'];?></td>
<td align="center"><?php echo $thai['score'] + $math['score'] + $Scien['score'] + $Art['score'] + $Career['score'] + $Social['max_score'] + $English['score'] + $Health['score'];?></td>
<td align="center"></td>
<td align="center">66</td>
<?php 
$SUM = $SumThai + $SumMath + $SumScien + $SumArt + $SumCareer + $SumSocial + $SumEnglish + $SumHealth;
?>
<td align="center"><?php echo $SUM;?></td>
</tr>
<td align="right" colspan="5">ผลการทดสอบทางการศึกษาระดับชาติขั้นพื้นฐานเฉลี่ย</td>
<td align="center"><?php echo @number_format($SUM / 66, 2, '.', ' '); ?></td>
</table><br><br>
</div>
<div align="right" style="margin-top: 60px;"><a href="javascript:window.print()"><img src="../images/HP-Printer-icon.png" width="50"></a></div>
</page>
</body>
</html>