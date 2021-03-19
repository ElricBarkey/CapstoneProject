<?php

//Turn on error reporting
ini_set('display_errors', 1);
//error_reporting(E_ALL);

//check if information was edited
if($_POST['confirmBox'] == 'on'){
    //var_dump($_POST);

    $sql = "UPDATE `contacts` SET `preferred`='".$_POST['contactType']."',`phone`='".$_POST['number']."' WHERE `clientID`='".$_SESSION['ClientID']."';";
    echo '<script>alert("database updated!")</script>';
    echo $sql;
    mysqli_query($cnxn, $sql);

    if($_POST['newNumber'] != 'newNumber' && $_POST['newContactType'] != 'newContactType'){
        $sql = "INSERT INTO `contacts`(`ID`, `CaseID`, `description`) VALUES ('"."', '"."', '".$_POST['newContactType'].$_POST['newNumber']."');";
    }
}

//Define a query
if((isset($_SESSION['fSearch'])) && isset($_SESSION['lSearch'])) {
    $sql = "SELECT `ClientID` FROM `clients` WHERE `fName` = '" . $_SESSION['fSearch'] . "' AND `lName` = '" . $_SESSION['lSearch'] . "';";
    $result = mysqli_query($cnxn, $sql);
    foreach ($result as $row) {
        $_SESSION['ClientID'] = $row['ClientID'];
    }
}

$sql = "SELECT * FROM contacts WHERE `clientID`='".$_SESSION['ClientID']."';";
//echo($sql);
//Send the query to the db
$result = mysqli_query($cnxn, $sql);

?>

<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset id="#p" class="form-group"><!-- gets first name, last name, and email -->
        <div class='row'>
            <div class='col-sm-6'>
                <p>Contact Name</p>
            </div>
            <div class='col-sm-6'>
                <p>Description</p>
            </div>
        </div>
        <?php
        foreach ($result as $row) {
            $contactType = $row['preferred'];
            $number = $row['phone'];

            echo "
                    <div style='' class='row'>
                        <div class='col-sm-6'>
                            <input type=\"text\" class=\"form-control\" id=\"contactType\" name=\"contactType\" value=\"$contactType\">
                        </div>
                        <div class='col-sm-6'>
                            <input type=\"text\" class=\"form-control\" id=\"number\" name=\"number\" value=\"$number\">
                        </div>
                    </div>";
        }
        ?>
        <hr>

        <div style='' class='row'>
            <div class='col-sm-6'>
                <input type="text" class="form-control" id="$newContactType" name="newContactType" value="newContactType">
            </div>
            <div class='col-sm-6'>
                <input type="text" class="form-control" id="newNumber" name="newNumber" value="newNumber">
            </div>
        </div>

        <label>Confirm changes?</label>
        <input type="checkbox" name="confirmBox" id="confirmBox">
        <br>
        <div class="row">
            <div class="col-sm-6">
                <button type="submit">Save</button>
            </div>
            <div class="col-sm-6">
                <!--<button type="submit"><a href=""></a></button>-->
            </div>
        </div>
    </fieldset>
</form>


