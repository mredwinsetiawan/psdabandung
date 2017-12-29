<?php
session_start();
if(!isset($_SESSION['username_sartek']) AND !isset($_SESSION['password_sartek'])){
header('Location:login.php');
}else{
include"header.php";
?>
<center>
<div class="container">
    <div class="row">
        <div class="col-md-12">
    <center><h3><span class="fa fa-envelope"></h3>
        <h3></span>Broadcast Pesan</center></h3>

      <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="broadcast.php">
                            <span class="glyphicon glyphicon-send"></span> Broadcast Email & SMS</a>
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


 
<script type="text/javascript">

  function pilihan()
  {
     // membaca jumlah komponen dalam form bernama 'myform'
     var jumKomponen = document.myform.length;

     // jika checkbox 'Pilih Semua' dipilih
     if (document.myform[0].checked == true)
     {
        // semua checkbox pada data akan terpilih
        for (i=1; i<=jumKomponen; i++)
        {
            if (document.myform[i].id == "checkbox") document.myform[i].checked = true;
        }
     }
     // jika checkbox 'Pilih Semua' tidak dipilih
     else if (document.myform[0].checked == false)
        {
            // semua checkbox pada data tidak dipilih
            for (i=1; i<=jumKomponen; i++)
            {
               if (document.myform[i].id == "checkbox") document.myform[i].checked = false;
            }
        }
  }

    
    $(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });

       $('#selecctall2').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkboxs').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkboxs').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
  </script>
<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">List Tiket</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
      <center>
      <h3>Kirim Pesan Broadcast</h3>

<?
include"../koneksi.php";

if ($_GET['action'] == "del")
{
   // membaca nilai n dari hidden value
   $n = $_POST['n'];
   $mes     =   $_POST['message'];
   $userkey="9utai4";
    $passkey="psdabandung123";


   for ($i=0; $i<=$n-1; $i++)
   {
     if (isset($_POST['sms'.$i]))
     {
       $sms = $_POST['sms'.$i];
       $phone  =   $sms;
        $message=$mes;
        $url = "https://reguler.zenziva.net/apps/smsapi.php?";
        $curlHandle = curl_init();
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$phone.'&pesan='.urlencode($message));
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        $results = curl_exec($curlHandle);
        curl_close($curlHandle);
     }

     if (isset($_POST['email'.$i]))
     {
       $email = $_POST['email'.$i];
       //echo $email."<br>";

        $to      = $email;
        $subject = 'Broadcast PSDA BANDUNG';
        $message = $mes;
        $headers = 'From: admin@psdabandung.com' . "\r\n" .
            'Reply-To: admin@psdabandung.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
     }

     if (isset($_POST['pesan'.$i]))
     {
       $data = explode('|',$_POST['pesan'.$i]);
       //echo $email."<br>";
       $kode  = $data[0];
       $nama  = $data[1];
       $korwil  = $data[2];

       mysql_query("INSERT INTO `pesan_notifikasi` (`kode`, `id`, `nama_perusahaan`, `kepada`, `judul`, `pesan`, `foto1`, `tanggal_pengiriman`, `pengirim`, `status`) 
        VALUES (NULL, '$kode', '$nama', '$korwil', 'PEMBERITAHUAN', '$_POST[message]', '', NOW(), 'admin-sartek', 'belum-terbaca');");
       
      
     }
   }
}

$query = "select * from data_user";
$hasil = mysql_query($query);

// membuat form penghapusan data

echo "<form name='myform' method='post' action='".$_SERVER['PHP_SELF']."?action=del'>";

?>

<?php

echo "<table class='table'>";
?>
<thead>
 <tr class="filters">
              <th><input type='checkbox' name='pilih' onclick='pilihan()' /> EMAIL</th>
              <th><input type='checkbox' name='pilih' id='selecctall' /> SMS</th>
              <th><input type='checkbox' name='pilih2' id='selecctall2' /> PESAN</th>
              
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Wilayah" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nama Perusahaan" disabled></th>
                        <th><input type="text" class="form-control" placeholder="No Telepon" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                        
                    </tr>
</thead>
<?php
$i = 0;
echo "<tbody class='table'>";
while($data = mysql_fetch_array($hasil))
{
  echo "<tr><td><input type='checkbox' id='checkbox' name='email".$i."' value='".$data['email']."' /></td><td><input type='checkbox' class='checkbox1' id='checkbox2' name='sms".$i."' value='".$data['no_hp']."' />".$data['hp']."</td><td><input type='checkbox' class='checkboxs' id='checkboxs' name='pesan".$i."' value='".$data['kode']."|".$data['nama_perusahaan']."|".$data['korwil']."' />".$data['hp']."</td><td>".$data['kode']."</td><td colspan=2>".$data['korwil']."</td><td colspan=2>".$data['nama_perusahaan']."</td><td colspan=2>".$data['no_hp']."</td><td colspan=2>".$data['email']."</td></tr>";
  $i++;
}
echo "</tbody>";
echo "</table>";
echo "<input type='hidden' name='n' value='".$i."' />";

?>
<center>
 <textarea name="message"></textarea>
<br>
<button class='btn btn-primary'><span class="glyphicon glyphicon-bullhorn"></span> Kirim  Broadcast</button>
<?php
echo "</form>";
?>
</center>
<center>
<br>
<br>
<br>


<br>
<br>
</center>
</form>
        </div>
    </div>
</div>

<?}?>