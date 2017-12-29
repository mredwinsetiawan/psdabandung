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
	  <center><h4><b>Pesan</b></h4></center>
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
<p class=" text-info"><?include"tanggalan.php";?></p>
      </div>
 
 
 
 
 
 
      <div class="col-md-5  toppad  pull-left col-md-offset-3 ">
          <a href="kirim_pesan.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Kirim Pesan</a>                     
      </div>    
	  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Notifikasi</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
<?
$query  = mysql_query("SELECT * FROM pesan_notifikasi WHERE id='$id' and nama_perusahaan='admin-lapangan-".$wil."' order by tanggal_pengiriman DESC");
$hitung = mysql_num_rows($query);

while($data   = mysql_fetch_array($query))
{
if(!$data)
{}else{
?>                     
                      <tr><td>
					  <img alt="User Pic" src="../css/user_admin.png" width="50" height="50" class="img-circle"><b> <?echo"$data[pengirim]";?> :</b>
					  &nbsp;&nbsp;&nbsp;
					  <span class="label label-danger pull-right"><?echo"$data[tanggal_pengiriman]";?></span>
					  <a href="hapus_pesan.php?kdunix=<?echo"$data[kode]";?>" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger" align="right">
                      <i class="glyphicon glyphicon-remove"></i></a>
					  <h6><p><b><?echo"$data[judul]";?> :</b></h6>
					  <h6><?echo"$data[pesan]";?></h6></p></td>
                        <td></td>
                      </tr>                   
<?}}?>                    
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a  href="pesan.php" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a   href="kirim_pesan.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="hapus_pesan.php?kd=<?echo"$data[kode]";?>" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
<?}?>