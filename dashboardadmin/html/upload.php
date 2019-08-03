<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/Logo_PENS.png">
    <title>Upload Materi</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
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
                        <h4 class="page-title">Upload File</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Upload Materi</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
								<link rel="stylesheet" type="text/css" href="styleee.css">
								<h1><center>Upload Materi Kuliah</center></h1>
							 	<p>File yang bisa di Upload hanya file dengan ekstensi <b>.doc, .docx, .xls, .xlsx, .ppt, .pptx, .pdf, .rar, .zip</b> dan besar file (file size) maksimal hanya 1 MB.</p>
								<?php
								error_reporting(0);
								mysql_connect("localhost", "root", "");
								mysql_select_db("laboratorium");
								function formatBytes($bytes, $precision = 2) { 
									$units = array('B', 'KB', 'MB', 'GB', 'TB'); 
									$bytes = max($bytes, 0); 
									$pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
									$pow = min($pow, count($units) - 1); 
									$bytes /= pow(1024, $pow); 

			return round($bytes, $precision) . ' ' . $units[$pow]; 
		} 

					if($_POST['upload']){
						$allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
						$file_name		= $_FILES['file']['name'];
						$file_ext		= strtolower(end(explode('.', $file_name)));
						$file_size		= $_FILES['file']['size'];
						$file_tmp		= $_FILES['file']['tmp_name'];
						$matkul			= $_POST['matkul'];
						$dosen			= $_POST['dosen'];
						$kelas			= $_POST['kelas'];
						$nama			= $_POST['nama'];
						$tgl			= date("Y-m-d");

						if(in_array($file_ext, $allowed_ext) === true){
							if($file_size < 1044070){
								$lokasi = 'files/'.$nama.'.'.$file_ext;
								move_uploaded_file($file_tmp, $lokasi);
								$in = mysql_query("INSERT INTO download VALUES(NULL, '$tgl','$matkul','$dosen','$kelas','$nama','$file_ext','$file_size','$lokasi')");
								if($in){
									echo '<div class="ok">SUCCESS: File berhasil di Upload!</div>';
								}else{
									echo '<div class="error">ERROR: Gagal upload file!</div>';
								}
							}else{
								echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
							}
						}else{
							echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
						}
					}
					?>
		 <div class="row col-sm-push-2 col-sm-8">
					<p>
					<form action="" method="post" enctype="multipart/form-data">
					<table width="100%" align="center" border="0" bgcolor="#eee" cellpadding="2" cellspacing="0">
						<tr>
							<td width="40%" height="50%" align="left">Matakuliah</td><td>:</td><td><input class="form-control" type="text" name="matkul" size="50"required /></td>
						</tr>
						<tr>
							<td width="40%" height="50%" align="left">Dosen</td><td>:</td><td><input class="form-control" type="text" name="dosen" size="50"required /></td>
						</tr>
						<tr>
							<td width="40%" height="50%" align="left">Kelas</td><td>:</td><td><input class="form-control" type="text" name="kelas" size="50"required /></td>
						</tr>
						<tr>
							<td width="40%" height="50%" align="left">Nama File</td><td>:</td><td><input class="form-control" type="text" name="nama" size="50"required /></td>
						</tr>
						<tr>
							<td width="40%" height="50%" align="left">Pilih File</td><td>:</td><td><input  type="file" name="file" required /></td>
						</tr>
						<tr>
							<td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="upload" value="Upload" /></td>
						</tr>
					</table>
					</form>
					<p>
			 </div>
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
