<?php
session_start();
if(!isset($_SESSION['username_dinas']) AND !isset($_SESSION['password_dinas'])){
header('Location:login.php');
}else{
?>

<?php
$kd =$_GET["kdunix"];
		
include"../koneksi.php";          

$kmp  = mysql_query("SELECT * FROM pesan_notifikasi WHERE kode='$kd'");
$data = mysql_fetch_array($kmp);
$folder1="../images/$data[foto1]";//nama folder dan nama foto yag akan di hapus
unlink($folder1);		    

$del=mysql_query("delete from pesan_notifikasi where kode='$kd'");
	        if(!$del)
			{
			echo"gagal";
				
				
			}else
	         {
			 echo"<script>alert('Pesan Terhapus');window.location='list_pesan.php'</script>";
	         }
	     
	
?>

<?}?>