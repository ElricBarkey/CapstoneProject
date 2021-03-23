<?php
session_start();
//check if information was edited
?>
<div id="main" class="container">
    <!-- Contact Information -->
    <table class="table" id="test">
        <thead>
        <tr>
            <th scope="col">SlipID</th>
            <th scope="col">caseID</th>
            <th scope="col">actionID</th>
            <th scope="col">date</th>
            <th scope="col">attorney</th>
            <th scope="col">action</th>
            <th scope="col">description</th>
            <th scope="col">hourly rate</th>
            <th scope="col">time</th>
            <th scope="col">slip total</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        <?php

        //Define a query
        $sql = "SELECT * FROM `slips`"; //going to have to write a join select and update

        //Send the query to the db
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        foreach ($result as $row) {
            $_SESSION['slipID'] = $row['slipID'];
            $caseID = $row['caseID'];
            $actionID = $row['actionID'];
            $date = $row['date_'];
            $atty = $row['attorneyID'];
            $action = $row['actionID'];
            $description = $row['description'];
            $hourlyRate = $row['hourlyRate'];
            $time = $row['timeSpent'];
            $slipTotal = $row['total'];
            echo "
            <tr>
                <td><a href='newSlip.php?slipID=".$_SESSION['slipID']."'>".$_SESSION['slipID']."</td>
                <td>$caseID</td>
                <td>$actionID</td>
                <td>$date</td>
                <td>$atty</td>
                <td>$action</td>
                <td>$description</td>
                <td>$hourlyRate</td>
                <td>$time</td>
                <td>$slipTotal</td>
                <td><a href='requires/OwnerTabs/newAction.php?actionID=".$_SESSION['slipID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/newSlip.php">Add a Slip</a>
</div>