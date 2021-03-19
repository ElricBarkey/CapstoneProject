<?php

//check if information was edited
if($_POST['confirmBox'] == 'on'){
    //var_dump($_POST);

    $sql = "UPDATE `activities` SET `date_`='".$_POST['date']."',`timeSpent`='".$_POST['time']."',`attorney`='".$_POST['atty']."',
`actionID`='".$_POST['action']."',`notes`='".$_POST['notes']."'
WHERE `clientID`='".$_SESSION['ClientID']."';";

    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);
}
?>
<!-- look into inserting php if-thens into form. Think I can make it tab
 between forms -->

<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset id="#a" class="form-group"><!-- gets first name, last name, and email -->
        <legend>Activities list</legend>
        <div class='row'>
            <div class='col-sm-2'>
                <p>Date/Time</p>
            </div>
            <div class='col-sm-2'>
                <p>Atty/Action</p>
            </div>
            <div class='col-sm-8'>
                <p>Activity Note</p>
            </div>
        </div>


        <?php
            //var_dump($_POST);
            //Define a query
            if((isset($_SESSION['fSearch'])) && isset($_SESSION['lSearch'])) {
                $sql = "SELECT `clientID` FROM clients WHERE `fName` = '" . $_SESSION['fSearch'] . "' AND `lName` = '" . $_SESSION['lSearch'] . "';";
                $result = mysqli_query($cnxn, $sql);
                foreach ($result as $row) {
                    $_SESSION['ClientID'] = $row['clientID'];
                }
            }

            //Define a query
            $sql = "SELECT * FROM activities WHERE `clientID`='".$_SESSION['ClientID']."';";
            //echo $sql;
            //echo $sql;
            //Send the query to the db
            $result = mysqli_query($cnxn, $sql);
            //var_dump($result);

        foreach ($result as $row) {
            $date = $row['date_'];
            $time = $row['timeSpent'];
            $atty = $row['attorney'];
            $action = $row['actionID'];
            $notes = $row['notes'];
            echo "
                <div class='row'>
                    <div class='col-sm-6'>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <input type=\"text\" class=\"form-control\" id='date' name='date' value='".$date."'>
                                </div>
                                <div class='col-sm-6'>
                                    <input type=\"text\" class=\"form-control\" id='time' name='time' value='".$time."'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <input type=\"text\" class=\"form-control\" id='atty' name='atty' value='".$atty."'>
                                </div>
                                <div class='col-sm-6'>
                                    <input type=\"text\" class=\"form-control\" id='action' name='action' value='".$action."'>
                                </div>
                            </div>
                    </div>
                    <div class='col-sm-6'>
                        <textarea rows='4' cols='50' id='notes' name='notes'>".$notes."
                        </textarea>
                    </div>
                </div>";
        }
        ?>
        <div style='' class='row'>
            <div class='col-sm-2'>
                <label for='newDate'>date</label>
                <input type="text" class="form-control" id="newDate" name="newDate" value="newDate">
            </div>
            <div class='col-sm-2'>
                <label for='newTime'>time</label>
                <input type="text" class="form-control" id="newTime" name="newTime" value="newTime">
            </div>
            <div class='col-sm-2'>
                <label for='newAtty'>atty</label>
                <input type="text" class="form-control" id="newAtty" name="newAtty" value="newAtty">
            </div>
            <div class='col-sm-2'>
                <label for='newAction'>action</label>
                <input type="text" class="form-control" id="newAction" name="newAction" value="newAction">
            </div>
            <div class='col-sm-4'>
                <label for='newActivity'>activity</label>
                <input type="text" class="form-control" id="newActivity" name="newActivity" value="newActivity">
            </div>
        </div>
        <label>Confirm changes?</label>
        <input type="checkbox" name="confirmBox" id="confirmBox">
        <br>
        <button type="submit">Save</button>
    </fieldset>
</form>

