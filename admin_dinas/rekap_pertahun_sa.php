<?php
session_start();
if(!isset($_SESSION['username_dinas']) AND !isset($_SESSION['password_dinas'])){
header('Location:login.php');
}else{?>




 
<?
include"../koneksi.php";
include"header_rekap.php";?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
    		<center><h3><span class="glyphicon glyphicon-calendar"></span><br>Rekap Admin Sartek</h3></center>
    		

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li>
							<a href="rekap_berjalan_sa.php">
							Rekap Bulanan </a>
						</li>
						<li>
							<a href="rekap_tertentu_sa.php">
							Rekap Tertentu </a>
						</li>
						<li class="active">
							<a href="rekap_pertahun_sa.php">
							Rekap Pertahun </a>
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
<br>
<br>
<b>REKAP DATA PERTAHUN</b>
</center>





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
                                                <td>Total Pendapatan</td>
                                            </tr>
<?
include"../koneksi.php";
$no=0;
$th=date("Y");
$ambildata=mysql_query("SELECT YEAR(bulan) AS tahun, sum(jumlah) AS npaw FROM rekap_sartek GROUP BY YEAR(bulan)");
$cekdata=mysql_num_rows($ambildata);
if($cekdata=='0'){
echo "<font color='red'><center>Maaf Data tidak ada</center></font>";
}
while($datab=mysql_fetch_array($ambildata)){
$no=$no+1;
$bulan=substr($datab[bulan],5,2);
$ambildata2=mysql_query("SELECT SUM(jumlah) as npe FROM rekap_sartek GROUP BY YEAR(bulan) ");
$datab2=mysql_fetch_array($ambildata2);

$tahun=substr($datab[bulan],0,4);
 
 $total_npa1 += $datab['npaw'];
 $untuk_numberik=$datab[npaw];

?>
                                            <tr>
                                                <td><?echo "$no";?></td>
                                                <td><?echo "$datab[tahun]";?></td>
                                                <td>Rp.<?echo"" . number_format($untuk_numberik, 0, ',', '.') . "";?></td>
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
							Jumlah Total Keseluruhan :Rp. 
							<?
							echo"" . number_format($total_npa1, 0, ',', '.') . "";
							?>
							</b></th>
							</b></th>
					    </tr>
					</thead>
		 </table>
		</div> 
	</center>
<?}?>