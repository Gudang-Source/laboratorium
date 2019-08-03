<body bgcolor="#CCCCCC">
<h2><p align="center">TAMBAH DATA</p></h2>
<form method="post" action="proses.php">
<table width="546" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
  <!--DWLayoutTable-->
  <tr>
    <td width="189" height="20"> </td>
    <td width="26"> </td>
    <td width="331"> </td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">ID</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="id" type="text" size="10">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Nama</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input type="text" name="Nama">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Alamat</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="Alamat" type="text" size="50">
    </label></td>
  </tr>
	 <tr>
    <td height="27" align="right" valign="middle">No Telp</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="no_telp" type="text" size="50">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Status</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <select name="status">
	  	<option selected="selected">--Pilih--</option>
		<option>Dosen</option>
		<option>Admin</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td height="42"> </td>
    <td> </td>
    <td><input type="submit" name="ttambah" value="TAMBAH"></td>
  </tr>

</table>
</form>
</body>