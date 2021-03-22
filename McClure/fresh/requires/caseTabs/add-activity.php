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
//var_dump($_POST);
//Get the form data and "escape" it
$activityID = mysqli_real_escape_string($cnxn, $_POST['activityID']);
$caseID = mysqli_real_escape_string($cnxn, $_POST['caseID']);
$clientID = mysqli_real_escape_string($cnxn, $_POST['clientID']);
$date = mysqli_real_escape_string($cnxn, $_POST['date']);
$atty = mysqli_real_escape_string($cnxn, $_POST['Attorney']);
$actionID = mysqli_real_escape_string($cnxn, $_POST['Action']);
$hourlyRate = mysqli_real_escape_string($cnxn, $_POST['hourlyRate']);
$timeSpent = mysqli_real_escape_string($cnxn, $_POST['timeSpent']);
$total = mysqli_real_escape_string($cnxn, $_POST['total']);
$caseCheck = mysqli_real_escape_string($cnxn, $_POST['caseCheck']);
$notes = mysqli_real_escape_string($cnxn, $_POST['notes']);

$caseID = $_SESSION['caseID'];
//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE activities
            SET caseID='$caseID', date_='$date', attorney='$atty', actionID='$actionID'
            , hourlyRate='$hourlyRate', timeSpent='$timeSpent', total='$total', caseCheck='$caseCheck'
            , notes='$notes'
            WHERE activityID='$activityID'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO activities (`caseID`,`date_`,`attorney`,`actionID`
    ,`hourlyRate`,`timeSpent`,`total`,`caseCheck`, `notes`)
        VALUES ('$caseID', '$date', '$atty', '$actionID', '$hourlyRate'
        , '$timeSpent', '$total', '$caseCheck', '$notes')";
}
//echo $sql;

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "Student inserted successfully!";
    echo '<a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=activities">View activities</a>';
}
