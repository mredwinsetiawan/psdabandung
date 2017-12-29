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
$del=mysql_query("delete from data_user where kode='$kd'");
		    
	        if(!$del)
			{
			echo"gagal";
				
				
			}else
	         {
			 echo"<script>alert('Data Terhapus');window.location='data_user.php'</script>";
	         }
	     
	
?>

<?}?>