<?php
session_start();
if(!isset($_SESSION['username_admin_1']) AND !isset($_SESSION['password_admin_1'])){
header('Location:login.php'); 
}else{ 
include"header.php";
$wilayah_admin=$_SESSION['wilayah_admin_1'];
?>
<center>
<div class="container">
    <div class="row">
        <div class="col-md-12">
		<center><h3><span class="fa fa-home"></h3>
    		    		<h3></span>Admin Input <?echo"$wilayah_admin";?></center></h3>

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li>
							<a href="index.php">
							<span class="glyphicon glyphicon-flag"></span> Laporan Admin Lapangan </a>
						</li>
						<li>
							<a href="sudah_ter-edit.php">
						<span class="glyphicon glyphicon-ok"></span>	Rekap Data Bulan Ini </a>
						</li>
						<li class="active">
							<a href="tambah_rekap_manual.php">
						<span class="glyphicon glyphicon-plus"></span>	Tambah Rekap Manual </a>
						</li>
					</ul>
</div>
</div>
</div>
</div>
</div>


<div class="container">
      <div class="row">
	  <center><h4><b>Cari ID User</b></h4></center>
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
      </div>
 
 
 
 
	  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"align="center">Cari Perusahaan Berdasarkan ID</h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>                
                    <form method="post" action="edit_tambah_rekap_admin_lapangan.php" enctype="multipart/form-data">
                     <tr>
					 <td>
					 <center><b><h5>ID Perusahaan</b></center>
					 <input type="text" name="id" class="form-control" placeholder="ID Perusahaan" autocomplete="off"></h5>
					 Pilih & Cek Bulan (Tanggal boleh tidak sama)
					 <br>
					 <?$tg=date("d");?>
		             <select name="tanggal">
                                                                 <option value="<?echo"$tg";?>"><?echo"$tg";?></option>
                                                                 <option value="01">01</option>
                                                                 <option value="02">02</option>
                                                                 <option value="03">03</option>
                                                                 <option value="04">04</option>
                                                                 <option value="05">05</option>
                                                                 <option value="06">06</option>
                                                                 <option value="07">07</option>
                                                                 <option value="08">08</option>
                                                                 <option value="09">09</option>
                                                                 <option value="10">10</option>
                                                                 <option value="11">11</option>
                                                                 <option value="12">12</option>
                                                                 <option value="13">13</option>
                                                                 <option value="14">14</option>
                                                                 <option value="15">15</option>
                                                                 <option value="16">16</option>
                                                                 <option value="17">17</option>
                                                                 <option value="18">18</option>
                                                                 <option value="19">19</option>
                                                                 <option value="20">20</option>
                                                                 <option value="21">21</option>
                                                                 <option value="22">22</option>
                                                                 <option value="23">23</option>
                                                                 <option value="24">24</option>
                                                                 <option value="25">25</option>
                                                                 <option value="26">26</option>
                                                                 <option value="27">27</option>
                                                                 <option value="28">28</option>
                                                                 <option value="29">29</option>
                                                                 <option value="30">30</option>
                                                                 <option value="31">31</option>
									</select>
					 <select name="bulan">
                                                                 <option value="01">01</option>
                                                                 <option value="02">02</option>
                                                                 <option value="03">03</option>
                                                                 <option value="04">04</option>
                                                                 <option value="05">05</option>
                                                                 <option value="06">06</option>
                                                                 <option value="07">07</option>
                                                                 <option value="08">08</option>
                                                                 <option value="09">09</option>
                                                                 <option value="10">10</option>
                                                                 <option value="11">11</option>
                                                                 <option value="12">12</option>
									</select>
									
									<select name="tahun">
                                      <? for($i=2010;$i<=date("Y");$i++){ ?>
                                        <option><?=$i?></option>
                                      <? } ?>
                                    </select>
			
					 <center><h5><input type="submit" name="tb" class="btn btn-primary" value="Cek ID User"></h5></center></td>
                     </tr>
					</form>
					 
					 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        
                    </div>
            
          </div>
        </div>
      </div>
    </div>
        </section><!-- Close comments section-->
</center>
<?}?>