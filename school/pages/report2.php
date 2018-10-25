<?php
session_start();
ob_start();
include('autoload.php');
include('mysql_connect.php');
?>
<html>
<head>
<meta charset="utf-8">
<title>เกรดเฉลี่ย</title>
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
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM student inner join school on student.school_id = school.school_id WHERE student.id_card = '$id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result);

$term = $_POST['term'];
?>
<page size="A4">
<div style="padding: 60px">
<img src="<?php echo $data['img']; ?>" width="100" style="float: left; margin-right: 50px;">โรงเรียน
<label><?php echo $data['school_name_th']; ?></label>
<br style="float: left;">
<span style="display:block;width:150px;word-wrap:break-word;float:left;margin-top: 20px;">ตำบล
<label><?php echo $data['sub_district']; ?></label>
</span> <span style="display:block;width:150px;word-wrap:break-word;float:left;margin-top: 20px;">อำเภอ
<label><?php echo $data['district']; ?></label>
</span> <span style="display:block;width:150px;word-wrap:break-word;float:left;margin-top: 20px;">จังหวัด
<label><?php echo $data['province']; ?></label>
</span><br style="float: left;">
<span style="display:block;width:400px;word-wrap:break-word;float:left;margin-top: 20px;">สำนักงานเขตพื้นที่การศึกษา
<label><?php echo $data['dla']; ?></label>
</span><br style="float: left;">
<span style="display:block;width:400px;word-wrap:break-word;float:left;margin-top: 20px;">
<label style="margin-left: 50px;">ระดับชั้นเรียน</label>
<label> <?php echo $data['class'] . "/" . $data['room']; ?></label>
</span><br style="clear: left;">
<span style="display:block;width:300px;word-wrap:break-word;float: left;margin-top: 11px;">ชื่อ
<label><?php echo $data['first_name_th']; ?></label>
</span><span style="display:block;width:300px;word-wrap:break-word;float: left;margin-left: 10px;margin-top: 10px;">นามสกุล
<label><?php echo $data['last_name_th']; ?></label>
</span><br style="clear: left;">
<span style="display:block;width:90px;word-wrap:break-word;float: left;margin-top: 11px;">เกิดวันที่
<label><?php echo date('d', strtotime($data['birthday_at'])); ?></label>
</span><span style="display:block;width:90px;word-wrap:break-word;float: left;margin-left: 20px;margin-top: 10px;">เดือน
<label><?php echo date('M', strtotime($data['birthday_at'])); ?></label>
</span><span style="display:block;width:90px;word-wrap:break-word;float: left;margin-left: 20px;margin-top: 10px;">พ.ศ.
<label><?php echo date('Y', strtotime($data['birthday_at'])) + 543; ?></label>
</span><br style="clear: left;">
<span style="display:block;width:100px;word-wrap:break-word;float: left;margin-top: 11px;">หมู่โลหิต
<label><?php echo $data['group_blood']; ?></label>
</span><span style="display:block;width:400px;word-wrap:break-word;float: left;margin-left: 20px;margin-top: 10px;">รหัสประจำตัวนักเรียน
<label><?php echo $data['student_id']; ?></label>
</span><br style="clear: left;">
<span style="display:block;width:400px;word-wrap:break-word;float: left;margin-top: 20px;">เลขประจำตัวประชาชน
<label><?php echo $data['id_card']; ?></label>
</span><br style="clear: left;">
<hr style="margin-top: 10px;margin-bottom: 10px;">
<div style="padding: 10px">
  <div style="text-align:center;margin-bottom: 30px;"><b>ปีการศึกษา
    <label><?php
	$Year = $data['year'];
	echo $Year; 
	?></label>
    </b></div>
  <table border="1" style="margin: 0 auto;border-collapse: collapse;">
   	<tr>
    	<td colspan="5" align="center">ภาคเรียนที่ <?php echo $term; ?></td>
    </tr>
    <tr>
    <td width="200" align="center">วิชา</td>
    <td width="50" align="center">คะแนนเต็ม</td>
    <td width="50" align="center">คะแนนที่ได้</td>
    <td width="50" align="center">หน่วยกิต</td>
    <td width="100" align="center">ระดับผลการเรียน</td>
    </tr>
    <?php
	$sql = "SELECT * FROM grade WHERE id_card = '$id' and school_id = '$_SESSION[school_id]' and term = '$term'";
	$result = mysqli_query($link, $sql);
	while($data = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>" . $data['subject'] . "</td>";
		echo "<td align=center>" . $data['max_score'] . "</td>";
		echo "<td align=center>" . $data['score'] . "</td>";
		echo "<td align=center>" . $data['unit'] . "</td>";
		echo "<td align=center>" . number_format($data['grade'], 2, '.', ' ') . "</td>";
		echo "</tr>";
	}
	?>
    <tr>
    	<?php
			$sql = "SELECT SUM(unit) AS UNIT, SUM(sud) AS SUD FROM grade WHERE id_card = '$id' and school_id = '$_SESSION[school_id]' and term = '$term'";
			$result = mysqli_query($link, $sql);
			$data = mysqli_fetch_assoc($result);
			$grade = @($data['SUD'] / $data['UNIT']);
		?>
    	<td align="center">คะแนนเฉลี่ยที่ได้</td>
        <td align="center" colspan="4"><?php echo number_format($grade, 2, '.', ' ') ?></td>
    </tr>
    <tr>
		<?php
		if($term >= 2){
			$sql = "SELECT SUM(unit) AS UNIT, SUM(sud) AS SUD FROM grade WHERE id_card = '$id' and school_id = '$_SESSION[school_id]' and year = '$Year'";
			$result = mysqli_query($link, $sql);
			$data = mysqli_fetch_assoc($result);
			$grade = @($data['SUD'] / $data['UNIT']);
		}
		?>
    	<td align="center">คะแนนเฉลี่ยสะสม</td>
        <td align="center" colspan="4"><?php echo number_format($grade, 2, '.', ' ') ?></td>
    </tr>
  </table>
</div>
<div align="right" style="margin-top: 60px;"><a href="javascript:window.print()"><img src="../images/HP-Printer-icon.png" width="50"></a></div>
</page>
</body>
</html>