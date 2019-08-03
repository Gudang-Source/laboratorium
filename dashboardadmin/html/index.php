<?php
include('../../session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/Logo_PENS.png">
    <title>Informatics Laboratory</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="css/eventCalendar.css">
	<link rel="stylesheet" href="css/eventCalendar_theme_responsive.css">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    
</head>

<body class="fix-header">
   
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    
    <div id="wrapper">
        
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                  
                    <a class="logo" href="index.php">
                       <b>
                     <span class="hidden-xs">
                       <img src="../plugins/images/Slider01.png" alt="home" class="dark-logo" />
						 <img src="../plugins/images/Slider01.png" width="170px" height="50px" alt="home" class="light-logo" />
                     </span>
                     </b>
                       </a>
                </div>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li>
                           <a class="profile-pic" href="#"> <img src="../plugins/images/User_man_male_profile_account_person_people.png" alt="user-img" width="36" class="img-circle"><b id="welcome">Welcome <i><?php echo $login_session; ?></i></b></a>
                    </li>
					<li>
						<a class="logout-spn" href="../../logout.php" style="color:#fff;"><img src="../plugins/images/User_logout_man_profile_account.png" width="50px" height="50px"></a>  
					</li>
                </ul>
            </div>
        </nav>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="user.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Data User</a>
                    </li>
                    <li>
                        <a href="staff.php" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>Data Staff</a>
                    </li>
                    <li>
                        <a href="mahasiswa.php" class="waves-effect"><i class="fa  fa-graduation-cap fa-fw" aria-hidden="true"></i>Data Mahasiswa</a>
                    </li>
					<li>
                        <a href="upload.php " class="waves-effect"><i class="fa fa-file-text fa-fw" aria-hidden="true"></i>Upload Modul Praktikum</a>
                    </li>
				</ul>
            </div>
            
        </div>
   
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Admin Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title"><i class="fa fa-comments-o fa-fw" aria-hidden="true"></i>Recent Comments</h3>
                            <div class="comment-center p-t-10">
                              
                                <div class="comment-body b-none">
                                 <style>
									#publishcomment {
									max-height: 100%;
									color: #3d3d3d;
									width: 550px;
									font-size: 12px;
									line-height: 15px;
									}
									#publishcomment a {
									color: #da5700;
									text-decoration: none;
									font-weight:normal;
									}
									#publishcomment a:link {
									font-weight: bold;
									}
									#publishcomment a:hover {
									text-decoration: underline;
									}
								</style>
								<div id="publishcomment">
									<?php include("publishcomment.php"); getcomment("1"); ?>
								</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="panel">
                            <div class="sk-chat-widgets">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                       <h3 class="box-title"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i> Agenda</h3>
                                    </div>
                                    <div class="panel-body">
                               <?php
							   include("jadwal/index.php");
							   ?>
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
              <footer class="footer text-center"> 2017 &copy; politeknik elektronika negeri surabaya </footer>
        </div>
    </div>
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="../plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
		   <script src="js/jquery.eventCalendar.js" type="text/javascript"></script>
</body>

</html>
