 <?php
	$id= $_GET['id'];
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$koneksi = mysql_connect($dbhost, $dbuser, $dbpass);

	if(! $koneksi ){
		die('Could not connect:' . mysql_error());
	}
	$sql1 = "SELECT * FROM staff WHERE id = '$id'";
	mysql_select_db('laboratorium');
	$retval = mysql_query( $sql1, $koneksi );
	if(! $retval ) {
		die('Could not get data: ' . mysql_error());
	}
	$data = mysql_fetch_assoc($retval);
	if(isset($_POST['simpan']))
	{
		$id = $data['id'];
		$Nama = $_POST['Nama'];
		$Alamat= $_POST['Alamat'];
		$no_telp= $_POST['no_telp'];
		$sql = "UPDATE staff SET Alamat = '$Alamat', no_telp = '$no_telp' WHERE id= '$id'";
		$retval = mysql_query($sql, $koneksi);
		if($retval)
		{
?>
	<script language="javascript">
		<!--
		location.href='../staff.php';
	</script>
<?php
		}else{
			die('Tidak Dapat menambahkan data<br>'.mysql_error());
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post">
	<table>
		<tr>
			<td>ID_Staff</td>
			<td></td>
			<td></td>
			<td>
				<input type="textfield" name="id" value="<?php echo "$id";?>">
			</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td></td>
			<td></td>
			<td>
				<input type="textfield" name="Nama" value="<?php echo $data['Nama'];?>">
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td></td>
			<td></td>
			<td>
				<input name="Alamat" value="<?php echo $data['Alamat'];?>">
			</td>
		</tr>
				<tr>
			<td>No Telp</td>
			<td></td>
			<td></td>
			<td>
				<input name="no_telp" value="<?php echo $data['no_telp'];?>">
			</td>
		</tr>
		<tr>
			<td> </td>
		</tr>
		<tr>
			<td> </td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="simpan" value="Simpan">
			</td>
		</tr>
	</table>
</form>


</body>
</html>
