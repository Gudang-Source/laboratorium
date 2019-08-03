<!DOCTYPE html>
<html>
<head>
	<title>Download Laporan Praktikum</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<style>
		body{
			background-color: whitesmoke;
		}
		h1{
  			font-family: sans-serif;
		}
 
		table {
			 font-family: Arial, Helvetica, sans-serif;
			 color: #666;
			 text-shadow: 1px 1px 0px #fff;
			 background: #eaebec;
			 border: #ccc 1px solid;
			border-radius: 20px;
			border-bottom-left-radius: 10px;
			border-bottom-right-radius: 10px;
		}
		table th {
		  padding: 8px 28px;
		  border-left:1px solid #e0e0e0;
		  border-bottom: 1px solid #e0e0e0;
		  background: #ededed;
		}

		table th:first-child{  
		  border-left:none; 
		}

		table tr {
		  text-align: center;
		  padding-left: 10px;
		}

	</style>
        <div id="content">
			 <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/Logo_PENS.png">
        	<center><h1>Laporan Praktikum</h1></center>
           <center><h3>Silahkan download Laporan Praktikum Mahasiswa. Untuk men-Download Anda bisa mengklik Judul file yang di inginkan.</h3></center>
 
            <p>
				<form>
            <table class="table" width="100%" cellpadding="3" cellspacing="0">
            	<tr>
                	<th width="20px">No.</th>
                    <th width="40px">Tgl. Upload</th>
					<th width="80px">Matakuliah</th>
					<th width="80px">Dosen</th>
					<th width="80px">Kelas</th>
                    <th width="100px">Nama File</th>
                    <th width="50px">Tipe</th>
                    <th width="50px">Ukuran</th>
                </tr>
                <?php
				include('config.php');
				$sql = mysql_query("SELECT * FROM tugas ORDER BY id ASC");
				if(mysql_num_rows($sql) > 0){
					$no = 1;
					while($data = mysql_fetch_assoc($sql)){
						echo '
						<tr bgcolor="#fff">
							<td align="center">'.$no.'</td>
							<td align="center">'.$data['tanggal_upload'].'</td>
							<td align="justify">'.$data['matkul'].'</td>
							<td align="center">'.$data['dosen'].'</td>
							<td align="justify">'.$data['kelas'].'</td>
							<td align="justify"><a href="'.$data['file'].'">'.$data['nama_file'].'</a></td>
							<td align="center">'.$data['tipe_file'].'</td>
							<td align="center">'.formatBytes($data['ukuran_file']).'</td>
						</tr>
						';
						$no++;
					}
				}else{
					echo '
					<tr bgcolor="#fff">
						<td align="center" colspan="4" align="center">Tidak ada data!</td>
					</tr>
					';
				}
				?>
            </table>
					
			<br><center><a href="../index.php"><h2>Kembali ke Dashboard</h2></a></center>
            <p>
					</form>
        </div>
 
 
</body>
</html>