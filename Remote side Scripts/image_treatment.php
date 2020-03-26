<?php
    $var = mysqli_connect("localhost", "root", "");
    mysqli_select_db($var, "project") or die(mysqli_error());
	$image_patno = $_GET['patno'];
    $sql = "Select xray from treatment where patno=$image_patno" ;
    $resultset = mysqli_query($var, "$sql") or die("Invalid query: " . mysqli_error());
	$row = mysqli_fetch_array($resultset);
	header('Content-type: image/jpeg');
	echo $row[0];
   	mysqli_close($var);
?>

