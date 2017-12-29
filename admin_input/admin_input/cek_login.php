<?php
include"../../koneksi.php";

$userr 	= $_POST['tUser'];
$pwd   	= $_POST['tPwd'];
		// Mencegah MySQL injection 
		$userr = stripslashes($userr);
		$pwd = stripslashes($pwd);
		$userr = mysql_real_escape_string($userr);
		$pwd = mysql_real_escape_string($pwd);
$hasil  = mysql_query("SELECT * FROM user_admin WHERE hak_akses='admin_input' and username='$userr' AND password='$pwd'");
$hitung = mysql_num_rows($hasil);
$data   = mysql_fetch_array($hasil);

if ($hitung > 0)
    {

	session_start();
    $_SESSION['id_admin_1'] = $data['kode'];
    $_SESSION['wilayah_admin_1'] = $data['wilayah'];
	$_SESSION['username_admin_1'] = $data['username'];
	$_SESSION['password_admin_1'] = $data['password'];
	
	header('Location:index.php');
}else{
	
echo"<script>alert('Login Gagal');window.location='login.php'</script>";
}
?>