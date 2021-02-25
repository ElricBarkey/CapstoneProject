<?php
require('db.php');

//Turn on error reporting
ini_set('display_errors', 1);
//error_reporting(E_ALL);

//Define a query
$sql = "SELECT * FROM clients";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

?>
<!-- look into inserting php if-thens into form. Think I can make it tab between forms -->

<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset id="#p" class="form-group"><!-- gets first name, last name, and email -->
        <legend>Contact Info</legend>
        <div class='row'>
            <div class='col-sm-6'>
                <p>Type</p>
            </div>
            <div class='col-sm-6'>
                <p>Contact</p>
            </div>
        </div>
        <?php
            foreach ($result as $row) {
                $contactType = $row['contact'];
                $number = $row['phoneNum'];

                echo "
                    <div style='' class='row'>
                        <div class='col-sm-6'>
                            <label for='contactType'>Contact Type</label>
                            <input type=\"text\" class=\"form-control\" id=\"$contactType\" name=\"$contactType\" value=\"$contactType\">
                        </div>
                        <div class='col-sm-6'>
                            <label for='number'>Number</label>
                            <input type=\"text\" class=\"form-control\" id=\"$number\" name=\"$number\" value=\"$number\">
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
        <button type="submit">Save</button>
    </fieldset>
</form>


