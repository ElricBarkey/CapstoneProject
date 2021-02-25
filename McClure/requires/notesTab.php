<?php
require('db.php');
//Define a query
$sql = "SELECT * FROM clients";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

foreach ($result as $row) {
    $contactType = $row['contact'];
    $number = $row['phoneNum'];
}
?>
<!-- look into inserting php if-thens into form. Think I can make it tab between forms -->

<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset id="#n" class="form-group"><!-- gets first name, last name, and email -->
        <?php
        echo "
            <div style=''>
                <textarea rows='8' cols='50'>
                </textarea>
            </div>";
        ?>
        <label>Confirm changes?</label>
        <input type="checkbox" name="confirmBox" id="confirmBox">
        <br>
        <button type="submit">Save</button>
    </fieldset>
</form>


