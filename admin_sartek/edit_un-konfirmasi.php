<?php
session_start();
if(!isset($_SESSION['username_sartek']) AND !isset($_SESSION['password_sartek'])){
header('Location:login.php');
}else{
?>

<?php
$kode =$_GET["kdunix"];
		
	       include"../koneksi.php";          
            $v="update rekap_sartek set konfirmasi='terbaru' where kode='$kode'";
		
            $temu=mysql_query($v);
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
	         
			  echo"<script>alert('data berhasil di un-konfirmasi');window.location='terkonfirmasi.php'</script>";
	         }
	     
	
?>

<?}?>
