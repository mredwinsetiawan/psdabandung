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
                    <li class="active">
                        <a dataprofil-toggle="tab" href="pesan.php">
                            <h4><span class="glyphicon glyphicon-envelope"></span></h4>
                        </a>
                    </li>
                    <li>
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
	  <center><h4><b>Kirim Pesan</b></h4></center>
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
<p class=" text-info"><?include"tanggalan.php";?></p>
      </div>
 
 
 
<div class="container">
      <div class="row">
	  <center><h4><b>Kirim Pesan</b></h4></center>
	  
      <div class="col-md-5  toppad  pull-left col-md-offset-3 ">
          <a href="kirim_pesan.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Kirim Pesan</a>                     
      </div>    
	  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Kirim Pesan</h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
<?php
if(isset($_POST['tb']))
{
include"../../../koneksi.php";
 
$random1 = rand(100,100000000);

$nama_file1 = $_FILES['gambar1']['name'];
$nama_file_atah = $random1. '' .$_FILES['gambar1']['name'];
$ukuran_file = $_FILES['gambar1']['size'];
$tipe_file = $_FILES['gambar1']['type'];
$tmp_file = $_FILES['gambar1']['tmp_name'];
$path = "../../../images/".$nama_file_atah;

$pesan=$_POST['pesan'];
$np=$_POST['np'];
$kpd=$_POST['kpd'];
$jdl=$_POST['judul'];
$pg=$_POST['pengirim'];
$st=$_POST['status'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);

if(!empty($nama_file1 ))
{
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
    if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
        // Proses upload
        if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan : 
            // Proses simpan ke Database
            $query = "INSERT INTO pesan_notifikasi(kode,id,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'".$kode."','".$np."','".$kpd."','".$jdl."','".$pesan."','".$nama_file_atah."','".$tgl."','".$pg."','".$st."')";
            $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
             
            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                echo"<script>alert('Berhasil Mengirim Pesan');window.location='pesan.php'</script>";
            }else{
                // Jika Gagal, Lakukan :
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
        }else{
            // Jika gambar gagal diupload, Lakukan :
            echo "<center><b>Maaf, Gambar gagal untuk diupload.</b></center>";
        }
    }else{
        // Jika ukuran file lebih dari 1MB, lakukan :
        echo "<center><b>Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB</b></center>";
    }
}else{
    // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    echo "<center><b>Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.</b></center>";
}
}
elseif(empty($nama_file1))
{
            $query = "INSERT INTO pesan_notifikasi(kode,id,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'".$kode."','".$np."','".$kpd."','".$jdl."','".$pesan."','','".$tgl."','".$pg."','".$st."')";
            $sql = mysql_query($query);; // Eksekusi/ Jalankan query dari variabel $query
             
            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                echo"<script>alert('Berhasil Mengirim Pesan');window.location='pesan.php'</script>";
            }else{
                // Jika Gagal, Lakukan :
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";



}
}
}
?>

                    <form method="post" action="" enctype="multipart/form-data">
                     
                     <tr>
					 <td><b><h5>Kepada :</h5></b>
                     <select name="kpd">
					 <option value="admin-input-<?echo"$wil";?>">Admin Input</option>
					 </select>
					 </td>
                     </tr>
                     <tr>
					 <td><b><h5>Subject :</h5></b>
                     <input type="text" name="judul" autocomplete="off" placeholder="subject"></td>
                     </tr>
                     <tr>
					 <td><b><h5>Pesan :</h5></b>
                     <textarea name="pesan"></textarea></td>
                     </tr>
                     <tr>
					 <td><b><h5>Pengirim :</h5></b>
                     <input type="text" name="pengirim" autocomplete="off" placeholder="nama pengirim" value="admin-lapangan-<?echo"$wil";?>" readonly></td>
                     </tr>
                     <tr>
					 <td><b><h5><i>Sertakan foto jika diperlukan:</i></h5></b>
                     <input type="file" name="gambar1" accept="image/*"></td>
                     </tr>
					 <input type="hidden" name="id" value="<?echo"$id";?>">
					 <input type="hidden" name="np" value="admin-lapangan-<?echo"$wil";?>">
					 <input type="hidden" name="status" value="belum-terbaca">
                     <tr>
					 <td><button class="btn btn-primary" name="tb">Kirim</button></td>
                     </tr>
					</form>
					 
					 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a  data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
        </section><!-- Close comments section-->



<?}?>