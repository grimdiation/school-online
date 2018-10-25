<?php
session_start();
ob_start();
include('autoload.php');
include('mysql_connect.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>นักเรียน</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="../assets/global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
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
            <div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> ห้องเรียน</span>
            </div>
            <form method="post" class="form-inline" style="float: right;">
                    <?php
				  if($_SESSION['role'] == "director"){
					$sql = "SELECT DISTINCT(class) FROM room where school_id ='" . $_SESSION['school_id'] . "'";
					$result = mysqli_query($link, $sql);
                  	echo "<select name='class' class='form-control input-small' placeholder='ชั้นเรียน'>";
					while($data = mysqli_fetch_assoc($result)){
						echo "<option value='$data[class]'>$data[class]</option>";
					}
					echo "</select>";
				  }
				  ?>
                    <input type="text" name="room" class="form-control input-small" placeholder="ห้อง" maxlength="2" >
                    <button type="submit" name="insert" class="btn btn-medium green">ตกลง</button>
              </form>
              <?php

if(isset($_POST['insert'])){
		if($_SESSION['role'] == "director"){
		echo $_SESSION['class'] = $_POST['class'];
		}
		$_SESSION['room'] = $_POST['room'];
		
		header('refresh: 1;url = student.php');

	}
?>
          </div>
          <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
              <thead>
                <tr>
                  <th> ชั้นเรียน </th>
                  <th> จำนวนห้อง </th>
                  <th width="50"> รายงาน </th>
                </tr>
              </thead>
              <tbody>
                <?php
			  if($_SESSION['role'] == "director"){
			  $sql = "SELECT DISTINCT(class), room, room_id FROM room WHERE school_id = \"" . $_SESSION['school_id'] . "\"";
			  } else if($_SESSION['role'] == "chief"){
				 $sql = "SELECT DISTINCT(class), room, room_id FROM room WHERE school_id = \"" . $_SESSION['school_id'] . "\" and class = '$_SESSION[class]'"; 
			  }
			  $result = mysqli_query($link, $sql);
			  
			  while($data = mysqli_fetch_array($result)){
				?>
<tr class="odd gradeX">
<td><?php echo $data['class']; ?></td>
<td><?php echo $data['room']; ?></td>
<td><a href="manage-class.php?id=<?php echo $data['class']; ?>" role="button" data-toggle="modal">
<button id="sample_editable_1_new" class="btn sbold green">รายงาน</button>
</a>
</td>
</tr>
<?php
}
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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> 
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script> 
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/components-typeahead.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
  <?php include('template_3.php'); ?>