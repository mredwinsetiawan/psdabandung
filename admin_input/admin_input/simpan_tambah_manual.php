<?php
include"../../koneksi.php";
$kd=$_POST['ide'];
$t = "select * from data_user where kode='$kd'";
$s = mysql_query($t);
$data= mysql_fetch_array($s);
if(isset($_POST['upload']))
{
$volume=$_POST[volume];
$npa=$data[hda]*$volume;
$nama_file1 = $_FILES['gambar1']['name'];
$ukuran_file1 = $_FILES['gambar1']['size'];
$tipe_file1 = $_FILES['gambar1']['type'];
$tmp_file1 = $_FILES['gambar1']['tmp_name'];
$path1 = "images/".$nama_file1;

// $korwil=$_POST['korwil'];
// $wilayah=$_POST['wilayah'];
// $kecamatan=$_POST['kecamatan'];
// $nama_perusahaan=$_POST['nama_perusahaan'];
// $sippa=$_POST['sippa'];
// $tanggal_awal=$_POST['tanggal_awal'];
// $tanggal_akhir=$_POST['tanggal_akhir'];
// $sumber_air=$_POST['sumber_air'];
// $lokasi=$_POST['lokasi'];
// $jenis_usaha=$_POST['jenis_usaha'];
// $jsa=$_POST['jsa'];
// $ksa=$_POST['ksa'];
// $lsa=$_POST['lsa'];
// $klk=$_POST['klk'];
// $fkpa=$_POST['fkpa'];
// $hba=$_POST['hba'];
// $hda=$_POST['hda'];
// $volume=$_POST['volume'];
// $npa=$_POST['npa'];
// $keterangan=$_POST['keterangan'];
// $bulan=$_POST['bulan'];
// $no_hp=$_POST['no_hp'];
// $email=$_POST['email'];
// $username=$_POST['username'];
// $password=$_POST['password'];
// $konfirmasi=$_POST['konfirmasi'];
// $status=$_POST['status'];
// $hapus=$_POST['hapus'];
// $aktivasi=$_POST['aktivasi'];

$random1 = rand(100,100000000);

$nama_file1 = $_FILES['gambar1']['name'];
$nama_file1_atah = $random1. '' .$_FILES['gambar1']['name'];
$ukuran_file1 = $_FILES['gambar1']['size'];
$tipe_file1 = $_FILES['gambar1']['type'];
$tmp_file1 = $_FILES['gambar1']['tmp_name'];
$path1 = "./images/".$nama_file1_atah;

$random2 = rand(100,100000000);
$nama_file2 = $_FILES['gambar2']['name'];
$nama_file2_atah = $random2. '' .$_FILES['gambar2']['name'];
$ukuran_file2 = $_FILES['gambar2']['size'];
$tipe_file2 = $_FILES['gambar2']['type'];
$tmp_file2 = $_FILES['gambar2']['tmp_name'];
$path2 = "./images/".$nama_file2_atah;

$random3 = rand(100,100000000);
$nama_file3 = $_FILES['gambar3']['name'];
$nama_file3_atah = $random3. '' .$_FILES['gambar3']['name'];
$ukuran_file3 = $_FILES['gambar3']['size'];
$tipe_file3 = $_FILES['gambar3']['type'];
$tmp_file3 = $_FILES['gambar3']['tmp_name'];
$path3 = "./images/".$nama_file3_atah;


 //pertama
if(!empty($nama_file1) and empty($nama_file2) and empty($nama_file3))//jika pertama terisi
  {
  if($tipe_file1 == "image/jpeg" || $tipe_file1 == "image/png"){ 
     if($ukuran_file1 <= 3000000){
         if(move_uploaded_file($tmp_file1, $path1))
		 { 
          $sql1= mysql_query ("INSERT INTO rekap_admin_input(kode,id,korwil,wilayah,kecamatan,nama_perusahaan,alamat,sippa,tanggal_awal,tanggal_akhir,sumber_air,lokasi,jenis_usaha,kelompok,jsa,ksa,lsa,klk,fkpa,hba,hda,volume,npa,keterangan,bulan,no_hp,email,foto_profil,username,password,gallery1,gallery2,gallery3,status,hapus,aktivasi) VALUES (null,'$_POST[code]','$_POST[korwil]','$_POST[wilayah]','$_POST[kecamatan]','$_POST[nama_perusahaan]','$_POST[alamat]','$_POST[sippa]','$_POST[tgl_awal]','$_POST[tgl_akhir]','$_POST[sumber_air]','$_POST[lokasi]','$_POST[jenis_usaha]','$_POST[kelompok]','$_POST[jsa]','$_POST[ksa]','$_POST[lsa]','$_POST[klk]','$_POST[fkpa]','$_POST[hba]','$_POST[hda]','$_POST[volume]','".$npa."','$_POST[keterangan]','$_POST[tanggal_manual3]-$_POST[tanggal_manual2]-$_POST[tanggal_manual1]','$_POST[no_hp]','$_POST[email]','$_POST[fp]','$_POST[username]','$_POST[password]','".$nama_file1_atah."','','','$_POST[status]','$_POST[hapus]','$_POST[aktivasi]')");  
		  
             if($sql1){
			 echo"<script>alert('Data berhasil di edit');window.location='tambah_rekap_manual.php'</script>";

            }else{
			echo"<script>alert('data gagal di edit');window.location='tambah_rekap_manual.php'</script>";

            }
		}else{
			 echo"<script>alert('Maaf, Gambar gagal untuk diupload.');window.location='tambah_rekap_manual.php'</script>";
         }
     }else{
		 echo"<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 3MB');window.location='tambah_rekap_manual.php'</script>";
     }
 }else{
	 echo"<script>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.');window.location='tambah_rekap_manual.php'</script>";
 }
}
//kedua
elseif(!empty($nama_file1) and !empty($nama_file2) and empty($nama_file3))//jika pertama dan kedua terisi
{
  if($tipe_file1 && $tipe_file2 == "image/jpeg" || $tipe_file1 && $tipe_file2 == "image/png"){ 
     if($ukuran_file1 && $ukuran_file2 <= 3000000){
         if(move_uploaded_file($tmp_file1, $path1) && move_uploaded_file($tmp_file2, $path2))
		 { 
          $sql1= mysql_query ("INSERT INTO rekap_admin_input(kode,id,korwil,wilayah,kecamatan,nama_perusahaan,alamat,sippa,tanggal_awal,tanggal_akhir,sumber_air,lokasi,jenis_usaha,kelompok,jsa,ksa,lsa,klk,fkpa,hba,hda,volume,npa,keterangan,bulan,no_hp,email,foto_profil,username,password,gallery1,gallery2,gallery3,status,hapus,aktivasi) VALUES (null,'$_POST[code]','$_POST[korwil]','$_POST[wilayah]','$_POST[kecamatan]','$_POST[nama_perusahaan]','$_POST[alamat]','$_POST[sippa]','$_POST[tgl_awal]','$_POST[tgl_akhir]','$_POST[sumber_air]','$_POST[lokasi]','$_POST[jenis_usaha]','$_POST[kelompok]','$_POST[jsa]','$_POST[ksa]','$_POST[lsa]','$_POST[klk]','$_POST[fkpa]','$_POST[hba]','$_POST[hda]','$_POST[volume]','".$npa."','$_POST[keterangan]','$_POST[tanggal_manual3]-$_POST[tanggal_manual2]-$_POST[tanggal_manual1]','$_POST[no_hp]','$_POST[email]','$_POST[fp]','$_POST[username]','$_POST[password]','".$nama_file1_atah."','".$nama_file2_atah."','','$_POST[status]','$_POST[hapus]','$_POST[aktivasi]')");  
		  
             if($sql1){
			 echo"<script>alert('Data berhasil di edit');window.location='tambah_rekap_manual.php'</script>";

            }else{
			echo"<script>alert('data gagal di edit');window.location='tambah_rekap_manual.php'</script>";

            }
		}else{
			 echo"<script>alert('Maaf, Gambar gagal untuk diupload.');window.location='tambah_rekap_manual.php'</script>";
         }
     }else{
		 echo"<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 3MB');window.location='tambah_rekap_manual.php'</script>";
     }
 }else{
	 echo"<script>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.');window.location='tambah_rekap_manual.php'</script>";
 }
}

//ketiga
elseif(!empty($nama_file1) and !empty($nama_file2) and !empty($nama_file3))//jika pertama dan kedua dan ketiga terisi
{
  if($tipe_file1 && $tipe_file2 && $tipe_file3 == "image/jpeg" || $tipe_file1 && $tipe_file2 && $tipe_file3 == "image/png"){ 
     if($ukuran_file1 && $ukuran_file2 && $ukuran_file3 <= 3000000){
         if(move_uploaded_file($tmp_file1, $path1) && move_uploaded_file($tmp_file2, $path2) && move_uploaded_file($tmp_file3, $path3))
		 {          
		 $sql1= mysql_query ("INSERT INTO rekap_admin_input(kode,id,korwil,wilayah,kecamatan,nama_perusahaan,alamat,sippa,tanggal_awal,tanggal_akhir,sumber_air,lokasi,jenis_usaha,kelompok,jsa,ksa,lsa,klk,fkpa,hba,hda,volume,npa,keterangan,bulan,no_hp,email,foto_profil,username,password,gallery1,gallery2,gallery3,status,hapus,aktivasi) VALUES (null,'$_POST[code]','$_POST[korwil]','$_POST[wilayah]','$_POST[kecamatan]','$_POST[nama_perusahaan]','$_POST[alamat]','$_POST[sippa]','$_POST[tgl_awal]','$_POST[tgl_akhir]','$_POST[sumber_air]','$_POST[lokasi]','$_POST[jenis_usaha]','$_POST[kelompok]','$_POST[jsa]','$_POST[ksa]','$_POST[lsa]','$_POST[klk]','$_POST[fkpa]','$_POST[hba]','$_POST[hda]','$_POST[volume]','".$npa."','$_POST[keterangan]','$_POST[tanggal_manual3]-$_POST[tanggal_manual2]-$_POST[tanggal_manual1]','$_POST[no_hp]','$_POST[email]','$_POST[fp]','$_POST[username]','$_POST[password]','".$nama_file1_atah."','".$nama_file2_atah."','".$nama_file3_atah."','$_POST[status]','$_POST[hapus]','$_POST[aktivasi]')");  
		  
             if($sql1){
			 echo"<script>alert('Data berhasil di edit');window.location='tambah_rekap_manual.php'</script>";

            }else{
			echo"<script>alert('data gagal di edit');window.location='tambah_rekap_manual.php'</script>";

            }
		}else{
			 echo"<script>alert('Maaf, Gambar gagal untuk diupload.');window.location='tambah_rekap_manual.php'</script>";
         }
     }else{
		 echo"<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 3MB');window.location='tambah_rekap_manual.php'</script>";
     }
 }else{
	 echo"<script>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.');window.location='tambah_rekap_manual.php'</script>";
 }
}


//kosong Semua


elseif(empty($nama_file1) and empty($nama_file2) and empty($nama_file3))//jika pertama dan kedua dan ketiga terisi
{
         
		 $sql1= mysql_query ("INSERT INTO rekap_admin_input(kode,id,korwil,wilayah,kecamatan,nama_perusahaan,alamat,sippa,tanggal_awal,tanggal_akhir,sumber_air,lokasi,jenis_usaha,kelompok,jsa,ksa,lsa,klk,fkpa,hba,hda,volume,npa,keterangan,bulan,no_hp,email,foto_profil,username,password,gallery1,gallery2,gallery3,status,hapus,aktivasi) VALUES (null,'$_POST[code]','$_POST[korwil]','$_POST[wilayah]','$_POST[kecamatan]','$_POST[nama_perusahaan]','$_POST[alamat]','$_POST[sippa]','$_POST[tgl_awal]','$_POST[tgl_akhir]','$_POST[sumber_air]','$_POST[lokasi]','$_POST[jenis_usaha]','$_POST[kelompok]','$_POST[jsa]','$_POST[ksa]','$_POST[lsa]','$_POST[klk]','$_POST[fkpa]','$_POST[hba]','$_POST[hda]','$_POST[volume]','".$npa."','$_POST[keterangan]','$_POST[tanggal_manual3]-$_POST[tanggal_manual2]-$_POST[tanggal_manual1]','$_POST[no_hp]','$_POST[email]','$_POST[fp]','$_POST[username]','$_POST[password]','','','','$_POST[status]','$_POST[hapus]','$_POST[aktivasi]')");  
		  
             if($sql1){
			 echo"<script>alert('Data berhasil di edit');window.location='tambah_rekap_manual.php'</script>";

            }else{
			echo"<script>alert('data gagal di edit');window.location='tambah_rekap_manual.php'</script>";

            }
     }

  	
			
			
			
			
			
			
			
			
} 
?>