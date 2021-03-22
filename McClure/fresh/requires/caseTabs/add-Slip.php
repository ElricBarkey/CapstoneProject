<?php

//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//var_dump($_GET);

//Connect to your database
include('../../db.php');

//Validate the data
//require ('validate.php');
//if (!validForm()) {
//    die("<p>Please click back and try again</p>");
//}

//Get the form data and "escape" it
$slipID = mysqli_real_escape_string($cnxn, $_POST['slipID']);
$actionID = mysqli_real_escape_string($cnxn, $_POST['actionID']);
$attorneyID = mysqli_real_escape_string($cnxn, $_POST['attorneyID']);
$date = mysqli_real_escape_string($cnxn, $_POST['date_']);
$rate = mysqli_real_escape_string($cnxn, $_POST['hourlyRate']);
$timeSpent = mysqli_real_escape_string($cnxn, $_POST['timeSpent']);
$total = mysqli_real_escape_string($cnxn, $_POST['total']);
$description = mysqli_real_escape_string($cnxn, $_POST['description']);

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE slips
            SET actionID='$actionID', attorneyID='$attorneyID', date_='$date', hourlyRate='$rate', timeSpent='$timeSpent'
            , total='$total', description='$description'
            WHERE actionID='$actionID'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO slips (`actionID`,`attorneyID`,`date_`,`hourlyRate`,`timeSpent`,`total`,`description`)
        VALUES ('$actionID', '$attorneyID', '$date', '$rate', '$timeSpent', '$total', '$description')";
}
//echo $sql;

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "Student inserted successfully!";
    echo '<a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=action">View actions</a>';
}
