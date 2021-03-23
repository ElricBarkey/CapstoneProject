<?php
session_start();
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//var_dump($_GET);

/*
echo "<pre>";
var_dump($_POST);
echo "</pre>";
array(6) {
    ["sid"]=>
  string(1) "a"
    ["firstName"]=>
  string(1) "b"
    ["lastName"]=>
  string(1) "c"
    ["birthdate"]=>
  string(10) "1900-02-03"
    ["gpa"]=>
  string(3) "3.5"
    ["advisor"]=>
  string(4) "none"
}
*/

//Connect to your database
include('../db.php');

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
$date_ = mysqli_real_escape_string($cnxn, $_POST['date']);
$attorney = mysqli_real_escape_string($cnxn, $_POST['Attorney']);
$actionID = mysqli_real_escape_string($cnxn, $_POST['Action']);
$hourlyRate = mysqli_real_escape_string($cnxn, $_POST['hourlyRate']);
$timeSpent = mysqli_real_escape_string($cnxn, $_POST['timeSpent']);
$total = mysqli_real_escape_string($cnxn, $_POST['total']);
$caseCheck = mysqli_real_escape_string($cnxn, $_POST['caseCheck']);

$clientID = $_SESSION['ClientID'];
//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE activities
            SET clientID='$clientID', caseID='$caseID', date_='$date_', attorney='$attorney', actionID='$actionID'
            , hourlyRate='$hourlyRate', timeSpent='$timeSpent', total='$total', caseCheck='$caseCheck'
            , notes='$notes'
            WHERE activityID='".$_SESSION['activityID']."'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO activities (`clientID`,`date_`,`attorney`,`actionID`
    ,`hourlyRate`,`timeSpent`,`total`,`caseCheck`)
        VALUES ('$clientID', '$date_', '$attorney', '$actionID', '$hourlyRate'
        , '$timeSpent', '$total', '$caseCheck')";
}
echo $sql;

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "Student inserted successfully!";
    echo '<a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=activities">View activities</a>';
}
