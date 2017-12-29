<?php
session_start();
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php');
}else{
$wilayah_admin=$_SESSION['wilayah_admin_1'];
?>

<?php
$kd =$_GET["kdunix"];
		
include"../../koneksi.php";          
$tampil = "select *  from rekap_admin_input where kode='$kd'";
$sql = mysql_query($tampil);
$data = mysql_fetch_array($sql);
if(!$data)
{
echo"<script>alert('Gagal Hapus');window.location='sudah_ter-edit.php'</script>";
}else
{
 
$folder1="images/$data[gallery1]";
$folder2="images/$data[gallery2]";
$folder3="images/$data[gallery3]";
unlink($folder1);
unlink($folder2);
unlink($folder3);

$update=mysql_query("update data_user set bulan='0000-00-00' where kode='$data[id]'");
$del=mysql_query("delete from rekap_admin_input where kode='$kd'");
$del2=mysql_query("delete from rekap_admin_lapangan where id='$data[id]' and tgl_kirim='$data[bulan]'");
		    
	        if(!$del)
			{
echo"<script>alert('Gagal Hapus');window.location='sudah_ter-edit.php'</script>";
				
				
			}else
	         {
			 
echo"<script>alert('Berhasil Hapus');window.location='sudah_ter-edit.php'</script>";
	         
	         }
}
	     
	
?>

<?}?>