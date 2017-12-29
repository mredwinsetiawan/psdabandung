<?php
include"../../../koneksi.php";
$sippa 	= $_POST['sippa'];
if(empty($sippa))
{
	echo"<script>alert('SIPPA tidak boleh kosong');window.location='login.php'</script>";
}else{
		// Mencegah MySQL injection 
		$sippa = stripslashes($sippa);
		$sippa = mysql_real_escape_string($sippa);
$hasil  = mysql_query("SELECT * FROM data_user WHERE sippa='$sippa'");
$hitung = mysql_num_rows($hasil);
$data   = mysql_fetch_array($hasil);

if ($hitung > 0)
    {

	session_start();
    $_SESSION['id_user_ciliwung_cisadane'] = $data['kode'];
    $_SESSION['sippa_user'] = $data['sippa'];
	
	header('Location:sippa_berhasil.php');
}else{
   header('Location:salah_cek_sippa.php');
}}
?>