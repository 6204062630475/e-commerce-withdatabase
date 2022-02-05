<?php
	$conn= mysqli_connect("localhost","root","","piz_db2") or die("Error: " . mysqli_error($con));
	mysqli_query($conn, "SET NAMES 'utf8' "); 
?>