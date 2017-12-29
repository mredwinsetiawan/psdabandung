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
		<center><h3><span class="fa fa-flag"></h3>
    		    		<h3></span>Admin Input <?echo"$wilayah_admin";?></center></h3>

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="tambah_admin_lapangan.php">
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
$kd =$_GET["kdunix"];
$kode_username =mysql_fetch_array(mysql_query("select * from user_admin_lapangan where kode='$kd' and wilayah='".$wilayah_admin."' order by kode DESC"));
$tambah=$kode_username[kode]+1;
echo " <center>
<form method=post action='' enctype='multipart/form-data'>
<table>
<br> 
<tr><td>Foto Profil</td><td><input type='file' name='gambar' accept='image/*'></td></tr> 
<tr><td>Nama</td><td><input type='text' name='nama' class='form-control' placeholder='nama' value='".$kode_username[nama]."'></td></tr> 
<tr><td>Username</td><td><input type='text' name='username' class='form-control' placeholder='nama' value='".$kode_username[username]."' readonly></td></tr> 
<tr><td>Password</td><td><input type='text' name='password' class='form-control' placeholder='password' value='".$kode_username[password]."'></td></tr>
<tr><td></td><td><input type='reset' name='btn' value='Batal' class='btn btn-primary pull-right'>
<input type='submit' name='btn' value='Simpan' class='btn btn-primary pull-right'>
</td></tr>
</center>
</table>
</form>";

include"../../koneksi.php";
if(isset($_POST['btn']))
{

$nama_files = $_FILES['gambar']['name'];
$nama_file = time(). '' .$_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$path = "images/".$nama_file;

if(!empty($nama_files))
{
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ 
    if($ukuran_file <= 1000000){
        if(move_uploaded_file($tmp_file, $path)){ 
		
		
		
		

            $query = "update user_admin_lapangan set foto_profil='".$nama_file."',password='$_POST[password]',nama='$_POST[nama]' where kode='$kd'";
			$sql = mysql_query($query); 
            if($sql){ 
			 echo"<script>alert('Data Tersimpan');window.location='tambah_admin_lapangan.php'</script>";
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
            
            $query = "update user_admin_lapangan set password='$_POST[password]',nama='$_POST[nama]'  where kode='$kd'";
		   $sql = mysql_query($query); 
            if($sql){ 
			
			 echo"<script>alert('Data Tersimpan');window.location='tambah_admin_lapangan.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }

}







}
?>
<?
$i=0; 
$tampila = "select * from user_admin_lapangan where wilayah='".$wilayah_admin."' order by kode ASC";
$sqla = mysql_query($tampila);
echo "<center><h3>Data Admin Lapangan ".$wilayah_admin."</h3>";
echo "<button onclick='window.print()' class='btn btn-default btn-xs btn-print'>Cetak Seluruh User</button>";
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
                <h3 class="panel-title">Data Admin Lapangan</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="No" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Wilayah" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Foto Profil" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nama" disabled></th>
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
 <td>".$data[kode]."</td>
 <td>".$data[wilayah]."</td>
 <td><img src='images/".$data[foto_profil]."' width='100' height ='100'></td>
 <td>".$data[nama]."</td>
 <td>".$data[username]."</td>
 <td>".$data[password]."</td>
 <td>
 <a href='edit_admin_lapangan.php?kdunix=".$data[kode]."'><span class='glyphicon glyphicon-pencil'></span></a>
 <a href='hapus_admin_lapangan.php?kdunix=".$data[kode]."'><span class='glyphicon glyphicon-trash'></span></a>
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