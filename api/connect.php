<?php 
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$databasename = "newsapp";

	$conn = mysqli_connect($hostname,$username,$password,$databasename);
	mysqli_query($conn,"SET NAMES 'utf8'");

    // Check connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    // echo "Connected successfully";
?>