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
						<li class="active">
							<a href="rekap_berjalan_ku.php">
							Rekap Berjalan </a>
						</li>
						<li>
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

$tampil = "select *  from rekap_keuangan where month(bulan)='$bulan' and year(bulan)='$tahun' and konfirmasi='ter-uproav' order by bulan DESC";
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
<th><em class="glyphicon glyphicon-envelope"></em></th>
<th><em class="glyphicon glyphicon-edit"></em></th>
<th><em class='glyphicon glyphicon-trash'></em></th>
                        </tr>
                    </thead>
                <tbody>
<?
include"../koneksi.php";
$nomor=0;
$ambildata=mysql_query("SELECT * FROM rekap_keuangan WHERE bulan >= '$thn1-$bln1-$tgl1' AND bulan <= '$thn2-$bln2-$tgl2' and konfirmasi='ter-uproav'");
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
				";?>
					<form method="post" action="" enctype="multipart/form-data">
                     <input type="hidden" name="ide" value="<?echo"$datab[kode]";?>">
                     <input type="hidden" name="id" value="<?echo"$datab[id]";?>">
                     <input type="hidden" name="kpd" value="<?echo"$datab[wilayah]";?>">
                     <input type="hidden" name="judul" value="Konfirmasi Pembayaran">
                     <input type="hidden" name="pesan" value="Selamat <?echo"$datab[nama_perusahaan]";?>,,<br> Konfirmasi Pembayaran Anda Berhasil Dengan Nominal Rp.<?echo"$datab[jumlah]";?> Pada Bulan <?echo"$datab[bulan]";?> ,Ayo Segera Berbagi Cara Membayar Gampang Dengan Aplikasi PSDA <br><br> <i>Ttd,,Admin Sartek</i> ">
                     <input type="hidden" name="pengirim" value="admin-keuangan"></td>
					 <input type="hidden" name="np" value="<?echo"$datab[nama_perusahaan]";?>">
					 <input type="hidden" name="status" value="belum-terbaca">
			       <td><button name="butuk" class='btn btn-primary btn-sm' disabled><i class='glyphicon glyphicon-<?echo"$btn";?>'></i> <?echo"$name";?></button>
                    </form>
				<?echo"
				<td><a class='btn btn-primary btn-sm' href='edit-aprove.php?kdunix=".$datab[kode]."' onclick='return confirm(&quot;Yakin akan menghapus data?&quot;)' disabled><i class='glyphicon glyphicon-edit'></i> Edit</a></td>
				<td><a class='btn btn-danger btn-sm' href='hapus-aprove.php?kdunix=".$datab[kode]."' onclick='return confirm(&quot;Jika Anda Menghapus data tersebut maka akan otomatis data menjadi TIDAK LUNAS /user harus konfirmasi lagi?,,Pesan Notifikasi bahwa user gagal melakukan registrasi dan harus melakukan konfirmasi ulang juga akan terkirim.&quot;)' disabled><i class='glyphicon glyphicon-trash'></i> Hapus</a></td>
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

				
<?php
if(isset($_POST['butuk']))
{
include"../koneksi.php";

$pesan=$_POST['pesan'];
$ide=$_POST['ide'];
$id=$_POST['id'];
$np=$_POST['np'];
$kpd=$_POST['kpd'];
$jdl=$_POST['judul'];
$pg=$_POST['pengirim'];
$st=$_POST['status'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);

 		   

			
			$v="update rekap_keuangan set tombol='check   Sudah Terkirim' where kode='$ide'";
		    $tema=mysql_query($v); 
			
			
			$jajal="select * from rekap_keuangan where kode='$ide'";
		    $te=mysql_query($jajal); 
			
			if(!$te)
			{
			
			}else{

            $querya = "INSERT INTO pesan_notifikasi(kode,id,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'".$id."','".$np."','".$kpd."','".$jdl."','".$pesan."','".$nama_file."','".$tgl."','".$pg."','".$st."')";
            $sqla = mysql_query($querya);	
			
            echo"<script>alert('Pesan Notifikasi Berhasil Dikirim');window.location='rekap_berjalan_ku.php'</script>";
			}
}			
	
?>

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
				";?>
		         <form method="post" action="" enctype="multipart/form-data">
                     <input type="hidden" name="kpd" value="<?echo"$data[wilayah]";?>">
                     <input type="hidden" name="ide" value="<?echo"$data[kode]";?>">
                     <input type="hidden" name="id" value="<?echo"$data[id]";?>">
                     <input type="hidden" name="judul" value="Konfirmasi Pembayaran">
                     <input type="hidden" name="pesan" value="Selamat <?echo"$data[nama_perusahaan]";?>,,<br> Konfirmasi Pembayaran Anda Berhasil Dengan Nominal Rp.<?echo"$data[jumlah]";?> Pada Bulan <?echo"$data[bulan]";?> ,Ayo Segera Berbagi Cara Membayar Gampang Dengan Aplikasi PSDA <br><br> <i>Ttd,,Admin Sartek</i> ">
                     <input type="hidden" name="pengirim" value="admin-keuangan"></td>
					 <input type="hidden" name="np" value="<?echo"$data[nama_perusahaan]";?>">
					 <input type="hidden" name="status" value="belum-terbaca">
			       <td><button name="but" class='btn btn-primary btn-sm' disabled><i class='glyphicon glyphicon-<?echo"$btn";?>'></i> <?echo"$name";?></button>
                    </form>
				<?echo"
				<td><a class='btn btn-primary btn-sm' href='edit-aprove.php?kdunix=".$data[kode]."' onclick='return confirm(&quot;Yakin akan mengedit data?&quot;)' disabled><i class='glyphicon glyphicon-edit'></i> Edit</a></td>
				<td><a class='btn btn-danger btn-sm' href='hapus-aprove.php?kdunix=".$data[kode]."' onclick='return confirm(&quot;Jika Anda Menghapus data tersebut maka akan otomatis data menjadi TIDAK LUNAS /user harus konfirmasi lagi?,,Pesan Notifikasi bahwa user gagal melakukan registrasi dan harus melakukan konfirmasi ulang juga akan terkirim.&quot;)' disabled><i class='glyphicon glyphicon-trash'></i> Hapus</a></td>
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
								 
<?php
 
if(isset($_POST['but']))
{
include"../koneksi.php";
$pesan=$_POST['pesan'];
$ide=$_POST['ide'];
$id=$_POST['id'];
$np=$_POST['np'];
$kpd=$_POST['kpd'];
$jdl=$_POST['judul'];
$pg=$_POST['pengirim'];
$st=$_POST['status'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);

 		   

			
			$v="update rekap_keuangan set tombol='check   Sudah Terkirim' where kode='$ide'";
		    $tema=mysql_query($v); 
			
			
			$jajal="select * from rekap_keuangan where kode='$ide'";
		    $te=mysql_query($jajal); 
			
			if(!$te)
			{
			
			}else{

            $querya = "INSERT INTO pesan_notifikasi(kode,id,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'".$id."','".$np."','".$kpd."','".$jdl."','".$pesan."','".$nama_file."','".$tgl."','".$pg."','".$st."')";
            $sqla = mysql_query($querya);	
			
            echo"<script>alert('Pesan Notifikasi Berhasil Dikirim');window.location='rekap_berjalan_ku.php'</script>";
			}
}			
	
?>
<?}}?>
