<?php
session_start();
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
						<li>
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
					$tampil3 = "select * from rekap_keuangan where konfirmasi='ter-uproav' order by bulan DESC";
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
							<a href="rekap_tahunan.php">Rekap Tahunan </a>
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
			<script type="text/javascript">
                $(document).ready(function () {
                    $('#datatable').dataTable();
                });
            </script>
							<style>
.ratakanan { text-align : right; }
</style>

<script language="JavaScript">
function formatangka(objek) {
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length;
   j = 0;
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + "." + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   objek.value = c;
}
</script>
        </head>
                                  
<center>								  
<table>
<?php

include"../koneksi.php";
$kode=$_GET["kdunix"];
$jajal="select * from rekap_keuangan where kode='$kode'";
$te=mysql_query($jajal); 
$data=mysql_fetch_array($te); 
	
?>			
		            <form method="post" action="" enctype="multipart/form-data">
                     <tr><td>Nama Perusahaan:</td><td><input type="text" value="<?echo"$data[nama_perusahaan]";?>" size="60" disabled class="form-control"></td></tr>
                     <tr><td>Bulan:</td><td><input type="text" value="<?echo"$data[bulan]";?>" disabled class="form-control"></td></tr>
                     <tr><td>Kode Transaksi:</td><td><input type="text" value="<?echo"$data[kd_transaksi]";?>" size="40" disabled class="form-control"></td></tr>
                     <tr><td>Pembayaran:</td><td><input type="text" value="<?echo"$data[pembayaran]";?>" size="40" disabled class="form-control"></td></tr>
                     <tr><td>Nota:</td><td><img src="../admin_input/images/<?echo"$data[foto]";?>" disabled></td></tr>
                     <tr><td>Jumlah:</td><td><input type="text" name="jumlah" value="<?echo"$data[jumlah]";?>" class="form-control" onkeyup="formatangka(this)" class="ratakanan"></td></tr>
					 <br>
                     <tr><td></td><td><input type="submit" name="but" value="Edit" class="btn btn-primary"></td></tr>
					 <br>
					 <br>
					 <br>
					</form>
<?
if(isset($_POST['but']))
{		
$jml=$_POST['jumlah'];
$angka1= str_replace(".", "", $jml);
            $v="update rekap_keuangan set jumlah='$angka1' where kode='$kode'";
		
            $temu=mysql_query($v);
	        if(!$temu)
			{
				echo"gagal";
			}else
	         {
	         
	          echo"<script>alert('Data Teredit');window.location='ter-aprove.php'</script>";
	         }
}?>
			 
</table>
</center>
<?}?>