<?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

$strExcelFileName="student.xls";
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
                        <td align="center" valign="middle" rowspan="2"><strong>ระดับชั้น</strong></td>
                        <td align="center" rowspan="2"><strong>จำนวนห้อง</strong></td>
                        <td align="center" valign="middle" colspan="2"><strong>เพศ</strong></td>
                    </tr>
                    <tr>
                        <td align="center">ชาย</td>
                        <td align="center">หญิง</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td align="center">อ.1</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'อ.1' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomA1 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomA1; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'อ.1' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderA1M = $data['STUDENT']
                        ?>
                        <td align="center"><?php echo $GenderA1M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'อ.1' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderA1F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderA1F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">อ.2</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'อ.2' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomA2 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomA2; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'อ.2' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderA2M = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderA2M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'อ.2' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderA2F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderA2F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">อ.3</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'อ.3' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomA3 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomA3; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'อ.3' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderA3M = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderA3M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'อ.3' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderA3F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderA3F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">รวม</td>
                        <td align="center"><?php echo $RoomA1 + $RoomA2 + $RoomA3; ?></td>
                        <td align="center"><?php echo $GenderA1M + $GenderA2M + $GenderA3M; ?></td>
                        <td align="center"><?php echo $GenderA1F + $GenderA2F + $GenderA3F; ?></td>
                    </tr>

                    <tr>
                        <td align="center">ป.1</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'ป.1' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomP1 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomP1; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.1' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP1M = $data['STUDENT']
                        ?>
                        <td align="center"><?php echo $GenderP1M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.1' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP1F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderP1F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">ป.2</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'ป.2' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomP2 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomP2; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.2' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP2M = $data['STUDENT']
                        ?>
                        <td align="center"><?php echo $GenderP2M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.2' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP2F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderP2F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">ป.3</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'ป.3' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomP3 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomP3; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.3' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP3M = $data['STUDENT']
                        ?>
                        <td align="center"><?php echo $GenderP3M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.3' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP3F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderP3F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">ป.4</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'ป.4' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomP4 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomP4; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.4' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP4M = $data['STUDENT']
                        ?>
                        <td align="center"><?php echo $GenderP4M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.4' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP4F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderP4F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">ป.5</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'ป.5' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomP5 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomP5; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.5' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP5M = $data['STUDENT']
                        ?>
                        <td align="center"><?php echo $GenderP5M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.5' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP5F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderP5F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">ป.6</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'ป.6' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomP6 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomP6; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.6' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP6M = $data['STUDENT']
                        ?>
                        <td align="center"><?php echo $GenderP6M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ป.6' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderP6F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderP6F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">รวม</td>
                        <td align="center"><?php echo $RoomP1 + $RoomP2 + $RoomP3 + $RoomP4 + $RoomP5 + $RoomP6; ?></td>
                        <td align="center"><?php echo $GenderP1M + $GenderP2M + $GenderP3M + $GenderP4M + $GenderP5M + $GenderP6M; ?></td>
                        <td align="center"><?php echo $GenderP1F + $GenderP2F + $GenderP3F + $GenderP4F + $GenderP5F + $GenderP6F; ?></td>
                    </tr>

                    <tr>
                        <td align="center">ม.1</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'ม.1' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomM1 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomM1; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ม.1' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderM1M = $data['STUDENT']
                        ?>
                        <td align="center"><?php echo $GenderM1M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ม.1' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderM1F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderM1F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">ม.2</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'ม.2' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomM2 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomM2; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ม.2' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderM2M = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderM2M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ม.2' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderM2F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderM2F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">ม.3</td>
                        <?php
                        $sql = "SELECT room FROM room WHERE class = 'ม.3' and school_id = '" . $id . "' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $RoomM3 = $data['room'];
                        ?>
                        <td align="center"><?php echo $RoomM3; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ม.3' and gender = 'ชาย' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderM3M = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderA3M; ?></td>

                        <?php
                        $sql = "SELECT COUNT(student_id) AS STUDENT FROM student WHERE school_id = '" . $id . "' and class = 'ม.3' and gender = 'หญิง' and year = '" . $year . "'";
                        $result = mysqli_query($link, $sql);
                        $data = mysqli_fetch_assoc($result);
                        $GenderM3F = $data['STUDENT'];
                        ?>
                        <td align="center"><?php echo $GenderM3F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">รวม</td>
                        <td align="center"><?php echo $RoomM1 + $RoomM2 + $RoomM3; ?></td>
                        <td align="center"><?php echo $GenderM1M + $GenderM2M + $GenderM3M; ?></td>
                        <td align="center"><?php echo $GenderM1F + $GenderM2F + $GenderM3F; ?></td>
                    </tr>
                    <tr>
                        <td align="center">รวมทั้งหมด</td>
                        <td align="center"><?php echo $RoomA1 + $RoomA2 + $RoomA3 + $RoomP1 + $RoomP2 + $RoomP3 + $RoomP4 + $RoomP5 + $RoomP6 + $RoomM1 + $RoomM2 + $RoomM3; ?></td>
                        <td align="center"><?php echo $GenderA1M + $GenderA2M + $GenderA3M + $GenderP1M + $GenderP2M + $GenderP3M + $GenderP4M + $GenderP5M + $GenderP6M + $GenderM1M + $GenderM2M + $GenderM3M; ?></td>
                        <td align="center"><?php echo $GenderA1F + $GenderA2F + $GenderA3F + $GenderP1F + $GenderP2F + $GenderP3F + $GenderP4F + $GenderP5F + $GenderP6F + $GenderM1F + $GenderM2F + $GenderM3F; ?></td>
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