<?php

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
$clientID = mysqli_real_escape_string($cnxn, $_POST['clientID']);
$clientName = mysqli_real_escape_string($cnxn, $_POST['clientNumber']);
$clientEmail = mysqli_real_escape_string($cnxn, $_POST['clientEmail']);
$lName = mysqli_real_escape_string($cnxn, $_POST['lName']);
$fName = mysqli_real_escape_string($cnxn, $_POST['fName']);
$mName = mysqli_real_escape_string($cnxn, $_POST['mName']);
$preferredName = mysqli_real_escape_string($cnxn, $_POST['preferredName']);
$salutation = mysqli_real_escape_string($cnxn, $_POST['salutation']);
$address1 = mysqli_real_escape_string($cnxn, $_POST['address1']);
$city = mysqli_real_escape_string($cnxn, $_POST['city']);
$cState = mysqli_real_escape_string($cnxn, $_POST['cState']);
$zip = mysqli_real_escape_string($cnxn, $_POST['zip']);
$DOB = mysqli_real_escape_string($cnxn, $_POST['DOB']);
$DOD = mysqli_real_escape_string($cnxn, $_POST['DOD']);
$phoneNum = mysqli_real_escape_string($cnxn, $_POST['phoneNum']);
$contactName = mysqli_real_escape_string($cnxn, $_POST['contactName']);
$contactTitle = mysqli_real_escape_string($cnxn, $_POST['contactTitle']);
$Referral = mysqli_real_escape_string($cnxn, $_POST['Referral']);
$married = mysqli_real_escape_string($cnxn, $_POST['married']);
$current = mysqli_real_escape_string($cnxn, $_POST['current']);
$SLName = mysqli_real_escape_string($cnxn, $_POST['SLName']);
$SFName = mysqli_real_escape_string($cnxn, $_POST['SFName']);
$SMName = mysqli_real_escape_string($cnxn, $_POST['SMName']);
$address2 = mysqli_real_escape_string($cnxn, $_POST['address2']);
$sCity = mysqli_real_escape_string($cnxn, $_POST['sCity_']);
$cSState = mysqli_real_escape_string($cnxn, $_POST['cSState']);
$sZip = mysqli_real_escape_string($cnxn, $_POST['sZip']);
$DOB2 = mysqli_real_escape_string($cnxn, $_POST['DOB2']);
$DOD2 = mysqli_real_escape_string($cnxn, $_POST['DOD2']);
$sPhoneNum = mysqli_real_escape_string($cnxn, $_POST['sPhoneNum']);
$message = mysqli_real_escape_string($cnxn, $_POST['message']);
$legalService = mysqli_real_escape_string($cnxn, $_POST['legalService']);
$comments = mysqli_real_escape_string($cnxn, $_POST['comments']);

//See if this is an update
if($_POST['save'] =='on'){
    $sql = "INSERT INTO `clients`(`clientNumber`, `clientEmail`, `lName`, `fName`, `mName`, `preferredName`,
 `salutation`, `address1`, `city`, `cState`, `zip`, `DOB`, `DOD`, `phoneNum`, `contactName`, `contactTitle`, `Referral`,
  `married`, `current_`, `sLName`, `sFName`, `sMName`, `address2`, `sCity`, `cSState`, `sZip`, `DOB2`, `DOD2`, `sPhoneNum`,
   `message`, `legalService`, `comments`) VALUES ('$clientName','$clientEmail','$lName','$fName','$mName','$preferredName',
   '$salutation','$address1','$city','$cState','$zip','$DOB','$DOD','$phoneNum','$contactName','$contactTitle','$Referral',
   '$married','$current','$SLName','$SFName','$SMName','$address2','$sCity','$cSState','$sZip','$DOB2','$DOD2','$sPhoneNum',
   '$message','$legalService','$comments')";

    $result = mysqli_query($cnxn, $sql);

//Write an SQL statement
    $sql = "DELETE FROM purgatory WHERE clientID = '$clientID';";
    echo$sql;
    $result = mysqli_query($cnxn, $sql);
}
else if($_POST['delete'] =='on'){
    $sql = "DELETE FROM purgatory WHERE clientID = '$clientID';";
    $result = mysqli_query($cnxn, $sql);
}

//Print a confirmation
if ($result) {
    echo "Student inserted successfully!";
    echo '<a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=purgatory">View subCategories</a>';
}
