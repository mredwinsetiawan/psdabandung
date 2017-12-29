<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['username_user_ciliwung_cisadane']) AND !isset($_SESSION['password_user_ciliwung_cisadane'])){
header('Location:login.php');
}else{
?>

<?php
session_start();
$kode =$_GET["kdunix"];
		
	       include"../../../koneksi.php";          
            $v="delete from pesan_notifikasi where kode='$kode'";
		
            $temu=mysql_query($v);
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
	         echo"<script>alert('Berhasil Menghapus Pesan');window.location='pesan.php'</script>";
	         }
	     
	
?>
<?}?>