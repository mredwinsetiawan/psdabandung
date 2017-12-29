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
<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Apakah anda yakin bahwa data sudah benar ?");
 if (tanya == true) return true;
 else return false;
 }</script>
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
	
	
	
<?
include"../../../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggalan= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggalan);
$tahun=substr($tglsekarang,0,4);
$bulan=substr($tglsekarang,5,2);
$tgl=date("d");


?>	
	
	
	
	
<div class="container">
      <div class="row">
	  <center><h4><b>Upload Foto</b></h4></center>
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
<p class=" text-info"><?include"tanggalan.php";?></p>
      </div>
 






	  
<?php
include"../../../koneksi.php";

$id_user 	= $_POST['id'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tanggalan = date("Y-m-d", $tanggal);
$wulan=substr($tanggalan,5,2);
$taun=substr($tanggalan,0,4);

$hasil  = mysql_query("SELECT * FROM data_user WHERE kode='$id_user' and korwil='".$wil."' and aktivasi='sudah-aktivasi' and hapus='belum-terhapus'");
$data   = mysql_fetch_array($hasil);
if ($data > 0)	
{
$hasilo  = mysql_query("SELECT * FROM rekap_admin_lapangan WHERE id='$id_user' and month(tgl_kirim)='$wulan' and year(tgl_kirim)='$taun'");
$hasila  = mysql_query("SELECT * FROM rekap_admin_input WHERE id='$id_user' and month(bulan)='$wulan' and year(bulan)='$taun'");
$datak   = mysql_fetch_array($hasila);

$datab   = mysql_fetch_array($hasilo);
if ($datak > 0 or $datab > 0)	
{
   echo "<br><br><center><table><tr><td><b>Kemungkinan Kesalahan :<br>1.Id Tidak Cocok</td></tr><br><tr><td> 2.Sudah Terupload Bulan ini </td></tr><br><tr><td> Apabila terjadi kesalahan silahkan hubungi admin input<br><a class='btn btn-primary' href='index.php'><span class='glyphicon glyphicon-refresh'></span> Coba Lagi</a> <a class='btn btn-warning' href='kirim_pesan.php'><span class='glyphicon glyphicon-envelope'></span> Kirim Pesan Admin Input</a></b></td></tr></table></center><br><br><br><br><br><br>";
}else{
?>
 <div class="col-md-5  toppad  pull-left col-md-offset-3 ">
          <a href="kirim_pesan.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Kirim Pesan</a>                     
      </div>    
	  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"align="center">ID COCOK</h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>                
                    <form method="post" action="simpan_data.php" enctype="multipart/form-data">
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
					 <center><b><h5>Sumber Air</b></center>
					 <input type="text" class="form-control" placeholder="Sumber Air" value="<?echo"$data[sumber_air]";?>" readonly></h5></td>
                     </tr>
                     <tr>
					 <td>
					 <center><b><h5>Lokasi</b></center>
					 <input type="text" class="form-control" placeholder="Sumber Air" value="<?echo"$data[lokasi]";?>" readonly></h5></td>
                     </tr>
                     <tr>
					 <td>
					 <center><h4><b>Pastikan Mengisi Foto dari Foto 1 (Pertama)</b></h4></center>
					 <center><b><h5>Foto 1</b></center>
					 <input type="file" name="gambar1"></h5></td>
                     </tr>
                     <tr>
					 <td>
					 <center><b><h5>Foto 2</b></center>
					 <input type="file" name="gambar2"></h5></td>
                     </tr>
                     <tr>
					 <td>
					 <center><b><h5>Foto 3</b></center>
					 <input type="file" name="gambar3"></h5></td>
                     </tr>
                     <tr>
					 <td>
					 <center><b><h5>Tanpa Gambar ?</b></center>
					 <input type="text" class="form-control" placeholder="Volume" name="volume"></h5></td>
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
					   <input type="submit" name="button" class="btn btn-primary" value="kirim" onclick='return konfirmasi()'></div>
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
}
}else{
echo "<br><br><center><table><tr><td><b>Kesalahan :<br><tr><td> 1.User Belum Melakukan Aktivasi </td></tr><br><tr><td> 2.User Belum Melakukan Perpanjangan Masa Aktif </td></tr><br><tr><td> Apabila terjadi kesalahan silahkan hubungi admin input<br><a class='btn btn-primary' href='index.php'><span class='glyphicon glyphicon-refresh'></span> Coba Lagi</a> <a class='btn btn-warning' href='kirim_pesan.php'><span class='glyphicon glyphicon-envelope'></span> Kirim Pesan Admin Input</a></b></td></tr></table></center><br><br><br><br><br><br>";
}
}?>