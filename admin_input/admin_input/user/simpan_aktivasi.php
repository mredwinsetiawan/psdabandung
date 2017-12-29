<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['username_user_ciliwung_cisadane']) AND !isset($_SESSION['password_user_ciliwung_cisadane'])){
header('Location:login.php');
}else{
?>

<?php
$kode=$_SESSION['id_user_ciliwung_cisadane'];
if (isset($_POST['tombol'])) 
{
$email=$_POST['email'];
$no_hp=$_POST['no_hp'];
$pwd=$_POST['password'];
$akt=$_POST['aktivasi'];
 $nama_gambar=$_FILES['foto_profil'] ['name'];
 $lokasi=$_FILES['foto_profil'] ['tmp_name']; 
 $lokasitujuan="../images/";
 $upload=move_uploaded_file($lokasi,$lokasitujuan."/".$nama_gambar);
 
 $edit=("update data_user set email='$email',no_hp='$no_hp',password='$pwd',aktivasi='$akt',foto_profil='$nama_gambar' where kode='$kode'");
 $que=mysql_query($edit);
echo"<script>alert('berhasil akivasi');window.location='sippa_berhasil.php'</script>";
}
 else
{
}
?>
<?}?>