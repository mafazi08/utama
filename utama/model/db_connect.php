<?php 
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "database_user";
	var $koneksi;
 
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}
 
 
	function register($username,$password,$nama)
	{	
		$insert = mysqli_query($this->koneksi,"insert into tb_user values ('','$username','$password','$nama')");
		return $insert;
	}
 
	function login($username,$password,$remember)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_user where username='$username'");
		$data_user = $query->fetch_array();
		$method = 'aes-256-cbc';
    $key = 'daffa';
    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
		if($password==openssl_decrypt(base64_decode($data_user['password']),$method, $key, OPENSSL_RAW_DATA, $iv)) 
		{
			
			if($remember)
			{
				setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
				setcookie('nama', $data_user['nama'], time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $data_user['nama'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}
 
	function relogin($username)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_user where username='$username'");
		$data_user = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data_user['nama'];
		$_SESSION['is_login'] = TRUE;
	}
} 
 
 
?>