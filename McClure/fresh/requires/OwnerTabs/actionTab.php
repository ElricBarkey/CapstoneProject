<?php

//Define a query
$sql = "SELECT * FROM `actions`;";
//echo $sql;
//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

?>
<!-- look into inserting php if-thens into form. Think I can make it tab
 between forms -->

<div id="main" class="container">
    <table class="table" id="test"><!-- gets first name, last name, and email -->
        <thead>
        <tr>
            <th scope="col">actionID</th>
            <th scope="col">actionName</th>
            <th scope="col">actionDescription</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
            <?php

            foreach ($result as $row) {
                $actionID = $row['actionID'];
                $actionName = $row['actionName'];
                $actionDescription = $row['actionDescription'];
                echo "
                    <tr>
                        <td><a href='requires/OwnerTabs/newAction.php?actionID=$actionID'>$actionID</td>
                        <td>$actionName</td>
                        <td>$actionDescription</td>
                        <td><a href='requires/OwnerTabs/newAction.php?actionID=$actionID&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                    <tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="requires/OwnerTabs/newAction.php">Add an action</a>
</div>


