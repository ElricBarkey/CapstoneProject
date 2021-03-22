<?php
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../db.php');
//var_dump($_GET);
$action = "add";
$clientID = "";
$caseID = "";
$date_ = "";
$attorney = "";
$actionID = "";
$hourlyRate = "";
$timeSpent = "";
$total = "";
$caseCheck = "";
$notes = "";

//See if this is an edit
if(!empty($_GET['subCategoryID'])){

    //Get the SID
    $caseID = $_GET['subCategoryID'];
    //echo $sid;

    //set a flag
    $action = "edit";

    //Query the database
    $caseID = mysqli_real_escape_string($cnxn, $caseID);
    $sql = "SELECT * FROM actions WHERE actionID = '$caseID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);

    //Get the data from the row
    $clientID = $row['activityID'];
    $caseID = $row['caseID'];
    $date_ = $row['date_'];
    $attorney = $row['attorney'];
    $actionID = $row['actionID'];
    $hourlyRate = $row['hourlyRate'];
    $timeSpent = $row['timeSpent'];
    $total = $row['total'];
    $caseCheck = $row['caseCheck'];
    $notes = $row['notes'];

}

if(!empty($_GET['subCategoryID']) && (!empty($_GET['delete']))){
    //Get the SID
    $activityID = $_GET['subCategoryID'];
    //echo $sid;

    //Query the database
    $activityID = mysqli_real_escape_string($cnxn, $activityID);
    $sql = "DELETE FROM activities WHERE activityID = '$activityID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
    //echo $sql;
    //Get the data from the row
    header("location: http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=activities");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Activity</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>

<div class="container">
    <?php
    $text = $action == "add" ? "Add a new " : "Edit ";
    echo "<h3>$text Action</h3>";

    $url = "add-Activity.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action=<?php echo $url ?> method="post">

        <div class="form-group">
            <label for="activityID">ActivityID</label>
            <input type="text" class="form-control"
                   id="activityID" name="activityID" value="<?php echo $clientID ?>">
        </div>
        <div class="form-group">
            <label for="activityID">clientID</label>
            <input type="text" class="form-control"
                   id="clientID" name="clientID" value="<?php echo $clientID ?>">
        </div>
        <div class="form-group">
            <label for="actionID">caseID</label>
            <input type="text" class="form-control"
                   id="caseID" name="caseID" value="<?php echo $caseID ?>">
        </div>
        <div class="form-group">
            <label for="actionName">Date</label>
            <input type="text" class="form-control"
                   id="date" name="date" value="<?php echo $date_ ?>">
        </div>
        <div class="form-group">
            <label for="Attorney">Attorney</label>
            <select id="Attorney" name="Attorney">
                <option value="none">--Select--</option>

                <?php

                //Write query
                $sql = "SELECT attorneyID as attorneyID, fName as last, lName as first
                            FROM attorneys";
                //Send query to database and get result
                $result = mysqli_query($cnxn, $sql);

                //Process result
                foreach ($result as $row) {

                    //Get the row data
                    $clientID = $row['attorneyID'];
                    $fName = $row['first'];
                    $lName = $row['last'];

                    echo "<option value='$clientID' ";

                    //If this is the advisor of the student
                    //being updated, select it
                    if($clientID == $attorney){
                        echo "selected";
                    }
                    echo ">".$lName.", ".$fName."</option>";
                }

                ?>

            </select>
        </div>
        <div class="form-group">
            <label for="Action">Action</label>
            <select id="Action" name="Action">
                <option value="none">--Select--</option>

                <?php

                //Write query
                $sql = "SELECT actionID as actionID, actionName as actionName
                            FROM actions";
                //Send query to database and get result
                $result = mysqli_query($cnxn, $sql);

                //Process result
                foreach ($result as $row) {

                    //Get the row data
                    $action_ID = $row['actionID'];
                    $actionName = $row['actionName'];

                    echo "<option value='$action_ID' ";

                    //If this is the advisor of the student
                    //being updated, select it
                    if($action_ID == $actionID){
                        echo "selected";
                    }
                    echo ">".$actionName."</option>";
                }

                ?>

            </select>
        </div>
        <div class="form-group">
            <label for="lastName">Hourly rate</label>
            <input type="text" class="form-control"
                   id="hourlyRate" name="hourlyRate" value="<?php echo $hourlyRate ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Time spent</label>
            <input type="text" class="form-control"
                   id="timeSpent" name="timeSpent" value="<?php echo $timeSpent ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Total</label>
            <input type="text" class="form-control"
                   id="total" name="total" value="<?php echo $total ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Case check</label>
            <input type="text" class="form-control"
                   id="caseCheck" name="caseCheck" value="<?php echo $caseCheck ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Notes</label>
            <input type="text" class="form-control"
                   id="notes" name="notes" value="<?php echo $notes ?>">
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            <?php
            echo $action  == "add" ? "Submit" : "Save Changes ";
            ?>
        </button>
    </form>
    <?php
        echo$sql;
    ?>
    <a href="requires/index.php?&tab=activities">View activities</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
