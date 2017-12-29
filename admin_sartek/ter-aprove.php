<?php
session_start();
if(!isset($_SESSION['username_sartek']) AND !isset($_SESSION['password_sartek'])){
header('Location:login.php');
}else{
?>



<?
include"../koneksi.php";
include"header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
		
			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
					
					<?
					include"../koneksi.php";
					$tampil1 = "select * from rekap_sartek where konfirmasi='terbaru' order by bulan DESC";
                    $sql1 = mysql_query($tampil1);
                    $hitung1 = mysql_num_rows($sql1);
					?>
						<li>
							<a href="index.php">
							Terbaru <span class="label label-info"><?echo"$hitung1";?></span></a>
						</li>
					<?
					$tampil2 = "select * from rekap_sartek where konfirmasi='terkonfirmasi' order by bulan DESC";
                    $sql2 = mysql_query($tampil2);
                    $hitung2 = mysql_num_rows($sql2);
					?>
						<li>
							<a href="terkonfirmasi.php">
							Terkonfirmasi  <span class="label label-info"><?echo"$hitung2";?></span> </a>
						</li>
					<?
					$tahtah=date("Y");
					$bulbul=date("m");
					$tampil3 = "select * from rekap_sartek where konfirmasi='ter-uproav' and month(bulan)='$bulbul' and year(bulan)='$tahtah' order by bulan DESC";
                    $sql3 = mysql_query($tampil3);
                    $hitung3 = mysql_num_rows($sql3);
					?> 
						<li class="active">
							<a href="ter-aprove.php">
							Ter aprove <span class="label label-info"><?echo"$hitung3";?></span></a>
						</li>
						<li>
							<a href="rekap_berjalan.php">Rekap Berjalan </a>
						</li>
						<li>
							<a href="rekap_tertentu.php">Rekap Tertentu </a>
						</li>
						<li>
							<a href="rekap_pertahun.php">Rekap Tahunan </a>
						</li>
					</ul>
					
					</div>
				</div>
			</div>
		</div>
	</div>
<br>
<br>
    <html>
        <head>
            <script type="text/javascript" src="khusus/js/jquery-1.8.0.min.js"></script>
            <script type="text/javascript" src="khusus/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="jkhusus/s/bootstrap.min.js"></script>
            <link rel="stylesheet" href="khusus/css/bootstrap.min.css">
            <link rel="stylesheet" href="khusus/font-awesome-4.1.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="khusus/css/jquery.dataTables.min.css">
            <link rel="stylesheet" type="khusus/text/css" media="all" href="jsdatepick-calendar/jsDatePick_ltr.min.css" />
            <script type="text/javascript" src="khusus/jsdatepick-calendar/jsDatePick.jquery.min.1.3.js"></script>
            <style type="text/css">
               
			   /*	#searchid
                        {
                                width:500px;
                                border:solid 1px #000;
                                padding:10px;
                                font-size:14px;
                        }*/
                #result
                {
                    position:absolute;
                    width:300px;
                    padding:5px;
                    display:none;
                    margin-top:40px;
                    border-top:0px;
                    overflow:hidden;
                    border:1px #CCC solid;
                    background-color: white;
                    z-index: 10;
                    font-size: 14px;
                    border-radius: 2px;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
                    -webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.2);
                }
                .show
                {
                    padding:10px; 
                    border-bottom:1px #999 dashed;
                    /*		font-size:12px; */
                    height:50px;
                }
                .show:hover
                {
                    background:#428bca;
                    color: #fff;
                    cursor:pointer;
                }
				.gallery
{
    display: inline-block;
    margin-top: 20px;
}
            </style>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#datatable').dataTable();
                });
				$(document).ready(function(){
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
       
     
    
    
            </script>
        </head>
                                    
<div align="center">
    <h1><span class="glyphicon glyphicon-print"></span> <br><br> <button onclick='window.print()' class='btn btn-danger'><span class="glyphicon glyphicon-print"></span>Cetak Satu Page Data</button></label></h1>
    <br>
</div>
<br>
<table id="datatable" class="display stripe">
    <thead>
<th>No</th>
<th>Wilayah</th>
<th>Nama Perusahaan</th>
<th>Pembayaran</th>
<th>Kode Transaksi</th>
<th>Atas Nama</th>
<th>Bukti Pembayaran</th>
<th>Jumlah</th>
<th>Tanggal Bayar</th>
<th>Sippa Baru</th>
<th><font color="blue">Tanggal Awal</font></th>
<th><font color="red">Tanggal Akhir<font></th>
<th><em class="glyphicon glyphicon-envelope"></em></th>
<th><em class="glyphicon glyphicon-edit"></em></th>
<th><em class='glyphicon glyphicon-trash'></em></th>
</thead>
<tbody>
<?php
include"../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
$bulan=substr($tglsekarang,5,2);
$no=0; 
$tampil = "select * from rekap_sartek where konfirmasi='ter-uproav' and month(bulan)='$bulan' and year(bulan)='$tahtah' order by kode DESC";
$sql = mysql_query($tampil);
while($data = mysql_fetch_array($sql))
 {
 $no++;
 $btn=substr($data[tombol],0,8);
 $name=substr($data[tombol],8);
 
 
           $kmp  = mysql_query("SELECT * FROM data_user where kode='$data[id]'");
           $kmp_data   = mysql_fetch_array($kmp);
                
 
?>
            <tr>
                <td><?php echo $no; ?> </td>
                <td><?php echo $data['wilayah']; ?> </td>
                <td><?php echo $data['nama_perusahaan']; ?> </td>
                <td><?php echo $data['pembayaran']; ?> </td>
                <td><?php echo $data['kd_transaksi']; ?> </td>
                <td><?php echo $data['atas_nama']; ?> </td>
                <td>
                    <a class="thumbnail fancybox" rel="ligthbox" href="../admin_input/images/<?php echo $data['foto']; ?>">
                    <img class="img-responsive" alt="tanpa gambar" src="../admin_input/images/<?php echo $data['foto']; ?>" width="120" height="120"/>
					</a>   
				</td>
                <td>Rp.<?php echo $data['jumlah']; ?> </td>
                <td><?php echo $data['bulan']; ?> </td>
                <td><?php echo $kmp_data['sippa']; ?> </td>
                <td><font color="blue"><b><?php echo "$kmp_data[tanggal_awal]"; ?></b></font></td>
                <td><font color="red"><b><?php echo "$kmp_data[tanggal_akhir]"; ?> </b></font></td>
				                 
					<form method="post" action="kirim_notifikasi.php" enctype="multipart/form-data">
                     <input type="hidden" name="ide" value="<?echo"$data[kode]";?>">
                     <input type="hidden" name="kpd" value="<?echo"$data[wilayah]";?>">
                     <input type="hidden" name="judul" value="Konfirmasi Pembayaran">
                     <input type="hidden" name="pesan" value="Selamat <?echo"$data[nama_perusahaan]";?>,,<br> Konfirmasi Pembayaran Anda Berhasil Dengan Nominal Rp.<?echo"$data[jumlah]";?>..Masa Aktif Perpanjangan Anda Mulai Dari <?echo"$kmp_data[tanggal_awal]";?> sampai <?echo"$kmp_data[tanggal_akhir]";?>  dengan SIPPA Baru <?echo"$kmp_data[sippa]";?>    <br><br> <i>Ttd,,Admin Sartek</i> ">
                     <input type="hidden" name="pengirim" value="admin-sartek"></td>
         			 <input type="hidden" name="id" value="<?echo"$kmp_data[kode]";?>">
					 <input type="hidden" name="np" value="<?echo"$kmp_data[nama_perusahaan]";?>">
					 <input type="hidden" name="status" value="belum-terbaca">
			       <td><button name="but" class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-<?echo"$btn";?>'></i> <?echo"$name";?></button></td>
                    </form>

					<?php echo "<td><a class='btn btn-primary btn-sm' href='edit_jumlah_aprove.php?kdunix=".$data[kode]."' onclick='return confirm(&quot;Anda yakin akan mengedit data?.&quot;)'><i class='glyphicon glyphicon-edit'></i> Edit</a></td>";?>
					<?php echo "<td><a class='btn btn-danger btn-sm' href='hapus-aprove.php?kdunix=".$data[kode]."' onclick='return confirm(&quot;Jika Anda Menghapus data tersebut maka akan otomatis data menjadi TIDAK LUNAS /user harus konfirmasi lagi?,,Pesan Notifikasi bahwa user gagal melakukan registrasi dan harus melakukan konfirmasi ulang juga akan terkirim.&quot;)'><i class='glyphicon glyphicon-trash'></i> Hapus</a>";?></td>
                     
		</tr>
<?php
    }
?>
</tbody>
</table>		

<?}?>