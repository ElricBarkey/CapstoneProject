<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catch data</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- My css -->
    <link href="css/stylesForm.css" rel="stylesheet">

</head>
<body>


<br>

<?php
//require('/home/ebarkeyg/db.php');

$database = 'ebarkeyg_grc';
$username = 'ebarkeyg_grcuser';
$password = 'Elroduke99!';
$hostname = 'localhost';

$cnxn = @mysqli_connect($hostname, $username, $password, $database)             //suppresses error to hide information
or die("Error connecting to database : " . mysqli_connect_error());     //terminates the script

//echo "connected";

//require('db.php');
//require ('functions.php');

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


$isValid = true;

//var_dump($_POST);
echo '<br>';


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

$clientNumber = 1;

$DOD = null;
$DOD2 = null;
$comments = null;
$current = null;
$name = null;
$nameType = null;
$preferred = null;
$salutation = null;
$contact = null;

$contactTitle= null;//$_POST['contactTitle'];

$referral = null;//$_POST['referral'];

$SSN = null;//$_POST['SSN'];

$SSN2 = null; //$_POST['SSN2'];




//Get the form data
if (!empty($_REQUEST['firstName']))//&& validName($_REQUEST['firstName']
{
    $fname = $_POST['firstName'];
}
else
{
    //echo '<h1>Please enter your first name.</h1><br>';
    $isValid = false;
}

if (!empty($_REQUEST['middleName']))
{
    $middleInitial = $_POST['middleName'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}

if (!empty($_REQUEST['lastName']))
{
    $lname = $_POST['lastName'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}

if (!empty($_REQUEST['DOB']))
{
    $DOB = $_POST['DOB'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}

if (!empty($_REQUEST['email']))
{
    $spouseFName = $_POST['email'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}

if (!empty($_REQUEST['phoneNum']))
{
    $phoneNumber = $_POST['phoneNum'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}


if (!empty($_REQUEST['address']))
{
    $address1 = $_POST['address'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}


if (!empty($_REQUEST['city']))
{
    $city = $_POST['city'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}

if (!empty($_REQUEST['state']))
{
    $state = $_POST['state'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}

if (!empty($_REQUEST['zip']))
{
    $zip = $_POST['zip'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}


//catch married options
if (!empty($_REQUEST['married']))
{
    $married = $_POST['married'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}



//catch if spouse is selected




if ($_REQUEST['spouse'] == "yes")
{
    //spouse fields
    if (!empty($_REQUEST['sFirst']))
    {
        $spouseFName = $_POST['sFirst'];
    }
    else
    {
        //echo '<h1>Please enter your last name.</h1><br>';
        $isValid = false;
    }

    if (!empty($_REQUEST['sMiddle']))
    {
        $spouseMI = $_POST['sMiddle'];
    }
    else
    {
        //echo '<h1>Please enter your last name.</h1><br>';
        $isValid = false;
    }

    if (!empty($_REQUEST['sLast']))
    {
        $spouseLName = $_POST['sLast'];
    }
    else
    {
        //echo '<h1>Please enter your last name.</h1><br>';
        $isValid = false;
    }

    if (!empty($_REQUEST['sDOB']))
    {
        $DOB2 = $_POST['sDOB'];
    }
    else
    {
        //echo '<h1>Please enter your last name.</h1><br>';
        $isValid = false;
    }

    if (!empty($_REQUEST['sEmail']))
    {
        $spouseState = $_POST['sEmail'];
    }
    else
    {
        //echo '<h1>Please enter your last name.</h1><br>';
        $isValid = false;
    }

    if (!empty($_REQUEST['sPhoneNum']))
    {
        $sPhoneNumber = $_POST['sPhoneNum'];
    }
    else
    {
        //echo '<h1>Please enter your last name.</h1><br>';
        $isValid = false;
    }

    if (!empty($_REQUEST['sAddress']))
    {
        $address2 = $_POST['sAddress'];
    }
    else
    {
        //echo '<h1>Please enter your last name.</h1><br>';
        $isValid = false;
    }

    if (!empty($_REQUEST['sCity']))
    {
        $spouseCity = $_POST['sCity'];
    }
    else
    {
        //echo '<h1>Please enter your last name.</h1><br>';
        $isValid = false;
    }

    if (!empty($_REQUEST['sState']))
    {
        $spouseState = $_POST['sState'];
    }
    else
    {
        //echo '<h1>Please enter your last name.</h1><br>';
        $isValid = false;
    }

    if (!empty($_REQUEST['sZip']))
    {
        $spouseZip = $_POST['sZip'];
    }
    else
    {
        //echo '<h1>Please enter your last name.</h1><br>';
        $isValid = false;
    }
}






//catch select drop down option
if (!empty($_REQUEST['legalServices']))
{
    $legalServices = $_POST['legalServices'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}


//catch message in message box
if (!empty($_REQUEST['message']))
{
    $message = $_POST['message'];
}
else
{
    //echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}














if ($isValid)
{

    echo '<div class="container"><h1 class="align-content-center">Thanks for contacting me</h1></div>';
    //Make the query/*clientID*/
    $q = "INSERT INTO `clients` (`clientNumber`, `cLName`, `cFName`, `MI`, `Preferred`, `Salutation`, `address1`, `city`, `cState`, `zip`,
                       `DOB`,`SSN`, `DOD`, `phoneNum`, `contact`, `contactTitle`, `Referral`, `married`, `cCurrent`, `cSLName`, `cSFName`, 
                       `cSMI`,`address2`, `sCity`, `cSState`, `sZip`, `DOB2`, `SSN2`, `DOD2`, `sPhoneNum`, `message`, `legalService`, `comments`)
          VALUES ('$clientNumber', '$lname', '$fname', '$middleInitial', '$preferred','$salutation', '$address1', '$city', '$state', '$zip', '$DOB',
                 '$SSN', '$DOD', '$phoneNumber', '$contact', '$contactTitle', '$referral', '$married', '$current', '$spouseLName', '$spouseFName',
                 '$spouseMI', '$address2', '$spouseCity', '$spouseState', '$spouseZip', '$DOB2', '$SSN2', '$DOD2', '$sPhoneNumber', '$message', '$legalServices',
                  '$comments')";

    //Send the query to the db
    $result = mysqli_query($cnxn, $q);
    //var_dump($result);
    //echo '<p>'.mysqli_error($cnxn)." ".mysqli_errno($cnxn).'</p>';

}


?>
</body>
</html>