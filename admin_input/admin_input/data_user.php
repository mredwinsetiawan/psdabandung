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
						<li>
							<a href="tambah_data_user.php">
							
							<span class="glyphicon glyphicon-edit"></span>
							Tambah User </a>
						</li>
						<li class="active">
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

<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true) return true;
 else return false;
 }</script>

 <script type="text/javascript" language="JavaScript">
 function aktivasi()
 {
 tanya = confirm("Kirim aktivasi melalui email ? ?");
 if (tanya == true) return true;
 else return false;
 }</script>
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
include"../../koneksi.php";
$i=0; 
$tampil = "select * from data_user where korwil='".$wilayah_admin."' order by kode asc";
$sql = mysql_query($tampil);
$num =mysql_num_rows($sql);
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
$tahun=substr($tglsekarang,0,4);
$bulan=substr($tglsekarang,5,2);

?>
<center>
<div role="main" class="container theme-showcase">
  <div class="page-header">
      <h2>Data User <?echo"$wilayah_admin";?></h2>
  </div>
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
        
	  </div>
		<div class="col-md-9">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
						    <th><b>No</b></th>
                            <th><em class="glyphicon glyphicon-pencil"></em></th>
                            <th><em class='glyphicon glyphicon-envelope'></em></th>
                            <th><em class='glyphicon glyphicon-off'></em></th>
                            <th><em class='glyphicon glyphicon-off'></em></th>
                            <th>ID</th>
                            <th>Wilayah</th>
                            <th>Kecamatan</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Sippa</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
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
                            <th>Keterangan</th>
                            <th>No Handphone</th>
                            <th>Email</th>
                            <th>Foto Profil</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th>Aktivasi</th>
                            <th><em class="glyphicon glyphicon-pencil"></em></th>
                            <th><em class='glyphicon glyphicon-envelope'></em></th>
                            <th><em class='glyphicon glyphicon-off'></em></th>
                            <th><em class='glyphicon glyphicon-off'></em></th>
                        </tr>
                    </thead>
                    <tbody>
					<?
while($data = mysql_fetch_array($sql))
 {
 $i++;

echo "
 <tr>
 <td><b>".$i."</b></td>
 <td>
 <a href='edit_data_user.php?kdunix=".$data[kode]."' class='btn btn-default'><em class='glyphicon glyphicon-pencil'></em></a>
 </td>
 <td>
 <a onclick='return aktivasi()' href='aktivasi_user.php?kdunix=".$data[kode]."' class='btn btn-success' title='Jika user lupa denga SIPPA maupun dengan userame dan paswoordnya..klik tombol ini untuk mengirim ulang ke email'><em class='glyphicon glyphicon-envelope'></em></a>
 </td>
 <td>
 <a href='dinonaktifkan.php?kdunix=".$data[kode]."' class='btn btn-danger' title='NON-Aktifkan'><em class='glyphicon glyphicon-off'></em></a>
 </td>
 <td>
 <a href='diaktifkan.php?kdunix=".$data[kode]."' class='btn btn-warning' title='Aktifkan'><em class='glyphicon glyphicon-off'></em></a>
 </td>
 
 <td>".$data[kode]."</td>
 <td>".$data[wilayah]."</td>
 <td>".$data[kecamatan]."</td>
 <td>".$data[nama_perusahaan]."</td>
 <td>".$data[alamat]."</td>
 <td>".$data[sippa]."</td>
 <td>".$data[tanggal_awal]."</td>
 <td>".$data[tanggal_akhir]."</td>
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
 <td>".$data[keterangan]."</td>
  <td>".$data[no_hp]."</td>
  <td>".$data[email]."</td>
 <td><img src='images/".$data[foto_profil]."' class='img-circle' width='50' height='50'></td>
 <td>".$data[username]."</td>
 <td>".$data[password]."</td>
 <td><font color='red'><b><i>".$data[hapus]."</i></b></font></td> 
 <td><font color='red'><b><i>".$data[aktivasi]."</i></b></font></td> 
 <td>
 <a href='edit_data_user.php?kdunix=".$data[kode]."' class='btn btn-default'><em class='glyphicon glyphicon-pencil'></em></a>
 </td>
 <td>
 <a onclick='return aktivasi()' href='aktivasi_user.php?kdunix=".$data[kode]."' class='btn btn-success'><em class='glyphicon glyphicon-envelope'></em></a>
 </td>
 <td>
 <a href='dinonaktifkan.php?kdunix=".$data[kode]."' class='btn btn-danger'><em class='glyphicon glyphicon-off'></em></a>
 </td>
 <td>
 <a href='diaktifkan.php?kdunix=".$data[kode]."' class='btn btn-warning' title='Aktifkan'><em class='glyphicon glyphicon-off'></em></a>
 </td>
 </tr>";
 }
?>
                    </tbody>
                </table>   
		</div>
	</div>
</div>
<?}?>