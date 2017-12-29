<?php
include"../../koneksi.php";

if(isset($_POST['upload']))
{
$nama_file = $_FILES['gambar1']['name'];
$nama_file1 = time(). '' .$_FILES['gambar1']['name'];
$ukuran_file1 = $_FILES['gambar1']['size'];
$tipe_file1 = $_FILES['gambar1']['type'];
$tmp_file1 = $_FILES['gambar1']['tmp_name'];
$path1 = "images/".$nama_file1;

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
$gallery1=$_POST['gallery1'];
$gallery1=$_POST['gallery1'];
$gallery1=$_POST['gallery1'];
$konfirmasi=$_POST['konfirmasi'];
$status=$_POST['status'];
$hapus=$_POST['hapus'];
$aktivasi=$_POST['aktivasi'];

if(!empty($nama_file))//jika pertama terisi
  {
  if($tipe_file1 == "image/jpeg" || $tipe_file1 == "image/png"){ 
     if($ukuran_file1 <= 1000000){
         if(move_uploaded_file($tmp_file1, $path1))
		 { 
 		  $sql= mysql_query ("INSERT INTO data_user(kode,korwil,wilayah,kecamatan,nama_perusahaan,alamat,sippa,tanggal_awal,tanggal_akhir,sumber_air,lokasi,jenis_usaha,kelompok,jsa,ksa,lsa,klk,fkpa,hba,hda,volume,npa,keterangan,bulan,no_hp,email,foto_profil,username,password,gallery1,gallery2,gallery3,status,hapus,aktivasi) VALUES (null,'$_POST[korwil]','$_POST[wilayah]','$_POST[kecamatan]','$_POST[nama_perusahaan]','$_POST[alamat]','$_POST[sippa]','$_POST[tanggal_awal3]-$_POST[tanggal_awal2]-$_POST[tanggal_awal1]','$_POST[tanggal_akhir3]-$_POST[tanggal_akhir2]-$_POST[tanggal_akhir1]','$_POST[sumber_air]','$_POST[lokasi]','$_POST[jenis_usaha]','$_POST[kelompok]','$_POST[jsa]','$_POST[ksa]','$_POST[lsa]','$_POST[klk]','$_POST[fkpa]','$_POST[hba]','$_POST[hda]','$_POST[volume]','$_POST[npa]','$_POST[keterangan]','$_POST[bulan]','$_POST[no_hp]','$_POST[email]','".$nama_file1."','$_POST[username]','$_POST[password]','$_POST[gallery1]','$_POST[gallery2]','$_POST[gallery3]','$_POST[status]','$_POST[hapus]','$_POST[aktivasi]')");  
             if($sql){ 
                 echo"<script>alert('Berhasil Simpan Data');window.location='tambah_data_user.php'</script>";
            }else{
				echo"<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');window.location='tambah_data_user.php'</script>";
            }
         }else{
			 echo"<script>alert('Maaf, Gambar gagal untuk diupload.');window.location='tambah_data_user.php'</script>";
         }
     }else{
		 echo"<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 3MB');window.location='tambah_data_user.php'</script>";
     }
 }else{
	 echo"<script>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.');window.location='tambah_data_user.php'</script>";
 }
} 
 if(empty($nama_file))//jika pertama terisi
  {

 		  $sql= mysql_query ("INSERT INTO data_user(kode,korwil,wilayah,kecamatan,nama_perusahaan,alamat,sippa,tanggal_awal,tanggal_akhir,sumber_air,lokasi,jenis_usaha,kelompok,jsa,ksa,lsa,klk,fkpa,hba,hda,volume,npa,keterangan,bulan,no_hp,email,foto_profil,username,password,gallery1,gallery2,gallery3,status,hapus,aktivasi) VALUES (null,'$_POST[korwil]','$_POST[wilayah]','$_POST[kecamatan]','$_POST[nama_perusahaan]','$_POST[alamat]','$_POST[sippa]','$_POST[tanggal_awal3]-$_POST[tanggal_awal2]-$_POST[tanggal_awal1]','$_POST[tanggal_akhir3]-$_POST[tanggal_akhir2]-$_POST[tanggal_akhir1]','$_POST[sumber_air]','$_POST[lokasi]','$_POST[jenis_usaha]','$_POST[kelompok]','$_POST[jsa]','$_POST[ksa]','$_POST[lsa]','$_POST[klk]','$_POST[fkpa]','$_POST[hba]','$_POST[hda]','$_POST[volume]','$_POST[npa]','$_POST[keterangan]','$_POST[bulan]','$_POST[no_hp]','$_POST[email]','','$_POST[username]','$_POST[password]','$_POST[gallery1]','$_POST[gallery2]','$_POST[gallery3]','$_POST[status]','$_POST[hapus]','$_POST[aktivasi]')");  
             if($sql){ 
                 echo"<script>alert('Berhasil Simpan Data');window.location='tambah_data_user.php'</script>";
            }else{
				echo"<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');window.location='tambah_data_user.php'</script>";
            }
  }

}
?>