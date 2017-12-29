<?

if(isset($_POST['upload']))
{

include"../../koneksi.php";
$kd=$_POST['ide'];
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d", $tanggal);


$korwil=$_POST['korwil'];
$wilayah=$_POST['wilayah'];
$kecamatan=$_POST['kecamatan'];
$nama_perusahaan=$_POST['nama_perusahaan'];
$sippa=$_POST['sippa'];
$tanggal_awal=$_POST['tanggal_awal'];
$tanggal_akhir=$_POST['tanggal_akhir'];
$sumber_air=$_POST['sumber_air'];
$lokasi=$_POST['lokasi'];
$jenis_usaha=$_POST['jenis_usaha'];
$jsa=$_POST['jsa'];
$ksa=$_POST['ksa'];
$lsa=$_POST['lsa'];
$klk=$_POST['klk'];
$fkpa=$_POST['fkpa'];
$hba=$_POST['hba'];
$hda=$_POST['hda'];
$volume=$_POST['volume'];
$npa=$_POST['npa'];
$keterangan=$_POST['keterangan'];
$no_hp=$_POST['no_hp'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$konfirmasi=$_POST['konfirmasi'];
$status=$_POST['status'];
$hapus=$_POST['hapus'];
$aktivasi=$_POST['aktivasi'];

$npa=$hda*$volume;

 		  $sql= mysql_query ("update rekap_admin_input set volume='$_POST[volume]',npa='$npa',keterangan='$_POST[keterangan]' where kode='$kd'");  
              if($sql){ 
	         echo"<script>alert('Berhasil Meyimpan Data');window.location='sudah_ter-edit.php'</script>";
            }else{
	         echo"<script>alert('Gagal');window.location='sudah_ter-edit.php'</script>";
            }
} 
?>