<?php
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../../db.php');
//var_dump($_GET);
$action = "add";
$clientID = "";
$clientNumber = "";
$clientEmail = "";
$lName = "";
$fName = "";
$mName = "";
$preferredName = "";
$salutation = "";
$address1 = "";
$city = "";
$cState = "";
$zip = "";
$DOB = "";
$DOD = "";
$phoneNum = "";
$contactName = "";
$contactTitle = "";
$Referral = "";
$married = "";
$current = "";
$SLName = "";
$SFName = "";
$SMName = "";
$address2 = "";
$sCity = "";
$cSState = "";
$sZip = "";
$DOB2 = "";
$DOD2 = "";
$sPhoneNum = "";
$message = "";
$legalService = "";
$comments = "";

//See if this is an edit
if(!empty($_GET['clientID'])){
    //Get the SID
    $clientID = $_GET['clientID'];
    //echo $sid;

    //set a flag
    $action = "edit";

    //Query the database
    $clientID = mysqli_real_escape_string($cnxn, $clientID);
    $sql = "SELECT * FROM purgatory WHERE clientID = '$clientID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);

    //Get the data from the row
    $clientID = $row['clientID'];
    $clientNumber = $row['clientNumber'];
    $clientEmail = $row['clientEmail'];
    $lName = $row['lName'];
    $fName = $row['fName'];
    $mName = $row['mName'];
    $preferredName = $row['preferredName'];
    $salutation = $row['salutation'];
    $address1 = $row['address1'];
    $city = $row['city'];
    $cState = $row['cState'];
    $zip = $row['zip'];
    $DOB = $row['DOB'];
    $DOD = $row['DOD'];
    $phoneNum = $row['phoneNum'];
    $contactName = $row['contactName'];
    $contactTitle = $row['contactTitle'];
    $Referral = $row['Referral'];
    $married = $row['married'];
    $current = $row['current_'];
    $SLName = $row['sLName'];
    $SFName = $row['sFName'];
    $SMName = $row['sMName'];
    $address2 = $row['address2'];
    $sCity = $row['sCity'];
    $cSState = $row['cSState'];
    $sZip = $row['sZip'];
    $DOB2 = $row['DOB2'];
    $DOD2 = $row['DOD2'];
    $sPhoneNum = $row['sPhoneNum'];
    $message = $row['message'];
    $legalService = $row['legalService'];
    $comments = $row['comments'];

}

if(!empty($_GET['subCategoryID']) && (!empty($_GET['delete']))){
    //Get the SID
    $clientID = $_GET['clientID'];
    //echo $sid;

    //Query the database
    $clientID = mysqli_real_escape_string($cnxn, $clientID);
    $sql = "DELETE FROM purgatory WHERE subCategoryID = '$clientID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
    //echo $sql;
    //Get the data from the row
    header("location: http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=subCategory");

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
    echo "<h3>Accept/Deny</h3>";

    $url = "add-purgatory.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action="<?php echo $url ?>" method="post">
        <div class="row">
            <h5>Client</h5>
        </div>
        <div class="row">
            <div class="form-group">
                <input type="text" class="form-control"
                       id="fName" name="fName" value="<?php echo $fName ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="mName" name="mName" value="<?php echo $mName ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="lName" name="lName" value="<?php echo $lName ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input type="text" class="form-control"
                       id="clientEmail" name="clientEmail" value="<?php echo $clientEmail ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="clientNumber" name="clientNumber" value="<?php echo $clientNumber ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input type="text" class="form-control"
                       id="address1" name="address1" value="<?php echo $address1 ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="city" name="city" value="<?php echo $city ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="cState" name="cState" value="<?php echo $cState ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="zip" name="zip" value="<?php echo $zip ?>" readonly>
            </div>
        </div>
        <div class="row">
            <h5>Spouse</h5>
        </div>
        <div class="row">
            <div class="form-group">
                <input type="text" class="form-control"
                       id="married" name="married" value="<?php echo $married ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="SFName" name="SFName" value="<?php echo $SFName ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="SMName" name="SMName" value="<?php echo $SMName ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="SLName" name="SLName" value="<?php echo $SLName ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input type="text" class="form-control"
                       id="address2" name="address2" value="<?php echo $address2 ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="sCity " name="sCity " value="<?php echo $sCity ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="cSState" name="cSState" value="<?php echo $cSState ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="sZip" name="sZip" value="<?php echo $sZip ?>" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="sPhoneNum" name="sPhoneNum" value="<?php echo $sPhoneNum ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="message">Message</label>
                <input type="text" class="form-control"
                       id="message" name="message" value="<?php echo $message ?>" readonly>
            </div>
            <div class="form-group">
                <label for="legalService">Legal Service</label>
                <input type="text" class="form-control"
                       id="legalService" name="legalService" value="<?php echo $legalService ?>" readonly>
            </div>
            <div class="form-group">
                <label for="comments">Comments</label>
                <input type="text" class="form-control"
                       id="comments" name="comments" value="<?php echo $comments ?>" readonly>
            </div>
        </div>

        <label for="delete">Delete</label>
        <input id="delete" name="save" type="checkbox">
        <label for="save">Save</label>
        <input id="save" name="save" type="checkbox">
        <br>
        <button id="submit" type="submit" class="btn btn-primary">
            <?php
            echo $action  == "add" ? "Submit" : "Save Changes ";
            ?>
        </button>

    </form>
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=subCategory">View subCategories</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
