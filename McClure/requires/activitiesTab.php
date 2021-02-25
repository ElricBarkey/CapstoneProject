<?php
require('db.php');
?>
<!-- look into inserting php if-thens into form. Think I can make it tab between forms -->

<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset id="#a" class="form-group"><!-- gets first name, last name, and email -->
        <legend>Activities list</legend>
        <div class='row'>
            <div class='col-sm-2'>
                <p>Date</p>
            </div>
            <div class='col-sm-2'>
                <p>Time</p>
            </div>
            <div class='col-sm-2'>
                <p>Atty</p>
            </div>
            <div class='col-sm-2'>
                <p>Action</p>
            </div>
            <div class='col-sm-4'>
                <p>Activity Note</p>
            </div>
        </div>


        <?php
            //Define a query
            $sql = "SELECT * FROM inventory";

            //Send the query to the db
            $result = mysqli_query($cnxn, $sql);
            //var_dump($result);

            foreach ($result as $row) {
                $date = $row[''];
                $time = $row[''];
                $atty = $row[''];
                $action = $row[''];
                $activity = $row[''];
            echo "
                <div style='' class='row'>
                    <div class='col-sm-2'>
                        <label for='date'>$date</label>
                        <input type=\"text\" class=\"form-control\" id=\"$date\" name=\"$date\">
                    </div>
                    <div class='col-sm-2'>
                        <label for='time'>$time</label>
                        <input type=\"text\" class=\"form-control\" id=\"$time\" name=\"$time\">
                    </div>
                    <div class='col-sm-2'>
                        <label for='atty'>$atty</label>
                        <input type=\"text\" class=\"form-control\" id=\"$atty\" name=\"$atty\">
                    </div>
                    <div class='col-sm-2'>
                        <label for='action'>$action</label>
                        <input type=\"text\" class=\"form-control\" id=\"$action\" name=\"$action\">
                    </div>
                    <div class='col-sm-4'>
                        <label for='activity'>$activity</label>
                        <input type=\"text\" class=\"form-control\" id=\"$activity\" name=\"$activity\">
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
    </fieldset>
</form>

