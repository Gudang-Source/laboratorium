<?php
	$ID = $_GET['ID'];
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$koneksi = mysql_connect($dbhost, $dbuser, $dbpass);

	if(! $koneksi ){
		die('Could not connect:' . mysql_error());
	}
	$sql = "DELETE FROM user WHERE ID = '$ID'";
	mysql_select_db('laboratorium');
	$retval = mysql_query( $sql, $koneksi );
	if($retval ) {
?>
 <script language="javascript">
 		<!--
				window.alert("Data telah terhapus");
				location.href ='../user.php';
		//-->
</script>
<?php
			}else{
?>
<script language="javascript">
 		<!--
				window.alert("Data tidak berhasil terhapus");
				location.href ='../user.php';
		//-->
</script>
<?php

			}
?>
