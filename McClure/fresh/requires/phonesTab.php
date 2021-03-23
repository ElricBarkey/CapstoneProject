<?php
session_start();
//Turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//Define a query
if((isset($_SESSION['fSearch'])) && isset($_SESSION['lSearch'])) {
    $sql = "SELECT `ClientID` FROM `clients` WHERE `fName` = '" . $_SESSION['fSearch'] . "' AND `lName` = '" . $_SESSION['lSearch'] . "';";
    //echo $sql;
    $result = mysqli_query($cnxn, $sql);
    foreach ($result as $row) {
        $_SESSION['ClientID'] = $row['ClientID'];
    }
}

$sql = "SELECT * FROM contacts WHERE `clientID`='".$_SESSION['ClientID']."';";
//echo($sql);
//Send the query to the db
$result = mysqli_query($cnxn, $sql);

?>
<div id="main" class="container">
    <table class="table" id="test">
    <thead>
        <tr>
            <th scope="col">ContactID</th>
            <th scope="col">Contact Type</th>
            <th scope="col">Contact</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
        <tbody>
        <?php
            foreach ($result as $row) {
                $_SESSION['contactID'] = $row['contactID'];
                $contactType = $row['preferred'];
                $number = $row['phone'];

                echo "
                    <tr>
                        <td><a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/newPhone.php?subCategoryID=".$_SESSION['contactID']."'>".$_SESSION['contactID']."</td>
                        <td>$contactType</td>
                        <td>$number</td>
                        <td><a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/newPhone.php?subCategoryID=".$_SESSION['contactID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                    </tr>";
            }
        ?>
        </tbody>
</table>
<a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/newPhone.php">Add a contact</a>
</div>


