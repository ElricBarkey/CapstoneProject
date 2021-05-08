<?php
session_start();
$_SESSION['pClientID'] = $_GET['ID'];
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//var_dump($_POST);
//Connect to your database
include('../db.php');

//Define a query
$sql = "SELECT * FROM `purgatory` WHERE clientID = '".$_SESSION['pClientID']."';";

$result = mysqli_query($cnxn, $sql);
//var_dump($result);
$row = mysqli_fetch_array($result);
//var_dump($row);

//Get the data from the row
$clientID = $row['clientID'];
$clientNumber = $row['clientNumber'];
$clientEmail = $row['clientEmail'];
$lName = $row['lName'];
$fName = $row['fName'];
$mName = $row['mName'];
$preferredName = $row['preferredName'];
$salutation = $row['salutation'];
$address1 = $row['address1'];
$city = $row['city'];
$cState = $row['cState'];
$zip = $row['zip'];
$DOB = $row['DOB'];
$DOD = $row['DOD'];
$phoneNum = $row['phoneNum'];
$contactName = $row['contactName'];
$contactTitle = $row['contactTitle'];
$Referral = $row['Referral'];
$married = $row['married'];
$current = $row['current_'];
$SLName = $row['sLName'];
$SFName = $row['sFName'];
$SMName = $row['sMName'];
$address2 = $row['address2'];
$sCity = $row['sCity'];
$cSState = $row['cSState'];
$sZip = $row['sZip'];
$DOB2 = $row['DOB2'];
$DOD2 = $row['DOD2'];
$sPhoneNum = $row['sPhoneNum'];
$message = $row['message'];
$legalService = $row['legalService'];
$comments = $row['comments'];

//See if this is a save
/*if($_POST['save'] =='on'){

    $sql = "INSERT INTO `clients`(`clientNumber`, `clientEmail`, `lName`, `fName`, `mName`, `preferredName`,
 `salutation`, `address1`, `city`, `cState`, `zip`, `DOB`, `DOD`, `phoneNum`, `contactName`, `contactTitle`, `Referral`,
  `married`, `current_`, `sLName`, `sFName`, `sMName`, `address2`, `sCity`, `cSState`, `sZip`, `DOB2`, `DOD2`, `sPhoneNum`,
   `message`, `legalService`, `comments`) VALUES ('$clientNumber','$clientEmail','$lName','$fName','$mName','$preferredName',
   '$salutation','$address1','$city','$cState','$zip','$DOB','$DOD','$phoneNum','$contactName','$contactTitle','$Referral',
   '$married','$current','$SLName','$SFName','$SMName','$address2','$sCity','$cSState','$sZip','$DOB2','$DOD2','$sPhoneNum',
   '$message','$legalService','$comments')";

    $result = mysqli_query($cnxn, $sql);
    $sql = "DELETE FROM purgatory WHERE clientID = '$clientID';";
    $result = mysqli_query($cnxn, $sql);
}*/
if($_GET['save'] =='on'){

    $sql = "INSERT INTO `clients`(`clientNumber`, `clientEmail`, `lName`, `fName`, `mName`, `preferredName`,
 `salutation`, `address1`, `city`, `cState`, `zip`, `DOB`, `DOD`, `phoneNum`, `contactName`, `contactTitle`, `Referral`,
  `married`, `current_`, `sLName`, `sFName`, `sMName`, `address2`, `sCity`, `cSState`, `sZip`, `DOB2`, `DOD2`, `sPhoneNum`,
   `message`, `legalService`, `comments`) VALUES ('$clientNumber','$clientEmail','$lName','$fName','$mName','$preferredName',
   '$salutation','$address1','$city','$cState','$zip','$DOB','$DOD','$phoneNum','$contactName','$contactTitle','$Referral',
   '$married','$current','$SLName','$SFName','$SMName','$address2','$sCity','$cSState','$sZip','$DOB2','$DOD2','$sPhoneNum',
   '$message','$legalService','$comments')";

    $result = mysqli_query($cnxn, $sql);
    $sql = "DELETE FROM purgatory WHERE clientID = '$clientID';";
    $result = mysqli_query($cnxn, $sql);
}
/*
else if($_POST['delete'] =='on'){
    $sql = "DELETE FROM purgatory WHERE clientID = '$clientID';";
    $result = mysqli_query($cnxn, $sql);
}
*/
else if($_GET['delete'] =='on'){
    $sql = "DELETE FROM purgatory WHERE clientID = '$clientID';";
    $result = mysqli_query($cnxn, $sql);
}

//Print a confirmation
if ($result) {
    if($_GET['delete'] == 'on'){
        echo "Client deleted successfully!";
    }
    else{
        echo "Client inserted successfully!";
    }
    echo '<a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php">View Purgatory</a>';
}
