<?php
session_start();
if(!isset($_SESSION['username_dinas']) AND !isset($_SESSION['password_dinas'])){
header('Location:login.php');
}else{
include"header_rekap.php";

include"../koneksi.php";
$prom=mysql_query("SELECT * from wilayah order by wilayah ASC");
$promise=mysql_fetch_array($prom);
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
    		<center><h3><span class="glyphicon glyphicon-file"></span><br>Rekap Admin  <?echo"$promise[wilayah]";?></h3></center>

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="rekap_berjalan_ai.php">
							Rekap Bulanan </a>
						</li>
						<li>
							<a href="rekap_tertentu_ai.php">
							Rekap Tertentu </a>
						</li>
						<li>
							<a href="rekap_tahunan_ai.php">
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



<script>
    $(function() {    
        $('#input-search').on('keyup', function() {
          var rex = new RegExp($(this).val(), 'i');
            $('.searchable-container .items').hide();
            $('.searchable-container .items').filter(function() {
                return rex.test($(this).text());
            }).show();
        });
    });
</script>
<style>
.label,.glyphicon { margin-right:5px; }
</style>

	


<?
include"../koneksi.php";
$nomor=0; 
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
$tahun=substr($tglsekarang,0,4);
$bulan=substr($tglsekarang,5,2);

$tampil = "select *  from rekap_admin_input where korwil='".$promise[wilayah]."' and npa >'0' and volume >'0' and month(bulan)='$bulan' and year(bulan)='$tahun' order by bulan DESC";
$sql = mysql_query($tampil);
$num =mysql_num_rows($sql);

?>
<center>
<div role="main" class="container theme-showcase">
  <p>
	</p><h3><span class="glyphicon glyphicon-print"></span></h3>
<button onclick='window.print()' class='btn btn-danger'><span class="glyphicon glyphicon-print"></span> Cetak Satu Page</button>
</center>
<div class="container">
	<div class="row">
        <div class="col-md-3">
            <form action="#" method="get">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
        </div>
        </div>

<center>
<strong>REKAP DATA BULAN INI</strong><br/>
<form id="form1" name="form1" method="post" action="?proses=cetak">
Tampil Data :
<select name="tgl1" id="tgl1">
<option> 01 </option>
<option> 02 </option>
<option> 03 </option>
<option> 04 </option>
<option> 05 </option>
<option> 06 </option>
<option> 07 </option>
<option> 08 </option>
<option> 09 </option>
<option> 10 </option>
<option> 11 </option>
<option> 12 </option>
<option> 13 </option>
<option> 14 </option>
<option> 15 </option>
<option> 16 </option>
<option> 17 </option>
<option> 18 </option>
<option> 19 </option>
<option> 20 </option>
<option> 21 </option>
<option> 22 </option>
<option> 23 </option>
<option> 24 </option>
<option> 25 </option>
<option> 26 </option>
<option> 27 </option>
<option> 28 </option>
<option> 29 </option>
<option> 30 </option>
<option> 31 </option>

</select>
<select name="bln1" id="bln1">
<option value="01" > Januari </option>
<option value="02" > Februari </option>
<option value="03" > Maret </option>
<option value="04" > April </option>
<option value="05" > Mei </option>
<option value="06" > Juni </option>
<option value="07" > Juli </option>
<option value="08" > Agustus </option>
<option value="09" > September </option>
<option value="10" > Oktober </option>
<option value="11" > Nopember </option>
<option value="12" > Desember </option>

</select>
<select name="thn1" id="thn1">
<? for($i=2010;$i<=date("Y");$i++){ ?>
<option><?=$i?></option>
<? } ?>
</select>
S.d
<select name="tgl2" id="tgl2">
<option> 01 </option>
<option> 02 </option>
<option> 03 </option>
<option> 04 </option>
<option> 05 </option>
<option> 06 </option>
<option> 07 </option>
<option> 08 </option>
<option> 09 </option>
<option> 10 </option>
<option> 11 </option>
<option> 12 </option>
<option> 13 </option>
<option> 14 </option>
<option> 15 </option>
<option> 16 </option>
<option> 17 </option>
<option> 18 </option>
<option> 19 </option>
<option> 20 </option>
<option> 21 </option>
<option> 22 </option>
<option> 23 </option>
<option> 24 </option>
<option> 25 </option>
<option> 26 </option>
<option> 27 </option>
<option> 28 </option>
<option> 29 </option>
<option> 30 </option>
<option> 31 </option>
</select>
<select name="bln2" id="select2">
<option value="01" > Januari </option>
<option value="02" > Februari </option>
<option value="03" > Maret </option>
<option value="04" > April </option>
<option value="05" > Mei </option>
<option value="06" > Juni </option>
<option value="07" > Juli </option>
<option value="08" > Agustus </option>
<option value="09" > September </option>
<option value="10" > Oktober </option>
<option value="11" > Nopember </option>
<option value="12" > Desember </option>
</select>
<select name="thn2" id="select3">
<? for($i=2010;$i<=date("Y");$i++){ ?>
<option>
<?=$i?>
</option>
<? } ?>
</select>
<input type="submit" name="Submit" value="Tampilkan" />
</form>

<?
$proses=$_GET['proses'];
$tgl1=$_POST['tgl1'];
$bln1=$_POST['bln1'];
$thn1=$_POST['thn1'];
$tgl2=$_POST['tgl2'];
$bln2=$_POST['bln2'];
$thn2=$_POST['thn2'];
if($proses=='cetak'){
?> 
        
	  </div>
	

		<div class="col-md-9">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
						    <th><b>No</b></th>
                            <th><em class="glyphicon glyphicon-trash"></em></th>
                            <th><em class="glyphicon glyphicon-pencil"></em></th>
                            <th>Bulan</th>
                            <th>ID</th>
                            <th>Wilayah</th>
                            <th>Kecamatan</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Sumber Air</th>
                            <th>Lokasi</th>
                            <th>Jenis Usaha</th>
                            <th>Kelompok</th>
                            <th>JSA</th>
                            <th>KSA</th>
                            <th>LSA</th>
                            <th>KLK</th>
                            <th>FKPA</th>
                            <th>HBA</th>
                            <th>HDA</th>
                            <th>VOLUME</th>
                            <th>NPA</th>
                            <th>Keterangan</th>
                            <th>No Handphone</th>
                            <th>Email</th>
                            <th>Foto Profil</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Gallery1</th>
                            <th>Gallery2</th>
                            <th>Gallery3</th>
                            <th>Status</th>
                            <th><em class="glyphicon glyphicon-pencil"></em></th>
                            <th><em class='glyphicon glyphicon-trash'></em></th>
                        </tr>
                    </thead>
                <tbody>
<?
include"../koneksi.php";
$no=0;
$ambildata=mysql_query("SELECT * FROM rekap_admin_input WHERE korwil='".$promise[wilayah]."' and bulan >= '$thn1-$bln1-$tgl1' AND bulan <= '$thn2-$bln2-$tgl2' ");
$cekdata=mysql_num_rows($ambildata);
if($cekdata=='0'){
echo "<font color='red'>Maaf Data Yang anda cari tidak ada</font>";
}
while($datab=mysql_fetch_array($ambildata)){
$bulan=substr($datab[bulan],5,2);
$tahun=substr($datab[bulan],0,4);
$no=$no+1;
echo "
 <tr>
 <td><b>".$no."</b></td>
 <td>
 <a href='hapus_sudah_ter-edit.php?kdunix=".$datab[kode]."' class='btn btn-danger'><em class='glyphicon glyphicon-trash'></em></a>
 </td>
 <td>
 <a href='edit_rekap_admin_input.php?kdunix=".$datab[kode]."' class='btn btn-default'><em class='glyphicon glyphicon-pencil'></em></a>
 </td>
 <td><font color='red'><b>".$bulan."-".$tahun."</b></font></td>
 <td>".$datab[id]."</td>
 <td>".$datab[wilayah]."</td>
 <td>".$datab[kecamatan]."</td>
 <td>".$datab[nama_perusahaan]."</td>
 <td>".$datab[alamat]."</td>
 <td>".$datab[sumber_air]."</td>
 <td>".$datab[lokasi]."</td>
 <td>".$datab[jenis_usaha]."</td>
 <td>".$datab[kelompok]."</td>
 <td>".$datab[jsa]."</td>
 <td>".$datab[ksa]."</td>
 <td>".$datab[lsa]."</td>
 <td>".$datab[klk]."</td>
 <td>".$datab[fkpa]."</td>
 <td>".$datab[hba]."</td>
 <td>".$datab[hda]."</td>
 <td><font color='red'><b>".$datab[volume]." cm3</b></font></td>
 <td><font color='red'><b>Rp.".$datab[npa]."</b></font></td>
 <td>".$datab[keterangan]."</td>
  <td>".$datab[no_hp]."</td>
  <td>".$datab[email]."</td>
 <td><img src='images/".$datab[foto_profil]."' class='img-circle' width='50' height='50'></td>
 <td>".$datab[username]."</td>
 <td>".$datab[password]."</td>
 <td><img src='images/".$datab[gallery1]."' width='100' height='100'></td>
 <td><img src='images/".$datab[gallery2]."' width='100' height='100'></td>
 <td><img src='images/".$datab[gallery3]."' width='100' height='100'></td>
 <td><font color='red'><b><i>".$datab[status]."</i></b></font></td> 
 <td>
 <a href='edit_rekap_admin_input.php?kdunix=".$datab[kode]."' class='btn btn-default'><em class='glyphicon glyphicon-pencil'></em></a>
 </td><td>
 <a href='hapus_sudah_ter-edit.php?kdunix=".$datab[kode]."' class='btn btn-danger'><em class='glyphicon glyphicon-trash'></em></a>
 </td>
 </tr>";
 $total_npa1 += $datab['npa'];
 $total_volume1 += $datab['volume'];
 }
?>
                    </tbody>
					</table>
					</center>
	 </div>
<div class="col-md-9">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
						    <th><b>
							Jumlah Npa :Rp. 
							<?
							echo"" . number_format($total_npa1, 0, ',', '.') . "";
							?>
							</b></th>
						    <th><b>
							Jumlah Volume :
							<?
							echo"" . number_format($total_volume1, 0, ',', '.') . "";
							?> Cm 3
							</b></th>
					    </tr>
					</thead>
		 </table>
		</div>  
<?}else{?>
				
   		  
	 
		<div class="col-md-9">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
						    <th><b>No</b></th>
                            <th><em class="glyphicon glyphicon-trash"></em></th>
                            <th><em class="glyphicon glyphicon-pencil"></em></th>
                            <th>Bulan</th>
                            <th>ID</th>
                            <th>Wilayah</th>
                            <th>Kecamatan</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Sumber Air</th>
                            <th>Lokasi</th>
                            <th>Jenis Usaha</th>
                            <th>Kelompok</th>
                            <th>JSA</th>
                            <th>KSA</th>
                            <th>LSA</th>
                            <th>KLK</th>
                            <th>FKPA</th>
                            <th>HBA</th>
                            <th>HDA</th>
                            <th>VOLUME</th>
                            <th>NPA</th>
                            <th>Keterangan</th>
                            <th>No Handphone</th>
                            <th>Email</th>
                            <th>Foto Profil</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Gallery1</th>
                            <th>Gallery2</th>
                            <th>Gallery3</th>
                            <th>Status</th>
                            <th><em class="glyphicon glyphicon-pencil"></em></th>
                            <th><em class='glyphicon glyphicon-trash'></em></th>
                        </tr>
                    </thead>
                    <tbody>
					<?
while($data = mysql_fetch_array($sql))
 {
 $nomor=$nomor+1;
$bulan=substr($data[bulan],5,2);
$tahun=substr($data[bulan],0,4);
echo "
 <tr>
 <td><b>".$nomor."</b></td>
 <td>
 <a href='hapus_sudah_ter-edit.php?kdunix=".$data[kode]."' class='btn btn-danger'><em class='glyphicon glyphicon-trash'></em></a>
 </td>
 <td>
 <a href='edit_rekap_admin_input.php?kdunix=".$data[kode]."' class='btn btn-default'><em class='glyphicon glyphicon-pencil'></em></a>
 </td>
 <td><font color='red'><b>".$bulan."-".$tahun."</b></font></td>
 <td>".$data[id]."</td>
 <td>".$data[wilayah]."</td>
 <td>".$data[kecamatan]."</td>
 <td>".$data[nama_perusahaan]."</td>
 <td>".$data[alamat]."</td>
 <td>".$data[sumber_air]."</td>
 <td>".$data[lokasi]."</td>
 <td>".$data[jenis_usaha]."</td>
 <td>".$data[kelompok]."</td>
 <td>".$data[jsa]."</td>
 <td>".$data[ksa]."</td>
 <td>".$data[lsa]."</td>
 <td>".$data[klk]."</td>
 <td>".$data[fkpa]."</td>
 <td>".$data[hba]."</td>
 <td>".$data[hda]."</td>
 <td><font color='red'><b>".$data[volume]." cm3</b></font></td>
 <td><font color='red'><b>Rp.".$data[npa]."</b></font></td>
 <td>".$data[keterangan]."</td>
  <td>".$data[no_hp]."</td>
  <td>".$data[email]."</td>
 <td><img src='images/".$data[foto_profil]."' class='img-circle' width='50' height='50'></td>
 <td>".$data[username]."</td>
 <td>".$data[password]."</td>
 <td><img src='images/".$data[gallery1]."' width='100' height='100'></td>
 <td><img src='images/".$data[gallery2]."' width='100' height='100'></td>
 <td><img src='images/".$data[gallery3]."' width='100' height='100'></td>
 <td><font color='red'><b><i>".$data[status]."</i></b></font></td> 
 <td>
 <a href='edit_rekap_admin_input.php?kdunix=".$data[kode]."' class='btn btn-default'><em class='glyphicon glyphicon-pencil'></em></a>
 </td><td>
 <a href='hapus_sudah_ter-edit.php?kdunix=".$data[kode]."' class='btn btn-danger'><em class='glyphicon glyphicon-trash'></em></a>
 </td>
 </tr>";
 $total_npa2 += $data[npa];
 $total_volume2 += $data[volume];
 }
?>
                    </tbody>
                </table>   
     
	 
		</div>
<div class="col-md-9">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
						    <th><b>
							Jumlah Npa :Rp. 
							<?
							echo"" . number_format($total_npa2, 0, ',', '.') . "";
							?>
							</b></th>
						    <th><b>
							Jumlah Volume :
							<?
							echo"" . number_format($total_volume2, 0, ',', '.') . "";
							?> Cm 3
							</b></th>
					    </tr>
					</thead>
		 </table>
		</div> 
<?}}?>
