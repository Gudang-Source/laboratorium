<?php
include "head.php"; 
if(isset($_POST['kirim'])){
	$allow = array("jpg", "jpeg", "gif", "png");
	$tgl=date("Y-m-d-h-i-sa");
	$todir = "../images/gallery/$tgl";
	$dir = "images/gallery/$tgl";
	if ( !!$_FILES['file']['tmp_name'] ) // is the file uploaded yet?
	{
		$info = explode('.', strtolower( $_FILES['file']['name']) ); // whats the extension of the file
    if ( in_array( end($info), $allow) ) // is this file allowed
    {
        if ( move_uploaded_file( $_FILES['file']['tmp_name'], $todir . basename($_FILES['file']['name'] ) ) )
        {
			$urlgambar = $dir.''.$_FILES["file"]["name"];
			$namagambar = $_FILES["file"]["name"];
			$gambar_username = $_SESSION['username'];
			$tglgambar = date("Y-m-d"); 			
			$sql = "INSERT INTO gallery (gambar_name, gambar_url, gambar_username, gambar_date) VALUES ('$namagambar', '$urlgambar', '$gambar_username','$tglgambar')";
			if ($conn->query($sql) === TRUE) {
				echo '
				<div class="w3-panel w3-blue">
				<h3>Sukses</h3>
				<p>Postingan Sukses diterbitkan</p>
				</div>
			'; 
		}
    //echo "Upload: $dir" . $_FILES["file"]["name"] . "<br>";
    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    //echo "Stored in: " . $_FILES["file"]["tmp_name"];
        }
    }
    else
    {
        // error this file ext is not allowed
    }
	}
}
?>

    <form action="" method="POST" class="w3-container w3-card-4 w3-white" enctype="multipart/form-data">
        <h2>Tambah Foto</h2>
        <p>Hanya support format <b>.jpg</b> dan <b>.png</b>.</p>	
        <p><!--
            <label>Judul Postingan</label>
            <input class="w3-input w3-border" name="judulgambar" type="text" placeholder="Tulis Judul Artikel Disini" required>
            <br/>
			-->
            <label>Upload Foto</label>
            <input class="w3-input w3-border" name="file" type="file">
            <br/>
        </p>
        <p class="w3-center">
            <input class="w3-button w3-blue w3-border w3-border-white" name="kirim" type="submit" value="Upload">
        </p>
    </form>
    <?php
include"foot.php";
?>