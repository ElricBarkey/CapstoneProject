<?php
session_start();
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../db.php');
//var_dump($_GET);
$action = "add";
$relativeID = "";
$clientID = "";
$lName = "";
$fName = "";
$mName = "";
$suffix = "";
$preferred = "";
$address1 = "";
$address2 = "";
$city = "";
$state = "";
$zip = "";
$phone = "";
$relationship = "";
$comment = "";

//See if this is an edit
if(!empty($_GET['actionID']) && (!empty($_GET['delete']))){

    //Get the SID
    $relativeID = $_GET['actionID'];
    //echo $sid;

    //set a flag
    $action = "edit";

    //Query the database
    $relativeID = mysqli_real_escape_string($cnxn, $relativeID);
    $sql = "SELECT * FROM relatives WHERE relativeID = '$relativeID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);

    //Get the data from the row
    $relativeID = $row['relativeID'];
    $clientID = $row['clientID'];
    $lName = $row['lName'];
    $fName = $row['fName'];
    $mName = $row['mName'];
    $suffix = $row['suffix'];
    $preferred = $row['preferred'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $city = $row['city'];
    $state = $row['state'];
    $zip = $row['zip'];
    $phone = $row['phone'];
    $relationship = $row['relationship'];
    $comment_ = $row['comment_'];

}
if(!empty($_GET['actionID']) && (!empty($_GET['delete']))){
    //Get the SID
    $actionID = $_GET['actionID'];
    //echo $sid;

    //set a flag
    $action = "delete";

    //Query the database
    $actionID = mysqli_real_escape_string($cnxn, $actionID);
    $sql = "DELETE FROM relatives WHERE relativeID = '$actionID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
    //Get the data from the row
    header("location: http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=relatives");

}
//echo $sql;
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
    echo "<h3>$text Relative</h3>";

    $url = "add-relative.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action=<?php echo $url ?> method="post">

        <div class="form-group">
            <label for="relativeID">Relative ID</label>
            <input type="text" class="form-control"
                   id="relativeID" name="relativeID" value="<?php echo $relativeID ?>">
        </div>
        <div class="form-group">
            <label for="clientID">Client ID</label>
            <input type="text" class="form-control"
                   id="clientID" name="clientID" value="<?php echo $clientID ?>">
        </div>
        <div class="form-group">
            <label for="lName">Last Name</label>
            <input type="text" class="form-control"
                   id="lName" name="lName" value="<?php echo $lName ?>">
        </div>
        <div class="form-group">
            <label for="fName">First Name</label>
            <input type="text" class="form-control"
                   id="fName" name="fName" value="<?php echo $fName ?>">
        </div>
        <div class="form-group">
            <label for="mName">Middle Name</label>
            <input type="text" class="form-control"
                   id="mName" name="mName" value="<?php echo $mName ?>">
        </div>
        <div class="form-group">
            <label for="suffix">Suffix</label>
            <input type="text" class="form-control"
                   id="suffix" name="suffix" value="<?php echo $suffix ?>">
        </div>
        <div class="form-group">
            <label for="preferred">Preferred</label>
            <input type="text" class="form-control"
                   id="preferred" name="preferred" value="<?php echo $preferred ?>">
        </div>
        <div class="form-group">
            <label for="address1">Address 1</label>
            <input type="text" class="form-control"
                   id="address1" name="address1" value="<?php echo $address1 ?>">
        </div>
        <div class="form-group">
            <label for="address2">Address 2</label>
            <input type="text" class="form-control"
                   id="address2" name="address2" value="<?php echo $address2 ?>">
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control"
                   id="city" name="city" value="<?php echo $city ?>">
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control"
                   id="state" name="state" value="<?php echo $state ?>">
        </div>
        <div class="form-group">
            <label for="zip">Zip</label>
            <input type="text" class="form-control"
                   id="zip" name="zip" value="<?php echo $zip ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control"
                   id="phone" name="phone" value="<?php echo $phone ?>">
        </div>
        <div class="form-group">
            <label for="relationship">Relationship</label>
            <input type="text" class="form-control"
                   id="relationship" name="relationship" value="<?php echo $relationship ?>">
        </div>
        <div class="form-group">
            <label for="comment_">Comment</label>
            <input type="text" class="form-control"
                   id="comment_" name="comment_" value="<?php echo $comment_ ?>">
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            <?php
            echo $action  == "add" ? "Submit" : "Save Changes ";
            ?>
        </button>
    </form>
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=action">View actions</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
