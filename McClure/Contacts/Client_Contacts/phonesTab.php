<?php

$sql = "SELECT * FROM contacts WHERE `clientID`='".$_SESSION['ClientID']."';";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);
?>
<div id="main" class="container">
    <table class="table" id="clientInfoTable">
        <thead>
            <tr>
                <th scope="col">ContactID</th>
                <th scope="col">Contact Type</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($result as $row) {
                $contactID = $row['contactID'];
                $contactType = $row['preferred'];
                $number = $row['phone'];
                $email = $row['email'];

                echo "
                    <tr>
                        <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Contacts/Client_Contacts/newPhone.php?contactID=".$contactID."'>".$contactID."</td>
                        <td>$contactType</td>
                        <td><a href='tel:$number'>$number</a></td>
                        <td><a href='mailto:$email?Subject=Some%20subject'>$email</a></td>
                        <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Contacts/Client_Contacts/newPhone.php?contactID=".$contactID."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                    </tr>";
            }
        ?>
        </tbody>
    </table>
<a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Contacts/Client_Contacts/newPhone.php">Add a contact</a>
</div>


