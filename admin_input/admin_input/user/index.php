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
<!-- 
 * parallax_login.html
-->
.notif-extended {
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
$query2  = mysql_query("SELECT * FROM data_user WHERE kode='$kode' and aktivasi='sudah-aktivasi' and hapus='aktif'");
$dataprofil   = mysql_fetch_array($query2);
$password =substr($dataprofil[password],0,-3);
if(!$dataprofil)
{
echo"<script>alert('User Belum Teraktivasi / di non aktifkan');window.location='login_salah.php'</script>";
}else
{
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
                    <li class="active">
                        <a dataprofil-toggle="tab" href="index.php">
                            <h4><span class="glyphicon glyphicon-user"></span></h4>
                        </a>
                    </li>

                    <li>
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
	  <center><h4><b>Profil Pengguna</b></h4></center>
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="edit_profil.php" >Edit Profile</A>

        <A href="logout.php" > Logout <span class="glyphicon glyphicon-off"></span></A>
       <br>
<p class=" text-info"><?include"tanggalan.php";?></p>
      </div>    
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Profil Pengguna</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../images/<?echo"$dataprofil[foto_profil]";?>" class="img-circle" width="160" height="160"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>No SIPPA:<br><?echo"$dataprofil[sippa]";?></td>
                      </tr>
                      <tr>
                        <td>Nama Perusahaan:<br><?echo"$dataprofil[nama_perusahaan]";?></td>
                      </tr>
                      <tr>
                        <td>Alamat:<br><?echo"$dataprofil[alamat]";?></td>
                      </tr>
                   
                      <tr>
                        <tr>
                        <td>Masa Berlaku Sampai:<br><?echo"$dataprofil[tanggal_akhir]";?></td>
                      </tr>
                      <tr>
                        <td>Sumber air:<br><?echo"$dataprofil[sumber_air]";?></td>
                      </tr>
					  <tr>
                        <td>Lokasi:<br><?echo"$dataprofil[lokasi]";?></td>
                      </tr>
                        <td>Jenis Usaha:<br><?echo"$dataprofil[jenis_usaha]";?></td>
                      </tr>
                        <td>Kelompok:<br><?echo"$dataprofil[kelompok]";?></td>
                      </tr>
					  <tr>
                        <td>Email:<br><?echo"$dataprofil[email]";?></td>
                      </tr>
					  <tr>
                        <td>No Hp:<br><?echo"$dataprofil[no_hp]";?></td>
                      </tr>
                        <td>Username:<br><?echo"$dataprofil[username]";?></td>
                      </tr>
                        <td>Password:<br><?echo"$password";?>***</td>
                      </tr>
                        <td>Keterangan:<br><?echo"$dataprofil[keterangan]";?>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
                 <div class="panel-footer" align="right">
                   <a href="edit_profil.php" dataprofil-original-title="Edit this user" dataprofil-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> edit profil</a>
                 </div>
            
          </div>
        </div>
      </div>
    </div>
<?}}?>