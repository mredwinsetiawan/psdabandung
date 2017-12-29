<?
if(isset($_POST['tombol']))
{
if(empty($_POST['konfirmasi']))
{

            echo"<script>alert('Konfirmasi Jumlah Tidak Boleh Kosong');window.location='terkonfirmasi.php'</script>";
}else{

include"../koneksi.php";  
$awal=$_POST['tgl_awal'];
$akhir=$_POST['tgl_akhir']; 
$pesan=$_POST['pesan'];
$id=$_POST['id'];
$bl=$_POST['bulek'];
$np=$_POST['np'];
$kodd=$_POST['kodd'];
$kpd=$_POST['kpd'];
$jdl=$_POST['judul'];
$kn=$_POST['konfirmasi'];
$angka1= str_replace(".", "", $kn);
$pg=$_POST['pengirim'];
$st=$_POST['status'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);
 		   

			
	        $querya = "INSERT INTO pesan_notifikasi(kode,id,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'".$id."','".$np."','".$np."','".$jdl."','".$pesan."','','".$tgl."','".$pg."','".$st."')";
            $sqla = mysql_query($querya);		
			
		    $tahtah=substr($bl,0,4);
			echo"$datak[kode]";
            $va="update rekap_admin_input set status='sudah-lunas' where id='$id' and bulan='$bl'";
			$croooottt = mysql_query($va);	

            $v="update rekap_keuangan set konfirmasi='ter-uproav',jumlah='$angka1'  where kode='$kodd'";
		    $temu=mysql_query($v);  
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
	         
            echo"<script>alert('Data Ter-aprove');window.location='terkonfirmasi.php'</script>";
	         }
}




}
?>