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
	  <?$tang=date("m");?>
	  <center>
	  <h2><b><?echo"$tang";?></b></h2>
	  <h5><b><br>Gallery <?echo"$wil";?> Bulan Ini</b></h5></center>
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
<p class=" text-info"><?include"tanggalan.php";?></p>
      </div>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
	        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
<?
date_default_timezone_set('Asia/Jakarta');
$tanggalan= mktime(date("m"),date("d"),date("Y"));
$pkg_tgl = date("Y-m-d", $tanggalan);
$bul=substr($pkg_tgl,5,2);
$galery=mysql_query("SELECT * FROM rekap_admin_lapangan WHERE wilayah='".$wil."' and month(tgl_kirim)='$bul' order by tgl_kirim DESC");
while($data_galery=mysql_fetch_array($galery))
{
$tgl=substr($data_galery[tgl_kirim],8,2);
$bulan=substr($data_galery[tgl_kirim],5,2);
$tahun=substr($data_galery[tgl_kirim],0,4);
?>  
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Gambar Volume Air Tanggal: <?echo"$tgl-$bulan-$tahun";?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
					   <tr>
					   <td><div class="col-md-3 col-lg-3 " align="center"><a href="../images/<?echo"$data_galery[foto1]";?>"> <img alt="Kosong" src="../images/<?echo"$data_galery[foto1]";?>" width="100" height="100"></a></div></td>
					   <td><div class="col-md-3 col-lg-3 " align="center"><a href="../images/<?echo"$data_galery[foto2]";?>"> <img alt="Kosong" src="../images/<?echo"$data_galery[foto2]";?>" width="100" height="100"></a></div></td>
					   <td><div class="col-md-3 col-lg-3 " align="center"><a href="../images/<?echo"$data_galery[foto3]";?>"> <img alt="Kosong" src="../images/<?echo"$data_galery[foto3]";?>" width="100" height="100"></a></div></td>
                       </tr>
					   <tr>
                      <p><b>Nama Perusahaan: <?echo"$data_galery[nama_perusahaan]";?><b></p>
                      </tr>
					   <tr>
                      <td><b>Tanggal Pengambilan: <?echo"$tgl-$bulan-$tahun";?><b></td>
                      </tr>
                    </tbody>
                  </table> 
                </div>

              </div>
            </div>
                    <div class="panel-footer">
                        <a href="edit_gallery.php?kdunix=<?echo"$data_galery[kode]";?>" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="hapus_gallery.php?kdunix=<?echo"$data_galery[kode]";?>" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                     </div>
            
          </div>
<?}?>
        </div>
      </div>
    </div>
<?}?>