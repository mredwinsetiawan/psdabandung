
<?php
include"../../koneksi.php";
if(isset($_POST['upload']))
{
// $nama_file1 = $_FILES['gambar1']['name'];
// $ukuran_file1 = $_FILES['gambar1']['size'];
// $tipe_file1 = $_FILES['gambar1']['type'];
// $tmp_file1 = $_FILES['gambar1']['tmp_name'];
// $path1 = "images/".$nama_file1;


$kd =$_POST['ide'];
$korwil=$_POST['korwil'];
$wilayah=$_POST['wilayah'];
$kecamatan=$_POST['kecamatan'];
$nama_perusahaan=$_POST['nama_perusahaan'];
$sippa=$_POST['sippa'];
$tanggal_awal=$_POST['tanggal_awal'];
$tanggal_akhir=$_POST['tanggal_akhir'];
$sumber_air=$_POST['sumber_air'];
$lokasi=$_POST['lokasi'];
$jenis_usaha=$_POST['jenis_usaha'];
$jsa=$_POST['jsa'];
$ksa=$_POST['ksa'];
$lsa=$_POST['lsa'];
$klk=$_POST['klk'];
$fkpa=$_POST['fkpa'];
$hba=$_POST['hba'];
$hda=$_POST['hda'];
$volume=$_POST['volume'];
$npa=$_POST['npa'];
$keterangan=$_POST['keterangan'];
$bulan=$_POST['bulan'];
$no_hp=$_POST['no_hp'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$konfirmasi=$_POST['konfirmasi'];
$status=$_POST['status'];
$hapus=$_POST['hapus'];
$aktivasi=$_POST['aktivasi'];

 		  // $sql= mysql_query ("update data_user set foto_profil='$_POST[foto_profil]',korwil='$_POST[korwil]',wilayah='$_POST[wilayah]',kecamatan='$_POST[kecamatan]',nama_perusahaan='$_POST[nama_perusahaan]',alamat='$_POST[alamat]',sippa='$_POST[sippa]',tanggal_awal='$_POST[tanggal_awal3]-$_POST[tanggal_awal2]-$_POST[tanggal_awal1]',tanggal_akhir='$_POST[tanggal_akhir3]-$_POST[tanggal_akhir2]-$_POST[tanggal_akhir1]',sumber_air='$_POST[sumber_air]',lokasi='$_POST[lokasi]',jenis_usaha='$_POST[jenis_usaha]',kelompok='$_POST[kelompok]',jsa='$_POST[jsa]',ksa='$_POST[ksa]',lsa='$_POST[lsa]',klk='$_POST[klk]',fkpa='$_POST[fkpa]',hba='$_POST[hba]',hda='$_POST[hda]',volume='$_POST[volume]',npa='$_POST[npa]',keterangan='$_POST[keterangan]',bulan='$_POST[bulan]',no_hp='$_POST[no_hp]',email='$_POST[email]',username='$_POST[username]',password='$_POST[password]',status='$_POST[status]',hapus='$_POST[hapus]',aktivasi='$_POST[aktivasi]' where kode='$kd'");  
 		  $sql= mysql_query("update data_user set korwil='$_POST[korwil]',wilayah='$_POST[wilayah]',kecamatan='$_POST[kecamatan]',nama_perusahaan='$_POST[nama_perusahaan]',alamat='$_POST[alamat]',sippa='$_POST[sippa]',tanggal_awal='$_POST[tanggal_awal3]-$_POST[tanggal_awal2]-$_POST[tanggal_awal1]',tanggal_akhir='$_POST[tanggal_akhir3]-$_POST[tanggal_akhir2]-$_POST[tanggal_akhir1]',sumber_air='$_POST[sumber_air]',lokasi='$_POST[lokasi]',jenis_usaha='$_POST[jenis_usaha]',kelompok='$_POST[kelompok]',jsa='$_POST[jsa]',ksa='$_POST[ksa]',lsa='$_POST[lsa]',klk='$_POST[klk]',fkpa='$_POST[fkpa]',hba='$_POST[hba]',hda='$_POST[hda]',volume='$_POST[volume]',npa='$_POST[npa]',keterangan='$_POST[keterangan]',bulan='$_POST[bulan]',no_hp='$_POST[no_hp]',email='$_POST[email]',username='$_POST[username]',password='$_POST[password]',status='$_POST[status]',hapus='$_POST[hapus]',aktivasi='$_POST[aktivasi]' where kode='$_POST[ide]'");  
             if($sql){ 
			 echo"<script>alert('Data Tersimpan');window.location='edit_data_user.php?kdunix=$_POST[ide]'</script>";
            }else{
			 echo"<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database');window.location='edit_data_user.php?kdunix=$kd'</script>";
            }
} 


?>
