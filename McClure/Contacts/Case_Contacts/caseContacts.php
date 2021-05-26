<?php

$sql = "SELECT * FROM contacts WHERE `clientID`='".$_SESSION['ClientID']."';";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);

?>
<div id="main" class="container">
    <table class="table" id="clientInfoTable">
        <thead>
            <tr>
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
            $_SESSION['contactID'] = $row['contactID'];
            $caseID = $row['caseID'];
            $clientID = $row['clientID'];
            $contactType = $row['preferred'];
            $number = $row['phone'];
            $email = $row['email'];
            $name = $row['name'];
            $description = $row['description'];

            echo "
                    <tr>
                        <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Contacts/Case_Contacts/newCaseContact.php?slipID=".$_SESSION['contactID']."'>".$_SESSION['contactID']."</td>
                        <td>$caseID</td>
                        <td>$clientID</td>
                        <td>$contactType</td>
                        <td>$number</td>
                        <td>$email</td>
                        <td>$name</td>
                        <td>$description</td>
                        <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Contacts/Case_Contacts/newCaseContact.php?slipID=".$_SESSION['contactID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                    </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Contacts/Case_Contacts/newCaseContact.php">Add a Contact</a>
</div>


