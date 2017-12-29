<?php
session_start();
if(!isset($_SESSION['username_dinas']) AND !isset($_SESSION['password_dinas'])){
header('Location:login.php');
}else{
include"header.php";
?>
<style>
    
    body {
        background-color: #444;
        background: url(css/gambar.jpg);
        
    }
    .form-signin input[type="text"] {
        margin-bottom: 5px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .form-signin .form-control {
        position: relative;
        font-size: 16px;
        font-family: 'Open Sans', Arial, Helvetica, sans-serif;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .vertical-offset-100 {
        padding-top: 100px;
    }
    .img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
    margin: auto;
    }
    .panel {
    margin-bottom: 20px;
    background-color: rgba(255, 255, 255, 0.75);
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }
body {
          padding-top: 50px;
          position: relative;
      }
      
      pre {
          tab-size: 8;
      }
      
      @media screen and (max-width: 768px) {
          .side-collapse-container{
              width:100%;
              position:relative;
              left:0;
              transition:left .4s;
          }
          .side-collapse-container.out{
              left:200px;
          }
          .side-collapse {
              top:50px;
              bottom:0;
              left:0;
              width:200px;
              position:fixed;
              overflow:hidden;
              transition:width .4s;
          }
          .side-collapse.in {
              width:0;
          }
      }
</style>
</body>
        <body>
            <div class="container">
                <div class="row vertical-offset-50">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
									<br><center><h4>PILIH WILAYAH</h4></center>
                                </div>
                            </div>
                            <div class="panel-body">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
										<form method="post" action="" enctype="multipart/form-data">
                                        <button name="bt1" value="wilayah-ciliwung-cisadane" class="btn btn-lg btn-primary btn-block" id="login">Ciliwung Cisadane</button><br>
                                        <button name="bt2" value="wilayah-cisadea-cibareno" class="btn btn-lg btn-primary btn-block" id="login">Cisadea Ciberano</button><br>
                                        <button name="bt3" value="wilayah-citarum" class="btn btn-lg btn-primary btn-block" id="login">Citarum</button><br>
                                        <button name="bt4" value="wilayah-citanduy" class="btn btn-lg btn-primary btn-block" id="login">Citanduy</button><br>
                                        <button name="bt5" value="wilayah-ciwulan-cilaki" class="btn btn-lg btn-primary btn-block" id="login">Ciwulan Cilaki</button><br>
                                        <button name="bt6" value="wilayah-cimanuk-cisanggarung" class="btn btn-lg btn-primary btn-block" id="login">Cimanauk Cisanggarung</button>
										</form>
                                    </fieldset>
	
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
            </div>
<?

include"../koneksi.php";
if(isset($_POST['bt1']))
{
           $query = "update wilayah set wilayah='wilayah-ciliwung-cisadane'";
		   $sql = mysql_query($query); 
            if($sql){ 
			
			 echo"<script>alert('wilayah-ciliwung-cisadane');window.location='rekap_berjalan_ai.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
}
elseif(isset($_POST['bt2']))
{
           $query = "update wilayah set wilayah='wilayah-cisadea-cibareno'";
		   $sql = mysql_query($query); 
            if($sql){ 
			
			 echo"<script>alert('wilayah-cisadea-cibareno');window.location='rekap_berjalan_ai.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
}
elseif(isset($_POST['bt3']))
{
           $query = "update wilayah set wilayah='wilayah-citarum'";
		   $sql = mysql_query($query); 
            if($sql){ 
			
			 echo"<script>alert('wilayah-citarum');window.location='rekap_berjalan_ai.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
}
elseif(isset($_POST['bt4']))
{
           $query = "update wilayah set wilayah='wilayah-citanduy'";
		   $sql = mysql_query($query); 
            if($sql){ 
			
			 echo"<script>alert('wilayah-citanduy');window.location='rekap_berjalan_ai.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
}
elseif(isset($_POST['bt5']))
{
           $query = "update wilayah set wilayah='wilayah-ciwulan-cilaki'";
		   $sql = mysql_query($query); 
            if($sql){ 
			
			 echo"<script>alert('wilayah-ciwulan-cilaki');window.location='rekap_berjalan_ai.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
}
elseif(isset($_POST['bt6']))
{
           $query = "update wilayah set wilayah='wilayah-cimanuk-cisanggarung'";
		   $sql = mysql_query($query); 
            if($sql){ 
			
			 echo"<script>alert('wilayah-cimanuk-cisanggarung');window.location='rekap_berjalan_ai.php'</script>";
            }else{
                echo "<center><b>Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.</b></center>";
            }
}
?>		
			
<?}?>