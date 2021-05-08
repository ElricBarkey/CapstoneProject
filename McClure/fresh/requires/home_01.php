<?php
//Define a query
$sql = "SELECT * FROM `purgatory`;";
//echo $sql;
//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

?>
<h1 style="margin-left: 400px;">Pending Clients</h1>
<div id="main" class="container">
    <!-- Contact Information -->
    <table class="table" id="test"><!-- gets first name, last name, and email -->
        <thead>
        <tr>
            <th scope="col">client ID</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($result as $row) {
            $clientID = $row['clientID'];
            $_SESSION['pClientID'] = $row['clientID']; //needed for newPurgatory
            $lName = $row['lName'];
            $fName = $row['fName'];
            echo "
                <tr>
                    <td><a href='requires/OwnerTabs/newPurgatory2.php?clientID=$clientID'>$clientID</td>
                    <td>$lName</td>
                    <td>$fName</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
