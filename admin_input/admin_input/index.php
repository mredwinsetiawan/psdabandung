<?php
session_start();
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php');
}else{ 
include"header.php";
$wilayah_admin=$_SESSION['wilayah_admin_1'];
?>
<center>
<div class="container">
    <div class="row">
        <div class="col-md-12">
		<center><h3><span class="fa fa-home"></h3>
    		<h3></span>Admin Input <?echo"$wilayah_admin";?></center></h3>

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="index.php">
							<span class="glyphicon glyphicon-flag"></span> Laporan Admin Lapangan </a>
						</li>
						<li>
							<a href="sudah_ter-edit.php">
						<span class="glyphicon glyphicon-ok"></span>	Rekap Data Bulan Ini </a>
						</li>
						<li>
							<a href="tambah_rekap_manual.php">
						<span class="glyphicon glyphicon-plus"></span>	Tambah Rekap Manual </a>
						</li>
					</ul>
</div>
</div>
</div>
</div>
</div>


<style>
.glyphicon-lg
{
    font-size:4em
}
.info-block
{
    border-right:5px solid #E6E6E6;margin-bottom:25px
}
.info-block .square-box
{
    width:100px;min-height:110px;margin-right:22px;text-align:center!important;background-color:#676767;padding:20px 0
}
.info-block.block-info
{
    border-color:#20819e
}
.info-block.block-info .square-box
{
    background-color:#20819e;color:#FFF
}
.label,.glyphicon { margin-right:5px; }
</style>
<script>
    $(function() {    
        $('#input-search').on('keyup', function() {
          var rex = new RegExp($(this).val(), 'i');
            $('.searchable-container .items').hide();
            $('.searchable-container .items').filter(function() {
                return rex.test($(this).text());
            }).show();
        });
    });
</script>
	
	
	
	


<center>
<div class="container">
	<div class="row">
	     <br>
<center>
      <h2><center>Laporan Admin Lapangan</center></h2>
	  <h3><span class="glyphicon glyphicon-print"></span></h3>
<button onclick='window.print()' class='btn btn-danger'><span class="glyphicon glyphicon-print"></span> Cetak Satu Page</button>
</center>
<br>
        <div class="col-lg-12">
            <input type="search" class="form-control" id="input-search" placeholder="Search Attendees..." >
        </div>
<?
include"../../koneksi.php";
$t = "select * from rekap_admin_lapangan where status='terbaru' and wilayah='".$wilayah_admin."'";
$s = mysql_query($t);
$n =mysql_num_rows($s);
$op =$n+1;
while($dataapl = mysql_fetch_array($s))
 {
 $i++;

?>
        <div class="searchable-container">
            <div class="items col-xs-12 col-sm-6 col-md-6 col-lg-6 clearfix">
               <div class="info-block block-info clearfix">
                    <div class="square-box pull-left">
                      <a href="edit_rekap_admin_lapangan.php?kdunix=<?echo"".$dataapl[kode]."";?>"><span><img src="images/<?echo "".$dataapl[foto_profil].""?>" width="100px" height="100px"></span></a>
                    </div>
                    <a href="edit_rekap_admin_lapangan.php?kdunix=<?echo"".$dataapl[kode]."";?>"><h4><?echo "".$i." .<td>".$dataapl[nama_perusahaan]."</td>"?>   <a href="hapus_rekap.php?kdunix=<?echo"$dataapl[kode]";?>"><span class="glyphicon glyphicon-trash"></span></a></h4></a>
                    <h5><?echo "<td>".$dataapl[alamat]."</td>"?></h5>
                    <span>Phone: <?echo "<td>".$dataapl[no_hp]."</td><br>"?></span>
                    <span>Email: <?echo "<td>".$dataapl[email]."</td><br>"?></span>
                    <span>Tanggal Kirim: <?echo "<td>".$dataapl[tgl_kirim]."</td>"?></span>
					<br>
                    <span><b><i>Petugas: <?echo "<td>".$dataapl[admin_lapangan]."</td>"?></i></b></span>
                </div>
            </div>
        </div>
        <div class="searchable-container">
            <div class="items col-xs-12 col-sm-6 col-md-6 col-lg-6 clearfix">
                              <div class="info-block block-info clearfix">
                    <div class="pull-right">
<?if(!$dataapl[foto1]){}else{?>
                      <a><span><img src="images/<?echo "".$dataapl[foto1].""?>" width="183px" height="183px"></span></a>
                    </div>
<?}if(!$dataapl[foto2]){}else{?>
                    <div class="pull-right">
                      <a><span><img src="images/<?echo "".$dataapl[foto2].""?>" width="183px" height="183px"></span></a>
                    </div>
<?}if(!$dataapl[foto3]){}else{?>
                    <div class="pull-right">
                      <a><span><img src="images/<?echo "".$dataapl[foto3].""?>" width="183px" height="183px"></span></a>
                    </div>
<?}?>
                </div>
            </div>
        </div>
<?}?>
	</div>
</div>
</center>
<?}?>