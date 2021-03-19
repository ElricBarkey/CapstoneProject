<?php

if($_POST['confirmBox'] == 'on'){
    //var_dump($_POST);

    $sql = "UPDATE `Cases` SET `CaseComment`='".$_POST['comments']."' WHERE `clientID`='".$_SESSION['ClientID']."' AND `caseID`='".$_SESSION['caseID']."';";
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);

}
//Define a query
$sql = "SELECT * FROM `Cases`";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);

foreach ($result as $row) {
    $comment = $row['CaseComment'];
}
?>
<!-- look into inserting php if-thens into form. Think I can make it tab between forms -->

<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset id="#n" class="form-group"><!-- gets first name, last name, and email -->
        <?php
        echo "
            <div style=''>
                <textarea rows='8' cols='50' id='comments' name='comments'>".$comment."</textarea>
            </div>";
        ?>
        <label>Confirm changes?</label>
        <input type="checkbox" name="confirmBox" id="confirmBox">
        <br>
        <button type="submit">Save</button>
    </fieldset>
</form>


