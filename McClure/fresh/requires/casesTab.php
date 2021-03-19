<?php

//Turn on error reporting
ini_set('display_errors', 1);
//error_reporting(E_ALL);

//check if information was edited
if($_POST['confirmBox'] == 'on'){
    //var_dump($_POST);

    $sql = "UPDATE `clients` SET `contact`='".$_POST['contactType']."',`phoneNum`='".$_POST['number']."' WHERE `cLName`='".$_POST['lName']."';";
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);

    if($_POST['newNumber'] != 'newNumber' && $_POST['newContactType'] != 'newContactType'){
        $sql = "INSERT INTO `contacts`(`ID`, `CaseID`, `description`) VALUES ('"."', '"."', '".$_POST['newContactType'].$_POST['newNumber']."');";
    }
}

//Define a query
if((isset($_SESSION['fSearch'])) && isset($_SESSION['lSearch'])) {
    $sql = "SELECT `clientID` FROM `clients` WHERE `fName` = '" . $_SESSION['fSearch'] . "' AND `lName` = '" . $_SESSION['lSearch'] . "';";
    //echo $sql;
    $result = mysqli_query($cnxn, $sql);
    foreach ($result as $row) {
        $_SESSION['ClientID'] = $row['clientID'];
    }
}

$sql = "SELECT * FROM Cases WHERE `clientID`='".$_SESSION['ClientID']."';";
//echo($sql);
//Send the query to the db
$result = mysqli_query($cnxn, $sql);

?>

<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset id="#p" class="form-group"><!-- gets first name, last name, and email -->
        <legend>Cases</legend>
        <div class='row'>
            <div class='col-sm-6'>
                <p>Case</p>
            </div>
            <div class='col-sm-6'>
                <p>Status</p>
            </div>
        </div>
        <?php
        foreach ($result as $row) {
            $caseName = $row['caseName'];
            $status = $row['Status_'];

            $_SESSION['caseName'] = $caseName;

            echo "
                    <div style='' class='row'>
                        <div class='col-sm-4'>
                            <label type=\"text\" class=\"form-control\" id='caseName'>".$caseName."</label>
                        </div>
                        <div class='col-sm-4'>
                            <label type=\"text\" class=\"form-control\" id='status'>".$status."</label>
                        </div>
                        <div class='col-sm-4'>
                            <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=generalTab'>Edit/View case</a>
                        </div>
                    </div>";
        }
        ?>
    </fieldset>
</form>


