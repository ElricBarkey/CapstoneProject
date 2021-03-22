<?php

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
//error_reporting(E_ALL);
//session_start();
//var_dump($_POST);

//Connect to your database
include('../../db.php');

//Validate the data
//require ('validate.php');
//if (!validForm()) {
//    die("<p>Please click back and try again</p>");
//}

//Get the form data and "escape" it
$keyDate = mysqli_real_escape_string($cnxn, $_POST['keyID']);
//$caseID = mysqli_real_escape_string($cnxn, $_POST['caseID']);
$caseID = $_SESSION['caseID'];
$date = mysqli_real_escape_string($cnxn, $_POST['date_']);
$note = mysqli_real_escape_string($cnxn, $_POST['notes']);
$assignedTo = mysqli_real_escape_string($cnxn, $_POST['assignedTo']);
$priority = mysqli_real_escape_string($cnxn, $_POST['priority']);
$done = mysqli_real_escape_string($cnxn, $_POST['done']);
$by_ = mysqli_real_escape_string($cnxn, $_POST['by']);
$when = mysqli_real_escape_string($cnxn, $_POST['when']);

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE keyDates
            SET caseID='$caseID', date_='$date', note='$note', assignedTo='$assignedTo', priority='$priority'
            , done='$done', by_='$by_', when_='$when'
            WHERE keyDate='$keyDate'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO keyDates (`caseID`,`date_`,`note`,`assignedTo`,`priority`,`done`,`by_`,`when_`)
        VALUES ('$caseID', '$date', '$note', '$assignedTo', '$priority', '$done', '$by_', '$when')";
}
//echo $sql;

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "Student inserted successfully!";
    echo '<a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=keyDates">View Key Dates</a>';
}
