<?php // COMMENT TO CHECK
//check if information was edited
?>
<div id="main" class="container">
    <table class="table" id="clientInfoTable">
        <thead>
        <tr>
            <th scope="col">SlipID</th>
            <th scope="col">caseID</th>
            <th scope="col">actionID</th>
            <th scope="col">date</th>
            <th scope="col">attorney</th>
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

        foreach ($result as $row) {
            $_SESSION['slipID'] = $row['slipID'];
            $caseID = $row['caseID'];
            $actionID = $row['actionID'];
            $date = $row['date_'];
            $atty = $row['attorneyID'];
            $description = $row['description'];
            $hourlyRate = $row['hourlyRate'];
            $time = $row['timeSpent'];
            $slipTotal = $row['total'];
            echo "
            <tr>
                <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Slips/newSlip.php?slipID=".$_SESSION['slipID']."'>".$_SESSION['slipID']."</td>
                <td>$caseID</td>
                <td>$actionID</td>
                <td>$date</td>
                <td>$atty</td>
                <td>$description</td>
                <td>$hourlyRate</td>
                <td>$time</td>
                <td>$slipTotal</td>
                <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Slips/newSlip.php?actionID=".$_SESSION['slipID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Slips/newSlip.php">Add a Slip</a>
</div>