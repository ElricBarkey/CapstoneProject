<?php

//check if information was edited
if($_POST['confirmBox'] == 'on'){
    //var_dump($_POST);

    $sql = "UPDATE `slips` SET `CaseComment`='".$_POST['comments']."' WHERE `clientID`='".$_SESSION['ClientID']."' AND `caseID`='".$_SESSION['caseID']."';";
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);

}
?>
<form id='form' method='post' action='#'>
    <!-- Contact Information -->
    <fieldset class=\"form-group\">
        <div class='row'>
            <div class='col-sm-2'>Date</div>
            <div class='col-sm-1'>Atty</div>
            <div class='col-sm-2'>Action</div>
            <div class='col-sm-3'>Description</div>
            <div class='col-sm-1'>Hourly Rate</div>
            <div class='col-sm-1'>Time</div>
            <div class='col-sm-1'>Amount</div>
            <div class='col-sm-1'>Slip Total</div>
        </div>
        <?php

        //Define a query
        $sql = "SELECT * FROM `Cases`"; //going to have to write a join select and update

        //Send the query to the db
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        foreach ($result as $row) {
            $date = $row['caseName'];
            $atty = $row['AttorneyID'];
            $action = $row['caseName'];
            $description = $row['caseName'];
            $hourlyRate = $row['caseName'];
            $time = $row['caseName'];
            $amount = $row['caseName'];
            $slipTotal = $row['caseName'];
            echo "
            
        <div class='row'>
            <div class='col-sm-2'>
                <input type='text' class='form-control' id='date' name='date' value='$date'>
            </div>
            <div class='col-sm-1'>
                   <input type='text' class='form-control' id='atty' name='atty' value='$atty'>
            </div>
            <div class='col-sm-2'>
                <input type='text' class='form-control' id='action' name='action' value='$action'>
            </div>
            <div class='col-sm-3'>
                <input type='text' class='form-control' id='description' name='description' value='$description'>
            </div>
            <div class='col-sm-1'>
                <input type='text' class='form-control' id='checkNo' name='checkNo' value='$hourlyRate'>
            </div>
            <div class='col-sm-1'>
                <input type='text' class='form-control' id='amount' name='amount' value='$time'>
            </div>
            <div class='col-sm-1'>
                <input type='text' class='form-control' id='amount' name='amount' value='$amount'>
            </div>
            <div class='col-sm-1'>
                <input type='text' class='form-control' id='amount' name='amount' value='$slipTotal'>
            </div>
        </div>
";
        }
        ?>

        <div class="row">
            <div class="col-sm-2">
                <label>timeTotal</label>
                <p></p>
            </div>
            <div class="col-sm-2">
                <label>costTotal</label>
                <p></p>
            </div>
        </div>
        <label>Confirm changes?</label>
        <input type="checkbox" name=\"confirmBox\" id=\"confirmBox\">
        <br>
        <button type="submit">Save</button>
    </fieldset>
</form>