<?php
require('db.php');

//Turn on error reporting
ini_set('display_errors', 1);
//error_reporting(E_ALL);
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
        $sql = "SELECT * FROM relatives";

        //Send the query to the db
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        foreach ($result as $row) {
            $lastName = $row['rLName'];
            $lastName = $row['rLName'];
            $firstName = $row['rFName'];
            $relationship = $row['rRelationship'];

            echo "
                <div class='row'>
                    <div class='col-sm-3'>
                        <input type=\"text\" class=\"form - control\" id=\"$lastName\" name=\"$lastName\" value=\"$lastName\">
                    </div>
                    <div class='col-sm-3'>
                        <input type=\"text\" class=\"form - control\" id=\"$firstName\" name=\"$firstName\" value=\"$firstName\">
                    </div>
                    <div class='col-sm-3'>
                        <input type=\"text\" class=\"form - control\" id=\"$relationship\" name=\"$relationship\" value=\"$relationship\">
                    </div>
                    <div class='col-sm-3'>
                        <textarea rows='8' cols='50'>
                        </textarea>
                    </div>
                </div>";
        }
        ?>
        <hr>
        <div style='' class='row'>
            <div class='col-sm-3'>
                <label for='newLastName'>Last Name</label>
                <input type="text" class="form-control" id="newLastName" name="newLastName" value="newLastName">
            </div>
            <div class='col-sm-3'>
                <label for='newFirstName'>First Name</label>
                <input type="text" class="form-control" id="newFirstName" name="newFirstName" value="newFirstName">
            </div>
            <div class='col-sm-3'>
                <label for='newRelationship'>Relationship</label>
                <input type="text" class="form-control" id="newRelationship" name="newRelationship" value="newRelationship">
            </div>
            <div class='col-sm-3'>
                <textarea rows='8' cols='50'>
                </textarea>
            </div>
        </div>
        <label>Confirm changes?</label>
        <input type="checkbox" name="confirmBox" id="confirmBox">
        <br>
        <button type="submit">Save</button>
    </fieldset>
</form>