<?php
session_start();
if(!isset($_SESSION['username_dinas']) AND !isset($_SESSION['password_dinas'])){
header('Location:login.php');
}else{
	
?>

<?php
$kd =$_GET["kdunix"];
include"../koneksi.php";          
$a=mysql_query("select * from user_admin where kode='$kd'");//untuk melihat apa yang mw di hapus
$cek=mysql_fetch_array($a);//untuk menampilkan apa yang ada pada $a
if(!$cek)
{
echo"<script>alert('Gagal Hapus');window.location='tambah_admin.php'</script>";
}else
{
 $awe=$cek[foto_profil];
if($awe=user.png)
{
            $v="delete from user_admin where kode='$kd'";
		
            $temu=mysql_query($v);
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
	         echo"<script>alert('Berhasil Hapus Data');window.location='tambah_admin.php'</script>";
	         }
}
else
{
$folder1="../images/$cek[foto_profil]";//nama folder dan nama foto yag akan di hapus
unlink($folder1);//di gunakan untuk menghapus data yang ada di dlam folder
		
            $v="delete from user_admin where kode='$kd'";
		
            $temu=mysql_query($v);
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
	         echo"<script>alert('Berhasil Hapus Data');window.location='tambah_admin.php'</script>";
	         }
}

	     
}	
?>

<?}?>