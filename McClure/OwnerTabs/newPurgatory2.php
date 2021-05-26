<?php
include('../Includes/checkConflict.php');
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../db.php');
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
    //echo $sid;

    //set a flag
    $action = "edit";

    //Query the database
    $sql = "SELECT * FROM `purgatory` WHERE clientID = '".$_SESSION['pClientID']."';";
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
    header("location: https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=subCategory");

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
            <div class="form-group"><?php echo $fName ?>&nbsp</div>
            <div class="form-group"><?php echo $mName ?>&nbsp</div>
            <div class="form-group"><?php echo $lName ?></div>
        </div>
        <div class="row">
            <div class="form-group"><?php echo $clientEmail ?>&nbsp</div>
            <div class="form-group"><?php echo $clientNumber ?></div>
        </div>
        <div class="row">
            <div class="form-group"><?php echo $address1 ?>&nbsp</div>
            <div class="form-group"><?php echo $city ?>&nbsp</div>
            <div class="form-group"><?php echo $cState ?>&nbsp</div>
            <div class="form-group"><?php echo $zip ?></div>
        </div>
        <div class="row">
            <h5>Spouse</h5>
        </div>
        <div class="row">
            <div class="form-group"><?php echo $married ?>&nbsp</div>
            <div class="form-group"><?php echo $SFName ?>&nbsp</div>
            <div class="form-group"><?php echo $SMName ?>&nbsp</div>
            <div class="form-group"><?php echo $SLName ?></div>
        </div>
        <div class="row">
            <div class="form-group"><?php echo $address2 ?>&nbsp</div>
            <div class="form-group"><?php echo $sCity ?>&nbsp</div>
            <div class="form-group"><?php echo $cSState ?>&nbsp</div>
            <div class="form-group"><?php echo $sZip ?>&nbsp</div>
            <div class="form-group"><?php echo $sPhoneNum ?></div>
        </div>
        <div class="row">
            <h5>Other</h5>
        </div>
        <div class="row">
            <div class="form-group"><?php echo $message ?>&nbsp</div>
            <div class="form-group"><?php echo $legalService ?>&nbsp</div>
            <div class="form-group"><?php echo $comments ?></div>
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
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/OwnerTabs/index.php?&ownerTab=subCategory">View subCategories</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
