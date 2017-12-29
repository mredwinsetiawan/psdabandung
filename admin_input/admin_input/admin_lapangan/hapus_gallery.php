<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['username_lapangan_ciliwung_cisadane']) AND !isset($_SESSION['password_lapangan_ciliwung_cisadane'])  AND !isset($_SESSION['wilayah_lapangan_ciliwung_cisadane'])){
header('Location:login.php');
}else{
$id=$_SESSION['id_lapangan_ciliwung_cisadane'];
$wil=$_SESSION['wilayah_lapangan_ciliwung_cisadane'];
?>

<?php
$kode =$_GET["kdunix"];
		
include"../../../koneksi.php";          
$a=mysql_query("select * from rekap_admin_lapangan where kode='$kode' and status='terbaru' ");//untuk melihat apa yang mw di hapus
$cek=mysql_fetch_array($a);//untuk menampilkan apa yang ada pada $a
if(!$cek)
{
echo"<script>alert('data sudah terekap admin input,silahkan hubungi admin input jika terjadi kesalahan saat mengupload gambar');window.location='gallery_admin_lapangan.php'</script>";
}else
{
 
$folder1="../images/$cek[foto1]";//nama folder dan nama foto yag akan di hapus
$folder2="../images/$cek[foto2]";//nama folder dan nama foto yag akan di hapus
$folder3="../images/$cek[foto3]";//nama folder dan nama foto yag akan di hapus

unlink($folder1);//di gunakan untuk menghapus data yang ada di dlam folder
unlink($folder2);//di gunakan untuk menghapus data yang ada di dlam folder
unlink($folder3);//di gunakan untuk menghapus data yang ada di dlam folder
 
//untuk menghapus data yang di inginkan
$del=mysql_query("delete from rekap_admin_lapangan where kode='$kode'");
if($del)
{
echo"<script>alert('data berhasil di hapus');window.location='gallery_admin_lapangan.php'</script>";
}else{
echo"<script>alert('data gagal di hapus');window.location='gallery_admin_lapangan.php'</script>";
}
}
?>

<?}?>