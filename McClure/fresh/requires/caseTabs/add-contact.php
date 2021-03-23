<?php
session_start();
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//var_dump($_POST);

//Connect to your database
include('../../db.php');

//Validate the data
//require ('validate.php');
//if (!validForm()) {
//    die("<p>Please click back and try again</p>");
//}

//Get the form data and "escape" it
$contactID = mysqli_real_escape_string($cnxn, $_POST['ContactID']);
$caseID = mysqli_real_escape_string($cnxn, $_POST['caseID']);
$clientID = mysqli_real_escape_string($cnxn, $_POST['clientID']);
$preferred = mysqli_real_escape_string($cnxn, $_POST['contactType']);
$phone = mysqli_real_escape_string($cnxn, $_POST['number']);
$email = mysqli_real_escape_string($cnxn, $_POST['email']);
$name = mysqli_real_escape_string($cnxn, $_POST['name']);
$description = mysqli_real_escape_string($cnxn, $_POST['description']);

$clientID = $_SESSION['ClientID'];
//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE contacts
            SET caseID='$caseID', clientID='$clientID', preferred='$preferred', phone='$phone', email='$email'
            , name='$name', description='$description'
            WHERE contactID='".$_SESSION['contactID']."'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO contacts (`caseID`,`clientID`,`preferred`,`phone`,`email`,`name`,`description`)
        VALUES ('$caseID', '$clientID', '$preferred', '$phone', '$email', '$name', '$description')";
}
//echo $sql;

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "Student inserted successfully!";
    echo '<a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=contacts">View actions</a>';
}
