<?php 
session_start();
include_once('../model/db_connect.php');
$database = new database();
 
if(isset($_SESSION['is_login']))
{
    header('location:home.php');
}
 
if(isset($_COOKIE['username']))
{
  $database->relogin($_COOKIE['username']);
  header('location:home.php');
}
 
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($_POST['remember']))
    {
      $remember = TRUE;
    }
    else
    {
      $remember = FALSE;
    }
 
    if($database->login($username,$password,$remember))
    {
      header('location:home.php');
    }
	else
    {
      header('location:loginsalah.php');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Masuk ke Akun Admin CharityBox</title>
 
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
 
    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
 
    <style>
	  body {
		background: url(back1.jpg) no-repeat center center fixed;
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
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="">
  <a href="index.html"><img class="mb-4" src="img/charityboxlogo.png" alt="" width="120" height="120"></a>
  <h1 class="h3 mb-3 font-weight-normal">Silahkan Login di sini</h1>
  <label for="username" class="sr-only">Username</label>
  <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
  <label for="password" class="sr-only">Password</label>
  <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me" name="remember"> Ingat aku
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Masuk</button>
  <a href="register.php" class="btn btn-lg btn-success btn-block">Daftar</a>
  <p class="mt-5 mb-3 text-muted">Maaf, username atau password salah. Jika belum ada akun, klik button "Daftar"</p>
</form>
</body>
</html>