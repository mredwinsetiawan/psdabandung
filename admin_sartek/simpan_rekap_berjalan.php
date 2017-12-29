<?php
if(isset($_POST['butuk']))
{
include"../koneksi.php";
$pesan=$_POST['pesan'];
$ide=$_POST['ide'];
$id=$_POST['id'];
$np=$_POST['np'];
$kpd=$_POST['kpd'];
$jdl=$_POST['judul'];
$pg=$_POST['pengirim'];
$st=$_POST['status'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);

 		   

			
			$v="update rekap_sartek set tombol='check   Sudah Terkirim' where kode='$ide'";
		    $tema=mysql_query($v); 
			
			
			$jajal="select * from rekap_sartek where kode='$ide'";
		    $tel=mysql_query($jajal); 
			
			if(!$tel)
			{
			
			}else{

            $querya = "INSERT INTO pesan_notifikasi(kode,id,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'".$id."','".$np."','".$kpd."','".$jdl."','".$pesan."','".$nama_file."','".$tgl."','".$pg."','".$st."')";
            $sqla = mysql_query($querya);	
			
            echo"<script>alert('Pesan Notifikasi Berhasil Dikirimkml');window.location='rekap_berjalan.php'</script>";
			}
}			
	
?>