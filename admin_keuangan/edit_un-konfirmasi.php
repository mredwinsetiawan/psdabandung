<?php
$kode =$_GET["kdunix"];
		
	       include"../koneksi.php";          
            $v="update rekap_keuangan set konfirmasi='terbaru' where kode='$kode'";
		
            $temu=mysql_query($v);
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
	         
	          header("location:terkonfirmasi.php");
	         }
	     
	
?>