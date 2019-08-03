<?php
error_reporting(0);
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass='';
$dbname='laboratorium'; 
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $_SESSION['username'] = $user;
    $_SESSION['login_user'] = $user;
    $_SESSION['password'] = $pass;
//echo $user."<br/>";
//echo $_SESSION['password'];
}
$sql = 'SELECT * FROM user';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) { 
        $tempusername = $row["username"];
        $temppassword = $row["password"];
        if(($user == $tempusername) && ($pass == $temppassword)){
           $tempstatus = $row['status'];
			if($tempstatus == 'admin'){
				header("location:dashboardadmin\html");
			}elseif($tempstatus == 'dosen'){
				header("location:dashboarddosen\html");
			}else{
				header("location:dashboardmahasiswa");
			}
        }else{
        }
    }
}
if($hitung == 0){
      // header("location:dashboardmahasiswa");
    }
?>