<?php
session_start();
if(!isset($_SESSION['username_dinas']) AND !isset($_SESSION['password_dinas'])){
header('Location:login.php'); 
}else{ 
include"header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
		<center><h3><span class="fa fa-flag"></h3>
    		    		<h3></span>Data Admin User </center></h3>

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="tambah_admin.php">
							<span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-plus"></span> Tambah Admin Lapangan </a>
						</li>
					</ul>
</div>
</div>
</div>
</div>
</div>
<style>
.glyphicon-lg
{
    font-size:4em
}
.info-block
{
    border-right:5px solid #E6E6E6;margin-bottom:25px
}
.info-block .square-box
{
    width:100px;min-height:110px;margin-right:22px;text-align:center!important;background-color:#676767;padding:20px 0
}
.info-block.block-info
{
    border-color:#20819e
}
.info-block.block-info .square-box
{
    background-color:#20819e;color:#FFF
}
</style>
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
$kode_username =mysql_fetch_array(mysql_query("select * from user_admin order by kode DESC"));
$tambah=$kode_username[kode]+1;
echo " <center>
<form method=post action='' enctype='multipart/form-data'>
<table>
<br> 
<tr><td>Hak Akses</td><td>
    <select name='hak_akses'>
         <option>admin_input</option>
         <option>admin_sartek</option>
         <option>admin_keuangan</option>
         <option>admin_dinas</option>
         <option>legalitas</option>
    </select>
</td></tr>
<tr><td>Wilayah Admin</td><td>
    <select name='wilwil'>
         <option></option>
         <option>wilayah-ciliwung-cisadane</option>
         <option>wilayah-cisadea-cibareno</option>
         <option>wilayah-citarum</option>
         <option>wilayah-citanduy</option>
         <option>wilayah-ciwulan-cilaki</option>
         <option>wilayah-cimanuk-cisanggarung</option>
    </select>
</td></tr> 
<tr><td>Foto Profil</td><td><input type='file' name='gambar' accept='image/*'></td></tr> 
<tr><td>Nama</td><td><input type='text' name='nama' class='form-control' placeholder='nama'></td></tr> 
<tr><td><button class='btn btn-default' disabled>PSDA".$tambah."_</button></td><td><input type='text' name='username' class='form-control' placeholder='username'></td></tr> 
<tr><td>Password</td><td><input type='password' name='password' class='form-control' placeholder='password'></td></tr>
<tr><td>Jabatan</td><td><input type='text' name='jabatan' class='form-control' placeholder='jabatan'></td></tr>
<tr><td>No Hp</td><td><input type='text' name='no_hp' class='form-control' placeholder='no hp'></td></tr>
<tr><td>Email</td><td><input type='text' name='email' class='form-control' placeholder='email'></td></tr>
<tr><td></td><td><input type='reset' name='btn' value='Batal' class='btn btn-primary pull-right'>
<input type='submit' name='btn' value='Simpan' class='btn btn-primary pull-right'>
</td></tr>
</center>
</table>
</form>";

include"../koneksi.php";
if(isset($_POST['btn']))
{

$nama_files = $_FILES['gambar']['name'];
$nama_file = time(). '' .$_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$path = "../images/".$nama_file;

if(!empty($nama_files))
{
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ 
    if($ukuran_file <= 1000000){
        if(move_uploaded_file($tmp_file, $path)){ 
            $query = "INSERT INTO user_admin(kode,hak_akses,wilayah,nama,foto_profil,username,password,jabatan,no_hp,email,publish) values (null,'$_POST[hak_akses]','$_POST[wilwil]','$_POST[nama]','".$nama_file."','PSDA".$tambah."_$_POST[username]','$_POST[password]','$_POST[jabatan]','$_POST[no_hp]','$_POST[email]','publish')";
            $sql = mysql_query($query); 
            if($sql){ 
			 echo"<script>alert('Data Tersimpan');window.location='tambah_admin.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
        }else{
            echo "<center><b>Maaf, Gambar gagal untuk diupload.</b></center>";
        }
    }else{
        echo "<center><b>Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB</b></center>";
    }
}else{
    echo "<center><b>Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.</b></center>";
}
}elseif(empty($nama_files))
{
            $query = "INSERT INTO user_admin(kode,hak_akses,wilayah,nama,foto_profil,username,password,jabatan,no_hp,email,publish) values (null,'$_POST[hak_akses]','$_POST[wilwil]','$_POST[nama]','user.png','PSDA".$tambah."_$_POST[username]','$_POST[password]','$_POST[jabatan]','$_POST[no_hp]','$_POST[email]','publish')";
           $sql = mysql_query($query); 
            if($sql){ 
			
			 echo"<script>alert('Data Tersimpan');window.location='tambah_admin.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }

}







}
?>
<?
$i=0; 
$tampila = "select * from user_admin order by wilayah ASC";
$sqla = mysql_query($tampila);
echo "<center><h3><span class='glyphicon glyphicon-print'></span></h3>";
echo "<button onclick='window.print()' class='btn btn-danger'>Cetak Seluruh User</button>";
?>
<style>
.filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}

</style>

<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Data Admin</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="No" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Hak Akses" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Wilayah" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Foto Profil" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nama" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Jabatan" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Username" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Password" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Aksi" disabled></th>
                    </tr>
                </thead>
                <tbody>
<?
while($data = mysql_fetch_array($sqla))
 {
 $i++;

echo "
 <td>".$i."</td>
 <td>".$data[hak_akses]."</td>
 <td>".$data[wilayah]."</td>
 <td><img src='../images/".$data[foto_profil]."' width='100' height ='100'></td>
 <td>".$data[nama]."</td>
 <td>".$data[jabatan]."</td>
 <td>".$data[username]."</td>
 <td>".$data[password]."</td>
 <td>
 <a href='edit_admin.php?kdunix=".$data[kode]."'><span class='glyphicon glyphicon-pencil'></span></a>
 <a href='hapus_admin.php?kdunix=".$data[kode]."'><span class='glyphicon glyphicon-trash'></span></a>
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