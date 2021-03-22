<?php
session_start();
//Define a query
        $sql = "SELECT * FROM activities WHERE `caseID`='".$_SESSION['caseID']."';";
        //Send the query to the db
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

?>
<!-- look into inserting php if-thens into form. Think I can make it tab
 between forms -->

    <!-- Contact Information -->
<div id="main" class="container"><!-- gets first name, last name, and email -->
    <table class="table" id="test">
        <thead>
        <tr>
            <th scope="col">activityID</th>
            <th scope="col">caseID</th>
            <th scope="col">clientID</th>
            <th scope="col">date</th>
            <th scope="col">attorney</th>
            <th scope="col">actionID</th>
            <th scope="col">Hourly Rate</th>
            <th scope="col">Time Spent</th>
            <th scope="col">total</th>
            <th scope="col">case check</th>
            <th scope="col">notes</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($result as $row) {
            $activityID = $row['activityID'];
            $caseID['caseID'] = $row['caseID'];
            $clientID['clientID'] = $row['clientID'];
            $date = $row['date_'];
            $atty = $row['attorney'];
            $actionID = $row['actionID'];
            $hourlyRate = $row['hourlyRate'];
            $timeSpent = $row['timeSpent'];
            $total = $row['total'];
            $caseCheck = $row['caseCheck'];
            $notes = $row['notes'];
            echo "
                <tr>
                    <td><a href='newCaseActivity.php?activityID=$activityID'>$activityID</td>
                    <td>$activityID</td>
                    <td>$caseID</td>
                    <td>$clientID</td>
                    <td>$date</td>
                    <td>$atty</td>
                    <td>$actionID</td>
                    <td>$hourlyRate</td>
                    <td>$timeSpent</td>
                    <td>$total</td>
                    <td>$caseCheck</td>
                    <td>$notes</td>
                    <td><a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/newCaseActivity.php?activityID=$activityID&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/newCaseActivity.php">Add a Slip</a>
</div>

