<?php
session_start();
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php');
}else{
$wilayah_admin=$_SESSION['wilayah_admin_1'];
?>

<?php
$kd =$_GET["kdunix"];
		
include"../../koneksi.php";          
$del=mysql_query("select sippa,email,username,password from data_user where kode='$kd'");
$ar 	=	mysql_fetch_array($del);

$email 	=	$ar['email'];
$sippa 	=	$ar['sippa'];
$us	=	$ar['username'];
$pw 	=	$ar['password'];
 $du 	=	"dengan username";
 $dp 	=	"dan password";
 $th 	=	"Terima kasih telah menghubungi kami";
 $ttd 	=	"Ttd Admin Balai";

$to      = $email;
$subject = 'Email Aktivasi Sippa';
$message = 'Kode SIPPA Anda Adalah '.$sippa.' '.$du.' '.$us.' '.$dp.' '.$pw.' 
           '.$th.' 
           '.$ttd.' ';
$headers = 'From: admin@psdabandung.com' . "\r\n" .
    'Reply-To: admin@psdabandung.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();



	        if(mail($to, $subject, $message, $headers))
			{
			
			echo"<script>alert('Email Aktivasi Terkirim');window.location='data_user.php'</script>";	
				
			}else
	         {
	         	echo"gagal";
			 
	         }
	     
	
?>

<?}?>