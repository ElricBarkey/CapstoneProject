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
$subCategoryID = mysqli_real_escape_string($cnxn, $_POST['subCategoryID']);
$categoryID = mysqli_real_escape_string($cnxn, $_POST['categoryID']);
$subCategoryName = mysqli_real_escape_string($cnxn, $_POST['subCategoryName']);
$subCategoryDescription = mysqli_real_escape_string($cnxn, $_POST['subCategoryDescription']);

//See if this is an update
if(isset($_GET['action'])){
    $sql = "UPDATE subCategory
            SET categoryID='$categoryID', subCategoryName='$subCategoryName', subCategoryDescription='$subCategoryDescription'
            WHERE subCategoryID='".$_SESSION['subCatID']."'";
}
else {
//Write an SQL statement
    $sql = "INSERT INTO subCategory (`categoryID`,`subCategoryName`,`subCategoryDescription`)
        VALUES ('$categoryID', '$subCategoryName', '$subCategoryDescription')";
}

//Send the query to the database
$result = mysqli_query($cnxn, $sql);

//Print a confirmation
if ($result) {
    echo "<script>
                if(window.confirm('Subcategory inserted successfully!')){
                    window.location.href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=subCategory';
                }
            </script>";
}