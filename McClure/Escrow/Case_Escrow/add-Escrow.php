<?php
session_start();

//Connect to your database
include('../../db.php');

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
            , amount='$amount', caseID='".$_SESSION['caseID']."'
            WHERE escrowID='".$_SESSION['escrowID']."'";
}
else {
//Write an SQL statement
    $caseID = $_SESSION['caseID'];
    $sql = "INSERT INTO Escrow (`attyID`,`date_`,`actionID`,`description`,`CheckNo`,`amount`,`caseID`)
        VALUES ('$atty', '$date', '$action', '$description', '$checkNo', '$amount', '".$_SESSION['caseID']."')";
}

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "<script>
                if(window.confirm('Escrow inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Controllers/caseController.php?caseTab=escrow';
                }
            </script>";
}