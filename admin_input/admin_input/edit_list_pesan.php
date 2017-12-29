<?php
session_start();

include"../../koneksi.php";          
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php');
}else{
	
$wilayah_admin=$_SESSION['wilayah_admin_1'];

$del=mysql_query("update pesan_notifikasi set status='sudah-terbaca' where kepada='admin-input-".$wilayah_admin."'");
		    		 header('Location:list_pesan.php');
	         

	     
	
?>

<?}?>