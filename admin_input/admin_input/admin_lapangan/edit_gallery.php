<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['username_lapangan_ciliwung_cisadane']) AND !isset($_SESSION['password_lapangan_ciliwung_cisadane'])  AND !isset($_SESSION['wilayah_lapangan_ciliwung_cisadane'])){
header('Location:login.php');
}else{
$id=$_SESSION['id_lapangan_ciliwung_cisadane'];
$wil=$_SESSION['wilayah_lapangan_ciliwung_cisadane'];
?>

<?
include"pesan-notifikasi.php";
include"header.php";
?>

<div class="container">
	<div class="row">
	        <div class="col-xs-30 col-sm-30 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

            <div class="user-info-block">
                <div class="user-heading">
                    <h4><?echo"$dataprofil[nama_perusahaan]";?></h4>
                    <span class="help-block"><?echo"$dataprofil[alamat]";?></span>
                </div>
                <ul class="navigation">
                    <li>
                        <a dataprofil-toggle="tab" href="index.php">
                            <h4><span class="glyphicon glyphicon-search"></span></h4>
                        </a>
                    </li>
                    <li>
                        <a dataprofil-toggle="tab" href="pesan.php">
                            <h4><span class="glyphicon glyphicon-envelope"></span></h4>
                        </a>
                    </li>
                    <li class="active">
                        <a dataprofil-toggle="tab" href="gallery_admin_lapangan.php">
                            <h4><span class="glyphicon glyphicon-camera"></span></h4>
                        </a>
                    </li>
                    <li>
                        <a dataprofil-toggle="tab" href="logout.php">
                            <h4><span class="glyphicon glyphicon-off"></span></h4>
                        </a>
                    </li>
                </ul>
                <div class="user-body">
                </div>
            </div>
        </div>
	</div>
<div class="container">
      <div class="row">
	  <center><h4><b>Upload Foto</b></h4></center>
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
<p class=" text-info"><?include"tanggalan.php";?></p>
      </div>
 






	  
<?php
include"../../../koneksi.php";

$kd 	= $_GET['kdunix'];

$hasil  = mysql_query("SELECT * FROM rekap_admin_lapangan WHERE kode='$kd' and status='terbaru'");
$data   = mysql_fetch_array($hasil);
if (!$data)	
{
echo"<script>alert('data sudah terekap admin input,silahkan hubungi admin input jika terjadi kesalahan saat mengupload gambar');window.location='gallery_admin_lapangan.php'</script>";
}else{

?>
 <div class="col-md-5  toppad  pull-left col-md-offset-3 ">
          <a href="kirim_pesan.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Kirim Pesan</a>                     
      </div>    
	  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"align="center">Edit Data</h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>                
                    <form method="post" action="" enctype="multipart/form-data">
                     <tr>
					 <td>
					 <center><b><h5>ID Perusahaan</b></center>
					 <input type="text" class="form-control" placeholder="ID Perusahaan" value="<?echo"$data[kode]";?>" readonly></h5></td>
                     </tr>
                     <tr>
					 <td>
					 <center><b><h5>Nama Perusahaan</b></center>
					 <input type="text" class="form-control" placeholder="Nama Perusahaan" value="<?echo"$data[nama_perusahaan]";?>" readonly></h5></td>
                     </tr>
                     <tr>
					 <td>
					 <center><b><h5>Alamat</b></center>
					 <input type="text" class="form-control" placeholder="Alamat" value="<?echo"$data[alamat]";?>" readonly></h5></td>
                     </tr>
                     <tr>
					 <td>
					 <center><h4><b>Pastikan Mengisi Foto dari Foto 1 (Pertama)</b></h4></center>
					 <center><b><h5>Foto 1</b></center>
					 <input type="file" name="gambar1" value="<?echo"$data[foto1]";?>"></h5>
					 <img src="../images/<?echo"$data[foto1]";?>"  width="120" height="120">
					 </td>
                     </tr>
                     <tr>
					 <td>
					 <center><b><h5>Foto 2</b></center>
					 <input type="file" name="gambar2" value="<?echo"$data[foto2]";?>"></h5>
					 <img src="../images/<?echo"$data[foto2]";?>"  width="120" height="120">
					 </td>
                     </tr>
                     <tr>
					 <td>
					 <center><b><h5>Foto 3</b></center>
					 <input type="file" name="gambar3" value="<?echo"$data[foto3]";?>"></h5>
					 <img src="../images/<?echo"$data[foto3]";?>"  width="120" height="120">
					 </td>
                     </tr>
					 <input type="hidden" name="id" value="<?echo"$data[kode]";?>">
					 <input type="hidden" name="np" value="<?echo"$data[nama_perusahaan]";?>">
					 <input type="hidden" name="alm" value="<?echo"$data[alamat]";?>">
					 <input type="hidden" name="email" value="<?echo"$data[email]";?>">
					 <input type="hidden" name="no_hp" value="<?echo"$data[no_hp]";?>">
					 <input type="hidden" name="fp" value="<?echo"$data[foto_profil]";?>">
					 <input type="hidden" name="nm" value="<?echo"$dataprofil[nama]";?>">
                     <tr>
					 <td>
					 <div class="btn btn-primary">
					   <span class="glyphicon glyphicon-send"></span>
					   <input type="submit" name="button" class="btn btn-primary" value="kirim">
					 </div>
					 </td>
                     </tr>
					</form>
					 
					 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a href="index.php" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i> Kembali</a>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
        </section><!-- Close comments section-->

		
<?
if(isset($_POST['button']))
{

$nama_file1 = $_FILES['gambar1']['name'];
$nama_file11 = time(). '' .$_FILES['gambar1']['name'];
$ukuran_file1 = $_FILES['gambar1']['size'];
$tipe_file1 = $_FILES['gambar1']['type'];
$tmp_file1 = $_FILES['gambar1']['tmp_name'];
$path1 = "../images/".$nama_file11;

$nama_file2 =$_FILES['gambar2']['name'];
$nama_file22 = time(). '' .$_FILES['gambar2']['name'];
$ukuran_file2 = $_FILES['gambar2']['size'];
$tipe_file2 = $_FILES['gambar2']['type'];
$tmp_file2 = $_FILES['gambar2']['tmp_name'];
$path2 = "../images/".$nama_file22;

$nama_file3 = $_FILES['gambar3']['name'];
$nama_file33= time(). '' .$_FILES['gambar3']['name'];
$ukuran_file3 = $_FILES['gambar3']['size'];
$tipe_file3 = $_FILES['gambar3']['type'];
$tmp_file3 = $_FILES['gambar3']['tmp_name'];
$path3 = "../images/".$nama_file33;

$id=$_POST['id'];
$np=$_POST['np'];
$alm=$_POST['alm'];
$email=$_POST['email'];
$fp=$_POST['fp'];
$nm=$_POST['nm'];
$no_hp=$_POST['no_hp'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);
 
 //pertama
if(!empty($nama_file1) and empty($nama_file2) and empty($nama_file3))//jika pertama terisi
  {
  if($tipe_file1 == "image/jpeg" || $tipe_file1 == "image/png"){ 
     if($ukuran_file1 <= 1000000){
         if(move_uploaded_file($tmp_file1, $path1))
		 { 
		 
		$query = "update rekap_admin_lapangan set foto1='".$nama_file11."' where kode='$id' and tgl_kirim='$data[tgl_kirim]'";
            $sql = mysql_query($query); 
            if($sql){ 
                echo"<script>alert('data berhasil di edit');window.location='index.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
         }else{
             echo "<center><b>Maaf, Gambar gagal untuk diupload.</b></center>";
         }
     }else{
         echo "<center><b>Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB</b></center>";
     }
 }else{
     echo "<center><b>Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.</b></center>";
 }
}

//kedua
elseif(!empty($nama_file1) and !empty($nama_file2) and empty($nama_file3))//jika pertama dan kedua terisi
{
  if($tipe_file1 && $tipe_file2 == "image/jpeg" || $tipe_file1 && $tipe_file2 == "image/png"){ 
     if($ukuran_file1 && $ukuran_file2 <= 1000000){
         if(move_uploaded_file($tmp_file1, $path1) && move_uploaded_file($tmp_file2, $path2))
		 { 
		$query =  "update rekap_admin_lapangan set foto1='".$nama_file11."',foto2='".$nama_file22."' where kode='$id' and tgl_kirim='$data[tgl_kirim]'";
            $sql = mysql_query($query); 
            if($sql){ 
                echo"<script>alert('data berhasil di edit');window.location='index.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
         }else{
             echo "<center><b>Maaf, Gambar gagal untuk diupload.</b></center>";
         }
     }else{
         echo "<center><b>Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB</b></center>";
     }
 }else{
     echo "<center><b>Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.</b></center>";
 }
} 

//ketiga
elseif(!empty($nama_file1) and !empty($nama_file2) and !empty($nama_file3))//jika pertama dan kedua dan ketiga terisi
{
  if($tipe_file1 && $tipe_file2 && $tipe_file3 == "image/jpeg" || $tipe_file1 && $tipe_file2 && $tipe_file3 == "image/png"){ 
     if($ukuran_file1 && $ukuran_file2 && $ukuran_file3 <= 1000000){
         if(move_uploaded_file($tmp_file1, $path1) && move_uploaded_file($tmp_file2, $path2) && move_uploaded_file($tmp_file3, $path3))
		 { 
		$query =  "update rekap_admin_lapangan set foto1='".$nama_file11."', foto2='".$nama_file22."', foto3='".$nama_file33."' where kode='$id' and tgl_kirim='$data[tgl_kirim]'";
            $sql = mysql_query($query); 
            if($sql){ 
          echo"<script>alert('data berhasil di edit');window.location='index.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
         }else{
             echo "<center><b>Maaf, Gambar gagal untuk diupload.</b></center>";
         }
     }else{
         echo "<center><b>Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB</b></center>";
     }
 }else{
     echo "<center><b>Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.</b></center>";
 }
} 
//kosong Semua
elseif(empty($nama_file1) and empty($nama_file2) and empty($nama_file3))//jika pertama dan kedua dan ketiga terisi
{
     echo "<script>alert('Maaf, data tidak boleh kosong ');window.location='index.php'</script>";
}
//kosong kedua
elseif(empty($nama_file1) and !empty($nama_file2) and empty($nama_file3))//jika pertama dan kedua dan ketiga terisi
{
    echo "<script>alert('Maaf, Harus Dimulai Dari yang Pertama ');window.location='index.php'</script>";
}
//kosong ketiga
elseif(empty($nama_file1) and empty($nama_file2) and !empty($nama_file3))//jika pertama dan kedua dan ketiga terisi
{
   echo "<script>alert('Maaf, Harus Dimulai Dari yang Pertama ');window.location='index.php'</script>";
}
//kosong dua dan tiga
elseif(empty($nama_file1) and !empty($nama_file2) and !empty($nama_file3))//jika pertama dan kedua dan ketiga terisi
{
     echo "<script>alert('Maaf, Harus Dimulai Dari yang Pertama ');window.location='index.php'</script>";
}


}

?>


		
<?}}?>