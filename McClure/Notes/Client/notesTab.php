<?php // STYLE TO PULL

//check if information was edited
if(isset($_POST['confirmBox']) == 'on'){

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

//Send the query to the db
$result = mysqli_query($cnxn, $sql);

foreach ($result as $row) {
    $notes = $row['comments'];
}
?>
<div class="container-fluid">
    <form id="form" method="post" action="#">
        <fieldset id="#n" class="form-group">
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
</div>
<style>
    .container-fluid{
        text-align: center;
    }
</style>

