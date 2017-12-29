<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['sippa_user'])){
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
include"pesan-notifikasi.php";
$sippa  = mysql_query("SELECT * FROM data_user WHERE kode='$kode' and aktivasi='belum-aktivasi'");
$data_sippa = mysql_fetch_array($sippa);
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
                     <form method="post" action="simpan_aktivasi.php" enctype="multipart/data">
					  <tr>
                        <td><b>Email</b><input type="text" name="email" class="form-control" value="<?echo"$data_sippa[email]";?>"></td>
                      </tr>
					  <tr>
                        <td><b>No Hp</b><input type="text" name="no_hp" class="form-control" value="<?echo"$data_sippa[no_hp]";?>"></td>
                      </tr>
                        <td><b>Username</b><input type="text" class="form-control" value="<?echo"$data_sippa[username]";?>" readonly></td>
                      </tr>
                        <td><b>Password</b><input type="text" name="password" class="form-control" value="<?echo"$data_sippa[password]";?>" autocomplate="off"></td>
                        <input type="hidden" name="aktivasi" value="sudah-aktivasi">
                      </tr>
                      <tr>
                        <td><b>Foto Profil</b><input type="file" accept="image/*" name="foto_profil" class="form-control"></td>
		              </tr>
					  <tr><td><input class="btn btn-lg btn-success btn-block" type="submit" id="login" name="tombol" value="Aktivasi Akun "></td></tr>
					  <tr><td><font color="red">Aktivasi berhasil..Silahkan Login</td></tr>
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
<?}?>