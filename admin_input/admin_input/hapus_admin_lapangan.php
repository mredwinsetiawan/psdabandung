<?php
session_start();
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php');
}else{
	
$wilayah_admin=$_SESSION['wilayah_admin_1'];
?>

<?php
$kd =$_GET["kdunix"];
include"../../koneksi.php";          
$a=mysql_query("select * from user_admin_lapangan where kode='$kd'");//untuk melihat apa yang mw di hapus
$cek=mysql_fetch_array($a);//untuk menampilkan apa yang ada pada $a
if(!$cek)
{
echo"<script>alert('Gagal Hapus');window.location='tambah_admin_lapangan.php'</script>";
}else
{
 $awe=$cek[foto_profil];
if($awe=user_admin.png)
{
       include"../../koneksi.php";          
            $v="delete from user_admin_lapangan where kode='$kd'";
		
            $temu=mysql_query($v);
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
	         echo"<script>alert('Berhasil Hapus Data');window.location='tambah_admin_lapangan.php'</script>";
	         }
}
else
{
$folder1="images/$cek[foto_profil]";//nama folder dan nama foto yag akan di hapus
unlink($folder1);//di gunakan untuk menghapus data yang ada di dlam folder
		
	       include"../../koneksi.php";          
            $v="delete from user_admin_lapangan where kode='$kd'";
		
            $temu=mysql_query($v);
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
	         echo"<script>alert('Berhasil Hapus Data');window.location='tambah_admin_lapangan.php'</script>";
	         }
}

	     
}	
?>

<?}?>