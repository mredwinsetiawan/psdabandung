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

</head>
<?
include"../../../koneksi.php";
include"pesan-notifikasi.php";
?>



<?
$query2  = mysql_query("SELECT * FROM data_user WHERE kode='$kode' and aktivasi='sudah-aktivasi' and hapus='aktif'");
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
                    <li>
                        <a dataprofil-toggle="tab" href="pesan.php">
                            <h4><span class="glyphicon glyphicon-envelope"></span></h4>
                        </a>
                    </li>
                    <li class="active">
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
	  <center><h4><b>Galery Admin Lapangan</b></h4></center>
  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
<?
$galery=mysql_query("SELECT * FROM rekap_admin_input WHERE id='$kode' order by bulan DESC");
while($data_galery=mysql_fetch_array($galery))
{
$tgl=substr($data_galery[bulan],8,2);
$bulan=substr($data_galery[bulan],5,2);
$tahun=substr($data_galery[bulan],0,4);

if(!$data_galery[gallery1])
{}
else{?>  
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Gambar Volume Air Bulan: <?echo"$bulan";?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
					   <tr>
					   <hr>
                        <td><b>Tanggal Pengambilan: <?echo"$tgl-$bulan-$tahun";?><b></td>
                      <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../images/<?echo"$data_galery[gallery1]";?>" width="200" height="200"> </div>
					  </tr>
                    </tbody>
                  </table> 
                </div>

              </div>
            </div>
                 <div class="panel-footer">
                        <a href="konfirmasi_pembayaran.php" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-usd"></i> <?echo"$data_galery[status]";?></a>
                        <span class="pull-right">
                            <a href="kirim_pesan.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        </span>
                    </div>
            
          </div>
<?}}?>
        </div>
      </div>
    </div>
<?}?>