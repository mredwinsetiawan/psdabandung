<?php
session_start();
include"../../../koneksi.php";
if(!isset($_SESSION['username_user_ciliwung_cisadane']) AND !isset($_SESSION['password_user_ciliwung_cisadane'])){
header('Location:login.php');
}else{
?>

<?
$kode=$_SESSION['id_user_ciliwung_cisadane'];
$korwil_user_ciliwung_cisadane=$_SESSION['korwil_user_ciliwung_cisadane'];
$nopo  = mysql_query("SELECT * FROM data_user WHERE kode='$kode'");
$nopoar  = mysql_fetch_array($nopo);
$query  = mysql_query("SELECT * FROM pesan_notifikasi WHERE id='$kode' and kepada='$nopoar[nama_perusahaan]' and  status='belum-terbaca' ");
$hitung = mysql_num_rows($query);
$data   = mysql_fetch_array($query);
$judul = substr($data['judul'],0,28);
$tgl=substr($data[tanggal_pengiriman],8,2);
$bulan=substr($data[tanggal_pengiriman],5,2);
$tahun=substr($data[tanggal_pengiriman],0,4);
if(!$data)
{}else{
?>
<div class="col-md-1"></div>
<div class="col-md-8 padding-top-10">
    <div class="notif-extended">
        <div>
            <p class="notify-count-green">Anda mendapat <?echo"$hitung";?> pesan baru</p>
        </div>
        <div class="notif-message">
            <a href="update_status_pesan.php">
                <span class="fa fa-clock-o fa-fw"></span>
                <span class="notif-subject">
                    <span class="notif-subject-from"><?echo"$data[pengirim]";?></span>
                </span>
                <span class="notif-subject-message padding-right-10">
                    <?echo"$judul";?>...
                    <span class="label label-danger pull-right"><?echo"$tgl-$bulan-$tahun";?></span>
                </span>
            </a>
			<span class="pull-right">
			<a href="update_status_pesan.php" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            </span>
		</div>
    </div>
</div>
</div>
<?}?>
<?}?>