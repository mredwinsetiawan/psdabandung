<?php
session_start();
if(!isset($_SESSION['username_sartek']) AND !isset($_SESSION['password_sartek'])){
header('Location:login.php');
}else{
?>

<?php
$kode =$_GET["kdunix"];
	
	       include"../koneksi.php";          
            $v="update rekap_sartek set konfirmasi='ter-uproav' where kode='$kode'";
		    $temu=mysql_query($v);  
	        if(!$temu)
			{
				 echo"<script>alert('data gagal ter-aprove');window.location='terkonfirmasi.php'</script>";
			}else
	         {
	         
			  echo"<script>alert('data berhasil ter-aprove');window.location='terkonfirmasi.php'</script>";
	         }
	     
	
?>

<?}?>