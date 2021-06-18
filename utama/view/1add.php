<html>
<head>
	<title >Donasi CharityBox</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="resources/font-awesome/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="resources/silviomoreto-bootstrap-select/bootstrap-select.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
 
<body>
	<form action="1add.php" method="post" name="form1">
		<table width="auto" border="0" style="box-shadow:10px 10px 20px 20px rgba(0, 0, 0, 0.46); display: flex; justify-content: center;">
			<tr> 
				<td>Tipe sedekah</td>
				<td><input type="text" name="tipe" value="Bantuan untuk Caledu" readonly></td>
			</tr>
			<tr> 
				<td>Nama lengkap</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr> 
				<td>Nomor telepon/HP</td>
				<td><input type="text" name="nomor"></td>
			</tr>
			<tr> 
				<td>Nomor kartu</td>
				<td><input type="text" name="kartu"></td>
			</tr>
			<tr> 
				<td>Jumlah uang yang disedekahkan</td>
				<td><input type="text" name="nominal"></td>
			</tr>
			<tr> 
				<td>Pesan dan Kesan</td>
				<td><input type="text" name="pesan"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Selesai"></td>
				<a href="tsunami.html">Kembali</a>
			</tr>
		</table>
	</form>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$tipe = $_POST['tipe'];
		$nama = $_POST['nama'];
		$nomor = $_POST['nomor'];
		$kartu = $_POST['kartu'];
		$nominal = $_POST['nominal'];
		$pesan = $_POST['pesan'];
		
		// include database connection file
		include_once("../model/1config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO amal(tipe,nama,nomor,kartu,nominal,pesan) VALUES('$tipe','$nama','$nomor','$kartu','$nominal','$pesan')");
		
		// Show message when user added
		echo "Data Berhasil ditambahkan";
	}
	?>
</body>
</html>