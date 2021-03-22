<?php
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../../db.php');
//var_dump($_GET);
$action = "add";
$activityID = "";
$caseID = "";
$clientID = "";
$date = "";
$atty = "";
$actionID = "";
$hourlyRate = "";
$timeSpent = "";
$total = "";
$caseCheck = "";
$notes = "";

//See if this is an edit
if(!empty($_GET['activityID'])){

    //Get the SID
    $activityID = $_GET['activityID'];
    //echo $sid;

    //set a flag
    $action = "edit";

    //Query the database
    $activityID = mysqli_real_escape_string($cnxn, $activityID);
    $sql = "SELECT * FROM activities WHERE activityID = '$activityID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);

    //Get the data from the row
    $activityID['activityID'] = $row['activityID'];
    $caseID['caseID'] = $row['caseID'];
    $clientID['clientID'] = $row['clientID'];
    $date = $row['date_'];
    $atty = $row['attorney'];
    $actionID = $row['actionID'];
    $hourlyRate = $row['hourlyRate'];
    $timeSpent = $row['timeSpent'];
    $total = $row['total'];
    $caseCheck = $row['caseCheck'];
    $notes = $row['notes'];

}
if(!empty($_GET['activityID']) && (!empty($_GET['delete']))){
    //Get the SID
    $activityID = $_GET['activityID'];
    //echo $sid;

    //Query the database
    $sql = "DELETE FROM activities WHERE activityID = '$activityID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
    //echo $sql;
    //Get the data from the row
    header("http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=activities");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Action</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>

<div class="container">
    <?php
    $text = $action == "add" ? "Add a new " : "Edit ";
    echo "<h3>$text Activity</h3>";

    $url = "add-activity.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action=<?php echo $url ?> method="post">

        <div class="form-group">
            <label for="activityID">keyID</label>
            <input type="text" class="form-control"
                   id="activityID" name="activityID" value="<?php echo $activityID ?>">
        </div>
        <div class="form-group">
            <label for="caseID">CaseID</label>
            <input type="text" class="form-control"
                   id="caseID" name="caseID" value="<?php echo $caseID ?>">
        </div>

        <div class="form-group">
            <label for="clientID">clientID</label>
            <input type="text" class="form-control"
                   id="clientID" name="clientID" value="<?php echo $clientID ?>">
        </div>

        <div class="form-group">
            <label for="date">Notes</label>
            <input type="text" class="form-control"
                   id="date" name="date" value="<?php echo $date ?>">
        </div>
        <div class="form-group">
            <label for="Attorney">Attorney</label>
            <select id="Attorney" name="Attorney">
                <option value="0">--Select--</option>

                <?php

                //Write query
                $sql = "SELECT attorneyID as attorneyID, fName as last, lName as first
                            FROM attorneys";
                //Send query to database and get result
                $result = mysqli_query($cnxn, $sql);

                //Process result
                foreach ($result as $row) {

                    //Get the row data
                    $attyID = $row['attorneyID'];
                    $fName = $row['first'];
                    $lName = $row['last'];

                    echo "<option value='$clientID' ";

                    //If this is the advisor of the student
                    //being updated, select it
                    if($attyID == $atty){
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
                <option value="0">--Select--</option>

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
            <label for="hourlyRate">Hourly Rate</label>
            <input type="text" class="form-control"
                   id="hourlyRate" name="hourlyRate" value="<?php echo $hourlyRate ?>">
        </div>
        <div class="form-group">
            <label for="timeSpent">Time Spent</label>
            <input type="text" class="form-control"
                   id="timeSpent" name="timeSpent" value="<?php echo $timeSpent ?>">
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="text" class="form-control"
                   id="total" name="total" value="<?php echo $total ?>">
        </div>
        <div class="form-group">
            <label for="caseCheck">Case Check</label>
            <input type="text" class="form-control"
                   id="caseCheck" name="caseCheck" value="<?php echo $caseCheck ?>">
        </div>
        <div class="form-group">
            <label for="notes">Notes</label>
            <input type="text" class="form-control"
                   id="notes" name="notes" value="<?php echo $notes ?>">
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            <?php
            echo $action  == "add" ? "Submit" : "Save Changes ";
            ?>
        </button>
    </form>
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=keyDates">View Key Dates</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
