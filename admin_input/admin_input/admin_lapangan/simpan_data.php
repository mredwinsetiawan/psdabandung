<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['username_lapangan_ciliwung_cisadane']) AND !isset($_SESSION['password_lapangan_ciliwung_cisadane'])  AND !isset($_SESSION['wilayah_lapangan_ciliwung_cisadane'])){
header('Location:login.php');
}else{
$id=$_SESSION['id_lapangan_ciliwung_cisadane'];
$wil=$_SESSION['wilayah_lapangan_ciliwung_cisadane'];
?>

<?php
include"../../../koneksi.php";
if(isset($_POST['button']))
{

date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);
$random1 = rand(100,100000000);

$nama_file1 = $_FILES['gambar1']['name'];
$nama_file1_atah = $random1. '' .$_FILES['gambar1']['name'];
$ukuran_file1 = $_FILES['gambar1']['size'];
$tipe_file1 = $_FILES['gambar1']['type'];
$tmp_file1 = $_FILES['gambar1']['tmp_name'];
$path1 = "../images/".$nama_file1_atah;

$random2 = rand(100,100000000);
$nama_file2 = $_FILES['gambar2']['name'];
$nama_file2_atah = $random2. '' .$_FILES['gambar2']['name'];
$ukuran_file2 = $_FILES['gambar2']['size'];
$tipe_file2 = $_FILES['gambar2']['type'];
$tmp_file2 = $_FILES['gambar2']['tmp_name'];
$path2 = "../images/".$nama_file2_atah;

$random3 = rand(100,100000000);
$nama_file3 = $_FILES['gambar3']['name'];
$nama_file3_atah = $random3. '' .$_FILES['gambar3']['name'];
$ukuran_file3 = $_FILES['gambar3']['size'];
$tipe_file3 = $_FILES['gambar3']['type'];
$tmp_file3 = $_FILES['gambar3']['tmp_name'];
$path3 = "../images/".$nama_file3_atah;

$id=$_POST['id'];
$np=$_POST['np'];
$alm=$_POST['alm'];
$email=$_POST['email'];
$fp=$_POST['fp'];
$nm=$_POST['nm'];
$vol=$_POST['volume'];
$no_hp=$_POST['no_hp'];


 //pertama
if(!empty($nama_file1) and empty($nama_file2) and empty($nama_file3))//jika pertama terisi
  {
  if($tipe_file1 == "image/jpeg" || $tipe_file1 == "image/png"){ 
     if($ukuran_file1 <= 3000000){
         if(move_uploaded_file($tmp_file1, $path1))
		 { 
		  
		$query = "INSERT INTO rekap_admin_lapangan(kode,id,wilayah,nama_perusahaan,alamat,email,no_hp,foto_profil,foto1,foto2,foto3,volume,tgl_kirim,status,admin_lapangan) values (null,'$id','".$wil."','$np','$alm','$email','$no_hp','$fp','".$nama_file1_atah."','','','$vol','$tgl','terbaru','$nm')";
            $sql = mysql_query($query); 
            if($sql){ 
               echo"<script>alert('Berhasil Simpan Data');window.location='index.php'</script>";
            }else{
				echo"<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');window.location='index.php'</script>";
            }
         }else{
			 echo"<script>alert('Maaf, Gambar gagal untuk diupload.');window.location='index.php'</script>";
         }
     }else{
		 echo"<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 3MB');window.location='index.php'</script>";
     }
 }else{
	 echo"<script>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.');window.location='index.php'</script>";
 }
}

//kedua
elseif(!empty($nama_file1) and !empty($nama_file2) and empty($nama_file3))//jika pertama dan kedua terisi
{
  if($tipe_file1 && $tipe_file2 == "image/jpeg" || $tipe_file1 && $tipe_file2 == "image/png"){ 
     if($ukuran_file1 && $ukuran_file2 <= 3000000){
         if(move_uploaded_file($tmp_file1, $path1) && move_uploaded_file($tmp_file2, $path2))
		 { 
		$query = "INSERT INTO rekap_admin_lapangan(kode,id,wilayah,nama_perusahaan,alamat,email,no_hp,foto_profil,foto1,foto2,foto3,volume,tgl_kirim,status,admin_lapangan) values (null,'$id','".$wil."','$np','$alm','$email','$no_hp','$fp','".$nama_file1_atah."','".$nama_file2_atah."','','$vol','$tgl','terbaru','$nm')";
            $sql = mysql_query($query);  
            if($sql){ 
               echo"<script>alert('Berhasil Simpan Data');window.location='index.php'</script>";
            }else{
				echo"<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');window.location='index.php'</script>";
            }
         }else{
			 echo"<script>alert('Maaf, Gambar gagal untuk diupload.');window.location='index.php'</script>";
         }
     }else{
		 echo"<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 3MB');window.location='index.php'</script>";
     }
 }else{
	 echo"<script>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.');window.location='index.php'</script>";
 }
}
//ketiga
elseif(!empty($nama_file1) and !empty($nama_file2) and !empty($nama_file3))//jika pertama dan kedua dan ketiga terisi
{
  if($tipe_file1 && $tipe_file2 && $tipe_file3 == "image/jpeg" || $tipe_file1 && $tipe_file2 && $tipe_file3 == "image/png"){ 
     if($ukuran_file1 && $ukuran_file2 && $ukuran_file3 <= 3000000){
         if(move_uploaded_file($tmp_file1, $path1) && move_uploaded_file($tmp_file2, $path2) && move_uploaded_file($tmp_file3, $path3))
		 { 
		$query = "INSERT INTO rekap_admin_lapangan(kode,id,wilayah,nama_perusahaan,alamat,email,no_hp,foto_profil,foto1,foto2,foto3,volume,tgl_kirim,status,admin_lapangan) values (null,'$id','".$wil."','$np','$alm','$email','$no_hp','$fp','".$nama_file1_atah."','".$nama_file2_atah."','".$nama_file3_atah."','$vol','$tgl','terbaru','$nm')";
            $sql = mysql_query($query); 
            if($sql){ 
               echo"<script>alert('Berhasil Simpan Data');window.location='index.php'</script>";
            }else{
				echo"<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');window.location='index.php'</script>";
            }
         }else{
			 echo"<script>alert('Maaf, Gambar gagal untuk diupload.');window.location='index.php'</script>";
         }
     }else{
		 echo"<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 3MB');window.location='index.php'</script>";
     }
 }else{
	 echo"<script>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.');window.location='index.php'</script>";
 }
} 


 


//kosong Semua


elseif(empty($nama_file1) and empty($nama_file2) and empty($nama_file3))//jika pertama dan kedua dan ketiga terisi
{
  		$query = "INSERT INTO rekap_admin_lapangan(kode,id,wilayah,nama_perusahaan,alamat,email,no_hp,foto_profil,foto1,foto2,foto3,volume,tgl_kirim,status,admin_lapangan) values (null,'$id','".$wil."','$np','$alm','$email','$no_hp','$fp','','','','$vol','$tgl','terbaru','$nm')";
            $sql = mysql_query($query); 
            if($sql){ 
               echo"<script>alert('Berhasil Simpan Data');window.location='index.php'</script>";
            }else{
				echo"<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');window.location='index.php'</script>";
            }
}



}
?>

<?}?>