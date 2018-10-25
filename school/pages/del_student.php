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
	
	$sql = "DELETE 
			FROM student
			WHERE id_card = '$id'";
	$result = mysqli_query($link, $sql);
	$sql = "DELETE 
			FROM studentfamily
			WHERE id_card = '$id'";
	$result = mysqli_query($link, $sql);
	$sql = "DELETE 
			FROM grade
			WHERE id_card = '$id'";
	$result = mysqli_query($link, $sql);
	$sql = "DELETE 
			FROM onet
			WHERE id_card = '$id'";
	$result = mysqli_query($link, $sql);
	
	header('refresh: 0;url = student.php');
	mysqli_close($link);
?>
</body>
</html>