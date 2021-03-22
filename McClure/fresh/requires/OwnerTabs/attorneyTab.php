<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
$sql = "SELECT * FROM `attorneys`;";
//echo $sql;
//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

?>
<!-- look into inserting php if-thens into form. Think I can make it tab
 between forms -->

<div id="main" class="container">
    <!-- Contact Information -->
    <table class="table" id="test"><!-- gets first name, last name, and email -->
        <thead>
        <tr>
            <th scope="col">FirstName</th>
            <th scope="col">categoryID</th>
            <th scope="col">actionName</th>
            <th scope="col">actionDescription</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($result as $row) {
            $attyID = $row['attorneyID'];
            $fName = $row['fName'];
            $mName = $row['mName'];
            $lName = $row['lName'];
            $firmName = $row['firmName'];
            $title = $row['title'];
            $birthDate = $row['birthdate'];
            $hireDate = $row['hireDate'];
            $endDate = $row['endDate'];
            $current = $row['aCurrent'];
            $address1 = $row['atAddress1'];
            $address2 = $row['atAddress2'];
            $city = $row['atCity'];
            $state = $row['atState'];
            $zip = $row['atZip'];
            $phone = $row['phone'];
            $email = $row['email'];
            $notes = $row['notes'];
            $hourlyRate = $row['hourlyRate'];
            $reportsTo = $row['reportsTo'];
            echo "
                <tr>
                    <td><a href='requires/OwnerTabs/newAttorney.php?attorneyID=$attyID'>$attyID</td>
                    <td>$fName</td>
                    <td>$mName</td>
                    <td>$lName</td>
                    <td>$firmName</td>
                    <td>$title</td>
                    <td>$birthDate</td>
                    <td>$hireDate</td>
                    <td>$endDate</td>
                    <td>$current</td>
                    <td>$address1</td>
                    <td>$address2</td>
                    <td>$city</td>
                    <td>$state</td>
                    <td>$zip</td>
                    <td>$phone</td>
                    <td>$email</td>
                    <td>$notes</td>
                    <td>$hourlyRate</td>
                    <td>$reportsTo</td>
                    <td><a href='requires/OwnerTabs/newAttorney.php?attorneyID=$attyID&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                </tr>
                ";
        }
        ?>
        </tbody>
    </table>
    <a href="requires/OwnerTabs/newAttorney.php">Add an attorney</a>
</div>


