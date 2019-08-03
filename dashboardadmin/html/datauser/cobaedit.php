 <?php
	$ID= $_GET['ID'];
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$koneksi = mysql_connect($dbhost, $dbuser, $dbpass);

	if(! $koneksi ){
		die('Could not connect:' . mysql_error());
	}
	$sql1 = "SELECT * FROM user WHERE ID = '$ID'";
	mysql_select_db('laboratorium');
	$retval = mysql_query( $sql1, $koneksi );
	if(! $retval ) {
		die('Could not get data: ' . mysql_error());
	}
	$data = mysql_fetch_assoc($retval);
	if(isset($_POST['simpan']))
	{
		$id = $data['ID'];
		$password = $_POST['password'];
		$username= $_POST['username'];
		$sql = "UPDATE user SET password = '$password', username = '$username' WHERE ID = '$id'";
		$retval = mysql_query($sql, $koneksi);
		if($retval)
		{
?>
	<script language="javascript">
		<!--
		location.href='../user.php';
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
			<td>ID_User</td>
			<td></td>
			<td></td>
			<td>
				<input type="textfield" name="id" value="<?php echo "[ID]";?>">
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td></td>
			<td></td>
			<td>
				<input type="textfield" name="password" value="<?php echo $data['password'];?>">
			</td>
		</tr>
		<tr>
			<td>Username</td>
			<td></td>
			<td></td>
			<td>
				<input name="username" value="<?php echo $data['username'];?>">
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
