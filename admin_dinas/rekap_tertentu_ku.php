<?php
session_start();
if(!isset($_SESSION['username_dinas']) AND !isset($_SESSION['password_dinas'])){
header('Location:login.php');
}else{?>

 
<?
include"../koneksi.php";
include"header_rekap.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
    		<center><h3><span class="glyphicon glyphicon-usd"></span><br>Rekap Admin Financial</h3></center>
		
			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
					
						<li>
							<a href="rekap_berjalan_ku.php">
							Rekap Berjalan </a>
						</li>
						<li class="active">
							<a href="rekap_tertentu_ku.php">Rekap Tertentu </a>
						</li>
						<li>
							<a href="rekap_pertahun_ku.php">Rekap Tahunan </a>
						</li>
					</ul>
					
					</div>
				</div>
			</div>
		</div>
	</div>
<br>
<br>

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
                                                <td>Wilayah</td>
                                                <td>Tahun</td>
                                                <td>Total Pendapatan</td>
                                            </tr>
<?
include"../koneksi.php";
$no=0;
$ambildata=mysql_query("SELECT wilayah,YEAR(bulan) AS tahun,month(bulan) AS bulan,sum(jumlah) as jumlah FROM rekap_keuangan where year(bulan)='$thn1' and konfirmasi='ter-uproav' GROUP BY wilayah");
$cekdata=mysql_num_rows($ambildata);
if($cekdata=='0'){
echo "<font color='red'><center>Maaf Data tidak ada</center></font>";
}
while($datab=mysql_fetch_array($ambildata)){
$no=$no+1;
$bulan=substr($datab[bulan],5,2);
$db1=$datab[jumlah];

?>
                                            <tr>
                                                <td><?echo "$no";?></td>
                                                <td><?echo "$datab[wilayah]";?></td>
                                                <td><?echo "$datab[tahun]";?></td>
                                                <td>Rp.<?echo"" . number_format($db1, 0, ',', '.') . "";?></td>
                                            </tr>
<?
$th=date("Y");
$ambildata3=mysql_query("SELECT SUM(jumlah) as jumlahiah FROM rekap_keuangan where YEAR(bulan)='$thn1' group by YEAR(bulan)='$thn1' ");
$datab3=mysql_fetch_array($ambildata3);
$tahun=substr($datab[bulan],0,4);
 
 $total_npa = $datab3[jumlahiah];
 }?>
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
							Jumlah Total Keseluruhan :Rp. 
							<?
							echo"" . number_format($total_npa, 0, ',', '.') . "";
							?>
							</b></th>
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
                                                <td>Wilayah</td>
                                                <td>Tahun</td>
                                                <td>Total Pendapatan</td>
                                            </tr>
<?
include"../koneksi.php";
$no=0;
$th=date("Y");
$ambildata=mysql_query("SELECT wilayah,YEAR(bulan) AS tahun,month(bulan) AS bulan,sum(jumlah) AS jumlahh FROM rekap_keuangan where year(bulan)='$th' and konfirmasi='ter-uproav' GROUP BY wilayah");
$cekdata=mysql_num_rows($ambildata);
if($cekdata=='0'){
echo "<font color='red'><center>Maaf Data tidak ada</center></font>";
}
while($datab=mysql_fetch_array($ambildata)){
$no=$no+1; 
$db=$datab[jumlahh];
?>
                                            <tr>
                                                <td><?echo "$no";?></td>
                                                <td><?echo "$datab[wilayah]";?></td>
                                                <td><?echo "$datab[tahun]";?></td>
                                                <td>Rp.<?echo"" . number_format($db, 0, ',', '.') . "";?></td>
                                            </tr>
<?
$th=date("Y");
$ambildata2=mysql_query("SELECT SUM(jumlah) as jumlahan FROM rekap_keuangan where year(bulan)='$th' group by year(bulan)='$th'");
$datab2=mysql_fetch_array($ambildata2);
$total_npaa = $datab2[jumlahan];
 }?>
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
							Jumlah Total Keseluruhan :Rp. 
							<?
							echo"" . number_format($total_npaa, 0, ',', '.') . "";
							?>
							</b></th>
					    </tr>
					</thead>
		 </table>
		</div> 
	</center>
<?}}?>