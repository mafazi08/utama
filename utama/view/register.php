<?php 
include_once('../model/db_connect.php');
$database = new database();
if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $method = 'aes-256-cbc';
    $key = 'daffa';
    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
    $password = base64_encode(openssl_encrypt($_POST['password'],$method, $key, OPENSSL_RAW_DATA, $iv));
    $nama = $_POST['nama'];
    if($database->register($username,$password,$nama))
    {
      header('location:login.php');
    }
}
 
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Form Pendaftaran</title>
 
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer/">
 
    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
 
    <style>
	  body {
		background: url(back2.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
 
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="sticky-footer.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Pendaftaran Akun CharityBox</h1>
    <p class="lead">Silahkan Daftarkan Identitas Anda</p>
    <hr/>
    <form method="post" action="">
    <div class="form-group row">
      <label for="username" class="col-sm-2 col-form-label">Username</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
      </div>
    </div>
 
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
      </div>
    </div>
 
 
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <a href="login.php" class="btn btn-success">Menu Login</a>
      <button type="submit" class="btn btn-primary" name="register">Daftar</button>
    </div>
  </div>
</form>
  </div>
</main>
 
<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Jika sudah ada akun, klik button "Menu Login"</span>
  </div>
</footer>
</body>
</html>