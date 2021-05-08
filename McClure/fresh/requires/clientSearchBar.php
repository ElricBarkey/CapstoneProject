<?php
include("functions/checkConflict.php");
//Define a query
$sql = "SELECT * FROM `purgatory`;";
//echo $sql;
//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

?>

    <table class="table" id="test" style="visibility: collapse"><!-- gets first name, last name, and email -->
        <thead>
        <tr>
            <th scope="col">Client Name</th>
            <th scope="col">Number</th>
            <th scope="col">Spouse Name</th>
            <th scope="col">Number</th>
            <th scope="col">Legal Service</th>
            <th scope="col">Conflict</th>
            <th scope="col">Add?</th>
            <th scope="col">Delete?</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($result as $row) {
            $clientID = $row['clientID'];
            $_SESSION['pClientID'] = $row['clientID']; //needed for newPurgatory

            $fName = $row['fName'];
            $lName = $row['lName'];
            $clientNumber = $row['clientNumber'];
            $SFName = $row['sFName'];
            $SLName = $row['sLName'];
            $phoneNum = $row['phoneNum'];
            $legalService = $row['legalService'];
            echo "
                <tr>
                    <td>".$fName." , ".$lName."</td>
                    <td>".$clientNumber."</td>
                    <td>".$SFName." , ".$SLName."</td>
                    <td>".$phoneNum."</td>
                    <td>".$legalService."</td>
                    <td style='color: red'>".clientAlert($fName, $lName, $cnxn). " ". spouseAlert($fName, $lName, $cnxn). " " .
                relativeAlert($fName, $lName, $cnxn). clientAlert($SFName, $SLName, $cnxn). " " . spouseAlert($SFName, $SLName, $cnxn). " " . relativeAlert($SFName, $SLName, $cnxn). "</td>
                    <td><a href='requires/add-purgatory.php?save=on&ID=$clientID'>Save</a></td>
                    <td><a href='requires/add-purgatory.php?delete=on&ID=$clientID' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
