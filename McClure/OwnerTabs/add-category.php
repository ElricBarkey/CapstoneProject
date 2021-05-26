<?php
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//Connect to your database
include('../db.php');

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
    echo "<script>
                if(window.confirm('Category inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=category';
                }
            </script>";
}