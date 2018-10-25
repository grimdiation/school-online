<?php
session_start();
ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include('mysql_connect.php');
	$id = $_GET['id'];
	
	$sql2 = "SELECT id_card FROM grade WHERE id = '$id'";
	$result2 = mysqli_query($link, $sql2);
	$data = mysqli_fetch_array($result2);
	
	$sqlA = "SELECT id_card, term, year FROM grade WHERE id = '$id'";
	$resultA = mysqli_query($link, $sqlA);
	$dataA = mysqli_fetch_assoc($resultA);
	
	$sql = "DELETE FROM grade WHERE id = '$id'";
	$result = mysqli_query($link, $sql);
	
	$grade_sql = "SELECT SUM(unit) AS UNIT, SUM(sud) AS SUD FROM grade WHERE id_card = '$dataA[id_card]' and school_id = '$_SESSION[school_id]' and term = '$dataA[term]' and year = '$dataA[year]'";
	$result_sql = mysqli_query($link, $grade_sql);
	$dataG = mysqli_fetch_assoc($result_sql);
	$SUM = @($dataG['SUD'] / $dataG['UNIT']);
	
	$sqlD = "UPDATE average SET average = '" . $SUM . "' WHERE id_card = '$dataA[id_card]' and school_id = '$_SESSION[school_id]' and term = '$dataA[term]' and year = '$dataA[year]'";
	$result = mysqli_query($link, $sqlD);
	
	header("Location: create_grade.php?id=" . $data['id_card'] . "");
	mysqli_close($link);
?>
</body>
</html>