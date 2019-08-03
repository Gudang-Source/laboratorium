<?php
	$NRP = $_GET['NRP'];
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$koneksi = mysql_connect($dbhost, $dbuser, $dbpass);

	if(! $koneksi ){
		die('Could not connect:' . mysql_error());
	}
	$sql = "DELETE FROM mahasiswa WHERE NRP = '$NRP'";
	mysql_select_db('laboratorium');
	$retval = mysql_query( $sql, $koneksi );
	if($retval ) {
?>
 <script language="javascript">
 		<!--
				window.alert("Data telah terhapus");
				location.href ='../mahasiswa.php';
		//-->
</script>
<?php
			}else{
?>
<script language="javascript">
 		<!--
				window.alert("Data tidak berhasil terhapus");
				location.href ='../mahasiswa.php';
		//-->
</script>
<?php

			}
?>
