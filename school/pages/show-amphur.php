<?php
	include('mysql_connect.php');
	$sql = "SELECT AMPHUR_ID, AMPHUR_NAME FROM amphur WHERE PROVINCE_ID = '$_GET[pvid]' ORDER BY AMPHUR_NAME ASC";
	$result = mysqli_query($link, $sql);
	
	$strOption = NULL;
	while($data = mysqli_fetch_assoc($result)){
		$strOption .= "<option value='$data[AMPHUR_ID]'>" . $data['AMPHUR_NAME'] . "</option>";
	}
	
	mysqli_close($link);
	
	echo $strOption;
?>