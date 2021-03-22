<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- My css -->
    <link href="../css/stylesForm.css" rel="stylesheet">

</head>
<body>


<?php
require('../includes/checkConfirm.php');

require('/home/ebarkeyg/db.php');
//echo "connected";


//Turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);


$isValid = true;

//var_dump($_POST);

require('validationFunctions.php');

//spouse fields
$spouseLName = null;
$spouseMI = null;
$spouseFName = null;
$address2 = null;
$spouseCity = null;
$spouseState = null;
$spouseZip = null;
$DOB2 = null;
$sPhoneNumber = null;

//other random info that is in database table

$clientNumber = 123-456-7890;
//$married = null;
//$spouse = null;//may need to fix
//$legalServices = null;
//$message= null;
//$lname = null;
//$fname = null;
//$middleInitial = null;
//$address1 = null;
//$city = null;
//$state = null;

$DOD = null;
$DOD2 = null;
$comments = null;
$current = null;
$name = null;
$nameType = null;
$preferred = null;
$salutation = null;
$contact = null;
$contactName = null;
$contactTitle= null;
$referral = null;
$contactNum = null;




//Get the form data
if (!empty($_POST['firstName']))
{
    $fname = trim($_POST['firstName']);
}
else
{
    $isValid = false;
}

if (!empty($_POST['middleName']))
{
    $middleInitial = trim($_POST['middleName']);
}
else
{
    $isValid = false;
}

if (!empty($_POST['lastName']))
{
    $lname = trim($_POST['lastName']);
}
else
{
    $isValid = false;
}

if (!empty($_POST['DOB']))
{
    $DOB = trim($_POST['DOB']);
}
else
{
    $isValid = false;
}

if (!empty($_POST['email']))
{
    $email = trim($_POST['email']);
}
else
{
    $isValid = false;
}

if (!empty($_POST['phoneNum']))
{
    $phoneNumber = trim($_POST['phoneNum']);
}
else
{
    $isValid = false;
}


if (!empty($_POST['address']))
{
    $address1 = trim($_POST['address']);
}
else
{
    $isValid = false;
}


if (!empty($_POST['city']))
{
    $city = trim($_POST['city']);
}
else
{
    $isValid = false;
}

if (!empty($_POST['state']))
{
    $state = trim($_POST['state']);
}
else
{
    $isValid = false;
}

if (!empty($_POST['zip']))
{
    $zip = trim($_POST['zip']);
}
else
{
    $isValid = false;
}


//catch married options
if (validMarriedOption($_POST['married']))
{
    $married = $_POST['married'];
}
else
{
    $isValid = false;
}



//catch if spouse is selected
if (validSpouseOption($_POST['spouse']))
{
    if ($_POST['spouse'] == "yes")
    {
        //spouse fields
        if (!empty($_POST['sFirst']))
        {
            $spouseFName = trim($_POST['sFirst']);
        }
        else
        {
            $isValid = false;
        }

        if (!empty($_POST['sMiddle']))
        {
            $spouseMI = trim($_POST['sMiddle']);
        }
        else
        {
            $isValid = false;
        }

        if (!empty($_POST['sLast']))
        {
            $spouseLName = trim($_POST['sLast']);
        }
        else
        {
            $isValid = false;
        }

        if (!empty($_POST['sDOB']))
        {
            $DOB2 = trim($_POST['sDOB']);
        }
        else
        {
            $isValid = false;
        }

        if (!empty($_POST['sEmail']))
        {
            $spouseState = trim($_POST['sEmail']);
        }
        else
        {
            $isValid = false;
        }

        if (!empty($_POST['sPhoneNum']))
        {
            $sPhoneNumber = trim($_POST['sPhoneNum']);
        }
        else
        {
            $isValid = false;
        }

        if (!empty($_POST['sAddress']))
        {
            $address2 = trim($_POST['sAddress']);
        }
        else
        {
            $isValid = false;
        }

        if (!empty($_POST['sCity']))
        {
            $spouseCity = trim($_POST['sCity']);
        }
        else
        {
            $isValid = false;
        }

        if (!empty($_POST['sState']))
        {
            $spouseState = trim($_POST['sState']);
        }
        else
        {
            $isValid = false;
        }

        if (!empty($_POST['sZip']))
        {
            $spouseZip = trim($_POST['sZip']);
        }
        else
        {
            $isValid = false;
        }
    }
}
else
{
    $spouse = null;
    $isValid = false;
}


//catch select drop down option
if (!empty(validLegalServices($_POST['legalServices'])))
{
    $legalServices = $_POST['legalServices'];
}
else
{
    $isValid = false;
}


//catch message in message box
$message = $_POST['message'];


//escape sql string
$name=mysqli_real_escape_string($cnxn,$lname);
 $fname=mysqli_real_escape_string($cnxn,$fname);
 $middleInitial=mysqli_real_escape_string($cnxn,$middleInitial);
 $preferred=mysqli_real_escape_string($cnxn,$preferred);
 $salutation=mysqli_real_escape_string($cnxn,$salutation);
 $address1=mysqli_real_escape_string($cnxn,$address1);
 $city=mysqli_real_escape_string($cnxn,$city);
 $state=mysqli_real_escape_string($cnxn,$state);
 $contact=mysqli_real_escape_string($cnxn,$contact);
 $contactTitle=mysqli_real_escape_string($cnxn,$contactTitle);
 $referral=mysqli_real_escape_string($cnxn,$referral);
 $current=mysqli_real_escape_string($cnxn,$current);
 $spouseLName=mysqli_real_escape_string($cnxn,$spouseLName);
 $spouseFName=mysqli_real_escape_string($cnxn,$spouseFName);
 $spouseMI=mysqli_real_escape_string($cnxn,$spouseMI);
 $address2=mysqli_real_escape_string($cnxn,$address2);
 $spouseCity=mysqli_real_escape_string($cnxn,$spouseCity);
 $spouseState=mysqli_real_escape_string($cnxn,$spouseState);
 $message=mysqli_real_escape_string($cnxn,$message);
 $legalServices=mysqli_real_escape_string($cnxn,$legalServices);
 $comments=mysqli_real_escape_string($cnxn,$comments);


 //if validated query table and insert info
if ($isValid)
{
    include("../includes/header.php");

    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo '<div class="container"><h1 class="justify-content-center">Thank you for contacting me</h1></div>';

    echo '<br>';
    echo '<br>';
    echo '<br>';

    include("../includes/footer.php");

    //Make the query
    $q = "INSERT INTO `purgatory` (`clientNumber`, `clientEmail`, `lName`, `fName`, `mName`, `preferredName`, `salutation`, `address1`, `city`, `cState`,
                       `zip`,`DOB`, `DOD`, `phoneNum`, `contactName`, `contactTitle`, `Referral`, `married`, `current_`, `sLName`, `sFName`, 
                       `sMName`,`address2`, `sCity`, `sState`, `sZip`, `DOB2`, `DOD2`, `sPhoneNum`, `message`, `legalService`, `comments`)
          VALUES ('$phoneNumber', '$email', '$lname', '$fname', '$middleInitial','$preferred', '$salutation', '$address1', '$city', '$state', '$zip', '$DOB',
                 '$DOD', '$contactNum', '$contactName', '$contactTitle', '$referral', '$married', '$current', '$spouseLName', '$spouseFName',
                 '$spouseMI', '$address2', '$spouseCity', '$spouseState', '$spouseZip', '$DOB2', '$DOD2', '$sPhoneNumber', '$message', '$legalServices',
                  '$comments')";

    //Send the query to the db
    $result = mysqli_query($cnxn, $q);
    //var_dump($result);
    //echo '<p>'.mysqli_error($cnxn)." ".mysqli_errno($cnxn).'</p>';

}

?>


<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../js/navFunctions.js"></script>
</body>
</html>