<?php
session_start();
if(!isset($_SESSION['username_legalitas']) AND !isset($_SESSION['password_legalitas'])){
header('Location:login.php');
}else{?>
<?
include"koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
$tanggal=substr($tglsekarang,8,2);

if($tanggal <=10)
{
$tampil = "select * from warna where warna='biru'";
$sql = mysql_query($tampil);
$data = mysql_fetch_array($sql);
}elseif($tanggal <=20)
{
$tampil = "select * from warna where warna='hijau'";
$sql = mysql_query($tampil);
$data = mysql_fetch_array($sql);
}
elseif($tanggal <=32)
{
$tampil = "select * from warna where warna='kuning'";
$sql = mysql_query($tampil);
$data = mysql_fetch_array($sql);
}if($tanggal <=10)
{
$tampil = "select * from warna where warna='gif.gif'";
$sql = mysql_query($tampil);
$datak = mysql_fetch_array($sql);
}
elseif($tanggal <=32)
{
$tampil = "select * from warna where warna='monitor.png'";
$sql = mysql_query($tampil);
$datak = mysql_fetch_array($sql);
}


?>  
<style>


.box > .icon { text-align: center; position: relative; }
.box > .icon > .image { position: relative; z-index: 2; margin: auto; width: 88px; height: 88px; border: 8px solid white; line-height: 88px; border-radius: 50%; background: #006699; vertical-align: middle; }
.box > .icon:hover > .image { background: #333; }
.box > .icon > .image > i { font-size: 36px !important; color: #fff !important; }
.box > .icon:hover > .image > i { color: white !important; }
.box > .icon > .info { margin-top: -24px; background: rgba(0, 0, 0, 0.04); border: 1px solid #e0e0e0; padding: 15px 0 10px 0; }
.box > .icon:hover > .info { background: rgba(0, 0, 0, 0.04); border-color: #e0e0e0; color: white; }
.box > .icon > .info > h3.title { font-family: "Roboto",sans-serif !important; font-size: 16px; color: #222; font-weight: 500; }
.box > .icon > .info > p { font-family: "Roboto",sans-serif !important; font-size: 13px; color: #666; line-height: 1.5em; margin: 20px;}
.box > .icon:hover > .info > h3.title, .box > .icon:hover > .info > p, .box > .icon:hover > .info > .more > a { color: #222; }
.box > .icon > .info > .more a { font-family: "Roboto",sans-serif !important; font-size: 12px; color: #222; line-height: 12px; text-transform: uppercase; text-decoration: none; }
.box > .icon:hover > .info > .more > a { color: #fff; padding: 6px 8px; background-color:#006699; }
.box .space { height: 30px; }
body {
  padding-top: 50px;
}
 
.thumbnail {
    position:relative;
    overflow:hidden;
}
 
.caption {
    position:absolute;
    top:-100%;
    right:0;
    background:rgba(66, 139, 202, 0.75);
    width:100%;
    height:100%;
    padding:2%;
    text-align:center;
    color:#fff !important;
    z-index:2;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
}
.thumbnail:hover .caption {
    top:0%;
}
    
	
	
	
	
/* ==========================================================================
   Box Sections
   ========================================================================== */

.white h1 {
	padding-top: 35px;
}

.white p {
	padding-top: 25px;
}

/* Section Dividers */
.section-divider {
    z-index: 999;
    width: 100%;
    display: table;
    max-height: 450px;
    border-bottom: 2px solid #E6EAED;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
    padding-top: 30px;
    padding-bottom: 70px;
    margin-top: 45px;


    background-position: center center;

    -webkit-background-size: 100%;
    -moz-background-size: 100%;
    -o-background-size: 100%;
    background-size: 100%;

    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;

    background-attachment: relative;
    
    text-align: center;
}

.textdivider h1 {
	padding-top: 70px;
	color: white;
	font-size: 40px;
}

.textdivider p {
	color: white;
	font-size: 25px;
}


/* Section Dividers Backgrounds */

.divider1 {
	background-image: url('css/<?echo"$datak[warna]";?>')
}
/*----------------------------------------------------*/
/*----------------- Testimonials CSS -----------------*/
/*----------------------------------------------------*/
.testimonial{
    margin-bottom: 10px;
}

    .testimonial-section {
        width: 100%;
        height: auto;
        padding: 15px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        position: relative;
        border: 1px solid #fff;
    }
    .testimonial-section:after {
        top: 100%;
        left: 50px;
        border: solid transparent;
        content: " ";
        position: absolute;
        border-top-color: #fff;
        border-width: 15px;
        margin-left: -15px;
    }

    .testimonial-desc {
        margin-top: 20px;
        text-align:left;
        padding-left: 15px;
    }
        .testimonial-desc img {
            border: 1px solid #f5f5f5;
            border-radius: 150px;
            height: 70px;
            padding: 3px;
            width: 70px;
            display:inline-block;
            vertical-align: top;
        }

        .testimonial-writer{
            display: inline-block;
            vertical-align: top;
            padding-left: 10px;
        }

            .testimonial-writer-name{
                font-weight: bold;
            }

            .testimonial-writer-designation{
                font-size: 85%;
            }

            .testimonial-writer-company{
                font-size: 85%;
            }
    /*---- Outlined Styles ----*/
    .testimonial.testimonial-default{
        
    }
        .testimonial.testimonial-default .testimonial-section{
            border-color: #777;
        }

            .testimonial.testimonial-default .testimonial-section:after{
                border-top-color: #777;
            }

        .testimonial.testimonial-default .testimonial-desc{
            
        }

            .testimonial.testimonial-default .testimonial-desc img{
                border-color: #777;
            }

            .testimonial.testimonial-default .testimonial-writer-name{
                color: #777;
            }

    .testimonial.testimonial-primary{
        
    }
        .testimonial.testimonial-primary .testimonial-section{
            border-color: #337AB7;
            color: #286090;
            background-color: rgba(51, 122, 183, 0.1);
        }

            .testimonial.testimonial-primary .testimonial-section:after{
                border-top-color: #337AB7;
            }

        .testimonial.testimonial-primary .testimonial-desc{
            
        }

            .testimonial.testimonial-primary .testimonial-desc img{
                border-color: #337AB7;
            }

            .testimonial.testimonial-primary .testimonial-writer-name{
                color: #337AB7;
            }

    .testimonial.testimonial-info{
        
    }
        .testimonial.testimonial-info .testimonial-section{
            border-color: #5BC0DE;
            color: #31b0d5;
            background-color: rgba(91, 192, 222, 0.1);
        }

            .testimonial.testimonial-info .testimonial-section:after{
                border-top-color: #5BC0DE;
            }

        .testimonial.testimonial-info .testimonial-desc{
            
        }

            .testimonial.testimonial-info .testimonial-desc img{
                border-color: #5BC0DE;
            }

            .testimonial.testimonial-info .testimonial-writer-name{
                color: #5BC0DE;
            }


    .testimonial.testimonial-success{
        
    }
        .testimonial.testimonial-success .testimonial-section{
            border-color: #5CB85C;
            color: #449d44;
            background-color: rgba(92, 184, 92, 0.1);
        }

            .testimonial.testimonial-success .testimonial-section:after{
                border-top-color: #5CB85C;
            }

        .testimonial.testimonial-success .testimonial-desc{
            
        }

            .testimonial.testimonial-success .testimonial-desc img{
                border-color: #5CB85C;
            }

            .testimonial.testimonial-success .testimonial-writer-name{
                color: #5CB85C;
            }

    .testimonial.testimonial-warning{
        
    }
        .testimonial.testimonial-warning .testimonial-section{
            border-color: #F0AD4E;
            color: #d58512;
            background-color: rgba(240, 173, 78, 0.1);
        }

            .testimonial.testimonial-warning .testimonial-section:after{
                border-top-color: #F0AD4E;
            }

        .testimonial.testimonial-warning .testimonial-desc{
            
        }

            .testimonial.testimonial-warning .testimonial-desc img{
                border-color: #F0AD4E;
            }

            .testimonial.testimonial-warning .testimonial-writer-name{
                color: #F0AD4E;
            }

    .testimonial.testimonial-danger{
        
    }
        .testimonial.testimonial-danger .testimonial-section{
            border-color: #D9534F;
            color: #c9302c;
            background-color: rgba(217, 83, 79, 0.1);
        }

            .testimonial.testimonial-danger .testimonial-section:after{
                border-top-color: #D9534F;
            }

        .testimonial.testimonial-danger .testimonial-desc{
            
        }

            .testimonial.testimonial-danger .testimonial-desc img{
                border-color: #D9534F;
            }

            .testimonial.testimonial-danger .testimonial-writer-name{
                color: #D9534F;
            }

    /*---- Filled Styles ----*/
    .testimonial.testimonial-default-filled{
        
    }
        .testimonial.testimonial-default-filled .testimonial-section{
            color: #fff;
            border-color: #777;
            background-color: #777;
        }

            .testimonial.testimonial-default-filled .testimonial-section:after{
                border-top-color: #777;
            }

        .testimonial.testimonial-default-filled .testimonial-desc{
            
        }

            .testimonial.testimonial-default-filled .testimonial-desc img{
                border-color: #777;
                background-color: #777;
            }

            .testimonial.testimonial-default-filled .testimonial-writer-name{
                color: #777;
            }

    .testimonial.testimonial-primary-filled{
        
    }
        .testimonial.testimonial-primary-filled .testimonial-section{
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
        }

            .testimonial.testimonial-primary-filled .testimonial-section:after{
                border-top-color: #337AB7;
            }

        .testimonial.testimonial-primary-filled .testimonial-desc{
            
        }

            .testimonial.testimonial-primary-filled .testimonial-desc img{
                border-color: #2e6da4;
                background-color: #337ab7;
            }

            .testimonial.testimonial-primary-filled .testimonial-writer-name{
                color: #337AB7;
            }

    .testimonial.testimonial-info-filled{
        
    }
        .testimonial.testimonial-info-filled .testimonial-section{
            color: #fff;
            background-color: #5bc0de;
            border-color: #46b8da;
        }

            .testimonial.testimonial-info-filled .testimonial-section:after{
                border-top-color: #5BC0DE;
            }

        .testimonial.testimonial-info-filled .testimonial-desc{
            
        }

            .testimonial.testimonial-info-filled .testimonial-desc img{
                border-color: #46b8da;
                background-color: #5bc0de;
            }

            .testimonial.testimonial-info-filled .testimonial-writer-name{
                color: #5BC0DE;
            }


    .testimonial.testimonial-success-filled{
        
    }
        .testimonial.testimonial-success-filled .testimonial-section{
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
        }

            .testimonial.testimonial-success-filled .testimonial-section:after{
                border-top-color: #5CB85C;
            }

        .testimonial.testimonial-success-filled .testimonial-desc{
            
        }

            .testimonial.testimonial-success-filled .testimonial-desc img{
                border-color: #4cae4c;
                background-color: #5cb85c;
            }

            .testimonial.testimonial-success-filled .testimonial-writer-name{
                color: #5CB85C;
            }

    .testimonial.testimonial-warning-filled{
        
    }
        .testimonial.testimonial-warning-filled .testimonial-section{
            color: #fff;
            background-color: #f0ad4e;
            border-color: #eea236;
        }

            .testimonial.testimonial-warning-filled .testimonial-section:after{
                border-top-color: #F0AD4E;
            }

        .testimonial.testimonial-warning-filled .testimonial-desc{
            
        }

            .testimonial.testimonial-warning-filled .testimonial-desc img{
                border-color: #eea236;
                background-color: #f0ad4e;
            }

            .testimonial.testimonial-warning-filled .testimonial-writer-name{
                color: #F0AD4E;
            }

    .testimonial.testimonial-danger-filled{
        
    }
        .testimonial.testimonial-danger-filled .testimonial-section{
                color: #fff;
                background-color: #d9534f;
                border-color: #d43f3a;
        }

            .testimonial.testimonial-danger-filled .testimonial-section:after{
                border-top-color: #D9534F;
            }

        .testimonial.testimonial-danger-filled .testimonial-desc{
            
        }

            .testimonial.testimonial-danger-filled .testimonial-desc img{
                border-color: #d43f3a;
                background-color: #D9534F;
            }

            .testimonial.testimonial-danger-filled .testimonial-writer-name{
                color: #D9534F;
            }
.material-switch > input[type="checkbox"] {
    display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}
</style>
<script>
<!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->

<!-- Latest compiled and minified JavaScript -->
</script>
<script src="boostrap.min.js"></script>
<script src="boostrap.js"></script>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="admin_keuangan/css/favicon.ico">

    <title>PSDA APLICATION</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <font color="white"><h2 class="glyphicon glyphicon-tint"><img src="css/logo.png" height="30%" class="img responsive" ></h2></font>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		  
            <li><a href="logout.php"><h5 class="glyphicon glyphicon-off"> Logout</h5></a></li>
          </ul>
        </div>
      </div>
    </nav>

    
  </body>
</html>

    

 <div class="container">
    <div class="row">
    <br>
    <br>
                            <div class="page-heading">            
                                <center><h1 class="glyphicon glyphicon-tint"><br>PSDA ADMIN DASHBOARD</h1></center>
                                <div class="options"></div>
                            </div><br>
  
 

<div class="container">






    <div class="row">
        <div class="col-xs-6 col-sm-4 col-md-3">            
            <div class="thumbnail">
                <div class="caption">
                    <h4><span class='glyphicon glyphicon-edit'></span><br>Admin Input</h4>
                    <p>Mengolah Data user dan NPA bulanan</p>
                    <p><a href="" class="label label-danger">Zoom</a>
                    <a href="admin_input/admin_input/" class="label label-default">Go to</a></p>
                </div>
                <img src="css/1_<?echo"$data[warna]";?>.png" alt="..." class="img responsive" height="230" width="180">
            </div>
        </div>
      
        <div class="col-xs-6 col-sm-4 col-md-3">            
            <div class="thumbnail">
                <div class="caption">
                    <h4><span class='glyphicon glyphicon-usd'></span><br>Admin Keuangan</h4>
                    <p>Mengolah data keuangan serta pembayaran user</p>
                    <p><a href="" class="label label-danger">Zoom</a>
                    <a href="admin_keuangan/" class="label label-default">Go to</a></p>
                </div>
                <img src="css/2_<?echo"$data[warna]";?>.png" alt="..." class="img responsive" height="230" width="180">
            </div>
        </div>

        <div class="col-xs-6 col-sm-4 col-md-3">            
            <div class="thumbnail">
                <div class="caption">
                    <h4><span class='glyphicon glyphicon-calendar'></span><br>Admin Sartek</h4>
                    <p>Mengolah data keuangan serta pembayaran perpanjangan user</p>
                    <p><a href="" class="label label-danger">Zoom</a>
                    <a href="admin_sartek/" class="label label-default">Go to</a></p>
                </div>
                <img src="css/3_<?echo"$data[warna]";?>.png" alt="..." class="img responsive" height="230" width="180">
            </div>
        </div>

        <div class="col-xs-6 col-sm-4 col-md-3">            
            <div class="thumbnail">
                <div class="caption">
                    <h4><span class='glyphicon glyphicon-briefcase'></span><br>Admin Dinas</h4>
                    <p>Mengecek data dan mengontrol berjalannya aplikasi</p>
                    <p><a href="" class="label label-danger">Zoom</a>
                    <a href="admin_dinas/" class="label label-default">Go to</a></p>
                </div>
                <img src="css/4_<?echo"$data[warna]";?>.png" alt="..." class="img responsive" height="230" width="180">
            </div>  
        </div> 
    </div>
    
    <div class="row">
        <div class="col-xs-12 text-center">
            <span class="glyphicon glyphicon-user"></span> Untuk penggantian account <a href="">Silahkan kirim <span class="glyphicon glyphicon-envelope"></span> keluhan ke Admin Dinas</a> atau <a href=""><span class="glyphicon glyphicon-home"></span> Balai setempat</a>
        </div>
    </div>
  
</div><!-- /.container -->
    <br>
    <br>
    <br> 

	
	
	
	
	
    
    
    <div class="row">
    	<div class="col-md-12">
                
        </div>
    </div>
                 
      
    </div>    
</div>





<br>

<div class="container" style="padding-top:30px">
    <h1 class="text-center">Admin Activity</h1><hr>
	<div class="row">
        
<?	
$warna_query1=mysql_query("select * from warna order by color DESC");
$keuangan=mysql_query("select * from user_admin where publish='publish' order by jabatan ASC limit 0,6");
while($keuangan1=mysql_fetch_array($keuangan))
{
$array_warna=mysql_fetch_array($warna_query1);
?>	
		<div class="col-sm-6">
            <div id="tb-testimonial" class="testimonial testimonial-<?echo"$array_warna[color]";?>">
                <div class="testimonial-section">
                   <p><?echo"$keuangan1[status]";?></b></p>
            	</div>
                <div class="testimonial-desc">
                    <img src="admin_input/images/admin_man.png" alt="" />
                    <div class="testimonial-writer">
                    	<div class="testimonial-writer-name">Nama :<?echo"$keuangan1[nama]";?></div>
                    	<div class="testimonial-writer-designation"><b><i>Jabatan</i></b>: <?echo"$keuangan1[jabatan]";?> </div>
                    	<div class="testimonial-writer-designation"><b><i>No Hp</i></b>: <?echo"$keuangan1[no_hp]";?> </div>
                    	<div class="testimonial-writer-designation"><b><i>Email</i></b>: <?echo"$keuangan1[email]";?> </div>
                    </div>
                </div>
            </div>   
		</div>
<?}?>
        

	</div>
    <br/>
    <br/>

	
	
	
	
	
	
	
	
	
	
    <h1 class="text-center">User Activity</h1><hr>
    <div class="row">	
	
<?	
$warna_query1=mysql_query("select * from warna order by color ASC");
$keuangan=mysql_query("select * from rekap_keuangan where konfirmasi='terbaru' order by bulan ASC limit 0,4");
while($keuangan1=mysql_fetch_array($keuangan))
{
$array_warna=mysql_fetch_array($warna_query1);
$user_activity1=mysql_fetch_array(mysql_query("select * from data_user where kode=$keuangan1[id]"));
?>	
		<div class="col-sm-6">
            <div id="tb-testimonial" class="testimonial testimonial-<?echo"$array_warna[color]";?>-filled">
                <div class="testimonial-section">
                   <b><?echo"$keuangan1[nama_perusahaan]";?></b> melakukan konfirmasi pembayaran keuangan pada tanggal <b><?echo"$keuangan1[bulan]";?></b> dengan nominal <b/>Rp.<?echo"$keuangan1[jumlah]";?></b> 
            	</div>
                <div class="testimonial-desc">
                    <img src="admin_input/images/user_man.png" alt="" />
                    <div class="testimonial-writer">
                    	<div class="testimonial-writer-name"><?echo"$keuangan1[nama_perusahaan]";?></div>
                    	<div class="testimonial-writer-designation"><b><i>status</i></b>: <?echo"$keuangan1[konfirmasi]";?> </div>
                    	<a href="admin_keuangan/index.php" class="testimonial-writer-company">Lihat selengkapnya</a>
                    </div>
                </div>
            </div>   
		</div>
<?}?>

<?	
$warna_query2=mysql_query("select * from warna order by color DESC");
$sartek_query=mysql_query("select * from rekap_sartek where konfirmasi='terbaru' order by bulan ASC limit 0,2");
while($sartek=mysql_fetch_array($sartek_query))
{
$array_warna=mysql_fetch_array($warna_query2);
$user_activity2=mysql_fetch_array(mysql_query("select * from data_user where kode=$sartek[id]"));
?>	
		<div class="col-sm-6">
            <div id="tb-testimonial" class="testimonial testimonial-<?echo"$array_warna[color]";?>-filled">
                <div class="testimonial-section">
                   <b><?echo"$sartek[nama_perusahaan]";?></b> melakukan konfirmasi pembayaran dan perpanjangan nomor sippa pada tanggal <b> <?echo"$sartek[bulan]";?> </b> dengan nominal <b> Rp.<?echo"$sartek[jumlah]";?></b> dengan <b>SIPPA</b> baru <b><?echo"$user_activity2[sippa]";?></b>
            	</div>
                <div class="testimonial-desc">
                    <img src="admin_input/images/user_man.png" alt="" />
                    <div class="testimonial-writer">
                    	<div class="testimonial-writer-name"><?echo"$sartek[nama_perusahaan]";?></div>
                    	<div class="testimonial-writer-designation"><b><i>status</i></b>: <?echo"$sartek[konfirmasi]";?> </div>
                    	<a href="admin_sartek/index.php" class="testimonial-writer-company">Lihat selengkapnya</a>
                    </div>
                </div>
            </div>   
		</div>
<?}?>
	</div>
</div>








<?
$visitor = rand(100,100000000);
$today = rand(50,1000);
$yesterday = rand(10,1000);
$lm = rand(100,1000);
?>	
			<!-- ==== SECTION DIVIDER1 -->
		<section class="section-divider textdivider divider1">
			<div class="container">
       <p><h1> </h1>
				<h2 align="top"><b>VISITOR</b><br> <?echo"$visitor";?> <br>
				Today <?echo"$today";?> Yesterday <?echo"$yesterday";?> Last Month <?echo"$lm";?></h2>
				</b></p></div><!-- container -->
		</section><!-- section -->
	<br>
	<center>
		<div id="footerwrap">
			<div class="container">
			     <h5><b><a href="http://psdabandung.com">HOME</a> | <a href="http://psdabandung.com">DISCLAIMER</a></b></h5>
				<h5> &copy Copyright <?$a=date("Y");echo"$a";?> <a href="http://psdabandung.com"><i><b>PSDA BANDUNG</b></i></a>  All right reserved. Manage & Developed by <a href="http://flatstudioweb.com"><i><b><i class="glyphicon glyphicon-gift"><b>FlatStudioWeb</b></i></b></i></a></h5>
			</div>
		</div>
	</center>

<?}?>