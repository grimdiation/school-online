<?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

$strExcelFileName="personnel.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");

include('mysql_connect.php');
$id = $_GET['id'];
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
                        <td>ชื่อ - นามสกุล</td>
                        <td>วุฒิ</td>
                        <td>วิชาเอก</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT sub_name, first_name_th, last_name_th, graduated, graduated_major FROM personnel WHERE school_id = '" . $id . "'";
                    $result = mysqli_query($link, $sql);
                    while($data = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $data['sub_name'] . "" . $data['first_name_th'] . " " . $data['last_name_th']; ?></td>
                            <td><?php echo $data['graduated'];?></td>
                            <td><?php echo $data['graduated_major'];?></td>
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