<?php
session_start();
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//var_dump($_GET);

/*
echo "<pre>";
var_dump($_POST);
echo "</pre>";
array(6) {
    ["sid"]=>
  string(1) "a"
    ["firstName"]=>
  string(1) "b"
    ["lastName"]=>
  string(1) "c"
    ["birthdate"]=>
  string(10) "1900-02-03"
    ["gpa"]=>
  string(3) "3.5"
    ["advisor"]=>
  string(4) "none"
}
*/

//Connect to your database
include('../../db.php');

//Validate the data
//require ('validate.php');
//if (!validForm()) {
//    die("<p>Please click back and try again</p>");
//}

//Get the form data and "escape" it
$categoryID = mysqli_real_escape_string($cnxn, $_POST['categoryID']);
$categoryName = mysqli_real_escape_string($cnxn, $_POST['categoryName']);
$description = mysqli_real_escape_string($cnxn, $_POST['description']);

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE category
            SET categoryName='$categoryName', description='$description'
            WHERE categoryID='".$_SESSION['categoryID']."'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO category (`categoryName`,`description`)
        VALUES ('$categoryName', '$description')";
}
//echo $sql;

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "Student inserted successfully!";
    echo '<a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=category">View actions</a>';
}
