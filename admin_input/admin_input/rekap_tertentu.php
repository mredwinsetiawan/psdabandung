<?php
session_start();
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php');
}else{
include"header.php";
$wilayah_admin=$_SESSION['wilayah_admin_1'];?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
    		<center><h3><span class="glyphicon glyphicon-file"></span><br>Admin Input <?echo"$wilayah_admin";?></h3></center>

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li>
							<a href="rekap_berjalan.php">
							Rekap Bulanan </a>
						</li>
						<li class="active">
							<a href="rekap_tertentu.php">
							Rekap Tertentu </a>
						</li>
						<li>
							<a href="rekap_tahunan.php">
							Rekap Pertahun </a>
						</li>
					</ul>
					
					</div>
				</div>
			</div>
		</div>
	</div>
<center>
<div role="main" class="container theme-showcase">
  <p>
	</p><h3><span class="glyphicon glyphicon-print"></span></h3>
<button onclick='window.print()' class='btn btn-danger'><span class="glyphicon glyphicon-print"></span> Cetak Satu Page</button>
</center>
<br>

<center>
<strong>REKAP DATA TAHUN INI</strong><br/>
<form id="form1" name="form1" method="post" action="?proses=cetak">
Tampil Data :
<select name="thn1" id="thn1">
<? for($i=2010;$i<=date("Y");$i++){ ?>
<option><?=$i?></option>
<? } ?>
</select>
<input type="submit" name="Submit" value="Tampilkan" />
</form>

<?
$proses=$_GET['proses'];
$thn1=$_POST['thn1'];
if($proses=='cetak'){
?> 
        
<div class="container">
    <div class="row">
        <div class="col-md-12">
<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							<form>
                            <table class="table table-striped" style="width:100%">
                                <tr>
                                        <table align="center" class="table table-bordered">


                                     <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>No</td>
                                                <td>Tahun</td>
                                                <td>Bulan</td>
                                                <td>Total Volume</td>
                                                <td>Total Npa</td>
                                            </tr>
<?
include"../../koneksi.php";
$no=0;
$th=date("Y");
$ambildata=mysql_query("SELECT YEAR(bulan) AS tahun,month(bulan) AS bulan, sum(npa) AS npaw ,sum(volume) as vol FROM rekap_admin_input where korwil='".$wilayah_admin."' and year(bulan)='$thn1' GROUP BY month(bulan)");
$cekdata=mysql_num_rows($ambildata);
if($cekdata=='0'){
echo "<font color='red'><center>Maaf Data tidak ada</center></font>";
}
while($datab=mysql_fetch_array($ambildata)){
$no=$no+1;
$bulan=substr($datab[bulan],5,2);
$ambildata2=mysql_query("SELECT SUM(npa) as npe FROM rekap_admin_input GROUP BY YEAR(bulan) ");
$datab2=mysql_fetch_array($ambildata2);

$tahun=substr($datab[bulan],0,4);
 
 $total_npa1 += $datab['npaw'];
 $total_volume1 += $datab['vol'];
 

?>
                                            <tr>
                                                <td><?echo "$no";?></td>
                                                <td><?echo "$datab[tahun]";?></td>
                                                <td><?echo "$datab[bulan]";?></td>
                                                <td><?echo "$datab[vol]";?> cm3</td>
                                                <td>Rp.<?echo "$datab[npaw]";?></td>
                                            </tr>
<?}?>
                                        </table>
                                    </td>
                                </tr>
                            </table>
						</div>
						</div>
						</div>
						</div>
						
						
						
						
						

<div class="col-md-9">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
						    <th><b>
							Jumlah Total Keseluruhan Npa :Rp. 
							<?
							echo"" . number_format($total_npa1, 0, ',', '.') . "";
							?>
							</b></th>
						    <th><b>
							Jumlah Total Keseluruhan Volume :
							<?
							echo"" . number_format($total_volume1, 0, ',', '.') . "";
							?> Cm 3
							</b></th>
					    </tr>
					</thead>
		 </table>
		</div> 
	</center>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<?}else{?>
                    









<div class="container">
    <div class="row">
        <div class="col-md-12">
<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							<form>
                            <table class="table table-striped" style="width:100%">
                                <tr>
                                        <table align="center" class="table table-bordered">


                                     <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>No</td>
                                                <td>Tahun</td>
                                                <td>Bulan</td>
                                                <td>Total Volume</td>
                                                <td>Total Npa</td>
                                            </tr>
<?
include"../../koneksi.php";
$no=0;
$th=date("Y");
$ambildata=mysql_query("SELECT YEAR(bulan) AS tahun,month(bulan) AS bulan, sum(npa) AS npaw ,sum(volume) as vol FROM rekap_admin_input where korwil='".$wilayah_admin."' GROUP BY MONTH(bulan)");
$cekdata=mysql_num_rows($ambildata);
if($cekdata=='0'){
echo "<font color='red'><center>Maaf Data tidak ada</center></font>";
}
while($datab=mysql_fetch_array($ambildata)){
$no=$no+1;
$bulan=substr($datab[bulan],5,2);
$ambildata2=mysql_query("SELECT SUM(npa) as npe FROM rekap_admin_input GROUP BY YEAR(bulan) ");
$datab2=mysql_fetch_array($ambildata2);

$tahun=substr($datab[bulan],0,4);
 
 $total_npa1 += $datab['npaw'];
 $total_volume1 += $datab['vol'];
 

?>
                                            <tr>
                                                <td><?echo "$no";?></td>
                                                <td><?echo "$datab[tahun]";?></td>
                                                <td><?echo "$datab[bulan]";?></td>
                                                <td><?echo "$datab[vol]";?> cm3</td>
                                                <td>Rp.<?echo "$datab[npaw]";?></td>
                                            </tr>
<?}?>
                                        </table>
                                    </td>
                                </tr>
                            </table>
						</div>
						</div>
						</div>
						</div>
						
						
						
						
						

<div class="col-md-9">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
						    <th><b>
							Jumlah Total Keseluruhan Npa :Rp. 
							<?
							echo"" . number_format($total_npa1, 0, ',', '.') . "";
							?>
							</b></th>
						    <th><b>
							Jumlah Total Keseluruhan Volume :
							<?
							echo"" . number_format($total_volume1, 0, ',', '.') . "";
							?> Cm 3
							</b></th>
					    </tr>
					</thead>
		 </table>
		</div> 
	</center>
<?}}?>