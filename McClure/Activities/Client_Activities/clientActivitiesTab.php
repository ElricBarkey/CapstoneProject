<?php
//Define a query
$sql = "SELECT * FROM `activities` WHERE `ClientID`='".$_SESSION['ClientID']."';";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);
?>

<div id="main" class="container">
    <table class="table" id="clientInfoTable">
        <thead>
        <tr>
            <th scope="col">activityID</th>
            <th scope="col">clientID</th>
            <th scope="col">date</th>
            <th scope="col">time</th>
            <th scope="col">attorney</th>
            <th scope="col">action</th>
            <th scope="col">notes</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($result as $row) {
            $_SESSION['activityID'] = $row['activityID'];
            $client = $row['clientID'];
            $date = $row['date_'];
            $time = $row['timeSpent'];
            $atty = $row['attorney'];
            $action = $row['actionID'];
            $notes = $row['notes'];
            echo "
                <tr>
                    <td><a href='requires/OwnerTabs/newAction.php?actionID=".$_SESSION['activityID']."'>".$_SESSION['activityID']."</td>
                    <td>$client</td>
                    <td>$date</td>
                    <td>$time</td>
                    <td>$atty</td>
                    <td>$action</td>
                    <td>$notes</td>
                    <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Activities/Client_Activities/newClientActivity.php?subCategoryID=".$_SESSION['activityID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="Activities/Client_Activities/newClientActivity.php">Add an Activity</a>
</div>

