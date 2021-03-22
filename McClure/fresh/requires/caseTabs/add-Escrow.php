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
$escrowID = mysqli_real_escape_string($cnxn, $_POST['escrowID']);
$date = mysqli_real_escape_string($cnxn, $_POST['date']);
$atty = mysqli_real_escape_string($cnxn, $_POST['attorneyID']);
$caseID = mysqli_real_escape_string($cnxn, $_POST['caseID']);
$action = mysqli_real_escape_string($cnxn, $_POST['actionID']);
$description = mysqli_real_escape_string($cnxn, $_POST['description']);
$checkNo = mysqli_real_escape_string($cnxn, $_POST['checkNo']);
$amount = mysqli_real_escape_string($cnxn, $_POST['amount']);

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE Escrow
            SET attyID='$atty', date_='$date', actionID='$action', description='$description', CheckNo='$checkNo'
            , amount='$amount', caseID='$caseID'
            WHERE escrowID='$escrowID'";
}
else {
//Write an SQL statement
    $caseID = $_SESSION['caseID'];
    $sql = "INSERT INTO Escrow (`attyID`,`date_`,`actionID`,`description`,`CheckNo`,`amount`,`caseID`)
        VALUES ('$atty', '$date', '$action', '$description', '$checkNo', '$amount', '$caseID')";
}
//echo $sql;

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "Student inserted successfully!";
    echo '<a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=escrow">View actions</a>';
}
