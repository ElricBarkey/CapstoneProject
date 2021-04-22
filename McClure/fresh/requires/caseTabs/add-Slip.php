<?php
session_start();
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
$slipID = $_POST['slipID'];
$actionID = $_POST['actionID'];
$attorneyID = $_POST['attorneyID'];
$rate = $_POST['hourlyRate'];
$timeSpent = $_POST['timeSpent'];
$total = $_POST['total'];
$description = $_POST['description'];

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE slips
            SET actionID='$actionID', attorneyID='$attorneyID', date_='$date', hourlyRate='$rate', timeSpent='$timeSpent'
            , total='$total', description='$description'
            WHERE slipID='".$_SESSION['slipID']."'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO slips (`actionID`,`attorneyID`,`date_`,`hourlyRate`,`timeSpent`,`total`,`description`)
        VALUES ('$actionID', '$attorneyID', '$date', '$rate', '$timeSpent', '$total', '$description')";
}
echo $sql;

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "Student inserted successfully!";
    echo '<a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=slips?&ownerTab=action">View actions</a>';
}
