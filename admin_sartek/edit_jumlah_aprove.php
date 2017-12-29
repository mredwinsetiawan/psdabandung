<?php
session_start();
if(!isset($_SESSION['username_sartek']) AND !isset($_SESSION['password_sartek'])){
header('Location:login.php');
}else{
?>


<?php
include"header.php";
$kd =$_GET["kdunix"];

?>













<head><title>PSDA</title>
<link rel="icon" href="css/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<style>
body {background: #fffff;}
.user-details {position: relative; padding: 0;}
.user-details .user-image {position: relative;  z-index: 1; width: 100%; text-align: center;}
 .user-image img { clear: both; margin: auto; position: relative;}

.user-details .user-info-block {width: 100%; position: absolute; top: 55px; background: rgb(255, 255, 255); z-index: 0; padding-top: 35px;}
 .user-info-block .user-heading {width: 100%; text-align: center; margin: 10px 0 0;}
 .user-info-block .navigation {float: left; width: 100%; margin: 0; padding: 0; list-style: none; border-bottom: 1px solid #428BCA; border-top: 1px solid #428BCA;}
  .navigation li {float: left; margin: 0; padding: 0;}
   .navigation li a {padding: 20px 30px; float: left;}
   .navigation li.active a {background: #428BCA; color: #fff;}
 .user-info-block .user-body {float: left; padding: 5%; width: 90%;}
  .user-body .tab-content > div {float: left; width: 100%;}
  .user-body .tab-content h4 {width: 100%; margin: 10px 0; color: #333;}
<!-- 
 * parallax_login.html
 * @Author original @msurguy (tw) -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Tested on FF && CH
 * @Reworked by @kaptenn_com (tw)
 * @package PARALLAX LOGIN.
-->
.notif-extended {
    border: medium none !important;
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.176) !important;
    max-width: 300px !important;
    min-width: 160px !important;
    padding: 0;
    top: 42px;
    width: 235px !important;
}


.notify-arrow-green {
    border-bottom-color: #68dff0 !important;
    border-left-color: rgba(0, 0, 0, 0);
    border-right-color: rgba(0, 0, 0, 0);
    border-top-color: #68dff0 !important;
}
.notify-arrow {
    border-style: solid;
    border-width: 0 9px 9px;
    height: 0;
    left: 7px;
    margin-top: 10px;
    opacity: 1;
    position: absolute;
    top: -18px;
    transition: all 0.25s ease 0s;
    width: 0;
    z-index: 10;
}

.notify-count-green {
    background-color: #68dff0;
    color: #ffffff;
    padding: 5px;
}
.notif-subject {
    display: block;
}
.notif-subject-from {
    font-size: 12px;
    font-weight: 600;
}
.notif-subject-time {
    font-size: 11px;
    font-style: italic;
    font-weight: bold;
    position: absolute;
    right: 5px;
}
.notif-subject-message {
    display: block !important;
    font-size: 11px;
    text-align: left;
}

.notif-message {
    padding-left: 10px;
    padding-bottom: 10px;
    padding-top: 5px;
    border-bottom: 1px solid #f1f1f1;
}
.padding-right-10 {
    padding-right: 10px;
}
.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}

</style>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#datatable').dataTable();
                });
            </script>
				<style>
.ratakanan { text-align : right; }
</style>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
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
<?
include"../koneksi.php";
?>


<div class="container">
      <div class="row">
	  <center><h4><b>Edit Data</b></h4></center> 
	  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Edit Data</h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>

<?
$ku  = mysql_query("SELECT * FROM rekap_sartek WHERE kode='$kd'");
$kmp   = mysql_fetch_array($ku);

$kmpa  = mysql_query("SELECT * FROM data_user WHERE kode='$kmp[id]'");
$kmp_data   = mysql_fetch_array($kmpa);

if(isset($_POST['tb']))
{
include"../koneksi.php";
$sippa=$_POST['sippa'];
$awal=$_POST['tgl_awal'];
$akhir=$_POST['tgl_akhir']; 
$np=$_POST['np'];
$bl=$_POST['bl'];
$pm=$_POST['pm'];
$kt=$_POST['kt'];
$an=$_POST['an'];
$jml=$_POST['jml'];
$angka1= str_replace(".", "", $jml);
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);
 		   

            $va="update data_user set tanggal_awal='$awal',tanggal_akhir='$akhir',sippa='$sippa' where  kode='$kmp_data[kode]'";
		    $temu2=mysql_query($va);
			
			$vaq="update rekap_sartek set pembayaran='$pm',kd_transaksi='$kt',bulan='$bl',atas_nama='$an',jumlah='$angka1' where  kode='$kmp[kode]'";
		    $temuk=mysql_query($vaq);
		  
		  if(!$temuk)
			{
				echo"gagal";
			}else
	         {
			 
            echo"<script>alert('Data Ter-edit');window.location='ter-aprove.php'</script>";
	         
	         }
}
?>


                  
                    <form method="post" action="" enctype="multipart/form-data">
                     <tr>
					 <td><b><h5>Nama Perusahaan :</h5></b>
                     <input type="text" name="np" class='form-control' autocomplete="off" value="<?echo"$kmp[nama_perusahaan]";?>" readonly></td>
                     </tr>
					 <tr>
					 <td>Tanggal Bayar :
                     <input type="text" name="bl" class='form-control' autocomplete="off" value="<?echo"$kmp[bulan]";?>"></td>
                     </tr>
					 <tr>
					 <td>Pembayaran Melalui :
                     <input type="text" name="pm" class='form-control' autocomplete="off" value="<?echo"$kmp[pembayaran]";?>"></td>
                     </tr>
					 <tr>
					 <td>Kode Transaksi :
                     <input type="text" name="kt" class='form-control' autocomplete="off" value="<?echo"$kmp[kd_transaksi]";?>"></td>
                     </tr>
					 <tr>
					 <td>Atas Nama :
                     <input type="text" name="an" class='form-control' autocomplete="off" value="<?echo"$kmp[atas_nama]";?>"></td>
                     </tr>
					 <tr>
					 <td>Foto :
                     <img src="../admin_input/images/<?echo"$kmp[foto]";?>" width="200" height="200"></td>
                     </tr>
					 <tr>
					 <td>Jumlah :
                     <input type="text" name="jml" class='form-control' autocomplete="off" onkeyup="formatangka(this)" class="ratakanan" value="<?echo"$kmp[jumlah]";?>"></td>
                     </tr>
					 <tr>
					 <td>SIPPA :
                     <input type="text" name="sippa" class='form-control' autocomplete="off" value="<?echo"$kmp_data[sippa]";?>"></td>
                     </tr>
					 <tr>
					 <td>Tanggal Awal :
                     <input type="text" name="tgl_awal" class='form-control' autocomplete="off" value="<?echo"$kmp_data[tanggal_awal]";?>"></td>
                     </tr>
					 <tr>
					 <td>Tanggal Akhir :
                     <input type="text" name="tgl_akhir" class='form-control' autocomplete="off" value="<?echo"$kmp_data[tanggal_akhir]";?>"></td>
                     </tr>
                     <tr>
					 <td><button class="btn btn-primary" name="tb">Kirim</button></td>
                     </tr>
					</form>
					 
					 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a href="list_pesan.php" title="kembali" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
        </section><!-- Close comments section-->



<?}?>