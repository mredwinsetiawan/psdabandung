<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['username_user_ciliwung_cisadane']) AND !isset($_SESSION['password_user_ciliwung_cisadane'])){
header('Location:login.php');
}else{
$kode=$_SESSION['id_user_ciliwung_cisadane'];
$korwil_user_ciliwung_cisadane=$_SESSION['korwil_user_ciliwung_cisadane'];
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
	<style>
.ratakanan { text-align : right; }
</style>

<script language="JavaScript">
function formatangka(objek) {
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length;
   j = 0;
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + "." + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   objek.value = c;
}
</script>

</head>
<?
include"../../../koneksi.php";
include"pesan-notifikasi.php";
?>





<?
$query2  = mysql_query("SELECT * FROM data_user WHERE kode='$kode'");
$dataprofil   = mysql_fetch_array($query2);
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

                    <li class="active">
                        <a dataprofil-toggle="tab" href="konfirmasi_pembayaran.php">
                            <h4><span class="glyphicon glyphicon-usd"></span></h4>
                        </a>
                    </li>
                    <li>
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
	  <center><h4><b>Konfirmasi<br>Pembayaran NPA</b></h4></center>
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
      </div>    
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Profil Pengguna</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../images/<?echo"$dataprofil[foto_profil]";?>" class="img-circle" width="160" height="160">
                 <br>
				<?echo"$dataprofil[nama_perusahaan]";?>
			     <br>
				<?echo"$dataprofil[alamat]";?>
				</div>
                 <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
<?php
include"../../../koneksi.php"; 

$tglan=$_GET['tgl'];
$tgl2=substr($tglan,8,2);
$bulan2=substr($tglan,5,2);
$tahun2=substr($tglan,0,4);

if(isset($_POST['tb']))
{
$random1 = rand(100,100000000);

$nama_files = $_FILES['gambar']['name'];
$nama_file_atah = $random1. '' .$_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$path = "../../images/".$nama_file_atah;
$wilayah=$_POST['wilayah'];
$np=$_POST['np'];
$pm=$_POST['pm'];
$an=$_POST['an'];
$kd=$_POST['kd'];
$jml=$_POST['jml'];
$tb=$_POST['tbl'];
if(!empty($nama_files ))
{
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
    if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
        // Proses upload
        if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan : 
            // Proses simpan ke Database
           $query = "insert into rekap_keuangan(kode,id,wilayah,nama_perusahaan,bulan,kd_transaksi,pembayaran,atas_nama,foto,jumlah,konfirmasi,tombol) values (null,'".$kode."','".$wilayah."','".$np."','".$tglan."','".$kd."','".$pm."','".$an."','".$nama_file_atah."','".$jml."','terbaru','".$tb."')";
            $sql = mysql_query($query);         
            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
			echo"<script>alert('Konfirmasi Pembayaran Sudah Terkirim,Harap Tunggu Pesan Notifikasi');window.location='npa.php'</script>";
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
elseif(empty($nama_files ))
{
           $query = "insert into rekap_keuangan(kode,id,wilayah,nama_perusahaan,bulan,kd_transaksi,pembayaran,atas_nama,foto,jumlah,konfirmasi,tombol) values (null,'".$kode."','".$wilayah."','".$np."','".$tglan."','".$kd."','".$pm."','".$an."','','".$jml."','terbaru','".$tb."')";
            $sql = mysql_query($query);    
            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
			 echo"<script>alert('Konfirmasi Pembayaran NPA Bulan Ini Sudah Terkirim,Harap Tunggu Notifikasi Dari Admin');window.location='npa.php'</script>";
            }else{
                // Jika Gagal, Lakukan :
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
}
}
?>
               
                    <form method="post" action="" enctype="multipart/form-data">
                     <tr>
					 <td><h5><b>Pembayaran Bulan: <font color="red"><?echo"$bulan2";?></b></font></h5><br>
                     </tr>
                     <tr>
					 <td><b><h5>Terekap Admin Pada Tanggal:</h5></b><br>
                     <input type="text" class="form-control" value="<?echo"$tgl2-$bulan2-$tahun2";?>" autocomplete="off" readonly></td>
                     </tr>
					 <tr>
					 <td><b><h5>Pembayaran Melalui:</h5></b><br>
                     <input type="text" name="pm" class="form-control" autocomplete="off" placeholder="Dinas Pajak/bank bri/bank mandiri"></td>
                     </tr>
					 <tr>
					 <td><b><h5>Kode Transaksi (No referensi atau semacamnya):</h5></b><br>
                     <input type="text" name="kd" class="form-control" autocomplete="off"></td>
                     </tr>
					 <tr>
					 <td><b><h5>Atas Nama:</h5></b><br>
                     <input type="text" name="an" class="form-control" autocomplete="off"></td>
                     </tr>
					 <tr>
					 <td><b><h5>Bukti Pembayaran Nota /sebagainya:</h5></b><br>
                     <input type="file" name="gambar"></td>
                     </tr>
					 </tr>
                     <td><b>Jumlah:</b><input type="text" name="jml" class="form-control" autocomplete="off"  onkeyup="formatangka(this)" class="ratakanan"></td><br>
                     <input type="hidden" name="wilayah" value="<?echo"$dataprofil[korwil]";?>">
                     <input type="hidden" name="np" value="<?echo"$dataprofil[nama_perusahaan]";?>">
                     <input type="hidden" name="tbl" value="envelopeKirim Notifikasi?">
                     </tr>
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
                        <a dataprofil-original-title="Broadcast Message" dataprofil-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
<?}?>