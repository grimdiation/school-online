<?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

$strExcelFileName="grade.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");

include('mysql_connect.php');
$id = $_GET['id'];
$year = $_POST['year'];
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<br>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
    <table>
        <tr>
            <td>
                <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
                    <thead style="text-align:center; vertical-align: middle;">
	<tr>
    	<td rowspan="3">กลุ่มสาระการเรียนรู้</td>
        <td colspan="9">ชั้นประถมศึกษาปีที่ 1</td>
        <td rowspan="3">จำนวน นร.ที่ได้ระดับ 3 ขึั้นไป</td>
        <td rowspan="3">ร้อยละ นร. ที่ได้ระดับ 3 ขึ้นไป</td>
    </tr>
    <tr>
    	<td rowspan="2">จำนวนเข้าสอบ</td>
        <td colspan="8">จำนวนนักเรียนที่มีผลการเรียนรู้</td>
    </tr>
    <tr>
    	<td> 0 </td>
        <td> 1 </td>
        <td> 1.5 </td>
        <td> 2 </td>
        <td> 2.5 </td>
        <td> 3 </td>
        <td> 3.5 </td>
        <td> 4 </td>
    </tr>
	</thead>
    <tbody>
    <?php
	$sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_assoc($result);
	$student = $data['STUDENT'];
	
	$sql = "SELECT DISTINCT(subject) FROM grade WHERE school_id = '" . $id . "' and class = 'ป.1' and year = '" . $year . "' ORDER BY subject DESC";
	$result = mysqli_query($link, $sql);
	while($data = mysqli_fetch_array($result)){
		$subject = $data['subject'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and subject = '" . $subject .  "' and grade = 0 and class = 'ป.1' and year = '" . $year . "'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_0 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and subject = '" . $subject .  "' and grade = 1 and class = 'ป.1' and year = '" . $year . "'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_1 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and subject = '" . $subject .  "' and grade = 1.5 and class = 'ป.1' and year = '" . $year . "'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_2 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and subject = '" . $subject .  "' and grade = 2 and class = 'ป.1' and year = '" . $year . "'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_3 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and subject = '" . $subject .  "' and grade = 2.5 and class = 'ป.1' and year = '" . $year . "'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_4 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and subject = '" . $subject .  "' and grade = 3 and class = 'ป.1' and year = '" . $year . "'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_5 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and subject = '" . $subject .  "' and grade = 3.5 and class = 'ป.1' and year = '" . $year . "'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_6 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and subject = '" . $subject .  "' and grade = 4 and class = 'ป.1' and year = '" . $year . "'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_7 = $grade['GRADE'];
	?>
    
    <tr>
    	<td><?php echo $subject; ?></td>
        <td style="text-align: center;"><?php echo $student; ?></td>
        
        <td style="text-align: center;"><?php echo $Average_0; ?></td>
        <td style="text-align: center;"><?php echo $Average_1; ?></td>
        <td style="text-align: center;"><?php echo $Average_2; ?></td>
        <td style="text-align: center;"><?php echo $Average_3; ?></td>
        <td style="text-align: center;"><?php echo $Average_4; ?></td>
        <td style="text-align: center;"><?php echo $Average_5; ?></td>
        <td style="text-align: center;"><?php echo $Average_6; ?></td>
        <td style="text-align: center;"><?php echo $Average_7; ?></td>
        
        <?php
		$class_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and subject = '" . $subject . "' and grade >= 3 and class = 'ป.1' and year = '" . $year . "'";
		$class_result = mysqli_query($link, $class_sql);
		$class = mysqli_fetch_assoc($class_result);
		$Level = $class['GRADE'];
		?>
        <td style="text-align: center;"><?php echo $Level; ?></td>
        <td style="text-align: center;"><?php echo @(number_format($Level / $student, 2, '.', ' ')); ?></td>
    </tr>
    
    <?php
	}
	?>
    </tbody>
                </table>
            </td>
        </tr>
        <tr>
        	<td height="100"></td>
        </tr>
        <tr>
            <td>
                <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
                    <thead style="text-align:center; vertical-align: middle;">
	<tr>
    	<td rowspan="3">กลุ่มสาระการเรียนรู้</td>
        <td colspan="9">ชั้นประถมศึกษาปีที่ 2</td>
        <td rowspan="3">จำนวน นร.ที่ได้ระดับ 3 ขึั้นไป</td>
        <td rowspan="3">ร้อยละ นร. ที่ได้ระดับ 3 ขึ้นไป</td>
    </tr>
    <tr>
    	<td rowspan="2">จำนวนเข้าสอบ</td>
        <td colspan="8">จำนวนนักเรียนที่มีผลการเรียนรู้</td>
    </tr>
    <tr>
    	<td> 0 </td>
        <td> 1 </td>
        <td> 1.5 </td>
        <td> 2 </td>
        <td> 2.5 </td>
        <td> 3 </td>
        <td> 3.5 </td>
        <td> 4 </td>
    </tr>
	</thead>
    <tbody>
    <?php
	$id = "574681543322"; // ชั่วคราว
	
	$sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_assoc($result);
	$student = $data['STUDENT'];
	
	$sql = "SELECT DISTINCT(subject) FROM grade WHERE school_id = '" . $id . "' and class = 'ป.2' and year = '" . $year . "' ORDER BY subject DESC";
	$result = mysqli_query($link, $sql);
	while($data = mysqli_fetch_array($result)){
		$subject = $data['subject'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 0 and class = 'ป.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_0 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1 and class = 'ป.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_1 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1.5 and class = 'ป.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_2 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2 and class = 'ป.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_3 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2.5 and class = 'ป.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_4 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3 and class = 'ป.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_5 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3.5 and class = 'ป.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_6 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 4 and class = 'ป.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_7 = $grade['GRADE'];
	?>
    
    <tr>
    	<td><?php echo $subject; ?></td>
        <td style="text-align: center;"><?php echo $student; ?></td>
        
        <td style="text-align: center;"><?php echo $Average_0; ?></td>
        <td style="text-align: center;"><?php echo $Average_1; ?></td>
        <td style="text-align: center;"><?php echo $Average_2; ?></td>
        <td style="text-align: center;"><?php echo $Average_3; ?></td>
        <td style="text-align: center;"><?php echo $Average_4; ?></td>
        <td style="text-align: center;"><?php echo $Average_5; ?></td>
        <td style="text-align: center;"><?php echo $Average_6; ?></td>
        <td style="text-align: center;"><?php echo $Average_7; ?></td>
        
        <?php
		$class_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject . "' and grade >= 3 and class = 'ป.2'";
		$class_result = mysqli_query($link, $class_sql);
		$class = mysqli_fetch_assoc($class_result);
		$Level = $class['GRADE'];
		?>
        <td style="text-align: center;"><?php echo $Level; ?></td>
        <td style="text-align: center;"><?php echo @(number_format($Level / $student, 2, '.', ' ')); ?></td>
    </tr>
    
    <?php
	}
	?>
    </tbody>
                </table>
            </td>
        </tr>
        <tr>
        	<td height="100"></td>
        </tr>
        
        <tr>
            <td>
                <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
                    <thead style="text-align:center; vertical-align: middle;">
	<tr>
    	<td rowspan="3">กลุ่มสาระการเรียนรู้</td>
        <td colspan="9">ชั้นประถมศึกษาปีที่ 3</td>
        <td rowspan="3">จำนวน นร.ที่ได้ระดับ 3 ขึั้นไป</td>
        <td rowspan="3">ร้อยละ นร. ที่ได้ระดับ 3 ขึ้นไป</td>
    </tr>
    <tr>
    	<td rowspan="2">จำนวนเข้าสอบ</td>
        <td colspan="8">จำนวนนักเรียนที่มีผลการเรียนรู้</td>
    </tr>
    <tr>
    	<td> 0 </td>
        <td> 1 </td>
        <td> 1.5 </td>
        <td> 2 </td>
        <td> 2.5 </td>
        <td> 3 </td>
        <td> 3.5 </td>
        <td> 4 </td>
    </tr>
	</thead>
    <tbody>
    <?php
	$id = "574681543322"; // ชั่วคราว
	
	$sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_assoc($result);
	$student = $data['STUDENT'];
	
	$sql = "SELECT DISTINCT(subject) FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ป.3' ORDER BY subject DESC";
	$result = mysqli_query($link, $sql);
	while($data = mysqli_fetch_array($result)){
		$subject = $data['subject'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 0 and class = 'ป.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_0 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1 and class = 'ป.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_1 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1.5 and class = 'ป.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_2 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2 and class = 'ป.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_3 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2.5 and class = 'ป.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_4 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3 and class = 'ป.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_5 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3.5 and class = 'ป.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_6 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 4 and class = 'ป.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_7 = $grade['GRADE'];
	?>
    
    <tr>
    	<td><?php echo $subject; ?></td>
        <td style="text-align: center;"><?php echo $student; ?></td>
        
        <td style="text-align: center;"><?php echo $Average_0; ?></td>
        <td style="text-align: center;"><?php echo $Average_1; ?></td>
        <td style="text-align: center;"><?php echo $Average_2; ?></td>
        <td style="text-align: center;"><?php echo $Average_3; ?></td>
        <td style="text-align: center;"><?php echo $Average_4; ?></td>
        <td style="text-align: center;"><?php echo $Average_5; ?></td>
        <td style="text-align: center;"><?php echo $Average_6; ?></td>
        <td style="text-align: center;"><?php echo $Average_7; ?></td>
        
        <?php
		$class_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject . "' and grade >= 3 and class = 'ป.3'";
		$class_result = mysqli_query($link, $class_sql);
		$class = mysqli_fetch_assoc($class_result);
		$Level = $class['GRADE'];
		?>
        <td style="text-align: center;"><?php echo $Level; ?></td>
        <td style="text-align: center;"><?php echo @(number_format($Level / $student, 2, '.', ' ')); ?></td>
    </tr>
    
    <?php
	}
	?>
    </tbody>
                </table>
            </td>
        </tr>
        <tr>
        	<td height="100"></td>
        </tr>
        <tr>
            <td>
                <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
                    <thead style="text-align:center; vertical-align: middle;">
	<tr>
    	<td rowspan="3">กลุ่มสาระการเรียนรู้</td>
        <td colspan="9">ชั้นประถมศึกษาปีที่ 4</td>
        <td rowspan="3">จำนวน นร.ที่ได้ระดับ 3 ขึั้นไป</td>
        <td rowspan="3">ร้อยละ นร. ที่ได้ระดับ 3 ขึ้นไป</td>
    </tr>
    <tr>
    	<td rowspan="2">จำนวนเข้าสอบ</td>
        <td colspan="8">จำนวนนักเรียนที่มีผลการเรียนรู้</td>
    </tr>
    <tr>
    	<td> 0 </td>
        <td> 1 </td>
        <td> 1.5 </td>
        <td> 2 </td>
        <td> 2.5 </td>
        <td> 3 </td>
        <td> 3.5 </td>
        <td> 4 </td>
    </tr>
	</thead>
    <tbody>
    <?php
	$id = "574681543322"; // ชั่วคราว
	
	$sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_assoc($result);
	$student = $data['STUDENT'];
	
	$sql = "SELECT DISTINCT(subject) FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ป.4' ORDER BY subject DESC";
	$result = mysqli_query($link, $sql);
	while($data = mysqli_fetch_array($result)){
		$subject = $data['subject'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 0 and class = 'ป.4'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_0 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1 and class = 'ป.4'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_1 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1.5 and class = 'ป.4'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_2 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2 and class = 'ป.4'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_3 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2.5 and class = 'ป.4'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_4 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3 and class = 'ป.4'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_5 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3.5 and class = 'ป.4'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_6 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 4 and class = 'ป.4'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_7 = $grade['GRADE'];
	?>
    
    <tr>
    	<td><?php echo $subject; ?></td>
        <td style="text-align: center;"><?php echo $student; ?></td>
        
        <td style="text-align: center;"><?php echo $Average_0; ?></td>
        <td style="text-align: center;"><?php echo $Average_1; ?></td>
        <td style="text-align: center;"><?php echo $Average_2; ?></td>
        <td style="text-align: center;"><?php echo $Average_3; ?></td>
        <td style="text-align: center;"><?php echo $Average_4; ?></td>
        <td style="text-align: center;"><?php echo $Average_5; ?></td>
        <td style="text-align: center;"><?php echo $Average_6; ?></td>
        <td style="text-align: center;"><?php echo $Average_7; ?></td>
        
        <?php
		$class_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject . "' and grade >= 3 and class = 'ป.4'";
		$class_result = mysqli_query($link, $class_sql);
		$class = mysqli_fetch_assoc($class_result);
		$Level = $class['GRADE'];
		?>
        <td style="text-align: center;"><?php echo $Level; ?></td>
        <td style="text-align: center;"><?php echo @(number_format($Level / $student, 2, '.', ' ')); ?></td>
    </tr>
    
    <?php
	}
	?>
    </tbody>
                </table>
            </td>
        </tr>
        <tr>
        	<td height="100"></td>
        </tr>
        <tr>
            <td>
                <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
                    <thead style="text-align:center; vertical-align: middle;">
	<tr>
    	<td rowspan="3">กลุ่มสาระการเรียนรู้</td>
        <td colspan="9">ชั้นประถมศึกษาปีที่ 5</td>
        <td rowspan="3">จำนวน นร.ที่ได้ระดับ 3 ขึั้นไป</td>
        <td rowspan="3">ร้อยละ นร. ที่ได้ระดับ 3 ขึ้นไป</td>
    </tr>
    <tr>
    	<td rowspan="2">จำนวนเข้าสอบ</td>
        <td colspan="8">จำนวนนักเรียนที่มีผลการเรียนรู้</td>
    </tr>
    <tr>
    	<td> 0 </td>
        <td> 1 </td>
        <td> 1.5 </td>
        <td> 2 </td>
        <td> 2.5 </td>
        <td> 3 </td>
        <td> 3.5 </td>
        <td> 4 </td>
    </tr>
	</thead>
    <tbody>
    <?php
	$id = "574681543322"; // ชั่วคราว
	
	$sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_assoc($result);
	$student = $data['STUDENT'];
	
	$sql = "SELECT DISTINCT(subject) FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ป.5' ORDER BY subject DESC";
	$result = mysqli_query($link, $sql);
	while($data = mysqli_fetch_array($result)){
		$subject = $data['subject'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 0 and class = 'ป.5'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_0 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1 and class = 'ป.5'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_1 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1.5 and class = 'ป.5'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_2 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2 and class = 'ป.5'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_3 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2.5 and class = 'ป.5'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_4 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3 and class = 'ป.5'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_5 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3.5 and class = 'ป.5'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_6 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 4 and class = 'ป.5'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_7 = $grade['GRADE'];
	?>
    
    <tr>
    	<td><?php echo $subject; ?></td>
        <td style="text-align: center;"><?php echo $student; ?></td>
        
        <td style="text-align: center;"><?php echo $Average_0; ?></td>
        <td style="text-align: center;"><?php echo $Average_1; ?></td>
        <td style="text-align: center;"><?php echo $Average_2; ?></td>
        <td style="text-align: center;"><?php echo $Average_3; ?></td>
        <td style="text-align: center;"><?php echo $Average_4; ?></td>
        <td style="text-align: center;"><?php echo $Average_5; ?></td>
        <td style="text-align: center;"><?php echo $Average_6; ?></td>
        <td style="text-align: center;"><?php echo $Average_7; ?></td>
        
        <?php
		$class_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject . "' and grade >= 3 and class = 'ป.5'";
		$class_result = mysqli_query($link, $class_sql);
		$class = mysqli_fetch_assoc($class_result);
		$Level = $class['GRADE'];
		?>
        <td style="text-align: center;"><?php echo $Level; ?></td>
        <td style="text-align: center;"><?php echo @(number_format($Level / $student, 2, '.', ' ')); ?></td>
    </tr>
    
    <?php
	}
	?>
    </tbody>
                </table>
            </td>
        </tr>
        <tr>
        	<td height="100"></td>
        </tr>
        <tr>
        	<td>
            <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
                    <thead style="text-align:center; vertical-align: middle;">
	<tr>
    	<td rowspan="3">กลุ่มสาระการเรียนรู้</td>
        <td colspan="9">ชั้นประถมศึกษาปีที่ 6</td>
        <td rowspan="3">จำนวน นร.ที่ได้ระดับ 3 ขึั้นไป</td>
        <td rowspan="3">ร้อยละ นร. ที่ได้ระดับ 3 ขึ้นไป</td>
    </tr>
    <tr>
    	<td rowspan="2">จำนวนเข้าสอบ</td>
        <td colspan="8">จำนวนนักเรียนที่มีผลการเรียนรู้</td>
    </tr>
    <tr>
    	<td> 0 </td>
        <td> 1 </td>
        <td> 1.5 </td>
        <td> 2 </td>
        <td> 2.5 </td>
        <td> 3 </td>
        <td> 3.5 </td>
        <td> 4 </td>
    </tr>
	</thead>
    <tbody>
    <?php
	$id = "574681543322"; // ชั่วคราว
	
	$sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_assoc($result);
	$student = $data['STUDENT'];
	
	$sql = "SELECT DISTINCT(subject) FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ป.6' ORDER BY subject DESC";
	$result = mysqli_query($link, $sql);
	while($data = mysqli_fetch_array($result)){
		$subject = $data['subject'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 0 and class = 'ป.6'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_0 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1 and class = 'ป.6'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_1 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1.5 and class = 'ป.6'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_2 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2 and class = 'ป.6'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_3 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2.5 and class = 'ป.6'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_4 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3 and class = 'ป.6'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_5 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3.5 and class = 'ป.6'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_6 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 4 and class = 'ป.6'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_7 = $grade['GRADE'];
	?>
    
    <tr>
    	<td><?php echo $subject; ?></td>
        <td style="text-align: center;"><?php echo $student; ?></td>
        
        <td style="text-align: center;"><?php echo $Average_0; ?></td>
        <td style="text-align: center;"><?php echo $Average_1; ?></td>
        <td style="text-align: center;"><?php echo $Average_2; ?></td>
        <td style="text-align: center;"><?php echo $Average_3; ?></td>
        <td style="text-align: center;"><?php echo $Average_4; ?></td>
        <td style="text-align: center;"><?php echo $Average_5; ?></td>
        <td style="text-align: center;"><?php echo $Average_6; ?></td>
        <td style="text-align: center;"><?php echo $Average_7; ?></td>
        
        <?php
		$class_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject . "' and grade >= 3 and class = 'ป.6'";
		$class_result = mysqli_query($link, $class_sql);
		$class = mysqli_fetch_assoc($class_result);
		$Level = $class['GRADE'];
		?>
        <td style="text-align: center;"><?php echo $Level; ?></td>
        <td style="text-align: center;"><?php echo @(number_format($Level / $student, 2, '.', ' ')); ?></td>
    </tr>
    
    <?php
	}
	?>
    </tbody>
                </table>
            </td>
        </tr>
        <tr>
        	<td height="100"></td>
        </tr>
        <tr>
            <td>
                <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
                    <thead style="text-align:center; vertical-align: middle;">
	<tr>
    	<td rowspan="3">กลุ่มสาระการเรียนรู้</td>
        <td colspan="9">มัธยมศึกษา 1</td>
        <td rowspan="3">จำนวน นร.ที่ได้ระดับ 3 ขึั้นไป</td>
        <td rowspan="3">ร้อยละ นร. ที่ได้ระดับ 3 ขึ้นไป</td>
    </tr>
    <tr>
    	<td rowspan="2">จำนวนเข้าสอบ</td>
        <td colspan="8">จำนวนนักเรียนที่มีผลการเรียนรู้</td>
    </tr>
    <tr>
    	<td> 0 </td>
        <td> 1 </td>
        <td> 1.5 </td>
        <td> 2 </td>
        <td> 2.5 </td>
        <td> 3 </td>
        <td> 3.5 </td>
        <td> 4 </td>
    </tr>
	</thead>
    <tbody>
    <?php
	$id = "574681543322"; // ชั่วคราว
	
	$sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_assoc($result);
	$student = $data['STUDENT'];
	
	$sql = "SELECT DISTINCT(subject) FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ม.1' ORDER BY subject DESC";
	$result = mysqli_query($link, $sql);
	while($data = mysqli_fetch_array($result)){
		$subject = $data['subject'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 0 and class = 'ม.1'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_0 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1 and class = 'ม.1'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_1 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1.5 and class = 'ม.1'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_2 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2 and class = 'ม.1'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_3 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2.5 and class = 'ม.1'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_4 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3 and class = 'ม.1'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_5 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3.5 and class = 'ม.1'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_6 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 4 and class = 'ม.1'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_7 = $grade['GRADE'];
	?>
    
    <tr>
    	<td><?php echo $subject; ?></td>
        <td style="text-align: center;"><?php echo $student; ?></td>
        
        <td style="text-align: center;"><?php echo $Average_0; ?></td>
        <td style="text-align: center;"><?php echo $Average_1; ?></td>
        <td style="text-align: center;"><?php echo $Average_2; ?></td>
        <td style="text-align: center;"><?php echo $Average_3; ?></td>
        <td style="text-align: center;"><?php echo $Average_4; ?></td>
        <td style="text-align: center;"><?php echo $Average_5; ?></td>
        <td style="text-align: center;"><?php echo $Average_6; ?></td>
        <td style="text-align: center;"><?php echo $Average_7; ?></td>
        
        <?php
		$class_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject . "' and grade >= 3 and class = 'ม.1'";
		$class_result = mysqli_query($link, $class_sql);
		$class = mysqli_fetch_assoc($class_result);
		$Level = $class['GRADE'];
		?>
        <td style="text-align: center;"><?php echo $Level; ?></td>
        <td style="text-align: center;"><?php echo @(number_format($Level / $student, 2, '.', ' ')); ?></td>
    </tr>
    
    <?php
	}
	?>
    </tbody>
                </table>
            </td>
        </tr>
        <tr>
        	<td height="100"></td>
        </tr>
        <tr>
            <td>
                <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
                    <thead style="text-align:center; vertical-align: middle;">
	<tr>
    	<td rowspan="3">กลุ่มสาระการเรียนรู้</td>
        <td colspan="9">มัธยมศึกษา 2</td>
        <td rowspan="3">จำนวน นร.ที่ได้ระดับ 3 ขึั้นไป</td>
        <td rowspan="3">ร้อยละ นร. ที่ได้ระดับ 3 ขึ้นไป</td>
    </tr>
    <tr>
    	<td rowspan="2">จำนวนเข้าสอบ</td>
        <td colspan="8">จำนวนนักเรียนที่มีผลการเรียนรู้</td>
    </tr>
    <tr>
    	<td> 0 </td>
        <td> 1 </td>
        <td> 1.5 </td>
        <td> 2 </td>
        <td> 2.5 </td>
        <td> 3 </td>
        <td> 3.5 </td>
        <td> 4 </td>
    </tr>
	</thead>
    <tbody>
    <?php
	$id = "574681543322"; // ชั่วคราว
	
	$sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_assoc($result);
	$student = $data['STUDENT'];
	
	$sql = "SELECT DISTINCT(subject) FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ม.2' ORDER BY subject DESC";
	$result = mysqli_query($link, $sql);
	while($data = mysqli_fetch_array($result)){
		$subject = $data['subject'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 0 and class = 'ม.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_0 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1 and class = 'ม.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_1 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1.5 and class = 'ม.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_2 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2 and class = 'ม.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_3 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2.5 and class = 'ม.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_4 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3 and class = 'ม.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_5 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3.5 and class = 'ม.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_6 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 4 and class = 'ม.2'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_7 = $grade['GRADE'];
	?>
    
    <tr>
    	<td><?php echo $subject; ?></td>
        <td style="text-align: center;"><?php echo $student; ?></td>
        
        <td style="text-align: center;"><?php echo $Average_0; ?></td>
        <td style="text-align: center;"><?php echo $Average_1; ?></td>
        <td style="text-align: center;"><?php echo $Average_2; ?></td>
        <td style="text-align: center;"><?php echo $Average_3; ?></td>
        <td style="text-align: center;"><?php echo $Average_4; ?></td>
        <td style="text-align: center;"><?php echo $Average_5; ?></td>
        <td style="text-align: center;"><?php echo $Average_6; ?></td>
        <td style="text-align: center;"><?php echo $Average_7; ?></td>
        
        <?php
		$class_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject . "' and grade >= 3 and class = 'ม.2'";
		$class_result = mysqli_query($link, $class_sql);
		$class = mysqli_fetch_assoc($class_result);
		$Level = $class['GRADE'];
		?>
        <td style="text-align: center;"><?php echo $Level; ?></td>
        <td style="text-align: center;"><?php echo @(number_format($Level / $student, 2, '.', ' ')); ?></td>
    </tr>
    
    <?php
	}
	?>
    </tbody>
                </table>
            </td>
        </tr>
        <tr>
        	<td height="100"></td>
        </tr>
        <tr>
            <td>
                <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
                    <thead style="text-align:center; vertical-align: middle;">
	<tr>
    	<td rowspan="3">กลุ่มสาระการเรียนรู้</td>
        <td colspan="9">มัธยมศึกษา 3</td>
        <td rowspan="3">จำนวน นร.ที่ได้ระดับ 3 ขึั้นไป</td>
        <td rowspan="3">ร้อยละ นร. ที่ได้ระดับ 3 ขึ้นไป</td>
    </tr>
    <tr>
    	<td rowspan="2">จำนวนเข้าสอบ</td>
        <td colspan="8">จำนวนนักเรียนที่มีผลการเรียนรู้</td>
    </tr>
    <tr>
    	<td> 0 </td>
        <td> 1 </td>
        <td> 1.5 </td>
        <td> 2 </td>
        <td> 2.5 </td>
        <td> 3 </td>
        <td> 3.5 </td>
        <td> 4 </td>
    </tr>
	</thead>
    <tbody>
    <?php
	$id = "574681543322"; // ชั่วคราว
	
	$sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_assoc($result);
	$student = $data['STUDENT'];
	
	$sql = "SELECT DISTINCT(subject) FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ม.3' ORDER BY subject DESC";
	$result = mysqli_query($link, $sql);
	while($data = mysqli_fetch_array($result)){
		$subject = $data['subject'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 0 and class = 'ม.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_0 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1 and class = 'ม.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_1 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 1.5 and class = 'ม.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_2 = $grade['GRADE'];
		
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2 and class = 'ม.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_3 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 2.5 and class = 'ม.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_4 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3 and class = 'ม.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_5 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 3.5 and class = 'ม.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_6 = $grade['GRADE'];
		$grade_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject .  "' and grade = 4 and class = 'ม.3'";
		$grade_result = mysqli_query($link, $grade_sql);
		$grade = mysqli_fetch_assoc($grade_result);
		$Average_7 = $grade['GRADE'];
	?>
    
    <tr>
    	<td><?php echo $subject; ?></td>
        <td style="text-align: center;"><?php echo $student; ?></td>
        
        <td style="text-align: center;"><?php echo $Average_0; ?></td>
        <td style="text-align: center;"><?php echo $Average_1; ?></td>
        <td style="text-align: center;"><?php echo $Average_2; ?></td>
        <td style="text-align: center;"><?php echo $Average_3; ?></td>
        <td style="text-align: center;"><?php echo $Average_4; ?></td>
        <td style="text-align: center;"><?php echo $Average_5; ?></td>
        <td style="text-align: center;"><?php echo $Average_6; ?></td>
        <td style="text-align: center;"><?php echo $Average_7; ?></td>
        
        <?php
		$class_sql = "SELECT COUNT(grade) AS GRADE FROM grade WHERE school_id = '" . $id . "' and year = '" . $year . "' and subject = '" . $subject . "' and grade >= 3 and class = 'ม.3'";
		$class_result = mysqli_query($link, $class_sql);
		$class = mysqli_fetch_assoc($class_result);
		$Level = $class['GRADE'];
		?>
        <td style="text-align: center;"><?php echo $Level; ?></td>
        <td style="text-align: center;"><?php echo @(number_format($Level / $student, 2, '.', ' ')); ?></td>
    </tr>
    
    <?php
	}
	?>
    </tbody>
                </table>
            </td>
        </tr>
    </table>

</div>
<script>
    window.onbeforeunload = function(){return false;};
    setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>