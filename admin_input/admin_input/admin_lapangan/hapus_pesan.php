<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['username_lapangan_ciliwung_cisadane']) AND !isset($_SESSION['password_lapangan_ciliwung_cisadane'])  AND !isset($_SESSION['wilayah_lapangan_ciliwung_cisadane'])){
header('Location:login.php');
}else{
?>

<?php
$kode =$_GET["kdunix"];
		
	       include"../../../koneksi.php";          
            $v="delete from pesan_notifikasi where kode='$kode'";
		
            $temu=mysql_query($v);
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
	         echo"<script>alert('Pesan Masuk');window.location='pesan.php'</script>";
	         }
	     
	
?>

<?}?>