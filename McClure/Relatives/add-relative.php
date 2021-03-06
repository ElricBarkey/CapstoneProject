<?php
session_start();

//Connect to your database
include('../db.php'); //CHANGE

//Get the form data and "escape" it
$relativeID = mysqli_real_escape_string($cnxn, $_POST['relativeID']);
$clientID = mysqli_real_escape_string($cnxn, $_POST['clientID']);
$lName = mysqli_real_escape_string($cnxn, $_POST['lName']);
$fName = mysqli_real_escape_string($cnxn, $_POST['fName']);
$mName = mysqli_real_escape_string($cnxn, $_POST['mName']);
$suffix = mysqli_real_escape_string($cnxn, $_POST['suffix']);
$preferred = mysqli_real_escape_string($cnxn, $_POST['preferred']);
$address1 = mysqli_real_escape_string($cnxn, $_POST['address1']);
$address2 = mysqli_real_escape_string($cnxn, $_POST['address2']);
$city = mysqli_real_escape_string($cnxn, $_POST['city']);
$state = mysqli_real_escape_string($cnxn, $_POST['state']);
$zip = mysqli_real_escape_string($cnxn, $_POST['zip']);
$phone = mysqli_real_escape_string($cnxn, $_POST['phone']);
$relationship = mysqli_real_escape_string($cnxn, $_POST['relationship']);
$comment_ = mysqli_real_escape_string($cnxn, $_POST['comment_']);

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE relatives
            SET clientID='$clientID', lName='$lName', lName='$fName', lName='$mName'
            , lName='$suffix', lName='$preferred', lName='$address1', lName='$address2'
            , lName='$city', lName='$state', lName='$zip', lName='$phone', lName='$relationship', lName='$comment_'
            WHERE relativeID='".$_SESSION['relativeID']."'";
}
else {
    $clientID = $_SESSION['ClientID'];
    //Write an SQL statement
    $sql = "INSERT INTO relatives (`clientID`,`lName`,`fName`
,`mName`,`suffix`,`preferred`,`address1`,`address2`
,`city`,`state`,`zip`,`phone`,`relationship`,`comment_`)
        VALUES ('$clientID', '$lName', '$fName', '$mName', '$suffix'
        , '$preferred', '$address1', '$address2', '$city'
        , '$state', '$zip', '$phone', '$relationship', '$comment_')";
}

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "<script>
                if(window.confirm('Relative inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=relatives';
                }
            </script>";
}