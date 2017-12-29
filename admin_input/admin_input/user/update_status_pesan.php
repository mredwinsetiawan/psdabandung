<?
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['username_user_ciliwung_cisadane']) AND !isset($_SESSION['password_user_ciliwung_cisadane'])){
header('Location:login.php');
}else{
$kode=$_SESSION['id_user_ciliwung_cisadane'];
$korwil_user_ciliwung_cisadane=$_SESSION['korwil_user_ciliwung_cisadane'];
$nopo  = mysql_query("SELECT * FROM data_user WHERE kode='$kode'");
$nopoar  = mysql_fetch_array($nopo);
$query  = mysql_query("update pesan_notifikasi set status='sudah-terbaca' where id='$kode' and kepada='$nopoar[nama_perusahaan]'");
header('Location:pesan.php');
?>

<?}?>