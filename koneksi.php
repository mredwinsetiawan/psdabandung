<?php
$host="localhost:8889";
$user="root";
$passwd="root";
$db="psda";
$koneksi=mysql_connect($host,$user,$passwd) or die (mysql_error());
mysql_select_db($db, $koneksi) or die (mysql_error());
?>