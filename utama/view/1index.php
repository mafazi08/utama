<?php
session_start();
if(! isset($_SESSION['is_login']))
{
  header('location:index.html');
}
// Create database connection using config file
include_once("../model/1config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM amal ORDER BY id DESC");
?>
 
<html>
<head>    
    <title>Daftar Donasi CharityBox</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="resources/font-awesome/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="resources/silviomoreto-bootstrap-select/bootstrap-select.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>>
    <a href="home.php">Kembali</a>
</head>
 
<body>
	<h1>Daftar Donasi CharityBox</h1>
    <table width='80%' border=1>
    <tr>
        <th>Tipe sedekah</th> <th>Nama lengkap</th> <th>Nomor telepon/HP</th> <th>Nomor kartu</th> <th>Sedekah</th> <th>Pesan</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['tipe']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['nomor']."</td>";   
		echo "<td>".$user_data['kartu']."</td>";
        echo "<td>".$user_data['nominal']."</td>";
        echo "<td>".$user_data['pesan']."</td>";  		
        echo "<td><a href='1edit.php?id=$user_data[id]'>Edit</a> | <a href='../controller/1delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>