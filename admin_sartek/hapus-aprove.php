<?php
session_start();
if(!isset($_SESSION['username_sartek']) AND !isset($_SESSION['password_sartek'])){
header('Location:login.php');
}else{
?>

<?php
$kode =$_GET["kdunix"];
include"../koneksi.php";  
$query1="select * from rekap_sartek where kode='$kode'";
$temu1=mysql_query($query1); 
$array1=mysql_fetch_array($temu1);  

include"../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);
 		    

            $querya = "INSERT INTO pesan_notifikasi(kode,id,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'$array1[id]','$array1[nama_perusahaan]','$array1[wilayah]','Konfirmasi Pembatalan','Hai $array1[nama_perusahaan],,<br> Konfirmasi Pembayaran Perpanjangan Anda Pada Bulan $array1[bulan] Telah Dihapus Oleh Admin Sartek..Anda harus mengonfirmasi ulang pembayaran atau hubungi admin sartek sekarang juga <br><br> <i>Ttd,,Admin Sartek</i>','','".$tgl."','admin-sartek','belum-terbaca')";
            $sqla = mysql_query($querya);	
						
			if(!$sqla)
			{
            echo"<script>alert('GAGAL KIRIM NOTIFIKASI');window.location='ter-aprove.php'</script>";
			}else{
				
$query1="select * from rekap_sartek where kode='$kode'";
$temu1=mysql_query($query1); 
$array1=mysql_fetch_array($temu1); 	
	   
$folder1="../admin_input/images/$array1[foto]";//nama folder dan nama foto yag akan di hapus
unlink($folder1);//di gunakan untuk menghapus data yang ada di dlam folder
      
            $v="delete from rekap_sartek where kode='$kode'";
		    $temu=mysql_query($v);    
	        if(!$temu)
			{
            echo"<script>alert('GAGAL HAPUS');window.location='ter-aprove.php'</script>";
			}else
	         {
	         
echo"<script>alert('data berhasil di hapus');window.location='ter-aprove.php'</script>";
	           }
			 }
	     
	
?>


<?}?>