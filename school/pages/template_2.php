</head>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
<div class="page-header navbar navbar-fixed-top">
  <div class="page-header-inner ">
    <div class="page-logo">
      <div class="menu-toggler sidebar-toggler"></div>
    </div>
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a> 
    <div class="page-top">
      <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
          <li class="separator hide"> </li>
          <li class="dropdown dropdown-user dropdown-dark"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <span class="username username-hide-on-mobile"> <?php echo $_SESSION['name']; ?> </span> </a>
            <ul class="dropdown-menu dropdown-menu-default">
              <li class="divider"> </li>
			  <?php
			  if($_SESSION['role'] == "administration"){
				  echo "<li> <a href='edit-people-admin.php?id=$_SESSION[id_card]'><i class='icon-user'></i> แก้ไขข้อมูลส่วนตัว </a> </li>";
			  } else {
				  echo "<li> <a href='edit-people.php?id=$_SESSION[id_card]'><i class='icon-user'></i> แก้ไขข้อมูลส่วนตัว </a> </li>";
			  }
			  ?>
              <li> <a href="logout.php"><i class="icon-key"></i> Log Out </a> </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"> </div>
<div class="page-container">
<div class="page-sidebar-wrapper">
  <div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
      <li class="nav-item start active open">
      <?php 
	  if($_SESSION['role'] == "director" || $_SESSION['role'] == "chief" || $_SESSION['role'] == "teacher" || $_SESSION['role'] == "administration"){
          echo "<li class=\"nav-item start \"> <a href=\"schools.php\" class=\"nav-link \"> <i class=\"icon-home\"></i> <span class=\"title\">โรงเรียน</span> <span class=\"selected\"></span> </a> </li>"; }?>
          <?php
		  if($_SESSION['role'] == "director" || $_SESSION['role'] == "chief" || $_SESSION['role'] == "teacher" || $_SESSION['role'] == "administration"){
          echo "<li class=\"nav-item start \"> <a href=\"people.php\" class=\"nav-link \"> <i class=\"icon-user\"></i> <span class=\"title\">บุคลากร</span></a> </li>";} ?>
          <li class="nav-item start ">
		  <?php
		  	if($_SESSION['role'] == "director" || $_SESSION['role'] == "administration" || $_SESSION['role'] == "chief"){
				$a = "classroom.php";
			} else {
				$a = "student.php";
			}
		  ?>
          <?php
		  
		  if($_SESSION['role'] == "director" || $_SESSION['role'] == "chief" || $_SESSION['role'] == "teacher"){
          echo "<a href='$a' class=\"nav-link \"> <i class=\"icon-graduation\"></i> <span class=\"title\">นักเรียน</span></a> </li>"; } ?>
		  
          <?php
		  if($_SESSION['role'] == "province" || $_SESSION['role'] == "country"){
         echo "<li class=\"nav-item start \"> <a href=\"full_report.php\" class=\"nav-link \"> <i class=\"icon-graph\"></i> <span class=\"title\">รายงาน</span></a> </li>";}?>
         <?php
		  if($_SESSION['role'] == "director"){
         echo "<li class=\"nav-item start \"> <a href=\"manage-report.php?id=$_SESSION[school_id]\" class=\"nav-link \"> <i class=\"icon-graph\"></i> <span class=\"title\">รายงานโรงเรียน</span></a> </li>";
		 //echo "<li class=\"nav-item start \"> <a href=\"excutive.php?id=$_SESSION[school_id]\" class=\"nav-link \"> <i class='icon-grid'></i> <span class=\"title\">บทสรุปผู้บริหาร</span></a> </li>";
            echo "<li class=\"nav-item start \"> <a href=\"export.php?id=$_SESSION[school_id]\" class=\"nav-link \"> <i class='icon-heart'></i> <span class=\"title\">ส่งออกข้อมูล</span></a> </li>";
         }
          ?>
         <?php
		 	if($_SESSION['role'] == "teacher"){
				echo "<li class=\"nav-item start \"> <a href=\"manage-room.php\" class=\"nav-link \"> <i class=\"icon-graph\"></i> <span class=\"title\">รายงาน</span></a> </li>";
			}
		 ?>
      </li>
        </ul>
      </li>
    </ul>
  </div>
</div>