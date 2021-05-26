<?php
include('../db.php');
if(!empty($_GET['actionID']) && (!empty($_GET['delete']))){

    $actionID = $_GET['actionID'];

    //set a flag
    $action = "delete";

    //Query the database
    $sql = "DELETE FROM Cases WHERE caseID = '$actionID'";
    $result = mysqli_query($cnxn, $sql);

    //Get the data from the row
    header("location: https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=cases");

}