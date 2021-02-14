<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catch data</title>
</head>
<body>


<br>

<?php
require('/home/ebarkeyg/db.php');
//require('db.php');
//require ('functions.php');

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


$isValid = true;

var_dump($_POST);
echo '<br>';

//Get the form data
if (!empty($_REQUEST['firstName']))//&& validName($_REQUEST['firstName']
{
    $fname = $_POST['firstName'];
}
else
{
    echo '<h1>Please enter your first name.</h1><br>';
    $isValid = false;
}

if (!empty($_REQUEST['lastName']))
{
    $lname = $_POST['lastName'];
}
else
{
    echo '<h1>Please enter your last name.</h1><br>';
    $isValid = false;
}

echo '<h1>' . $fname . '</h1><br>';
echo '<h1>' . $lname . '</h1><br>';



/*
//Validate email address
if (!empty($_REQUEST['emailN']))
{
    if (filter_var($_POST['emailN'], FILTER_VALIDATE_EMAIL))
    {
        $email =  $_POST['emailN'];
    }
    else
    {
        echo '<h1>Invalid email address.<br></h1>';
        $isValid = false;
    }
}


if (isset($_REQUEST['emailcheck']))
{
    $mailing = true;
    if (!empty($_REQUEST['emailN']))
    {
        if (filter_var($_POST['emailN'], FILTER_VALIDATE_EMAIL))
        {
            $email =  $_POST['emailN'];
        }
        else
        {
            $isValid = false;
        }
    }

    else
    {
        echo '<h1>Please enter a email address.</h1><br>';
        $isValid = false;
    }
}
else
{
    $mailing = false;
}





if (!empty($_REQUEST['messages']))
{
    $message = $_POST['messages'];
}
else
{
    $message = "";
}

$radiobtn = $_POST['method'];

$timestamp = getdate();


if ($isValid)
{
    echo '<h1>Thanks for being part of my guest book</h1>';
    //Make the query
    $q = "INSERT INTO guestbook (firstName, lastName, email, linkedin, mailingList, jobTitle, message, met, company, mailingType)
                  VALUES ('$fname', '$lname', '$email', '$url','$mailing', '$jobTitle','$message','$met','$company', '$radiobtn')";


    //Send the query to the db
    $result = mysqli_query($cnxn, $q);


    echo '<p>' . 'Name: '. $fname . ' ' . $lname . '<br>' .
        'Email: '. $email .'<br>'.'Linkedin: '. $url . '<br>'.
        'How we meet: ' . $met .'<br>' . 'Mailing List: '. $mailing.'<br>'
        . 'Job Title: '. $jobTitle .'<br>'. 'Message: '. $message .'<br>'. 'Company: ' . $company .'<br>'.
        'Mailing Type: '. $radiobtn. '</p>';
}
*/

?>
</body>
</html>