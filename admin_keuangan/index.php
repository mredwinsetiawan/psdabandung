<?php
session_start();
include"../koneksi.php";
if(!isset($_SESSION['username_keuangan']) AND !isset($_SESSION['password_keuangan'])){
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
					$tampil1 = "select * from rekap_keuangan where konfirmasi='terbaru' order by bulan DESC";
                    $sql1 = mysql_query($tampil1);
                    $hitung1 = mysql_num_rows($sql1);
					?>
						<li class="active">
							<a href="index.php">
							Terbaru <span class="label label-info"><?echo"$hitung1";?></span></a>
						</li>
					<?
					$tampil2 = "select * from rekap_keuangan where konfirmasi='terkonfirmasi' order by bulan DESC";
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
					$tampil3 = "select * from rekap_keuangan where konfirmasi='ter-uproav' and month(bulan)='$bulbul' and year(bulan)='$tahtah' order by bulan DESC";
                    $sql3 = mysql_query($tampil3);
                    $hitung3 = mysql_num_rows($sql3);
					?> 
						<li>
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
            </style>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#datatable').dataTable();
                });
            </script>
        </head>
                                    
			
<div align="center">
    <h1><span class="glyphicon glyphicon-print"></span> <br><br> <button onclick='window.print()' class='btn btn-danger'><span class="glyphicon glyphicon-print"></span>Cetak Satu Page</button></label></h1>
    <br>
</div>
<br>
<table id="datatable" class="display stripe">
    <thead>
<th>No</th>
<th>Wilayah</th>
<th>Nama Perusahaan</th>
<th>Pembayaran</th>
<th>Bukti Gambar</th>
<th>Kode Transaksi</th>
<th>Atas Nama</th>
<th>Jumlah</th>
<th>Tanggal Bayar</th>
<th>Aksi</th>
</thead>
<tbody>
<?php
include"../koneksi.php";
$no=0; 
$tampil = "select * from rekap_keuangan where konfirmasi='terbaru' order by bulan DESC";
$sql = mysql_query($tampil);
while($data = mysql_fetch_array($sql))
 {
 $no++;
 
?>
            <tr>
                <td><?php echo $no; ?> </td>
                <td><?php echo $data['wilayah']; ?> </td>
                <td><?php echo $data['nama_perusahaan']; ?> </td>
                <td><?php echo $data['pembayaran']; ?> </td>
				<td>
                    <a class="thumbnail fancybox" rel="ligthbox" href="../admin_input/images/<?php echo $data['foto']; ?>">
                    <img class="img-responsive" alt="tanpa gambar" src="../admin_input/images/<?php echo $data['foto']; ?>" width="70" height="90"/>
					</a>   
				</td>
                <td><?php echo $data['kd_transaksi']; ?> </td>
                <td><?php echo $data['atas_nama']; ?> </td>
                <td>Rp.<?php echo $data['jumlah']; ?> </td>
                <td><?php echo $data['bulan']; ?> </td>
                <td><?php echo "<a class='btn btn-primary btn-sm' href='edit_konfirmasi.php?kdunix=".$data[kode]."'><i class='glyphicon glyphicon-edit'></i> Konfirmasi</a> | 
                    <a class='btn btn-danger btn-sm' href='hapus-terbaru.php?kdunix=".$data[kode]."' onclick='return confirm(&quot;Apakah anda yakin akan menghapus data tersebut?&quot;)'><i class='glyphicon glyphicon-trash'></i> Hapus</a>";
            ?></td>
        </tr>
        <?php
    }
?>
</tbody>
</table>

<?}?>