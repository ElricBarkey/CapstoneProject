<?php
session_start();

//Connect to your database
include('../../db.php'); //CHANGE

$date_ = mysqli_real_escape_string($cnxn, $_POST['date']);
$attorney = mysqli_real_escape_string($cnxn, $_POST['Attorney']);
$actionID = mysqli_real_escape_string($cnxn, $_POST['Action']); //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!hardcoded for now vvv
$hourlyRate = mysqli_real_escape_string($cnxn, $_POST['hourlyRate']);
$timeSpent = mysqli_real_escape_string($cnxn, $_POST['timeSpent']);
$total = mysqli_real_escape_string($cnxn, $_POST['total']);
$caseCheck = mysqli_real_escape_string($cnxn, $_POST['caseCheck']);
$notes = mysqli_real_escape_string($cnxn, $_POST['notes']);

$clientID = $_SESSION['ClientID'];

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE activities
            SET clientID='$clientID', date_='$date_', attorney='$attorney', actionID='$actionID'
            , hourlyRate='$hourlyRate', timeSpent='$timeSpent', total='$total', caseCheck='$caseCheck'
            , notes='$notes'
            WHERE activityID='".$_SESSION['activityID']."'";
}
else {// Add new activity
    $sql = "INSERT INTO activities (`clientID`,`date_`,`attorney`,`actionID`
    ,`hourlyRate`,`timeSpent`,`total`,`caseCheck`)
        VALUES ('$clientID', '$date_', '$attorney', '$actionID', '$hourlyRate'
        , '$timeSpent', '$total', '$caseCheck')";
}

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "<script>
                if(window.confirm('Activity inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=activities';
                }
            </script>";
}