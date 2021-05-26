<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);
$sql = "SELECT * FROM `attorneys`;";
//echo $sql;
//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

?>
<div id="main" class="container">
    <table class="table" id="clientInfoTable">
        <thead>
        <tr>
            <th scope="col">AttorneyID</th>
            <th scope="col">FirstName</th>
            <th scope="col">MiddleName</th>
            <th scope="col">LastName</th>
            <th scope="col">FirmName</th>
            <th scope="col">title</th>
            <th scope="col">BirthDate</th>
            <th scope="col">HireDate</th>
            <th scope="col">EndDate</th>
            <th scope="col">current</th>
            <th scope="col">address1</th>
            <th scope="col">address2</th>
            <th scope="col">city</th>
            <th scope="col">state</th>
            <th scope="col">zip</th>
            <th scope="col">phone</th>
            <th scope="col">email</th>
            <th scope="col">Notes</th>
            <th scope="col">hourlyRate</th>
            <th scope="col">reportsTo</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($result as $row) {
            $_SESSION['attyID'] = $row['attorneyID'];
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
                    <td><a href='OwnerTabs/newAttorney.php?attorneyID=".$_SESSION['attyID']."&edit=true'>".$_SESSION['attyID']."</td>
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
                    <td><a href='OwnerTabs/newAttorney.php?attorneyID=".$_SESSION['attyID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                </tr>
                ";
        }
        ?>
        </tbody>
    </table>
    <a href="OwnerTabs/newAttorney.php">Add an attorney</a>
</div>

