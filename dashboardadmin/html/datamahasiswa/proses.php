<?php
include('konek.php');
if(isset($_POST['ttambah'])){ //['ttambah'] merupakan name dari button di form tambah
	$NRP	= $_POST['NRP'];
	$Nama= $_POST['Nama'];
	$kelas	= $_POST['kelas'];
	$no_telp	= $_POST['no_telp'];
	
	$sql	= 'insert into mahasiswa (NRP,Nama,kelas,no_telp) values ("'.$NRP.'","'.$Nama.'","'.$kelas.'","'.$no_telp.'")';
	$query	= mysqli_query($db_link,$sql);
	if($query){
		header('location:../mahasiswa.php'); 
	}
	else{
		echo 'Gagal';
	}
	
}
?>