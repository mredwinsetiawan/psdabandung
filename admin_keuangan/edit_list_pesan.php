<?php
session_start();
if(!isset($_SESSION['username_keuangan']) AND !isset($_SESSION['password_keuangan'])){
header('Location:login.php');
}else{
?>



<?php

include"../koneksi.php";          
$del=mysql_query("update pesan_notifikasi set status='terbaca' where kepada='admin-keuangan'");
		    
	        if(!$del)
			{
			echo"gagal";
				
				
			}else
	         {
			 echo"<script>alert('Pesan Masuk');window.location='list_pesan.php'</script>";
	         
	         }
	     
	
?>

<?}?>