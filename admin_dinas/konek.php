<?php
$host="localhost";
$user="u0678336_psda_db";
$passwd="psda123";
$db="u0678336_psda";
$koneksi=mysql_connect($host,$user,$passwd) or die (mysql_error());
mysql_select_db($db, $koneksi) or die (mysql_error());
?>