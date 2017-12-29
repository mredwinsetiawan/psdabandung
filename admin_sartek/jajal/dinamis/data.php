<?php
	// require connection.php
	require('connection.php');

	$q = strtolower($_GET['term']);
	$query = "select * from autocomplete where judul like '%$q%' order by id asc";
	$query = mysql_query($query);
	$num = mysql_num_rows($query);
   	if($num > 0){
		while ($row = mysql_fetch_array($query)){
			$row_set[] = htmlentities(stripslashes($row[1]));
		}
		echo json_encode($row_set);
	}
?>