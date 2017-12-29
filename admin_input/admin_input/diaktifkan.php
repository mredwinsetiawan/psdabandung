<?php
session_start();
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php');
}else{
	
$wilayah_admin=$_SESSION['wilayah_admin_1'];
?>

<?
include"../../koneksi.php";
$kd =$_GET['kdunix'];
 $sql= mysql_query("update data_user set hapus='aktif' where kode='$kd]'");  
             if($sql){ 
			 echo"<script>alert('User Diaktifkan');window.location='data_user.php'</script>";
            }else{
			 echo"<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database');window.location='data_user.php'</script>";
            }
?>


<?}?>