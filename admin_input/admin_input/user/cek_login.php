<?php
include"../../../koneksi.php";

$userr 	= $_POST['tUser'];
$pwd   	= $_POST['tPwd'];
		// Mencegah MySQL injection 
		$userr = stripslashes($userr);
		$pwd = stripslashes($pwd);
		$userr = mysql_real_escape_string($userr);
		$pwd = mysql_real_escape_string($pwd);
$hasil  = mysql_query("SELECT * FROM data_user WHERE username='$userr' AND password='$pwd'");
$hitung = mysql_num_rows($hasil);
$data   = mysql_fetch_array($hasil);

if ($hitung > 0)
    {

	session_start();
    $_SESSION['id_user_ciliwung_cisadane'] = $data['kode'];
	$_SESSION['username_user_ciliwung_cisadane'] = $data['username'];
	$_SESSION['password_user_ciliwung_cisadane'] = $data['password'];
	$_SESSION['korwil_user_ciliwung_cisadane'] = $data['korwil'];
	
	header('Location:index.php');
}else{
   header('Location:login_salah.php');
}
?>