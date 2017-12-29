<?php
session_start();
if(!isset($_SESSION['username_sartek']) AND !isset($_SESSION['password_sartek'])){
header('Location:login.php');
}else{
?>



<?php
$kode =$_GET["kdunix"];
include"../koneksi.php";   
$query1="select * from rekap_sartek where kode='$kode'";
$temu1=mysql_query($query1); 
$array1=mysql_fetch_array($temu1); 	
	   
$folder1="../admin_input/images/$array1[foto]";//nama folder dan nama foto yag akan di hapus
unlink($folder1); 
            $v="delete from rekap_sartek where kode='$kode'";
		    $temu=mysql_query($v);    
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
	         
echo"<script>alert('data berhasil di hapus');window.location='index.php'</script>";
	         }
	     
	
	
?>


<?}?>