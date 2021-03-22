<?php
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../../db.php');
//var_dump($_GET);
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

    //Get the SID
    $keyID = $_GET['keyID'];
    //echo $sid;

    //set a flag
    $action = "edit";

    //Query the database
    $keyID = mysqli_real_escape_string($cnxn, $keyID);
    $sql = "SELECT * FROM keyDates WHERE keyDate = '$keyID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);

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
    //Get the SID
    $keyID = $_GET['keyID'];
    //echo $sid;

    //Query the database
    $sql = "DELETE FROM keyDates WHERE keyDate = '$keyID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
    //echo $sql;
    //Get the data from the row
    header("location: http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=keyDates.php");

}
echo $sql;
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

    $url = "add-keyDate.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action=<?php echo $url ?> method="post">

        <div class="form-group">
            <label for="keyID">keyID</label>
            <input type="text" class="form-control"
                   id="keyID" name="keyID" value="<?php echo $keyID ?>">
        </div>
        <div class="form-group">
            <label for="caseID">CaseID</label>
            <input type="text" class="form-control"
                   id="caseID" name="caseID" value="<?php echo $caseID ?>">
        </div>

        <div class="form-group">
            <label for="date_">Date</label>
            <input type="text" class="form-control"
                   id="date_" name="date_" value="<?php echo $keyDate ?>">
        </div>

        <div class="form-group">
            <label for="notes">Notes</label>
            <input type="text" class="form-control"
                   id="notes" name="notes" value="<?php echo $keyNote ?>">
        </div>
        <div class="form-group">
            <label for="assignedTo">Assigned To</label>
            <input type="text" class="form-control"
                   id="assignedTo" name="assignedTo" value="<?php echo $assignedTo ?>">
        </div>
        <div class="form-group">
            <label for="priority">Priority</label>
            <input type="text" class="form-control"
                   id="priority" name="priority" value="<?php echo $priority ?>">
        </div>
        <div class="form-group">
            <label for="done">done?</label>
            <input type="text" class="form-control"
                   id="done" name="done" value="<?php echo $done ?>">
        </div>
        <div class="form-group">
            <label for="by">by</label>
            <input type="text" class="form-control"
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
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=keyDates">View Key Dates</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
