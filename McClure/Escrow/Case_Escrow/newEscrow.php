<?php
include('../../db.php');
$action = "add";
$escrowID = "";
$date = "";
$atty = "";
$caseID = "";
$actionID = "";
$description = "";
$checkNo = "";
$amount = "";

//See if this is an edit
if(!empty($_GET['escrowID'])){

    $escrowID = $_GET['escrowID'];
    //set a flag
    $action = "edit";

    //Query the database
    $escrowID = mysqli_real_escape_string($cnxn, $escrowID);
    $sql = "SELECT * FROM Escrow WHERE escrowID = '$escrowID'";
    $result = mysqli_query($cnxn, $sql);
    $row = mysqli_fetch_array($result);

    //Get the data from the row
    $escrowID = $row['escrowID'];
    $date = $row['date_'];
    $atty = $row['attyID'];
    $caseID = $row['caseID'];
    $actionID = $row['actionID'];
    $description = $row['description'];
    $checkNo = $row['CheckNo'];
    $amount = $row['amount'];

}

if(!empty($_GET['escrowID']) && (!empty($_GET['delete']))){

    $escrowID = $_GET['escrowID'];

    //Query the database
    $escrowID = mysqli_real_escape_string($cnxn, $escrowID);
    $sql = "DELETE FROM Escrow WHERE escrowID = '$escrowID'";
    $result = mysqli_query($cnxn, $sql);

    //Get the data from the row
    header("location: https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Controllers/caseController.php?caseTab=escrow");

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
    echo "<h3>$text Escrow</h3>";

    $url = "add-Escrow.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form method="post" id="student-form" action=<?php echo $url ?>>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control"
                   id="date" name="date" value="<?php echo $date ?>">
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
                    $clientID = $row['attorneyID'];
                    $fName = $row['first'];
                    $lName = $row['last'];

                    echo "<option value='$clientID' ";

                    //If this is the advisor of the student
                    //being updated, select it
                    if($clientID == $atty){
                        echo "selected";
                    }
                    echo ">".$lName.", ".$fName."</option>";
                }

                ?>

            </select>
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
            <label for="description">Description</label>
            <input type="text" class="form-control"
                   id="description" name="description" value="<?php echo $description ?>">
        </div>
        <div class="form-group">
            <label for="checkNo">Checking No</label>
            <input type="text" class="form-control"
                   id="checkNo" name="checkNo" value="<?php echo $checkNo ?>">
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" class="form-control"
                   id="amount" name="amount" value="<?php echo $amount ?>">
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            <?php
            echo $action  == "add" ? "Submit" : "Save Changes ";
            ?>
        </button>
    </form>
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=action">View actions</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>