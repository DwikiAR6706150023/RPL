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
				<input type="submit" class="btn btn-primary" name="submit" value="Tambah">
		</form>
		<?php
			function c_element($data,$parent){
				global $xml;
				$data = $xml->createElement($data);
				$parent->appendChild($data);
				return $data; 
			}
			function c_value($value,$parent){
				global $xml;
				$value=$xml->createTextNode($value);
				$parent->appendChild($value);
				return $value;
			}
			if(isset($_POST['submit'])){
				$name = $_POST['nama'];
				$nim = $_POST['nim'];
				
				$xml = new DOMDocument("1.0");
				$xml->load("dataMhs.xml");
				$root = $xml->getElementsByTagName("Mahasiswa")->item(0);
				$element = c_element("Profil", $root);
				$Nim = c_element("Nim", $element);
				c_value("$nim", $Nim);
				$nama = c_element("Nama", $element);
				c_value("$name", $nama);
				if($xml->FormatOutput = true){
					?><script type="text/javascript">alert("Data Successfully Saved");</script><?php
					$xml->save("dataMhs.xml");
				}
			}
		?>
	</div>
</body>
</html>