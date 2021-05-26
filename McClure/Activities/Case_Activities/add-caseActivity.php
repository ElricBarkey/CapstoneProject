<?php
session_start();

include('../../db.php'); //CHANGE

$activityID = mysqli_real_escape_string($cnxn, $_POST['activityID']);
$caseID = $_SESSION['caseID'];
$clientID = $_SESSION['ClientID'];
$date = mysqli_real_escape_string($cnxn, $_POST['date']);
$atty = mysqli_real_escape_string($cnxn, $_POST['Attorney']);
$actionID = mysqli_real_escape_string($cnxn, $_POST['Action']);
$hourlyRate = mysqli_real_escape_string($cnxn, $_POST['hourlyRate']);
$timeSpent = mysqli_real_escape_string($cnxn, $_POST['timeSpent']);
$total = mysqli_real_escape_string($cnxn, $_POST['total']);
$caseCheck = mysqli_real_escape_string($cnxn, $_POST['caseCheck']);
$notes = mysqli_real_escape_string($cnxn, $_POST['notes']);
// See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE activities
            SET caseID='$caseID', date_='$date', attorney='$atty', actionID='$actionID'
            , hourlyRate='$hourlyRate', timeSpent='$timeSpent', total='$total', caseCheck='$caseCheck'
            , notes='$notes'
            WHERE activityID='".$_SESSION['activityID']."'";
}
else {// Add new activity
    $sql = "INSERT INTO activities (`caseID`,`date_`,`attorney`,`actionID`
    ,`hourlyRate`,`timeSpent`,`total`,`caseCheck`, `notes`)
        VALUES ('$caseID', '$date', '$atty', '$actionID', '$hourlyRate'
        , '$timeSpent', '$total', '$caseCheck', '$notes')";
}

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "<script>
                if(window.confirm('Activity inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Controllers/caseController.php?caseTab=activities';
                }
            </script>";
}
?>
<script>
</script>
