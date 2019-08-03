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
  $db = 'laboratorium';  
    
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
                     <h2>DOSEN DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>JADWAL KULIAH</strong>
                        </div>
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                <div class="row text-center pad-top">
                 <div class="div-square">
                                <table>
                                  <tr>
                                      <td><strong>ID_Lab</strong></td>
                                      <td><strong>Hari</strong></td>
                                      <td><strong>Jam</strong></td>
                                      <td><strong>Mata Kuliah</strong></td>
                                      <td><strong>ID_Dosen</strong></td>
                                      <td><strong>Kelas</strong></td>
                                  </tr>
                                <?php 
                                    $queri="select * From jadwal_lab" ;

                                    $hasil= mysqli_query ($connect, $queri);
                                    while ($data = mysqli_fetch_array ($hasil)){
                                     echo "    
                                            <tr>
                                            <td>".$data['ID_Lab']."</td>
                                            <td>".$data['hari']."</td>
                                            <td>".$data['jam']."</td>
                                            <td>".$data['matkul']."</td>
                                            <td>".$data['ID_Dosen']."</td>
                                            <td>".$data['kelas']."</td>
                                            </tr> 
                                            ";
                                    }
                                    mysqli_close($connect);
                                ?>
                                </table>
                        </div>
                </div> 
              </div>
                 <!-- /. ROW  -->   
				  <div class="row">
                    <div class="col-lg-12 ">
					<br/>
                        <div class="alert alert-danger">
                             <strong>TERIMA KASIH TELAH MENGUNJUNGI HALAMAN INI</strong>
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->

    
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
