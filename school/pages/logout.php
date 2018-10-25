 <?php
session_start();
ob_start();
session_destroy();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>logout</title>
</head>

<body>
<?php
header("Location: create_grade.php");
?>
</body>
</html>