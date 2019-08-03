<?php
error_reporting(0);
if($_POST["tombol"]=="Kirim")
{
$nama=$_POST["nama"];
$email=$_POST["email"];
$komentar=$_POST["komentar"];
$art_id=$_POST["art_id"];
$art_url=$_POST["art_url"];
if(empty($nama))
$_POST["nama"]='anonymous';
if(empty($komentar)){
echo "<meta http-equiv='refresh' content='2; url=$art_url'>";
die("komentar harus diisi");}
}
//connect database
$con=mysql_connect("localhost", "root", "");
if(!$con)
die("Tidak dapat melakukan koneksi ke server MySQL");
//Menampilkan data
mysql_select_db("laboratorium", $con);
$sql="INSERT INTO comment (nama, email, komentar, art_id, art_url,
date)
VALUES
('$_POST[nama]','$_POST[email]', '$_POST[komentar]',
'$_POST[art_id]', '$_POST[art_url]', NOW())";
if (!mysql_query($sql,$con))
 {
 die('Error: ' . mysql_error());
 }
echo "<meta http-equiv='refresh' content='0; url=$art_url'>";
//Memutuskan koneksi
mysql_close($con);
?>
