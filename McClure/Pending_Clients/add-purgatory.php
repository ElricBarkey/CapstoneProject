<?php
session_start();
$_SESSION['pClientID'] = $_GET['ID'];

//Connect to your database
include('../db.php'); //CHANGE

//Define a query
$sql = "SELECT * FROM `purgatory` WHERE clientID = '".$_SESSION['pClientID']."';";
$result = mysqli_query($cnxn, $sql);
$row = mysqli_fetch_array($result);

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

$fullName = $row['fName'] . " " . $row['mName'] . " " . $row['lName'];

if($_GET['save'] =='on'){

    $sql = "INSERT INTO `clients`(`clientNumber`, `clientEmail`, `lName`, `fName`, `mName`, `preferredName`,
 `salutation`, `address1`, `city`, `cState`, `zip`, `DOB`, `DOD`, `phoneNum`, `contactName`, `contactTitle`, `Referral`,
  `married`, `current_`, `sLName`, `sFName`, `sMName`, `address2`, `sCity`, `cSState`, `sZip`, `DOB2`, `DOD2`, `sPhoneNum`,
   `message`, `legalService`, `comments`) VALUES ('$clientNumber','$clientEmail','$lName','$fName','$mName','$preferredName',
   '$salutation','$address1','$city','$cState','$zip','$DOB','$DOD','$phoneNum','$contactName','$contactTitle','$Referral',
   '$married','$current','$SLName','$SFName','$SMName','$address2','$sCity','$cSState','$sZip','$DOB2','$DOD2','$sPhoneNum',
   '$message','$legalService','$comments');";
    $result = mysqli_query($cnxn, $sql);

    $sql = "DELETE FROM purgatory WHERE clientID = '". $_SESSION['pClientID'] . "';";
    $result = mysqli_query($cnxn, $sql);

    $sql = "SELECT * FROM clients ORDER BY clientID DESC LIMIT 0, 1;";
    $result = mysqli_query($cnxn, $sql);
    $row = mysqli_fetch_array($result);
    $clientID = $row['clientID'];

    $sql = "INSERT INTO `contacts`(`clientID`, `preferred`, `phone`, `email`, `name`, `description`)
    VALUE ('$clientID', 'N/A',  '$clientNumber', '$clientEmail', '$fullName', '');";
    $result = mysqli_query($cnxn, $sql);
}

else if($_GET['delete'] =='on'){
    $sql = "DELETE FROM purgatory WHERE clientID = '$clientID';";
    ECHO $sql;
    $result = mysqli_query($cnxn, $sql);
}

//Print a confirmation
if ($result) {
    if($_GET['delete'] == 'on'){
        echo "<script>
                if(window.confirm('Client deleted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php';
                }
            </script>";
    }
    else{
        echo "<script>
                if(window.confirm('Client inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php';
                }
            </script>";
    }
}