<?php
session_start();
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php'); 
}else{ 
include"header.php";
$wilayah_admin=$_SESSION['wilayah_admin_1'];
?>

<?
$kd =$_POST['id'];
$tanggal =$_POST['tanggal'];
$bulan_bulan =$_POST['bulan'];
$tahun_tahun =$_POST['tahun'];
include"../../koneksi.php";


$t = "select * from rekap_admin_input where id='$kd' and month(bulan)='$bulan_bulan' and year(bulan)='$tahun_tahun'";
$s = mysql_query($t);
$data = mysql_fetch_array($s);
if ($data > 0)
{
echo"<script>alert('Data Di Bulan Terpilih Sudah Ada');window.location='tambah_rekap_manual.php'</script>";
}else
{
?>

<center>
<div class="container">
    <div class="row">
        <div class="col-md-12">
		<center><h3><span class="fa fa-home"></h3>
    		    		<h3></span>Admin Input <?echo"$wilayah_admin";?></center></h3>

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li>
							<a href="tambah_rekap_manual.php">
							<span class="glyphicon glyphicon-flag"></span> Laporan Admin Lapangan </a>
						</li>
						<li>
							<a href="sudah_ter-edit.php">
						<span class="glyphicon glyphicon-ok"></span>	Rekap Data Bulan Ini </a>
						</li>
						<li class="active">
							<a href="tambah_rekap_manual.php">
						<span class="glyphicon glyphicon-plus"></span>	Tambah Rekap Manual </a>
						</li>
					</ul>
</div>
</div>
</div>
</div>
</div>


<?

$kd =$_POST['id'];
include"../../koneksi.php";

$t = "select * from data_user where kode='$kd'";
$s = mysql_query($t);
$data= mysql_fetch_array($s);

$tglcocok1=substr($dataapl[tgl_kirim],0,4);
$tglcocok2=substr($dataapl[tgl_kirim],5,2);
$tglcocok3=substr($dataapl[tgl_kirim],8,2);

$tgl_awal1=substr($data[tanggal_awal],0,4);
$tgl_awal2=substr($data[tanggal_awal],5,2);
$tgl_awal3=substr($data[tanggal_awal],8,2);

$tgl_akhir1=substr($data[tanggal_akhir],0,4);
$tgl_akhir2=substr($data[tanggal_akhir],5,2);
$tgl_akhir3=substr($data[tanggal_akhir],8,2);

?>













<html>
<head>

</head>



<center>
<div class="container">
	<div class="row">
	     <br>
<center>
    <h2><center>Laporan Admin Lapangan</center></h2>
	  <h3><span class="glyphicon glyphicon-print"></span></h3>
<button onclick='window.print()' class='btn btn-danger'>
<span class="glyphicon glyphicon-print"></span> Cetak Satu Page</button>
</center>
<br>
<body>
<!-- Membuat form untuk mengupload gambar -->
<center>
<form method="post" action="simpan_tambah_manual.php" enctype="multipart/form-data">
<table>
<br> 
<h3><em class='glyphicon glyphicon-edit'></em><br>Edit NPA dan Volume Bulan Manual <?echo"".$tglcocok2."";?> </h3>
<br>
<tr><td></td><td><input type="hidden" name="korwil" value='<?echo"$wilayah_admin";?>'></td></tr>
<tr><td></td><td><input type="hidden" name="status" value='belum-lunas'></td></tr>
<tr><td></td><td><input type="hidden" name="hapus" value='belum-terhapus'></td></tr>
<tr><td></td><td><input type="hidden" name="ide" value='<?echo"$kd";?>'></td></tr>
<tr><td></td><td><input type="hidden" name="code" value='<?echo"$data[kode]";?>'></td></tr>
<tr><td></td><td><input type="hidden" name="tgl_awal" value='<?echo"$data[tanggal_awal]";?>'></td></tr>
<tr><td></td><td><input type="hidden" name="tgl_akhir" value='<?echo"$data[tanggal_akhir]";?>'></td></tr>
<tr><td><font color="red">Nama Perusahaan</font></td><td><input type="text" name="nama_perusahaan" class='form-control' size='40' value="<?echo"$data[nama_perusahaan]";?>" readonly></td></tr>
<tr><td></td><td><input type="hidden" name="aktivasi" value='belum-aktivasi'></td></tr>

<tr><td><font color="red">NPA Bulan</font></td><td>
                                                         <select name="tanggal_manual1">
                                                                 <option value="<?echo"$_POST[tanggal]";?>"><?echo"$_POST[tanggal]";?></option>
                                                                 <option value="01">01</option>
                                                                 <option value="02">02</option>
                                                                 <option value="03">03</option>
                                                                 <option value="04">04</option>
                                                                 <option value="05">05</option>
                                                                 <option value="06">06</option>
                                                                 <option value="07">07</option>
                                                                 <option value="08">08</option>
                                                                 <option value="09">09</option>
                                                                 <option value="10">10</option>
                                                                 <option value="11">11</option>
                                                                 <option value="12">12</option>
                                                                 <option value="13">13</option>
                                                                 <option value="14">14</option>
                                                                 <option value="15">15</option>
                                                                 <option value="16">16</option>
                                                                 <option value="17">17</option>
                                                                 <option value="18">18</option>
                                                                 <option value="19">19</option>
                                                                 <option value="20">20</option>
                                                                 <option value="21">21</option>
                                                                 <option value="22">22</option>
                                                                 <option value="23">23</option>
                                                                 <option value="24">24</option>
                                                                 <option value="25">25</option>
                                                                 <option value="26">26</option>
                                                                 <option value="27">27</option>
                                                                 <option value="28">28</option>
                                                                 <option value="29">29</option>
                                                                 <option value="30">30</option>
                                                                 <option value="31">31</option>
									</select>
									<select name="tanggal_manual2">
                                                                 <option value="<?echo"$_POST[bulan]";?>"><?echo"$_POST[bulan]";?></option>
																 <option value="01">01</option>
                                                                 <option value="02">02</option>
                                                                 <option value="03">03</option>
                                                                 <option value="04">04</option>
                                                                 <option value="05">05</option>
                                                                 <option value="06">06</option>
                                                                 <option value="07">07</option>
                                                                 <option value="08">08</option>
                                                                 <option value="09">09</option>
                                                                 <option value="10">10</option>
                                                                 <option value="11">11</option>
                                                                 <option value="12">12</option>
									</select>
									<select name="tanggal_manual3">
									<option value="<?echo"$_POST[tahun]";?>"><?echo"$_POST[tahun]";?></option>
									<option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
									<option value="2031">2031</option>
									<option value="2032">2032</option>
									<option value="2033">2033</option>
									<option value="2034">2034</option>
									<option value="2035">2035</option>
									</select>
DDMMYYYY</td></tr>
<tr><td><font color="red">Volume</font></td><td><input type="text" name="volume" class='form-control' size='40'  value="<?echo"$data[volume]";?>"></td><td>*tidak boleh memakai titik <strike>23.000</strike></td></tr>
<tr><td>Keterangan</td><td><input type="text" name="keterangan" class='form-control' size='40' value="<?echo"$data[keterangan]";?>"></td></tr>

<tr><td>Isi Gambar Dari Yang Pertama</td></tr>
<tr><td>Gambar 1</td><td><input type="file" name="gambar1"></td></tr>
<tr><td>Gambar 2</td><td><input type="file" name="gambar2"></td></tr>
<tr><td>Gambar 3</td><td><input type="file" name="gambar3"></td></tr>


<input type="hidden" name="fp"  value="<?echo"$data[foto_profil]";?>">
<tr><td>Wilayah</td><td><input type="text" name="wilayah" class='form-control' size='40' value="<?echo"$data[wilayah]";?>" readonly></td></tr>
<tr><td>Kecamatan</td><td><input type="text" name="kecamatan" class='form-control' size='40' value="<?echo"$data[kecamatan]";?>" readonly></td></tr>
<tr><td>Alamat</td><td><input type="text" name="alamat" class='form-control' size='40' value="<?echo"$data[alamat]";?>" readonly></td></tr>
<tr><td>Sippa</td><td><input type="text" name="sippa" class='form-control' size='40' value="<?echo"$data[sippa]";?>" readonly></td></tr>
<tr><td>Tanggal Berlaku Awal</td><td><select><option value="<?echo"$tgl_awal3";?>"><?echo"$tgl_awal3";?></option>
                                                                 <option value="01">01</option>
                                                                 <option value="02">02</option>
                                                                 <option value="03">03</option>
                                                                 <option value="04">04</option>
                                                                 <option value="05">05</option>
                                                                 <option value="06">06</option>
                                                                 <option value="07">07</option>
                                                                 <option value="08">08</option>
                                                                 <option value="09">09</option>
                                                                 <option value="10">10</option>
                                                                 <option value="11">11</option>
                                                                 <option value="12">12</option>
                                                                 <option value="13">13</option>
                                                                 <option value="14">14</option>
                                                                 <option value="15">15</option>
                                                                 <option value="16">16</option>
                                                                 <option value="17">17</option>
                                                                 <option value="18">18</option>
                                                                 <option value="19">19</option>
                                                                 <option value="20">20</option>
                                                                 <option value="21">21</option>
                                                                 <option value="22">22</option>
                                                                 <option value="23">23</option>
                                                                 <option value="24">24</option>
                                                                 <option value="25">25</option>
                                                                 <option value="26">26</option>
                                                                 <option value="27">27</option>
                                                                 <option value="28">28</option>
                                                                 <option value="29">29</option>
                                                                 <option value="30">30</option>
                                                                 <option value="31">31</option>
									</select>
									<select><option value="<?echo"$tgl_awal2";?>"><?echo"$tgl_awal2";?></option>
                                                                 <option value="01">01</option>
                                                                 <option value="02">02</option>
                                                                 <option value="03">03</option>
                                                                 <option value="04">04</option>
                                                                 <option value="05">05</option>
                                                                 <option value="06">06</option>
                                                                 <option value="07">07</option>
                                                                 <option value="08">08</option>
                                                                 <option value="09">09</option>
                                                                 <option value="10">10</option>
                                                                 <option value="11">11</option>
                                                                 <option value="12">12</option>
									</select>
									<select>
									<option value="<?echo"$tgl_awal1";?>"><?echo"$tgl_awal1";?></option>
									<option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
									<option value="2031">2031</option>
									<option value="2032">2032</option>
									<option value="2033">2033</option>
									<option value="2034">2034</option>
									<option value="2035">2035</option>
									</select>
*Tidak bisa dirubah :p</td></tr>
<tr><td>Tanggal Berlaku Akhir</td><td><select><option value="<?echo"$tgl_akhir3";?>"><?echo"$tgl_akhir3";?></option>
                                                                 <option value="01">01</option>
                                                                 <option value="02">02</option>
                                                                 <option value="03">03</option>
                                                                 <option value="04">04</option>
                                                                 <option value="05">05</option>
                                                                 <option value="06">06</option>
                                                                 <option value="07">07</option>
                                                                 <option value="08">08</option>
                                                                 <option value="09">09</option>
                                                                 <option value="10">10</option>
                                                                 <option value="11">11</option>
                                                                 <option value="12">12</option>
                                                                 <option value="13">13</option>
                                                                 <option value="14">14</option>
                                                                 <option value="15">15</option>
                                                                 <option value="16">16</option>
                                                                 <option value="17">17</option>
                                                                 <option value="18">18</option>
                                                                 <option value="19">19</option>
                                                                 <option value="20">20</option>
                                                                 <option value="21">21</option>
                                                                 <option value="22">22</option>
                                                                 <option value="23">23</option>
                                                                 <option value="24">24</option>
                                                                 <option value="25">25</option>
                                                                 <option value="26">26</option>
                                                                 <option value="27">27</option>
                                                                 <option value="28">28</option>
                                                                 <option value="29">29</option>
                                                                 <option value="30">30</option>
                                                                 <option value="31">31</option>
									</select>
									<select><option value="<?echo"$tgl_akhir2";?>"><?echo"$tgl_akhir2";?></option>
                                                                 <option value="01">01</option>
                                                                 <option value="02">02</option>
                                                                 <option value="03">03</option>
                                                                 <option value="04">04</option>
                                                                 <option value="05">05</option>
                                                                 <option value="06">06</option>
                                                                 <option value="07">07</option>
                                                                 <option value="08">08</option>
                                                                 <option value="09">09</option>
                                                                 <option value="10">10</option>
                                                                 <option value="11">11</option>
                                                                 <option value="12">12</option>
									</select>
									<select>
									<option value="<?echo"$tgl_akhir1";?>"><?echo"$tgl_akhir1";?></option>
									<option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
									<option value="2031">2031</option>
									<option value="2032">2032</option>
									<option value="2033">2033</option>
									<option value="2034">2034</option>
									<option value="2035">2035</option>
									</select>
*Tidak bisa dirubah :p</td></tr>
<tr><td>Sumber Air</td><td><input type="text" name="sumber_air" class='form-control' size='40' value="<?echo"$data[sumber_air]";?>" readonly></td></tr>
<tr><td>Lokasi</td><td><input type="text" name="lokasi" class='form-control' size='40' value="<?echo"$data[lokasi]";?>" readonly></td></tr>
<tr><td>Jenis Usaha</td><td><input type="text" name="jenis_usaha" class='form-control' size='40' value="<?echo"$data[jenis_usaha]";?>" readonly></td></tr>
<tr><td>Kelompok</td><td><input type="text" name="kelompok" class='form-control' size='40' value="<?echo"$data[kelompok]";?>" readonly></td></tr>
<tr><td>JSA</td><td><input type="text" name="jsa" class='form-control' size='40' value="<?echo"$data[jsa]";?>" readonly></td></tr>
<tr><td>KSA</td><td><input type="text" name="ksa" class='form-control' size='40' value="<?echo"$data[ksa]";?>" readonly></td></tr>
<tr><td>LSA</td><td><input type="text" name="lsa" class='form-control' size='40' value="<?echo"$data[lsa]";?>" readonly></td></tr>
<tr><td>KLK</td><td><input type="text" name="klk" class='form-control' size='40' value="<?echo"$data[klk]";?>" readonly></td></tr>
<tr><td>FKPA</td><td><input type="text" name="fkpa" class='form-control' size='40' value="<?echo"$data[fkpa]";?>" readonly></td></tr>
<tr><td>HBA</td><td><input type="text" name="hba" class='form-control' size='40' value="<?echo"$data[hba]";?>" readonly></td></tr>
<tr><td>HDA</td><td><input type="text" name="hda" class='form-control' size='40' value="<?echo"$data[hda]";?>" readonly></td></tr>
<tr><td>No Hp</td><td><input type="text" name="no_hp" class='form-control' size='40' value="<?echo"$data[no_hp]";?>" readonly></td></tr>
<tr><td>Email</td><td><input type="text" name="email" class='form-control' size='40' value="<?echo"$data[email]";?>" readonly></td></tr>
<tr><td>Username</td><td><input type="text" name="username" class='form-control' size='40' value="<?echo"$data[username]";?>" readonly></td></tr>
<tr><td>Password</td><td><input type="text" name="password" class='form-control' size='40' value="<?echo"$data[password]";?>" readonly></td></tr>
<tr><td colspan="2"><input  class='btn btn-primary pull-right' type="submit" name="upload" value="SIMPAN"></td></tr>
</table>
</form>
</center>
<br>
<br>
<br>
<br>


</table>
</body>
</html>
<?}}?>