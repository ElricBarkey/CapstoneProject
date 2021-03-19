<?php

//Turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if($_POST['confirmBox'] == 'on'){

    $sql = "UPDATE `relatives` SET `lName`='".$_POST['lName']."',`fName`='".$_POST['fName']."',
    `relationship`='".$_POST['relationship']."',`comment_`='".$_POST['notes']."' 
    WHERE `clientID`='".$_SESSION['ClientID']."';";
    echo '<script>alert("database updated!")</script>';
    echo $sql;
    mysqli_query($cnxn, $sql);

    if($_POST['newNumber'] != 'newNumber' && $_POST['newContactType'] != 'newContactType'){
        $sql = "INSERT INTO `contacts`(`ID`, `CaseID`, `description`) VALUES ('"."', '"."', '".$_POST['newContactType'].$_POST['newNumber']."');";
    }
}
?>
<!-- look into inserting php if-thens into form. Think I can make it tab between forms -->

<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset id="#r" class="form-group"><!-- gets first name, last name, and email -->
        <legend>Relatives</legend>
        <div class='row'>
            <div class='col-sm-3'>
                <p>Last Name</p>
            </div>
            <div class='col-sm-3'>
                <p>First Name</p>
            </div>
            <div class='col-sm-3'>
                <p>Relationship</p>
            </div>
            <div class='col-sm-3'>
                <p>notes</p>
            </div>
        </div>
        <?php
        //Define a query
        if((isset($_SESSION['fSearch'])) && isset($_SESSION['lSearch'])) {
            $sql = "SELECT `clientID` FROM clients WHERE `fName` = '" . $_SESSION['fSearch'] . "' AND `lName` = '" . $_SESSION['lSearch'] . "';";
            $result = mysqli_query($cnxn, $sql);
            foreach ($result as $row) {
                $_SESSION['ClientID'] = $row['ClientID'];
            }
        }

        $sql = "SELECT * FROM clients WHERE `clientID`='".$_SESSION['ClientID']."';";
        //Send the query to the db
        $result = mysqli_query($cnxn, $sql);

        $sql = "SELECT * FROM relatives WHERE `clientID`='".$_SESSION['ClientID']."';";

        //Send the query to the db
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        foreach ($result as $row) {
            $lastName = $row['lName'];
            $firstName = $row['fName'];
            $relationship = $row['relationship'];
            $comment = $row['comment_'];

            echo "
                <div class='row'>
                    <div class='col-sm-3'>
                        <input type=\"text\" class=\"form - control\" id=\"lName\" name=\"lName\" value=\"$lastName\">
                    </div>
                    <div class='col-sm-3'>
                        <input type=\"text\" class=\"form - control\" id=\"fName\" name=\"fName\" value=\"$firstName\">
                    </div>
                    <div class='col-sm-3'>
                        <input type=\"text\" class=\"form - control\" id=\"relationship\" name=\"relationship\" value=\"$relationship\">
                    </div>
                    <div class='col-sm-3'>
                        <textarea rows='4' cols='30'>$comment</textarea>
                    </div>
                </div>";
        }
        ?>
        <hr>
        <div style='' class='row'>
            <div class='col-sm-3'>
                <input type="text" class="form-control" id="newLastName" name="newLastName" value="newLastName">
            </div>
            <div class='col-sm-3'>
                <input type="text" class="form-control" id="newFirstName" name="newFirstName" value="newFirstName">
            </div>
            <div class='col-sm-3'>
                <input type="text" class="form-control" id="newRelationship" name="newRelationship" value="newRelationship">
            </div>
            <div class='col-sm-3'>
                <textarea rows='4' cols='30'>
                </textarea>
            </div>
        </div>
        <label>Confirm changes?</label>
        <input type="checkbox" name="confirmBox" id="confirmBox">
        <br>
        <button type="submit">Save</button>
    </fieldset>
</form>