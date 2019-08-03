 <?php
	$NRP= $_GET['NRP'];
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$koneksi = mysql_connect($dbhost, $dbuser, $dbpass);

	if(! $koneksi ){
		die('Could not connect:' . mysql_error());
	}
	$sql1 = "SELECT * FROM mahasiswa WHERE NRP = '$NRP'";
	mysql_select_db('laboratorium');
	$retval = mysql_query( $sql1, $koneksi );
	if(! $retval ) {
		die('Could not get data: ' . mysql_error());
	}
	$data = mysql_fetch_assoc($retval);
	if(isset($_POST['simpan']))
	{
		$NRP = $data['NRP'];
		$kelas= $_POST['kelas'];
		$no_telp = $_POST['no_telp'];
		$sql = "UPDATE mahasiswa SET kelas = '$kelas', no_telp = '$no_telp' WHERE NRP = '$NRP'";
		$retval = mysql_query($sql, $koneksi);
		if($retval)
		{
?>
	<script language="javascript">
		<!--
		location.href='../mahasiswa.php';
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
	<table padding=9>
		<tr>
			<td>NRP</td>
            <td>:</td>
			<td></td>
			<td>
				<input type="textfield" name="NRP" value="<?php echo "$NRP";?>">
			</td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td></td>
			<td>
				<input type="textfield" name="kelas" value="<?php echo $data['kelas'];?>">
			</td>
		</tr>
		<tr>
			<td>No Telp</td>
			<td>:</td>
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
