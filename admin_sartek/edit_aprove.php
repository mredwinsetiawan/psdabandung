<?
if(isset($_POST['tombol']))
{
include"../koneksi.php";  
$sippa=$_POST['sippa'];
$awal=$_POST['tgl_awal'];
$akhir=$_POST['tgl_akhir']; 
$pesan=$_POST['pesan'];
$id=$_POST['id'];
$ide=$_POST['ide'];
$np=$_POST['np'];
$kf=$_POST['kf'];
$angka1= str_replace(".", "", $kf);
$kpd=$_POST['kpd'];
$jdl=$_POST['judul'];
$pg=$_POST['pengirim'];
$st=$_POST['status'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);
 		   

            $va="update data_user set tanggal_awal='$awal',tanggal_akhir='$akhir',sippa='$sippa' where  kode='$id'";
		    $temu2=mysql_query($va);
			
			
	        $querya = "INSERT INTO pesan_notifikasi(kode,id,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'".$id."','".$np."','".$kpd."','".$jdl."','".$pesan."','','".$tgl."','".$pg."','".$st."')";
            $sqla = mysql_query($querya);				
		
if(empty($_POST[kf]))
		   {
            echo"<script>alert('Konfirmasi Jumlah Tidak Boleh Kosong');window.location='terkonfirmasi.php'</script>";
		   }else{
            $v="update rekap_sartek set konfirmasi='ter-uproav',jumlah='$angka1' where kode='$ide'";
		    $temu=mysql_query($v);  
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
			 
            echo"<script>alert('Data Ter-aprove');window.location='terkonfirmasi.php'</script>";
	         
	         }
}}

?>
	