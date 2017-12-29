<?php
session_start();
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php');
}else{
$wilayah_admin=$_SESSION['wilayah_admin_1'];
?>

<?php
$kode =$_GET["kdunix"];
		
include"../../koneksi.php";          
$a=mysql_query("select * from rekap_admin_lapangan where kode='$kode'");//untuk melihat apa yang mw di hapus
$cek=mysql_fetch_array($a);//untuk menampilkan apa yang ada pada $a
 
$folder1="images/$cek[foto1]";//nama folder dan nama foto yag akan di hapus
$folder2="images/$cek[foto2]";//nama folder dan nama foto yag akan di hapus
$folder3="images/$cek[foto3]";//nama folder dan nama foto yag akan di hapus

unlink($folder1);//di gunakan untuk menghapus data yang ada di dlam folder
unlink($folder2);//di gunakan untuk menghapus data yang ada di dlam folder
unlink($folder3);//di gunakan untuk menghapus data yang ada di dlam folder
 
//untuk menghapus data yang di inginkan
$del=mysql_query("delete from rekap_admin_lapangan where kode='$kode'");
if(!$del)
{
echo"<script>alert('Gagal Hapus');window.location='sudah_ter-edit.php'</script>";
				
}else{
echo"<script>alert('Berhasil Hapus');window.location='sudah_ter-edit.php'</script>";
}
	
?>

<?}?>