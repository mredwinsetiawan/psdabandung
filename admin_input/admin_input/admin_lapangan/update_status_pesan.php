<?
include"../../../koneksi.php";
session_start();
if(!isset($_SESSION['username_user_ciliwung_cisadane']) AND !isset($_SESSION['password_user_ciliwung_cisadane'])){
header('Location:login.php');
}else{
$id=$_SESSION['id_lapangan_ciliwung_cisadane'];
$wil=$_SESSION['wilayah_lapangan_ciliwung_cisadane'];
$query  = mysql_query("update pesan_notifikasi set status='sudah-terbaca' where id='$id' and kepada='admin-lapangan-".$wil."'");
header('Location:pesan.php');
}
?>