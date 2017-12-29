<?php
session_start();
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php');
}else{
	
include"header.php";
$wilayah_admin=$_SESSION['wilayah_admin_1'];
$id_admin=$_SESSION['id_admin_1'];
?>
<center>
<div class="container">
    <div class="row">
        <div class="col-md-12">
		<center><h3><span class="fa fa-envelope"></h3>
    		    		<h3></span>Admin Input <?echo"$wilayah_admin";?></center></h3>

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li>
							<a href="list_pesan.php">
							<span class="glyphicon glyphicon-envelope"></span>
						    <span class="label label-danger"><?echo"$jml";?></span> Pesan Masuk </a>
						</li>
                        <li>
                            <a href="broadcast.php">
                            <span class="glyphicon glyphicon-send"></span> Broadcast Email & SMS</a>
                        </li>
						
                        <li class="active">
                            <a href="kirim_pesan.php">
                            <span class="glyphicon glyphicon-users"></span> Kirim Pesan Ke Admin</a>
                        </li>
					</ul>
</div>
</div>
</div>
</div>
</div>

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
<script>
/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
</script>
</head>




<div class="container">
      <div class="row">
	  <center><h4><b>Kirim Pesan</b></h4></center>
	   
	  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Kirim Pesan</h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
<?php
if(isset($_POST['tb']))
{
include"../../koneksi.php";
 
$random1 = rand(100,100000000);

$nama_file1 = $_FILES['gambar1']['name'];
$nama_file_atah = $random1. '' .$_FILES['gambar1']['name'];
$ukuran_file = $_FILES['gambar1']['size'];
$tipe_file = $_FILES['gambar1']['type'];
$tmp_file = $_FILES['gambar1']['tmp_name'];
$path = "../../images/".$nama_file_atah;

$pesan=$_POST['pesan'];
$np=$_POST['np'];
$kpd=$_POST['kpd'];
$jdl=$_POST['judul'];
$pg=$_POST['pengirim'];
$st=$_POST['status'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);

if(!empty($nama_file1 ))
{
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
    if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
        // Proses upload
        if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan : 
            // Proses simpan ke Database
            $query = "INSERT INTO pesan_notifikasi(kode,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'".$kpd."','".$kpd."','".$jdl."','".$pesan."','".$nama_file_atah."','".$tgl."','".$pg."','".$st."')";
            $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query
             
            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                echo"<script>alert('Berhasil Mengirim Pesan');window.location='kirim_pesan.php'</script>";
            }else{
                // Jika Gagal, Lakukan :
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
        }else{
            // Jika gambar gagal diupload, Lakukan :
            echo "<center><b>Maaf, Gambar gagal untuk diupload.</b></center>";
        }
    }else{
        // Jika ukuran file lebih dari 1MB, lakukan :
        echo "<center><b>Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB</b></center>";
    }
}else{
    // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    echo "<center><b>Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.</b></center>";
}
}
elseif(empty($nama_file1))
{
            $query = "INSERT INTO pesan_notifikasi(kode,nama_perusahaan,kepada,judul,pesan,foto1,tanggal_pengiriman,pengirim,status) VALUES(null,'".$kpd."','".$kpd."','".$jdl."','".$pesan."','','".$tgl."','".$pg."','".$st."')";
            $sql = mysql_query($query);; // Eksekusi/ Jalankan query dari variabel $query
             
            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                echo"<script>alert('Berhasil Mengirim Pesan');window.location='kirim_pesan.php'</script>";
            }else{
                // Jika Gagal, Lakukan :
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";



}
}
}
?>
<?
$kmp  = mysql_query("SELECT * FROM user_admin WHERE kode='$id_admin'");
$kmp_data   = mysql_fetch_array($kmp);
?>                   
                    <form method="post" action="" enctype="multipart/form-data">
                     <tr>
					 <td>
					 <b><h5>Nama Admin :</h5></b>
                     <b><?echo"$kmp_data[nama]";?></b>
					 </td>
                     </tr>
                     <tr>
					 <td><b><h5>Kepada :</h5></b>
                     <select name="kpd">
					 <option value="admin-input-wilayah-ciliwung-cisadane">Admin Input wilayah-ciliwung-cisadane</option>
					 <option value="admin-input-wilayah-cisadea-cibareno">Admin Input wilayah-cisadea-cibareno</option>
					 <option value="admin-input-wilayah-citarum">Admin Input wilayah-citarum</option>
					 <option value="admin-input-wilayah-citanduy">Admin Input wilayah-citanduy</option>
					 <option value="admin-input-wilayah-ciwulan-cilaki">Admin Input wilayah-ciwulan-cilaki</option>
					 <option value="admin-input-wilayah-cimanuk-cisanggarung">Admin Input wilayah-cimanuk-cisanggarung</option>
					 <option value="admin-keuangan">Admin Keuangan</option>
					 <option value="admin-sartek">Admin Sartek</option>
					 <option value="admin-dinas">Admin Dinas</option>
					 </select>
					 </td>
                     </tr>
                     <tr>
					 <td><b><h5>Subject :</h5></b>
                     <input type="text" name="judul" autocomplete="off" placeholder="subject"></td>
                     </tr>
                     <tr>
					 <td><b><h5>Pesan :</h5></b>
                     <textarea name="pesan"></textarea></td>
                     </tr>
                     <tr>
					 <td><b><h5>Pengirim :</h5></b>
                     <input type="text" name="pengirim" autocomplete="off" placeholder="nama pengirim" value="admin-input-<?echo"$wilayah_admin";?>" readonly></td>
                     </tr>
                     <tr>
					 <td><b><h5><i>Sertakan foto jika diperlukan:</i></h5></b>
                     <input type="file" name="gambar1" accept="image/*"></td>
                     </tr>
					 <input type="hidden" name="status" value="belum-terbaca">
                     <tr>
					 <td><button class="btn btn-primary" name="tb">Kirim</button></td>
                     </tr>
					</form>
					 
					 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        
                            <a  data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        
                    </div>
            
          </div>
        </div>
      </div>
    </div>
        </section><!-- Close comments section-->
		
		

<?}?>