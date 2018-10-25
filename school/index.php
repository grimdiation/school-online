<?php
session_start();
ob_start();
include('pages/mysql_connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>สำนักงานเลขาธิการสภาการศึกษา</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo"><img src="images/logo_sapa.png" width="200" height="200"> <span></span></span></h1>
		</div>
        <form method="post">
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<label for="username">Username</label>
			<br/>
			<input name="username" type="text" id="username">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input name="password" type="password" id="password">
			<br/>
			<button name="login" type="login">Sign In</button>
			<br/>
		</div>
        </form>
        <?php

if(isset($_POST['login'])){
	$u = $_POST['username'];
	$p = $_POST['password'];
	
	$sql = "SELECT * FROM login inner join personnel on login.id_card = personnel.id_card WHERE login.username = '$u' and login.password = '$p'";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_array($result);
	if($data['role'] == "administration" || $data['role'] == "director"){
		$_SESSION['role'] = $data['role'];
		$_SESSION['name'] = $data['first_name_th'] . " " . $data['last_name_th'];
		$_SESSION['school_id'] = $data['school_id'];
		$_SESSION['id_card'] = $data['id_card'];
		
		header('refresh: 0;url = pages/schools.php');
	} else if ($data['role'] == "teacher"){
		$_SESSION['role'] = $data['role'];
		$_SESSION['name'] = $data['first_name_th'] . " " . $data['last_name_th'];
		$_SESSION['school_id'] = $data['school_id'];
		$_SESSION['id_card'] = $data['id_card'];
		$_SESSION['class'] = $data['class'];
		$_SESSION['room'] = $data['room'];
		
		header('refresh: 0;url = pages/student.php');
	} else if ($data['role'] == "chief") {
		$_SESSION['role'] = $data['role'];
		$_SESSION['name'] = $data['first_name_th'] . " " . $data['last_name_th'];
		$_SESSION['school_id'] = $data['school_id'];
		$_SESSION['id_card'] = $data['id_card'];
		$_SESSION['class'] = $data['class'];
		
		header('refresh: 0;url = pages/schools.php');
	} else if ($data['role'] == "province") {
		$_SESSION['role'] = $data['role'];
		$_SESSION['name'] = $data['first_name_th'] . " " . $data['last_name_th'];
		$_SESSION['school_id'] = $data['school_id'];
		$_SESSION['id_card'] = $data['id_card'];
		$_SESSION['province'] = $data['province'];
		
		header('refresh: 0;url = pages/full_report.php');
	} else if ($data['role'] == "country") {
		$_SESSION['role'] = $data['role'];
		$_SESSION['name'] = $data['first_name_th'] . " " . $data['last_name_th'];
		$_SESSION['school_id'] = $data['school_id'];
		$_SESSION['id_card'] = $data['id_card'];
		
		header('refresh: 0;url = pages/full_report.php');
	}
	mysqli_close($link);
}
?>
	</div>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>