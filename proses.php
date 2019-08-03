<?php
require_once('dashboard/function.php'); 
if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['kirim'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass = md5($pass);
    $_SESSION['username'] = $user;
    $_SESSION['password'] = $pass;
echo $user."<br/>";
echo $_SESSION['password'];
}

$sql = 'SELECT * FROM user';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo"<br/>";
        $tempusername = $row["username"];
        $temppassword = $row["password"];
        if(($user == $tempusername) && ($pass == $temppassword)){ 
           $_SESSION['status'] = "sukses";
           $_SESSION['levelpengguna'] = $row['level']; 
           header("location:http://localhost/template%20-%20d3%20it/dashboard/index.php");
           $hitung=1;
        }else{
            $hitung = 0;
        }
    }
}
if($hitung == 0){
        header("location:login.php?login=gagal");
    }
?>