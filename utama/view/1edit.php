<?php
session_start();
if(! isset($_SESSION['is_login']))
{
  header('location:index.html');
}
// include database connection file
include_once("../model/1config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$tipe = $_POST['tipe'];
	$nama = $_POST['nama'];
	$nomor = $_POST['nomor'];
	$kartu = $_POST['kartu'];
	$nominal = $_POST['nominal'];
	$pesan = $_POST['pesan'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE amal SET tipe='$tipe',nama='$nama',nomor='$nomor',kartu='$kartu',nominal='$nominal',pesan='$pesan' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: ../view/1index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM amal WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$tipe = $user_data['tipe'];
	$nama = $user_data['nama'];
	$nomor = $user_data['nomor'];
	$kartu = $user_data['kartu'];
	$nominal = $user_data['nominal'];
	$pesan = $user_data['pesan'];
}
?>
<html>
<head>	
	<title>Mengubah Data </title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="resources/font-awesome/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="resources/silviomoreto-bootstrap-select/bootstrap-select.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
</head>
 
<body class="d-flex flex-column h-100">
	<a href="1index.php">Kembali</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="1edit.php">
		<table width="auto" border="0" style="box-shadow:10px 10px 20px 20px rgba(0, 0, 0, 0.46); display: flex; justify-content: center;">
			<tr> 
				<td>Tipe Sedekah</td>
				<td><input type="text" name="tipe" value=<?php echo $tipe;?>></td>
			</tr>
			<tr> 
				<td>Nama Lengkap</td>
				<td><input type="text" name="nama" value=<?php echo $nama;?>></td>
			</tr>
			<tr> 
				<td>Nomor telepon/HP</td>
				<td><input type="text" name="nomor" value=<?php echo $nomor;?>></td>
			</tr>
			<tr> 
				<td>Nomor kartu</td>
				<td><input type="text" name="kartu" value=<?php echo $kartu;?>></td>
			</tr>
			<tr> 
				<td>Jumlah uang yang disedekahkan</td>
				<td><input type="text" name="nominal" value=<?php echo $nominal;?>></td>
			</tr>
			<tr> 
				<td>Pesan dan Kesan</td>
				<td><input type="text" name="pesan" value=<?php echo $pesan;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>