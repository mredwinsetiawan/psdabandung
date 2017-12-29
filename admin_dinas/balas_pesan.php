<?php
session_start();
if(!isset($_SESSION['username_dinas']) AND !isset($_SESSION['password_dinas'])){
header('Location:login.php');
}else{
?>


<?php
include"header.php";
$kd =$_GET["kdunix"];

?>








<center>
<div class="container">
    <div class="row">
        <div class="col-md-12">
		<center><h3><span class="fa fa-envelope"></h3>
    		<h3></span>Pesan Masuk</center></h3>

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="list_pesan.php">
							<span class="glyphicon glyphicon-envelope"></span>
						    <span class="label label-danger"><?echo"$jml";?></span> Pesan Masuk </a>
						</li>
						<li>
							<a href="broadcast.php">
							<span class="glyphicon glyphicon-bullhorn"></span> Broadcast Pesan</a>
						</li>
                        <li>
                            <a href="kirim_pesan.php">
                            <span class="glyphicon glyphicon-users"></span> Kirim Pesan Ke Admin</a>
                        </li>
					</ul>
</div>
</div>
</div>
</div>
</div>

<?
include"../koneksi.php";
?>


<div class="container">
      <div class="row">
	  <center><h4><b>Balas Pesan</b></h4></center> 
	  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Balas Pesan</h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
<?php
if(isset($_POST['tb']))
{
include"../koneksi.php";
$kpd=$_POST['kpd'];
$jdl=$_POST['judul'];
$pesan=$_POST['pesan'];
$id=$_POST['id'];
$np=$_POST['np'];
$pg=$_POST['pengirim'];
$st=$_POST['status'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);
            $query = "INSERT INTO pesan_notifikasi(kode,id,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'".$id."','".$np."','".$kpd."','".$jdl."','".$pesan."','".$nama_file."','".$tgl."','".$pg."','".$st."')";
            $sql = mysql_query($query); 
            if($sql){ 
echo"<script>alert('Berhasil Membalas Pesan');window.location='list_pesan.php'</script>";
            }}
?>
<?
$kmp  = mysql_query("SELECT * FROM pesan_notifikasi WHERE kode='$kd'");
$kmp_data   = mysql_fetch_array($kmp);
?>                   
                    <form method="post" action="" enctype="multipart/form-data">
                     <tr>
					 <td>
					 <b><h5>Kepada :</h5></b>
                     <b><?echo"$kmp_data[nama_perusahaan]";?></b>
                     <input type='hidden' name="kpd" value='<?echo"$kmp_data[pengirim]";?>'>
					 
					 </td>
                     </tr>
                     <tr>
					 <td><b><h5>Subject :</h5></b>
                     <input type="text" name="judul" class='form-control' autocomplete="off" placeholder="subject" value="Respond : <?echo"$kmp_data[judul]";?>"></td>
                     </tr>
                     <tr>
					 <td><b><h5>Pesan :</h5></b>
                     <textarea name="pesan"></textarea></td>
                     </tr>
                     <tr>
					 <td><b><h5>Pengirim :</h5></b>
                     <input type="text" name="pengirim" autocomplete="off" placeholder="nama pengirim" class='form-control' value="admin-dinas" readonly></td>
                     </tr>
					 <input type="hidden" name="id" value="<?echo"$kmp_data[id]";?>">
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
                        <a href="list_pesan.php" title="kembali" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
        </section><!-- Close comments section-->



<?}?>