<?
include"../../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
$tahun=substr($tglsekarang,0,4);
$bulan=substr($tglsekarang,5,2);



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="css/favicon.ico">

    <title>PSDA APLICATION</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrap.css.map" rel="stylesheet">
    <link href="css/bootstrap-theme.css.map" rel="stylesheet">
<style>
/***
Bootstrap Line Tabs by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

/* Tabs panel */
.tabbable-panel {
  border:1px solid #eee;
  padding: 10px;
}

/* Default mode */
.tabbable-line > .nav-tabs {
  border: none;
  margin: 0px;
}
.tabbable-line > .nav-tabs > li {
  margin-right: 2px;
}
.tabbable-line > .nav-tabs > li > a {
  border: 0;
  margin-right: 0;
  color: #737373;
}
.tabbable-line > .nav-tabs > li > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {
  border-bottom: 4px solid #fbcdcf;
}
.tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
  border: 0;
  background: none !important;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
  margin-top: 0px;
}
.tabbable-line > .nav-tabs > li.active {
  border-bottom: 4px solid #f3565d;
  position: relative;
}
.tabbable-line > .nav-tabs > li.active > a {
  border: 0;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.active > a > i {
  color: #404040;
}
.tabbable-line > .tab-content {
  margin-top: -3px;
  background-color: #fff;
  border: 0;
  border-top: 1px solid #eee;
  padding: 15px 0;
}
.portlet .tabbable-line > .tab-content {
  padding-bottom: 0;
}

/* Below tabs mode */

.tabbable-line.tabs-below > .nav-tabs > li {
  border-top: 4px solid transparent;
}
.tabbable-line.tabs-below > .nav-tabs > li > a {
  margin-top: 0;
}
.tabbable-line.tabs-below > .nav-tabs > li:hover {
  border-bottom: 0;
  border-top: 4px solid #fbcdcf;
}
.tabbable-line.tabs-below > .nav-tabs > li.active {
  margin-bottom: -2px;
  border-bottom: 0;
  border-top: 4px solid #f3565d;
}
.tabbable-line.tabs-below > .tab-content {
  margin-top: -10px;
  border-top: 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 15px;
}

@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
</style>
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

<script src="css/boostrap.min.js"></script>
<script src="js/boostrap.js"></script>

<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
body {
    padding-top: 15px;
    padding-left: 65px;
}
.navbar-twitch {
	position: fixed;
	top: 0px;
	left: 0px;
	width: 50px;
	height: 100%;
	border-radius: 0px;
	border: 0px;
    z-index: 1030;
}
.navbar-twitch.open {
	width: 240px;
}
.navbar-twitch > .container {
	padding: 0px;
	width: 100%;
}
.navbar-twitch .navbar-header,
.navbar-twitch .navbar-brand {
	float: none;
	display: block;
	width: 100%;
	margin: 0px;
}
.navbar-twitch .navbar-brand {
    height: 50px;   
}
.navbar-twitch > .container .navbar-brand {
	padding: 0px;
	margin: 0px;
}
.navbar-twitch > .container .navbar-brand > .small-nav {
	display: block;
}
.navbar-twitch > .container .navbar-brand > .small-nav > span.logo,	
.navbar-twitch.open > .container .navbar-brand > .full-nav {
    display: block;
	font-weight: bold;
	padding: 15px 2px 15px 3px;
	font-size: 18pt;
}
.navbar-twitch.open > .container .navbar-brand {
	width: 100%;
	padding: 15px 15px 60px;
	text-align: center;
}
.navbar-twitch.navbar-inverse > .container .navbar-brand > .small-nav > span.logo {
	/*color: rgb(255, 255, 255);*/
}
.navbar-twitch .navbar-nav > li {
	float: none;
}
.navbar-twitch > .container .full-nav {
	display: none;
}
.navbar-twitch.open > .container .full-nav {
	display: block;
}
.navbar-twitch.open > .container .small-nav {
	display: none;
}
.navbar-twitch .navbar-collapse {
	padding: 0px;
}
.navbar-twitch .navbar-nav {
	float: none;
	margin: 0px;
}
.navbar-twitch .navbar-nav > li > a {
	padding: 0px;
}
.navbar-twitch .navbar-nav > li > a > span {
	display: block;
	font-size: 16pt;
	padding: 13px 15px 13px 12px;
}
.navbar-twitch .tooltip,
.navbar-twitch .tooltip .tooltip-inner {
	max-width: auto;
	white-space:nowrap;
}
.navbar-twitch-toggle {
	position: fixed;
	top: 5px;
	left: 55px;
}
.navbar-twitch ~ .navbar-twitch-toggle > .nav-open {
	display: inline-block;
}
.navbar-twitch ~ .navbar-twitch-toggle > .nav-close {
	display: none;
}
.navbar-twitch.open ~ .navbar-twitch-toggle {
	left: 245px;
}
.navbar-twitch.open ~ .navbar-twitch-toggle > .nav-open {
	display: none;
}
.navbar-twitch.open ~ .navbar-twitch-toggle > .nav-close {
	display: inline-block;
}


.btn-purple,
.btn-purple:hover,
.btn-purple:focus,
.btn-purple:Active {
    color: rgb(255, 255, 255);
    background-color: rgb(86, 61, 124);
    border-color: rgb(111, 84, 153);
}
.btn-purple:hover,
.btn-purple:focus,
.btn-purple:Active {
    background-color: rgb(111, 84, 153);
    border-color: rgb(86, 61, 124);   
}

.navbar {
    background-image: none !important;
}
.navbar-purple {
    background-color: rgb(86, 61, 124);
    border-color: rgb(111, 84, 153);
}
.navbar-purple .navbar-brand, 
.navbar-purple .navbar-nav > li > a, 
.navbar-purple .navbar-brand:hover, 
.navbar-purple .navbar-nav > li > a:hover, 
.navbar-purple .navbar-brand:focus, 
.navbar-purple .navbar-nav > li > a:focus {
    color: rgb(205, 191, 227);;
}
.navbar-purple .navbar-brand:hover, 
.navbar-purple .navbar-nav > li > a:hover, 
.navbar-purple .navbar-brand:focus, 
.navbar-purple .navbar-nav > li > a:focus,
.navbar-purple .navbar-nav > .active > a, 
.navbar-purple .navbar-nav > .active > a:hover, 
.navbar-purple .navbar-nav > .active > a:focus {
    background-color: rgb(111, 84, 153);
    color: rgb(255, 255, 255);
}
</style>
<script>
$(document).ready(function() {
    $('.navbar-nav [data-toggle="tooltip"]').tooltip();
    $('.navbar-twitch-toggle').on('click', function(event) {
        event.preventDefault();
        $('.navbar-twitch').toggleClass('open');
    });
    
    $('.nav-style-toggle').on('click', function(event) {
        event.preventDefault();
        var $current = $('.nav-style-toggle.disabled');
        $(this).addClass('disabled');
        $current.removeClass('disabled');
        $('.navbar-twitch').removeClass('navbar-'+$current.data('type'));
        $('.navbar-twitch').addClass('navbar-'+$(this).data('type'));
    });
});
</script>
<?
include"../../koneksi.php";

$wilayah_admin=$_SESSION['wilayah_admin_1'];
$tampil = "select * from pesan_notifikasi where kepada='admin-input-".$wilayah_admin."' and status='belum-terbaca'";
$sql = mysql_query($tampil);
$jml =mysql_num_rows($sql);
$data = mysql_fetch_array($sql);
$tampil2 = "select * from rekap_admin_lapangan where wilayah='".$wilayah_admin."' and status='terbaru'";
$sql2 = mysql_query($tampil2);
$jml2 =mysql_num_rows($sql2);
?>


<div class="navbar navbar-inverse navbar-twitch" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">
				<span class="small-nav"> <span class="logo"> <B> </span> </span>
				<span class="full-nav"> < ADMIN INPUT > </span>
			</a>
		</div>
		<div class="">
			<ul class="nav navbar-nav">
				<li class="active">
					<a href="index.php">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Home"> 
							<span class="glyphicon glyphicon-home"></span><br>
						    <span class="label label-info"><?echo"$jml2";?></span>
							
						</span>
						<span class="full-nav"><span class="glyphicon glyphicon-home"></span> Home </span>
					</a>
				</li>
				<li>
					<a href="tambah_admin_lapangan.php">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Tambah Admin Lapangan"> 
							<span class="fa fa-flag"></span> 
						</span>
						<span class="full-nav"><span class="fa fa-flag"></span> Tambah Admin Lapangan </span>
					</a>
				</li>
				<li>
					<a href="tambah_data_user.php">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Data User"> 
							<span class="fa fa-users"></span> 
						</span>
						<span class="full-nav"><span class="fa fa-users"></span> Data User </span>
					</a>
				</li>
				<li>
				<a href="edit_list_pesan.php">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="pesan"> 
							<div class="glyphicon glyphicon-comment">
						    <span class="label label-danger"><?echo"$jml";?></span>
							</div> 
						</span>
						<span class="full-nav"><span class="glyphicon glyphicon-comment"></span> Pesan </span>
					</a>
				</li>
				<li>
					<a href="rekap_berjalan.php">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Rekap Data"> 
							<span class="fa fa-calendar"></span> 
						</span>
						<span class="full-nav"><span class="fa fa-calendar"></span> Rekap Data </span>
					</a>
				</li>
				<li>
					<a href="logout.php">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Logout"> 
							<span class="fa fa-power-off"></span> 
						</span>
						<span class="full-nav"><span class="fa fa-power-off"></span> Logout </span>
					</a>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>
<button type="button" class="btn btn-default btn-xs navbar-twitch-toggle">
	<span class="glyphicon glyphicon-chevron-right nav-open"></span>		
	<span class="glyphicon glyphicon-chevron-left nav-close"></span>
</button>

<div class="container">
        <button type="button" class="btn btn-inverse nav-style-toggle disabled" data-type="inverse"> Hitam</button>
        <button type="button" class="btn btn-default nav-style-toggle" data-type="default"> Default</button>
        <button type="button" class="btn btn-purple nav-style-toggle" data-type="purple"> Ungu</button>
    </div>
</div>










<!--
Bootstrap Line Tabs by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->
