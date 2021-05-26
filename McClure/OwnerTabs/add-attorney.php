<?php
session_start();
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
echo $_SESSION['attorneyID'];
echo 'test';
//Connect to your database
include('../db.php'); //CHANGE

//Validate the data
//require ('validate.php');
//if (!validForm()) {
//    die("<p>Please click back and try again</p>");
//}

//Get the form data and "escape" it
$attorneyID = mysqli_real_escape_string($cnxn, $_POST['attorneyID']);
$fName = mysqli_real_escape_string($cnxn, $_POST['fName']);
$lName = mysqli_real_escape_string($cnxn, $_POST['lName']);
$mName = mysqli_real_escape_string($cnxn, $_POST['mName']);
$firmName = mysqli_real_escape_string($cnxn, $_POST['firmName']);
$title = mysqli_real_escape_string($cnxn, $_POST['title']);
$birthdate = mysqli_real_escape_string($cnxn, $_POST['birthDate']);
$hireDate = mysqli_real_escape_string($cnxn, $_POST['hireDate']);
$endDate = mysqli_real_escape_string($cnxn, $_POST['endDate']);
$aCurrent = mysqli_real_escape_string($cnxn, $_POST['current']);
$atAddress1 = mysqli_real_escape_string($cnxn, $_POST['address1']);
$atAddress2 = mysqli_real_escape_string($cnxn, $_POST['address2']);
$atCity = mysqli_real_escape_string($cnxn, $_POST['city']);
$atState = mysqli_real_escape_string($cnxn, $_POST['state']);
$atZip = mysqli_real_escape_string($cnxn, $_POST['zip']);
$phone = mysqli_real_escape_string($cnxn, $_POST['phone']);
$email = mysqli_real_escape_string($cnxn, $_POST['email']);
$notes = mysqli_real_escape_string($cnxn, $_POST['notes']);
$hourlyRate = mysqli_real_escape_string($cnxn, $_POST['hourlyRate']);
$reportsTo = mysqli_real_escape_string($cnxn, $_POST['reportsTo']);

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE attorneys
            SET fName='$fName', lName='$lName', mName='$mName'
            , firmName='$firmName', title='$title', birthdate='$birthdate'
            , hireDate='$hireDate', endDate='$endDate', aCurrent='$aCurrent'
            , atAddress1='$atAddress1', atAddress2='$atAddress2', atCity='$atCity'
            , atState='$atState', atZip='$atZip', phone='$phone'
            , email='$email', notes='$notes', hourlyRate='$hourlyRate'
            , reportsTo='$reportsTo' WHERE attorneyID='".$_SESSION['attorneyID']."'";
    echo $sql;
}
else {
//Write an SQL statement
    $sql = "INSERT INTO `attorneys`(`fName`, `lName`, `mName`, `firmName`, `title`, `birthdate`,
 `hireDate`, `endDate`, `aCurrent`, `atAddress1`, `atAddress2`, `atCity`, `atState`, `atZip`, `phone`, `email`, `notes`,
  `hourlyRate`, `reportsTo`) VALUES ('$fName', '$lName', '$mName', '$firmName'
  , '$title', '$birthdate', '$hireDate', '$endDate', '$aCurrent'
  , '$atAddress1', '$atAddress2', '$atCity', '$atState', '$atZip'
  , '$phone', '$email', '$notes', '$hourlyRate', '$reportsTo')";
}

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "<script>
                if(window.confirm('Attorney inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=attorneys';
                }
            </script>";
}
