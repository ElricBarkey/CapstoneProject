<?php

//check if information was edited
if($_POST['confirmBox'] == 'on'){
    //var_dump($_POST);

    $sql = "UPDATE `clients` SET `comments`='".$_POST['comments']."' WHERE `clientID`='".$_SESSION['ClientID']."';";
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);

}

if((isset($_SESSION['fSearch'])) && isset($_SESSION['lSearch'])) {
    $sql = "SELECT `clientID` FROM `clients` WHERE `fName` = '" . $_SESSION['fSearch'] . "' AND `lName` = '" . $_SESSION['lSearch'] . "';";
    $result = mysqli_query($cnxn, $sql);
    foreach ($result as $row) {
        $_SESSION['ClientID'] = $row['clientID'];
    }
}

$sql = "SELECT * FROM clients WHERE `clientID`='".$_SESSION['ClientID']."';";
//echo($sql);
//Send the query to the db
$result = mysqli_query($cnxn, $sql);

foreach ($result as $row) {
    $notes = $row['comments'];
}
?>
<!-- look into inserting php if-thens into form. Think I can make it tab between forms -->

<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset id="#n" class="form-group"><!-- gets first name, last name, and email -->
        <?php
        echo "
            <div style=''>
                <textarea rows='8' cols='50' name='comments' id='comments'>".$notes."</textarea>
            </div>";
        ?>
        <label>Confirm changes?</label>
        <input type="checkbox" name="confirmBox" id="confirmBox">
        <br>
        <button type="submit">Save</button>
    </fieldset>
</form>


