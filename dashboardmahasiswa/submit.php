<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laboratorium</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>   

<?php
$host = 'localhost';
  $user = 'root';      
  $password = '';      
  $db = 'labolatorium';  
    
  $connect = mysqli_connect($host, $user, $password, $db);
?>    

    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <h3>Informatics Laboratory</h3>
                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="#" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">                    <li class="active-link">
                        <a href="index.php" ><i class="fa fa-desktop "></i>Service<span class="badge">Included</span></a>
                    </li>
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>aMAHASISWA DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome </strong> 
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
								<link rel="stylesheet" type="text/css" href="styleee.css">
								<h1><center>Upload Tugas Kuliah</center></h1>
							 	<center><p>File yang bisa di Upload hanya file dengan ekstensi <b>.doc, .docx, .xls, .xlsx, .ppt, .pptx, .pdf, .rar, .zip</b></p></center>
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
								$in = mysql_query("INSERT INTO tugas VALUES(NULL, '$tgl','$matkul','$dosen','$kelas','$nama','$file_ext','$file_size','$lokasi')");
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
		
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
 <footer class="footer text-center"> 2017 &copy; politeknik elektronika negeri surabaya </footer>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
