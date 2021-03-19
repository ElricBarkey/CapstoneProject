<?php

//check if information was edited
if($_POST['confirmBox'] == 'on'){
    //var_dump($_POST);

    $sql = "UPDATE `keyDates` SET `date_`='".$_POST['date']."', `note`='".$_POST['note']."',
      `assignedTo`='".$_POST['assignedTo']."', `priority`='".$_POST['priority']."', `done`='".$_POST['done']."',
       `by_`='".$_POST['by']."', `when_`='".$_POST['when']."'WHERE `keyDate`='".$_SESSION['keyID']."';";
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);

}
?>
<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset class=\"form-group\">
        <div class='row'>
            <div class='col-sm-2'>Key Date</div>
            <div class='col-sm-4'>Key Note</div>
            <div class='col-sm-2'>Assigned To</div>
            <div class='col-sm-1'>1_2_3</div>
            <div class='col-sm-1'>Done?</div>
            <div class='col-sm-1'>By</div>
            <div class='col-sm-1'>When</div>
        </div>
        <?php

        //Define a query
        $sql = "SELECT * FROM `keyDates`";

        //Send the query to the db
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        foreach ($result as $row) {
            $_SESSION['keyID'] = $row['keyDate'];
            $keyDate = $row['date_'];
            $keyNote = $row['note'];
            $assignedTo = $row['assignedTo'];
            $priority = $row['priority'];
            $done = $row['done'];
            $by = $row['by_'];
            $when = $row['when_'];
            echo "
            
        <div class='row'>
            <div class='col-sm-2'>
                <input type='text' class='form-control' id='date' name='date' value='$keyDate'>
            </div>
            <div class='col-sm-4'>
                   <input type='text' class='form-control' id='note' name='note' value='$keyNote'>
            </div>
            <div class='col-sm-2'>
                <input type='text' class='form-control' id='priority' name='priority' value='$priority'>
            </div>
            <div class='col-sm-1'>
                <input type='radio' class='form-control' id='description' name='num' value='$priority'>
                <input type='radio' class='form-control' id='description' name='num' value='$priority'>
                <input type='radio' class='form-control' id='description' name='num' value='$priority'>
                <input type='text' class='form-control' id='assignedTo' name='assignedTo' value='$assignedTo'>
            </div>
            <div class='col-sm-1'>
                <input type='text' class='form-control' id='done' name='done' value='$done'>
            </div>
            <div class='col-sm-1'>
            <input type='text' class='form-control' id='by' name='by' value='$by'>
                <select>
                    <option value='open' selected='selected'>Open</option>
                    <option value='closed' selected='selected'>Closed</option>
                </select>
            </div>
            <div class='col-sm-1'>
                <input type='text' class='form-control' id='when' name='when' value='$when'>
            </div>
        </div>
";
        }
        ?>


        <label>Confirm changes?</label>
        <input type="checkbox" name="confirmBox" id="confirmBox">
        <br>
        <button type="submit">Save</button>
    </fieldset>
</form>