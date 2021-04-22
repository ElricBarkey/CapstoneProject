<?php
session_start();
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../../db.php');
//var_dump($_GET);
$action = "add";
$slipID = "";
$caseID = "";
$actionID = "";
$date = "";
$atty = "";
$action = "";
$description = "";
$hourlyRate = "";
$time = "";
$slipTotal = "";

//See if this is an edit
if(!empty($_GET['slipID'])){

    //Get the SID
    $slipID = $_GET['slipID'];
    //echo $sid;

    //set a flag
    $action = "edit";

    //Query the database
    $slipID = mysqli_real_escape_string($cnxn, $slipID);
    $sql = "SELECT * FROM slips WHERE slipID = '$slipID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);

    //Get the data from the row
    $slipID = $row['slipID'];
    $caseID = $row['caseID'];
    $actionID = $row['actionID'];
    $date = $row['date_'];
    $atty = $row['attorneyID'];
    $description = $row['description'];
    $hourlyRate = $row['hourlyRate'];
    $time = $row['timeSpent'];
    $slipTotal = $row['total'];

}

if(!empty($_SESSION['slipID']) && (!empty($_GET['delete']))){
    //Get the SID
    $slipID = $_SESSION['slipID'];
    //echo $sid;

    //Query the database
    $slipID = mysqli_real_escape_string($cnxn, $slipID);
    $sql = "DELETE FROM slips WHERE slipID = '$slipID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
    echo $sql;
    //Get the data from the row
    //header("location: http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=slips?caseTab=escrow");

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
    echo "<h3>$text Slip</h3>";

    $url = "add-Slip.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action=<?php echo $url ?> method="post">

        <div class="form-group">
            <label for="caseID">CaseID</label>
            <input type="text" class="form-control"
                   id="caseID" name="caseID" value="<?php echo $caseID ?>">
        </div>
        <div class="form-group">
            <label for="actionID">Action</label>
            <select id="actionID" name="actionID">
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

                    echo "<option value='$actionID' ";

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
            <label for="date_">Date</label>
            <input type="text" class="form-control"
                   id="date_" name="date_" value="<?php echo $date ?>">
        </div>
        <div class="form-group">
            <label for="attorneyID">Attorney</label>
            <select id="attorneyID" name="attorneyID">
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
                    $attorney_ID = $row['attorneyID'];
                    $fName = $row['first'];
                    $lName = $row['last'];

                    echo "<option value='".$atty."' ";

                    //If this is the advisor of the student
                    //being updated, select it
                    if($attorney_ID == $atty){
                        echo "selected";
                    }
                    echo ">".$lName.", ".$fName."</option>";
                }

                ?>

            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control"
                   id="description" name="description" value="<?php echo $description ?>">
        </div>
        <div class="form-group">
            <label for="hourlyRate">Hourly Rate</label>
            <input type="text" class="form-control"
                   id="hourlyRate" name="hourlyRate" value="<?php echo $hourlyRate ?>">
        </div>
        <div class="form-group">
            <label for="timeSpent">Time Spent</label>
            <input type="text" class="form-control"
                   id="timeSpent" name="timeSpent" value="<?php echo $time ?>">
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="text" class="form-control"
                   id="total" name="total" value="<?php echo $slipTotal ?>">
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            <?php
            echo $action  == "add" ? "Submit" : "Save Changes ";
            ?>
        </button>
    </form>
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=action">View actions</a>
</div>
<?php

?>
<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
