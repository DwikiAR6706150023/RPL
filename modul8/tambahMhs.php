<!DOCTYPE html>
<html>
<head>
	<title>Add Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div id="content">
		<h2>Masukkan Data Mahasiswa</h2>
			<form method="POST" class="form-horizontal">
				<label class="control-label">Nama</label>
				<input type="text" class="form-control" name="nama" placeholder="Nama"><br>
				<label class="control-label">NIM</label>
				<input type="text" class="form-control" name="nim" placeholder="NIM"><br>
				<label class="control-label">Kelas</label>
				<input type="text" class="form-control" name="kelas" placeholder="NIM"><br>
				<input type="submit" class="btn btn-primary" name="submit" value="Tambah">
		</form>
		<?php
			if(isset($_POST['submit'])){
				$name = $_POST['nama'];
				$nim = $_POST['nim'];
				$kelas = $_POST['kelas'];
				$file = 'dataMhs.json';
				if(empty($name) || empty($nim) || empty($kelas)){
					?><script type="text/javascript">alert("Fields Can't Be Empty");</script><?php
				} else{
					$data = array(
								  'nama' => $name,
								  'nim' => $nim,
								  'kelas' => $kelas);
					$file = 'dataMhs.json';
					$dataArr = array();
					$jsonData = file_get_contents($file);
					$dataArr = json_decode($jsonData, true);
					
					$dataArr[] = $data;
					$jsonData = json_encode($dataArr, JSON_PRETTY_PRINT);
					if(file_put_contents($file, $jsonData)){
						?><script type="text/javascript">alert("Data Successfully Saved");</script><?php
					} else{
						?><script type="text/javascript">alert("Data Failed Saved");</script><?php
					}
				}
			}
		?>
	</div>
</body>
</html>