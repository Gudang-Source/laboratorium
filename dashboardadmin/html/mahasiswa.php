<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/Logo_PENS.png">
    <title>Data Mahasiswa</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li>
                           <a class="profile-pic" href="#"> <img src="../plugins/images/User_man_male_profile_account_person_people.png" alt="user-img" width="36" class="img-circle"><b id="welcome">Welcome <i><?php error_reporting(0); echo $login_session; ?></i></b></a>
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
                        <a href="upload.php" class="waves-effect"><i class="fa fa-file-text fa-fw" aria-hidden="true"></i>Upload Modul Praktikum</a>
                    </li>
				</ul>
            </div>
            
        </div>
       
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Data Mahasiswa</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Mahasiswa</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
								<?php
									error_reporting(0);
									$db_host	= 'localhost'; 
									$db_usn		= 'root'; 
									$db_pwd		= ''; 
									$db_name	= 'laboratorium'; 
									$db_link	= mysqli_connect($db_host,$db_usn,$db_pwd,$db_name);
									if (!$db_link){
										echo 'Tidak dapat terhubung ke database';
									}
								?>
								<?php
									error_reporting(0);
									$sql	= 'SELECT NRP,Nama, kelas, no_telp FROM mahasiswa';
									$query	= mysqli_query($db_link,$sql);
								?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">NRP</td>
											<td width="176" align="center" valign="middle" bgcolor="#00FFFF">Nama</td>
											<td width="252" align="center" valign="middle" bgcolor="#00FFFF">Kelas</td>
											<td width="134" align="center" valign="middle" bgcolor="#00FFFF">No Telp</td>
											<td width="133" align="center" valign="middle" bgcolor="#00FFFF"><a href="../html/datamahasiswa/tambah.php">TAMBAH</a></td>
                                        </tr>
                                    </thead>
                                 <?php
									while($data	= mysqli_fetch_array($query)){ 
								?>
									  <tr>
											<td p align="center" bgcolor="#FFFFFF"><?php echo $data['NRP']; ?></td>
											<td p align="center" bgcolor="#FFFFFF"><?php echo $data['Nama']; ?></td>
											<td p align="center" bgcolor="#FFFFFF"><?php echo $data['kelas']; ?></td>
											<td p align="center" bgcolor="#FFFFFF"><?php echo $data['no_telp']; ?></td>
											<td p align="center" bgcolor="#FFFFFF"><a href="../html/datamahasiswa/cobaedit.php ?NRP=<?php echo $data['NRP'];?>" title="Edit Siswa ini"> || Edit || </a><a href="../html/datamahasiswa/cobadelete.php?NRP=<?php echo $data['NRP'];?>" onclick="return confirm('Yakin mau di hapus?');">|| Hapus ||</a>
											</td>
									  </tr>
								<?php
									}
								?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; politeknik elektronika negeri surabaya </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>
