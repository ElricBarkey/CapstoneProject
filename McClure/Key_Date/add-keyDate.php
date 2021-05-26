<?php
session_start();

//Connect to your database
include('../db.php'); //CHANGE

if(!isset($_POST['done'])){
    $_POST['done'] = 'off';
}

//Get the form data and "escape" it
$keyDate = mysqli_real_escape_string($cnxn, $_POST['keyID']);
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
            WHERE keyDate='".$_SESSION['keyID']."'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO keyDates (`caseID`,`date_`,`note`,`assignedTo`,`priority`,`done`,`by_`,`when_`)
        VALUES ('$caseID', '$date', '$note', '$assignedTo', '$priority', '$done', '$by_', '$when')";
}
//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "<script>
                if(window.confirm('KeyDate inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Controllers/caseController.php?caseTab=keyDates';
                }
            </script>";
}