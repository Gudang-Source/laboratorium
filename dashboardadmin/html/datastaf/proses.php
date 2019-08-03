<?php
include('konek.php');
if(isset($_POST['ttambah'])){ //['ttambah'] merupakan name dari button di form tambah
	$id	= $_POST['id'];
	$Nama= $_POST['Nama'];
	$Alamat	= $_POST['Alamat'];
	$no_telp	= $_POST['no_telp'];
	$status	= $_POST['status'];
	
	$sql	= 'insert into staff (id,Nama,Alamat,no_telp,status) values ("'.$id.'","'.$Nama.'","'.$Alamat.'","'.$no_telp.'","'.$status.'")';
	$query	= mysqli_query($db_link,$sql);
	if($query){
		header('location:../staff.php'); 
	}
	else{
		echo 'Gagal';
	}
	
}
?>