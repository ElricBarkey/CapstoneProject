<?php


?>
<div id="main" class="container">
    <!-- Contact Information -->
    <table class="table" id="test">
        <thead>
        <tr>
            <th scope="col">Key ID</th>
            <th scope="col">Key Date</th>
            <th scope="col">caseID</th>
            <th scope="col">Date</th>
            <th scope="col">note</th>
            <th scope="col">AssignedTo</th>
            <th scope="col">priority</th>
            <th scope="col">done</th>
            <th scope="col">by</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        <?php

        //Define a query
        $sql = "SELECT * FROM `keyDates` WHERE `caseID`='".$_SESSION['caseID']."';";

        //Send the query to the db
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        foreach ($result as $row) {
            $keyID = $row['keyDate'];
            $caseID = $row['caseID'];
            $keyDate = $row['date_'];
            $keyNote = $row['note'];
            $assignedTo = $row['assignedTo'];
            $priority = $row['priority'];
            $done = $row['done'];
            $by = $row['by_'];
            $when = $row['when_'];
            echo "
            
        <tr>
            <td><a href='newKeyDate.php?keyID=$keyID'>$keyID</td>
            <td>$caseID</td>
            <td>$keyDate</td>
            <td>$keyNote</td>
            <td>$assignedTo</td>
            <td>$priority</td>
            <td>$done</td>
            <td>$by</td>
            <td>$when</td>
            <td><a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/newKeyDate.php?keyID=$keyID&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
        </tr>
";
        }
        ?>
        </tbody>
    </table class=\"form-group\">
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/newKeyDate.php">Add a Key Date</a>
</div>