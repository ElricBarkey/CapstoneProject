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
    $mName = $row['clientEmail'];
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

    <form id="student-form" action=<?php echo $url ?> method="post">

        <div class="form-group">
            <label for="clientID">ID</label>
            <input type="text" class="form-control"
                   id="clientID" name="clientID" value="<?php echo $clientID ?>">
        </div>
        <div class="form-group">
            <label for="clientNumber">Client Number</label>
            <input type="text" class="form-control"
                   id="clientNumber" name="clientNumber" value="<?php echo $clientNumber ?>">
        </div>
        <div class="form-group">
            <label for="clientEmail">Client Email</label>
            <input type="text" class="form-control"
                   id="clientEmail" name="clientEmail" value="<?php echo $clientEmail ?>">
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
            <label for="preferredName">Preferred Name</label>
            <input type="text" class="form-control"
                   id="preferredName" name="preferredName" value="<?php echo $preferredName ?>">
        </div>
        <div class="form-group">
            <label for="salutation">Salutation</label>
            <input type="text" class="form-control"
                   id="salutation" name="salutation" value="<?php echo $salutation ?>">
        </div>
        <div class="form-group">
            <label for="address1">Address 1</label>
            <input type="text" class="form-control"
                   id="address1" name="address1" value="<?php echo $address1 ?>">
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control"
                   id="city" name="city" value="<?php echo $city ?>">
        </div>
        <div class="form-group">
            <label for="cState">State</label>
            <input type="text" class="form-control"
                   id="cState" name="cState" value="<?php echo $cState ?>">
        </div>
        <div class="form-group">
            <label for="zip">Zip</label>
            <input type="text" class="form-control"
                   id="zip" name="zip" value="<?php echo $zip ?>">
        </div>
        <div class="form-group">
            <label for="DOB">Date of Birth</label>
            <input type="text" class="form-control"
                   id="DOB" name="DOB" value="<?php echo $DOB ?>">
        </div>
        <div class="form-group">
            <label for="DOD">Date of Death</label>
            <input type="text" class="form-control"
                   id="DOD" name="DOD" value="<?php echo $DOD ?>">
        </div>
        <div class="form-group">
            <label for="phoneNum">Phone Number</label>
            <input type="text" class="form-control"
                   id="phoneNum" name="phoneNum" value="<?php echo $phoneNum ?>">
        </div>
        <div class="form-group">
            <label for="contactName">Contact Name</label>
            <input type="text" class="form-control"
                   id="contactName" name="contactName" value="<?php echo $contactName ?>">
        </div>
        <div class="form-group">
            <label for="contactTitle">Contact Title</label>
            <input type="text" class="form-control"
                   id="contactTitle" name="contactTitle" value="<?php echo $contactTitle ?>">
        </div>
        <div class="form-group">
            <label for="Referral">Referral</label>
            <input type="text" class="form-control"
                   id="Referral" name="Referral" value="<?php echo $Referral ?>">
        </div>
        <div class="form-group">
            <label for="married">Married</label>
            <input type="text" class="form-control"
                   id="married" name="married" value="<?php echo $married ?>">
        </div>
        <div class="form-group">
            <label for="current">Current</label>
            <input type="text" class="form-control"
                   id="current" name="current" value="<?php echo $current ?>">
        </div>
        <div class="form-group">
            <label for="SLName">Spouse Last Name</label>
            <input type="text" class="form-control"
                   id="SLName" name="SLName" value="<?php echo $SLName ?>">
        </div>
        <div class="form-group">
            <label for="SFName">Spouse First Name</label>
            <input type="text" class="form-control"
                   id="SFName" name="SFName" value="<?php echo $SFName ?>">
        </div>
        <div class="form-group">
            <label for="SMName">Spouse Middle Name</label>
            <input type="text" class="form-control"
                   id="SMName" name="SMName" value="<?php echo $SMName ?>">
        </div>
        <div class="form-group">
            <label for="address2">Spouse Address</label>
            <input type="text" class="form-control"
                   id="address2" name="address2" value="<?php echo $address2 ?>">
        </div>
        <div class="form-group">
            <label for="sCity ">Spouse City</label>
            <input type="text" class="form-control"
                   id="sCity " name="sCity " value="<?php echo $sCity ?>">
        </div>
        <div class="form-group">
            <label for="cSState">Spouse State</label>
            <input type="text" class="form-control"
                   id="cSState" name="cSState" value="<?php echo $cSState ?>">
        </div>
        <div class="form-group">
            <label for="sZip">Spouse State</label>
            <input type="text" class="form-control"
                   id="sZip" name="sZip" value="<?php echo $sZip ?>">
        </div>
        <div class="form-group">
            <label for="DOB2">Date of Birth</label>
            <input type="text" class="form-control"
                   id="DOB2" name="DOB2" value="<?php echo $DOB2 ?>">
        </div>
        <div class="form-group">
            <label for="DOD2">Date of Date</label>
            <input type="text" class="form-control"
                   id="DOD2" name="DOD2" value="<?php echo $DOD2 ?>">
        </div>
        <div class="form-group">
            <label for="sPhoneNum">Spouse Phone Number</label>
            <input type="text" class="form-control"
                   id="sPhoneNum" name="sPhoneNum" value="<?php echo $sPhoneNum ?>">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <input type="text" class="form-control"
                   id="message" name="message" value="<?php echo $message ?>">
        </div>
        <div class="form-group">
            <label for="legalService">Legal Service</label>
            <input type="text" class="form-control"
                   id="legalService" name="legalService" value="<?php echo $legalService ?>">
        </div>
        <div class="form-group">
            <label for="comments">Comments</label>
            <input type="text" class="form-control"
                   id="comments" name="comments" value="<?php echo $comments ?>">
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
