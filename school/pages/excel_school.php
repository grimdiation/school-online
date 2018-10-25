<?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

$strExcelFileName="school.xls";
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
                    <thead>
                    <tr>
                        <td width="200" align="center" colspan="5"><strong>ข้อมูลโรงเรียน</strong></td>
                        <td align="center" colspan="14">ที่อยู่</td>
                        <td width="200" align="center" colspan="16"><strong>จำนวนนักเรียน</strong></td>
                        <td align="center" colspan="2">บุคลากร</td>
                        <td align="center" colspan="8">O-NET ป.6</td>
                        <td align="center" colspan="8">O-NET ม.3</td>
                        <td align="center" colspan="8">O-NET ม.6</td>
                    </tr>
                    <tr>
                        <td width="150" align="center"><strong>รหัส SMIS</strong></td>
                        <td width="150" align="center"><strong>รหัส OBEC</strong></td>
                        <td width="150" align="center"><strong>รหัสโรงเรียน</strong></td>
                        <td width="150" align="center"><strong>ชื่อโรงเรียน</strong></td>
                        <td width="150" align="center"><strong>ขนาดโรงเรียน</strong></td>
                        <td width="100" align="center"><strong>เลขที่</strong></td>
                        <td width="50" align="center"><strong>หมู่</strong></td>
                        <td width="100" align="center"><strong>ตำบล</strong></td>
                        <td width="100" align="center"><strong>ถนน</strong></td>
                        <td width="50" align="center"><strong>ซอย</strong></td>
                        <td width="100" align="center"><strong>อำเภอ</strong></td>
                        <td width="100" align="center"><strong>จังหวัด</strong></td>
                        <td width="150" align="center"><strong>รหัสไปรษณีย์</strong></td>
                        <td width="150" align="center"><strong>เบอร์โทรศัพท์</strong></td>
                        <td width="150" align="center"><strong>แฟ็ก</strong></td>
                        <td width="150" align="center"><strong>อีเมล์</strong></td>
                        <td width="150" align="center"><strong>เว็บไซต์</strong></td>
                        <td width="150" align="center"><strong>ละติจูด</strong></td>
                        <td width="150" align="center"><strong>ลองติจูด</strong></td>

                        <td width="100" align="center"><strong>ก่อนอนุบาล</strong></td>
                        <td width="100" align="center"><strong>อ.1</strong></td>
                        <td width="100" align="center"><strong>อ.2</strong></td>
                        <td width="100" align="center"><strong>อ.3</strong></td>
                        <td width="100" align="center"><strong>ป.1</strong></td>
                        <td width="100" align="center"><strong>ป.2</strong></td>
                        <td width="100" align="center"><strong>ป.3</strong></td>
                        <td width="100" align="center"><strong>ป.4</strong></td>
                        <td width="100" align="center"><strong>ป.5</strong></td>
                        <td width="100" align="center"><strong>ป.6</strong></td>
                        <td width="100" align="center"><strong>ม.1</strong></td>
                        <td width="100" align="center"><strong>ม.2</strong></td>
                        <td width="100" align="center"><strong>ม.3</strong></td>

                        <td width="100" align="center"><strong>จำนวนความพิการ</strong></td>
                        <td width="100" align="center"><strong>จำนวนความขาดแคลน</strong></td>
                        <td width="100" align="center"><strong>จำนวนความด้อยโอกาส</strong></td>

                        <td width="100" align="center"><strong>จำนวนบุคลากร</strong></td>
                        <td width="100" align="center"><strong>เงินเดือนเฉลี่ย</strong></td>

                        <td width="100" align="center"><strong>ภาษาไทย</strong></td>
                        <td width="100" align="center"><strong>คณิตศาสตร์</strong></td>
                        <td width="100" align="center"><strong>วิทยาศาสตร์</strong></td>
                        <td width="100" align="center"><strong>ศิลปะ</strong></td>
                        <td width="100" align="center"><strong>การงานอาชีพและเทคโนโลยี</strong></td>
                        <td width="100" align="center"><strong>สังคมศึกษา ศาสนา และวัฒนธรรม</strong></td>
                        <td width="100" align="center"><strong>ภาษาอังกฤษ</strong></td>
                        <td width="100" align="center"><strong>สุขศึกษาและพลศึกษา</strong></td>

                        <td width="100" align="center"><strong>ภาษาไทย</strong></td>
                        <td width="100" align="center"><strong>คณิตศาสตร์</strong></td>
                        <td width="100" align="center"><strong>วิทยาศาสตร์</strong></td>
                        <td width="100" align="center"><strong>ศิลปะ</strong></td>
                        <td width="100" align="center"><strong>การงานอาชีพและเทคโนโลยี</strong></td>
                        <td width="100" align="center"><strong>สังคมศึกษา ศาสนา และวัฒนธรรม</strong></td>
                        <td width="100" align="center"><strong>ภาษาอังกฤษ</strong></td>
                        <td width="100" align="center"><strong>สุขศึกษาและพลศึกษา</strong></td>

                        <td width="100" align="center"><strong>ภาษาไทย</strong></td>
                        <td width="100" align="center"><strong>คณิตศาสตร์</strong></td>
                        <td width="100" align="center"><strong>วิทยาศาสตร์</strong></td>
                        <td width="100" align="center"><strong>ศิลปะ</strong></td>
                        <td width="100" align="center"><strong>การงานอาชีพและเทคโนโลยี</strong></td>
                        <td width="100" align="center"><strong>สังคมศึกษา ศาสนา และวัฒนธรรม</strong></td>
                        <td width="100" align="center"><strong>ภาษาอังกฤษ</strong></td>
                        <td width="100" align="center"><strong>สุขศึกษาและพลศึกษา</strong></td>
                    </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM school WHERE school_id = '" . $id . "'";
                    $result = mysqli_query($link, $sql);
                    $data = mysqli_fetch_assoc($result);

                    $sql = "SELECT AMPHUR_NAME FROM amphur WHERE AMPHUR_ID = '" . $data['district'] . "'";
                    $result = mysqli_query($link, $sql);
                    $amphur = mysqli_fetch_assoc($result);

                    $sql = "SELECT PROVINCE_NAME FROM province WHERE PROVINCE_ID = '" . $data['province'] . "'";
                    $result = mysqli_query($link, $sql);
                    $province = mysqli_fetch_assoc($result);
                    ?>
                    <tr>
                        <td align="center"><?php echo $data['smis_id']; ?></td>
                        <td align="center"><?php echo $data['obec_id']; ?></td>
                        <td align="center"><?php echo $data['school_id'];?></td>
                        <td align="center"><?php echo $data['school_name_th'];?></td>
                        <td align="center"><?php echo $data['size_education'];?></td>
                        <td align="center"><?php echo $data['home_code'];?></td>
                        <td align="center"><?php echo $data['moo'];?></td>
                        <td align="center"><?php echo $data['sub_district'];?></td>
                        <td align="center"><?php echo $data['road'];?></td>
                        <td align="center"><?php echo $data['soy'];?></td>
                        <td align="center"><?php echo $amphur['AMPHUR_NAME'];?></td>
                        <td align="center"><?php echo $province['PROVINCE_NAME'];?></td>
                        <td align="center"><?php echo $data['zip_code'];?></td>
                        <td align="center"><?php echo $data['tel'];?></td>
                        <td align="center"><?php echo $data['fax'];?></td>
                        <td align="center"><?php echo $data['email'];?></td>
                        <td align="center"><?php echo $data['website'];?></td>
                        <td align="center"><?php echo $data['lititude'];?></td>
                        <td align="center"><?php echo $data['longtitude'];?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ก่อนอนุบาล'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT']; ?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'อ.1'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT']; ?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'อ.2'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT'];?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'อ.3'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT'];?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ป.1'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT'];?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ป.2'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT'];?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ป.3'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT'];?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ป.4'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT'];?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ป.5'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT'];?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ป.6'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT'];?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ม.1'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT'];?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ม.2'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT'];?></td>
                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "' and class = 'ม.3'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo $data['STUDENT'];?></td>
                        <?php
                        $sql = "SELECT COUNT(d1) AS D1, COUNT(d2) AS D2, COUNT(d3) AS D3, COUNT(d4) AS D4, COUNT(d5) AS D5, COUNT(d6) AS D6, COUNT(d7) AS D7, COUNT(d8) AS D8, COUNT(d9) AS D9 FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $D1 = $data['D1'];
                        $D2 = $data['D2'];
                        $D3 = $data['D3'];
                        $D4 = $data['D4'];
                        $D5 = $data['D5'];
                        $D6 = $data['D6'];
                        $D7 = $data['D7'];
                        $D8 = $data['D8'];
                        $D9 = $data['D9'];
                        $SumD = $D1 + $D2 + $D3 + $D4 + $D5 + $D6 + $D7 + $D8 + $D9;
                        ?>
                        <td align="center"><?php echo $SumD;?></td>
                        <?php
                        $sql = "SELECT COUNT(l1) AS L1, COUNT(L2) AS L2, COUNT(L3) AS L3, COUNT(L4) AS L4, COUNT(L5) AS L5 FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $L1 = $data['L1'];
                        $L2 = $data['L2'];
                        $L3 = $data['L3'];
                        $L4 = $data['L4'];
                        $L5 = $data['L5'];
                        $SumL = $L1 + $L2 + $L3 + $L4 + $L5;
                        ?>
                        <td align="center"><?php echo $SumL;?></td>
                        <?php
                        $sql = "SELECT COUNT(i1) AS I1, COUNT(i2) AS I2, COUNT(i3) AS I3, COUNT(i4) AS I4, COUNT(i5) AS I5, COUNT(i6) AS I6, COUNT(i7) AS I7, COUNT(i8) AS I8, COUNT(i9) AS I9, COUNT(i10) AS I10, COUNT(i11) AS I11, COUNT(i12) AS I12, COUNT(i13) AS I13 FROM student WHERE school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $I1 = $data['I1'];
                        $I2 = $data['I2'];
                        $I3 = $data['I3'];
                        $I4 = $data['I4'];
                        $I5 = $data['I5'];
                        $I6 = $data['I6'];
                        $I7 = $data['I7'];
                        $I8 = $data['I8'];
                        $I9 = $data['I9'];
                        $I10 = $data['I10'];
                        $I11 = $data['I11'];
                        $I12 = $data['I12'];
                        $I13 = $data['I13'];
                        $SumI = $I1 + $I2 + $I3 + $I4 + $I5 + $I6 + $I7 + $I8 + $I9 + $I10 + $I11 + $I12 + $I13;
                        ?>
                        <td align="center"><?php echo $SumI;?></td>

                        <?php
                        $sql = "SELECT COUNT(personnel_id) AS PERSONNEL, SUM(salary) AS SALARY FROM personnel WHERE school_id = '" . $id . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);

                        $salary = @($data['SALARY'] / $data['PERSONNEL']);
                        ?>
                        <td align="center"><?php echo $data['PERSONNEL'];?></td>
                        <td align="center"><?php echo $salary;?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $p6 = mysqli_fetch_assoc($result);
                        $Student = $p6['STUDENT'];

                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'ภาษาไทย' and class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'คณิตศาสตร์' and class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'วิทยาศาสตร์' and class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'ศิลปะ' and class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'การงานอาชีพและเทคโนโลยี' and class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม' and class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'ภาษาอังกฤษ' and class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'สุขศึกษาและพลศึกษา' and class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $m3 = mysqli_fetch_assoc($result);
                        $Student = $m3['STUDENT'];

                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'ภาษาไทย' and class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'คณิตศาสตร์' and class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'วิทยาศาสตร์' and class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'ศิลปะ' and class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'การงานอาชีพและเทคโนโลยี' and class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม' and class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'ภาษาอังกฤษ' and class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'สุขศึกษาและพลศึกษา' and class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $m6 = mysqli_fetch_assoc($result);
                        $Student = $m6['STUDENT'];

                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'ภาษาไทย' and class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'คณิตศาสตร์' and class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'วิทยาศาสตร์' and class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'ศิลปะ' and class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'การงานอาชีพและเทคโนโลยี' and class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม' and class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'ภาษาอังกฤษ' and class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                        <?php
                        $sql = "SELECT SUM(score) AS SCORE FROM onet WHERE school_id = '" . $id . "' and subject = 'สุขศึกษาและพลศึกษา' and class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $Student, 2, '.', ''));?></td>
                    </tr>
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