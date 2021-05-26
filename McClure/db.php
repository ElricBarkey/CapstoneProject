<?php
$database = 'bhalber1_grc';
$username = 'bhalber1_grcuser';
$password = 'Blage25@MySQL';
$hostname = 'localhost';

$cnxn = @mysqli_connect($hostname, $username, $password, $database)             //suppresses error to hide information
or die("Error connecting to database : " . mysqli_connect_error());     //terminates the script

//echo "connected";