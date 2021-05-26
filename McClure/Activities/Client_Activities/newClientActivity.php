<?php
session_start();
//connect to db
include('../../db.php'); //CHANGE

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

    $caseID = $_GET['subCategoryID'];

    //set a flag
    $action = "edit";

    //Query the database
    $caseID = mysqli_real_escape_string($cnxn, $caseID);
    $sql = "SELECT * FROM actions WHERE actionID = '$caseID'";
    $result = mysqli_query($cnxn, $sql);
    $row = mysqli_fetch_array($result);

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

    $activityID = $_GET['subCategoryID'];

    //Query the database
    $activityID = mysqli_real_escape_string($cnxn, $activityID);
    $sql = "DELETE FROM activities WHERE activityID = '$activityID'";
    $result = mysqli_query($cnxn, $sql);
    header("location: https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=activities");

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
    echo "<h3>$text Activity</h3>";

    $url = "add-Activity.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action=<?php echo $url ?> method="post">
        <div class="form-group">
            <label for="actionName">Date</label>
            <input type="date" class="form-control"
                   id="date" name="date" value="<?php echo $date_ ?>">
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
                    $attorneyID = $row['attorneyID'];
                    $fName = $row['first'];
                    $lName = $row['last'];

                    echo "<option value='$attorneyID' ";

                    //If this is the advisor of the student
                    //being updated, select it
                    if($attorneyID == $attorney){
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
                $sql = "SELECT actionID as ID, actionName as actionName
                            FROM actions";
                //Send query to database and get result
                $result = mysqli_query($cnxn, $sql);

                //Process result
                foreach ($result as $row) {

                    //Get the row data
                    $ID = $row['ID'];
                    $actionName = $row['actionName'];

                    echo "<option value='$ID' ";

                    //If this is the advisor of the student
                    //being updated, select it
                    if($ID == $actionID){
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
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=activities?&tab=activities">View activities</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
