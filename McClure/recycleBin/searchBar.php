<?php
if($_POST['fSearch'] && $_POST['lSearch']){
    $_SESSION['fSearch'] = $_POST['fSearch'];
    $_SESSION['lSearch'] = $_POST['lSearch'];

}

if((isset($_SESSION['fSearch'])) && isset($_SESSION['lSearch'])) {
    $sql = "SELECT `clientID` FROM clients WHERE `fName` = '" . $_SESSION['fSearch'] . "' AND `lName` = '" . $_SESSION['lSearch'] . "';";
    $result = mysqli_query($cnxn, $sql);
    foreach ($result as $row) {
        $_SESSION['ClientID'] = $row['clientID'];
    }
    $sql = "SELECT * FROM clients WHERE `clientID`='" . $_SESSION['ClientID'] . "';";
//Send the query to the db
    $result = mysqli_query($cnxn, $sql);
}
?>
<form method="post" action="#">
    <div>
        <input type="text" id="fSearch" name="fSearch" placeholder="First">
        <input type="text" id="lSearch" name="lSearch" placeholder="Last">
        <button type="submit">Search</button>
    </div>
</form>
