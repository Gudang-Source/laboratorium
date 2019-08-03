<?php
include('konek.php');
if(isset($_POST['ttambah'])){ //['ttambah'] merupakan name dari button di form tambah
	$id	= $_POST['id'];
	$password	= $_POST['password'];
	$username	= $_POST['username'];
	$status	= $_POST['status'];
	
	$sql	= 'insert into user (id,password,username,status) values ("'.$id.'","'.$password.'","'.$username.'","'.$status.'")';
	$query	= mysqli_query($db_link,$sql);
	if($query){
		header('location:../user.php'); 
	}
	else{
		echo 'Gagal';
	}
	
}
?>