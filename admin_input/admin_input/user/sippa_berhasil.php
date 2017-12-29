<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['sippa_user'])){
header('Location:login.php');
}else{
$sp=$_SESSION['sippa_user'];
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
$sippa  = mysql_query("SELECT * FROM data_user WHERE sippa='$sp' and aktivasi='belum-aktivasi'");
$data_sippa = mysql_fetch_array($sippa);
if(!$data_sippa)
{
echo"<center><br><br><br><br><br><br><br><br><b>User Sudah Ter-Aktivasi Silahkan <a href='login.php'>Login</a></b></center>";
}else
{
?>

<div class="container">
      <div class="row">    
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><center>Konfirmasi Data</center></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr><td><center><img alt="User Pic" src="../images/user.png" width="150" height="150" class="img-circle" align="center"></center></td></tr>
					  <tr><td><b>NO SIPPA:</b> <?echo"$data_sippa[sippa]";?></td><td></td></tr>
					  <tr><td><b>Nama Perusahaan:</b> <?echo"$data_sippa[nama_perusahaan]";?></td><td></td></tr>
					  <tr><td><b>Alamat:</b> <?echo"$data_sippa[alamat]";?></td><td></td></tr>
					  <tr><td><b>Sumber Air:</b> <?echo"$data_sippa[sumber_air]";?></td><td></td></tr>
					  <tr><td><b>Jenis Usaha:</b> <?echo"$data_sippa[jenis_usaha]";?></td><td></td></tr>
					  <tr><td><b>Lokasi:</b> <?echo"$data_sippa[lokasi]";?></td><td></td></tr>
					  <tr><td><b>Masa Berlaku Dari:</b> <?echo"$data_sippa[tanggal_awal]";?></td><td></td></tr>
					  <tr><td><b>Masa Berlaku Habis:</b> <?echo"$data_sippa[tanggal_akhir]";?></td><td></td></tr>
					  <tr><td><b>Jenis Usaha:</b> <?echo"$data_sippa[jenis_usaha]";?></td><td></td></tr>
<?php
include"../../../koneksi.php";
if(isset($_POST['tb']))
{
 
// Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['name'];
$nama_file2 = time(). '' .$_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);
$email=$_POST['email'];
$pw=$_POST['pw'];
$nh=$_POST['no_hp'];
$ak=$_POST['aktivasi'];
$path = "../images/".$nama_file2;

if(!empty($nama_file))
{
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
    if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
        // Proses upload
        if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan : 
            // Proses simpan ke Database
            $query = "update data_user set foto_profil='".$nama_file2."',email='".$email."',password='".$pw."',no_hp='".$nh."',aktivasi='".$ak."' where sippa='$sp'";
            $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
             
            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
				echo"<script>alert('Berhasil Mengaktifkan Akun');window.location='sippa_berhasil.php'</script>";
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
}else
if(empty($nama_file))
            $query = "update data_user set email='".$email."',password='".$pw."',no_hp='".$nh."',aktivasi='".$ak."' where sippa='$sp'";
            $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
             
            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
				echo"<script>alert('Berhasil Mengaktifkan Akun');window.location='sippa_berhasil.php'</script>";
            }else{
                // Jika Gagal, Lakukan :
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
}


?>
               
                    <form method="post" action="" enctype="multipart/form-data">
                     <tr>
					 <td><b><h5>email:</h5></b>
                     <input type="text" name="email" class="form-control" value="<?echo"$data_sippa[email]";?>" autocomplete="off"></td>
                     </tr>
					 <tr>
					 <td><b><h5>no_hp:</h5></b>
                     <input type="text" name="no_hp" class="form-control" value="<?echo"$data_sippa[no_hp]";?>" autocomplete="off"></td>
                     </tr>
					 </tr>
                     <td><b>Username</b><input type="text" class="form-control" value="<?echo"$data_sippa[username]";?>" readonly></td>
                     <input type="hidden" name="aktivasi" value="sudah-aktivasi">
                     </tr>
					 <tr>
					 <td><b><h5>password:</h5></b>
                     <input type="text" name="pw"  name="password" class="form-control" value="<?echo"$data_sippa[password]";?>" autocomplete="off"></td>
                     </tr>
                     <tr>
                     <tr>
					 <td><b><h5>Foto Profil:</b><br><i>*Silahkan Pilih Dengan Cermat Karena Hanya Satu Kali Upload</i></h5>
                     <input type="file" name="gambar" accept="image/*"></td>
                     </tr>
                     <tr>
					 <td><button class="btn btn-success" name="tb">Aktivasi Akun</button></td>
                     </tr>
					</form>
					 
					 
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a href="login.php" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-log-in"></i> Login</a>
                 
				   </div>
            
          </div>
        </div>
      </div>
    </div>
<?}}?>