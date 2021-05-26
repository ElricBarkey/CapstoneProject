<?php
//Displays a cases activities
        //Define a query
        $sql = "SELECT * FROM activities WHERE `caseID`='".$_SESSION['caseID']."';";
        //Send the query to the db
        $result = mysqli_query($cnxn, $sql);
?>
<div id="main" class="container">
    <table class="table" id="clientInfoTable">
        <thead>
        <tr>
            <th scope="col">activityID</th>
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
            $_SESSION['activityID'] = $row['activityID'];
            $caseID = $row['caseID'];
            $clientID = $row['clientID'];
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
                    <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Activities/Case_Activities/newCaseActivity.php?activityID=".$_SESSION['activityID']."'>".$_SESSION['activityID']."</td>
                    <td>$date</td>
                    <td>$atty</td>
                    <td>$actionID</td>
                    <td>$hourlyRate</td>
                    <td>$timeSpent</td>
                    <td>$total</td>
                    <td>$caseCheck</td>
                    <td>$notes</td>
                    <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Activities/Case_Activities/newCaseActivity.php?activityID=".$_SESSION['activityID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                </tr>";}
        ?>
        </tbody>
    </table>
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Activities/Case_Activities/newCaseActivity.php">Add an Activity</a>
</div>

