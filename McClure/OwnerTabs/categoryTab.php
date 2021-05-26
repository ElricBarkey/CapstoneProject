<?php
//Define a query
$sql = "SELECT * FROM `category`;";
//echo $sql;
//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

?>
<div id="main" class="container">
    <table class="table" id="test">
        <thead>
            <tr>
                <th scope="col">categoryID</th>
                <th scope="col">categoryName</th>
                <th scope="col">categoryDescription</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>

        <?php

        foreach ($result as $row) {
            $_SESSION['categoryID'] = $row['categoryID'];
            $categoryName = $row['categoryName'];
            $actionDescription = $row['description'];
            echo "
                <tr>
                    <td><a href='OwnerTabs/newCategory.php?categoryID=".$_SESSION['categoryID']."'>".$_SESSION['categoryID']."</td>
                    <td>$categoryName</td>
                    <td>$actionDescription</td>
                    <td><a href='OwnerTabs/newCategory.php?categoryID=".$_SESSION['categoryID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="OwnerTabs/newCategory.php">Add an action</a>
</div>


