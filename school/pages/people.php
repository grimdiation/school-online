<?php
session_start();
ob_start();
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>แก้ไข - บุคลากร</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<?php include('template_2.php'); ?>
  <!-- BODY -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="row">
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> จัดการบุคลากร</span> </div>
            <div class="actions">
            </div>
          </div>
          <div class="portlet-body">
            <div class="table-toolbar">
              <div class="row">
                <div class="col-md-6">
                  <div class="btn-group">
                    <?php
					if($_SESSION['role'] == "administration"){
						echo "<a href='create-people.php'><button id='sample_editable_1_new' class='btn sbold green'> เพิ่มบุคลากร <i class='fa fa-plus'></i> </button></a>";
					}
					?>
                  </div>
                </div>
                <div class="col-md-6">
                </div>
              </div>
            </div>
            <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
              <thead>
                <tr>
                  <th> ชื่อ - นามสกุล </th>
                  <th width="150"> ตำแหน่ง </th>
                  <th width="50"> เบอร์โทรศัพท์ </th>
                  <?php
				  	if($_SESSION['role'] == "administration"){
						echo "<th width='50'> ข้อมูลสมาชิก </th>";
						echo "<th width='50'> วิชาที่สอน </th>";
						echo "<th width='50'> ลบ </th>";
					}
					
				  ?>
                  <th width='50'> รายละเอียด </th>
                </tr>
              </thead>
              <tbody>
              <?php
			  include('mysql_connect.php');
			  
			  if($_SESSION['role'] == "administration" || $_SESSION['role'] == "director"){
			  	$sql = "SELECT * FROM personnel WHERE school_id = '$_SESSION[school_id]'";
			  	$result = mysqli_query($link, $sql);
			  } else if($_SESSION['role'] == "teacher"){
				$sql = "SELECT * FROM personnel WHERE school_id = '$_SESSION[school_id]' and id_card = '$_SESSION[id_card]'";
			  	$result = mysqli_query($link, $sql);
			  } else if($_SESSION['role'] == "chief"){
				$sql = "SELECT * FROM personnel WHERE school_id = '$_SESSION[school_id]' and class = '$_SESSION[class]'";
			  	$result = mysqli_query($link, $sql);
			  }
			  			  
			  while($data = mysqli_fetch_array($result)){
			  ?>
                <tr class="odd gradeX">
                  <td> <?php echo $data['sub_name'] . $data['first_name_th'] . " " . $data['last_name_th']; ?> </td>
                  <td> <?php echo $data['position']; ?> </td>
                  <td class="center"> <?php echo $data['tel']; ?> </td>
                  <?php 
				  	if($_SESSION['role'] == "administration"){
                  		echo "<td width='50'> <a href='edit-people.php?id=$data[id_card]'><button id='sample_editable_1_new' class='btn sbold green'> แก้ไข </button></a> </td>";
                  		echo "<td width='50'> <a href='subjects.php?id=$data[id_card]'><button id='sample_editable_1_new' class='btn sbold blue'> เพิ่ม </button></a> </td>";
                  		echo "<td width='50'> <a href='del_people.php?id=$data[id_card]' data-toggle='confirmation' data-original-title='ยืนยันการลบ' title=''><button id='sample_editable_1_new' class='btn sbold red'> ลบ </button></a> </td>";
				  }
				  ?>
                  <td width='50'> <a href='detail_people.php?id=<?php echo $data['id_card']; ?>'><button id='sample_editable_1_new' class='btn sbold purple'> รายละเอียด </button></a> </td>
                </tr>   
                <?php
			  }
			  mysqli_close($link);
			  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- BODY --> 

<!-- JAVA --> 
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> 
<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> 
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script> 
<script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<script src="../assets/pages/scripts/ui-confirmations.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<?php include('template_3.php'); ?>