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
	
	$sql = "DELETE FROM budget WHERE budget_id = '$id'";
	$result = mysqli_query($link, $sql);
	
	header('refresh: 0;url = schools.php');
	mysqli_close($link);
?>
</body>
</html>