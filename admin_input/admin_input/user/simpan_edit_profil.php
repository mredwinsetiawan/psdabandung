<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['username_user_ciliwung_cisadane']) AND !isset($_SESSION['password_user_ciliwung_cisadane'])){
header('Location:login.php');
}else{
?>
<?php
$kode=$_SESSION['id_user_ciliwung_cisadane'];
 
// Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);
$email=$_POST['email'];
$pw=$_POST['pw'];
$nh=$_POST['no_hp'];
$path = "../images/".$nama_file;
 
           $query = "update data_user set email='".$email."',password='".$pw."',no_hp='".$nh."' where kode='$kode'";
            $sql = mysql_query($query);
	if(!$sql)
	{
	echo"gagal";
	}else{
	echo"<script>alert('data berhasil di edit');window.location='edit_profil.php'</script>";
	}


?>

<?}?>