<?php
include "koneksi.php";

$userr 	= $_POST['tUser'];
$pwd   	= $_POST['tPwd'];
		// Mencegah MySQL injection 
		$userr = stripslashes($userr);
		$pwd = stripslashes($pwd);
		$userr = mysql_real_escape_string($userr);
		$pwd = mysql_real_escape_string($pwd);
$hasil  = mysql_query("SELECT * FROM user_admin WHERE hak_akses='legalitas' AND username='$userr' AND password='$pwd'");
$hitung = mysql_num_rows($hasil);
$data   = mysql_fetch_array($hasil);

if ($hitung > 0)
    {

	session_start();
    $_SESSION['id_legalitas'] = $data['kode'];
	$_SESSION['username_legalitas'] = $data['username'];
	$_SESSION['password_legalitas'] = $data['password'];
	
	header('Location:index.php');
}else{
   echo "Login gagal, <a href='login.php'> Ulangi</a>";
}
?>