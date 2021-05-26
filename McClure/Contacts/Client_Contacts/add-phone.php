<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

//Connect to your database
include('../../db.php'); // CHANGE

//Get the form data and "escape" it
$contactID = $_SESSION['contactID'];
$preferred = mysqli_real_escape_string($cnxn, $_POST['preferred']);
$phone = mysqli_real_escape_string($cnxn, $_POST['phone']);
$email = mysqli_real_escape_string($cnxn, $_POST['email']);
$name = mysqli_real_escape_string($cnxn, $_POST['name']);
$description = mysqli_real_escape_string($cnxn, $_POST['description']);

$clientID = $_SESSION['ClientID'];

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE contacts
            SET preferred='$preferred', phone='$phone', email='$email'
            , name='$name', description='$description'
            WHERE contactID='".$_SESSION['contactID']."'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO contacts (`clientID`,`preferred`,`phone`
,`email`,`name`,`description`)
        VALUES ('$clientID', '$preferred', '$phone'
        , '$email', '$name', '$description')";
}

echo $sql;
//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "<script>
                if(window.confirm('Contact inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=phones';
                }
            </script>";
}