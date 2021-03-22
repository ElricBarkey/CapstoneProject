<?php

//Turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

$sql = "SELECT * FROM contacts WHERE `clientID`='".$_SESSION['ClientID']."';";
//echo($sql);
//Send the query to the db
$result = mysqli_query($cnxn, $sql);

?>
<div id="main" class="container">
    <table class="table" id="test">
        <thead>
            <!-- Contact Information -->
            <tr><!-- gets first name, last name, and email -->
                <th scope="col">contactID</th>
                <th scope="col">CaseID</th>
                <th scope="col">clientID</th>
                <th scope="col">contactType</th>
                <th scope="col">number</th>
                <th scope="col">email</th>
                <th scope="col">name</th>
                <th scope="col">description</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result as $row) {
            $contactID = $row['contactID'];
            $caseID = $row['caseID'];
            $clientID = $row['clientID'];
            $contactType = $row['preferred'];
            $number = $row['phone'];
            $email = $row['email'];
            $name = $row['name'];
            $description = $row['description'];

            echo "
                    <tr>
                        <td><a href='newCaseContact.php?slipID=$contactID'>$contactID</td>
                        <td>$caseID</td>
                        <td>$clientID</td>
                        <td>$contactType</td>
                        <td>$number</td>
                        <td>$email</td>
                        <td>$name</td>
                        <td>$description</td>
                        <td><a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/newCaseContact.php?slipID=$contactID&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                    </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/newCaseContact.php">Add a Slip</a>
</div>


