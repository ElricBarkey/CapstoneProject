<?php

include('../db.php'); //CHANGE

$action = "add";
$keyID = "";
$caseID = "";
$keyDate = "";
$keyNote = "";
$assignedTo = "";
$priority = "";
$done = "";
$by = "";
$when = "";

//See if this is an edit
if(!empty($_GET['keyID'])){

    $keyID = $_GET['keyID'];

    //set a flag
    $action = "edit";

    //Query the database
    $keyID = mysqli_real_escape_string($cnxn, $keyID);
    $sql = "SELECT * FROM keyDates WHERE keyDate = '$keyID'";
    $result = mysqli_query($cnxn, $sql);
    $row = mysqli_fetch_array($result);

    //Get the data from the row
    $keyID = $row['keyDate'];
    $caseID = $row['caseID'];
    $keyDate = $row['date_'];
    $keyNote = $row['note'];
    $assignedTo = $row['assignedTo'];
    $priority = $row['priority'];
    $done = $row['done'];
    $by = $row['by_'];
    $when = $row['when_'];

}
if(!empty($_GET['keyID']) && (!empty($_GET['delete']))){

    $keyID = $_GET['keyID'];

    //Query the database
    $sql = "DELETE FROM keyDates WHERE keyDate = '$keyID'";
    $result = mysqli_query($cnxn, $sql);

    //Get the data from the row
    header("location: https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Controllers/caseController.php?caseTab=keyDates.php");

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
    echo "<h3>$text Key Date</h3>";

    $url = "add-keyDate.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form method="post" action="<?php echo $url; ?>">
        <div class="form-group">
            <label for="date_">Date</label>
            <input type="date" class="form-control"
                   id="date_" name="date_" value="<?php echo $keyDate ?>">
        </div>

        <div class="form-group">
            <label for="notes">Notes</label>
            <input type="text" class="form-control"
                   id="notes" name="notes" value="<?php echo $keyNote ?>">
        </div>
        <div class="form-group">
            <label for="assignedTo">Assigned To</label>
            <select id="assignedTo" name="assignedTo">
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
                    if($attorneyID == $assignedTo){
                        echo "selected";
                    }
                    echo ">".$lName.", ".$fName."</option>";
                }

                ?>

            </select>
        </div>
        <div class="form-group">
            <p>Priority</p>
            <label for="priority">1</label>
            <input type="radio" id="1" name="priority" value="1" <?php if($priority == '1') echo 'checked'; ?>>

            <label for="priority">2</label>
            <input type="radio" id="2" name="priority" value="2" <?php if($priority == '2') echo 'checked'; ?>>

            <label for="priority">3</label>
            <input type="radio" id="3" name="priority" value="3" <?php if($priority == '3') echo 'checked'; ?>>

        </div>
        <div class="form-group">
            <label for="done">done?</label>
            <input type="checkbox"
                   id="done" name="done" <?php if($done == 'on')echo 'checked=""' ?>>
        </div>
        <div class="form-group">
            <label for="by">by</label>
            <input type="date" class="form-control"
                   id="by" name="by" value="<?php echo $by ?>">
        </div>
        <div class="form-group">
            <label for="when">When</label>
            <input type="text" class="form-control"
                   id="when" name="when" value="<?php echo $when ?>">
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            <?php
            echo $action  == "add" ? "Submit" : "Save Changes ";
            ?>
        </button>
    </form>
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Controllers/caseController.php?caseTab=keyDates">View Key Dates</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>