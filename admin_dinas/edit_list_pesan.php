<?php
		
include"../koneksi.php";          
$del=mysql_query("update pesan_notifikasi set status='terbaca' where kepada='admin-dinas'");
		    
	        if(!$del)
			{
			echo"gagal";
				
				
			}else
	         {
			 echo"<script>alert('Pesan Masuk');window.location='list_pesan.php'</script>";
	         
	         }
	     
	
?>
