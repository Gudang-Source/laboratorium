<?php
include('konek.php'); 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body bgcolor="#CCCCCC">
<?php
	error_reporting(0);
$sql	= 'SELECT id, password, username, status FROM user';
$query	= mysqli_query($db_link,$sql);
?>
<h2><strong><p align="center">Data User</p></strong></h2>
<table width="807" border="1" cellpadding="0" cellspacing="0" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td width="112" height="29" align="center" valign="middle" bgcolor="#00FFFF">ID_USER</td>
    <td width="176" align="center" valign="middle" bgcolor="#00FFFF">Password</td>
    <td width="252" align="center" valign="middle" bgcolor="#00FFFF">Username</td>
    <td width="134" align="center" valign="middle" bgcolor="#00FFFF">Status</td>
    <td width="133" align="center" valign="middle" bgcolor="#00FFFF"><a href="tambah.php">TAMBAH</a></td></tr>
<?php
	while($data	= mysqli_fetch_array($query)){ 
?>
  <tr>
    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['id']; ?></td>
    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['password']; ?></td>
    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['username']; ?></td>
    <td p align="center" bgcolor="#FFFFFF"><?php echo $data['status']; ?></td>
      <td p align="center" bgcolor="#FFFFFF">
		  <a href="cobaedit.php ?id=<?php echo $data['id'];?>" title="Edit siswa ini"> || Edit || </a>
<a href="cobadelete.php?id=<?php echo $data['id'];?>" onclick="return confirm('Yakin mau di hapus?');">|| Hapus ||</a>
	</td>
  </tr>
<?php
}
?>
</table>
</body>
</html>