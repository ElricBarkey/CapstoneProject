<?php
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//Connect to your database
include('../db.php'); //CHANGE

//Validate the data
//require ('validate.php');
//if (!validForm()) {
//    die("<p>Please click back and try again</p>");
//}

//Get the form data and "escape" it
$actionID = mysqli_real_escape_string($cnxn, $_POST['actionID']);
$actionName = mysqli_real_escape_string($cnxn, $_POST['actionName']);
$actionDescription = mysqli_real_escape_string($cnxn, $_POST['actionDescription']);

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE actions
            SET actionName='$actionName', actionDescription='$actionDescription'
            WHERE actionID='".$_SESSION['actionID']."'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO actions (`actionName`,`actionDescription`)
        VALUES ('$actionName', '$actionDescription')";
}
//echo $sql;

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "<script>
                if(window.confirm('Action inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=action';
                }
            </script>";
}