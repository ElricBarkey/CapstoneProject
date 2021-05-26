<?php
session_start();

//Connect to your database
include('../db.php');

//Get the form data and "escape" it
$slipID = $_POST['slipID'];
$actionID = $_POST['actionID'];
$attorneyID = $_POST['attorneyID'];
$rate = $_POST['hourlyRate'];
$timeSpent = $_POST['timeSpent'];
$total = $_POST['total'];
$description = $_POST['description'];
$date = $_POST['date_'];

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
    echo "<script>
                if(window.confirm('Slip inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Controllers/caseController.php?caseTab=slips';
                }
            </script>";
}