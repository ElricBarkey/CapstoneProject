<?php
session_start();

//Connect to your database
include('../../db.php');

//Get the form data and "escape" it
$contactID = mysqli_real_escape_string($cnxn, $_POST['ContactID']);
$caseID = mysqli_real_escape_string($cnxn, $_POST['caseID']);
$clientID = $_SESSION['ClientID'];
$preferred = mysqli_real_escape_string($cnxn, $_POST['contactType']);
$phone = mysqli_real_escape_string($cnxn, $_POST['number']);
$email = mysqli_real_escape_string($cnxn, $_POST['email']);
$name = mysqli_real_escape_string($cnxn, $_POST['name']);
$description = mysqli_real_escape_string($cnxn, $_POST['description']);

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE contacts
            SET clientID='$clientID', preferred='$preferred', phone='$phone', email='$email'
            , name='$name', description='$description', caseID='".$_SESSION['caseID']."'
            WHERE contactID='".$_SESSION['contactID']."'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO contacts (`clientID`,`preferred`,`phone`,`email`,`name`,`description`, caseID)
        VALUES ('$clientID', '$preferred', '$phone', '$email', '$name', '$description', '".$_SESSION['caseID']."')";
}

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "<script>
                if(window.confirm('Contact inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Controllers/caseController.php?caseTab=contacts';
                }
            </script>";
}