<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['username_user_ciliwung_cisadane']) AND !isset($_SESSION['password_user_ciliwung_cisadane'])){
header('Location:login.php');
}else{
$kode=$_SESSION['id_user_ciliwung_cisadane'];
?>
<head><title>PSDA</title>
<link rel="icon" href="css/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<style>
body {background: #fffff;}
.user-details {position: relative; padding: 0;}
.user-details .user-image {position: relative;  z-index: 1; width: 100%; text-align: center;}
 .user-image img { clear: both; margin: auto; position: relative;}

.user-details .user-info-block {width: 100%; position: absolute; top: 55px; background: rgb(255, 255, 255); z-index: 0; padding-top: 35px;}
 .user-info-block .user-heading {width: 100%; text-align: center; margin: 10px 0 0;}
 .user-info-block .navigation {float: left; width: 100%; margin: 0; padding: 0; list-style: none; border-bottom: 1px solid #428BCA; border-top: 1px solid #428BCA;}
  .navigation li {float: left; margin: 0; padding: 0;}
   .navigation li a {padding: 20px 30px; float: left;}
   .navigation li.active a {background: #428BCA; color: #fff;}
 .user-info-block .user-body {float: left; padding: 5%; width: 90%;}
  .user-body .tab-content > div {float: left; width: 100%;}
  .user-body .tab-content h4 {width: 100%; margin: 10px 0; color: #333;}

<!--  * parallax_login.html --> .notif-extended {
    border: medium none !important;
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.176) !important;
    max-width: 300px !important;
    min-width: 160px !important;
    padding: 0;
    top: 42px;
    width: 235px !important;
}


.notify-arrow-green {
    border-bottom-color: #68dff0 !important;
    border-left-color: rgba(0, 0, 0, 0);
    border-right-color: rgba(0, 0, 0, 0);
    border-top-color: #68dff0 !important;
}
.notify-arrow {
    border-style: solid;
    border-width: 0 9px 9px;
    height: 0;
    left: 7px;
    margin-top: 10px;
    opacity: 1;
    position: absolute;
    top: -18px;
    transition: all 0.25s ease 0s;
    width: 0;
    z-index: 10;
}

.notify-count-green {
    background-color: #68dff0;
    color: #ffffff;
    padding: 5px;
}
.notif-subject {
    display: block;
}
.notif-subject-from {
    font-size: 12px;
    font-weight: 600;
}
.notif-subject-time {
    font-size: 11px;
    font-style: italic;
    font-weight: bold;
    position: absolute;
    right: 5px;
}
.notif-subject-message {
    display: block !important;
    font-size: 11px;
    text-align: left;
}

.notif-message {
    padding-left: 10px;
    padding-bottom: 10px;
    padding-top: 5px;
    border-bottom: 1px solid #f1f1f1;
}
.padding-right-10 {
    padding-right: 10px;
}
.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}

</style>

</head>
<?
include"../../../koneksi.php";
include"pesan-notifikasi.php";
?>




<?
$query2  = mysql_query("SELECT * FROM data_user WHERE kode='$kode'");
$dataprofil   = mysql_fetch_array($query2);
$password =substr($dataprofil[password],0,-3);
?>
<div class="container">
	<div class="row">
		        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
                <img src="../images/<?echo"$dataprofil[foto_profil]";?>" alt="Foto Profil" title="Foto Profil" class="img-circle" align="center" width="180" height="180">
            </div>
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h4><?echo"$dataprofil[nama_perusahaan]";?></h4>
                    <span class="help-block"><?echo"$dataprofil[alamat]";?></span>
                </div>
                <ul class="navigation">
                    <li>
                        <a dataprofil-toggle="tab" href="index.php">
                            <h4><span class="glyphicon glyphicon-user"></span></h4>
                        </a>
                    </li>

                    <li>
                        <a dataprofil-toggle="tab" href="konfirmasi_pembayaran.php">
                            <h4><span class="glyphicon glyphicon-usd"></span></h4>
                        </a>
                    </li>
                    <li class="active">
                        <a dataprofil-toggle="tab" href="pesan.php">
                            <h4><span class="glyphicon glyphicon-envelope"></span></h4>
                        </a>
                    </li>
                    <li>
                        <a dataprofil-toggle="tab" href="galery.php">
                            <h4><span class="glyphicon glyphicon-camera"></span></h4>
                        </a>
                    </li>
                </ul>
                <div class="user-body">
                </div>
            </div>
        </div>
	</div>
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
<?
$kmp  = mysql_query("SELECT * FROM data_user WHERE kode='$kode'");
$kmp_data   = mysql_fetch_array($kmp);
?>                   
                    <form method="post" action="" enctype="multipart/form-data">
                     <tr>
					 <td>
					 <b><h5>Nama Perusahaan :</h5></b>
                     <b><?echo"$kmp_data[nama_perusahaan]";?></b>
					 </td>
                     </tr>
                     <tr>
					 <td><b><h5>Kepada :</h5></b>
                     <select name="kpd">
					 <option value="admin-input-<?echo"$kmp_data[korwil]";?>">Admin Input</option>
					 <option value="admin-keuangan">Admin Keuangan</option>
					 <option value="admin-sartek">Admin Sartek</option>
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
                     <input type="text" name="pengirim" autocomplete="off" placeholder="nama pengirim" value="<?echo"$kmp_data[nama_perusahaan]";?>" readonly></td>
                     </tr>
                     <tr>
					 <td><b><h5><i>Sertakan foto jika diperlukan:</i></h5></b>
                     <input type="file" name="gambar1" accept="image/*"></td>
                     </tr>
					 <input type="hidden" name="id" value="<?echo"$kmp_data[kode]";?>">
					 <input type="hidden" name="np" value="<?echo"$kmp_data[nama_perusahaan]";?>">
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