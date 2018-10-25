<?php
session_start();
ob_start();
include('autoload.php');
?>
<html>
<head>
<meta charset="utf-8">
<title>เกรดเฉลี่ยห้อง <?php $_SESSION['class']; ?></title>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'คะแนนเฉลี่ย'],
          ["0.00 - 1.00", parseInt(document.getElementById('num1').value)],
          ["1.01 - 1.50", parseInt(document.getElementById('num2').value)],
          ["1.51 - 2.00", parseInt(document.getElementById('num3').value)],
          ["2.01 - 2.50", parseInt(document.getElementById('num4').value)],
          ['2.51 - 3.00', parseInt(document.getElementById('num5').value)],
		  ['3.01 - 3.50', parseInt(document.getElementById('num6').value)],
		  ['3.50 - 4.00', parseInt(document.getElementById('num7').value)]
        ]);

        var options = {
          title: 'กราฟผลการเรียนเกรดเฉลี่ยสะสม',
          width: 600,
          legend: { position: 'none' },
          chart: { subtitle: '' },
          axes: {
            x: {
              0: { side: 'down', label: 'คะแนนเฉลี่ยสะสม'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
<style>
page[size="A4"] {
	background: white;
	width: 21cm;
	height: 29.7cm;
	display: block;
	margin: 0 auto;
	margin-bottom: 0.5cm;
}
</style>
</head>
<body>

<page size="A4">
  <div style="padding: 60px">
    <div style="text-align:center;margin-bottom: 30px;"><b>รายงานเกรดเฉลี่ยของ
      <label><?php 
  include('mysql_connect.php');
  
  $sql = "SELECT * 
  		  FROM school 
		  WHERE school_id = '$_SESSION[school_id]'";
  $result = mysqli_query($link, $sql);
  $data = mysqli_fetch_array($result);
  echo $data['school_name_th'];
	  if($_SESSION['role'] == "chief"){
	  	echo " " . $_SESSION['class'] . $data['school_name_th'];
	  } else if($_SESSION['role'] == "director"){
		  echo $_SESSION['class'];
	  }
	  ?></label>
      </b></div>
    <span style="display:block;width:200px;word-wrap:break-word;float:left;margin-left: 92px;">ปีการศึกษา
    <label><?php echo $_POST['year']; ?></label>
    </span> <span style="display:block;width:200px;word-wrap:break-word;float:left;margin-bottom: 20px;">ภาคเรียนที่
    <label><?php echo $_POST['term']; ?></label>
    </span><br style="clear: left;">
    <?php
				$sql1 = "SELECT * FROM student WHERE class = '$_SESSION[class]' and school_id = $_SESSION[school_id]";
				$result1 = mysqli_query($link, $sql1);
				$numfree = mysqli_num_rows($result1);
				?>
    <table style="border-collapse:collapse;" border="1" align="center">
      <tr>
        <th width="300">ช่วงเกรดเฉลี่ย</th>
        <th>จำนวนนักเรียน</th>
        <th>คิดเป็น %</th>
      </tr>
      <tr>
        <td align="center" width="300">0.00 - 1.00</td>
        <td align="center" id="a"><?php 
						if($_POST['term'] == "1"){
							$term = "average1";
						} else if ($_POST['term'] == 2){
							$term = "average2";
						}
						$sql = "SELECT * 
								FROM student 
								WHERE class = '$_SESSION[class]' and school_id = '$_SESSION[school_id]' and year = '$_POST[year]' and $term >= 0 and $term <= 1.00";
						$result = mysqli_query($link, $sql);
						$num1 = mysqli_num_rows($result);
						
						echo $num1;
						echo "<input type='hidden' id='num1' value='$num1'>";
						?></td>
        <td align="center"><?php
						echo @number_format(($num1 / $numfree) * 100, 2, '.', '') . "%";
						?></td>
      </tr>
      <tr>
        <td align="center" width="300">1.01 - 1.50</td>
        <td align="center"><?php 
						if($_POST['term'] == "1"){
							$term = "average1";
						} else if ($_POST['term'] == 2){
							$term = "average2";
						}
						$sql = "SELECT * 
								FROM student 
								WHERE class = '$_SESSION[class]' and school_id = $_SESSION[school_id] and year = '$_POST[year]' and $term >= 1.01 and $term <= 1.50";
						$result = mysqli_query($link, $sql);
						$num2 = mysqli_num_rows($result);
						
						echo $num2;
						?></td>
        <td align="center"><?php
						echo @number_format(($num2 / $numfree) * 100, 2, '.', '') . "%";
						echo "<input type='hidden' id='num2' value='$num2'>";
						?></td>
      </tr>
      <tr>
        <td align="center" width="300">1.51 - 2.00</td>
        <td align="center"><?php 
						if($_POST['term'] == "1"){
							$term = "average1";
						} else if ($_POST['term'] == 2){
							$term = "average2";
						}
						$sql = "SELECT * 
								FROM student 
								WHERE class = '$_SESSION[class]' and school_id = $_SESSION[school_id] and year = '$_POST[year]' and $term >= 1.51 and $term <= 2.00";
						$result = mysqli_query($link, $sql);
						$num3 = mysqli_num_rows($result);
						
						echo $num3;
						echo "<input type='hidden' id='num3' value='$num3'>";
						?></td>
        <td align="center"><?php
						echo @number_format(($num3 / $numfree) * 100, 2, '.', '') . "%";
						?></td>
      </tr>
      <tr>
        <td align="center" width="300">2.01 - 2.50</td>
        <td align="center"><?php 
						if($_POST['term'] == "1"){
							$term = "average1";
						} else if ($_POST['term'] == 2){
							$term = "average2";
						}
						$sql = "SELECT * 
								FROM student 
								WHERE class = '$_SESSION[class]' and school_id = $_SESSION[school_id] and year = '$_POST[year]' and $term >= 2.01 and $term <= 2.50";
						$result = mysqli_query($link, $sql);
						$num4 = mysqli_num_rows($result);
						
						echo $num4;
						echo "<input type='hidden' id='num4' value='$num4'>";
						?></td>
        <td align="center"><?php
						echo @number_format(($num4 / $numfree) * 100, 2, '.', '') . "%";
						?></td>
      </tr>
      <tr>
        <td align="center" width="300">2.51 - 3.00</td>
        <td align="center"><?php 
						if($_POST['term'] == "1"){
							$term = "average1";
						} else if ($_POST['term'] == 2){
							$term = "average2";
						}
						$sql = "SELECT * 
								FROM student 
								WHERE class = '$_SESSION[class]' and school_id = $_SESSION[school_id] and year = '$_POST[year]' and $term >= 2.51 and $term <= 3.00";
						$result = mysqli_query($link, $sql);
						$num5 = mysqli_num_rows($result);
						
						echo $num5;
						echo "<input type='hidden' id='num5' value='$num5'>";
						?></td>
        <td align="center"><?php
						echo @number_format(($num5 / $numfree) * 100, 2, '.', '') . "%";
						?></td>
      </tr>
      <tr>
        <td align="center" width="300">3.01 - 3.50</td>
        <td align="center"><?php 
						if($_POST['term'] == "1"){
							$term = "average1";
						} else if ($_POST['term'] == 2){
							$term = "average2";
						}
						$sql = "SELECT * 
								FROM student 
								WHERE class = '$_SESSION[class]' and school_id = $_SESSION[school_id] and year = '$_POST[year]' and $term >= 3.01 and $term <= 3.50";
						$result = mysqli_query($link, $sql);
						$num6 = mysqli_num_rows($result);
						
						echo $num6;
						echo "<input type='hidden' id='num6' value='$num6'>";
						?></td>
        <td align="center"><?php
						echo @number_format(($num6 / $numfree) * 100, 2, '.', '') . "%";
						?></td>
      </tr>
      <tr>
        <td align="center" width="300">3.51 - 4.00</td>
        <td align="center"><?php 
						if($_POST['term'] == "1"){
							$term = "average1";
						} else if ($_POST['term'] == 2){
							$term = "average2";
						}
						$sql = "SELECT * 
								FROM student 
								WHERE class = '$_SESSION[class]' and school_id = $_SESSION[school_id] and year = '$_POST[year]' and $term >= 3.51 and $term <= 4.00";
						$num7 = mysqli_num_rows($result);
						
						echo $num7;
						echo "<input type='hidden' id='num7' value='$num7'>";
						?></td>
        <td align="center"><?php
						echo @number_format(($num7 / $numfree) * 100, 2, '.', '') . "%";
						?></td>
      </tr>
      <tr>
        <td align="center" width="300">รวม</td>
        <td align="center"><?php $num_sum = $num1 + $num2 + $num3 + $num4 + $num5 + $num6 + $num7;
						echo $num_sum;
						 ?></td>
        <td align="center">100%</td>
      </tr>
    </table>
    
  </div>
  <div class="row">
   <div id="top_x_div" style="width: 600px; height: 500px;margin: 0 auto;"></div>
  </div>
</page>
</body>
</html>