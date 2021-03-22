<?php
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../../db.php');
//var_dump($_GET);
$action = "add";
$attyID = "";
$fName = "";
$mName = "";
$lName = "";
$lName = "";
$firmName = "";
$title = "";
$birthDate = "";
$hireDate = "";
$endDate = "";
$current = "";
$address1 = "";
$address2 = "";
$city = "";
$state = "";
$zip = "";
$phone = "";
$email = "";
$notes = "";
$hourlyRate = "";
$reportsTo = "";

//See if this is an edit
if(!empty($_GET['attorneyID']) && (!empty($_GET['delete']))){

    //Get the SID
    $attyID = $_GET['attorneyID'];
    //echo $sid;

    //set a flag
    $action = "edit";

    //Query the database
    $attyID = mysqli_real_escape_string($cnxn, $attyID);
    $sql = "SELECT * FROM attorneys WHERE attorneyID = '$attyID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);

    //Get the data from the row
    $attyID = $row['attorneyID'];
    $fName = $row['fName'];
    $mName = $row['mName'];
    $lName = $row['lName'];
    $firmName = $row['firmName'];
    $title = $row['title'];
    $birthDate = $row['birthdate'];
    $hireDate = $row['hireDate'];
    $endDate = $row['endDate'];
    $current = $row['aCurrent'];
    $address1 = $row['atAddress1'];
    $address2 = $row['atAddress2'];
    $city = $row['atCity'];
    $state = $row['atState'];
    $zip = $row['atZip'];
    $phone = $row['phone'];
    $email = $row['email'];
    $notes = $row['notes'];
    $hourlyRate = $row['hourlyRate'];
    $reportsTo = $row['reportsTo'];

}

if(!empty($_GET['attorneyID']) && (!empty($_GET['delete']))){
    //Get the SID
    //echo'test';
    $attyID = $_GET['attorneyID'];
    //echo $sid;

    //set a flag
    $action = "delete";

    //Query the database
    $attyID = mysqli_real_escape_string($cnxn, $attyID);
    $sql = "DELETE FROM attorneys WHERE attorneyID = '$attyID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
    //echo $sql;
    //Get the data from the row
    header("location: http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=attorneys");

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
    echo "<h3>$text Attorney</h3>";

    $url = "add-attorney.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action=<?php echo $url ?> method="post">

        <div class="form-group">
            <label for="actionID">ID</label>
            <input type="text" class="form-control"
                   id="attorneyID" name="attorneyID" value="<?php echo $attyID ?>">
        </div>
        <div class="form-group">
            <label for="actionName">First name</label>
            <input type="text" class="form-control"
                   id="fName" name="fName" value="<?php echo $fName ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Middle name</label>
            <input type="text" class="form-control"
                   id="mName" name="mName" value="<?php echo $mName ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control"
                   id="lName" name="lName" value="<?php echo $lName ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Firm name</label>
            <input type="text" class="form-control"
                   id="firmName" name="firmName" value="<?php echo $firmName ?>">
        </div>
        <div class="form-group">
            <label for="lastName">title</label>
            <input type="text" class="form-control"
                   id="title" name="title" value="<?php echo $title ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Birth date</label>
            <input type="text" class="form-control"
                   id="birthDate" name="birthDate" value="<?php echo $birthDate ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Hire date</label>
            <input type="text" class="form-control"
                   id="hireDate" name="hireDate" value="<?php echo $hireDate ?>">
        </div>
        <div class="form-group">
            <label for="lastName">End date</label>
            <input type="text" class="form-control"
                   id="endDate" name="endDate" value="<?php echo $endDate ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Current</label>
            <input type="text" class="form-control"
                   id="current" name="current" value="<?php echo $current ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Address 1</label>
            <input type="text" class="form-control"
                   id="address1" name="address1" value="<?php echo $address1 ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Address 2</label>
            <input type="text" class="form-control"
                   id="address2" name="address2" value="<?php echo $address2 ?>">
        </div>
        <div class="form-group">
            <label for="lastName">City</label>
            <input type="text" class="form-control"
                   id="city" name="city" value="<?php echo $city ?>">
        </div>
        <div class="form-group">
            <label for="lastName">State</label>
            <input type="text" class="form-control"
                   id="state" name="state" value="<?php echo $state ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Zip</label>
            <input type="text" class="form-control"
                   id="zip" name="zip" value="<?php echo $zip ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Phone</label>
            <input type="text" class="form-control"
                   id="phone" name="phone" value="<?php echo $phone ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Email</label>
            <input type="text" class="form-control"
                   id="email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Notes</label>
            <input type="text" class="form-control"
                   id="notes" name="notes" value="<?php echo $notes ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Hourly rate</label>
            <input type="text" class="form-control"
                   id="hourlyRate" name="hourlyRate" value="<?php echo $hourlyRate ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Reports to</label>
            <input type="text" class="form-control"
                   id="reportsTo" name="reportsTo" value="<?php echo $reportsTo ?>">
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            <?php
            echo $action  == "add" ? "Submit" : "Save Changes ";
            ?>
        </button>

    </form>
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=attorney">View attorney</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
