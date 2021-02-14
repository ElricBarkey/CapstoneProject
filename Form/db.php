<?php
    $database = 'ebarkeyg_grc';
    $username = 'ebarkeyg_grcuser';
    $password = 'Noodles99!';
    $hostname = 'localhost';

    $cnxn = @mysqli_connect($hostname,$username,$password,$database)             //suppresses error to hide information
        or die("Error connecting to database : " . mysqli_connect_error());     //terminates the script

?>
