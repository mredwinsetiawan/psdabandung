<?php
session_start();
if(!isset($_SESSION['username_sartek']) AND !isset($_SESSION['password_sartek'])){
header('Location:login.php');
}else{?>


 
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
						<li>
							<a href="ter-aprove.php">
							Ter aprove <span class="label label-info"><?echo"$hitung3";?></span></a>
						</li>
						<li class="active">
							<a href="rekap_berjalan.php">
							Rekap Berjalan </a>
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

$tampil = "select *  from rekap_sartek where month(bulan)='$bulan' and year(bulan)='$tahun'and konfirmasi='ter-uproav' order by bulan DESC";
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
                        </tr>
                    </thead>
                <tbody>
<?
include"../koneksi.php";
$nomor=0;
$ambildata=mysql_query("SELECT * FROM rekap_sartek WHERE bulan >= '$thn1-$bln1-$tgl1' AND bulan <= '$thn2-$bln2-$tgl2' and konfirmasi='ter-uproav'");
$cekdata=mysql_num_rows($ambildata);
if($cekdata=='0'){
echo "<font color='red'>Maaf Data Yang anda cari tidak ada</font>";
}
while($datab=mysql_fetch_array($ambildata))
 {

$btn=substr($datab[tombol],0,8);
$name=substr($datab[tombol],8);
 $nomor=$nomor+1;
$bulan=substr($data[bulan],5,2);
$tahun=substr($data[bulan],0,4);
 
           $kmp  = mysql_query("SELECT * FROM data_user where kode='$datab[id]'");
           $kmp_data   = mysql_fetch_array($kmp);
echo "
 <tr>
                <td> $nomor</td>
                <td>$datab[wilayah]</td>
                <td>$datab[nama_perusahaan]</td>
                <td>$datab[pembayaran] </td>
                <td>$datab[kd_transaksi]</td>
                <td>$datab[atas_nama]</td>              
				<td>
                    <a class='thumbnail fancybox' rel='ligthbox' href='../admin_input/images/$datab[foto]'>
                    <img class='img-responsive' alt='tanpa gambar' src='../admin_input/images/$datab[foto]' width='120' height='120'/>
					</a>   
				</td>
                <td>Rp.$datab[jumlah] </td>
                <td>$datab[bulan] </td>
                <td>$kmp_data[sippa]</td>
                <td><font color='blue'><b>$kmp_data[tanggal_awal]</b></font></td>
                <td><font color='red'><b>$kmp_data[tanggal_akhir]</b></font></td>
				";?>
					<form method="post" action="simpan_rekap_berjalan.php" enctype="multipart/form-data">
                     <input type="hidden" name="id" value="<?echo"$kmp_data[kode]";?>">
                     <input type="hidden" name="ide" value="<?echo"$datab[kode]";?>">
                     <input type="hidden" name="kpd" value="<?echo"$kmp_data[korwil]";?>">
                     <input type="hidden" name="judul" value="Konfirmasi Pembayaran">
                     <input type="hidden" name="pesan" value="Selamat <?echo"$data[nama_perusahaan]";?>,,<br> Konfirmasi Pembayaran Anda Berhasil Dengan Nominal Rp.<?echo"$data[jumlah]";?>..Masa Aktif Perpanjangan Anda Mulai Dari <?echo"$kmp_data[tanggal_awal]";?> sampai <?echo"$kmp_data[tanggal_akhir]";?>  dengan SIPPA Baru <?echo"$kmp_data[sippa]";?>    <br><br> <i>Ttd,,Admin Sartek</i> ">
                     <input type="hidden" name="pengirim" value="admin-sartek"></td>
					 <input type="hidden" name="np" value="<?echo"$kmp_data[nama_perusahaan]";?>">
					 <input type="hidden" name="status" value="belum-terbaca">
			       <td><button name="butuk" class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-<?echo"$btn";?>'></i> <?echo"$name";?></button>
                    </form>
				<?echo"
				<td><a class='btn btn-primary btn-sm' href='edit_jumlah_aprove.php?kdunix=".$datab[kode]."' onclick='return confirm(&quot;Yakin akan mengedit data?&quot;)'><i class='glyphicon glyphicon-edit'></i> Edit</a></td>
				<td><a class='btn btn-danger btn-sm' href='hapus-aprove.php?kdunix=".$datab[kode]."' onclick='return confirm(&quot;Jika Anda Menghapus data tersebut maka akan otomatis data menjadi TIDAK LUNAS /user harus konfirmasi lagi?,,Pesan Notifikasi bahwa user gagal melakukan registrasi dan harus melakukan konfirmasi ulang juga akan terkirim.&quot;)'><i class='glyphicon glyphicon-trash'></i> Hapus</a></td>
 </tr>";
 $total_npa1 += $datab[jumlah];
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
							Jumlah Total Keseluruhan :Rp. 
							<?
							echo"" . number_format($total_npa1, 0, ',', '.') . "";
							?>
							</b></th>
					    </tr>
					</thead>
		 </table>
		</div>  
<??>


<?}else{?>
				
 
































 
	 
		<div class="col-md-9">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
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
                        </tr>
                    </thead>
                    <tbody>
					<?
while($data = mysql_fetch_array($sql))
 {
 $nomor=$nomor+1;
$bulan=substr($data[bulan],5,2);
$tahun=substr($data[bulan],0,4);

$btn=substr($data[tombol],0,8);
$name=substr($data[tombol],8);
           $kmp  = mysql_query("SELECT * FROM data_user where kode='$data[id]'");
           $kmp_data   = mysql_fetch_array($kmp);
 
echo "
 <tr>
                <td> $nomor</td>
                <td>$data[wilayah]</td>
                <td>$data[nama_perusahaan]</td>
                <td>$data[pembayaran] </td>
                <td>$data[kd_transaksi]</td>
                <td>$data[atas_nama]</td>              
				<td>
                    <a class='thumbnail fancybox' rel='ligthbox' href='../admin_input/images/$data[foto]'>
                    <img class='img-responsive' alt='tanpa gambar' src='../admin_input/images/$data[foto]' width='120' height='120'/>
					</a>   
				</td>
                <td>Rp.$data[jumlah] </td>
                <td>$data[bulan] </td>
                <td>$kmp_data[sippa]</td>
                <td><font color='blue'><b>$kmp_data[tanggal_awal]</b></font></td>
                <td><font color='red'><b>$kmp_data[tanggal_akhir]</b></font></td>
				";?>
				<form method="post" action="simpan_rekap_berjalan2.php" enctype="multipart/form-data">
                     <input type="hidden" name="kpd" value="<?echo"$data[wilayah]";?>">
                     <input type="hidden" name="ide" value="<?echo"$data[kode]";?>">
                     <input type="hidden" name="id" value="<?echo"$data[id]";?>">
                     <input type="hidden" name="judul" value="Konfirmasi Pembayaran">
                     <input type="hidden" name="pesan" value="Selamat <?echo"$data[nama_perusahaan]";?>,,<br> Konfirmasi Pembayaran Anda Berhasil Dengan Nominal Rp.<?echo"$data[jumlah]";?>..Masa Aktif Perpanjangan Anda Mulai Dari <?echo"$kmp_data[tanggal_awal]";?> sampai <?echo"$kmp_data[tanggal_akhir]";?>  dengan SIPPA Baru <?echo"$kmp_data[sippa]";?>    <br><br> <i>Ttd,,Admin Sartek</i> ">
                     <input type="hidden" name="pengirim" value="admin-sartek"></td>
					 <input type="hidden" name="np" value="<?echo"$kmp_data[nama_perusahaan]";?>">
					 <input type="hidden" name="status" value="belum-terbaca">
			       <td><button name="but" class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-<?echo"$btn";?>'></i> <?echo"$name";?></button>
                    </form>
				<?echo"
				<td><a class='btn btn-primary btn-sm' href='edit_jumlah_aprove.php?kdunix=".$data[kode]."' onclick='return confirm(&quot;Yakin akan mengedit data?&quot;)'><i class='glyphicon glyphicon-edit'></i> Edit</a></td>
				<td><a class='btn btn-danger btn-sm' href='hapus-aprove.php?kdunix=".$data[kode]."' onclick='return confirm(&quot;Jika Anda Menghapus data tersebut maka akan otomatis data menjadi TIDAK LUNAS /user harus konfirmasi lagi?,,Pesan Notifikasi bahwa user gagal melakukan registrasi dan harus melakukan konfirmasi ulang juga akan terkirim.&quot;)'><i class='glyphicon glyphicon-trash'></i> Hapus</a></td>
 </tr>";
 $total_npa2 += $data[jumlah];
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
							Jumlah Total Keseluruhan :Rp. 
							<?
							echo"" . number_format($total_npa2, 0, ',', '.') . "";
							?>
							</b></th>
					    </tr>
					</thead>
		 </table>
		</div> 
<?}}?>
