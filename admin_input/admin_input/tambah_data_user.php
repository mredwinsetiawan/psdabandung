<?php
session_start();
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php'); 
}else{ 
include"header.php";
$wilayah_admin=$_SESSION['wilayah_admin_1'];
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
		<center><h3><span class="fa fa-users"></h3>
    		<h3></span>Admin Input <?echo"$wilayah_admin";?></center></h3>

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="tambah_data_user.php">
							
							<span class="glyphicon glyphicon-edit"></span>
							Tambah User </a>
						</li>
						<li>
							<a href="data_user.php">
							<span class="glyphicon glyphicon-file"></span>
							Data User </a>
						</li>
					</ul>
</div>
</div>
</div>
</div>
</div>


<html>
<head>

</head>

<body>
<!-- Membuat form untuk mengupload gambar -->
<center>

<table>
<form method="post" action="simpan_tambah_data_user.php" enctype="multipart/form-data">
<br> 
<h3><em class='glyphicon glyphicon-edit'></em><br>Tambah User Baru</h3>
<br>
<tr><td></td><td><input type="hidden" name="korwil" value='<?echo"$wilayah_admin";?>'></td></tr>
<tr><td></td><td><input type="hidden" name="status" value='belum-lunas'></td></tr>
<tr><td></td><td><input type="hidden" name="hapus" value='aktif'></td></tr>
<tr><td></td><td><input type="hidden" name="aktivasi" value='belum-aktivasi'></td></tr>

<tr><td>Wilayah</td><td><input type="text" name="wilayah" class='form-control' size='40' placeholder="CPDP Wil. III (Kota Bogor)"></td></tr>
<tr><td>Kecamatan</td><td><input type="text" name="kecamatan" class='form-control' size='40'></td></tr>
<tr><td>Nama Perusahaan</td><td><input type="text" name="nama_perusahaan" class='form-control' size='40'></td></tr>
<tr><td>Alamat</td><td><input type="text" name="alamat" class='form-control' size='40'></td></tr>
<tr><td>Sippa</td><td><input type="text" name="sippa" class='form-control' size='40'></td></tr>
<tr><td>Tanggal Berlaku Awal</td><td><select name="tanggal_awal1"><option value="01">01</option>
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
									<select name="tanggal_awal2"><option value="01">01</option>
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
									<select name="tanggal_awal3">
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
</td></tr>
<tr><td>Tanggal Berlaku Akhir</td><td><select name="tanggal_akhir1"><option value="01">01</option>
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
									<select name="tanggal_akhir2"><option value="01">01</option>
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
									<select name="tanggal_akhir3">
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
</td></tr>
<tr><td>Sumber Air</td><td><input type="text" name="sumber_air" class='form-control' size='40'></td></tr>
<tr><td>Lokasi</td><td><input type="text" name="lokasi" class='form-control' size='40'></td></tr>
<tr><td>Jenis Usaha</td><td><input type="text" name="jenis_usaha" class='form-control' size='40'></td></tr>
<tr><td>Kelompok</td><td><input type="text" name="kelompok" class='form-control' size='40'></td></tr>
<tr><td>JSA</td><td><input type="text" name="jsa" class='form-control' size='40'></td></tr>
<tr><td>KSA</td><td><input type="text" name="ksa" class='form-control' size='40'></td></tr>
<tr><td>LSA</td><td><input type="text" name="lsa" class='form-control' size='40'></td></tr>
<tr><td>KLK</td><td><input type="text" name="klk" class='form-control' size='40'></td></tr>
<tr><td>FKPA</td><td><input type="text" name="fkpa" class='form-control' size='40'></td></tr>
<tr><td>HBA</td><td><input type="text" name="hba" class='form-control' size='40'></td></tr>
<tr><td>HDA</td><td><input type="text" name="hda" class='form-control' size='40'></td></tr>
<tr><td>Volume</td><td><input type="text" name="volume" class='form-control' size='40' value="0" readonly></td></tr>
<tr><td>Npa</td><td><input type="text" name="npa" class='form-control' size='40' value="0" readonly></td></tr>
<tr><td>Keterangan</td><td><input type="text" name="keterangan" class='form-control' size='40'></td></tr>
<tr><td>No Hp</td><td><input type="text" name="no_hp" class='form-control' size='40'></td></tr>
<tr><td>Email</td><td><input type="text" name="email" class='form-control' size='40'></td></tr>
<tr><td>Foto Profil</td><td><input type="file" accept="images/*" name="gambar1"></td></tr><?
$x=mysql_query("select kode from data_user order by kode DESC");
$y=mysql_fetch_array($x);?>
<tr><td>Username</td><td><input type="text" name="username" class='form-control' size='40' value="psda<?echo"$y[kode]"?>" readonly></td></tr>
<tr><td>Password</td><td><input type="text" name="password" class='form-control' size='40'></td></tr>
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
<?}?>