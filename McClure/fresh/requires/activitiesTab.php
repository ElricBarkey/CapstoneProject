<?php
session_start();
//echo ($_SESSION['ClientID']);
//var_dump($_POST);
//Define a query
$sql = "SELECT * FROM `activities` WHERE `ClientID`='".$_SESSION['ClientID']."';";
//echo $sql;
//Send the query to the db
$result = mysqli_query($cnxn, $sql);
?>
<!-- look into inserting php if-thens into form. Think I can make it tab
 between forms -->

<div id="main" class="container">
    <!-- Contact Information -->
    <table class="table" id="test"><!-- gets first name, last name, and email -->
        <thead>
        <tr>
            <th scope="col">activityID</th>
            <th scope="col">caseID</th>
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
            $caseID = $row['caseID'];
            $client = $row['clientID'];
            $date = $row['date_'];
            $time = $row['timeSpent'];
            $atty = $row['attorney'];
            $action = $row['actionID'];
            $notes = $row['notes'];
            echo "
                <tr>
                    <td><a href='requires/OwnerTabs/newAction.php?actionID=".$_SESSION['activityID']."'>".$_SESSION['activityID']."</td>
                    <td>$caseID</td>
                    <td>$clientID</td>
                    <td>$date</td>
                    <td>$time</td>
                    <td>$atty</td>
                    <td>$action</td>
                    <td>$notes</td>
                    <td><a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/newClientActivity.php?subCategoryID=".$_SESSION['activityID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="requires/newClientActivity.php">Add an activity</a>
</div>

