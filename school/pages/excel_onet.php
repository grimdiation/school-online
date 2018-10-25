<?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

$strExcelFileName="onet.xls";
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
                        <td align="center">สาระวิชา</td>
                        <td align="center">จำนวนคน</td>
                        <td align="center">คะแนนเฉลี่ย</td>
                        <td align="center">ระดับชั้น</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php
                    $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '$id' and class = 'ป.6' and year = '" . $year . "'";
                    $result = mysqli_query($link, $sql);
                    $data = mysqli_fetch_assoc($result);
                    $StudentP6 = $data['STUDENT'];

                    $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '$id' and class = 'ม.3' and year = '" . $year . "'";
                    $result = mysqli_query($link, $sql);
                    $data = mysqli_fetch_assoc($result);
                    $StudentM3 = $data['STUDENT'];

                    $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '$id' and class = 'ม.6' and year = '" . $year . "'";
                    $result = mysqli_query($link, $sql);
                    $data = mysqli_fetch_assoc($result);
                    $StudentM6 = $data['STUDENT'];

                    $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'ภาษาไทย' and onet.class = 'ป.6' and year = '" . $year . "'";
                    $result = mysqli_query($link, $sql);
                    $data = mysqli_fetch_array($result);
                    ?>
                        <td>ภาษาไทย</td>
                        <td align="center"><?php echo $StudentP6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentP6, 2, '.', '')); ?></td>
                        <td align="center">ป.6</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'ภาษาไทย' and onet.class = 'ม.3'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>ภาษาไทย</td>
                        <td align="center"><?php echo $StudentM3;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM3, 2, '.', '')); ?></td>
                        <td align="center">ม.3</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'ภาษาไทย' and onet.class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>ภาษาไทย</td>
                        <td align="center"><?php echo $StudentM6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM6, 2, '.', '')); ?></td>
                        <td align="center">ม.6</td>
                    </tr>

                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'คณิตศาสตร์' and onet.class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>คณิตศาสตร์</td>
                        <td align="center"><?php echo $StudentP6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentP6, 2, '.', '')); ?></td>
                        <td align="center">ป.6</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'คณิตศาสตร์' and onet.class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>คณิตศาสตร์</td>
                        <td align="center"><?php echo $StudentM3;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM3, 2, '.', '')); ?></td>
                        <td align="center">ม.3</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'คณิตศาสตร์' and onet.class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>คณิตศาสตร์</td>
                        <td align="center"><?php echo $StudentM6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM6, 2, '.', '')); ?></td>
                        <td align="center">ม.6</td>
                    </tr>

                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'วิทยาศาสตร์' and onet.class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>วิทยาศาสตร์</td>
                        <td align="center"><?php echo $StudentP6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentP6, 2, '.', '')); ?></td>
                        <td align="center">ป.6</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'วิทยาศาสตร์' and onet.class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>วิทยาศาสตร์</td>
                        <td align="center"><?php echo $StudentM3;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM3, 2, '.', '')); ?></td>
                        <td align="center">ม.3</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'วิทยาศาสตร์' and onet.class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>วิทยาศาสตร์</td>
                        <td align="center"><?php echo $StudentM6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM6, 2, '.', '')); ?></td>
                        <td align="center">ม.6</td>
                    </tr>

                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'ศิลปะ' and onet.class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>ศิลปะ</td>
                        <td align="center"><?php echo $StudentP6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentP6, 2, '.', '')); ?></td>
                        <td align="center">ป.6</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'ศิลปะ' and onet.class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>ศิลปะ</td>
                        <td align="center"><?php echo $StudentM3;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM3, 2, '.', '')); ?></td>
                        <td align="center">ม.3</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'ศิลปะ' and onet.class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>ศิลปะ</td>
                        <td align="center"><?php echo $StudentM6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM6, 2, '.', '')); ?></td>
                        <td align="center">ม.6</td>
                    </tr>

                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'การงานอาชีพและเทคโนโลยี' and onet.class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>การงานอาชีพและเทคโนโลยี</td>
                        <td align="center"><?php echo $StudentP6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentP6, 2, '.', '')); ?></td>
                        <td align="center">ป.6</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'การงานอาชีพและเทคโนโลยี' and onet.class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>การงานอาชีพและเทคโนโลยี</td>
                        <td align="center"><?php echo $StudentM3;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM3, 2, '.', '')); ?></td>
                        <td align="center">ม.3</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'การงานอาชีพและเทคโนโลยี' and onet.class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>การงานอาชีพและเทคโนโลยี</td>
                        <td align="center"><?php echo $StudentM6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM6, 2, '.', '')); ?></td>
                        <td align="center">ม.6</td>
                    </tr>

                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม' and onet.class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>สังคมศึกษา ศาสนา และวัฒนธรรม</td>
                        <td align="center"><?php echo $StudentP6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentP6, 2, '.', '')); ?></td>
                        <td align="center">ป.6</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม' and onet.class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>สังคมศึกษา ศาสนา และวัฒนธรรม</td>
                        <td align="center"><?php echo $StudentM3;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM3, 2, '.', '')); ?></td>
                        <td align="center">ม.3</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'สังคมศึกษา ศาสนา และวัฒนธรรม' and onet.class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>สังคมศึกษา ศาสนา และวัฒนธรรม</td>
                        <td align="center"><?php echo $StudentM6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM6, 2, '.', '')); ?></td>
                        <td align="center">ม.6</td>
                    </tr>

                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'ภาษาอังกฤษ' and onet.class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>ภาษาอังกฤษ</td>
                        <td align="center"><?php echo $StudentP6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentP6, 2, '.', '')); ?></td>
                        <td align="center">ป.6</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'ภาษาอังกฤษ' and onet.class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>ภาษาอังกฤษ</td>
                        <td align="center"><?php echo $StudentM3;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM3, 2, '.', '')); ?></td>
                        <td align="center">ม.3</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'ภาษาอังกฤษ' and onet.class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>ภาษาอังกฤษ</td>
                        <td align="center"><?php echo $StudentM6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM6, 2, '.', '')); ?></td>
                        <td align="center">ม.6</td>
                    </tr>

                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'สุขศึกษาและพลศึกษา' and onet.class = 'ป.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>สุขศึกษาและพลศึกษา</td>
                        <td align="center"><?php echo $StudentP6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentP6, 2, '.', '')); ?></td>
                        <td align="center">ป.6</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'สุขศึกษาและพลศึกษา' and onet.class = 'ม.3' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>สุขศึกษาและพลศึกษา</td>
                        <td align="center"><?php echo $StudentM3;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM3, 2, '.', '')); ?></td>
                        <td align="center">ม.3</td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT subject, SUM(onet.score) AS SCORE FROM onet WHERE onet.school_id = '" . $id . "' and onet.subject = 'สุขศึกษาและพลศึกษา' and onet.class = 'ม.6' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <td>สุขศึกษาและพลศึกษา</td>
                        <td align="center"><?php echo $StudentM6;?></td>
                        <td align="center"><?php echo @(number_format($data['SCORE'] / $StudentM6, 2, '.', '')); ?></td>
                        <td align="center">ม.6</td>
                    </tr>
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