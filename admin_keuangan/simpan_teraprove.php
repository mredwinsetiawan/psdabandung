<?php
if(isset($_POST['but']))
{
include"../koneksi.php";
$pesan=$_POST['pesan'];
$id=$_POST['id'];
$ide=$_POST['ide'];
$np=$_POST['np'];
$kpd=$_POST['kpd'];
$jdl=$_POST['judul'];
$pg=$_POST['pengirim'];
$st=$_POST['status'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);
 		   

			
			$v="update rekap_keuangan set tombol='check   Sudah Terkirim' where kode='$ide'";
		    $tema=mysql_query($v); 
			
			
			$jajal="select * from rekap_keuangan where kode='$ide'";
		    $te=mysql_query($jajal); 
			
			if(!$te)
			{
			}else{

            $querya = "INSERT INTO pesan_notifikasi(kode,id,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'".$id."','".$np."','".$np."','".$jdl."','".$pesan."','".$nama_file."','".$tgl."','".$pg."','".$st."')";
            $sqla = mysql_query($querya);	
			
			echo"<script>alert('Notifikasi Terkirim');window.location='ter-aprove.php'</script>";
			}
}			
	
?>