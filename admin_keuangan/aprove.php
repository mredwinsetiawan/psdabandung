<?php
session_start();
if(!isset($_SESSION['username_keuangan']) AND !isset($_SESSION['password_keuangan'])){
header('Location:login.php');
}else{
?>

<?php
$kode =$_GET["kdunix"];
	
	       include"../koneksi.php";          
            $v="update rekap_keuangan set konfirmasi='ter-uproav' where kode='$kode'";
		    $temu=mysql_query($v);  
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
            echo"<script>alert('Data Teraprove');window.location='terkonfirmasi.php'</script>";
	         }
	     
	
?>

<?}?>