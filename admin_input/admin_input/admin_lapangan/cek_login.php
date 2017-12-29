<?php
include"../../../koneksi.php";

$userr 	= $_POST['tUser'];
$pwd   	= $_POST['tPwd'];	
		// Mencegah MySQL injection 
		$userr = stripslashes($userr);
		$pwd = stripslashes($pwd);
		$userr = mysql_real_escape_string($userr);
		$pwd = mysql_real_escape_string($pwd);

$hasil  = mysql_query("SELECT * FROM user_admin_lapangan WHERE username='$userr' AND password='$pwd'");
$hitung = mysql_num_rows($hasil);
$data   = mysql_fetch_array($hasil);

if ($hitung > 0)
    {

	session_start();
    $_SESSION['id_lapangan_ciliwung_cisadane'] = $data['kode'];
	$_SESSION['username_lapangan_ciliwung_cisadane'] = $data['username'];
	$_SESSION['password_lapangan_ciliwung_cisadane'] = $data['password'];
	$_SESSION['wilayah_lapangan_ciliwung_cisadane'] = $data['wilayah'];
	
	header('Location:index.php');
}else{
   echo "Login gagal, <a href='index.php'>Ulangi</a>";
}
?>