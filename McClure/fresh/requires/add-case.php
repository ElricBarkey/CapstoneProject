<?php
include('../db.php');
if(!empty($_GET['actionID']) && (!empty($_GET['delete']))){
    //Get the SID
    $actionID = $_GET['actionID'];
    //echo $sid;

    //set a flag
    $action = "delete";

    //Query the database
    $sql = "DELETE FROM Cases WHERE caseID = '$actionID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
    //Get the data from the row
    header("location: http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=cases");

}